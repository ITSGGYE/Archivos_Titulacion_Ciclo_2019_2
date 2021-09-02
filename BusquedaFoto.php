<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../appws/clases/conexion.php';
class BusquedaFoto{

    private $conexion;
    private $objConexion;

    public function __construct()
    {
        $this->objConexion = new conexion();
        $this->conexion = $this->objConexion->getConexion();
    }

    public function getExtensionImagePst($id){
        try {
            $query = "SELECT pst_foto FROM titulacion_6to_c.tb_registro_pasante WHERE pst_id = :ID";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":ID",$id,PDO::PARAM_INT,11);
            $stmt->execute();
            $data = $stmt->fetch();
            $ext = $data["pst_foto"];
            return $ext;

        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public function getExtensionImageEst($id){
        try {
            $query = "SELECT est_foto FROM titulacion_6to_c.tb_registro_estudiante WHERE est_id = :ID";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":ID",$id,PDO::PARAM_INT,11);
            $stmt->execute();
            $data = $stmt->fetch();
            $ext = $data["est_foto"];
            return $ext;

        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public function getExtensionImageOnEst($id){
        try {
            $query = "SELECT est_foto FROM titulacion_6to_c.tb_curriculum WHERE est_id = :ID";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":ID",$id,PDO::PARAM_INT,11);
            $stmt->execute();
            $data = $stmt->fetch();
            $ext = $data["est_foto"];
            return $ext;

        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public function getExtensionImageOnPst($id){
        try {
            $query = "SELECT pst_foto FROM titulacion_6to_c.tb_pasantes WHERE pst_id = :ID";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":ID",$id,PDO::PARAM_INT,11);
            $stmt->execute();
            $data = $stmt->fetch();
            $ext = $data["pst_foto"];
            return $ext;

        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
}

$objBusqueda = new BusquedaFoto();
$busquedaFoto = $objBusqueda;

if(isset($_GET["pst_id"])){
    echo ($busquedaFoto->getExtensionImagePst($_GET["pst_id"]));
}elseif(isset($_GET["est_id"])){
    echo ($busquedaFoto->getExtensionImageEst($_GET["est_id"]));
}elseif(isset($_GET["on_pst_id"])){
    echo ($busquedaFoto->getExtensionImageOnPst($_GET["on_pst_id"]));
}elseif(isset($_GET["on_est_id"])){
    echo ($busquedaFoto->getExtensionImageOnEst($_GET["on_est_id"]));
}
