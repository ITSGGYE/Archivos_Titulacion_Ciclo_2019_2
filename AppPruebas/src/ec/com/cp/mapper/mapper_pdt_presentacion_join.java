/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.join.model_pdt_presentacion_join;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class mapper_pdt_presentacion_join {
        public static model_pdt_presentacion_join GetPresentacionJoinFromResultSet(ResultSet rs) {
        model_pdt_presentacion_join obj = new model_pdt_presentacion_join();
        try {
//pre.`id_presentacion`,pre.`id_medida`,med.`nombre_medida`,pre.`id_envase`,env.`nombre_envase`,pre.`estado`
//,pre.`id_marca`,
//pre.`u_creacion`,pre.`f_creacion`,pre.`u_actualizacion`,pre.`f_actualizacion`
            obj.setId_presentacion(rs.getLong("id_presentacion"));
            obj.setId_medida(rs.getLong("id_medida"));
            obj.setNombre_medida(rs.getString("nombre_medida"));
            obj.setId_envase(rs.getLong("id_envase"));
            obj.setNombre_envase(rs.getString("nombre_envase"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setF_creacion(rs.getDate("f_creacion"));
            obj.setUsuario_actulizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
            obj.setId_articulo(rs.getLong("id_articulo"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_pdt_envase.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
