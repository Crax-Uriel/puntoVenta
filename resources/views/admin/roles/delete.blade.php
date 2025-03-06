@extends('layouts.admin')
@section('title')
    Roles
@endsection
@section('content')
<br>
    <h4 class="m-0">Eliminar Rol: {{$rol->name}}</h4>
    <br>
    <div class="row">
        <div class="col-md-6" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {!!BootForm::open()->action(route('admin.roles.destroy',$rol->id))->delete() !!}
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    {!! BootForm::text('Nombre el Rol: ', 'name')->value(old('nombres', $rol->name))->disabled()!!}
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    {!! BootForm::submit('Eliminar')->class('btn btn-danger') !!}
                                    <a href="{{'/admin/roles'}}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
@endsection