@extends('layouts.admin')
@section('title')
    Clientes
@endsection
@section('content')
<br>
    <h4 class="m-0">Cliente: {{$cliente->nombre_cliente}} </h4>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre del Cliente:</label>
                                    <p> {{$cliente->nombre_cliente}} </p>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Apellido paterno:</label>
                                    <p> {{$cliente->apellido_paterno_cliente}} </p>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Apellido materno:</label>
                                    <p> {{$cliente->apellido_materno_cliente}} </p>                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">RFC:</label>
                                    <p> {{$cliente->rfc}} </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Telefono:</label>
                                    <p> {{$cliente->telefono_cliente}} </p>                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Correo Electronico:</label>
                                    <p> {{$cliente->correo_electronico}} </p>
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    <a href="{{'/admin/clientes'}}" class="btn btn-danger">Cancelar</a>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection

