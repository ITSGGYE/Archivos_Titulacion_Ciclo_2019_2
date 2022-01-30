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
@Table(name = "cursos")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Cursos.findAll", query = "SELECT c FROM Cursos c")
    , @NamedQuery(name = "Cursos.findByIdCursos", query = "SELECT c FROM Cursos c WHERE c.idCursos = :idCursos")
    , @NamedQuery(name = "Cursos.findByNombre", query = "SELECT c FROM Cursos c WHERE c.nombre = :nombre")
    , @NamedQuery(name = "Cursos.findByEstado", query = "SELECT c FROM Cursos c WHERE c.estado = :estado")})
public class Cursos implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_cursos")
    private Long idCursos;
    @Column(name = "nombre")
    private String nombre;
    @Column(name = "estado")
    private Character estado;
    @OneToMany(mappedBy = "idCurso")
    private List<RelCursoParalelo> relCursoParaleloList;

    public Cursos() {
    }

    public Cursos(Long idCursos) {
        this.idCursos = idCursos;
    }

    public Long getIdCursos() {
        return idCursos;
    }

    public void setIdCursos(Long idCursos) {
        this.idCursos = idCursos;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    @XmlTransient
    public List<RelCursoParalelo> getRelCursoParaleloList() {
        return relCursoParaleloList;
    }

    public void setRelCursoParaleloList(List<RelCursoParalelo> relCursoParaleloList) {
        this.relCursoParaleloList = relCursoParaleloList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idCursos != null ? idCursos.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Cursos)) {
            return false;
        }
        Cursos other = (Cursos) object;
        if ((this.idCursos == null && other.idCursos != null) || (this.idCursos != null && !this.idCursos.equals(other.idCursos))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.Cursos[ idCursos=" + idCursos + " ]";
    }
    
}
