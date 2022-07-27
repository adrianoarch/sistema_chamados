<?php

use App\Http\Controllers\{
    UserController,
    HomeController,
    SectorController,
    ServiceDeskController,
    TechicianController,
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
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{login}', [UserController::class, 'show'])->name('users.show');

    Route::get('/sectors', [SectorController::class, 'index'])->name('sectors.index');
    Route::get('/sectors/create', [SectorController::class, 'create'])->name('sectors.create');
    Route::post('/sectors/{id}', [SectorController::class, 'update'])->name('sectors.update');
    Route::post('/sectors', [SectorController::class, 'store'])->name('sectors.store');
    Route::delete('/sectors/{id}', [SectorController::class, 'destroy'])->name('sectors.destroy');
    Route::get('/sectors/{sector}/edit', [SectorController::class, 'edit'])->name('sectors.edit');
    Route::get('/sectors/{name}', [SectorController::class, 'show'])->name('sectors.show');

    Route::get('/tecnicos', [TechicianController::class, 'index'])->name('tecnicos.index');
    Route::get('/tecnicos/create', [TechicianController::class, 'create'])->name('tecnicos.create');
    Route::post('/tecnicos/{id}', [TechicianController::class, 'update'])->name('tecnicos.update');
    Route::post('/tecnicos', [TechicianController::class, 'store'])->name('tecnicos.store');
    Route::delete('/tecnicos/{id}', [TechicianController::class, 'destroy'])->name('tecnicos.destroy');
    Route::get('/tecnicos/{technician}/edit', [TechicianController::class, 'edit'])->name('tecnicos.edit');
    Route::get('/tecnicos/{name}', [TechicianController::class, 'show'])->name('tecnicos.show');
    
    Route::get('/service-desk', [ServiceDeskController::class, 'index'])->name('service-desk.index');
    Route::get('/service-desk/create', [ServiceDeskController::class, 'create'])->name('service-desk.create');
    Route::post('/service-desk', [ServiceDeskController::class, 'store'])->name('service-desk.store');
    Route::get('/service-desk/{chamado}', [ServiceDeskController::class, 'show'])->name('service-desk.show');
    
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';