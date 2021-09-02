<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../constants/ClassConexion.php';
require_once '../model/ClassFacturacionM.php';
    class FacturacionC{
        private $objFacturacionM;
        private $facturacionM;
        public function __construct()
        {
            $this->objFacturacionM = new FacturacionM();
            $this->facturacionM = $this->objFacturacionM;
        }

        public function getNamesVendedor($argCedula){
            try {
                $result = $this->facturacionM->getNombresVendedor($argCedula);
            }catch (PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }

            try {
                if ($result != NULL){
                    return $result;
                }else{
                    return "ERROR AL BUSCAR EL NOMBRE";
                }
            }catch (PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        }

        public function getNumeroFactura(){
            try {
                $result = $this->facturacionM->getNumFactura();
            }catch (PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }

            try {
                if ($result != NULL){
                    return $result;
                }else{
                    return "ERROR AL GENERAR EL NUMERO DE FACTURA";
                }
            }catch (PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        }

        public function setNewFactura($argCodFactura,$argCedulaVendedor,$argCedulaCliente,$argNombres,$argTelefono,$argCodTransaccion){
            try {
                $estatus = $this->facturacionM->setNewFactura($argCodFactura,$argCedulaVendedor,$argCedulaCliente,$argNombres,$argTelefono,$argCodTransaccion);
                if ($estatus == 1){
                    return 1;
                }else{
                    return 0;
                }
            }catch (PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }

        }

        public function setNewTransaction($argCodTransaction,$argCantidad,$argCodProducto){
            try {
                $estatus = $this->facturacionM->setNewTransaction($argCodTransaction,$argCantidad,$argCodProducto);
                if ($estatus == 1){
                    return 1;
                }else{
                    return 0;
                }
            }catch (PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }

        }

        public function getNewTransaction(){
            try {
                $estatus = $this->facturacionM->getCodTransaction();
                if ($estatus != NULL){
                    return $estatus;
                }else{
                    return NULL;
                }
            }catch (PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        }
    }

    $objFacturacionC = new FacturacionC();
    $facturacionC = $objFacturacionC;

    if (isset($_GET)){
        if (isset($_GET["id_vendedor"])){
            echo $result = $facturacionC->getNamesVendedor($_GET["id_vendedor"]);
        }
    }

    if (isset($_GET)){
        if (isset($_GET["factura"])){
            if ($_GET["factura"] == 1) {
                echo $result = $facturacionC->getNumeroFactura();
            }
        }
    }

    if(isset($_POST)){
       // var_dump($_POST);
        if (isset($_POST["facturacion_validate"]) == "true"){
            extract($_POST);
            $cont = (int)0;
            $codTransactionGet = $objFacturacionC->getNewTransaction();

            if ($codTransactionGet != NULL) {
                foreach ($codigo_producto as $item) {
                    $status = $facturacionC->setNewTransaction($codTransactionGet,$cantidad[$cont],$codigo_producto[$cont]);

                    if ($status == 0){
                        break;
                    }else{
                        if ($status == 1){
                            $cont++;
                        }
                    }
                }

                if ($cont > 0){
                    $result = $facturacionC->setNewFactura($numero_factura,$id_vendedor,$cedula_cliente,$name_cliente,$telefono_cliente,$codTransactionGet);
                    if ($result == 1){
                        echo "1";
                    }else{
                        echo "0";
                    }
                }
            }
        }

    }
