/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_inv_inventario;
import ec.com.cp.model.Fila;
import ec.com.cp.model.join.model_inv_inventario_join;
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
public class ctr_inv_inventario {

    Connection con = null;
    Fila conectarBD = new Fila();
//    DBConeccion conectarBD = new DBConeccion();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

    public ArrayList<model_inv_inventario_join> ListaInventarioJoinTodo() {
        model_inv_inventario_join model = null;
        ArrayList<model_inv_inventario_join> persona = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call inv_inventario_select_all() }");
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_inv_inventario.GetInventarioFromResultSet(rs);
                persona.add(model);
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
        return persona;
    }

    public String ActualizarCantidad(model_inv_inventario_join obj, int op) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call inv_update_cantidad_stock(?,?,?,?) }");
            //IN op INT ,
//  IN cantidad1 INT, IN id_kardex1 INT,
//  OUT valor TEXT  
            prodProAlm.setInt(1, op);
            prodProAlm.setLong(2, obj.getCantidad());
            prodProAlm.setLong(3, obj.getId_kardex());
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

    public ArrayList<model_inv_inventario_join> ListaInventarioJoinStockVenta() {
        model_inv_inventario_join model = null;
        ArrayList<model_inv_inventario_join> persona = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call ven_select_stock() }");
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_inv_inventario.GetInventarioStockVentaFromResultSet(rs);
                persona.add(model);
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
        return persona;
    }

    public String ActualizarCantidadVenta(model_inv_inventario_join obj, int op) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call inv_venta_update_cantidad(?,?,?) }");
            //IN op INT ,
//  IN cantidad1 INT, IN id_kardex1 INT,
//  OUT valor TEXT  
            prodProAlm.setInt(1, op);
            prodProAlm.setLong(2, obj.getCantidad());
            prodProAlm.setLong(3, obj.getId_producto());
//            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
//            valor = prodProAlm.getString("valor");inv_inventario_insert

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

    public String InsertarProductoInventario(Long id, int op,Long id_bodega) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call inv_inventario_insert(?,?,?) }");
            //IN op INT ,
//  IN cantidad1 INT, IN id_kardex1 INT,
//  OUT valor TEXT  
            prodProAlm.setInt(1, op);
            prodProAlm.setLong(2, id);
            prodProAlm.setLong(3, id_bodega);
//            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
//            valor = prodProAlm.getString("valor");inv_inventario_insert

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
    public ArrayList<model_inv_inventario_join> ListaInventarioJoinC() {
        model_inv_inventario_join model = null;
        ArrayList<model_inv_inventario_join> persona = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    /*GetInventarioFromResultSetC*/
                    "{ call inv_inventario_pincay() }");
            rs = pro.executeQuery();
            while (rs.next()) {
                model = mapper_inv_inventario.GetInventarioFromResultSetC(rs);
                persona.add(model);
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
        return persona;
    }
}
