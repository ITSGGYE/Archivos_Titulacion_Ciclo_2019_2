/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model.join;

import java.util.Date;

/**
 *
 * @author Usuario
 */
public class model_pdt_producto_join {
    //cat.`nombre`,subc.`id_categoria`,
//subc.`nombre`,art.`id_subcategoria`,-
//art.`articulo`,mar.`id_articulo`,
//mar.`nombre_marca`,pre.`id_marca`,
//pre.`id_presentacion`,pre.`id_medida`,
//me.`nombre_medida`,pre.`id_envase`,
//en.`nombre_envase`,pre.`estado`,prod.`codigo_barra`,prod.`precio`,prod.`id_iva`,iva.`iva`
    private String nombre_categoria;
    private Long id_categoria;
    private String nombre_subcategoria;
    private Long id_subcategoria;
    private String articulo;
    private Long id_articulo;
    private String marca;
    private Long id_marca;
    private Long id_presentacion;
    private Long id_medida;
    private String  nombre_medida;
    private Long id_envase;
    private String  nombre_envase;
    private char estado;
    private Long id_producto;
    private String codigo_barra;
    private Double precio;
    private Long id_iva;
    private String iva;
    
    
//    private Long id_producto;
//    private String descripcion;
//    private char estado;
//    private String observacion;
//    private String usuario_creacion;
//    private Date f_creacion;
//    private String usuario_actulizacion;
//    private Date f_actualizacion;
//    private String codigo;
//    private String nombre_marca;

    public model_pdt_producto_join() {
    }

    public model_pdt_producto_join(String nombre_categoria, Long id_categoria, String nombre_subcategoria, Long id_subcategoria, String articulo, Long id_articulo, String marca, Long id_marca, Long id_presentacion, Long id_medida, String nombre_medida, Long id_envase, String nombre_envase, char estado, Long id_producto, String codigo_barra, Double precio, Long id_iva, String iva) {
        this.nombre_categoria = nombre_categoria;
        this.id_categoria = id_categoria;
        this.nombre_subcategoria = nombre_subcategoria;
        this.id_subcategoria = id_subcategoria;
        this.articulo = articulo;
        this.id_articulo = id_articulo;
        this.marca = marca;
        this.id_marca = id_marca;
        this.id_presentacion = id_presentacion;
        this.id_medida = id_medida;
        this.nombre_medida = nombre_medida;
        this.id_envase = id_envase;
        this.nombre_envase = nombre_envase;
        this.estado = estado;
        this.id_producto = id_producto;
        this.codigo_barra = codigo_barra;
        this.precio = precio;
        this.id_iva = id_iva;
        this.iva = iva;
    }

    public String getNombre_categoria() {
        return nombre_categoria;
    }

    public void setNombre_categoria(String nombre_categoria) {
        this.nombre_categoria = nombre_categoria;
    }

    public Long getId_categoria() {
        return id_categoria;
    }

    public void setId_categoria(Long id_categoria) {
        this.id_categoria = id_categoria;
    }

    public String getNombre_subcategoria() {
        return nombre_subcategoria;
    }

    public void setNombre_subcategoria(String nombre_subcategoria) {
        this.nombre_subcategoria = nombre_subcategoria;
    }

    public Long getId_subcategoria() {
        return id_subcategoria;
    }

    public void setId_subcategoria(Long id_subcategoria) {
        this.id_subcategoria = id_subcategoria;
    }

    public String getArticulo() {
        return articulo;
    }

    public void setArticulo(String articulo) {
        this.articulo = articulo;
    }

    public Long getId_articulo() {
        return id_articulo;
    }

    public void setId_articulo(Long id_articulo) {
        this.id_articulo = id_articulo;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public Long getId_marca() {
        return id_marca;
    }

    public void setId_marca(Long id_marca) {
        this.id_marca = id_marca;
    }

    public Long getId_presentacion() {
        return id_presentacion;
    }

    public void setId_presentacion(Long id_presentacion) {
        this.id_presentacion = id_presentacion;
    }

    public Long getId_medida() {
        return id_medida;
    }

    public void setId_medida(Long id_medida) {
        this.id_medida = id_medida;
    }

    public String getNombre_medida() {
        return nombre_medida;
    }

    public void setNombre_medida(String nombre_medida) {
        this.nombre_medida = nombre_medida;
    }

    public Long getId_envase() {
        return id_envase;
    }

    public void setId_envase(Long id_envase) {
        this.id_envase = id_envase;
    }

    public String getNombre_envase() {
        return nombre_envase;
    }

    public void setNombre_envase(String nombre_envase) {
        this.nombre_envase = nombre_envase;
    }

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }

    public Long getId_producto() {
        return id_producto;
    }

    public void setId_producto(Long id_producto) {
        this.id_producto = id_producto;
    }

    public String getCodigo_barra() {
        return codigo_barra;
    }

    public void setCodigo_barra(String codigo_barra) {
        this.codigo_barra = codigo_barra;
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

    public String getIva() {
        return iva;
    }

    public void setIva(String iva) {
        this.iva = iva;
    }
    
}
