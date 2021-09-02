<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>LISTADO TOTALES PEDIDOS POR DIA</header>
                <div class="tools hidden">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <div class="row p-b-20">
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="btn-group">
                            <a href="index.php?c=pedidostotal&a=create" class="btn btn-info">Agregar<i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column full-width"
                    id="example3">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Fecha de los pedidos</th>
                            <th>Total pedidos</th>
                            <th>Total masas</th>                            
                            <th></th> 
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($datos as $dato) : ?>
                        <tr class="odd gradeX">
                            <td><?php echo $dato->tp_id; ?> </td>
                            <td><?php echo $dato->tp_fecha; ?> </td> 
                            <td><?php echo $dato->tp_cantidad_pedidos; ?> </td>
                            <td><?php echo $dato->tp_masas; ?> </td>                            
                            <td>
                            <a href="index.php?c=pedidosdetalle&a=buscarPorFecha&fecha=<?php echo $dato->tp_fecha; ?>" 
                            id="createlink" name="create" value="" class="btn btn-success">Ver detalles</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                

            </div>
        </div>
    </div>
</div>