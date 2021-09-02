<?php
    session_start();
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

    <title>Fundación Ecuador People - Historial de Estudiantes Registrados</title>

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


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                    <li><a href="#">Registrar Datos</a>
                        <ul>
                            <li><a href="registrar_estudiante.php">Registrar Estudiante</a></li>
                            <li><a href="registrar_pasante.php">Registrar Pasantes</a></li>
                            <li><a href="document.php">Registrar Aprobación</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Visualizar</a>
                        <ul>
                            <li><a href="historial_estudiante.php?func=mostrar">Historial Estudiantes</a></li>
                        <li><a href="historial_pasante.php?func=mostrar">Historial Pasantes</a></li>
                            <li><a href="documentver.php?func=mostrar">Mostrar Aprobación</a></li>
                        </ul>
                    </li>
                    <li class="active"><a style="color: yellow;" href="homeadmin.php">Volver Atrás</a></li>
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
                <?php
                    include_once ("../appws/controlador_registro_estudiante.php");
                    include_once ("../appws/controladorLogin.php");
                    $func = $_GET['func'];
                    $controlador = new controlador_registro_estudiante();
                    $controladorlog = new controladorLogin();
                    
                    if($func == 'close'){
                        $controladorlog->logout();
                        echo "<script> window.location.href = 'historial_estudiante.php?func=mostrar'; </script>";
                    }

                    if($func == 'delete'){
                        $controlador->delete($_GET['codice']);
                        echo "<script> window.location.href = 'historial_estudiante.php?func=mostrar'; </script>";
                    }

                    if($func == 'mostrar'){
                        $r = $controlador->index();
                ?>
                    <center><img src="imagen/mega-menu.jpg" style="width: 30%; border-radius: 5px;"></center>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Buscar</button>
                          </span>
                          <input type="text" class="form-control" placeholder="Cedula de estudiante.." id="cedula_est">
                        </div>
                      </div>
                    </div><br><br>

					<div align="center" class="col-lg-12 col-md-8 m-auto" style="font-size: 18px; color:#0985E1; font-weight: bold; margin-top: ;">
						HISTORIAL DE ESTUDIANTES REGISTRADOS
					</div><br><br>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead style="color: #fff; background: #000;">
                                <tr>
                                    <th scope="col">Cedula: </th>
                                    <th scope="col">Nombres: </th>
                                    <th scope="col">Apellidos: </th>
                                    <th scope="col">Whatsapp: </th>
                                    <th scope="col">Correo: </th>
                                    <th scope="col">Convencional: </th>
                                    <th scope="col">Dirección: </th>
                                    <th scope="col">Fecha/Nacimiento: </th>
                                    <th scope="col">Edad: </th>
                                    <th scope="col">Enfermedad</th>
                                    <th scope="col">Alergia: </th>
                                    <th scope="col">Tipo/Sangre: </th>
                                    <th scope="col">Genero: </th>
                                    <th scope="col">Curso/Capacitación:</th>
                                    <th scope="col">Jornada: </th>
                                    <th scope="col">Provincia: </th>
                                    <th scope="col">Ciudad: </th>
                                    <th scope="col">Trabaja: </th>
                                    <th scope="col">Vive/con: </th>
                                    <th scope="col">Hermanos: </th>
                                    <th scope="col">Estado/Civil: </th>
                                    <th scope="col">Hijos: </th>
                                    <th scope="col">Nombres/Contacto: </th>
                                    <th scope="col">Apellidos/Contacto: </th>
                                    <th scope="col">Cedula/Contacto: </th>
                                    <th scope="col">Correo/Contacto: </th>
                                    <th scope="col">Telefono/Contacto: </th>
                                    <th scope="col">Dirección/Referencia: </th>
                                    <th scope="col">Fecha/Registro</th>
                                    <th scope="col">Img/Cedula:</th>
                                    <th scope="col">Ver:</th>
                                    <th scope="col">Editar:</th>
                                    <th scope="col">Eliminar:</th>
                                    </tr>
                            </thead>
                            
                            <tbody style="color:#0985E1; font-size: 14px; text-align:center; margin: 0;" id="table_est">
                              <?php foreach ($r->fetchAll(PDO::FETCH_ASSOC) as $row){ ?>
                            
                            <tr>
                            <td scope="row"><?php echo $row['est_cedula']; ?></td>
                            <td scope="row"><?php echo $row['est_nombres']; ?></td>
                            <td scope="row"><?php echo $row['est_apellidos']; ?></td>
                            <td scope="row"><?php echo $row['est_celular']; ?></td>
                            <td scope="row"><?php echo $row['est_correo']; ?></td>
                            <td scope="row"><?php echo $row['est_convencional']; ?></td>
                            <td scope="row"><?php echo $row['est_direccion']; ?></td>
                            <td scope="row"><?php echo $row['est_fecha_nacimiento']; ?></td>
                            <td scope="row"><?php echo $row['est_edad']; ?></td>
                            <td scope="row"><?php echo $row['est_enfermedad']; ?></td>
                            <td scope="row"><?php echo $row['est_alergias']; ?></td>
                            <td scope="row"><?php echo $row['est_tipo_sangre']; ?></td>
                            <td scope="row"><?php echo $row['est_genero']; ?></td>
                            <td scope="row"><?php echo $row['est_curso']; ?></td>
                            <td scope="row"><?php echo $row['est_jornada']; ?></td>
                            <td scope="row"><?php echo $row['est_provincia']; ?></td>
                            <td scope="row"><?php echo $row['est_ciudad']; ?></td>
                            <td scope="row"><?php echo $row['est_trabaja']; ?></td>
                            <td scope="row"><?php echo $row['est_vive']; ?></td>
                            <td scope="row"><?php echo $row['est_hermanos']; ?></td>
                            <td scope="row"><?php echo $row['est_civil']; ?></td>
                            <td scope="row"><?php echo $row['est_hijos']; ?></td>
                            <td scope="row"><?php echo $row['est_nombre_ref']; ?></td>
                            <td scope="row"><?php echo $row['est_apellidos_ref']; ?></td>
                            <td scope="row"><?php echo $row['est_cedula_ref']; ?></td>
                            <td scope="row"><?php echo $row['est_correo_ref']; ?></td>
                            <td scope="row"><?php echo $row['est_tlf_ref']; ?></td>
                            <td scope="row"><?php echo $row['est_direccion_ref']; ?></td>
                            <td scope="row"><?php echo $row['est_fecha']; ?></td>
                            <td scope="row" style="cursor: pointer;"><a onclick="verimagen(<?php echo $row['est_id']; ?>,'<?php echo $row['est_foto']; ?>')"><i class="fa fa-id-card fa-2x fa-xs"></i></a>
                            </td>
                            <td scope="row" style="cursor: pointer;"><a href="ver_estudiante.php?cargar=ver_estudiantes&ver_est=<?php echo $row['est_cedula']; ?>"><i class="fa fa-file-text fa-2x fa-xs"></i></a>
                            </td>
                            <td scope="row"><a href="editar_estudiante.php?cargar=editar_estudiantes&editar_est=<?php echo $row['est_cedula']; ?>"><i class="fa fa-pencil-square-o fa-2x fa-xs" ></i></a>
                            </td>
                            <td scope="row"><a href="<?php echo 'historial_estudiante.php?func=delete&codice='.$row['est_id']; ?>"><i class="fa fa-trash fa-2x fa-lg" style="color:red;"></i></a>
                            </td>
                            </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>   
                <?php } ?>
        	</div>
        </div>
		<!--data-toggle="modal" data-target="#exampleModal"-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Imagen de Estudiante</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body" id="imagenpostulante">
				  
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
		  </div>
		</div>
		
    </section>

    <!--== Footer Area Start ==-->
    <section id="footer-area">
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
        
        <!--== Login Page Content End ==-->
    <div class="scroll-top">
        <img src="assets/img/flecha superior.gif" alt="fundacionecuadorpeople">
    </div>
    
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
            $('#imagenpostulante').append('<img src="../appws/files/estudiantes/cufo_'+id+'.'+extension+'">');
            $('#exampleModal').modal('show');
        }

        function viewImage(id){
            $data = "?est_id="+id;
            $.ajax({
                type: "GET",
                url: "./BusquedaFoto.php"+$data,
                processData: false,
                contentType: false,
                cache: false,
                success: function(result){

                    $('#imagenpostulante').empty();
                    $('#imagenpostulante').append('<img src="../appws/files/estudiantes/cufo_'+id+'.'+result+'">');
                    $('#exampleModal').modal('show');
                }
            })
        }
    </script>
<script src="busqueda_est_pst.js"></script>
</body>

</html>
