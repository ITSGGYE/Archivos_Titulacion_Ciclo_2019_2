<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

       
      

                                            <label>Nombre</label>
                                            <input name="fname" class="form-control" required>
                                            
                              
                                            <label>Apellido</label>
                                            <input name="lname" class="form-control" required>
                                            
                              
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                                           <label>Celular</label>
                                            <input name="phone" type ="text" class="form-control" required>
                            
                  
           
							 
				
			
<?php
$con = mysqli_connect("localhost","root","","datos") or die(mysql_error());

?>





<?php
 
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:./FORMULARIO.php");
}
    include('db.php');
  ?>

  <?php
 $nombre=$_POST["fname"];
  $apellido=$_POST["lname"];
 
    $email=$_POST["email"];
     $celular=$_POST["phone"];

$sql="INSERT INTO clientes (Nombres, Apellidos,correo_electronico,Telefono_celular) VALUES ('$nombre','$apellido','$email','$celular')";
?>

	
</body>
</html>
