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
public class ma_periodo {
    private Long id_periodo;
    private String periodo;
    private Long id_creacion;
    private String f_creacion;
    private Long id_actualizacion;
    private String f_actualizacion;
    private String estado_pe;
    private Long id_empresa_pe;
    private Long id_sucursal_pe;
    private String inicio;
    private String fin;

    public ma_periodo() {
    }

    public ma_periodo(Long id_periodo, String periodo, Long id_creacion, String f_creacion, Long id_actualizacion, String f_actualizacion, String estado_pe, Long id_empresa_pe, Long id_sucursal_pe, String inicio, String fin) {
        this.id_periodo = id_periodo;
        this.periodo = periodo;
        this.id_creacion = id_creacion;
        this.f_creacion = f_creacion;
        this.id_actualizacion = id_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.estado_pe = estado_pe;
        this.id_empresa_pe = id_empresa_pe;
        this.id_sucursal_pe = id_sucursal_pe;
        this.inicio = inicio;
        this.fin = fin;
    }

    public String getInicio() {
        return inicio;
    }

    public void setInicio(String inicio) {
        this.inicio = inicio;
    }

    public String getFin() {
        return fin;
    }

    public void setFin(String fin) {
        this.fin = fin;
    }


    public Long getId_empresa_pe() {
        return id_empresa_pe;
    }

    public void setId_empresa_pe(Long id_empresa_pe) {
        this.id_empresa_pe = id_empresa_pe;
    }

    public Long getId_sucursal_pe() {
        return id_sucursal_pe;
    }

    public void setId_sucursal_pe(Long id_sucursal_pe) {
        this.id_sucursal_pe = id_sucursal_pe;
    }

    public Long getId_periodo() {
        return id_periodo;
    }

    public void setId_periodo(Long id_periodo) {
        this.id_periodo = id_periodo;
    }

    public String getPeriodo() {
        return periodo;
    }

    public void setPeriodo(String periodo) {
        this.periodo = periodo;
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

    public String getEstado_pe() {
        return estado_pe;
    }

    public void setEstado_pe(String estado_pe) {
        this.estado_pe = estado_pe;
    }
    
}
