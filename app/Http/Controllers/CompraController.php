<?php

namespace App\Http\Controllers;

use App\Models\Arqueo;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\MoviminetoCaja;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\TmpCompra;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;


class CompraController extends Controller
{
    
    public function index()
    {
        $arqueoAbierto = Arqueo::whereNull('fecha_cierre')->first();
        $compras = Compra::with('detalles','proveedor')->get();
        return view('admin.compras.index', compact('compras','arqueoAbierto'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        $session_id = session()->getId();
        $tmp_Compras = TmpCompra::where('session_id',$session_id)->get();
        return view('admin.compras.create',compact('productos','proveedores','tmp_Compras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'fecha_compra' =>'required|date',
            'comprobante_compra' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s]+$/|max:100|string',
            'precio_total' => 'required|numeric',
            'proveedor_id' => 'required|numeric',
        ]);

        $compra = new Compra();
        $compra->fecha_compra = $request->fecha_compra;
        $compra->comprobante_compra = $request->comprobante_compra;
        $compra->precio_total = $request->precio_total;
        $compra ->proveedor_id = $request->proveedor_id;
        $compra->save(); 

        // registrar el arqueo 
        $arqueo_id =  Arqueo::whereNull('fecha_cierre')->first();
        $movimiento  = new MoviminetoCaja();
        $movimiento->tipo = "Egreso"; 
        $movimiento->monto = $request->precio_total; 
        $movimiento->descripcion ="Compra de productos"; 
        $movimiento->arqueo_id = $arqueo_id->id ; 
        $movimiento->save(); 

        $session_id = session()->getId();
        $tmp_Compras = TmpCompra::where('session_id',$session_id)->get();
        
        foreach ($tmp_Compras as $tmp_Compra) {
            $producto = Producto::where('id',$tmp_Compra->producto_id)->first();
            $detalle_compra = new DetalleCompra();
            $detalle_compra ->cantidad_compra = $tmp_Compra->cantidad_compra;
            //$detalle_compra ->precio_compra = $producto->costo_producto;
            $detalle_compra ->compra_id = $compra->id;
            $detalle_compra ->producto_id = $tmp_Compra->producto_id;
            
            $detalle_compra->save();

            //$producto->stock_producto +=  $detalle_compra->cantidad_compra;
            $producto->stock_producto +=  $tmp_Compra->cantidad_compra;

            $producto->save();
    
        }

        TmpCompra::where('session_id',$session_id )->delete();

        return redirect()->route('admin.compras.index')->with('mensaje','Se registro la compra de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $compra =Compra::with('detalles','proveedor')->findorFail($id);
        return view('admin.compras.show', compact('compra'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $compra =Compra::with('detalles','proveedor')->findorFail($id);
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('admin.compras.edit',compact('productos','proveedores','compra'));

    }

    
    public function update(Request $request,  $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'fecha_compra' =>'required|date',
            'comprobante_compra' =>'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s]+$/|max:100|string',
            'precio_total' => 'required|numeric'
        ]);

        $compra = Compra::find($id);
        $compra->fecha_compra = $request->fecha_compra;
        $compra->comprobante_compra = $request->comprobante_compra;
        $compra->precio_total = $request->precio_total;
        $compra ->proveedor_id = $request->proveedor_id;
        $compra->save(); 

        


        return redirect()->route('admin.compras.index')->with('mensaje','Se actulizo la compra de manera correcta')->with('icono','success');
    }

    public function confirmDelete($id){
        $compra =Compra::with('detalles','proveedor')->findorFail($id);
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('admin.compras.delete',compact('compra','productos','proveedores'));
    } 


    public function destroy( $id)
    {
        $compra = Compra::find($id);
        foreach($compra->detalles as $detalle){
            $producto= Producto::find($detalle->producto_id);
            $producto->stock_producto -=$detalle->cantidad_compra;
            $producto->save();
        }
        $compra->detalles()->delete();
        Compra::destroy($id);
        return redirect()->route('admin.compras.index')->with('mensaje','Se elimino la compra de manera correcta')->with('icono','success');
    }

    public function reporte() {
        $compras = Compra::all();
        $pdf = PDF::loadView('admin.compras.reporte', compact('compras'));
        return $pdf->stream();
    }

}
