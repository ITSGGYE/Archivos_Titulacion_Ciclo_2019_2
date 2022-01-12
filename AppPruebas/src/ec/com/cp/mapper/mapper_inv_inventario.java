/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.join.model_inv_inventario_join;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class mapper_inv_inventario {

    public static model_inv_inventario_join GetInventarioFromResultSet(ResultSet rs) {
        model_inv_inventario_join obj = new model_inv_inventario_join();
        try {
            obj.setId_iva(rs.getLong("id_iva"));
            obj.setId_kardex(rs.getLong("id_kardex"));
            obj.setId_producto(rs.getLong("id_producto"));
//            obj.setId_usuario(rs.getLong("id_usuario"));
            obj.setCantidad(rs.getLong("cantidad"));
            obj.setCodigo_barra(rs.getString("codigo_barra"));
            obj.setCosto_actual(rs.getDouble("costo_actual"));
            obj.setCosto_anterior(rs.getDouble("costo_anterior"));
            obj.setCosto_promedio(rs.getDouble("costo_promedio"));
            obj.setEntrada(rs.getLong("entrada"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setEstado_inv(rs.getString("estado_inv").charAt(0));
            obj.setEstdo_iva(rs.getString("estdo_iva").charAt(0));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setFecha(rs.getString("fecha"));
            obj.setNombre_producto(rs.getString("nombre_producto"));
            obj.setPrecio(rs.getDouble("precio"));
            obj.setSalida(rs.getLong("salida"));
            obj.setTotal(rs.getLong("total"));
            obj.setUsuario_actulizacion(rs.getString("usuario_actulizacion"));
            obj.setUsuario_creacion(rs.getString("usuario_creacion"));
            obj.setValor_total(rs.getDouble("valor_total"));
            obj.setMinimo(rs.getLong("minimo"));
            obj.setMaximo(rs.getLong("maximo"));
//            obj.setIva_string("iva_string");

        } catch (SQLException ex) {
            Logger.getLogger(mapper_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }

    public static model_inv_inventario_join GetInventarioStockVentaFromResultSet(ResultSet rs) {
        model_inv_inventario_join obj = new model_inv_inventario_join();
        try {
            obj.setId_iva(rs.getLong("id_iva"));
            obj.setId_kardex(rs.getLong("id_kardex"));
            obj.setId_producto(rs.getLong("id_producto"));
//            obj.setId_usuario(rs.getLong("id_usuario"));
            obj.setCantidad(rs.getLong("cantidad"));
            obj.setCodigo_barra(rs.getString("codigo_barra"));
            obj.setCosto_actual(rs.getDouble("costo_actual"));
            obj.setCosto_anterior(rs.getDouble("costo_anterior"));
            obj.setCosto_promedio(rs.getDouble("costo_promedio"));
            obj.setEntrada(rs.getLong("entrada"));
            obj.setEstado(rs.getString("estado").charAt(0));
            obj.setEstado_inv(rs.getString("estado_inv").charAt(0));
            obj.setEstdo_iva(rs.getString("estdo_iva").charAt(0));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setFecha(rs.getString("fecha"));
            obj.setNombre_producto(rs.getString("nombre_producto"));
            obj.setPrecio(rs.getDouble("precio"));
            obj.setSalida(rs.getLong("salida"));
            obj.setTotal(rs.getLong("total"));
            obj.setUsuario_actulizacion(rs.getString("usuario_actulizacion"));
            obj.setUsuario_creacion(rs.getString("usuario_creacion"));
            obj.setValor_total(rs.getDouble("valor_total"));
            obj.setMinimo(rs.getLong("minimo"));
            obj.setMaximo(rs.getLong("maximo"));
            obj.setIva_string(rs.getString("aplica_iva"));
////det.`valor_costo`,det.`valor_venta`,det.`valor_descuento`,det.`estado`
            obj.setValor_costo(rs.getDouble("valor_costo"));
            obj.setValor_venta(rs.getDouble("valor_venta"));
            obj.setValor_descuento(rs.getDouble("valor_descuento"));
            obj.setEstdo_tarifario(rs.getString("estado_tarifario").charAt(0));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }   
    public static model_inv_inventario_join GetInventarioFromResultSetC(ResultSet rs) {
        model_inv_inventario_join obj = new model_inv_inventario_join();
        try {
            obj.setId_iva(rs.getLong("id_iva"));
            obj.setId_kardex(rs.getLong("id_kardex"));
            obj.setId_producto(rs.getLong("id_producto"));
//            obj.setId_usuario(rs.getLong("id_usuario"));
            obj.setCantidad(rs.getLong("cantidad"));
            obj.setCodigo_barra(rs.getString("codigo_barra"));
//            obj.setCosto_actual(rs.getDouble("costo_actual"));
//            obj.setCosto_anterior(rs.getDouble("costo_anterior"));
//            obj.setCosto_promedio(rs.getDouble("costo_promedio"));
//            obj.setEntrada(rs.getLong("entrada"));
            obj.setEstado(rs.getString("estado").charAt(0));
//            obj.setEstado_inv(rs.getString("estado_inv").charAt(0));
//            obj.setEstdo_iva(rs.getString("estdo_iva").charAt(0));
//            obj.setF_actualizacion(rs.getString("f_actualizacion"));
//            obj.setF_creacion(rs.getString("f_creacion"));
//            obj.setFecha(rs.getString("fecha"));
            obj.setNombre_producto(rs.getString("nombre_producto"));
            obj.setValor_costo(rs.getDouble("valor_costo"));
            obj.setValor_venta(rs.getDouble("valor_venta"));
            obj.setValor_descuento(rs.getLong("valor_descuento"));
//            obj.setTotal(rs.getLong("total"));
//            obj.setUsuario_actulizacion(rs.getString("usuario_actulizacion"));
//            obj.setUsuario_creacion(rs.getString("usuario_creacion"));
//            obj.setValor_total(rs.getDouble("valor_total"));
            obj.setMinimo(rs.getLong("minimo"));
            obj.setMaximo(rs.getLong("maximo"));
            obj.setId_bodega(rs.getLong("id_bodega"));
            obj.setNombre_bodega(rs.getString("nombre_bodega"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_inv_inventario.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
