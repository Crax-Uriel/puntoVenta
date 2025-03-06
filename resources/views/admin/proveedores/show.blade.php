@extends('layouts.admin')
@section('title')
    Roles
@endsection
@section('content')
<br>
    <h4 class="m-0">Proveedor: {{$proveedor->empresa}}</h4>
    <br>
    <div class="row" style="font-size: 15px;">
        <div class="col-md-8">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nombre del Proveedor:: </label>
                                    <p>{{$proveedor->nombre_proveedor}}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Empresa: </label>
                                    <p>{{$proveedor->empresa}}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Telefono: </label>
                                    <p>{{$proveedor->telefono_proveedor}}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Correo Electronico: </label>
                                    <p>{{$proveedor->correo_electronico}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/proveedores'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection