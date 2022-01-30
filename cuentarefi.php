<?php require_once "iniciasesion.php";
require_once 'abrebase.php';
$idven=$_SESSION['idusuario'];
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
$codicre=$_GET["id"]; 

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
	
	
		
	
	
				
		
		
		respuesta = confirm( "Esta seguro que desea registrar el refinanciamineto de este credito" );
				
					if (respuesta)
	 				{
						document.miforma.action = 'refiven.php';
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
	top:8px;
	width:213px;
	height:162px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:10px;
	top:252px;
	width:213px;
	height:162px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	left:525px;
	top:32px;
	height:530px;
	border: solid;
    max-height:530px;
	background:#FFFFFF;
	overflow: auto;
	z-index:3;
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
			
						
									<fieldset>
							
								<legend>IDENTIFICACION   <input name="cocla" type="text" class="success" id="cocla" value="<?php print $cocli; ?>" maxlength="13" readonly="true" />
							<input name="hoin" type="text" id="hoin"  size="6" readonly="true" />	</legend>
							
							
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
    <td><span class="Estilo3"><?php print $telefono1; ?><input name="uni" type="hidden" class="field2" id="uni" value="<?php print $idven; ?>"></span></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Mail</label></div></td>
    <td><span class="Estilo3"><?php print $correo1; ?>
      <input name="cocre" type="hidden" class="field2" id="cocre" value="<?php print $codicre; ?>" />
    </span></td>
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
								
								
								
							
					   
						</fieldset>
					
					
				
				
			


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
    <td width="145"><div class="label">  
    <label for="COD_DICC" class=""> 
Tipo de Cuenta por cobrar</label></div> </td>
    <td width="234"><span class="Estilo3">
      <select id="ticue" class="success" name="ticue"  style="width:240px; background:#E6EFC2">
                              <option value="1">cuentas por cobrar a corto plazo</option>
                              <option value="2">cuentas por cobrar a largo plazo</option>
                            </select></span></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Forma de Pago</label></div> </td>
    <td><span class="Estilo3"><select id="forpa" class="success" name="forpa"  style="width:150px; background:#E6EFC2">
                              <option value="1">letras de cambio</option>
                              <option value="2">títulos de crédito</option>
							  <option value="3">pagarés</option>
                           
                            </select></span></td>
    </tr>
  <tr>
    <td><div class="label">
        <label for="COD_DICC" class=""> Credito a refinanciar</label>
    </div></td>
    <td><span class="Estilo3">
      <?php print $factucre; ?>
      <input name="facre" type="hidden" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="facre" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onfocus="this.style.background=('#FFFF66')" onblur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " value="<?php print $factucre;?>" />
    </span></td>
  </tr>
  
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Valor a Refinanciar</label></div></td>
    <td><span class="Estilo3"><input name="cre18" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="cre18" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " value="<?php print $debe;?>" size="10" />
    </span></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Taza interes</label></div></td>
    <td><span class="Estilo3"><input name="taz" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="taz" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " size="10" /></span></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Plazo meses</label></div></td>
    <td><span class="Estilo3"><select  name="mes" id="mes" style="font-size: 14px padding: 5px; width: 60px; height:25px; ">
          <option value="0"></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
         <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
          <option value="32">32</option>
          <option value="33">33</option>
          <option value="34">34</option>
          <option value="35">35</option>
          <option value="36">36</option>		  
        </select></span></td>
    </tr>
  
    <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Fecha Inicio Credito</label></div></td>
    <td><span class="Estilo3"><input name="fec" type="text" id="fec" style=" background:url(images/cal.gif) no-repeat scroll right center rgb(255, 255, 255); padding-right: 20px; position: relative;" onClick="displayCalendar(document.forms[0].fec,'dd/mm/yyyy',this)"  onkeyup = "this.value=formateafecha(this.value);" value="<?php print $feca;?>" size="10" maxlength="10" readonly="true"/></span></td>
    </tr>
    <tr>
      <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cuota</label></div></td>
      <td><input  name="copa"  type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="copa" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right;font-size:18px" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  size="10" readonly="true">	     </td>
    </tr>
</table>

										
										
										
									
									    
										
									    
										
									    
										
										
											    
										
									  

										</br>
									
							    </div>
								
								
								
							
					   
						</fieldset>
					
					
				
				 <div class="searcherButtons">
					 
					 
					
					  
					<button class="textButton" type="submit" name="buscar">Guardar Cuenta</button>
					<button class="textButton" type="button" onclick="suma();" name="hava">Generar Cuenta</button>
					<a href="refinanciar.php"> <button class="textButton" type="button"  name="hggava">Cancelar</button> </a>
					
					
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
	

<table width="600"  align="center"   border="1">
  <tr>
    <td>
		<div class="sqlQueryContent">
		
					<h3 align="center">Tabla de Amortización de Cuentas por cobrar </h3>  
					
                     
				
			





	
		
		<div class="searcher sqlQuerySearcher">
			
						
								<table id="examplea" name="examplea"  class="table table-bordered">
						<thead style="height:45"  class="cartHeader" display="off">
							
							<tr>
							 
								
								<th>Periodo</th>
								<th>Fecha de Pago</th>
							<th>Saldo Deuda</th>
								<th>capiatl</th>
								
								<th>interes</th>
								<th>cuota</th>
								<th>Saldo final</th>
								
								
								
								
							</tr>
						</thead>
						<tbody>
						</tbody>
					
					</table>
		

				
		
		</div>
	</div></td>
  </tr>
</table>



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
