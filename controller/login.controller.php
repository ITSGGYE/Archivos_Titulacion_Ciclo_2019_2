<?php
require_once 'model/usuario.php';
require_once 'model/sesion.php';

class LoginController
{

    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new Usuario();
        $this->session = new session();
    }

    public function Login()
    {
        require_once 'view/login/login.php';
    }

    /**
     * Verificar los datos del login
     */
    public function VerificarUsuario()
    {
        try {
            $usuario01 = new usuario();
            $usuario01->usu_hash = md5($_REQUEST['usu_password']);
            $usuario01->usu_usuario = $_REQUEST['usu_usuario'];

            $usuario02 = $this->model->ObtenerPorUsuario($usuario01->usu_usuario);

            if ($usuario01->usu_hash==$usuario02->usu_hash) {

                $this->session->init();
                $this->session->add('usu_id', $usuario02->usu_id);
                $this->session->add('usu_correo', $usuario02->usu_correo);
                $this->session->add('rol_id', $usuario02->rol_id);

                $vads=$this->session->get('usu_correo');
                $adflj=0;
               
                if (!isset($_SESSION)) {
                    throw new Exception('División por cero.');
                }

                header('Location: index.php?c=cliente&a=index');                
            } else {
                header('Location: index.php?c=login&a=login');
            }
        } catch (Exception $e) {
            die($e->getMessage());
            header('Location: index.php?c=login&a=login');
        }
    }

    /**
     * Cerrar sesion
     */
    public function logout()
    {
        $this->session->init();
        $this->session->close();
        header('location: index.php?c=login&a=login');
    }

   
}
