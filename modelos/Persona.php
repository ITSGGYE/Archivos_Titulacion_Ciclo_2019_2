<?php 


//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";



Class Persona
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($per_cedula,$per_nombre,$per_apellido,$per_fchnac,$per_genero,$per_email
	,$per_telf,$esp_id,$rol,$acceso,$clave,$modulo)
	{
		
		


		$sql_detalle="SELECT * from persona p inner join usuario u on u.usuario_id=p.idpersona where 
		p.per_cedula='$per_cedula' or u.acceso='$acceso'";
        
        $consulta = ejecutarConsulta($sql_detalle);

		$filas=$consulta->num_rows;
		
		if($filas>0)
		{
           
			 echo "No se registrar al Usuario ya que tiene una 
			 cedula o usuario existente en el sistema";  
			
		}
		else{

			$sql="INSERT INTO persona (per_cedula,per_nombre,per_apellido,per_fchnac,per_genero
			,per_email,per_telf,esp_id)
			VALUES ('$per_cedula','$per_nombre','$per_apellido','$per_fchnac','$per_genero','$per_email'
			,'$per_telf','$esp_id')";
			$idpersonanew=ejecutarConsulta_retornarID($sql);
		 
			$sql_detalle="INSERT into usuario (usuario_id,rol,acceso,clave,estado) 
			values ('$idpersonanew','$rol','$acceso','$clave',1)";
			ejecutarConsulta($sql_detalle);
				  
		
			$num_elementos=0;
			$sw=true;
	
			while ($num_elementos < count($modulo))
			{
				$sql_detalle = "INSERT INTO usuario_modulo(usuario_id, modulo_id) VALUES('$idpersonanew', '$modulo[$num_elementos]')";
				ejecutarConsulta($sql_detalle) or $sw = false;
				$num_elementos=$num_elementos + 1;
			}
	
			return $sw;
		

		}


	}

	//Implementamos un método para editar registros
	public function editar($idpersona,$per_cedula,$per_nombre,$per_apellido,$per_fchnac,$per_genero
	,$per_email,$per_telf,$esp_id,$rol,$acceso,$clave,$modulo)
	{
		$sql="UPDATE persona p inner join usuario u on u.usuario_id=p.idpersona
		set p.per_cedula='$per_cedula',p.per_nombre='$per_nombre',p.per_apellido='$per_apellido'
			  ,p.per_fchnac='$per_fchnac',p.per_genero='$per_genero',p.per_email='$per_email'
			  ,p.per_telf='$per_telf',p.esp_id='$esp_id',u.rol='$rol',u.acceso='$acceso',u.clave='$clave'
			  WHERE p.idpersona ='$idpersona'";
		ejecutarConsulta($sql);
	
	
		//Eliminamos todos los permisos asignados para volverlos a registrar
		$sqldel="DELETE FROM usuario_modulo WHERE usuario_id='$idpersona'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($modulo))
		{
			$sql_detalle = "INSERT INTO usuario_modulo(usuario_id, modulo_id) VALUES('$idpersona', '$modulo[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
	
	
	
	
	}

	    	//Implementar un método para listar los registros
 	    public function eliminar($idpersona)
	    {
			$sql="DELETE p,h FROM persona p 
			LEFT JOIN horario h ON p.idpersona = h.medico_id 
			WHERE p.idpersona='$idpersona'";
			return ejecutarConsulta($sql);

			$sql2="DELETE u,um FROM usuario u 
			LEFT JOIN usuario_modulo um ON u.usuario_id = um.usuario_id 
			WHERE u.usuario_id='$idpersona'";
			return ejecutarConsulta($sql2);
					
	     }  


		//Implementamos un método para desactivar categorías
		public function desactivar($idpersona)
		{
			$sql="UPDATE usuario SET estado='0' WHERE usuario_id='$idpersona'";
			return ejecutarConsulta($sql);
		}
	
		//Implementamos un método para activar categorías
		public function activar($idpersona)
		{
		
			$sql="UPDATE usuario SET estado='1' WHERE usuario_id='$idpersona'";
			return ejecutarConsulta($sql);
		}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpersona)
	{
		$sql="SELECT * from persona p inner join usuario u on u.usuario_id=p.idpersona
		where p.idpersona='$idpersona'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT p.idpersona,p.per_cedula,concat(p.per_nombre,' ',p.per_apellido) as Nombres,u.acceso,p.per_genero
        ,p.per_email,u.rol,e.esp_nombre,u.estado from persona p inner join especialidad e
        on p.esp_id=e.esp_id inner join usuario u on u.usuario_id=p.idpersona";
		return ejecutarConsulta($sql);		
	}


	public function validar_cedula($per_cedula)
	{
		$sql="SELECT * from persona where per_cedula ='$per_cedula'";
		return ejecutarConsulta($sql);		
	}

	public function validar_usuario($acceso)
	{
		$sql="SELECT * from usuario where acceso ='$acceso'";
		return ejecutarConsulta($sql);		
	}

		 //Implementar un método para listar los permisos marcados
		 public function listarmarcados($idpersona)
		 {
			 $sql="SELECT * FROM usuario_modulo WHERE usuario_id='$idpersona'";
			 return ejecutarConsulta($sql);
		 }

		 	//Función para verificar el acceso al sistema
	public function verificar($acceso,$clave)
    {
    	$sql="SELECT p.idpersona,p.per_cedula,p.per_nombre,p.per_apellido,p.per_fchnac
		,p.per_genero,p.per_email,p.per_telf,p.esp_id,u.usuario_id,u.rol,u.acceso 
		from persona p inner join usuario u on u.usuario_id=p.idpersona
          WHERE u.acceso='$acceso' AND u.clave='$clave' AND u.estado=1"; 
    	return ejecutarConsulta($sql);  
    }

}


?>