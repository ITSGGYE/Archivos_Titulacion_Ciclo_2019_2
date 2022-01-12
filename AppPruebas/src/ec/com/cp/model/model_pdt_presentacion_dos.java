/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

import java.util.Date;

/**
 *`id_presentacion``id_medida``id_envase``estado`
 * `u_creacion``f_creacion``u_actualizacion``f_actualizacion``id_marca`
 * @author Usuario
 */
public class model_pdt_presentacion_dos {
    
    private Long id_presentacion;
    private Long id_medida;
    private Long id_envase;
    private char estado;
    private String usuario_creacion;
    private Date f_creacion;
    private String usuario_actulizacion;
    private Date f_actualizacion;
    private Long id_articulo;

    public model_pdt_presentacion_dos() {
    }

    public model_pdt_presentacion_dos(Long id_presentacion, Long id_medida, Long id_envase, char estado, String usuario_creacion, Date f_creacion, String usuario_actulizacion, Date f_actualizacion, Long id_articulo) {
        this.id_presentacion = id_presentacion;
        this.id_medida = id_medida;
        this.id_envase = id_envase;
        this.estado = estado;
        this.usuario_creacion = usuario_creacion;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
        this.id_articulo = id_articulo;
    }

    public Long getId_articulo() {
        return id_articulo;
    }

    public void setId_articulo(Long id_articulo) {
        this.id_articulo = id_articulo;
    }

    

    public Long getId_presentacion() {
        return id_presentacion;
    }

    public void setId_presentacion(Long id_presentacion) {
        this.id_presentacion = id_presentacion;
    }

    public Long getId_medida() {
        return id_medida;
    }

    public void setId_medida(Long id_medida) {
        this.id_medida = id_medida;
    }

    public Long getId_envase() {
        return id_envase;
    }

    public void setId_envase(Long id_envase) {
        this.id_envase = id_envase;
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
