/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model.join;

/**
 *SELECT su.`email`,su.`id_rol`,sr.`rol`,su.`id_sucursal`,su.`id_persona`,su.`estado`,
sp.`Nombre`,sp.`cedula`,sp.`telefono`,sp.`correo_electronico`,sp.`direccion`
FROM `seg_usuario` su
INNER JOIN `seg_persona` sp ON sp.`id_persona`= su.`id_persona`
INNER JOIN `seg_rol` sr ON sr.`id_rol`= su.`id_rol`
WHERE sr.`id_rol`= 4
 * @author Usuario
 */
public class model_seg_cliente_join {
    
    private Long id_rol;
    private String rol;
    private Long id_sucursal;
    private Long id_persona;
    private String estado;
    private String nombre;
    private String cedula;
    private String telefono;
    private String celular;
    private String email;
    private String direccion;

    public model_seg_cliente_join() {
    }

    public model_seg_cliente_join(Long id_rol, String rol, Long id_sucursal, Long id_persona, String estado, String nombre, String cedula, String telefono, String celular, String email, String direccion) {
        this.id_rol = id_rol;
        this.rol = rol;
        this.id_sucursal = id_sucursal;
        this.id_persona = id_persona;
        this.estado = estado;
        this.nombre = nombre;
        this.cedula = cedula;
        this.telefono = telefono;
        this.celular = celular;
        this.email = email;
        this.direccion = direccion;
    }


    public Long getId_rol() {
        return id_rol;
    }

    public void setId_rol(Long id_rol) {
        this.id_rol = id_rol;
    }

    public String getRol() {
        return rol;
    }

    public void setRol(String rol) {
        this.rol = rol;
    }

    public Long getId_sucursal() {
        return id_sucursal;
    }

    public void setId_sucursal(Long id_sucursal) {
        this.id_sucursal = id_sucursal;
    }

    public Long getId_persona() {
        return id_persona;
    }

    public void setId_persona(Long id_persona) {
        this.id_persona = id_persona;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getCedula() {
        return cedula;
    }

    public void setCedula(String cedula) {
        this.cedula = cedula;
    }

    public String getTelefono() {
        return telefono;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getCelular() {
        return celular;
    }

    public void setCelular(String celular) {
        this.celular = celular;
    }
    
}
