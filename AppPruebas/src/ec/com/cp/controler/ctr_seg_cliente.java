package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_pdt_medida;
import ec.com.cp.mapper.mapper_seg_cliente;
import ec.com.cp.model.Fila;
import ec.com.cp.model.join.model_seg_cliente_join;
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

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author Usuario
 */
public class ctr_seg_cliente {

    Fila conectarBD = new Fila();
    Connection con = null;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;
    CallableStatement pro;

    public ArrayList<model_seg_cliente_join> listarClientes(int op) {
        ArrayList<model_seg_cliente_join> lista = new ArrayList<model_seg_cliente_join>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call seg_cliente_Select_all(?) }");
            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_seg_cliente_join obj = mapper_seg_cliente.GetClienteFromResultSet(rs);
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
    
    public ArrayList<model_seg_cliente_join> listarClientesCedula(int op,String cedula) {
        ArrayList<model_seg_cliente_join> lista = new ArrayList<model_seg_cliente_join>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call seg_cliente_select_id(?,?) }");
            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.setString(2, cedula);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_seg_cliente_join obj = mapper_seg_cliente.GetClienteFromResultSet(rs);
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
}
