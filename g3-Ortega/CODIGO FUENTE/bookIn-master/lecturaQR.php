<?php 
    include('db_login.php');
    session_start();
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
    mysqli_select_db($connection,'book');
    //revisa las variables de sesion y de si existe el post id_asiento
    if (!isset($_SESSION['user_id']) && $_SESSION['user_id']!=null && !isset($_POST['id_asiento'])) {
        header("location: index.php");
    }
    $asiento = $_POST['id_asiento'];
    //revisa que exista el asiento en cuestion
    $query = "SELECT emp.nombre, emp.apellido, cpt.descripcion,cpt.fecha_inicio 
    from capacitaciones cpt inner join (asientos ast inner join empleados emp 
    on ast.id_empleado = emp.ID_USER) 
    on cpt.ID_CAPACITACION = ast.id_capacitacion 
    where ast.id_asiento =".$asiento." " ;    
    $result = mysqli_query($connection,$query);
    if($result){
    $row = mysqli_fetch_array($result);
    //envia una cadena html para confirmar la asistencia
    $texto_resultante = "Deseas confirmar la asistencia de <strong>".$row['nombre']." ".$row['apellido']."
       </strong> a la capacitacion <strong>".$row['descripcion']."</strong> del <strong>".$row['fecha_inicio']."
       </strong> ? <input id='id_asiento' value='".$asiento."'hidden>";
    echo $texto_resultante;
    } else {
        // de no existir un id_asiento correcto o ser otro codigo QR no se mostrara ninguna reserva
         die('El codigo analizado no corresponde a ningun asiento grabado');
    }
?> 