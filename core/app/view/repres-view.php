<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Representantes</h4>
  </div>
  <div class="card-content table-responsive">
	<a href="index.php?view=newrepre" class="btn btn-default">Nuevo Representante</a>

		<?php

		$users = RepreData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Sexo</th>
			<th>Correo Electronico</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Accion  </th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->id; ?></td>
				<td><?php echo $user->name." ".$user->lastname; ?></td> 
				<td><?php echo $user->gender; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->address; ?></td>
				<td><?php echo $user->phone; ?></td>
				<td style="width:185px;">
				<a href="index.php?view=editrepre&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delrepre&id=<?php echo $user->id;?>" onclick="return confirmation()" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}
?>
</table>
<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Representantes</p>";
		}


		?>
<script type="text/javascript">
function confirmation() {
    if(!confirm("Realmente desea eliminar?")) return false;    
}

</script>
</div>
</div>
	</div>
</div>