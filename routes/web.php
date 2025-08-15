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
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RutinaController;



Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('welcome'); 
    }
});





Route::get('/public', function () {
    return view('layouts.public');
})->name('public');

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
Route::resource('entrenadores', EntrenadorController::class);
Route::resource('recepcionistas', RecepcionistaController::class);
Route::resource('administradores', AdministradorController::class);

Route::resource('asistencias', AsistenciaController::class);


Route::resource('notificaciones', NotificacionController::class)->middleware('auth'); 
// Añade middleware auth si usas autenticación
Route::get('/notificaciones/enviar', [NotificacionController::class, 'showForm'])->name('notificaciones.form');
Route::post('/notificaciones/enviar', [NotificacionController::class, 'sendWhatsapp'])->name('notificaciones.sendWhatsapp');




Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
Route::get('/notificaciones/create', [NotificacionController::class, 'create'])->name('notificaciones.create');
Route::post('/notificaciones/store', [NotificacionController::class, 'store'])->name('notificaciones.store');

// Ruta para mostrar el formulario alternativo y enviar WhatsApp directo
Route::get('/notificaciones/send', [NotificacionController::class, 'showForm'])->name('notificaciones.sendForm');
Route::post('/notificaciones/sendWhatsapp', [NotificacionController::class, 'sendWhatsapp'])->name('notificaciones.sendWhatsapp');



Route::post('/notificaciones/send-whatsapp', [NotificacionController::class, 'sendWhatsapp'])->name('notificaciones.sendWhatsapp');



Route::resource('pagos', PagoController::class);
Route::resource('rutinas', RutinaController::class);

require __DIR__.'/auth.php';
