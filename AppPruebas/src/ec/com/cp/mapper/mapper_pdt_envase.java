/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_pdt_articulo;
import ec.com.cp.model.model_pdt_envase;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class mapper_pdt_envase {
    public static model_pdt_envase GetEnvaseFromResultSet(ResultSet rs) {
        model_pdt_envase obj = new model_pdt_envase();
        try {
            obj.setId_envase(rs.getLong("id_envase"));
            obj.setEstado(rs.getString("estado"));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setU_actualizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setNombre_envase(rs.getString("nombre_envase"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_pdt_envase.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
