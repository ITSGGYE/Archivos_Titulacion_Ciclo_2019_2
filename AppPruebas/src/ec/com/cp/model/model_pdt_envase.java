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
public class model_pdt_envase {

    private Long id_envase;
    private String nombre_envase;
    private String estado;
    private String u_creacion;
    private String f_creacion;
    private String u_actualizacion;
    private String f_actualizacion;

    public model_pdt_envase() {
    }

    public model_pdt_envase(Long id_envase, String nombre_envase, String estado, String u_creacion, String f_creacion, String u_actualizacion, String f_actualizacion) {
        this.id_envase = id_envase;
        this.nombre_envase = nombre_envase;
        this.estado = estado;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
    }

    public Long getId_envase() {
        return id_envase;
    }

    public void setId_envase(Long id_envase) {
        this.id_envase = id_envase;
    }

    public String getNombre_envase() {
        return nombre_envase;
    }

    public void setNombre_envase(String nombre_envase) {
        this.nombre_envase = nombre_envase;
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
