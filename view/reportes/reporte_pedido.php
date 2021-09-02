<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>REPORTE DE PEDIDOS</header>
                <div class="tools hidden">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <div>
                    <form method="post" action="index.php?c=reportes&a=consultarPedidos">
                        <div class="input-group input-group-sm">
                            Fecha Inicio 
                            <input type="text" class="form-control col-3" id="fecha" name="fechaInicio" placeholder="" data-mask="99-99-9999" value="<?php echo  isset($fechaInicio) == null ? "" : ($fechaInicio); ?>" data-toggle="datepicker">
                               Fecha Final 
                            <input type="text" class="form-control col-3" id="fecha" name="fechaFinal" placeholder="" data-mask="99-99-9999" value="<?php echo  isset($fechaFinal) == null ? "" : ($fechaFinal); ?>" data-toggle="datepicker">
                            <button type="submit" class="">Aceptar</button>
                        </div>
                    </form>
                    <br>
                </div>



                <div class="float-right">
                    <!-- Button trigger modal -->
                    <form method="post"  target="_blank" action="index.php?c=reportes&a=generarReportePedidoPDF">
                        <div class="input-group input-group-sm">
                            <input type="hidden" class="form-control col-3" id="fecha" name="fechaInicio" placeholder="" data-mask="99-99-9999" value="<?php echo  isset($fechaInicio) == null ? "" : ($fechaInicio); ?>" data-toggle="datepicker">
                            <input type="hidden" class="form-control col-3" id="fecha" name="fechaFinal" placeholder="" data-mask="99-99-9999" value="<?php echo  isset($fechaFinal) == null ? "" : ($fechaFinal); ?>" data-toggle="datepicker">
                            <button type="submit" class="btn btn-round btn-success">Exportar</button>
                        </div>
                    </form>

                </div>
                <br> <br>

                <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Masas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($datos != null) { ?>
                            <?php foreach ($datos as $dato) : ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $dato['cod']; ?> </td>
                                    <td><?php echo $dato['cliente']; ?> </td>
                                    <td><?php echo date("d-m-Y", strtotime($dato['fecha'])); ?> </td>
                                    <td><?php echo $dato['cantidad']; ?> </td>
                                    <td><?php echo $dato['precio']; ?> </td>
                                    <td><?php echo $dato['masas']; ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>