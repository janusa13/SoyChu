<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>
    <style type="text/css">
        * {
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .bill-container {
            width: 750px;
            margin: auto;
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 13px;
        }
        .bill-emitter-row td {
            width: 50%;
            border-bottom: 1px solid;
            padding: 10px;
            vertical-align: top;
        }
        .bill-type {
            border: 1px solid;
            margin-right: -30px;
            background: white;
            width: 60px;
            height: 50px;
            text-align: center;
            font-size: 40px;
            font-weight: 600;
        }
        .text-lg {
            font-size: 30px;
        }
        .text-center {
            text-align: center;
        }
		.bill-row td{
			padding-top: 5px
		}

		.bill-row td > div{
			border-top: 1px solid; 
			border-bottom: 1px solid; 
			margin: 0 -1px 0 -2px;
			padding: 0 10px 13px 10px;
		}
        .row-details table {
            border-collapse: collapse;
            width: 100%;
        }
        .row-details table td {
            padding: 5px;
        }
        .row-details table tr:nth-child(1) {
            border-top: 1px solid;
            border-bottom: 1px solid;
            background: #c0c0c0;
            font-weight: bold;
            text-align: center;
        }
        .row-details table tr + tr {
            border-top: 1px solid #c0c0c0;
        }
        .text-right {
            text-align: right;
        }
        .total-row td {
            border-width: 2px;
        }
    </style>
</head>
<body>
    <table class="bill-container">
        <tr class="bill-emitter-row">
            <td>
                <div class="bill-type">
                    B
                </div>
                <div class="text-lg text-center">
                    SoyChu
                </div>
                <p><strong>Razón social:</strong> SoyChu</p>
                <p><strong>Domicilio Comercial:</strong> Bulevard Daneri</p>
                <p><strong>Condición Frente al IVA:</strong> Responsable inscripto</p>
            </td>
            <td>
                <div>
                    <div class="text-lg">
                        Factura
                    </div>
                    <div class="row">
                        <p class="col-6">
                            <strong>Punto de Venta:</strong> 01
                        </p>
                        <p class="col-6">
                            <strong>Comp. Nro:</strong> 000002
                        </p>
                    </div>
                    <p><strong>Fecha de Emisión:</strong> 15/08/2024</p>
                    <p><strong>CUIT:</strong> 202020202</p>
                    <p><strong>Ingresos Brutos:</strong> 202020202</p>
                    <p><strong>Fecha de Inicio de Actividades:</strong> 01/02/1999</p>
                </div>
            </td>
        </tr>
        <tr class="bill-row">
            <td colspan="2">
                <div class="row">
                    <p class="col-4">
                        <strong>Período Facturado Desde:</strong> 25/10/2023
                    </p>
                    <p class="col-3">
                        <strong>Hasta:</strong> 25/10/2023
                    </p>
                    <p class="col-5">
                        <strong>Fecha de Vto. para el pago:</strong> 25/10/2023
                    </p>
                </div>
            </td>
        </tr>
        <tr class="bill-row">
            <td colspan="2">
                <div>
                    <div class="row">
                        <p class="col-4">
                            <strong>CUIL/CUIT:</strong> {{ $cliente->cuit }}
                        </p>
                        <p class="col-8">
                            <strong>Apellido y Nombre / Razón social:</strong> {{ $cliente->nombre }}
                        </p>
                    </div>
                    <div class="row">
                        <p class="col-6">
                            <strong>Condición Frente al IVA:</strong> Consumidor final
                        </p>
                        <p class="col-6">
                            <strong>Domicilio:</strong> {{ $cliente->calleYNumero }}
                        </p>
                    </div>
                    <p>
                        <strong>Condición de venta:</strong> {{ $factura->categoriaIVA }}
                    </p>
                </div>
            </td>
        </tr>
        <tr class="bill-row row-details">
            <td colspan="2">
                <div>
                    <table>
                        <tr>
                            <td>Código</td>
                            <td>Producto / Servicio</td>
                            <td>Cantidad</td>
                            <td>U. Medida</td>
                            <td>Precio Unit.</td>
                            <td>% Bonif.</td>
                            <td>Imp. Bonif.</td>
                            <td>Subtotal</td>
                        </tr>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->producto->id }}</td>
                            <td>{{ $producto->producto->descripcion }}</td>
                            <td>{{ $producto->kilos_por_unidad }}</td>
                            <td>Unidad</td>
                            <td>{{ $producto->precio }}</td>
                            <td>no def.</td>
                            <td>no def.</td>
                            <td>{{ $producto->precio * $producto->cantidad_cj }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </td>
        </tr>
        <tr class="bill-row total-row">
            <td colspan="2">
                <div>
                    <div class="row text-right">
                        <p class="col-6">
                            <strong>Total:</strong>
                        </p>
                        <p class="col-6">
                            <strong>{{ $factura->facturaTotal }}</strong>
                        </p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
