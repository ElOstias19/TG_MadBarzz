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
use App\Http\Controllers\ReporteController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

Route::get('/', function () {

    return view('welcome');
});


// #region Push notification
Route::post('/save-subscription', function (Request $request) {
    // Guardar la suscripción en storage/app/subscription.json
    $path = storage_path('app/subscription.json');

    File::put($path, json_encode($request->all()));

    return response()->json(['success' => true]);
});

Route::get('/send-push', function () {
    // Ruta del archivo donde guardaste la suscripción
    $path = storage_path('app/subscription.json');

    if (!file_exists($path)) {
        return response('No se encontró la suscripción. Primero suscríbete desde el navegador.', 404);
    }

    $subscription = json_decode(file_get_contents($path), true);

    $webPush = new WebPush([
        'VAPID' => [
            'subject' => 'mailto:jhons.crespo@gmail.com',
            'publicKey' => env('VAPID_PUBLIC_KEY'),
            'privateKey' => env('VAPID_PRIVATE_KEY'),
        ],
    ]);

    $payload = json_encode([
            'title' => 'Notificación de Prueba 🎉',
            'body' => 'Tu PWA Laravel funciona correctamente 🚀',
        ]);

    $report = $webPush->sendOneNotification(Subscription::create($subscription), $payload);

    // Verificar resultado
    $endpoint = $report->getRequest()->getUri()->__toString();
    if ($report->isSuccess()) {
        return "✅ Notificación enviada correctamente a {$endpoint}";
    } else {
        return "❌ Error al enviar: " . $report->getReason();
    }
});
// #endregion


// Ruta de dashboard general y cliente según rol
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user && strtolower($user->rol) === 'cliente') {
        return redirect()->route('dashboard.cliente');
    }

    return redirect()->route('dashboard.index');
})->middleware('auth');




// Dashboard administrador
Route::get('/dashboard/index', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');

// Dashboard cliente
Route::get('/dashboard/cliente', [DashboardController::class, 'cliente'])
    ->name('dashboard.cliente')
    ->middleware('auth');





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




//Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
//Route::get('/notificaciones/create', [NotificacionController::class, 'create'])->name('notificaciones.create');
//Route::post('/notificaciones/store', [NotificacionController::class, 'store'])->name('notificaciones.store');

// Ruta para mostrar el formulario alternativo y enviar WhatsApp directo

//Route::get('/notificaciones/send', [NotificacionController::class, 'showForm'])->name('notificaciones.sendForm');
//Route::post('/notificaciones/sendWhatsapp', [NotificacionController::class, 'sendWhatsapp'])->name('notificaciones.sendWhatsapp');



//Route::post('/notificaciones/send-whatsapp', [NotificacionController::class, 'sendWhatsapp'])->name('notificaciones.sendWhatsapp');



Route::resource('pagos', PagoController::class);
Route::resource('rutinas', RutinaController::class);


// Rutas para que el cliente vea solo sus asistencias


// Rutas para asistencias
Route::resource('asistencias', AsistenciaController::class);
Route::get('mis-asistencias', [AsistenciaController::class, 'misAsistencias'])->name('asistencias.mis');




// Rutas para pagos
// Rutas para pagos (resource estándar)
Route::resource('pagos', PagoController::class);

// Ruta personalizada para los pagos del cliente autenticado
Route::get('mis-pagos', [PagoController::class, 'misPagos'])->name('pagos.mis-pagos');

// =============================
// Reportes - Clientes Activos/Inactivos
// =============================
Route::get('/reportes/clientes-estado', [ReporteController::class, 'clientesEstado'])
    ->name('reportes.clientes.estado');
Route::get('/reportes/clientes-estado/pdf', [ReporteController::class, 'exportClientesEstadoPDF'])
    ->name('reportes.clientes.estado.pdf');

// =============================
// Reportes - Clientes Nuevos del Mes
// =============================
Route::get('/reportes/clientes-nuevos', [ReporteController::class, 'clientesNuevos'])
    ->name('reportes.clientes.nuevos');
Route::get('/reportes/clientes-nuevos/pdf', [ReporteController::class, 'exportClientesNuevosPDF'])
    ->name('reportes.clientes.nuevos.pdf');

// =============================
// Reportes - Clientes con Membresía Vencida o por Vencer
// =============================
Route::get('/reportes/clientes-membresia-vencida', [ReporteController::class, 'clientesMembresiaVencida'])
    ->name('reportes.clientes.membresia_vencida');
Route::get('/reportes/clientes-membresia-vencida/pdf', [ReporteController::class, 'exportClientesMembresiaVencidaPDF'])
    ->name('reportes.clientes.membresia_vencida.pdf');

// =============================
// Reportes - Pagos por Mes
// =============================
Route::get('/reportes/pagos-por-mes', [ReporteController::class, 'pagosPorMes'])
    ->name('reportes.pagos.mes');
Route::get('/reportes/pagos-por-mes/pdf', [ReporteController::class, 'exportPagosPorMesPDF'])
    ->name('reportes.pagos.mes.pdf');





Route::get('/rutinas/ver/{id}', [RutinaController::class, 'verRutina'])->name('rutinas.ver');

require __DIR__.'/auth.php';
