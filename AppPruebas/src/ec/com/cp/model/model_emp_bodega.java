/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

/**
 *
 * @author carlos
 */
public class model_emp_bodega {

    private String id_bodega;
    private String nombre;
    private String estado;
    private String observacion;
    private String u_creacion;
    private String f_creacion;
    private String u_actualizacion;
    private String f_actualizacion;

    public model_emp_bodega() {
    }

    public model_emp_bodega(String id_bodega, String nombre, String estado, String observacion, String u_creacion, String f_creacion, String u_actualizacion, String f_actualizacion) {
        this.id_bodega = id_bodega;
        this.nombre = nombre;
        this.estado = estado;
        this.observacion = observacion;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
    }

    public String getId_bodega() {
        return id_bodega;
    }

    public void setId_bodega(String id_bodega) {
        this.id_bodega = id_bodega;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
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

    public String getU_creacion() {
        return u_creacion;
    }

    public void setU_creacion(String u_creacion) {
        this.u_creacion = u_creacion;
    }

    public String getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(String f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getU_actualizacion() {
        return u_actualizacion;
    }

    public void setU_actualizacion(String u_actualizacion) {
        this.u_actualizacion = u_actualizacion;
    }

    public String getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(String f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }

}
