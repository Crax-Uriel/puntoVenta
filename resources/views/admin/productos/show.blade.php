@extends('layouts.admin')
@section('title')
        Productos
@endsection
@section('content')
<br>

    <h4 class="m-0">Productos: {{$producto->nombre_producto}}</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Datos Ingresados</h3>
                </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-9">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <label for="">Categoria: </label> <b>*</b>
                                            <p>{{$producto->categoria->nombre_categoria}}</p>
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <label for="">Codigo del producto: </label> 
                                            <p>{{$producto->codigo_producto}}</p>
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <label for="">Nombre del producto: </label> 
                                            <p>{{$producto->nombre_producto}}</p>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Descripcion del Producto:</label> 
                                            <p>{{$producto->descripcion_producto}}</p>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form group">
                                            <label for="">Stock: </label> <b>*</b>
                                            <p style="background-color: rgba(243, 255, 76, 0.333); width:50px; text-align:center">{{$producto->stock_producto}}</p>

                                         
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Stock Minimo: </label> <b>*</b>
                                            <p>{{$producto->stock_minimo_producto}}</p>

                                            
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Stock maximo </label> <b>*</b>
                                            <p>{{$producto->stock_maximo_producto}}</p>

                                            
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form group">
                                            <label for="">Costo:</label> <b>*</b>
                                            <p>{{$producto->costo_producto}}</p>
                                           
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form group">
                                            <label for="">Precio:</label> <b>*</b>
                                            <p>{{$producto->precio_producto}}</p>
                                            
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form group">
                                            <label for="">Fecha de ingreso del producto:</label> <b>*</b>
                                            <p>{{$producto->fecha_ingreso_producto}}</p>
                                            
                                        </div>
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="imagen">Imagen del producto:</label> <b>*</b>
                                    <center>                                      
                                        <img src="{{url('storage/'.$producto ->imagen)}}" alt="Logo" width="100px">
                                    </center>
                                    
                                    
    
                                    @error('imagen')
                                        <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        
                        <br>
                        
                        <br>
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="font-size: 15px;">
                                <div class="form group">
                                    <a href="{{'/admin/productos'}}" class="btn btn-danger">Volver</a>
    
                                </div>
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
    </div>
@endsection