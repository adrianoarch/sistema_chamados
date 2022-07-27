<?php

use App\Http\Controllers\{
    UserController,
    HomeController,
    ServiceDeskController,
};
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{login}', [UserController::class, 'show'])->name('users.show');
    
    Route::get('/service-desk', [ServiceDeskController::class, 'index'])->name('service-desk.index');
    Route::get('/service-desk/create', [ServiceDeskController::class, 'create'])->name('service-desk.create');
    Route::post('/service-desk', [ServiceDeskController::class, 'store'])->name('service-desk.store');
    Route::get('/service-desk/{chamado}', [ServiceDeskController::class, 'show'])->name('service-desk.show');
    
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';