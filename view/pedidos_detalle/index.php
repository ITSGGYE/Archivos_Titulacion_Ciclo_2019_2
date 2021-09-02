<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>LISTADO PEDIDOS POR DIA</header>
                <div class="tools hidden">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">

                <div>
                    <form method="post" action="index.php?c=pedidosdetalle&a=buscarPorFecha">
                        <input type="hidden" name="comvertirFecha" value="1" />
                        <div class="input-group input-group-sm">
                            <label for="pe_fecha">Fecha </label>
                            <input type="text" class="form-control col-3" id="fecha" name="fecha" placeholder="Fecha" data-mask="99-99-9999" value="<?php echo $fecha ?>" data-toggle="datepicker">
                            <button type="submit" class="">Buscar</button>
                        </div>
                    </form>
                    <br>
                </div>

                <div class="float-right">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#exampleModal" <?php echo $datos==null?'disabled=""':""; ?>>
                        Ver total de pedidos
                    </button>
                </div>

                <div class="row p-b-20">
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="btn-group">
                            <a href="index.php?c=pedidosdetalle&a=create&fecha=<?php echo isset($fecha)?$fecha:"" ?>" id="createlink" name="create" value="" class="btn btn-info">Agregar<i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example3">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Masas</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) : ?>
                            <tr class="odd gradeX">
                                <td><?php echo $dato->pe_id; ?></td>
                                <td><?php echo $dato->cliente->cli_nombre; ?></td>
                                <td><?php echo $dato->pe_fecha; ?></td>
                                <td><?php echo $dato->pe_cantidad; ?></td>
                                <td><?php echo $dato->pe_precio; ?></td>
                                <td><?php echo $dato->pe_masas; ?></td>
                                <td><a  class="btn btn-info"  href="index.php?c=pedidosdetalle&a=edit&id=<?php echo $dato->pe_id ?>"><i class="fa fa-pencil"></i></a></td>
                                <td><a  class="btn btn-danger"  href="index.php?c=pedidosdetalle&a=destroy&id=<?php echo $dato->pe_id ?>&fecha=<?php echo $dato->pe_fecha ?>" onclick="return confirm('Presion ok para borrar el registro')"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog card card-topline-lightblue modal-md" role="document">
        <div class="modal-content">
            <div class="card-head">
                <header>Total del pedido</header>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Fecha</label>
                    <input type="text" class="form-control" value=" <?php echo $totalPedido->tp_fecha; ?>" readonly="">
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" class="form-control" value="<?php echo $totalPedido->tp_cantidad_pedidos; ?>" readonly="">
                </div>
                <div class="form-group">
                    <label>Masas</label>
                    <input type="text" class="form-control" value=" <?php echo $totalPedido->tp_masas; ?>" readonly="">
                </div>
            
            </div>
       
            <div class="modal-footer">
            <a  href="index.php?c=produccion&a=create&fecha=<?php echo $totalPedido->tp_fecha; ?>&pr_id=0&pr_cantidad_panes=<?php echo $totalPedido->tp_cantidad_pedidos; ?>&pr_masas=<?php echo $totalPedido->tp_masas; ?>" class="btn btn-info">Agregar Produccion</a>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>