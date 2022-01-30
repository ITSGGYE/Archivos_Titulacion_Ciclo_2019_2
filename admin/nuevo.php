<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-10">


<h3>Nuevo Alumno</h3>

<div class="table-responsive">
 
<table class="table table-striped table-bordered table-hover bg-secondary text-white">
<form action="nuevox.php" method="get">
    <tr>
      <td>Escuela</td>
      <td>
<?php 
include("../conexion.php");

$consulta="SELECT colegio FROM dat_admin  WHERE ci='$usuario' AND cargo='$cargo' ";
if ($resultado=$link->query($consulta)) {
$numero=1;
    while ($row=$resultado->fetch_array()) {
        
        $colegio=$row['colegio'];
echo "<input type='hidden' name='colegio' value='".$colegio."'>".$colegio;

     
$numero++;
    }
}

?>  </td>
      <td>Nivel</td>
      <td><select name="nivel" class="form-control">
          <option value="PRIMARIA">PRIMARIA</option>
       
          
          </select>
          </td>
      
    </tr>
    <tr>
      <td>Curso:</td>
      <td><select name="curso" class="form-control">
         
          <option value="SEGUNDO">SEGUNDO</option>
          
          </select>
      </td>
      <td>Paralelo:</td>
      <td>
        <select name="paralelo" class="form-control">
        <option value="A">A/MATUTINA</option> 
        <option value="B">A/VESPERTINA</option> 
        <option value="C">B/MATUTINA</option> 
        
        </select>
      </td>
    </tr>
    <tr>
      <td>Gestión:</td>
      <td>
        <select name="gestion" class="form-control">
        <option value="2020">2020</option> 
        
        </select>
      </td>
      <td></td>
      <td><a href="index.php"><button type="button" class="btn btn-primary"><i class="far fa-arrow-to-left"></i> ATRAS  </button> </a>
      <button type="submit" class="btn btn-success"> SIGUIENTE <i class="far fa-arrow-to-right"></i></button></td>
    </tr>
 </form> 
</table>
</div><!--fin dela tabla responsive-->
</div>

<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 