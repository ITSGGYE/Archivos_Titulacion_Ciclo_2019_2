<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}


	//Implementamos un método para insertar registros
    public function insertar($usu_nom,$usu_correo,$rol_id,$usu_login,$usu_clave)
	{
		$sql="INSERT INTO usuario (usu_nom,usu_correo,rol_id,usu_login,usu_clave,estado)
		VALUES ('$usu_nom','$usu_correo','$rol_id','$usu_login','$usu_clave',1)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($usuario_id,$usu_nom,$usu_correo,$rol_id,$usu_login,$usu_clave)

	{
		$sql="UPDATE usuario SET usu_nom='$usu_nom',usu_correo='$usu_correo'
        ,rol_id='$rol_id',usu_login='$usu_login',usu_clave='$usu_clave' 
         WHERE usuario_id='$usuario_id'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar ($usuario_id)
	{
		$sql="SELECT * FROM usuario WHERE usuario_id='$usuario_id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT u.usuario_id,u.usu_nom,u.usu_correo,r.r_nombre as roles,u.usu_login,u.estado 
		from usuario u inner join rol r on u.rol_id = r.rol_id";
		return ejecutarConsulta($sql);		
	}

	public function eliminar($usuario_id)
	{
		$sql="DELETE FROM usuario where usuario_id='$usuario_id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($usuario_id)
	{
		$sql="UPDATE usuario SET estado='0' WHERE usuario_id='$usuario_id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($usuario_id)
	{
		$sql="UPDATE usuario SET estado='1' WHERE usuario_id='$usuario_id'";
		return ejecutarConsulta($sql);
	}

	//Función para verificar el acceso al sistema
	public function verificar($usu_login,$usu_clave)
    {
    	$sql="SELECT usuario_id,usu_nom,usu_ced,usu_correo,usu_telf
		,usu_dir,usu_sexo,usu_login FROM usuario WHERE usu_login='$usu_login' 
		AND usu_clave='$usu_clave' AND estado='1'"; 
    	return ejecutarConsulta($sql);  
    }

}


?>