<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/estilosCrud.css">
    <link rel="stylesheet" href="../estilos/Contra.css">
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
        <div class="border__table" >
            <div class="table-title bg-primary table__header__config">
                <div class="row">
                    <div class="col-sm-7">
                    
						<h2>
                            <img src="../iconos/icons/table.svg" alt="" width="40" height="40"  title="Bootstrap"> 
                            <b>Modificación de Aspirantes</b>
                        </h2>
                    </div>
                    <form action="../controlador/buscacciones.php" method="GET" class="form-inline">
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

            header("location:../vista/acciones.php");

        }else{
            $pagina = $_GET['pagina'];
        }

    }else{
        $pagina = 1;
    }

    $empezar_desde= ($pagina - 1) * $tamagno_pagina;

    $sql="select * from aspirante limit $empezar_desde,$tamagno_pagina;";

    $resultado = $conexion->prepare($sql);

    $resultado->execute();

    $total_paginas=ceil($total_registro/$tamagno_pagina);


}catch(Exception $e){

    die ("ERROR! " . $e->GetMessage() . $e->GetLine());

}           
            ?>


            <table class="table table-responsive text-white table-hover ">
                <thead>
                    <tr class="bg-dark">
                        <th>ID</th>
                        <th>Cv</th>                   
                        <th>Cedula</th>                             
						<th>Nombres</th>            
                        <th>Apellidos</th>
                        <th>Fecha/N</th>
                        <th>Edad</th>
                        <th>Fecha/I</th>  
                        <th>dirección</th>  
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach($resultado as $datos):?>

                        <td><?php echo $datos['ID_Aspirante']?></td>
                        <td><?php echo $datos['curriculum']?></td>
                        <td><?php echo $datos['cedula']?></td>
						<td><?php echo $datos['nombres']?></td>
                        <td><?php echo $datos['apellidos']?></td>
                        <td><?php echo $datos['fecha_nac']?></td>
                        <td><?php echo $datos['edad']?></td>
						<td><?php echo $datos['fecha_ingre']?></td>
                        <td><?php echo $datos['direccion']?></td>
                        <td><?php echo $datos['telefono']?></td>
                        <td><?php echo $datos['correo']?></td>
                        <td>
                            <a href="../controlador/mimodal.php?ID=<?php echo $datos['ID_Aspirante']?> & cedula=<?php echo $datos['cedula']?>  & nombres=<?php echo $datos['nombres']?> & apellidos=<?php echo $datos['apellidos']?> & fecha_nac=<?php echo $datos['fecha_nac']?> & edad=<?php echo $datos['edad']?> & fecha_ingre=<?php echo $datos['fecha_ingre']?>  & direccion=<?php echo $datos['direccion']?> & telefono=<?php echo $datos['telefono']?> & correo=<?php echo $datos['correo']?>" class="edit" > <img src="../iconos/icons/Pen.svg" alt="" width="30" height="30" title="Editar"></a>

                            <a href="../controlador/eliminar.php?ID_Aspirante=<?php echo $datos['ID_Aspirante']?>" class="delete" onclick="return confirmar('¿Realmente deceas borrar al aspirante <?php echo  $datos['nombres'] . $datos['apellidos'];  ?>?')" > <img src="../iconos/icons/trash.svg" alt="" width="30" height="30" title="Eliminar"></a>
                        </td>

                    </tr>

                    <?php endforeach; ?>  
                
                </tbody>
            </table>
			<div class="clearfix" style="margin:0px 2em;">
                <div class="hint-text text-white">Paginas <b><?php echo $total_paginas;?></b> y <b> <?php echo $total_registro;?> </b> Aspirantes Ingresados</div>
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