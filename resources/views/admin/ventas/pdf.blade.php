<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Reporte - Venta</title>
    <style>
        .content-body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        table.table-content {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        th.table-header, td.table-data {
            padding: 8px;
            text-align: center;
        }

        th.table-header {
            background-color: #05395d;
            color: white;
        }

        tr.even-row {
            background-color: #f2f2f2;
        }

        tr.row-hover:hover {
            background-color: #ddd;
        }

        .page-number::before {
            content: "Pagina" counter(page);
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            background: #f0f0f0;
            text-align: center;
            line-height: 30px;
            font-size: 12px;
            border-top: 1px solid #ddd;
        }

    </style>
</head>
<body class="content-body">
    <table class="table-content">
        <tr class="row-hover">
            <td>
                La Educadora<br>
                Felipe Villanueva 718C, Col. Morelos, 50120 Toluca de Lerdo, Méx.<br>
                +52 7221665362<br>
            </td>
            <td width="250px"></td>
            <td>
                <img src="{{ public_path('img/logo_educadora.png') }}" style="width: 150px; height: auto;">
            </td>
        </tr>
    </table>

    <h2 class="title"><b><u>Factura</u></b></h2>
    <br>

    <div style="border: 1px solid #000000;">
        <table class="table-content" border="0" cellpadding="6">
            <tr class="row-hover">
                <td class="table-data">Generada el {{ date('d-m-Y') }} a las {{ date('H:i') }}</td>
                <td style="width: 100px"></td>
                <td class="table-data">RFC:{{$venta->cliente->rfc}}</td>
            </tr>
            <br>
            <tr class="row-hover">
                <td class="table-data">Cliente: {{$venta->cliente->nombre_cliente . ' ' . $venta->cliente->apellido_paterno_cliente . ' ' . $venta->cliente->apellido_materno_cliente}}</td>
            </tr>
        </table>
    </div>

    <p id="fecha-hora"></p>
    <p></p>
    <table class="table table-dark">
        <tr>
            <td style="width: 30px; background-color: #f2f2f2; text-align:center;">Nro</td>
            <td style="width: 150px; background-color: #f2f2f2; text-align:center;">Productos</td>
            <td style="width: 190px; background-color: #f2f2f2; text-align:center;">Descripcion</td>
            <td style="width: 90px; background-color: #f2f2f2; text-align:center;">Cantidad</td>
            <td style="width: 100px; background-color: #f2f2f2; text-align:center;">Precio Unitario</td>
            <td style="width: 90px; background-color: #f2f2f2; text-align:center;">Subtotal</td>

        </tr>
        <tbody style="text-align: center" >
            <?php $contador=1; $subtotal=0; $suma_cantidad=0; $suma_precio_unitario=0; $suma_subtotal=0;?>
            @foreach ($venta->detallesVenta as $detalle)
                @php
                    $suma_cantidad += $detalle->cantidad_compra;
                    $subtotal =$detalle->cantidad_compra * $detalle ->producto->precio_producto ;
                    $suma_subtotal +=$subtotal;
                @endphp
                <tr>    
                    <td>{{ $contador++}}</td>
                    <td>{{ $detalle ->producto->nombre_producto}}</td>
                    <td>{{ $detalle ->producto->descripcion_producto}}</td>
                    <td>{{ $detalle ->cantidad_compra}}</td>
                    <td>$ {{ $detalle ->producto->precio_producto}} MXN</td>
                    <td>$ {{ $subtotal}} MXN</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="background-color: #f2f2f2; text-align:center;">Total cantidad:</td>
                <td style="background-color: #f2f2f2; text-align:center;"> {{$suma_cantidad}} </td>
                <td style=" background-color: #f2f2f2; text-align:center;">Total: </td>
                <td style="background-color: #f2f2f2; text-align:center;">$ {{$suma_subtotal}} MXN</td>
    
            </tr>
        </tbody>  
    </table>

    <P>
        <B>
            Monto a pagar:
        </B>
        {{$venta->precio_total}}
    </P>

    <p style="text-align: center">
        <br><br>
        ----------------------------------------------------------------------------------------------------------------------------------------<br>
        <b>GRACIAS POR SU PREFERENCIA</b>
    </p>

    <div class="footer">
        Impreso por: {{ Auth::user()->name }} <br>
        <small class="page-number"></small>
    </div>
</body>
</html>