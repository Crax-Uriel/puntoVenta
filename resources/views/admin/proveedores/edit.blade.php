@extends('layouts.admin')
@section('title')
    Roles
@endsection
@section('content')
<br>
    <h4 class="m-0">Actulizar proveedor: </h4>
    <br>
    <div class="row">
        <div class="col-md-8" style="font-size: 15px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {!!BootForm::open()->action(route('admin.proveedores.update',$proveedor->id))->put() !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">

                                    {!! BootForm::text('Nombre del Proveedor: ', 'nombre_proveedor')->value(old('nombre_proveedor', $proveedor->nombre_proveedor))!!}
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Empresa: *', 'empresa')->value(old('empresa', $proveedor->empresa))!!}
                                    
                                </div>
                            </div>
                            
                            
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::number('Telefono: *', 'telefono_proveedor')->value(old('telefono_proveedor', $proveedor->telefono_proveedor)) !!}
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'correo_electronico')->maxlength(150)->value(old('correo_electronico', $proveedor->correo_electronico)) !!}
                                    
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    {!! BootForm::submit('Actualizar')->class('btn btn-warning') !!}
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