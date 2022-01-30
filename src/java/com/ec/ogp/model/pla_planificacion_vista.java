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
public class pla_planificacion_vista {

    private Long id_pla_vista;
    private String fecha;
    private String estado;
    private Long id_objetivo;
    private String u_creacion;
    private String f_creacion;
    private String u_actualizacion;
    private String f_actualizacion;
    private String n_formulario_vista;
    private String objetivos;
    private String observacion;

    public pla_planificacion_vista() {
    }

    public pla_planificacion_vista(Long id_pla_vista, String fecha, String estado, Long id_objetivo, String u_creacion, String f_creacion, String u_actualizacion, String f_actualizacion, String n_formulario_vista, String objetivos, String observacion) {
        this.id_pla_vista = id_pla_vista;
        this.fecha = fecha;
        this.estado = estado;
        this.id_objetivo = id_objetivo;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.n_formulario_vista = n_formulario_vista;
        this.objetivos = objetivos;
        this.observacion = observacion;
    }

    public String getObservacion() {
        return observacion;
    }

    public void setObservacion(String observacion) {
        this.observacion = observacion;
    }

    public String getObjetivos() {
        return objetivos;
    }

    public void setObjetivos(String objetivos) {
        this.objetivos = objetivos;
    }

    public Long getId_pla_vista() {
        return id_pla_vista;
    }

    public void setId_pla_vista(Long id_pla_vista) {
        this.id_pla_vista = id_pla_vista;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public Long getId_objetivo() {
        return id_objetivo;
    }

    public void setId_objetivo(Long id_objetivo) {
        this.id_objetivo = id_objetivo;
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

    public String getN_formulario_vista() {
        return n_formulario_vista;
    }

    public void setN_formulario_vista(String n_formulario_vista) {
        this.n_formulario_vista = n_formulario_vista;
    }

   
}
