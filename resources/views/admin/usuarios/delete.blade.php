@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0">Usuario: {{$usuario->name}}</h1>
    <br>
    <div class="row">
        <div class="col-md-7">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar este usuario?</h3>
                </div>
                <form action="{{url('admin/usuarios',$usuario->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="role">Nombre del Rol: </label> 
                                    <select name="role" id="role" class="form-control" disabled> 
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
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre de Usuario: </label>
                                    <input type="text" class="form-control" name="name" value="{{$usuario->name}}" disabled>
                                    @error('name')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre de Usuario: </label>
                                    <input type="text" class="form-control" name="name" value="{{$usuario->name}}" disabled>
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
                                    <label for="">Correo electronico: </label>
                                    <input type="email" value="{{$usuario->email}}" class="form-control" name="email" disabled>
                                    @error('email')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <a href="{{'/admin/usuarios'}}" class="btn btn-secondary">Cancelar</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection