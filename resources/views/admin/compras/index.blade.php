@extends('layouts.admin')
@section('title')
    Compras
@endsection
@section('content')
    <h4 class="m-0">Compras</h4>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Compras Registradas</h3>
                    <div class="card-tools">

                        @if($arqueoAbierto) 
                        <a href="{{url('/admin/compras/create')}}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Registrar
                        </a>
                            
                        @else
                        <a href="{{url('/admin/arqueos/create')}}" class="btn btn-danger">
                            <i class="bi bi-plus-lg"></i>Abrir caja
                        </a>
                        @endif


                        
                    </div>
                </div>
                <div class="card-body" >
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Fecha de la compra</b></td>
                                <td><b>Comprobante</b></td>
                                <td><b>Productos adquiridos</b></td>
                                {{-- <td><b>Cantidad de la compra</b></td> --}}
                                <td><b>Total de la compra</b></td>
                                <td><b>Acciones</b></td>
                            </tr>
                        </thead>
                            <tbody style="text-align: center" >
                                <?php $contador=1; ?>
                                @foreach ($compras as $compra)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $compra ->fecha_compra}}</td>
                                        <td>{{ $compra ->comprobante_compra}}</td>
                                        <td>
                                            <ul>
                                                @foreach ($compra->detalles as $detalle)
                                                    <li>
                                                        {{$detalle->producto->nombre_producto.' - '.$detalle->cantidad_compra.' unidades'}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $compra ->precio_total}}</td>
                                        
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/compras/'.$compra->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/compras/'.$compra->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/compras/'.$compra->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de TOTAL Compras",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
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

