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
	var cont=0;
	var contafilas=0;
	function agregar(i){
	
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



			cre = document.getElementById("cre18").value;
			taz = document.miforma.taz.value;
			mes = document.miforma.mes.value;
			fec = document.miforma.fec.value;;


			cata3 = (taz*0.01)/12;
			
			auxi=parseFloat(cata3);
			
			cata=auxi.toFixed(9);	
		document.miforma.b1.value=cata;
			
			pote1=Math.pow((1+parseFloat(cata)),parseInt(mes));
			auxi=parseFloat(pote1);
			pote=auxi.toFixed(8);
			document.miforma.b2.value=pote;
	
				
			
			tapo1 = parseFloat(cata)*parseFloat(pote);
			auxi=parseFloat(tapo1);
			tapo=auxi.toFixed(8);
			document.miforma.b3.value=tapo;
					
			
			capo12 = parseFloat(pote)-1;
			
			auxi=parseFloat(capo12);
			capo1=auxi.toFixed(8);
			document.miforma.b4.value=capo1;
			
			
			
			divi1 = parseFloat(tapo)/parseFloat(capo1);
			auxi=parseFloat(divi1);
			divi=auxi.toFixed(8);
			
			document.miforma.b5.value=divi;	
			
			
		//	cre3 = document.getElementById("cre18").value;
		//	auxi=parseFloat(cre3);
		//	cre=auxi.toFixed(2);
			
			couta1 = parseFloat(cre)*parseFloat(divi);
			auxi=parseFloat(couta1);
			couta=auxi.toFixed(7);
			coutar=auxi.toFixed(2);
			
			document.miforma.b6.value=couta;	
			
			
			

document.getElementById("copa").value = coutar; //cantidad de productos
	
	
	
	
	
	var decripcion11a = 2343;
		
		
		 var verifi=0;
		 
		codipro=24324;
		
		
		
		///
		
		///// 
		
	
		
		
	var decrip = 12;
		 
	
	
		nsuma=12;
	cont1=parseInt(nsuma) ;	
	
	
	
	
	
		
		
		
			nsuma=12;
			cont1=nsuma ;	

			codip=234;
			
			
			desc="rrrrer";
			
			precio1=12;
			precio=23;
			topa=34;
			
			
			
			
				
				pord=12;
	
	
	var decripcion11a = 12;
		
			
         pord=0;
   
			
		
			tdes=12; 
	
	stode=122; 
			
			
			
			toiva=34;
			
			sudeiv=34;
			
			nsumar1=parseFloat(precio1);
			precio2=12;
			
		
		
			nsumare1=parseFloat(topa);
			topa2=12;	
			

			pord1=parseFloat(pord);
			pord2=12;	
		
		
			tdes1=parseFloat(tdes);
			tdes2=12;	
		
			stode1=parseFloat(stode);
			stode2=12;

			
			
			toiva1=parseFloat(toiva);
			toiva2=12;	
		
			sudeiv1=parseFloat(sudeiv);
			sudeiv2=12;		

			
		  
		  contafilas= contafilas + 1;
		cont++;
			
				
		
		
		var todo=Math.pow(7, 2);
		
		var ht = document.getElementById('mes');
		
		
	
eliminarTodasFilas();
			  
		guao=12;
		
		
				i=0;
				i2=0;
				sal = "";
		
		
		for(h=1;h<=ht.value;h++)
			
		{
			// alert(todo);
			i=i+1;
			i2=i2+1;	
			cre3 = "";
			inte = "";
			capi = "";	



			if(i==1 )
			{
				cre3 = cre;
				
				inte = parseFloat(cre3) * parseFloat(cata);
				capi = parseFloat(couta) - parseFloat(inte);
				sal = parseFloat(cre3) - parseFloat(capi);
				

			
			}
			else
			{
				cre3 = sal;
				
				inte = parseFloat(cre3) * parseFloat(cata);
				capi = parseFloat(couta) - parseFloat(inte);
				sal = parseFloat(cre3) - parseFloat(capi);
			
			
			}				
			auxi=parseFloat(cre3);
			cr=auxi.toFixed(2);
			auxi=parseFloat(capi);
			ca=auxi.toFixed(2);
			
			auxi=parseFloat(inte);
			inta=auxi.toFixed(2);

			auxi=parseFloat(couta);
			cu=auxi.toFixed(2);		

			auxi=parseFloat(sal);
			sa=auxi.toFixed(2);				



		
	
			var nuevaFila='<tr class="selected" id="fila'+cont+'" ><td style="text-align:right;width:20px;">'+cont+'</td><td style="text-align:right;width:90px;font-size:10px">'+fec+' <input type="text" name="idpa[]" value="'+todo+'" id="idpa'+cont+'">   <input type="hidden" name="idp[]" id="idp'+cont+'"> </td><td style="width:385px;font-size:10px">'+cr+'</td><td style="text-align:right;width:35px;">'+ca+'</td><td style="text-align:right;width:55px;">'+inta+' </td><td style="text-align:right;width:55px;">'+cu+' </td><td style="text-align:right;width:35px;">'+sa+' </td><td style="text-align:right;width:55px;">'+tdes2+' </td><td style="text-align:right;width:55px;">'+stode2+' </td><td style="text-align:right;width:55px;">'+toiva2+' </td><td style="text-align:right;width:55px;">'+sudeiv2+' </td><td style="text-align:center;width:20px;"><img src="eliminar.png" class="del" width="16" height="16"></td></tr>';
			
			$("#tabla tbody").append(nuevaFila);
			//document.getElementById("contafi").value = cont;
			reordenar();
			
		
			
		}	
		
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
	
	$(document).ready(function(){
	
			// evento para eliminar la fila
		$("#tabla").on("click", ".del", function(){
			$(this).parents("tr").remove();
			
			reordenar();
		});
	});
	
	
	function eliminarTodasFilas(){
$('#tabla tbody tr').each(function(){
			$(this).remove();
		});

	}
	
	
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
					var asca=$(this).find('td').eq(3).text();  //cantidad
			var asca1=$(this).find('td').eq(5).text();  ///subtotal
			var tode=$(this).find('td').eq(7).text();  //descuento
			var subde=$(this).find('td').eq(8).text(); //sub-des
			var ivapago=$(this).find('td').eq(9).text(); //iva
			var topago=$(this).find('td').eq(10).text(); ///total
			
			///
			
			
			
			
			
			
							
			
	/////
				cont1=parseFloat(asca) ;
				cont11=parseFloat(asca1) ;
				
				tode1=parseFloat(tode) ;
				subde1=parseFloat(subde) ;
				ivapago1=parseFloat(ivapago) ;
				topago1=parseFloat(topago) ;	
	///			
				
				
				todesc=todesc + tode1;
				dessub=dessub + subde1;
				ivapagar=ivapagar + ivapago1;
				topagar=topagar + topago1;
				
				numa=numa + cont1;
				numa1=numa1 + cont11;
				
				
						
				
		
			
			num++;
		});
		
		//document.getElementById("cofia").value = num - 1;
					todas=parseFloat(todesc);
					todes2=todas.toFixed(2);	


			desub=parseFloat(dessub);
			desub2=desub.toFixed(2);						
		
		
				iva=parseFloat(ivapagar); //iva
			iva2=iva.toFixed(2); //iva
		
			
			nsumar11=parseFloat(numa1); //subtotal
			precio2=12; //subtotal
			
			
			
			toco=parseFloat(topagar);  //total a pagar
			toco2=toco.toFixed(2);  //total a pagar
			
			
		
	
	
	
	
			

	
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
	top:8px;
	width:213px;
	height:162px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:10px;
	top:272px;
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
							
								<legend>IDENTIFICACION   <input name="cocla" type="text" class="success" id="cocla" value="<?php print $cocli; ?>" maxlength="13" />
							<input name="hoin" type="text" id="hoin"  size="6" readonly="true" />	</legend>
							
							
								<div class="campSearcher">
									    
										<table width="441" border="1">
  <tr>
    <td width="137"><div class="label">  
    <label for="COD_DICC" class=""> 
Cedula /Ruc</label></div> </td>
    <td width="242"><span class="Estilo3"><?php print $ruc; ?></span><input name="op" type="text" id="op" value="2" size="5" />
      <span class="Estilo3">
      <input name="b6" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="b6" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onfocus="this.style.background=('#FFFF66')" onblur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " size="20" />
      </span></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Cliente</label></div> </td>
    <td><span class="Estilo3"><?php print $nombre1; ?></span><input name="codi" type="text" class="field2" id="codi" value="<?php print $codi; ?>" size="5" />
      <span class="Estilo3">
      <input name="b1" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="b1" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onfocus="this.style.background=('#FFFF66')" onblur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " size="20" />
      </span></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Dirección</label></div></td>
    <td><span class="Estilo3"><?php print $direccion1; ?></span><input name="opes" type="text" id="opes" value="<?php print $opas;?>" size="5">
      <span class="Estilo3">
      <input name="b2" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="b2" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onfocus="this.style.background=('#FFFF66')" onblur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " size="20" />
      </span></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Telefono</label></div></td>
    <td><span class="Estilo3"><?php print $telefono1; ?>
      <input name="b3" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="b3" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onfocus="this.style.background=('#FFFF66')" onblur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " size="20" />
    </span></td>
    </tr>
   <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Mail</label></div></td>
    <td><span class="Estilo3"><?php print $correo1; ?>
      <input name="b4" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="b4" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onfocus="this.style.background=('#FFFF66')" onblur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " size="20" />
    </span></td>
    </tr>
  
    <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Tipo de Cliente</label></div></td>
    <td><span class="Estilo3"><?php print $razon1; ?>
      <input name="b5" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="b5" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onfocus="this.style.background=('#FFFF66')" onblur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " size="20" />
    </span></td>
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
							  <option value="2">pagarés</option>
                           
                            </select></span></td>
    </tr>
  <tr>
    <td><div class="label">  
    <label for="COD_DICC" class=""> 
Valor</label></div></td>
    <td><span class="Estilo3"><input name="cre18" type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="cre18" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  onkeyup="var pattern = /[^0-9\.]/g; // cualquier cosa que no sea numero y punto;
this.value = this.value.replace(pattern, ''); " size="10" />
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
      <td><input  name="copa"  type="text" class="ui-inputfield ui-password ui-widget ui-state-default ui-corner-all" id="copa" style="BACKGROUND:#FFFFFF; color:#0000FF; text-align:right;font-size:18px" onFocus="this.style.background=('#FFFF66')" onBlur="this.style.background=('#FFFFFF')"  size="10" readonly="true">
	  
	  <img src="dibujo/nue.png" onClick="agregar()"  />
	  
	     </td>
    </tr>
</table>

										
										
										
									
									    
										
									    
										
									    
										
										
											    
										
									  

										</br>
									
							    </div>
								
								
								
							
					   
						</fieldset>
					
					
				
				 <div class="searcherButtons">
					 
					 
					
					  
					<button class="textButton" type="submit" name="buscar">Guardar Cuenta</button>
					<button class="textButton" type="button" onclick="suma();" name="hava">Generar Cuenta</button>
					
					
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


<table id="tabla" border="1">
			
			<thead style="height:45"  class="cartHeader" display="off">
				
				
			</thead>
			<tbody>
			</tbody>
			<tfoot>
		  </tfoot>
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
