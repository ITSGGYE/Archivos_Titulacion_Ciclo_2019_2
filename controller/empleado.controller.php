<?php
require_once 'model/empleado.php';
require_once 'model/cargo.php';
require_once 'model/produccion_empleado.php';
/**
 * Clase controlador para adminsitrar usuarios
 */

class EmpleadoController
{

    private $model;
    private $session;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->model = new Empleado();
    }
 
    /**
    * Listar los datos
    */
    public function index()
    {
        $datos= $this->model->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/empleados/index.php';
        require_once 'view/footer_dashboard.php';
   
    }

    /**
    * Pagina de registro de datos
    */
    public function create()
    {
        $cargos=(new Cargo())->Listar();
        
        require_once 'view/header_dashboard.php';
        require_once 'view/empleados/create.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $datos = new Empleado();

        $datos->emp_nombre = $_REQUEST['emp_nombre'];
        $datos->emp_apellidos = $_REQUEST['emp_apellidos'];
        $datos->car_id = $_REQUEST['car_id'];
        $datos->emp_cedula = $_REQUEST['emp_cedula'];
        $datos->emp_fecha_nacimiento = $_REQUEST['emp_fecha_nacimiento'];
        $datos->emp_direccion = $_REQUEST['emp_direccion'];

        $this->model->Insertar($datos);

        header('Location: index.php?c=empleado&a=index');
    }

     /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit()
    {
        $id=$_REQUEST['id'];
        $datos = $this->model->ObtenerPorId($id);   
        $cargos=(new Cargo())->Listar();   

        require_once 'view/header_dashboard.php';
        require_once 'view/empleados/edit.php';
        require_once 'view/footer_dashboard.php';
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update()
    {
        $id=$_REQUEST['emp_id'];
        $datos = $this->model->ObtenerPorId($id); 
     
        $datos->car_nombre = $_REQUEST['emp_nombre'];
        $datos->emp_apellidos = $_REQUEST['emp_apellidos'];
        $datos->car_id = $_REQUEST['car_id'];
        $datos->emp_cedula = $_REQUEST['emp_cedula'];
        $datos->emp_fecha_nacimiento = $_REQUEST['emp_fecha_nacimiento'];
        $datos->emp_direccion = $_REQUEST['emp_direccion'];

        $this->model->Actualizar($datos);

        header('Location: index.php?c=empleado&a=index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {
        $validacion="";
        $id=$_REQUEST['id'];

        $datos=(new ProduccionEmpleado())->ListarPorIdEmpleado($id);

        if(count($datos)>0)
        {
            $validacion="No se puede eliminar el registro esta asignado en la produccion";
        }else{
            $this->model->Eliminar($id);
        }

        header('Location: index.php?c=empleado&a=index&validacion=' . $validacion);
    }
  
}
