/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dto;

import java.io.Serializable;
import java.math.BigInteger;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Lob;
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
@Table(name = "representante")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Representante.findAll", query = "SELECT r FROM Representante r")
    , @NamedQuery(name = "Representante.findByIdRepresentante", query = "SELECT r FROM Representante r WHERE r.idRepresentante = :idRepresentante")
    , @NamedQuery(name = "Representante.findByIdentificacion", query = "SELECT r FROM Representante r WHERE r.identificacion = :identificacion")
    , @NamedQuery(name = "Representante.findByIdTipoIdentificacion", query = "SELECT r FROM Representante r WHERE r.idTipoIdentificacion = :idTipoIdentificacion")
    , @NamedQuery(name = "Representante.findByNombres", query = "SELECT r FROM Representante r WHERE r.nombres = :nombres")
    , @NamedQuery(name = "Representante.findByApellidos", query = "SELECT r FROM Representante r WHERE r.apellidos = :apellidos")
    , @NamedQuery(name = "Representante.findByTelefono", query = "SELECT r FROM Representante r WHERE r.telefono = :telefono")
    , @NamedQuery(name = "Representante.findByCelular", query = "SELECT r FROM Representante r WHERE r.celular = :celular")
    , @NamedQuery(name = "Representante.findByCorreo", query = "SELECT r FROM Representante r WHERE r.correo = :correo")
    , @NamedQuery(name = "Representante.findByDireccion", query = "SELECT r FROM Representante r WHERE r.direccion = :direccion")
    , @NamedQuery(name = "Representante.findByEstado", query = "SELECT r FROM Representante r WHERE r.estado = :estado")})
public class Representante implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_representante")
    private Long idRepresentante;
    @Column(name = "identificacion")
    private String identificacion;
    @Column(name = "id_tipo_identificacion")
    private BigInteger idTipoIdentificacion;
    @Column(name = "nombres")
    private String nombres;
    @Column(name = "apellidos")
    private String apellidos;
    @Column(name = "telefono")
    private String telefono;
    @Column(name = "celular")
    private String celular;
    @Column(name = "correo")
    private String correo;
    @Column(name = "direccion")
    private String direccion;
    @Column(name = "estado")
    private Character estado;
    @Lob
    @Column(name = "ruta_imagen_carnet")
    private String rutaImagenCarnet;
    @OneToMany(mappedBy = "idRepresentante")
    private List<Estudiantes> estudiantesList;

    public Representante() {
    }

    public Representante(Long idRepresentante) {
        this.idRepresentante = idRepresentante;
    }

    public Long getIdRepresentante() {
        return idRepresentante;
    }

    public void setIdRepresentante(Long idRepresentante) {
        this.idRepresentante = idRepresentante;
    }

    public String getIdentificacion() {
        return identificacion;
    }

    public void setIdentificacion(String identificacion) {
        this.identificacion = identificacion;
    }

    public BigInteger getIdTipoIdentificacion() {
        return idTipoIdentificacion;
    }

    public void setIdTipoIdentificacion(BigInteger idTipoIdentificacion) {
        this.idTipoIdentificacion = idTipoIdentificacion;
    }

    public String getNombres() {
        return nombres;
    }

    public void setNombres(String nombres) {
        this.nombres = nombres;
    }

    public String getApellidos() {
        return apellidos;
    }

    public void setApellidos(String apellidos) {
        this.apellidos = apellidos;
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

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        this.direccion = direccion;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    public String getRutaImagenCarnet() {
        return rutaImagenCarnet;
    }

    public void setRutaImagenCarnet(String rutaImagenCarnet) {
        this.rutaImagenCarnet = rutaImagenCarnet;
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
        hash += (idRepresentante != null ? idRepresentante.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Representante)) {
            return false;
        }
        Representante other = (Representante) object;
        if ((this.idRepresentante == null && other.idRepresentante != null) || (this.idRepresentante != null && !this.idRepresentante.equals(other.idRepresentante))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.Representante[ idRepresentante=" + idRepresentante + " ]";
    }
    
}
