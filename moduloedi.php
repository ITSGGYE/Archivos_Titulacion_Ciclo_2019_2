<?php require_once "iniciasesion.php";
require_once 'abrebase.php';
		
$ced="";
$opas=0;

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

$idpro = $_GET['id'];
$opas=1;

			$nombre = "";
			$indi = "";
				
		
	$result22 = $mysqli->query("select indice,descrimar from modulos where idmar = '$idpro'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				
				$indi =  $row1[0];
				$nombre =  $row1[1];
		
}
$result22->close();


	$codi=$idpro;


	



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

document.formName.nombre.value="";
document.formName.codi.value="";
document.formName.cedula4.value="";
document.formName.opes.value=0;
	
document.formName.nombre.focus();	
	
	
	
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
	
	
	
		
		var decripcion = document.getElementById("razon");
		
			 if (trim(decripcion.value) == "") {
         alert('Digite orden del moulo en el  menu');
		 document.formName.razon.focus();
		 return false;
    }	
		
	
	var decripcion11 = document.getElementById("descri");
		
			 if (trim(decripcion11.value) == "") {
         alert('Digite descripcion del modulo');
		 document.formName.descri.focus();
		 return false;
    }
	
	

	
 
        //Recogemos los valores introducimos en los campos de texto
		
		
	

	dorsal = document.formName.op.value;
		equipo = document.formName.razon.value;
		equipo1 = document.formName.descri.value;
		
		nomre = document.formName.nombre2.value;
		ruc4 = document.formName.cedula4.value;
		
		
		veri = document.formName.opes.value;


		
	
         //Aquí será donde se mostrará el resultado
		jugador = document.getElementById('cedula2');
		
 
		//instanciamos el objetoAjax
		ajax = objetoAjax();
		
		
				
		ajax.open("POST", "cuebuscar1.php", true);
		
		
		
		
 
		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
		
 
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
				
									window.alert("Favor revise orden para el modulo en el menu dato ya existe");
									
								}
									
									if (jugador.value == 2 ){
									
									window.alert("Favor revise descripcion del modulo esye dato ya existe");
									
									}
									
								
				 
				
				}
				else
				{
				
				
								
				
			
			
						//var decripcionza = document.getElementById("telefono");
						 //if (trim(decripcionza.value) == "") {
				  //alert("ingrese numero de telefono del Estudiante");
					// document.formName.telefono.focus();
					 //return false;
					//}
		
			
										
			
					
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
	
		
		
		ajax.send("&equipo="+equipo+"&dorsal="+dorsal+"&equipo1="+equipo1+"&nomre="+nomre+"&ruc4="+ruc4)
		
		
		
 
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
		
		
		raz = document.formName.razon.value;
		ruc = document.formName.descri.value;
		
		
				
	
		veri = document.formName.opes.value;
	
		code = document.formName.codi.value;
		dorsal = document.formName.op.value;
		
		
	
         //Aquí será donde se mostrará el resultado
		
 
		//instanciamos el objetoAjax
window.alert("El registro se creo con exito");
		
		
		
		

		
					
					
				$.post("cuegrabador1.php",{ raz:raz,ruc:ruc,code:code,dorsal:dorsal },function(data){$("#curso").html(data);})	
				
		
 
} 
 
 
</script>	
	
</head>



<body class="dark_theme  fixed_header left_nav_fixed" onLoad="sf('nombre');">


<?php include "archivos11.php";?>	

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
		
          <h1>Edicion de modulos del sistema </h1>
          <h2 class=""></h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
	
            
            <li><a href="modulos.php">Salir <img src="dibujo/sal.png" width="30" height="25" title="Salir" /></a></li>
			
          </ol>
        </div>
      </div>
     
    </br>
	 <form method="post" name="formName" action="" onSubmit="enviarDatos(); return false">
	

<table width="700"  align="center"   border="1">
  <tr>
    <td><div class="directorioCentros">
		<div class="sqlQueryContent">
			<div class="elements">
				<div class="header">
					<h3 align="center">Datos de modulos del sistema </h3>  
					
                     
				</div>
				<div class="bodyElement">
					





	
		
		<div class="searcher sqlQuerySearcher">
			
						
									<fieldset>
							
								<legend>IDENTIFICACION</legend>
							
							
								<div class="campSearcher">
								
								
								<table width="200" align="center">
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> Indice 
</label> 
</div></td>
    <td><input name="razon" type="text" class="field2" id="razon" onKeyPress="return soloLetras1(event); " value="<?php print $indi;?>"    size="10" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> Descripcion 
</label> 
</div> </td>
    <td><input name="descri" type="text" class="field2" id="descri" style="text-transform:capitalize;"  onkeypress="return soloLetras(event); " value="<?php print $nombre;?>" size="40" maxlength="60"  /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="op" type="hidden" id="op" value="1" /></td>
    <td><input name="cedula2" type="hidden" class="field2" id="cedula2" value="" />
	<input name="cedula4" type="hidden" class="field2" id="cedula4" value="<?php print $nombre;?>" />
<input name="codi" type="hidden" class="field2" id="codi" value="<?php print $codi;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="curso" type="hidden" id="curso" ><input name="nombre2" type="hidden" id="nombre2" value="<?php print $indi;?>" /></td>
    <td><input name="opes" type="hidden" id="opes" value="<?php print $opas;?>"></td>
    <td>&nbsp;</td>
  </tr>
</table>

								
									    
										
									    
									    
						 </br>			    
										
									
										
							    </div>
								
								
								
							
					   
						</fieldset>
					
					
				
				 <div class="searcherButtons">
				 <a href="modulo.php">	 <button type="button" name="clean" > Nuevo</button></a>	
					 
				
					 
					 
					
					  
					<button class="textButton" type="submit" name="buscar">Registrar</button>
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


















 

</body>
</html>
