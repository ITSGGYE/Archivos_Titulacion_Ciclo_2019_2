/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

import java.util.Date;

/**
 *
 * @author Usuario
 */
public class model_pdt_categoria {
    
    private Long id_categoria;
    private String nombre;
    private char estado;
    private String usuario_creacion;
    private Date f_creacion;
    private String usuario_actulizacion;
    private Date f_actualizacion;

    public model_pdt_categoria() {
    }

    public model_pdt_categoria(Long id_categoria, String nombre, char estado, String usuario_creacion, Date f_creacion, String usuario_actulizacion, Date f_actualizacion) {
        this.id_categoria = id_categoria;
        this.nombre = nombre;
        this.estado = estado;
        this.usuario_creacion = usuario_creacion;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
    }

    public Long getId_categoria() {
        return id_categoria;
    }

    public void setId_categoria(Long id_categoria) {
        this.id_categoria = id_categoria;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }

    public String getUsuario_creacion() {
        return usuario_creacion;
    }

    public void setUsuario_creacion(String usuario_creacion) {
        this.usuario_creacion = usuario_creacion;
    }

    public Date getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(Date f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getUsuario_actulizacion() {
        return usuario_actulizacion;
    }

    public void setUsuario_actulizacion(String usuario_actulizacion) {
        this.usuario_actulizacion = usuario_actulizacion;
    }

    public Date getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(Date f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }
    
}
