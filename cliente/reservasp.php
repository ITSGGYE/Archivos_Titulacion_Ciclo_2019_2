<?php
   
		require_once ("config/db.php"); 
		require_once ("config/conexion.php"); 


		$numbera=$_POST["numbera"];
		$number=$_POST["number"];
		$symptoms=$_POST["symptoms"];
        $datepicker1=$_POST["datepicker1"];
	    $departament=$_POST['departament'];
		$time=$_POST["time"];
		$cli=$_POST["cliente"];
	 
	         $sql="INSERT INTO reservas (id_cliente,n_mesas,n_sillas,id_menu,observaciones,dia_reservacion,hora_reservacion) VALUES ('$cli','$numbera','$number','$departament','$symptoms','$datepicker1','$time')";
	      	
	      	 $query_new_insert = mysqli_query($con,$sql);
			 
			 if ($query_new_insert){ 
    ?><script>  alert("Su reserva se registro correctamente");  window.location='reervas.php'; </script> <?php 
	 
			 }  else {
			 	echo "seeeeeri";
			 }
  
	 ?>  
