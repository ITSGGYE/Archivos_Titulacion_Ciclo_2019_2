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
@Table(name = "curso_profesor")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "CursoProfesor.findAll", query = "SELECT c FROM CursoProfesor c")
    , @NamedQuery(name = "CursoProfesor.findByIdCursoProfesor", query = "SELECT c FROM CursoProfesor c WHERE c.idCursoProfesor = :idCursoProfesor")
    , @NamedQuery(name = "CursoProfesor.findByEstado", query = "SELECT c FROM CursoProfesor c WHERE c.estado = :estado")})
public class CursoProfesor implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_curso_profesor")
    private Long idCursoProfesor;
    @Column(name = "estado")
    private Character estado;
    @JoinColumn(name = "id_docente", referencedColumnName = "id_docente")
    @ManyToOne
    private Docente idDocente;
    @JoinColumn(name = "id_curso", referencedColumnName = "id_rel_curso_paralelo")
    @ManyToOne
    private RelCursoParalelo idCurso;
    @OneToMany(mappedBy = "idCursoProfesor")
    private List<ClasesMateria> clasesMateriaList;

    public CursoProfesor() {
    }

    public CursoProfesor(Long idCursoProfesor) {
        this.idCursoProfesor = idCursoProfesor;
    }

    public Long getIdCursoProfesor() {
        return idCursoProfesor;
    }

    public void setIdCursoProfesor(Long idCursoProfesor) {
        this.idCursoProfesor = idCursoProfesor;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    public Docente getIdDocente() {
        return idDocente;
    }

    public void setIdDocente(Docente idDocente) {
        this.idDocente = idDocente;
    }

    public RelCursoParalelo getIdCurso() {
        return idCurso;
    }

    public void setIdCurso(RelCursoParalelo idCurso) {
        this.idCurso = idCurso;
    }

    @XmlTransient
    public List<ClasesMateria> getClasesMateriaList() {
        return clasesMateriaList;
    }

    public void setClasesMateriaList(List<ClasesMateria> clasesMateriaList) {
        this.clasesMateriaList = clasesMateriaList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idCursoProfesor != null ? idCursoProfesor.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof CursoProfesor)) {
            return false;
        }
        CursoProfesor other = (CursoProfesor) object;
        if ((this.idCursoProfesor == null && other.idCursoProfesor != null) || (this.idCursoProfesor != null && !this.idCursoProfesor.equals(other.idCursoProfesor))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.CursoProfesor[ idCursoProfesor=" + idCursoProfesor + " ]";
    }
    
}
