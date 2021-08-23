<?php        
    session_start();   
    include('db_login.php');
	$connection = new mysqli($db_host, $db_username, $db_password);
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
	mysqli_select_db($connection,'book');
    if (!isset($_SESSION['user_id']) && $_SESSION['user_id']==null) {
        header("location: index.php");
	}
    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    // reconoce si la accion enviado por el request es ajax 
    if($action == 'ajax'){  
        // echo 'aqui';
        
        $id=$_SESSION['user_id'];
        $hoy = new DateTime('NOW');        
        $q = mysqli_real_escape_string($connection,(strip_tags($_REQUEST['q'], ENT_QUOTES)));   
        //Query que revisa las capacitaciones que tienen descripcion parecida a los caracteres enviados
        $sql = "SELECT cpt.id_capacitacion, cpt.descripcion,cpt.fecha_inicio FROM capacitaciones cpt
        WHERE cpt.ID_CAPACITACION not in 
        (select cpt.ID_CAPACITACION from capacitaciones cpt inner join 
        asientos ast on cpt.ID_CAPACITACION = ast.ID_CAPACITACION where ast.id_empleado=".$id.")
         and cpt.fecha_inicio>='".$hoy -> format('Y/m/d')."' 
         and cpt.DESCRIPCION not in (select cpt.DESCRIPCION from capacitaciones cpt inner join 
        asientos ast on cpt.ID_CAPACITACION = ast.ID_CAPACITACION where ast.id_empleado=".$id.") 
         and cpt.DESCRIPCION LIKE '%".$q."%'";

        //  echo $sql;
        //Cambios
        $query = mysqli_query($connection, $sql);

            while ($r=mysqli_fetch_array($query)) {
                $id_cpt=$r['id_capacitacion'];
                $descripcion=$r['descripcion'];
                $fecha_inicio=$r['fecha_inicio'];             
                
                    //muestra las capacitaciones como radio button 
                ?>
                    <label class="radio-inline" for="<?php echo $id_cpt; ?>">
                        <input type="radio" id="<?php echo $id_cpt;?>" name="fecha_evento" value="<?php echo $fecha_inicio; ?>">
                        <?php echo $descripcion." ".$fecha_inicio;?>                      
                    </label><br>
                <?php
                    } //en while
                ?>
               
            <?php
        }else{
           ?> 
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Aviso!</strong> No hay datos para mostrar!
            </div>
        <?php    
        }    
?>
