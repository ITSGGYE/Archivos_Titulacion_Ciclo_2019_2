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
@Table(name = "parentesco")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Parentesco.findAll", query = "SELECT p FROM Parentesco p")
    , @NamedQuery(name = "Parentesco.findByIdParentesco", query = "SELECT p FROM Parentesco p WHERE p.idParentesco = :idParentesco")
    , @NamedQuery(name = "Parentesco.findByNombre", query = "SELECT p FROM Parentesco p WHERE p.nombre = :nombre")
    , @NamedQuery(name = "Parentesco.findByEstado", query = "SELECT p FROM Parentesco p WHERE p.estado = :estado")})
public class Parentesco implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_parentesco")
    private Long idParentesco;
    @Column(name = "nombre")
    private String nombre;
    @Column(name = "estado")
    private Character estado;
    @OneToMany(mappedBy = "idParentesco")
    private List<Estudiantes> estudiantesList;

    public Parentesco() {
    }

    public Parentesco(Long idParentesco) {
        this.idParentesco = idParentesco;
    }

    public Long getIdParentesco() {
        return idParentesco;
    }

    public void setIdParentesco(Long idParentesco) {
        this.idParentesco = idParentesco;
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
    public List<Estudiantes> getEstudiantesList() {
        return estudiantesList;
    }

    public void setEstudiantesList(List<Estudiantes> estudiantesList) {
        this.estudiantesList = estudiantesList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idParentesco != null ? idParentesco.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Parentesco)) {
            return false;
        }
        Parentesco other = (Parentesco) object;
        if ((this.idParentesco == null && other.idParentesco != null) || (this.idParentesco != null && !this.idParentesco.equals(other.idParentesco))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.Parentesco[ idParentesco=" + idParentesco + " ]";
    }
    
}
