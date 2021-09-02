<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
$cedula = $_SESSION["user_guanabaso"];
date_default_timezone_set("America/Guayaquil");
$_fecha = date("Y-m-d");
require_once "../../constants/ClassConexion.php";
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

$query = "SELECT COD_FACTURA,TRANSACCIONES.COD_PRODUCTO,NOMBRE_PRODUCTO,CANTIDAD_PRODUCTO,PRECIO FROM GUANABASO.FACTURAS, GUANABASO.TRANSACCIONES,GUANABASO.PRODUCTOS
WHERE FACTURAS.COD_TRANSACCION = TRANSACCIONES.COD_TRANSACCION AND TRANSACCIONES.COD_PRODUCTO = PRODUCTOS.COD_PRODUCTO AND FACTURAS.CEDULA_VENDEDOR = :CEDULA_VENDEDOR AND FACTURAS.FECHA_TRANSACCION = :FECHA";
$stmt = $conexion->prepare($query);
$stmt->bindParam(":CEDULA_VENDEDOR",$cedula,PDO::PARAM_STR,13);
$stmt->bindParam(":FECHA",$_fecha,PDO::PARAM_STR,100);
if (isset($stmt)){
    if ($stmt->execute()){
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $result = NULL;
    }
}
$cadena = "";
$cont = (int)-1;
$precio_total = (float)0.0;
if ($result != NULL) {
    foreach ($result as $key) {
        $cont++;
        $cadena = $cadena. "
        <tr class='descripcion-table'>
        <td>".$cont."</td>
        <td>".$result[$cont]["COD_FACTURA"]."</td>
        <td>".$result[$cont]["NOMBRE_PRODUCTO"]."</td>
        <td>".$result[$cont]["CANTIDAD_PRODUCTO"]."</td>
        <td> $ ".$result[$cont]["PRECIO"]."</td>
        </tr>
        ";
        $precio_total = $precio_total + $result[$cont]["PRECIO"];
        
    }  
}

if ($cont == -1) {
    $cadena = "<tr><td>0</td><td>NO</td><td>SE</td><td>ENCONTRADON</td><td>DATOS</td></tr>";
}

$precio_iva = ($precio_total * 0.12);

$precio_final = $precio_total + $precio_iva;




$body = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
    <title>REPORTE DE VENTA</title>
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
    <img src="../../images/encabezado.png" alt="encabezado-guanabaso" srcset="">
</div>
<div class="container">
<div class="container">
                <div class="date">
                    <b> '.$fecha.' </b>
                </div>
               
    </div>

    <p class="title">REPORTE DE VENTA DIARIO </p>
    
<div class="container">

    <table class="header_comprobante-table centered">
    <tbody>
        <tr class="descripcion-table">
        <td>#</td>
        <td>N° FACT.</td>
        <td>NOMBRE DEL PRODUCTO</td>
        <td>CANT.</td>
        <td>PRECIO</td>
        </tr>

        '.$cadena.'
        </tbody>
            </table>
            
    </div>

    <div class="container">

    <table class="header_comprobante-table centered">
    <tbody>
        <tr class="descripcion-table">
        <td>VENTA TOTAL</td>
        <td>IVA 12%</td>
        <td>VENTA TOTAL CON IVA</td>
        </tr>

        <tr class="descripcion-table">
        <td>'.$precio_total.'</td>
        <td>'.$precio_iva.'</td>
        <td>'.$precio_final.'</td>
        </tr>
        </tbody>
            </table>
            
    </div>

</body>

</html>
';

ob_start();
require_once '../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->Addpage('P');
$mpdf->SetFont('Arial', 'B', '16');
$mpdf->writeHTML($body);
//echo $body;
$mpdf->Output('factura_numero_' . $_GET["cod_factura"] . '.pdf', 'I');


