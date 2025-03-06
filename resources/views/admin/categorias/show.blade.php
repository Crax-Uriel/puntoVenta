@extends('layouts.admin')
@section('content')
<br>
    <h4 class="m-0">Categoria: {{$categoria->nombre_categoria}}</h4>
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
                                    <label for="">Nombre de la categoria: </label>
                                    <p>{{$categoria->nombre_categoria}}</p>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form group">
                                    <label for="">Descripcion de la categoria: </label>
                                    <p>{{$categoria->descripcion_categoria}}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/categorias'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
@endsection