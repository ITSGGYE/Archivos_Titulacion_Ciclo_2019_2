<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
date_default_timezone_set("America/Guayaquil");
require_once "../appws/clases/conexion.php";
$objConexion = new conexion();
$conexion = $objConexion->getConexion();
//var_dump($_POST);
$reporte = $_POST["registros_online"];
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
if ($reporte == "est") {
    $query = "SELECT * FROM titulacion_6to_c.tb_curriculum";
    $stmt = $conexion->prepare($query);
    if ($stmt->execute()) {
        $cadena = "";
        $cont = (int)0;
        while ($data = $stmt->fetch()) {
            $cont++;
            $cadena = $cadena . '
                <tr>
                    <td>' . $cont . '</td>
                    <td>' . $data["est_cedula"] . '</td>
                    <td>' . $data["est_nombres"] . '</td>
                    <td>' . $data["est_apellidos"] . '</td>
                    <td>' . $data["est_celular"] . '</td>
                    <td>' . $data["est_correo"] . '</td>
                    <td>' . $data["est_convencional"] . '</td>
                    <td>' . $data["est_direccion"] . '</td>
                    <td>' . $data["est_fecha_nacimiento"] . '</td>
                    <td>' . $data["est_edad"] . '</td>
                    <td>' . $data["est_enfermedad"] . '</td>
                    <td>' . $data["est_alergias"] . '</td>
                    <td>' . $data["est_tipo_sangre"] . '</td>
                    <td>' . $data["est_genero"] . '</td>
                    <td>' . $data["est_curso"] . '</td>
                    <td>' . $data["est_jornada"] . '</td>
                    <td>' . $data["est_provincia"] . '</td>
                    <td>' . $data["est_ciudad"] . '</td>
                    <td>' . $data["est_trabajo"] . '</td>
                    <td>' . $data["est_vive"] . '</td>
                    <td>' . $data["est_hermanos"] . '</td>
                    <td>' . $data["est_civil"] . '</td>
                    <td>' . $data["est_hijos"] . '</td>
                    <td>' . $data["est_nombre_ref"] . '</td>
                    <td>' . $data["est_apellidos_ref"] . '</td>
                    <td>' . $data["est_cedula_ref"] . '</td>
                    <td>' . $data["est_correo_ref"] . '</td>
                    <td>' . $data["est_tlf_ref"] . '</td>
                    <td>' . $data["est_direccion_ref"] . '</td>
                    <td>' . $data["est_aceptar"] . '</td>
                    <td>' . $data["est_fecha"] . '</td>
                </tr>
            ';
        }
        if($cont == 0){
            $cadena = "No hay datos";
        }
    }
} elseif ($reporte == "pst") {
    $query = "SELECT * FROM titulacion_6to_c.tb_pasantes";
    $stmt = $conexion->prepare($query);
    if($stmt->execute()) {
        $cadena = "";
        $cont = (int)0;
        while ($data = $stmt->fetch()) {
            $cont++;
            $cadena = $cadena . '
                <tr align="center">
                    <td align="center">' . $cont . '</td>
                    <td align="center">' . $data["pst_cedula"] . '</td>
                    <td align="center">' . $data["pst_nombres"] . '</td>
                    <td align="center">' . $data["pst_apellidos"] . '</td>
                    <td align="center">' . $data["pst_celular"] . '</td>
                    <td align="center">' . $data["pst_correo"] . '</td>
                    <td align="center">' . $data["pst_convencional"] . '</td>
                    <td align="center">' . $data["pst_direccion"] . '</td>
                    <td align="center">' . $data["pst_fecha_nacimiento"] . '</td>
                    <td align="center">' . $data["pst_edad"] . '</td>
                    <td align="center">' . $data["pst_enfermedad"] . '</td>
                    <td align="center">' . $data["pst_alergias"] . '</td>
                    <td align="center">' . $data["pst_tipo_sangre"] . '</td>
                    <td align="center">' . $data["pst_genero"] . '</td>
                    <td align="center">' . $data["pst_curso"] . '</td>
                    <td align="center">' . $data["pst_jornada"] . '</td>
                    <td align="center">' . $data["pst_trabaja"] . '</td>
                    <td align="center">' . $data["pst_provincia"] . '</td>
                    <td align="center">' . $data["pst_ciudad"] . '</td>
                    <td align="center">' . $data["pst_dependiente"] . '</td>
                    <td align="center">' . $data["pst_vive"] . '</td>
                    <td align="center">' . $data["pst_civil"] . '</td>
                    <td align="center">' . $data["pst_hijos"] . '</td>
                    <td align="center">' . $data["pst_universidad"] . '</td>
                    <td></td>
                    <td align="center">' . $data["pst_nombre_ref"] . '</td>
                    <td align="center">' . $data["pst_apellidos_ref"] . '</td>
                    <td align="center">' . $data["pst_direccion_ref"] . '</td>
                    <td></td>
                    <td align="center">' . $data["pst_tlf_ref"] . '</td>
                    <td></td>
                    <td align="center">' . $data["pst_aceptar"] . '</td>
                    <td align="center">' . $data["pst_fecha"] . '</td>
                </tr>
            
            ';
        }
    }
    if($cont == 0){
        $cadena = "No hay datos";
    }
}

$body = '
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Registro</title>
    <style>
        .title,
        .lectivo {
        font-size:20px;
        font-weight: bold; 
        margin-top: 1%;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        }
        .img_encabezado {
            width: 200px;
          height: 100px;
          float: rigth;
        }

        .img_encabezado2 {
            width: 100px;
          height: 50px;
          float:right;
        }

    </style>
</head>
<body>
        <div class="img_encabezado">
        <img src="./imagen/mega-menu.jpg" alt="Fundacion-FEP">
        </div>
        <p>'.$fecha.'</p>
        <p class="title">Listado de Registros Online:</p>
            <div class="box-card-large">
                <table cellspacing="10" cellpadding="10" border="1">
                    <tr>
                    <td scope="col">No: </td>
                    <td scope="col">NOMBRES: </td>
                    <td scope="col">APELLIDOS: </td>
                    <td scope="col">CONVENCIONAL </td>
                    <td scope="col">WHATSAPP: </td>
                    <td scope="col">CORREO: </td>
                    <td scope="col">DIRECCIÓN: </td>
                    <td scope="col">FECHA/NACIMIENTO: </td>
                    <td scope="col">EDAD: </td>
                    <td scope="col">ENFERMEDAD</td>
                    <td scope="col">ALERGIA: </td>
                    <td scope="col">TIPO/SANGRE: </td>
                    <td scope="col">GENERO: </td>
                    <td scope="col">CURSO/CAPACITACIÓN:</td>
                    <td scope="col">JORNADA: </td>
                    <td scope="col">PROVINCIA: </td>
                    <td scope="col">CIUDAD: </td>
                    <td scope="col">TRABAJA: </td>
                    <td scope="col">VIVE/CON: </td>
                    <td scope="col">HERMANOS: </td>
                    <td scope="col">ESTADO/CIVIL: </td>
                    <td scope="col">HIJOS: </td>
                    <td scope="col">NOMBRES/CONTACTO: </td>
                    <td scope="col">APELLIDOS/CONTACTO: </td>
                    <td scope="col">CEDULA/CONTACTO: </td>
                    <td scope="col">TELEFONO/CONTACTO: </td>
                    <td scope="col">CORREO/CONTACTO: </td>
                    <td scope="col">DIRECCIÓN/REFERENCIA: </td>
                    <td scope="col">ACEPTÓ </td>
                    <td scope="col">FECHA/REGISTRO</td>         
                    </tr>
                    <tbody id="body">
                    ' . $cadena . '
                    </tbody>
                </table><br>
                <div class="img_encabezado2">
                <img src="./imagen/Escudo de Ecuador.png">
                </div>  
        </body> 

        </div>
        </div>
    </html>

';

ob_start();
require_once './vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->Addpage('C');
$mpdf->SetFont('Arial', 'B', '18');
$mpdf->writeHTML($body); ob_clean();
$mpdf->Output('reporte-registro'.date(). '.pdf', 'I');