/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.model.join;

import java.sql.Date;

/**
 *
 * @author carlos
 */
public class us_empleados_join {
    private Long id_usuario;
    private String apellidos_nombres;
    private String cedula;
    private String direccion;
    private String convecional;
    private String fecha_nacimiento;
    private String telefono_dos;
    private String correo;
    private String contrasena;
    private String estado;
    private Long copia_cedula;
    private Long servicio_basico;
    private Long copia_titulo;
    private Long id_rol;
    private String rol;
    private String observacion;
    private Date fecha_nacimiento_date;
    private String usuario;
    private Long id_usuarioDos;
    private Long id_empresa;
    private String nombre_comercial_em;
    private String ruc_em;
    private String telefono_em;
    private String direccion_em;
    private String correo_em;
    private String estado_em;
    private Long id_sucursal;
    private String nombre_comercial_su;
    private String telefono_su;
    private String direccion_su;
    private String correo_su;
    private String estado_su;
    private String codigo_usuario;
    private String provincia;
    private String canton;
    private String provincia_suc;
    private String canton_suc;
    private String jornada;
    private String zona;
    private String distrito;
    private String circuito;
    private String tipo_i;

    public us_empleados_join() {
    }

    public us_empleados_join(Long id_usuario, String apellidos_nombres, String cedula, String direccion, String convecional, String fecha_nacimiento, String telefono_dos, String correo, String contrasena, String estado, Long copia_cedula, Long servicio_basico, Long copia_titulo, Long id_rol, String rol, String observacion, Date fecha_nacimiento_date, String usuario, Long id_usuarioDos, Long id_empresa, String nombre_comercial_em, String ruc_em, String telefono_em, String direccion_em, String correo_em, String estado_em, Long id_sucursal, String nombre_comercial_su, String telefono_su, String direccion_su, String correo_su, String estado_su, String codigo_usuario, String provincia, String canton, String provincia_suc, String canton_suc, String jornada, String zona, String distrito, String circuito, String tipo_i) {
        this.id_usuario = id_usuario;
        this.apellidos_nombres = apellidos_nombres;
        this.cedula = cedula;
        this.direccion = direccion;
        this.convecional = convecional;
        this.fecha_nacimiento = fecha_nacimiento;
        this.telefono_dos = telefono_dos;
        this.correo = correo;
        this.contrasena = contrasena;
        this.estado = estado;
        this.copia_cedula = copia_cedula;
        this.servicio_basico = servicio_basico;
        this.copia_titulo = copia_titulo;
        this.id_rol = id_rol;
        this.rol = rol;
        this.observacion = observacion;
        this.fecha_nacimiento_date = fecha_nacimiento_date;
        this.usuario = usuario;
        this.id_usuarioDos = id_usuarioDos;
        this.id_empresa = id_empresa;
        this.nombre_comercial_em = nombre_comercial_em;
        this.ruc_em = ruc_em;
        this.telefono_em = telefono_em;
        this.direccion_em = direccion_em;
        this.correo_em = correo_em;
        this.estado_em = estado_em;
        this.id_sucursal = id_sucursal;
        this.nombre_comercial_su = nombre_comercial_su;
        this.telefono_su = telefono_su;
        this.direccion_su = direccion_su;
        this.correo_su = correo_su;
        this.estado_su = estado_su;
        this.codigo_usuario = codigo_usuario;
        this.provincia = provincia;
        this.canton = canton;
        this.provincia_suc = provincia_suc;
        this.canton_suc = canton_suc;
        this.jornada = jornada;
        this.zona = zona;
        this.distrito = distrito;
        this.circuito = circuito;
        this.tipo_i = tipo_i;
    }

    public String getTipo_i() {
        return tipo_i;
    }

    public void setTipo_i(String tipo_i) {
        this.tipo_i = tipo_i;
    }

    

    public String getZona() {
        return zona;
    }

    public void setZona(String zona) {
        this.zona = zona;
    }

    public String getDistrito() {
        return distrito;
    }

    public void setDistrito(String distrito) {
        this.distrito = distrito;
    }

    public String getCircuito() {
        return circuito;
    }

    public void setCircuito(String circuito) {
        this.circuito = circuito;
    }

    public String getJornada() {
        return jornada;
    }

    public void setJornada(String jornada) {
        this.jornada = jornada;
    }

    public String getProvincia() {
        return provincia;
    }

    public void setProvincia(String provincia) {
        this.provincia = provincia;
    }

    public String getCanton() {
        return canton;
    }

    public void setCanton(String canton) {
        this.canton = canton;
    }

    public String getProvincia_suc() {
        return provincia_suc;
    }

    public void setProvincia_suc(String provincia_suc) {
        this.provincia_suc = provincia_suc;
    }

    public String getCanton_suc() {
        return canton_suc;
    }

    public void setCanton_suc(String canton_suc) {
        this.canton_suc = canton_suc;
    }

    public String getCodigo_usuario() {
        return codigo_usuario;
    }

    public void setCodigo_usuario(String codigo_usuario) {
        this.codigo_usuario = codigo_usuario;
    }

    public Long getId_empresa() {
        return id_empresa;
    }

    public void setId_empresa(Long id_empresa) {
        this.id_empresa = id_empresa;
    }

    public String getNombre_comercial_em() {
        return nombre_comercial_em;
    }

    public void setNombre_comercial_em(String nombre_comercial_em) {
        this.nombre_comercial_em = nombre_comercial_em;
    }

    public String getRuc_em() {
        return ruc_em;
    }

    public void setRuc_em(String ruc_em) {
        this.ruc_em = ruc_em;
    }

    public String getTelefono_em() {
        return telefono_em;
    }

    public void setTelefono_em(String telefono_em) {
        this.telefono_em = telefono_em;
    }

    public String getDireccion_em() {
        return direccion_em;
    }

    public void setDireccion_em(String direccion_em) {
        this.direccion_em = direccion_em;
    }

    public String getCorreo_em() {
        return correo_em;
    }

    public void setCorreo_em(String correo_em) {
        this.correo_em = correo_em;
    }

    public String getEstado_em() {
        return estado_em;
    }

    public void setEstado_em(String estado_em) {
        this.estado_em = estado_em;
    }

    public Long getId_sucursal() {
        return id_sucursal;
    }

    public void setId_sucursal(Long id_sucursal) {
        this.id_sucursal = id_sucursal;
    }

    public String getNombre_comercial_su() {
        return nombre_comercial_su;
    }

    public void setNombre_comercial_su(String nombre_comercial_su) {
        this.nombre_comercial_su = nombre_comercial_su;
    }

    public String getTelefono_su() {
        return telefono_su;
    }

    public void setTelefono_su(String telefono_su) {
        this.telefono_su = telefono_su;
    }

    public String getDireccion_su() {
        return direccion_su;
    }

    public void setDireccion_su(String direccion_su) {
        this.direccion_su = direccion_su;
    }

    public String getCorreo_su() {
        return correo_su;
    }

    public void setCorreo_su(String correo_su) {
        this.correo_su = correo_su;
    }

    public String getEstado_su() {
        return estado_su;
    }

    public void setEstado_su(String estado_su) {
        this.estado_su = estado_su;
    }

    public Long getId_usuarioDos() {
        return id_usuarioDos;
    }

    public void setId_usuarioDos(Long id_usuarioDos) {
        this.id_usuarioDos = id_usuarioDos;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public Date getFecha_nacimiento_date() {
        return fecha_nacimiento_date;
    }

    public void setFecha_nacimiento_date(Date fecha_nacimiento_date) {
        this.fecha_nacimiento_date = fecha_nacimiento_date;
    }

    public Long getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(Long id_usuario) {
        this.id_usuario = id_usuario;
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

    public String getContrasena() {
        return contrasena;
    }

    public void setContrasena(String contrasena) {
        this.contrasena = contrasena;
    }

    public Long getCopia_cedula() {
        return copia_cedula;
    }

    public void setCopia_cedula(Long copia_cedula) {
        this.copia_cedula = copia_cedula;
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

    public String getFecha_nacimiento() {
        return fecha_nacimiento;
    }

    public void setFecha_nacimiento(String fecha_nacimiento) {
        this.fecha_nacimiento = fecha_nacimiento;
    }
    
}
