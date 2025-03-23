@extends('layouts.admin')
@section('content')
<br>
    <h4 class="m-0">Eliminar Permiso: {{$permiso->name}}</h4>
    <br>
    <div class="row">
        <div class="col-md-6" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">¿Desea eliminar este permiso?</h3>
                </div>
                <form action="{{url('/admin/permisos',$permiso->id)}}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre del Permiso: </label> <b>*</b>
                                    <input type="text" class="form-control" name="name" disabled value="{{$permiso->name}}">
                                    @error('name')
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
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <a href="{{'/admin/permisos'}}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection