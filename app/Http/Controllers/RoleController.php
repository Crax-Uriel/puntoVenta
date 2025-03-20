<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use Barryvdh\DomPDF\Facade\PDF;

class RoleController extends Controller
{
    protected $validationRules;
    protected $attributeNames;
    protected $errorMessages;
    protected $model;
    public function __construct(Role $model)
    {
        $this->validationRules = [
            'name' => 'required|string|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:35|unique:roles',
            
        ];

        $this->attributeNames = [
            'name' => 'nombre del rol',
            
        ];

        $this->errorMessages = [
            'required' => 'El campo :attribute es obligatorio',
            'string' => 'El campo :attribute debe ser una cadena',
            'unique' => 'El campo :attribute ya existe',
            'regex' => 'El campo :attribute tiene un formato inválido.',
            'max' => 'El campo :attribute sobrepaso el numero maximo de caracteres.',
        ];

        $this->model = $model;


    }

    public function index()
    {
        //consulta pata listar usuarios
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    
    public function create()
    {
        /*$rol = new Role();
        $validator = JsValidator::make($this->validationRules, $this->errorMessages $this->attributeNames, '#form');*/
        $role = new Role;
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form');
        return view('admin.roles.create', compact('role','validator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->setValidator($request)->validate();
        
        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save(); 

        return redirect()->route('admin.roles.index')->with('mensaje','Se registro el rol de manera correcta')->with('icono','success');

    }

    //Funcion show 
    public function show( $id)
    {
        $rol =Role::findorFail($id);
        return view('admin.roles.show', compact('rol'));

    }

    //Funcioin que retorna la vista edir 
    public function edit( $id)
    {
        $rol =Role::findorFail($id);
        $validator = JsValidator::make($this->validationRules, $this->errorMessages, $this->attributeNames, '#form2');

        return view('admin.roles.edit', compact('rol','validator'));
    }

    //funcion que reliza la actulizacion 
    public function update(Request $request, $id)
    {
        $rol =Role::findorFail($id);
        $this->setValidator($request)->validate();
        $rol->update($request->all());
        return redirect()->route('admin.roles.index')->with('mensaje','Se actualizo el rol de manera correcta')->with('icono','success');
    }


    public function confirmDelete($id){
        $rol =Role::findorFail($id);
        return view('admin.roles.delete', compact('rol'));
    } 

    public function destroy( $id)
    {
        $rol =Role::findorFail($id);
        Role::destroy($id);
        return redirect()->route('admin.roles.index')->with('mensaje','Se elimino el rol de manera correcta')->with('icono','success');
    }

    public function reporte() {
        $roles = Role::all();
        $pdf = PDF::loadView('admin.roles.reporte', compact('roles'));
        return $pdf->stream();
    }


    protected function setValidator(Request $request)
    {
        return Validator::make($request->all(), $this->validationRules, $this->errorMessages)->setAttributeNames($this->attributeNames);
    }
}
