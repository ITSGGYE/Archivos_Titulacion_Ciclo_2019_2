<?php

class ProductosM
{
    private $objConexion;
    private $conexion;
    private $query;
    private $stmt;
    public function __construct()
    {
        try {
            $this->objConexion = new Conexion();
            $this->conexion = $this->objConexion->get_Conexion();
        } catch (PDOException $e) {
            die("¡Error!-> ") . $e->getMessage();
        }
    }

    public function getEstado()
    {
        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $this->stmt->closeCursor();
                    $this->query = null;
                    $this->query = "SELECT @ESTADO AS ESTADO";
                    $this->stmt = $this->conexion->prepare($this->query);
                    $this->stmt->execute();
                    $data = $this->stmt->fetch();
                    $array = array("MENSAJE" => $data['ESTADO'], "ESTADO" => "1");
                    return $array;
                } else {
                    $this->stmt->closeCursor();
                    $this->query = null;
                    $this->query = "SELECT @ESTADO AS ESTADO";
                    $this->stmt = $this->conexion->prepare($this->query);
                    $this->stmt->execute();
                    $data = $this->stmt->fetch();
                    $array = array("MENSAJE" => $data['ESTADO'], "ESTADO" => "0");
                    return $array;
                }
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function setNewProduct($argCodigoProducto, $argNombreProducto, $argTipoPresentacion, $argCantidad, $argPrecio)
    {
        try {
            $this->query = "CALL GUANABASO.CREATE_NEW_PRODUCT(:_CODIGO_PRODUCTO,:_NOMBRE_PRODUCTO,:_TIPO_PRESENTACION,:_CANTIDAD,:_PRECIO,@ESTADO)";
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(':_CODIGO_PRODUCTO', $argCodigoProducto, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(':_NOMBRE_PRODUCTO', $argNombreProducto, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(':_TIPO_PRESENTACION', $argTipoPresentacion, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(':_CANTIDAD', $argCantidad, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(':_PRECIO', $argPrecio, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
        try {
            $result = $this->getEstado();
            if ($result != null) {
                return $result;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function updateProducto($argCod, $argNombre, $argPresentacion, $argPrecio)
    {
        try {
            $this->query = "CALL UPDATE_PRODUCTO(:COD_PRODUCTO,:NOMBRE_PRODUCTO,:PRESENTACION,:PRECIO,@ESTADO)";
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_PRODUCTO", $argCod, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":NOMBRE_PRODUCTO", $argNombre, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":PRESENTACION", $argPresentacion, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":PRECIO", $argPrecio, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $result = $this->getEstado();
            if ($result != null) {
                return $result;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function getIdProducto($argCodProducto)
    {
        try {
            $this->query = "SELECT ID FROM GUANABASO.PRODUCTOS WHERE COD_PRODUCTO = :COD_PRODUCTO";
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_PRODUCTO", $argCodProducto, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result != NULL) {
                        $id = $result['ID'];
                        return $id;
                    } else {
                        return null;
                    }
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function getCodProducto()
    {
        try {
            $this->query = "SELECT MAX(ID)+1 AS CODIGO FROM GUANABASO.PRODUCTOS";
        } catch (PDOException $e) {
            die("¡Error!-> ") . $e->getMessage();
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> ") . $e->getMessage();
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $cod_producto = "P0";
                    $result  = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result[0]['CODIGO'] == NULL) {
                        $newCod = $cod_producto . '1';
                    } else {
                        $newCod = $cod_producto . $result[0]['CODIGO'];
                    }
                    return $newCod;
                }
            }
        } catch (PDOException $e) {
            die("¡Error!-> ") . $e->getMessage();
        }
    }

    public function getTypePresentation()
    {
        try {
            $this->query = "SELECT * FROM GUANABASO.TIPO_PRESENTACIONES";
        } catch (PDOException $e) {
            die("¡Error!-> ") . $e->getMessage();
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> ") . $e->getMessage();
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $result  = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
                }
            }
        } catch (PDOException $e) {
            die("¡Error!-> ") . $e->getMessage();
        }
    }

    public function getProductos($argStar, $argFinish)
    {
        try {
            $this->query = "SELECT * FROM GUANABASO.PRODUCTOS, GUANABASO.INVENTARIO_PRODUCTO WHERE PRODUCTOS.COD_PRODUCTO = INVENTARIO_PRODUCTO.COD_PRODUCTO LIMIT :COMIENZO,:FINAL";
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COMIENZO", $argStar, PDO::PARAM_INT, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":FINAL", $argFinish, PDO::PARAM_INT, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
        $cadena = '
        <div class="boxes">
        <div class="images-boxes">
            <a class="boxes-link" href="inventario.php"> <img src="../../images/proveedor.png" alt="prosuctos-guanabaso" srcset=""></a>
        </div>
        <div class="title-boxes">
            <span>NO HAY PRODUCTOS</span>
        </div>
    </div>
        ';

        try {
            if (isset($this->stmt)) {

                if ($this->stmt->execute()) {
                    $cadena = "";
                    while ($result = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
                        $cadena = $cadena . '
                        <div class="boxes">
                        <div class="images-boxes">
                            <a class="boxes-link" href="inventario.php"> <img src="../../images/proveedor.png" alt="prosuctos-guanabaso" srcset=""></a>
                        </div>
                        <div class="title-boxes">
                            <span> Nombre: ' . $result["NOMBRE_PRODUCTO"] . '</span>
                            </div>
                            <div class="title-boxes">
                            <span> Precio $' . $result["PRECIO"] . '</span>
                            </div>
                            <div class="title-boxes">
                            <span> Disponibles: ' . $result["CANTIDAD"] . '</span>
                        </div>
                    </div>
                        ';
                    }
                    if ($cadena == NULL || empty($cadena)) {
                        $cadena = '
                        <div class="boxes">
                        <div class="images-boxes">
                            <a class="boxes-link" href="#"> <img src="../../images/proveedor.png" alt="prosuctos-guanabaso" srcset=""></a>
                        </div>
                        <div class="title-boxes">
                            <span>NO HAY PRODUCTOS</span>
                        </div>
                    </div>
                        ';
                        return $cadena;
                    } else {
                        return $cadena;
                    }
                } else {
                    return $cadena;
                }
            } else {
                return $cadena;
            }
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function findProduct($argCod)
    {
        try {
            $this->query = "SELECT * FROM GUANABASO.PRODUCTOS WHERE COD_PRODUCTO = :COD_PRODUCTO";
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam("COD_PRODUCTO", $argCod, PDO::PARAM_STR, 4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result != NULL) {
                        return $result;
                    } else {
                        return NULL;
                    }
                } else {
                    return NULL;
                }
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function getTotalProduct()
    {
        try {
            $this->query = "SELECT COUNT(ID) AS TOTAL FROM GUANABASO.PRODUCTOS";
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            if (isset($this->stmt)) {
                if ($this->stmt->execute()) {
                    $totalRow = $this->stmt->fetch(PDO::FETCH_ASSOC);
                    if ($totalRow != NULL) {
                        return $totalRow['TOTAL'];                    
                    } else {
                        return $totalRow['TOTAL'];
                    }
                } else {               
                    return NULL;
                }
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function getPagination()
    {
        try {
            $totalRow = $this->getTotalProduct();
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
        try {
            $paginationRow = ceil($totalRow / 5);
            $cadena = '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li id="1" class="waves-effect active"><a onClick="javascript : inicio = 0;d = 1;getProduct();" href="#!">1</a></li>
        ';
            $cont = 1;
            $c = 0;
            for ($i = 1; $i < $paginationRow; $i++) {
                $cont++;
                $c = $c+5;
                $cadena = $cadena . '<li id="' . $cont . '" class="waves-effect"><a onClick="javascript : inicio = '.$c.';d = '.$cont.';getProduct();" href="#!">' . $cont . '</a></li>';
            }


            $cadena  =  $cadena . '<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';
            return $cadena;
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function getProductosDelete($argStar, $argFinish)
    {
        try {
            $this->query = "SELECT PRECIO,CANTIDAD,PRODUCTOS.COD_PRODUCTO,NOMBRE_PRODUCTO,PRODUCTOS.ID AS IDENT FROM GUANABASO.PRODUCTOS,GUANABASO.TIPO_PRESENTACIONES,GUANABASO.INVENTARIO_PRODUCTO WHERE PRODUCTOS.TIPO_PRESENTACION = TIPO_PRESENTACIONES.COD_PRESENTACION AND INVENTARIO_PRODUCTO.COD_PRODUCTO = PRODUCTOS.COD_PRODUCTO LIMIT :INICIO,:FINAL";
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":INICIO",$argStar,PDO::PARAM_INT,4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":FINAL",$argFinish,PDO::PARAM_INT,4000);
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
           if (isset($this->stmt)) {
               $cadena = "";
               if ($this->stmt->execute()) {
                   $cont = 0;
                   while ($data = $this->stmt->fetch()) {
                       $cont++;
                       $cadena = $cadena .'
                       <tr>
                       <td>'.$cont.'</th>
                       <td>'.$data["COD_PRODUCTO"].'</td>
                       <td>'.$data["NOMBRE_PRODUCTO"].'</td>
                       <td>$ '.$data["PRECIO"].'</td>
                       <td>'.$data["CANTIDAD"].'</td>
                       <td> <a onclick="return getCodProductoAdd('.strval($data["IDENT"]).');" id="bnt-items" class="waves-effect waves-light btn modal-trigger green" href="#addItems"><i class="material-icons">add</i></a> | <a onclick="return getCodProductoRemove('.strval($data["IDENT"]).');"  id="bnt-items" class="waves-effect waves-light btn modal-trigger red" href="#removeItems"><i class="material-icons">cancel</i></a> </td>
                   </tr>
                       ';
                   }
                   if ($cadena != "") {
                       return $cadena;
                   }else{
                       return "NO HAY PRODUCTOS";
                   }
               }else{
                   return NULL;
               }
           }else{
               return NULL;
           }
        } catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }
    }

    public function getInfoProducts($argCodigoProducto){
        try {
            $this->query = "SELECT NOMBRE_PRODUCTO,PRECIO,CANTIDAD FROM GUANABASO.PRODUCTOS,GUANABASO.INVENTARIO_PRODUCTO WHERE INVENTARIO_PRODUCTO.COD_PRODUCTO = :COD_P_A AND  PRODUCTOS.COD_PRODUCTO = :COD_P_P";
        }catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt = $this->conexion->prepare($this->query);
        }catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_P_A",$argCodigoProducto, PDO::PARAM_STR,10);
        }catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            $this->stmt->bindParam(":COD_P_P",$argCodigoProducto, PDO::PARAM_STR,10);
        }catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

        try {
            if (isset($this->stmt)){
                if ($this->stmt->execute()){
                    $data = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($data != NULL){
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
        }catch (PDOException $e) {
            die("¡Error!-> " . $e->getMessage());
        }

}
}
