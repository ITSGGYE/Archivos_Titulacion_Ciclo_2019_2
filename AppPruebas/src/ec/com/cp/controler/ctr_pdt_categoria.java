/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.util.DBConeccion;
import ec.com.cp.mapper.mapper_pdt_categoria;
import ec.com.cp.model.model_pdt_categoria;
import ec.com.cp.model.Fila;
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
public class ctr_pdt_categoria {

    Connection con = null;
//    DBConeccion conectarBD = new DBConeccion();
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

//    Connection conect = null;
//    java.sql.Statement st = null;
//    ResultSet rs = null;
//    PreparedStatement ps;
//    Conexion con = new Conexion();
    public ArrayList<model_pdt_categoria> listarCategorias(int op) {
        ArrayList<model_pdt_categoria> lista = new ArrayList<model_pdt_categoria>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_categoria_select_all1(?) }");
            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_categoria obj = mapper_pdt_categoria.GetCategoriaFromResultSet(rs);
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

    public String insertarCategoria(model_pdt_categoria obj, int op) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_categoria_insert(?,?,?,?,?,?) }");
            prodProAlm.setInt(1, op);
            prodProAlm.setString(2, obj.getNombre());
            prodProAlm.setString(3, "" + obj.getEstado());
            prodProAlm.setString(4, obj.getUsuario_creacion());
            prodProAlm.setString(5, obj.getF_creacion().toString());
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

    public String actualizarCategoria(model_pdt_categoria obj, int op) {
        //ArrayList<Productos> lista = new ArrayList<Productos>();
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_categoria_update(?,?,?,?,?,?,?) }");
            prodProAlm.setLong(1, op);
            prodProAlm.setString(2, obj.getNombre());
            prodProAlm.setString(3, "" + obj.getEstado());
            prodProAlm.setString(4, obj.getUsuario_actulizacion());
            prodProAlm.setString(5, obj.getF_actualizacion().toString());
            prodProAlm.setLong(6, obj.getId_categoria());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");
            //  rs = prodProAlm.getResultSet();
//            while (rs.next()) {
//                MarcaProducto obj = EntidadesMappers.getMarcaProductoFromResultSet(rs);
//                lista.add(obj);
//            }

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
        public String eliminarCategoria(Long id,String usu) {
        //ArrayList<Productos> lista = new ArrayList<Productos>();
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_categoria_inactivar(?,?,?) }");
            prodProAlm.setLong(1, id);
            prodProAlm.setString(2, usu);
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");
            //  rs = prodProAlm.getResultSet();
//            while (rs.next()) {
//                MarcaProducto obj = EntidadesMappers.getMarcaProductoFromResultSet(rs);
//                lista.add(obj);
//            }

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
        
    public String activarInactivarCategoria(model_pdt_categoria obj) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_categoria_activar_inactivar(?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_categoria());
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
    
    //flata procedimento
    public String actualizarCategoria(model_pdt_categoria obj) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_categoria_update(?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_categoria());
            prodProAlm.setString(2, obj.getNombre());
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
