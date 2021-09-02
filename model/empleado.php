<?php
require_once 'model/cargo.php';

class Empleado
{

	private $pdo;

	public $emp_id;
	public $emp_nombre;
	public $emp_apellidos;
	public $car_id;
	public $emp_cedula;
	public $emp_fecha_nacimiento;
	public $emp_direccion;

	public $cargo;

	public function __CONSTRUCT()
	{
		try {
			$instance = ConnectDb::getInstance();
			$this->pdo = $instance->getConnection();

			$this->cargo = new Cargo();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try {
			$item = new Empleado();
			$resultado = array();

			$stm = $this->pdo->prepare("SELECT * FROM empleados em, cargos ca
			 where em.car_id=ca.car_id");
			$stm->execute();

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($datos as $dato) {
				$item->emp_id = $dato['emp_id'];
				$item->emp_nombre = $dato['emp_nombre'];
				$item->emp_apellidos = $dato['emp_apellidos'];
				$item->car_id = $dato['car_id'];
				$item->emp_cedula = $dato['emp_cedula'];
				$item->emp_fecha_nacimiento = $dato['emp_fecha_nacimiento'];
				$item->emp_direccion = $dato['emp_direccion'];
				$item->cargo->car_id = $dato['car_id'];
				$item->cargo->car_nombre = $dato['car_nombre'];
				$item->cargo->car_sueldo = $dato['car_sueldo'];

				array_push($resultado, $item);
				$item = new Empleado();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ListarPorCargo($car_id)
	{
		try {
			$item = new Empleado();
			$resultado = array();

			$stm = $this->pdo->prepare("SELECT * FROM empleados em, cargos ca
			 where em.car_id=ca.car_id and em.car_id=?");
			$stm->execute(array($car_id));

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($datos as $dato) {
				$item->emp_id = $dato['emp_id'];
				$item->emp_nombre = $dato['emp_nombre'];
				$item->emp_apellidos = $dato['emp_apellidos'];
				$item->car_id = $dato['car_id'];
				$item->emp_cedula = $dato['emp_cedula'];
				$item->emp_fecha_nacimiento = $dato['emp_fecha_nacimiento'];
				$item->emp_direccion = $dato['emp_direccion'];
				$item->cargo->car_id = $dato['car_id'];
				$item->cargo->car_nombre = $dato['car_nombre'];
				$item->cargo->car_sueldo = $dato['car_sueldo'];

				array_push($resultado, $item);
				$item = new Empleado();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorId($id)
	{
		try {
			$item = new Empleado();
			$stm = $this->pdo
				->prepare("SELECT * FROM empleados em, cargos ca
					   WHERE em.car_id=ca.car_id and emp_id = ?");

			$stm->execute(array($id));
			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
				$item->emp_id = $dato['emp_id'];
				$item->emp_nombre = $dato['emp_nombre'];
				$item->emp_apellidos = $dato['emp_apellidos'];
				$item->car_id = $dato['car_id'];
				$item->emp_cedula = $dato['emp_cedula'];
				$item->emp_fecha_nacimiento = $dato['emp_fecha_nacimiento'];
				$item->emp_direccion = $dato['emp_direccion'];
				$item->cargo->car_id = $dato['car_id'];
				$item->cargo->car_nombre = $dato['car_nombre'];
				$item->cargo->car_sueldo = $dato['car_sueldo'];
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
				->prepare("DELETE FROM empleados WHERE emp_id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE empleados SET 
						emp_nombre = ?,
						emp_apellidos = ?, 
						car_id = ?,
                        emp_cedula = ?,
						emp_fecha_nacimiento = ?,
						emp_direccion = ?
						
				    WHERE emp_id = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->emp_nombre,
						$data->emp_apellidos,
						$data->car_id,
						$data->emp_cedula,
						$data->emp_fecha_nacimiento,
						$data->emp_direccion,
						$data->emp_id
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Insertar(Empleado $data)
	{
		try {
			$sql = "INSERT INTO empleados (emp_nombre, emp_apellidos, car_id,  
		emp_cedula, emp_fecha_nacimiento, emp_direccion ) 
		        VALUES (?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->emp_nombre,
						$data->emp_apellidos,
						$data->car_id,
						$data->emp_cedula,
						$data->emp_fecha_nacimiento,
						$data->emp_direccion
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
