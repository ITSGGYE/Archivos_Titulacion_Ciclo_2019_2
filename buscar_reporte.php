<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/img/icono.jpg" type="image/x-icon" />
    <title>Filtro de Reportes</title>
    <link rel="stylesheet" href="./styles/main.css" media="screen">
    <link rel="stylesheet" href="./styles/creaciondeestudiantes.css" media="screen">

</head>
<body>
<br>
<br>
<script language="javascript"> 
function checar()
{
with (document.forms['ingresodatos'])
{
if(fini.value=="")
{
alert("No se permiten campos en Fecha Desde");
return false;
}
else if(ffin.value=="")
{
alert("No se permiten campos en Fecha Hasta");
return false;
}
else
return true
}
}
</script>


<link type='text/css' href='calendario/css/ui-lightness/jquery-ui-1.7.2.custom.css' rel='stylesheet' /><script type='text/javascript' src='calendario/js/jquery-1.3.2.min.js'></script><script type='text/javascript' src='calendario/js/jquery-ui-1.7.2.custom.min.js'></script><script type='text/javascript' src='jquery.jtime_.js'></script>


<div id="container">
    <div id="header">
      <p><img src="imagen/mega-menu.jpg" width="150" height="45"></p>
	  <br>
	  <p><span>FILTRO</span> DE REPORTES ADMINISTRATIVOS</p>
	  </div>
    <ul id="nav">
                  <li></li>
                  <li><a class="new_ticket" href="logout.php">Salir</a></li>
                  <li><a class="home" href="prereportes.php">Atrás</a></li>
    </ul>
    <div id="content">
<div>
    </div>
<div style="margin:5px 0px 100px 0;text-align:center; width:100%;">
    
	
	
    <p align="center">Aplique los filtros de acuerdo a su gusto:<strong></strong></p>
	
	<form name="ingresodatos" action="reportemedicamentos.php" method="post" onsubmit="return checar();" target='_blank'>
    
	<table cellspacing="1" cellpadding="5" border="0"  align="center">
        
            		
			<tr bgcolor="#ccc">
			<td>Fecha Desde (AAAA-MM-DD):</td>
           	<td>
					<script type='text/javascript'>	$(function() {
					$('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
					})</script>
					<div class='demo'>
					<input type='text'name='fini'id='datepicker'size='10'maxlength='10'value=''><font color='#235784'size='2' face='arial'>
					</div>			</td>
			</tr>
			
			
			
			<tr bgcolor="#ccc">			
			<td>Fecha Hasta (AAAA-MM-DD):</td>
            <td>
					<script type='text/javascript'>	$(function() {
					$('#datepicker2').datepicker({ dateFormat: 'yy-mm-dd' });
					})</script>
					<div class='demo'>
					<input type='text'name='ffin'id='datepicker2'size='10'maxlength='10'value=''><font color='#235784'size='2' face='arial'>
					</div>			</td>
			</tr>
			
			<tr bgcolor="#ccc">
			<td>Tipo de Curso:</td>
			<td>
			<select name="institucion">
			<option value="" selected>TODOS...</option>
				
			<option  value="1">Informatíca</option>
						<option  value="2">Enfermería</option>
						<option  value="3">Lectura rapida</option>
						<option  value="4">Ingles</option>
						<option  value="5">Manualidades</option>		
						</select>
			</td>
			</tr>
			
		</table>
	
	<table cellspacing="1" cellpadding="5" border="0"  align="center">	
		<td width="220" height="15"><center><input class="button" type="submit" value="Generar"></center></td>
    </table>
    
	</form>
</div>
 <div style="clear:both"></div> 
 </div>
 <div id="footer"><p><!-- INICIO DEL FOOTER. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> Fundación Ecuador People - C.C Design</p>
            <!-- FOOTER DE FUNDACION. --></div>
 
</div>
</body>
</html>
