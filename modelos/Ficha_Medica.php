<?php 
// incluir la conexion ala base datos 
require "../config/conexion.php";

Class Ficha_medica
{
    // implementamos nuestro constructor
    public function __construct()
    {

    }

    
    // emplementamos un metodo para el insert de registro
    public function insertar($agenda_id,$peso,$talla,$presion_art,$alergias,$temperatura,$habitos)
    {
        $sql="INSERT INTO ficha_medica (agenda_id,peso,talla,presion_art,alergias,temperatura,habitos) 
        VALUES ('$agenda_id','$peso','$talla','$presion_art','$alergias'
        ,'$temperatura','$habitos')";
        ejecutarConsulta($sql);
    
        $sql_detalle="UPDATE agenda set estado_cita='Consulta' where agenda_id='$agenda_id'";
        return ejecutarConsulta($sql_detalle);

                
    }
     
         	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($agenda_id)
	{
		$sql="SELECT a.agenda_id,a.fecha_cita,a.hora_cita,a.asunto,e.esp_nombre as especialidad
        ,pe.idpersona,concat(pe.per_nombre,' ',pe.per_apellido) as medico,p.paciente_cod
        ,p.pac_cedula,p.pac_nombre,p.pac_apellido,p.pac_fchnac,
        TIMESTAMPDIFF(YEAR, p.pac_fchnac, CURDATE()) as Edad,p.pac_sangre,
        p.pac_genero,p.pac_direccion,p.pac_resp
        from agenda a inner join paciente p on a.paciente_cod=p.paciente_cod
        inner join persona pe on a.medico_id=pe.idpersona
        inner join especialidad e on pe.esp_id=e.esp_id
        where a.agenda_id='$agenda_id'";
		return ejecutarConsultaSimpleFila($sql);
	}


     // Implementamos un metodo para listar en modulo de agenda
    public function listar(){
        $sql= "SELECT a.agenda_id,CONCAT(a.fecha_cita, ' ', a.hora_cita) as fecha,p.pac_cedula,
        CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres,CONCAT(pe.per_nombre, ' ', pe.per_apellido) as Medic
        ,CONCAT(r.per_nombre, ' ', r.per_apellido) as registrador,e.esp_nombre,a.asunto,
        a.costo_cita,a.estado_cita,a.estado_pago from agenda a inner join paciente p on p.paciente_cod=a.paciente_cod
        inner join persona pe on pe.idpersona=a.medico_id
        inner join persona r on a.registrador_id=r.idpersona
        inner join especialidad e on pe.esp_id=e.esp_id where a.estado_cita='Registrada' and a.estado_pago='Pagado'";
        return ejecutarConsulta($sql);
    }



    public function paciente(){
        $sql= "SELECT * FROM paciente";
        return ejecutarConsulta($sql);
    }

   
    public function especialidad(){
        $sql= "SELECT * FROM especialidad where estado=1 and not (esp_nombre='Ninguno')";
        return ejecutarConsulta($sql);

    }


    public function medico($esp_id){
        $sql= "SELECT * FROM persona p inner join usuario u where u.rol='Medico' and p.esp_id='$esp_id'";
        return ejecutarConsulta($sql);
    }



}




?>