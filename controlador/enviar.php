<!DOCTYPE html>
<html lang="en">
<head>
	<title>Enviar Correo</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
	<link rel="stylesheet" type="text/css" href="../estilos/Contra.css">
	<link rel="stylesheet" type="text/css" href="../estilos/css/main2.css">
    <!--===============================================================================================-->
</head>
<body>

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>

<header>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 shadow "> 
        <a href="" class="navbar-brand col-sm-3 col-md-2 mr-0 text-info" >
        <img src="../imagenes/logo2.ico" alt="" width="30" height="30" title="Serviportex"> 
        ServiPortex
        </a>

       
        <ul class = "navbar-nav px-3">
            <form class="form-check-inline">
                <a class="btn" href="../vista/GestionUsuario.php"  >
                <img src="../iconos/icons/arrow-bar-left.svg" alt="" width="30" height="30" title="Menu"> 
                </a>
                <a class="btn" href="../modelo/cerrar.php" >
                <img src="../iconos/icons/power.svg" alt="" width="30" height="30" title="Cerrar Sessión"> 
                </a>
            </form>
        </ul>
    </nav>
</header>

    <?php 
        $cedula = $_GET['cedula'];
        $correo = $_GET['correo'];
        $nombre = $_GET['nombres'];
        $apellido = $_GET['apellidos'];

        include_once('../modelo/conexion.php');

        $db = Conectar::conexion();

        $array = $db->query("select * from usuarios where cedula = $cedula");

    ?>

	<div class="contenedor">
		<div class="container-contact2">
            <img src="../imagenes/correo.svg" class="img__contact2" alt="">
			<div class="wrap-contact2">
				<form action="../controlador/enviar2.php" method="POST" class="contact2-form validate-form">
					<span class="contact2-form-title">
						Enviar Correo a <?php echo $nombre .$apellido;?> 
					</span>
					<div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input2" type="text" name="correo" readonly value="<?php echo $correo;?>">
                    </div>
                    
                    <div class="wrap-input2 validate-input" data-validate="Name is required">
						<input class="input2" type="text" name="titulo" value="Serviportex del Ecuador" readonly>
					</div>

                    <?php foreach($array as $datos): ?>

					<div class="wrap-input2 validate-input" data-validate = "Message is required">
						<textarea class="input2 text-center" name="mensaje" style="resize: none;">
                            Felicidades  <?php echo  $nombre . $apellido;?> usted a sido seleccionado para realizar las pruebas del proceso de selecion que postulo por favor sigue las instruccuiones para realizar las mismas
                        <?php echo 'Su usuario es el siguiente ' . $datos['Nombre_Usuario'] . ' y su contraseña es ' . $datos['contraseña']?> con estas credenciales usted ingresara al sistema y ingrese sus datos y realize su prueba
                        </textarea>
						
					</div>

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn" onclick="return confirmar('¿Realmente deceas enviar este correo al aspirante <?php echo  $nombre . $apellido  ?>?')">
								Enviar
                            </button>
                            
                            <?php endforeach; ?>
						</div>
					</div>
				</form>
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
