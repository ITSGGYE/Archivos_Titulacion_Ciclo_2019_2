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
@Table(name = "tipo_matricula")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "TipoMatricula.findAll", query = "SELECT t FROM TipoMatricula t")
    , @NamedQuery(name = "TipoMatricula.findByIdTipoMatricula", query = "SELECT t FROM TipoMatricula t WHERE t.idTipoMatricula = :idTipoMatricula")
    , @NamedQuery(name = "TipoMatricula.findByTipoMatricula", query = "SELECT t FROM TipoMatricula t WHERE t.tipoMatricula = :tipoMatricula")
    , @NamedQuery(name = "TipoMatricula.findByEstado", query = "SELECT t FROM TipoMatricula t WHERE t.estado = :estado")})
public class TipoMatricula implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_tipo_matricula")
    private Long idTipoMatricula;
    @Column(name = "tipo_matricula")
    private String tipoMatricula;
    @Column(name = "estado")
    private Character estado;
    @OneToMany(mappedBy = "idTipoMatricula")
    private List<Matricula> matriculaList;

    public TipoMatricula() {
    }

    public TipoMatricula(Long idTipoMatricula) {
        this.idTipoMatricula = idTipoMatricula;
    }

    public Long getIdTipoMatricula() {
        return idTipoMatricula;
    }

    public void setIdTipoMatricula(Long idTipoMatricula) {
        this.idTipoMatricula = idTipoMatricula;
    }

    public String getTipoMatricula() {
        return tipoMatricula;
    }

    public void setTipoMatricula(String tipoMatricula) {
        this.tipoMatricula = tipoMatricula;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    @XmlTransient
    public List<Matricula> getMatriculaList() {
        return matriculaList;
    }

    public void setMatriculaList(List<Matricula> matriculaList) {
        this.matriculaList = matriculaList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idTipoMatricula != null ? idTipoMatricula.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof TipoMatricula)) {
            return false;
        }
        TipoMatricula other = (TipoMatricula) object;
        if ((this.idTipoMatricula == null && other.idTipoMatricula != null) || (this.idTipoMatricula != null && !this.idTipoMatricula.equals(other.idTipoMatricula))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.TipoMatricula[ idTipoMatricula=" + idTipoMatricula + " ]";
    }
    
}
