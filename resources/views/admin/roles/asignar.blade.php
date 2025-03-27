@extends('layouts.admin')
@section('title')
    Roles
@endsection
@section('content')
    <h4 class="m-0">Asgnar permisos al rol : {{$rol->name}} </h4>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles Registrados</h3>
                    {{-- <div class="card-tools">
                    </div> --}}
                </div>
                <div class="card-body" >
                    <form action="{{url('/admin/roles/asignar',$rol->id)}}" method="POST" >
                        @csrf
                        @method('PUT')

                        @foreach ($permisos as $modulo => $grupoPermisos)
                            <div class="col-md-4">
                                <h3> {{$modulo}} </h3>
                                @foreach ($grupoPermisos as $permiso)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="permisos[]" value=" {{$permiso->id}} " {{$rol->hasPermissionTo($permiso->name) ? 'checked':''}}>
                                        <label for="" class="form-check-label"> {{$permiso->name}} </label>

                                    </div>
                                        
                                @endforeach

                            </div>
                                
                        @endforeach


                        
                        <hr>

                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Guardar</button>
                                    <a href="{{'/admin/roles'}}" class="btn btn-danger">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    
                
                </div>
            </div>
        </div>
    </div>
@endsection

