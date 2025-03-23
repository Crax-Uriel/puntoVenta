<?php

use App\Http\Controllers\ArqueoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PermisoController;
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
    Route::get('/admin/roles', 'index')->name('admin.roles.index')->middleware('can:Roles');
    Route::get('/admin/roles/reporte', 'reporte')->name('admin.roles.reporte')->middleware('can:Roles');

    Route::get('/admin/roles/create', 'create')->name('admin.roles.create')->middleware('can:Roles');
    Route::post('/admin/roles/create',  'store')->name('admin.roles.store')->middleware('can:Roles');
    Route::get('/admin/roles/{id}','show')->name('admin.roles.show')->middleware('can:Roles');
    Route::get('/admin/roles/{id}/edit',  'edit')->name('admin.roles.edit')->middleware('can:Roles');
    Route::put('/admin/roles/{id}', 'update')->name('admin.roles.update')->middleware('can:Roles');

    Route::get('/admin/roles/{id}/asignar',  'asignar')->name('admin.roles.asignar')->middleware('can:Roles');
    Route::put('/admin/roles/asignar/{id}', 'update_asignar')->name('admin.roles.update_asignar')->middleware('can:Roles');


    Route::get('/admin/roles/{id}/confirm-delete', 'confirmDelete')->name('admin.roles.confirmDelete')->middleware('can:Roles');
    Route::delete('/admin/roles/{id}', 'destroy')->name('admin.roles.destroy')->middleware('can:Roles');
});


//rutas para usuarios
Route::controller(UsuarioController::class)->middleware('auth')->group(function(){
    Route::get('/admin/usuarios', 'index')->name('admin.usuarios.index')->middleware('can:Usuarios');
    Route::get('/admin/usuarios/reporte', 'reporte')->name('admin.usuarios.reporte')->middleware('can:Usuarios');

    Route::get('/admin/usuarios/create', 'create')->name('admin.usuarios.create')->middleware('can:Usuarios');
    Route::post('/admin/usuarios/create',  'store')->name('admin.usuarios.store')->middleware('can:Usuarios');
    Route::get('/admin/usuarios/{id}','show')->name('admin.usuarios.show')->middleware('can:Usuarios');
    Route::get('/admin/usuarios/{id}/edit',  'edit')->name('admin.usuarios.edit')->middleware('can:Usuarios');
    Route::put('/admin/usuarios/{id}', 'update')->name('admin.usuarios.update')->middleware('can:Usuarios');
    Route::get('/admin/usuarios/{id}/confirm-delete', 'confirmDelete')->name('admin.usuarios.confirmDelete')->middleware('can:Usuarios');
    Route::delete('/admin/usuarios/{id}', 'destroy')->name('admin.usuarios.destroy')->middleware('can:Usuarios');
});


//rutas para categorias
Route::controller(CategoriaController::class)->middleware('auth')->group(function(){
    Route::get('/admin/categorias', 'index')->name('admin.categorias.index')->middleware('can:Categorias');
    Route::get('/admin/categorias/reporte', 'reporte')->name('admin.categorias.reporte')->middleware('can:Categorias');

    Route::get('/admin/categorias/create', 'create')->name('admin.categorias.create')->middleware('can:Categorias');
    Route::post('/admin/categorias/create',  'store')->name('admin.categorias.store')->middleware('can:Categorias');
    Route::get('/admin/categorias/{id}','show')->name('admin.categorias.show')->middleware('can:Categorias');
    Route::get('/admin/categorias/{id}/edit',  'edit')->name('admin.categorias.edit')->middleware('can:Categorias');
    Route::put('/admin/categorias/{id}', 'update')->name('admin.categorias.update')->middleware('can:Categorias');
    Route::get('/admin/categorias/{id}/confirm-delete', 'confirmDelete')->name('admin.categorias.confirmDelete')->middleware('can:Categorias');
    Route::delete('/admin/categorias/{id}', 'destroy')->name('admin.categorias.destroy')->middleware('can:Categorias');
});

//rutas para productos
Route::controller(ProductoController::class)->middleware('auth')->group(function(){
    Route::get('/admin/productos', 'index')->name('admin.productos.index')->middleware('can:Productos');
    Route::get('/admin/productos/reporte', 'reporte')->name('admin.productos.reporte')->middleware('can:Productos');

    Route::get('/admin/productos/create', 'create')->name('admin.productos.create')->middleware('can:Productos');
    Route::post('/admin/productos/create',  'store')->name('admin.productos.store')->middleware('can:Productos');
    Route::get('/admin/productos/{id}','show')->name('admin.productos.show')->middleware('can:Productos');
    Route::get('/admin/productos/{id}/edit',  'edit')->name('admin.productos.edit')->middleware('can:Productos');
    Route::put('/admin/productos/{id}', 'update')->name('admin.productos.update')->middleware('can:Productos');
    Route::get('/admin/productos/{id}/confirm-delete', 'confirmDelete')->name('admin.productos.confirmDelete')->middleware('can:Productos');
    Route::delete('/admin/productos/{id}', 'destroy')->name('admin.productos.destroy')->middleware('can:Productos');
});


//rutas para proveedores
Route::controller(ProveedorController::class)->middleware('auth')->group(function(){
    Route::get('/admin/proveedores', 'index')->name('admin.proveedores.index')->middleware('can:Proveedores');
    Route::get('/admin/proveedores/reporte', 'reporte')->name('admin.proveedores.reporte')->middleware('can:Proveedores');

    Route::get('/admin/proveedores/create', 'create')->name('admin.proveedores.create')->middleware('can:Proveedores');
    Route::post('/admin/proveedores/create',  'store')->name('admin.proveedores.store')->middleware('can:Proveedores');
    Route::get('/admin/proveedores/{id}','show')->name('admin.proveedores.show')->middleware('can:Proveedores');
    Route::get('/admin/proveedores/{id}/edit',  'edit')->name('admin.proveedores.edit')->middleware('can:Proveedores');
    Route::put('/admin/proveedores/{id}', 'update')->name('admin.proveedores.update')->middleware('can:Proveedores');
    Route::get('/admin/proveedores/{id}/confirm-delete', 'confirmDelete')->name('admin.proveedores.confirmDelete')->middleware('can:Proveedores');
    Route::delete('/admin/proveedores/{id}', 'destroy')->name('admin.proveedores.destroy')->middleware('can:Proveedores');
});


//rutas para compras
Route::controller(CompraController::class)->middleware('auth')->group(function(){
    Route::get('/admin/compras', 'index')->name('admin.compras.index')->middleware('can:Compras');
    Route::get('/admin/compras/reporte', 'reporte')->name('admin.compras.reporte')->middleware('can:Compras');
    Route::get('/admin/compras/create', 'create')->name('admin.compras.create')->middleware('can:Compras');
    Route::post('/admin/compras/create',  'store')->name('admin.compras.store')->middleware('can:Compras');
    Route::get('/admin/compras/{id}','show')->name('admin.compras.show')->middleware('can:Compras');
    Route::get('/admin/compras/{id}/edit',  'edit')->name('admin.compras.edit')->middleware('can:Compras');
    Route::put('/admin/compras/{id}', 'update')->name('admin.compras.update')->middleware('can:Compras');
    Route::get('/admin/compras/{id}/confirm-delete', 'confirmDelete')->name('admin.compras.confirmDelete')->middleware('can:Compras');
    Route::delete('/admin/compras/{id}', 'destroy')->name('admin.compras.destroy')->middleware('can:Compras');
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
    Route::get('/admin/clientes', 'index')->name('admin.clientes.index')->middleware('can:Clientes');
    Route::get('/admin/clientes/reporte', 'reporte')->name('admin.clientes.reporte')->middleware('can:Clientes');

    Route::get('/admin/clientes/create', 'create')->name('admin.clientes.create')->middleware('can:Clientes');
    Route::post('/admin/clientes/create',  'store')->name('admin.clientes.store')->middleware('can:Clientes');
    Route::get('/admin/clientes/{id}','show')->name('admin.clientes.show')->middleware('can:Clientes');
    Route::get('/admin/clientes/{id}/edit',  'edit')->name('admin.clientes.edit')->middleware('can:Clientes');
    Route::put('/admin/clientes/{id}', 'update')->name('admin.clientes.update')->middleware('can:Clientes');
    Route::get('/admin/clientes/{id}/confirm-delete', 'confirmDelete')->name('admin.clientes.confirmDelete')->middleware('can:Clientes');
    Route::delete('/admin/clientes/{id}', 'destroy')->name('admin.clientes.destroy')->middleware('can:Clientes');
});


//rutas para ventas

Route::controller(VentaController::class)->middleware('auth')->group(function(){
    Route::get('/admin/ventas', 'index')->name('admin.ventas.index')->middleware('can:Ventas');
    Route::get('/admin/ventas/reporte', 'reporte')->name('admin.ventas.reporte')->middleware('can:Ventas');

    Route::get('/admin/ventas/create', 'create')->name('admin.ventas.create')->middleware('can:Ventas');
    Route::post('/admin/ventas/create',  'store')->name('admin.ventas.store')->middleware('can:Ventas');

    Route::get('/admin/ventas/pdf/{id}','pdf')->name('admin.ventas.pdf')->middleware('can:Ventas');

    Route::get('/admin/ventas/{id}','show')->name('admin.ventas.show')->middleware('can:Ventas');
    Route::get('/admin/ventas/{id}/edit',  'edit')->name('admin.ventas.edit')->middleware('can:Ventas');
    Route::put('/admin/ventas/{id}', 'update')->name('admin.ventas.update')->middleware('can:Ventas');
    Route::get('/admin/ventas/{id}/confirm-delete', 'confirmDelete')->name('admin.ventas.confirmDelete')->middleware('can:Ventas');
    Route::delete('/admin/ventas/{id}', 'destroy')->name('admin.ventas.destroy')->middleware('can:Ventas');
    Route::post('/admin/ventas/cliente/create',  'cliente_store')->name('admin.ventas.cliente.store')->middleware('can:Ventas');

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
    Route::get('/admin/inventarios', 'index')->name('admin.inventarios.index')->middleware('can:Inventario');
    Route::get('/admin/inventarios/reporte', 'reporte')->name('admin.inventarios.reporte')->middleware('can:Inventario');

});


//rutas para arqueos

Route::controller(ArqueoController::class)->middleware('auth')->group(function(){
    Route::get('/admin/arqueos', 'index')->name('admin.arqueos.index')->middleware('can:Arqueos');
    Route::get('/admin/arqueos/reporte', 'reporte')->name('admin.arqueos.reporte')->middleware('can:Arqueos');

    Route::get('/admin/arqueos/create', 'create')->name('admin.arqueos.create')->middleware('can:Arqueos');
    Route::post('/admin/arqueos/create',  'store')->name('admin.arqueos.store')->middleware('can:Arqueos');
    Route::get('/admin/arqueos/{id}','show')->name('admin.arqueos.show')->middleware('can:Arqueos');
    Route::get('/admin/arqueos/{id}/edit',  'edit')->name('admin.arqueos.edit')->middleware('can:Arqueos');

    Route::get('/admin/arqueos/{id}/ingreso-egreso',  'ingresoegreso')->name('admin.arqueos.ingresoegreso')->middleware('can:Arqueos');
    Route::post('/admin/arqueos/create_ingresos_egresos',  'store_ingresos_egresos')->name('admin.arqueos.store_ingresos_egresos')->middleware('can:Arqueos');

    Route::get('/admin/arqueos/{id}/cierre',  'cierre')->name('admin.arqueos.cierre');
    Route::post('/admin/arqueos/create_cierre',  'store_cierre')->name('admin.arqueos.store_cierre')->middleware('can:Arqueos');


    Route::put('/admin/arqueos/{id}', 'update')->name('admin.arqueos.update')->middleware('can:Arqueos');
    Route::get('/admin/arqueos/{id}/confirm-delete', 'confirmDelete')->name('admin.arqueos.confirmDelete')->middleware('can:Arqueos');
    Route::delete('/admin/arqueos/{id}', 'destroy')->name('admin.arqueos.destroy')->middleware('can:Arqueos');

    

});



//rutas para permisos
Route::controller(PermisoController::class)->middleware('auth')->group(function(){
    Route::get('/admin/permisos', 'index')->name('admin.permisos.index')->middleware('can:Permisos');
    //Route::get('/admin/permisos/reporte', 'reporte')->name('admin.permisos.reporte');

    Route::get('/admin/permisos/create', 'create')->name('admin.permisos.create')->middleware('can:Permisos');
    Route::post('/admin/permisos/create',  'store')->name('admin.permisos.store')->middleware('can:Permisos');
    Route::get('/admin/permisos/{id}','show')->name('admin.permisos.show')->middleware('can:Permisos');
    Route::get('/admin/permisos/{id}/edit',  'edit')->name('admin.permisos.edit')->middleware('can:Permisos');
    Route::put('/admin/permisos/{id}', 'update')->name('admin.permisos.update')->middleware('can:Permisos');
    Route::get('/admin/permisos/{id}/confirm-delete', 'confirmDelete')->name('admin.permisos.confirmDelete')->middleware('can:Permisos');
    Route::delete('/admin/permisos/{id}', 'destroy')->name('admin.permisos.destroy')->middleware('can:Permisos');
});

