/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

/**
 *
 * @author Usuario
 */
public class model_inv_detalle_tarifario {
    
    private Long id_detalle_tarifario;
    private Long id_tarifario;
    private Long id_producto;
    private String nombre_producto;
    private double precio;
    private double valor_descuento;
    private double valor_venta;
    private double valor_costo;
    private double porcentaje_venta;
    private double porcentaje_descuento;
    private String aplica_iva;
    private String fecha;
    private String u_creacion;
    private String f_creacion;
    private String u_actualizacion;
    private String f_actualizacion;
    private char estado;

    public model_inv_detalle_tarifario() {
    }

    public model_inv_detalle_tarifario(Long id_detalle_tarifario, Long id_tarifario, Long id_producto, String nombre_producto, double precio, double valor_descuento, double valor_venta, double valor_costo, double porcentaje_venta, double porcentaje_descuento, String aplica_iva, String fecha, String u_creacion, String f_creacion, String u_actualizacion, String f_actualizacion, char estado) {
        this.id_detalle_tarifario = id_detalle_tarifario;
        this.id_tarifario = id_tarifario;
        this.id_producto = id_producto;
        this.nombre_producto = nombre_producto;
        this.precio = precio;
        this.valor_descuento = valor_descuento;
        this.valor_venta = valor_venta;
        this.valor_costo = valor_costo;
        this.porcentaje_venta = porcentaje_venta;
        this.porcentaje_descuento = porcentaje_descuento;
        this.aplica_iva = aplica_iva;
        this.fecha = fecha;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.estado = estado;
    }

    public double getPorcentaje_venta() {
        return porcentaje_venta;
    }

    public void setPorcentaje_venta(double porcentaje_venta) {
        this.porcentaje_venta = porcentaje_venta;
    }

    public double getPorcentaje_descuento() {
        return porcentaje_descuento;
    }

    public void setPorcentaje_descuento(double porcentaje_descuento) {
        this.porcentaje_descuento = porcentaje_descuento;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public String getU_creacion() {
        return u_creacion;
    }

    public void setU_creacion(String u_creacion) {
        this.u_creacion = u_creacion;
    }

    public String getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(String f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getU_actualizacion() {
        return u_actualizacion;
    }

    public void setU_actualizacion(String u_actualizacion) {
        this.u_actualizacion = u_actualizacion;
    }

    public String getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(String f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }

    public Long getId_detalle_tarifario() {
        return id_detalle_tarifario;
    }

    public void setId_detalle_tarifario(Long id_detalle_tarifario) {
        this.id_detalle_tarifario = id_detalle_tarifario;
    }

    public Long getId_tarifario() {
        return id_tarifario;
    }

    public void setId_tarifario(Long id_tarifario) {
        this.id_tarifario = id_tarifario;
    }

    public Long getId_producto() {
        return id_producto;
    }

    public void setId_producto(Long id_producto) {
        this.id_producto = id_producto;
    }

    public String getNombre_producto() {
        return nombre_producto;
    }

    public void setNombre_producto(String nombre_producto) {
        this.nombre_producto = nombre_producto;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    public double getValor_descuento() {
        return valor_descuento;
    }

    public void setValor_descuento(double valor_descuento) {
        this.valor_descuento = valor_descuento;
    }

    public double getValor_venta() {
        return valor_venta;
    }

    public void setValor_venta(double valor_venta) {
        this.valor_venta = valor_venta;
    }

    public double getValor_costo() {
        return valor_costo;
    }

    public void setValor_costo(double valor_costo) {
        this.valor_costo = valor_costo;
    }

    public String getAplica_iva() {
        return aplica_iva;
    }

    public void setAplica_iva(String aplica_iva) {
        this.aplica_iva = aplica_iva;
    }

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }
    
}