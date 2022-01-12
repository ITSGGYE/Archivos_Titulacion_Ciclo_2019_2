/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

/**`id_detalle_venta``linea_detalle``id_cabecera``id_producto``cantidad`
`descripcion``precio_unitario``sub_total``iva``decuento``total``estado`
 *
 * @author Usuario
 */
public class model_ven_detalle_venta {
    private Long id_detalle_venta;
    private int linea_detalle;
    private Long id_cabecera;
    private Long id_producto;
    private int cantidad;
    private String descripcion;  
    private Double precio_unitario;
    private Double sub_total;
    private Double iva;
    private Double decuento;
    private Double total;
    private char estado;

    public model_ven_detalle_venta() {
    }

    public model_ven_detalle_venta(Long id_detalle_venta, int linea_detalle, Long id_cabecera, Long id_producto, int cantidad, String descripcion, Double precio_unitario, Double sub_total, Double iva, Double decuento, Double total, char estado) {
        this.id_detalle_venta = id_detalle_venta;
        this.linea_detalle = linea_detalle;
        this.id_cabecera = id_cabecera;
        this.id_producto = id_producto;
        this.cantidad = cantidad;
        this.descripcion = descripcion;
        this.precio_unitario = precio_unitario;
        this.sub_total = sub_total;
        this.iva = iva;
        this.decuento = decuento;
        this.total = total;
        this.estado = estado;
    }

    public Long getId_detalle_venta() {
        return id_detalle_venta;
    }

    public void setId_detalle_venta(Long id_detalle_venta) {
        this.id_detalle_venta = id_detalle_venta;
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

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }
    
    
    
}
