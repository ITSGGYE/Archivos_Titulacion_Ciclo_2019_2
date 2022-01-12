/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

/**
 *`id_detalle_compra``linea_detalle``id_cabecera``id_producto``cantidad`
 * `descripcion``precio_unitario``sub_total``iva``decuento``total``estado`
 * @author Usuario
 */
public class model_co_detalle_compra {
    
    private Long id_detalle_compra;
    private int linea_detalle;
    private Long id_cabecera;
    private Long id_producto;
    private int cantidad;
    private int item;
    private String descripcion;  
    private Double precio_unitario;
    private Double sub_total;
    private Double iva;
    private Double decuento;
    private Double total;
    private String estado;

    public model_co_detalle_compra() {
    }

    public model_co_detalle_compra(Long id_detalle_compra, int linea_detalle, Long id_cabecera, Long id_producto, int cantidad, int item, String descripcion, Double precio_unitario, Double sub_total, Double iva, Double decuento, Double total, String estado) {
        this.id_detalle_compra = id_detalle_compra;
        this.linea_detalle = linea_detalle;
        this.id_cabecera = id_cabecera;
        this.id_producto = id_producto;
        this.cantidad = cantidad;
        this.item = item;
        this.descripcion = descripcion;
        this.precio_unitario = precio_unitario;
        this.sub_total = sub_total;
        this.iva = iva;
        this.decuento = decuento;
        this.total = total;
        this.estado = estado;
    }

    public int getItem() {
        return item;
    }

    public void setItem(int item) {
        this.item = item;
    }

    public Long getId_detalle_compra() {
        return id_detalle_compra;
    }

    public void setId_detalle_compra(Long id_detalle_compra) {
        this.id_detalle_compra = id_detalle_compra;
    }

    public int getLinea_detalle() {
        return linea_detalle;
    }

    public void setLinea_detalle(int linea_detalle) {
        this.linea_detalle = linea_detalle;
    }

    public Long getId_cabecera() {
        return id_cabecera;
    }

    public void setId_cabecera(Long id_cabecera) {
        this.id_cabecera = id_cabecera;
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

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public Double getPrecio_unitario() {
        return precio_unitario;
    }

    public void setPrecio_unitario(Double precio_unitario) {
        this.precio_unitario = precio_unitario;
    }

    public Double getSub_total() {
        return sub_total;
    }

    public void setSub_total(Double sub_total) {
        this.sub_total = sub_total;
    }

    public Double getIva() {
        return iva;
    }

    public void setIva(Double iva) {
        this.iva = iva;
    }

    public Double getDecuento() {
        return decuento;
    }

    public void setDecuento(Double decuento) {
        this.decuento = decuento;
    }

    public Double getTotal() {
        return total;
    }

    public void setTotal(Double total) {
        this.total = total;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    
}
