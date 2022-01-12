/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_pdt_subcategoria_join_subcategoria;
import ec.com.cp.model.join.model_pdt_subcategoria_join_subcategoria;
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
public class ctr_pdt_subcategoria {

    Connection con = null;
//    DBConeccion conectarBD = new DBConeccion();
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

    public ArrayList<model_pdt_subcategoria_join_subcategoria> listarSubCategorias(int op) {

        ArrayList<model_pdt_subcategoria_join_subcategoria> lista = new ArrayList<model_pdt_subcategoria_join_subcategoria>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_subcategoria_select_all1(?) }");
            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_subcategoria_join_subcategoria obj = mapper_pdt_subcategoria_join_subcategoria.GetSubCategoriaFromResultSet(rs);
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

    public String insertarSubCategoria(model_pdt_subcategoria_join_subcategoria obj, int op) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_subcategoria_insert(?,?,?,?,?,?,?) }");
            prodProAlm.setInt(1, op);
            prodProAlm.setString(2, obj.getNombre());
            prodProAlm.setString(3, "" + obj.getEstado());
            prodProAlm.setString(4, obj.getUsuario_creacion());
            prodProAlm.setString(5, obj.getF_creacion().toString());
            prodProAlm.setLong(6, obj.getId_categoria().longValue());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.execute();
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

    public ArrayList<model_pdt_subcategoria_join_subcategoria> listarSubCategoriasIdcategoria(int id) {

        ArrayList<model_pdt_subcategoria_join_subcategoria> lista = new ArrayList<model_pdt_subcategoria_join_subcategoria>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_subcategoria_select_idcategoria(?) }");
            prcProcedimientoAlmacenado.setInt(1, id);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_subcategoria_join_subcategoria obj = 
                        mapper_pdt_subcategoria_join_subcategoria.GetSubCategoriaWhereFromResultSet(rs);
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
    
    public String activarInactivarSubCategoria(model_pdt_subcategoria_join_subcategoria obj) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            System.out.println("1"+con);
            con.setAutoCommit(false);
            System.out.println("2"+con);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_Sub_categoria_activar_inactivar(?,?,?,?) }");
            System.out.println("3");
            System.out.println("1: "+obj.getId_subcategoria());
            prodProAlm.setLong(1, obj.getId_subcategoria());
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
    public String actualizarSubCategoria(model_pdt_subcategoria_join_subcategoria obj) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_sub_categoria_update(?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_subcategoria());
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
