<?php

namespace App\Http\Controllers;

use App\Models\Arqueo;
use App\Models\MoviminetoCaja;
use Illuminate\Http\Request;

class ArqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $arqueoAbierto = Arqueo::whereNull('fecha_cierre')->first();
        $arqueos = Arqueo::with('movimientos')->get();
        foreach($arqueos as $arqueo){
            $arqueo->total_ingresos= $arqueo->movimientos->where('tipo','Ingreso')->sum('monto');
            $arqueo->total_egresos= $arqueo->movimientos->where('tipo','Egreso')->sum('monto');

        }

        return view('admin.arqueos.index',compact('arqueos','arqueoAbierto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.arqueos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'fecha_apertura' => 'required',
            'monto_inicial' =>'nullable|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'descripcion' =>'nullable|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:150|string',
            
        ]);

        Arqueo::create($request->all());
        return redirect()->route('admin.arqueos.index')->with('mensaje','Se registro la apertura de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        
        $arqueo =Arqueo::findorFail($id);
        $movimientos = MoviminetoCaja::where('arqueo_id' , $id)->get();
        return view('admin.arqueos.show', compact('arqueo','movimientos'));
    }

    public function ingresoegreso($id){
        $arqueo =Arqueo::findorFail($id);
        return view('admin.arqueos.ingreso-egreso',compact('arqueo'));

    }

    public function store_ingresos_egresos(Request $request){

        $request->validate([
            'tipo' => 'required',
            'monto' =>'required|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'descripcion' =>'nullable|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:150|string',
        ]);

        $movimiento  = new MoviminetoCaja();
        $movimiento->tipo = $request->tipo; 
        $movimiento->monto = $request->monto; 
        $movimiento->descripcion = $request->descripcion; 
        $movimiento->arqueo_id = $request->arqueo_id ; 
        $movimiento->save(); 
        return redirect()->route('admin.arqueos.index')->with('mensaje','Se registro el movimiento de manera correcta')->with('icono','success');

        //$datos = request()->all();
        //return response()->json($datos);
    }

    public function cierre($id){
        $arqueo =Arqueo::find($id);
        return view('admin.arqueos.cierre',compact('arqueo'));
    }

    public function store_cierre(Request $request){
        $arqueo =Arqueo::find($request->id);
        $request->validate([
            'monto_final' =>'nullable|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'fecha_cierre' =>'nullable',
        ]);

        
        $arqueo->fecha_cierre = $request->fecha_cierre;
        $arqueo->monto_final = $request->monto_final;
        $arqueo->save();

        return redirect()->route('admin.arqueos.index')->with('mensaje','Se registro el cierre de manera correcta')->with('icono','success');
    }

    public function edit($id)
    {
        $arqueo =Arqueo::findorFail($id);
        return view('admin.arqueos.edit', compact('arqueo'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $arqueo =Arqueo::findorFail($id);
        $request->validate([
            'fecha_apertura' => 'required',
            'fecha_cierre' => 'nullable',
            'monto_inicial' =>'nullable|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'monto_final' =>'nullable|numeric|regex:/^\d{1,4}(\.\d{1,2})?$/',
            'descripcion' =>'nullable|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:150|string',
            
        ]);

        $arqueo->fecha_apertura = $request->fecha_apertura;
        $arqueo->fecha_cierre = $request->fecha_cierre;
        $arqueo->monto_inicial = $request->monto_inicial;
        $arqueo ->monto_final = $request->monto_final;
        $arqueo ->descripcion = $request->descripcion;
        $arqueo->save(); 

        return redirect()->route('admin.arqueos.index')->with('mensaje','Se actulizo el arqueo de manera correcta')->with('icono','success');


    }

    public function confirmDelete($id){
        $arqueo =Arqueo::findorFail($id);
        return view('admin.arqueos.delete',compact('arqueo'));
    } 



    public function destroy( $id)
    {
        $arqueo =Arqueo::findorFail($id);
        $arqueo->delete();
        return redirect()->route('admin.arqueos.index')->with('mensaje','Se elimino el arqueo de manera correcta')->with('icono','success');

    }
}

