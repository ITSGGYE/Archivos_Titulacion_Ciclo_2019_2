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
$ced="";
$opas=0;
$fecha=date("d/m/Y");
$result5 = $mysqli->query("select * from tipousu order by tipousu");
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


document.miforma.cedula.value="";
document.miforma.nombre.value="";
document.miforma.apellido.value="";

document.miforma.usua.value="";
document.miforma.clav.value="";


document.miforma.select1.selectedIndex="0";	


document.miforma.codi.value="";
document.miforma.cedula4.value="";
document.miforma.opes.value=0;
document.miforma.nombre2.value="";
document.miforma.nombre3.value="";


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
         alert('Digite cedula de identidad del usuario');
		 document.miforma.cedula.focus();
		 return false;
    }
	
	
		var decripcion11a = document.getElementById("nombre");
	
		 if (trim(decripcion11a.value) == "") {
         alert('Digite los nombres del usuario');
		 document.miforma.nombre.focus();
		 return false;
    }
	
	
		var decripcion11as = document.getElementById("apellido");
	
		 if (trim(decripcion11as.value) == "") {
         alert('Digite los apellidos del usuario');
		 document.miforma.apellido.focus();
		 return false;
    }	
	
	
			var decripcion1as = document.getElementById("usua");
	
		 if (trim(decripcion1as.value) == "") {
         alert('Digite el alias del usuario');
		 document.miforma.usua.focus();
		 return false;
    }	
	
	
        //Recogemos lodas valores introducimos en los campos de texto
		
		
	
		ape = document.miforma.apellido.value;
		nom = document.miforma.nombre.value;
		ced = document.miforma.cedula.value;
		usu = document.miforma.usua.value;


		
		
		dorsal = document.miforma.op.value;
		veri = document.miforma.opes.value;
		
	
		nomre = document.miforma.nombre2.value;
		ced1 = document.miforma.cedula4.value;
		usu1 = document.miforma.nombre3.value;

		
	
         //Aquí será donde se mostrará el resultado
		jugador = document.getElementById('cedula2');
		
 
		//instanciamos el objetoAjax
		ajax = objetoAjax();
		
					if (veri==0)
		{
	
		ajax.open("POST", "cueconsu1.php", true);
		}
		
		if (veri==1)
		{
		ajax.open("POST", "cuebuscar1.php", true);
		}
		
		
		
 
		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
		
 
		//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
ajax.onreadystatechange = function() {
 
             //Cuando se completa la petición, mostrará los resultados 
			if (ajax.readyState == 4){
 
				//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'
				jugador.value = (ajax.responseText) 
		
			
				if (jugador.value == 1 || jugador.value == 2 || jugador.value == 3 )
				{
				
				
							if (jugador.value == 1 )
								{
				
									window.alert("Favor revise datos del usuario este ya existe");
									
								}
									
									if (jugador.value == 2 ){
									
									window.alert("Favor revise cedula del usuario esye dato ya existe");
									
									}


								if (jugador.value == 3 ){
									
									window.alert("Favor revise alias del usuario esye dato ya existe");
									
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
		
			
										
			
											
						if (veri==0)
					{
					respuesta = confirm( "Esta seguro que desea guardar los datos ingresados verifique" );
					}
					
					if (veri==1)
					{
					respuesta = confirm( "Esta seguro que desea guardar los cambios realizados a este registro" );
					}
				
				
					
					
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
	
		
		
		ajax.send("&ape="+ape+"&dorsal="+dorsal+"&nom="+nom+"&nomre="+nomre+"&ced1="+ced1+"&ced="+ced+"&usu="+usu+"&usu1="+usu1)
		
		
		
 
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
	
	
	
	
		apee = document.miforma.apellido.value;
		nome = document.miforma.nombre.value;
		cede = document.miforma.cedula.value;
	
		usu = document.miforma.usua.value;
		cla = document.miforma.clav.value;
	
		ticli = document.miforma.select1.value;
		
		
		
		veri = document.miforma.opes.value;
		code = document.miforma.codi.value;		
		dorsal = document.miforma.op.value;						
		
		
	
         //Aquí será donde se mostrará el resultado
		
 
		//instanciamos el objetoAjax
window.alert("El registro se creo con exito");
		
		
		
				if (veri==0)
		{
						$.post("grabaregis.php",{ apee:apee,nome:nome,cede:cede,usu:usu,cla:cla,ticli:ticli,code:code,dorsal:dorsal },function(data){$("#curso").html(data);})	
					

					
		}
		
		

		
		if (veri==1)
		{
					
					
					$.post("grabaregis1.php",{ apee:apee,nome:nome,cede:cede,usu:usu,cla:cla,ticli:ticli,code:code,dorsal:dorsal },function(data){$("#curso").html(data);})	
		}		
		
 
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

		$("#gallery").load("procesa2.php?action=listFotos");

	}	

</script>
<script type="text/javascript">



	$(document).ready(function(){
		
		var button = $('#upload'), interval;
		new AjaxUpload(button,{
			action: 'procesa.php', 
			name: 'image',
			onSubmit : function(file, ext){
				// cambiar el texto del boton cuando se selecicione la imagen		
				button.text('Subiendo');
				// desabilitar el boton
				this.disable();
				
				interval = window.setInterval(function(){
					var text = button.text();
					if (text.length < 11){
						button.text(text + '.');					
					} else {
						button.text('Subiendo');				
					}
				}, 200);
			},
			onComplete: function(file, response){
				button.text('Subir Foto');
							
				window.clearInterval(interval);
							
				// Habilitar boton otra vez
				this.enable();
				
				// Añadiendo las imagenes a mi lista
				
				
					$('#gallery').html(response).fadeIn("fast");
					$('#gallery li').eq(0).hide().show("slow");
				
			}
		});
		
		
		
		
		
		// Listar  fotos que hay en mi tabla
	//	$("#gallery").load("procesa.php?action=listFotos");
		
		
		// Eliminar
		
		
		
		
		
		$("#gallery li a").live("click",function(){
			var a = $(this)
			$.get("procesa1.php?action=eliminar",{id:a.attr("id")},function(){
				a.parent().fadeOut("slow")
			})
		})
	});

</script>
<body class="dark_theme  fixed_header left_nav_fixed" onLoad="sf('cedula');actualizaReloj();">


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
		
          <h1>Registro de Usuarios </h1>
          <h2 class=""></h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
	
            
            <li><a href="usuarios.php">Salir <img src="dibujo/sal.png" width="30" height="25" title="Salir" /></a></li>
			
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
					<h3 align="center">Registro de Usuarios </h3>  
					
                     
				</div>
				<div class="bodyElement">
					





	
		
		<div class="searcher sqlQuerySearcher">
			
						
									<fieldset>
							
								<legend>IDENTIFICACION</legend>
							
							
								<div class="campSearcher">
									    
										<div class="campSearcherCOD_DICC">
											<div class="label">  
    <label for="COD_DICC" class=""> 
Cedula</label> 
</br>
 <input name="cedula" type="text" onKeyPress="return soloLetras1(event); "  style="height:22px; font-size:12px;" id="cedula" maxlength="13" />
</div> 

<div class="field">  
   
    </div> 

										</div>
									    
										<div class="campSearcherFME_ID">
											<div class="label">  
    <label for="FME_ID" class=""> 
Nombres</label> 
</br>
 <input name="nombre" type="text" onKeyPress="return soloLetras(event); "  style="height:22px; font-size:12px;" id="nombre" maxlength="30" />
</div> 
<div class="field">  
  
    </div> 

	</div>
									    
										<div class="campSearcherENS_ID">
											<div class="label">  
    <label for="ENS_ID" class=""> 
Apellidos</label> 
</br>
 <input name="apellido" type="text" onKeyPress="return soloLetras(event); "  style="height:22px; font-size:12px;" id="apellido" maxlength="30" />
</div> 
<div class="field">  
  
    </div> 

										</div>
									    
										<div class="campSearcherDENOMENS2">
											<div class="label">  
    <label for="DENOMENS2" class=""> 
Usuario/Alias</label> 
</br>
 <input name="usua" type="text"   style="height:22px; font-size:12px;" id="usua" maxlength="30" />
</div> 
<div class="field">  
     
    </div> 
	
	
	
	

										</div>
										
											    
										<div class="campSearcherENS_ID">
											<div class="label">  
    <label for="ENS_ID" class=""> 
Calve</label> 
</br>
 <input name="clav" type="text"   style="height:22px; font-size:12px;" id="clav" maxlength="30" />
<input name="op" type="hidden" id="op" value="55" />
							<input name="cedula4" type="hidden" class="field2" id="cedula4" value="" />
							<input name="codi" type="hidden" class="field2" id="codi" value="" />
							<input name="curso" type="hidden" id="curso" >
							<input name="opes" type="hidden" id="opes" value="<?php print $opas;?>">
							<input name="nombre2" type="hidden" id="nombre2" value="" />
                            <input name="nombre3" type="hidden" id="nombre3" value="" /><input name="cedula2" type="hidden" class="field2" id="cedula2" value="" /></div> 
<div class="field">  
 
    </div> 

										</div>
									    
										<div class="campSearcherDENOMENS2">
											<div class="label">  
    <label for="DENOMENS2" class=""> 
Tipo de Usuario</label> 
</br>
 <select name="select1" id="select1" style="width:200px; font-size:12px;">
    
      <option value="0">Seleccione tipo de usuario</option>
      <?php
			
			while($row = $result5->fetch_array()) { 
			$valor = $row["idtipo1"] ; //Asignamos el id del campo que quieras mostrar
			$nombre = $row["tipousu"]; // Asignamos el nombre del campo que quieras mostrar
			echo "<option value=".$valor.">".$nombre."</option>";
			}
			
			?>
        </select>
</div> 
<div class="field">  
  
    </div> 
	
	
	
	

										</div>
									
							    </div>
								
								
								
							
					   
						</fieldset>
					
						<fieldset>
							
								
							
							
								
							
					   
						</fieldset>				
				
				 <div class="searcherButtons">
					 <button type="button" name="clean" onclick="limpiar();"> Nuevo</button>	
					 
					 
					
					  
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






<footer class="footer">
  <div class="post-footer Estilo1">
 <?php require_once "pie.php";?>
   </div>
</footer>













 

</body>
</html>
