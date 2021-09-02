<?php 
	require_once ("../db.php"); 
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
 
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('Nombres');//Columnas de busqueda
		 $sTable = "clientes";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by id_clientes desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './clientes.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
					<th>Nombre</th>
					<th>Apellido</th> 
						<th>Correo</th>
							<th>Telefono</th>
					<th>personas</th> 
					<th>Estado</th>
						<th>Fecha</th>
					<th>Hora</th>  
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
				$id_categoria=$row['id_clientes'];
						$nombre_categoria=$row['Nombres'];
						$descripcion_categoria=$row['Apellidos'];
							$correo_electronico=$row['correo_electronico'];
						$telefono_celular=$row['Telefono_celular'];
					 
							$estado=$row['estado']; 
				 
					$query_producto=mysqli_query($con,"select * from reservas where id_reserva=$id_categoria");
							while($rw=mysqli_fetch_array($query_producto))	{
								 $dia_Reservacion=$rw['dia_reservacion'];	
								  $hora_reservacion=$rw['hora_reservacion'];	

					?>
					<tr>
						
						<td><?php echo $nombre_categoria; ?></td>
						<td ><?php echo $descripcion_categoria; ?></td>
		 <td ><?php echo $correo_electronico; ?></td>
		 <td ><?php echo $telefono_celular; ?></td> 
		 <td ><?php echo $estado; ?></td> 
			 <td ><?php echo $dia_Reservacion; ?></td>  <td ><?php echo $hora_reservacion; ?></td> 
					<td class='text-right'>
						<a href="#" class='btn btn-default' title='Editar categoría' data-nombre='<?php echo $nombre_categoria;?>' data-descripcion='<?php echo $descripcion_categoria?>' data-id='<?php echo $id_categoria;?>' data-toggle="modal" data-target="#myModal2"><i ><img width="25px" src="img/editar.png"></i></a> 
						 
					</td>
						
					</tr>
					<?php
				}}
				?>
				<tr>
					<td colspan=4><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}}
	 
?>