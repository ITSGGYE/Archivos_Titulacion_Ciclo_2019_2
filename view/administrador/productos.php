<?php 
require_once "../../constants/sessionControlAdmin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../../constants/head.html"; ?>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <title>Inicio</title>
</head>

<body>
    <header>
        <?php require_once "../../constants/navbar-admin.html"; ?>
    </header>

    <main>
    <div class="title-indicator"> <span>PRODUCTOS</span> </div>
        <div class="container">
        <div class="boxes">
                <div class="images-boxes">
                   <a class="boxes-link" href="viewProduct.php"> <img src="../../images/orden.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a class="boxes-link" href="viewProduct.php"> <span>Ver Productos</span></a>
                </div>
            </div>

            <div class="boxes">
                <div class="images-boxes">
                   <a class="boxes-link" href="addProduct.php"> <img src="../../images/pedidos.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a class="boxes-link" href="addProduct.php"> <span>Agregar Producto</span></a>
                </div>
            </div>

            <div class="boxes">
                <div class="images-boxes">
                   <a class="boxes-link" href="updateProduct.php"> <img src="../../images/lapiz.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a class="boxes-link" href="updateProduct.php"> <span>Editar Producto</span></a>
                </div>
            </div>

        </div>
    </main>

    <?php require_once "../../constants/footer.html"; ?>
    <style>
        #productos-link {
            background-color: #FAB740;
        }
    </style>
</body>

</html>