<?php
require_once 'model/produccion.php';
require_once 'model/empleado.php';
require_once 'model/cargo.php';

require_once 'libraries/Carbon.php';

class ProduccionEmpleado
{

	private $pdo;

	public $pr_id;
    public $emp_id;
    
    public $produccion;
    public $empleado;

	public function __CONSTRUCT()
	{
		try {
			$instance = ConnectDb::getInstance();
            $this->pdo = $instance->getConnection();
            
            $this->produccion = new Produccion();
            $this->empleado = new Empleado();

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function setFecha($value)
	{
		$this->pr_fecha = Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
	}

	public function getFecha($value)
	{
		return Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
	}

	public function Listar()
	{
		try {
			$item = new ProduccionEmpleado();
			$resultado = array();

            $stm = $this->pdo->prepare("SELECT * FROM produccion_empleado pr_em, produccion pr, 
            empleados em, cargos ca where pr_em.pr_id=pr.pr_id and em.emp_id=pr_em.emp_id
            and ca.car_id=em.car_id");
			$stm->execute();

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
                $item->pr_id = $dato['pr_id'];
				$item->emp_id = $dato['emp_id'];
                //produccion
				$item->produccion->pr_id = $dato['pr_id'];
				$item->produccion->pr_cantidad_panes = $dato['pr_cantidad_panes'];
				$item->produccion->pr_horas_trabajadas = $dato['pr_horas_trabajadas'];
				$item->pr_masas = $dato['pr_masas'];
				$item->produccion->pr_bono = $dato['pr_bono'];
                $item->produccion->pr_fecha = $this->getFecha($dato['pr_fecha']);
                //empeado
                $item->empleado->emp_id = $dato['emp_id'];
				$item->empleado->emp_nombre = $dato['emp_nombre'];
				$item->empleado->emp_apellidos = $dato['emp_apellidos'];
				$item->empleado->car_id = $dato['car_id'];
				$item->empleado->emp_cedula = $dato['emp_cedula'];
				$item->empleado->emp_fecha_nacimiento = $dato['emp_fecha_nacimiento'];
				$item->empleado->emp_direccion = $dato['emp_direccion'];
				$item->empleado->cargo->car_id = $dato['car_id'];
				$item->empleado->cargo->car_nombre = $dato['car_nombre'];
				$item->empleado->cargo->car_sueldo = $dato['car_sueldo'];

				array_push($resultado, $item);
				$item = new ProduccionEmpleado();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	public function ListarPorIdEmpleado($emp_id)
	{
		try {
			$item = new ProduccionEmpleado();
			$resultado = array();

            $stm = $this->pdo->prepare("SELECT * FROM produccion_empleado pr_em, produccion pr, 
            empleados em, cargos ca where pr_em.pr_id=pr.pr_id and em.emp_id=pr_em.emp_id
            and ca.car_id=em.car_id and pr_em.emp_id=?");
			$stm->execute(array($emp_id));

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
                $item->pr_id = $dato['pr_id'];
				$item->emp_id = $dato['emp_id'];
                //produccion
				$item->produccion->pr_id = $dato['pr_id'];
				$item->produccion->pr_cantidad_panes = $dato['pr_cantidad_panes'];
				$item->produccion->pr_horas_trabajadas = $dato['pr_horas_trabajadas'];
				$item->pr_masas = $dato['pr_masas'];
				$item->produccion->pr_bono = $dato['pr_bono'];
                $item->produccion->pr_fecha = $this->getFecha($dato['pr_fecha']);
                //empeado
                $item->empleado->emp_id = $dato['emp_id'];
				$item->empleado->emp_nombre = $dato['emp_nombre'];
				$item->empleado->emp_apellidos = $dato['emp_apellidos'];
				$item->empleado->car_id = $dato['car_id'];
				$item->empleado->emp_cedula = $dato['emp_cedula'];
				$item->empleado->emp_fecha_nacimiento = $dato['emp_fecha_nacimiento'];
				$item->empleado->emp_direccion = $dato['emp_direccion'];
				$item->empleado->cargo->car_id = $dato['car_id'];
				$item->empleado->cargo->car_nombre = $dato['car_nombre'];
				$item->empleado->cargo->car_sueldo = $dato['car_sueldo'];

				array_push($resultado, $item);
				$item = new ProduccionEmpleado();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorIdEmpleadoIdProduccion($pr_id,$emp_id)
	{
		try {
			$item = new ProduccionEmpleado();
			$resultado = array();

			$stm = $this->pdo
				->prepare("SELECT * FROM produccion_empleado pr_em, produccion pr, 
                empleados em, cargos ca where pr_em.pr_id=pr.pr_id and em.emp_id=pr_em.emp_id
                and ca.car_id=em.car_id and pr_em.pr_id = ? and pr_em.emp_id = ?");
			$stm->execute(array($pr_id,$emp_id));
			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
                $item->pr_id = $dato['pr_id'];
				$item->emp_id = $dato['emp_id'];
                //produccion
				$item->produccion->pr_id = $dato['pr_id'];
				$item->produccion->pr_cantidad_panes = $dato['pr_cantidad_panes'];
				$item->produccion->pr_horas_trabajadas = $dato['pr_horas_trabajadas'];
				$item->produccion->pr_bono = $dato['pr_bono'];
				$item->produccion->pr_fecha = $this->getFecha($dato['pr_fecha']);
				$item->pr_masas = $dato['pr_masas'];
                //empeado
                $item->empleado->emp_id = $dato['emp_id'];
				$item->empleado->emp_nombre = $dato['emp_nombre'];
				$item->empleado->emp_apellidos = $dato['emp_apellidos'];
				$item->empleado->car_id = $dato['car_id'];
				$item->empleado->emp_cedula = $dato['emp_cedula'];
				$item->empleado->emp_fecha_nacimiento = $dato['emp_fecha_nacimiento'];
				$item->empleado->emp_direccion = $dato['emp_direccion'];
				$item->empleado->cargo->car_id = $dato['car_id'];
				$item->empleado->cargo->car_nombre = $dato['car_nombre'];
				$item->empleado->cargo->car_sueldo = $dato['car_sueldo'];
			}
			
			return $item;

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorIdProduccion($pr_id)
	{
		try {
			$item = new ProduccionEmpleado();
			$resultado = array();

			$stm = $this->pdo
				->prepare("SELECT * FROM produccion_empleado pr_em, produccion pr, 
                empleados em, cargos ca where pr_em.pr_id=pr.pr_id and em.emp_id=pr_em.emp_id
                and ca.car_id=em.car_id and pr_em.pr_id = ?");
			$stm->execute(array($pr_id));
			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
                $item->pr_id = $dato['pr_id'];
				$item->emp_id = $dato['emp_id'];
                //produccion
				$item->produccion->pr_id = $dato['pr_id'];
				$item->produccion->pr_cantidad_panes = $dato['pr_cantidad_panes'];
				$item->produccion->pr_horas_trabajadas = $dato['pr_horas_trabajadas'];
				$item->produccion->pr_bono = $dato['pr_bono'];
				$item->produccion->pr_fecha = $this->getFecha($dato['pr_fecha']);
				$item->pr_masas = $dato['pr_masas'];
                //empeado
                $item->empleado->emp_id = $dato['emp_id'];
				$item->empleado->emp_nombre = $dato['emp_nombre'];
				$item->empleado->emp_apellidos = $dato['emp_apellidos'];
				$item->empleado->car_id = $dato['car_id'];
				$item->empleado->emp_cedula = $dato['emp_cedula'];
				$item->empleado->emp_fecha_nacimiento = $dato['emp_fecha_nacimiento'];
				$item->empleado->emp_direccion = $dato['emp_direccion'];
				$item->empleado->cargo->car_id = $dato['car_id'];
				$item->empleado->cargo->car_nombre = $dato['car_nombre'];
				$item->empleado->cargo->car_sueldo = $dato['car_sueldo'];

				array_push($resultado, $item);
				$item = new ProduccionEmpleado();
			}
			
			return $resultado;

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorFecha($fecha)
	{
		try {
			$item = new ProduccionEmpleado();

			$resultado = array();

			$stm = $this->pdo->prepare("SELECT * FROM produccion_empleado pr_em, produccion pr, 
            empleados em, cargos ca where pr_em.pr_id=pr.pr_id and em.emp_id=pr_em.emp_id
            and ca.car_id=em.car_id and pr.pr_fecha=?");
			$stm->execute(array($fecha));

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
                $item->pr_id = $dato['pr_id'];
				$item->emp_id = $dato['emp_id'];
                //produccion
				$item->produccion->pr_id = $dato['pr_id'];
				$item->produccion->pr_cantidad_panes = $dato['pr_cantidad_panes'];
				$item->produccion->pr_horas_trabajadas = $dato['pr_horas_trabajadas'];
				$item->produccion->pr_bono = $dato['pr_bono'];
				$item->produccion->pr_fecha = $this->getFecha($dato['pr_fecha']);
				$item->pr_masas = $dato['pr_masas'];
                //empeado
                $item->empleado->emp_id = $dato['emp_id'];
				$item->empleado->emp_nombre = $dato['emp_nombre'];
				$item->empleado->emp_apellidos = $dato['emp_apellidos'];
				$item->empleado->car_id = $dato['car_id'];
				$item->empleado->emp_cedula = $dato['emp_cedula'];
				$item->empleado->emp_fecha_nacimiento = $dato['emp_fecha_nacimiento'];
				$item->empleado->emp_direccion = $dato['emp_direccion'];
				$item->empleado->cargo->car_id = $dato['car_id'];
				$item->empleado->cargo->car_nombre = $dato['car_nombre'];
				$item->empleado->cargo->car_sueldo = $dato['car_sueldo'];

				array_push($resultado, $item);
				$item = new ProduccionEmpleado();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($pr_id,$emp_id)
	{
		try {
			$stm = $this->pdo
				->prepare("DELETE FROM produccion_empleado WHERE pr_id = ? and emp_id=?");

			$stm->execute(array($pr_id,$emp_id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function EliminarPorIdProduccion($pr_id)
	{
		try {
			$stm = $this->pdo
				->prepare("DELETE FROM produccion_empleado WHERE pr_id = ?");

			$stm->execute(array($pr_id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function Insertar(ProduccionEmpleado $data)
	{
		try {
			$sql = "INSERT INTO produccion_empleado (pr_id,emp_id) 
		        VALUES (?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->pr_id,
						$data->emp_id
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
