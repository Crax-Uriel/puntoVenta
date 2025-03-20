@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Registro de ingresos-Egresos</h1>
    <br>
    <div class="row">
        <div class="col-md-7" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/arqueos/create_ingresos_egresos')}}" method="POST">
                    @csrf
                    <input type="text" value=" {{$arqueo->id}}" name="arqueo_id" hidden>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Fecha de apertura: </label> <b>*</b>
                                    <input type="datetime-local" class="form-control" name="fecha_apertura" disabled value="{{$arqueo->fecha_apertura}}">
                                    @error('fecha_apertura')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Tipo: </label> 
                                    <select name="tipo" id="" class="form-control">
                                        <option value="Ingreso">INGRESO</option>
                                        <option value="Engreso">EGRESO</option>
                                    </select>
                                    @error('tipo')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Monto: </label> 
                                    <input type="text" class="form-control" name="monto" required value="{{old('monto')}}">
                                    @error('monto')
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
                                    <input type="text" value="{{old('descripcion')}}" class="form-control" name="descripcion" required>
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
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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