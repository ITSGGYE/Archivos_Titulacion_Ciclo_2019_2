/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.join.model_pdt_producto_join;
import ec.com.cp.model.model_pdt_producto;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Usuario
 */
public class mapper_pdt_producto {

    public static model_pdt_producto GetProductoFromResultSet(ResultSet rs) {
        model_pdt_producto obj = new model_pdt_producto();
        try {
            obj.setNombre_categoria(rs.getString("nombre_categoria"));
            obj.setId_categoria(rs.getLong("id_categoria"));
            obj.setNombre_subcategoria(rs.getString("nombre_subcategoria"));
            obj.setId_subcategoria(rs.getLong("id_subcategoria"));
            obj.setArticulo(rs.getString("nombre_articulo"));
            obj.setId_articulo(rs.getLong("id_articulo"));
            obj.setId_bodega(rs.getLong("id_bodega"));
            obj.setNombre_marca(rs.getString("nombre_marca"));
            obj.setId_marca(rs.getLong("id_marca"));
            obj.setId_medida(rs.getLong("id_medida"));
            obj.setNombre_medida(rs.getString("nombre_medida"));
            obj.setId_envase(rs.getLong("id_envase"));
            obj.setNombre_envase(rs.getString("nombre_envase"));
            obj.setId_producto(rs.getLong("id_producto"));
            obj.setCodigo_barra(rs.getString("codigo_barra"));
            obj.setNombre_producto1(rs.getString("nombre_producto"));
            obj.setDescrpcion(rs.getString("descripcion"));
            obj.setPrecio(rs.getDouble("precio"));
            obj.setId_iva(rs.getLong("id_iva"));
            obj.setMaximo(rs.getLong("maximo"));
            obj.setMinimo(rs.getLong("minimo"));
            obj.setIva(rs.getString("iva"));
            obj.setEstado(rs.getString("estado").charAt(0));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
