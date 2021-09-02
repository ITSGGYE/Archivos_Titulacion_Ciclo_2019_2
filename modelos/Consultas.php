<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function historiasrecetas($fecha_inicio,$fecha_fin)
	{
		$sql="SELECT a.agenda_id,p.paciente_cod,a.fecha_cita,a.hora_cita,
        CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres,CONCAT(pe.per_nombre, ' ', pe.per_apellido) as Medic
        ,e.esp_nombre,a.costo_cita,a.estado_cita,a.estado_pago 
        from agenda a inner join paciente p on p.paciente_cod=a.paciente_cod
        inner join persona pe on pe.idpersona=a.medico_id
        inner join especialidad e on pe.esp_id=e.esp_id where a.estado_cita='Atendido' and a.estado_pago='Pagado' 
		and a.fecha_cita>='$fecha_inicio' AND a.fecha_cita<='$fecha_fin'";
		return ejecutarConsulta($sql);		
	}

	public function pacienteconsultas($paciente_cod)
	{
		$sql="	SELECT a.agenda_id,p.paciente_cod,a.fecha_cita,a.hora_cita,
		CONCAT(pe.per_nombre, ' ', pe.per_apellido) as Medic
        ,e.esp_nombre,a.costo_cita,a.estado_cita,a.estado_pago 
        from agenda a inner join paciente p on p.paciente_cod=a.paciente_cod
        inner join persona pe on pe.idpersona=a.medico_id
        inner join especialidad e on pe.esp_id=e.esp_id where a.paciente_cod='$paciente_cod'";
		return ejecutarConsulta($sql);		
	}

	public function citasmedicas($fecha_inicio,$fecha_fin,$esp_id)
	{
		$sql="SELECT a.agenda_id,a.fecha_cita,a.hora_cita,
        CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres,CONCAT(pe.per_nombre, ' ', pe.per_apellido) as Medic
        ,CONCAT(r.per_nombre, ' ',r.per_apellido) as registrador,e.esp_nombre,a.costo_cita,a.estado_cita,a.estado_pago 
        from agenda a inner join paciente p on p.paciente_cod=a.paciente_cod
        inner join persona pe on pe.idpersona=a.medico_id
		inner join persona r on a.registrador_id=r.idpersona
		inner join especialidad e on pe.esp_id=e.esp_id where a.fecha_cita>='$fecha_inicio' and a.fecha_cita<='$fecha_fin'
		and e.esp_id='$esp_id'";
		return ejecutarConsulta($sql);		
	}
	 

	public function totalpacientes()
	{
		$sql="SELECT count(paciente_cod) as TotalPacientes from paciente";
		return ejecutarConsulta($sql);
	}

	public function totalPersonal()
	{
		$sql="SELECT count(idpersona) as TotalPersonal from persona";
		return ejecutarConsulta($sql);
	}

	public function totalEspecialidad()
	{
		$sql="SELECT count(esp_id) as TotalEspecialidades from especialidad";
		return ejecutarConsulta($sql);
	}

	/*
	public function ingresostotales()
	{
		$sql="SELECT sum(costo_cita) as TotalGanancias from agenda 
		where estado_cita='Atendido' and estado_pago='Pagado'";
		return ejecutarConsulta($sql);
	}*/

     /*
	public function total_horarios()
	{
		$sql="SELECT count(idhorario) as total_horarios from horario";
		return ejecutarConsulta($sql);
	}*/

	
	public function citastotales()
	{
		$sql="SELECT count(agenda_id) as CitasTotales from agenda";
		return ejecutarConsulta($sql);
	}


	public function historiastotales()
	{
		$sql="SELECT count(idconsulta) as HistoriasTotales from consulta";
		return ejecutarConsulta($sql);
	}

	public function totalhoy()
	{
		$sql="SELECT IFNULL(SUM(costo_cita),0) as 
        ingresos_hoy FROM agenda WHERE DATE(fecha_cita)=curdate() and estado_pago='Pagado' and estado_cita='Atendido'";
		return ejecutarConsulta($sql);
	}


	public function citas_hoy()
	{
		$sql="SELECT a.agenda_id,a.hora_cita as Hora,a.fecha_cita,
        CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres,CONCAT(pe.per_nombre, ' ', pe.per_apellido) as Medic
        ,e.esp_nombre,a.asunto,a.estado_cita from agenda a inner join paciente p on p.paciente_cod=a.paciente_cod
        inner join persona pe on pe.idpersona=a.medico_id
        inner join persona r on a.registrador_id=r.idpersona
        inner join especialidad e on pe.esp_id=e.esp_id where a.estado_cita='Registrada' or a.estado_cita='Consulta' and a.fecha_cita = curdate();";
		return ejecutarConsulta($sql);
	}

	public function citasultimos_10dias()
	{


		$sql="SELECT CONCAT(DAY(fecha_cita),' de ',MONTHNAME(fecha_cita)) as fecha
        ,count(agenda_id) as total FROM agenda GROUP by fecha_cita ORDER BY fecha_cita DESC limit 0,10";
		return ejecutarConsulta($sql);
	}

	public function citasultimos_12meses()
	{
		$sql="SELECT DATE_FORMAT(fecha_cita,'%M') as fecha,count(agenda_id) as total 
        FROM agenda GROUP by MONTH(fecha_cita) ORDER BY fecha_cita DESC limit 0,10";
		return ejecutarConsulta($sql);
	}

	public function citas_estados()
	{
		$sql="SELECT estado_pago,count(agenda_id) as total from agenda group by estado_pago order by estado_pago";
		return ejecutarConsulta($sql);
	}

	public function especialidades_solicitadas()
	{
		$sql="SELECT e.esp_nombre as Especialidad,count(agenda_id) as Total
		from agenda a inner join persona pe on pe.idpersona=a.medico_id
		inner join especialidad e on pe.esp_id=e.esp_id group by Especialidad order by Especialidad";
		return ejecutarConsulta($sql);
	}
}

?>