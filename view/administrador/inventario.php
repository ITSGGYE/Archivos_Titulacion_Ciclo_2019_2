<?php 
require_once "../../constants/sessionControlAdmin.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "../../constants/head.html"; ?>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/addProduct.css">
    <link id="toast-status" rel="stylesheet" href="../../css/toast-red.css">
    <style>
        #inventario-link {
            background-color: #FAB740;
        }
    </style>
    <style>
        body{
            height: auto;
        }
    </style>
    <title>Inventario de Productos</title>
</head>

<body>
    <header>
        <?php require_once "../../constants/navbar-admin.html"; ?>
    </header>

    <main>
        <div class="title-indicator"> <span>Inventario de Productos</span> </div>

        <div class="container" id="table-product">
        <table class="highlight centered striped responsive-table">
        <thead>
          <tr>
              <th>#</th>
              <th>CODIGO DEL PRODUCTO </th>
              <th>NOMBRE DEL PRODUCTO</th>
              <th>PRECIO</th>
              <th>CANTIDAD</th>
              <th>ACCIONES</th>
          </tr>
        </thead>

        <tbody id="body-table">
         
        </tbody>
      </table>

      </div>

        <div class="container">
            <ul id="pagination" class="pagination">

            </ul>
        </div>
    </main>

    <?php require_once "../../constants/footer.html"; ?>
    <script src="../../js/inputs-validation.js"></script>
    <script src="../../js/productos-edit.js"></script>
    <script src="../../js/paginacion.js"></script>

    <div id="addItems" class="modal">
        <div class="modal-content">
            <center>
                <div class="row">

                    <form class="col s12" id="addItems" enctype="multipart/form-data" method="POST" action="../../controller/ClassInventarioC.php">

                        <div class="row">
                            <div class="input-field col s6">
                                <input readonly onpaste="return false"  id="codigo_producto" name="codigo_producto" type="text">
                            </div>
                            <div class="input-field col s6">
                                <input  onpaste="return false"  id="cantidad" name="cantidad" type="text">
                                <label for="cantidad">Cantidad</label>
                            </div>
                            <div class="input-field col s6" style="display:none;">
                                <input  id="addItems" name="addItems" type="text" value="true">
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light green" type="submit" name="action">AGREGAR ITEMS
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
            </center>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>

    <div id="removeItems" class="modal">
        <div class="modal-content">
            <center>
                <div class="row">

                    <form class="col s12" id="removeItems" enctype="multipart/form-data" method="POST" action="../../controller/ClassInventarioC.php">

                        <div class="row">
                            <div class="input-field col s6">
                                <input readonly onpaste="return false"  id="codigo_producto_d" name="codigo_producto_d" type="text">
                            </div>
                            <div class="input-field col s6">
                                <input  onpaste="return false"  id="cantidad_d" name="cantidad_d" type="text">
                                <label for="cantidad_d">Cantidad</label>
                            </div>
                            <div class="input-field col s6" style="display:none;">
                                <input  id="removeItems" name="removeItems" type="text" value="true">
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light red" type="submit" name="action">ELIMINAR ITEMS
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
            </center>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>
</body>

</html>