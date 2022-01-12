/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model.join;

import java.util.Date;

/**
 *
 * @author Usuario
 */
public class model_pdt_subcategoria_join_subcategoria {
    

    private Long id_subcategoria;
    private String nombre;
    private char estado;
    private String usuario_creacion;
    private Date f_creacion;
    private String usuario_actulizacion;
    private Date f_actualizacion;
    private Long id_categoria;
    private String nombre_categoria;

    public model_pdt_subcategoria_join_subcategoria() {
    }

    public model_pdt_subcategoria_join_subcategoria(Long id_subcategoria, String nombre, char estado, String usuario_creacion, Date f_creacion, String usuario_actulizacion, Date f_actualizacion, Long id_categoria, String nombre_categoria) {
        this.id_subcategoria = id_subcategoria;
        this.nombre = nombre;
        this.estado = estado;
        this.usuario_creacion = usuario_creacion;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
        this.id_categoria = id_categoria;
        this.nombre_categoria = nombre_categoria;
    }

    public Long getId_subcategoria() {
        return id_subcategoria;
    }

    public void setId_subcategoria(Long id_subcategoria) {
        this.id_subcategoria = id_subcategoria;
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

    public Long getId_categoria() {
        return id_categoria;
    }

    public void setId_categoria(Long id_categoria) {
        this.id_categoria = id_categoria;
    }

    public String getNombre_categoria() {
        return nombre_categoria;
    }

    public void setNombre_categoria(String nombre_categoria) {
        this.nombre_categoria = nombre_categoria;
    }

}
