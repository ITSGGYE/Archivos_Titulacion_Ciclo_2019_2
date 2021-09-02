<?php
class Cargo
{

	private $pdo;

	public $car_id;
	public $car_nombre;
	public $car_sueldo;

	public function __CONSTRUCT()
	{
		try {
			$instance = ConnectDb::getInstance();
			$this->pdo = $instance->getConnection();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Listar datos
	 */
	public function Listar()
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM cargos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Obtener por id
	 */
	public function ObtenerPorId($id)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM cargos WHERE car_id = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Eliminar datos
	 */
	public function Eliminar($id)
	{
		try {
			$stm = $this->pdo
				->prepare("DELETE FROM cargos WHERE car_id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Actualizar datos
	 */
	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE cargos SET 
						car_nombre = ?,
						car_sueldo = ?
						
				    WHERE car_id = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->car_nombre,
						$data->car_sueldo,
						$data->car_id
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Insertar datos
	 */
	public function Insertar(Cargo $data)
	{
		try {
			$sql = "INSERT INTO cargos (car_nombre, car_sueldo) 
		        VALUES (?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->car_nombre,
						$data->car_sueldo
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
