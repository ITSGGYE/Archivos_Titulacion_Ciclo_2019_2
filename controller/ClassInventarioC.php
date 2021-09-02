<?php
require_once "../constants/ClassConexion.php";
require_once "../model/ClassInventarioM.php";
class InventarioC
{
    private $objInventarioM;
    private $inventarioM;
    public function __construct()
    {
        $this->objInventarioM = new InventarioM();
        $this->inventarioM = $this->objInventarioM;
    }
    
    public function addItems($argCodProducto,$argCantidad){
        try {
            $status = $this->inventarioM->setAddItems($argCodProducto,$argCantidad);
        }catch(PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
    
        try {
            if (isset($status)){
                return $status;
            }else{
                return "OCURRIO UN ERROR INESPERADO INTENTE NUEVAMENTE";
            }
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
    
    }
    
    public function removeItems($argCodProducto,$argCantidad){
        try {
            $status = $this->inventarioM->setRemoveItems($argCodProducto,$argCantidad);
        }catch(PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
    
        try {
            if (isset($status)){
                return $status;
            }else{
                return "OCURRIO UN ERROR INESPERADO INTENTE NUEVAMENTE";
            }
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
        
    }
}

$objInventarioC = new InventarioC();
$inventarioC = $objInventarioC;

if (isset($_POST["addItems"])){
    if ($_POST['addItems'] == "true"){
        extract($_POST);
       echo json_encode($result = $inventarioC->addItems($codigo_producto,$cantidad));
    }
}
    
    if (isset($_POST["removeItems"])){
        if ($_POST['removeItems'] == "true"){
            extract($_POST);
            echo json_encode($result = $inventarioC->removeItems($codigo_producto_d,$cantidad_d));
        }
    }
