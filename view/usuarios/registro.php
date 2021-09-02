<div class="row" style="margin-top: 60px">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Registro de Usuario</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="?c=usuario&a=store" class="has-validation-callback">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" value="<?php echo isset($datos->usu_nombre)?$datos->usu_nombre:""; ?>" name="usu_nombre" placeholder="" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" class="form-control" value="<?php echo isset($datos->usu_apellidos)?$datos->usu_apellidos:""; ?>" name="usu_apellidos" placeholder="" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <input type="text" class="form-control" value="<?php echo isset($datos->usu_fecha_nacimiento)?$datos->usu_fecha_nacimiento:""; ?>" name="usu_fecha_nacimiento" data-mask="99-99-9999" value="" data-toggle="datepicker" data-validation="date" data-validation-format="dd-mm-yyyy">
                            </div>
                            <div class="form-group">
                                <label for="">Cedula</label>
                                <input type="text" data-mask="9999999999" value="<?php echo isset($datos->usu_cedula)?$datos->usu_cedula:""; ?>"  class="form-control" name="usu_cedula" placeholder="" data-validation="number">
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" value="<?php echo isset($datos->usu_direccion)?$datos->usu_direccion:""; ?>"  name="usu_direccion" placeholder="" data-validation="required">
                            </div>
                            <div style="color:red">
                                <?php
                                if (isset($_REQUEST["error_validacion"])) {
                                    echo $_REQUEST["error_validacion"];
                                    echo "<br>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="text" class="form-control" value="<?php echo isset($datos->usu_correo)?$datos->usu_correo:""; ?>" name="usu_correo" placeholder="" data-validation="email">
                            </div>
                            <div class="form-group">
                                <label>Rol</label>
                                <select class="form-control" id='rol_id' name='rol_id'>
                                    <?php foreach ($roles as $rol) : ?>
                                            <option value="<?php echo $rol->rol_id; ?>" >
                                                <?php echo $rol->rol_descripcion; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Usuario</label>
                                <input type="text" class="form-control" value="<?php echo isset($datos->usu_usuario)?$datos->usu_usuario:""; ?>"  name="usu_usuario" data-validation="length" data-validation-length="min5">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control"  name="pass_confirmation" data-validation="length" data-validation-length="min6">
                            </div>
                            <div class="form-group">
                                <label for="">Confirmacion Password</label>
                                <input type="password" class="form-control"  name="pass" data-validation="confirmation">
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary float-right">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>
