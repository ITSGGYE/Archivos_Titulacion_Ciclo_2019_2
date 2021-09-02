<?php
   
		require_once ("config/db.php"); 
		require_once ("config/conexion.php"); 

 
	    $email=$_POST['correo'];  
        $query_categoria=mysqli_query($con,"select * from clientes");
					    while($rw=mysqli_fetch_array($query_categoria))	{
						$codi=$rw['correo_electronico'];

if ($email==$codi) {
?>   
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="login100-form validate-form">
  <p>Por favor escriba su nueva contraseña</p>   
  <input type="hidden" name="correo" value="<?php echo $_POST['correo']; ?>">     
         <input type="password" name="password">
         <input type="submit" name='submit'>
  </form>
   
	  <?php

	 			    if(isset($_POST['submit'])) {
 
                        $password = md5($_POST['password']);
  
                  $sql ="UPDATE clientes SET password='".$password."'  WHERE correo_electronico='".$email."'";;
  
                 if (mysqli_query($con, $sql)) {
                   ?><script> alert("Se actualizo su contraseña correctamente"); window.location='login.php'; </script> <?php  
                 } else {
                  ?><script> alert("Error al actualizar la contraseña "); window.location='../registro_productos.php'; </script> <?php  
                 }}
	 }else {
				 	 
} 
}	 
	  
	 ?>      <div class="container-login100-form-btn">
            <a class="login100-form-btn" href="login.php">
            Inicia Session
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>