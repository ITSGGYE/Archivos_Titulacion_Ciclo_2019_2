<?php
require_once 'model/pedidostotal.php';

/**
 * Clase controlador para adminsitrar usuarios
 */

class PedidosTotalController
{

    private $model;
    private $session;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->model = new PedidosTotal();


    }

    public function index()
    {
        $datos= $this->model->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/pedidos_total/index.php';
        require_once 'view/footer_dashboard.php';
    }

    public function create()
    {
        require_once 'view/header_dashboard.php';
        require_once 'view/pedidos_total/create.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $datos = new PedidosTotal();

        $datos->cli_nombre = $_REQUEST['tp_cantidad_pedidos'];
        $datos->cli_ciudad = $_REQUEST['tp_masas'];
        $datos->cli_direccion = $_REQUEST['tp_fecha'];

        $this->model->Insertar($datos);

        header('Location: index.php?c=pedidostotal&a=index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit()
    {
        $id=$_REQUEST['id'];
        $datos = $this->model->ObtenerPorId($id);      

        require_once 'view/header_dashboard.php';
        require_once 'view/pedidos_total/edit.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update()
    {
        $id=$_REQUEST['cli_id'];
        $datos = $this->model->ObtenerPorId($id); 

        $datos->tp_cantidad_pedidos = $_REQUEST['tp_cantidad_pedidos'];
        $datos->tp_masas = $_REQUEST['tp_masas'];
        $datos->tp_fecha = $_REQUEST['tp_fecha'];

        $this->model->Actualizar($datos);

        header('Location: index.php?c=pedidostotal&a=index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {
        $id=$_REQUEST['id'];

        $this->model->Eliminar($id);
        header('Location: index.php?c=pedidostotal&a=index');
    }
  
}
