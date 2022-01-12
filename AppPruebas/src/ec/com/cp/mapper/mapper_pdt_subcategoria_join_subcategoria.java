/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.join.model_pdt_subcategoria_join_subcategoria;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class mapper_pdt_subcategoria_join_subcategoria {

    public static model_pdt_subcategoria_join_subcategoria GetSubCategoriaFromResultSet(ResultSet rs) {
        model_pdt_subcategoria_join_subcategoria obj = new model_pdt_subcategoria_join_subcategoria();
        try {

            obj.setId_subcategoria(rs.getLong("id_subcategoria"));
            obj.setNombre(rs.getString("nombre"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setUsuario_creacion(rs.getString("u_creacion"));
            obj.setF_creacion(rs.getDate("f_creacion"));
            obj.setUsuario_actulizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
            obj.setId_categoria(rs.getLong("id_categoria"));
            obj.setNombre_categoria(rs.getString("nombre_categoria"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
        public static model_pdt_subcategoria_join_subcategoria GetSubCategoriaWhereFromResultSet(ResultSet rs) {
        model_pdt_subcategoria_join_subcategoria obj = new model_pdt_subcategoria_join_subcategoria();
        try {

            obj.setId_subcategoria(rs.getLong("id_subcategoria"));
            obj.setNombre(rs.getString("nombre"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setUsuario_creacion(rs.getString("u_creacion"));
            obj.setF_creacion(rs.getDate("f_creacion"));
            obj.setUsuario_actulizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
            obj.setId_categoria(rs.getLong("id_categoria"));
//            obj.setNombre_categoria(rs.getString("nombre_categoria"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
