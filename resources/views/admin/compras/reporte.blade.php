<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte - Listado de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border: #41aadb;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
            text-align: center
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #05395d;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #0004d3;
        }

        .page-number::before{
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
        .registros{
            border: 1px solid #51b5e4; /* Corregido */

        }

        
    </style>

</head>
<body>
    <table style="font-size: 8pt">
        <tr style="text-align: center">
            <td>
                La Educadora<br>
                Felipe Villanueva 718C, Col. Morelos, 50120 Toluca de Lerdo, Méx.<br>
                +52 7221665362<br>
            </td>
            <td width="320px"></td>
            <td>
                <img src="{{ public_path('img/logo_educadora.png') }}" style="width: 150px; height: auto;">
            </td>
        </tr>
    </table>

    <h2><b><u>Listado de Compras</u></b></h2>
    <br>
    <p id="fecha-hora"> 
        Generado el {{ date('d-m-Y') }} a las {{ date('H:i') }}
        </p>

    <table>
        <thead>
            <tr>
                <th><b>Nro</b></th>
                <th><b>Fecha de la compra</b></th>
                <th><b>Comprobante</b></th>
                <th><b>Productos adquiridos</b></th>
                <th><b>Total de la compra</b></th>
                <th><b>Fecha y hora de compra</b></th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            <?php $contador=1; $suma_total =0; ?>
            @foreach ($compras as $compra)
            @php
            $suma_total += $compra ->precio_total;
            @endphp

                <tr class="registros">
                    <td>{{ $contador++ }}</td>
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
                    <td>{{ $compra ->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>
        <b>Total en compras: {{$suma_total}} </b>
    </p>
    <div class="footer">
        Impreso por: {{ Auth::user()->name }} <br>
        <small class="page-number"></small>

    </div>
   
</body>
</html>
