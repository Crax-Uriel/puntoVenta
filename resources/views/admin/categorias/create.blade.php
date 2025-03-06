@extends('layouts.admin')
@section('title')
        Categorias
@endsection
@section('content')
<br>
    <h4 class="m-0">Registro de Categorias</h4>
    <br>
    <div class="row">
        <div class="col-md-6" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/categorias/create')}}" method="POST" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre de categoria: </label> <b>*</b>
                                    <input type="text" class="form-control" name="nombre_categoria" required value="{{old('nombre_categoria')}}">
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
                                    <label for="">Descripcion de categoria: </label> <b>*</b>
                                    <input type="text" class="form-control" name="descripcion_categoria" required value="{{old('descripcion_categoria')}}">
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
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Guardar</button>
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