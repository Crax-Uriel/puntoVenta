@extends('layouts.admin')
@section('title')
    Productos
@endsection
@section('content')
    <h4 class="m-0">Proveedores</h4>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Proveedores Registrados</h3>
                    <div class="card-tools">

                        <a href="{{url('/admin/proveedores/reporte')}}" target="_blank" class="btn btn-danger" >
                            <i class="fa fa-file-pdf"></i> Reporte
                        </a>
                        <a href="{{url('/admin/proveedores/create')}}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Registrar
                        </a>
                    </div>
                </div>
                <div class="card-body" >
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Nombre Proveedor</b></td>
                                <td><b>Empresa</b></td>
                                <td><b>Telefono</b></td>
                                <td><b>correo Electronico</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                            <tbody style="text-align: center" >
                                <?php $contador=1; ?>
                                @foreach ($proveedores as $proveedore)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $proveedore ->nombre_proveedor}}</td>
                                        <td>{{ $proveedore ->empresa}}</td>
                                        <td >
                                            <a href="https://wa.me/{{ $proveedore->telefono_proveedor }}"
                                                class="btn btn-success"><i class="bi bi-telephone-fill"></i> {{ $proveedore ->telefono_proveedor}}</a>
                                            
                                        </td>
                                        <td>{{ $proveedore ->correo_electronico}}</td>
                                        
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/proveedores/'.$proveedore->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/proveedores/'.$proveedore->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/proveedores/'.$proveedore->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de TOTAL Proveedores",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                                    "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Proveedores",
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

