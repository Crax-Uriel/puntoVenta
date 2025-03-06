@extends('layouts.admin')
@section('title')
        Categorias
@endsection
@section('content')
<br>
<h4 class="m-0">Actualizar Categoria: {{$categoria->nombre_categoria}}</h4>
<br>
    <div class="row">
        <div class="col-md-6" style="font-size: 15px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/categorias',$categoria->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre de la categoria:  </label> <b>*</b>
                                    <input type="text" class="form-control" name="nombre_categoria" required value="{{$categoria->nombre_categoria}}">
                                    @error('nombre_categoria')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Descripcion de la categoria:</label> <b>*</b>
                                    <input type="text" class="form-control" name="descripcion_categoria" required value="{{$categoria->descripcion_categoria}}">
                                    @error('descripcion_categoria')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    <button type="submit" class="btn btn-warning"><i class="bi bi-floppy-fill"></i> Actualizar</button>
                                    <a href="{{'/admin/categorias'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection