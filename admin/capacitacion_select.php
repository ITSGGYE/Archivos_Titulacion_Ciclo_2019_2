<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	
	}

	
?>

  <?php

    include_once("conexion.php");



$sentencia=$bd->query("SELECT * FROM  especialidad


  ;");


$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);


echo '<option value="0">Seleccione Especialidad</option>';   ?>

   <?php foreach($paciente as $row): ?>
                    <option value="<?php echo $row->id_especialidad; ?>"><?php echo $row->nombre_especialidad; ?></option>
                <?php endforeach; ?>


                   



