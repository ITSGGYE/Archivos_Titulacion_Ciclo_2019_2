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
        #usuarios-link {
            background-color: #FAB740;
        }
    </style>
    <title>Agregar Usuarios</title>
</head>

<body>
<header>
    <?php require_once "../../constants/navbar-admin.html"; ?>
</header>

<main>
    <div class="title-indicator"> <span>Agregar Usuario</span> </div>
    <div class="container">
        <div class="row card-panel">
            <form action="../../controller/ClassUsuariosC.php" method="POST" enctype="multipart/form-data" id="agregar_usuario_form" class="col s12">
                <div class="center">
                    <div class="row">
                        <div class="input-field col s12">
                            <input onkeypress="return soloNumeros(event);" required onpaste="return false"  id="cedula" name="cedula" type="text" class="validate">
                            <label for="cedula">CEDULA * </label>
                        </div>
                        <div class="input-field col s6">
                            <input onkeypress="return soloLetras(event)" required onpaste="return false"  id="primer_nombre" name="primer_nombre" type="text" class="validate">
                            <label for="primer_nombre">PRIMER NOMBRE * </label>
                        </div>
                        <div class="input-field col s6">
                            <input  onkeypress="return soloLetras(event)" onpaste="return false"  id="segundo_nombre" name="segundo_nombre" type="text">
                            <label for="segundo_nombre">SEGUNDO NOMBRE </label>
                        </div>
                        <div class="input-field col s6">
                            <input onkeypress="soloLetras(event)" required onpaste="return false"  id="primer_apellido" name="primer_apellido" type="text" class="validate">
                            <label for="primer_nombre">PRIMER APELLIDO * </label>
                        </div>
                        <div class="input-field col s6">
                            <input onkeypress="soloLetras(event)" required  onpaste="return false"  id="segundo_apellido" name="segundo_apellido" type="text" class="validate">
                            <label for="segundo_nombre">SEGUNDO APELLIDO * </label>
                        </div>
                        <div class="input-field col s12">
                            <input onpaste="return false" required  id="fecha" name="fecha" type="text" class="validate datepicker">
                            <label for="fecha">FECHA DE NACIMIENTO *</label>
                        </div>
                        <div class="input-field col s12">
                            <input onkeypress="return soloMail(event)" required  onpaste="return false"  id="direccion" name="direccion" type="text" class="validate">
                            <label for="direccion">DIRECCION * </label>
                        </div>
                        <div class="input-field col s6">
                            <input onkeypress="return soloNumeros(event)" required  onpaste="return false"  id="telefono" name="telefono" type="text" class="validate">
                            <label for="telefono">TELÉFONO * </label>
                        </div>
                        <div class="input-field col s6">
                            <input onkeypress="return soloNumeros(event)" required  onpaste="return false"  id="celular" name="celular" type="text" class="validate">
                            <label for="celular">CELULAR * </label>
                        </div>
                        <div class="input-field col s12">
                            <input onkeypress="return soloMail(event)" onpaste="return false"  required  id="correo" name="correo" type="email" class="validate">
                            <label for="correo">CORREO ELECTRÓNICO *</label>
                        </div>
                        <div class="input-field col s12">
                           <select id="tipo_usuario" name="tipo_usuario" class="validate" required>
                               <option disabled selected>TIPO DE USUARIO</option>
                               <option value="1">ADMINISTRADOR</option>
                               <option value="2">VENDEDOR</option>
                           </select>
                        </div>
                        <div class="input-field col s6">
                            <input id="form_check_usuario" name="form_check_usuario" value="true" type="hidden">
                        
                        </div>
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action">AGREGAR USUARIO
                                <i class="material-icons right"></i>
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
<script src="../../js/user.js"></script>
</body>

</html>

