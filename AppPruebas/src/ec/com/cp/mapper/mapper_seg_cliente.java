/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.mapper;

import ec.com.cp.model.join.model_seg_cliente_join;
import ec.com.cp.model.join.model_seg_usuario_join;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**    private Long id_rol;
    private String rol;
    private Long id_sucursal;
    private Long id_persona;
    private String estado;
    private String nombre;
    private String cedula;
    private String telefono;
    private String email;
    private String direccion;
 *
 * @author Usuario
 */
public class mapper_seg_cliente {
        public static model_seg_cliente_join GetClienteFromResultSet(ResultSet rs) {
        model_seg_cliente_join obj = new model_seg_cliente_join();
        try {
            obj.setId_rol(rs.getLong("id_rol"));
            obj.setRol(rs.getString("rol"));
            obj.setId_sucursal(rs.getLong("id_sucursal"));
            obj.setId_persona(rs.getLong("id_persona"));
            obj.setEstado(rs.getString("estado"));
            obj.setNombre(rs.getString("nombre"));
            obj.setCedula(rs.getString("Cedula"));
            obj.setTelefono(rs.getString("telefono"));
            obj.setCelular(rs.getString("celular"));
            obj.setEmail(rs.getString("email"));
            obj.setDireccion(rs.getString("direccion"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_seg_usuario_join.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
}
