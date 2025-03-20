<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\PDF;


class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();
        return view('admin.productos.index', compact('productos'));
    }

    
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.create',compact('categorias'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'codigo_producto' =>'required|regex:/^[A-Za-z0-9\s]+$/|max:35|unique:productos,codigo_producto|string',
            'nombre_producto' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:35|string',
            'descripcion_producto' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:150|string',
            'stock_producto' =>'required|numeric|min:1',
            'stock_minimo_producto' =>'required|numeric|min:1',
            'stock_maximo_producto' =>'required|numeric|min:1',
            'costo_producto' =>'required|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'precio_producto' =>'required|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'fecha_ingreso_producto' => 'required|date',
        ]);

        $producto = new Producto();
        $producto->codigo_producto = $request->codigo_producto;
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion_producto = $request->descripcion_producto;
        $producto->stock_producto = $request->stock_producto;
        $producto->stock_minimo_producto = $request->stock_minimo_producto;
        $producto->stock_maximo_producto = $request->stock_maximo_producto;
        $producto->costo_producto = $request->costo_producto;
        $producto->precio_producto = $request->precio_producto;
        $producto->fecha_ingreso_producto = $request->fecha_ingreso_producto;
        $producto->categoria_id = $request->categoria_id;
        
        if ($request->hasFile ('imagen')){
            $producto->imagen =$request->file('imagen')->store('productos','public');
        }
        $producto->save();

        return redirect()->route('admin.productos.index')->with('mensaje','Se registro la categoria del producto de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $producto =Producto::findorFail($id);
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        $producto =Producto::findorFail($id);
        $categorias = Categoria::all();
        return view('admin.productos.edit', compact('categorias','producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $producto =Producto::findorFail($id);

        $request->validate([
            'codigo_producto' =>'required|regex:/^[A-Za-z0-9\s]+$/|max:35|string|unique:productos,codigo_producto,'.$id,
            'nombre_producto' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:35|string',
            'descripcion_producto' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:150|string',
            'stock_producto' =>'required|numeric|min:1',
            'stock_minimo_producto' =>'required|numeric|min:1',
            'stock_maximo_producto' =>'required|numeric|min:1',
            'costo_producto' =>'required|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'precio_producto' =>'required|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'fecha_ingreso_producto' => 'required|date',
            'categoria_id' =>'required',
        ]);

        $producto->codigo_producto = $request->codigo_producto;
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion_producto = $request->descripcion_producto;
        $producto->stock_producto = $request->stock_producto;
        $producto->stock_minimo_producto = $request->stock_minimo_producto;
        $producto->stock_maximo_producto = $request->stock_maximo_producto;
        $producto->costo_producto = $request->costo_producto;
        $producto->precio_producto = $request->precio_producto;
        $producto->fecha_ingreso_producto = $request->fecha_ingreso_producto;
        $producto->categoria_id = $request->categoria_id;

        if ($request->hasFile ('imagen')){
            Storage::delete(['public/'.$producto->imagen]);
            $producto->imagen =$request->file('imagen')->store('productos','public');
        }

        $producto->save();

        return redirect()->route('admin.productos.index')->with('mensaje','Se actulizo el producto de manera correcta')->with('icono','success');

    }

    public function confirmDelete($id){
        $categorias = Categoria::all();
        $producto =Producto::findorFail($id);
        return view('admin.productos.delete',compact('producto','categorias'));
    } 


    public function destroy( $id)
    {

        
        $producto =Producto::findorFail($id);
        Producto::destroy($id);
        Storage::delete(['public/'.$producto->imagen]);
        return redirect()->route('admin.productos.index')->with('mensaje','Se elimino el producto de manera correcta')->with('icono','success');
    }

    public function reporte() {
        $productos = Producto::all();
        $pdf = PDF::loadView('admin.productos.reporte', compact('productos'));
        return $pdf->stream();
    }
}
