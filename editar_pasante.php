<?php
    session_start();
require_once '../appws/clases/conexion.php';
$objConexion = new conexion();
$conexion = $objConexion->getConexion();
if (isset($_POST["pst_cedula"])) {
    $query = null;
    $stmt = null;
    try {
        $conexion->query("SET AUTOCOMMIT = 0");
        $statement = "UPDATE titulacion_6to_c.tb_registro_pasante SET pst_nombres = ";
        $statement = $statement."'".$_POST["pst_nombres"]."'";
        $statement = $statement.", pst_apellidos = ";
        $statement = $statement."'".$_POST["pst_apellidos"]."'";
        $statement = $statement.", pst_convencional = ";
        $statement = $statement."'".$_POST["pst_convencional"]."'";
        $statement = $statement.", pst_celular = ";
        $statement = $statement."'".$_POST["pst_celular"]."'";
        $statement = $statement.", pst_correo = ";
        $statement = $statement."'".$_POST["pst_correo"]."'";
        $statement = $statement.", pst_direccion = ";
        $statement = $statement."'".$_POST["pst_direccion"]."'";
        $statement = $statement.", pst_fecha_nacimiento = ";
        $statement = $statement."'".$_POST["pst_fecha_nacimiento"]."'";
        $statement = $statement.", pst_edad = ";
        $statement = $statement."'".$_POST["pst_edad"]."'";
        $statement = $statement.", pst_enfermedad = ";
        $statement = $statement."'".$_POST["pst_enfermedad"]."'";
        $statement = $statement.", pst_alergias = ";
        $statement = $statement."'".$_POST["pst_alergias"]."'";
        $statement = $statement.", pst_tipo_sangre = ";
        $statement = $statement."'".$_POST["pst_tipo_sangre"]."'";
        $statement = $statement.", pst_genero = ";
        $statement = $statement."'".$_POST["pst_genero"]."'";
        $statement = $statement.", pst_curso = ";
        $statement = $statement."'".$_POST["pst_curso"]."'";
        $statement = $statement.", pst_jornada = ";
        $statement = $statement."'".$_POST["pst_jornada"]."'";
        $statement = $statement.", pst_provincia = ";
        $statement = $statement."'".$_POST["pst_provincia"]."'";
        $statement = $statement.", pst_ciudad = ";
        $statement = $statement."'".$_POST["pst_ciudad"]."'";
        $statement = $statement.", pst_dependiente = ";
        $statement = $statement."'".$_POST["pst_dependiente"]."'";
        $statement = $statement.", pst_trabaja = ";
        $statement = $statement."'".$_POST["pst_trabaja"]."'";
        $statement = $statement.", pst_vive = ";
        $statement = $statement."'".$_POST["pst_vive"]."'";
        $statement = $statement.", pst_universidad = ";
        $statement = $statement."'".$_POST["pst_universidad"]."'";
        $statement = $statement.", pst_civil = ";
        $statement = $statement."'".$_POST["pst_civil"]."'";
        $statement = $statement.", pst_hijos = ";
        $statement = $statement."'".$_POST["pst_hijos"]."'";
        $statement = $statement.", pst_nombre_ref = ";
        $statement = $statement."'".$_POST["pst_nombre_ref"]."'";
        $statement = $statement.", pst_apellidos_ref = ";
        $statement = $statement."'".$_POST["pst_apellidos_ref"]."'";
        $statement = $statement.", pst_tlf_ref = ";
        $statement = $statement."'".$_POST["pst_tlf_ref"]."'";
        $statement = $statement.", pst_direccion_ref = ";
        $statement = $statement."'".$_POST["pst_direccion_ref"]."'";
        $statement = $statement.", pst_fecha = ";
        $statement = $statement."'".$_POST["pst_fecha"]."'";
        $statement = $statement. " WHERE pst_cedula = ";
        $statement = $statement."'".$_POST["pst_cedula"]."'";
        if($conexion->query($statement)){
            $conexion->query("COMMIT");
            
            echo "<script>alert('ACTUALIZADO CON EXITO');
            window.location.href='historial_pasante.php?func=mostrar';</script>";
        }
    } catch (PDOException $e) {
        $conexion->query("ROLLBACK");
        echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
        die($e->getMessage());
    }
}
$cedula = $_GET['editar_pst'];
$query = "SELECT * FROM titulacion_6to_c.tb_registro_pasante WHERE pst_cedula = :CEDULA";
$stmt = $conexion->prepare($query);
$stmt->bindParam(":CEDULA",$cedula,PDO::PARAM_STR,13);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(isset($_SESSION['nombres'])){
        if($_SESSION['cod_rol'] != '1'){
            echo "<script language='javascript'> alert('No posee privilegios para esta area');window.location = '../index.html'; </script>";
        }
    }else{
        echo "<script language='javascript'> window.location = '../index.html'; </script>";
    }
    $color = 'white';
    if(isset($_COOKIE['color'])){
        $color = $_COOKIE['color'];
    }  
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../assets/img/icono.jpg" type="image/x-icon" />

    <title>Fundación Ecuador People - Editar datos de Pasantes</title>

    <!--=== Bootstrap CSS ===-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="../assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="../assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="../assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="../assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="../assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="../style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="../assets/css/responsive.css" rel="stylesheet">
    <script src="../inputs-validation.js"></script>

</head>

<body class="loader-active" style="background-image: url('imagen/fondo_blanco.jpg'); background-position: center center;      
      background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-12 text-left">
                        <i class="fa fa-user"></i> <?php echo 'Bienvenido: '.$_SESSION['nombres'].' '.$_SESSION['apellidos']; ?>
                    </div>

                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
      <div id="header-bottom" style="background-color:rgba(0,0,0,0.5);">
          <div class="container">
          <div class="row">
              <!--== Logo Start ==-->
              <div class="col-lg-4">
              <h1 style="color:#fff; font-size: 25px;">Fundación Ecuador People</h1>
              </div>
              <!--== Logo End ==-->
              <!--=Inicio de Registros ==-->
              <div class="col-lg-8 d-none d-xl-block">
              <nav class="mainmenu alignright">
                  <ul>
                      <li class="active"><a style="color: yellow;" href="historial_pasante.php?func=mostrar">Volver Atrás</a></li>
                      <li><a href="document.php?func=close">Cerrar Sesión</a></li>
                  </ul>
                  </nav>
              </div>
                  <!--== Fin de Registros==-->
            </div>
          </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->
<style>
    .status{
        background-color: green;
        border-radius: 15px 15px 15px 15px;
        width: 50%;
        font-size: 1rem;
        letter-spacing: 0.4rem;
        color: white;
        font-weight: bold;
    }
</style>
    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" style="margin-top:150px;" class="section-padding">
        <div class="container">
        <div class="row">
        <div class="col-lg-10 m-auto">
        <div class="contact-form">

        <center>
        <div class="status">
            <?php if(isset($estado)){ echo $estado;} ?>
        </div>
        </center>

        <center><img src="imagen/mega-menu.jpg" style="width: 30%; border-radius: 5px;">
        <h4 style="color: #0985E1;">Editar registro de información de Pasante
        </h4></center><br>

      <form style="color:#0985E1;" enctype="multipart/form-data" action="" method="POST">
          <div class="form-row">
               <div class="col-lg-2 col-md-3">
                  <input onkeypress="return soloNumeros(event);" id="pst_cedula" type="text" name="pst_cedula" maxlength="10" value="<?php echo $row['pst_cedula'];?>" readonly>
                  <label for="pst_cedula">Cedula/Pasaporte:</label>
                </div>

                <div class="col-lg-4 col-md-3">
                  <input id="pst_nombres" type="text" name="pst_nombres" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_nombres'];?>" required>
                  <label for="pst_nombres">Nombres: </label>
                </div>

                <div class="col-lg-4 col-md-3">
                      <input id="pst_apellidos" name="pst_apellidos" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_apellidos']; ?>" type="text" required>
                      <label for="pst_apellidos">Apellidos: </label>
                </div>

                <div class="col-lg-2 col-md-3">
                    <input id="pst_convencional" name="pst_convencional" onkeypress="return soloNumeros(event);" value="<?php echo $row['pst_convencional']; ?>" maxlength="9" type="text" required>
                    <label for="pst_convencional">Convencional: </label>
               </div> 
        </div>

          <div class="form-row">
                <div class="col-lg-2 col-md-3">
                    <input id="pst_celular" name="pst_celular" onkeypress="return soloNumeros(event);" value="<?php echo $row['pst_celular']; ?>" maxlength="10" type="text" required>
                    <label for="pst_celular">Celular: </label>
            </div>    
          
            <div class="col-lg-4 col-md-3">
                  <input id="pst_correo" name="pst_correo" onkeypress="return soloMail(event);" value="<?php echo $row['pst_correo']; ?>" type="text" required>
                  <label for="pst_correo">Correo Electronico: </label>
            </div>
            
            <div class="col-lg-4 col-md-3">
                  <input id="pst_direccion" name="pst_direccion" onkeypress="return soloMail(event);" value="<?php echo $row['pst_direccion']; ?>" type="text" required>
                  <label for="pst_direccion">Dirección: </label>
            </div>

            <div class="col-lg-2 col-md-3">
                <input id="pst_fecha_nacimiento" name="pst_fecha_nacimiento" onkeypress="return soloMail(event);" value="<?php echo $row['pst_fecha_nacimiento']; ?>" type="text" required>
                <label for="pst_fecha_nacimiento">Fecha de Nacimiento: </label>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-1 col-md-3">
                <input id="pst_edad" name="pst_edad" onkeypress="return soloNumeros(event);" value="<?php echo $row['pst_edad']; ?>" type="text" required>
                <label for="pst_edad">Edad: </label>
            </div>

            <div class="col-lg-4 col-md-3">
                <input id="pst_enfermedad" name="pst_enfermedad" onkeypress="return soloLetras(event);" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_enfermedad']; ?>" type="text" required>
                <label for="pst_enfermedad">Enfermedad: </label>
            </div>
          
            <div class="col-lg-3 col-md-3">
                <input id="pst_alergias" name="pst_alergias" onkeypress="return soloLetras(event);" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_alergias']; ?>" type="text" required>
                <label for="pst_alergias">Alergia: </label>
            </div>
        
            <div class="col-lg-2 col-md-3">
                <input id="pst_tipo_sangre" name="pst_tipo_sangre" value="<?php echo $row['pst_tipo_sangre']; ?>" type="text" required>
                <label for="pst_tipo_sangre">Tipo de Sangre: </label>
            </div>
            
            <div class="col-lg-2 col-md-3">
                <input id="pst_genero" name="pst_genero" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_genero']; ?>" type="text" required>
                <label for="pst_genero">Genero: </label>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-4 col-md-3">
                <input id="pst_curso" name="pst_curso" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_curso']; ?>" type="text" required>
                <label for="pst_curso">Curso: </label>
            </div>

            <div class="col-lg-4 col-md-3">
                <input id="pst_jornada" name="pst_jornada" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_jornada']; ?>" type="text" required>
                <label for="pst_jornada">Jornada: </label>
            </div>

            <div class="col-lg-1 col-md-3">
                  <input id="pst_trabaja" name="pst_trabaja" onkeypress="return soloLetras(event);" type="text" value="<?php echo $row['pst_trabaja']; ?>" required>
                <label for="pst_trabaja">Trabaja: </label>
            </div>
        
            <div class="col-lg-3 col-md-3">
                <input id="pst_provincia" name="pst_provincia" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_provincia']; ?>" type="text" required>
                <label for="pst_provincia">Provincia de Nacimiento: </label>
            </div>
        </div>
        <div class="form-row"> 
           <div class="col-lg-3 col-md-3">
                <input id="pst_ciudad" name="pst_ciudad" type="text" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_ciudad']; ?>" required>
                <label for="pst_ciudad">Ciudad de recidencia: </label>
            </div>
        
            <div class="col-lg-3 col-md-3">
                  <input id="pst_dependiente" name="pst_dependiente" type="text" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_dependiente']; ?>" required>
                <label for="pst_dependiente">Dependiente de ud: </label>
            </div>

            <div class="col-lg-3 col-md-3">
                  <input id="pst_vive" name="pst_vive" type="text" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_vive']; ?>" required>
                <label for="pst_vive">Vive con: </label>
            </div>
        
            <div class="col-lg-3 col-md-3">
                  <input id="pst_civil" name="pst_civil" type="text" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_civil']; ?>" required>
                <label for="pst_civil">Estado Civil: </label>
            </div>
         </div>

        <div class="form-row">
            <div class="col-lg-1 col-md-2">
                <input id="pst_hijos" name="pst_hijos" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_hijos']; ?>" type="text" required>
                <label for="pst_hijos">Hijos: </label>
            </div>
        
            <div class="col-lg-3 col-md-3">
                <input id="pst_universidad" name="pst_universidad" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_universidad']; ?>" type="text" required>
                <label for="pst_universidad">Universidad: </label>
            </div>
        
            <div class="col-lg-4 col-md-3">
                <input id="pst_nombre_ref" name="pst_nombre_ref" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_nombre_ref']; ?>" type="text" required>
                <label for="pst_nombre_ref">Nombre de referencia: </label>
            </div>
          
            <div class="col-lg-4 col-md-3">
                <input id="pst_apellidos_ref" name="pst_apellidos_ref" onkeypress="return soloLetras(event);" value="<?php echo $row['pst_apellidos_ref']; ?>" type="text" required>
                <label for="pst_apellidos_ref">Apellidos de referencia: </label>
            </div>
        </div>

          <div class="form-row">
            <div class="col-lg-5 col-md-3">
                  <input id="pst_direccion_ref" name="pst_direccion_ref" onkeypress="return soloMail(event);" value="<?php echo $row['pst_direccion_ref']; ?>" type="text" required="">
                  <label for="pst_direccion_ref">Dirección de referencia: </label>
             </div>
        
             <div class="col-lg-3 col-md-3">
                  <input id="est_tlf_ref" name="pst_tlf_ref" onkeypress="return soloNumeros(event);" value="<?php echo $row['pst_tlf_ref']; ?>" maxlength="10" type="text" required="">
                  <label for="pst_tlf_ref">Telefono/referencia: </label>
             </div>

               <div class="col-lg-4 col-md-3">
                    <input id="pst_fecha" name="pst_fecha" value="<?php echo $row['pst_fecha']; ?>" type="text" readonly="">
                    <label for="pst_fecha">Fecha de registros: </label>
               </div>

            <div class="col-auto my-1">
            <button type="submit" id="submit" class="btn btn-primary" name="enviar">Editar Datos</button>
            </div>
        </div>  
          </div>
      </form>
      </div>

    </section>
    <!--== Login Page Content End ==-->

    <!--== Footer Area Start ==-->
    <section id="footer-area">
        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy; <script>document.write(new Date().getFullYear());</script> Fundación Ecuador People - C.C Design
                </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->
    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="../assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="../assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="../assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="../assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="../assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="../assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="../assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="../assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="../assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="../assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="../assets/js/plugins/slicknav.min.js"></script>
    <!--=== Mian Js ===-->
    <script src="../assets/js/main.js"></script>

</body>

</html>
