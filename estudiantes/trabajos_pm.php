<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");?>

<div class="container-fluid">
<!--nav bar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Tareas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php">Principal<span class="sr-only">(current)</span></a>
      </li>


    </ul>
          <form class="form-inline my-2 my-lg-0">
      
      <a class="nav-link btn-danger active" href="../cerrarsesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar</a>
    </form>  
  </div>
</nav>
<!--hasta aqui navbar-->
</div>
<div class="container">
<div class="row d-flex justify-content-center">
    <div class="col-12">
<a href="principal.php"><button type='button' class='btn btn-warning mt-3'><i class="fas fa-fast-backward fa-3x"></i></button></a>
      <hr>

  <!--<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">TRABAJOS</div>
  <div class="card-body">
    <h5 class="card-title">Materia:</h5>
    <h5 class="card-title">Título:</h5>
    <p class="card-text">Estado:</p>
  </div>
</div>-->

 <?php 
 include("../conexion.php");
$id_trabajos=$_GET['id_trabajos'];


$consulta="SELECT * FROM trabajos_lista WHERE id_trabajos='$id_trabajos' AND ci='$usuario' ";
$resultado=$link->query($consulta);
while ($row=$resultado->fetch_assoc()) {
  $ap=$row['ap'];
  $am=$row['am'];
  $nom=$row['nom'];
  $nombre=$row['nombre'];
  $archivo=$row['archivo'];
  $puntaje=$row['puntaje'];
  
}

 ?> 
<div class="card text-white bg-secondary mb-3" style="max-width: 30rem;">
  <div class="card-header bg-dark text-center">PUNTAJE DE TRABAJOS</div>
  <div class="card-body">
    <p class="card-text">Nombre: <font class="text-warning"><?php echo $nom." ".$ap." ".$am;?></font></p>
    <p class="card-text">Comentarios: <font class="text-warning"><?php echo $nombre;?></font></p>
    <p class="card-text">Archivo : <?php echo $archivo;?></p>
    <p class="card-text">Puntaje : <font class="bg-danger text-white p-2" style="font-size: 18px;"><b><?php echo $puntaje;?></b></font></p>
  </div>
</div>
 </div>
 
  

</div>
</div><!--cierra el div del container-->

	<!--=== End Sticky Footer ===-->
<?php include("footer-examen.php");?>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>