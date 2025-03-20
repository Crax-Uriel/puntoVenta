@extends('layouts.admin')
@section('content')
<br>
    <h1 class="m-0" style="font-size: 30px;">Arqueo</h1>
    <br>
    <div class="row">
        <div class="col-md-4" style="font-size: 15px;">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos ingresados</h3>
                </div>
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Fecha de apertura: </label> <b>*</b>
                                    <p> {{$arqueo->fecha_apertura}} </p>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Fecha de cierre: </label> 
                                    <p> {{$arqueo->fecha_cierre}} </p>
                                    
                                </div>
                            </div>

                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Monto inicial: </label> 
                                    <p> {{$arqueo->monto_inicial}} </p>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Monto final: </label> 
                                    <p> {{$arqueo->monto_final}} </p>
                                    
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="">Descripcion: </label> 
                                    <p> {{$arqueo->descripcion}} </p>
                                    
                                </div>
                            </div>
                        </div>
                        <br>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{'/admin/arqueos'}}" class="btn btn-danger">Cancelar</a>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>


        <div class="col-md-4" style="font-size: 15px;">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Ingresos</h3>
                </div>
                
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered table-sm table-striped table-hover">
                                <thead style="text-align: center" >
                                    <tr>
                                        <th>Nro</th>
                                        <th>Detalle</th>
                                        <th>Monto</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center" >
                                    <?php $contador=1; $suma_monto=0; ?>
                                    @foreach ($movimientos as $movimiento)
                                        @if ($movimiento->tipo == "Ingreso")
                                            @php
                                                $suma_monto += $movimiento->monto;
                                                
                                            @endphp
                                            <tr>
                                                <td>{{ $contador++}}</td>
                                                <td> {{$movimiento->descripcion}} </td>
                                                <td>{{$movimiento->monto}} </td>
                                            </tr>
                                            
                                        @endif
                                        
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr style="text-align: center">
                                        <td colspan="2"> <b>Total:</b> </td>
                                        <td> <b>{{$suma_monto}}</b> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        
                        </div>
                    </div>
            </div>
        </div>



        <div class="col-md-4" style="font-size: 15px;">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Egresos</h3>
                </div>
                
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered table-sm table-striped table-hover">
                                <thead style="text-align: center" >
                                    <tr>
                                        <th>Nro</th>
                                        <th>Detalle</th>
                                        <th>Monto</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center" >
                                    <?php $contador=1; $suma_monto=0; ?>
                                    @foreach ($movimientos as $movimiento)
                                        @if ($movimiento->tipo == "Egreso")
                                            @php
                                                $suma_monto += $movimiento->monto;
                                                
                                            @endphp
                                            <tr>
                                                <td>{{ $contador++}}</td>
                                                <td> {{$movimiento->descripcion}} </td>
                                                <td>{{$movimiento->monto}} </td>
                                            </tr>
                                            
                                        @endif
                                        
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr style="text-align: center">
                                        <td colspan="2"> <b>Total:</b> </td>
                                        <td> <b>{{$suma_monto}}</b> </td>
                                    </tr>
                                </tfoot>
                            </table>
                        
                        </div>
                    </div>
            </div>
        </div>

    </div>



       

@endsection