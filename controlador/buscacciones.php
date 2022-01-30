<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/estilosCrud.css">
    <link rel="stylesheet" href="../estilos/contra.css">

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
        
    ?>
            <?php
                $busqueda = $_GET['accion'];
            ?>
<div class="container" style="margin-top:1.1em;">
        <div style="border-radius:15px; box-shadow: 6px 10px 6px black;">
            <div class="table-title bg-primary" style="border-radius:15px; margin:0px 0px;">
                <div class="row">
                    <div class="col-sm-7">
                    
						<h2>
                            <img src="../iconos/icons/table.svg" alt="" width="40" height="40"  title="Bootstrap"> 
                            Datos 
                            <b>Aspirantes</b>
                        </h2>
                    </div>
                    <form action="../controlador/buscacciones.php" class="form-inline">
                        <div class="col-7">
                             <input type="text" class="form-control" required name ="accion" placeholder="Buscar !!">
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

                            $sql="select * from aspirante where( 
                                cedula like '%$busqueda%' OR
                                nombres like '%$busqueda%' OR
                                apellidos like '%$busqueda%' OR
                                direccion like '%$busqueda%' OR
                                correo like '%$busqueda%'
                                )";

                            $resultado = $conexion->prepare($sql);

                            $resultado->execute();

                            $total_registro = $resultado->rowCount();

                           


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
                        <a href="../controlador/mimodal.php?ID=<?php echo $datos['ID_Aspirante']?> & cedula=<?php echo $datos['cedula']?>  & nombres=<?php echo $datos['nombres']?> & apellidos=<?php echo $datos['apellidos']?> & fecha_nac=<?php echo $datos['fecha_nac']?> & edad=<?php echo $datos['edad']?> & fecha_ingre=<?php echo $datos['fecha_ingre']?>  & direccion=<?php echo $datos['direccion']?> & telefono=<?php echo $datos['telefono']?> & correo=<?php echo $datos['correo']?>" class="edit" > <img src="../iconos/icons/pen.svg" alt="" width="30" height="30" title="Editar"></a>


                            <a href="../controlador/eliminar.php?ID_Aspirante=<?php echo $datos['ID_Aspirante']?>" class="delete" onclick="return confirmar('¿Realmente deceas borrar al aspirante <?php echo  $datos['nombres'] . $datos['apellidos'];  ?>?')"> <img src="../iconos/icons/trash.svg" alt="" width="30" height="30" title="Eliminar"></a>
                        </td>

                    </tr>

                    <?php endforeach; ?>  
                
                </tbody>
            </table>
			<div class="clearfix" style="margin:0px 2em;">
                <div class="hint-text text-dark ">
                <img src="../iconos/icons/search.svg" alt="" width="40" height="40"  title="Buscar">    
                <b> <?php echo $total_registro;?> </b> Resultados en la Busqueda</div>
                
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