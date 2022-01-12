/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.util.DBConeccion;
import ec.com.cp.mapper.mapper_emp_empresa;
import ec.com.cp.model.Fila;
import ec.com.cp.model.join.model_emp_empresa_join;
import ec.com.cp.model.join.model_seg_usuario_join;
import ec.com.cp.model.model_emp_empresa;
import ec.com.cp.model.model_emp_sucursal;
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
public class ctr_emp_empresa {
    Connection con = null;
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;
    
    public ArrayList<model_emp_empresa> ComboEmpresa() {
        ArrayList<model_emp_empresa> lista = new ArrayList<model_emp_empresa>();
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call emp_empresa_select_combo() }");
            pro.execute();
            rs = pro.getResultSet();
            while (rs.next()) {
                model_emp_empresa obj = mapper_emp_empresa.GetEmpresaComboFromResultSet(rs);
                lista.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_emp_empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_emp_empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return lista;
    }
    
    public ArrayList<model_emp_sucursal> ComboSucursal(model_seg_usuario_join je) {
        ArrayList<model_emp_sucursal> lista = new ArrayList<model_emp_sucursal>();
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call emp_sucursal_select_combo(?,?) }");
            pro.setString(1, je.getNomb_usuario());
            pro.setString(2, je.getPassword());
            pro.execute();
            rs = pro.getResultSet();
            while (rs.next()) {
                model_emp_sucursal obj = mapper_emp_empresa.GetSucursalComboFromResultSet(rs);
                lista.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_emp_empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_emp_empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return lista;
    }
    
    public ArrayList<model_emp_empresa_join> EmpresaJoin(model_emp_empresa_join je) {
        ArrayList<model_emp_empresa_join> lista = new ArrayList<model_emp_empresa_join>();
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call emp_sucursal_select_nombre(?) }");
            pro.setString(1, je.getNombre_comercial());
            pro.execute();
            rs = pro.getResultSet();
            while (rs.next()) {
                model_emp_empresa_join obj = mapper_emp_empresa.GetEmpresaJoinFromResultSet(rs);
                lista.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_emp_empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_emp_empresa.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return lista;
    }
}
