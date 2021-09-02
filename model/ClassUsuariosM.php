    <?php
        
        class UsuariosM
        {
        
        private $objConexion ;
        private $conexion;
            private $query;
            private $stmt;
            private $data;
            public function __construct()
            {
                $this->objConexion = new Conexion();
                $this->conexion = $this->objConexion->get_Conexion();
                $this->query = "";
                $this->stmt = null;
                $this->data = null;
            }
            public function createNewUser($argCedula,$argPrimerNombre,$argSegundoNombre,$argPrimerApellido,$argSegundoApellido,$argFecha,$argDireccion,$argTelefono,$argCelular,$argCorreo,$argTipoUsuario){
                try{
                    $this->query = "CALL GUANABASO.CREATE_USUARIOS(:CEDULA,:PRIMER_NOMBRE,:SEGUNDO_NOMBRE,:PRIMER_APELLIDO,:SEGUNDO_APELLIDO,
                    :FECHA,:DIRECCION,:TELEFONO,:CELULAR,:CORREO,:TIPO_USUARIO,@ESTADO)";
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
        
                try{
                    $this->stmt = $this->conexion->prepare($this->query);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":CEDULA",$argCedula,PDO::PARAM_STR,10);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":PRIMER_NOMBRE",$argPrimerNombre,PDO::PARAM_STR,30);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":SEGUNDO_NOMBRE",$argSegundoNombre,PDO::PARAM_STR,30);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
                try{
                    $this->stmt->bindParam(":PRIMER_APELLIDO",$argPrimerApellido,PDO::PARAM_STR,30);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":SEGUNDO_APELLIDO",$argSegundoApellido,PDO::PARAM_STR,30);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":FECHA",$argFecha,PDO::PARAM_STR,10);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":DIRECCION",$argDireccion,PDO::PARAM_STR,200);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":TELEFONO",$argTelefono,PDO::PARAM_STR,10);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":CELULAR",$argCelular,PDO::PARAM_STR,10);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
    
                try{
                    $this->stmt->bindParam(":CORREO",$argCorreo,PDO::PARAM_STR,200);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":TIPO_USUARIO",$argTipoUsuario,PDO::PARAM_INT,11);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                if (isset($this->stmt)){
                    if ($this->stmt->execute()){
                        $this->stmt->closeCursor();
                        try {
                            $this->stmt = $this->conexion->prepare("SELECT @ESTADO AS MENSAJE");
                            if ($this->stmt->execute()){
                                $mensaje = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                            }else{
                                return NULL;
                            }
                        }catch(PDOException $e){
                            die("¡Error! : ".$e->getMessage());
                        }

                        if ($mensaje != NULL){
                            return $mensaje[0]["MENSAJE"];
                        }else{
                            return NULL;
                        }
                    }else{
                        return NULL;
                    }
                }else{
                    return NULL;
                }
            }

            public function updateUser($argCedula,$argPrimerNombre,$argSegundoNombre,$argPrimerApellido,$argSegundoApellido,$argFecha,$argDireccion,$argTelefono,$argCelular,$argCorreo,$argTipoUsuario){
                try{
                    $this->query = "CALL GUANABASO.UPDATE_USUARIOS(:CEDULA,:PRIMER_NOMBRE,:SEGUNDO_NOMBRE,:PRIMER_APELLIDO,:SEGUNDO_APELLIDO,
                    :FECHA,:DIRECCION,:TELEFONO,:CELULAR,:CORREO,:TIPO_USUARIO,@ESTADO)";
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt = $this->conexion->prepare($this->query);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":CEDULA",$argCedula,PDO::PARAM_STR,10);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":PRIMER_NOMBRE",$argPrimerNombre,PDO::PARAM_STR,30);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":SEGUNDO_NOMBRE",$argSegundoNombre,PDO::PARAM_STR,30);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }
                try{
                    $this->stmt->bindParam(":PRIMER_APELLIDO",$argPrimerApellido,PDO::PARAM_STR,30);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":SEGUNDO_APELLIDO",$argSegundoApellido,PDO::PARAM_STR,30);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":FECHA",$argFecha,PDO::PARAM_STR,10);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":DIRECCION",$argDireccion,PDO::PARAM_STR,200);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":TELEFONO",$argTelefono,PDO::PARAM_STR,10);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":CELULAR",$argCelular,PDO::PARAM_STR,10);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":CORREO",$argCorreo,PDO::PARAM_STR,200);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt->bindParam(":TIPO_USUARIO",$argTipoUsuario,PDO::PARAM_INT,11);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                if (isset($this->stmt)){
                    if ($this->stmt->execute()){
                        $this->stmt->closeCursor();
                        try {
                            $this->stmt = $this->conexion->prepare("SELECT @ESTADO AS MENSAJE");
                            if ($this->stmt->execute()){
                                $mensaje = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                            }else{
                                return NULL;
                            }
                        }catch(PDOException $e){
                            die("¡Error! : ".$e->getMessage());
                        }

                        if ($mensaje != NULL){
                            return $mensaje[0]["MENSAJE"];
                        }else{
                            return NULL;
                        }
                    }else{
                        return NULL;
                    }
                }else{
                    return NULL;
                }
            }

            public function getDataUser($argCedula){
                try {
                    $this->query = "SELECT * FROM GUANABASO.PERSONAS,GUANABASO.USUARIOS WHERE PERSONAS.CEDULA = :CEDULA AND USUARIOS.USUARIO = :USUARIO";
                }catch (PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try {
                    $this->stmt = $this->conexion->prepare($this->query);
                }catch (PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try {
                    $this->stmt->bindParam(":CEDULA",$argCedula,PDO::PARAM_STR,13);
                }catch (PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try {
                    $this->stmt->bindParam(":USUARIO",$argCedula,PDO::PARAM_STR,13);
                }catch (PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try {
                    if(isset($this->stmt)){
                        if($this->stmt->execute()){
                            $this->data = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($this->data != NULL){
                                $this->data[0]["PASSWORD"] = NULL;
                                $data = $this->data;
                                return $data;
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
                    die("¡Error! : ".$e->getMessage());
                }


            }

            public function setResetPassword($argCedula){
                try{
                    $this->query = "CALL GUANABASO.RESET_PASSWORD(:CEDULA,@ESTADO)";
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try{
                    $this->stmt = $this->conexion->prepare($this->query);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                try {
                    $this->stmt->bindParam(":CEDULA",$argCedula,PDO::PARAM_STR,13);
                }catch(PDOException $e){
                    die("¡Error! : ".$e->getMessage());
                }

                if (isset($this->stmt)){
                    if ($this->stmt->execute()){
                        $this->stmt->closeCursor();
                        try {
                            $this->stmt = $this->conexion->prepare("SELECT @ESTADO AS MENSAJE");
                            if ($this->stmt->execute()){
                                $mensaje = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                            }else{
                                return NULL;
                            }
                        }catch(PDOException $e){
                            die("¡Error! : ".$e->getMessage());
                        }

                        if ($mensaje != NULL){
                            return $mensaje[0]["MENSAJE"];
                        }else{
                            return NULL;
                        }
                    }else{
                        return NULL;
                    }
                }else{
                    return NULL;
                }
            }
            
        }