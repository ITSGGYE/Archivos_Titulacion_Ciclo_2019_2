<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/adminDAOcitasperdida.php';
$impr = new adminDAO();
if(strlen($_POST['desde'])>0 and strlen($_POST['hasta'])>0){
	$desde = $_POST['desde'];
	$hasta = $_POST['hasta'];
	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';
	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
require_once('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Miguel Caro');
$pdf->SetTitle($_POST['reporte_name']);
$pdf->setPrintHeader(false); 
$pdf->setPrintFooter(TRUE);
$pdf->SetMargins(20, 10, 20, 20); 
$pdf->SetAutoPageBreak(true, 20); 
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();
$datos = $impr->buscarAllBitacoraFecha($desde,$hasta);
$content = '';
$content .= '
<div class="row">
<div class="col-md-12">
<div class="col-md-12" style="text-align:center;  font-weight:light;">
<img  width="120px" src="../../img/logooo.png">
<center> <p style="color:blue;letter-spacing:2px;" > CONSULTORIO ODONTOLOGICO SMILE DENTAL!<br>
Cooperativa Nueva Prosperina <br>
<br>
0960717667 -0961337313</p>
<div class="col-md-12" style="text-align:center; letter-spacing:4px; font-weight:bold; color:#FF7655;">
<span  >CITA PERDIDA</span><br>
</div>
</center> 
</div>
<div class="col-md-12" style="text-align:center; letter-spacing:2px; font-weight:bold; color:#0A496A;">
<span>REPORTES DE CITAS  DEL CONSULTORIO ODONTOLOGICO SMILE DENTAL! </span>
</div>
</div>
<h3 style="text-align:center;">Desde '.$verDesde.' hasta: '.$verHasta.'</h3>
<table border="1" cellpadding="4">
<thead>
<tr style="background-color:red;">
<th width="6%">#</th>
<th width="11%">Paciente</th>
<th width="14%">Especialidad</th>
<th width="18%">Especialista</th>
<th width="14%">Fecha</th>
<th width="16%">Hora</th>
<th width="16%">Estado</th>
<th width="16%">Observacion</th>
</tr>
</thead>
';
for($x=0; $x<count($datos); $x++){
	$idcita = $datos[$x]['id_cita'];
	$paciente = $datos[$x]['nombre_apellido']; 
	$id_especialidad = $datos[$x]['nombre_especialidad'];
	$id_especialista = $datos[$x]['nombre_doctor'];
	$fecha = fechaNormal($datos[$x]['fecha']);
	$hora = $datos[$x]['hora'];
	$cit_estado = $datos[$x]['cit_estado'];
	$cit_observacion = $datos[$x]['cit_observacion'];
	$content .= '
	<tr nobr="true" bgcolor="">
	<td width="6%">'.$idcita.'</td>
	<td width="11%">'.$paciente.'</td>
	<td width="14%">'.$id_especialidad.'</td>
	<td width="18%">'.$id_especialista.'</td>
	<td width="14%">'.$fecha.'</td>
	<td width="16%">'.$hora.'</td>
	<td width="16%">'.$cit_estado.'</td>
	<td width="16%">'.$cit_observacion.'</td>
	</tr>
	';
}
$content .= '</table> <div class="col-md-12" style="text-align:center;">
<span></span>
<br>
<br>
<span style="font-weight:bold; font-size:22px; letter-spacing:6.6px; color:#43B8A1;">CONSULTORIO ODONTOLOGICO SMILE DENTAL!</span><br>
<span style="font-weight:bold; font-size:22px; letter-spacing:1px; color:#0A496A;"></span>
<br>
<br>
<span><font color="red"></font></span><br><br>
<span><font color="green"></font></span>
</div>
</div>
';
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
$pdf->output('../temp/reportes.pdf', 'F');
?>