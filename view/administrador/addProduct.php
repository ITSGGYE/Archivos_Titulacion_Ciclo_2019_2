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
        #productos-link {
            background-color: #FAB740;
        }
    </style>
    <title>Agregar Productos</title>
</head>

<body>
    <header>
        <?php require_once "../../constants/navbar-admin.html"; ?>
    </header>

    <main>
        <div class="title-indicator"> <span>Agregar Productos</span> </div>
        <div class="container">
            <div class="row card-panel">
                <form action="../../controller/ClassProductosC.php" method="POST" enctype="multipart/form-data" id="agregar_productos_form" class="col s12">
                    <div class="center">
                        <div class="row">
                            <div class="input-field col s6">
                                <input readonly onpaste="return false"  id="codigo_producto" name="codigo_producto" type="text">
                                <label for="codigo_producto">Código del Producto</label>
                            </div>
                            <div class="input-field col s6">
                                <input onpaste="return false" required  id="nombre_producto" name="nombre_producto" type="text" class="validate">
                                <label for="nombre_producto">Nombre del Producto</label>
                            </div>
                            <div class="input-field col s6">
                                <select name="tipo_presentacion" required id="tipo_presentacion">
                                    <option disabled selected value="">Tipo de Presentación</option>
                                </select>
                            </div>
                            <div class="input-field col s6">
                                <input onpaste="return false" onkeypress="return soloPrecios(event);" required  id="precio" name="precio" type="text" class="validate">
                                <label for="precio">Precio del Producto</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="form_check" name="form_check" value="true" type="hidden">
                               
                            </div>
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action">AGREGAR PRODUCTO
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php require_once "../../constants/footer.html"; ?>
    <script src="../../js/inputs-validation.js"></script>
    <script src="../../js/productos.js"></script>
</body>

</html>