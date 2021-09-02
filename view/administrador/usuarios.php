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
    <title>Usuarios</title>
</head>

<body>
    <header>
        <?php require_once "../../constants/navbar-admin.html"; ?>
    </header>

    <main>
    <div class="title-indicator"> <span>USUARIOS</span> </div>
        <div class="container">

        <div class="boxes">
                <div class="images-boxes">
                   <a class="boxes-link" href="addUser.php"> <img src="../../images/produccion.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a class="boxes-link" href="addUser.php"> <span>Agregar Usuarios</span></a>
                </div>
            </div>

            <div class="boxes">
                <div class="images-boxes">
                   <a class="boxes-link" href="updateUser.php"> <img src="../../images/equipo.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a class="boxes-link" href="updateUser.php"> <span>Actualizar Usuarios</span></a>
                </div>
            </div>

            <div class="boxes">
                <div class="images-boxes">
                   <a class="boxes-link modal-trigger" href="#modal1"> <img src="../../images/equipo.png" alt="prosuctos-guanabaso" srcset=""></a>
                </div>
                <div class="title-boxes">
                   <a class="boxes-link modal-trigger" href="#modal1"> <span>Restablecer Contraseña</span></a>
                </div>
            </div>

        </div>
    </main>


    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <form action="../../controller/ClassUsuariosC.php" method="POST" enctype="multipart/form-data" id="reset_password_form" class="col s12">
                        <div class="center">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input onkeypress="return soloNumeros(event);" required onpaste="return false"  id="reset_password" name="reset_password" type="text" class="validate">
                                    <label for="reset_password">CEDULA * </label>
                                </div>
                                <input value="true"  id="form_reset_password" name="form_reset_password" type="hidden" >

                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">RESTABLECER CONTRASEÑA
                                        <i class="material-icons right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>
    <?php require_once "../../constants/footer.html"; ?>
    <script src="../../js/inputs-validation.js"></script>
    <script src="../../js/user.js"></script>
    <style>
        #usuarios-link {
            background-color: #FAB740;
        }
    </style>
</body>
</html>