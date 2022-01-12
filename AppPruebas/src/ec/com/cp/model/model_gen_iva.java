/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.cp.model;

/**
 *
 * @author ESTUDIANTE
 */
public class model_gen_iva {

    private Long id_iva;
    private String iva;
    private char estado;

    public model_gen_iva() {
    }

    public model_gen_iva(Long id_iva, String iva, char estado) {
        this.id_iva = id_iva;
        this.iva = iva;
        this.estado = estado;
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

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }

}
