<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Menu</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/misestilos.css">
    <link rel="stylesheet" href="../estilos/contra.css">

    <style>
      body{
        background:gray;
        font-size:1.rem;
      }

    .bar,.barra{
      border-radius: 20px;
    }.title{
      letter-spacing:1px;
    }
	</style>

</head>
<body class="bodyTotal">

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>

<?php 

    include_once('../pie/header.php');
    
?>

<br>
<br>
  <div class="container-fluid p-4 " >
    <div class="row" style="padding-left: 6em;">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar pt-5" style="border-radius: 20px;">
        <hr>
        <div class="sidebar-sticky bg-dark bar" >
          <ul class="nav flex-column">
            
          <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/menu.php">
            <img src="../iconos/icons/arrow-bar-left.svg" alt="" width="25" height="25" title="Nuevo aspirante">   
                Menu
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/aspirante.php">
            <img src="../iconos/icons/arrow-bar-right.svg" alt="" width="25" height="25" title="Nuevo aspirante">   
                Nuevo Aspirante
              </a>
            </li>
               
            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/acciones.php">
            <img src="../iconos/icons/tools.svg" alt="" width="25" height="25" title="Acciones">   
                Acción 
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/GestionUsuario.php">
            <img src="../iconos/icons/people.svg" alt="" width="25" height="25" title="Gestion usuario">   
                Gestion de Usuario  
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/test.php">
            <img src="../iconos/icons/book-half-fill.svg" alt="" width="25" height="25" title="test">   
                Test 
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/reporte.php">
            <img src="../iconos/icons/book.svg" alt="" width="25" height="25" title="Reporte Aspirante">   
                Reporte Aspirantes 
              </a>
            </li>

          </ul>

        </div>
        <hr>
      </nav>

      <div class="col-md-9 pt-4 pl-5 bg-dark barra" >
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         
        </div>
      
        
        <h2 class="text-info text-center text-uppercase title">
          <img src="../iconos/icons/table.svg" alt="" width="40" height="40"  title="Mejores Puntuaciones"> 
          Resultados de la busqueda 
          
        </h2>
      <div class="table-responsive">
        <table class="table table-striped table-dark ">
            <?php 
                $busqueda = $_GET['buscaMenu'];

                if (isset($_GET['buscaMenu'])) {
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
                 }
            ?>
          
            


            <table class="table table-striped table-dark table-hover">
                <thead >
                    <tr>
                            <th>ID</th>
                            <th>Puntaje</th>
                            <th>Fecha</th>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Acción</th>
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
                        </a> </td></tr>
                        
                    <?php endforeach; ?>  
                
                </tbody>
            </table>
			<div class="clearfix" style="margin:0px 2em;">
                <div class="hint-text text-info">
                <img src="../iconos/icons/search.svg" alt="" width="40" height="40"  title="Buscar">
                <b> <?php echo $new;?> </b> Resultados de la busqueda </div>
               
            </div>

      </div> 
    
    </div>
    
   
  </div>


   
    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>

 
</body>
</html>