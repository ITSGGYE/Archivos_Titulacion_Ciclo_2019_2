/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dto;

import java.io.Serializable;
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
@Table(name = "rel_usuario_roles")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "RelUsuarioRoles.findAll", query = "SELECT r FROM RelUsuarioRoles r")
    , @NamedQuery(name = "RelUsuarioRoles.findByIdUsuRol", query = "SELECT r FROM RelUsuarioRoles r WHERE r.idUsuRol = :idUsuRol")
    , @NamedQuery(name = "RelUsuarioRoles.findByFechaCreacion", query = "SELECT r FROM RelUsuarioRoles r WHERE r.fechaCreacion = :fechaCreacion")
    , @NamedQuery(name = "RelUsuarioRoles.findByUsuario", query = "SELECT r FROM RelUsuarioRoles r WHERE r.usuario = :usuario")
    , @NamedQuery(name = "RelUsuarioRoles.findByContrase\u00f1a", query = "SELECT r FROM RelUsuarioRoles r WHERE r.contrase\u00f1a = :contrase\u00f1a")
    , @NamedQuery(name = "RelUsuarioRoles.findByEstado", query = "SELECT r FROM RelUsuarioRoles r WHERE r.estado = :estado")})
public class RelUsuarioRoles implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_usu_rol")
    private Long idUsuRol;
    @Column(name = "fecha_creacion")
    @Temporal(TemporalType.DATE)
    private Date fechaCreacion;
    @Column(name = "usuario")
    private String usuario;
    @Column(name = "contrase\u00f1a")
    private String contraseña;
    @Column(name = "estado")
    private Character estado;
    @JoinColumn(name = "id_rol", referencedColumnName = "id_roles")
    @ManyToOne
    private Roles idRol;
    @JoinColumn(name = "id_usuario", referencedColumnName = "id_usuario")
    @ManyToOne
    private Usuarios idUsuario;

    public RelUsuarioRoles() {
    }

    public RelUsuarioRoles(Long idUsuRol) {
        this.idUsuRol = idUsuRol;
    }

    public Long getIdUsuRol() {
        return idUsuRol;
    }

    public void setIdUsuRol(Long idUsuRol) {
        this.idUsuRol = idUsuRol;
    }

    public Date getFechaCreacion() {
        return fechaCreacion;
    }

    public void setFechaCreacion(Date fechaCreacion) {
        this.fechaCreacion = fechaCreacion;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public String getContraseña() {
        return contraseña;
    }

    public void setContraseña(String contraseña) {
        this.contraseña = contraseña;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    public Roles getIdRol() {
        return idRol;
    }

    public void setIdRol(Roles idRol) {
        this.idRol = idRol;
    }

    public Usuarios getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(Usuarios idUsuario) {
        this.idUsuario = idUsuario;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idUsuRol != null ? idUsuRol.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof RelUsuarioRoles)) {
            return false;
        }
        RelUsuarioRoles other = (RelUsuarioRoles) object;
        if ((this.idUsuRol == null && other.idUsuRol != null) || (this.idUsuRol != null && !this.idUsuRol.equals(other.idUsuRol))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.RelUsuarioRoles[ idUsuRol=" + idUsuRol + " ]";
    }
    
}
