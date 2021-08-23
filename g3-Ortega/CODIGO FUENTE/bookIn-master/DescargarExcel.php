<?php
	session_start();
	include('db_login.php');
	$connection = new mysqli($db_host, $db_username, $db_password);
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
    mysqli_select_db($connection,'book');
    $capacitacion;
    if (isset($_POST['capacitacion'])){
        $capacitacion = $_POST['capacitacion'];    
    } 
    //query que muestra todos las reservas de los empleados a una capacitacion y muestra asistencia
    $cadena_query = "SELECT cpt.id_capacitacion, cpt.fecha_inicio, cpt.descripcion,	emp.nombre,". 
	" emp.apellido, ast.asiento,  case when ast.asistencia = true then 'X' else '' END as asistencia   ". 
	" from capacitaciones cpt inner join ".
	" (asientos ast inner join empleados emp ". 
	" on ast.id_empleado = emp.ID_USER) ". 
    " on cpt.id_capacitacion = ast.id_capacitacion and ". 
    " cpt.descripcion='".$capacitacion."' ";

	$query = mysqli_query($connection,$cadena_query);

    if(!$query || mysqli_num_rows($query)==0 ){
        echo '<script>alert("No existen datos para la descarga de excel");</script>';
        exit;
    }

    $filename = "reporte";         
    $file_ending = "xls";
    //script para la descarga de archivo excel
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=$filename.xlsx"); 
    header("Pragma: no-cache"); 
    header("Expires: 0");
    header("Content-Transfer-Encoding: binary "); 
    $sep = "\t"; 
    //impresion de columnas de query
    for ($i = 0; $i < mysqli_num_fields($query); $i++) {
        echo mysqli_field_name($query,$i) . "\t";
        }
        print("\n");            
        //loop de datos de query 
            while($row = mysqli_fetch_row($query))
            {
                $schema_insert = "";
                for($j=0; $j<mysqli_num_fields($query);$j++)
                {
                    if(!isset($row[$j]))
                        $schema_insert .= "NULL".$sep;
                    elseif ($row[$j] != "")
                        $schema_insert .= "$row[$j]".$sep;
                    else
                        $schema_insert .= "".$sep;
                }
                $schema_insert = str_replace($sep."$", "", $schema_insert);
                $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
                $schema_insert .= "\t";
                print(trim($schema_insert));
                print "\n";
              }   

    function mysqli_field_name($result, $field_offset)
    {
        $properties = mysqli_fetch_field_direct($result, $field_offset);
        return is_object($properties) ? $properties->name : null;
    }
?>