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
@Table(name = "se_contacto_estudiante")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "SeContactoEstudiante.findAll", query = "SELECT s FROM SeContactoEstudiante s")
    , @NamedQuery(name = "SeContactoEstudiante.findByIdContactoEstudiante", query = "SELECT s FROM SeContactoEstudiante s WHERE s.idContactoEstudiante = :idContactoEstudiante")
    , @NamedQuery(name = "SeContactoEstudiante.findByNombreCompleto", query = "SELECT s FROM SeContactoEstudiante s WHERE s.nombreCompleto = :nombreCompleto")
    , @NamedQuery(name = "SeContactoEstudiante.findByRelacion", query = "SELECT s FROM SeContactoEstudiante s WHERE s.relacion = :relacion")
    , @NamedQuery(name = "SeContactoEstudiante.findByEmail", query = "SELECT s FROM SeContactoEstudiante s WHERE s.email = :email")
    , @NamedQuery(name = "SeContactoEstudiante.findByTelefono", query = "SELECT s FROM SeContactoEstudiante s WHERE s.telefono = :telefono")
    , @NamedQuery(name = "SeContactoEstudiante.findByCelular", query = "SELECT s FROM SeContactoEstudiante s WHERE s.celular = :celular")
    , @NamedQuery(name = "SeContactoEstudiante.findByDireccionDomiciliaria", query = "SELECT s FROM SeContactoEstudiante s WHERE s.direccionDomiciliaria = :direccionDomiciliaria")
    , @NamedQuery(name = "SeContactoEstudiante.findByEstado", query = "SELECT s FROM SeContactoEstudiante s WHERE s.estado = :estado")})
public class SeContactoEstudiante implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_contacto_estudiante")
    private Long idContactoEstudiante;
    @Column(name = "nombre_completo")
    private String nombreCompleto;
    @Column(name = "relacion")
    private String relacion;
    @Column(name = "email")
    private String email;
    @Column(name = "telefono")
    private String telefono;
    @Column(name = "celular")
    private String celular;
    @Column(name = "direccion_domiciliaria")
    private String direccionDomiciliaria;
    @Column(name = "estado")
    private Character estado;
    @JoinColumn(name = "id_estudiante", referencedColumnName = "id_estudiantes")
    @ManyToOne
    private Estudiantes idEstudiante;

    public SeContactoEstudiante() {
    }

    public SeContactoEstudiante(Long idContactoEstudiante) {
        this.idContactoEstudiante = idContactoEstudiante;
    }

    public Long getIdContactoEstudiante() {
        return idContactoEstudiante;
    }

    public void setIdContactoEstudiante(Long idContactoEstudiante) {
        this.idContactoEstudiante = idContactoEstudiante;
    }

    public String getNombreCompleto() {
        return nombreCompleto;
    }

    public void setNombreCompleto(String nombreCompleto) {
        this.nombreCompleto = nombreCompleto;
    }

    public String getRelacion() {
        return relacion;
    }

    public void setRelacion(String relacion) {
        this.relacion = relacion;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getTelefono() {
        return telefono;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

    public String getCelular() {
        return celular;
    }

    public void setCelular(String celular) {
        this.celular = celular;
    }

    public String getDireccionDomiciliaria() {
        return direccionDomiciliaria;
    }

    public void setDireccionDomiciliaria(String direccionDomiciliaria) {
        this.direccionDomiciliaria = direccionDomiciliaria;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    public Estudiantes getIdEstudiante() {
        return idEstudiante;
    }

    public void setIdEstudiante(Estudiantes idEstudiante) {
        this.idEstudiante = idEstudiante;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idContactoEstudiante != null ? idContactoEstudiante.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof SeContactoEstudiante)) {
            return false;
        }
        SeContactoEstudiante other = (SeContactoEstudiante) object;
        if ((this.idContactoEstudiante == null && other.idContactoEstudiante != null) || (this.idContactoEstudiante != null && !this.idContactoEstudiante.equals(other.idContactoEstudiante))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.SeContactoEstudiante[ idContactoEstudiante=" + idContactoEstudiante + " ]";
    }
    
}
