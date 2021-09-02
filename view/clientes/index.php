<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>LISTADO CLIENTES</header>

            </div>
            <div class="card-body ">
                <div class="row p-b-20">
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="btn-group">
                            <a href="index.php?c=cliente&a=create" class="btn btn-info">Agregar<i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example3">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Telefono</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) : ?>
                            <tr class="odd gradeX">
                                <td> <?php echo $dato->cli_id; ?></td>
                                <td><?php echo $dato->cli_nombre; ?></td>
                                <td><?php echo $dato->cli_ciudad; ?></td>
                                <td><?php echo $dato->cli_telefono; ?></td>
                                <td><a class="btn btn-info" href="index.php?c=cliente&a=edit&id=<?php echo $dato->cli_id ?>"><i class="fa fa-pencil"></a></td>
                                <td><a class="btn btn-danger" onclick="return confirm('Presion ok para borrar el registro')" href="index.php?c=cliente&a=destroy&id=<?php echo $dato->cli_id ?>" id='el<?php echo $dato->cli_id ?>' onclick="verificarEliminar(<?php echo $dato->cli_id ?>)"><i class="fa  fa-trash-o"></i></i></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php
if (isset($_REQUEST['validacion'])) 
{
    print("<br><br><br><br>789798797987");
    if ($_REQUEST['validacion'] != "") 
    {
        print("<script>");
        print("alert(" . "'No se puede eliminar el registro ya esta asignado en los pedidos'" . ")");
        print("</script>");
    }
}
?>

<!-- Modal -->
<div class="modal fade" id="res_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog card card-topline-lightblue modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-body">
                No se puede eliminar el registro ya esta asignado en los pedidos
            </div>
        </div>
    </div>