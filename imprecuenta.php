<?php require_once "permitir.php"; 
require_once 'conexta.php';
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



$numero = 9540.2;
number_format($numero, 2, ".", "");
//devuelve 9540,20




$numero = 1002002.365;
number_format($numero, 2, ",", ".");
//devuelve 1.002.002,37



		$codi="";
$codi=$_GET["mensaje"]; 
$codi4=$_GET["mensaje1"]; 


//sacamos datos de compras
$idprove = ""; //
 
 $prove =""; //
 $ruc = ""; //
 $conta = ""; //

 $fecha ="";
 $factu ="";
 $subto = "";

 $todesc = "";
 $subdesc =""; 
 $iva = "";
 $toco = "";
 $total = "";
 
 		$telefono1 = "";
		$direccion1 = "";
 
 $hora =""; //
 $ruc = ""; //
 $conta = ""; //
 
  $idv = ""; 
   $fpa = ""; 
		
 
 	$result22 = $mysqli->query("select idprove,nombres,cedula,direcion,telefono,fecha,factu,subto,iva,topa,hora,descue,subdesc,topro,idve,fpago from datosventa where idcompra = '$codi'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				
		
			
				$idprove = $row1[0];

				$conta=$row1[1];
				$ruc = $row1[2];
				$direccion1 =  $row1[3];
				$telefono1 = $row1[4];
			$fecha =$row1[5];
				$factu = $row1[6];
				$subto =$row1[7];
				$iva = $row1[8];
				$toco=$row1[9];
				$hora=$row1[10];

				 $todesc = $row1[11];
				 $subdesc =$row1[12];
				
				
				
				$total = $row1[13];
				$idv = $row1[14];
				$fpa = $row1[15];

}
$result22->close();


 
 //sacamos datos de proveedor
 	$result22 = $mysqli->query("select cli_cedula,cli_nomape,cli_telefono,	cli_direcion from m_clientes where cli_id = '$idprove'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				
				$ruc = $row1[0];
				$conta = $row1[1];
				$telefono1 =  $row1[2];
				$direccion1 = $row1[3];
					
}
$result22->close();

//sacamos datos de vendedor
	$nombrena =  "";
				$apellidona = "";
				
			$nombrena1 =  "";	
				
				


 	$result22 = $mysqli->query("select nombres,apellidos from usuario where id = '$idv'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				
			$nombrena =  $row1[0];
				$apellidona = $row1[1];
				
				
				
				$nombrena1 =trim($apellidona)." ".trim($nombrena);
					
}
$result22->close();

 
 

$esta=1;



$result511a= $mysqli->query("SELECT * FROM ventas WHERE compra = '".$codi."' ");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://www.siith.gob.ec/cambiarClave.jsf -->
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link type="text/css" rel="stylesheet"  href="forma/theme1.css">



        <link href="forma/cssLayout2.css" rel="stylesheet" type="text/css">
        <link href="forma/primeFaces.css" rel="stylesheet" type="text/css">
		
		 

    
  

    

		
		
		 <link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118" > </script>

	


   
        <title>Datos de Venta <?php echo $factu;?></title>
		
		<link rel="stylesheet" type="text/css" href="estilos.css">
		
		<script src="ajax.js"></script>
		<script type="text/javascript" src="funciones1.js"></script>
		
		
			
			 <link href="cssa/miestilo1.css"  rel="stylesheet" type="text/css">
			
			<script src="js/jquery-2.1.1.min.js"></script>
	
	
	<link rel="stylesheet" type="text/css" href="cssss/cuadros.css">
		
<style>
	#content{
		position: absolute;
		min-height: 50%;
		width: 80%;
		top: 20%;
		left: 5%;
	}

	.selected{
		cursor: pointer;
	}
	.selected:hover{
	
	}
	.seleccionada{
		background-color: #0585C0;
		
	}
	
.Estilo1 {color: #0000FF}
#Layer1 {
	position:absolute;
	left:120px;
	top:30px;
	width:173px;
	height:13px;
	z-index:1;
}
</style>



	




	
		
		<script>
function sf(ID){
document.getElementById(ID).focus();
}
</script> 
<script src="jas/jquery-2.2.3.min.js"></script>

		
		<script type="text/javascript">
		
		
		

		
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
	
	
	


	

		
	
		
		</head>
		
		<body>
	
	 
	
	    
	    <form method="post" id="formName" name="formName" action="" onSubmit="return validar();" >
	
	<fieldset><legend>Resultado De Productos Registrados <img onclick="window.close();"  src="images/close.png" border="0" align="right" /> </legend>


				
<table width="100%" background="grafi/loginhover.gif" class="recua401h" >
  <tbody>
  
  
  
  <tr>
  
  
 
  
  <td width="34%"><label>Cliente</label>  
  <input name="bus" type="text" id="bus"  style="background-color:#FFFFFF; background-size:25px 23px; background-repeat:no-repeat; background-position:right; border-radius: 5px; border-style:solid; border-color:#1E90FF; border-width:1px; height:20px; width:240px; color:#808080;"  onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')" value="<?php print $conta; ?>"  readonly="true"  />
		 
  
  
   </td>




  <td width="13%"><label>Ruc/Cedula</label> <input  name="ruc"  type="text" id="ruc" style="background-color:#FFFFFF; background-size:25px 23px; background-repeat:no-repeat; background-position:right; border-radius: 5px; border-style:solid; border-color:#1E90FF; border-width:1px; height:20px;  color:#808080;"  onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')" value="<?php print $ruc; ?>" size="10"  maxlength="20" readonly="true">  </td>
  <td width="34%">
  
  <label>Telefono</label> 
  <input  name="conta"  type="text" style="background-color:#FFFFFF; background-size:25px 23px; background-repeat:no-repeat; background-position:right; border-radius: 5px; border-style:solid; border-color:#1E90FF; border-width:1px; height:20px;  color:#808080;" id="conta"  onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  maxlength="20" readonly="true"   value="<?php print $telefono1; ?>" size="20">
  <input name="codi" type="hidden" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="codi" value="<?php print $idprove; ?>">
  
  
	  
	  
	  
	      <input name="codicompra" type="hidden" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="codicompra" value="<?php print $codi; ?>" />

   </td>
  <td width="19%"> <label>Direccion</label> 
  <input  name="ser"  type="text" style="background-color:#FFFFFF; background-size:25px 23px; background-repeat:no-repeat; background-position:right; border-radius: 5px; border-style:solid; border-color:#1E90FF; border-width:1px; height:20px;  color:#808080;" id="ser"  onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  maxlength="20" readonly="true"   value="<?php print $direccion1; ?>" size="0"></td>
  </tr>

<tr>
<td></td>


<td>	  </td>
<td></td>
<td></td>
</tr>
  </tbody></table>
	 
</fieldset>	



	<fieldset><legend>Detalle de productos de la venta </legend>

	 <table width="100%" border="0">
  <tr>
    <td> Factura u Orden <input name="factu" type="text" class="field2" id="factu" value="<?php print $factu; ?>"    size="8" readonly="true" maxlength="30"></td>
    <td>Fecha de Venta <input name="fec2" type="text" id="fec2"   value="<?php print $fecha; ?>" size="10" maxlength="10" readonly="true"/></td>
    <td>Vendedor <input name="fec2s" type="text" id="fec2s"   value="<?php print $nombrena1; ?>" size="25" maxlength="10" readonly="true"/></td>
    <td>Forma de pao <input name="sad" type="text" id="sad"   value="<?php print $fpa; ?>" size="15" maxlength="10" readonly="true"/></td>
    <td>Hora Venta <input name="hoin" type="text" id="hoin"  value="<?php print $hora; ?>" size="7" readonly="true" /></td>
    <td><a href="informes/factu.php?height=460&width=550&id=<?php echo $codi;?>"><img src="grafico/imp1.png" width="59" height="22" border="0" /></a>	</td>
    <td></td>
    <td> </td>
  </tr>
</table>


		
		 
	
		<div class="htab">
  
    
<div>
	
		
		
	
	
	
	
	
	
	
	    
</fieldset>



<?php 
	

if ($codi4 > 0 )
{

//sacamos datos de credito
	$valcre = ""; 
 
 	$tazar =""; 
	 $plaz = ""; 
 	$fecplaz = ""; 
 	$coucre ="";
 	$factucre ="";
	
 
 

 
					$result22 = $mysqli->query("select valcre,taza,pla,fecha,cuota,factu from datoscredito where idcred = '$codi4'  ");
				
				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
								
						
							
								$valcre = $row1[0];
				
								$tazar=$row1[1];
								 $plaz = $row1[2];
								$fecplaz =  $row1[3];
								$coucre = $row1[4];
							$factucre =$row1[5];
								
				}
				$result22->close();



$resucre= $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codi4."' ");


?>
	
		


<fieldset><legend>Detalle de credito de la venta </legend>

	 <table width="100%" border="0">
  <tr>
    <td> Credito# <input name="ncre" type="text" class="field2" id="ncre" value="<?php print $factucre; ?>"    size="8" readonly="true" maxlength="30"></td>
    <td>Valor <input name="vcre" type="text" class="field2" id="vcre" value="<?php print $valcre; ?>"    size="8" readonly="true" maxlength="30"></td>
    <td>Taza <input name="tasa" type="text" id="tasa"   value="<?php print $tazar; ?>" size="10" maxlength="10" readonly="true"/></td>
    <td>Plazo <input name="plas" type="text" id="plas"   value="<?php print $plaz; ?>" size="25" maxlength="10" readonly="true"/></td>
    <td>FecCredito <input name="fcre" type="text" id="fcre"   value="<?php print $fecplaz; ?>" size="15" maxlength="10" readonly="true"/></td>
    <td>Cuota <input name="cuc" type="text" id="cuc"  value="<?php print $coucre; ?>" size="7" readonly="true" /></td>
    <td><a href="informes/factucre.php?height=460&width=550&id=<?php echo $codi4;?>"><img src="grafico/imp1.png" width="59" height="22" border="0" /></a>	</td>
    <td><a href="vender.php"><img src="grafico/nue.png" width="59" height="22" border="0" /></a></td>
    <td> </td>
  </tr>
</table>

		
		 
	
	
		
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
			</tr>
		</thead>
		
	<tbody>
		
		<?php
	
	$i=0;
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
	
	
	
	
		
	
	
	
	?>
	
	<tr>
	
	<td style="text-align:right"><?php echo $numes;?> </td>
	<td style="text-align:left"><?php echo $fecpago;?> </td>
	
	<td style="text-align:right"><?php echo number_format($saldar, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($capit, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($intecre, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($cucre, 2);?> </td>
	<td style="text-align:right"><?php echo number_format($deusal, 2);?> </td>
     </tr>
     
	<?php
	
		
	
}
?>
	</tbody>	
		
		
		<tfoot>
		  </tfoot>
	</table>
	
	
	
	
	
	
	
	    
</fieldset>


<?php
	
		
	
}
?>                     



</form>
         

        
</body></html>