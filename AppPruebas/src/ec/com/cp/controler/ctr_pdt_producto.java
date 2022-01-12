/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_pdt_producto;
import ec.com.cp.model.Fila;
import ec.com.cp.model.join.model_pdt_producto_join;
import ec.com.cp.model.model_pdt_producto;
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
public class ctr_pdt_producto {

    Connection con = null;
    Fila conectarBD = new Fila();
//    DBConeccion conectarBD = new DBConeccion();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

    public ArrayList<model_pdt_producto> listarProducto(int op) {

        ArrayList<model_pdt_producto> lista = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_producto_select_all(?) }");
            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_producto obj = mapper_pdt_producto.GetProductoFromResultSet(rs);
                lista.add(obj);
            }
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
        return lista;
    }

    public String insertarProducto(int op,model_pdt_producto obj) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_producto_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) }");
            prodProAlm.setInt(1, op);
            prodProAlm.setString(2, obj.getNombre_producto1());
            prodProAlm.setString(3, obj.getCodigo_barra());
            prodProAlm.setString(4, ""+obj.getEstado());
            prodProAlm.setString(5, obj.getUsuario_creacion());
            prodProAlm.setString(6, obj.getDescrpcion());
//            prodProAlm.setLong(7, obj.getId_presentacion());
//            prodProAlm.setDouble(7, obj.getPrecio());
            prodProAlm.setString(7, obj.getIva());
            prodProAlm.setLong(8, obj.getMinimo());
            prodProAlm.setLong(9, obj.getMaximo());
            prodProAlm.setString(10, obj.getF_creacion().toString());
            prodProAlm.setLong(11, obj.getId_bodega());
            prodProAlm.setString(12, obj.getNombre_marca());
            prodProAlm.setString(13, obj.getNombre_medida());
            prodProAlm.setString(14, obj.getNombre_envase());
            prodProAlm.setString(15, obj.getArticulo());
            prodProAlm.setLong(16, obj.getId_iva());
            prodProAlm.setLong(17, obj.getId_subcategoria());
            prodProAlm.setDouble(18, obj.getPrecio());
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
    
    public String actualizarProducto(model_pdt_producto obj) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_producto_update(?,?,?,?,?,?,?,?,?,?,?,?,?) }");
            prodProAlm.setString(1, obj.getNombre_producto1());
            prodProAlm.setString(2, obj.getCodigo_barra());
            prodProAlm.setString(3, obj.getUsuario_actulizacion());
            prodProAlm.setString(4, obj.getDescrpcion());
//            prodProAlm.setDouble(5, obj.getPrecio());
            prodProAlm.setString(5, obj.getIva());
            prodProAlm.setLong(6, obj.getMinimo());
            prodProAlm.setLong(7, obj.getMaximo());
            prodProAlm.setLong(8, obj.getId_bodega());
            prodProAlm.setString(9, obj.getNombre_medida());
            prodProAlm.setString(10, obj.getNombre_envase());
            prodProAlm.setLong(11, obj.getId_iva());
            prodProAlm.setLong(12, obj.getId_producto());
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
    
    public model_pdt_producto ObtenerIdProducto(int op,String fecha) {

        model_pdt_producto lista = new model_pdt_producto();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_producto_select_id(?,?) }");
            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.setString(2, fecha);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_producto obj = mapper_pdt_producto.GetProductoFromResultSet(rs);
                lista = obj;
//                lista.add(obj);
            }
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
        return lista;
    }
    
    public String activarInactivarProducto(model_pdt_producto obj) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_producto_activar_inactivar(?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_producto());
            prodProAlm.setString(2, "" + obj.getEstado());
            prodProAlm.setString(3, obj.getUsuario_actulizacion());
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
