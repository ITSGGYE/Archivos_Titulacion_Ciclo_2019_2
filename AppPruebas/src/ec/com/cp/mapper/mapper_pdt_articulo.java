/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_pdt_articulo;
import ec.com.cp.model.model_pdt_articulo_dos;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class mapper_pdt_articulo {

//    public static model_pdt_articulo GetArticuloFromResultSet(ResultSet rs) {
//        model_pdt_articulo obj = new model_pdt_articulo();
//        try {
//            obj.setId_articulo(rs.getLong("id_articulo"));
//            obj.setNombre_articulo(rs.getString("articulo"));
//            obj.setDescripcion(rs.getString("descripcion"));
//            obj.setEstado(rs.getString("estado").charAt(0));
//            obj.setObservacion(rs.getString("observacion"));
//            obj.setU_creacion(rs.getString("usuario_creacion"));
//            obj.setF_creacion(rs.getDate("f_creacion"));
//            obj.setU_actualizacion(rs.getString("usuario_actulizacion"));
//            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
//            obj.setId_subcategoria(rs.getLong("id_subcategoria"));
//            obj.setSubcategoria(rs.getString("nombre_subcategoria"));
//            obj.setId_categoria(rs.getLong("id_categoria"));
//            obj.setCategoria(rs.getString("nombre_categoria"));
//
//        } catch (SQLException ex) {
//            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
//        }
//        return obj;
//    }
    
    public static model_pdt_articulo_dos GetArticuloFromResultSet(ResultSet rs) {
        model_pdt_articulo_dos obj = new model_pdt_articulo_dos();
        try {
            obj.setId_articulo(rs.getLong("id_articulo"));
            obj.setId_marca(rs.getLong("id_marca"));
            obj.setArticulo(rs.getString("articulo"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setUsuario_creacion(rs.getString("usuario_creacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setUsuario_actulizacion(rs.getString("usuario_actulizacion"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setNombre_marca(rs.getString("nombre_marca"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
     public static model_pdt_articulo_dos GetArticuloIdMarcaFromResultSet(ResultSet rs) {
        model_pdt_articulo_dos obj = new model_pdt_articulo_dos();
        try {
            obj.setId_articulo(rs.getLong("id_articulo"));
            obj.setId_marca(rs.getLong("id_marca"));
            obj.setArticulo(rs.getString("articulo"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setUsuario_creacion(rs.getString("usuario_creacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setUsuario_actulizacion(rs.getString("usuario_actulizacion"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
//            obj.setNombre_marca(rs.getString("nombre_marca"));
//            obj.setSubcategoria(rs.getString("nombre_subcategoria"));
//            obj.setId_categoria(rs.getLong("id_categoria"));
//            obj.setCategoria(rs.getString("nombre_categoria"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
