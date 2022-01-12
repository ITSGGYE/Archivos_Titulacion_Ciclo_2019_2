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
public class model_gen_bodega {
     
    private Long id_bodega; 
    private String nombre_bodega;
    private char estado;

    public model_gen_bodega() {
    }

    public model_gen_bodega(Long id_bodega, String nombre_bodega, char estado) {
        this.id_bodega = id_bodega;
        this.nombre_bodega = nombre_bodega;
        this.estado = estado;
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

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }
    
}
