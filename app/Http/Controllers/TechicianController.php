<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Tecnico;
use App\Models\User;
use App\Models\Chamado;

class TechicianController extends Controller
{
    protected $techician;
    protected $chamado;

    public function __construct(Tecnico $techician, Chamado $chamado)
    {
        $this->techician = $techician;
        $this->chamado = $chamado;
    }

    public function index(Request $request)
    {
        $techicians = $this->techician->getTechicians(
            $request->search ?? '',
        );
        return view('techicians.index', compact('techicians'));
    }

    public function create()
    {
        $techicians = $this->techician->all();
        return view('techicians.create', compact('techicians'));
    }

    public function store(Request $request)
    {
        $techician = $this->techician->create($request->all());
        $techician->save();
        return redirect()->route('tecnicos.index')->with('success', 'Técnico registrado com sucesso!');
    }
    
    public function show($id)
    {
        $techician = $this->techician->findOrFail($id);
        $chamados = $this->chamado->where('tecnico_id', $id)->get();
        return view('techicians.show', compact('techician', 'chamados'));
    }

    public function edit($id)
    {
        $techician = $this->techician->where('id', $id)->first();
        return view('techicians.edit', compact('techician'));
    }

    public function update(Request $request, $id)
    {
        $techician = $this->techician->where('id', $id)->first();
        $techician->update($request->all());
        return redirect()->route('tecnicos.index')->with('success', 'Técnico atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $techician = $this->techician->where('id', $id)->first();
        $techician->delete();
        return redirect()->route('tecnicos.index')->with('success', 'Técnico excluído com sucesso!');
    }
    
}