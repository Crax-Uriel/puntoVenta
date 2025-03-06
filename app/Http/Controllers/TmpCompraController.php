<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TmpCompra;
use Illuminate\Http\Request;

class TmpCompraController extends Controller
{
    public function tmp_compras(Request $request){
        $producto= Producto::where('codigo_producto',$request->codigo_producto)->first();
        $session_id = session()->getId();
        if ($producto){
            $tmp_Compra_existe = TmpCompra::where('producto_id',$producto->id)->where('session_id',$session_id)->first();
            if($tmp_Compra_existe){
                $tmp_Compra_existe->cantidad_compra +=$request->cantidad_compra;
                $tmp_Compra_existe->save();
                return response()->json(['success'=>true, 'message'=>'El producto fue encontrado']);
            }else{
                $tmp_Compra = new TmpCompra();
                $tmp_Compra->cantidad_compra = $request->cantidad_compra;
                $tmp_Compra->producto_id = $producto->id;
                $tmp_Compra->session_id = $session_id;
                $tmp_Compra->save();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        TmpCompra::destroy($id);
        return response()->json(['success'=>true]);
        
    }
}
