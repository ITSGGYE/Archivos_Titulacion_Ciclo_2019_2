/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_pdt_marca;
import ec.com.cp.model.model_pdt_marca_dos;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author nuevouser
 */
public class mapper_pdt_marca {

//    public static model_pdt_marca GetMarcaFromResultSet(ResultSet rs) {
//
//        model_pdt_marca obj = new model_pdt_marca();
//        try {
//            obj.setId_marca(rs.getLong("id_marca"));
//            obj.setNombre(rs.getString("nombre_marca"));
//            obj.setDescrpcion(rs.getString("descripcion"));
//            obj.setEstado(rs.getString("estado").charAt(0));
//            obj.setU_creacion(rs.getString("u_creacion"));
//            obj.setF_creacion(rs.getDate("f_creacion"));
//            obj.setU_actualizacion(rs.getString("u_actualizacion"));
//            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
//            obj.setId_articulo(rs.getLong("id_articulo"));
//            obj.setArticulo(rs.getString("articulo"));
//        } catch (SQLException ex) {
//            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
//        }
//        return obj;
//    }
    
    public static model_pdt_marca_dos GetMarcaFromResultSet(ResultSet rs) {

        model_pdt_marca_dos obj = new model_pdt_marca_dos();
        try {
            obj.setId_marca(rs.getLong("id_marca"));
            obj.setId_categoria(rs.getLong("id_categoria"));
            obj.setId_subcategoria(rs.getLong("id_subcategoria"));
            obj.setNombre_marca(rs.getString("nombre_marca"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setU_actualizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setNombre_categoria(rs.getString("nombre_categoria"));
            obj.setNombre_subcategoria(rs.getString("nombre_subcategoria"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }

//    public static model_pdt_marca_dos GetMarcaIdArticuloFromResultSet(ResultSet rs) {
//
//        model_pdt_marca_dos obj = new model_pdt_marca_dos();
//        try {
//            obj.setId_marca(rs.getLong("id_marca"));
//            obj.setNombre_marca(rs.getString("nombre_marca"));
//            obj.setDescrpcion(rs.getString("descripcion"));
//            obj.setEstado(rs.getString("estado").charAt(0));
//            obj.setU_creacion(rs.getString("u_creacion"));
//            obj.setF_creacion(rs.getDate("f_creacion"));
//            obj.setU_actualizacion(rs.getString("u_actualizacion"));
//            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
//            obj.setId_articulo(rs.getLong("id_articulo"));
////            obj.setArticulo(rs.getString("articulo"));
//        } catch (SQLException ex) {
//            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
//        }
//        return obj;
//    }
    public static model_pdt_marca_dos GetMarcaIdArticuloFromResultSet(ResultSet rs) {

        model_pdt_marca_dos obj = new model_pdt_marca_dos();
        try {
            obj.setId_marca(rs.getLong("id_marca"));
            obj.setId_categoria(rs.getLong("id_categoria"));
            obj.setId_subcategoria(rs.getLong("id_subcategoria"));
            obj.setNombre_marca(rs.getString("nombre_marca"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setU_actualizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setNombre_categoria(rs.getString("nombre_categoria"));
            obj.setNombre_subcategoria(rs.getString("nombre_subcategoria"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
