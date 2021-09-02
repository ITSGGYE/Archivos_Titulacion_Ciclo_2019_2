  <div class="panel-body">
                            
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Editar el estado
</h4>
                                        </div>
                                        <form method="post">

                    <select class='form-control' name='estado' id='estado' required>
                        <option value="">Estado</option>
                            <option value="activo" >activo</option>           
                            <option value="inactiva">inactivo</option>     
                      
             
                       
                    </select>             
 
              </div> 
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            
                                           <input type="submit" name="up" value="Update" class="btn btn-primary">
                                          </form>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
               
                <!-- /. ROW  -->
                <?php 
                if(isset($_POST['up']))
               
                {
                    $estado = $_POST['estado']; 
                    
                    $upsql = "UPDATE `clientes` SET `estado`='$estado' WHERE id_clientes = '$id'";
                    if(mysqli_query($con,$upsql))
                    {
                    echo' <script language="javascript" type="text/javascript"> alert("se ha actualizado") </script>';
                    
                
                    }}
                
                
       
                
                
                
                ?>
