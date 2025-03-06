<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleCompraController extends Controller
{
    public function store(Request $request)
    {
        $producto= Producto::where('codigo_producto',$request->codigo_producto)->first();
        $compra_id = $request->compra_id;

        if ($producto){
            $detalle_Compra_existe = DetalleCompra::where('producto_id',$producto->id)->where('compra_id',$compra_id)->first();

            if($detalle_Compra_existe){
                $detalle_Compra_existe->cantidad_compra +=$request->cantidad_compra;
                $detalle_Compra_existe->save();
                return response()->json(['success'=>true, 'message'=>'El producto fue encontrado']);
            }else{
                $detalle_Compra = new DetalleCompra();
                $detalle_Compra->cantidad_compra = $request->cantidad_compra;
                $detalle_Compra->compra_id = $compra_id;
                $detalle_Compra->producto_id = $producto->id;
                $detalle_Compra->save();
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
     * Store a newly created resource in storage.
     */
    

    /**
     * Display the specified resource.
     */
    public function show(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleCompra $detalleCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DetalleCompra::destroy($id);
        return response()->json(['success'=>true]);
    }
}
