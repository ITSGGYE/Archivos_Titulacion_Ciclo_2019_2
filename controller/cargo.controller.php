<?php
require_once 'model/cargo.php';
require_once 'model/empleado.php';
/**
 * Clase controlador para adminsitrar usuarios
 */

class CargoController
{

    private $model;
    private $session;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->model = new Cargo();

    }

    /**
     * Listar los datos
     */
    public function index()
    {
        $datos= $this->model->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/cargos/index.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Pagina de registro de datos
     */
    public function create()
    {
        require_once 'view/header_dashboard.php';
        require_once 'view/cargos/create.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $datos = new Cargo();

        $datos->car_nombre = $_REQUEST['car_nombre'];
        $datos->car_sueldo = $_REQUEST['car_sueldo'];

        $this->model->Insertar($datos);

        header('Location: index.php?c=cargo&a=index');
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
        require_once 'view/cargos/edit.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update()
    {
        $id=$_REQUEST['car_id'];
        $datos = $this->model->ObtenerPorId($id); 

        $datos->car_nombre = $_REQUEST['car_nombre'];
        $datos->car_sueldo = $_REQUEST['car_sueldo'];

        $this->model->Actualizar($datos);

        header('Location: index.php?c=cargo&a=index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {
        $validacion="";
        $id=$_REQUEST['id'];

        $datos=(new Empleado())->ListarPorCargo($id);

        if(count($datos)>0)
        {
            $validacion="No se puede eliminar el registro esta asignado en los empleados";
        }else{
            $this->model->Eliminar($id);
        }

        header('Location: index.php?c=cargo&a=index&validacion=' . $validacion);
    }
  
}
