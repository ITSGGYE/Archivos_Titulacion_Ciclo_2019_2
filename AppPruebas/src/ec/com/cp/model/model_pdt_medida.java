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
public class model_pdt_medida {
    private Long id_medida;
  private String nombre_medida;
  private String estdao;
  private String u_creacion;
  private String f_creacion;
  private String u_actualizacion;
  private String f_actualizacion;

    public model_pdt_medida() {
    }

    public model_pdt_medida(Long id_medida, String nombre_medida, String estdao, String u_creacion, String f_creacion, String u_actualizacion, String f_actualizacion) {
        this.id_medida = id_medida;
        this.nombre_medida = nombre_medida;
        this.estdao = estdao;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
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

    public String getEstdao() {
        return estdao;
    }

    public void setEstdao(String estdao) {
        this.estdao = estdao;
    }

    public String getU_creacion() {
        return u_creacion;
    }

    public void setU_creacion(String u_creacion) {
        this.u_creacion = u_creacion;
    }

    public String getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(String f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getU_actualizacion() {
        return u_actualizacion;
    }

    public void setU_actualizacion(String u_actualizacion) {
        this.u_actualizacion = u_actualizacion;
    }

    public String getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(String f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }
  
}
