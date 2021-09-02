<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');
    session_start();
require_once '../appws/clases/conexion.php';
$objConexion = new conexion();
$conexion = $objConexion;

if ($_GET["cargar"] == "ver_pasantes") {
        $query = "SELECT * FROM titulacion_6to_c.tb_registro_pasante where  pst_cedula = $_GET[ver_est]";
        $stmt = $conexion->consultaRetorno($query);
    if (isset($stmt)){
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cedula = $row[0]["pst_cedula"];
        $nombres = $row[0]["pst_nombres"];
        $apellidos = $row[0]["pst_apellidos"];
        $convencional = $row[0]["pst_convencional"];
        $celular = $row[0]["pst_celular"];
        $correo = $row[0]["pst_correo"];
        $direccion = $row[0]["pst_direccion"];
        $fecha = $row[0]["pst_fecha_nacimiento"];
        $edad = $row[0]["pst_edad"];
        $enfermedad = $row[0]["pst_enfermedad"];
        $alergias = $row[0]["pst_alergias"];
        $tipo_sangre = $row[0]["pst_tipo_sangre"];
        $genero = $row[0]["pst_genero"];
        $curso = $row[0]["pst_curso"];
        $jornada = $row[0]["pst_jornada"];
        $trabaja = $row[0]["pst_trabaja"];
        $provincia = $row[0]["pst_provincia"];
        $ciudad = $row[0]["pst_ciudad"];
        $dependiente = $row[0]["pst_dependiente"];
        $vive = $row[0]["pst_vive"];
        $civil = $row[0]["pst_civil"];
        $hijos = $row[0]["pst_hijos"];
        $universidad = $row[0]["pst_universidad"];
        $referencias = $row[0]["pst_nombre_ref"];
        $apellidos_ref = $row[0]["pst_apellidos_ref"];
        $direccion_ref = $row[0]["pst_direccion_ref"];
        $telefono_ref = $row[0]["pst_tlf_ref"];
        $aceptar = $row[0]["pst_aceptar"];
        $fecha_reg = $row[0]["pst_fecha"];
        $foto = "cufo_".$row[0]["pst_id"].".".$row[0]["pst_foto"];
        $hermanos = $row[0]["pst_hermanos"];
        $correo_ref = $row[0]["pst_correo_ref"];
        $cedula_ref = $row[0]["pst_cedula_ref"];
    }

    }elseif($_GET["cargar"] == "ver_estudiantes"){
        $query = "SELECT * FROM titulacion_6to_c.tb_registro_estudiante where  est_cedula = $_GET[ver_est]";
        $stmt = $conexion->consultaRetorno($query);
    if (isset($stmt)){
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cedula = $row[0]["est_cedula"];
        $nombres = $row[0]["est_nombres"];
        $apellidos = $row[0]["est_apellidos"];
        $convencional = $row[0]["est_convencional"];
        $celular = $row[0]["est_celular"];
        $correo = $row[0]["est_correo"];
        $direccion = $row[0]["est_direccion"];
        $fecha = $row[0]["est_fecha_nacimiento"];
        $edad = $row[0]["est_edad"];
        $enfermedad = $row[0]["est_enfermedad"];
        $alergias = $row[0]["est_alergias"];
        $tipo_sangre = $row[0]["est_tipo_sangre"];
        $genero = $row[0]["est_genero"];
        $curso = $row[0]["est_curso"];
        $jornada = $row[0]["est_jornada"];
        $trabaja = $row[0]["est_trabaja"];
        $provincia = $row[0]["est_provincia"];
        $ciudad = $row[0]["est_ciudad"];
        $dependiente = $row[0]["est_dependiente"];
        $vive = $row[0]["est_vive"];
        $civil = $row[0]["est_civil"];
        $hijos = $row[0]["est_hijos"];
        $universidad = $row[0]["est_universidad"];
        $referencias = $row[0]["est_nombre_ref"];
        $apellidos_ref = $row[0]["est_apellidos_ref"];
        $direccion_ref = $row[0]["est_direccion_ref"];
        $telefono_ref = $row[0]["est_tlf_ref"];
        $aceptar = $row[0]["est_aceptar"];
        $fecha_reg = $row[0]["est_fecha"];
        $foto = "cufo_".$row[0]["est_id"].".".$row[0]["est_foto"];
        $hermanos = $row[0]["est_hermanos"];
        $correo_ref = $row[0]["est_correo_ref"];
        $cedula_ref = $row[0]["est_cedula_ref"];
    }
    }
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

    <title>Fundación Ecuador People - Curriculums</title>

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
    <!--=== main CSS ===-->
    <link href="../assets/css/main.css" rel="stylesheet">
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
                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>                                    
                                <li class="active"><a style="color: yellow;" href="historial_estudiante.php?func=mostrar">Volver Atrás</a></li>
                                <li><a href="document.php?func=close">Cerrar Sesión</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" style="margin-top:150px;" class="section-padding">
    <div class="container">
    <center><img src="imagen/mega-menu.jpg" style="width: 30%; height: 30%;"></center><br>
    <h2 style="text-align: center; color: #0A91E4; font-size: 1.5rem;">Ficha de Identificación del Estudiante</h2>
    
        <table class="table table-sm" style="color: #000;">
        <tr>
        <td width=80%>    
        <table>
        <tr>
        <th style="color:#0A91E4;">Cedula:</th>
        <td scope="row" ><?php echo $cedula; ?></td>

        <th style="color:#0A91E4;">Nombres:</th>
        <td scope="row" ><?php echo $nombres; ?></td>

        <th style="color:#0A91E4;">Apellidos:</th>
        <td scope="row" ><?php echo $apellidos; ?></td>
                
        <th style="color:#0A91E4;">Convencional:</th>
        <td scope="row" ><?php echo $convencional; ?></td>
        </tr>

        <tr>
        <th style="color:#0A91E4;">Celular:</th>
        <td scope="row" ><?php echo $celular; ?></td>

        <th style="color:#0A91E4;">Correo:</th>
        <td scope="row" ><?php echo $correo; ?></td>

        <th style="color:#0A91E4;">Dirección:</th>
        <td scope="row" ><?php echo $direccion; ?></td>

        <th style="color:#0A91E4;">Fecha/Nacimiento:</th>
        <td scope="row" ><?php echo $fecha; ?></td>
        </tr>

        <tr>
        <th style="color:#0A91E4;">Edad:</th>
        <td scope="row" ><?php echo $edad; ?></td>
        
        <th style="color:#0A91E4;">Enfermedad:</th>
        <td scope="row" ><?php echo $enfermedad; ?></td>
        
        <th style="color:#0A91E4;">Alergias:</th>
        <td scope="row" ><?php echo $alergias; ?></td>
                
        <th style="color:#0A91E4;">Tipo/sangre:</th>
        <td scope="row" ><?php echo $tipo_sangre; ?></td>
        </tr>
                
        <tr>
        <th style="color:#0A91E4;">Genero:</th>
        <td scope="row" ><?php echo $genero; ?></td>
                
        <th style="color:#0A91E4;">Curso/Capacitación:</th>
        <td scope="row" ><?php echo $curso; ?></td>

        <th style="color:#0A91E4;">Jornada:</th>
        <td scope="row" ><?php echo $jornada; ?></td>
                
        <th style="color:#0A91E4;">Provincia:</th>
        <td scope="row" ><?php echo $provincia; ?></td>
        </tr>

        <tr>
        <th style="color:#0A91E4;">Ciudad:</th>
        <td scope="row" ><?php echo $ciudad; ?></td>
                
        <th style="color:#0A91E4;">Trabaja:</th>
        <td scope="row" ><?php echo $trabaja; ?></td>

        <th style="color:#0A91E4;">Vive/con:</th>
        <td scope="row" ><?php echo $vive; ?></td>
                
        <th style="color:#0A91E4;">Hermanos:</th>
        <td scope="row" ><?php echo $hermanos; ?></td>
        </tr>

        <tr>
        <th style="color:#0A91E4;">Estado/Civil:</th>
        <td scope="row" ><?php echo $civil; ?></td>
                
        <th style="color:#0A91E4;">Hijos:</th>
        <td scope="row" ><?php echo $hijos; ?></td>

        <th style="color:#0A91E4;">Nombre/Referencia:</th>
        <td scope="row" ><?php echo $referencias; ?></td>
                
        <th style="color:#0A91E4;">Apellido/Referencia:</th>
        <td scope="row" ><?php echo $apellidos_ref; ?></td>
        </tr>

        <tr>
        <th style="color:#0A91E4;">Cedula/Referencia:</th>
        <td scope="row" ><?php echo $cedula_ref; ?></td>
                
        <th style="color:#0A91E4;">Telefono/Referencia:</th>
        <td scope="row" ><?php echo $telefono_ref; ?></td>

        <th style="color:#0A91E4;">Correo/Referencia:</th>
        <td scope="row" ><?php echo $correo_ref; ?></td>
                
        <th style="color:#0A91E4;">Dirección/Referencia:</th>
        <td scope="row" ><?php echo $direccion_ref; ?></td>
        </tr>

        <tr>
        <th style="color:#0A91E4;">Fecha/Registro:</th>
        <td scope="row" ><?php echo $fecha_reg; ?></td>

                <th style="color:#0A91E4;">Foto:</th>
                <?php
                if($_GET["cargar"] == "ver_estudiantes"){
                    echo '<td scope="row" > <img src="../appws/files/estudiantes/'.$foto.'"></td>';
                }else{
                    echo '<td scope="row" > <img src="../appws/files/foto/'.$foto.'"></td>';
                }
                ?>
            </tr>

        </table>
        </td>
        </tr>
    </table>
</div>
		
    </section>
    <!--== Login Page Content End ==-->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                        <p><!-- INICIO DEL FOOTER. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> Fundación Ecuador People - C.C Design</p>
            <!-- FOOTER DE FUNDACION. -->
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
	<script>
		function verimagen(id,extension){
			$('#imagenpostulante').empty();
			$('#imagenpostulante').append('<img src="../appws/files/foto/cufo_'+id+'.'+extension+'">');
			$('#exampleModal').modal('show');
		}
	</script>
</body>

</html>
