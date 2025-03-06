<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TmpCompraController;
use App\Http\Controllers\UsuarioController;
use App\Models\DetalleCompra;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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


