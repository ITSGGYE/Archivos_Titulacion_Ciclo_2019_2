
<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Diagnostico
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($codigo,$enfermedad)
	{
		$sql="INSERT INTO diagnostico (codigo,enfermedad,estado)
		VALUES ('$codigo','$enfermedad',1)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($cod_diagnostico,$codigo,$enfermedad)
	{
		$sql="UPDATE diagnostico SET codigo='$codigo',enfermedad='$enfermedad' WHERE cod_diagnostico='$cod_diagnostico'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($cod_diagnostico)
	{
		$sql="UPDATE diagnostico SET estado='0' WHERE cod_diagnostico='$cod_diagnostico'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($cod_diagnostico)
	{
		$sql="UPDATE diagnostico SET estado='1' WHERE cod_diagnostico='$cod_diagnostico'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($cod_diagnostico)
	{
		$sql="SELECT * FROM diagnostico WHERE cod_diagnostico='$cod_diagnostico'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM diagnostico";
		return ejecutarConsulta($sql);		
	}

	 	//Implementar un método para listar los registros
	public function listar_activos()
	{
		$sql="SELECT * FROM diagnostico where estado=1";
		return ejecutarConsulta($sql);		
	}
}


?>