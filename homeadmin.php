<?php
    session_start();
    if(isset($_SESSION['nombres'])){
        if($_SESSION['cod_rol'] != '1'){
            echo "<script language='javascript'> alert('No posee privilegios para esta area');window.location = '../index.html'; </script>";
        }
    }else{
        echo "<script>alert('Desea salir del sistema?');
            window.location.href='login.php?func=mostrar'</script>";
    }
    
    $color = 'white';
    if(isset($_COOKIE['color'])){
        $color = $_COOKIE['color'];
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/img/icono.jpg" type="image/x-icon" />
    <title>Fundación Ecuador People - Portal de Administración</title>
    <link rel="stylesheet" href="./styles/main.css" media="screen">  
    </head>
    <body class="loader-active" style="background-image: url('imagen/fondo_blanco.jpg'); background-position: center center;      
      background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">

        <div id="container">
     	<div id="header">
         <p><img src="./imagen/mega-menu.jpg" width="145" height="47"></p><br>
         <p><span>Administracion</span> de ingresos</p>
         <br>
	    </div>

        <ul id="nav">
         <li><a class="new_ticket" href="document.php?func=close">Cerrar Sesión</a></li>            
        </ul>
        <div id="content">
        <div>
        <p style="text-align: center; color:#E2473B; font-size: 17px;"> 
	    <i class="fa fa-user"></i><?php echo 'Administrador: '.$_SESSION['nombres'].' '.$_SESSION['apellidos']; ?></p>
    <table cellspacing="1" cellpadding="3" border="0" bgcolor="#000" align="center">
        <tr bgcolor="#0fadf0"> 
        <td width="200"><input class="button" type="button" value="Matriculas Online" onClick='window.location.href="curriculums.php?func=mostrar"'></td>
        </tr>
    </table><br>

    <table cellspacing="1" cellpadding="3" border="0" bgcolor="#000" align="center">
        <tr bgcolor="#0fadf0"> 
        <td width="200"><input class="button" type="button" value="Pasantes Online" onClick='window.location.href="online_pasantes.php?func=mostrar"'></td>
        </tr>
    </table><br>

    <table cellspacing="1" cellpadding="3" border="0" bgcolor="#000" align="center">
        <tr bgcolor="#0fadf0"> 
        <td width="200"><input class="button" type="button" value="Sugerencias Online" onClick='window.location.href="index.php?func=mostrar"'></td>
        </tr>
    </table><br>

    <table cellspacing="1" cellpadding="3" border="0" bgcolor="#000" align="center">
        <tr bgcolor="#0fadf0"> 
        <td width="200"><input class="button" type="button" value="Opinión de Instalaciones" onClick='window.location.href="instalaciones.php?func=mostrar"'></td>
        </tr>
    </table><br>

	<table cellspacing="1" cellpadding="3" border="0" bgcolor="#000" align="center">
        <tr bgcolor="#0fadf0"> 
        <td width="200"><input class="button" type="button" value="Administrar Registros " onClick='window.location.href="registrar_estudiante.php"'></td>
		</tr>
	</table><br>

	<table cellspacing="1" cellpadding="3" border="0" bgcolor="#000" align="center">
        <tr bgcolor="#0fadf0"> 
		<td width="200"><input class="button" type="submit" value="Reportes" onClick='window.location.href="reportes_online.php"'></td>
		</tr>
	</table><br>
        </div>
        </div>
        <div><img src="./imagen/Escudo de Ecuador.png" width="100" height="70"></div>
        <div id="footer"><!-- Inicio de Footer. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> Fundación Ecuador People - C.C Design
            <!-- Fin del Footer de Fundacion. --></div>
 
</div>
         </div>
        </body>
        </html>
