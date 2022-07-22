<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    protected $user;
    protected $sector;

    public function __construct(User $user, Sector $sector)
    {
        $this->user = $user;
        $this->sector = $sector;
    }

    public function index(User $user)
    {
        $users = $user->all();
        // $sectors = $sector->all();
        // dd($users->sector->name);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $users = $this->user->all();
        $sectors = $this->sector->all();
        return view('users.create', compact('sectors'));
    }
    
        

}
