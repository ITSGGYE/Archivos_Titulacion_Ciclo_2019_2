<?php require_once "iniciasesion.php";

require_once 'abrebase.php';
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
}
else
{
//echo "Conexión exitosa!";
$mysqli->set_charset('utf8');
//$mysqli -> mysqli_close();
}


$esta=1;




$opas=0;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/x-icon" href="dibujo/ico.png">
<title>Sistema de Gestion Admnistrativa </title>




</head>
<?php include "archivos.php";?>	
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuetipo.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
	
})


</script>	
<script type="text/javascript">
$(document).ready(function(){
	document.formName.descri.focus();
	
		
})


</script>	

<script type="text/javascript">





function suma(i)
{


var co=0;
var uno1=0;
var dos1=0;
var tres1=0;

var uno=document.getElementById("t1"+i);
dorsal = document.formName.op.value;
//$.post("carga42.php",{ id:uno.value,id1:dos.value },function(data){$("#curso").html(data);})

$.post("clicarga421.php",{ id:uno.value,dorsal:dorsal },function(data){$("#curso").html(data);})



 

       	 
	


}
		
		
		

	function blanco()
{



document.formName.razon.value="";
document.formName.descri.value="";


document.formName.codi.value="";
document.formName.nombre2.value="";
document.formName.cedula4.value="";
document.formName.opes.value=0;

document.formName.descri.focus();
}	
		
		
function trim(cadena)
{
var retorno=cadena.replace(/^\s+/g,"");
retorno=retorno.replace(/\s+$/g,"");
return retorno;
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
	

	
		
	
	var decripcion11 = document.getElementById("descri");
		
			 if (trim(decripcion11.value) == "") {
         alert('Digite descripcion del tipo de ususario');
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
 
		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
				if (veri==0)
		{
		ajax.open("POST", "cueconsu1.php", true);
		}
		
		if (veri==1)
		{
		ajax.open("POST", "cuebuscar1.php", true);
		}
		
		
		
 
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
				
									window.alert("Favor revise opcion dato ya existe");
									
								}
									
									if (jugador.value == 2 ){
									
									window.alert("Favor revise descripcion del tipo de usuario esye dato ya existe");
									
									}
				 
				
				}
				else
				{
				
				
								
					
							
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
	
	
	////////
	

 
        //Recogemos los valores introducimos en los campos de texto
		
	
		raz = document.formName.razon.value;
		ruc = document.formName.descri.value;
		
		
				
	
		veri = document.formName.opes.value;
	
		code = document.formName.codi.value;
		dorsal = document.formName.op.value;
		
		window.alert("El registro se creo con exito");
		
		
		
				if (veri==0)
		{
					$.post("cuegrabador.php",{ raz:raz,ruc:ruc,code:code,dorsal:dorsal },function(data){$("#curso").html(data);})	
		}
		
		



		
		if (veri==1)
		{
					
					
			$.post("cuegrabador1.php",{ raz:raz,ruc:ruc,code:code,dorsal:dorsal },function(data){$("#curso").html(data);})	
		}
		
		


		
					
			
		
									
	
 
} 
 
 
 
 
</script>
<body class="dark_theme  fixed_header left_nav_fixed">

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
          
        
       <div id="main-content">
	  
    <div class="page-content">
      
     
      <div class="row">
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">
	 <form method="post" name="formName" action="" onSubmit="enviarDatos(); return false">	   
		   <table width="867">
  <tr>
    <td width="280">Tipo de Usuario</td>
    <td width="320" colspan="2"><input name="descri" type="text" class="field2" id="descri" style="text-transform:capitalize; height:19px;"  size="40" maxlength="60"  /></td>
    <td width="245"></td>
  </tr>
  <tr>
    <td><input name="cedula2" type="hidden" size="5" class="field2" id="cedula2"  value="" />
						
      <input name="monto2" type="hidden" size="5" class="field2" id="monto2"  value="" />
      <input name="op" type="hidden" size="5" class="field2" id="op" value="4" />
    
      <input name="cedula3" type="hidden" size="5" id="cedula3" value=""  />
	  <input name="codi" type="hidden" id="codi" value="">
	  
	  
	  <input name="opes" type="hidden" size="5" id="opes" value="<?php print $opas;?>">
	  
	  <input name="curso" type="hidden" size="5" id="curso" style="BACKGROUND:#CCCCCC; color:#0000FF;" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#CCCCCC')" value="">
<input name="cedula4" type="hidden" id="cedula4" value="">

    <input name="nombre2" type="hidden" id="nombre2" value="" />
	
	<input name="vidautil" type="hidden" class="field2" id="vidautil" value="" />	<input name="razon" type="hidden" class="field2" id="razon" onKeyPress="return soloLetras1(event); " value="" /></td>
    <td><div align="center"><img onclick="blanco()"   src="grafico/nue.png" border="0"  /></div></td>
    <td><div align="center">
      <input name="submit" type="image" id="submit" value="Submit"  src="grafico/nu2.png" />
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>

 </form>

              
              <h3 class="content-header">
			   <div class="pull-right">
         
        </div>
			  
			  </h3>
            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                		<form method="post" id="forma" name="forma" action="" onSubmit="return validar();" >
	
	<input name="as" type="hidden" id="as" value="" />
	
	<div id="contenido">
	<div name="timediv" id="timediv">	
			<table id="examplea" name="examplea"  width="100%">
			
			
				
				
			</table>
			
		</div>
</div>	
			
			
			
			
	
		</form> 
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div>
        <!--/col-md-12--> 
      </div><!--/row-->
        </div><!--/page-content end--> 
  </div><!--/main-content end--> 
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
dasdsadsa
 
<footer class="footer">
  <div class="post-footer Estilo1">
 <?php require_once "pie.php";?>
   </div>
</footer>















 

</body>
</html>
