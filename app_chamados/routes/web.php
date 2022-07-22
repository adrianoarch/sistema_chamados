<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

