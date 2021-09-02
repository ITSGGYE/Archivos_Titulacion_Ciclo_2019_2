<?php

class VendedorM{
    private $objConexion;
    private $conexion;
    private $stmt;
    private $query;
    public function __construct(){
        $this->objConexion = new Conexion();
        $this->conexion = $this->objConexion->get_Conexion();
    }

    public function setNewFactura(){
        try {
            $this->query = "CALL GUANABASO.SET_NEW_FACTURA()";
        } catch (PDOException $e) {
            //throw $th;
        }

    }
}