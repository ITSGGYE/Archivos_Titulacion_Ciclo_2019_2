/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model.join;

/**
 *
 * @author carlos
 */
public class model_co_orden_compra_join {
      private Long id_cabecera;
  private Long id_proveedor;
  private String num_ord_pedido;
  private Long id_sucursal;
  private String est_cabecera;
  private String forma_pago;
  private String f_verificado;
  private String f_recibido;
  private String ruc;
  private double total_subtotal;
  private double total_iva;
  private double total_descuento;
  private double total_facturado;
  private String usuario_creacion;
  private double iva_final;
  private String f_creacion;
  private String usuario_actulizacion;
  private String f_actualizacion;
  private String recibido;
  private String verificado;
  
//  private Long id_detalle_compra;
  private Long linea_detalle;
  private Long id_producto; 
  private Long cantidad;
  private String descripcion;
  private double precio_unitario; 
  private double sub_total;
  private double iva;
  private double decuento; 
  private double total;
  private String est_detalle; 
  private String item; 

    public model_co_orden_compra_join() {
    }

    public model_co_orden_compra_join(Long id_cabecera, Long id_proveedor, String num_ord_pedido, Long id_sucursal, String est_cabecera, String forma_pago, String f_verificado, String f_recibido, String ruc, double total_subtotal, double total_iva, double total_descuento, double total_facturado, String usuario_creacion, double iva_final, String f_creacion, String usuario_actulizacion, String f_actualizacion, String recibido, String verificado, Long linea_detalle, Long id_producto, Long cantidad, String descripcion, double precio_unitario, double sub_total, double iva, double decuento, double total, String est_detalle, String item) {
        this.id_cabecera = id_cabecera;
        this.id_proveedor = id_proveedor;
        this.num_ord_pedido = num_ord_pedido;
        this.id_sucursal = id_sucursal;
        this.est_cabecera = est_cabecera;
        this.forma_pago = forma_pago;
        this.f_verificado = f_verificado;
        this.f_recibido = f_recibido;
        this.ruc = ruc;
        this.total_subtotal = total_subtotal;
        this.total_iva = total_iva;
        this.total_descuento = total_descuento;
        this.total_facturado = total_facturado;
        this.usuario_creacion = usuario_creacion;
        this.iva_final = iva_final;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
        this.recibido = recibido;
        this.verificado = verificado;
        this.linea_detalle = linea_detalle;
        this.id_producto = id_producto;
        this.cantidad = cantidad;
        this.descripcion = descripcion;
        this.precio_unitario = precio_unitario;
        this.sub_total = sub_total;
        this.iva = iva;
        this.decuento = decuento;
        this.total = total;
        this.est_detalle = est_detalle;
        this.item = item;
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

    public String getEst_cabecera() {
        return est_cabecera;
    }

    public void setEst_cabecera(String est_cabecera) {
        this.est_cabecera = est_cabecera;
    }

    public String getForma_pago() {
        return forma_pago;
    }

    public void setForma_pago(String forma_pago) {
        this.forma_pago = forma_pago;
    }

    public String getF_verificado() {
        return f_verificado;
    }

    public void setF_verificado(String f_verificado) {
        this.f_verificado = f_verificado;
    }

    public String getF_recibido() {
        return f_recibido;
    }

    public void setF_recibido(String f_recibido) {
        this.f_recibido = f_recibido;
    }

    public String getRuc() {
        return ruc;
    }

    public void setRuc(String ruc) {
        this.ruc = ruc;
    }

    public double getTotal_subtotal() {
        return total_subtotal;
    }

    public void setTotal_subtotal(double total_subtotal) {
        this.total_subtotal = total_subtotal;
    }

    public double getTotal_iva() {
        return total_iva;
    }

    public void setTotal_iva(double total_iva) {
        this.total_iva = total_iva;
    }

    public double getTotal_descuento() {
        return total_descuento;
    }

    public void setTotal_descuento(double total_descuento) {
        this.total_descuento = total_descuento;
    }

    public double getTotal_facturado() {
        return total_facturado;
    }

    public void setTotal_facturado(double total_facturado) {
        this.total_facturado = total_facturado;
    }

    public String getUsuario_creacion() {
        return usuario_creacion;
    }

    public void setUsuario_creacion(String usuario_creacion) {
        this.usuario_creacion = usuario_creacion;
    }

    public double getIva_final() {
        return iva_final;
    }

    public void setIva_final(double iva_final) {
        this.iva_final = iva_final;
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

    public Long getLinea_detalle() {
        return linea_detalle;
    }

    public void setLinea_detalle(Long linea_detalle) {
        this.linea_detalle = linea_detalle;
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

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public double getPrecio_unitario() {
        return precio_unitario;
    }

    public void setPrecio_unitario(double precio_unitario) {
        this.precio_unitario = precio_unitario;
    }

    public double getSub_total() {
        return sub_total;
    }

    public void setSub_total(double sub_total) {
        this.sub_total = sub_total;
    }

    public double getIva() {
        return iva;
    }

    public void setIva(double iva) {
        this.iva = iva;
    }

    public double getDecuento() {
        return decuento;
    }

    public void setDecuento(double decuento) {
        this.decuento = decuento;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }

    public String getEst_detalle() {
        return est_detalle;
    }

    public void setEst_detalle(String est_detalle) {
        this.est_detalle = est_detalle;
    }

    public String getItem() {
        return item;
    }

    public void setItem(String item) {
        this.item = item;
    }
  
  
}
