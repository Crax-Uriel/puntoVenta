@extends('layouts.admin')
@section('title')
        Compras
@endsection
@section('content')
<br>
    <h4 class="m-0">Eliminar de la Compra: {{$compra->fecha_compra}}</h4>
    <br>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 17px;">¿Desea eliminar esta compra?</h3>
                </div>
                <form action="{{url('/admin/compras',$compra->id)}}" method="POST" id="form_compra" >
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">
                            <input type="text" value="{{$compra->id}}" id="compra_id" name="compra_id" hidden>

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
                                            <?php $contador=1; $total_cantidad=0; $total_compra=0; ?>
                                            @foreach ($compra->detalles as $detalle)
                                                
                                                <tr>
                                                    <td>{{ $contador++}}</td>
                                                    <td>{{ $detalle->producto->codigo_producto}}</td>
                                                    <td>{{ $detalle->cantidad_compra}}</td>
                                                    <td>{{ $detalle->producto->nombre_producto}}</td>
                                                    <td>{{ $detalle->producto->costo_producto}}</td>
                                                    <td>{{ $costo =$detalle ->cantidad_compra *   $detalle ->producto->costo_producto}}</td>
                                                    
                                                </tr>
                                                @php
                                                    $total_cantidad += $detalle->cantidad_compra;
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

                                    
                                    <div class="col-md-12">
                                        <label for="">Proveedor: </label>
                                        <input type="text" class="form-control" id="empresa_proveedor" disabled value="{{$compra->proveedor->empresa}}">
                                        <input type="text" name="proveedor_id" class="form-control" id="id_proveedor" hidden value="{{$compra->proveedor->id}}" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Fecha de compra: </label> <b>*</b>
                                            <input type="date" class="form-control" name="fecha_compra"  value="{{$compra->fecha_compra}}" disabled>
                                            @error('fecha_compra')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Comprobante: </label> <b>*</b>
                                            <input type="text" class="form-control" name="comprobante_compra"  value="{{$compra->comprobante_compra}}" disabled>
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
                                            <input type="text" class="form-control" name="precio_total"  value="{{$total_compra}}" style="background-color:#ffea1c;  text-align: center;" disabled>
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
                                        <div class="form group" >
                                            <button type="submit" class="btn btn-danger"> Eliminar compra</button>
                                            <a href="{{'/admin/compras'}}" class="btn btn-secondary" >Cancelar</a>
                                            
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
                        url: "{{url('/admin/compras/detalle')}}/"+id,
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
                                title: "Se elimino el producto",
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
                var compra_id = $('#compra_id').val();
                var id_proveedor = $('#id_proveedor').val();

                if(codigo_producto.length > 0){
                    $.ajax({
                        url: "{{route('admin.detalle.compras.store')}}",
                        method: "POST",
                        data: {
                            _token: '{{csrf_token()}}',
                            codigo_producto: codigo_producto,
                            cantidad_compra: cantidad_compra,
                            compra_id: compra_id,
                            id_proveedor: id_proveedor
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
                                alert('no se encontro');
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
                    "info": "Mostrando _START_ a _END_ de TOTAL Compras",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Compras",
                    "infoFiltered": "(Filtrado de _MAX_ total Compras)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Compras",
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