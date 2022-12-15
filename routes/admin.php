<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\CotizacionesController;



// Route::get('admin', function (){
//     return view('admin.home');
// })->name('admin.home');




// Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
//pdf
Route::get('compras/pdf/{compra}', [ComprasController::class, 'pdf'])->name('compras.pdf');

Route::get('ventas/pdf/{venta}', [VentasController::class, 'pdf'])->name('ventas.pdf');

Route::get('cotizaciones/pdf/{cotizacion}', [CotizacionesController::class, 'pdf'])->name('cotizaciones.pdf');
//subir archivos
Route::get('compras/subir/{compra}', [ComprasController::class, 'subir'])->name('subir.compras');

//Cambiar Estado producctos
Route::get('cambiar_estado/productos/{producto}', [ProductoController::class, 'cambiar_estado'])->name('cambiar.estado.productos');

//Cambiar Estado compras
Route::get('cambiar_estado/compras/{compra}', [ComprasController::class, 'cambiar_estado'])->name('cambiar.estado.compras');

//Cambiar Estado ventas
Route::get('cambiar_estado/ventas/{venta}', [VentasController::class, 'cambiar_estado'])->name('cambiar.estado.ventas');

// cambiar Estado cotizaciones
Route::get('cambiar_estado/cotizaciones/{cotizacion}', [CotizacionesController::class, 'cambiar_estado'])->name('cambiar.estado.cotizaciones');

//reportes por dia
Route::get('ventas/reportes_dia', [ReporteController::class, 'reportes_dia'])->name('reportes.dia');

//reportes por fecha, tipo post para enviar fecha actual y fecha desde que se quiere tomar el registro
Route::get('ventas/reportes_fecha', [ReporteController::class, 'reportes_fecha'])->name('reportes.fecha');

//para hacer consulta usaremos post
Route::post('ventas/reporte_resultado', [ReporteController::class, 'reporte_resultado'])->name('reporte.resultado');


Route::resource('categorias', CategoriaController::class)->names('categorias');
Route::resource('clientes', ClienteController::class)->names('clientes');
Route::resource('productos', ProductoController::class)->names('productos');
Route::resource('proveedores', ProveedorController::class)->names('proveedores');
Route::resource('compras', ComprasController::class)->names('compras');
Route::resource('ventas', VentasController::class)->names('ventas');
Route::resource('cotizaciones', CotizacionesController::class)->names('cotizaciones');



Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users'); //stamos diciendo que solo nos cree esas tres rutas


Route::get('prueba', function (){
    return view('prueba');
});


Route::resource('user', UserController::class);

