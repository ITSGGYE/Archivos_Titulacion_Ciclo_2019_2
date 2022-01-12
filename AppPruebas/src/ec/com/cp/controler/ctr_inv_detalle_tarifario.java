/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_inv_detalle_tarifa;
import ec.com.cp.model.Fila;
import ec.com.cp.model.model_inv_detalle_tarifario;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Types;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class ctr_inv_detalle_tarifario {

    Connection con = null;
    Fila conectarBD = new Fila();
//    DBConeccion conectarBD = new DBConeccion();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

    public ArrayList<model_inv_detalle_tarifario> ListaDetalleTarifario() {
        model_inv_detalle_tarifario model = null;
        ArrayList<model_inv_detalle_tarifario> tarifa = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call inv_detalle_tarifario() }");
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_inv_detalle_tarifa.GetDetalleTarifarioFromResultSet(rs);
                tarifa.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return tarifa;
    }

    public String GuardarDetalleInventario(model_inv_detalle_tarifario obj) {
        String valor = "";
        try {/* IN id_producto1 INT,IN valor_costo1 DOUBLE,IN valor_venta1 DOUBLE,
                IN valor_descuento1 DOUBLE,IN aplica_iva1 VARCHAR(5))*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call inv_detalle_tarifario_insert_and_update(?,?,?,?,?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_producto());
            prodProAlm.setDouble(2, obj.getValor_costo());
            prodProAlm.setDouble(3, obj.getValor_venta());
            prodProAlm.setDouble(4, obj.getValor_descuento());
            prodProAlm.setString(5, obj.getAplica_iva());
            prodProAlm.setDouble(6, obj.getPorcentaje_venta());
            prodProAlm.setDouble(7, obj.getPorcentaje_descuento());
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

    public String updateIdDetalleTarifario(Long id) {
        String valor = "";
        try {/*IN id INT,
       , IN id_producto1 INT,IN valor_costo1 DOUBLE,IN valor_venta1 DOUBLE,
       IN valor_descuento1 DOUBLE,IN aplica_iva1 VARCHAR(5)*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call inv_detalle_tarifario_update_id(?) }");
            prodProAlm.setLong(1, id);
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
    
    public String GuardarDetalleTarifario(model_inv_detalle_tarifario obj) {
        String valor = "";
        try {/* IN id_producto1 INT,IN valor_costo1 DOUBLE,IN valor_venta1 DOUBLE,
                IN valor_descuento1 DOUBLE,IN aplica_iva1 VARCHAR(5))*/
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call inv_tarifario_detalle_insert(?,?,?) }");
            prodProAlm.setLong(1, obj.getId_producto());
            prodProAlm.setString(2, obj.getAplica_iva());
            prodProAlm.setDouble(3, obj.getValor_venta());
            prodProAlm.executeUpdate();

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
