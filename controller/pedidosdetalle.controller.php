<?php
require_once 'model/pedidosdetalle.php';
require_once 'model/cliente.php';
require_once 'model/pedidostotal.php';
require_once 'model/produccion.php';

require_once 'libraries/Carbon.php';

/**
 * Clase controlador para adminsitrar usuarios
 */

class PedidosDetalleController
{
    private $model;
    private $session;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->model = new PedidoDetalle();
    }

    /**
     * Listar los datos
     */
    public function index()
    {
        $fecha = "";
        $datos = $this->model->Listar();

        if (isset($_REQUEST['fecha'])) {
            $fecha = $_REQUEST['fecha'];
        }

        require_once 'view/header_dashboard.php';
        require_once 'view/pedidos_detalle/index.php';
        require_once 'view/footer_dashboard.php';
        require_once 'view/scripts/pedidos_detalle/index.js';
    }

    /**
     * Pagina de registro de datos
     */
    public function create()
    {
        $fecha = "";
        $clientes = (new Cliente())->Listar();

        if (isset($_REQUEST['fecha'])) {
            $fecha = $_REQUEST['fecha'];
        }

        require_once 'view/header_dashboard.php';
        require_once 'view/pedidos_detalle/create.php';
        require_once 'view/footer_dashboard.php';
        require_once 'view/scripts/pedidos_detalle/create.js';
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $datos = new PedidoDetalle();

        $datos->cli_id = $_REQUEST['cli_id'];
        $datos->setFecha($_REQUEST['pe_fecha']);
        $datos->pe_cantidad = $_REQUEST['pe_cantidad'];
        $datos->pe_masas = $_REQUEST['pe_masas'];
        $datos->pe_precio = $_REQUEST['pe_precio'];

        $this->model->Insertar($datos);


        $this->actualizarTotalPedidos($datos->pe_fecha);

        header('Location: index.php?c=pedidosdetalle&a=filtrarFecha&fecha='. $datos->pe_fecha); 
       
      //  $this->filtrarFecha($datos->pe_fecha);
    }

    /**
     * Actualizar el total de pedidos
     */
    public function actualizarTotalPedidos($fecha)
    {
        //Obtener el totalpedido segun la fecha
        $totalPedido = (new PedidosTotal)->ObtenerPorFecha($fecha);
        //Si no existe inserta un nuevo totalpedido
        if ($totalPedido->tp_id == null) {
            $totalPedido->tp_cantidad_pedidos = 0;
            $totalPedido->tp_masas = 0;
            $totalPedido->tp_fecha = $fecha;
            (new PedidosTotal())->Insertar($totalPedido);
        }

        //Actualizar el totalpedido
        (new PedidosTotal())->ActualizarCantidades($fecha);     
        
        $this->ActualizarCantidadesProduccion($fecha, $totalPedido->tp_cantidad_pedidos ,$totalPedido->tp_masas);
    }

    /**
     * Actualizar los datos de la produccion
     */

    private function ActualizarCantidadesProduccion($fecha,$cantidadPanes,$cantidadMasas)
    {
        $produccion=(new Produccion())->ObtenerPorFecha($fecha);

        if($produccion->pr_id>0)
        {
            $produccion->pr_fecha=date("Y-m-d", strtotime( $produccion->pr_fecha));
            $produccion->pr_cantidad_panes=$cantidadPanes;
            $produccion->pr_masas=$cantidadMasas;

            //Calcular bono
            if( $produccion->pr_masas>2){     
                $produccion->pr_bono=( $produccion->pr_masas-2)/0.1;
            }else{
                $produccion->pr_bono=0;
            }
           (new Produccion())->Actualizar($produccion);
        }


    }


    /**
     * Display the specified resource.
     *
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit()
    {
        $id = $_REQUEST['id'];
        $datos = $this->model->ObtenerPorId($id);
        $clientes = (new Cliente())->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/pedidos_detalle/edit.php';
        require_once 'view/footer_dashboard.php';
        require_once 'view/scripts/pedidos_detalle/edit.js';
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update()
    {
        $id = $_REQUEST['pe_id'];
        //Obtener la fecha anterior en caso de que el usuario la cambio por otra fecha
        $fechaAnterior = isset($_REQUEST['fechaAnterior']) ? $_REQUEST['fechaAnterior'] : "";
        $datos = $this->model->ObtenerPorId($id);

        $datos->cli_id = $_REQUEST['cli_id'];
        $datos->setFecha($_REQUEST['pe_fecha']);
        $datos->pe_cantidad = $_REQUEST['pe_cantidad'];
        $datos->pe_masas = $_REQUEST['pe_masas'];
        $datos->pe_precio = $_REQUEST['pe_precio'];

        //Actualizar tabla pedidos
        $this->model->Actualizar($datos);

        //Actualizar tabla totalPedidos
        $this->actualizarTotalPedidos($datos->pe_fecha);
        if ($datos->pe_fecha != $fechaAnterior) {
            $fechaAnterior = Carbon\Carbon::createFromFormat('d-m-Y', $fechaAnterior)->format('Y-m-d');
            $this->actualizarTotalPedidos($fechaAnterior);
        }

        //Filtrar el listado de pedidos por fechas
        $this->filtrarFecha($datos->pe_fecha);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {
        $id = $_REQUEST['id'];

        //actualizar pedidos y produccion
        $fecha = (new PedidoDetalle())->ObtenerPorId($id)->pe_fecha;
        $fecha = Carbon\Carbon::createFromFormat('d-m-Y', $fecha)->format('Y-m-d');

        $this->model->Eliminar($id);

        $this->actualizarTotalPedidos($fecha);


        if (isset($_REQUEST['id'])) {
            $fecha = Carbon\Carbon::createFromFormat('d-m-Y', $_REQUEST['fecha'])->format('Y-m-d');
            $this->filtrarFecha($fecha);
        } else {
            header('Location: index.php?c=pedidosdetalle&a=index');
        }
    }

    public function buscarPorFecha()
    {
        try {
            $fecha = isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : "";
            $fecha = Carbon\Carbon::createFromFormat('d-m-Y', $_REQUEST['fecha'])->format('Y-m-d');
            $this->filtrarFecha($fecha);
        } catch (Exception $e) {
            header('Location: index.php?c=pedidosdetalle&a=filtrarFecha'); 
        }
    }

    public function filtrarFecha($pfecha = null)
    {
        $datos = array();
        $fecha = "";
        $totalPedido = new PedidosTotal();

        if ($pfecha != null) {
            $fecha = $pfecha;

        }

        if(isset($_REQUEST['fecha']))
        {
            $fecha = $_REQUEST['fecha'];
        }

        if($fecha!=null)
        {
            $datos = $this->model->ObtenerPorFecha($fecha);
            $totalPedido = (new PedidosTotal())->ObtenerPorFecha($fecha);

            $fecha = Carbon\Carbon::createFromFormat('Y-m-d', $fecha)->format('d-m-Y');
        }

        require_once 'view/header_dashboard.php';
        require_once 'view/pedidos_detalle/index.php';
        require_once 'view/footer_dashboard.php';
        require_once 'view/scripts/pedidos_detalle/index.js';
    }
}
