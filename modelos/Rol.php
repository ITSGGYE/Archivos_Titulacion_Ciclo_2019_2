<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Rol
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($rol,$modulo)
	{
		$sql="INSERT INTO rol (rol,estado)
		VALUES ('$rol',1)";
		return ejecutarConsulta($sql);
	
		//return ejecutarConsulta($sql);
		$newidrol=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($modulo))
		{
			$sql_detalle = "INSERT INTO rol_modulo(rol_id,modulo_id) VALUES('$newidrol', '$modulo[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	
	
	}

	//Implementamos un método para editar registros
	public function editar($rol_id,$rol,$modulo)
	{
		$sql="UPDATE rol SET rol='$rol' WHERE rol_id='$rol_id'";
		ejecutarConsulta($sql);
	

		//Eliminamos todos los permisos asignados para volverlos a registrar
		$sqldel="DELETE FROM rol_modulo WHERE rol_id='$rol_id'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($modulo))
		{
			$sql_detalle = "INSERT INTO rol_modulo(rol_id, modulo_id) VALUES('$rol_id', '$modulo[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	
	
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($rol_id)
	{
		$sql="UPDATE rol SET estado='0' WHERE rol_id='$rol_id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($rol_id)
	{
		$sql="UPDATE rol SET estado='1' WHERE rol_id='$rol_id'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($rol_id)
	{
		$sql="SELECT * FROM rol WHERE rol_id='$rol_id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM rol";
		return ejecutarConsulta($sql);		
	}
	
	 //Implementar un método para listar los permisos marcados
	public function listarmarcados($rol_id)
	{
		$sql="SELECT * FROM rol_modulo WHERE rol_id='$rol_id'";
		return ejecutarConsulta($sql);
	}

    //Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM rol where estado=1";
		return ejecutarConsulta($sql);		
	}

}


?>