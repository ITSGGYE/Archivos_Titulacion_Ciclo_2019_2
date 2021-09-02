<?php
require_once 'model/produccion.php';
require_once 'model/empleado.php';
require_once 'model/produccion_empleado.php';

/**
 * Clase controlador para adminsitrar usuarios
 */

class ProduccionController
{

    private $model;
    private $session;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->model = new Produccion();

    }

    /**
     * Listar los datos
     */
    public function index()
    {
        $datos= $this->model->Listar();

        require_once 'view/header_dashboard.php';
        require_once 'view/produccion/index.php';
        require_once 'view/footer_dashboard.php';
        require_once 'view/scripts/produccion/index.js';
    }

    /**
     * Pagina de registro de datos
     */
    public function create()
    {
        $listadoProduccion=array();
        $produccion=new Produccion();
        $listadoEmpleados=(new Empleado())->Listar();

        $id=$_REQUEST['pr_id'];
        $produccion=$this->model->ObtenerPorId($id);
        $produccion->pr_fecha=date("d-m-Y", strtotime($produccion->pr_fecha));

        if($produccion->pr_id==null)
        {
            $produccion->pr_fecha=($_REQUEST['fecha']);
            $produccion->pr_id=$_REQUEST['pr_id'];
            $produccion->pr_cantidad_panes=$_REQUEST['pr_cantidad_panes'];
            $produccion->pr_masas=$_REQUEST['pr_masas'];    
 
            //Calcular bono
            if( $produccion->pr_masas>2){     
                $produccion->pr_bono=( $produccion->pr_masas-2)/0.1;
            }else{
                $produccion->pr_bono=0;
            }
    
        }

        require_once 'view/header_dashboard.php';
        require_once 'view/produccion/create.php';
        require_once 'view/footer_dashboard.php';
        require_once 'view/scripts/produccion/create.js';
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {
        $id=$_REQUEST['pr_id'];
        (new ProduccionEmpleado())->EliminarPorIdProduccion($id);
        $datos = $this->model->Eliminar($id); 
        header('Location: index.php?c=produccion&a=index');
    }
  
}
