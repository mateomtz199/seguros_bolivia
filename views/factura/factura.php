<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Factura</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(5) {
            text-align: left;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #0275d8;
            border-bottom: 1px solid #0275d8;
            font-weight: bold;
            color: white;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td {
            border-top: 2px solid #0275d8;
            font-weight: bold;
            font-size: 20px;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="public/seguro.png" style="width: 100%; max-width: 200px" />
                            </td>

                            <td>
                                Factura #: <?php echo $p["id"]; ?><br />
                                Creado: <?php echo $p["fecha_pago"]; ?><br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Seguros Bolivia S. A<br />
                                CP: 12343, Bolivia<br />
                                Calle La Asunción, No. 213
                            </td>

                            <td>
                                <?php echo $p["nombre"] . " " . $p["apellidos"]; ?><br />
                                <?php echo $p["direccion"]; ?><br />
                                <?php echo $p["telefono"]; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <table>
            <tr class="heading">
                <td>Cantidad</td>
                <td>Unidad</td>
                <td>Descripción</td>
                <td>Precio unitario</td>
                <td>Importe</td>
            </tr>
            <tr class="item">
                <td><?php echo $p["nmes"]; ?></td>
                <td>Meses</td>
                <td>Pago de <?php echo $p["plan"]; ?>, vence el <?php echo $p["mes_pago"]; ?></td>
                <td><?php echo $p["precio"]; ?></td>
                <td>$ <?php echo $p["nmes"] * $p["precio"]; ?></td>
            </tr>
            <tr class="item last">
                <td><?php echo $p["ndependientes"]; ?></td>
                <td>Asegurados</td>
                <td>Pago de mensualidad de dependientes</td>
                <td><?php echo $p["precio_dependiente"]; ?></td>
                <td>$ <?php echo $p["ndependientes"] * $p["precio_dependiente"]; ?></td>
            </tr>
            <tr class="total">
                <td>Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    $ <?php echo $p["cantidad_pagada"]; ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>