<?php 
//Incluímos inicialmente la conexión a la base de datos
require "config/conexion.php";

        $cedula='0958423441';

		$sql_detalle="SELECT pac_cedula from paciente where pac_cedula='$cedula'";
        
        $consulta = ejecutarConsulta($sql_detalle);

        $filas=$consulta->num_rows;

        echo $filas;

        




?>