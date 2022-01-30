/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dto;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Usuario
 */
@Entity
@Table(name = "rel_matri_doc")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "RelMatriDoc.findAll", query = "SELECT r FROM RelMatriDoc r")
    , @NamedQuery(name = "RelMatriDoc.findByIdRelMatriDoc", query = "SELECT r FROM RelMatriDoc r WHERE r.idRelMatriDoc = :idRelMatriDoc")
    , @NamedQuery(name = "RelMatriDoc.findByEstado", query = "SELECT r FROM RelMatriDoc r WHERE r.estado = :estado")
    , @NamedQuery(name = "RelMatriDoc.findByFechaCreacion", query = "SELECT r FROM RelMatriDoc r WHERE r.fechaCreacion = :fechaCreacion")})
public class RelMatriDoc implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_rel_matri_doc")
    private Long idRelMatriDoc;
    @Column(name = "estado")
    private Character estado;
    @Column(name = "fecha_creacion")
    @Temporal(TemporalType.TIMESTAMP)
    private Date fechaCreacion;
    @JoinColumn(name = "id_documento", referencedColumnName = "id_documentos")
    @ManyToOne
    private Documentos idDocumento;
    @JoinColumn(name = "id_matricula", referencedColumnName = "id_matricula")
    @ManyToOne
    private Matricula idMatricula;

    public RelMatriDoc() {
    }

    public RelMatriDoc(Long idRelMatriDoc) {
        this.idRelMatriDoc = idRelMatriDoc;
    }

    public Long getIdRelMatriDoc() {
        return idRelMatriDoc;
    }

    public void setIdRelMatriDoc(Long idRelMatriDoc) {
        this.idRelMatriDoc = idRelMatriDoc;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    public Date getFechaCreacion() {
        return fechaCreacion;
    }

    public void setFechaCreacion(Date fechaCreacion) {
        this.fechaCreacion = fechaCreacion;
    }

    public Documentos getIdDocumento() {
        return idDocumento;
    }

    public void setIdDocumento(Documentos idDocumento) {
        this.idDocumento = idDocumento;
    }

    public Matricula getIdMatricula() {
        return idMatricula;
    }

    public void setIdMatricula(Matricula idMatricula) {
        this.idMatricula = idMatricula;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idRelMatriDoc != null ? idRelMatriDoc.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof RelMatriDoc)) {
            return false;
        }
        RelMatriDoc other = (RelMatriDoc) object;
        if ((this.idRelMatriDoc == null && other.idRelMatriDoc != null) || (this.idRelMatriDoc != null && !this.idRelMatriDoc.equals(other.idRelMatriDoc))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.RelMatriDoc[ idRelMatriDoc=" + idRelMatriDoc + " ]";
    }
    
}
