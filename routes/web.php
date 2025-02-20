<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//rutas patra las empresas  
Route::controller(EmpresaController::class)->middleware('auth')->group(function(){
    Route::get('/admin/empresas', 'index')->name('admin.empresas.index');
    Route::get('/admin/empresas/create', 'create')->name('admin.empresas.create');
    Route::post('/admin/empleados/create',  'store')->name('admin.empresas.store');
    Route::get('/admin/empleados/{id}','show')->name('admin.empresas.show');
    Route::get('/admin/empleados/{id}/edit',  'edit')->name('admin.empresas.edit');
    Route::put('/admin/empleados/{id}', 'update')->name('admin.empresas.update');
    Route::get('/admin/empleados/{id}/confirm-delete', 'confirmDelete')->name('admin.empresas.confirmDelete');
    Route::delete('/admin/empleados/{id}', 'destroy')->name('admin.empresas.destroy');
});



