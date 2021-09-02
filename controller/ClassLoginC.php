<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once  '../constants/ClassConexion.php';
require_once  '../model/ClassLoginM.php';

class LoginC{
    public function get_Login($usuario,$password){
        $objLoginM = new LoginM();
        $control = $objLoginM->LoginControlM($usuario,$password);
        if ($control === 1) {
                session_start();
                $_SESSION['user_guanabaso'] = $usuario;
                $tipoUsuario = $objLoginM->getTypeUser($usuario);
                $_SESSION['type_user'] = $tipoUsuario;
                return 1;
        }else{
                return 0;
            }
    }
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];
if (empty($usuario) || empty($password)) {
    echo 2;
}else{
    if (isset($usuario) && isset($password)) {
        $objLoginC = new LoginC();
        echo $status = $objLoginC->get_Login($usuario, $password);
    } else {
        echo 0;
    }
}