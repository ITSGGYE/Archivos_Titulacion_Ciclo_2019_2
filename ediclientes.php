<?php require_once "iniciasesion.php";
require_once 'abrebase.php';
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno(). ") " . $mysqli -> mysqli_connect_error());
}
else
{
//echo "Conexión exitosa!";
$mysqli->set_charset('utf8');
//$mysqli -> mysqli_close();
}

$fecha=date("d/m/Y"); 
$idpro = $_GET['id'];
$opas=1;

		$ruc = "";
		$nombre = "";
		$apellido ="";
		$direccion1 = "";
		$cla = "";
		
		
		$telefono1 = "";
		$telefono2 = "";
		$telefono3 = "";
		$fax = "";
		$correo1 ="";
		$correo2 ="";
		
		$nombre1 = "";
		
		$tici = "";
		$ruc1 = "";
		$pais = "";
		$esci = "";
		$direccion2 ="";
		
		
		$gene ="";			
		$acti = "";
		$feca = "";
		$feca1 = "";
	
	
$cocli = "";
		
		
		
	$result22 = $mysqli->query("select soc_cod,soc_cedula,soc_nombres,soc_apellidos,soc_nombreapellido,soc_fecha,soc_tele,soc_dire,soc_gene,soc_mail,soc_esci,soc_fein,ticlie from clientes where soc_id = '$idpro'  ");



if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				$cocli = $row1[0];
				$ruc = $row1[1];
				$nombre =  $row1[2];
				$apellido = $row1[3];
				$nombre1 =$row1[4];
				$feca= $row1[5];
				$telefono1 =  $row1[6];
				$direccion1 = $row1[7];
				$gene = $row1[8];
				$correo1 =$row1[9];
				
				$esci = $row1[10];
				$feca1 = $row1[11];
				$tici = $row1[12];
			
				
				
}
$result22->close();


$razon1 ="";

$result22 = $mysqli->query("select tipoclie from tipoclie where idtipo = '$tici'  ");
if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				
				$razon1 = $row1[0];

}
$result22->close();



// $nom= getenv("REMOTE_ADDR"); 

	$codi=$idpro;





$result5= $mysqli->query("select *from tipoclie");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/x-icon" href="dibujo/ico.png">
<title>Sistema de Gestion Admnistrativa </title>



<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118" > </script>
<script type="text/javascript" src="jquery.js"></script>
 <script type="text/javascript" src="ajaxupload.js"></script>
 <script>
function sf(ID){
document.getElementById(ID).focus();
}

	</script>
	<script type="text/javascript">
function trim(cadena)
{
var retorno=cadena.replace(/^\s+/g,"");
retorno=retorno.replace(/\s+$/g,"");
return retorno;
}


function limpiar(){

var dt = new Date();

// Display the month, day, and year. getMonth() returns a 0-based number.
var month = dt.getMonth()+1;
var day = dt.getDate();
var year = dt.getFullYear();

			if(day < 10)
			{
				day= '0' + day;
			}
			
			
			if(month < 10)
			{
				month= '0' + month;
			}

codiestu = day + '/'  + month + '/' + year;
codiestua = day + '/'  + month + '/' + year;
		
	
	
	document.miforma.fec21.value = day + '/'  + month + '/' + year;
	
	document.miforma.fec2.value = day + '/'  + month + '/' + year;






document.miforma.cedula.value="";
document.miforma.nombre.value="";
document.miforma.apellido.value="";

document.miforma.direcion.value="";
document.miforma.telefono.value="";
document.miforma.mail.value="";

document.miforma.ticli.selectedIndex="0";	


document.miforma.codi.value="";
document.miforma.cedula4.value="";
document.miforma.opes.value=0;
document.miforma.nombre2.value="";


document.miforma.cedula.focus();	
	
	
	
	 }
	 
 
 function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz ABCDEFGHIJKLMNÑOPRSTUVWXYZ";
    especiales = [8,37,39,46];

    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

 function soloLetras1(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789";
    especiales = [8,37,39,46];

    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
 
 


	</script>
	
	
	<script type="text/javascript">

	function objetoAjax(){
		var xmlhttp = false;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {

			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false; }
		}

		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		  xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}
	
	
	
	
	
	function enviarDatos(){
	
	
	var decripcion11 = document.getElementById("cedula");
		
			 if (trim(decripcion11.value) == "") {
         alert('Digite cedula de identidad del cliente');
		 document.miforma.cedula.focus();
		 return false;
    }
	
	var decripcion11a = document.getElementById("nombre");
	
		 if (trim(decripcion11a.value) == "") {
         alert('Digite los nombres del cliente');
		 document.miforma.nombre.focus();
		 return false;
    }
	
	var decripcion11as = document.getElementById("apellido");
	
		 if (trim(decripcion11as.value) == "") {
         alert('Digite los apellidos del cliente');
		 document.miforma.apellido.focus();
		 return false;
    }	
	
		
		
	
	

	
 
        //Recogemos los valores introducimos en los campos de texto
		
	
		equipo1 = document.miforma.nombre.value;
		equipo2= document.miforma.apellido.value;
		equipo3= document.miforma.cedula.value;
		dorsal = document.miforma.op.value;
		veri = document.miforma.opes.value;
		
		ruc4 = document.miforma.cedula4.value;
		nomre = document.miforma.nombre2.value;		



	
	

		
 
         //Aquí será donde se mostrará el resultado
		jugador = document.getElementById('cedula2');
		
 
		//instanciamos el objetoAjax
		ajax = objetoAjax();
 
		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
			
		ajax.open("POST", "buscar1.php", true);
	
 
		//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
		ajax.onreadystatechange = function() {
 
             //Cuando se completa la petición, mostrará los resultados 
			if (ajax.readyState == 4){
 
				//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'
				jugador.value = (ajax.responseText) 
			
			
				if (jugador.value == 1 || jugador.value == 2 )
				{
				
				
								if (jugador.value == 1 )
								{
				
									window.alert("Favor revise appelidos y nombres del cliente ya existe");
									document.miforma.apellido.focus();
									
								}
									
									if (jugador.value == 2 ){
									
									window.alert("Favor revise cedula del cliente esye dato ya existe");
									document.miforma.cedula.focus();
									
									}
				 
				
				}
				else
				{
				
				
								
				
			
			
					var decripcion1x1 = document.getElementById("fec2");
				
						
				 if (trim(decripcion1x1.value) == "") {
      alert("Seleccione fecha de nacimiento del cliente");
		 document.miforma.fec2.focus();
		 return false;
        }
				
		var decripcia = document.getElementById("direcion");
			
						 if (trim(decripcia.value) == "") {
      alert("ingrese direccion del cliente");
		 document.miforma.direcion.focus();
		 return false;
        }		
			
			
			var decripcionza = document.getElementById("telefono");
			 if (trim(decripcionza.value) == "") {
      alert("ingrese numero de telefono del cliente");
		 document.miforma.telefono.focus();
		 return false;
        }
		
			
			
			
			
			
			var decripciam = document.getElementById("mail");
			
						 if (trim(decripciam.value) == "") {
      alert("ingrese direccion electronica del cliente");
		 document.miforma.mail.focus();
		 return false;
        }
	
	
	
			
			var decripcion1x1b = document.getElementById("fec21");
				
						
				 if (trim(decripcion1x1b.value) == "") {
      alert("Seleccione fecha de ingreso del cliente");
		 document.miforma.fec21.focus();
		 return false;
        }
					
					
											
					
					respuesta = confirm( "Esta seguro que desea guardar los cambios realizados a este registro" );
					
				
				
					
					
					if (respuesta)
	 				{
						enviarDatos1()
					} 
					else 
					{
	
						return false;
						// lo que corresponda hacer cuando se pulsa cancelar
					}

		
					
				}
				
				
			
				
			}
		} 
 
		//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario. 
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
 
		//enviamos las variables a 'consulta.php' 
		//ajax.send("&equipo="+equipo+"&dorsal="+dorsal) 
	
		
		
		ajax.send("&dorsal="+dorsal+"&equipo1="+equipo1+"&ruc4="+ruc4+"&equipo2="+equipo2+"&equipo3="+equipo3+"&nomre="+nomre)
		
		
 
} 
 
 
 
 function objetoAjax1(){
		var xmlhttp = false;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {

			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false; }
		}

		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		  xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}
	
	
	function enviarDatos1(){
	
	
	
	
	
 
        //Recogemos los valores introducimos en los campos de texto
		
		apee = document.miforma.apellido.value;
		nome = document.miforma.nombre.value;
		cede = document.miforma.cedula.value;
		fene = document.miforma.fec2.value;
		tele = document.miforma.telefono.value;
		dire = document.miforma.direcion.value;
		core = document.miforma.mail.value;
		fere = document.miforma.fec21.value;
		gene = document.miforma.genero.value;
		esta = document.miforma.estado.value;
		ticli = document.miforma.ticli.value;
		
		
		
		veri = document.miforma.opes.value;
		code = document.miforma.codi.value;		
		dorsal = document.miforma.op.value;						
		
	
	window.alert("El registro se edito con exito");
		
		
		
		
		
					
					
						$.post("grabaregis1.php",{ apee:apee,nome:nome,cede:cede,fene:fene,tele:tele,gene:gene,dire:dire,esta:esta,core:core,fere:fere,ticli:ticli,code:code,dorsal:dorsal },function(data){$("#curso").html(data);})	
			
	
	
	
       
		
		
	
		
		
		
		
		
		
		
 
} 
 
 
</script>	
	
</head>
<style type="text/css">
	
body{
		
	}
		#content1{
		width:200px;
		margin:1px auto;
		height:170px;
			border:6px solid #000000 ;
		padding-top:1px;
		overflow-y:auto
	}
	#upload{  
		padding:12px;  
		font:bold 10px Arial, Helvetica, sans-serif;
        text-align:center;  
        background:#f2f2f2;  
        color: #3366cc;  
        border:1px solid #ccc;  
        width:90px;
		display:block;  
        -moz-border-radius:5px;
		-webkit-border-radius:5px; 
		margin:0 auto; 
		text-decoration:none
    }
	#gallery{
		 
		 margin-left:16px;
		 
	}
	#gallery li{
		display:block;
		float:left;
		width:150px;
		height:140px;
		background: #FFFF99;
		border:1px solid #093;
		text-align:center;
		padding:6px 0;
		margin:5px 0 1px 2px;
		position:relative
	}
	#gallery li img{
		width:140px;
		height:120px
	}
	#gallery li a{
		position:absolute;
		right:10px;
		top:0px
	}
	#gallery li a img{ width:auto; height:auto}
	
</style>
<script language="JavaScript" type="text/javascript">
/*Script del Reloj */
function actualizaReloj() {

	
	}	

</script>

<body class="dark_theme  fixed_header left_nav_fixed" onLoad="sf('cedula');">


<?php include "archivos11.php";?>	
<link href="esti/pie.css" rel="stylesheet">
  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="header_bar">
    <!--\\\\\\\ header Start \\\\\\-->
    <div class="brand">
      <!--\\\\\\\ brand Start \\\\\\-->
   <?php include "final.php";?>	
          
        
    </div>
</div>
    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\-->
    <div class="left_nav">
      <!--\\\\\\\left_nav start \\\\\\-->
  <?php include "menu.php";?>	
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
	  
        <div class="pull-left page_title theme_color">
		
          <h1>Edicion   de clientes </h1>
          <h2 class=""></h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
	
             <li><a href="clientes.php">Nuevo <img src="dibujo/nue.png" width="30" height="25" title="Nuevo registro" /> </a>  </li>
            <li><a href="proceclientes.php">Salir <img src="dibujo/sal.png" width="30" height="25" title="Salir" /></a></li>
			
          </ol>
        </div>
      </div>
     
    </br>
	 <form method="post" name="miforma" action="" onSubmit="enviarDatos(); return false">
	

<table width="700"  align="center"   border="1">
  <tr>
    <td><div class="directorioCentros">
		<div class="sqlQueryContent">
			<div class="elements">
				<div class="header">
					<h3 align="center">Datos de Clientes </h3>  
					
                     
				</div>
				<div class="bodyElement">
					





	
		
		<div class="searcher sqlQuerySearcher">
			
						
									<fieldset>
							
								<legend>IDENTIFICACION   <input name="cocla" type="text" class="success" id="cocla" value="<?php print $cocli; ?>" maxlength="13" readonly="true" />
								</legend>
							
							
								<div class="campSearcher">
									    
										<div class="campSearcherCOD_DICC">
											<div class="label">  
    <label for="COD_DICC" class=""> 
Cedula</label>
    /Ruc
											</div> 
                                            <div class="field">  
    <input name="cedula" type="text" class="success" id="cedula" onKeyPress="return soloLetras1(event); " value="<?php print $ruc; ?>" maxlength="13" />
    </div> 

										</div>
									    
										<div class="campSearcherFME_ID">
											<div class="label">  
    <label for="FME_ID" class=""> 
Nombres</label> 
</div> 
<div class="field">  
    <input name="nombre" type="text" class="success" id="nombre" onKeyPress="return soloLetras(event); " value="<?php print $nombre; ?>" maxlength="30" />
    </div> 

	</div>
									    
										<div class="campSearcherENS_ID">
											<div class="label">  
    <label for="ENS_ID" class=""> 
Apellidos</label> 
</div> 
<div class="field">  
   <input name="apellido" type="text" class="success" id="apellido" onKeyPress="return soloLetras(event); " value="<?php print $apellido; ?>" maxlength="30" />
    </div> 

										</div>
									    
										<div class="campSearcherDENOMENS2">
											<div class="label">  
    <label for="DENOMENS2" class=""> 
Fecha Nacim.</label> 
</div> 
<div class="field">  
     <input name="fec2" type="text" id="fec2" style=" background:url(images/cal.gif) no-repeat scroll right center rgb(255, 255, 255); padding-right: 20px; position: relative;" onClick="displayCalendar(document.forms[0].fec2,'dd/mm/yyyy',this)"  onkeyup = "this.value=formateafecha(this.value);" value="<?php print $feca;?>" size="15" maxlength="10" readonly="true"/>
    </div> 
	
	
	
	

										</div>
										
											    
										<div class="campSearcherENS_ID">
											<div class="label">  
    <label for="ENS_ID" class=""> 
Genero</label> 
</div> 
<div class="field">  
   <select id="genero" class="success" name="genero"  style="width:150px; background:#E6EFC2">
                              <option value="Masculino">Masculino</option>
                              <option value="Femenino">Femenino</option>
                            <?php
			
				echo "<option selected value=".$gene.">".$gene."</option>";
			?>
                            </select>
    </div> 

										</div>
									    
										<div class="campSearcherDENOMENS2">
											<div class="label">  
    <label for="DENOMENS2" class=""> 
Estado Civil</label> 
</div> 
<div class="field">  
    <select id="estado" class="success" name="estado"  style="width:150px; background:#E6EFC2">
                              <option value="Casado">Casado</option>
                              <option value="Divorciado">Divorciado</option>
							   <option value="Soltero">Soltero</option>
							    <option value="Viudo">Viudo</option>
								 <option value="Union_Libre">Union_libre</option>
                            <?php
			
				echo "<option selected value=".$esci.">".$esci."</option>";
			?>
                            </select>
    </div> 
	
	
	
	

										</div>
									
							    </div>
								
								
								
							
					   
						</fieldset>
					
						<fieldset>
							
								<legend>UBICACION</legend>
							
							
								<div class="campSearcher">
									    
										<div class="campSearcherCOD_DICC">
											<div class="label">  
    <label for="COD_DICC" class=""> 
Direccion</label> 
</div> 
<div class="field">  
    <input name="direcion" type="text" class="success" id="direcion" value="<?php print $direccion1; ?>" size="35" />
    <input name="cedula2" type="hidden" class="field2" id="cedula2" value="" /></div> 

										</div>
									    
										<div class="campSearcherFME_ID">
											<div class="label">  
    <label for="FME_ID" class=""> 
Telefono</label> 
</div> 
<div class="field">  
   <input name="telefono" type="text" class="success" id="telefono" onKeyPress="return soloLetras1(event); " value="<?php print $telefono1; ?>" size="10" maxlength="10" />
    </div> 

										</div>
									    
										<div class="campSearcherENS_ID">
											<div class="label">  
    <label for="ENS_ID" class=""> 
Mail</label> 
</div> 
<div class="field">  
    <input name="mail" type="text" class="success" id="mail" value="<?php print $correo1; ?>" size="35" />
    </div> 

										</div>
									    
										<div class="campSearcherDENOMENS2">
											<div class="label">  
    <label for="DENOMENS2" class=""> 
Fecha Ingreso</label> 
</div> 
<div class="field">  
     <input name="fec21" type="text" id="fec21" style=" background:url(images/cal.gif) no-repeat scroll right center rgb(255, 255, 255); padding-right: 20px; position: relative;" onClick="displayCalendar(document.forms[0].fec21,'dd/mm/yyyy',this)"  onkeyup = "this.value=formateafecha(this.value);" value="<?php print $feca1;?>" size="15" maxlength="10" readonly="true"/>
    </div> 

										</div>
										
										
										<div class="campSearcherENS_ID">
											<div class="label">  
    <label for="ENS_ID" class=""> 
Tipo de Cliente</label> 
</div> 
<div class="field">  
   <select id="ticli" class="success" name="ticli"  style="width:150px; background:#E6EFC2">
                              <?php
			while($row = $result5->fetch_array()) { 
			$valor14 = $row["idtipo"] ; //Asignamos el id del campo que quieras mostrar
			$nombre2 = $row["tipoclie"]; // Asignamos el nombre del campo que quieras mostrar
			echo "<option value=".$valor14.">".$nombre2."</option>";
			}
		echo "<option selected value=".$tici.">".$razon1."</option>";
			?>
                            
                            </select>
							
							<input name="op" type="hidden" id="op" value="2" />
							<input name="cedula4" type="hidden" class="field2" id="cedula4" value="<?php print $ruc; ?>" />
							<input name="codi" type="hidden" class="field2" id="codi" value="<?php print $codi; ?>" />
							<input name="curso" type="hidden" id="curso" >
							<input name="opes" type="hidden" id="opes" value="<?php print $opas;?>">
							<input name="nombre2" type="hidden" id="nombre2" value="<?php print $nombre1; ?>" />
    </div> 

										</div>
										
									
							    </div>
							
					   
						</fieldset>				
				
				 <div class="searcherButtons">
					 
					 
					
					  
					<button class="textButton" type="submit" name="buscar">Realizar Cambios</button>
				</div>	
			


		</div>
	

				</div>
			</div>
		</div>
	</div></td>
  </tr>
</table>
</form>
        
       <!--/main-content end-->
    </div>
    <!--\\\\\\\ container  end \\\\\\-->
</div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->

</nav>
<!-- /sidebar chats -->   






<footer class="footer">
  <div class="post-footer Estilo1">
 <?php require_once "pie.php";?>
   </div>
</footer>













 

</body>
</html>
