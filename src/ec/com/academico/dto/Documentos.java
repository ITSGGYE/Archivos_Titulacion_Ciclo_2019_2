/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dto;

import java.io.Serializable;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

/**
 *
 * @author Usuario
 */
@Entity
@Table(name = "documentos")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Documentos.findAll", query = "SELECT d FROM Documentos d")
    , @NamedQuery(name = "Documentos.findByIdDocumentos", query = "SELECT d FROM Documentos d WHERE d.idDocumentos = :idDocumentos")
    , @NamedQuery(name = "Documentos.findByDocumento", query = "SELECT d FROM Documentos d WHERE d.documento = :documento")
    , @NamedQuery(name = "Documentos.findByEstado", query = "SELECT d FROM Documentos d WHERE d.estado = :estado")})
public class Documentos implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_documentos")
    private Long idDocumentos;
    @Column(name = "documento")
    private String documento;
    @Column(name = "estado")
    private Character estado;
    @OneToMany(mappedBy = "idDocumento")
    private List<RelMatriDoc> relMatriDocList;

    public Documentos() {
    }

    public Documentos(Long idDocumentos) {
        this.idDocumentos = idDocumentos;
    }

    public Long getIdDocumentos() {
        return idDocumentos;
    }

    public void setIdDocumentos(Long idDocumentos) {
        this.idDocumentos = idDocumentos;
    }

    public String getDocumento() {
        return documento;
    }

    public void setDocumento(String documento) {
        this.documento = documento;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    @XmlTransient
    public List<RelMatriDoc> getRelMatriDocList() {
        return relMatriDocList;
    }

    public void setRelMatriDocList(List<RelMatriDoc> relMatriDocList) {
        this.relMatriDocList = relMatriDocList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idDocumentos != null ? idDocumentos.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Documentos)) {
            return false;
        }
        Documentos other = (Documentos) object;
        if ((this.idDocumentos == null && other.idDocumentos != null) || (this.idDocumentos != null && !this.idDocumentos.equals(other.idDocumentos))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.Documentos[ idDocumentos=" + idDocumentos + " ]";
    }
    
}
