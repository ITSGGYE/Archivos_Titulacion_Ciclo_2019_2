<?php
require_once 'libraries/Carbon.php';

class PedidosTotal
{

	private $pdo;
    
    public $tp_id;
    public $tp_cantidad_pedidos;
    public $tp_masas;
    public $tp_fecha;  
	
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
		try
		{
			$item = new PedidosTotal();
			$resultado = array();

			$stm = $this->pdo->prepare("SELECT * FROM pedidos_total order by tp_fecha");
			$stm->execute();
			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
				$item->tp_id = $dato['tp_id'];
				$item->tp_cantidad_pedidos = $dato['tp_cantidad_pedidos'];
				$item->tp_masas = $dato['tp_masas'];
				$item->tp_fecha = $this->getFecha($dato['tp_fecha']);

				array_push($resultado, $item);
				$item = new PedidosTotal();
			}
			return $resultado;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerPorFecha($fecha)
	{
		try
		{
			$item = new PedidosTotal();

			$stm = $this->pdo->prepare("SELECT * FROM pedidos_total WHERE tp_fecha = ? order by tp_fecha");
			$stm->execute(array($fecha));
			$datos = $stm->fetchAll(PDO::FETCH_ASSOC);

			foreach ($datos as $dato) {
				$item->tp_id = $dato['tp_id'];
				$item->tp_cantidad_pedidos = $dato['tp_cantidad_pedidos'];
				$item->tp_masas = $dato['tp_masas'];
				$item->tp_fecha = $this->getFecha($dato['tp_fecha']);
			}
			return $item;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerPorId($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM pedidos_total WHERE tp_id = ?");	      
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
						->prepare("DELETE FROM pedidos_total WHERE tp_id = ?");
			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE pedidos_total SET 
						tp_cantidad_pedidos = ?,
						tp_masas = ?, 
						tp_fecha = ?

				    WHERE tp_id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->tp_cantidad_pedidos, 
                        $data->tp_masas,                        
                        $data->tp_fecha,
                        $data->tp_id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ActualizarCantidades($fecha)
	{
		try 
		{
			$sql = "update pedidos_total pet set 
			pet.tp_cantidad_pedidos=
			(select  sum(ped.pe_cantidad)
			from pedidos_detalles ped
			where ped.pe_fecha=?
			group by pe_fecha), 
			pet.tp_masas=
			(select  sum(ped.pe_masas)
			from pedidos_detalles ped
			where ped.pe_fecha=?
			group by pe_fecha)
			where pet.tp_fecha=?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$fecha,
						$fecha,
						$fecha
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Insertar(PedidosTotal $data)
	{
		try 
		{
		$sql = "INSERT INTO pedidos_total (tp_cantidad_pedidos, tp_masas, tp_fecha) 
		        VALUES (?, ?, ? )";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
				    $data->tp_cantidad_pedidos, 
                    $data->tp_masas,
                    $data->tp_fecha                
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}