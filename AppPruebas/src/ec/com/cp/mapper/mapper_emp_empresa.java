/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.join.model_emp_empresa_join;
import ec.com.cp.model.model_emp_empresa;
import ec.com.cp.model.model_emp_sucursal;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class mapper_emp_empresa {
    public static model_emp_empresa GetEmpresaFromResultSet(ResultSet rs) {
        model_emp_empresa obj = new model_emp_empresa();
        try {
            obj.setId_cuidad(rs.getLong("id_cuidad"));
            obj.setId_empresa(rs.getLong("id_empresa"));
            obj.setNombre_comercial(rs.getString("nombre_comercial"));
            obj.setRuc(rs.getString("ruc"));
            obj.setTelefono(rs.getString("telefono"));
            obj.setDireccion(rs.getString("direccion"));
            obj.setEstado(rs.getString("estado"));
            obj.setCorreo(rs.getString("correo"));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setU_actualizacion(rs.getString("u_actulizacion"));
            obj.setF_creacion(rs.getDate("f_creacion"));
            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static model_emp_empresa GetEmpresaComboFromResultSet(ResultSet rs) {
        model_emp_empresa obj = new model_emp_empresa();
        try {
            obj.setNombre_comercial(rs.getString("nombre_comercial"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static model_emp_sucursal GetSucursalComboFromResultSet(ResultSet rs) {
        model_emp_sucursal obj = new model_emp_sucursal();
        try {
            obj.setNombre_comercial(rs.getString("nombre_comercial"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static model_emp_empresa_join GetEmpresaJoinFromResultSet(ResultSet rs) {
        model_emp_empresa_join obj = new model_emp_empresa_join();
        try {
            obj.setId_sucursal(rs.getLong("id_sucursal"));
            obj.setNombre_comercial(rs.getString("nombre_comercial"));
            obj.setRuc(rs.getString("ruc"));
            obj.setTelefono(rs.getString("telefono"));
            obj.setDireccion(rs.getString("direccion"));
            obj.setEstado(rs.getString("estado"));
            obj.setCorreo(rs.getString("correo"));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setU_actualizacion(rs.getString("u_actualizacion"));
            obj.setF_creacion(rs.getDate("f_creacion"));
            obj.setF_actualizacion(rs.getDate("f_actualizacion"));
            obj.setId_bodega(rs.getLong("id_bodega"));
            obj.setNombre_bodega(rs.getString("nombre_bodega"));
            obj.setObservacion_suc(rs.getString("observacion_suc"));
            obj.setObservacion_bod(rs.getString("observacion_bod"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
