@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Actualizar Arqueo</h1>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <form action="{{url('admin/arqueos',$arqueo->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de apertura: </label> <b>*</b>
                                    <input type="datetime-local" class="form-control" name="fecha_apertura"  value="{{$arqueo->fecha_apertura}}">
                                    @error('fecha_apertura')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de cierre: </label> 
                                    <input type="datetime-local" class="form-control" name="fecha_cierre"  value="{{$arqueo->fecha_cierre}}">
                                    @error('fecha_cierre')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Monto inicial: </label> 
                                    <input type="text" class="form-control" name="monto_inicial"  value="{{$arqueo->monto_inicial}}">
                                    @error('monto_inicial')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Monto final: </label> 
                                    <input type="text" class="form-control" name="monto_final"  value="{{$arqueo->monto_final}}" step="any">
                                    @error('monto_final')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Descripcion: </label> 
                                    <input type="text" value="{{$arqueo->descripcion}}" class="form-control" name="descripcion" >
                                    @error('descripcion')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <button type="submit" class="btn btn-warning">Actualizar</button>
                                    <a href="{{'/admin/arqueos'}}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection