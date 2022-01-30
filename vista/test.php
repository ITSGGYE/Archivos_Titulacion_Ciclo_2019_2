<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Test</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/misestilos.css">
    <link rel="stylesheet" href="../estilos/contra.css">
</head>
<body>

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>


    <?php 
        include_once('../pie/headertest.php');
    ?>

    <div class="Galery__principal" >
        <div class="galery">
            <img src="../imagenes/1.svg" class="img__galery" alt="">
        </div>
        <div class="galery">
            <img src="../imagenes/2.svg" class="img__galery" alt="">
        </div>
                
    </div>
    <div class="card bg-dark text-center mt-3">
                        <div class="card-body text-white">
                        El éxito no se logra sólo con cualidades especiales. Es sobre todo un trabajo de constancia, de método y de organización.
                        </div>
                        <div class="card-footer text-white">
                        Víctor Hugo.
             </div>
    </div>


    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
</body>
</html>