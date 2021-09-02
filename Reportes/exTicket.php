<?php
//Activamos el almacenamiento en el buffer
ob_start();
if (strlen(session_id()) < 1) 
  session_start();

if (!isset($_SESSION["per_nombre"]))
{
  echo 'Debe ingresar al sistema correctamente para visualizar el reporte';
}
else
{
if ($_SESSION['Citas']==1)
{
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../public/css/ticket.css" rel="stylesheet" type="text/css">
</head>
<body onload="window.print();">
<?php

require_once "../modelos/Configuracion.php";
 $config = new Configuracion();

 $rsptas = $config->listar();
//Recorremos todos los valores obtenidos
$regs = $rsptas->fetch_object();


//Incluímos la clase Agenda
require_once "../modelos/Agenda.php";
//Instanaciamos a la clase con el objeto Agenda
$agenda = new Agenda();
//En el objeto $rspta Obtenemos los valores devueltos del método Agenda
$rspta = $agenda->ticket($_GET["id"]);
//Recorremos todos los valores obtenidos
$reg = $rspta->fetch_object();


?>
<div class="zona_impresion">
<!-- codigo imprimir -->
<br>
<table border="0" align="center" width="300px">
    <tr>
        <td align="center">
        <!-- Mostramos los datos de la empresa en el documento HTML -->
        .::<strong> <?php echo $regs->razon_social; ?></strong>::.<br> <br>
        <?php echo 'Ruc: '.$regs->ruc; ?><br>
        <?php echo $regs->direccion; ?><br>
        <?php echo $regs->telefono; ?><br>
      </td>
    </tr>
    <tr>
        <td align="center"><?php echo $reg->fecha_cita; ?></td>
    </tr>
    <tr>
      <td align="center"></td>
    </tr>
    <tr>
        <!-- Mostramos los datos del cliente en el documento HTML -->
        <td> N°Cita: <?php echo '000'.$reg->agenda_id; ?></td>
    </tr>
    <tr>
        <td>Paciente: <?php echo $reg->Nombres; ?></td>
    </tr>
    <tr>
        <td>Medico: <?php echo $reg->Medic; ?></td>
    </tr>
      <tr>
        <td>Especialidad: <?php echo $reg->esp_nombre; ?></td>
    </tr>
     
       <tr>
        <td>Cajero: <?php echo $reg->registrador; ?></td>
    </tr>

      <tr>

        <td>Fecha: <?php echo $reg->fecha_cita; ?></td>
    </tr>
      <tr>

        <td>Hora: <?php echo $reg->hora_cita; ?></td>
    </tr>
    <tr>
    <td> <b> <?php echo $reg->estado_pago.'!'; ?> </b> </td>
    </tr>
    

</table>
<br>

    <!-- Mostramos los totales de la venta en el documento HTML -->
    <tr>
    <td>&nbsp;</td>
    <td align="right"><b><center>TOTAL:  $  <?php echo $reg->costo_cita;  ?> </center> </b></td>
    </tr>

    <tr>
      <td colspan="3">&nbsp;</td> <br>
    </tr>      
    
    
    <tr>
      <td colspan="3" align="center"><center>¡Gracias por su Solicitar su Cita!</center> </td> 
    </tr>
    <tr>
      <td colspan="3" align="center"><center> <?php echo $regs->razon_social;  ?> </center></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><center> Guayaquil - Ecuador </center></td>
    </tr>
    
</table>
<br>
</div>
<p>&nbsp;</p>

</body>
</html>
<?php 
}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>