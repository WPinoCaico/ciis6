<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
Route::get('/', function () {
    return redirect()->route('login');;
})->middleware(['auth:sanctum']);
Route::get('/{optional?}', function () {
    return view('app');
})->name('basepath')->middleware([/*'auth:sanctum',*/'verified']);
Route::get('/inscripcion/carne2', function () {
    return view('carnepdf2');
})->name('basepath');
Route::get('/inscripcion/carne3', [App\Http\Controllers\FichaController::class, 'generar_carnet']);
Route::group(['middleware' => ['auth:sanctum','verified']], function() {
    Route::get('/inscripcion/carne', function () {
        return view('carnepdf');
    })->name('basepath');
    Route::get('/api/datosficha', [App\Http\Controllers\AsistenciaQRController::class, 'datosficha']);
    Route::put('/api/registrarasistencia', [App\Http\Controllers\AsistenciaQRController::class,'registrarasistencia']);    
    Route::post('api/usuarios/contrasena', [App\Http\Controllers\Admin\UserController::class, 'actulizar_contrasena'])->middleware('role:Administrador|Asesor|Colaborador');
    Route::resource('api/roles', App\Http\Controllers\Admin\RolController::class)->middleware('role:Administrador');
    Route::get('api/usuarios', [App\Http\Controllers\UsuarioController::class, 'index']);
    Route::resource('api/usuarios-roles', App\Http\Controllers\Admin\UserController::class);
    Route::get('api/{usuario}/rol', [App\Http\Controllers\Admin\UserController::class, 'getRol']);
    Route::get('api/fichas/descarga_carnet', [App\Http\Controllers\FichaController::class, 'descargacarnet'])->middleware('role:Administrador|Asesor|Colaborador');
    Route::get('api/fichas/lista_asistencia',[App\Http\Controllers\AsistenciaQRController::class, 'listaasistencia'])->middleware('role:Administrador|Asesor|Colaborador');
    Route::get('api/fichas/reporte_asistencia_qr',[App\Http\Controllers\AsistenciaQRController::class, 'reporteasistenciaqr'])->middleware('role:Administrador|Comision|Colaborador');
    Route::resource('api/fichas', App\Http\Controllers\FichaController::class);
    Route::get('api/reporte', [App\Http\Controllers\ReporteGeneralController::class, 'index']);
});
Route::get('test/send-mail', function () {
    $details = [
        'title' => 'Mail from Nicesnippets.com',
        'body' => 'This is a test email using SMTP'
    ];
    Mail::to('user@gmail.com')->send(new \App\Mail\DemoMail($details));
    dd("Mail Sent Successfully.");
});
Route::post('/mail/subscribe', [App\Http\Controllers\DemoMailController::class, 'subscribe']);
Route::get('/prueba/test', [App\Http\Controllers\PruebaController::class, 'index']);
Route::view('home', 'home')->middleware(['auth', 'verified']);