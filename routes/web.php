<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentoRucController;
use App\Http\Controllers\ActivityLogGeneralController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AsignarController;
use App\Http\Controllers\ListadoUsuarioController;
use App\Http\Controllers\ReporteComprasController;
use App\Http\Controllers\ReporteVentasController;
use App\Http\Controllers\TazaIgvController;
use App\Http\Controllers\TipoCambioController;
use App\Http\Controllers\ConsultaTipoCambioController;
use App\Http\Controllers\GetPostController;
use App\Http\Controllers\LiquidacionesController;
use App\Http\Controllers\DetallesLiquidacionesController;
use App\Http\Controllers\RucEmpresaController;
use App\Http\Controllers\ConsultationController;


use Illuminate\Support\Facades\Route;
// Ruta para la página de inicio
// Route::get('/', function () {
//     return redirect()->route('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
// Rutas protegidas por el middleware de autenticación y verificación
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta para el dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Rutas para el perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// Route::get('/consultar-dni', [DniController::class, 'consultarDni'])->name('consultar-dni');
    Route::get('/consultar-documentodni', [DocumentoDniController::class, 'consultardocumentoDni'])->name('consultar-documentodni');

    // Route::match( ['get', 'post'],'consultar-ruc', [RucController::class, 'consultarRuc'])->name('consultar-ruc');

    Route::get('/consulta', [ConsultaController::class, 'index'])->name('consulta-index');
    // Route::post('/consulta/guardar', [ConsultaController::class, 'guardarDatos'])->name('consulta.guardar');
    Route::resource('listado_db', ListadoController::class)->middleware('role:superadministrador,admin,jefesucursal');
   
    //listado de roles
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index')->middleware('role:superadministrador');
    Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show')->middleware('role:superadministrador');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy')->middleware('role:superadministrador');
    Route::get('user/{userId}/activity', [ActivityLogController::class, 'showUserActivity'])->name('user.activity');
    Route::put('/usuarios/{id}/roles', [UserController::class, 'cambiarRoles'])->name('cambiarRoles')->middleware('role:superadministrador');

    // routes/web.php
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index')->middleware('role:superadministrador');

    Route::delete('/usuarios/{id}', [UserController::class, 'eliminarUsuario'])->name('eliminarUsuario')->middleware('role:superadministrador');
    
    //HISTORIAL DE CONSULTAS EN SISTEMA
    Route::get('/historial-actividades', [DocumentoDniController::class, 'historialActividades'])->name('historial-actividades')->middleware('role:superadministrador');
    Route::get('/historial-consultas-ruc', 'App\Http\Controllers\RucController@historialConsultasRuc')->name('historial.consultas.ruc')->middleware('role:superadministrador');
    Route::get('/historial-consultas-placa', [ConsultaController::class, 'historialConsultasPlaca'])->name('historial.consultas.placa');
    
    Route::get('/detalles/{id}', [SucursalController::class, 'mostrarDetalles'])->name('detalles-jefe-sucursal');
    Route::get('/editar/{id}', [SucursalController::class, 'mostrarEditar'])->name('editar-jefe-sucursal');

    Route::get('/eliminar/{id}', [SucursalController::class, 'eliminar'])->name('eliminar-jefe-sucursal');
    
    Route::get('/crear', [SucursalController::class, 'mostrarCrear'])->name('crear-jefe-sucursal');
    Route::post('/crear', [SucursalController::class, 'crear'])->name('guardar-jefe-sucursal');
    
    Route::get('/resultado-consultar-documentodni', [DocumentoDniController::class, 'consultardocumentoDni'])->name('resultado-consultar-documentodni');
    Route::get('/consultar-documentodni', 'DocumentoDniController@consultardocumentoDni')->name('consultar-documentodni');
    
    Route::get('/historial-actividades', 'App\Http\Controllers\DocumentoDniController@historialActividades')->middleware('role:superadministrador');
    Route::get('/historial-actividades', 'DocumentoDniController@historialActividades')->name('historial-actividades')->middleware('role:superadministrador');

    //historial genereal
    Route::get('/actividades-generales', [ActivityLogGeneralController::class, 'index'])->name('actividades-generales.index')->middleware('role:superadministrador');

    // Contabilidad
    Route::match( ['get', 'post'],'compras', [ComprasController::class, 'index'])->name('compras.index');
    Route::post('/compras', [ComprasController::class, 'store'])->name('compras.store');
    Route::post('/compras', [ComprasController::class, 'store2'])->name('compras.store2');
    Route::resource('ventas', VentasController::class);
    Route::post('/asignar', [AsignarController::class, 'store'])->name('asignar.store');
    Route::get('listado', [ListadoUsuarioController::class, 'index'])->name('listado.index');


    Route::resource('empresa', EmpresaController::class)->names('empresa');
    Route::resource('reporte_compras', ReporteComprasController::class);
    Route::resource('reporte_ventas', ReporteVentasController::class);

    Route::resource('taza_igv', TazaIgvController::class);
    Route::resource('tipo_cambio', TipoCambioController::class);
    Route::get('consultar-tipo-cambio', [ConsultaTipoCambioController::class, 'consultatipocambio'])->name('consultatipocambio');


    Route::get('getpostcompras', [ComprasController::class, 'consultarRuc'])->name('getpostcompras.consultarRuc');
    Route::get('getpostventas', [VentasController::class, 'consultarRuc'])->name('getpostventas.consultarRuc');
    
    Route::post('/guardarventas', [VentasController::class, 'store'])->name('getpost.guardarventas');
    Route::post('/guardarcompras', [ComprasController::class, 'store'])->name('getpost.guardar');

    Route::resource('consultation', GetPostController::class);
    Route::get('getpost', [GetPostController::class, 'consultarRuc'])->name('getpost.consultarRuc2');
    Route::post('/guardar', [GetPostController::class, 'store'])->name('getpost.guardar2');



    Route::get('tipo', [ConsultaTipoCambioController::class, 'consultatipocambio'])->name('tipo.consultartipo');
    Route::post('/guardartipo', [ConsultaTipoCambioController::class, 'store'])->name('tipo.guardar');

    Route::post('/guardar-venta', [VentaController::class, 'store'])->name('guardar_venta');


    //liquidaciones

    Route::resource('liquidaciones', LiquidacionesController::class);
    Route::resource('detalles', DetallesLiquidacionesController::class);

    Route::resource('ruc', RucEmpresaController::class);

});
// Ruta para la autenticación
require __DIR__.'/auth.php';