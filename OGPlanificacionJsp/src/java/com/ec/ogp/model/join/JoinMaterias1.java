/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.model.join;

/**
 *
 * @author carlos
 */
public class JoinMaterias1 {
    private Long id_permiso;
    private Long id_usuario;
    private Long id_materia;
    private String materia;
    private String estado_ma;

    public JoinMaterias1() {
    }

    public JoinMaterias1(Long id_permiso, Long id_usuario, Long id_materia, String materia, String estado_ma) {
        this.id_permiso = id_permiso;
        this.id_usuario = id_usuario;
        this.id_materia = id_materia;
        this.materia = materia;
        this.estado_ma = estado_ma;
    }

    public Long getId_permiso() {
        return id_permiso;
    }

    public void setId_permiso(Long id_permiso) {
        this.id_permiso = id_permiso;
    }

    public Long getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(Long id_usuario) {
        this.id_usuario = id_usuario;
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

    public String getEstado_ma() {
        return estado_ma;
    }

    public void setEstado_ma(String estado_ma) {
        this.estado_ma = estado_ma;
    }
    
}
