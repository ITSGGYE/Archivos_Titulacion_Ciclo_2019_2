<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])){
		$errors[] = "Nombres vacíos";
	} elseif (empty($_POST['rucid'])){
		$errors[] = "Este campo no puede ir vacio";
	}  elseif (empty($_POST['telefono'])) {
		$errors[] = "Este campo no puede ir vacio";
	} elseif (empty($_POST['email'])) {
		$errors[] = "El correo electrónico no puede estar vacío";
	} elseif (strlen($_POST['email']) > 64) {
		$errors[] = "El correo electrónico no puede ser superior a 64 caracteres";
	} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
	} elseif (
		!empty($_POST['nombre'])
		&& !empty($_POST['rucid'])
		&& !empty($_POST['telefono'])
		&& !empty($_POST['email'])
		&& strlen($_POST['email']) <= 64
		&& filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
	) {
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$rucid=mysqli_real_escape_string($con,(strip_tags($_POST["rucid"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		$estado=intval($_POST['estado']);
		$date_added=date("Y-m-d H:i:s");
		$sql="INSERT INTO clientes (nombre_cliente, rucid, telefono_cliente, email_cliente, direccion_cliente, status_cliente, date_added) VALUES ('$nombre', '$rucid','$telefono','$email','$direccion','$estado','$date_added')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Cliente ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>