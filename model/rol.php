<?php
class Rol
{
	private $pdo;

	public $rol_id;
	public $rol_descripcion;

	public function __CONSTRUCT()
	{
		try {
			$instance = ConnectDb::getInstance();
			$this->pdo = $instance->getConnection();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try {
			$stm = $this->pdo->prepare("SELECT * FROM roles");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorId($id)
	{
		try {
			$stm = $this->pdo
				->prepare("SELECT * FROM roles WHERE rol_id = ?");


			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try {
			$stm = $this->pdo
				->prepare("DELETE FROM roles WHERE rol_id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE roles SET 
						rol_descripcion = ?
						
				    WHERE rol_id = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->rol_descripcion,
						$data->rol_id
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Insertar(Cargo $data)
	{
		try {
			$sql = "INSERT INTO roles (rol_descripcion) 
		        VALUES (?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->rol_descripcion
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
