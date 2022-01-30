/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dto;

import java.io.Serializable;
import java.math.BigInteger;
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
@Table(name = "asistencias")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Asistencias.findAll", query = "SELECT a FROM Asistencias a")
    , @NamedQuery(name = "Asistencias.findByIdAsistencia", query = "SELECT a FROM Asistencias a WHERE a.idAsistencia = :idAsistencia")
    , @NamedQuery(name = "Asistencias.findByFecha", query = "SELECT a FROM Asistencias a WHERE a.fecha = :fecha")
    , @NamedQuery(name = "Asistencias.findByAsistencia", query = "SELECT a FROM Asistencias a WHERE a.asistencia = :asistencia")
    , @NamedQuery(name = "Asistencias.findByIdEstudiante", query = "SELECT a FROM Asistencias a WHERE a.idEstudiante = :idEstudiante")})
public class Asistencias implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_asistencia")
    private Long idAsistencia;
    @Column(name = "fecha")
    @Temporal(TemporalType.DATE)
    private Date fecha;
    @Column(name = "asistencia")
    private String asistencia;
    @Column(name = "id_estudiante")
    private BigInteger idEstudiante;
    @JoinColumn(name = "id_clase", referencedColumnName = "id_clase_materia")
    @ManyToOne
    private ClasesMateria idClase;

    public Asistencias() {
    }

    public Asistencias(Long idAsistencia) {
        this.idAsistencia = idAsistencia;
    }

    public Long getIdAsistencia() {
        return idAsistencia;
    }

    public void setIdAsistencia(Long idAsistencia) {
        this.idAsistencia = idAsistencia;
    }

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }

    public String getAsistencia() {
        return asistencia;
    }

    public void setAsistencia(String asistencia) {
        this.asistencia = asistencia;
    }

    public BigInteger getIdEstudiante() {
        return idEstudiante;
    }

    public void setIdEstudiante(BigInteger idEstudiante) {
        this.idEstudiante = idEstudiante;
    }

    public ClasesMateria getIdClase() {
        return idClase;
    }

    public void setIdClase(ClasesMateria idClase) {
        this.idClase = idClase;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idAsistencia != null ? idAsistencia.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Asistencias)) {
            return false;
        }
        Asistencias other = (Asistencias) object;
        if ((this.idAsistencia == null && other.idAsistencia != null) || (this.idAsistencia != null && !this.idAsistencia.equals(other.idAsistencia))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.Asistencias[ idAsistencia=" + idAsistencia + " ]";
    }
    
}
