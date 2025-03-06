@extends('layouts.admin')
@section('title')
    Productos
@endsection
@section('content')
    <h4 class="m-0">Productos</h4>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Productos Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/productos/create')}}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Registrar
                        </a>
                    </div>
                </div>
                <div class="card-body" >
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Codigo</b></td>
                                <td><b>Imagen</b></td>
                                <td><b>Producto</b></td>
                                <td><b>Descripcion</b></td>
                                <td ><b>Stock</b></td>
                                <td><b>Costo</b></td>
                                <td><b>Precio</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                            <tbody style="text-align: center" >
                                <?php $contador=1; ?>
                                @foreach ($productos as $producto)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $producto ->codigo_producto}}</td>
                                        <td>
                                            <img src="{{url('storage/'.$producto->imagen)}}" alt="Producto" width="100px">
                                        </td>
                                        <td>{{ $producto ->nombre_producto}}</td>
                                        <td>{{ $producto ->descripcion_producto}}</td>
                                        <td style="background-color: rgba(243, 255, 76, 0.333)">{{ $producto ->stock_producto}}</td>
                                        <td>{{ $producto ->costo_producto}}</td>
                                        <td>{{ $producto ->precio_producto}}</td>
                                        
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/productos/'.$producto->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/productos/'.$producto->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/productos/'.$producto->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                    </table>
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
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
                                    {
                                        extend: 'colvis',
                                        text: 'Mostrar columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>
                    
            </div>
            </div>
        </div>
    </div>
@endsection

