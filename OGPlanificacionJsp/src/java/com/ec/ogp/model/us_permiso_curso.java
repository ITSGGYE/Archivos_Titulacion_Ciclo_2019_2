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
public class us_permiso_curso {
    private Long id_permiso_curso;
    private Long id_usuario;
    private Long id_curso;
    private String curso;
    private String permiso;
    private Long id_empresa_per;
    private Long id_sucursal_per;

    public us_permiso_curso() {
    }

    public us_permiso_curso(Long id_permiso_curso, Long id_usuario, Long id_curso, String curso, String permiso, Long id_empresa_per, Long id_sucursal_per) {
        this.id_permiso_curso = id_permiso_curso;
        this.id_usuario = id_usuario;
        this.id_curso = id_curso;
        this.curso = curso;
        this.permiso = permiso;
        this.id_empresa_per = id_empresa_per;
        this.id_sucursal_per = id_sucursal_per;
    }

    public Long getId_permiso_curso() {
        return id_permiso_curso;
    }

    public void setId_permiso_curso(Long id_permiso_curso) {
        this.id_permiso_curso = id_permiso_curso;
    }

    public Long getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(Long id_usuario) {
        this.id_usuario = id_usuario;
    }

    public Long getId_curso() {
        return id_curso;
    }

    public void setId_curso(Long id_curso) {
        this.id_curso = id_curso;
    }

    public String getCurso() {
        return curso;
    }

    public void setCurso(String curso) {
        this.curso = curso;
    }

    public String getPermiso() {
        return permiso;
    }

    public void setPermiso(String permiso) {
        this.permiso = permiso;
    }

    public Long getId_empresa_per() {
        return id_empresa_per;
    }

    public void setId_empresa_per(Long id_empresa_per) {
        this.id_empresa_per = id_empresa_per;
    }

    public Long getId_sucursal_per() {
        return id_sucursal_per;
    }

    public void setId_sucursal_per(Long id_sucursal_per) {
        this.id_sucursal_per = id_sucursal_per;
    }
    
}
