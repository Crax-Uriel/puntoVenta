@extends('layouts.admin')
@section('title')
    Roles
@endsection
@section('content')
<br>
    <h4 class="m-0">Rol: {{$rol->name}}</h4>
    <br>
    <div class="row" style="font-size: 15px;">
        <div class="col-md-8">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form group">
                                    <label for="">Nombre del rol: </label>
                                    <p>{{$rol->name}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/roles'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection