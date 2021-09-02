<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Editar Cliente</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="index.php?c=cliente&a=update">
                    <input type="hidden" name="cli_id" value="<?php echo $datos->cli_id; ?>" />
                    <div class="form-group">
                        <label for="cli_nombre">Nombre</label>
                        <input type="text" class="form-control" name="cli_nombre" 
                        value="<?php echo $datos->cli_nombre; ?> " placeholder="Nombre" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label for="cli_ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="cli_ciudad" 
                        value="<?php echo $datos->cli_ciudad; ?>" placeholder="Ciudad" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label for="cli_direccion">Direccion</label>
                        <input type="text" class="form-control" name="cli_direccion" 
                        value="<?php echo $datos->cli_direccion; ?>" placeholder="Direccion" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label for="cli_telefono">Telefono</label>
                        <input type="number" class="form-control" name="cli_telefono" 
                        value="<?php echo $datos->cli_telefono; ?>" placeholder="Telefono" data-validation="number">
                    </div>

                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>