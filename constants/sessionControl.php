<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
if(isset($_SESSION['user_guanabaso'],$_SESSION["type_user"])){
    if ($_SESSION['type_user'] == 1){
        header('location: ../view/administrador/index.php');
    }elseif($_SESSION['type_user'] == 2){
        header('location: ../view/vendedor/index.php');
    }else{
        include 'logout.php';
    }
}else{
    echo "<br> yes4";
    include 'logout.php';
}
