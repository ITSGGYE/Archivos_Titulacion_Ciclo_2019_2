<style>
    label.error {

        color: red;
        font-style: italic;

    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>REGISTRO DE PRODUCCION    <?php echo $produccion->pr_fecha; ?></header>
                <div style="margin:20px" class="float-right">
                    <!-- Button trigger modal -->
                    <a href="index.php?c=produccion&a=index" class="btn btn-info">Ver listado Produccion</a>
                </div>
            </div>
            <div class="card-body ">
                <div id="example-basic">
                    <h3>Empleados</h3>
                    <section>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example4">
                            <thead>
                                <tr>
                                    <th>Cod</th>
                                    <th>Nombre</th>
                                    <th>Cedula</th>
                                    <th>Cargo</th>
                                    <th>Sueldo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listadoEmpleados as $dato) : ?>
                                    <tr class="odd gradeX">
                                        <td><input type="hidden" name="emp_id" value="<?php echo $dato->emp_id ?>" />
                                            <?php echo  $dato->emp_id; ?></td>
                                        <td><?php echo  $dato->emp_nombre . "  " . $dato->emp_apellidos; ?></td>
                                        <td><?php echo  $dato->emp_cedula; ?></td>
                                        <td><?php echo  $dato->cargo->car_nombre; ?></td>
                                        <td><?php echo  $dato->cargo->car_sueldo; ?></td>
                                        <td><input onclick="setCheckedValue('chk<?php echo $dato->emp_id ?>')" id="chk<?php echo $dato->emp_id ?>" id="estado" type="checkbox"></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </section>
                    <h3>Detalle produccion</h3>
                    <section>
                        <form id="filter-form">    
                                <div class="form-group">
                                    <label for="pe_fecha">Fecha&nbsp;</label>
                                    <input type="text"  required class="form-control col-6" id="fecha" name="pr_fecha" id="pr_fecha" placeholder="Fecha" data-mask="99-99-9999" data-validation-format="dd-MM-yyyy" value="<?php echo $produccion->pr_fecha; ?>"    data-validation="date" data-validation-format="dd-mm-yyyy" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Horas de trabajo</label>
                                    <input type="number" required class="form-control col-6" name="pr_horas_trabajadas" id="pr_horas_trabajadas" value="" placeholder="" data-validation="number">
                                </div>
                                <div class="form-group">
                                    <label for="">Cantidad de panes totales</label>
                                    <input type="number" required class="form-control col-6" name="pr_cantidad_panes" id="pr_cantidad_panes" value="<?php echo $produccion->pr_cantidad_panes; ?>" placeholder="" data-validation="number" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Cantidad de masas</label>
                                    <input readonly type="number" class="form-control col-6" name="pr_masas" id="pr_masas" value="<?php echo $produccion->pr_masas; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="">Bono</label>
                                    <input readonly type="text" class="form-control col-6" name="pr_bono" id="bono" value="<?php echo  $produccion->pr_bono; ?>" placeholder="">
                                </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>