<?php
 
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:../index.php");
}
    include('db.php');
  ?>

  <?php
 $nombre=$_POST["fname"];
  $apellido=$_POST["lname"];
 
    $email=$_POST["email"];
     $celular=$_POST["phone"];
        $fecha=$_POST["fecha"];
         $hora=$_POST["cin1"];
           $npersonas=$_POST["persona"];
$estado="por confirmar";
$sql="INSERT INTO clientes (Nombres, Apellidos,correo_electronico,Telefono_celular,npersonas,estado) VALUES ('$nombre','$apellido','$email','$celular','$npersonas','$estado')";


		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Categoría ha sido ingresada satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}  

$sql="INSERT INTO reservas (dia_reservacion,Hora_reservacion) VALUES ('$fecha','$hora')";


		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				?>
	 			 <script language="javascript">alert("'datos guardados'");</script>';
  <?php
 header("location:../index.php");
                 
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}  

  ?>