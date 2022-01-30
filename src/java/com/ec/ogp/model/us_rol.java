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
public class us_rol {
    private Long id_rol;
    private String rol;

    public us_rol() {
    }

    public us_rol(Long id_rol, String rol) {
        this.id_rol = id_rol;
        this.rol = rol;
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
    
}
