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
public class model_pdt_articulo {
    /*`id_articulo``articulo``descripcion``estado`
    `observacion``usuario_creacion``f_creacion``usuario_actulizacion`
    `f_actualizacion``codigo_barra``id_subcategoria`*/
    
    private Long id_articulo;
    private String nombre_articulo;
    private String descripcion;
    private char estado;
    private String observacion;
    private String u_creacion;
    private Date f_creacion;
    private String u_actualizacion;
    private Date f_actualizacion;
    private Long id_subcategoria;
    private String subcategoria;
    private Long id_categoria;
    private String categoria;

    public model_pdt_articulo() {
    }

    public model_pdt_articulo(Long id_articulo, String nombre_articulo, String descripcion, char estado, String observacion, String u_creacion, Date f_creacion, String u_actualizacion, Date f_actualizacion, Long id_subcategoria, String subcategoria, Long id_categoria, String categoria) {
        this.id_articulo = id_articulo;
        this.nombre_articulo = nombre_articulo;
        this.descripcion = descripcion;
        this.estado = estado;
        this.observacion = observacion;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.id_subcategoria = id_subcategoria;
        this.subcategoria = subcategoria;
        this.id_categoria = id_categoria;
        this.categoria = categoria;
    }

    public Long getId_articulo() {
        return id_articulo;
    }

    public void setId_articulo(Long id_articulo) {
        this.id_articulo = id_articulo;
    }

    public String getNombre_articulo() {
        return nombre_articulo;
    }

    public void setNombre_articulo(String nombre_articulo) {
        this.nombre_articulo = nombre_articulo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }

    public String getObservacion() {
        return observacion;
    }

    public void setObservacion(String observacion) {
        this.observacion = observacion;
    }

    public String getU_creacion() {
        return u_creacion;
    }

    public void setU_creacion(String u_creacion) {
        this.u_creacion = u_creacion;
    }

    public Date getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(Date f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getU_actualizacion() {
        return u_actualizacion;
    }

    public void setU_actualizacion(String u_actualizacion) {
        this.u_actualizacion = u_actualizacion;
    }

    public Date getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(Date f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }

    public Long getId_subcategoria() {
        return id_subcategoria;
    }

    public void setId_subcategoria(Long id_subcategoria) {
        this.id_subcategoria = id_subcategoria;
    }

    public String getSubcategoria() {
        return subcategoria;
    }

    public void setSubcategoria(String subcategoria) {
        this.subcategoria = subcategoria;
    }

    public Long getId_categoria() {
        return id_categoria;
    }

    public void setId_categoria(Long id_categoria) {
        this.id_categoria = id_categoria;
    }

    public String getCategoria() {
        return categoria;
    }

    public void setCategoria(String categoria) {
        this.categoria = categoria;
    }



}
