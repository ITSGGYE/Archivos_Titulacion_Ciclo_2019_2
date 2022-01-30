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


$idpro = "";
$codicre=$_GET["mensaje1"]; 


$opas=1;


		$valcre = ""; 
 
 	$tazar =""; 
	 $plaz = ""; 
 	$fecplaz = ""; 
 	$coucre ="";
 	$factucre ="";
	
 
 




$idtic="";
$idfo="";

$detic="";
$defo="";








				$result22 = $mysqli->query("select valcre,taza,pla,fecha,cuota,factu,idticue,idfpa,idcli from datoscredito where idcred = '$codicre'  ");
				
				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
								
						
							
								$valcre = $row1[0];
				
								$tazar=$row1[1];
								 $plaz = $row1[2];
								$fecplaz =  $row1[3];
								$coucre = $row1[4];
							$factucre =$row1[5];
							$idtic =$row1[6];
							$idfo =$row1[7];
							$idpro =$row1[8];
								
				}
				$result22->close();



$deuda=0;
$deuto=0;
$cancela=0;
$debe=0;
$consulta = $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codicre."'");
while($rowcre = $consulta->fetch_array() )
{
			
			$numes=$rowcre['esta'];
			$deus=$rowcre['cuo'];
			$deuto=$deuto+$deus;
			if($numes==0)
			$debe=$debe+$deus;
			else
			$cancela=$cancela+$deus;
			

}				
				


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
$i1=0;

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
	
	
	//sacamos datso del credito
	
	
 
 




				
				
				if ($idtic==1 )
					{
					$detic="cuentas por cobrar a corto plazo";
				}
			

				if ($idtic==2 )
					{
					$detic="cuentas por cobrar a largo plazo";
				}

				if ($idfo==1 )
					{
					$defo="letras de cambio";
				}
			

				if ($idfo==2 )
					{
					$defo="títulos de crédito";
				}
				
						if ($idfo==3 )
					{
					$defo="pagarés";
				}
				
				
			

$resucre= $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codicre."' ");

$esta=1;



$result511a= $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codicre."' and esta = '".$esta."' ");
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
	<script type="text/javascript">
function startTime()
{

var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);

document.miforma.hoin.value=h+":"+m+":"+s;

t=setTimeout('startTime()',500);
}
function checkTime(i)
{
if (i<10)
{
i="0" + i;
}
return i;
}		  

function suma()
{


cre=document.miforma.cre18.value;
nsuma=document.getElementById("cre18").value;
credi=parseFloat(nsuma) ;	

if (credi>0)
{
	taz=document.miforma.taz.value;
	 if (taz=="" || taz==0) {
         alert('ingrese la taza de interes');
		  document.getElementById("taz").focus();
		 return false;
   		 }		 
	
	mes=document.miforma.mes.value;
		 if (mes==0) {
         alert('seleccione meses a financiar');
		  document.getElementById("mes").focus();
		 return false;
   		 }		 
	
	fec=document.miforma.fec.value;



//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("credito.php",{ cre:cre,taz:taz,mes:mes,fec:fec },function(data){$("#examplea").html(data);})
}
else
{
	alert("No existe valor a financiar");
	document.getElementById("cre18").focus();
		 return false;
}
}


 
 
</script>	


	<script type="text/javascript">

		
		function validar(){
		
		var decripcion11a = document.getElementById("copa");
		
			 if (trim(decripcion11a.value) == 0) {
         alert('no hay cuenta por cobrar a financiar');
		 		 return false;
    		}
	
	
	/////
	






	/////
	
	
		
	
	
				
		
		
		respuesta = confirm( "Esta seguro que desea registrar la venta de estos productos" );
				
					if (respuesta)
	 				{
						document.miforma.action = 'recibidoven.php';
					} 
					else 
					{
	
						return false;
						
					}

		
		}

</script>

	
    <style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:10px;
	top:32px;
	width:213px;
	height:162px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:10px;
	top:232px;
	width:213px;
	height:162px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	left:525px;
	top:32px;
	width:600px;
	height:255px;
	border: solid;
    max-height:255px;
	background:#FFFFFF;
	overflow: auto;
	z-index:3;
}


#Layer392 {
	position:absolute;
	left:525px;
	top:290px;
	height:255px;
	width:600px;
	border: solid;
    max-height:255px;
	background:#FFFFFF;
	overflow: auto;
	z-index:392;
}


#Layer26 {
	position:absolute;
	left:525px;
	top:272px;
	width:213px;
	height:162px;
	z-index:2;
}

#Layer352 {
	position:absolute;
	left:370px;
	top:40px;
	height:330px;
    max-height:330px;
	background:#FFFFFF;
	overflow: auto;
	z-index:3;
	
}


.Estilo1 {color: #FFFFFF}
-->
    </style>
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
.Estilo3 {
	color: #0000CC;
	font-size: 14px;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}

.Estilo4 {
	color: #CC0033;
	font-size: 14px;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
</style>
<script language="JavaScript" type="text/javascript">
/*Script del Reloj */
function actualizaReloj() {

	
	}	

</script>

<body class="dark_theme  fixed_header left_nav_fixed" onLoad="startTime();">


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
	  
        
        <div class="pull-right">
          <ol class="breadcrumb">
	
            
			
          </ol>
        </div>
      </div>
     
    </br>
		
	<form method="post" id="miforma" name="miforma" action="" onSubmit="return validar();" > 
	
	 <div id="Layer1">
	

<table width="490"  align="center"   border="1">
  <tr>
    <td><div class="directorioCentros">
		<div class="sqlQueryContent">
			<div class="elements">
				
					<h3 align="center">Datos del Cliente </h3>  
					
                     
			
				<div class="bodyElement">
					





	
		
		<div class="searcher sqlQuerySearcher">
			
						
									
							
							
								<div class="campSearcher">
									    
										<table width="441" border="1">
  <tr>
    <td width="137"><div class="label">  
    <label for="COD_DICC" class=""> 
Cedula /Ruc</label></div> </td>
    <td width="242"><span class="Estilo3"><?php print $ruc; ?></span><input name="op" type="hidden" id="op" value="2" /></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cliente</label></div> </td>
    <td><span class="Estilo3"><?php print $nombre1; ?></span><input name="codi" type="hidden" class="field2" id="codi" value="<?php print $codi; ?>" /></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Dirección</label></div></td>
    <td><span class="Estilo3"><?php print $direccion1; ?></span><input name="opes" type="hidden" id="opes" value="<?php print $opas;?>"></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Telefono</label></div></td>
    <td><span class="Estilo3"><?php print $telefono1; ?></span> <input name="cocla" type="hidden" class="success" id="cocla" value="<?php print $cocli; ?>" maxlength="13" readonly="true" />
							<input name="hoin" type="hidden" id="hoin"  size="6" readonly="true" />	</td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Mail</label></div></td>
    <td><span class="Estilo3"><?php print $correo1; ?></span></td>
    </tr>
  
    <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Tipo de Cliente</label></div></td>
    <td><span class="Estilo3"><?php print $razon1; ?></span></td>
    </tr>
    <tr>
      <td colspan="2">
							
							
							<input name="curso" type="hidden" id="curso" >
							
							
							
							<input name="cedula2" type="hidden" class="field2" id="cedula2" value="" />							</td>
      </tr>
</table>

										
										
										
									
									    
										
									    
										
									    
										
										
											    
										
									  

										</br>
									
							    </div>
								
								
								
							
					   
					
					
				
				
			


		</div>
	

				</div>
			</div>
		</div>
	</div></td>
  </tr>
</table>
</div>
<div id="Layer2">
	

<table width="500"  align="center"   border="1">
  <tr>
    <td><div class="directorioCentros">
		<div class="sqlQueryContent">
			<div class="elements">
			
					<h3 align="center">Datos de Cuentas por cobrar </h3>  
					
                     
				
				<div class="bodyElement">
					





	
		
		<div class="searcher sqlQuerySearcher">
			
						
									<fieldset>
							
							
							
							
								<div class="campSearcher">
									    
										<table width="441" border="1">
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cuenta por cobrar #</label></div> </td>
    <td>
	<span class="Estilo4"><?php print $factucre; ?></span></td>
  </tr>
  <tr>
    <td width="145"><div class="label">  
    <label for="COD_DICC" class=""> 
Tipo de Cuenta por cobrar</label></div> </td>
    <td width="234"><span class="Estilo4">
    <?php print $detic;?>
    </span></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Forma de Pago</label></div> </td>
    <td><span class="Estilo4">
    <?php print $defo;?>
    </span></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Valor</label></div></td>
    <td><span class="Estilo4"><?php print number_format($valcre, 2);?>
    </span></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Taza interes</label></div></td>
    <td><span class="Estilo4"><?php print $tazar;?>
    </span></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Plazo meses</label></div></td>
    <td><span class="Estilo4">
      <?php print $plaz;?>
    </span></td>
    </tr>
  
    <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Fecha Inicio Credito</label></div></td>
    <td><span class="Estilo4">
     <?php print $fecplaz;?>
    </span></td>
    </tr>
    <tr>
      <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cuota</label></div></td>
      <td>
        <span class="Estilo4">
        <?php print $coucre;?>        </span> </td>
    </tr>
    <tr>
      <td><div class="label">  
    <label for="COD_DICC" class=""> 
Deuda Total</label></div></td>
      <td> <span class="Estilo4">
        <?php print $deuto;?>        </span> </td>
    </tr>
    <tr>
      <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cancelado</label></div></td>
      <td> <span class="Estilo4">
        <?php print $cancela;?>        </span> </td>
    </tr>
    <tr>
      <td><div class="label">  
    <label for="COD_DICC" class=""> 
Adeuda</label></div></td>
      <td> <span class="Estilo4">
        <?php print $debe;?>        </span> </td>
    </tr>
</table>

										
										
										
									
									    
										
									    
										
									    
										
										
											    
										
									  

										</br>
									
							    </div>
								
								
								
							
					   
						</fieldset>
					
					
				
				 <div class="searcherButtons">
					 
					 
					
						<a href="creactic.php"><img src="grafico/nux.png"  /></a>
					
					
					<a href="informes/factucre12.php?height=460&width=550&id=<?php echo $codicre;?>"><img src="grafico/impd.png"  /></a>
					
						
				</div>	
			


		</div>
	

				</div>
			</div>
		</div>
	</div></td>
  </tr>
</table>
</div>





<div id="Layer3">
	


		<div class="sqlQueryContent">
		
					<h3 align="center">Tabla de Amortización de Cuentas por cobrar </h3>  
					
                     
				
			





	
		
		
			
						
							<table border="1"  style="background-color: #FFFFFF; width: 100%;  max-width: 100%;  margin-bottom: 20px; padding: 1px; line-height: 1.4; font-size:12px" id="tabla">
		<thead>
			<tr>
			  <td bgcolor="#FFFFCC"><div align="center"><strong>Periodo</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Fecha de Pago</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Saldo Deuda</strong></div></td>
				
				
				<td bgcolor="#FFFFCC"><div align="center"><strong>capiatl</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>interes</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>cuota</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Saldo final</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Estado</strong></div></td>
			</tr>
		</thead>
		
	<tbody>
		
		<?php
	
	$i=0;
	$i1=0;
while($rowcre = $resucre->fetch_array() )
{

	$i=$i+1;
	$numes=$rowcre['perio'];
	
	$fecpago=$rowcre['fecpa'];
	$saldar=$rowcre['sald'];
	$capit=$rowcre['capi'];

	$intecre=$rowcre['inte'];
	$cucre=$rowcre['cuo'];
	$deusal=$rowcre['salf'];
	$estacre=$rowcre['esta'];
	
	$i1=$i1+$cucre;
	
	
		
	
	
	
	?>
	
	<tr>
	
	<td style="text-align:right"><?php echo $numes;?> </td>
	<td style="text-align:right"><?php echo $fecpago;?> </td>
	
	<td style="text-align:right"><?php echo number_format($saldar, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($capit, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($intecre, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($cucre, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($deusal, 2);?> </td>
	
		
	<td style="text-align: center">
	 <?php
			 if ($estacre==1)
			 {
			 ?>
			 Cancelado
			 <?php
			 }
			 else
			 {
			 ?>
			Adeuda
			 
			 
			 <?php 
			}?> 
	</td>
	
     </tr>
     
	<?php
	
		
	
}
?>
	</tbody>	
		
		
	
	</table>
		

				
		
		
	</div>

</div>







<div id="Layer392">
	


		<div class="sqlQueryContent">
		
					<h3 align="center">Detalle de pagos realizados </h3>  
					
                     
				
			





	
		
			
						
							<table border="1"  style="background-color: #FFFFFF; width: 100%;  max-width: 100%;  margin-bottom: 20px; padding: 1px; line-height: 1.4; font-size:12px" id="taeebla">
		<thead>
			<tr>
			 			
				
				
				 <td bgcolor="#FFFFCC"><div align="center"><strong>Nº</strong></div></td>
				 <td bgcolor="#FFFFCC"><div align="center"><strong>Imprimir </strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Cuota#</strong></div></td>
			<td bgcolor="#FFFFCC"><div align="center"><strong>Fecha de Pago</strong></div></td>
			<td bgcolor="#FFFFCC"><div align="center"><strong>Recibo#</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Valor</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>%Interes</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Interes</strong></div></td>
				
				<td bgcolor="#FFFFCC"><div align="center"><strong>Tot. Pag </strong></div></td>
				
				
				
			</tr>
		</thead>
		
	<tbody>
		
		<?php
	
	$i=0;
	$subto=0;
	$todesc=0;
	$toco=0;
while($row = $result511a->fetch_array() )
{

	$i=$i+1;
	
					

				$copro =$row['perio'];
				$pagado=$row['cuo'];
				
				$recib=$row['recipa'];
				$fepagado=$row['fepago'];
	
			
				
				
				$pagado1=$row['porinte'];
				
				$pagado4=$row['tointe'];
				
				$pagado5=$row['tocobra'];
				
				$subto=$subto+$pagado;	
				$todesc=$todesc+$pagado4;	
				$toco=$toco+$pagado5;			
	
	
		
	
	
	?>
	
	<tr>
	
	<td style="text-align:right"><?php echo $i;?> </td>
	  <td style="text-align:center;">
    <a href="informes/factucre1.php?id=<?php echo $row['reci'];?>&id1=<?php echo $codicre;?>"><img src="images/print.png" title="Modificar" alt="Editar" /></a>
	
	
	
	 </td>
	<td style="text-align:left"> <div align="right"><?php echo $copro;?></div></td>
	<td style="text-align:left"> <div align="right"><?php echo $fepagado;?></div></td>
	<td style="text-align:left"> <div align="right"><?php echo $recib;?></div></td>
	
	<td style="text-align:right"><?php echo number_format($pagado, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($pagado1, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($pagado4, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($pagado5, 2);?> </td>
	  
     </tr>
     
	<?php
	
		
	
}
?>
	</tbody>	
		
		
		<tfoot>
					<tr>
						<th colspan="7" rowspan="3" style="background-color:  #D6D6D6#D6D6D6">&nbsp;</th>
						
						<th bgcolor="#FFFFCC"><div align="right"><strong>Total Cuotas </strong></div></th>
						<th  ><div align="right">
						  <input  name="contapago" style="border:hidden; text-align:right; " readonly="true"  type="text" id="contapago"    value="<?php print number_format($subto, 2); ?>" size="10" maxlength="7">
					    </div></th>
					</tr>
					
					<tr>
						<th bgcolor="#FFFFCC"><div align="right"><strong>Total Intereses</strong></div></th>
						<th  ><div align="right">
						  <input  name="todesc" style="border:hidden; text-align:right;" readonly="true"  type="text" id="todesc"    value="<?php print number_format($todesc, 2); ?>" size="10" maxlength="7">
					    </div></th>
					</tr>
					

					
					<tr>
						<th bgcolor="#FFFFCC"><div align="right"><strong>Total Cobrado</strong></div></th>
						<th  ><div align="right">
						  <input  name="toco" style="border:hidden; text-align:right;" readonly="true"  type="text" id="toco"    value="<?php print number_format($toco, 2); ?>" size="10" maxlength="7">
					    </div></th>
					</tr>
		  </tfoot>
	</table>
		

				
		
		
	</div>

</div>


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
