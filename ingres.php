<?php
session_start();
 require_once ("conexion_base_datos/conexion.php"); 
      $usuario = mysqli_real_escape_string($con,$_POST['nombre']);
      $contra =  mysqli_real_escape_string($con,$_POST['pass']);  
       
   $query = mysqli_query($con,"SELECT * FROM admin WHERE usuario_admin = '$usuario'AND pass_admin= '$contra'");
      $contar = mysqli_num_rows($query);      
      if($contar == 1) 
      {
        while($row=mysqli_fetch_array($query)) 
        {
          if($contra = $row['pass_admin'])
          {
          	        $_SESSION['user_id'] = $row['Codigo_admin'];
			$_SESSION['usuario'] = $row['usuario_admin']; 
                        $_SESSION['user_login_status'] = 1;
           
         ?><script> alert("Bienvenido "); window.location='home.php'; </script> <?php  
 
          }
        }
      }  
       ?><script> alert("Usuario o contraseña incorrecta"); window.location='login.php'; </script> <?php  
    ?>