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
public class model_seg_rol{

    private Long id_rol;
    private String rol;
    private String estado;

    public model_seg_rol() {
    }

    public model_seg_rol(Long id_rol, String rol, String estado) {
        this.id_rol = id_rol;
        this.rol = rol;
        this.estado = estado;
    }

    public Long getId_rol() {
        return id_rol;
    }

    public void setId_rol(Long id_rol) {
        this.id_rol = id_rol;
    }

    public String getRol() {
        return rol;
    }

    public void setRol(String rol) {
        this.rol = rol;
    }


    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
    
    
}
