/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.model.Fila;
import ec.com.cp.model.model_co_detalle_compra;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Types;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class ctr_co_detalle_compra {
        Connection con = null;
//    DBConeccion conectarBD = new DBConeccion();
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

    public String insertarDetalleCompra(model_co_detalle_compra obj/*,Long id_proveedor,Long id_sucursal,
                                        double Tfacturado,String fecha*/) {
        String valor = "";
        try {/*N `id_cliente1` INT,IN `id_sucursal1` INT,
              IN `total_facturado1` DOUBLE(15,7), IN `f_creacion1` DATETIME,
            
            
            IN `linea_detalle1` INT,IN `id_producto1` INT,IN `cantidad1` INT,
            IN `descripcion1` VARCHAR(200),IN `precio_unitario1` DOUBLE(15,7),
            IN `sub_total1` DOUBLE(15,7),IN `iva1` DOUBLE(15,7),
            IN `decuento1` DOUBLE(15,7), IN `total1` DOUBLE(15,7),
            OUT valor TEXT*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call co_orden_compra_detalle_insert(?,?,?,?,?,?,?,?,?,?) }");
//            prodProAlm.setLong(1, id_proveedor);
//            prodProAlm.setLong(2,id_sucursal);
//            prodProAlm.setDouble(3,Tfacturado);
//            prodProAlm.setString(4,fecha);
            //////////////////detalle
            prodProAlm.setInt(1, obj.getLinea_detalle());
            prodProAlm.setLong(2, obj.getId_producto());
            prodProAlm.setInt(3, obj.getCantidad());
            prodProAlm.setString(4, obj.getDescripcion());
            prodProAlm.setLong(5, obj.getId_cabecera());
            prodProAlm.setDouble(6, obj.getPrecio_unitario());
            prodProAlm.setDouble(7, obj.getIva());
            prodProAlm.setDouble(8, obj.getSub_total());
//            prodProAlm.setDouble(12, obj.getDecuento());
            prodProAlm.setDouble(9, obj.getTotal());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_categoria.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
}
