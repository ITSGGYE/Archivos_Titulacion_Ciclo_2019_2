<?php require_once 'abrebase.php';
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
$op = $_REQUEST['dorsal'];

if ($op == 1 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 			$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
		
		

    
		$mysqli->query("UPDATE modulos SET indice = '$cocue', descrimar = '$des' where idmar= '$codi'" );


			
		
$variablephp2 =$cocue;
$variablephp3 =$des;
?>
<script type="text/javascript">


var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.razon.focus();
</script> 
<?php 	
}

if ($op == 2 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 			$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
		
		

    
		$mysqli->query("UPDATE opciones SET descriopcio = '$des' where idop= '$codi'" );


			
		
$variablephp2 =$cocue;
$variablephp3 =$des;
?>
<script type="text/javascript">

codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cueop.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();
</script> 
<?php 	
}

if ($op == 3 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 			$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
			
		
		

    
		$mysqli->query("UPDATE programas SET descripro = '$des' where idprog= '$codi'" );


			
		
$variablephp2 =$cocue;
$variablephp3 =$des;
?>
<script type="text/javascript">

codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuepro.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();
</script> 
<?php 	
}

if ($op == 4 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 			$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
		
		

    
		$mysqli->query("UPDATE tipousu SET tipousu = '$des' where idtipo1= '$codi'" );


			
		
$variablephp2 =$cocue;
$variablephp3 =$des;
?>
<script type="text/javascript">

codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuetipo.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();
</script> 
<?php 	
}


if ($op == 5 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 	 	$nombre = htmlspecialchars(trim($_POST['nom']));
	$ape = htmlspecialchars(trim($_POST['ape']));
	$cedula = htmlspecialchars(trim($_POST['ced']));
	$usu = htmlspecialchars(trim($_POST['usu']));
	$cla = htmlspecialchars(trim($_POST['cla']));
	$tipo = htmlspecialchars(trim($_POST['tipo']));
	$minus=strtolower(utf8_decode($ape));
				
				$ape=ucwords($minus);
				

				$minus=strtolower(utf8_decode($nombre));
				
				$nombre=ucwords($minus);	
				
				$nombrecomple = $ape." ".$nombre;	
		
		
		

    
		$mysqli->query("UPDATE usuario SET tipousuario = '$tipo',cedula = '$cedula',nombres = '$nombre',apellidos = '$ape',nomape = '$nombrecomple',usuario = '$usu',clave = '$cla' where idusuario= '$codi'" );

	
$variablephp2 =$cedula;
$variablephp3 =$nombrecomple;
$variablephp4 =$usu;


?>
<script type="text/javascript">

codiestu=0;
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cliusu.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;

document.formName.nombre2.value =variablejs3;
document.formName.cedula4.value =variablejs2;
document.formName.descri1.value =variablejs4;
document.formName.cedula.focus();


</script> 
<?php 	
}


if ($op == 6 )
{  


  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 	
		$cedu = htmlspecialchars(trim($_REQUEST['cedu']));      
		$ape = htmlspecialchars(trim($_REQUEST['ape']));
		$nom = htmlspecialchars(trim($_REQUEST['nom']));
		$est = htmlspecialchars(trim($_REQUEST['est']));
		$gen = htmlspecialchars(trim($_REQUEST['gen']));
		$fec = htmlspecialchars(trim($_REQUEST['fec']));
		$tel = htmlspecialchars(trim($_REQUEST['tel']));
		$tip = htmlspecialchars(trim($_REQUEST['tip']));
		$dir = htmlspecialchars(trim($_REQUEST['dir']));
		$lug = htmlspecialchars(trim($_REQUEST['lug']));
		$mai = htmlspecialchars(trim($_REQUEST['mai']));
		$amp = htmlspecialchars(trim($_REQUEST['amp']));
		$amf = htmlspecialchars(trim($_REQUEST['amf']));
		$ale = htmlspecialchars(trim($_REQUEST['ale']));
		$vac = htmlspecialchars(trim($_REQUEST['vac']));
		$tra = htmlspecialchars(trim($_REQUEST['tra']));
		$inq = htmlspecialchars(trim($_REQUEST['inq']));
		$enf = htmlspecialchars(trim($_REQUEST['enf']));
		$act = htmlspecialchars(trim($_REQUEST['acti']));
		
		$fecha1=$fec;
 	$fechaString = $fecha1;
    $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
    $fechaadqui = $objetoFecha ->format("Y-m-d");

	
	
	
		
		$minus=strtolower(utf8_decode($ape));
				
				$ape=ucwords($minus);
				
						$minus1=strtolower(utf8_decode($nom));
				
				$nom=ucwords($minus1);
				
				
					$desa=$ape." ".$nom;
		
		
	
	
    
		$mysqli->query("UPDATE pacientes SET cedupa = '$cedu',apepa = '$ape',nompa = '$nom',nombrecomple = '$desa',estapa = '$est',genepa = '$gen',fecnapa = '$fec',fecnapa1 = '$fechaadqui',telepa = '$tel',tispa = '$tip',afipa = '$act',direpa = '$dir',lugapa = '$lug',maipa = '$mai',antppa = '$amp',antfpa = '$amf',alepa = '$ale',vacupa = '$vac',trapa = '$tra',intepa = '$inq',enfepa = '$enf' where idpa= '$codi'" );


		
$variablephp2 =$cedu;
$variablephp3 =$desa;
?>
<script type="text/javascript">

codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})



var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.cedula.focus();
</script> 
<?php 	
}




if ($op == 61 )
{  


  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 	
		$codepa = htmlspecialchars(trim($_REQUEST['copac'])); 
 		$doct = htmlspecialchars(trim($_REQUEST['doct']));      
		$feci = htmlspecialchars(trim($_REQUEST['feci']));
		$hoci = htmlspecialchars(trim($_REQUEST['hoci']));
		$deci = htmlspecialchars(trim($_REQUEST['deci']));
		$noci = htmlspecialchars(trim($_REQUEST['noci']));
		
		
		$fecha1=$feci;
 	$fechaString = $fecha1;
    $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
    $fechaadqui = $objetoFecha ->format("Y-m-d");
		
		
		
    
		$mysqli->query("UPDATE citas SET desci = '$deci',iddoc = '$doct',feci = '$feci',feci1 = '$fechaadqui',hoci = '$hoci',noci = '$noci' where idci1= '$codi'" );


		


$variablephp2 =$doct;
$variablephp3 =$feci;
$variablephp4 =$hoci;
$variablephp5 =$codepa;
?>
<script type="text/javascript">

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;
var variablejs5 = "<?php echo $variablephp5; ?>" ;


codiestu=variablejs5;
	
//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("clici.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.cedula5.value =variablejs4;
document.formName.deci.focus();
</script> 
<?php 	
}


if ($op == 62 )
{  


  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 	
		$codepa = htmlspecialchars(trim($_REQUEST['copac'])); 
 		$doct = htmlspecialchars(trim($_REQUEST['doct']));      
		$feci = htmlspecialchars(trim($_REQUEST['feci']));
		$hoci = htmlspecialchars(trim($_REQUEST['hoci']));
		$deci = htmlspecialchars(trim($_REQUEST['deci']));
		$noci = htmlspecialchars(trim($_REQUEST['noci']));
		
		
		$fecha1=$feci;
 	$fechaString = $fecha1;
    $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
    $fechaadqui = $objetoFecha ->format("Y-m-d");
		
		
		
    
		$mysqli->query("UPDATE citas SET desci = '$deci',iddoc = '$doct',feci = '$feci',feci1 = '$fechaadqui',hoci = '$hoci',noci = '$noci' where idci1= '$codi'" );


		


$variablephp2 =$doct;
$variablephp3 =$feci;
$variablephp4 =$hoci;
$variablephp5 =$codepa;
?>
<script type="text/javascript">

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;
var variablejs5 = "<?php echo $variablephp5; ?>" ;


codiestu=variablejs5;
	
//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("clici.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.cedula5.value =variablejs4;
document.formName.deci.focus();
</script> 
<?php 	
}

if ($op == 63 )
{  


  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
		
		$op= 1;
		 	
		$anam = htmlspecialchars(trim($_REQUEST['anam'])); 
 		$diag = htmlspecialchars(trim($_REQUEST['diag']));      
		$trat = htmlspecialchars(trim($_REQUEST['trat']));
		
		$sist = htmlspecialchars(trim($_REQUEST['sist']));
		$dist = htmlspecialchars(trim($_REQUEST['dist']));
		$puls = htmlspecialchars(trim($_REQUEST['puls']));
		$ritm = htmlspecialchars(trim($_REQUEST['ritm'])); 
 		$temp = htmlspecialchars(trim($_REQUEST['temp']));      
		$altu = htmlspecialchars(trim($_REQUEST['altu']));
		$peso = htmlspecialchars(trim($_REQUEST['peso']));
		$imc = htmlspecialchars(trim($_REQUEST['imc']));
		
		$gras = htmlspecialchars(trim($_REQUEST['gras'])); 
 		$masa = htmlspecialchars(trim($_REQUEST['masa']));      
		$grav = htmlspecialchars(trim($_REQUEST['grav']));
		$agua = htmlspecialchars(trim($_REQUEST['agua']));
		$mas = htmlspecialchars(trim($_REQUEST['mas']));
		$met = htmlspecialchars(trim($_REQUEST['met']));	
		$edad = htmlspecialchars(trim($_REQUEST['edad']));				
		
		

		
    
		$mysqli->query("UPDATE citas SET anam = '$anam',diag = '$diag',trat = '$trat',sist = '$sist',dist = '$dist',puls = '$puls',ritm = '$ritm',temp = '$temp',altu = '$altu',peso = '$peso',imc = '$imc',gras = '$gras',masa = '$masa',grav = '$grav',agua = '$agua',mas = '$mas',met = '$met',edad = '$edad',op = '$op' where idci1= '$codi'" );




}



if ($op == 7 )
{  


  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 	
 		$cedu = htmlspecialchars(trim($_REQUEST['cedu']));      
		$ape = htmlspecialchars(trim($_REQUEST['ape']));
		$nom = htmlspecialchars(trim($_REQUEST['nom']));
		$est = htmlspecialchars(trim($_REQUEST['est']));
		$gen = htmlspecialchars(trim($_REQUEST['gen']));
		$fec = htmlspecialchars(trim($_REQUEST['fec']));
		$tel = htmlspecialchars(trim($_REQUEST['tel']));
		$car = htmlspecialchars(trim($_REQUEST['car']));
		$dir = htmlspecialchars(trim($_REQUEST['dir']));
		$lug = htmlspecialchars(trim($_REQUEST['lug']));
		$mai = htmlspecialchars(trim($_REQUEST['mai']));
		$amp = htmlspecialchars(trim($_REQUEST['amp']));
		$esp = htmlspecialchars(trim($_REQUEST['esp']));
		$cla = htmlspecialchars(trim($_REQUEST['cla']));
		
		$fecha1=$fec;
 	$fechaString = $fecha1;
    $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
    $fechaadqui = $objetoFecha ->format("Y-m-d");

	
	
	
		
		$minus=strtolower(utf8_decode($ape));
				
				$ape=ucwords($minus);
				
						$minus1=strtolower(utf8_decode($nom));
				
				$nom=ucwords($minus1);
				
				
					$desa=$ape." ".$nom;
		
		
	
	
    
		$mysqli->query("UPDATE profesionales SET cedume = '$cedu',apeme = '$ape',nomme = '$nom',nombrecomple = '$desa',estame = '$est',geneme = '$gen',fecname = '$fec',fecname1 = '$fechaadqui',teleme = '$tel',carneme = '$car',espeme = '$esp',direme = '$dir',lugame = '$lug',maime = '$mai',obseme = '$amp',clave = '$cla' where idme= '$codi'" );


		
$variablephp2 =$cedu;
$variablephp3 =$desa;
?>
<script type="text/javascript">

codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})



var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.cedula.focus();
</script> 
<?php 	
}



if ($op == 8 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 			$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
		
		

    
		$mysqli->query("UPDATE especialidad SET descridees = '$des' where iddees1= '$codi'" );


			
		
$variablephp2 =$cocue;
$variablephp3 =$des;
?>
<script type="text/javascript">

codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cliespe1.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();
</script> 
<?php 	
}

if ($op == 9 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 			$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
		
		
		
    
		$mysqli->query("UPDATE lugares SET descridepe = '$des' where iddepe1= '$codi'" );


			
		
$variablephp2 =$cocue;
$variablephp3 =$des;
?>
<script type="text/javascript">

codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("clicuentade.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.razon.focus();
</script> 
<?php 	
}

if ($op == 19 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 			$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
		$des=ucwords($minus);
		
    
		$mysqli->query("UPDATE unidades SET descrideun = '$des' where iddeun1= '$codi'" );

			
		
$variablephp2 =$cocue;
$variablephp3 =$des;
?>
<script type="text/javascript">

codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuentauni.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.razon.focus();
</script> 
<?php 	
}
?>
