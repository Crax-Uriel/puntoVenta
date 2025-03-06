@extends('layouts.admin')
@section('title')
    Roles
@endsection
@section('content')
<br>
    <h4 class="m-0">Registro de Roles</h4>
    <br>
    <div class="row">
        <div class="col-md-6" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {!! BootForm::open([
                    'model' => $role,
                    'store' => 'admin.roles.store',
                    'update' => 'admin.roles.update',
                    'enctype' => 'multipart/form-data',
                    'id' => 'form',
                ]) !!}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::text('Nombre del Rol: *', 'name')!!}
                                    
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    {!! BootForm::submit('Enviar')->class('btn btn-primary') !!}
                                    <a href="{{'/admin/roles'}}" class="btn btn-danger">Cancelar</a>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                {!! BootForm::close() !!}
                {!! $validator !!}
            </div>
        </div>
    </div>
@endsection

{{-- @extends('layouts.admin')
@section('content')
<br>
    <h4 class="m-0">Registro de Roles</h4>
    <br>
    <div class="row">
        <div class="col-md-6" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/roles/create')}}" method="POST" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Nombre del Rol: </label> <b>*</b>
                                    <input type="text" class="form-control" name="name" required value="{{old('name')}}">
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
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Guardar</button>
                                    <a href="{{'/admin/roles'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection --}}