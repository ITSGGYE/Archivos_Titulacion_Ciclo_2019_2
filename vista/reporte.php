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
    <link rel="stylesheet" href="../estilos/misestilos.css">
</head>
<body class="bodyTotal">
    
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

<div class="container">
        <div class="border__table">
            <div class="table-title bg-primary table__header__config">
                <div class="row">
                    <div class="col-sm-7">
                    
						<h2>
                            <img src="../iconos/icons/table.svg" alt="" width="40" height="40"  title="Bootstrap"> 
                            Datos de
                        Aspirantes Que realizaron Los test
                    </h2>
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

    $tamagno_pagina=5;

    $pagina=1;

    if(isset($_GET['pagina'])){

        if($_GET['pagina'] == 1){

            header("location:../vista/reporte.php");

        }else{
            $pagina = $_GET['pagina'];
        }

    }else{
        $pagina = 1;
    }

    $empezar_desde= ($pagina - 1) * $tamagno_pagina;

    $sql="select 
    *
    from aspirante a
    join puntaje p
    on a.cedula = p.cedula limit $empezar_desde,$tamagno_pagina;";

    $resultado = $conexion->prepare($sql);

    $resultado->execute();

    $total_paginas=ceil($total/$tamagno_pagina);


}catch(Exception $e){

    die ("ERROR! " . $e->GetMessage() . $e->GetLine());

}           
            ?>


            <table class="table text-white table-hover">
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
                        <a href="../controlador/eliminar3.php?cedula=<?php echo $datos['cedula']?>" onclick=" return confirmar('¿Realmente deceas borrar al aspirante <?php echo  $datos['nombres'] . $datos['apellidos']; ?>?')"><img src='../iconos/icons/trash.svg'  width='40' height='40'  title='Eliminar'></a>
                        </td>   
                        </tr>
                        
                    <?php endforeach; ?>  
                
                </tbody>
            </table>
			<div class="clearfix" style="margin:0px 2em;">
                <div class="hint-text text-white">Paginas <b><?php echo $total_paginas;?></b> y <b> <?php echo $total;?> </b> Aspirantes Ingresados</div>
                <ul class="pagination">
                <?php for($i=1; $i<=$total_paginas; $i++){?>
                    <li class="page-item active"><a href="?pagina=<?php echo $i ?>" class="page-link"><?php echo $i?></a></li>
                <?php }?>

                </ul>
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