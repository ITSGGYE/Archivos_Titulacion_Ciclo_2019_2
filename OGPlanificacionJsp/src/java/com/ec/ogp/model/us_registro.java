/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.model;

/**
 *
 * @author carlos
 */
public class us_registro {
    private Long id_registro;
    private String apellidos_nombres;
    private String cedula;
    private String direccion;
    private String convecional;
    private String fecha_nacimiento;
    private String telefono_dos;
    private String correo;
    private String correo_dos;
    private String observacion;
    private Long id_creacion;
    private String f_creacion;
    private Long id_actualizacion;
    private String f_actualizacion;
    private Long estado;

    public us_registro() {
    }

    public us_registro(Long id_registro, String apellidos_nombres, String cedula, String direccion, String convecional, String fecha_nacimiento, String telefono_dos, String correo, String correo_dos, String observacion, Long id_creacion, String f_creacion, Long id_actualizacion, String f_actualizacion, Long estado) {
        this.id_registro = id_registro;
        this.apellidos_nombres = apellidos_nombres;
        this.cedula = cedula;
        this.direccion = direccion;
        this.convecional = convecional;
        this.fecha_nacimiento = fecha_nacimiento;
        this.telefono_dos = telefono_dos;
        this.correo = correo;
        this.correo_dos = correo_dos;
        this.observacion = observacion;
        this.id_creacion = id_creacion;
        this.f_creacion = f_creacion;
        this.id_actualizacion = id_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.estado = estado;
    }

    public Long getId_registro() {
        return id_registro;
    }

    public void setId_registro(Long id_registro) {
        this.id_registro = id_registro;
    }

    public String getApellidos_nombres() {
        return apellidos_nombres;
    }

    public void setApellidos_nombres(String apellidos_nombres) {
        this.apellidos_nombres = apellidos_nombres;
    }

    public String getCedula() {
        return cedula;
    }

    public void setCedula(String cedula) {
        this.cedula = cedula;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getConvecional() {
        return convecional;
    }

    public void setConvecional(String convecional) {
        this.convecional = convecional;
    }

    public String getFecha_nacimiento() {
        return fecha_nacimiento;
    }

    public void setFecha_nacimiento(String fecha_nacimiento) {
        this.fecha_nacimiento = fecha_nacimiento;
    }

    public String getTelefono_dos() {
        return telefono_dos;
    }

    public void setTelefono_dos(String telefono_dos) {
        this.telefono_dos = telefono_dos;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getCorreo_dos() {
        return correo_dos;
    }

    public void setCorreo_dos(String correo_dos) {
        this.correo_dos = correo_dos;
    }

    public String getObservacion() {
        return observacion;
    }

    public void setObservacion(String observacion) {
        this.observacion = observacion;
    }

    public Long getId_creacion() {
        return id_creacion;
    }

    public void setId_creacion(Long id_creacion) {
        this.id_creacion = id_creacion;
    }

    public String getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(String f_creacion) {
        this.f_creacion = f_creacion;
    }

    public Long getId_actualizacion() {
        return id_actualizacion;
    }

    public void setId_actualizacion(Long id_actualizacion) {
        this.id_actualizacion = id_actualizacion;
    }

    public String getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(String f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }

    public Long getEstado() {
        return estado;
    }

    public void setEstado(Long estado) {
        this.estado = estado;
    }
    
}
