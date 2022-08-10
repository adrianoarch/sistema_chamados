<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatedServiceDeskRequest;
use Illuminate\Http\Request;
use App\Models\{
    User,
    Sector,
    Tecnico,
    Chamado
};
use Illuminate\Support\Facades\Auth;

class ServiceDeskController extends Controller
{
    protected $user;
    protected $sector;
    protected $tecnico;
    protected $chamado;

    public function __construct(User $user, Sector $sector, Tecnico $tecnico, Chamado $chamado)
    {
        $this->user = $user;
        $this->sector = $sector;
        $this->tecnico = $tecnico;
        $this->chamado = $chamado;
    }
    
    public function index(Auth $auth, User $user)
    {
        $users = $this->user->all();
        $sectors = $this->sector->all();
        $tecnicos = $this->tecnico->all();
        $chamados = Chamado::UserAuth()->get();
        
        // dd(Auth::user()->id);
        return view('service-desk.index', compact('users', 'sectors', 'tecnicos', 'chamados'));
    }
    
    public function create()
    {
        $sectors = $this->sector->all();
        $tecnicos = $this->tecnico->all();
        
        return view('service-desk.create', compact('sectors', 'tecnicos'));
    }

    public function store(Request $request)
    {
        $chamado = new Chamado();
        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->categoria = $request->categoria;
        $chamado->user_id = Auth::user()->id;
        $chamado->ip_address = $request->ip_address;
        $chamado->save();
        
        return redirect()->route('service-desk.index')
        ->with('success', 'Chamado criado com sucesso! Aguarde o atendimento do técnico.');
    }

    public function show($id)
    {
        $chamado = Chamado::find($id);
        $user = User::find($chamado->user_id);
        $tecnico = Tecnico::find($chamado->tecnico_id);
        return view('service-desk.show', compact('chamado', 'user', 'tecnico'));
    }

    public function edit($id)
    {
        $chamado = Chamado::find($id);
        $sectors = $this->sector->all();
        $tecnicos = $this->tecnico->all();
        
        return view('service-desk.edit', compact('chamado', 'sectors', 'tecnicos'));
    }

    public function update(StoreUpdatedServiceDeskRequest $request, $id)
    {
        $chamado = Chamado::findorFail($id);
        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->categoria = $request->categoria;
        $chamado->user_id = Auth::user()->id;
        $chamado->ip_address = $request->ip_address;
        $chamado->tecnico_id = $request->tecnico_id;
        $chamado->status = $request->status;
        $chamado->parecer_tecnico = $request->parecer_tecnico;
        $chamado->save();
        
        return redirect()->route('service-desk.index')
        ->with('success', 'Chamado atualizado com sucesso!');
    }
}