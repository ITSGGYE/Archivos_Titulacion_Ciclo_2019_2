/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_pdt_marca;
import ec.com.cp.model.Fila;
import ec.com.cp.model.model_pdt_marca;
import ec.com.cp.model.model_pdt_marca_dos;
import ec.com.cp.util.DBConeccion;
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
 * @author nuevouser
 */
public class ctr_pdt_marca {

    Connection con = null;
//    DBConeccion conectarBD = new DBConeccion();
    Fila conectarBD = new Fila();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

    public ArrayList<model_pdt_marca_dos> listarMarcas(int op) {

        ArrayList<model_pdt_marca_dos> lista = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_marca_select_all(?) }");
            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_marca_dos obj = mapper_pdt_marca.GetMarcaFromResultSet(rs);
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
        public String insertarMarca(model_pdt_marca_dos obj, int op) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_marca_insert(?,?,?,?,?,?,?) }");
            prodProAlm.setInt(1, op);
            prodProAlm.setString(2, obj.getNombre_marca());
            prodProAlm.setString(3, "" + obj.getEstado());
            prodProAlm.setString(4, obj.getU_creacion());
            prodProAlm.setString(5, obj.getF_creacion());
            prodProAlm.setLong(6, obj.getId_subcategoria());
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
        public String actualizarMarca(model_pdt_marca_dos obj, int op) {
        //ArrayList<Productos> lista = new ArrayList<Productos>();
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_marca_update(?,?,?,?,?) }");
            prodProAlm.setLong(1, op);
            prodProAlm.setString(2, obj.getNombre_marca());
//            prodProAlm.setString(3, "" + obj.getEstado());
//            prodProAlm.setString(3, obj.getDescrpcion());
            prodProAlm.setString(3, obj.getU_actualizacion());
//            prodProAlm.setString(4, obj.getF_actualizacion());
            prodProAlm.setLong(4, obj.getId_marca());
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
            public ArrayList<model_pdt_marca_dos> listarMarcasIdArticulo(int id) {

        ArrayList<model_pdt_marca_dos> lista = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_marca_select_id_marca(?) }");
            prcProcedimientoAlmacenado.setInt(1, id);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_marca_dos obj = mapper_pdt_marca.GetMarcaIdArticuloFromResultSet(rs);
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
            
    public String activarInactivarMarca(model_pdt_marca_dos obj) {
        String valor = null;
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_marca_activar_inactivar(?,?,?,?) }");
            prodProAlm.setLong(1, obj.getId_marca());
            prodProAlm.setString(2, "" + obj.getEstado());
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
