<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../constants/ClassConexion.php';
require_once '../model/ClassUsuariosM.php';

class UsuariosC
{
    private $objUsuariosM;
    private $usuariosM;

    public function __construct()
    {
        $this->objUsuariosM = new UsuariosM();
        $this->usuariosM = $this->objUsuariosM;
    }

    public function setUsuarios($argCedula,$argPrimerNombre,$argSegundoNombre,$argPrimerApellido,$argSegundoApellido,$argFecha,$argDireccion,$argTelefono,$argCelular,$argCorreo,$argTipoUsuario){
        try {
           $mensaje =  $this->usuariosM->createNewUser($argCedula,$argPrimerNombre,$argSegundoNombre,$argPrimerApellido,$argSegundoApellido,$argFecha,$argDireccion,$argTelefono,$argCelular,$argCorreo,$argTipoUsuario);
            if ($mensaje != NULL){
                $message = array("MENSAJE"=>$mensaje,"ESTADO"=>"1");
                return $message;
            }else{
                $message = array("MENSAJE"=>"NO SE REGISTRO AL USUARIO","ESTADO"=>"0");
                return $message;
            }
        }catch(PDOException $e){
            die("Error: ".$e->getMessage());
        }
    }

    public function setUpdateUsuarios($argCedula,$argPrimerNombre,$argSegundoNombre,$argPrimerApellido,$argSegundoApellido,$argFecha,$argDireccion,$argTelefono,$argCelular,$argCorreo,$argTipoUsuario){
        try {
            $mensaje =  $this->usuariosM->updateUser($argCedula,$argPrimerNombre,$argSegundoNombre,$argPrimerApellido,$argSegundoApellido,$argFecha,$argDireccion,$argTelefono,$argCelular,$argCorreo,$argTipoUsuario);
            if ($mensaje != NULL){
                $message = array("MENSAJE"=>$mensaje,"ESTADO"=>"1");
                return $message;
            }else{
                $message = array("MENSAJE"=>"NO SE ACTUALIZO AL USUARIO","ESTADO"=>"0");
                return $message;
            }
        }catch(PDOException $e){
            die("Error: ".$e->getMessage());
        }
    }

    public function getDataUsuario($argCedula){
        try {
            $data =  $this->usuariosM->getDataUser($argCedula);
            if ($data != NULL){
                return $data;
            }else{
                return NULL;
            }
        }catch(PDOException $e){
            die("Error: ".$e->getMessage());
        }
    }

    public function setResetPassword($argCedula){
        try {
            $mensaje =  $this->usuariosM->setResetPassword($argCedula);
            if ($mensaje != NULL){
                $message = array("MENSAJE"=>$mensaje,"ESTADO"=>"1");
                return $message;
            }else{
                $message = array("MENSAJE"=>"NO SE RESTABLECIO LA CONTRASEÑA","ESTADO"=>"0");
                return $message;
            }
        }catch(PDOException $e){
            die("Error: ".$e->getMessage());
        }
    }
}

$objUsuariosC = new UsuariosC();
$usuariosC = $objUsuariosC;

if (isset($_POST["form_check_usuario"])){
    if ($_POST["form_check_usuario"] == "true"){
        extract($_POST);
        if (empty($cedula) || empty($primer_nombre) || empty($segundo_nombre) || empty($primer_apellido) || empty($segundo_apellido) ||
            empty($fecha) || empty($direccion) || empty($telefono) || empty($celular) || empty($correo) || empty($tipo_usuario)){
            echo json_encode($estado = array("MENSAJE"=>"COMPLETE TODOS LOS CAMPOS DEL FORMULARIO","ESTADO"=>"2"));
        }else {
            echo json_encode($estado = $usuariosC->setUsuarios($cedula, $primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$fecha,$direccion,$telefono,$celular,$correo,$tipo_usuario));
        }
    }
}

if (isset($_POST["form_update_usuario"])){
    if ($_POST["form_update_usuario"] == "true"){
        extract($_POST);
        if (empty($cedula) || empty($primer_nombre) || empty($segundo_nombre) || empty($primer_apellido) || empty($segundo_apellido) ||
            empty($fecha) || empty($direccion) || empty($telefono) || empty($celular) || empty($correo) || empty($tipo_usuario)){
            echo json_encode($estado = array("MENSAJE"=>"COMPLETE TODOS LOS CAMPOS DEL FORMULARIO","ESTADO"=>"2"));
        }else {
            echo json_encode($estado = $usuariosC->setUpdateUsuarios($cedula, $primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$fecha,$direccion,$telefono,$celular,$correo,$tipo_usuario));
        }
    }
}

if (isset($_GET["find_cedula"])){
    if ($_GET["find_cedula"] != NULL){
        extract($_GET);
        if (empty($find_cedula)){
            echo json_encode($estado = array("MENSAJE"=>"COMPLETE TODOS LOS CAMPOS DEL FORMULARIO","ESTADO"=>"2"));
        }else {
            $estado = $usuariosC->getDataUsuario($_GET["find_cedula"]);
            echo  json_encode($estado);
        }
    }
}

if (isset($_POST["form_reset_password"])){
    if ($_POST["form_reset_password"] == "true"){
        extract($_POST);
        if (empty($reset_password)){
            echo json_encode($estado = array("MENSAJE"=>"COMPLETE TODOS LOS CAMPOS DEL FORMULARIO","ESTADO"=>"2"));
        }else {
            echo json_encode($estado = $usuariosC->setResetPassword($reset_password));
        }
    }
}
