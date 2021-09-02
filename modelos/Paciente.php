<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Paciente
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Comprobamos con este metodo si el ya existe
    public function insertar($pac_cedula,$pac_nombre,$pac_apellido,$pac_fchnac,$pac_sangre,$pac_genero,$pac_email,$pac_direccion,$pac_telf,$pac_resp,$pac_emerg)
	{
		
		$sql_detalle="SELECT pac_cedula from paciente where pac_cedula='$pac_cedula'";
        
        $consulta = ejecutarConsulta($sql_detalle);

		$filas=$consulta->num_rows;
		
		if($filas>0)
		{
           
			 echo "Ya existe un Paciente con esa Cedula  ";  
			
		}
		else{
             //Implementamos un método para registrar Pacientes
			$sql="INSERT INTO paciente (pac_cedula,pac_nombre,pac_apellido,pac_fchnac,pac_sangre,pac_genero,pac_email,pac_direccion,pac_telf,pac_resp,pac_emerg)
			VALUES ('$pac_cedula','$pac_nombre','$pac_apellido','$pac_fchnac','$pac_sangre','$pac_genero','$pac_email','$pac_direccion','$pac_telf','$pac_resp','$pac_emerg')";
			return ejecutarConsulta($sql);

		}
	}

	//Implementamos un método para editar registros
	public function editar($paciente_cod,$pac_cedula,$pac_nombre,$pac_apellido,$pac_fchnac,$pac_sangre,$pac_genero,$pac_email,$pac_direccion,$pac_telf,$pac_resp,$pac_emerg)
	{
		$sql="UPDATE paciente SET pac_cedula='$pac_cedula',pac_nombre='$pac_nombre',pac_apellido='$pac_apellido'
        ,pac_fchnac='$pac_fchnac',pac_sangre='$pac_sangre',pac_genero='$pac_genero',pac_email='$pac_email',pac_direccion='$pac_direccion',pac_telf='$pac_telf',pac_resp='$pac_resp',pac_emerg='$pac_emerg' 
        WHERE paciente_cod='$paciente_cod'";
		return ejecutarConsulta($sql);
	}


	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($paciente_cod)
	{
		$sql="SELECT * FROM paciente WHERE paciente_cod='$paciente_cod'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT paciente_cod,pac_cedula,pac_nombre,pac_apellido,
		TIMESTAMPDIFF(YEAR,pac_fchnac, CURDATE()) as Edad,pac_genero,
		pac_sangre,pac_direccion,pac_telf from paciente";
		return ejecutarConsulta($sql);		
	}


	//Implementar un método para validar la cedula del paciente
	public function validar_cedula($pac_cedula)
	{
		$sql="SELECT * from paciente where pac_cedula ='$pac_cedula'";
		return ejecutarConsulta($sql);		
	}
	

	public function eliminar($paciente_cod)
	{
		$sql="DELETE FROM paciente where paciente_cod='$paciente_cod'";
		return ejecutarConsulta($sql);
	}

     //Implementar un método para listar los registros y mostrar en el select
	public function paciente()
	{
		$sql="SELECT * FROM paciente";
		return ejecutarConsulta($sql);		
	}
 
    //Implementar un método para mostrar las historias clinicas del paciente
	public function historial_paciente($paciente_cod)
	{
		
		$sql="SELECT a.agenda_id,a.paciente_cod,a.fecha_cita,a.hora_cita,a.estado_cita,CONCAT(pe.per_nombre, ' ', pe.per_apellido) 
        as Medic,pe.per_cedula,e.esp_nombre,p.pac_cedula,CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres
        ,p.pac_fchnac,TIMESTAMPDIFF(YEAR, p.pac_fchnac, CURDATE()) as Edad,p.pac_sangre,p.pac_genero,p.pac_direccion,p.pac_resp,f.peso,f.talla,
        f.presion_art,f.alergias, f.temperatura,f.habitos,c.motivo_consulta,c.enfermedad_actual
        ,c.anteced,c.sintomas ,d.enfermedad,c.tratamiento from agenda a inner join persona pe on pe.idpersona=a.medico_id
         inner join especialidad e on pe.esp_id=e.esp_id inner join ficha_medica f on f.agenda_id=a.agenda_id
         inner join consulta c on c.agenda_id=a.agenda_id inner join paciente p on a.paciente_cod=p.paciente_cod 
         inner join diagnostico d on c.cod_diagnostico=d.cod_diagnostico where a.paciente_cod='$paciente_cod'";
		return ejecutarConsulta($sql);		
	}

}


?>