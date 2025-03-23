<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permisos = Permission::all();
        return view('admin.permisos.index',compact('permisos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:35|unique:permissions,name|string',
        ]);

        Permission::create(['name' =>$request->name]);

        return redirect()->route('admin.permisos.index')->with('mensaje','Se registro el permiso  de la manera correcta')->with('icono','success');

    }

    public function show( $id)
    {
        $permiso =Permission::findorFail($id);
        return view('admin.permisos.show', compact('permiso'));
    }

    
    public function edit($id)
    {
        $permiso =Permission::findorFail($id);
        return view('admin.permisos.edit', compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
        $permiso =Permission::findorFail($id);
        $request->validate([
            'name' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:35|unique:permissions,name,'.$id,
        ]);

        $permiso->update(['name' =>$request->name]);

        return redirect()->route('admin.permisos.index')->with('mensaje','Se actualizo el permiso  de la manera correcta')->with('icono','success');



    }

    public function confirmDelete($id){
        $permiso =Permission::findorFail($id);
        return view('admin.permisos.delete',compact('permiso'));
    } 


    public function destroy( $id)
    {
        
        $permiso =Permission::findorFail($id);
        $permiso->delete();
        return redirect()->route('admin.permisos.index')->with('mensaje','Se elimino el permiso  de la manera correcta')->with('icono','success');
    }
}
