<?php
$pacient = PacientData::getById($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="../../fer/pdf.php">Generar Pdf</a></li>
  </ul>
</div>
</div>
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Historial de Citas del Paciente<?php echo ": ".$pacient->name;?> </h4>
<p><?php echo "| Especie: ".$pacient->addresss." | Raza: ".$pacient->phone." | Informacion: ".$pacient->info;?></p>
  </div>
  <div class="card-content table-responsive">
	<div class="col-md-12">
<div class="btn-group pull-right">

</div> 
		<?php
		$users = ReservationData::getAllByPacientId($_GET["id"]);
		if(count($users)>0){
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Asunto</th>
			<th>Medico</th>
			<th>Fecha</th>
			<th>Nota</th>
			<th>Sintomas</th>
			<th>Enfermedad</th>
			<th>Medicamentos</th>
			<th>Peso (KG)</th>
			</thead>
			<?php
			foreach($users as $user){
				$pacient  = $user->getPacient();
				$medic = $user->getMedic();
				?>
				<tr>
				<td><?php echo $user->title; ?></td>
				<td><?php echo $medic->name." ".$medic->lastname; ?></td>
				<td><?php echo $user->date_at; ?></td>
				<td><?php echo $user->note; ?></td>
				<td><?php echo $user->symtoms; ?></td>
				<td><?php echo $user->sick; ?></td>
				<td><?php echo $user->medicaments; ?></td>
				<td><?php echo $user->peso; ?></td>
				</tr>
				<?php

			}
?>
</table>
<?php


		}else{
			echo "<p class='alert alert-danger'>No hay historial</p>";
		}


		?>

</div>
</div>
	</div>
</div>