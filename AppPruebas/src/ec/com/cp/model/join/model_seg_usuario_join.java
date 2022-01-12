/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model.join;

import java.util.Date;



/**
 *
 * @author carlos
 */
public class model_seg_usuario_join{


    private Long id_persona;
    private String Nombre;
    private String cedula;
    private String telefono;
    private String correo_electronico;
    private String direccion;
    private String estado;
    private String observacion;
    private String usuario_creacion;
    private Date f_creacion;
    private String usuario_actulizacion;
    private Date f_actualizacion;
    private String Fecha_nacimiento;
    private Long id_rol;
    private String rol;
    private String password;
    private String email;
    private Long id_sucursal;
    private Long id_usuario;
    private String nomb_usuario;

    public model_seg_usuario_join() {
    }

    public model_seg_usuario_join(Long id_persona, String Nombre, String cedula, String telefono, String correo_electronico, String direccion, String estado, String observacion, String usuario_creacion, Date f_creacion, String usuario_actulizacion, Date f_actualizacion, String Fecha_nacimiento, Long id_rol, String rol, String password, String email, Long id_sucursal, Long id_usuario, String nomb_usuario) {
        this.id_persona = id_persona;
        this.Nombre = Nombre;
        this.cedula = cedula;
        this.telefono = telefono;
        this.correo_electronico = correo_electronico;
        this.direccion = direccion;
        this.estado = estado;
        this.observacion = observacion;
        this.usuario_creacion = usuario_creacion;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
        this.Fecha_nacimiento = Fecha_nacimiento;
        this.id_rol = id_rol;
        this.rol = rol;
        this.password = password;
        this.email = email;
        this.id_sucursal = id_sucursal;
        this.id_usuario = id_usuario;
        this.nomb_usuario = nomb_usuario;
    }

    public Long getId_persona() {
        return id_persona;
    }

    public void setId_persona(Long id_persona) {
        this.id_persona = id_persona;
    }

    public String getNombre() {
        return Nombre;
    }

    public void setNombre(String Nombre) {
        this.Nombre = Nombre;
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

    public String getCorreo_electronico() {
        return correo_electronico;
    }

    public void setCorreo_electronico(String correo_electronico) {
        this.correo_electronico = correo_electronico;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public String getObservacion() {
        return observacion;
    }

    public void setObservacion(String observacion) {
        this.observacion = observacion;
    }

    public String getUsuario_creacion() {
        return usuario_creacion;
    }

    public void setUsuario_creacion(String usuario_creacion) {
        this.usuario_creacion = usuario_creacion;
    }

    public Date getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(Date f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getUsuario_actulizacion() {
        return usuario_actulizacion;
    }

    public void setUsuario_actulizacion(String usuario_actulizacion) {
        this.usuario_actulizacion = usuario_actulizacion;
    }

    public Date getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(Date f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }

    public String getFecha_nacimiento() {
        return Fecha_nacimiento;
    }

    public void setFecha_nacimiento(String Fecha_nacimiento) {
        this.Fecha_nacimiento = Fecha_nacimiento;
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

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public Long getId_sucursal() {
        return id_sucursal;
    }

    public void setId_sucursal(Long id_sucursal) {
        this.id_sucursal = id_sucursal;
    }

    public Long getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(Long id_usuario) {
        this.id_usuario = id_usuario;
    }

    public String getNomb_usuario() {
        return nomb_usuario;
    }

    public void setNomb_usuario(String nomb_usuario) {
        this.nomb_usuario = nomb_usuario;
    }
    
    


}
