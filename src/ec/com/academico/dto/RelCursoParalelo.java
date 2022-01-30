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
@Table(name = "rel_curso_paralelo")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "RelCursoParalelo.findAll", query = "SELECT r FROM RelCursoParalelo r")
    , @NamedQuery(name = "RelCursoParalelo.findByIdRelCursoParalelo", query = "SELECT r FROM RelCursoParalelo r WHERE r.idRelCursoParalelo = :idRelCursoParalelo")
    , @NamedQuery(name = "RelCursoParalelo.findByMinino", query = "SELECT r FROM RelCursoParalelo r WHERE r.minino = :minino")
    , @NamedQuery(name = "RelCursoParalelo.findByMaximo", query = "SELECT r FROM RelCursoParalelo r WHERE r.maximo = :maximo")
    , @NamedQuery(name = "RelCursoParalelo.findByEstado", query = "SELECT r FROM RelCursoParalelo r WHERE r.estado = :estado")})
public class RelCursoParalelo implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_rel_curso_paralelo")
    private Long idRelCursoParalelo;
    @Column(name = "minino")
    private Integer minino;
    @Column(name = "maximo")
    private Integer maximo;
    @Column(name = "estado")
    private Character estado;
    @OneToMany(mappedBy = "idCurso")
    private List<CursoProfesor> cursoProfesorList;
    @OneToMany(mappedBy = "idCurso")
    private List<Matricula> matriculaList;
    @JoinColumn(name = "id_curso", referencedColumnName = "id_cursos")
    @ManyToOne
    private Cursos idCurso;
    @JoinColumn(name = "id_paralelo", referencedColumnName = "id_paralelos")
    @ManyToOne
    private Paralelos idParalelo;

    public RelCursoParalelo() {
    }

    public RelCursoParalelo(Long idRelCursoParalelo) {
        this.idRelCursoParalelo = idRelCursoParalelo;
    }

    public Long getIdRelCursoParalelo() {
        return idRelCursoParalelo;
    }

    public void setIdRelCursoParalelo(Long idRelCursoParalelo) {
        this.idRelCursoParalelo = idRelCursoParalelo;
    }

    public Integer getMinino() {
        return minino;
    }

    public void setMinino(Integer minino) {
        this.minino = minino;
    }

    public Integer getMaximo() {
        return maximo;
    }

    public void setMaximo(Integer maximo) {
        this.maximo = maximo;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    @XmlTransient
    public List<CursoProfesor> getCursoProfesorList() {
        return cursoProfesorList;
    }

    public void setCursoProfesorList(List<CursoProfesor> cursoProfesorList) {
        this.cursoProfesorList = cursoProfesorList;
    }

    @XmlTransient
    public List<Matricula> getMatriculaList() {
        return matriculaList;
    }

    public void setMatriculaList(List<Matricula> matriculaList) {
        this.matriculaList = matriculaList;
    }

    public Cursos getIdCurso() {
        return idCurso;
    }

    public void setIdCurso(Cursos idCurso) {
        this.idCurso = idCurso;
    }

    public Paralelos getIdParalelo() {
        return idParalelo;
    }

    public void setIdParalelo(Paralelos idParalelo) {
        this.idParalelo = idParalelo;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idRelCursoParalelo != null ? idRelCursoParalelo.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof RelCursoParalelo)) {
            return false;
        }
        RelCursoParalelo other = (RelCursoParalelo) object;
        if ((this.idRelCursoParalelo == null && other.idRelCursoParalelo != null) || (this.idRelCursoParalelo != null && !this.idRelCursoParalelo.equals(other.idRelCursoParalelo))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.RelCursoParalelo[ idRelCursoParalelo=" + idRelCursoParalelo + " ]";
    }
    
}
