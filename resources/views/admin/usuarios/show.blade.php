@extends('layouts.admin')
@section('content')
<br>
    <h4 class="m-0">Usuario: {{$usuario->name}}</h4>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
                <form action="{{url('/admin/usuarios/create')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre del Rol:</label>
                                    <p>{{ $usuario ->roles->pluck('name')->implode(',')}}</p>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre de Usuario:</label>
                                    <p>{{$usuario->name}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Correo electronico:</label>
                                    <p>{{$usuario->email}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Fecha y hora de registro:</label>
                                    <p>{{$usuario->created_at}}</p>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
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