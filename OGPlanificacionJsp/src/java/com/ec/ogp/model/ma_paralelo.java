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
public class ma_paralelo {
    private Long id_paralelo;
    private String paralelo;
    private String estado_pa;
    private String paralelo_obs;
    private Long id_creacion;
    private Long id_actualizacion;
    private Long nivel;
    private Long id_empresa_pa;
    private Long id_sucursal_pa;
    private String inicio; 
    private String fin;
    private String capacidad;
    private Long n_capacidad;

    public ma_paralelo() {
    }

    public ma_paralelo(Long id_paralelo, String paralelo, String estado_pa, String paralelo_obs, Long id_creacion, Long id_actualizacion, Long nivel, Long id_empresa_pa, Long id_sucursal_pa, String inicio, String fin, String capacidad, Long n_capacidad) {
        this.id_paralelo = id_paralelo;
        this.paralelo = paralelo;
        this.estado_pa = estado_pa;
        this.paralelo_obs = paralelo_obs;
        this.id_creacion = id_creacion;
        this.id_actualizacion = id_actualizacion;
        this.nivel = nivel;
        this.id_empresa_pa = id_empresa_pa;
        this.id_sucursal_pa = id_sucursal_pa;
        this.inicio = inicio;
        this.fin = fin;
        this.capacidad = capacidad;
        this.n_capacidad = n_capacidad;
    }

    public String getCapacidad() {
        return capacidad;
    }

    public void setCapacidad(String capacidad) {
        this.capacidad = capacidad;
    }

    public Long getN_capacidad() {
        return n_capacidad;
    }

    public void setN_capacidad(Long n_capacidad) {
        this.n_capacidad = n_capacidad;
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

    public Long getId_empresa_pa() {
        return id_empresa_pa;
    }

    public void setId_empresa_pa(Long id_empresa_pa) {
        this.id_empresa_pa = id_empresa_pa;
    }

    public Long getId_sucursal_pa() {
        return id_sucursal_pa;
    }

    public void setId_sucursal_pa(Long id_sucursal_pa) {
        this.id_sucursal_pa = id_sucursal_pa;
    }

    public Long getNivel() {
        return nivel;
    }

    public void setNivel(Long nivel) {
        this.nivel = nivel;
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

    public Long getId_paralelo() {
        return id_paralelo;
    }

    public void setId_paralelo(Long id_paralelo) {
        this.id_paralelo = id_paralelo;
    }

    public String getParalelo() {
        return paralelo;
    }

    public void setParalelo(String paralelo) {
        this.paralelo = paralelo;
    }

    public String getEstado_pa() {
        return estado_pa;
    }

    public void setEstado_pa(String stado_pa) {
        this.estado_pa = stado_pa;
    }


    public String getParalelo_obs() {
        return paralelo_obs;
    }

    public void setParalelo_obs(String paralelo_obs) {
        this.paralelo_obs = paralelo_obs;
    }
    
}
