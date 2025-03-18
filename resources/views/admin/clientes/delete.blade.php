@extends('layouts.admin')
@section('title')
    Clientes
@endsection
@section('content')
<br>
    <h4 class="m-0">Eliminar Cliente: {{$cliente->nombre_cliente}} </h4>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {!!BootForm::open()->action(route('admin.clientes.destroy',$cliente->id))->delete() !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Nombre del Cliente: * ', 'nombre_cliente')->value(old('nombre_cliente', $cliente->nombre_cliente))->disabled()!!}
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Apellido paterno: *', 'apellido_paterno_cliente')->value(old('apellido_paterno_cliente', $cliente->apellido_paterno_cliente))->disabled()!!}
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Apellido materno: ', 'apellido_materno_cliente')->value(old('apellido_materno_cliente', $cliente->apellido_materno_cliente))->disabled()!!}
                                    
                                </div>
                            </div>

                            

                            
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('RFC: *', 'rfc')->value(old('rfc', $cliente->rfc))->disabled()!!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Telefono: * ', 'telefono_cliente')->maxlength(10)->value(old('telefono_cliente', $cliente->telefono_cliente))->disabled() !!}
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'correo_electronico')->maxlength(150)->value(old('correo_electronico', $cliente->correo_electronico))->disabled() !!}
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    {!! BootForm::submit('Eliminar')->class('btn btn-danger') !!}
                                    <a href="{{'/admin/clientes'}}" class="btn btn-secondary">Cancelar</a>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection
