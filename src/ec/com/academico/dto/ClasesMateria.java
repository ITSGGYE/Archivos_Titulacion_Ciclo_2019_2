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
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
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
@Table(name = "clases_materia")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "ClasesMateria.findAll", query = "SELECT c FROM ClasesMateria c")
    , @NamedQuery(name = "ClasesMateria.findByIdClaseMateria", query = "SELECT c FROM ClasesMateria c WHERE c.idClaseMateria = :idClaseMateria")
    , @NamedQuery(name = "ClasesMateria.findByClase", query = "SELECT c FROM ClasesMateria c WHERE c.clase = :clase")
    , @NamedQuery(name = "ClasesMateria.findByEstado", query = "SELECT c FROM ClasesMateria c WHERE c.estado = :estado")})
public class ClasesMateria implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_clase_materia")
    private Long idClaseMateria;
    @Column(name = "clase")
    private String clase;
    @Column(name = "estado")
    private Character estado;
    @JoinColumn(name = "id_curso_profesor", referencedColumnName = "id_curso_profesor")
    @ManyToOne
    private CursoProfesor idCursoProfesor;
    @OneToMany(mappedBy = "idClase")
    private List<Asistencias> asistenciasList;

    public ClasesMateria() {
    }

    public ClasesMateria(Long idClaseMateria) {
        this.idClaseMateria = idClaseMateria;
    }

    public Long getIdClaseMateria() {
        return idClaseMateria;
    }

    public void setIdClaseMateria(Long idClaseMateria) {
        this.idClaseMateria = idClaseMateria;
    }

    public String getClase() {
        return clase;
    }

    public void setClase(String clase) {
        this.clase = clase;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    public CursoProfesor getIdCursoProfesor() {
        return idCursoProfesor;
    }

    public void setIdCursoProfesor(CursoProfesor idCursoProfesor) {
        this.idCursoProfesor = idCursoProfesor;
    }

    @XmlTransient
    public List<Asistencias> getAsistenciasList() {
        return asistenciasList;
    }

    public void setAsistenciasList(List<Asistencias> asistenciasList) {
        this.asistenciasList = asistenciasList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idClaseMateria != null ? idClaseMateria.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof ClasesMateria)) {
            return false;
        }
        ClasesMateria other = (ClasesMateria) object;
        if ((this.idClaseMateria == null && other.idClaseMateria != null) || (this.idClaseMateria != null && !this.idClaseMateria.equals(other.idClaseMateria))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.ClasesMateria[ idClaseMateria=" + idClaseMateria + " ]";
    }
    
}
