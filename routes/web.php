<?php

use App\Http\Controllers\ArqueoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TmpCompraController;
use App\Http\Controllers\TmpVentaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use App\Models\DetalleCompra;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//rutas patra las empresas  
Route::controller(EmpresaController::class)->middleware('auth')->group(function(){
    //Route::get('/admin/empresas/{pais}', 'buscar_pais')->name('admin.empresas.buscar.pais');
    Route::get('/admin/empresas', 'index')->name('admin.empresas.index');
    Route::get('/admin/empresas/create', 'create')->name('admin.empresas.create');
    Route::post('/admin/empleados/create',  'store')->name('admin.empresas.store');
    Route::get('/admin/empleados/{id}','show')->name('admin.empresas.show');
    Route::get('/admin/empleados/{id}/edit',  'edit')->name('admin.empresas.edit');
    Route::put('/admin/empleados/{id}', 'update')->name('admin.empresas.update');
    Route::get('/admin/empleados/{id}/confirm-delete', 'confirmDelete')->name('admin.empresas.confirmDelete');
    Route::delete('/admin/empleados/{id}', 'destroy')->name('admin.empresas.destroy');
});

//rutas para roles
Route::controller(RoleController::class)->middleware('auth')->group(function(){
    Route::get('/admin/roles', 'index')->name('admin.roles.index');
    Route::get('/admin/roles/reporte', 'reporte')->name('admin.roles.reporte');

    Route::get('/admin/roles/create', 'create')->name('admin.roles.create');
    Route::post('/admin/roles/create',  'store')->name('admin.roles.store');
    Route::get('/admin/roles/{id}','show')->name('admin.roles.show');
    Route::get('/admin/roles/{id}/edit',  'edit')->name('admin.roles.edit');
    Route::put('/admin/roles/{id}', 'update')->name('admin.roles.update');
    Route::get('/admin/roles/{id}/confirm-delete', 'confirmDelete')->name('admin.roles.confirmDelete');
    Route::delete('/admin/roles/{id}', 'destroy')->name('admin.roles.destroy');
});


//rutas para usuarios
Route::controller(UsuarioController::class)->middleware('auth')->group(function(){
    Route::get('/admin/usuarios', 'index')->name('admin.usuarios.index');
    Route::get('/admin/usuarios/reporte', 'reporte')->name('admin.usuarios.reporte');

    Route::get('/admin/usuarios/create', 'create')->name('admin.usuarios.create');
    Route::post('/admin/usuarios/create',  'store')->name('admin.usuarios.store');
    Route::get('/admin/usuarios/{id}','show')->name('admin.usuarios.show');
    Route::get('/admin/usuarios/{id}/edit',  'edit')->name('admin.usuarios.edit');
    Route::put('/admin/usuarios/{id}', 'update')->name('admin.usuarios.update');
    Route::get('/admin/usuarios/{id}/confirm-delete', 'confirmDelete')->name('admin.usuarios.confirmDelete');
    Route::delete('/admin/usuarios/{id}', 'destroy')->name('admin.usuarios.destroy');
});


//rutas para categorias
Route::controller(CategoriaController::class)->middleware('auth')->group(function(){
    Route::get('/admin/categorias', 'index')->name('admin.categorias.index');
    Route::get('/admin/categorias/reporte', 'reporte')->name('admin.categorias.reporte');

    Route::get('/admin/categorias/create', 'create')->name('admin.categorias.create');
    Route::post('/admin/categorias/create',  'store')->name('admin.categorias.store');
    Route::get('/admin/categorias/{id}','show')->name('admin.categorias.show');
    Route::get('/admin/categorias/{id}/edit',  'edit')->name('admin.categorias.edit');
    Route::put('/admin/categorias/{id}', 'update')->name('admin.categorias.update');
    Route::get('/admin/categorias/{id}/confirm-delete', 'confirmDelete')->name('admin.categorias.confirmDelete');
    Route::delete('/admin/categorias/{id}', 'destroy')->name('admin.categorias.destroy');
});

//rutas para productos
Route::controller(ProductoController::class)->middleware('auth')->group(function(){
    Route::get('/admin/productos', 'index')->name('admin.productos.index');
    Route::get('/admin/productos/reporte', 'reporte')->name('admin.productos.reporte');

    Route::get('/admin/productos/create', 'create')->name('admin.productos.create');
    Route::post('/admin/productos/create',  'store')->name('admin.productos.store');
    Route::get('/admin/productos/{id}','show')->name('admin.productos.show');
    Route::get('/admin/productos/{id}/edit',  'edit')->name('admin.productos.edit');
    Route::put('/admin/productos/{id}', 'update')->name('admin.productos.update');
    Route::get('/admin/productos/{id}/confirm-delete', 'confirmDelete')->name('admin.productos.confirmDelete');
    Route::delete('/admin/productos/{id}', 'destroy')->name('admin.productos.destroy');
});


//rutas para proveedores
Route::controller(ProveedorController::class)->middleware('auth')->group(function(){
    Route::get('/admin/proveedores', 'index')->name('admin.proveedores.index');
    Route::get('/admin/proveedores/reporte', 'reporte')->name('admin.proveedores.reporte');

    Route::get('/admin/proveedores/create', 'create')->name('admin.proveedores.create');
    Route::post('/admin/proveedores/create',  'store')->name('admin.proveedores.store');
    Route::get('/admin/proveedores/{id}','show')->name('admin.proveedores.show');
    Route::get('/admin/proveedores/{id}/edit',  'edit')->name('admin.proveedores.edit');
    Route::put('/admin/proveedores/{id}', 'update')->name('admin.proveedores.update');
    Route::get('/admin/proveedores/{id}/confirm-delete', 'confirmDelete')->name('admin.proveedores.confirmDelete');
    Route::delete('/admin/proveedores/{id}', 'destroy')->name('admin.proveedores.destroy');
});


//rutas para compras
Route::controller(CompraController::class)->middleware('auth')->group(function(){
    Route::get('/admin/compras', 'index')->name('admin.compras.index');
    Route::get('/admin/compras/reporte', 'reporte')->name('admin.compras.reporte');
    Route::get('/admin/compras/create', 'create')->name('admin.compras.create');
    Route::post('/admin/compras/create',  'store')->name('admin.compras.store');
    Route::get('/admin/compras/{id}','show')->name('admin.compras.show');
    Route::get('/admin/compras/{id}/edit',  'edit')->name('admin.compras.edit');
    Route::put('/admin/compras/{id}', 'update')->name('admin.compras.update');
    Route::get('/admin/compras/{id}/confirm-delete', 'confirmDelete')->name('admin.compras.confirmDelete');
    Route::delete('/admin/compras/{id}', 'destroy')->name('admin.compras.destroy');
});

//rutas para las compras temporales tmp_compras
Route::controller(TmpCompraController::class)->middleware('auth')->group(function(){
    Route::post('/admin/compras/create/tmp',  'tmp_compras')->name('admin.compras.tmp_compras');
    Route::delete('/admin/compras/create/tmp/{id}', 'destroy')->name('admin.compras.tmp_compras.destroy');
    
});

//rutas para detalle de la compras 
Route::controller(DetalleCompraController::class)->middleware('auth')->group(function(){
    Route::post('/admin/compras/detalle/create', 'store')->name('admin.detalle.compras.store');
    Route::delete('/admin/compras/detalle/{id}', 'destroy')->name('admin.detalle.compras.destroy');
});


//rutas para clientes
Route::controller(ClienteController::class)->middleware('auth')->group(function(){
    Route::get('/admin/clientes', 'index')->name('admin.clientes.index');
    Route::get('/admin/clientes/reporte', 'reporte')->name('admin.clientes.reporte');

    Route::get('/admin/clientes/create', 'create')->name('admin.clientes.create');
    Route::post('/admin/clientes/create',  'store')->name('admin.clientes.store');
    Route::get('/admin/clientes/{id}','show')->name('admin.clientes.show');
    Route::get('/admin/clientes/{id}/edit',  'edit')->name('admin.clientes.edit');
    Route::put('/admin/clientes/{id}', 'update')->name('admin.clientes.update');
    Route::get('/admin/clientes/{id}/confirm-delete', 'confirmDelete')->name('admin.clientes.confirmDelete');
    Route::delete('/admin/clientes/{id}', 'destroy')->name('admin.clientes.destroy');
});


//rutas para ventas

Route::controller(VentaController::class)->middleware('auth')->group(function(){
    Route::get('/admin/ventas', 'index')->name('admin.ventas.index');
    Route::get('/admin/ventas/reporte', 'reporte')->name('admin.ventas.reporte');

    Route::get('/admin/ventas/create', 'create')->name('admin.ventas.create');
    Route::post('/admin/ventas/create',  'store')->name('admin.ventas.store');

    Route::get('/admin/ventas/pdf/{id}','pdf')->name('admin.ventas.pdf');

    Route::get('/admin/ventas/{id}','show')->name('admin.ventas.show');
    Route::get('/admin/ventas/{id}/edit',  'edit')->name('admin.ventas.edit');
    Route::put('/admin/ventas/{id}', 'update')->name('admin.ventas.update');
    Route::get('/admin/ventas/{id}/confirm-delete', 'confirmDelete')->name('admin.ventas.confirmDelete');
    Route::delete('/admin/ventas/{id}', 'destroy')->name('admin.ventas.destroy');
    Route::post('/admin/ventas/cliente/create',  'cliente_store')->name('admin.ventas.cliente.store');

});


//rutas para las ventas temporales tmp_ventas
Route::controller(TmpVentaController::class)->middleware('auth')->group(function(){
    Route::post('/admin/ventas/create/tmp',  'tmp_ventas')->name('admin.ventas.tmp_ventas');
    Route::delete('/admin/ventas/create/tmp/{id}', 'destroy')->name('admin.ventas.tmp_ventas.destroy');
    
});

//rutas para detalle de la ventas 
Route::controller(DetalleVentaController::class)->middleware('auth')->group(function(){
    Route::post('/admin/ventas/detalle/create', 'store')->name('admin.detalle.ventas.store');
    Route::delete('/admin/ventas/detalle/{id}', 'destroy')->name('admin.detalle.ventas.destroy');
});



//tuta para el inenatrio
Route::controller(InventarioController::class)->middleware('auth')->group(function(){
    Route::get('/admin/inventarios', 'index')->name('admin.inventarios.index');
    Route::get('/admin/inventarios/reporte', 'reporte')->name('admin.inventarios.reporte');

    
});


//rutas para arqueos

Route::controller(ArqueoController::class)->middleware('auth')->group(function(){
    Route::get('/admin/arqueos', 'index')->name('admin.arqueos.index');
    Route::get('/admin/arqueos/reporte', 'reporte')->name('admin.arqueos.reporte');

    Route::get('/admin/arqueos/create', 'create')->name('admin.arqueos.create');
    Route::post('/admin/arqueos/create',  'store')->name('admin.arqueos.store');
    Route::get('/admin/arqueos/{id}','show')->name('admin.arqueos.show');
    Route::get('/admin/arqueos/{id}/edit',  'edit')->name('admin.arqueos.edit');

    Route::get('/admin/arqueos/{id}/ingreso-egreso',  'ingresoegreso')->name('admin.arqueos.ingresoegreso');
    Route::post('/admin/arqueos/create_ingresos_egresos',  'store_ingresos_egresos')->name('admin.arqueos.store_ingresos_egresos');

    Route::get('/admin/arqueos/{id}/cierre',  'cierre')->name('admin.arqueos.cierre');
    Route::post('/admin/arqueos/create_cierre',  'store_cierre')->name('admin.arqueos.store_cierre');


    Route::put('/admin/arqueos/{id}', 'update')->name('admin.arqueos.update');
    Route::get('/admin/arqueos/{id}/confirm-delete', 'confirmDelete')->name('admin.arqueos.confirmDelete');
    Route::delete('/admin/arqueos/{id}', 'destroy')->name('admin.arqueos.destroy');

    

});

