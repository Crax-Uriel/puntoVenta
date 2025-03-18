@extends('layouts.admin')
@section('title')
    Clientes
@endsection
@section('content')
<br>
    <h4 class="m-0">Actualizar Cliente: {{$cliente->nombre_cliente}} </h4>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {!!BootForm::open()->action(url('admin/clientes',$cliente->id))->put() !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Nombre del Cliente: * ', 'nombre_cliente')->value(old('nombre_cliente', $cliente->nombre_cliente)) !!}
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Apellido paterno: *', 'apellido_paterno_cliente')->value(old('apellido_paterno_cliente', $cliente->apellido_paterno_cliente))!!}
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Apellido materno: ', 'apellido_materno_cliente')->value(old('apellido_materno_cliente', $cliente->apellido_materno_cliente))!!}
                                    
                                </div>
                            </div>

                            

                            
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('RFC: *', 'rfc')->value(old('rfc', $cliente->rfc))!!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::text('Telefono: * ', 'telefono_cliente')->maxlength(10)->value(old('telefono_cliente', $cliente->telefono_cliente)) !!}
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    {!! BootForm::email('Correo Electronico: * ', 'correo_electronico')->maxlength(150)->value(old('correo_electronico', $cliente->correo_electronico)) !!}
                                </div>
                            </div>
                        </div>
                        
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    {!! BootForm::submit('Actualizar')->class('btn btn-warning') !!}
                                    <a href="{{'/admin/clientes'}}" class="btn btn-danger">Cancelar</a>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection
