/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

import java.sql.Date;

/**
 *
 * @author Usuario
 */
public class model_bit_salida {
    private Long id_entrada;
    private Long id_producto;
    private Long cantidad;
    private Date fecha_ingreso;
    private String usuario_ingreso;

    public model_bit_salida() {
    }

    public model_bit_salida(Long id_entrada, Long id_producto, Long cantidad, Date fecha_ingreso, String usuario_ingreso) {
        this.id_entrada = id_entrada;
        this.id_producto = id_producto;
        this.cantidad = cantidad;
        this.fecha_ingreso = fecha_ingreso;
        this.usuario_ingreso = usuario_ingreso;
    }

    public Long getId_entrada() {
        return id_entrada;
    }

    public void setId_entrada(Long id_entrada) {
        this.id_entrada = id_entrada;
    }

    public Long getId_producto() {
        return id_producto;
    }

    public void setId_producto(Long id_producto) {
        this.id_producto = id_producto;
    }

    public Long getCantidad() {
        return cantidad;
    }

    public void setCantidad(Long cantidad) {
        this.cantidad = cantidad;
    }

    public Date getFecha_ingreso() {
        return fecha_ingreso;
    }

    public void setFecha_ingreso(Date fecha_ingreso) {
        this.fecha_ingreso = fecha_ingreso;
    }

    public String getUsuario_ingreso() {
        return usuario_ingreso;
    }

    public void setUsuario_ingreso(String usuario_ingreso) {
        this.usuario_ingreso = usuario_ingreso;
    }
    
}
