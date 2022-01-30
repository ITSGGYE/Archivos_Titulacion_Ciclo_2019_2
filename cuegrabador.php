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

		$codi="";


$opas=1;


if ($op == 1 )
{  
 
 		$codi="";
		

 		$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
	
		
		$esta =1;
	
		
		

		
$mysqli->query("INSERT INTO modulos(indice,descrimar)VALUES('$cocue','$des')" );	

//$result222a = $mysqli->query("SELECT @@identity AS id");

			$result22 = $mysqli->query("SELECT MAX(idmar) AS id FROM modulos");
		if ($result22->num_rows > 0 )
			{
			$row1 = $result22->fetch_array();
					$codi=$row1[0];
		
		}
			$result22->close();	



$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cocue;
$variablephp3 =$des;
?>


<script type="text/javascript">



//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.razon.focus();


		

</script> 



<?php		
}

if ($op == 2 )
{  
 
 		$codi="";
		

 		$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
	
		
		$esta =1;
	
		
		

		
$mysqli->query("INSERT INTO opciones(descriopcio)VALUES('$des')" );	

//$result222a = $mysqli->query("SELECT @@identity AS id");
			$result22 = $mysqli->query("SELECT MAX(idop) AS id FROM opciones");
		if ($result22->num_rows > 0 )
			{
			$row1 = $result22->fetch_array();
					$codi=$row1[0];
		
		}
			$result22->close();	



//$codi = $mysqli->insert_id;




$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cocue;
$variablephp3 =$des;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cueop.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();


		

</script> 



<?php		
}



if ($op == 3 )
{  
 
 		$codi="";
		

 		$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		
	
		
		$esta =1;
	
		
		

		
$mysqli->query("INSERT INTO programas(descripro)VALUES('$des')" );	

//$result222a = $mysqli->query("SELECT @@identity AS id");



//$result222a = $mysqli->query("SELECT @@identity AS id");
			$result22 = $mysqli->query("SELECT MAX(idprog) AS id FROM programas");
		if ($result22->num_rows > 0 )
			{
			$row1 = $result22->fetch_array();
					$codi=$row1[0];
		
		}
			$result22->close();	




$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cocue;
$variablephp3 =$des;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuepro.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();


		

</script> 



<?php		
}

if ($op == 4 )
{  
 
 		$codi="";
		

 		$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
	
		
		$esta =1;
	
		
		

		
$mysqli->query("INSERT INTO tipousu(tipousu)VALUES('$des')" );	

//$result222a = $mysqli->query("SELECT @@identity AS id");

			$result22 = $mysqli->query("SELECT MAX(idtipo1) AS id FROM tipousu");
		if ($result22->num_rows > 0 )
			{
			$row1 = $result22->fetch_array();
					$codi=$row1[0];
		
		}
			$result22->close();	




$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cocue;
$variablephp3 =$des;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuetipo.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();

		

</script> 



<?php		
}

if ($op == 5 )
{  
 
 		$codi="";
	

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
		
		
			
	
		
		$esta =1;
	
			
$mysqli->query("INSERT INTO usuario(tipousuario,cedula,nombres,apellidos,nomape,usuario,clave,op)VALUES('$tipo','$cedula','$nombre','$ape','$nombrecomple','$usu','$cla','$esta')" );	

//$result222a = $mysqli->query("SELECT @@identity AS id");

$codi = $mysqli->insert_id;




$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cedula;
$variablephp3 =$nombrecomple;
$variablephp4 =$usu;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cliusu.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs3;
document.formName.cedula4.value =variablejs2;
document.formName.descri1.value =variablejs4;
document.formName.cedula.focus();

		

</script> 



<?php		
}



if ($op == 6 )
{  



 		$codi="";
		
				
			$result22 = $mysqli->query("select pacie from codigos");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codi=$row1[0];
							$codi= $codi + 1;
							
				}	
				
				$_SESSION['codiho']=$codi;
				$mysqli->query("UPDATE codigos SET pacie= '".$codi."'" );
				
				
					$datos="datos";
				$directo3=$datos."/".$codi;
					 
			 $ruta = $directo3;
			if(!file_exists($ruta))
			{
				mkdir ($ruta);
			
			}
				
		

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
		
	
		
		$esta =1;
			$esta1 ="";
	
 


		
$mysqli->query("INSERT INTO pacientes(idpa,cedupa,apepa,nompa,nombrecomple,estapa,genepa,fecnapa,fecnapa1,telepa,tispa,afipa,direpa,lugapa,maipa,antppa,antfpa,alepa,vacupa,trapa,intepa,enfepa,op,hot_foto)VALUES('$codi','$cedu','$ape','$nom','$desa','$est','$gen','$fec','$fechaadqui','$tel','$tip','$act','$dir','$lug','$mai','$amp','$amf','$ale','$vac','$tra','$inq','$enf','$esta','$esta1')" );	
	
	
	
	

$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cedu;
$variablephp3 =$desa;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.cedula.focus();


		

</script> 



<?php		
}



if ($op == 61 )
{  



 		$codi="";
		
				
			$result22 = $mysqli->query("select nuci from codigos");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codi=$row1[0];
							$codi= $codi + 1;
							
				}	
				$_SESSION['codici']=$codi;
				
				$mysqli->query("UPDATE codigos SET nuci= '".$codi."'" );
				
		
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

	
	
		
		$esta =0;
			
	
 




		
$mysqli->query("INSERT INTO citas(idci1,idpac,desci,iddoc,feci,feci1,hoci,noci,op)VALUES('$codi','$codepa','$deci','$doct','$feci','$fechaadqui','$hoci','$noci','$esta')" );	
	
	
	
	

$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$doct;
$variablephp3 =$feci;
$variablephp4 =$hoci;
$variablephp5 =$codepa;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;
var variablejs5 = "<?php echo $variablephp5; ?>" ;


codiestu=variablejs5;
	
//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("clici.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

document.formName.codi1.value =variablejs;
document.formName.opes.value =variablejs1;

document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.cedula5.value =variablejs4;
document.formName.deci.focus();


		

</script> 



<?php		
}



if ($op == 7 )
{  



 		$codi="";
		
				
			$result22 = $mysqli->query("select profe from codigos");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codi=$row1[0];
							$codi= $codi + 1;
							
				}	
				
				$_SESSION['codiho1']=$codi;
				$mysqli->query("UPDATE codigos SET profe= '".$codi."'" );
				
				
					$datos="datosme";
				$directo3=$datos."/".$codi;
					 
			 $ruta = $directo3;
			if(!file_exists($ruta))
			{
				mkdir ($ruta);
			
			}
				
		

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
		
		$fecha1=$fec;
 	$fechaString = $fecha1;
    $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
    $fechaadqui = $objetoFecha ->format("Y-m-d");

	
	
	
		
		$minus=strtolower(utf8_decode($ape));
				
				$ape=ucwords($minus);
				
						$minus1=strtolower(utf8_decode($nom));
				
				$nom=ucwords($minus1);
				
				
					$desa=$ape." ".$nom;
		
	
		
		$esta =1;
			$esta1 ="";
	
 


		
$mysqli->query("INSERT INTO profesionales(idme,cedume,apeme,nomme,nombrecomple,estame,geneme,fecname,fecname1,teleme,carneme,espeme,direme,lugame,maime,obseme,op,hot_foto,clave)VALUES('$codi','$cedu','$ape','$nom','$desa','$est','$gen','$fec','$fechaadqui','$tel','$car','$esp','$dir','$lug','$mai','$amp','$esta','$esta1','$cedu')" );	
	
	
	
	

$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cedu;
$variablephp3 =$desa;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.cedula.focus();


		

</script> 



<?php		
}





if ($op == 9 )
{  
 
 		$codi="";
		
				
			$result22 = $mysqli->query("select luga from codigos");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codi=$row1[0];
							$codi= $codi + 1;
							
				}	
				
				
				$mysqli->query("UPDATE codigos SET luga= '".$codi."'" );
				
		

 		$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
	
		
		$esta =1;
	
		
		

		
$mysqli->query("INSERT INTO lugares(iddepe1,descridepe)VALUES('$codi','$des')" );	




$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cocue;
$variablephp3 =$des;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("clicuentade.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.razon.focus();


		

</script> 



<?php		
}


if ($op == 19 )
{  
 
 		$codi="";
		
				
			$result22 = $mysqli->query("select unidad from codigos");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codi=$row1[0];
							$codi= $codi + 1;
							
				}	
				
				
				$mysqli->query("UPDATE codigos SET unidad= '".$codi."'" );
				
		

 		$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
	
		
		$esta =1;
	
		
		

		
$mysqli->query("INSERT INTO unidades(iddeun1,descrideun)VALUES('$codi','$des')" );	




$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cocue;
$variablephp3 =$des;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuentauni.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.razon.focus();


		

</script> 



<?php		
}


if ($op == 52 )
{  
 
 		$codi="";
		
				
			$result22 = $mysqli->query("select tra from codigos");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codi=$row1[0];
							$codi= $codi + 1; ///para codi1
							
				}	
				
				$mysqli->query("UPDATE codigos SET tra= '".$codi."'" );
				
		
		
 
		

 		$codiarti = htmlspecialchars(trim($_REQUEST['codi']));      
		$depe = htmlspecialchars(trim($_REQUEST['codepe']));
		$fun = htmlspecialchars(trim($_REQUEST['cofun']));
		$fetra = htmlspecialchars(trim($_REQUEST['fetra']));
		$estado = htmlspecialchars(trim($_REQUEST['estado']));
		$uni = htmlspecialchars(trim($_REQUEST['uni']));
	
		$esta =1;
		
		
			$fecha2=$fetra;
 	$fechaString1 = $fecha2;
    $objetoFecha1 = DateTime::createFromFormat("d/m/Y", $fechaString1 );
    $fecharece = $objetoFecha1 ->format("Y-m-d");	
		
		$esta3 =0;
	//para codi2 el codigo actual del articulo
		
$mysqli->query("INSERT INTO traslado(idtra,idbode2,iddepen,idfun,fechatra,fechatra1,estadotra,es,estaactual,veri,idunid)VALUES('$codi','$codiarti','$depe','$fun','$fetra','$fecharece','$estado','$esta','$estado','$esta3','$uni')" );	

$mysqli->query("UPDATE bodega1 SET dependencia= '".$depe."'  where  idbo = '$codiarti' " );

$variablephp =$codi;	///para codi1
$variablephp1 =$opas;

$variablephp2 =$codiarti;   ///para codi2

?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


$.post("articutra.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;


document.formName.opes.value =variablejs1;

document.formName.codi1.value =variablejs;
document.formName.codi2.value =variablejs2;


document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs2;




		

</script> 



<?php		
}


if ($op == 53 )
{  
 
 				$codibode = "";
				$codide = "";
				$codifu = "";
				$bode=100;
				$es=0;
 
 		
$coditra = htmlspecialchars(trim($_REQUEST['codi']));

//sacamos los datos del traslado
		
$result22 = $mysqli->query("select idbode2,iddepen,idfun from traslado where idtras = '$coditra'  ");
		

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
			
				$codibode = $row1[0];
				$codide = $row1[1];
				$codifu = $row1[2];
			
	
	}
$result22->close();


//sacamos los datos acuales del bien de la bodega1

 $codidepe1="";
 $esta1="";

		
$result22 = $mysqli->query("select dependencia,esta from bodega1 where idbo = '$codibode'  ");
		

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				 $codidepe1 = $row1[0];
				$esta1 = $row1[1];
				
	
	}
$result22->close();

				
		
	
 
 		$fetra = htmlspecialchars(trim($_REQUEST['fetra']));
		$t2 = htmlspecialchars(trim($_REQUEST['estado']));
		$obs = htmlspecialchars(trim($_REQUEST['obs']));
		$estado="";
		
		
					if ($t2==1)
			{
				$estado="Buen Estado";
				
			}

			if ($t2==2)
			{
				$estado="Regular Estado";
				
			}	


			if ($t2==3)
			{
				$estado="Mal Estado";
				
			}							
		
		
		
		
	$fecha2=$fetra;
 	$fechaString1 = $fecha2;
    $objetoFecha1 = DateTime::createFromFormat("d/m/Y", $fechaString1 );
    $fecharece = $objetoFecha1 ->format("Y-m-d");
	
	//actualizamos en traslado el bien a estado trsladado
$mysqli->query("UPDATE traslado SET es= '".$es."',fechade= '".$fetra."',fechade1= '".$fecharece."',estadevo= '".$estado."',observa= '".$obs."'  where idtras = '$coditra' " );
	

	
	//acualizamos en bodega1
	
$mysqli->query("UPDATE bodega1 SET dependencia= '".$bode."',esta= '".$estado."'  where  idbo = '$codibode' " );
		

 	/*	$codiarti = htmlspecialchars(trim($_REQUEST['codi']));      
		$depe = htmlspecialchars(trim($_REQUEST['codepe']));
		$fun = htmlspecialchars(trim($_REQUEST['cofun']));

		
	
		$esta =1;
		
		
		*/
		
		
	//para codi2 el codigo actual del articulo
	
	

$variablephp1 =$opas;

$variablephp =$coditra;	///para codi1

$variablephp2 =$codibode;   ///para codi2
$variablephp3 =$codidepe1;   ///para codi2
$variablephp4 =$esta1;   ///para codi2

?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


$.post("articutra1.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;

document.formName.opes.value =variablejs1;

document.formName.codi1.value =variablejs;
document.formName.codi2.value =variablejs2;
document.formName.codi3.value =variablejs3;
document.formName.codi4.value =variablejs4;


document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs2;




</script> 



<?php		
}




if ($op == 8 )
{  
 
 		$codi="";
		
				
			$result22 = $mysqli->query("select espe from codigos");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codi=$row1[0];
							$codi= $codi + 1;
							
				}	
				
				
				$mysqli->query("UPDATE codigos SET espe= '".$codi."'" );
				
		

 		$cocue = htmlspecialchars(trim($_REQUEST['raz']));      
		$des = htmlspecialchars(trim($_REQUEST['ruc']));
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
	
		
		$esta =1;
	
		
		

		
$mysqli->query("INSERT INTO especialidad(iddees1,descridees)VALUES('$codi','$des')" );	




$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$cocue;
$variablephp3 =$des;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cliespe1.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();


		

</script> 



<?php		
}



if ($op == 10 )
{  
 
 		

 		$comodu = htmlspecialchars(trim($_REQUEST['raz']));      
		$coop = htmlspecialchars(trim($_REQUEST['code']));
		
		
		
		
$mysqli->query("INSERT INTO moduopcio(idmodu,idopci)VALUES('$comodu','$coop')" );	




$variablephp =$comodu;	

?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
codiestu=variablejs;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuemoduop.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


		

</script> 



<?php		
}



if ($op == 12 )
{  



 		$codi="";


 		$ruc = htmlspecialchars(trim($_REQUEST['ruc']));      
		$nombre = htmlspecialchars(trim($_REQUEST['nome']));
		$apellido = htmlspecialchars(trim($_REQUEST['apee']));
	
		$nombrecomple = htmlspecialchars(trim($_REQUEST['apee']))." ".htmlspecialchars(trim($_REQUEST['nome']));
		$direccion1 = htmlspecialchars(trim($_REQUEST['dire1']));
				
		
		
		$esta =1;
	
			

	


$mysqli->query("INSERT INTO usuario(tipousuario,cedula,nombres,apellidos,direcion,usuario,clave,estado)VALUES('$esta','$ruc','$nombre','$apellido','$direccion1','$ruc','$ruc','$esta')");	
		
	
		
		$result22 = $mysqli->query("SELECT MAX(id) AS id FROM usuario");



if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				$codi=$row1[0];
				
				
	
}
$result22->close();	
		
	
			

$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$nombrecomple;
$variablephp3 =$ruc;
?>
<script type="text/javascript">
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.ruc.focus();
</script> 
<?php		
}

?>









	
