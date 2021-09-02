<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>LISTADO CARGOS</header>
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
                            <a href="index.php?c=cargo&a=create" class="btn btn-info">Agregar<i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example3">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Nombre</th>
                            <th>Sueldo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) : ?>
                            <tr class="odd gradeX">
                                <td><?php echo $dato->car_id; ?> </td>
                                <td><?php echo $dato->car_nombre; ?> </td>
                                <td><?php echo $dato->car_sueldo; ?> </td>
                                <td><a  class="btn btn-info"  href="index.php?c=cargo&a=edit&id=<?php echo $dato->car_id ?>"><i class="fa fa-pencil"></i></a></td>
                                <td><a  class="btn btn-danger"  href="index.php?c=cargo&a=destroy&id=<?php echo $dato->car_id ?>" onclick="return confirm('Presion ok para borrar el registro')"><i class="fa fa-trash-o"></i></a></td>
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
        print("alert('" . $_REQUEST['validacion'] . "')");
        print("</script>");
    }
}
?>