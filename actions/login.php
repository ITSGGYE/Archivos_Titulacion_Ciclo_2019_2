<?php
    //Inicia la sesion
    session_start();
    //Llama variables de base de datos
    include('../db_login.php');
    //Crea conexion de bd
    $con = new mysqli($db_host, $db_username, $db_password);
    if (!$con)
    {
        //Mata el proceso si no encuentra conexion
        die ("No se puede conectar con la base de datos: <br />". mysql_error());
    }
    //Se conecta a la base de datos book
    mysqli_select_db($con,'book');
	if (isset($_POST['userid']) && $_POST['userid']!==''){			
        //Contiene las variables de configuracion para conectar a la base de datos   
        $username= mysqli_real_escape_string($con,(strip_tags($_POST["userid"],ENT_QUOTES)));
        $dirtypwd = mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)));
        //Encripta el password
        $password=sha1(md5($dirtypwd));
        $query_str = ("SELECT * FROM empleados WHERE username =\"$username\" AND pwd=\"$password\"");
        //Analiza los valores del registro de empleados
        $query = mysqli_query($con,$query_str);
            if ($query) {
                //obtiene el array de resultados
                $row = mysqli_fetch_array($query);
                //Grabas en variables de sesion los datos del usuario
                $_SESSION['user_id'] = $row['ID_USER'];
                $_SESSION['is_admin'] = $row['ADMIN'];
                $_SESSION['nombre'] = $row['NOMBRE'];
                $_SESSION['apellido'] = $row['APELLIDO'];
                $_SESSION['email'] = $row['EMAIL'];
                header("location: ../bookin.php");	
            }else{
                //Regresa al login si se encuentra erroneo
                $invalid=sha1(md5("contrasena y email invalido"));
                header("location: ../bookin.php");	
            }
    }else{
        header("location: ../cancel.php");
	}
?>