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
public class model_ubi_ciudad {
    private Long id_cuidad;
    private String nombre;
    private String estado;
    private Long id_provincia;

    public model_ubi_ciudad() {
    }

    public model_ubi_ciudad(Long id_cuidad, String nombre, String estado, Long id_provincia) {
        this.id_cuidad = id_cuidad;
        this.nombre = nombre;
        this.estado = estado;
        this.id_provincia = id_provincia;
    }

    public Long getId_cuidad() {
        return id_cuidad;
    }

    public void setId_cuidad(Long id_cuidad) {
        this.id_cuidad = id_cuidad;
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

    public Long getId_provincia() {
        return id_provincia;
    }

    public void setId_provincia(Long id_provincia) {
        this.id_provincia = id_provincia;
    }
    
}
