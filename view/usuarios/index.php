<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>LISTADO USUARIOS</header>

            </div>
            <div class="card-body ">
                <div class="row p-b-20">
                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="btn-group">
                            <a href="index.php?c=usuario&a=create" class="btn btn-info">Agregar<i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column full-width" id="example3">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) {
                            if ($usuario->usu_id != $dato->usu_id) {
                        ?>
                                <tr class="odd gradeX">
                                    <td> <?php echo $dato->usu_id; ?></td>
                                    <td><?php echo $dato->usu_nombre . " " . $dato->usu_apellidos; ?></td>
                                    <td><?php echo $dato->usu_correo; ?></td>
                                    <td><?php echo $dato->usu_usuario; ?></td>
                                    <td><?php echo $dato->rol->rol_descripcion; ?></td>
                                    <td>
                                        <a class="btn btn-info" href="index.php?c=usuario&a=EditarRol&id=<?php echo $dato->usu_id;  ?>">Cambiar Rol</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="index.php?c=usuario&a=destroy&id=<?php echo $dato->usu_id;?>" onclick="return confirm('Presion ok para borrar el registro')">Eliminar</a>
                                    </td>
                                </tr>
                        <?php  }
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>