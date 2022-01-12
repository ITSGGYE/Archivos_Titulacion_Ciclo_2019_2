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
public class model_bit_entrada {
    private Long id_entrada;
    private Long id_producto;
    private int cantidad;
    private Date fecha_ingreso;
    private String usuario_ingreso;
    private Long id_tipo_documento;
    private String tipoDocumento;

    public model_bit_entrada() {
    }

    public model_bit_entrada(Long id_entrada, Long id_producto, int cantidad, Date fecha_ingreso, String usuario_ingreso, Long id_tipo_documento, String tipoDocumento) {
        this.id_entrada = id_entrada;
        this.id_producto = id_producto;
        this.cantidad = cantidad;
        this.fecha_ingreso = fecha_ingreso;
        this.usuario_ingreso = usuario_ingreso;
        this.id_tipo_documento = id_tipo_documento;
        this.tipoDocumento = tipoDocumento;
    }

    public Long getId_tipo_documento() {
        return id_tipo_documento;
    }

    public void setId_tipo_documento(Long id_tipo_documento) {
        this.id_tipo_documento = id_tipo_documento;
    }

    public String getTipoDocumento() {
        return tipoDocumento;
    }

    public void setTipoDocumento(String tipoDocumento) {
        this.tipoDocumento = tipoDocumento;
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

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
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
