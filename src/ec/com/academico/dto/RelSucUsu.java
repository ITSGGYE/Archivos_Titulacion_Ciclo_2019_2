/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dto;

import java.io.Serializable;
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
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Usuario
 */
@Entity
@Table(name = "rel_suc_usu")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "RelSucUsu.findAll", query = "SELECT r FROM RelSucUsu r")
    , @NamedQuery(name = "RelSucUsu.findByIdRelSucUsu", query = "SELECT r FROM RelSucUsu r WHERE r.idRelSucUsu = :idRelSucUsu")})
public class RelSucUsu implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_rel_suc_usu")
    private Long idRelSucUsu;
    @JoinColumn(name = "id_usuario", referencedColumnName = "id_usuario")
    @ManyToOne
    private Usuarios idUsuario;
    @JoinColumn(name = "id_sucursal", referencedColumnName = "id_sucursal")
    @ManyToOne
    private Sucursal idSucursal;

    public RelSucUsu() {
    }

    public RelSucUsu(Long idRelSucUsu) {
        this.idRelSucUsu = idRelSucUsu;
    }

    public Long getIdRelSucUsu() {
        return idRelSucUsu;
    }

    public void setIdRelSucUsu(Long idRelSucUsu) {
        this.idRelSucUsu = idRelSucUsu;
    }

    public Usuarios getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(Usuarios idUsuario) {
        this.idUsuario = idUsuario;
    }

    public Sucursal getIdSucursal() {
        return idSucursal;
    }

    public void setIdSucursal(Sucursal idSucursal) {
        this.idSucursal = idSucursal;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idRelSucUsu != null ? idRelSucUsu.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof RelSucUsu)) {
            return false;
        }
        RelSucUsu other = (RelSucUsu) object;
        if ((this.idRelSucUsu == null && other.idRelSucUsu != null) || (this.idRelSucUsu != null && !this.idRelSucUsu.equals(other.idRelSucUsu))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.RelSucUsu[ idRelSucUsu=" + idRelSucUsu + " ]";
    }
    
}
