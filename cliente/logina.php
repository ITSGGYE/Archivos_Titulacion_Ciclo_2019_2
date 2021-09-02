<?php
session_start();

  require_once ("config/db.php"); 
  require_once ("config/conexion.php"); 

if(isset($_SESSION['usuario']))
{
     ?><script>  window.location.replace('login.php');</script><?php   
}



      $usuario = mysqli_real_escape_string($con,$_POST['email']);
      $contra = md5(mysqli_real_escape_string($con,$_POST['pass']));
      
      
   $query = mysqli_query($con,"SELECT * FROM clientes WHERE correo_electronico = '$usuario' AND password = '$contra'");
      $contar = mysqli_num_rows($query);
 
      
      if($contar == 1) 
      {
        while($row=mysqli_fetch_array($query)) 
        {
          if($contra = $row['password'])
          {

          	           $_SESSION['user_id'] = $row['id_clientes'];
						$_SESSION['usuario'] = $row['Nombres']; 
                        $_SESSION['user_login_status'] = 1;
         ?><script>  alert("hola ha ingresado correctamente");  window.location='index.php'; </script> <?php     
          }
        }
      }  

 ?><script>  alert("error al ingresar usuario o contraseña");  window.location='login.php'; </script> <?php 
 
 
 
    ?>