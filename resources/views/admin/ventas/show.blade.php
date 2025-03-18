@extends('layouts.admin')
@section('title')
    Ventas
@endsection
@section('content')
<br>
    <h4 class="m-0">Detalle de la venta</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Datos ingresados</h3>
                </div>
                
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">

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
                                                    $ {{$total_venta}} pesos MXN.
                                                </td>
                                            </tr>
                                            
                                
                                        </tfoot>
                                            
                                    </table>

                                    
                                    
                                    
                                    
                                </div>
                                <br>
                                
                                

                            </div>
                            
                            <div class="col-md-4">
                                <div class="row">

                                    <div class="col-md-7">
                                        <label for="">Nombre del Cliente</label> <b>*:</b>
                                        <input type="text" class="form-control" disabled value="{{ $venta->cliente ? $venta->cliente->nombre_cliente . ' ' . $venta->cliente->apellido_paterno_cliente . ' ' . $venta->cliente->apellido_materno_cliente : 'S/N' }}"
                                        >
                                        {{-- <input type="text" name="cliente_id" class="form-control" id="id_cliente"  hidden > --}}
                                    </div>

                                    <div class="col-md-5">
                                        <label for="">RFC</label> <b>*:</b>
                                        <input type="text" class="form-control" id="rfc_cliente" disabled value="{{$venta->cliente->rfc ?? '0'}}">
                                    </div>


                                    
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Fecha de compra:</label> 
                                            <input type="date" class="form-control" name="fecha_venta"  value="{{$venta->fecha_venta}}" disabled>
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
                                            <label for="">Total de compra: </label> <b>
                                            <input type="text" class="form-control" name="precio_total"  value="{{$total_venta}}" style="background-color:#ffea1c; font-weight: bold;  text-align: center;" disabled> </b>
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
                                        <div class="form group" class="col-md-12">
                                            <a href="{{'/admin/ventas'}}" class="btn btn-danger" style="display: block; margin: 0 auto;">Volver</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
        
                        
                    </div>
                    
               
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