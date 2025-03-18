<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class ClienteController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(Cliente $model)
    {
        $this->validationRules = [
            'nombre_cliente' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50',
            'apellido_paterno_cliente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno_cliente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'rfc' => 'required|string|max:13|min:13|unique:clientes,rfc',
            'telefono_cliente' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'correo_electronico' => 'required|string|email|max:200|unique:clientes,correo_electronico',            
        ];

        $this->attributeNames = [
            'nombre_cliente' => 'Nombre',
            'apellido_paterno_cliente' => 'Apellido Paterno',
            'apellido_materno_cliente' => 'Apellido Materno',
            'rfc' => 'RFC',
            'telefono_cliente' => 'Telefono',
            'correo_electronico' => 'correo electronico',
            
        ];

        $this->errorMessages = [
            'required' => 'El campo :attribute es obligatorio',
            'unique' => 'El campo :attribute ya esta registrado',
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
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = new Cliente();
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.clientes.create', compact('cliente','validator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        Cliente::create($request->all());
        return redirect()->route('admin.clientes.index')->with('mensaje','Se registro al cliente de manera correcta')->with('icono','success');

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        
        $cliente =Cliente::findorFail($id);
        return view('admin.clientes.show', compact('cliente'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $cliente =Cliente::findorFail($id);
        
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $cliente =Cliente::findorFail($id);

        $request->validate([
            'nombre_cliente' =>'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:50',
            'apellido_paterno_cliente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'apellido_materno_cliente' => 'required|string|max:100|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'rfc' => 'required|string|max:13|min:13|unique:clientes,rfc,'.$cliente->id,
            'telefono_cliente' =>'required|string|regex:/^[0-9]+$/|max:10|min:10',
            'correo_electronico' => 'required|string|email|max:200||unique:clientes,correo_electronico,'.$cliente->id,      

        ]);

        $cliente->update($request->all());
        return redirect()->route('admin.clientes.index')->with('mensaje','Se actualizo al cliente de manera correcta')->with('icono','success');
    }

    public function confirmDelete($id){
        $cliente =Cliente::findorFail($id);
        return view('admin.clientes.delete', compact('cliente'));
    } 

    public function destroy( $id)
    {
        $cliente =Cliente::findorFail($id);
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('mensaje','Se elimino al cliente de manera correcta')->with('icono','success');
    }


    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}
