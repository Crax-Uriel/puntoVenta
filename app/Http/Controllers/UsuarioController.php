<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function index(){
        //consulta pata listar usuarios
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.usuarios.create',compact('roles'));
    }

    public function store(Request $request){
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'name' =>'required|regex:/^[A-Za-z\s]+$/|max:100',
            'email' =>'required|max:250|unique:users',
            'password' =>'required|max:250|confirmed',
        ]);
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save(); 

        $usuario->assignRole($request->role);

        return redirect()->route('admin.usuarios.index')->with('mensaje','Se registro al usuario de manera correcta')->with('icono','success');
    }


    public function show($id){
        $usuario =User::findorFail($id);
        return view('admin.usuarios.show', compact('usuario'));

    }

    public function edit($id){
        $usuario =User::findorFail($id);
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuario','roles'));
    }

    public function update(Request $request,$id){
        $usuario = User::find($id);
        $request->validate([
            'name' =>'required|regex:/^[A-Za-z\s]+$/|max:100',
            'email' =>'required|max:250|unique:users,email,'.$usuario->id,
            'password' =>'nullable|max:250|confirmed',
        ]);
        
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request['password']);
            
        }
        $usuario->save();

        $usuario->syncRoles($request->role);
        return redirect()->route('admin.usuarios.index')->with('mensaje','Se actualizo al usuario de manera correcta')->with('icono','success');
    }

    public function confirmDelete($id){
        $roles = Role::all();

        $usuario =User::findorFail($id);
        return view('admin.usuarios.delete', compact('usuario','roles'));
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('admin.usuarios.index')->with('mensaje','Se elimino al usuario de manera correcta')->with('icono','success');
    }
}
