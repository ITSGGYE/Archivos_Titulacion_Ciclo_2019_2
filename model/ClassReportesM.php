<?php

    
    class ReportesM
    {
        private $objConexion;
        private $conexion;
        private $stmt;
        private $query;
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
        
        public function getReporteProduct(){
            try {
                $this->query = "SELECT COD_PRODUCTO, NOMBRE_PRODUCTO,TAMAÑO_PRESENTACION,PRECIO FROM GUANABASO.PRODUCTOS, GUANABASO.TIPO_PRESENTACIONES WHERE  TIPO_PRESENTACION = COD_PRESENTACION";
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
    
            try {
                $this->prepareQuery();
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
            
            try {
                $this->executeFetch();
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
            
            try{
                $cadena = "";
                $cont = (int)0;
                foreach ($this->data as $result){
                $cadena = $cadena.'
                <tr>
                    <td>'.$cont.'</td>
                    <td>'.$this->data[$cont]["COD_PRODUCTO"].'</td>
                    <td>'.$this->data[$cont]["NOMBRE_PRODUCTO"].'</td>
                    <td>'.$this->data[$cont]["TAMAÑO_PRESENTACION"].'</td>
                    <td>$ '.$this->data[$cont]["PRECIO"].'</td>
                </tr>
                ';
                    $cont++;
                }
                if ($cadena != ""){
                    return $cadena;
                }else{
                    return null;
                }
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        }
    
        public function getReporteInventario(){
            try {
                $this->query = "SELECT COD_PRODUCTO, NOMBRE_PRODUCTO,TAMAÑO_PRESENTACION,PRECIO,DESCRIPCION,ITEMS,DATE,TIME,DATA FROM GUANABASO.PRODUCTOS, GUANABASO.TIPO_PRESENTACIONES,GUANABASO.HISTORY_TRANSACCION WHERE TYPE_CODE = 'CD-INS-INV' OR TYPE_CODE = 'CD-UPD-INV' OR TYPE_CODE = 'CD-DEL-INV' AND TIPO_PRESENTACION = COD_PRESENTACION AND COD_PRODUCTO = ROW_AFFECT";
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        
            try {
                $this->prepareQuery();
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        
            try {
                $this->executeFetch();
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        
            try{
                $cadena = "";
                $cont = (int)0;
                foreach ($this->data as $result){
                    $cadena = $cadena.'
                <tr>
                    <td>'.$cont.'</td>
                    <td>'.$this->data[$cont]["COD_PRODUCTO"].'</td>
                    <td>'.$this->data[$cont]["NOMBRE_PRODUCTO"].'</td>
                    <td>'.$this->data[$cont]["TAMAÑO_PRESENTACION"].'</td>
                    <td>$ '.$this->data[$cont]["PRECIO"].'</td>
                    <td>'.$this->data[$cont]["DESCRIPCION"].'</td>
                    <td>'.$this->data[$cont]["ITEMS"].'</td>
                    <td>'.$this->data[$cont]["DATE"].'</td>
                    <td>'.$this->data[$cont]["TIME"].'</td>
                    <td>'.$this->data[$cont]["DATA"].'</td>
                </tr>
                ';
                    $cont++;
                }
                if ($cadena != ""){
                    return $cadena;
                }else{
                    return null;
                }
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        }
    
        public function getReporteUsuarios(){
            try {
                $this->query = "SELECT CEDULA, CONCAT(PRIMER_NOMBRE,' ',SEGUNDO_NOMBRE,' ',PRIMER_APELLIDO,' ',SEGUNDO_APELLIDO) AS NOMBRES, TIPO_USUARIO FROM GUANABASO.PERSONAS,GUANABASO.USUARIOS WHERE CEDULA = USUARIO";
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        
            try {
                $this->prepareQuery();
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        
            try {
                $this->executeFetch();
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        
            try{
                $cadena = "";
                $cont = (int)0;
                foreach ($this->data as $result){
                    if($this->data[$cont]["TIPO_USUARIO"] == 1){
                        $tipo = "ADMINISTRADOR";
                    }elseif ($this->data[$cont]["TIPO_USUARIO"] == 2){
                        $tipo = "VENDEDOR";
                    }
                    $cadena = $cadena.'
                <tr>
                    <td>'.$cont.'</td>
                    <td>'.$this->data[$cont]["CEDULA"].'</td>
                    <td>'.$this->data[$cont]["NOMBRES"].'</td>
                    <td>'.$tipo.'</td>

                </tr>
                ';
                    $cont++;
                }
                if ($cadena != ""){
                    return $cadena;
                }else{
                    return null;
                }
            }catch(PDOException $e){
                die("¡Error!: ".$e->getMessage());
            }
        }
    }