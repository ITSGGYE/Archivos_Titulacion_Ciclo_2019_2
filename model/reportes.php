<?php
class Reporte
{
	private $pdo;

    public function __CONSTRUCT()
	{
		try
		{
			$instance = ConnectDb::getInstance();
			$this->pdo = $instance->getConnection();    
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
    
    public function ReporteProduccion($fechaInicio,$fechaFinal)
	{
		try {
			
			$stm = $this->pdo->prepare("select em.emp_id 'cod',pr.pr_fecha 'fecha', concat(em.emp_nombre,' ',em.emp_apellidos) 'empleado',
			pr.pr_cantidad_panes 'panes', pr.pr_masas 'masas', ca.car_sueldo 'sueldo', pr.pr_bono 'bono'
			from produccion pr, produccion_empleado pr_em, empleados em, cargos ca
			where pr.pr_id=pr_em.pr_id and pr_em.emp_id=em.emp_id and em.car_id=ca.car_id 
			and pr.pr_fecha>=? and  pr.pr_fecha<=?
			order by em.emp_id, pr.pr_fecha");
			$stm->execute(array($fechaInicio,$fechaFinal));
			return $stm->fetchAll(PDO::FETCH_ASSOC);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ReportePedido($fechaInicio,$fechaFinal)
	{
		try {
			
			$stm = $this->pdo->prepare("SELECT pe.pe_id 'cod', 
			cl.cli_nombre 'cliente', 
			pe.pe_fecha 'fecha', 
			pe.pe_cantidad 'cantidad', 
			pe.pe_precio 'precio', 
			pe.pe_masas 'masas'
			FROM pedidos_detalles pe, clientes cl 
			where pe.cli_id=cl.cli_id
			and  pe.pe_fecha>=? and  pe.pe_fecha<=?
			order by pe.pe_fecha, pe.cli_id");
			$stm->execute(array($fechaInicio,$fechaFinal));
			return $stm->fetchAll(PDO::FETCH_ASSOC);

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}


?>