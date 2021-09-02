<?php
    session_start();
require_once '../appws/clases/conexion.php';
$objConexion = new conexion();
$conexion = $objConexion->getConexion();
$cedula = $_GET['ver_est'];
$query = "SELECT * FROM titulacion_6to_c.tb_curriculum WHERE est_cedula = :CEDULA";
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

    <title>Fundación Ecuador People - Curriculums Online</title>

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
                                <li class="active"><a style="color: yellow;" href="curriculums.php?func=mostrar">Volver Atrás</a></li>
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
        <h2 style="text-align: center; color: #0985E1; font-size: 1.5rem;">Ficha de Identificación del estudiante Online</h2><br>
        <table class="table table-hover" style="color: #000; border: 2px;">
        <tr>
        <td width=80%>    
        <table>
        <tr>
        <th style="color:#0985E1;">Cedula:</th>
        <td scope="row" ><?php echo $row['est_cedula']; ?></td>

        <th style="color:#0985E1;">Nombres:</th>
        <td scope="row" ><?php echo $row['est_nombres']; ?></td>

        <th style="color:#0985E1;">Apellidos:</th>
        <td scope="row" ><?php echo $row['est_apellidos']; ?></td>
                
        <th style="color:#0985E1;">Convencional:</th>
        <td scope="row" ><?php echo $row['est_convencional']; ?></td>
        </tr>

        <tr>
        <th style="color:#0985E1;">Celular:</th>
        <td scope="row" ><?php echo $row['est_celular']; ?></td>

        <th style="color:#0985E1;">Correo:</th>
        <td scope="row" ><?php echo $row['est_correo']; ?></td>

        <th style="color:#0985E1;">Dirección:</th>
        <td scope="row" ><?php echo $row['est_direccion']; ?></td>

        <th style="color:#0985E1;">Fecha/Nacimiento:</th>
        <td scope="row" ><?php echo $row['est_fecha_nacimiento']; ?></td>
        </tr>

        <tr>
        <th style="color:#0985E1;">Edad:</th>
        <td scope="row" ><?php echo $row['est_edad']; ?></td>
        
        <th style="color:#0985E1;">Enfermedad:</th>
        <td scope="row" ><?php echo $row['est_enfermedad']; ?></td>       
        
        <th style="color:#0985E1;">Alergias:</th>
        <td scope="row" ><?php echo $row['est_alergias']; ?></td>
                
        <th style="color:#0985E1;">Tipo/sangre:</th>
        <td scope="row" ><?php echo $row['est_tipo_sangre']; ?></td>
        </tr>
                
        <tr>
        <th style="color:#0985E1;">Genero:</th>
        <td scope="row" ><?php echo $row['est_genero']; ?></td>
                
        <th style="color:#0985E1;">Curso/Capacitación:</th>
        <td scope="row" ><?php echo $row['est_curso']; ?></td>

        <th style="color:#0985E1;">Jornada:</th>
        <td scope="row" ><?php echo $row['est_jornada']; ?></td>
                
        <th style="color:#0985E1;">Provincia:</th>
        <td scope="row" ><?php echo $row['est_provincia']; ?></td>
        </tr>

        <tr>
        <th style="color:#0985E1;">Ciudad:</th>
        <td scope="row" ><?php echo $row['est_ciudad']; ?></td>
                
        <th style="color:#0985E1;">Trabaja:</th>
        <td scope="row" ><?php echo $row['est_trabajo']; ?></td>

        <th style="color:#0985E1;">Vive/con:</th>
        <td scope="row" ><?php echo $row['est_vive']; ?></td>
                
        <th style="color:#0985E1;">Hermanos:</th>
        <td scope="row" ><?php echo $row['est_hermanos']; ?></td>
        </tr>

        <tr>
        <th style="color:#0985E1;">Estado/Civil:</th>
        <td scope="row" ><?php echo $row['est_civil']; ?></td>
                
        <th style="color:#0985E1;">Hijos:</th>
        <td scope="row" ><?php echo $row['est_hijos']; ?></td>

        <th style="color:#0985E1;">Nombre/Referencia:</th>
        <td scope="row" ><?php echo $row['est_nombre_ref']; ?></td>
                
        <th style="color:#0985E1;">Apellido/Referencia:</th>
        <td scope="row" ><?php echo $row['est_apellidos_ref']; ?></td>
        </tr>

        <tr>
        <th style="color:#0985E1;">Cedula/Referencia:</th>
        <td scope="row" ><?php echo $row['est_cedula_ref']; ?></td>
                
        <th style="color:#0985E1;">Telefono/Referencia:</th>
        <td scope="row" ><?php echo $row['est_tlf_ref']; ?></td>

        <th style="color:#0985E1;">Correo/Referencia:</th>
        <td scope="row" ><?php echo $row['est_correo_ref']; ?></td>
                
        <th style="color:#0985E1;">Dirección/Referencia:</th>
        <td scope="row" ><?php echo $row['est_direccion_ref']; ?></td>
        </tr>

        <tr>
        <th style="color:#0985E1;">Acepto:</th>
        <td scope="row" ><?php echo $row['est_aceptar']; ?></td>       

        <th style="color:#0985E1;">Fecha/Registro:</th>
        <td scope="row" ><?php echo $row['est_fecha']; ?></td>
                
        <th style="color:#0985E1;">Imagen:</th>
            <?php $img = $row["est_id"].".".$row["est_foto"]; ?>
        <td scope="row" style="cursor: pointer; color:#ccc; text-align: center;"><img src="../appws/files/curriculums/cufo_<?php echo $img;?>">
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
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> Fundación Ecuador People - Tesis de Titulación 
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
			$('#imagenpostulante').append('<img src="../appws/files/curriculums/cufo_'+id+'.'+extension+'">');
			$('#exampleModal').modal('show');
		}
        function viewImage(id){
            $data = "?on_pst_id="+id;
            $.ajax({
                type: "GET",
                url: "./BusquedaFoto.php"+$data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(result){

                    $('#imagenpostulante').empty();
                    $('#imagenpostulante').append('<img src="../appws/files/curriculums/cufo_'+id+'.'+result+'">');
                    $('#exampleModal').modal('show');
                }
            })
        }
	</script>
</body>

</html>
