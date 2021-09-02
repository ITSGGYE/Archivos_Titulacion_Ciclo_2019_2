<?php
require_once ("conexion_base_datos/conexion.php");
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ARDUHOME_SEGURO</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <center> 
        <div class="portadas">      
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">           
            <h2>Por favor ingresar código de acceso</h2>
            <input type="password" name="codigo"><br><br>
            <input type="submit" name="on" value ="Aceptar" >



          </form>

          <?php
 
if(isset($_POST['on']))
{
         $codigo = $_POST['codigo'];
                         $mensaje = "ALARMA ENCENDIDA";
                         $mensaje2 = "";
                         $mensaje3 = "";
                       //  $query_categoria=mysqli_query("INSERT INTO * from registro_de_actividad (Codigo_actividad,situacion_actividad,hora_fecha)VALUES ('".$mensaje2.",".$mensaje.",".$mensaje3."')", $con);
                         $query_categoria=mysqli_query($con,"select * from seguridad");
                            while($row=mysqli_fetch_array($query_categoria)) {
                                      $pass_seguridad=$row['pass_seguridad'];                                           
                        if ($codigo==$pass_seguridad) {
                          
                        ?><script> window.location='arduino.html'; </script> <?php  
                        
                         
                       //  $sql2 = "INSERT INTO registro_de_actividad (situacion_actividad) ";
                       //  $sql3= "VALUES ('".$mensaje."')";
 
                            

}else{
      ?><script> alert("Su contraseña es incorrecta"); window.location='en_apa_system.php'; </script> <?php  
    }   

                        }
}
 
?>
      
    
      
           <?php
 
if(isset($_POST['off']))
{
         $codigo = $_POST['codigo'];
                            $query_categoria=mysqli_query($con,"select * from seguridad");
                            while($row=mysqli_fetch_array($query_categoria)) {


                                      $pass_seguridad=$row['pass_seguridad'];
                       
         
 
                    
                          if ($codigo==$pass_seguridad) {
                              ?><script> alert("ALARMA APAGADA"); window.location='en_apa_system.php'; </script> <?php  
 
          //<input type="submit" name="submit" value ="Encender" >
                    //    <input type="submit" name="submit" value ="Apagar" > -->  
 

}else{
      ?><script> alert("Su contraseña es incorrecta"); window.location='en_apa_system.php'; </script> <?php  
    }   

                        }
}
 
?>
   
            <br><br><br><br><br><br><button onclick="location.href='home.php'" class="regresar">Regresar</button>
        </div>
    </center>
   </body>
</html>
