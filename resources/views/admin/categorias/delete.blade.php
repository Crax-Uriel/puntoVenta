@extends('layouts.admin')
@section('title')
        Categorias
@endsection
@section('content')
<br>
<h4 class="m-0">Eliminar Categoria: {{$categoria->nombre_categoria}}</h4>
<br>
    <div class="row">
        <div class="col-md-6" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/categorias',$categoria->id)}}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre de la categoria:  </label> <b>*</b>
                                    <input type="text" class="form-control" name="nombre_categoria" required value="{{$categoria->nombre_categoria}}" disabled>
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
                                    <input type="text" class="form-control" name="descripcion_categoria" required value="{{$categoria->descripcion_categoria}}" disabled>
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
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar</button>
                                    <a href="{{'/admin/categorias'}}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection