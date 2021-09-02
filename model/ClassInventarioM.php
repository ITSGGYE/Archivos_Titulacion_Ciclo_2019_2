<?php

class InventarioM
{
    private $objConexion;
    private $conexion;
    private $query;
    private $stmt;
    private $data;

    public function __construct()
    {
        $this->objConexion = new Conexion();
        $this->conexion = $this->objConexion->get_Conexion();
        $this->query = NULL;
        $this->stmt = NULL;
        $this->data = NULL;
    }

    public function nullAll()
    {
        $this->stmt = NULL;
        $this->query = NULL;
        $this->data = NULL;
    }

    public function nullQuery()
    {
        $this->query = NULL;
    }

    public function nullStmt()
    {
        $this->stmt = NULL;
    }

    public function executeFetch()
    {
        try {
            if ($this->stmt != NULL) {
                if ($this->stmt->execute()) {
                    $this->data = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                }
            }
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }
    }

    public function prepareQuery()
    {
        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }
    }

    public function execute(){
        try {
            if ($this->stmt != NULL) {
                $this->stmt->execute();
            }
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }
    }

    public function getMessageExecute()
    {
        try {
            if ($this->stmt != NULL) {
                $this->stmt->closeCursor();
                $this->nullAll();
                $this->query = "SELECT @ESTADO AS ESTADO";
                $this->prepareQuery();
                $this->executeFetch();
                $estatus = $this->data[0]['ESTADO'];
                if ($estatus != NULL){
                    return $estatus;
                }else{
                    return NULL;
                }
            }else{
                return NULL;
            }
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }
    }

    public function bindParamStr( $paramName,$paramValue){
        try {
            $this->stmt->bindParam($paramName,$paramValue,PDO::PARAM_STR,4000);
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }
    }

    public function bindParamInt($paramName,$paramValue){
        try {
            $this->stmt->bindParam($paramName,$paramValue,PDO::PARAM_INT,4000);
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }
    }

    public function setAddItems($argCodProducto, $argCantidad)
    {
        try {
            $this->query = "CALL ADD_ITEMS(:COD_PRODUCTO,:CANTIDAD,@ESTADO)";
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }

        try {
            $this->prepareQuery();
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }

        try {
            $this->bindParamStr(":COD_PRODUCTO",$argCodProducto);
            $this->bindParamInt(":CANTIDAD",$argCantidad);
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }

        try {
            $this->execute();
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }

        try {
            $estado = $this->getMessageExecute();
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }

        if ($estado != NULL){
            $this->nullAll();
            return $estado;
        }else{
            $this->nullAll();
            return NULL;
        }
    }
    
    public function setRemoveItems($argCodProducto, $argCantidad)
    {
        try {
            $this->query = "CALL REMOVE_ITEMS(:COD_PRODUCTO,:CANTIDAD,@ESTADO)";
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage());
        }
        
        try {
            $this->prepareQuery();
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }
        
        try {
            $this->bindParamStr(":COD_PRODUCTO",$argCodProducto);
            $this->bindParamInt(":CANTIDAD",$argCantidad);
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }
        
        try {
            $this->execute();
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }
        
        try {
            $estado = $this->getMessageExecute();
        } catch(PDOException $e){
            die("¡Error! : ".$e->getMessage());
        }
        
        if ($estado != NULL){
            $this->nullAll();
            return $estado;
        }else{
            $this->nullAll();
            return NULL;
        }
    }
}

