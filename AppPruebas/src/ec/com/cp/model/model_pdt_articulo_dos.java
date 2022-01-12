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
public class model_pdt_articulo_dos {
    
    private Long id_articulo;
    private Long id_marca;
    private String articulo;
    private String usuario_creacion;
    private String f_creacion;
    private String usuario_actulizacion;
    private String f_actualizacion;
    private String nombre_marca;
    private char estado;

    public model_pdt_articulo_dos() {
    }

    public model_pdt_articulo_dos(Long id_articulo, Long id_marca, String articulo, char estado, String usuario_creacion, String f_creacion, String usuario_actulizacion, String f_actualizacion, String nombre_marca) {
        this.id_articulo = id_articulo;
        this.id_marca = id_marca;
        this.articulo = articulo;
        this.estado = estado;
        this.usuario_creacion = usuario_creacion;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
        this.nombre_marca = nombre_marca;
    }

    public Long getId_articulo() {
        return id_articulo;
    }

    public void setId_articulo(Long id_articulo) {
        this.id_articulo = id_articulo;
    }

    public Long getId_marca() {
        return id_marca;
    }

    public void setId_marca(Long id_marca) {
        this.id_marca = id_marca;
    }

    public String getArticulo() {
        return articulo;
    }

    public void setArticulo(String articulo) {
        this.articulo = articulo;
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

    public String getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(String f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getUsuario_actulizacion() {
        return usuario_actulizacion;
    }

    public void setUsuario_actulizacion(String usuario_actulizacion) {
        this.usuario_actulizacion = usuario_actulizacion;
    }

    public String getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(String f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }

    public String getNombre_marca() {
        return nombre_marca;
    }

    public void setNombre_marca(String nombre_marca) {
        this.nombre_marca = nombre_marca;
    }
    
    

}
