<?php
require_once 'model/cliente.php';
require_once 'model/pedidosdetalle.php';
require_once 'model/sesion.php';
/**
 * Clase controlador para adminsitrar usuarios
 */

class ClienteController
{

    private $model;
    private $session;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->model = new cliente();

    }

    /**
     * Listar los datos
     */
    public function index()
    {
        $datos= $this->model->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/clientes/index.php';
        require_once 'view/footer_dashboard.php';
        require_once 'view/scripts/clientes/index.js';
    }

    /**
    * Pagina de registro de datos
    */
    public function create()
    {
        require_once 'view/header_dashboard.php';
        require_once 'view/clientes/create.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $datos = new Cliente();

        $datos->cli_nombre = $_REQUEST['cli_nombre'];
        $datos->cli_ciudad = $_REQUEST['cli_ciudad'];
        $datos->cli_direccion = $_REQUEST['cli_direccion'];
        $datos->cli_telefono = $_REQUEST['cli_telefono'];

        $this->model->Insertar($datos);

        header('Location: index.php?c=cliente&a=index');
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
        require_once 'view/clientes/edit.php';
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

        $datos->cli_nombre = $_REQUEST['cli_nombre'];
        $datos->cli_ciudad = $_REQUEST['cli_ciudad'];
        $datos->cli_direccion = $_REQUEST['cli_direccion'];
        $datos->cli_telefono = $_REQUEST['cli_telefono'];

        $this->model->Actualizar($datos);

        header('Location: index.php?c=cliente&a=index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {        
        $validacion="";
        $id=$_REQUEST['id'];

        $pedidos=(new PedidoDetalle())->ObtenerPorClienteId($id);
        if(count($pedidos)>0)
        {
            $validacion="No se puede eliminar el registro esta asignado en los pedidos";
        }else{
            $this->model->Eliminar($id);
        }

        header('Location: index.php?c=cliente&a=index&validacion=' . $validacion);
    }
  
}
