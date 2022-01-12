/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_pdt_medida;
import ec.com.cp.model.Fila;
import ec.com.cp.model.model_pdt_medida;
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
 * @author carlos
 */
public class ctr_pdt_medida {
    
    Connection con = null;
//    DBConeccion conectarBD = new DBConeccion();
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;
    
    public ArrayList<model_pdt_medida> listarMedida() {
        ArrayList<model_pdt_medida> lista = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_medida_select_all() }");
//            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_medida obj = mapper_pdt_medida.GetMedidaFromResultSet(rs);
                lista.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_medida.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_medida.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return lista;
    }
    
    public String insertarMedida(model_pdt_medida obj) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_medida_insert(?,?,?) }");
            prodProAlm.setString(1, obj.getNombre_medida());
            prodProAlm.setString(2, obj.getU_creacion());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_medida.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_medida.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String actualizarMedida(model_pdt_medida obj) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_medida_update(?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_medida());
            prodProAlm.setString(2, obj.getNombre_medida());
            prodProAlm.setString(3, obj.getU_actualizacion());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_medida.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_medida.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String activarInactivarMedida(model_pdt_medida obj) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_medida_activar_inactivar(?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_medida());
            prodProAlm.setString(2, obj.getEstdao());
            prodProAlm.setString(3, obj.getU_actualizacion());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_medida.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_medida.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
}
