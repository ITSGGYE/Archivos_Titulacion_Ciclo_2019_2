/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_inv_detalle_tarifario;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class mapper_inv_detalle_tarifa {

    public static model_inv_detalle_tarifario GetDetalleTarifarioFromResultSet(ResultSet rs) {
        model_inv_detalle_tarifario obj = new model_inv_detalle_tarifario();
        try {
            obj.setId_detalle_tarifario(rs.getLong("id_detalle_tarifario"));
            obj.setId_tarifario(rs.getLong("id_tarifario"));
            obj.setId_producto(rs.getLong("id_producto"));
            obj.setNombre_producto(rs.getString("nombre_producto"));
            obj.setValor_costo(rs.getDouble("valor_costo"));
            obj.setValor_venta(rs.getDouble("valor_venta"));
            obj.setValor_descuento(rs.getDouble("valor_descuento"));
            obj.setPorcentaje_venta(rs.getDouble("porcentaje_venta"));
            obj.setPorcentaje_descuento(rs.getDouble("porcentaje_descuento"));
            obj.setAplica_iva(rs.getString("aplica_iva"));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setU_actualizacion(rs.getString("u_actualizacion"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setFecha(rs.getString("fecha"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }    
}
