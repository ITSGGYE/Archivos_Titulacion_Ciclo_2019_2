<?php
   
		require_once ("config/db.php"); 
		require_once ("config/conexion.php"); 


		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$telefono=$_POST["telefono"];
        $pass=md5($_POST["pass"]);
	    $email=$_POST['email']; 
	 
	         $sql="INSERT INTO clientes (Nombres,Apellidos,correo_electronico,telefono_celular,estado,password) VALUES ('$nombre','$apellido','$email','$telefono','1','$pass')";
	      	
	      	 $query_new_insert = mysqli_query($con,$sql);
			 
			 if ($query_new_insert){ 
    ?><script>  alert("Su reserva se registro correctamente");  window.location='login.php'; </script> <?php 
	 
			 }  else {
			 	echo "seeeeeri";
			 }
  
	 ?>  