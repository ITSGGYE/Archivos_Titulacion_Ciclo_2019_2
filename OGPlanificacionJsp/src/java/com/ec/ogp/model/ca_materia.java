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
public class ca_materia {
    private Long id_materia;
    private String materia;
    private String estado_ma;
    private Long id_creacion;
    private Long id_actualizacion;

    public ca_materia() {
    }

    public ca_materia(Long id_materia, String materia, String estado_ma, Long id_creacion, Long id_actualizacion) {
        this.id_materia = id_materia;
        this.materia = materia;
        this.estado_ma = estado_ma;
        this.id_creacion = id_creacion;
        this.id_actualizacion = id_actualizacion;
    }

    public Long getId_creacion() {
        return id_creacion;
    }

    public void setId_creacion(Long id_creacion) {
        this.id_creacion = id_creacion;
    }

    public Long getId_actualizacion() {
        return id_actualizacion;
    }

    public void setId_actualizacion(Long id_actualizacion) {
        this.id_actualizacion = id_actualizacion;
    }


    public String getEstado_ma() {
        return estado_ma;
    }

    public void setEstado_ma(String estado_ma) {
        this.estado_ma = estado_ma;
    }


    public Long getId_materia() {
        return id_materia;
    }

    public void setId_materia(Long id_materia) {
        this.id_materia = id_materia;
    }

    public String getMateria() {
        return materia;
    }

    public void setMateria(String materia) {
        this.materia = materia;
    }
    
}
