<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\{
    StoreUpdatedUsersRequest,
    StoreCreatedUsersRequest,
};
use App\Models\Sector;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $user;
    protected $sector;

    public function __construct(User $user, Sector $sector)
    {
        $this->user = $user;
        $this->sector = $sector;
    }

    public function index(Request $request)
    {
        $users = $this->user->getUsers(
            $request->search ?? '',
        );
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $users = $this->user->all();
        $sectors = $this->sector->all();
        return view('users.create', compact('sectors'));
    }

    public function store(StoreCreatedUsersRequest $request)
    {
        $user = $this->user->create($request->all());
        $user['password'] = bcrypt($request->password);
        $user->sector()->associate($request->sector_id);
        $user->save();
        
        return redirect()->route('users.index')->with('success', 'Usuário registrado com sucesso!');
    }

    public function show($login)
    {
        $user = $this->user->where('login', $login)->first();
        return view('users.show', compact('user'));
    }

    public function showUniqueUser($id)
    {
        $user = $this->user->where('id', $id)->first();
        return view('users.showUniqueUser', compact('user'));
    }


    public function edit($login)
    {
        $user = $this->user::findorFail($login);
        $sectors = $this->sector->all();
        return view('users.edit', compact('user', 'sectors'));
    }

    public function update(StoreUpdatedUsersRequest $request, $id)
    {
        $user = User::findorFail($id);
        $user['password'] = bcrypt($request->password);
        $user->update($request->only([
            'name',
            'password',
            'admin',
            'sector_id',           
        ]));
        
        // $user->sector()->associate($request->sector_id);
        // $user->save();
        
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }

}