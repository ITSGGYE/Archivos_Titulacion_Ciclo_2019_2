<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/estilosCrud.css">
    <link rel="stylesheet" href="../estilos/contra.css">


    <style>
		a{
			text-decoration: none !important;
		}

	</style>
</head>
<body style ="padding-top:2.5em; background:-webkit-linear-gradient(right, #3931af, #00c6ff);">

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>

    <?php
        include_once('../pie/headerOtros.php');
        require_once('../controlador/principal.php');
        
        
    ?>

            <?php
                $busqueda = $_GET['accion'];
            ?>

<div class="container" style="margin-top:1.1em;"  >
        <div style="border-radius:15px; box-shadow: 6px 10px 6px black;">
            <div class="table-title bg-primary" style="border-radius:15px; margin:0px 0px;">
                <div class="row">
                    <div class="col-sm-7">
                    
						<h2>
                            <img src="../iconos/icons/table.svg" alt="" width="40" height="40"  title="Bootstrap"> 
                            Datos de  
                        <b>Aspirantes Que realizaron Los test</b></h2>
                    </div>
                    <form action="../controlador/buscarepo.php" method="GET" class="form-inline">
                        <div class="col-7">
                             <input type="text" class="form-control" required name ="accion" placeholder="Buscar!!">
                        </div>
                         <div class="col">
                           <button type="sumbit" class="btn">
                            <img src="../iconos/icons/search.svg" alt="" width="40" height="40"  title="Buscar"> 
                            </button>
                         </div>
                    </form>
                </div>
            </div>

            <?php

try{
    $conexion = new PDO('mysql:host=localhost; dbname=serviportex','root','');

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("set character set utf8");



    $sql="select * from
    aspirante a
    join puntaje p
    on a.cedula = p.cedula
    where ( 
    p.nota like '%$busqueda%' OR
    p.cedula like '%$busqueda%' OR
    p.nombres like '%$busqueda%' OR
    p.apellidos like '%$busqueda%' 
    );";

    $resultado = $conexion->prepare($sql);

    $resultado->execute();

    $new=$resultado->rowCount();



}catch(Exception $e){

    die ("ERROR! " . $e->GetMessage() . $e->GetLine());

}           
            ?>


            <table class="table table-borderless text-white table-hover">
                <thead >
                    <tr class="bg-dark">
                            <th>ID</th>
                            <th>Puntaje</th>
                            <th>Fecha</th>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Reporte</th>
                            <th>Eliminar</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($resultado as $datos):?>
                        <?php
                        echo "<tr><td>" . $datos['ID_puntaje'] . "</td>";
                        echo "<td>" . $datos['nota'] ."</td>";
                        echo "<td>" . $datos['fecha_prueba'] . "</td>" ;
                        echo "<td>" . $datos['cedula'] . "</td>";
                        echo "<td>" . $datos['nombres'] . "</td>";
                        echo "<td>" . $datos['apellidos'] ."</td>";
                        ?>

                        <td><a href="../vista/reporteFinal.php?nota=<?php echo $datos['nota']?>  & fecha=<?php echo $datos['fecha_prueba']?> & cedula=<?php echo $datos['cedula']?> & nombre=<?php echo $datos['nombres']?> & apellido=<?php echo $datos['apellidos']?> & cv=<?php echo $datos['curriculum']?> & correo=<?php echo $datos['correo']?> ">
                        <img src='../iconos/icons/Eye-fill.svg'  width='40' height='40'  title='Ver'>
                        </a> </td>
                        <td>
                        <a href="../controlador/eliminar3.php?cedula=<?php echo $datos['cedula']?>" onclick="return confirmar('¿Realmente deceas borrar al aspirante <?php echo  $datos['nombres'] . $datos['apellidos']; ?>?')"><img src='../iconos/icons/trash.svg'  width='40' height='40'  title='Eliminar'></a>
                        </td>   
                        </tr>
                        
                    <?php endforeach; ?>  
                
                </tbody>
            </table>
			<div class="clearfix" style="margin:0px 2em;">
                <div class="hint-text text-dark">
                <img src="../iconos/icons/search.svg" alt="" width="40" height="40"  title="Buscar">
                <b> <?php echo $new;?> </b> Resultados de la busqueda </div>
               
            </div>
        </div>
    </div>
    <script>

        function confirmar(mensaje){

            return (confirm(mensaje))?true:false;

        }

    </script>


    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
</body>
</html>