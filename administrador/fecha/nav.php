<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: ../../../index.html');
  
}

?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span></button>
        <a style="text-decoration: none;" class="brand" > <strong style="position: relative;top: 8px; color: aqua; font-size: 15px; " >CONSULTORIO ODONTOLOGICO</strong> </a>
        <ul class="nav navbar-top-links navbar-left">
          <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
            <em class="icon-bell" style="margin-top: -10px; font-size: 20px;margin-right:-10px;"></em><span class="label label-danger">
              <?php
              include_once("../../conexion.php");
              $sql = "SELECT COUNT(*) AS  c
              FROM cita WHERE cit_estado='asignado'  ";
              $stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
              $stm->bindParam( PDO::PARAM_INT);
              $stm->execute();
              echo $stm->fetchColumn(); 
              ?></span>
            </a>
            <ul class="dropdown-menu dropdown-messages">
              <li>
                <div class="dropdown-messages-box">
                  <center><h4 style="color: black;font-weight:bold;">NUEVA CITAS</h4></center>
                  
                  <table  class="table table-striped table-bordered table-hover  text-dark"   >
                    
                   <thead>
                     <tr style="background:grey;color:white; ">
                      
                      <th scope="col"  >Paciente</th>
                      <th scope="col">Fecha</th>
                      <th scope="col">Hora</th>
                    </tr>
                  </thead>
                  <tbody>
                   <!-- REGISTROS DE BD -->                                
                   <?php
                   include_once("../../conexion.php");
                   $sentencia=$bd->query("SELECT * 
                    FROM cita c
                    JOIN paciente p
                    ON c.paciente=p.nombre_apellido
                    WHERE  c.cit_estado='asignado' 
                    ORDER BY c.id_cita limit 10
                    ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                   $paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
                   ?>
                   <?php
                   foreach($paciente as $row) {?>
                    <tr >
                      <td><?php echo $row->nombre_apellido?></td>
                      <td><?php echo $row->fecha?></td> 
                      <td><?php echo $row->cit_hora?></td> 
                    </tr>
                    
                  <?php }?>
                </tbody>
              </table>
              <center> 
                <div >
                  <a href="../../citas.php" > <h5 style="color: green;" class="icon-spinner9"> IR A TODAS LAS CITAS</h5></a>
                </div>
              </center>
            </div></div>
          </div>
        </li>
        
      </ul>
    </li>
    
  </ul>
</div>
</div><!-- /.container-fluid -->
</nav>
