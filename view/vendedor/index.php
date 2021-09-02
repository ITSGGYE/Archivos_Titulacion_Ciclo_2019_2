<?php
//require_once "../../constants/sessionControlAdmin.php";
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
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo center">Guanabaso</a>
                <ul class="right hide-on-med-and-down">
                </ul>
            </div>
        </nav>
    </div>
</header>

<main>
    <div class="container">
        <div class="boxes">
            <div class="images-boxes">
                <a class="boxes-link" href="facturacion.php"> <img src="../../images/produccion.png" alt="prosuctos-guanabaso" srcset=""></a>
            </div>
            <div class="title-boxes">
                <a class="boxes-link" href="facturacion.php"> <span>Facturación</span></a>
            </div>
        </div>

        <div class="boxes">
            <div class="images-boxes">
                <a class="boxes-link" href="reportes.php"> <img src="../../images/tablero.png" alt="prosuctos-guanabaso" srcset=""></a>
            </div>
            <div class="title-boxes">
                <a class="boxes-link" href="reportes.php"> <span>Reportes</span></a>
            </div>
        </div>


    </div>
</main>

<?php require_once "../../constants/footer.html"; ?>
<style>
    #inicio-link {
        background-color: #FAB740;
    }
</style>
</body>

</html>