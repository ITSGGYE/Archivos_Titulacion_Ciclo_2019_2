/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.controler;

import ec.com.cp.mapper.mapper_pdt_presentacion_join;
import ec.com.cp.model.Fila;
import ec.com.cp.model.join.model_pdt_presentacion_join;
import ec.com.cp.model.model_pdt_presentacion;
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
public class ctr_pdt_presentacion {

    Connection con = null;
    Fila conectarBD = new Fila();
//    DBConeccion conectarBD = new DBConeccion();
    CallableStatement pro;
    ResultSet rs = null;
    java.sql.Statement st = null;
    PreparedStatement ps;

    public String insertarPresentacion(model_pdt_presentacion obj, int op) {
        String valor = "";
        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prodProAlm = con.prepareCall(
                    "{ call pdt_presentacion_insert(?,?,?,?,?,?,?) }");
            prodProAlm.setInt(1, op);
            prodProAlm.setLong(2, obj.getId_medida());
            prodProAlm.setLong(3, obj.getId_envase());
            prodProAlm.setString(4, "" + obj.getEstado());
            prodProAlm.setString(5, obj.getUsuario_creacion());
            prodProAlm.setLong(6, obj.getId_articulo());
            prodProAlm.registerOutParameter("valor", Types.VARCHAR);
            prodProAlm.executeUpdate();
            valor = prodProAlm.getString("valor");

            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_presentacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_pdt_presentacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    public ArrayList<model_pdt_presentacion_join> listarPresentacionIdMarca(/*int op*/) {

        ArrayList<model_pdt_presentacion_join> lista = new ArrayList<>();

        try {
            con = conectarBD.getConnection();
            con.setAutoCommit(false);
            CallableStatement prcProcedimientoAlmacenado = con.prepareCall(
                    "{ call pdt_presentacion_id_articulo() }");
//            prcProcedimientoAlmacenado.setInt(1, op);
            prcProcedimientoAlmacenado.execute();
            rs = prcProcedimientoAlmacenado.getResultSet();
            while (rs.next()) {
                model_pdt_presentacion_join obj = mapper_pdt_presentacion_join.GetPresentacionJoinFromResultSet(rs);
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
}
