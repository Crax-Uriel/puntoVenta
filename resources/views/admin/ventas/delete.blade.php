@extends('layouts.admin')
@section('title')
Ventas
@endsection
@section('content')
<br>
    <h4 class="m-0">Eliminar Venta</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">Ingrese los datos</h3>
                </div>
                {{-- form_venta --}}
                <form action="{{url('/admin/ventas',$venta->id)}}" method="POST" id="form_venta" >
                    @csrf
                    @method('DELETE')

                    <div class="card-body">
                        <div class="row">
                            <input type="text" value="{{$venta->id}}" id="venta_id" name="venta_id" hidden>

                            <div class="col-md-8">

                                
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
                                                    $ {{$total_venta}} pesos MXN
                                                </td>
                                            </tr>
                                            
                                
                                        </tfoot>
                                            
                                    </table>
                                </div>

                                

                            </div>
                            
                            <div class="col-md-4">
                                
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
                                            <input type="date" class="form-control" name="fecha_venta"  value="{{old('fecha_venta',$venta->fecha_venta)}}" disabled>
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
                                            <input type="text" class="form-control" name="precio_total"  value="{{$total_venta}}" style="background-color:#ffea1c;  text-align: center;" disabled>
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
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-floppy-fill"></i> Eliminar Venta</button>
                                            <a href="{{'/admin/ventas'}}" class="btn btn-secondary">Cancelar</a>
                                            
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