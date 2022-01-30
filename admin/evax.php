<?php
include("../conexion.php");
if (isset($_POST['pregunta1'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];

//$actualizar="UPDATE examen SET preg1='$preg1', resp1='$resp1' WHERE id='$id' ";

$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg1='$preg', resp1='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva1foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg1 y la ID resp1 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}


 }

if (isset($_POST['foto1'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo1"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo1']['name'];
$tipo_archivo= $_FILES['archivo1']['type'];
$tamano_archivo = $_FILES["archivo1"]['size'];
$direccion_temporal = $_FILES['archivo1']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo1']['tmp_name'],"imagenes/" . $_FILES['archivo1']['name']);
   $guardar="UPDATE examen SET archivo1='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva1final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// DESDE AQUI LA PREGUNTA 2
if (isset($_POST['pregunta2'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];

//$actualizar="UPDATE examen SET preg1='$preg1', resp1='$resp1' WHERE id='$id' ";

$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg2='$preg', resp2='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva2foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg2 y la ID resp2 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}


 }
//desde AQUI LA FOTO 2
 if (isset($_POST['foto2'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo2"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo2']['name'];
$tipo_archivo= $_FILES['archivo2']['type'];
$tamano_archivo = $_FILES["archivo2"]['size'];
$direccion_temporal = $_FILES['archivo2']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo2']['tmp_name'],"imagenes/" . $_FILES['archivo2']['name']);
   $guardar="UPDATE examen SET archivo2='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva2final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 2
// DESDE AQUI LA PREGUNTA 3
if (isset($_POST['pregunta3'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];

//$actualizar="UPDATE examen SET preg1='$preg1', resp1='$resp1' WHERE id='$id' ";

$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg3='$preg', resp3='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva3foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg3 y la ID resp3 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
 }
 //desde AQUI LA FOTO 3---------------------------------------------
 if (isset($_POST['foto3'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo3"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo3']['name'];
$tipo_archivo= $_FILES['archivo3']['type'];
$tamano_archivo = $_FILES["archivo3"]['size'];
$direccion_temporal = $_FILES['archivo3']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo3']['tmp_name'],"imagenes/" . $_FILES['archivo3']['name']);
   $guardar="UPDATE examen SET archivo3='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva3final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 3-------------------------------------------------

// DESDE AQUI LA PREGUNTA 4
if (isset($_POST['pregunta4'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];


$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg4='$preg', resp4='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva4foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg4 y la ID resp4 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
 }
 //desde AQUI LA FOTO 4---------------------------------------------
 if (isset($_POST['foto4'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo4"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo4']['name'];
$tipo_archivo= $_FILES['archivo4']['type'];
$tamano_archivo = $_FILES["archivo4"]['size'];
$direccion_temporal = $_FILES['archivo4']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo4']['tmp_name'],"imagenes/" . $_FILES['archivo4']['name']);
   $guardar="UPDATE examen SET archivo4='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva4final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 4-------------------------------------------------

// DESDE AQUI LA PREGUNTA 5
if (isset($_POST['pregunta5'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];


$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg5='$preg', resp5='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva5foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg5 y la ID resp5 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
 }
 //desde AQUI LA FOTO 4---------------------------------------------
 if (isset($_POST['foto5'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo5"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo5']['name'];
$tipo_archivo= $_FILES['archivo5']['type'];
$tamano_archivo = $_FILES["archivo5"]['size'];
$direccion_temporal = $_FILES['archivo5']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo5']['tmp_name'],"imagenes/" . $_FILES['archivo5']['name']);
   $guardar="UPDATE examen SET archivo5='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva5final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 5-------------------------------------------------
// DESDE AQUI LA PREGUNTA 6
if (isset($_POST['pregunta6'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];


$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg6='$preg', resp6='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva6foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg6 y la ID resp6 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
 }
 //desde AQUI LA FOTO 4---------------------------------------------
 if (isset($_POST['foto6'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo6"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo6']['name'];
$tipo_archivo= $_FILES['archivo6']['type'];
$tamano_archivo = $_FILES["archivo6"]['size'];
$direccion_temporal = $_FILES['archivo6']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo6']['tmp_name'],"imagenes/" . $_FILES['archivo6']['name']);
   $guardar="UPDATE examen SET archivo6='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva6final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 6-------------------------------------------------
// DESDE AQUI LA PREGUNTA 7
if (isset($_POST['pregunta7'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];


$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg7='$preg', resp7='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva7foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg7 y la ID resp7 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
 }
 //desde AQUI LA FOTO 4---------------------------------------------
 if (isset($_POST['foto7'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo7"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo7']['name'];
$tipo_archivo= $_FILES['archivo7']['type'];
$tamano_archivo = $_FILES["archivo7"]['size'];
$direccion_temporal = $_FILES['archivo7']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo7']['tmp_name'],"imagenes/" . $_FILES['archivo7']['name']);
   $guardar="UPDATE examen SET archivo7='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva7final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 7-------------------------------------------------

// DESDE AQUI LA PREGUNTA 8
if (isset($_POST['pregunta8'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];


$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg8='$preg', resp8='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva8foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg8 y la ID resp8 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
 }
 //desde AQUI LA FOTO 4---------------------------------------------
 if (isset($_POST['foto8'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo8"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo8']['name'];
$tipo_archivo= $_FILES['archivo8']['type'];
$tamano_archivo = $_FILES["archivo8"]['size'];
$direccion_temporal = $_FILES['archivo8']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo8']['tmp_name'],"imagenes/" . $_FILES['archivo8']['name']);
   $guardar="UPDATE examen SET archivo8='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva8final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 8-------------------------------------------------
// DESDE AQUI LA PREGUNTA 9
if (isset($_POST['pregunta9'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];


$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg9='$preg', resp9='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva9foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg9 y la ID resp9 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
 }
 //desde AQUI LA FOTO 9---------------------------------------------
 if (isset($_POST['foto9'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo9"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo9']['name'];
$tipo_archivo= $_FILES['archivo9']['type'];
$tamano_archivo = $_FILES["archivo9"]['size'];
$direccion_temporal = $_FILES['archivo9']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo9']['tmp_name'],"imagenes/" . $_FILES['archivo9']['name']);
   $guardar="UPDATE examen SET archivo9='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva9final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 9-------------------------------------------------
// DESDE AQUI LA PREGUNTA 10
if (isset($_POST['pregunta10'])) {
 $id_examen=$_POST['id'];
 $preg=$_POST['preg'];
 $resp=$_POST['resp'];
 $A=$_POST['A'];
 $B=$_POST['B'];
 $C=$_POST['C'];
 $D=$_POST['D'];


$actualizar="INSERT INTO preguntas (id_preguntas,id_examen,A,B,C,D,resp,preg) VALUES (NULL,'$id_examen','$A','$B','$C','$D','$resp','$preg' )";
if ($resultado=$link->query($actualizar)) {
	//header("Location: eva1foto.php?id_examen=$id");
$insertar="UPDATE examen SET preg10='$preg', resp10='$resp' WHERE id='$id_examen'  ";
if ($result=$link->query($insertar)) {
	header("Location: eva10foto.php?id_examen=$id_examen");
}else{
		echo "ERROR AL GUARDAR a la tabla examen la preg10 y la ID resp10 ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
}else{
	echo "ERROR AL GUARDAR ";
	echo "<a href='eva_nueva.php'> REGRESAR </a>";
}
 }
 //desde AQUI LA FOTO 4---------------------------------------------
 if (isset($_POST['foto10'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$id=$_POST['id'];
 if($_FILES["archivo10"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo10']['name'];
$tipo_archivo= $_FILES['archivo10']['type'];
$tamano_archivo = $_FILES["archivo10"]['size'];
$direccion_temporal = $_FILES['archivo10']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo10']['tmp_name'],"imagenes/" . $_FILES['archivo10']['name']);
   $guardar="UPDATE examen SET archivo10='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: eva10final.php?id=$id");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}
// HASTA AQUI LA FOTO 10-------------------------------------------------
  ?> 
 