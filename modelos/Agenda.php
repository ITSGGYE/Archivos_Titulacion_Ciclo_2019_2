<?php 

if(strlen(session_id()) < 1)
session_start();


// incluir la conexion ala base datos 
require "../config/conexion.php";

Class Agenda
{
    // implementamos nuestro constructor
    public function __construct()
    {

    }
    // emplementamos un metodo para el insert de registro
    public function insertar($paciente,$medico_id,$registrador_id,$asunto,$costo_cita,$fecha_cita,$idhorario,$estado_pago)
    {
        $sql="INSERT INTO agenda (paciente_cod,medico_id,registrador_id,asunto,costo_cita,fecha_cita,hora_cita,estado_pago,estado_cita) 
        VALUES ('$paciente','$medico_id','$registrador_id','$asunto','$costo_cita','$fecha_cita',(SELECT horario from horario where idhorario='$idhorario'),'$estado_pago','Registrada')";
        $registro = ejecutarConsulta_retornarID($sql);
     
        if($registro > 0)
        {
            $sql="UPDATE horario set estado='Ocupado' where idhorario='$idhorario'";
        return ejecutarConsulta($sql);
        }
       


        
    }

   


     // Implementamos un metodo para listar en modulo de agenda
    public function listar(){
        $sql= "SELECT a.agenda_id,CONCAT(a.fecha_cita, ' ', a.hora_cita) as fecha,p.pac_cedula,
        CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres,CONCAT(pe.per_nombre, ' ', pe.per_apellido) as Medic
        ,CONCAT(r.per_nombre, ' ', r.per_apellido) as registrador,e.esp_nombre,a.asunto,
        a.costo_cita,a.estado_cita,a.estado_pago from agenda a inner join paciente p on p.paciente_cod=a.paciente_cod
        inner join persona pe on pe.idpersona=a.medico_id
        inner join persona r on a.registrador_id=r.idpersona
        inner join especialidad e on pe.esp_id=e.esp_id where a.estado_cita='Registrada'";
        return ejecutarConsulta($sql);
    }

    // Implementamos un metodo para anular una consulta
    public function anular_cita($agenda_id)
	{
        
        $sql="UPDATE agenda a inner join horario h on h.medico_id=a.medico_id 
        set a.estado_pago='Anulado',a.estado_cita='Anulada',h.estado='Disponible' 
        where a.agenda_id='$agenda_id' and h.horario=a.hora_cita";
		 return ejecutarConsulta($sql);

        }




    public function pagar_cita($agenda_id)
	{
		$sql="UPDATE agenda SET estado_pago='Pagado' WHERE agenda_id='$agenda_id'";
		return ejecutarConsulta($sql);
	}


    public function paciente(){
        $sql= "SELECT * FROM paciente";
        return ejecutarConsulta($sql);
    }

    public function buscar($busqueda){
        $sql= "SELECT * from paciente where pac_cedula like '%$busqueda%' or
        pac_nombre like '%$busqueda%' or pac_apellido like '%$busqueda%' limit 1";
        return ejecutarConsulta($sql);
    }
   
    public function especialidad(){
        $sql= "SELECT * FROM especialidad where estado=1 and not (esp_nombre='Ninguna')";
        return ejecutarConsulta($sql);

    }


    public function medico($esp_id){
        $sql= "SELECT * FROM persona p inner join usuario u on u.usuario_id=p.idpersona 
          where u.estado= 1 and p.esp_id='$esp_id'";
        return ejecutarConsulta($sql);
    }


    public function horario($fecha_cita,$medico_id){
       
        
        $fecha =$fecha_cita;

       
        $dia = date("l", strtotime($fecha)); 

  

        switch($dia)
  {   
        case "Monday":
        $dayNameSpanish = "Lunes";
        break;
  
        case "Tuesday":
        $dayNameSpanish = "Martes";
        break;
  
        case "Wednesday":
        $dayNameSpanish = "Miercoles";
        break;
  
        case "Thursday":
        $dayNameSpanish = "Jueves";
        break;
  
        case "Friday":
        $dayNameSpanish = "Viernes";
        break;
  
  
        case "Saturday":
        $dayNameSpanish = "Sabado";
        break;
        
        case "Sunday":
        $dayNameSpanish = "Domingo";
        break;
        
  
  }
        
          
       date_default_timezone_set("America/Guayaquil"); 

       $fecha_hoy=date("Y-m-d");
        
       if($fecha_cita>$fecha_hoy){


        $sql= "SELECT * FROM horario h inner join dia d on h.cod_dia=d.cod_dia 
        where d.dia='$dayNameSpanish'and h.medico_id='$medico_id' and h.estado='Disponible'";
        return ejecutarConsulta($sql);


       }
       else
       {

        $sql= "SELECT * FROM horario h inner join dia d on h.cod_dia=d.cod_dia 
        where d.dia='$dayNameSpanish'and h.medico_id='$medico_id' and h.horario>=time (NOW()) and h.estado='Disponible'";
        return ejecutarConsulta($sql);

       }
       
     
    }

    public function ticket($agenda_id){
        $sql= "SELECT a.agenda_id,a.fecha_cita,a.hora_cita,p.pac_cedula,
        CONCAT(p.pac_nombre, ' ', p.pac_apellido) as Nombres,CONCAT(pe.per_nombre, ' ', pe.per_apellido) as Medic
        ,CONCAT(r.per_nombre, ' ', r.per_apellido) as registrador,e.esp_nombre,a.asunto,
        a.costo_cita,a.estado_cita,a.estado_pago from agenda a inner join paciente p on p.paciente_cod=a.paciente_cod
        inner join persona pe on pe.idpersona=a.medico_id
        inner join persona r on a.registrador_id=r.idpersona
        inner join especialidad e on pe.esp_id=e.esp_id where a.agenda_id='$agenda_id'";
        return ejecutarConsulta($sql);
    }

}




?>