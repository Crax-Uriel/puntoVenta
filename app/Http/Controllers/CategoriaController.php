<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));

    }

    
    public function create()
    {
        return view('admin.categorias.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:35|unique:categorias|string',
            'descripcion_categoria' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:150|string',
        ]);

        Categoria::create($request->all());
        return redirect()->route('admin.categorias.index')->with('mensaje','Se registro la categoria del producto de manera correcta')->with('icono','success');


    }

    
    public function show( $id)
    {
        $categoria =Categoria::findorFail($id);
        return view('admin.categorias.show', compact('categoria'));
    }

    
    public function edit($id)
    {
        $categoria =Categoria::findorFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    
    public function update(Request $request,  $id)
    {
        $categoria = Categoria::find($id);
        $request->validate([
            'nombre_categoria' =>'required|max:35|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50|unique:categorias,nombre_categoria,'.$id,
            'descripcion_categoria' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:150',
        ]);

        /*$categoria->nombre_categoria= $request->nombre_categoria;
        $categoria->descripcion_categoria= $request->descripcion_categoria;
        $categoria->save(); */
        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index')->with('mensaje','Se actualizo la categoria de manera correcta')->with('icono','success');

    }

    public function confirmDelete($id){
        $categoria = Categoria::find($id);
        return view('admin.categorias.delete',compact('categoria'));
    } 

    
    public function destroy( $id)
    {
        $categoria = Categoria::find($id); 
         // Verificamos si la categoría tiene productos asociados 
        if ($categoria->productos()->count() > 0) { 
            return redirect()->route('admin.categorias.index')
            ->with('mensaje', 'No se puede eliminar la categoría porque tiene productos asociados')
            ->with('icono', 'error');
        } 
        // Si no tiene productos asociados, eliminar la categoría 
        Categoria::destroy($id);
        return redirect()->route('admin.categorias.index')
        ->with('mensaje', 'Se eliminó la categoría de la manera correcta')
        ->with('icono', 'success'); 

        
        //Categoria::destroy($id);
        //return redirect()->route('admin.categorias.index')->with('mensaje','Se elimino la categorias de manera correcta')->with('icono','success');
    }
}
