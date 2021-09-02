<?php 

if(strlen(session_id()) < 1)
session_start();

//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Configuracion
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

    //Implementar un método para listar los registros
	public function editar($idconfiguracion,$razon_social,$ruc,$responsable,$email,$telefono,$direccion)
	{
        $sql="UPDATE configuracion set razon_social='$razon_social',ruc='$ruc',responsable='$responsable',
        email='$email',telefono='$telefono',direccion='$direccion' where idconfiguracion='$idconfiguracion'";
		return ejecutarConsulta($sql);		
	}
	

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idconfiguracion)
	{
		$sql="SELECT * FROM configuracion WHERE idconfiguracion='$idconfiguracion'";
		return ejecutarConsultaSimpleFila($sql);
	}


	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM configuracion";
		return ejecutarConsulta($sql);		
	}
}
?>