/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

import java.util.Date;

/**
 *
 * @author nuevouser
 */
public class model_pdt_marca {
    /*`id_marca``nombre``u_creacion``f_creacion``u_actualizacion``f_actualizacion``descripcion`*/
    private Long id_marca;
    private String nombre;
    private char estado;
    private String u_creacion;
    private Date f_creacion;
    private String u_actualizacion;
    private Date f_actualizacion;
    private String descrpcion;
    private Long id_articulo;
    private String articulo;    
    public model_pdt_marca() {
    }

    public model_pdt_marca(Long id_marca, String nombre, char estado, String u_creacion, Date f_creacion, String u_actualizacion, Date f_actualizacion, String descrpcion, Long id_articulo, String articulo) {
        this.id_marca = id_marca;
        this.nombre = nombre;
        this.estado = estado;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.descrpcion = descrpcion;
        this.id_articulo = id_articulo;
        this.articulo = articulo;
    }

    public Long getId_marca() {
        return id_marca;
    }

    public void setId_marca(Long id_marca) {
        this.id_marca = id_marca;
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

    public String getDescrpcion() {
        return descrpcion;
    }

    public void setDescrpcion(String descrpcion) {
        this.descrpcion = descrpcion;
    }

    public Long getId_articulo() {
        return id_articulo;
    }

    public void setId_articulo(Long id_articulo) {
        this.id_articulo = id_articulo;
    }

    public String getArticulo() {
        return articulo;
    }

    public void setArticulo(String articulo) {
        this.articulo = articulo;
    }
    
}
