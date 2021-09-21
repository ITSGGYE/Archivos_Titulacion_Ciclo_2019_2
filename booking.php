<?php
require_once("class/class.php");
$fngccvalidator = new fngccvalidator();

$tra = new Login();

if(isset($_POST['btn-submit']))
{
$reg = $tra->RegistrarReservaciones();
exit;
}
elseif(isset($_POST['btn-cliente']))
{
$reg = $tra->RegistrarClientes();
exit;
}   
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Ing. Ruben Chirinos">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo.png">
<title></title>

    <link rel="stylesheet" href="assets/hotel/common/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/jquery.event.calendar/css/jquery.event.calendar.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/royalslider/royalslider.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/royalslider/skins/minimal-white/rs-minimal-white.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/isotope/css/style.css" media="all">

    <link rel="stylesheet" href="assets/hotel/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/hotel/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/hotel/common/js/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/hotel/common/css/shortcodes.css">
    <link rel="stylesheet" href="assets/hotel/css/layout.css">
    <link rel="stylesheet" href="assets/hotel/css/colors.css" id="colors">
    <link rel="stylesheet" href="assets/hotel/css/custom.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/hotel/css/style.css">
    <!-- Sweet-Alert -->
    <link rel="stylesheet" href="assets/css/sweetalert.css">

    <script src="assets/hotel/js/jquery-1.10.2.min.js"></script>
    <script src="assets/hotel/js/bootstrap-select.min.js"></script>
    <script src="assets/hotel/common/js/modernizr-2.6.1.min.js"></script>

    <script>
      Modernizr.load({
        load : [
        'assets/hotel/common/bootstrap/js/bootstrap.min.js',
        'assets/hotel/js/pluginss/respond/respond.min.js',
        //'assets/hotel/js/jquery-ui.js',
        'assets/hotel/js/pluginss/jquery-cookie/jquery-cookie.js',
        'assets/hotel/js/pluginss/easing/jquery.easing.1.3.min.js',
        'assets/hotel/common/js/plugins/magnific-popup/jquery.magnific-popup.min.js',
        //Javascripts required by the current model
        'assets/hotel/js/pluginss/royalslider/jquery.royalslider.min.js',
        'assets/hotel/js/pluginss/isotope/jquery.isotope.min.js',
        'assets/hotel/js/pluginss/isotope/jquery.isotope.sloppy-masonry.min.js',
        'assets/hotel/js/jquery.imagesloaded.min.js',
        'assets/hotel/js/pluginss/imagefill/js/jquery-imagefill.js',
        'assets/hotel/js/pluginss/toucheeffect/toucheffects.js',
                ],
        complete : function(){
        Modernizr.load('assets/hotel/common/js/custom.js');
        Modernizr.load('assets/hotel/js/custom.js');
                }
            });
      $(function(){});
        /* ==============================================
         * PLACE ANALYTICS CODE HERE
         * ==============================================
         */
         var _gaq = _gaq || [];
        
      </script>

    <!-- script jquery -->
    <script src="assets/script/jquery.min.js"></script> 
    <!-- Sweet-Alert -->
    <script src="assets/js/sweetalert-dev.js"></script>
    <script type="text/javascript" src="assets/script/titulos.js"></script>
    <script type="text/javascript" src="assets/script/jquery.mask.js"></script>
    <script type="text/javascript" src="assets/script/mask.js"></script>
    <script type="text/javascript" src="assets/script/script2.js"></script>
    <script type="text/javascript" src="assets/script/ajax.js"></script>
    <script type="text/javascript" src="assets/script/validation.min.js"></script>
    <script type="text/javascript" src="assets/script/script.js"></script>
    <script src="assets/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <!-- script jquery -->

    <!-- Calendario -->
    <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
    <script src="assets/calendario/jquery-ui.js"></script>
    <script src="assets/script/jscalendario.js"></script>
    <script src="assets/script/autocompleto.js"></script>
    <!-- Calendario -->

</head>

<body id="page-10" itemscope itemtype="http://schema.org/WebPage">

    <!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-align-justify"></i> Detalle de Habitación</h4>
            </div>
            <div class="modal-body">

                <div id="muestrahabitacionmodal"></div> 

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!-- sample modal content -->
<div id="myModalCliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="myModalLabel"><i class="fa fa-pencil"></i> Nuevo Cliente</h4>
            </div>
            
        <form class="form form-material" name="clientesweb" id="clientesweb" action="#">
                
               <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Tipo de Documento: </label>
                            <i class="fa fa-bars form-control-feedback"></i> 
                            <select name="documcliente" id="documcliente" class='form-control' required="" aria-required="true">
                            <option value=""> -- SELECCIONE -- </option>
                            <?php
                            $doc = new Login();
                            $doc = $doc->ListarDocumentos();
                            for($i=0;$i<sizeof($doc);$i++){ ?>
                            <option value="<?php echo $doc[$i]['coddocumento'] ?>"><?php echo $doc[$i]['documento'] ?></option>
                            <?php }  ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Nº de Documento: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="dnicliente" id="dnicliente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nº de Documento" autocomplete="off" required="" aria-required="true"/> 
                            <i class="fa fa-bolt form-control-feedback"></i> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Nombre de Cliente: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="nomcliente" id="nomcliente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nombre de Cliente" autocomplete="off" required="" aria-required="true"/>  
                            <i class="fa fa-pencil form-control-feedback"></i> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label>
                            <input type="text" class="form-control phone-inputmask" name="telefcliente" id="telefcliente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nº de Teléfono" autocomplete="off" required="" aria-required="true"/>  
                            <i class="fa fa-phone form-control-feedback"></i> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Correo de Cliente: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="correocliente" id="correocliente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Correo Electronico" autocomplete="off" required="" aria-required="true"/> 
                            <i class="fa fa-envelope-o form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Pais: <span class="symbol required"></span></label>
                            <i class="fa fa-bars form-control-feedback"></i>
                            <select name="paiscliente" id="paiscliente" class='form-control' required="" aria-required="true">
                             <option value=""> -- SELECCIONE -- </option> 
                             <option value="AF">AFGANISTAN</option>
                             <option value="AL">ALBANIA</option>
                             <option value="DE">ALEMANIA</option>
                             <option value="AD">ANDORRA</option>
                             <option value="AO">ANGOLA</option>
                             <option value="AI">ANGUILLA</option>
                             <option value="AQ">ANTARTIDA</option>
                             <option value="AG">ANTIGUA Y BARBUDA</option>
                             <option value="AN">ANTILLAS HOLANDESAS</option>
                             <option value="SA">ARABAIA SAUDI</option>
                             <option value="DZ">ARGELIA</option>
                             <option value="AR">ARGENTINA</option>
                             <option value="AM">ARMENIA</option>
                             <option value="AW">ArRUBA</option>
                             <option value="AU">AUSTRALIA</option>
                             <option value="AT">AUSTRIA</option>
                             <option value="AZ">AZERBAIYAN</option>
                             <option value="BS">BAHAMAS</option>
                             <option value="BH">BAHREIN</option>
                             <option value="BD">BANGLADESH</option>
                             <option value="BB">BARBADOS</option>
                             <option value="BE">BELGICA</option>
                             <option value="BZ">BELICE</option>
                             <option value="BJ">BENIN</option>
                             <option value="BM">BERMUDAS</option>
                             <option value="BY">BIELORRUSIA</option>
                             <option value="MM">BIRMANIA</option>
                             <option value="BO">BOLIVIA</option>
                             <option value="BA">BOSNIA Y HERZEGOVINA</option>
                             <option value="BW">BOTSWANA</option>
                             <option value="BR">BRASIL</option>
                             <option value="BN">BRUNEI</option>
                             <option value="BG">BULGARIA</option>
                             <option value="BF">BURKINA FASO</option>
                             <option value="BI">BURUNDI</option>
                             <option value="BT">BUTAN</option>
                             <option value="CV">CABO VERDE</option>
                             <option value="KH">CAMBOYA</option>
                             <option value="CM">CAMERUN</option>
                             <option value="CA">CANADA</option>
                             <option value="TD">CHAD</option>
                             <option value="CL">CHILE</option>
                             <option value="CN">CHINA</option>
                             <option value="CY">CHIPRE</option>
                             <option value="VA">CIUDAD DEL VATICANO (SANTA SEDE)</option>
                             <option value="CO">COLOMBIA</option>
                             <option value="KM">COMORES</option>
                             <option value="CG">CONGO</option>
                             <option value="CD">REPUBLICA DEMOCRATICA DEL CONGO</option>
                             <option value="KR">COREA</option>
                             <option value="KP">COREA DEL NORTE</option>
                             <option value="CI">COSTA DE MARFIL</option>
                             <option value="CR">COSTA RICA</option>
                             <option value="HR">CROACIA</option>
                             <option value="CU">CUBA</option>
                             <option value="DK">DINAMARCA</option>
                             <option value="DJ">DJIBOUTI</option>
                             <option value="DM">DOMINICA</option>
                             <option value="EC">ECUADOR</option>
                             <option value="EG">EGIPTO</option>
                             <option value="SV">EL SALVADOR</option>
                             <option value="AE">EMIRATOS ARABES UNIDOS</option>
                             <option value="ER">ERITREA</option>
                             <option value="SI">ESLOVENIA</option>
                             <option value="ES">ESPAÑA</option>
                             <option value="US">ESTADOS UNIDOS</option>
                             <option value="EE">ESTONIA</option>
                             <option value="ET">ETIOPIA</option>
                             <option value="FJ">FIJI</option>
                             <option value="PH">FILIPINAS</option>
                             <option value="FI">FINLANDIA</option>
                             <option value="FR">FRANCIA</option>
                             <option value="GA">GABON</option>
                             <option value="GM">GAMBIA</option>
                             <option value="GE">GEORGIA</option>
                             <option value="GH">GHANA</option>
                             <option value="GI">GIBRALTAR</option>
                             <option value="GD">GRANADA</option>
                             <option value="GR">GRECIA</option>
                             <option value="GL">GROENLANDIA</option>
                             <option value="GP">GUADALUPE</option>
                             <option value="GU">GUAM</option>
                             <option value="GT">GUATEMALA</option>
                             <option value="GY">GUAYANA</option>
                             <option value="GF">GUAYANA FRANCESA</option>
                             <option value="GN">GUINEA</option>
                             <option value="GQ">GUINEA ECUATORIAL</option>
                             <option value="GW">GUINEA-BISSAU</option>
                             <option value="HT">HAITI</option>
                             <option value="HN">HONDURAS</option>
                             <option value="HU">HUNGRIA</option>
                             <option value="IN">INDIA</option>
                             <option value="ID">INDONSEIA</option>
                             <option value="IQ">IRAK</option>
                             <option value="IR">IRAN</option>
                             <option value="IE">IRLANDA</option>
                             <option value="BV">ISLA Bouvet</option>
                             <option value="CX">ISLA DE CHRISTMAS</option>
                             <option value="IS">ISLANDIA</option>
                             <option value="KY">ISLAS CAIMAN</option>
                             <option value="CK">ISLAS COOK</option>
                             <option value="CC">ISLAS DE COCOS O KEELING</option>
                             <option value="FO">ISLAS FAROE</option>
                             <option value="HM">ISLAS HEARD Y MCDONALD</option>
                             <option value="FK">ISLAS MALVINAS</option>
                             <option value="MP">ISLAS MARIANAS DEL NORTE</option>
                             <option value="MH">ISLAS Marshall</option>
                             <option value="UM">ISLAS MENORES DE EE.UU.</option>
                             <option value="PW">ISLAS PALAU</option>
                             <option value="SB">ISLAS SALOMON</option>
                             <option value="SJ">ISLAS SVALBARD Y JAN MAYEN</option>
                             <option value="TK">ISLAS TOKELAU</option>
                             <option value="TC">ISLAS TURKS Y CAICOS</option>
                             <option value="VI">ISLAS VIRGENES (EE.UU.)</option>
                             <option value="VG">ISLAS VIRGENES (REINO UNIDO)</option>
                             <option value="WF">ISLAS WALLSI Y FUTUNA</option>
                             <option value="IL">ISRAEL</option>
                             <option value="IT">ITALIA</option>
                             <option value="JM">JAMAICA</option>
                             <option value="JP">JAPON</option>
                             <option value="JO">JORDANIA</option>
                             <option value="KZ">KAZAJISTAN</option>
                             <option value="KE">KENIA</option>
                             <option value="KG">KIRGUIZISTAN</option>
                             <option value="KI">KIRIBATI</option>
                             <option value="KW">KUWAIT</option>
                             <option value="LA">LAOS</option>
                             <option value="LS">LESOTHO</option>
                             <option value="LV">LETONIA</option>
                             <option value="LB">LIBANO</option>
                             <option value="LR">LIBERIA</option>
                             <option value="LY">LIBIA</option>
                             <option value="LI">LIECHTENSTEIN</option>
                             <option value="LT">LITUANIA</option>
                             <option value="LU">LUXEMBURGO</option>
                             <option value="MK">EX REPUBLICA YUGOSLAVA DE MACEDONIA</option>
                             <option value="MG">MADAGASCAR</option>
                             <option value="MY">MALASIA</option>
                             <option value="MW">MALAWI</option>
                             <option value="MV">MALDIVAS</option>
                             <option value="ML">MALI</option>
                             <option value="MT">MALTA</option>
                             <option value="MA">MARRUECOS</option>
                             <option value="MQ">MARTINICA</option>
                             <option value="MU">MAURICIO</option>
                             <option value="MR">MAURITANIA</option>
                             <option value="YT">MAYOTTE</option>
                             <option value="MX">MEXICO</option>
                             <option value="FM">MICRONESIA</option>
                             <option value="MD">MOLDAVIA</option>
                             <option value="MC">MONACO</option>
                             <option value="MN">MONGOLIA</option>
                             <option value="MS">MONTSERRAT</option>
                             <option value="MZ">MOZAMBIQUE</option>
                             <option value="NA">NAMIBIA</option>
                             <option value="NR">NAURU</option>
                             <option value="NP">NEPAL</option>
                             <option value="NI">NICARAGUA</option>
                             <option value="NE">NIGER</option>
                             <option value="NG">NIGERIA</option>
                             <option value="NU">NIUE</option>
                             <option value="NF">NORFOLK</option>
                             <option value="NO">NORUEGA</option>
                             <option value="NC">NUEVA CALEDONIA</option>
                             <option value="NZ">NUEVA ZELANDA</option>
                             <option value="OM">OMAN</option>
                             <option value="NL">PAISES BAJOS</option>
                             <option value="PA">PANAMA</option>
                             <option value="PG">PAPUA NUEVA GUINEA</option>
                             <option value="PK">PAQUISTAN</option>
                             <option value="PY">PARAGUAY</option>
                             <option value="PE">PERU</option>
                             <option value="PN">PITCAIRN</option>
                             <option value="PF">POLINESIA FRANCESA</option>
                             <option value="PL">POLONIA</option>
                             <option value="PT">PORTUGAL</option>
                             <option value="PR">PUERTO RICO</option>
                             <option value="QA">QATAR</option>
                             <option value="UK">REINI UNIDO</option>
                             <option value="CF">REPUBLICA CENTROAFRICANA</option>
                             <option value="CZ">REPUBLICA CHECA</option>
                             <option value="ZA">REPUBLICA DE SUDAFRICA</option>
                             <option value="DO">REPUBLICA DMINICANA</option>
                             <option value="SK">REPUBLICA ESLOVACA</option>
                             <option value="RE">REUNION</option>
                             <option value="RW">RUANDA</option>
                             <option value="RO">RUMANIA</option>
                             <option value="RU">RUSIA</option>
                             <option value="EH">SAHARA OCCIDENTAL</option>
                             <option value="KN">SAINT KITTS Y NEVIS</option>
                             <option value="WS">SAMOA</option>
                             <option value="AS">SAMOA AMERICANA</option>
                             <option value="SM">SAN MARINO</option>
                             <option value="VC">SAN VICENTE Y GRANADINAS</option>
                             <option value="SH">SANTA HELENA</option>
                             <option value="LC">SANTA LUCIA</option>
                             <option value="ST">SANTO TOME Y PRINCIPE</option>
                             <option value="SN">SENEGAL</option>
                             <option value="SC">SEYCHELLES</option>
                             <option value="SL">SIERRA LEONA</option>
                             <option value="SG">SINGAPUR</option>
                             <option value="SY">SIRIA</option>
                             <option value="SO">SOMALIA</option>
                             <option value="LK">SRI LANKA</option>
                             <option value="PM">ST. PIERRE Y MIQUELON</option>
                             <option value="SZ">SUAZILANDIA</option>
                             <option value="SD">SUDAN</option>
                             <option value="SE">SUECIA</option>
                             <option value="CH">SUIZA</option>
                             <option value="SR">SURINAM</option>
                             <option value="TH">TAILANDIA</option>
                             <option value="TW">TAIWAN</option>
                             <option value="TZ">TANZANIA</option>
                             <option value="TJ">TAYIKISTAN</option>
                             <option value="TF">TERRITORIOS FRANCESES DEL SUR</option>
                             <option value="TP">TIMOR ORIENTAL</option>
                             <option value="TG">TOGO</option>
                             <option value="TO">TONGA</option>
                             <option value="TT">TRINIDAD Y TOBAGO</option>
                             <option value="TN">TUNEZ</option>
                             <option value="TM">TURKMENISTAN</option>
                             <option value="TR">TURQUIA</option>
                             <option value="TV">TUVALU</option>
                             <option value="UA">UCRANIA</option>
                             <option value="UG">UGANDA</option>
                             <option value="UY">URUGUAY</option>
                             <option value="UZ">UZBEKISTAN</option>
                             <option value="VU">VANUATU</option>
                             <option value="VE">VENEZUELA</option>
                             <option value="VN">VIETNAM</option>
                             <option value="YE">YEMEN</option>
                             <option value="YU">YUGOSLAVIA</option>
                             <option value="ZM">ZAMBIA</option>
                             <option value="ZW">ZIMBABUE</option> 
                           </select> 
                      </div>
                   </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label class="control-label">Ciudad: <span class="symbol required"></span></label>
                            <input type="text" class="form-control" name="ciudadcliente" id="ciudadcliente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Ciudad" autocomplete="off" required="" aria-required="true"/> 
                            <i class="fa fa-pencil form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-feedback2">
                            <label class="control-label">Dirección Domiciliaria: <span class="symbol required"></span></label>
                                <textarea class="form-control" name="direccliente" id="direccliente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Dirección Domiciliaria" autocomplete="off" required="" aria-required="true"></textarea>
                                <i class="fa fa-map-marker form-control-feedback2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" name="btn-cliente" id="btn-cliente" class="btn btn-info"><span class="fa fa-save"></span> Guardar</button>
                <button class="btn btn-danger" type="reset" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-trash-o"></span> Cerrar</button>
            </div>
        </form>

    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
	




<header class="navbar-fixed-top" role="banner">
    <div id="mainHeader">
        <div class="container">
            <div id="mainMenu" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="primary nav-1">
                  <a class="firstLevel" href="index" title="Panel Principal">Inicio</a>                  
                </li>

               

                <li class="primary nav-9">
                  <a class="dropdown-toggle disabled firstLevel" href="rooms" title="Habitaciones">Habitaciones</a>                  
                </li>

            

                <li class="primary nav-10">
                  <a class="dropdown-toggle disabled firstLevel active" href="booking" title="Reservaciones">Reservaciones</a>                  
                </li>

               
              </ul>
            </div>

            <div class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                    
                    </button>
                <a class="navbar-brand" href="#"><?php if (file_exists("fotos/logo-principal.png")){
                        echo "<img src='fotos/logo-principal.png' alt='Logo Principal'>"; 
                                    } else {
                        echo "<img src='' alt='Logo Principal'>"; 
                                    } 
                    ?></a>                
                </div>
            </div>
        </div>
    </div>
</header>

<section id="page">
    
    <header class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                                    
                    <h1 itemprop="name">Reservaciones</h1>
                                </div>
            <div class="col-sm-5 hidden-xs">
                <div itemprop="breadcrumb" class="breadcrumb clearfix">
                    <a href="index" title="Inicio">Inicio</a>
                    <span>Reservaciones</span>
                </div>
                            </div>
        </div>
    </div>
</header>
    <?php
	if (isset($_GET["a"])) { $a = $_GET["a"]; } else { $a =''; }
	if (isset($_GET["b"])) { $b = $_GET["b"]; } else { $b =''; }
	if (isset($_GET["c"])) { $c = $_GET["c"]; } else { $c =''; }
	if (isset($_GET["d"])) { $d = $_GET["d"]; } else { $d =''; }
	?>
    <div id="content" class="pt30 pb30">
	
	<form action="" name="savereservacionesweb" id="savereservacionesweb" method="POST" class="booking-search" enctype="multipart/form-data">		

                <div id="save">
                 <!-- error will be shown here ! -->
                </div>

        <div class="container boxed mb20">
            <legend>Búsqueda de Habitaciones</legend>
        <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group">
                   <div class="input-group-addon"><i class="fa fa-calendar"></i> Entrada</div>
                   <input type="hidden" name="tipo" id="tipo" value="<?php echo encrypt("2"); ?>">
                   <input type="text" class="form-control" name="desde_r" id="desde_r" onKeyUp="this.value=this.value.toUpperCase();" data-rel="tooltip" placeholder="Fecha de Entrada" autocomplete="off" value="<?php echo $e = ( $a == '' ? "" : $a) ?>" data-placement="top">
                </div>
                <div class="field-notice" rel="from_date"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i> Salida</div>
                    <input type="text" class="form-control" name="hasta_r" id="hasta_r" onKeyUp="this.value=this.value.toUpperCase();" data-rel="tooltip" placeholder="Fecha de Salida" autocomplete="off" value="<?php echo $f = ( $b == '' ? "" : $b) ?>"  data-placement="top">
                </div>
                <div class="field-notice" rel="to_date"></div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-male"></i> N° Adultos</div>
                    <select name="adultos" id="adultos" class="form-control">
                        <option value="1"<?php if (!(strcmp('1', $c))) {echo "selected=\"selected\"";} ?>>1</option>
						<option value="2"<?php if (!(strcmp('2', $c))) {echo "selected=\"selected\"";} ?>>2</option>
						<option value="3"<?php if (!(strcmp('3', $c))) {echo "selected=\"selected\"";} ?>>3</option>
						<option value="4"<?php if (!(strcmp('4', $c))) {echo "selected=\"selected\"";} ?>>4</option>
						<option value="5"<?php if (!(strcmp('5', $c))) {echo "selected=\"selected\"";} ?>>5</option> 
						<option value="6"<?php if (!(strcmp('6', $c))) {echo "selected=\"selected\"";} ?>>6</option>
						<option value="7"<?php if (!(strcmp('7', $c))) {echo "selected=\"selected\"";} ?>>7</option> 
				    </select>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-child"></i> N° Niños</div>
                    <select name="children" id="children" class="form-control">
                        <option value="0"<?php if (!(strcmp('0', $d))) {echo "selected=\"selected\"";} ?>>0</option>
						<option value="1"<?php if (!(strcmp('1', $d))) {echo "selected=\"selected\"";} ?>>1</option>
						<option value="2"<?php if (!(strcmp('2', $d))) {echo "selected=\"selected\"";} ?>>2</option>
						<option value="3"<?php if (!(strcmp('3', $d))) {echo "selected=\"selected\"";} ?>>3</option>
						<option value="4"<?php if (!(strcmp('4', $d))) {echo "selected=\"selected\"";} ?>>4</option>  
						<option value="5"<?php if (!(strcmp('5', $d))) {echo "selected=\"selected\"";} ?>>5</option>
				  </select>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="button" onClick="BuscarHabitacionesWeb()"><i class="fa fa-search"></i> Búsqueda</button>
            </div>
        </div>
    </div>

</div>
		
        <div id="muestrahabitaciones"></div>	
		<div id="muestradetallesreservacion"></div>        
                   
</form>
	
		
       </div>
</section>


<!-- INICIO DE FOOTER -->
<?php include('footer.php'); ?>
<!-- FIN DE FOOTER -->

</body>
</html>
