	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i ><img width="25px" src="img/editar.png"></i> Editar estado de reserva</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_categoria" name="editar_categoria">
			<div id="resultados_ajax2"></div>
			
 
			  
			 
			  <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Reserva</label>
				<div class="col-sm-8">
					<select class='form-control' name='mod_nombre' id='mod_nombre' required>
						<option value="">Selecciona un Estado</option>
							 
							<option value="confirmado">confirmado</option>		
								<option value="sin confirmar">sin confirmar</option>
							<option value="por confirmar">por confirmar</option>	
	
							<input type="hidden" name="mod_id" id="mod_id"> 
					</select>			  
				</div>
			  </div>
			 
			 
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>