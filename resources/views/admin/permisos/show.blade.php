@extends('layouts.admin')
@section('content')
<br>
    <h4 class="m-0">Permiso: {{$permiso->name}} </h4>
    <br>
    <div class="row">
        <div class="col-md-4" style="font-size: 15px;">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Datos ingresados</h3>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre del Permiso: </label> 
                                    <p> {{$permiso->name}} </p>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Fecha y hora de creacion: </label> 
                                    <p> {{$permiso->created_at}} </p>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    <a href="{{'/admin/permisos'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
@endsection