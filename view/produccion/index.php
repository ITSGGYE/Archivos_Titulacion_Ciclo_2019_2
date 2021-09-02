<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>LISTADO PRODUCCION</header>
                <div class="tools hidden">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>

            <div class="card-body ">
                <div id="datosProduccionTotal">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example3">
                        <thead>
                            <tr>
                                <th>Cod</th>
                                <th>Fecha</th>
                                <th>Cantidad de panes realizados</th>
                                <th>Masas</th>
                                <th>Horas trabajadas</th>
                                <th>Bono</th>
                                <th></th>
                                <th></th>     
                                <th></th>               
                            </tr>
                        </thead>
                        <tbody id="bodyTotalPedidos">
                            <?php foreach ($datos as $dato) : ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $dato->pr_id; ?> </td>
                                    <td><?php echo $dato->pr_fecha; ?> </td>
                                    <td><?php echo $dato->pr_cantidad_panes; ?> </td>                                    
                                    <td><?php echo $dato->pr_masas; ?> </td>
                                    <td><?php echo $dato->pr_horas_trabajadas; ?> </td>
                                    <td><?php echo $dato->pr_bono; ?> </td>  
                                    <td>
                                        <button onclick="obtenerListadoDetallesProduccion('<?php echo ($dato->pr_id); ?>')" class="btn btn-round btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="fa  fa-search"></i></button> </td>
                                    <td>
                                        <a  href="index.php?c=produccion&a=create&fecha=<?php echo $dato->pr_fecha; ?>&pr_id=<?php echo $dato->pr_id; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></i></a>
                                    </td>
                                    <td>
                                    <a href="index.php?c=produccion&a=destroy&pr_id=<?php echo $dato->pr_id ?>" class="btn btn-danger" onclick="return confirm('Presion ok para borrar el registro')"><i class="fa  fa-trash-o"></i></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog card card-topline-lightblue modal-lg" role="document">
        <div class="modal-content">
            <div class="card-head">
                <header>Detalle Produccion<span id="fechaActualDetalle"></span></header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="res">

                </div>

            </div>
        </div>
    </div>