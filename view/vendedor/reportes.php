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
    <?php include_once '../../constants/navbar_vendedor.html'; ?>
</header>

<main>
    <div class="container">
        <div class="boxes">
            <div class="images-boxes">
                <a class="boxes-link" href="reporteDiario.php"> <img src="../../images/produccion.png" alt="prosuctos-guanabaso" srcset=""></a>
            </div>
            <div class="title-boxes">
                <a class="boxes-link" href="reporteDiario.php"> <span>Diario</span></a>
            </div>
        </div>

        <div class="boxes">
            <div class="images-boxes">
                <a class="boxes-link" href="formReportes.php"> <img src="../../images/tablero.png" alt="prosuctos-guanabaso" srcset=""></a>
            </div>
            <div class="title-boxes">
                <a class="boxes-link" href="formReportes.php"> <span>Mensual</span></a>
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
