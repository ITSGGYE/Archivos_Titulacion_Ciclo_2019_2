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
public class model_ubi_provincia {
    private Long id_provincia;
    private String nombre;
    private String estado;
    private Long id_pais;

    public model_ubi_provincia() {
    }

    public model_ubi_provincia(Long id_provincia, String nombre, String estado, Long id_pais) {
        this.id_provincia = id_provincia;
        this.nombre = nombre;
        this.estado = estado;
        this.id_pais = id_pais;
    }

    public Long getId_provincia() {
        return id_provincia;
    }

    public void setId_provincia(Long id_provincia) {
        this.id_provincia = id_provincia;
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

    public Long getId_pais() {
        return id_pais;
    }

    public void setId_pais(Long id_pais) {
        this.id_pais = id_pais;
    }
    
}
