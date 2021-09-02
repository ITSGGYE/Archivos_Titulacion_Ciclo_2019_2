<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    require_once './ClassConexion.php';
    require_once '../model/ClassReportesM.php';
    $objReportesM = new ReportesM();
    $reportes = $objReportesM;
    
    $result = $reportes->getReporteInventario();
$header = '        <div class="img-encabezado">
            <img src="../images/encabezado.png" alt="encabezado-gallegos-lara" srcset="">
        </div><br><br><br>';


    
    $body = '
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <title>Listado de Movimiento de Inventario</title>
    <style>
        .container {
            margin-left: 5mm;
            margin-right: 5mm;
            margin-top: 10mm;
            margin-bottom: 10mm;
        }
        
        .img-encabezado {
            margin-top: 1%;
            width: 100%;
            height: 50px;
            margin-bottom: 10%;
            display: flex;
            justify-content: center;
        }
        .img-encabezado img{
        width: 100%;
        max-height: 40px;
        }
        .title,
        .lectivo {
            margin-top: 2%;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-weight: bold;
            letter-spacing: 0.4rem;
            font-size: 1.5rem;
        }
        
        .lectivo {
            font-size: 1.2rem;
        }
        
        .cert {
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.2rem;
            margin-top: 2%;
        }
        
        .name {
            text-align: left;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 1%;
            margin-bottom: 3%;
        }
        
        .body,
        .pre-footer {
            text-align: justify;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.2rem;
        }
        
        .body {
            margin-top: 1%;
            margin-bottom: 8%;
        }
        
        .pre-footer {
            margin-top: 6%;
        }
        
        .date {
            text-align: right;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.2rem;
            margin-top: 1%;
        }
        
        .line,
        .name-rector,
        .director {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .line {
            margin-top: 1%;
        }
        
        .box-card-large {
            height: 70px;
        }
        
        .box-card-content {
            height: 65px;
        }
        
        table {
            border: 1px solid #000;
            width: 100%;
            margin-top:5%;
        }
        
        th,
        td {
            border: 1px solid #000;
        }
        
        .numero {
            width: 5%;
        }
        
        .cedula {
            width: 7%;
        }
        
        .nombres {
            width: 45%;
        }
        
        .dia {
            width: 3%;
        }
    </style>
</head>

<body>
    <div class="container">

        <p class="title">LISTADO DE TRANSACCIONES DE INVENTARIO</p>
        <div class="conteiner">
            <div class="box-card-large">
                <table  class="centered">
                   <b> <tr style="font-weight: bold;">
                        <td><b>#</b></td>
                        <td><b>COD. PRODUCTO</b></td>
                        <td><b>NOMBRE PRODUCTO</b></td>
                        <td><b>PRESENTACIÓN</b></td>
                        <td><b>PRECIO</b></td>
                        <td><b>DESCRIPCION</b></td>
                        <td><b>ITEMS</b></td>
                        <td><b>FECHA</b></td>
                        <td><b>HORA</b></td>
                        <td><b>DATA</b></td>
                    </tr></b>
                    <tbody id="body">
                        ' . $result . '
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>

';
    ob_start();
    require_once '../vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf([
        'margin_top' => 35,
        'margin_left' => 10,
        'margin_right' => 10
    ]);
    $mpdf->setHTMLHeader($header,"O");
    //$mpdf->margin-header(10);
    $mpdf->Addpage('L');
    $mpdf->SetHTMLFooter('<div style="width: 100%; text-align: center; font-weight: bold;">{PAGENO}/{nbpg}</div>');
    $mpdf->SetFont('Arial', 'B', '12');
    ob_clean();
    $mpdf->writeHTML($body);
    $mpdf->Output('reporteProducts.pdf', 'I');

