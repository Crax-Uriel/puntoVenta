<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
class ProveedorController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(Proveedor $model)
    {
        $this->validationRules = [
            'nombre_proveedor' => 'nullable|required_without:empresa|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'empresa' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'telefono_proveedor' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'correo_electronico' => 'required|string|email|max:200',            
        ];

        $this->attributeNames = [
            'nombre_proveedor' => 'nombre del proveedor',
            'empresa' => 'empresa',
            'telefono_proveedor' => 'telefono del proveedor',
            'correo_electronico' => 'correo electronico',
            
        ];

        $this->errorMessages = [
            'required' => 'El campo :attribute es obligatorio',
            'string' => 'El campo :attribute debe ser una cadena',
            'max' => 'El campo :attribute sobrepaso el numero maximo de caracteres.',
            'min' => 'El campo :attribute no cumple con el numero minimo de caracteres.',
            'regex' => 'El campo :attribute tiene un formato inválido.',
            'email' => 'El campo :attribute tiene un formato inválido de correo electronico.',
        ];

        $this->model = $model;


    }


    public function index()
    {
        $proveedores = Proveedor::all();
        return view('admin.proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedor = new Proveedor();
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.proveedores.create', compact('proveedor','validator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        
        Proveedor::create($request->all());

        return redirect()->route('admin.proveedores.index')->with('mensaje','Se registro el proveedor de manera correcta')->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $proveedor =Proveedor::findorFail($id);
        return view('admin.proveedores.show', compact('proveedor'));
    }

    //Funcioin que retorna la vista edir 
    public function edit( $id)
    {
        $proveedor =Proveedor::findorFail($id);
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form2');

        return view('admin.proveedores.edit', compact('proveedor','validator'));
    }

    //funcion que reliza la actulizacion 
    public function update(Request $request, $id)
    {
        $proveedor =Proveedor::findorFail($id);
        $this->setValidator($request)->validate();
        $proveedor->update($request->all());
        return redirect()->route('admin.proveedores.index')->with('mensaje','Se actualizo el proveedor de manera correcta')->with('icono','success');
    }

    
    public function confirmDelete($id){
        $proveedor =Proveedor::findorFail($id);
        return view('admin.proveedores.delete', compact('proveedor'));
    } 

    public function destroy( $id)
    {
        $proveedor =Proveedor::findorFail($id);
        Proveedor::destroy($id);
        return redirect()->route('admin.proveedores.index')->with('mensaje','Se elimino el proveedor de manera correcta')->with('icono','success');
    }

    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}
