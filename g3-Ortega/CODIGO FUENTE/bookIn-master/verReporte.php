<?php 
    //retorna variables de sesion
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

    //retorna los asientos registrados en base a la capacitacion enviado por POST
    $cadena_query = "SELECT cpt.id_capacitacion, cpt.fecha_inicio, cpt.descripcion,	emp.nombre,". 
	" emp.apellido, ast.asiento, case when ast.asistencia = true then 'X' else '' END as asistencia   ". 
	" from capacitaciones cpt inner join ".
	" (asientos ast inner join empleados emp ". 
	" on ast.id_empleado = emp.ID_USER) ". 
    " on cpt.id_capacitacion = ast.id_capacitacion and ". 
    " cpt.descripcion='".$capacitacion."' ";

	$query = mysqli_query($connection,$cadena_query);

    if(!$query || mysqli_num_rows($query)==0 ){
        echo '<script>alert("No existen datos para la capacitacion asignada");</script>';
        exit;
    }

?>
    <br>
    <h2> Empleados registrados </h2>
    <table class="table">
    <tr>
    <th>ID CAPACITACION</th>
    <th>FECHA</th>
    <th>DESCRIPCION</th>
    <th>NOMBRE</th>
    <th>ASIENTO</th>
    <th>ASISTENCIA</th>
    </tr>
<?php
    //retorna una tabla con los asientos
    while($row = mysqli_fetch_array($query)){
        echo '<tr>';
        echo "       <td>". $row['id_capacitacion']." </td>";
        echo "        <td>".$row['fecha_inicio']."</td>";
        echo "        <td>". $row['descripcion']."</td>";
        echo "        <td>".$row['nombre']." ".$row['apellido']."</td>";
        echo "        <td>". $row['asiento']."</td>";
        echo "        <td>". $row['asistencia']."</td>";
        echo "    </tr>";
    }


    ?>

    </table>
    <br>
    <h2> Empleados  no registrados </h2>
    <table class="table">
    <tr>
    <th>NOMBRE </th>
    <th>EMAIL</th>
    </tr>
<?php
    //query para obtener todos los que no se han registrado
    $cadena_query = "SELECT emp.nombre,". 
    " emp.apellido, emp.email  ". 
    " from empleados emp where emp.id_user not in".
    " ( select id_empleado ast from asientos ast 
     inner join capacitaciones cpt 
      on ast.id_capacitacion=cpt.id_capacitacion and ". 
    " cpt.descripcion='".$capacitacion."') ";
         
    $query = mysqli_query($connection,$cadena_query);

    while($row = mysqli_fetch_array($query)){
        echo '<tr>';
        echo "       <td>". $row['nombre']." ".$row['apellido']." </td>";
        echo "        <td>".$row['email']."</td>";
        echo "    </tr>";
    }

  mysqli_close($connection);
?>