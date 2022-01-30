<?php
include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') {
  
include("top-estudiantes.php");
?>
<div class="container bg-light p-3">
	<div class="row">
		<div class="col-12">

			<?php
			include("../conexion.php");

			$id=$_GET['id'];
			$cons="SELECT * FROM foros WHERE id='$id' ";
			$res=$link->query($cons);
			while ($rod=$res->fetch_array()) {
				$autor=$rod['autor'];
				$categoria=$rod['categoria'];
				$titulo=$rod['titulo'];
				$consigna=$rod['consigna'];
	}
			?>
			<h1 class="display-4"> Foro v2.0</h1>
			<hr>
<div class="d-flex justify-content-between">

		<div>

		<b>Título: </b><?php echo $titulo;?> 
		</div>
			 
		<div>
		<b>Materia: </b><?php echo $categoria;?>
		</div>
</div>
			
			<div class="d-flex justify-content-center p-3 mt-2" style="border-radius: 0.2em;">
				<h4 class="display-5"><?php echo $consigna;?></h4>

			</div>
			<hr>
			


<!--cuadro de las opiniones-->

<?php 

$participantes="SELECT * FROM foros_participacion WHERE id_foros='$id' ";
$result=$link->query($participantes);
         while ($roj=$result->fetch_array()) {
$id_fp=$roj['id_fp'];
$id_autor=$roj['id_autor'];
$id_foros=$roj['id_foros'];
$comentario=$roj['comentario'];
$fecha=$roj['fecha'];
$estrellas=$roj['estrellas'];
$puntajes=$roj['puntajes'];

echo "<div class=''>";
	echo "<div class='row'>";
		//<!--Grid column-->
		//<!--Grid column-->
        echo "<div class='col-md-2 mb-2'>";//col-3
				if ($id_fp>0) {

								$consultx="SELECT * FROM dat_admin WHERE ci='$id_autor' ";
								$resultadx=$link->query($consultx);
								         while ($rowx=$resultadx->fetch_assoc()) {
								             $id_admin=$row['id'];
								             $apx=$rowx['ap'];
								             $amx=$rowx['am'];
								             $nomx=$rowx['nom'];
								             $nivelx=$rowx['nivel'];
								             $cursox=$rowx['curso'];
								             $paralelox=$rowx['paralelo'];
								             $fotox=$rowx['foto'];
								             $cargox=$rowx['cargo'];
								 }
								}
            echo "<div class='testimonial text-center'>";//IMAGEN*********************************
                //<!--Avatar-->
                echo "<div class='avatar mx-auto my-1'>";

                	echo "<img src='../estudiantes/fotos/".$fotox."' width='50%' class='rounded-circle img-fluid'>";

                echo "</div>";
echo "<div class='float-center mt-4'>";
if ($cargox=='3') {

echo "<small class='mt-3'>Estudiante</small>";
echo "<hr>";
echo "<p class='text-warning'>";
if ($estrellas=='0') {
echo "<i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i>";
}elseif ($estrellas=='1') {
echo "<i class='fas fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i>";
}elseif ($estrellas=='2') {
echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i>";
}elseif ($estrellas=='3') {
echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i>";
}elseif ($estrellas=='4') {
echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fal fa-star'></i>";
}elseif ($estrellas=='5') {
echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
}else{
echo "<i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i><i class='fal fa-star'></i>";
}

echo "</p>";
}elseif ($cargox=='4') {

echo "<small class='mt-2'>Administrador</small>";
echo "<hr>";
echo "<p class='text-warning'>";

echo "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";


echo "</p>";

}
//<i class="fal fa-star"></i>
echo "</div>";
                
               
            echo "</div>";//IMAGEN***********************************************


        echo "</div>";// fin COL 3
        echo "<div class='col-md-10'>";

        setlocale(LC_ALL,"es_ES");
		
        	echo "<div class='d-flex justify-content-end'>".strftime("%d de %B %Y a Hrs. %H:%M %P",strtotime($fecha))."</div>";
			echo "<div class='my-2'><font class='lead' style='color:#F31B70;'>".$nomx." ".$apx[0].".</font> dice: </div><br>";
			echo "<div class=''><font class='lead'>".$comentario."</font></div>";
			//echo "<div class='d-flex justify-content-end'><a href='#' class='btn btn-outline-warning'><i class='far fa-thumbs-up'></i></a></div>";

        echo "</div>";       

    //<!--Grid row-->
	echo "</div>";//<!--row-->
echo "</div>";
echo "<hr style='border:none;
  border-top:1px dotted #979695;
  color:#fff;
  background-color:#fff;
  height:1px;
  width:100%;'>";
/*
				if ($id_fp>0) {

				$consultx="SELECT * FROM dat_admin WHERE ci='$id_autor' ";
				$resultadx=$link->query($consultx);
				         while ($rowx=$resultadx->fetch_assoc()) {
				             $id_admin=$row['id'];
				             $apx=$rowx['ap'];
				             $amx=$rowx['am'];
				             $nomx=$rowx['nom'];
				             $nivelx=$rowx['nivel'];
				             $cursox=$rowx['curso'];
				             $paralelox=$rowx['paralelo'];
				             $fotox=$rowx['foto'];
				 }

				}

				if ($foto=='') {
					echo "<img src='fotos/foto.png' class='rounded-circle img-fluid'>";
				}else{
					echo "<img src='fotos/".$fotox."' class='rounded-circle img-fluid'>";
				}*/

}
//echo "<hr>";
?>

<!---todo esto es el grid para el FORO-->
</div><!--CIERRA EL DIV DE COL-12 --> 

<!--cuadro de envio-->
<div class="row">

		<div class="col-md-3"> 
			<p class="lead lead pl-5">ESCRIBE TU COMENTARIO</p>
		</div>
		<div class="col-md-9 p-3">
			<form action="foros_okx.php" method="post">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<input type="hidden" name="ci" value="<?php echo $usuario;?>">
						<textarea name="comentario" class="form-control" rows="5"></textarea>
						<hr>
						<div class="d-flex justify-content-between">
							<a href="foro_lista.php" class="btn btn-warning"><h5><i class="fal fa-arrow-to-left"></i> REGRESAR</h5></a>
							<button type="submit" class="btn btn-danger"><h5><i class="fal fa-comments"></i> COMENTAR</h5></button>
						</div>
			</form>	
		</div> 
<!--cierra el 12-->
</div>


</div><!--ROW-->
</div><!--container-->
<?php
include("footer-examen.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 