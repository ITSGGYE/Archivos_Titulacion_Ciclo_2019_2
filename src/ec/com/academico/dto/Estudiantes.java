/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dto;

import java.io.Serializable;
import java.math.BigInteger;
import java.util.Date;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.Lob;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

/**
 *
 * @author Usuario
 */
@Entity
@Table(name = "estudiantes")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Estudiantes.findAll", query = "SELECT e FROM Estudiantes e")
    , @NamedQuery(name = "Estudiantes.findByIdEstudiantes", query = "SELECT e FROM Estudiantes e WHERE e.idEstudiantes = :idEstudiantes")
    , @NamedQuery(name = "Estudiantes.findByIdentificacion", query = "SELECT e FROM Estudiantes e WHERE e.identificacion = :identificacion")
    , @NamedQuery(name = "Estudiantes.findByNombres", query = "SELECT e FROM Estudiantes e WHERE e.nombres = :nombres")
    , @NamedQuery(name = "Estudiantes.findByApellidos", query = "SELECT e FROM Estudiantes e WHERE e.apellidos = :apellidos")
    , @NamedQuery(name = "Estudiantes.findByFechaNacimiento", query = "SELECT e FROM Estudiantes e WHERE e.fechaNacimiento = :fechaNacimiento")
    , @NamedQuery(name = "Estudiantes.findBySexo", query = "SELECT e FROM Estudiantes e WHERE e.sexo = :sexo")
    , @NamedQuery(name = "Estudiantes.findByDiscapacidad", query = "SELECT e FROM Estudiantes e WHERE e.discapacidad = :discapacidad")
    , @NamedQuery(name = "Estudiantes.findByIdTipoIdentificacion", query = "SELECT e FROM Estudiantes e WHERE e.idTipoIdentificacion = :idTipoIdentificacion")
    , @NamedQuery(name = "Estudiantes.findByDireccionDomiciliaria", query = "SELECT e FROM Estudiantes e WHERE e.direccionDomiciliaria = :direccionDomiciliaria")
    , @NamedQuery(name = "Estudiantes.findByEstado", query = "SELECT e FROM Estudiantes e WHERE e.estado = :estado")})
public class Estudiantes implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_estudiantes")
    private Long idEstudiantes;
    @Column(name = "identificacion")
    private String identificacion;
    @Column(name = "nombres")
    private String nombres;
    @Column(name = "apellidos")
    private String apellidos;
    @Column(name = "fecha_nacimiento")
    @Temporal(TemporalType.DATE)
    private Date fechaNacimiento;
    @Column(name = "sexo")
    private Character sexo;
    @Column(name = "discapacidad")
    private String discapacidad;
    @Column(name = "id_tipo_identificacion")
    private BigInteger idTipoIdentificacion;
    @Column(name = "direccion_domiciliaria")
    private String direccionDomiciliaria;
    @Column(name = "estado")
    private Character estado;
    @Lob
    @Column(name = "ruta_imagen_carnet")
    private String rutaImagenCarnet;
    @OneToMany(mappedBy = "idEstudiante")
    private List<SeContactoEstudiante> seContactoEstudianteList;
    @JoinColumn(name = "id_representante", referencedColumnName = "id_representante")
    @ManyToOne
    private Representante idRepresentante;
    @JoinColumn(name = "id_parentesco", referencedColumnName = "id_parentesco")
    @ManyToOne
    private Parentesco idParentesco;
    @OneToMany(mappedBy = "idEstudiante")
    private List<Matricula> matriculaList;

    public Estudiantes() {
    }

    public Estudiantes(Long idEstudiantes) {
        this.idEstudiantes = idEstudiantes;
    }

    public Long getIdEstudiantes() {
        return idEstudiantes;
    }

    public void setIdEstudiantes(Long idEstudiantes) {
        this.idEstudiantes = idEstudiantes;
    }

    public String getIdentificacion() {
        return identificacion;
    }

    public void setIdentificacion(String identificacion) {
        this.identificacion = identificacion;
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

    public Date getFechaNacimiento() {
        return fechaNacimiento;
    }

    public void setFechaNacimiento(Date fechaNacimiento) {
        this.fechaNacimiento = fechaNacimiento;
    }

    public Character getSexo() {
        return sexo;
    }

    public void setSexo(Character sexo) {
        this.sexo = sexo;
    }

    public String getDiscapacidad() {
        return discapacidad;
    }

    public void setDiscapacidad(String discapacidad) {
        this.discapacidad = discapacidad;
    }

    public BigInteger getIdTipoIdentificacion() {
        return idTipoIdentificacion;
    }

    public void setIdTipoIdentificacion(BigInteger idTipoIdentificacion) {
        this.idTipoIdentificacion = idTipoIdentificacion;
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

    public String getRutaImagenCarnet() {
        return rutaImagenCarnet;
    }

    public void setRutaImagenCarnet(String rutaImagenCarnet) {
        this.rutaImagenCarnet = rutaImagenCarnet;
    }

    @XmlTransient
    public List<SeContactoEstudiante> getSeContactoEstudianteList() {
        return seContactoEstudianteList;
    }

    public void setSeContactoEstudianteList(List<SeContactoEstudiante> seContactoEstudianteList) {
        this.seContactoEstudianteList = seContactoEstudianteList;
    }

    public Representante getIdRepresentante() {
        return idRepresentante;
    }

    public void setIdRepresentante(Representante idRepresentante) {
        this.idRepresentante = idRepresentante;
    }

    public Parentesco getIdParentesco() {
        return idParentesco;
    }

    public void setIdParentesco(Parentesco idParentesco) {
        this.idParentesco = idParentesco;
    }

    @XmlTransient
    public List<Matricula> getMatriculaList() {
        return matriculaList;
    }

    public void setMatriculaList(List<Matricula> matriculaList) {
        this.matriculaList = matriculaList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idEstudiantes != null ? idEstudiantes.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Estudiantes)) {
            return false;
        }
        Estudiantes other = (Estudiantes) object;
        if ((this.idEstudiantes == null && other.idEstudiantes != null) || (this.idEstudiantes != null && !this.idEstudiantes.equals(other.idEstudiantes))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.Estudiantes[ idEstudiantes=" + idEstudiantes + " ]";
    }
    
}
