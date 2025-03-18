<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TmpVenta;
use Illuminate\Http\Request;

class TmpVentaController extends Controller
{
    public function tmp_ventas(Request $request){
        $producto= Producto::where('codigo_producto',$request->codigo_producto)->first();
        $session_id = session()->getId();
        if ($producto){
            $tmp_Venta_existe = TmpVenta::where('producto_id',$producto->id)->where('session_id',$session_id)->first();
            if($tmp_Venta_existe){
                $tmp_Venta_existe->cantidad_compra +=$request->cantidad_compra;
                $tmp_Venta_existe->save();
                return response()->json(['success'=>true, 'message'=>'El producto fue encontrado']);
            }else{
                $tmp_Venta = new TmpVenta();
                $tmp_Venta->cantidad_compra = $request->cantidad_compra;
                $tmp_Venta->producto_id = $producto->id;
                $tmp_Venta->session_id = $session_id;
                $tmp_Venta->save();
                return response()->json(['success'=>true, 'message'=>'El producto fue encontrado']);
            }
            

        }else{
            
            return response()->json(['success'=>false, 'message' => 'Producto no fue encontrado']);
            
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        TmpVenta::destroy($id);
        return response()->json(['success'=>true]);
    }
}
