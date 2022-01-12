/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

/**
 *
 * @author carlos
 */
public class model_inv_inventario {

    private Long id_kardex;
    private Long entrada;
    private Long salida;
    private char estado_inv;
    private Long id_usuario;
    private Long id_producto;
    private String usuario_creacion;
    private String f_creacion;
    private String usuario_actulizacion;
    private String f_actualizacion;
    private Long cantidad;
    private double costo_actual;
    private double costo_promedio;
    private double costo_anterior;
    private String fecha;
    private double valor_total;

    public model_inv_inventario() {
    }

    public model_inv_inventario(Long id_kardex, Long entrada, Long salida, char estado_inv, Long id_usuario, Long id_producto, String usuario_creacion, String f_creacion, String usuario_actulizacion, String f_actualizacion, Long cantidad, double costo_actual, double costo_promedio, double costo_anterior, String fecha, double valor_total) {
        this.id_kardex = id_kardex;
        this.entrada = entrada;
        this.salida = salida;
        this.estado_inv = estado_inv;
        this.id_usuario = id_usuario;
        this.id_producto = id_producto;
        this.usuario_creacion = usuario_creacion;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
        this.cantidad = cantidad;
        this.costo_actual = costo_actual;
        this.costo_promedio = costo_promedio;
        this.costo_anterior = costo_anterior;
        this.fecha = fecha;
        this.valor_total = valor_total;
    }


    public Long getId_kardex() {
        return id_kardex;
    }

    public void setId_kardex(Long id_kardex) {
        this.id_kardex = id_kardex;
    }

    public Long getEntrada() {
        return entrada;
    }

    public void setEntrada(Long entrada) {
        this.entrada = entrada;
    }

    public Long getSalida() {
        return salida;
    }

    public void setSalida(Long salida) {
        this.salida = salida;
    }

    public char getEstado_inv() {
        return estado_inv;
    }

    public void setEstado_inv(char estado_inv) {
        this.estado_inv = estado_inv;
    }
    

    public Long getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(Long id_usuario) {
        this.id_usuario = id_usuario;
    }

    public Long getId_producto() {
        return id_producto;
    }

    public void setId_producto(Long id_producto) {
        this.id_producto = id_producto;
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

    public Long getCantidad() {
        return cantidad;
    }

    public void setCantidad(Long cantidad) {
        this.cantidad = cantidad;
    }

    public double getCosto_actual() {
        return costo_actual;
    }

    public void setCosto_actual(double costo_actual) {
        this.costo_actual = costo_actual;
    }

    public double getCosto_promedio() {
        return costo_promedio;
    }

    public void setCosto_promedio(double costo_promedio) {
        this.costo_promedio = costo_promedio;
    }

    public double getCosto_anterior() {
        return costo_anterior;
    }

    public void setCosto_anterior(double costo_anterior) {
        this.costo_anterior = costo_anterior;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public double getValor_total() {
        return valor_total;
    }

    public void setValor_total(double valor_total) {
        this.valor_total = valor_total;
    }
    
    
}
