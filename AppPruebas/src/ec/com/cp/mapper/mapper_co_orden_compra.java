/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.model_co_cabecera_compra;
import ec.com.cp.model.model_co_detalle_compra;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class mapper_co_orden_compra {

    public static model_co_cabecera_compra GetOrdenCompraFromResultSet(ResultSet rs) {
        model_co_cabecera_compra obj = new model_co_cabecera_compra();
        try {
            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
            obj.setF_creacion(rs.getDate("f_creacion"));
            obj.setF_recibido(rs.getString("f_recibido"));
            obj.setF_verificado(rs.getString("f_verificado"));
            obj.setForma_pago(rs.getString("forma_pago"));
            obj.setId_cabecera(rs.getLong("id_cabecera"));
            obj.setId_proveedor(rs.getLong("id_proveedor"));
            obj.setId_sucursal(rs.getLong("id_sucursal"));
            obj.setRecibido(rs.getString("recibido"));
            obj.setTotal_descuento(rs.getDouble("total_descuento"));
            obj.setTotal_facturado(rs.getDouble("total_facturado"));
            obj.setTotal_iva(rs.getDouble("total_iva"));
            obj.setTotal_subtotal(rs.getDouble("total_subtotal"));
            obj.setUsuario_actulizacion(rs.getString("usuario_actulizacion"));
            obj.setUsuario_creacion(rs.getString("usuario_creacion"));
            obj.setVerificado(rs.getString("verificado"));
            obj.setEstado(rs.getString("estado"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static model_co_detalle_compra GetOrdenCompraDetalleFromResultSet(ResultSet rs) {
        model_co_detalle_compra obj = new model_co_detalle_compra();
        try {
            obj.setCantidad(rs.getInt("cantidad"));
            obj.setDecuento(rs.getDouble("decuento"));
            obj.setDescripcion(rs.getString("descripcion"));
            obj.setId_cabecera(rs.getLong("id_cabecera"));
            obj.setId_producto(rs.getLong("id_producto"));
            obj.setItem(rs.getInt("item"));
            obj.setEstado(rs.getString("estado"));
            obj.setIva(rs.getDouble("iva"));
            obj.setPrecio_unitario(rs.getDouble("precio_unitario"));
            obj.setSub_total(rs.getDouble("sub_total"));
            obj.setTotal(rs.getDouble("total"));
            obj.setLinea_detalle(rs.getInt("linea_detalle"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
