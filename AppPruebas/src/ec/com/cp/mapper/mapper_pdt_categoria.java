/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_pdt_categoria;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class mapper_pdt_categoria {
    
        public static model_pdt_categoria GetCategoriaFromResultSet(ResultSet rs) {
        model_pdt_categoria obj = new model_pdt_categoria();
        try {
            
            obj.setId_categoria(rs.getLong("id_categoria"));
            obj.setNombre(rs.getString("nombre"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setUsuario_creacion(rs.getString("u_creacion"));
            obj.setF_creacion(rs.getDate("f_creacion"));
            obj.setUsuario_actulizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
