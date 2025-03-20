@extends('layouts.admin')
@section('title')
Clientes
@endsection
@section('content')
    <h4 class="m-0">Arqueos</h4>
    <br><hr>
    <div class="row">
        <div class="col-md-12" style="font-size: 15px;">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Arqueos Registrados</h3>
                    <div class="card-tools">

                        @if($arqueoAbierto) 
                        
                            
                        @else

                        <a href="{{url('/admin/arqueos/create')}}" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Registrar
                        </a>

                       
                        @endif


                        

                    </div>
                </div>
                <div class="card-body" >
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <td><b>Nro</b></td>
                                <td><b>Fecha de apertura</b></td>
                                <td><b>Fecha de cierre</b></td>
                                <td><b>Monto inicial</b></td>
                                <td><b>Monto final</b></td>
                                <td><b>Descripcion</b></td>
                                <td><b>Movimietos</b></td>
                                <td><b>Accionnes</b></td>
                            </tr>
                        </thead>
                            <tbody style="text-align: center" >
                                <?php $contador=1; ?>
                                @foreach ($arqueos as $arqueo)
                                    <tr>    
                                        <td>{{ $contador++}}</td>
                                        <td>{{ $arqueo ->fecha_apertura}} </td>
                                        <td>{{ $arqueo ->fecha_cierre}}</td>
                                        <td>{{ $arqueo ->monto_inicial}}</td>
                                        <td>{{ $arqueo ->monto_final}}</td>
                                        <td>{{ $arqueo ->descripcion}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <b>ingresos</b>
                                                    {{$arqueo->total_ingresos}}
                                                </div>
                                                <div class="col-md-6">
                                                    <b>Egresos</b>
                                                    {{$arqueo->total_egresos}}
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/admin/arqueos/'.$arqueo->id)}}" type="button" class="btn btn-info btn-sms"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{url('/admin/arqueos/'.$arqueo->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{url('/admin/arqueos/'.$arqueo->id.'/ingreso-egreso')}}" type="button" class="btn btn-secondary btn-sm"><i class="bi bi-unlock-fill"></i></a>

                                                <a href="{{url('/admin/arqueos/'.$arqueo->id.'/cierre')}}" type="button" class="btn btn-secondary btn-sm"><i class="bi bi-lock-fill"></i></a>

                                                
                                                <a href="{{url('/admin/arqueos/'.$arqueo->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de TOTAL Arqueos",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Arqueos",
                                    "infoFiltered": "(Filtrado de _MAX_ total Arqueos)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Arqueos",
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

