<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Datos de perfil</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="index.php?c=usuario&a=updateperfil">
                    <input type="hidden" name="usu_id" value="<?php echo $datos->usu_id; ?>" />
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="usu_nombre" value="<?php echo $datos->usu_nombre ?>" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" class="form-control" name="usu_apellidos" value="<?php echo $datos->usu_apellidos ?>" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <input type="text" class="form-control" name="usu_fecha_nacimiento" data-mask="99-99-9999" value="<?php echo date("d-m-Y", strtotime($datos->usu_fecha_nacimiento))  ?>" data-toggle="datepicker" data-validation="date" data-validation-format="dd-mm-yyyy">
                            </div>
                            <div class="form-group">
                                <label for="">Cedula</label>
                                <input type="text" class="form-control" name="usu_cedula" value="<?php echo $datos->usu_cedula ?>" data-validation="number">
                            </div>
                            <div style="color:red">
                                <?php
                                if (isset($_REQUEST["validacion"])) {
                                    echo $_REQUEST["validacion"];
                                    echo "<br>";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" name="usu_direccion" value="<?php echo $datos->usu_direccion ?>" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="">Usuario</label>
                                <input type="text" class="form-control" name="usu_usuario" value="<?php echo $datos->usu_usuario ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="text" class="form-control" name="usu_correo" value="<?php echo $datos->usu_correo ?>" data-validation="email">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary float-right">Aceptar</button>
                            <br><br>

                            <div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>