<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">

</div>
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Medicos</h4>
  </div>
  <div class="card-content table-responsive">
	<a href="index.php?view=newmedic" class="btn btn-default">Nuevo Medico</a>
		<?php

		$users = MedicData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Genero</th>
			<th>Titulo Profesional</th>
			<th>Area</th>
			<th>Accion</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->gender; ?></td>
				<td><?php echo $user->profe; ?></td>
				<td><?php echo $user->getCategory()->name; ?></td>
				<td style="width:280px;">
				<a href="index.php?view=medichistory&id=<?php echo $user->id;?>" class="btn btn-default btn-xs">Historial</a>
				<a href="index.php?view=editmedic&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delmedic&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs" onclick="return confirmation()">Eliminar</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>No hay Medicos</p>";
		}


		?>


	</div>
</div>

<script type="text/javascript">
function confirmation() {
    if(!confirm("Realmente desea eliminar?")) return false;    
}

</script>
</div>
</div>
	</div>
</div>