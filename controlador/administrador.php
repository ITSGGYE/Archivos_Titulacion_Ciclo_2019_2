<?php

    include_once('../modelo/funciones.php');


    $sql = new Modelo();


    $cifrado = password_hash($_POST['contra'],PASSWORD_DEFAULT);

    if(!$sql->Insertar($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['perfil'],$_POST['usuario'],$cifrado))
    {
        header('Location: ../vista/GestionUsuario.php');
    }else
    {
        echo 'no se pudo ingresar los datos por favor contacte al programador';
    }

?>