/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.controler;


import com.ec.ogp.mappers.mapper_planificacion;
import com.ec.ogp.model.join.us_empleados_join;
import com.ec.ogp.util.BDConection;
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
public class ctr_login {
    Connection con = null;
    java.sql.Statement st = null;
    ResultSet rs = null;
    PreparedStatement ps;
    CallableStatement pro;
    BDConection c = new BDConection();

    public String Iniciar_sesion(us_empleados_join us) {
        String valor = null;
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call login(?,?,?) }");
            pro.setString(1, us.getUsuario());
            pro.setString(2, us.getContrasena());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.execute();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_login.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_login.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public ArrayList<us_empleados_join> listarEmpleadosActivos(us_empleados_join je) {
        ArrayList<us_empleados_join> valor = new ArrayList<>();
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call pla_usuario_sucursal_log(?,?) }");
            pro.setString(1, je.getUsuario());
            pro.setString(2, je.getContrasena());
            rs = pro.executeQuery();
            while (rs.next()) {
                us_empleados_join obj = mapper_planificacion.getEmpleadosFromResultSet(rs);
                valor.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_login.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_login.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
}
