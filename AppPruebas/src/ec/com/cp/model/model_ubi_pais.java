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
public class model_ubi_pais {
   private Long id_pais;
   private String nombre;
   private String estado;

    public model_ubi_pais() {
    }

    public model_ubi_pais(Long id_pais, String nombre, String estado) {
        this.id_pais = id_pais;
        this.nombre = nombre;
        this.estado = estado;
    }

    public Long getId_pais() {
        return id_pais;
    }

    public void setId_pais(Long id_pais) {
        this.id_pais = id_pais;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
   
}
