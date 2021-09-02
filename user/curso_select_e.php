<?php  
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: index.php');
  
  }

  
?>




  <?php

    include_once("conexion.php");

$id_cursoe = $_POST['cursoe'];

$sentencia=$bd->query("

SELECT * FROM especialista WHERE id_especialidad= $id_cursoe

  ;");


$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);


?>
   <?php foreach($paciente as $row): ?>
                    <option value="<?php echo $row->id_especialista; ?>"><?php echo $row->nombre_doctor; ?></option>
                <?php endforeach; ?>


                   
