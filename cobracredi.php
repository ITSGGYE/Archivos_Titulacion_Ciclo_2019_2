<?php require_once "iniciasesion.php";
require_once 'abrebase.php';

$vendedo=$_SESSION['fullnombre1']." ".$_SESSION['fullnombre'];
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

$fecha7=date("d/m/Y");
$idpro = "";
$esta=1;
$opas=1;
		$codi="";
$codicre=$_GET["mensaje"]; 
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
		
		
		
	
	
	//sacamos datso del credito
	
	
	
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
							$idpro = $row1[8];
								
				}
				$result22->close();


				
				
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
				
				
				
			

$consulta= $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codicre."' ");
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

function suma3(i)
{
var uno=0;
var dos=0;
var tres=0;
var cuatro=0;
var total33=0;



var codiestu1=document.getElementById("cata"+i);
codiestu=codiestu1.value;

if (codiestu == "")
//document.car.dias.value =0;
dos=0;
else
dos=codiestu;


			

var codiestu1=document.getElementById("pord"+i);
codiestu=codiestu1.value;

if (codiestu == "")
//document.car.dias.value =0;
tres=0;
else
tres=codiestu;

nsumar1=parseFloat(dos);


////calculamos descuento si es que lo hay
nsumar2=(nsumar1*parseFloat(tres))/100;

nsumar11=nsumar1+nsumar2;

document.getElementById("tdes"+i).value=nsumar2.toFixed(2); //total  descuento



///calculamos iva
nsumar3=(nsumar11*cuatro)/100;
nsumar4=nsumar11+nsumar3;


document.getElementById("sudeiv"+i).value=nsumar4.toFixed(2);




}


 
 
</script>	


	<script type="text/javascript">

		
		function validar(){
		
		var decripcion11a = document.getElementById("contafi1");
		
			 if (trim(decripcion11a.value) == 0) {
         alert('no hay cuentas a cobrar en este registro');
		 		 return false;
    		}
	
		
	
				
		
		
		respuesta = confirm( "Esta seguro que desea registrar el cobro del credito en pantalla" );
				
					if (respuesta)
	 				{
						document.miforma.action = 'grabacre.php';
						
					} 
					else 
					{
	
						return false;
						
					}

		
		}

</script>
	<script type="text/javascript">
	var cont=0;
	var contafilas=0;
	function agregar(i){
	
	
	var decripcion11a = document.getElementById("codip"+i);
		 if (trim(decripcion11a.value) == "") {
         alert('no ha seleccionado ningun producto');
		 
		 return false;
   		 }
		 
		
		 var verifi=0;
		 
		codipro=document.getElementById("copro"+i).value;
		
		
		
		/////
			$('#tabla tbody tr').each(function(){
			
			var copa=$(this).find('td').eq(1).text();
			
					
			 if (trim(copa) == trim(codipro))
			 {
        		
				 verifi=1;
   		 	}
			
		
		});
		
		///// 
		
	
		 if (verifi == 1) {
         alert('este periodo ya esta ingresado');
		 
		 return false;
   		 }	
		
	
	
	
		
	
	
	esto=document.getElementById("cata"+i).value;
	cont1as=parseFloat(esto) ;	
	
			
	
	
	
		
			codip=document.getElementById("codip"+i).value;
			
				
				pord=document.getElementById("pord"+i).value;
	
	
	var decripcion11a = document.getElementById("pord"+i).value;
		
			 if (trim(decripcion11a) == "") {
         pord=0;
		 pord2="";
    }
	pord1=parseFloat(pord);
			pord2=pord1.toFixed(2);	 
	
	
	tdes=document.getElementById("tdes"+i).value;
		var ecripcion11a = document.getElementById("tdes"+i).value;
		
			 if (trim(ecripcion11a) == "") {
         tdes=0;
		
    }
	
	
			
				tdes1=parseFloat(tdes);
			tdes2=tdes1.toFixed(2);	
		
			
			
			sudeiv=document.getElementById("sudeiv"+i).value;
			
			

	
		
		
	
		
			
		
			sudeiv1=parseFloat(sudeiv);
			sudeiv2=sudeiv1.toFixed(2);		
	  
		  contafilas= contafilas + 1;
		cont++;
			
				
				
		
		
			var nuevaFila='<tr class="selected" id="fila'+cont+'" ><td style="text-align:right">'+cont+'</td><td style="text-align:right">'+codipro+' <input type="hidden" name="codpro'+cont+'" value="'+codipro+'" id="codpro'+cont+'"> <input type="hidden" name="codipa'+cont+'" value="'+codip+'" id="codipa'+cont+'"> </td><td>'+cont1as+'</td><td style="text-align:right">'+pord2+' <input type="hidden" name="pord'+cont+'" value="'+pord2+'" id="pord'+cont+'"></td><td style="text-align:right">'+tdes2+' <input type="hidden" name="tdes'+cont+'" value="'+tdes2+'" id="tdes'+cont+'"></td><td style="text-align:right">'+sudeiv2+' <input type="hidden" name="sudeiv'+cont+'" value="'+sudeiv2+'" id="sudeiv'+cont+'"></td><td style="text-align:center"><img src="eliminar.png" class="del" width="16" height="16"></td></tr>';
			
			$("#tabla tbody").append(nuevaFila);
			document.getElementById("contafi").value = cont;
			reordenar();
			
			
	}
	
	</script>
	<script type="text/javascript">
	
	$(document).ready(function(){
	
			// evento para eliminar la fila
		$("#tabla").on("click", ".del", function(){
			$(this).parents("tr").remove();
			reordenar();
		});
	});
	
	
	function reordenar(){
		var num=1;
		
				var numa=0;
		var numa1=0;
		
		var topagar=0;
		var ivapagar=0;
		var dessub=0;
		var todesc=0;


	

		
		$('#tabla tbody tr').each(function(){
			$(this).find('td').eq(0).text(num);
				
			
			
			/////
					var asca=$(this).find('td').eq(2).text();  //cuota
			var asca1=$(this).find('td').eq(4).text();  ///interes
			var tode=$(this).find('td').eq(5).text();  //topa
			
			
			///
			
			
			
			
			
			
							
			
	/////
				cont1=parseFloat(asca) ;
				cont11=parseFloat(asca1) ;
				
				tode1=parseFloat(tode) ;
					
	///			
				
				
				todesc=todesc + cont1;
				dessub=dessub + cont11;
				
				topagar=topagar + tode1;
				numa=numa + 1;
					
			
			num++;
		});
		
		
					todas=parseFloat(todesc);
					todes2=todas.toFixed(2);	

			desub=parseFloat(dessub);
			desub2=desub.toFixed(2);						
		
		
			
			
			
			toco=parseFloat(topagar);  //total a pagar
			toco2=toco.toFixed(2);  //total a pagar
			
			
			
		
		
		
	document.getElementById("contafi1").value = numa; //cantidad de productos
		document.getElementById("todesc").value = todes2; //tota des
		document.getElementById("subdesc").value = desub2; //tota sub-des
		
		document.getElementById("toco").value = toco2;  //total a pagar
	
	
	
			 
		
		
		

	
	}
	</script>
	
    <style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:10px;
	top:5px;
	width:213px;
	height:162px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:10px;
	top:155px;
	width:213px;
	height:162px;
	z-index:2;
}

#Layer220 {
	position:absolute;
	left:10px;
	top:335px;
	width:213px;
	height:22px;
	z-index:220;
}

#Layer3 {
	position:absolute;
	left:525px;
	top:5px;
	height:255px;
	border: solid;
    max-height:255px;
	background:#FFFFFF;
	overflow: auto;
	width:605px;
	z-index:3;
}
	
#Layer325 {
	position:absolute;
	left:525px;
	top:300px;
	height:255px;
	border: solid;
    max-height:255px;
	background:#FFFFFF;
	overflow: auto;
	width:605px;
	z-index:325;
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
    <td>
		<div class="sqlQueryContent">
		
				
					<h3 align="center">Datos del Cliente </h3>  
					
                     
			




	
		
		<div class="searcher sqlQuerySearcher">
			
						
								
							
							
								<div class="campSearcher">
									    
										<table width="441" border="1">
  <tr>
    <td width="137"><div class="label">  
    <label for="COD_DICC" class=""> 
Codigo cliente</label></div></td>
    <td width="104"> 
	<span class="Estilo3"><?php print $cocli; ?></span>
	
	<input name="cocla" type="hidden" class="success" id="cocla" value="<?php print $cocli; ?>" /></td>
    <td width="88"><div class="label">  
    <label for="COD_DICC" class=""> 
Cedula /Ruc</label></div> </td>
    <td width="84"><span class="Estilo3"><?php print $ruc; ?>
      <input name="op" type="hidden" id="op" value="2" /></td>
  </tr>
  
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cliente</label></div> </td>
    <td colspan="3"><span class="Estilo3"><?php print $nombre1; ?></span><input name="codi" type="hidden" class="field2" id="codi" value="<?php print $codi; ?>" />
		</td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Dirección</label></div></td>
    <td colspan="3"><span class="Estilo3"><?php print $direccion1; ?></span><input name="opes" type="hidden" id="opes" value="<?php print $opas;?>"></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Telefono</label></div></td>
    <td colspan="3"><span class="Estilo3"><?php print $telefono1; ?></span></td>
    </tr>
   
  
    <tr>
      <td colspan="4">
							
							
							<input name="curso" type="hidden" id="curso" >
							
							
							
							<input name="cedula2" type="hidden" class="field2" id="cedula2" value="" />							</td>
      </tr>
</table>

										
										
										
									
									    
										
									    
										
									    
										
										
											    
										
									  

										</br>
									
							    </div>
								
								
								
							
					   
						</fieldset>
					
					
				
				
			


		</div>
	

				</div>
			</td>
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
    <td colspan="3">
	<span class="Estilo4"><?php print $factucre; ?></span></td>
  </tr>
  <tr>
    <td width="145"><div class="label">  
    <label for="COD_DICC" class=""> 
Tipo de Cuenta por cobrar</label></div> </td>
    <td colspan="3"><span class="Estilo4">
    <?php print $detic;?>
    </span></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Forma de Pago</label></div> </td>
    <td colspan="3"><span class="Estilo4">
    <?php print $defo;?>
    </span><input name="cocreto" type="hidden" class="field2" id="cocreto" value="<?php print $codicre; ?>"><input name="uni" type="hidden" class="field2" id="uni" value="<?php print $idven; ?>"></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Valor</label></div></td>
    <td colspan="3"><span class="Estilo4"><?php print number_format($valcre, 2);?>
    </span></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Taza interes</label></div></td>
    <td width="105"><span class="Estilo4"><?php print $tazar;?>
    </span></td>
    <td width="86"><div class="label">  
    <label for="COD_DICC" class=""> 
Plazo meses</label></div></td>
    <td width="77"><span class="Estilo4">
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
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cuota</label></div></td>
    <td> <span class="Estilo4">
        <?php print $coucre;?>        </span> </td>
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


<div id="Layer220">
	

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
Fecha Cobro</label></div></td>
    <td width="153"><input name="fec2" type="text" id="fec2"  style=" background: url(images/cal.gif) no-repeat scroll right center rgb(255, 255, 255); padding-right: 20px; position: relative;" onClick="displayCalendar(document.forms[0].fec2,'dd/mm/yyyy',this)"  onkeyup = "this.value=formateafecha(this.value);" value="<?php print $fecha7; ?>" size="8" maxlength="10" readonly="true" required="true"/></td>
    <td width="77"><div class="label">  
    <label for="COD_DICC" class=""> 
Hora cobro</label></div></td>
    <td width="38"><input name="hoin" type="text" id="hoin"  size="6" readonly="true" /></td>
  </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cuota</label></div> </td>
    <td colspan="3">
	<span class="Estilo4"><input  name="todesc"  type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="todesc" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right; font-size:18px" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  size="10" readonly="true"></span>
	
	<input  name="contafi"  type="hidden" id="contafi" value="">	<input  name="contafi1"  type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="contafi1" style="BACKGROUND:#FFFFFF; color:#0000FF;" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  readonly="true" maxlength="7"   value="" size="3"></td>
  </tr>
  <tr>
    <td width="145"><div class="label">  
    <label for="COD_DICC" class=""> 
Interes</label></div> </td>
    <td colspan="3"><span class="Estilo4">
   <input  name="subdesc"  type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="subdesc" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right; font-size:18px" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  size="10" readonly="true">
    </span></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Total Cobro</label></div> </td>
    <td colspan="3"><span class="Estilo4">
     <input  name="toco"  type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="toco" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right;font-size:18px" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  size="10" readonly="true">
    </span></td>
    </tr>
</table>

										
										
										
									
									    
										
									    
										
									    
										
										
											    
										
									  

										
									
							    </div>
								
								
								
							
					   
						</fieldset>
					
					
				
				 <div class="searcherButtons">
					 
					 
					<button class="textButton" type="submit" name="buscar">Guardar Cuenta</button>
						<a href="creacuenta.php?height=460&width=550&id=<?php echo $codicre;?>"><img src="grafico/nux.png"  /></a>
					
					
					<a href="informes/factucre.php?height=460&width=550&id=<?php echo $codicre;?>"><img src="grafico/impd.png"  /></a>
					
					
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
					
                     
				
			





	
		
		
			
						
							<table border="1"  style="background-color: #FFFFFF; width: 100%;  max-width: 100%;  margin-bottom: 20px; padding: 1px; line-height: 1.4; font-size:12px" id="tablay">
		<thead>
			<tr>
			  <td bgcolor="#FFFFCC"><div align="center"><strong>Periodo</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Fecha de Pago</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>cuota</strong></div></td>
				
				
				<td bgcolor="#FFFFCC"><div align="center"><strong>%Interes</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Interes</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>A pagar</strong></div></td>
				<td bgcolor="#FFFFCC"><div align="center"><strong>Opcion</strong></div></td>
				
				
				
					
				
				
			</tr>
		</thead>
		
	<tbody>
		
		<?php
	
	$i=0;
	$i1=0;
while($rowcre = $consulta->fetch_array() )
{

	$i=$i+1;
				$numes=$rowcre['perio'];
	
				$fecpago=$rowcre['fecpa'];
				
				$cucre=$rowcre['cuo'];
				
				$estacre=$rowcre['esta'];
				
				
				$poin=$rowcre['porinte'];
				
				$toint=$rowcre['tointe'];
				
				$tocob=$rowcre['tocobra'];
	
	$i1=$i1+$cucre;
	
	
		
	
	
	
	?>
	
	<tr>
	
	<td style="text-align:right"><?php echo $rowcre['perio'];?>
	   <input  name="copro<?php echo $i ?>"  type="hidden"  id="copro<?php echo $i ?>" value="<?php echo $rowcre['perio'];?>"  size="5"  maxlength="140" readonly="true">
	    <input  name="nume<?php echo $i ?>"  type="hidden"  id="nume<?php echo $i ?>" value="<?php echo $rowcre['id1'];?>"  size="5"  maxlength="140" readonly="true"> </td>
		
	<td style="text-align:right"><?php echo $rowcre['fecpa'];?>
		<input  name="nopro<?php echo $i ?>"  type="hidden"  id="nopro<?php echo $i ?>"  size="20" value="<?php echo $rowcre['fecpa'];?>" maxlength="120" readonly="true"> </td>
	
	

	
	<td style="text-align:right"><?php echo $cucre;?>
   <input  name="cata<?php echo $i ?>"  type="hidden"  id="cata<?php echo $i ?>"  size="20" value="<?php echo $cucre;?>" maxlength="120" readonly="true"> </td>
	<td style="text-align:right">			 <?php
			 if ($estacre==1)
			 {
			 ?>
			<?php echo $poin ?>
			 <?php
			 }
			 else
			 {
			 ?>
			<input name="pord<?php echo $i ?>" type="text" id="pord<?php echo $i ?>" style="background-color:#FFFFFF; background-size:25px 23px; background-repeat:no-repeat; background-position:right; border-radius: 5px; border-style:solid; border-color:#1E90FF; border-width:1px; height:20px;  color:#808080; text-align:right" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); suma3(<?php echo $i ?>)"  size="3" />
			 
			 
			 <?php 
			}?>  </td>
			
	<td style="text-align:right">		 <?php
			 if ($estacre==1)
			 {
			 ?>
			<?php echo $toint ?>
			 <?php
			 }
			 else
			 {
			 ?>
		<input name="tdes<?php echo $i ?>" type="text" style="background-color:#FFFFFF; background-size:25px 23px; background-repeat:no-repeat; background-position:right; border-radius: 5px; border-style:solid; border-color:#1E90FF; border-width:1px; height:20px;  color:#808080; text-align:right" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')" id="tdes<?php echo $i ?>" readonly="true" size="3" maxlength="10">
			 
			 
			 <?php 
			}?>  </td>
	<td style="text-align:right">			 <?php
			 if ($estacre==1)
			 {
			 ?>
			 
			 <input name="sudeiv<?php echo $i ?>" type="text" style="background-color:#FFFFFF; background-size:25px 23px; background-repeat:no-repeat; background-position:right; border-radius: 5px; border-style:solid; border-color:#1E90FF; border-width:1px; height:20px;  color:#808080; text-align:right" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')" id="sudeiv<?php echo $i ?>" readonly="true" size="7" value="<?php echo $tocob ?>" maxlength="10">
			 
			 
		
			 <?php
			 }
			 else
			 {
			 ?>
			<input name="sudeiv<?php echo $i ?>" type="text" style="background-color:#FFFFFF; background-size:25px 23px; background-repeat:no-repeat; background-position:right; border-radius: 5px; border-style:solid; border-color:#1E90FF; border-width:1px; height:20px;  color:#808080; text-align:right" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')" id="sudeiv<?php echo $i ?>" readonly="true" size="7" value="<?php echo $cucre ?>" maxlength="10">
			 
			 
			 <?php 
			}?>  </td>
	<td style="text-align:right">			 <div align="center">
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
	  <img src="images/eli2.png" onclick="agregar(<?php echo $i ?>)" title="Desactivar" alt="Desactivar" /> 
	  <input name="c1<?php echo $i ?>" type="hidden" id="c1<?php echo $i ?>" size="5" value="<?php echo $rowcre['id1'] ?>" />
	  
	  
	  <input name="codip<?php echo $i ?>" type="hidden" id="codip<?php echo $i ?>" size="5" value="<?php echo $rowcre['id1'] ?>" />
	  
	  
	  <?php 
			}?>  
	  </div></td>
     </tr>
     
	<?php
	
		//number_format($saldar, 2, ".", "")
	
}
?>
	</tbody>	
		
		
		<tfoot>
		  </tfoot>
	</table>
		

				
		
		</div>

</div>






<div id="Layer325">
	
		<div class="sqlQueryContent">
		
					<h3 align="center">Tabla de Amortización de Cuentas por cobrar </h3>  
					
                     
				
			





	
		
		
			
						
							<table id="tabla" border="1"  style="background-color: #FFFFFF; width: 100%;  max-width: 100%;  margin-bottom: 20px; padding: 1px; line-height: 1.4; font-size:12px">
			
			<thead style="height:45" >
				
				<tr>
				  <th bgcolor="#FFFF66">N&ordm;</th>
					<th bgcolor="#FFFF66">Periodo</th>
					<th bgcolor="#FFFF66">Cuota</th>
				
					
					<th bgcolor="#FFFF66">%Interes</th>
					<th bgcolor="#FFFF66">TotaInteres</th>
					
					<th bgcolor="#FFFF66">Tot.Pag</th>
					<th bgcolor="#FFFF66">Accion</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
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
