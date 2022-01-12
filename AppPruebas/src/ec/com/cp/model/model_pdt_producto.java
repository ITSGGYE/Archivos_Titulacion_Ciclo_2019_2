/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

import java.util.Date;

/**
 *
 * @author Usuario
 */
public class model_pdt_producto {
//`id_producto``nombre_producto``codigo_barra``estado``u_creacion``f_creacion`
//`u_actualizacion``f_actualizacion``id_presentacion``precio``id_iva``total``iva``descripcion`
    private Long id_producto;
    private String nombre_producto1;
    private String codigo_barra;
    private char estado;
    private String usuario_creacion;
    private Date f_creacion;
    private String usuario_actulizacion;
    private Date f_actualizacion;
//    private Long id_presentacion;    
    private Double precio;
    private Long id_iva;   
    private Double total;   
    private String  iva;   
    private String  descrpcion; 
    private String  nombre_marca; 
    private String  articulo; 
    private String  nombre_medida; 
    private String  nombre_envase; 
    private String  nombre_categoria; 
    private String  nombre_subcategoria; 
    private String  nombre; 
    private Long minimo;   
    private Long maximo;     
    private Long id_bodega;
    private Long id_marca;
    private Long id_articulo;
    private Long id_medida;
    private Long id_envase;
    private Long id_subcategoria;
    private Long id_categoria;
    

    public model_pdt_producto() {
    }

    public model_pdt_producto(Long id_producto, String nombre_producto1, String codigo_barra, char estado, String usuario_creacion, Date f_creacion, String usuario_actulizacion, Date f_actualizacion, Double precio, Long id_iva, Double total, String iva, String descrpcion, String nombre_marca, String articulo, String nombre_medida, String nombre_envase, String nombre_categoria, String nombre_subcategoria, String nombre, Long minimo, Long maximo, Long id_bodega, Long id_marca, Long id_articulo, Long id_medida, Long id_envase, Long id_subcategoria, Long id_categoria) {
        this.id_producto = id_producto;
        this.nombre_producto1 = nombre_producto1;
        this.codigo_barra = codigo_barra;
        this.estado = estado;
        this.usuario_creacion = usuario_creacion;
        this.f_creacion = f_creacion;
        this.usuario_actulizacion = usuario_actulizacion;
        this.f_actualizacion = f_actualizacion;
        this.precio = precio;
        this.id_iva = id_iva;
        this.total = total;
        this.iva = iva;
        this.descrpcion = descrpcion;
        this.nombre_marca = nombre_marca;
        this.articulo = articulo;
        this.nombre_medida = nombre_medida;
        this.nombre_envase = nombre_envase;
        this.nombre_categoria = nombre_categoria;
        this.nombre_subcategoria = nombre_subcategoria;
        this.nombre = nombre;
        this.minimo = minimo;
        this.maximo = maximo;
        this.id_bodega = id_bodega;
        this.id_marca = id_marca;
        this.id_articulo = id_articulo;
        this.id_medida = id_medida;
        this.id_envase = id_envase;
        this.id_subcategoria = id_subcategoria;
        this.id_categoria = id_categoria;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Long getId_categoria() {
        return id_categoria;
    }

    public void setId_categoria(Long id_categoria) {
        this.id_categoria = id_categoria;
    }

    
    public Long getId_bodega() {
        return id_bodega;
    }

    public void setId_bodega(Long id_bodega) {
        this.id_bodega = id_bodega;
    }

 

    public Long getId_producto() {
        return id_producto;
    }

    public void setId_producto(Long id_producto) {
        this.id_producto = id_producto;
    }

    public String getNombre_producto1() {
        return nombre_producto1;
    }

    public void setNombre_producto1(String nombre_producto1) {
        this.nombre_producto1 = nombre_producto1;
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
    
    public Double getPrecio() {
        return precio;
    }

    public void setPrecio(Double precio) {
        this.precio = precio;
    }

    public Long getId_iva() {
        return id_iva;
    }

    public void setId_iva(Long id_iva) {
        this.id_iva = id_iva;
    }

    public Double getTotal() {
        return total;
    }

    public void setTotal(Double total) {
        this.total = total;
    }

    public String getIva() {
        return iva;
    }

    public void setIva(String iva) {
        this.iva = iva;
    }

    public String getDescrpcion() {
        return descrpcion;
    }

    public void setDescrpcion(String descrpcion) {
        this.descrpcion = descrpcion;
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

    public String getNombre_marca() {
        return nombre_marca;
    }

    public void setNombre_marca(String nombre_marca) {
        this.nombre_marca = nombre_marca;
    }

    public String getArticulo() {
        return articulo;
    }

    public void setArticulo(String articulo) {
        this.articulo = articulo;
    }

    public String getNombre_medida() {
        return nombre_medida;
    }

    public void setNombre_medida(String nombre_medida) {
        this.nombre_medida = nombre_medida;
    }

    public String getNombre_envase() {
        return nombre_envase;
    }

    public void setNombre_envase(String nombre_envase) {
        this.nombre_envase = nombre_envase;
    }

    public Long getId_marca() {
        return id_marca;
    }

    public void setId_marca(Long id_marca) {
        this.id_marca = id_marca;
    }

    public Long getId_articulo() {
        return id_articulo;
    }

    public void setId_articulo(Long id_articulo) {
        this.id_articulo = id_articulo;
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

    public Long getId_subcategoria() {
        return id_subcategoria;
    }

    public void setId_subcategoria(Long id_subcategoria) {
        this.id_subcategoria = id_subcategoria;
    }

    public String getNombre_categoria() {
        return nombre_categoria;
    }

    public void setNombre_categoria(String nombre_categoria) {
        this.nombre_categoria = nombre_categoria;
    }

    public String getNombre_subcategoria() {
        return nombre_subcategoria;
    }

    public void setNombre_subcategoria(String nombre_subcategoria) {
        this.nombre_subcategoria = nombre_subcategoria;
    }
    
}
