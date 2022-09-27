<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatedServiceDeskRequest;
use App\Http\Requests\StoreServiceDeskRequest;
use Illuminate\Http\Request;
use App\Models\{
    User,
    Sector,
    Tecnico,
    Chamado
};
use Illuminate\Support\Facades\Auth;
use App\Notifications\notificaChamadoUser;
use Illuminate\Support\Facades\Notification;

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
    
    public function index(Auth $auth, User $user, Request $request)
    {
        $users = $this->user->all();
        $sectors = $this->sector->all();
        $tecnicos = $this->tecnico->all();
        $chamados = $this->chamado->getChamados($request->search ?? '');
        
        // dd(Auth::user()->id);
        // dd($request->all());
        return view('service-desk.index', compact('users', 'sectors', 'tecnicos', 'chamados'));
    }
    
    public function create()
    {
        $sectors = $this->sector->all();
        $tecnicos = $this->tecnico->all();
        
        
        return view('service-desk.create', compact('sectors', 'tecnicos'));
    }

    public function store(StoreServiceDeskRequest $request)
    {
        $chamado = new Chamado();
        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->categoria = $request->categoria;
        $chamado->user_id = Auth::user()->id;
        $chamado->ip_address = $request->ip_address;
        $chamado->save();

        $chamado->notify(new notificaChamadoUser(Auth::user(), $chamado));
        
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

    public function closeds(User $user)
    {
        $chamados = Chamado::where('status', '=', 'Fechado')->get();
        // dd($chamados);
        $tecnicos = $this->tecnico->all();
        $user = User::find(Auth::user()->id);
        return view('service-desk.closeds', compact('chamados', 'tecnicos'));
    }
}