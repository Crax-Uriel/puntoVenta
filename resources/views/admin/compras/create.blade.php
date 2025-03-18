@extends('layouts.admin')
@section('title')
        Compras
@endsection
@section('content')
<br>
    <h4 class="m-0">Registro de Compras</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                <form action="{{url('/admin/compras/create')}}" method="POST" id="form_compra">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form group">
                                            <label for="">Cantidad: </label> <b>*</b>
                                            <input type="number" class="form-control" name="cantidad_compra"  value="1" style="text-align: center; background-color:bisque" id="cantidad_compra">
                                            @error('cantidad_compra')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Codigo: </label> <b>*</b>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-barcode">
                                                        </i></span>
                            
                                                </div>
                                                <input type="text" class="form-control"   value="{{old('codigo_producto')}}" style="text-align: center; " id="codigo_producto">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form group">
                                            <div style="height: 31.5px;"></div>
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search"></i></button>
                                            <a href="{{url('admin/productos/create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>

                                            {{-- Modal para el buscador --}}
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Listado de Productos</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table id="example1" class="table table-striped table-bordered table-hover table-responsive">
                                                            <thead>
                                                                <tr style="text-align: center">
                                                                    <td><b>Nro</b></td>
                                                                    <td><b>Accion</b></td>
                                                                    <td><b>Codigo</b></td>
                                                                    <td><b>Imagen</b></td>
                                                                    <td><b>Producto</b></td>
                                                                    <td ><b>Stock</b></td>
                                                                    <td><b>Costo</b></td>
                                                                    <td><b>Precio</b></td>
                                                                    
                                                                </tr>
                                                            </thead>
                                                                <tbody style="text-align: center" >
                                                                    <?php $contador=1; ?>
                                                                    @foreach ($productos as $producto)
                                                                        <tr>    
                                                                            <td>{{ $contador++}}</td>
                                                                            <td>
                                                                                <button class="btn btn-info seleccionar-btn" data-id="{{$producto->codigo_producto}}" type="button">Seleccionar</button>
                                                                            </td>
                                                                            <td>{{ $producto ->codigo_producto}}</td>
                                                                            <td>
                                                                                <img src="{{url('storage/'.$producto->imagen)}}" alt="Producto" width="100px">
                                                                            </td>
                                                                            <td>{{ $producto ->nombre_producto}}</td>
                                                                            <td style="background-color: rgba(243, 255, 76, 0.333)">{{ $producto ->stock_producto}}</td>
                                                                            <td>{{ $producto ->costo_producto}}</td>
                                                                            <td>{{ $producto ->precio_producto}}</td>
                                                                            
                                                                            
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody> 
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <div class="row">
                                    <table  class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr style="text-align: center">
                                                <td><b>Nro</b></td>
                                                <td><b>Codigo</b></td>
                                                <td><b>Cantidad</b></td>
                                                <td><b>Nombre</b></td>
                                                <td><b>Costo</b></td>
                                                <td><b>Total</b></td>
                                                <td><b>Accion</b></td>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center">
                                            <?php $contador=1; $total_cantidad=0; $total_compra=0; ?>
                                            @foreach ($tmp_Compras as $tmp_Compra)
                                                
                                                <tr>
                                                    <td>{{ $contador++}}</td>
                                                    <td>{{ $tmp_Compra ->producto->codigo_producto}}</td>
                                                    <td>{{ $tmp_Compra ->cantidad_compra}}</td>
                                                    <td>{{ $tmp_Compra ->producto->nombre_producto}}</td>
                                                    <td>{{ $tmp_Compra ->producto->costo_producto}}</td>
                                                    <td>{{ $costo =$tmp_Compra ->cantidad_compra *   $tmp_Compra ->producto->costo_producto}}</td>
                                                    <td>
    
                                                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{$tmp_Compra ->id}}">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                    
                                                    </td>
                                                </tr>
                                                @php
                                                    $total_cantidad += $tmp_Compra->cantidad_compra;
                                                    $total_compra +=$costo ;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot style="text-align: center">
                                            <tr>
                                                <td colspan="2" > <b>Total de cantidad:</b></td>
                                                <td>
                                                    {{$total_cantidad}}
                                                </td>

                                                <td colspan="2" > <b>Total de compra:</b></td>
                                                <td>
                                                    $ {{$total_compra}} pesos MXN
                                                </td>
                                            </tr>
                                            
                                
                                        </tfoot>
                                            
                                    </table>
                                </div>

                                

                            </div>
                            
                            <div class="col-md-4">
                                <div class="row">

                                    <div class="col-md-7">
                                        
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-search"></i> Buscar proveedor</button>

                                        {{-- Modal para el buscador --}}
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Listado de Productos</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table  class="table table-striped table-bordered table-hover table-responsive">
                                                        <thead>
                                                            <tr style="text-align: center">
                                                                <td><b>Nro</b></td>
                                                                <td><b>Accion</b></td>
                                                                <td><b>Empresa</b></td>
                                                                <td><b>Telefono</b></td>
                                                                <td><b>correo Electronico</b></td>
                                                                
                                                            </tr>
                                                        </thead>
                                                            <tbody style="text-align: center" >
                                                                <?php $contador=1; ?>
                                                                @foreach ($proveedores as $proveedore)
                                                                    <tr>    
                                                                        <td>{{ $contador++}}</td>
                                                                        <td>
                                                                            <button class="btn btn-info seleccionar-btn-proveedor" data-id="{{$proveedore->id}}" data-empresa="{{$proveedore->empresa}}" type="button">Seleccionar</button>
                                                                        </td>

                                                                        <td>{{ $proveedore ->empresa}}</td>
                                                                        <td >
                                                                            <a href="https://wa.me/{{ $proveedore->telefono_proveedor }}"
                                                                                class="btn btn-success"><i class="bi bi-telephone-fill"></i> {{ $proveedore ->telefono_proveedor}}</a>
                                                                            
                                                                        </td>
                                                                        <td>{{ $proveedore ->correo_electronico}}</td>
                                        
                                                                        
                                                                    <tr>      
                                                                @endforeach
                                                            </tbody> 
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="empresa_proveedor" disabled>
                                        <input type="text" name="proveedor_id" class="form-control" id="id_proveedor"  hidden >
                                    </div>
                                </div>
                                <br>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Fecha de compra: </label> <b>*</b>
                                            <input type="date" class="form-control" name="fecha_compra"  value="{{old('fecha_compra')}}">
                                            @error('fecha_compra')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Comprobante: </label> <b>*</b>
                                            <input type="text" class="form-control" name="comprobante_compra"  value="{{old('comprobante_compra')}}">
                                            @error('comprobante_compra')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group" style="text-align: center">
                                            <label for="">Total de compra: </label> <b></b>
                                            <input type="text" class="form-control" name="precio_total"  value="{{$total_compra}}" style="background-color:#ffea1c;  text-align: center;" >
                                            @error('precio_total')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>

                                <div class="row">
                                    <div class="col-md-12" style="font-size: 15px;">
                                        <div class="form group">
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Registrar compra</button>
                                            <a href="{{'/admin/compras'}}" class="btn btn-danger">Cancelar</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
        
                        
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.seleccionar-btn-proveedor').click(function(){
            var id_proveedor = $(this).data('id');
            var empresa = $(this).data('empresa');
            $('#empresa_proveedor').val(empresa);
            $('#id_proveedor').val(id_proveedor);
            $('#exampleModal2').modal('hide');
            
        });

        $('.seleccionar-btn').click(function(){
            var id_producto = $(this).data('id');
            $('#codigo_producto').val(id_producto);
            $('#exampleModal').modal('hide');
            $('#exampleModal').on('hidden.bs.modal',function(){
                $('#codigo_producto').focus();
            });
        });

        $('.delete-btn').click(function(){
            var id = $(this).data('id');
            if (id) {
                $.ajax({
                        url: "{{url('/admin/compras/create/tmp')}}/"+id,
                        type: "POST",
                        data: {
                            _token: '{{csrf_token()}}',
                            _method: 'DELETE',
                        },
                        success:function (response) {
                            if(response.success){
                                Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Se elimino el producto(s)",
                                showConfirmButton: false,
                                timer: 1500
                                });
                                location.reload();
                            }else{
                                alert('no se elimino correctamente');
                            }
                        },
                        error:function(error){
                            alert(error);
                        }
                    });

            }
        });


        $('#codigo_producto').focus();
        $('#form_compra').on('keypress',function(e){
            if (e.keyCode === 13) {
                e.preventDefault();
            }
        });
        $('#codigo_producto').on('keyup',function(e){
            if (e.which === 13) {
                var codigo_producto = $(this).val();
                var cantidad_compra = $('#cantidad_compra').val();
                if(codigo_producto.length > 0){
                    $.ajax({
                        url: "{{route('admin.compras.tmp_compras')}}",
                        method: "POST",
                        data: {
                            _token: '{{csrf_token()}}',
                            codigo_producto: codigo_producto,
                            cantidad_compra: cantidad_compra
                        },
                        success:function (response) {
                            if(response.success){
                                Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Se registro el producto",
                                showConfirmButton: false,
                                timer: 1500
                                });
                                location.reload();
                            }else{
                                alert('no se econtro');
                            }
                        },
                        error:function(error){
                            alert(error);
                        }
                    });
                }
            }

        });
    </script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de TOTAL Productos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                    "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Productos",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true, "lengthChange": true, "autoWidth": false,
                buttons: [{
                    
                    
                    
                    
                },
                    {
                        extend: 'colvis',
                        text: 'Visor de columnas',
                        collectionLayout: 'fixed three-column'
                    }
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection