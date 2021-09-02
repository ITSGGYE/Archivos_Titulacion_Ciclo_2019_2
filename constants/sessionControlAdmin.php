<?php
session_start();
if (isset($_SESSION['user_guanabaso'])){
    if($_SESSION['type_user'] != 1){
        header('location : ../../constants/sessionControl.php');
    }
}else{
    unset($_SESSION);
    header('location: ../../index.php');
}