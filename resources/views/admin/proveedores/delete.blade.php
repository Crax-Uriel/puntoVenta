@extends('layouts.admin')
@section('title')
    Proveedores
@endsection
@section('content')
<br>
    <h4 class="m-0">Eliminar proveedor: {{$proveedor->empresa}}</h4>
    <br>
    <div class="row">
        <div class="col-md-8" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {!!BootForm::open()->action(route('admin.proveedores.destroy',$proveedor->id))->delete() !!}
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">

                                    {!! BootForm::text('Nombre del Proveedor: ', 'nombre_proveedor')->value(old('nombre_proveedor', $proveedor->nombre_proveedor))->disabled()!!}
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Empresa: *', 'empresa')->value(old('empresa', $proveedor->empresa))->disabled()!!}
                                    
                                </div>
                            </div>
                            
                            
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::number('Telefono: *', 'telefono_proveedor')->value(old('telefono_proveedor', $proveedor->telefono_proveedor))->disabled() !!}
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'correo_electronico')->maxlength(150)->value(old('correo_electronico', $proveedor->correo_electronico))->disabled() !!}
                                    
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    {!! BootForm::submit('Eliminar')->class('btn btn-danger') !!}
                                    <a href="{{'/admin/proveedores'}}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection