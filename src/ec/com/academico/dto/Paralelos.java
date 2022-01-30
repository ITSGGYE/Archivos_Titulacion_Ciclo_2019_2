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
@Table(name = "paralelos")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Paralelos.findAll", query = "SELECT p FROM Paralelos p")
    , @NamedQuery(name = "Paralelos.findByIdParalelos", query = "SELECT p FROM Paralelos p WHERE p.idParalelos = :idParalelos")
    , @NamedQuery(name = "Paralelos.findByNombre", query = "SELECT p FROM Paralelos p WHERE p.nombre = :nombre")
    , @NamedQuery(name = "Paralelos.findByEstado", query = "SELECT p FROM Paralelos p WHERE p.estado = :estado")})
public class Paralelos implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_paralelos")
    private Long idParalelos;
    @Column(name = "nombre")
    private String nombre;
    @Column(name = "estado")
    private Character estado;
    @OneToMany(mappedBy = "idParalelo")
    private List<RelCursoParalelo> relCursoParaleloList;

    public Paralelos() {
    }

    public Paralelos(Long idParalelos) {
        this.idParalelos = idParalelos;
    }

    public Long getIdParalelos() {
        return idParalelos;
    }

    public void setIdParalelos(Long idParalelos) {
        this.idParalelos = idParalelos;
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
        hash += (idParalelos != null ? idParalelos.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Paralelos)) {
            return false;
        }
        Paralelos other = (Paralelos) object;
        if ((this.idParalelos == null && other.idParalelos != null) || (this.idParalelos != null && !this.idParalelos.equals(other.idParalelos))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.Paralelos[ idParalelos=" + idParalelos + " ]";
    }
    
}
