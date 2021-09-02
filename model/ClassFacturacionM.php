<?php

class FacturacionM{
    private $objConexion;
    private $conexion;
    private $query;
    private $stmt;
    public function __construct(){
        $this->objConexion = new Conexion();
        $this->conexion = $this->objConexion->get_Conexion();
        $this->query = "";
        $this->stmt = "";
    }

    public function getNombresVendedor($argCedula){
        try {
            $this->query = "SELECT CONCAT(PRIMER_NOMBRE,' ',SEGUNDO_NOMBRE,' ',PRIMER_APELLIDO,' ',SEGUNDO_APELLIDO) AS NOMBRES FROM GUANABASO.PERSONAS WHERE CEDULA = :CEDULA";
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":CEDULA",$argCedula,PDO::PARAM_STR,13);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            if (isset($this->stmt)){
                if ($this->stmt->execute()){
                    $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result != NULL){
                        return $result[0]["NOMBRES"];
                    }else{
                        return NULL;
                    }
                }else{
                    return NULL;
                }
            }else{
                return NULL;
            }
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
        
    }

    public function getNumFactura(){
        try {
            $this->query = "";
            $this->query = "SELECT MAX(ID) AS NUMERO_FACTURA FROM GUANABASO.FACTURAS";
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            if ($this->query != ""){
                if ($this->stmt = $this->conexion->query($this->query)){
                    $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result != NULL){
                        $numero_factura = (int)$result[0]["NUMERO_FACTURA"];
                        $newFactura = 1000 + $numero_factura;
                        return $newFactura;
                    }else{
                        return NULL;
                    }
                }else{
                    return NULL;
                }

            }else{
                return NULL;
            }

        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
    }

    public function setNewFactura($argCodFactura,$argCedulaVendedor,$argCedulaCliente,$argNombres,$argTelefono,$argCodTransaccion){
        try {
            $this->query = "CALL GUANABASO.CREATE_NEW_FACTURA(:COD_FACTURA,:CEDULA_VENDEDOR,:CEDULA_CLIENTE,:NOMBRES,:TELEFONO,:COD_TRANSACCION,@MENSAJE)";
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }


        try {
            $this->stmt = $this->conexion->prepare($this->query);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_FACTURA",$argCodFactura,PDO::PARAM_STR,4000);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":CEDULA_VENDEDOR",$argCedulaVendedor,PDO::PARAM_STR,4000);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":CEDULA_CLIENTE",$argCedulaCliente,PDO::PARAM_STR,4000);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":NOMBRES",$argNombres,PDO::PARAM_STR,4000);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":TELEFONO",$argTelefono,PDO::PARAM_STR,4000);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_TRANSACCION",$argCodTransaccion,PDO::PARAM_STR,4000);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        if (isset($this->stmt)){
            if($this->stmt->execute()){
                $this->stmt->closeCursor();
                $this->query = null;
                $this->query = "SELECT @MENSAJE AS MENSAJE";
                $this->stmt = null;
                $this->stmt = $this->conexion->query($this->query);
                $estatus = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($estatus[0]["MENSAJE"] == 1){
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return NULL;
            }
        }else{
            return NULL;
        }

    }

    public function setNewTransaction($argCodTransaction,$argCantidad,$argCodProducto){
        try {
            $this->query = "CALL GUANABASO.CREATE_NEW_TRANSACTION(:COD_TRANSACTION,:CANTIDAD,:COD_PRODUCTO,@ESTADO)";
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }


        try {
            $this->stmt = $this->conexion->prepare($this->query);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_TRANSACTION",$argCodTransaction,PDO::PARAM_STR,4000);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":CANTIDAD",$argCantidad,PDO::PARAM_INT,11);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_PRODUCTO",$argCodProducto,PDO::PARAM_STR,4000);
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }


        if (isset($this->stmt)){
            if($this->stmt->execute()){
                $this->stmt->closeCursor();
                $this->query = null;
                $this->query = "SELECT @ESTADO AS ESTADO";
                $this->stmt = null;
                $this->stmt = $this->conexion->query($this->query);
                $estatus = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($estatus[0]["ESTADO"] == 1){
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return NULL;
            }
        }else{
            return NULL;
        }
    }

    public function getCodTransaction(){
        try {
            $this->query = "SELECT MAX(ID) AS CODIGO FROM GUANABASO.TRANSACCIONES";
            $this->stmt = $this->conexion->query($this->query);
            $codigo = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($codigo[0]["CODIGO"] != NULL){
                $newCod = "T-".$codigo[0]["CODIGO"];
                return $newCod;
            }else{
                $newCod = "T-0";
                return $newCod;
            }
        }catch (PDOException $e){
            die("¡Error!: ".$e->getMessage());
        }
    }
}