<?php

    session_start();

    if(!isset($_SESSION['usuario'])){

        header('location:../index.php');
        
    }

    $cedula = $_SESSION['usuario'];

            //comienso de la conexion y insertar a la base de datos 
            require_once("../modelo/conexion.php");

            $db = new Conectar();
    
            $sql = $db->conexion();
    
            $consulta = $sql->query("select 
            *
            from aspirante a
            join pruebas p
            on a.cedula = p.cedula where p.cedula = '$cedula';");
            

            while($datos = $consulta->fetch(PDO::FETCH_ASSOC)):

                $nombres = $datos['nombres'];
                $apellidos = $datos['apellidos'];
           

                $total = $datos['psicotecnico'] + $datos['personalidad'];

                $fecha =  date("Y").'/'.date("m").'/'.date("j");

                

                $sql->query("insert into puntaje(nota,fecha_prueba,cedula,nombres,apellidos)value('$total','$fecha','$cedula','$nombres','$apellidos')");


                $sql->query("DELETE FROM usuarios WHERE cedula = '$cedula';");

            endwhile;
    

    session_destroy();

    header('location:../index.php');


?>