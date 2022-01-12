/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.model.Fila;
import ec.com.cp.model.model_bit_entrada;
import ec.com.cp.model.model_inv_detalle_tarifario;
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
public class ctr_bitacoras {

    Connection con = null;
//    DBConeccion conectarBD = new DBConeccion();
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;
    
        public String insertarBitacoraEntrada(model_bit_entrada obj/*, int op*/) {
        String valor = "";
        try {
//             IN op INT,
//  IN id_producto1 INT,
//  IN cantidad1 INT,
//  IN usuario_ingreso1 VARCHAR (100),
//  OUT valor TEXT
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call bit_entrada_insert(?,?,?,?) }");
//            prodProAlm.setInt(1, op);
            prodProAlm.setLong(1, obj.getId_producto());
            prodProAlm.setLong(2, obj.getCantidad());
            prodProAlm.setString(3, "" + obj.getUsuario_ingreso());
//            prodProAlm.setDate(5, obj.getFecha_ingreso());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_bitacoras.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_bitacoras.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
        
        public String GuardarDetalleInventario(model_inv_detalle_tarifario obj) {
        String valor = "";
        try {/* IN id_producto1 INT,IN valor_costo1 DOUBLE,IN valor_venta1 DOUBLE,
                IN valor_descuento1 DOUBLE,IN aplica_iva1 VARCHAR(5))*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call co_detalle_tarifario_insert_and_update(?,?,?) }");
            prodProAlm.setLong(1, obj.getId_producto());
            prodProAlm.setDouble(2, obj.getValor_costo());
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
