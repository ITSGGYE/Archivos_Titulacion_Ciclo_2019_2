<?php 
// incluir la conexion ala base datos 
require "../config/conexion.php";


Class Horario
{
    // implementamos nuestro constructor
    public function __construct()
    {

    }


    // emplementamos un metodo para el insert de registro
    public function insertar($medico_id,$cod_dia,$hora_inicio,$hora_fin,$intervalo)
    {
      

            $inicio=date("H:i",strtotime($hora_inicio)); 
            $fija = $inicio;
            $temp = $intervalo;
            $fin=date("H:i",strtotime($hora_fin));
            
    
         
           $intervalo=$intervalo*60;
         
             while($inicio < $fin)
             {
         
           
                $sql="INSERT INTO horario (medico_id,cod_dia,inicio,fin,intervalo,horario,estado) 
               VALUES ('$medico_id','$cod_dia','$fija','$fin','$temp','$inicio','Disponible')";
               ejecutarConsulta($sql);
         
                
                 $inicio=date("H:i",strtotime($inicio)+$intervalo);
    
         
             }


         
    }



     // Implementamos un metodo para listar en modulo de agenda
    public function listar(){
        $sql= "SELECT h.idhorario,h.medico_id,concat(p.per_nombre,' ',p.per_apellido) as Nombres,d.cod_dia,d.dia,
        concat(h.inicio,' a ',h.fin) as Atencion,h.intervalo,h.estado from horario h 
        inner join dia d on h.cod_dia=d.cod_dia
        inner join persona p on h.medico_id=p.idpersona group by Nombres,Atencion,d.dia";
        return ejecutarConsulta($sql);
    }



        // Implementamos un metodo para anular una consulta
        public function eliminar_horario($medico_id,$cod_dia)
        {
            $sql="DELETE from horario where medico_id='$medico_id' and cod_dia='$cod_dia'";
            return ejecutarConsulta($sql);
        }
        


    public function medico(){
        $sql= "SELECT * FROM persona p inner join usuario u on u.usuario_id=p.idpersona 
        where u.rol='Medico' and u.estado=1";
        return ejecutarConsulta($sql);
    }

    public function dia($medico_id){
        $sql="SELECT cod_dia,dia from dia where dia not in 
        (SELECT d.dia from dia d inner join 
        horario h on h.cod_dia=d.cod_dia where medico_id='$medico_id'
        group by d.dia)";
        return ejecutarConsulta($sql);
    }

     

}




?>