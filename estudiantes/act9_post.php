<?php
 include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { 
///hasta aqui la cabecera
include("../conexion.php");

$id_examen=$_GET['id_examen'];

$consultad="SELECT rand FROM examen WHERE id='$id_examen' ";
$res=$link->query($consultad);
while ($rowd=$res->fetch_array()) {
$rand=$rowd['rand'];

}
$ran10=mt_rand(1,$rand);
//echo $ran3;
//$ran1=6;
$consulta="SELECT ran1,ran2,ran3,ran4,ran5,ran6,ran7,ran8,ran9,ran10 FROM cuestionarios WHERE ci='$usuario' AND id_examen='$id_examen'";
$resultado=$link->query($consulta);
while ($row=$resultado->fetch_array()) {
	//$id=$row['id'];
	//$ci=$row['ci'];
	$ran1a=$row['ran1'];
	$ran2a=$row['ran2'];
	$ran3a=$row['ran3'];
	$ran4a=$row['ran4'];
	$ran5a=$row['ran5'];
	$ran6a=$row['ran6'];
	$ran7a=$row['ran7'];
	$ran8a=$row['ran8'];
	$ran9a=$row['ran9'];
	$ran10a=$row['ran10'];

if ($ran1a==$ran10) {
//RAN2  IF
//echo "vuelve a tirar dado";
header("Location: act9_post.php?id_examen=$id_examen");

}else{
//avance RAN2

	if ($ran2a==$ran10) {
//vuelve a tirar el dado
header("Location: act9_post.php?id_examen=$id_examen");
	}else{
	//pasa al RAN3
	
		if ($ran3a==$ran10) {
			//tira el DADO
				header("Location: act9_post.php?id_examen=$id_examen");
			}else{
			//pasa al RAN4
				if ($ran4a==$ran10) {
					//tira el DADO
					header("Location: act9_post.php?id_examen=$id_examen");
				}else{
					//AVANZA RAN5
					if ($ran5a==$ran10) {
						//tira el DADO
						header("Location: act9_post.php?id_examen=$id_examen");
					}else{
						//avanza RAN6 
						if ($ran6a==$ran10) {
								//tira el DADO
							header("Location: act9_post.php?id_examen=$id_examen");
						}else{
							//avanza RAN7 header("Location: act8.php?id_examen=$id_examen&ran7=$ran7");
							if ($ran7a==$ran10) {
									//tira el DADO
								header("Location: act9_post.php?id_examen=$id_examen");
							}else{
								//avanza a RAN8 
								if ($ran8a==$ran10) {
										//tira el DADO
									header("Location: act9_post.php?id_examen=$id_examen");	
								}else{
									//avanza a RAN9 
									if ($ran9a==$ran10) {
										//tira el DADO
										header("Location: act9_post.php?id_examen=$id_examen");	
									}else{
										//avanza al RAN 10
										header("Location: act10.php?id_examen=$id_examen&ran10=$ran10");
									}
								}
							}
						}
					}

				}
			


			}
	}

}//CIERRA EL ELSE

}//hasta aqui while

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>