<?php
require_once 'model/produccion_empleado.php';
require_once 'model/empleado.php';
require_once 'model/pedidosdetalle.php';

/**
 * Clase controlador para adminsitrar usuarios
 */

class ApiController
{
    /**
     * Listar produccion detalle por id Produccion
     */
    public function ListarProduccionDetallePorIdProduccion()
    {
        $pr_id = $_REQUEST['pr_id'];
        $datos = (new ProduccionEmpleado)->ObtenerPorIdProduccion($pr_id);
        header('Content-Type: application/json');
        print(json_encode($datos));
    }

    /**
     * Registrar produccion
     */
    public function registrarProduccion()
    {
        $datos = new Produccion();

        $datos->pr_cantidad_panes = $_REQUEST['pr_cantidad_panes'];
        $datos->pr_horas_trabajadas = $_REQUEST['pr_horas_trabajadas'];
        $datos->pr_masas = $_REQUEST['pr_masas'];
        $datos->pr_bono = $_REQUEST['pr_bono'];
        $pr_fecha = $_REQUEST['pr_fecha'];
        $datos->pr_fecha =  date("Y-m-d", strtotime($pr_fecha));

        //verificar existencia produccion
        $produccion= (new Produccion())->ObtenerPorFecha($datos->pr_fecha);

        if($produccion->pr_id!=null){
            $datos->pr_id=$produccion->pr_id;
            (new Produccion())->Actualizar($datos);
        }else{
            (new Produccion())->Insertar($datos);           
        }  

        $datos=(new Produccion())->ObtenerPorFecha($datos->pr_fecha);

        (new ProduccionEmpleado())->EliminarPorIdProduccion($datos->pr_id);


        header('Content-Type: application/json');
        print(json_encode($datos));
    }

    /**
     * Registro del empleado en la produccion
     */
    public function registrarEmpleadoProduccion()
    {
        try{
            $datos=new ProduccionEmpleado();
            $datos->pr_id = $_REQUEST['pr_id'];
            $datos->emp_id = $_REQUEST['emp_id'];    

            (new ProduccionEmpleado())->Insertar($datos);
        }catch(Exception $e){

        }

        print "ok";
    }

    /**
     * Elimina los registros de producion y empleado
     */
    public function eliminarDetalleProduccion()
    {
        $pr_id = $_REQUEST['pr_id'];
        $emp_id = $_REQUEST['emp_id'];       

        (new ProduccionEmpleado())->Eliminar($pr_id,$emp_id);

        print "ok";
    }

    /**
     * Obtiene los pedidos del cliente
     */
    public function cantidadPedidosCliente()
    {
        $cli_id=$_REQUEST['cli_id'];

       $pedidos=(new PedidoDetalle())->ObtenerPorClienteId($cli_id);

       header('Content-Type: application/json');
       print(json_encode(count($pedidos)));

    }
}
