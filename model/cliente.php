<?php
class Cliente
{

	private $pdo;

	public $cli_id;
	public $cli_nombre;
	public $cli_ciudad;
	public $cli_direccion;
	public $cli_telefono = 0;

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
			$stm = $this->pdo->prepare("SELECT * FROM clientes");
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
				->prepare("SELECT * FROM clientes WHERE cli_id = ?");


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
				->prepare("DELETE FROM clientes WHERE cli_id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE clientes SET 
						cli_nombre = ?,
						cli_ciudad = ?, 
						cli_direccion = ?,
                        cli_telefono = ?
						
				    WHERE cli_id = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->cli_nombre,
						$data->cli_ciudad,
						$data->cli_direccion,
						$data->cli_telefono,
						$data->cli_id
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Insertar(Cliente $data)
	{
		try {
			$sql = "INSERT INTO clientes (cli_nombre, cli_ciudad, cli_direccion,  cli_telefono) 
		        VALUES (?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->cli_nombre,
						$data->cli_ciudad,
						$data->cli_direccion,
						$data->cli_telefono
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
