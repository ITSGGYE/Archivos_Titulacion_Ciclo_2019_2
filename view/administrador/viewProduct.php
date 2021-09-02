<?php 
require_once "../../constants/sessionControlAdmin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../../constants/head.html"; ?>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/addProduct.css">
    <link id="toast-status" rel="stylesheet" href="../../css/toast-red.css">
    <title>View Productos</title>
    <style>
        .title-boxes span {
            font-size: 0.8rem;
            letter-spacing: 0.1rem;
        }
    </style>
</head>

<body>
<style>
    .container{
        display: flex;
        justify-content: center;
    }
    .contenido{
        width: 100%;
    }
    
    .boxes{
        width: 15%;
    }
</style>
    <header>
        <?php require_once "../../constants/navbar-admin.html"; ?>
    </header>

    <main>
        <div class="title-indicator"> <span>PRODUCTOS</span> </div>
        <div  class="container">
            <div id="container" class="contenido">
            
            </div>
        </div>
        <center>
            <form class="col s12" id="formGetProduct" action="../../controller/ClassProductosC.php" method="get">
                <input style="display:none" type="text" name="start" id="start" value="0">
                <input style="display:none" type="text" name="finish" id="finish" value="10">
                <input style="display:none" type="text" name="getProductos" id="getProductos" value="true">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">CARGAR PRODUCTO
                        <i class="material-icons right"></i>
                    </button>
                </div>
            </form>
        </center>
    </main>

    <?php require_once "../../constants/footer.html"; ?>
    <style>
        #productos-link {
            background-color: #FAB740;
        }
    </style>
    <script src="../../js/productos.js"></script>
</body>

</html>