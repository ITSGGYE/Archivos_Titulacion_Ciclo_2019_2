<?php
require_once 'model/usuario.php';
require_once 'model/sesion.php';
/**
 * Clase controlador para adminsitrar usuarios
 */

class UsuarioController
{

    private $model;
    private $session;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->model = new Usuario();
    }

    /**
     * Listado de usuarios
     */
    public function Index()
    {
        $session = new Session();
        if (!isset($_SESSION)) {
            $session->init();
        }

        $id = $session->get('usu_id');
        $usuario = (new Usuario())->ObtenerPorId($id);


        $datos = $this->model->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/usuarios/index.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Show the form for editing rol.
     *
     */
    public function EditarRol()
    {
        $id = $_REQUEST['id'];
        $datos = $this->model->ObtenerPorId($id);
        $roles = (new Rol())->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/usuarios/edit_rol.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Show the form for editing rol.
     *
     */
    public function EditarPerfil()
    {
        $id = $_REQUEST['usu_id'];
        $datos = $this->model->ObtenerPorId($id);
        $roles = (new Rol())->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/usuarios/perfil.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Show the form for cambiar password.
     *
     */
    public function CambiarPassword()
    {
        $id = $_REQUEST['usu_id'];
        $datos = $this->model->ObtenerPorId($id);

        require_once 'view/header_dashboard.php';
        require_once 'view/usuarios/cambiar_password.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Show the form for cambiar password.
     *
     */
    public function UpdatePassword()
    {
        $validacion = " ";
        $session = new Session();
        $session->init();
        $id = $session->get('usu_id');
        $usuario = (new Usuario())->ObtenerPorId($id);

        $password_actual = $_REQUEST['password_actual'];
        $hashActualVerificar = md5($password_actual);


        $pass = $_REQUEST['pass'];


        if ($usuario->usu_hash == $hashActualVerificar) {
            $usuario->usu_hash = md5($pass);
            $this->model->Actualizar($usuario);
        } else {

            $validacion = "* El password actual es incorrecto";
            header('Location: index.php?c=usuario&a=CambiarPassword&usu_id=' . $usuario->usu_id . "&validacion=" . $validacion);
            die;
        }

        require_once 'view/header_dashboard.php';
        require_once 'view/usuarios/cambiar_password.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function UpdateRol()
    {
        $usu_id = $_REQUEST['usu_id'];
        $rol_id = $_REQUEST['rol_id'];
        $datos = $this->model->ObtenerPorId($usu_id);

        $datos->rol_id = $rol_id;

        $this->model->Actualizar($datos);

        header('Location: index.php?c=usuario&a=index');
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function UpdatePerfil()
    {
        $validacion = " ";
        $session = new Session();
        $session->init();
        $id = $session->get('usu_id');
        $datos = (new Usuario())->ObtenerPorId($id);

        $correoViejo = $datos->usu_correo;

        $datos->usu_nombre = $_REQUEST['usu_nombre'];
        $datos->usu_apellidos = $_REQUEST['usu_apellidos'];
        $datos->usu_fecha_nacimiento = date("Y-m-d", strtotime($_REQUEST['usu_fecha_nacimiento']));
        $datos->usu_cedula = $_REQUEST['usu_cedula'];
        $datos->usu_direccion = $_REQUEST['usu_direccion'];
        $datos->usu_usuario = $_REQUEST['usu_usuario'];
        $datos->usu_correo = $_REQUEST['usu_correo'];
        $datos->usu_cedula = $_REQUEST['usu_cedula'];

        if ($correoViejo != $datos->usu_correo) {
            $consultarCorreo = (new Usuario())->ObtenerPorCorreo($datos->usu_correo);

            if (!empty($consultarCorreo)) {

                $validacion = "Correo ya existe";

                header('Location: index.php?c=usuario&a=EditarPerfil&usu_id=' . $datos->usu_id . "&validacion=" . $validacion);
                die();
            }
        }

        $this->model->Actualizar($datos);

        header('Location: index.php?c=usuario&a=EditarPerfil&usu_id=' . $datos->usu_id);
    }

    public function create()
    {
        $roles = (new Rol())->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/usuarios/registro.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Guardar datos usuario
     */
    public function store()
    {
        try{
            $error_validacion = "";

            $datos = new usuario();
    
            $datos->usu_nombre = $_REQUEST['usu_nombre'];
            $datos->usu_apellidos = $_REQUEST['usu_apellidos'];
            $datos->usu_fecha_nacimiento = $_REQUEST['usu_fecha_nacimiento'];
            $datos->usu_cedula = $_REQUEST['usu_cedula'];
            $datos->usu_direccion = $_REQUEST['usu_direccion'];
            $datos->usu_correo = $_REQUEST['usu_correo'];
            $datos->usu_usuario = $_REQUEST['usu_usuario'];
            $datos->usu_hash = md5($_REQUEST['pass']);
            $datos->rol_id = $_REQUEST['rol_id'];
    
    
            $verificacion = $this->model->ObtenerPorCorreo($_REQUEST['usu_correo']);
    
            if (!empty($verificacion)) {
                $error_validacion = "Correo ya existe";
                header('Location: index.php?c=usuario&a=create&' . 
                    "&error_validacion=" .  $error_validacion);
                die;
            }
    
            $verificacion = $this->model->ObtenerPorUsuario($_REQUEST['usu_usuario']);
    
            if (!empty($verificacion)) {
                $error_validacion = "Usuario ya existe";
                header('Location: index.php?c=usuario&a=create&' . 
                    "&error_validacion=" .  $error_validacion);
                die;
            }
    
            $datos->usu_estado = 0;
    
    
            $datos->usu_fecha_nacimiento = date("Y-m-d", strtotime($datos->usu_fecha_nacimiento));
    
            $this->model->Insertar($datos);
         
        }catch(Exception $e){

        }
        
        header('Location: index.php?c=usuario&a=index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {
        $id = $_REQUEST['id'];

        $this->model->Eliminar($id);
        header('Location: index.php?c=usuario&a=index');
    }
}
