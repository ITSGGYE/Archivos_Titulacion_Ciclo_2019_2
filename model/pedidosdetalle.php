<?php
require_once 'model/cliente.php';

require_once 'libraries/Carbon.php';

class PedidoDetalle
{

	private $pdo;

	public $pe_id;
	public $cli_id;
	public $pe_fecha;
	public $pe_cantidad;
	public $pe_masas;
	public $pe_precio;

	public $cliente;

	public function __CONSTRUCT()
	{
		try {
			$instance = ConnectDb::getInstance();
			$this->pdo = $instance->getConnection();

			$this->cliente = new Cliente();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function setFecha($value)
	{
		$this->pe_fecha = Carbon\Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
	}

	public function getFecha($value)
	{
		return Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
	}

	public function Listar()
	{
		try {
			$item = new PedidoDetalle();
			$resultado = array();

			$stm = $this->pdo->prepare("SELECT * FROM pedidos_detalles pe, clientes cl 
			where pe.cli_id=cl.cli_id");
			$stm->execute();

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($datos as $dato) {
				$item->pe_id = $dato['pe_id'];
				$item->cli_id = $dato['cli_id'];
				$item->pe_fecha=$item->getFecha($dato['pe_fecha']);
				$item->pe_cantidad = $dato['pe_cantidad'];
				$item->pe_masas = $dato['pe_masas'];
				$item->pe_precio = $dato['pe_precio'];
				$item->cliente->cli_id = $dato['cli_id'];
				$item->cliente->cli_nombre = $dato['cli_nombre'];
				$item->cliente->cli_ciudad = $dato['cli_ciudad'];
				$item->cliente->cli_direccion = $dato['cli_direccion'];
				$item->cliente->cli_telefono = $dato['cli_telefono'];

				array_push($resultado, $item);
				$item = new PedidoDetalle();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerPorId($id)
	{
		try {
			$item = new PedidoDetalle();

			$stm = $this->pdo			
				->prepare("SELECT * FROM pedidos_detalles pe, clientes cl 
				where pe.cli_id=cl.cli_id and pe.pe_id = ?");

			$stm->execute(array($id));
			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
				$item->pe_id = $dato['pe_id'];
				$item->cli_id = $dato['cli_id'];
				$item->pe_fecha = $this->getFecha($dato['pe_fecha']);
				$item->pe_cantidad = $dato['pe_cantidad'];
				$item->pe_masas = $dato['pe_masas'];
				$item->pe_precio = $dato['pe_precio'];
				$item->cliente->cli_id = $dato['cli_id'];
				$item->cliente->cli_nombre = $dato['cli_nombre'];
				$item->cliente->cli_ciudad = $dato['cli_ciudad'];
				$item->cliente->cli_direccion = $dato['cli_direccion'];
				$item->cliente->cli_telefono = $dato['cli_telefono'];

			}

			return $item;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	
	public function ObtenerPorClienteId($id)
	{
		try {
			$item = new PedidoDetalle();
			$resultado = array();

			$stm = $this->pdo->prepare("SELECT * FROM pedidos_detalles pe, clientes cl 
			where pe.cli_id=cl.cli_id and pe.cli_id=?");
			$stm->execute(array($id));

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($datos as $dato) {
				$item->pe_id = $dato['pe_id'];
				$item->cli_id = $dato['cli_id'];
				$item->pe_fecha=$item->getFecha($dato['pe_fecha']);
				$item->pe_cantidad = $dato['pe_cantidad'];
				$item->pe_masas = $dato['pe_masas'];
				$item->pe_precio = $dato['pe_precio'];
				$item->cliente->cli_id = $dato['cli_id'];
				$item->cliente->cli_nombre = $dato['cli_nombre'];
				$item->cliente->cli_ciudad = $dato['cli_ciudad'];
				$item->cliente->cli_direccion = $dato['cli_direccion'];
				$item->cliente->cli_telefono = $dato['cli_telefono'];

				array_push($resultado, $item);
				$item = new PedidoDetalle();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}



	public function ObtenerPorFecha($fecha)
	{
		try {
			$item = new PedidoDetalle();
			$resultado = array();

			$stm = $this->pdo
				->prepare("SELECT * FROM pedidos_detalles pe, clientes cl 
					  where pe.cli_id=cl.cli_id and pe.pe_fecha = ?");
			$stm->execute(array($fecha));

			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);
			foreach ($datos as $dato) {
				$item->pe_id = $dato['pe_id'];
				$item->cli_id = $dato['cli_id'];
				$item->pe_fecha=$item->getFecha($dato['pe_fecha']);
				$item->pe_cantidad = $dato['pe_cantidad'];
				$item->pe_masas = $dato['pe_masas'];
				$item->pe_precio = $dato['pe_precio'];
				$item->cliente->cli_id = $dato['cli_id'];
				$item->cliente->cli_nombre = $dato['cli_nombre'];
				$item->cliente->cli_ciudad = $dato['cli_ciudad'];
				$item->cliente->cli_direccion = $dato['cli_direccion'];
				$item->cliente->cli_telefono = $dato['cli_telefono'];

				array_push($resultado, $item);
				$item = new PedidoDetalle();
			}
			return $resultado;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try {
			$stm = $this->pdo
				->prepare("DELETE FROM pedidos_detalles WHERE pe_id = ?");

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try {
			$sql = "UPDATE pedidos_detalles SET 
						cli_id = ?,
						pe_fecha = ?, 
						pe_cantidad = ?,
                        pe_masas = ?,
						pe_precio = ?
						
				    WHERE pe_id = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->cli_id,
						$data->pe_fecha,
						$data->pe_cantidad,
						$data->pe_masas,
						$data->pe_precio,
						$data->pe_id
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Insertar(PedidoDetalle $data)
	{
		try {
			$sql = "INSERT INTO pedidos_detalles (cli_id, pe_fecha, pe_cantidad, pe_masas, pe_precio) 
		        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->cli_id,
						$data->pe_fecha,
						$data->pe_cantidad,
						$data->pe_masas,
						$data->pe_precio
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
