/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dtoJoin;

/**
 *
 * @author Usuarior
 * doc.`id_rel_matri_doc`,rdoc.`estado`,rdoc.`fecha_creacion`,rdoc.`id_matricula`,rdoc.`id_documento`
 * ,doc.`documento`
 */
public class DocumentosMatriculaJoin {

    private Long id_rel_matri_doc;
    private char estado;
    private String fecha_creacion;
    private Long id_matricula;
    private Long id_documento;
    private String documento;

    public DocumentosMatriculaJoin() {
    }

    public DocumentosMatriculaJoin(Long id_rel_matri_doc, char estado, String fecha_creacion, Long id_matricula, Long id_documento, String documento) {
        this.id_rel_matri_doc = id_rel_matri_doc;
        this.estado = estado;
        this.fecha_creacion = fecha_creacion;
        this.id_matricula = id_matricula;
        this.id_documento = id_documento;
        this.documento = documento;
    }

    public Long getId_rel_matri_doc() {
        return id_rel_matri_doc;
    }

    public void setId_rel_matri_doc(Long id_rel_matri_doc) {
        this.id_rel_matri_doc = id_rel_matri_doc;
    }

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }

    public String getFecha_creacion() {
        return fecha_creacion;
    }

    public void setFecha_creacion(String fecha_creacion) {
        this.fecha_creacion = fecha_creacion;
    }

    public Long getId_matricula() {
        return id_matricula;
    }

    public void setId_matricula(Long id_matricula) {
        this.id_matricula = id_matricula;
    }

    public Long getId_documento() {
        return id_documento;
    }

    public void setId_documento(Long id_documento) {
        this.id_documento = id_documento;
    }

    public String getDocumento() {
        return documento;
    }

    public void setDocumento(String documento) {
        this.documento = documento;
    }

}
