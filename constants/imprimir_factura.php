<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
date_default_timezone_set("America/Guayaquil");
require_once "ClassConexion.php";
$dia = date("d");
$mes = date("m");
$anio = date("Y");
$day = date("N");
if ($mes == '01') {
    $mes_text = "Enero";
} elseif ($mes == '02') {
    $mes_text = "Febrero";
} elseif ($mes == '03') {
    $mes_text = "Marzo";
} elseif ($mes == '04') {
    $mes_text = "Abril";
} elseif ($mes == '05') {
    $mes_text = "Mayo";
} elseif ($mes == '06') {
    $mes_text = "Junio";
} elseif ($mes == '07') {
    $mes_text = "Julio";
} elseif ($mes == '08') {
    $mes_text = "Agosto";
} elseif ($mes == '09') {
    $mes_text = "Septiembre";
} elseif ($mes == '10') {
    $mes_text = "Octubre";
} elseif ($mes == '11') {
    $mes_text = "Noviembre";
} elseif ($mes == '12') {
    $mes_text = "Diciembre";
}

if ($day == '1') {
    $day_text = "Lunes";
} elseif ($day == '2') {
    $day_text = "Martes";
} elseif ($day == '3') {
    $day_text = "Miercoles";
} elseif ($day == '4') {
    $day_text = "Jueves";
} elseif ($day == '5') {
    $day_text = "Viernes";
} elseif ($day == '6') {
    $day_text = "Sabado";
} elseif ($day == '7') {
    $day_text = "Domingo";
}

$fecha = "Guayaquil" . " " . $day_text . " " . $dia . " " . "de" . " " . $mes_text . " " . "del " . $anio;

$objConexion = new Conexion();
$conexion = $objConexion->get_Conexion();

$query = "SELECT * FROM GUANABASO.FACTURAS WHERE COD_FACTURA = :COD_FACTURA";
$stmt = $conexion->prepare($query);
$stmt->bindParam(":COD_FACTURA",$_GET["cod_factura"],PDO::PARAM_STR,10);
if (isset($stmt)){
    if ($stmt->execute()){
        $factura = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $codTransaction = $factura[0]["COD_TRANSACCION"];
    }else{
        $codTransaction = 0;
    }
}

$query = null;
$query = "SELECT * FROM GUANABASO.TRANSACCIONES,GUANABASO.PRODUCTOS WHERE COD_TRANSACCION = :COD_TRANSACCION AND PRODUCTOS.COD_PRODUCTO = TRANSACCIONES.COD_PRODUCTO";
$stmt = null;
$stmt = $conexion->prepare($query);
$stmt->bindParam(":COD_TRANSACCION",$codTransaction,PDO::PARAM_STR,10);
if (isset($stmt)){
    if ($stmt->execute()){
        $transaccion = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
$cont = (int)0;
$cadena = "";
$pre = 0;
foreach ($transaccion as $item) {
    $cantidad = $transaccion[$cont]["CANTIDAD_PRODUCTO"];
    $descripcion = $transaccion[$cont]["NOMBRE_PRODUCTO"];
    $precio = number_format($transaccion[$cont]["PRECIO"],2);
    $subtotal = number_format(($cantidad * $precio),2);
    $pre = $pre + $subtotal;
    $cadena = $cadena . "
    <tr class='descripcion-table'>
        <td>
        ".$cantidad."
        </td>
        
        <td>
        ".$descripcion."
        </td>
        
        <td>
        ".$precio."
        </td>
        
        <td>
        ".$subtotal."
        </td>
        </tr>
    ";
    $cont++;
}

$iva = $pre * 0.12;

$body = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
    <title>Comprobante de Pago</title>
<style>


       .container {
            width: 100%;
        }
        
        
        .header-datos span b{
        font-weight: bold;
        }
        
        .img-encabezado {
            margin-top: 0;
            width: 100%;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 0;
        }
        
        .title, {
            margin-top: 0;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-size: 1.3rem;
            letter-spacing: 0.6rem;
            text-transform: uppercase;
            font-weight: bold;
        }

        .body {
            margin-top: 1%;
            margin-bottom: 8%;
        }

        
        .date {
            text-align: right;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.2rem;
            margin-top: 1%;
        }
  
        .header-table{
            border: 1px solid #000000;
            margin: 1%;
            text-align: center;
        }
        .header-table td, .descripcion-table td{
            border: 1px solid #000000;
            margin: 1%;
        }
        
        .valor-table td{
        border : 1px solid #000000;
        }
      
        
        .header-datos{
        border: 1px solid #000000;
        border-radius: 15px 15px 15px 15px;
        width: 100%;
        padding: 2%;
        display: flex;
        justify-content: center;
        align-items: center;
        }
        #no-margin{
            border: 1px solid #FFFFFF;
        }
        
        .header_comprobante-table2{
        width: 100%;
        padding: 0%;
        margin-left: 73%;
        }
        
        .center{
        display: flex;
        justify-content: center;
        align-items: center;
        }
        
        #firma{
        font-weight: bold;
        }
</style>
</head>
<body>
<div class="img-encabezado">
    <img src="../images/encabezado.png" alt="encabezado-guanabaso" srcset="">
</div>
<div class="container">

    <p class="title">Comprobante de Pago # '.$_GET["cod_factura"].'</p>
    <div class="container">
                <div class="date">
                    <b> '.$fecha.' </b>
                </div>
                <br><br>
                <div class="header-datos">
                   <span> <strong id="firma">C.I./R.U.C. :</strong> '.$factura[0]["CEDULA_CLIENTE"].'</span><br><br>
                   <span><strong id="firma">Cliente: </strong>'.$factura[0]["NOMBRES_CLIENTE"].'</span><br><br>
                   <span><strong id="firma">Ciudad :</strong> Guayaquil</span><br><br>
                   <span><strong id="firma">Teléfono</strong> : '.$factura[0]["TELEFONO_CLIENTE"].'</span>
                   <br><br>
                </div>
    </div>
    <br><br>
    <table class="header_comprobante-table">
            <tr class="header-table">
            <td>
                    CANT.
                </td>
                <td>
                    DESCRIPCIÓN
                </td>
                <td>
                    PRECIO
                </td>
                
                  <td>
                    SUBTOTAL
                </td>
            </tr>
            
             '.$cadena.'
            
            </table>
            <br><br>
            <table class="header_comprobante-table2">
            <tr class="valor-table">
                <td>
                    <b>SUBTOTAL :<b>
                </td>
                <td>
                    $ '.number_format($pre,2).'
                </td>

            </tr>
            <tr class="valor-table">
                <td>
                    <b>IVA 12% :<b>
                </td>
                <td>
                    $ '.(float)$iva.'
                </td>

            </tr>
            <tr class="valor-table" >
                <td >
                    <b>VALOR A PAGAR:</b>
                </td>
                <td>
                    $ '.number_format(($pre + $iva),2).'
                </td>

            </tr>
            </table>
    </div>
    <br><br>
<div class="center">
 <span id="firma">____________________________________</span><br>
 <span id="firma">Recibí Conforme</span>
</div>

</body>

</html>
';

ob_start();
require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->Addpage('P');
$mpdf->SetFont('Arial', 'B', '16');
$mpdf->writeHTML($body);
$mpdf->Output('factura_numero_' . $_GET["cod_factura"] . '.pdf', 'I');


