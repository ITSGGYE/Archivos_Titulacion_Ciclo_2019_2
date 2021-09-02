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
    <div class="title-indicator"> <span>REPORTES</span> </div>
        <div class="container">
        <div class="boxes">
                <div class="images-boxes">
                   <a target="_blank" class="boxes-link" href="../../constants/reporteProducts.php"> <img src="../../images/produccion.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a  class="boxes-link" href="../../constants/reporteProducts.php"> <span>Productos</span></a>
                </div>
            </div>

            <div class="boxes">
                <div class="images-boxes">
                   <a target="_blank" class="boxes-link" href="../../constants/reporteInventario.php"> <img src="../../images/proveedor.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a target="_blank" class="boxes-link" href="../../constants/reporteInventario.php"> <span>Inventario</span></a>
                </div>
            </div>


            <div class="boxes">
                <div class="images-boxes">
                   <a target="_blank" class="boxes-link" href="../../constants/reporteUsuarios.php"> <img src="../../images/equipo.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a target="_blank" class="boxes-link" href="../../constants/reporteUsuarios.php"> <span>Usuarios</span></a>
                </div>
            </div>

        </div>
    </main>

    <?php require_once "../../constants/footer.html"; ?>
    <style>
        #reportes-link {
            background-color: #FAB740;
        }
    </style>
</body>

</html>