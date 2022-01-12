/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_gen_bodega;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class mapper_inv_bodega {
        public static model_gen_bodega GetBodegaFromResultSet(ResultSet rs) {
        model_gen_bodega obj = new model_gen_bodega();
        try {
            obj.setId_bodega(rs.getLong("id_bodega"));
            obj.setNombre_bodega(rs.getString("nombre_bodega"));
            obj.setEstado(rs.getString("estado").charAt(0));
//            obj.setIva_string("iva_string");`id_bodega``nombre_bodega``estado`

        } catch (SQLException ex) {
            Logger.getLogger(mapper_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
