/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.join.model_seg_proveedor_join;
import ec.com.cp.model.model_seg_rol;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class mapper_seg_proeveedor_join {
    
    public static model_seg_proveedor_join GetProveedorFromResultSet(ResultSet rs) {
        model_seg_proveedor_join obj = new model_seg_proveedor_join();
        try {
            obj.setId_persona(rs.getLong("id_persona"));
            obj.setNombre(rs.getString("nombre"));
            obj.setCedula(rs.getString("Cedula"));
            obj.setCorreo_electronico(rs.getString("correo_electronico"));
            obj.setDireccion(rs.getString("Direccion"));
            obj.setEstado(rs.getString("estado"));
            obj.setFecha_nacimiento(rs.getString("Fecha_nacimiento"));
            obj.setObservacion(rs.getString("observacion"));
            obj.setUsuario_creacion(rs.getString("usuario_creacion"));
            obj.setUsuario_actulizacion(rs.getString("usuario_actulizacion"));
            obj.setF_creacion(rs.getDate("f_creacion"));
            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
            obj.setId_rol(rs.getLong("id_rol"));
            obj.setRol(rs.getString("rol"));
            obj.setPassword(rs.getString("password"));
            obj.setEmail(rs.getString("email"));
            obj.setId_sucursal(rs.getLong("id_sucursal"));
            obj.setId_usuario(rs.getLong("id_usuario"));
            obj.setTelefono(rs.getString("telefono"));
            obj.setNomb_usuario(rs.getString("nomb_usuario"));
            obj.setTelefono_dos(rs.getString("telefono_dos"));
            obj.setNombre_comercial(rs.getString("monbre_comercial"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_proeveedor_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static model_seg_rol GetRolFromResultSet(ResultSet rs) {
        model_seg_rol obj = new model_seg_rol();
        try {
            obj.setRol(rs.getString("rol"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_proeveedor_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
