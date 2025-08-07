<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;

use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\MembresiaClienteController;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('welcome'); 
    }
});

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');


Route::get('/dashboard', [DashboardController::class, 'index'])

            ->middleware(['auth', 'verified'])
            ->name('dashboard');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::resource('roles', RolController::class);
Route::resource('users', UserController::class);
Route::resource('personas', PersonaController::class);
Route::resource('clientes', ClienteController::class)->names('clientes');
Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::resource('membresias', MembresiaController::class);
Route::resource('membresia_cliente', MembresiaClienteController::class);

require __DIR__.'/auth.php';
