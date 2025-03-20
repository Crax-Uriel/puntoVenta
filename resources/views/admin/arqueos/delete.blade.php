@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Eliminiar Arqueo</h1>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar este arqueo?</h3>
                </div>
                <form action="{{url('admin/arqueos',$arqueo->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de apertura: </label> <b>*</b>
                                    <input type="datetime-local" class="form-control" name="fecha_apertura" required value="{{$arqueo->fecha_apertura}}" disabled>
                                    @error('fecha_apertura')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de cierre: </label> 
                                    <input type="datetime-local" class="form-control" name="fecha_cierre" required value="{{$arqueo->fecha_cierre}}" disabled>
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
                                    <input type="text" class="form-control" name="monto_inicial" required value="{{$arqueo->monto_inicial}}" disabled>
                                    @error('monto_inicial')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Monto final: </label> 
                                    <input type="text" class="form-control" name="monto_final"  value="{{$arqueo->monto_final}}" step="any" disabled>
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
                                    <input type="text" value="{{$arqueo->descripcion}}" class="form-control" name="descripcion" disabled>
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
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <a href="{{'/admin/arqueos'}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection