<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatedSectorRequest;
use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\User;

class SectorController extends Controller
{
    protected $sector;
    protected $user;
    
    public function __construct(Sector $sector, User $user)
    {
        $this->sector = $sector;
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $sectors = $this->sector->getSectors(
            $request->search ?? '',
        );
        return view('sectors.index', compact('sectors'));
    }

    public function create()
    {
        $sectors = $this->sector->all();
        return view('sectors.create', compact('sectors'));
    }

    public function store(Request $request)
    {
        $this->sector->create($request->all());
        return redirect()->route('sectors.index')->with('success', 'Setor registrado com sucesso!');
    }

    public function edit(Sector $sector)
    {
        $sectors = $this->sector->all();
        return view('sectors.edit', compact('sector'));
    }

    public function update(StoreUpdatedSectorRequest $request, $id)
    {
        $sector = Sector::findorFail($id);
        $sector->update($request->all());
        return redirect()->route('sectors.index')->with('success', 'Setor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $sector = Sector::findorFail($id);
        $sector->delete();
        return redirect()->route('sectors.index')->with('success', 'Setor excluído com sucesso!');
    }

    public function show($id)
    {
        $sector = $this->sector->findOrFail($id);
        $users = $this->user->where('sector_id', $id)->get();
        return view('sectors.show', compact('sector', 'users'));        
    }
    
}