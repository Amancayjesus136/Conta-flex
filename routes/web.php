<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DniController;
use App\Http\Controllers\RucController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ReporteConsultaController;
use App\Http\Controllers\ListadoController;
use App\Http\Controllers\ListadoReportesController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ConsultarDniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\DocumentoDniController;
use App\Http\Controllers\DocumentoRucController;
use App\Http\Controllers\ConsultaPlacaController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ActivityLogGeneralController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VehiculosPlacasController;

use App\Http\Controllers\VentasController;




use Illuminate\Support\Facades\Route;
// Ruta para la página de inicio
// Route::get('/', function () {
//     return redirect()->route('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

//LISTADO DE CONSULTAS EN WELCOME
Route::get('/consultar-documento', [DocumentoController::class, 'documentoDni'])->name('consultar-documento');
Route::get('/consultar-documentoruc', [DocumentoRucController::class, 'DocumentoRuc'])->name('consultar-documentoruc');
Route::get('/consultar-placa', [ConsultaPlacaController::class, 'documentoplaca'])->name('consultar-placa');

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

    Route::get('/reporteconsu', [ReporteConsultaController::class, 'index'])->name('reportesconsu.index')->middleware('role:superadministrador,admin');
    Route::get('/reportes-consultas/formulario', [ReporteConsultaController::class, 'mostrarFormulario'])->name('reportesconsu.formulario')->middleware('role:superadministrador,admin');
    Route::post('/reportes-consultas/guardar-reporte', [ReporteConsultaController::class, 'guardarReporte'])->name('reportesconsu.guardar-reporte')->middleware('role:superadministrador,admin');
    Route::get('/listadoreportes', [ListadoReportesController::class, 'index'])->name('listadoreportes.index')->middleware('role:superadministrador,admin');

    //consulta placa
    Route::get('/consulta', [ConsultaController::class, 'index'])->name('consulta.index');
    Route::post('/consulta/guardar', [ConsultaController::class, 'guardarDatos'])->name('consulta.guardar')->middleware('role:superadministrador,admin,jefesucursal');
   
    //listado de roles
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index')->middleware('role:superadministrador');
    Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show')->middleware('role:superadministrador');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy')->middleware('role:superadministrador');
    Route::get('user/{userId}/activity', [ActivityLogController::class, 'showUserActivity'])->name('user.activity');
    Route::put('/usuarios/{id}/roles', [UserController::class, 'cambiarRoles'])->name('cambiarRoles')->middleware('role:superadministrador');

    // routes/web.php
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index')->middleware('role:superadministrador');

    Route::delete('/usuarios/{id}', [UserController::class, 'eliminarUsuario'])->name('eliminarUsuario')->middleware('role:superadministrador');

    //listado jefe sucursal
    Route::get('/listado', [SucursalController::class, 'index'])->name('listado')->middleware('role:superadministrador,admin,jefesucursal');

    //CRUD de jefe sucursal
    Route::put('/editar/{id}', [SucursalController::class, 'update'])->name('sucursales.update')->middleware('role:superadministrador,admin,jefesucursal');
    Route::put('/actualizar-jefe-sucursal/{id}', [SucursalController::class, 'update'])->name('actualizar-jefe-sucursal')->middleware('role:superadministrador,admin,jefesucursal');
    Route::get('/jefe-sucursal/{id}', [SucursalController::class, 'mostrarDetalles'])->name('mostrar-detalles')->middleware('role:superadministrador,admin,jefesucursal');
    Route::get('/mostrar-crear', [SucursalController::class, 'mostrarCrear'])->name('mostrar-crear')->middleware('role:superadministrador,admin,jefesucursal');
    Route::get('/crear', [SucursalController::class, 'create'])->name('crear-jefe-sucursal')->middleware('role:superadministrador,admin,jefesucursal');
    Route::get('/eliminar/{id}', 'SucursalController@eliminar')->name('eliminar')->middleware('role:superadministrador,admin,jefesucursal');
    
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
    
    //detalles
    Route::get('/resultado-consultar-documentodni', [DocumentoDniController::class, 'consultardocumentoDni'])->name('resultado-consultar-documentodni');
    Route::get('/consultar-documentodni', [DocumentoDniController::class, 'consultardocumentoDni'])->name('consultar-documentodni');
    Route::get('/historial-actividades', [DocumentoDniController::class, 'historialActividades'])->name('historial-actividades')->middleware('role:superadministrador');
    Route::get('/historial-consultas', [DocumentoDniController::class, 'historialActividades'])->name('historial-consultas');

    //historial genereal
    Route::get('/actividades-generales', [ActivityLogGeneralController::class, 'index'])->name('actividades-generales.index')->middleware('role:superadministrador');

    //sucu listado
    Route::get('sucu/listado', 'App\Http\Controllers\SucursalController@listado')->name('sucursal.listado')->middleware('role:superadministrador,jefesucursal');

    //ver reportes    
    Route::get('/sucu/reportes/{id}', [SucursalController::class, 'reportes'])->name('jefe.reportes')->middleware('role:superadministrador,jefesucursal');

    //reportes jefe sucursal
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index')->middleware('role:superadministrador,jefesucursal');
    Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store')->middleware('role:superadministrador,jefesucursal');
    Route::get('reporte_jefesucu', [ReporteController::class, 'index'])->name('reportes.index')->middleware('role:superadministrador,jefesucursal');
    Route::get('reportes', [ReporteController::class, 'index'])->name('reportes.index')->middleware('role:superadministrador,jefesucursal');
    
    //reporte sicusal
    Route::get('jefes/{id_jefe}/reportes', [ReporteController::class, 'create'])->name('jefe.reportes')->middleware('role:superadministrador,jefesucursal');
    Route::post('jefes/{id_jefe}/reportes', [ReporteController::class, 'store'])->name('reportes.store')->middleware('role:superadministrador,jefesucursal');
    Route::get('/reportes/{id}', [ReporteController::class, 'show'])->name('reportes.show')->middleware('role:superadministrador,jefesucursal');

    //vehiculos
    Route::get('/vehiculos-placas', [VehiculosPlacasController::class, 'index'])->name('vehiculos-placas')->middleware('role:superadministrador');
    Route::get('/registrar-vehiculo', [VehiculosPlacasController::class, 'create'])->name('registrar-vehiculo')->middleware('role:superadministrador');
    Route::post('/guardar_vehiculo', [VehiculosPlacasController::class, 'store'])->name('guardar_vehiculo')->middleware('role:superadministrador');
    Route::get('/vehiculos-placas/editar/{id}', [VehiculosPlacasController::class, 'edit'])->name('editar_registro')->middleware('role:superadministrador');
    Route::put('/vehiculos/{id}', [VehiculosPlacasController::class, 'update'])->name('actualizar_vehiculo')->middleware('role:superadministrador');
    Route::delete('/vehiculos-placas/eliminar/{id}', [VehiculosPlacasController::class, 'destroy'])->name('eliminar_vehiculo')->middleware('role:superadministrador');


    Route::match( ['get', 'post'],'ventas', [VentasController::class, 'index'])->name('ventas.index');
    Route::post('/ventas', [VentasController::class, 'store'])->name('ventas.store');








});
// Ruta para la autenticación
require __DIR__.'/auth.php';