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
public class us_usuario {
    private Long id_registro;
    private String apellidos_nombres;
    private String cedula;
    private String direccion;
    private String convecional;
    private String us_usuario;
    private Long id_usuario;
    private Long id_rol;
    private Long id_sucursal;
    private String usuario;
    private String contrasena;
    private Long estado;
    private String contrasena_encrip;
    private Long id_creacion;
    private String f_creacion;
    private Long id_actualizacion;
    private String f_actualizacion;
    private Long copia_cedula;
    private Long partida_nacimiento;
    private Long servicio_basico;
    private Long copia_titulo;

    public us_usuario() {
    }

    public us_usuario(Long id_registro, String apellidos_nombres, String cedula, String direccion, String convecional, String us_usuario, Long id_usuario, Long id_rol, Long id_sucursal, String usuario, String contrasena, Long estado, String contrasena_encrip, Long id_creacion, String f_creacion, Long id_actualizacion, String f_actualizacion, Long copia_cedula, Long partida_nacimiento, Long servicio_basico, Long copia_titulo) {
        this.id_registro = id_registro;
        this.apellidos_nombres = apellidos_nombres;
        this.cedula = cedula;
        this.direccion = direccion;
        this.convecional = convecional;
        this.us_usuario = us_usuario;
        this.id_usuario = id_usuario;
        this.id_rol = id_rol;
        this.id_sucursal = id_sucursal;
        this.usuario = usuario;
        this.contrasena = contrasena;
        this.estado = estado;
        this.contrasena_encrip = contrasena_encrip;
        this.id_creacion = id_creacion;
        this.f_creacion = f_creacion;
        this.id_actualizacion = id_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.copia_cedula = copia_cedula;
        this.partida_nacimiento = partida_nacimiento;
        this.servicio_basico = servicio_basico;
        this.copia_titulo = copia_titulo;
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

    public String getUs_usuario() {
        return us_usuario;
    }

    public void setUs_usuario(String us_usuario) {
        this.us_usuario = us_usuario;
    }

    public Long getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(Long id_usuario) {
        this.id_usuario = id_usuario;
    }

    public Long getId_rol() {
        return id_rol;
    }

    public void setId_rol(Long id_rol) {
        this.id_rol = id_rol;
    }

    public Long getId_sucursal() {
        return id_sucursal;
    }

    public void setId_sucursal(Long id_sucursal) {
        this.id_sucursal = id_sucursal;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public String getContrasena() {
        return contrasena;
    }

    public void setContrasena(String contrasena) {
        this.contrasena = contrasena;
    }

    public Long getEstado() {
        return estado;
    }

    public void setEstado(Long estado) {
        this.estado = estado;
    }

    public String getContrasena_encrip() {
        return contrasena_encrip;
    }

    public void setContrasena_encrip(String contrasena_encrip) {
        this.contrasena_encrip = contrasena_encrip;
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

    public Long getCopia_cedula() {
        return copia_cedula;
    }

    public void setCopia_cedula(Long copia_cedula) {
        this.copia_cedula = copia_cedula;
    }

    public Long getPartida_nacimiento() {
        return partida_nacimiento;
    }

    public void setPartida_nacimiento(Long partida_nacimiento) {
        this.partida_nacimiento = partida_nacimiento;
    }

    public Long getServicio_basico() {
        return servicio_basico;
    }

    public void setServicio_basico(Long servicio_basico) {
        this.servicio_basico = servicio_basico;
    }

    public Long getCopia_titulo() {
        return copia_titulo;
    }

    public void setCopia_titulo(Long copia_titulo) {
        this.copia_titulo = copia_titulo;
    }

}
