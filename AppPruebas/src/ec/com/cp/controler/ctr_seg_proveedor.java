/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_seg_proeveedor_join;
import ec.com.cp.mapper.mapper_seg_usuario_join;
import ec.com.cp.model.Fila;
import ec.com.cp.model.join.model_emp_empresa_join;
import ec.com.cp.model.join.model_seg_proveedor_join;
import ec.com.cp.model.join.model_seg_usuario_join;
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
public class ctr_seg_proveedor {
    
    Fila conectarBD = new Fila();
    Connection con = null;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;
    CallableStatement pro;
    
    // procedimiento
    public ArrayList<model_seg_proveedor_join> ListaProveedorJoinTodo() {
        model_seg_proveedor_join model = null;
        ArrayList<model_seg_proveedor_join> proveedor = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_proveedor_activo_select() }");
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_seg_proeveedor_join.GetProveedorFromResultSet(rs);
                proveedor.add(model);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return proveedor;
    }
    
    public String CrearPorveedorJoin(model_seg_proveedor_join us, model_emp_empresa_join me, model_seg_usuario_join u) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_proveedor_insert(?,?,?,?,?,?,?,?,?,?,?,?)}");
            pro.setString(1, us.getNombre());
            pro.setString(2, us.getCedula());
            pro.setString(3, us.getTelefono());
            pro.setString(4, us.getEmail());
            pro.setString(5, us.getDireccion());
            pro.setString(6, us.getObservacion());
            pro.setString(7, u.getUsuario_creacion());
            pro.setLong(8, me.getId_sucursal());
            pro.setString(9, "PROVEEDOR");
            pro.setString(10, us.getTelefono_dos());
            pro.setString(11, us.getNombre_comercial());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String ActualizarProveedorJoin(model_seg_proveedor_join us, model_emp_empresa_join em,model_seg_usuario_join u) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_proveedor_update(?,?,?,?,?,?,?,?,?,?,?,?,?)}");
            pro.setString(1, us.getNombre());
            pro.setString(2, us.getCedula());
            pro.setString(3, us.getTelefono());
            pro.setString(4, us.getEmail());
            pro.setString(5, us.getDireccion());
            pro.setString(6, us.getObservacion());
            pro.setString(7, u.getUsuario_actulizacion());
            pro.setString(8, "PROVEEDOR");
            pro.setLong(9, us.getId_persona());
            pro.setLong(10, us.getId_usuario());
            pro.setString(11, us.getTelefono_dos());
            pro.setString(12, us.getNombre_comercial());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String InactivarProveedorJoin(model_seg_usuario_join us, model_seg_proveedor_join p) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call seg_proveedor_update_inactivar(?,?,?)}");
            pro.setString(1, us.getNomb_usuario());
            pro.setLong(2, p.getId_usuario());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_seg_usuario.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
}
