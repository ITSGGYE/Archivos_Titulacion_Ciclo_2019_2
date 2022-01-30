<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");?>

<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-5 col-md-5 mt-4 bg-primary p-3">
			<div class="form form-group">
			<form action="fotox.php" enctype="multipart/form-data" method="post" class="form-inline">

				<div class="form-group mb-2">

				    <input type="file" name="imagen" required="">
				</div>
				<div class="form-group mx-sm-3 mb-2">

			  		<button class="btn btn-warning"> Actualizar</button>
				</div>

			</form>
			</div>
		</div>
	</div>
</div>



	<!--=== End Sticky Footer ===-->
<?php include("footer-examen.php");?>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>