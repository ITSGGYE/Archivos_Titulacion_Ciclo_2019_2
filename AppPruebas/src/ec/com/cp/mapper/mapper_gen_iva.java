/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_gen_iva;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author ESTUDIANTE
 */
public class mapper_gen_iva {

    public static model_gen_iva GetIvaActivoFromResultSet(ResultSet rs) {
        model_gen_iva obj = new model_gen_iva();
        try {
            obj.setId_iva(rs.getLong("id_iva"));
            obj.setIva(rs.getString("iva"));
            obj.setEstado(rs.getString("estdo_iva").charAt(0));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
