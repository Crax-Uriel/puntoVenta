@extends('layouts.admin')
@section('title')
Productos
@endsection
@section('content')
<br>
    <h4 class="m-0">Eliminar de Productos</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                <form action="{{url('admin/productos',$producto->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-9">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <label for="">Categoria: </label> <b>*</b>
                                            <select name="categoria_id" id="" class="form-control" disabled>
                                                <option value="" disabled selected>Seleccionar categoria..</option>
                                                @foreach ($categorias as $categoria)
                                                    

                                                    <option value="{{$categoria->id}}" {{ $categoria->id == $producto->categoria_id ? 'selected' : '' }}>
                                                        {{$categoria->nombre_categoria}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('categoria_id')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <label for="">Codigo del producto: </label> <b>*</b>
                                            <input type="text" class="form-control" name="codigo_producto" disabled value="{{$producto->codigo_producto}}">
                                            @error('codigo_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <label for="">Nombre del producto: </label> <b>*</b>
                                            <input type="text" class="form-control" name="nombre_producto" disabled value="{{$producto->nombre_producto}}">
                                            @error('nombre_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Descripcion del Producto:</label> <b>*</b> <br>
                                            <textarea name="descripcion_producto" id="" cols="30" rows="2" disabled  class="form-control">
                                                {{$producto->descripcion_producto}}
                                            </textarea>
                                            
                                            @error('descripcion_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form group">
                                            <label for="">Stock: </label> 
                                            <input type="number" class="form-control" name="stock_producto" disabled value="{{$producto->stock_producto}}">
                                            @error('stock_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Stock Minimo: </label> 
                                            <input type="number" class="form-control" name="stock_minimo_producto" disabled value="{{$producto->stock_minimo_producto}}">
                                            @error('stock_minimo_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form group">
                                            <label for="">Stock maximo </label> <b>*</b>
                                            <input type="number" class="form-control" name="stock_maximo_producto" disabled value="{{$producto->stock_maximo_producto}}">
                                            @error('stock_maximo_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form group">
                                            <label for="">Costo:</label> <b>*</b>
                                            <input type="text" class="form-control" name="costo_producto" disabled value="{{$producto->costo_producto}}"">
                                            @error('costo_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form group">
                                            <label for="">Precio:</label> <b>*</b>
                                            <input type="text" class="form-control" name="precio_producto" disabled value="{{$producto->precio_producto}}">
                                            @error('precio_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form group">
                                            <label for="">Fecha de ingreso del producto:</label> <b>*</b>
                                            <input type="date" class="form-control" name="fecha_ingreso_producto"  value="{{$producto->fecha_ingreso_producto}}" disabled>
                                            @error('fecha_ingreso_producto')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>




                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="imagen">Imagen del producto:</label> <b>*</b>
                                    
                                    <center> 
                                        <output id="list">
                                            <img src="{{url('storage/'.$producto ->imagen)}}" alt="Producto" width="100px">
                                        </output>
                                    </center>
                                    
                                    {{-- AJAX PARA MOSTRAR LA IMAGEN  --}}
                                    <script>
                                        function archivo(evt) {
                                          var files = evt.target.files; // FileList object
                                          // Obtenemos la imagen del campo "file".
                                            for (var i = 0, f; f = files[i]; i++) {
                                                // Solo admitimos imágenes.
                                                if (!f.type.match('image.*')) {
                                                    continue;
                                                }
                                                var reader = new FileReader();
                                                reader.onload = (function(theFile) {
                                                    return function(e) {
                                                    // Insertamos la imagen
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                                                    };
                                                })(f);
                                                reader.readAsDataURL(f);
                                            }
                                        }
                                            document.getElementById('file').addEventListener('change', archivo, false);
                                    </script>
    
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
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <a href="{{'/admin/productos'}}" class="btn btn-secondary">Cancelar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection