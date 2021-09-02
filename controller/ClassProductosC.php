<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../constants/ClassConexion.php';
require_once '../model/ClassProductosM.php';
class ProductosC
{

    private $objProductosM;
    private $productosM;
    public function __construct()
    {
        $this->objProductosM = new ProductosM();
        $this->productosM = $this->objProductosM;
    }

    public function getDataNewProduct($argCodigoProducto, $argNombreProducto, $argTipoPresentacion, $argCantidad, $argPrecio)
    {

        try {
            $setProducto = $this->productosM->setNewProduct($argCodigoProducto, strtoupper($argNombreProducto), $argTipoPresentacion, $argCantidad, $argPrecio);
        } catch (PDOException $e) {
            die("¡Error!->" . $e->getMessage());
        }

        try {
            if (isset($setProducto)) {
                return $setProducto;
            } else {
                return "¡Error en la solicitud intenta nuevamente!";
            }
        } catch (PDOException $e) {
            die("¡Error!->" . $e->getMessage());
        }
    }

    public function getCodProducto()
    {
        try {
            $result = $this->productosM->getCodProducto();
        } catch (PDOException $e) {
            die("¡Error!->" . $e->getMessage());
        }


        try {
            if ($result != NULL) {
                return $result;
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            die("¡Error!->" . $e->getMessage());
        }
    }

    public function getTypePresentation()
    {
        try {
            $result = $this->productosM->getTypePresentation();
        } catch (PDOException $e) {
            die("¡Error!->" . $e->getMessage());
        }


        try {
            if ($result != NULL) {
                return $result;
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            die("¡Error!->" . $e->getMessage());
        }
    }

    public function getProductos($argStar, $argFinish)
    {
        try {
            return  $this->productosM->getProductos($argStar, $argFinish);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function updateProducto($argCod, $argNombre, $argPresentacion, $argPrecio)
    {
        try {
            return  $this->productosM->updateProducto($argCod, $argNombre, $argPresentacion, $argPrecio);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function findProduct($argCod)
    {
        try {
            return  $this->productosM->findProduct($argCod);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function getPagination(){
        try {
            return  $this->productosM->getPagination();
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function getProductosDelete($argStar,$argFinish){
        try {
            return  $this->productosM->getProductosDelete($argStar, $argFinish);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    Public function getDataProductos($argCodigoProducto){
        try {
            return  $this->productosM->getInfoProducts($argCodigoProducto);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }
}

$objProductosC = new ProductosC;
$productosC = $objProductosC;

if (isset($_GET['cod_producto'])) {
    if ($_GET['cod_producto'] = "true") {
        unset($_GET);
        echo $productosC->getCodProducto();
    }
}

if (isset($_GET['tipo_presentaciones'])) {
    if ($_GET['tipo_presentaciones'] = "true") {
        unset($_GET);
        print_r(json_encode($productosC->getTypePresentation()));
    }
}

if (isset($_POST['form_check'])) {
    if ($_POST['form_check'] = "true") {
        extract($_POST);
        if (empty($codigo_producto) || empty($nombre_producto) || empty($tipo_presentacion) || empty($precio)) {
            echo "Complete todo el formulario";
        } else {
            echo json_encode($productosC->getDataNewProduct($codigo_producto, $nombre_producto, $tipo_presentacion, 0, $precio));
            unset($_POST, $codigo_producto, $nombre_producto, $tipo_presentacion, $precio);
        }
    }
}

if (isset($_GET['getProductos'])) {
    if ($_GET['getProductos'] == "true") {
        extract($_GET);
        if (isset($start, $finish)) {
            echo $productosC->getProductos($start, $finish);
        }
    }
}

if (isset($_POST['findProduct'])) {
    if ($_POST['findProduct'] == "true") {
        if (isset($_POST['cod_producto']) || $_POST['cod_producto'] != "" || $_POST['cod_producto'] != NULL) {
            echo json_encode($productosC->findProduct($_POST['cod_producto']));
        } else {
            echo json_encode("[{'MENSAJE'=>'ERROR AL BUSCAR EL PRODUCTO'}]");
        }
    }
}


if (isset($_POST['formUpdate'])) {
    if ($_POST['formUpdate'] = "true") {
        extract($_POST);
        if (empty($codigo_producto) || empty($nombre_producto) || empty($tipo_presentacion) || empty($precio)) {
            echo "Complete todo el formulario";
        } else {
            echo json_encode($productosC->updateProducto($codigo_producto, $nombre_producto, $tipo_presentacion, $precio));
            unset($_POST, $codigo_producto, $nombre_producto, $tipo_presentacion, $precio);
        }
    }
}

if (isset($_GET['pagination'])) {
    if ($_GET['pagination'] == "true") {
        echo $productosC->getPagination();
    }
}

if (isset($_GET['getProductDelete'])) {
    if ($_GET['getProductDelete'] == "true") {
        echo $productosC->getProductosDelete($_GET['inicio'],$_GET['final']);
    }
}

if (isset($_GET)){
    if (isset($_GET["get_product"],$_GET["codigo_producto"])){
        if ($_GET["get_product"] == 1){
            extract($_GET);
            echo json_encode($productosC->getDataProductos($codigo_producto));
        }
    }
}