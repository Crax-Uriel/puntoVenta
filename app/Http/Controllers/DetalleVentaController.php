<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function store(Request $request)
    {
        $producto= Producto::where('codigo_producto',$request->codigo_producto)->first();
        $venta_id = $request->venta_id;

        if ($producto){
            $detalle_Venta_existe = DetalleVenta::where('producto_id',$producto->id)->where('venta_id',$venta_id)->first();

            if($detalle_Venta_existe){
                $detalle_Venta_existe->cantidad_compra +=$request->cantidad_compra;
                $detalle_Venta_existe->save();
                $producto->stock_producto -= $request->cantidad_compra;
                $producto->save();

                return response()->json(['success'=>true, 'message'=>'El producto fue encontrado']);
            }else{
                $detalle_venta = new DetalleVenta();
                $detalle_venta->cantidad_compra = $request->cantidad_compra;
                $detalle_venta->venta_id = $venta_id;
                $detalle_venta->producto_id = $producto->id;
                $detalle_venta->save();
                $producto->stock_producto -= $request->cantidad_compra;
                $producto->save();
                return response()->json(['success'=>true, 'message'=>'El producto fue encontrado']);
            }
            

        }else{
            
            return response()->json(['success'=>false, 'message' => 'Producto no encontrado']);
            
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

   
    /**
     * Display the specified resource.
     */
    public function show(DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        
        $detalleVenta = DetalleVenta::find($id);
        $producto = Producto::find($detalleVenta->producto_id);

        $producto->stock_producto += $detalleVenta->cantidad_compra;
        $producto->save();

        DetalleVenta::destroy($id);
        
        //return redirect()->route('admin.compras.index')->with('mensaje','Se elimino la compra de manera correcta')->with('icono','success');

        
        
        return response()->json(['success'=>true]);
    }
}
