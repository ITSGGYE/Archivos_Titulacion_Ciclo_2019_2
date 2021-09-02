<?php  
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: index.php');
  
  }

  
?>
<?php 
	
require('connect_db.php');
	
	$id=$_GET['id'];
	
	
	$query="DELETE FROM cita WHERE id_cita='$id'";
	
	$resultado=$mysqli->query($query);
	if($resultado>0){


		echo '<script>
    alert("Cita Eliminada");
       window.history.go(-1);
 </script> ';

}else{


echo '<script>
    alert("No Eliminada");
       window.history.go(-1);
 </script> ';
 	}
?>

