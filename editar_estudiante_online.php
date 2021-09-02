<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once '../appws/clases/conexion.php';
$objConexion = new conexion();
$conexion = $objConexion->getConexion();
if (isset($_POST["est_cedula"])) {
    $query = null;
    $stmt = null;

    try {
//<!--=== SENTENCIA ESTATICA ===-->
        $conexion->query("SET AUTOCOMMIT = 0");
        $statement = "UPDATE titulacion_6to_c.tb_curriculum SET est_nombres = ";
        $statement = $statement."'".$_POST["est_nombres"]."'";
        $statement = $statement.", est_apellidos = ";
        $statement = $statement."'".$_POST["est_apellidos"]."'";
        $statement = $statement.", est_convencional = ";
        $statement = $statement."'".$_POST["est_convencional"]."'";
        $statement = $statement.", est_celular = ";
        $statement = $statement."'".$_POST["est_celular"]."'";
        $statement = $statement.", est_correo = ";
        $statement = $statement."'".$_POST["est_correo"]."'";
        $statement = $statement.", est_direccion = ";
        $statement = $statement."'".$_POST["est_direccion"]."'";
        $statement = $statement.", est_fecha_nacimiento = ";
        $statement = $statement."'".$_POST["est_fecha_nacimiento"]."'";
        $statement = $statement.", est_edad = ";
        $statement = $statement."'".$_POST["est_edad"]."'";
        $statement = $statement.", est_enfermedad = ";
        $statement = $statement."'".$_POST["est_enfermedad"]."'";
        $statement = $statement.", est_alergias = ";
        $statement = $statement."'".$_POST["est_alergias"]."'";
        $statement = $statement.", est_tipo_sangre = ";
        $statement = $statement."'".$_POST["est_tipo_sangre"]."'";
        $statement = $statement.", est_genero = ";
        $statement = $statement."'".$_POST["est_genero"]."'";
        $statement = $statement.", est_curso = ";
        $statement = $statement."'".$_POST["est_curso"]."'";
        $statement = $statement.", est_jornada = ";
        $statement = $statement."'".$_POST["est_jornada"]."'";
        $statement = $statement.", est_provincia = ";
        $statement = $statement."'".$_POST["est_provincia"]."'";
        $statement = $statement.", est_ciudad = ";
        $statement = $statement."'".$_POST["est_ciudad"]."'";
        $statement = $statement.", est_trabajo = ";
        $statement = $statement."'".$_POST["est_trabajo"]."'";
        $statement = $statement.", est_vive = ";
        $statement = $statement."'".$_POST["est_vive"]."'";
        $statement = $statement.", est_hermanos = ";
        $statement = $statement."'".$_POST["est_hermanos"]."'";
        $statement = $statement.", est_civil = ";
        $statement = $statement."'".$_POST["est_civil"]."'";
        $statement = $statement.", est_hijos = ";
        $statement = $statement."'".$_POST["est_hijos"]."'";
        $statement = $statement.", est_nombre_ref = ";
        $statement = $statement."'".$_POST["est_nombre_ref"]."'";
        $statement = $statement.", est_apellidos_ref = ";
        $statement = $statement."'".$_POST["est_apellidos_ref"]."'";
        $statement = $statement.", est_cedula_ref = ";
        $statement = $statement."'".$_POST["est_cedula_ref"]."'";
        $statement = $statement.", est_tlf_ref = ";
        $statement = $statement."'".$_POST["est_tlf_ref"]."'";
        $statement = $statement.", est_correo_ref = ";
        $statement = $statement."'".$_POST["est_correo_ref"]."'";
        $statement = $statement.", est_direccion_ref = ";
        $statement = $statement."'".$_POST["est_direccion_ref"]."'";
        $statement = $statement.", est_aceptar = ";
        $statement = $statement."'".$_POST["est_aceptar"]."'";
        $statement = $statement.", est_fecha = ";
        $statement = $statement."'".$_POST["est_fecha"]."'";
        $statement = $statement. " WHERE est_cedula = ";
        $statement = $statement."'".$_POST["est_cedula"]."'";
        if($conexion->query($statement)){
            $conexion->query("COMMIT");

            echo "<script>alert('ACTUALIZADO CON EXITO');
            window.location.href='curriculums.php?func=mostrar';</script>";
        }
    } catch (PDOException $e) {
        $conexion->query("ROLLBACK");
        echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
    }
}

$cedula = $_GET['editar_est'];
$query = "SELECT * FROM titulacion_6to_c.tb_curriculum WHERE est_cedula = :CEDULA";
$stmt = $conexion->prepare($query);
$stmt->bindParam(":CEDULA",$cedula,PDO::PARAM_STR,13);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($_SESSION['nombres'])) {
    if ($_SESSION['cod_rol'] != '1') {
        echo "<script language='javascript'> alert('No posee privilegios para esta area');window.location = '../index.html'; </script>";
    }
} else {
    echo "<script language='javascript'> window.location = '../index.html'; </script>";
}
$color = 'white';
if (isset($_COOKIE['color'])) {
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

    <title>Fundación Ecuador People - Editar Datos de estudiantes online</title>

    <!--=== Bootstrap CSS ===-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="inputs-validation.js"></script>
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
            <i class="fa fa-user"></i> <?php echo 'Bienvenido: ' . $_SESSION['nombres'] . ' ' . $_SESSION['apellidos']; ?>
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
                    <li class="active"><a style="color: yellow;" href="curriculums.php?func=mostrar">Volver Atrás</a></li>
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

<!--== Login Page Content Start ==-->
<section id="lgoin-page-wrap" style="margin-top:150px;" class="section-padding">
    <div class="container">
        <div class="row">
        <div class="col-lg-10 m-auto">
        <div class="contact-form">
        <center><img src="imagen/mega-menu.jpg" style="width: 30%; border-radius: 5px;">
            <h4 style="color: #0985E1;">Editar Datos de Estudiante</h4></center>
            <br>

            <form style="color:#0985E1;" enctype="multipart/form-data" action="" method="POST">
                <div class="form-row">
                    <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloNumeros(event)" id="est_cedula" type="text" name="est_cedula" maxlength="10"
                               value="<?php echo $row['est_cedula']; ?>" readonly>
                        <label for="est_cedula">Cedula/Pasaporte:</label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_nombres" type="text" name="est_nombres"
                               value="<?php echo $row['est_nombres']; ?>" required>
                        <label for="est_nombres">Nombres: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_apellidos" name="est_apellidos"
                               value="<?php echo $row['est_apellidos']; ?>" type="text" required>
                        <label for="est_apellidos">Apellidos: </label>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloCedula(event)" id="est_convencional" name="est_convencional"
                               value="<?php echo $row['est_convencional']; ?>" maxlength="9" type="text"
                               required>
                        <label for="est_convencional">Convencional: </label>
                    </div>

                     <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloCedula(event)" id="est_celular" name="est_celular" value="<?php echo $row['est_celular']; ?>"
                               maxlength="10" type="text" required>
                        <label for="est_celular">Celular: </label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloMail(event)" id="est_correo" name="est_correo" value="<?php echo $row['est_correo']; ?>"
                               type="text" required>
                        <label for="est_correo">Correo Electronico: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloMail(event)" id="est_direccion" name="est_direccion"
                               value="<?php echo $row['est_direccion']; ?>" type="text" required>
                        <label for="est_direccion">Dirección: </label>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloCedula(event)" id="est_fecha_nacimiento" name="est_fecha_nacimiento"
                               value="<?php echo $row['est_fecha_nacimiento']; ?>" type="text" required>
                        <label for="est_fecha_nacimiento">Fecha de Nacimiento: </label>
                    </div>

                    <div class="col-lg-1 col-md-3">
                        <input onkeypress="return soloCedula(event)" id="est_edad" name="est_edad" value="<?php echo $row['est_edad']; ?>" type="text"
                               required>
                        <label for="est_edad">Edad: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_enfermedad" name="est_enfermedad"
                               value="<?php echo $row['est_enfermedad']; ?>" type="text" required>
                        <label for="est_enfermedad">Enfermedad: </label>
                    </div>
                </div>

                <div class="form-row">    
                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloMail(event)" id="est_alergias" name="est_alergias" value="<?php echo $row['est_alergias']; ?>"
                               type="text" required>
                        <label for="est_alergias">Alergia: </label>
                    </div>

                    <div class="col-lg-1 col-md-3">
                        <input onkeypress="return soloMail(event)" id="est_tipo_sangre" name="est_tipo_sangre"
                               value="<?php echo $row['est_tipo_sangre']; ?>" type="text" required>
                        <label for="est_tipo_sangre">Tipo de Sangre: </label>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_genero" name="est_genero" value="<?php echo $row['est_genero']; ?>"
                               type="text" required>
                        <label for="est_genero">Genero: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_curso" name="est_curso" value="<?php echo $row['est_curso']; ?>"
                               type="text" required>
                        <label for="est_curso">Curso: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_jornada" name="est_jornada" value="<?php echo $row['est_jornada']; ?>"
                               type="text" required>
                        <label for="est_jornada">Jornada: </label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-lg-4 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_provincia" name="est_provincia"
                               value="<?php echo $row['est_provincia']; ?>" type="text" required>
                        <label for="est_provincia">Provincia de Nacimiento: </label>
                    </div>
                
                    <div class="col-lg-4 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_ciudad" name="est_ciudad" type="text"
                               value="<?php echo $row['est_ciudad']; ?>" required>
                        <label for="est_ciudad">Ciudad de recidencia: </label>
                    </div>

                    <div class="col-lg-1 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_trabajo" name="est_trabajo" type="text"
                               value="<?php echo $row['est_trabajo']; ?>" required>
                        <label for="est_trabajo">Trabaja: </label>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_vive" name="est_vive" type="text" value="<?php echo $row['est_vive']; ?>"
                               required>
                        <label for="est_vive">Vive con: </label>
                    </div>

                    <div class="col-lg-1 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_hermanos" name="est_hermanos" type="text"
                               value="<?php echo $row['est_hermanos']; ?>" required>
                        <label for="est_hermanos">Hermanos: </label>
                    </div>
                </div>

                <div class="form-row"> 
                    <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_civil" name="est_civil" type="text"
                               value="<?php echo $row['est_civil']; ?>" required>
                        <label for="est_civil">Estado Civil: </label>
                    </div>
                
                    <div class="col-lg-1 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_hijos" name="est_hijos" value="<?php echo $row['est_hijos']; ?>"
                               type="text" required>
                        <label for="est_hijos">Hijos: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_nombre_ref" name="est_nombre_ref"
                               value="<?php echo $row['est_nombre_ref']; ?>" type="text" required>
                        <label for="est_nombre_ref">Nombre de referencia: </label>
                    </div>

                    <div class="col-lg-4 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_apellidos_ref" name="est_apellidos_ref"
                               value="<?php echo $row['est_apellidos_ref']; ?>" type="text" required>
                        <label for="est_apellidos_ref">Apellidos de referencia: </label>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloNumeros(event)" id="est_cedula_ref" name="est_cedula_ref"
                               value="<?php echo $row['est_cedula_ref']; ?>" maxlength="10" type="text">
                        <label for="est_cedula_ref">Cedula de referencia: </label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-lg-2 col-md-3">
                        <input onkeypress="return soloNumeros(event)" id="est_tlf_ref" name="est_tlf_ref" value="<?php echo $row['est_tlf_ref']; ?>"
                               maxlength="10" type="text" required="">
                        <label for="est_tlf_ref">Telefono de referencia: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloMail(event)" id="est_correo_ref" name="est_correo_ref"
                               value="<?php echo $row['est_correo_ref']; ?>" type="text" required>
                        <label for="est_correo_ref">Correo de referencia: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input onkeypress="return soloMail(event)" id="est_direccion_ref" name="est_direccion_ref"
                               value="<?php echo $row['est_direccion_ref']; ?>" type="text" required>
                        <label for="est_direccion_ref">Dirección de referencia: </label>
                    </div>

                    <div class="col-lg-1 col-md-3">
                        <input onkeypress="return soloLetras(event)" id="est_aceptar" name="est_aceptar" value="<?php echo $row['est_aceptar']; ?>"
                               type="text" required>
                        <label for="est_aceptar">Acepto condiciones: </label>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <input id="est_fecha" name="est_fecha" value="<?php echo $row['est_fecha']; ?>"
                               type="text" readonly="">
                        <label for="est_fecha">Fecha de registros: </label>
                    </div>
                </div>

                <div class="col-auto my-1">
                    <button type="submit" id="submit" class="btn btn-primary" name="enviar">Editar Datos
                    </button>
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
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script>
                Fundación Ecuador People - C.C Design
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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
