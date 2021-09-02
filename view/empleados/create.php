<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Crear Empleado</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form method="post" action="index.php?c=empleado&a=store">
                    <div class="form-group">
                        <label for="emp_nombre">Nombre</label>
                        <input type="text" class="form-control" name="emp_nombre" placeholder="Nombre" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label for="emp_apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="emp_apellidos" placeholder="Apellidos" data-validation="required">
                    </div>

                    <div class="form-group">
                        <label>Cargo</label>   
                        <select class="form-control" id='car_id' name='car_id'>   
                            <?php foreach ($cargos as $cargo) : ?>
                                <option value="<?php echo $cargo->car_id; ?>" >    
                                    <?php echo $cargo->car_nombre; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="emp_cedula">Cedula</label>
                        <input type="text" class="form-control" data-mask="9999999999"  id="emp_cedula" name="emp_cedula" placeholder="Cedula" data-validation="number">
                    </div>
             
                    <div class="form-group">
                        <label for="emp_fecha_nacimiento">Fecha nacimiento</label>
                        <input type="text" class="form-control" name="emp_fecha_nacimiento"  placeholder="Fecha nacimiento" 
                        data-toggle="datepicker" data-validation="date" data-validation-format="dd/mm/yyyy">
                    </div>                   
                    <div class="form-group">
                        <label for="emp_direccion">Direccion</label>
                        <input type="text" class="form-control" name="emp_direccion" placeholder="Direccion" data-validation="required">
                    </div>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>