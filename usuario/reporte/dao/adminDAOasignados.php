<?php
require_once '../db/accesoDB.php';
date_default_timezone_set("America/Lima");
function fechaNormal($fecha){
	$nfecha = date('d/m/Y',strtotime($fecha));
	return $nfecha;
}
class adminDAO{
	public function allBitacora(){
		try{
			$pdo = AccesoDB::getConnectionPDO();
			$sql = ' SELECT * 
			FROM cita c
			JOIN paciente p
			ON c.paciente=p.id_paciente
			JOIN especialista e
			ON c.id_especialista =e.id_especialista
			JOIN especialidad d
			ON  e.id_especialidad=d.id_especialidad
			where cit_estado="asignado"
			ORDER BY c.id_cita
			';
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$return = $stmt->fetchAll();
			return $return;
		} catch (Exception $e){
			throw $e;
		}	
	}
	public function buscarAllBitacoraFecha($desde,$hasta){
		try{
			$pdo = AccesoDB::getConnectionPDO();
			$sql = 'SELECT * 
			FROM cita c
			JOIN paciente p
			ON c.paciente=p.id_paciente
			JOIN especialista e
			ON c.id_especialista =e.id_especialista
			JOIN especialidad d
			ON  e.id_especialidad=d.id_especialidad
			WHERE fecha BETWEEN "'.$desde.'" AND "'.$hasta.'" AND cit_estado="asignado"
			ORDER BY c.id_cita
			';
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$return = $stmt->fetchAll();
			return $return;
		} catch (Exception $e){
			throw $e;
		}	
	}
}
?>