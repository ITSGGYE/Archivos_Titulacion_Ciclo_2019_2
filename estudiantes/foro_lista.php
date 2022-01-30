<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");?>



<div class="container mt-4 py-4 bg-light">
  <div class="row">
    <div class="col-10">
      <table class="table table-bordered table-striped">
        <tr class="bg-dark text-white">
          <td>#</td>
          <td>Materia</td>
          <td>Título</td>
          <td>Comentarios</td>
          <td></td>
        </tr>
<?php 
//$anio=date("Y");
$hoy=date("Y-m-d");
//$consulta="SELECT * FROM foros WHERE colegio='$colegio' AND nivel='$nivel' AND curso='$curso' AND paralelo='$paralelo' AND gestion='$anio' ";
$consulta="SELECT * FROM foros WHERE colegio='$colegio' AND nivel='$nivel' AND curso='$curso' AND paralelo='$paralelo' ";
if ($resultado=$link->query($consulta)) {
$numero=1;
    while ($row=$resultado->fetch_array()) {
        $id=$row['id'];
        $categoria=$row['categoria'];
        $titulo=$row['titulo'];
        $estado=$row['estado'];
        $fecha_final=$row['fecha_final'];


    echo "<tr>";
    echo "<th scope='row'>".$id."</th>";
    echo "<td>".utf8_decode($categoria)."</td>";
    echo "<td>".utf8_decode($titulo)."</td>";
    if ($id>0) {
      $busc="SELECT * FROM foros_participacion WHERE id_foros='$id' ";
      $res=$link->query($busc);
      $row_cnt = $res->num_rows;
      echo "<td><p class='text-center text-danger'><b>".$row_cnt."</b></p></td>";
    }

if ($hoy>$fecha_final) {
    echo "<td><a href='foros_fin.php?id=$id&colegio=$colegio&nivel=$nivel&curso=$curso&paralelo=$paralelo' class='btn btn-danger'><i class='fab fa-rocketchat'></i> Finalizado - Ver</a></td>";
}else{
echo "<td><a href='foros_ok.php?id=$id&colegio=$colegio&nivel=$nivel&curso=$curso&paralelo=$paralelo' class='btn btn-success'><i class='fab fa-rocketchat'></i> Entrar al Foro</a></td>";
    echo "</tr>";
  
}

    //echo "<td>Ultimo mensaje por: Moises</td>";
    
}}
  ?>
      

      </table>
    </div>
  </div>
  
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->


	<!--=== End Sticky Footer ===-->
<?php include("footer-examen.php");?>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>