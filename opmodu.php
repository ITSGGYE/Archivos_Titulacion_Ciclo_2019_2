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

$idpro = $_GET['id'];
$noma= "";

$cuecondescri="";

				$result22 = $mysqli->query("select descrimar from modulos where idmar = '$idpro'");

				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
				

							
							$cuecondescri= $row1[0];
							
				
	
					}
					$result22->close();		

$opas=0;


$result5 = $mysqli->query("select * from opciones order by descriopcio");


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
	
	codiestu=document.formName.razon.value;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuemoduop.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
	
})


</script>	

<script type="text/javascript">
$(document).ready(function(){
	document.formName.razon.focus();
	
		
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
codiestu=document.formName.razon.value;
//$.post("carga42.php",{ id:uno.value,id1:dos.value },function(data){$("#curso").html(data);})

$.post("cliquita.php",{ id:uno.value,dorsal:dorsal,codiestu:codiestu },function(data){$("#curso").html(data);})



 

       	 
	


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
	

	var decripcion = document.getElementById("select1");
		
			 if (trim(decripcion.value) == 0) {
         alert('seleccione una opcin a asignar');
		 document.formName.select1.focus();
		 return false;
    }
	
		
	

	
		
		
		divResultado = document.getElementById('resultado');
 
        //Recogemos los valores introducimos en los campos de texto
		
		dorsal = document.formName.op.value;
		equipo = document.formName.select1.value;
	
	
 
         //Aquí será donde se mostrará el resultado
		jugador = document.getElementById('cedula2');
		
 
		//instanciamos el objetoAjax
		ajax = objetoAjax();
 
		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
				
		ajax.open("POST", "cueconsu1.php", true);
		
		
		
		
 
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
				
									window.alert("esta opcion ya se encuentra asignada al modulo o en otro modulo revise");
									
								}
									
									
				
				}
				else
				{
				
				
								
					
							
						
					respuesta = confirm( "Esta seguro que desea asignar la aopcin selecconada a este modulo" );
					
					
					
					
					
					
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
		ajax.send("&equipo="+equipo+"&dorsal="+dorsal)
		
		
 
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
	
		
				
	
	
		code = document.formName.select1.value;
		dorsal = document.formName.op.value;
		
		window.alert("la opcion se asigno con exito");
		
		
		
				
					$.post("cuegrabador.php",{ raz:raz,code:code,dorsal:dorsal },function(data){$("#curso").html(data);})	
		
		
		



		
		
					
			
		
									
	
 
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
    <td width="280">Modulo</td>
    <td width="320" colspan="2"><input name="descri" type="text" class="field2" id="descri" style="text-transform:capitalize;"  onkeypress="return soloLetras(event); " value="<?php print $cuecondescri;?>" size="40" maxlength="60" readonly="true"  /></td>
    <td width="245"></td>
  </tr>
  <tr>
    <td>Descripcion de opcion </td>
    <td><select name="select1" id="select1" style="width:200px;">
    
      <option value="0">Seleccione Opcion</option>
      <?php
			
			while($row = $result5->fetch_array()) { 
			$valor = $row["idop"] ; //Asignamos el id del campo que quieras mostrar
			$nombre = $row["descriopcio"]; // Asignamos el nombre del campo que quieras mostrar
			echo "<option value=".$valor.">".$nombre."</option>";
			}
			
			?>
        </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input name="cedula2" type="hidden" size="5" class="field2" id="cedula2"  value="" />
						
      <input name="monto2" type="hidden" size="5" class="field2" id="monto2"  value="" />
      <input name="op" type="hidden" size="5" class="field2" id="op" value="10" />
    
      <input name="cedula3" type="hidden" size="5" id="cedula3" value=""  />
	  <input name="codi" type="hidden" id="codi" value="">
	  
	  
	  <input name="opes" type="hidden" size="5" id="opes" value="<?php print $opas;?>">
	  
	  <input name="curso" type="hidden" size="5" id="curso" style="BACKGROUND:#CCCCCC; color:#0000FF;" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#CCCCCC')" value="">
<input name="cedula4" type="hidden" id="cedula4" value="">

    <input name="nombre2" type="hidden" id="nombre2" value="" />
	
	<input name="vidautil" type="hidden" class="field2" id="vidautil" value="" />	<input name="razon" type="hidden" class="field2" id="razon" onKeyPress="return soloLetras1(event); " value="<?php print $idpro;?>" /></td>
    <td><div align="center"> <a href="modulos.php"><img  src="grafico/nue4.png" border="0"  /></a></div></td>
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
