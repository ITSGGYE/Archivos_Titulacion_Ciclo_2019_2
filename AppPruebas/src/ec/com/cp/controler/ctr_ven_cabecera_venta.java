/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.model.Fila;
import ec.com.cp.model.model_ven_cabecera_venta;
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
public class ctr_ven_cabecera_venta {

    Connection con = null;
//    DBConeccion conectarBD = new DBConeccion();
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

    public String insertarCabeceraVenta(model_ven_cabecera_venta obj, int op) {
        String valor = "";
        try {
//            IN op INT, IN `id_cliente1`INT,IN `id_sucursal1` INT,
//               IN `estado1` CHAR(1), IN `forma_pago1` VARCHAR(20),
//                   IN `total_subtotal1` DOUBLE,IN `total_iva1` DOUBLE,
//                        IN `total_descuento1` DOUBLE,IN `total_facturado1` DOUBLE,
//                      IN `usuario_creacion1` VARCHAR(80)
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call ven_cabecera_venta_insert(?,?,?,?,?,?,?,?,?,?,?) }");
            prodProAlm.setInt(1, op);
            prodProAlm.setLong(2, obj.getId_cliente());
            prodProAlm.setLong(3, obj.getId_sucursal());
            prodProAlm.setString(4, ""+obj.getEstado());
            prodProAlm.setString(5, obj.getForma_pago());
            prodProAlm.setDouble(6, obj.getTotal_subtotal());
            prodProAlm.setDouble(7, obj.getTotal_iva());
            prodProAlm.setDouble(8, obj.getTotal_descuento());
            prodProAlm.setDouble(9, obj.getTotal_facturado());
            prodProAlm.setString(10, obj.getUsuario_creacion());
            prodProAlm.setString(11, obj.getF_creacion().toString());
//            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
//            valor = prodProAlm.getString("valor");

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
