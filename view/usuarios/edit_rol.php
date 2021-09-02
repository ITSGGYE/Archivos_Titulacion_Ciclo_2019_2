<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Editar Rol</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="index.php?c=usuario&a=updaterol">
                    <input type="hidden" name="usu_id" value="<?php echo $datos->usu_id; ?>" />
                    <div class="form-group">
                        <label for="emp_nombre">Nombre</label>
                        <input type="text" class="form-control" name="usu_nombre" value="<?php echo $datos->usu_nombre . " " . $datos->usu_apellidos; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="emp_apellidos">Usuario</label>
                        <input type="text" class="form-control" name="usu_usuario" value="<?php echo $datos->usu_usuario; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="emp_apellidos">Correo</label>
                        <input type="text" class="form-control" name="usu_correo" value="<?php echo $datos->usu_correo; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select class="form-control" id='rol_id' name='rol_id'>
                            <?php foreach ($roles as $rol) : ?>
                                <option value="<?php echo $rol->rol_id; ?>" <?php echo ($rol->rol_id == $datos->rol->rol_id)  ? "selected" : ""; ?>>
                                    <?php echo $rol->rol_descripcion; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>