<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\TmpVenta;
use App\Models\Venta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with('detallesVenta','cliente')->get();
        return view('admin.ventas.index', compact('ventas'));
        //return view('admin.ventas.index','ventas');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $productos = Producto::all();
        $clientes = Cliente::all();
        $session_id = session()->getId();
        $tmp_Ventas = TmpVenta::where('session_id',$session_id)->get();
        return view('admin.ventas.create',compact('productos','clientes','tmp_Ventas'));
    }

    public function cliente_store(Request $request)
    {
        //
        $validate = $request->validate([
            'nombre_cliente' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50',
            'apellido_paterno_cliente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno_cliente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'rfc' => 'required|string|max:13|min:13|unique:clientes,rfc',
            'telefono_cliente' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'correo_electronico' => 'required|string|email|max:200|unique:clientes,correo_electronico',  
        ]);

        /*$cliente = new Cliente();
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->apellido_paterno_cliente = $request->apellido_paterno_cliente;
        $cliente->apellido_materno_cliente = $request->apellido_materno_cliente;
        $cliente->rfc = $request->rfc;
        $cliente->telefono_cliente = $request->telefono_cliente;
        $cliente->correo_electronico = $request->correo_electronico;
        $cliente->save(); */

        Cliente::create($request->all());
        return response()->json(['success'=>'El cliente fue registrado']);

    }
    
    public function store(Request $request)
    {
        /*$datos = request()->all();
        return response()->json($datos);*/
        $request->validate([
            'fecha_venta' =>'required|date',
            'cliente_id' =>'nullable',
            'precio_total' => 'required|numeric'
        ]);

        $venta = new Venta();
        $venta->fecha_venta = $request->fecha_venta;
        $venta->precio_total = $request->precio_total;
        $venta ->cliente_id = $request->cliente_id;
        $venta->save(); 
        $session_id = session()->getId();

        $tmp_Ventas = TmpVenta::where('session_id',$session_id)->get();
        
        foreach ($tmp_Ventas as $tmp_Venta) {
            $producto = Producto::where('id',$tmp_Venta->producto_id)->first();
            $detalle_venta= new DetalleVenta();
            $detalle_venta ->cantidad_compra = $tmp_Venta->cantidad_compra;
            //$detalle_compra ->precio_compra = $producto->costo_producto;
            $detalle_venta ->venta_id = $venta->id;
            $detalle_venta ->producto_id = $tmp_Venta->producto_id;
            
            $detalle_venta->save();

            $producto->stock_producto -=  $tmp_Venta->cantidad_compra;
            $producto->save();
    
        }

        TmpVenta::where('session_id',$session_id )->delete();

        return redirect()->route('admin.ventas.index')->with('mensaje','Se registro la venta de manera correcta')->with('icono','success');

    }

    public function pdf($id){
        $venta =Venta::with('detallesVenta','cliente')->findorFail($id);
        $pdf = PDF::loadView('admin.ventas.pdf',compact('venta'));
        return $pdf->stream();
        //return view('admin.ventas.pdf');
    }

    
    public function show( $id)
    {
        //
        $venta =Venta::with('detallesVenta','cliente')->findorFail($id);
        return view('admin.ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $venta =Venta::with('detallesVenta','cliente')->findorFail($id);
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('admin.ventas.edit',compact('productos','clientes','venta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'fecha_venta' =>'required|date',
            'cliente_id' =>'nullable',
            'precio_total' => 'required|numeric'
        ]);

        $venta = Venta::find($id);
        $venta->fecha_venta = $request->fecha_venta;
        $venta->precio_total = $request->precio_total;
        $venta ->cliente_id = $request->cliente_id;
        $venta->save(); 

        return redirect()->route('admin.ventas.index')->with('mensaje','Se actulizo la venta de manera correcta')->with('icono','success');

    }

    public function confirmDelete($id){
        $venta = Venta::with('detallesVenta','cliente')->findorFail($id);
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('admin.ventas.delete',compact('venta','productos','clientes'));
    } 

    public function destroy( $id)
    {
        //
        $venta = Venta::find($id);
        foreach($venta->detallesVenta as $detalle){
            $producto= Producto::find($detalle->producto_id);
            $producto->stock_producto +=$detalle->cantidad_compra;
            $producto->save();
        }
        $venta->detallesVenta()->delete();
        Venta::destroy($id);
        return redirect()->route('admin.ventas.index')->with('mensaje','Se elimino la venta de manera correcta')->with('icono','success');
    }

    
}
