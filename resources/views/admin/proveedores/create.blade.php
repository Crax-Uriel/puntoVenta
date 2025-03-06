@extends('layouts.admin')
@section('title')
    Proveedores
@endsection
@section('content')
<br>
    <h4 class="m-0">Registro de Proveedores</h4>
    <br>
    <div class="row">
        <div class="col-md-8" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {!! BootForm::open([
                    'model' => $proveedor,
                    'store' => 'admin.proveedores.store',
                    'update' => 'admin.proveedores.update',
                    'enctype' => 'multipart/form-data',
                    'id' => 'form',
                ]) !!}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Nombre del Proveedor: ', 'nombre_proveedor')!!}
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Empresa: *', 'empresa')!!}
                                    
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::number('Telefono: *', 'telefono_proveedor') !!}
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'correo_electronico')->maxlength(150) !!}
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    {!! BootForm::submit('Guardar')->class('btn btn-primary') !!}
                                    <a href="{{'/admin/proveedores'}}" class="btn btn-danger">Cancelar</a>
                            
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