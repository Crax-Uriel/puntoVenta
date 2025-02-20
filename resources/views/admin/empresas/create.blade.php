@extends('layouts.admin')
@section('title')
    Crear Empresa
@endsection

@section('content')
<br>
    <h4 class="m-0">Registro de Empresa</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h6 class="card-title">Ingrese los datos</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="logo">Logo</label> <b>*</b>
                                <input type="file" class="form-control" name="logo" required value="{{old('nombres')}}">
                                @error('logo')
                                    <small style="color: red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="pais">Paìs</label> <b>*</b>
                                        <select name="" id="" class="form-control">
                                            <option value="Mexico">Mexico</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="nombre_empresa">Nombre de la Empresa</label> <b>*</b>
                                        <input type="text" class="form-control" name="nombre_empresa" required value="{{old('nombre_empresa')}}">
                                        @error('nombre_empresa')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="tipo_empresa">Tipo de empresa</label> <b>*</b>
                                        <input type="text" class="form-control" name="tipo_empresa" required value="{{old('tipo_empresa')}}">
                                        @error('tipo_empresa')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="rfc">RFC</label> <b>*</b>
                                        <input type="text" class="form-control" name="rfc" required value="{{old('rfc')}}">
                                        @error('rfc')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="telefono">Telefono de la empresa</label> <b>*</b>
                                        <input type="text" class="form-control" name="telefono" required value="{{old('telefono')}}">
                                        @error('telefono')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="correo">Correo de la empresa</label> <b>*</b>
                                        <input type="text" class="form-control" name="correo" required value="{{old('correo')}}">
                                        @error('correo')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="cantidad_impuesto">Cantidad de Impuesto</label> <b>*</b>
                                        <input type="number" class="form-control" name="cantidad_impuesto" required value="{{old('cantidad_impuesto')}}">
                                        @error('cantidad_impuesto')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="nombre_impuesto">Nombre del Impuesto</label> <b>*</b>
                                        <input type="text" class="form-control" name="nombre_impuesto" required value="{{old('nombre_impuesto')}}">
                                        @error('nombre_impuesto')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="moneda">Moneda</label> <b>*</b>
                                        <select name="" id="" class="form-control">
                                            <option value="Mexicanos">MX</option>
                                        </select>
                                        @error('moneda')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="direccion">Direccion</label> <b>*</b>
                                        <input type="text" class="form-control" name="direccion" required value="{{old('direccion')}}">
                                        @error('direccion')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="ciudad">Ciudad</label> <b>*</b>
                                        <input type="text" class="form-control" name="ciudad" required value="{{old('ciudad')}}">
                                        @error('ciudad')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="codigo_postal">Codigo Postal</label> <b>*</b>
                                        <input type="text" class="form-control" name="codigo_postal" required value="{{old('codigo_postal')}}">
                                        @error('codigo_postal')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div> {{-- FIN ROW PRINCIPAL --}}
                    
                    <br>
                    
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="{{'/admin/clientes'}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection