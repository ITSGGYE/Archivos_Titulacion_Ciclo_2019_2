<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Especialidad
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($esp_nombre,$esp_descripcion)
	{
		
		$sql_detalle="SELECT esp_nombre from especialidad where esp_nombre='$esp_nombre'";
        
        $consulta = ejecutarConsulta($sql_detalle);

		$filas=$consulta->num_rows;
		
		if($filas>0)
		{
           
			 echo "Ya Existe una Especialidad con ese Nombre";  
			
		}
		else{

			$sql="INSERT INTO especialidad (esp_nombre,esp_descripcion,estado)
			VALUES ('$esp_nombre','$esp_descripcion',1)";
			return ejecutarConsulta($sql);
			
		}



		
		
	
	}

	//Implementamos un método para editar registros
	public function editar($esp_id,$esp_nombre,$esp_descripcion)
	{
		$sql="UPDATE especialidad SET esp_nombre='$esp_nombre',esp_descripcion='$esp_descripcion' WHERE esp_id='$esp_id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($esp_id)
	{
		$sql="UPDATE especialidad SET estado='0' WHERE esp_id='$esp_id'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($esp_id)
	{
		$sql="UPDATE especialidad SET estado='1' WHERE esp_id='$esp_id'";
		return ejecutarConsulta($sql);
	}

		//Implementamos un método para activar categorías
		public function eliminar($esp_id)
		{
			$sql="DELETE FROM especialidad WHERE esp_id='$esp_id'";
			return ejecutarConsulta($sql);
		}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($esp_id)
	{
		$sql="SELECT * FROM especialidad WHERE esp_id='$esp_id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM especialidad where not esp_nombre='Ninguna'";
		return ejecutarConsulta($sql);		
	}

    //Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM especialidad where estado=1";
		return ejecutarConsulta($sql);		
	}


     //Implementar un método para listar los registros y mostrar en el select
	public function medico($esp_id)
	{
		$sql="SELECT * FROM medico where esp_id='$esp_id' and estado=1";
		return ejecutarConsulta($sql);		
	}
	 
}


?>