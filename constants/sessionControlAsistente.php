<?php
session_start();
if (isset($_SESSION['user_sga'])){
    if($_SESSION['type_user'] != 2){
        header('location : ../../constants/sessionControl.php');
    }
}else{
    include '../../constants/logout.php';
}