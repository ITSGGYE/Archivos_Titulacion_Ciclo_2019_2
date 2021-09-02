
<?php

if(Session::getUID()!=""){
		print "<script>window.location='index.php?view=home';</script>";
}

?>
<br><br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>
<style type="text/css">
.html,body{
     /* Para que funcione correctamente en Smartphones y Tablets */
     height:100vh;
}
body {
     /* Ruta relativa o completa a la imagen */
     background-image: url(img/fondo.jpg);
     /* Centramos el fondo horizontal y verticalmente */
     background-position: center center;
     /* El fonde no se repite */
     background-repeat: no-repeat;
     /* Fijamos la imagen a la ventana para que no supere el alto de la ventana */
     background-attachment: fixed;
     /* El fonde se re-escala automáticamente */
     background-size: cover;
     /* Color de fondo si la imagen no se encuentra o mientras se está cargando */
     background-color: #FFF;
     /* Fuente para el texto */
     text-align: center;
     color: #000;
     font-family: "Times New Roman", Times, serif;
}
</style> 
</style>
<div class="container">
<div class="row">
    	<div class="col-md-4 col-md-offset-4">
    	<?php if(isset($_COOKIE['password_updated'])):?>
    		<div class="alert alert-success">
    		<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
    		<p>Pruebe iniciar sesion con su nueva contraseña.</p>

    		</div>
    	<?php setcookie("password_updated","",time()-18600);
    	 endif; ?>

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Iniciar Sesión</h4>
	  <br>
	  <div class="card-header">
	  <img src="img/fer1.jpg">
	  </div>
  </div>
  <div class="card-content table-responsive">
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?view=processlogin">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Usuario" name="mail" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-primary btn-block" type="submit" value="Acceder">
			    	</fieldset>
			      	</form>
			      	</div>
			      	</div>
		</div>
	</div>
</div>
</body>
</html>