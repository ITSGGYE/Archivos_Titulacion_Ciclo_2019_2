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
@Table(name = "periodo_lectivo")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "PeriodoLectivo.findAll", query = "SELECT p FROM PeriodoLectivo p")
    , @NamedQuery(name = "PeriodoLectivo.findByIdPeriodoLectivo", query = "SELECT p FROM PeriodoLectivo p WHERE p.idPeriodoLectivo = :idPeriodoLectivo")
    , @NamedQuery(name = "PeriodoLectivo.findByPeriodo", query = "SELECT p FROM PeriodoLectivo p WHERE p.periodo = :periodo")
    , @NamedQuery(name = "PeriodoLectivo.findByEstado", query = "SELECT p FROM PeriodoLectivo p WHERE p.estado = :estado")})
public class PeriodoLectivo implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_periodo_lectivo")
    private Long idPeriodoLectivo;
    @Column(name = "periodo")
    private String periodo;
    @Column(name = "estado")
    private Character estado;
    @OneToMany(mappedBy = "idPeriodoLectivo")
    private List<Matricula> matriculaList;

    public PeriodoLectivo() {
    }

    public PeriodoLectivo(Long idPeriodoLectivo) {
        this.idPeriodoLectivo = idPeriodoLectivo;
    }

    public Long getIdPeriodoLectivo() {
        return idPeriodoLectivo;
    }

    public void setIdPeriodoLectivo(Long idPeriodoLectivo) {
        this.idPeriodoLectivo = idPeriodoLectivo;
    }

    public String getPeriodo() {
        return periodo;
    }

    public void setPeriodo(String periodo) {
        this.periodo = periodo;
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
        hash += (idPeriodoLectivo != null ? idPeriodoLectivo.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof PeriodoLectivo)) {
            return false;
        }
        PeriodoLectivo other = (PeriodoLectivo) object;
        if ((this.idPeriodoLectivo == null && other.idPeriodoLectivo != null) || (this.idPeriodoLectivo != null && !this.idPeriodoLectivo.equals(other.idPeriodoLectivo))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.PeriodoLectivo[ idPeriodoLectivo=" + idPeriodoLectivo + " ]";
    }
    
}
