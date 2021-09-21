<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
	
}

?>
<?php
include_once("conexion.php");
$id_curso = $_POST['curso'];
$sentencia=$bd->query("
	SELECT * FROM especialista WHERE id_especialidad= $id_curso
	;");
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php foreach($paciente as $row): ?>
	<option value="<?php echo $row->id_especialista; ?>"><?php echo $row->nombre_doctor; ?></option>
<?php endforeach; ?>

