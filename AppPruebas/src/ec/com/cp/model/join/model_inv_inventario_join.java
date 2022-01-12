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
public class model_inv_inventario_join {

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

    private String nombre_producto;
    private String codigo_barra;
    private char estado;
    private double precio;
    private Long id_iva;
    private double total;
    private Long minimo;
    private Long maximo;

    private double iva;
    private char estdo_iva;
    private String iva_string;

//det.`valor_costo`,det.`valor_venta`,det.`valor_descuento`,det.`estado`
    private double valor_costo;
    private double valor_venta;
    private double valor_descuento;
    private char estdo_tarifario;
//
    private Long id_bodega;
    private String nombre_bodega;
    public model_inv_inventario_join() {
    }

    public model_inv_inventario_join(Long id_kardex, Long cantidad, double costo_actual, double costo_promedio, String nombre_producto, double total, double valor_costo, double valor_venta, double valor_descuento, String nombre_bodega) {
        this.id_kardex = id_kardex;
        this.cantidad = cantidad;
        this.costo_actual = costo_actual;
        this.costo_promedio = costo_promedio;
        this.nombre_producto = nombre_producto;
        this.total = total;
        this.valor_costo = valor_costo;
        this.valor_venta = valor_venta;
        this.valor_descuento = valor_descuento;
        this.nombre_bodega = nombre_bodega;
    }
    
    

    public model_inv_inventario_join(Long id_kardex, Long entrada, Long salida, char estado_inv, Long id_usuario, Long id_producto, String usuario_creacion, String f_creacion, String usuario_actulizacion, String f_actualizacion, Long cantidad, double costo_actual, double costo_promedio, double costo_anterior, String fecha, double valor_total, String nombre_producto, String codigo_barra, char estado, double precio, Long id_iva, double total, Long minimo, Long maximo, double iva, char estdo_iva, String iva_string, double valor_costo, double valor_venta, double valor_descuento, char estdo_tarifario, Long id_bodega, String nombre_bodega) {
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
        this.nombre_producto = nombre_producto;
        this.codigo_barra = codigo_barra;
        this.estado = estado;
        this.precio = precio;
        this.id_iva = id_iva;
        this.total = total;
        this.minimo = minimo;
        this.maximo = maximo;
        this.iva = iva;
        this.estdo_iva = estdo_iva;
        this.iva_string = iva_string;
        this.valor_costo = valor_costo;
        this.valor_venta = valor_venta;
        this.valor_descuento = valor_descuento;
        this.estdo_tarifario = estdo_tarifario;
        this.id_bodega = id_bodega;
        this.nombre_bodega = nombre_bodega;
    }

    public Long getId_bodega() {
        return id_bodega;
    }

    public void setId_bodega(Long id_bodega) {
        this.id_bodega = id_bodega;
    }

    public String getNombre_bodega() {
        return nombre_bodega;
    }

    public void setNombre_bodega(String nombre_bodega) {
        this.nombre_bodega = nombre_bodega;
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

    public String getNombre_producto() {
        return nombre_producto;
    }

    public void setNombre_producto(String nombre_producto) {
        this.nombre_producto = nombre_producto;
    }

    public String getCodigo_barra() {
        return codigo_barra;
    }

    public void setCodigo_barra(String codigo_barra) {
        this.codigo_barra = codigo_barra;
    }

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }

    public double getPrecio() {
        return precio;
    }

    public void setPrecio(double precio) {
        this.precio = precio;
    }

    public Long getId_iva() {
        return id_iva;
    }

    public void setId_iva(Long id_iva) {
        this.id_iva = id_iva;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }

    public Long getMinimo() {
        return minimo;
    }

    public void setMinimo(Long minimo) {
        this.minimo = minimo;
    }

    public Long getMaximo() {
        return maximo;
    }

    public void setMaximo(Long maximo) {
        this.maximo = maximo;
    }

    public double getIva() {
        return iva;
    }

    public void setIva(double iva) {
        this.iva = iva;
    }

    public char getEstdo_iva() {
        return estdo_iva;
    }

    public void setEstdo_iva(char estdo_iva) {
        this.estdo_iva = estdo_iva;
    }

    public String getIva_string() {
        return iva_string;
    }

    public void setIva_string(String iva_string) {
        this.iva_string = iva_string;
    }

    public double getValor_costo() {
        return valor_costo;
    }

    public void setValor_costo(double valor_costo) {
        this.valor_costo = valor_costo;
    }

    public double getValor_venta() {
        return valor_venta;
    }

    public void setValor_venta(double valor_venta) {
        this.valor_venta = valor_venta;
    }

    public double getValor_descuento() {
        return valor_descuento;
    }

    public void setValor_descuento(double valor_descuento) {
        this.valor_descuento = valor_descuento;
    }

    public char getEstdo_tarifario() {
        return estdo_tarifario;
    }

    public void setEstdo_tarifario(char estdo_tarifario) {
        this.estdo_tarifario = estdo_tarifario;
    }

}
