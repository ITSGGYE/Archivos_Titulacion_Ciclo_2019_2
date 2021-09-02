<?php 

if(strlen(session_id()) < 1)
session_start();

// incluir la conexion ala base datos 
require "../config/conexion.php";

Class Consulta_medica
{
    // implementamos nuestro constructor
    public function __construct()
    {

    }

    
    // emplementamos un metodo para el insert de registro
    public function insertar($agenda_id,$motivo_consulta,$enfermedad_actual,$anteced
    ,$sintomas,$cod_diagnostico,$tratamiento)
    {
        $sql="INSERT INTO consulta (agenda_id,motivo_consulta,enfermedad_actual,anteced
        ,sintomas,cod_diagnostico,tratamiento) 
        VALUES ('$agenda_id','$motivo_consulta','$enfermedad_actual','$anteced'
        ,'$sintomas','$cod_diagnostico','$tratamiento')";
           $registro = ejecutarConsulta_retornarID($sql);
     
           if($registro > 0)
           {
            
            $sql_detalle="UPDATE agenda a inner join horario h on h.medico_id=a.medico_id 
            set a.estado_cita='Atendido',h.estado='Disponible' 
            where a.agenda_id='$agenda_id' and h.horario=a.hora_cita";
            return ejecutarConsulta($sql_detalle);

           }
    
        
    }


    public function registrar_receta($agenda_id,$medicamento,$concentracion,$cantidad,$dosis,$duracion)
    {
  
           $sql="INSERT INTO receta (agenda_id,medicamento,concentracion,cantidad,dosis,duracion) VALUES
            ('$agenda_id','$medicamento','$concentracion','$cantidad','$dosis','$duracion')";
            return ejecutarConsulta($sql);
        
    }
     

     
         	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($agenda_id)
	{
		$sql="SELECT a.agenda_id,a.fecha_cita,a.hora_cita,p.paciente_cod,f.peso,f.talla,f.presion_art,f.alergias,
        f.temperatura,f.habitos from agenda a inner join ficha_medica f on f.agenda_id=a.agenda_id
        inner join paciente p on a.paciente_cod=p.paciente_cod where a.agenda_id='$agenda_id'";
		return ejecutarConsultaSimpleFila($sql);
	}


     // Implementamos un metodo para listar en modulo de agenda
    public function listar($idpersona,$cedula){
        $sql="SELECT a.agenda_id,CONCAT(a.fecha_cita, ' ', a.hora_cita) as fecha,p.pac_cedula,
        CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres,CONCAT(pe.per_nombre, ' ', pe.per_apellido) as Medic
        ,CONCAT(r.per_nombre, ' ',r.per_apellido) as registrador,e.esp_nombre,a.asunto,
        a.costo_cita,a.estado_cita from agenda a inner join paciente p on p.paciente_cod=a.paciente_cod
        inner join persona pe on pe.idpersona=a.medico_id
        inner join persona r on a.registrador_id=r.idpersona
        inner join especialidad e on pe.esp_id=e.esp_id where a.estado_cita='Consulta' 
        or a.estado_cita='Atendido' and pe.idpersona='$idpersona' and pe.per_cedula='$cedula' order by fecha DESC ";
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


    public function historia_clinica($agenda_id)
	{
		$sql="SELECT a.agenda_id,a.fecha_cita,a.hora_cita,CONCAT(pe.per_nombre, ' ', pe.per_apellido) 
        as Medic,pe.per_cedula,e.esp_nombre,p.pac_cedula,CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres
        ,p.pac_fchnac,TIMESTAMPDIFF(YEAR, p.pac_fchnac, CURDATE()) as Edad,p.pac_sangre,p.pac_genero,p.pac_direccion,p.pac_resp,f.peso,f.talla,
        f.presion_art,f.alergias, f.temperatura,f.habitos,c.motivo_consulta,c.enfermedad_actual
        ,c.anteced,c.sintomas ,d.enfermedad,c.tratamiento from agenda a inner join persona pe on pe.idpersona=a.medico_id
         inner join especialidad e on pe.esp_id=e.esp_id inner join ficha_medica f on f.agenda_id=a.agenda_id
         inner join consulta c on c.agenda_id=a.agenda_id inner join paciente p on a.paciente_cod=p.paciente_cod 
         inner join diagnostico d on c.cod_diagnostico=d.cod_diagnostico where a.agenda_id='$agenda_id'";
		return ejecutarConsulta($sql);		
	}

    public function receta($agenda_id)
	{
		$sql="SELECT a.agenda_id,r.medicamento,r.concentracion,r.cantidad,r.dosis,r.duracion from agenda a 
        inner join receta r on a.agenda_id = r.agenda_id where a.agenda_id='$agenda_id'";
		return ejecutarConsulta($sql);		
	}


    public function diagnostico(){
        $sql= "SELECT * FROM diagnostico where estado=1";
        return ejecutarConsulta($sql);

    }

}




?>