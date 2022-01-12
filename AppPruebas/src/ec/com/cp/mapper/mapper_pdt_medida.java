/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_pdt_medida;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class mapper_pdt_medida {
    public static model_pdt_medida GetMedidaFromResultSet(ResultSet rs) {
        model_pdt_medida obj = new model_pdt_medida();
        try {
            obj.setId_medida(rs.getLong("id_medida"));
            obj.setEstdao(rs.getString("estdao"));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setU_actualizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setNombre_medida(rs.getString("nombre_medida"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_pdt_envase.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
