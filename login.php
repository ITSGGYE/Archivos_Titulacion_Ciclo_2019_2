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
        <div class="login">
            <form method="POST" action="ingres.php">   
              <H2>INCIAR SECCION</H2>
              <p>Usuario</p>
              <input type="text" name="nombre">
              <p>Contraseña</p>
              <input type="password" name="pass"> <br><br><br>
              <input type="submit" name="ingresar" value ="Ingresar">
            </form> 
            <button onclick="location.href='index.php'" class="pag">Página principal</button>
        </div>
    </center>
</body>
    </html>