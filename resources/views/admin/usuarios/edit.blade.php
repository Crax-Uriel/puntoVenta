@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0">Modificar Usuario: {{$usuario->name}}</h1>
    <br>
    <div class="row">
        <div class="col-md-7">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <form action="{{url('admin/usuarios',$usuario->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="role">Nombre del Rol: </label> <b>*</b>
                                    <select name="role" id="role" class="form-control" > 
                                        @foreach ($roles as $role)
                                        <option value="{{$role->name}}" {{ $role->name == $usuario->roles->pluck('name')->implode(',') ? 'selected' : '' }}>
                                            {{$role->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre de Usuario </label> <b>*</b>
                                    <input type="text" class="form-control" name="name" required value="{{$usuario->name}}">
                                    @error('name')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Correo electronico </label> <b>*</b>
                                    <input type="email" value="{{$usuario->email}}" class="form-control" name="email" required>
                                    @error('email')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Contraseña </label> 
                                    <input type="password" value="{{old('password')}}" class="form-control" name="password">
                                    @error('password')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Confirma la Contraseña </label> 
                                    <input type="password" class="form-control" name="password_confirmation" >
                                    @error('password_confirmation')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <button type="submit" class="btn btn-warning">Actualizar</button>
                                    <a href="{{'/admin/usuarios'}}" class="btn btn-danger">Cancelar</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection