@extends('layouts.admin')
@section('title')
Ventas
@endsection
@section('content')
<br>
    <h4 class="m-0">Actulizar Venta</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {{-- form_venta --}}
                <form action="{{url('/admin/ventas',$venta->id)}}" method="POST" id="form_venta" >
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <input type="text" value="{{$venta->id}}" id="venta_id" name="venta_id" hidden>

                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form group">
                                            {{-- name="cantidad_compra" --}}
                                            <label for="">Cantidad: </label> <b>*</b>
                                            <input type="number" class="form-control" value="1" style="text-align: center; background-color:bisque" id="cantidad_compra">
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
                                                        <table id="example" class="table table-striped table-bordered table-hover table-responsive">
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
                                            <?php $contador=1; $total_cantidad=0; $total_venta=0; ?>
                                            @foreach ($venta->detallesVenta as $detalle)
                                                
                                                <tr>
                                                    <td>{{ $contador++}}</td>
                                                    <td>{{ $detalle ->producto->codigo_producto}}</td>
                                                    <td>{{ $detalle ->cantidad_compra}}</td>
                                                    <td>{{ $detalle ->producto->nombre_producto}}</td>
                                                    <td>{{ $detalle ->producto->precio_producto}}</td>
                                                    <td>{{ $costo =$detalle ->cantidad_compra *   $detalle ->producto->precio_producto}}</td>
                                                    <td>
    
                                                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{$detalle ->id}}">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                    
                                                    </td>
                                                </tr>
                                                @php
                                                    $total_cantidad += $detalle->cantidad_compra;
                                                    $total_venta +=$costo ;
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
                                                    $ {{$total_venta}} pesos MXN
                                                </td>
                                            </tr>
                                            
                                
                                        </tfoot>
                                            
                                    </table>
                                </div>

                                

                            </div>
                            
                            <div class="col-md-4">
                                <div class="row">

                                    <div class="col-md-12">
                                        
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-search"></i> Buscar Cliente</button>
                                        
                                        {{-- boton para gregar clientes --}}
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal_crear_cliente"><i class="fa fa-plus"></i></button>

                                        {{-- modal para agregar cliente --}}
                                        <div class="modal fade" id="exampleModal_crear_cliente" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Registrar nuevo Cliente</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form group">
                                                                <label for="">Nombre del Cliente: </label> <b>*</b>
                                                                <input type="text" class="form-control"  value="{{old('nombre_cliente')}}" id="nombre_cliente" >
                                                                @error('nombre_cliente')
                                                                    <small style="color: red">{{$message}}</small>
                                                                @enderror
                                                                {{-- {!! BootForm::text(': * ', 'nombre_cliente')!!} --}}
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form group">
                                                                <label for="">Apellido paterno: </label> <b>*</b>
                                                                <input type="text" class="form-control" value="{{old('apellido_paterno_cliente')}}" id="apellido_paterno_cliente">
                                                                @error('apellido_paterno_cliente')
                                                                    <small style="color: red">{{$message}}</small>
                                                                @enderror

                                                                {{-- {!! BootForm::text('Apellido paterno: *', 'apellido_paterno_cliente')!!} --}}
                                                                
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-md-6">
                                                            <div class="form group">
                                                                <label for="">Apellido materno: </label> <b>*</b>
                                                                <input type="text" class="form-control" value="{{old('apellido_materno_cliente')}}" id="apellido_materno_cliente">
                                                                @error('apellido_materno_cliente')
                                                                    <small style="color: red">{{$message}}</small>
                                                                @enderror

                                                                {{-- {!! BootForm::text('Apellido materno: ', 'apellido_materno_cliente')!!} --}}
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form group">
                                                                <label for="">RFC: </label> <b>*</b>
                                                                <input type="text" class="form-control" value="{{old('rfc')}}" id="rfc">
                                                                @error('rfc')
                                                                    <small style="color: red">{{$message}}</small>
                                                                @enderror
                                                                {{-- {!! BootForm::text('RFC: *', 'rfc')!!} --}}
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-md-6">
                                                            <div class="form group">
                                                                <label for="">Telefono: </label> <b>*</b>
                                                                <input type="text" class="form-control"  value="{{old('telefono_cliente')}}" id="telefono_cliente">
                                                                @error('telefono_cliente')
                                                                    <small style="color: red">{{$message}}</small>
                                                                @enderror

                                                                {{-- {!! BootForm::text('Telefono: * ', 'telefono_cliente')->maxlength(10) !!} --}}
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form group">
                                                                <label for="">Correo Electronico: </label> <b>*</b>
                                                                <input type="email" class="form-control"  value="{{old('correo_electronico')}}" id="correo_electronico">
                                                                @error('correo_electronico')
                                                                    <small style="color: red">{{$message}}</small>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                    </div>                
                                                    <hr>
                                                    


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" onclick="guardar_cliente()"><i class="bi bi-floppy-fill"></i> Guardar</button>

                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    
                                                </div>
                                                </div>
                                            </div>
                                        </div>



                                        {{-- Modal para el buscador de cleintes --}}
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Listado de Clientes</h5>
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
                                                                <td><b>Nombre del Cliente</b></td>
                                                                <td><b>RFC</b></td>
                                                                <td><b>Telefono</b></td>
                                                                <td><b>Correo electronico</b></td>
                                                                
                                                            </tr>
                                                        </thead>
                                                            <tbody style="text-align: center" >
                                                                <?php $contador=1; ?>
                                                                @foreach ($clientes as $cliente)
                                                                    <tr>    
                                                                        <td>{{ $contador++}}</td>
                                                                        <td>
                                                                            <button class="btn btn-info seleccionar-btn-cliente" data-id="{{$cliente->id}}" data-nomcliente="{{ $cliente ->nombre_cliente}} {{ $cliente ->apellido_paterno_cliente}} {{ $cliente ->apellido_materno_cliente}}" data-rfc="{{$cliente->rfc}}" type="button">Seleccionar</button>
                                                                        </td>

                                                                        <td>{{ $cliente ->nombre_cliente}} {{ $cliente ->apellido_paterno_cliente}} {{ $cliente ->apellido_materno_cliente}} </td>
                                                                        <td>{{ $cliente ->rfc}}</td>
                                                                        <td>{{ $cliente ->telefono_cliente}}</td>
                                                                        <td>{{ $cliente ->correo_electronico}}</td>
                                                                        
                                        
                                                                
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
                                    
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="">Nombre del Cliente</label> <b>*:</b>

                                        <input type="text" class="form-control" id="ncliente" disabled value="{{ $venta->cliente ? $venta->cliente->nombre_cliente . ' ' . $venta->cliente->apellido_paterno_cliente . ' ' . $venta->cliente->apellido_materno_cliente : 'S/N' }}">

                                        <input type="text" name="cliente_id" class="form-control" id="id_cliente"  hidden value="{{$venta->cliente->id ?? ''}}" >
                                    </div>

                                    <div class="col-md-5">
                                        <label for="">RFC</label> <b>*:</b>
                                        <input type="text" class="form-control" id="rfc_cliente" disabled value="{{$venta->cliente->rfc ?? '0'}}">
                                    </div>


                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Fecha de la venta: </label> <b>*</b>
                                            <input type="date" class="form-control" name="fecha_venta"  value="{{old('fecha_venta',$venta->fecha_venta)}}">
                                            @error('fecha_venta')
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
                                            <input type="text" class="form-control" name="precio_total"  value="{{$total_venta}}" style="background-color:#ffea1c;  text-align: center;" >
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
                                            <button type="submit" class="btn btn-warning"><i class="bi bi-floppy-fill"></i> Actualizar Venta</button>
                                            <a href="{{'/admin/ventas'}}" class="btn btn-danger">Cancelar</a>
                                            
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
        function guardar_cliente(){
            const data={
                nombre_cliente: $('#nombre_cliente').val(),
                apellido_paterno_cliente: $('#apellido_paterno_cliente').val(),
                apellido_materno_cliente: $('#apellido_materno_cliente').val(),
                rfc: $('#rfc').val(),
                telefono_cliente: $('#telefono_cliente').val(),
                correo_electronico: $('#correo_electronico').val(),
                _token: '{{csrf_token()}}'
            };
            //alert("Hola");
            $.ajax({
                url: '{{route("admin.ventas.cliente.store")}}',
                        type: "POST",
                        data: data,
                        success: function(response){
                            if(response.success){
                                Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Se agrego el cliente",
                                showConfirmButton: false,
                                timer: 1900
                                });
                                location.reload();
                            }else{
                                alert('Error no se registro el cliente ');
                            }

                        },
                        error: function(xhr , status , error){
                            alert('error, no se pudo registrar al cliente');
                        }
            });
        }




        $('.seleccionar-btn-cliente').click(function(){
            var id_cliente = $(this).data('id');
            var nomcliente = $(this).data('nomcliente');
            var rfc = $(this).data('rfc');
            $('#ncliente').val(nomcliente);
            $('#rfc_cliente').val(rfc);
            $('#id_cliente').val(id_cliente);
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
                        url: "{{url('/admin/ventas/detalle')}}/"+id,
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
                                alert('No se elimino correctamente');
                            }
                        },
                        error:function(error){
                            alert(error);
                        }
                    });

            }
        });


        $('#codigo_producto').focus();
        $('#form_venta').on('keypress',function(e){
            if (e.keyCode === 13) {
                e.preventDefault();
            }
        });
        $('#codigo_producto').on('keyup',function(e){
            if (e.which === 13) {
                var codigo_producto = $(this).val();
                var cantidad_compra = $('#cantidad_compra').val();
                var venta_id = $('#venta_id').val();
                if(codigo_producto.length > 0){
                    $.ajax({
                        url: "{{route('admin.detalle.ventas.store')}}",
                        method: "POST",
                        data: {
                            _token: '{{csrf_token()}}',
                            codigo_producto: codigo_producto,
                            venta_id: venta_id,
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
            $("#example").DataTable({
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
                "responsive": true, "lengthChange": false, "autoWidth": false,
                buttons: [{
                    
                    
                    
                    
                },
                    {
                        extend: 'colvis',
                        text: 'Visor de columnas',
                        collectionLayout: 'fixed three-column'
                    }
                ],
            }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection