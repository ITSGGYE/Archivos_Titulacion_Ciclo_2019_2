/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

import java.util.Date;

/**
 *`id_cabecera``id_proveedor``num_ord_pedido``id_sucursal``estado``forma_pago`
 * `f_verificado``f_recibido``ruc`
`total_subtotal``total_iva``total_descuento``total_facturado``usuario_creacion`
* `f_creacion``usuario_actulizacion``f_actualizacion`
 * @author Usuario
 */
public class model_co_cabecera_compra {
    private Long id_cabecera;
    private Long id_proveedor;
    private String num_ord_pedido;
    private Long id_sucursal;
    private String estado;
    private String forma_pago;
    private String f_recibido;
    private String recibido;
    private String f_verificado;
    private String verificado;
    private Double total_subtotal;   
    private Double total_iva;   
    private Double total_descuento;   
    private Double total_facturado; 
    private String usuario_creacion;
    private Date f_creacion;
    private String usuario_actulizacion;
    private Date f_actualizacion;  

    public model_co_cabecera_compra() {
    }

    public model_co_cabecera_compra(Long id_cabecera, Long id_proveedor, String num_ord_pedido, Long id_sucursal, String estado, String forma_pago, String f_recibido, String recibido, String f_verificado, String verificado, Double total_subtotal, Double total_iva, Double total_descuento, Double total_facturado, String usuario_creacion, Date f_creacion, String usuario_actulizacion, Date f_actualizacion) {
        this.id_cabecera = id_cabecera;
        this.id_proveedor = id_proveedor;
        this.num_ord_pedido = num_ord_pedido;
        this.id_sucursal = id_sucursal;
        this.estado = estado;
        this.forma_pago = forma_pago;
        this.f_recibido = f_recibido;
        this.recibido = recibido;
        this.f_verificado = f_verificado;
        this.verificado = verificado;
        this.total_subtotal = total_subtotal;
        this.total_iva = total_iva;
        this.total_descuento = total_descuento;
        this.total_facturado = total_facturado;
        this.usuario_creacion = usuario_creacion;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
    }


    public String getRecibido() {
        return recibido;
    }

    public void setRecibido(String recibido) {
        this.recibido = recibido;
    }

    public String getVerificado() {
        return verificado;
    }

    public void setVerificado(String verificado) {
        this.verificado = verificado;
    }

    public Long getId_cabecera() {
        return id_cabecera;
    }

    public void setId_cabecera(Long id_cabecera) {
        this.id_cabecera = id_cabecera;
    }

    public Long getId_proveedor() {
        return id_proveedor;
    }

    public void setId_proveedor(Long id_proveedor) {
        this.id_proveedor = id_proveedor;
    }

    public String getNum_ord_pedido() {
        return num_ord_pedido;
    }

    public void setNum_ord_pedido(String num_ord_pedido) {
        this.num_ord_pedido = num_ord_pedido;
    }

    public Long getId_sucursal() {
        return id_sucursal;
    }

    public void setId_sucursal(Long id_sucursal) {
        this.id_sucursal = id_sucursal;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }

    public String getForma_pago() {
        return forma_pago;
    }

    public void setForma_pago(String forma_pago) {
        this.forma_pago = forma_pago;
    }

    public String getF_recibido() {
        return f_recibido;
    }

    public void setF_recibido(String f_recibido) {
        this.f_recibido = f_recibido;
    }

    public String getF_verificado() {
        return f_verificado;
    }

    public void setF_verificado(String f_verificado) {
        this.f_verificado = f_verificado;
    }

    public Double getTotal_subtotal() {
        return total_subtotal;
    }

    public void setTotal_subtotal(Double total_subtotal) {
        this.total_subtotal = total_subtotal;
    }

    public Double getTotal_iva() {
        return total_iva;
    }

    public void setTotal_iva(Double total_iva) {
        this.total_iva = total_iva;
    }

    public Double getTotal_descuento() {
        return total_descuento;
    }

    public void setTotal_descuento(Double total_descuento) {
        this.total_descuento = total_descuento;
    }

    public Double getTotal_facturado() {
        return total_facturado;
    }

    public void setTotal_facturado(Double total_facturado) {
        this.total_facturado = total_facturado;
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
