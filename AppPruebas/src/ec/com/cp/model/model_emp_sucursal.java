/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

import java.util.Date;

/**
 *
 * @author carlos
 */
public class model_emp_sucursal {

    private Long id_sucursal;
    private String ruc;
    private String nombre_comercial;
    private String telefono;
    private String direccion;
    private String correo;
    private String estado;
    private String u_creacion;
    private Date f_creacion;
    private String u_actualizacion;
    private Date f_actualizacion;
    private Long id_empresa;
    private Long id_bodega;
    private String observacion;

    public model_emp_sucursal() {
    }

    public model_emp_sucursal(Long id_sucursal, String ruc, String nombre_comercial, String telefono, String direccion, String correo, String estado, String u_creacion, Date f_creacion, String u_actualizacion, Date f_actualizacion, Long id_empresa, Long id_bodega, String observacion) {
        this.id_sucursal = id_sucursal;
        this.ruc = ruc;
        this.nombre_comercial = nombre_comercial;
        this.telefono = telefono;
        this.direccion = direccion;
        this.correo = correo;
        this.estado = estado;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.id_empresa = id_empresa;
        this.id_bodega = id_bodega;
        this.observacion = observacion;
    }

    public String getObservacion() {
        return observacion;
    }

    public void setObservacion(String observacion) {
        this.observacion = observacion;
    }

    public Long getId_sucursal() {
        return id_sucursal;
    }

    public void setId_sucursal(Long id_sucursal) {
        this.id_sucursal = id_sucursal;
    }

    public String getRuc() {
        return ruc;
    }

    public void setRuc(String ruc) {
        this.ruc = ruc;
    }

    public String getNombre_comercial() {
        return nombre_comercial;
    }

    public void setNombre_comercial(String nombre_comercial) {
        this.nombre_comercial = nombre_comercial;
    }

    public String getTelefono() {
        return telefono;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public String getU_creacion() {
        return u_creacion;
    }

    public void setU_creacion(String u_creacion) {
        this.u_creacion = u_creacion;
    }

    public Date getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(Date f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getU_actualizacion() {
        return u_actualizacion;
    }

    public void setU_actualizacion(String u_actualizacion) {
        this.u_actualizacion = u_actualizacion;
    }

    public Date getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(Date f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }

    public Long getId_empresa() {
        return id_empresa;
    }

    public void setId_empresa(Long id_empresa) {
        this.id_empresa = id_empresa;
    }

    public Long getId_bodega() {
        return id_bodega;
    }

    public void setId_bodega(Long id_bodega) {
        this.id_bodega = id_bodega;
    }

}
