<?php
require_once 'libraries/Carbon.php';

class Produccion
{

	private $pdo;

	public $pr_id;
	public $pr_cantidad_panes;
	public $pr_horas_trabajadas;
	public $pr_bono;
	public $pr_fecha;
	public $pr_masas;

	public function __CONSTRUCT()
	{
		try {
			$instance = ConnectDb::getInstance();
			$this->pdo = $instance->getConnection();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function setFecha($value)
	{
		//$this->pr_fecha = date("Y-m-d", strtotime($value->pr_fecha));
		$this->pr_fecha = Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
	}

	public function getFecha($value)
	{
		//$this->pr_fecha = date("d-m-Y", strtotime($value->pr_fecha));
		return Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
	}

	public function Listar()
	{
		try {
			$item = new Produccion();
			$resultado = array();

			$stm = $this->pdo->prepare("SELECT * FROM produccion");
			$stm->execute();

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
				$item->pr_id = $dato['pr_id'];
				$item->pr_cantidad_panes = $dato['pr_cantidad_panes'];
				$item->pr_horas_trabajadas = $dato['pr_horas_trabajadas'];
				$item->pr_masas = $dato['pr_masas'];
				$item->pr_bono = $dato['pr_bono'];
				$item->pr_fecha = $this->getFecha($dato['pr_fecha']);				

				array_push($resultado, $item);
				$item = new Produccion();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	public function ObtenerPorId($id)
	{
		try {
			$item = new Produccion();
			$resultado = array();

			$stm = $this->pdo
				->prepare("SELECT * FROM produccion where pr_id=?");
			$stm->execute(array($id));
			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
				$item->pr_id = $dato['pr_id'];
				$item->pr_cantidad_panes = $dato['pr_cantidad_panes'];
				$item->pr_masas = $dato['pr_masas'];
				$item->pr_horas_trabajadas = $dato['pr_horas_trabajadas'];
				$item->pr_bono= $dato['pr_bono'];
				$item->pr_fecha = $this->getFecha($dato['pr_fecha']);
			}
			
			return $item;

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorFecha($fecha)
	{
		try {
			$item = new Produccion();

			$stm = $this->pdo->prepare("SELECT * FROM produccion pr  where pr.pr_fecha=?");
			$stm->execute(array($fecha));

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
				$item->pr_id = $dato['pr_id'];
				$item->pr_cantidad_panes = $dato['pr_cantidad_panes'];
				$item->pr_masas = $dato['pr_masas'];
				$item->pr_horas_trabajadas = $dato['pr_horas_trabajadas'];
				$item->pr_bono = $dato['pr_bono'];
				$item->pr_fecha = $this->getFecha($dato['pr_fecha']);

			}
			return $item;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try {
			$stm = $this->pdo
				->prepare("DELETE FROM produccion WHERE pr_id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE produccion SET 
						pr_cantidad_panes = ?,
						pr_horas_trabajadas = ?, 
						pr_masas = ?, 
						pr_bono = ?, 
						pr_fecha = ?

				    WHERE pr_id = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->pr_cantidad_panes,
						$data->pr_horas_trabajadas,
						$data->pr_masas,
						$data->pr_bono,
						$data->pr_fecha,
						$data->pr_id
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Insertar(Produccion $data)
	{
		try {
			$sql = "INSERT INTO produccion (pr_cantidad_panes, 
					pr_horas_trabajadas,pr_masas,pr_bono, pr_fecha) 
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->pr_cantidad_panes,
						$data->pr_horas_trabajadas,
						$data->pr_masas,
						$data->pr_bono,
						$data->pr_fecha
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
