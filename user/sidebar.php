<?php  
   session_start();
   if (!isset($_SESSION['nombre'])) {
   	header('Location: index.php');
   
   }
   
   
   ?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
   <!--/r-->
   <div class="profile-sidebar">
      <div class="profile-usertitle">
         <div class="profile-usertitle-name" >
            <div class="profile-usertitle-status" style="float: right;"><span class="indicator label-success"></span>Online</div>
            <p style="color: #ff7655;font-weight: bold; font-size: 16px;" > CORREO</p>
            <p style=" font-size: 16px;"><?php echo $_SESSION['nombre'] ?></p>
         </div>
         <?php
            include_once("conexion.php");
            
            $sentencia=$bd->query("SELECT * FROM paciente WHERE  correo= '".$_SESSION['nombre']."'
                ");
            
            $paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
            
            //print_r($var);
            
            ?>
         <?php
            foreach($paciente as $row) {?>
         <p style="color: #ff7655; font-size: 16px;font-weight: bold;">NOMBRE USUARIO</p>
         <p style=" font-size: 16px;text-transform: uppercase;"><?php echo $row->nombre_apellido?></p>
         <?php }?>
      </div>
      <div class="clear"></div>
   </div>
   <!--/r-->
   <ul class="nav menu" style="font-weight: bold;">
      <li ><a href="inicio.php"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
      <li><a href="citas.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Citas</a></li>
      <li><a href="citas_atendida.php"><span class="fa fa-arrow-right">&nbsp;</span> Cita Atendida</a></li>
	  <li><a href="citas_ocupada.php"><span class="fa fa-arrow-right">&nbsp;</span> Cita Ocupada</a></li>
      <li><a href="cerrar.php"><em class="fa fa-power-off">&nbsp;</em> Cerrar Session</a></li>
   </ul>
</div>
<!--/.sidebar-->