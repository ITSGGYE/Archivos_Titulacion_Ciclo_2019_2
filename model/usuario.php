<?php
require_once 'model/rol.php';

class Usuario
{

    private $pdo;

    public $usu_id;
    public $usu_nombre;
    public $usu_apellidos;
    public $usu_fecha_nacimiento;
    public $usu_cedula;
    public $usu_direccion;
    public $usu_correo;
    public $usu_usuario;
    public $usu_password;
    public $usu_hash;
    public $usu_estado;
    public $rol_id;

    public $rol;

    public function __CONSTRUCT()
    {
        try {
            $instance = ConnectDb::getInstance();
            $this->pdo = $instance->getConnection();

            $this->rol = new Rol();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $item = new Usuario();
            $resultado = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios usu, roles rol
                                        where usu.rol_id=rol.rol_id
                                        and usu.usu_usuario <>'adminpana'");
            $stm->execute();

            $datos = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach ($datos as $dato) {
                $item->usu_id = $dato['usu_id'];
                $item->usu_nombre = $dato['usu_nombre'];
                $item->usu_apellidos = $dato['usu_apellidos'];
                $item->usu_fecha_nacimiento = $dato['usu_fecha_nacimiento'];
                $item->usu_cedula = $dato['usu_cedula'];
                $item->usu_direccion = $dato['usu_direccion'];
                $item->usu_correo = $dato['usu_correo'];
                $item->usu_usuario = $dato['usu_usuario'];
                $item->usu_hash = $dato['usu_hash'];
                $item->usu_estado = $dato['usu_estado'];
                $item->rol_id = $dato['rol_id'];
                $item->rol->rol_id = $dato['rol_id'];
                $item->rol->rol_descripcion = $dato['rol_descripcion'];

                array_push($resultado, $item);
                $item = new Usuario();
            }
            return $resultado;
        } catch (Exception $e) {
        }
    }

    /**
     * Listar por rol de usuario 1=Admin 2=Profesional  3=Usuario normal
     */

    public function ListarPorRol($id_rol)
    {
        try {
            $item = new Usuario();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios usu, roles rol 
                                        where usu.rol_id=? usu.rol_id=rol.rol_id
                                        and usu.usu_usuario <>'adminpana'");
            $stm->execute(array($id_rol));

            $datos = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach ($datos as $dato) {
                $item->usu_id = $dato['usu_id'];
                $item->usu_nombre = $dato['usu_nombre'];
                $item->usu_apellidos = $dato['usu_apellidos'];
                $item->usu_fecha_nacimiento = $dato['usu_fecha_nacimiento'];
                $item->usu_cedula = $dato['usu_cedula'];
                $item->usu_direccion = $dato['usu_direccion'];
                $item->usu_correo = $dato['usu_correo'];
                $item->usu_usuario = $dato['usu_usuario'];
                $item->usu_hash = $dato['usu_hash'];
                $item->usu_estado = $dato['usu_estado'];
                $item->rol_id = $dato['rol_id'];
                $item->rol->rol_id = $dato['rol_id'];
                $item->rol->rol_descripcion = $dato['rol_descripcion'];
            }
            return $item;
        } catch (Exception $e) {
            //die($e->getMessage());
        }
    }

    /**
     * Listar por rol de usuario 1=Admin 2=Profesional  3=Usuario normal
     */

    public function ListarPorRolUsuariosActivos($id_rol)
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM usuarios 
            where rol_id=" . $id_rol . " and usu_estado=1");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
        }
    }

    public function ObtenerPorId($id)
    {
        try {
            $item = new Usuario();
            $stm = $this->pdo
                ->prepare("SELECT * FROM usuarios usu, roles rol 
                where usu.usu_id=? and usu.rol_id=rol.rol_id");

            $stm->execute(array($id));

            $datos = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach ($datos as $dato) {
                $item->usu_id = $dato['usu_id'];
                $item->usu_nombre = $dato['usu_nombre'];
                $item->usu_apellidos = $dato['usu_apellidos'];
                $item->usu_fecha_nacimiento = $dato['usu_fecha_nacimiento'];
                $item->usu_cedula = $dato['usu_cedula'];
                $item->usu_direccion = $dato['usu_direccion'];
                $item->usu_correo = $dato['usu_correo'];
                $item->usu_usuario = $dato['usu_usuario'];
                $item->usu_hash = $dato['usu_hash'];
                $item->usu_estado = $dato['usu_estado'];
                $item->rol_id = $dato['rol_id'];
                $item->rol->rol_id = $dato['rol_id'];
                $item->rol->rol_descripcion = $dato['rol_descripcion'];
            }
            return $item;
        } catch (Exception $e) {
            //die($e->getMessage());
        }
    }

    public function ObtenerPorUsuario($datos)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM usuarios WHERE usu_usuario = ?");


            $stm->execute(array($datos));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerPorCorreo($datos)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM usuarios WHERE usu_correo = ?");


            $stm->execute(array($datos));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerPorHash($datos)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM usuarios WHERE usu_hash = ?");


            $stm->execute(array($datos));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
        }
    }

    public function ObtenerPorCorreoPassword($usuario)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM usuarios WHERE usu_correo = ? and usu_password= ?");

            $stm->execute(array($usuario->correo, $usuario->password));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
        }
    }

    public function ObtenerPorUsuarioHash($usuario)
    {
        try {

            $stm = $this->pdo
                ->prepare("SELECT * FROM usuarios WHERE usu_usuario = ? and usu_hash= ?");

            $stm->execute(array($usuario->usu_usuario, $usuario->usu_hash));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function FiltroEspecial($datos)
    {
        try {
            $stm = $this->pdo
                ->prepare($datos);

            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
        }
    }


    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM usuarios WHERE usu_id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
        }
    }

    public function Actualizar(Usuario $data)
    {
        try {

            $sql = "UPDATE usuarios SET 
                usu_nombre 				= ?,
                usu_apellidos  			= ?,
                usu_fecha_nacimiento 	= ?,	 
                usu_cedula 				= ?,
                usu_direccion  			= ?,
                usu_correo 				= ?,
                usu_usuario 			= ?,
                usu_hash  				= ?,
                usu_estado  			= ?,
                rol_id					= ?

				WHERE usu_id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->usu_nombre,
                        $data->usu_apellidos,
                        $data->usu_fecha_nacimiento,
                        $data->usu_cedula,
                        $data->usu_direccion,
                        $data->usu_correo,
                        $data->usu_usuario,
                        $data->usu_hash,
                        $data->usu_estado,
                        $data->rol_id,
                        $data->usu_id
                    )
                );
        } catch (Exception $e) {
             die($e->getMessage());
        }
    }

    public function Insertar(usuario $data)
    {
        try {
            $sql = "INSERT INTO usuarios (
                                            usu_nombre, 				
                                            usu_apellidos,  			
                                            usu_fecha_nacimiento, 		 
                                            usu_cedula, 				
                                            usu_direccion,  			
                                            usu_correo, 				
                                            usu_usuario, 			
                                            usu_hash,  				
                                            usu_estado,
                                            rol_id
                                         )                                            
		            VALUES (?,?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->usu_nombre,
                        $data->usu_apellidos,
                        $data->usu_fecha_nacimiento,
                        $data->usu_cedula,
                        $data->usu_direccion,
                        $data->usu_correo,
                        $data->usu_usuario,
                        $data->usu_hash,
                        $data->usu_estado,
                        $data->rol_id
                    )
                );
        } catch (Exception $e) {
        }
    }
}
