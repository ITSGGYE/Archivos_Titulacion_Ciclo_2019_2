/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dto;

import java.io.Serializable;
import java.util.Date;
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
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

/**
 *
 * @author Usuario
 */
@Entity
@Table(name = "matricula")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Matricula.findAll", query = "SELECT m FROM Matricula m")
    , @NamedQuery(name = "Matricula.findByIdMatricula", query = "SELECT m FROM Matricula m WHERE m.idMatricula = :idMatricula")
    , @NamedQuery(name = "Matricula.findByFechaRegistro", query = "SELECT m FROM Matricula m WHERE m.fechaRegistro = :fechaRegistro")
    , @NamedQuery(name = "Matricula.findByEstado", query = "SELECT m FROM Matricula m WHERE m.estado = :estado")
    , @NamedQuery(name = "Matricula.findByMotivoEstado", query = "SELECT m FROM Matricula m WHERE m.motivoEstado = :motivoEstado")})
public class Matricula implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id_matricula")
    private Long idMatricula;
    @Column(name = "fecha_registro")
    @Temporal(TemporalType.TIMESTAMP)
    private Date fechaRegistro;
    @Column(name = "estado")
    private Character estado;
    @Column(name = "motivo_estado")
    private String motivoEstado;
    @JoinColumn(name = "id_estudiante", referencedColumnName = "id_estudiantes")
    @ManyToOne
    private Estudiantes idEstudiante;
    @JoinColumn(name = "id_periodo_lectivo", referencedColumnName = "id_periodo_lectivo")
    @ManyToOne
    private PeriodoLectivo idPeriodoLectivo;
    @JoinColumn(name = "id_tipo_matricula", referencedColumnName = "id_tipo_matricula")
    @ManyToOne
    private TipoMatricula idTipoMatricula;
    @JoinColumn(name = "id_curso", referencedColumnName = "id_rel_curso_paralelo")
    @ManyToOne
    private RelCursoParalelo idCurso;
    @OneToMany(mappedBy = "idMatricula")
    private List<RelMatriDoc> relMatriDocList;

    public Matricula() {
    }

    public Matricula(Long idMatricula) {
        this.idMatricula = idMatricula;
    }

    public Long getIdMatricula() {
        return idMatricula;
    }

    public void setIdMatricula(Long idMatricula) {
        this.idMatricula = idMatricula;
    }

    public Date getFechaRegistro() {
        return fechaRegistro;
    }

    public void setFechaRegistro(Date fechaRegistro) {
        this.fechaRegistro = fechaRegistro;
    }

    public Character getEstado() {
        return estado;
    }

    public void setEstado(Character estado) {
        this.estado = estado;
    }

    public String getMotivoEstado() {
        return motivoEstado;
    }

    public void setMotivoEstado(String motivoEstado) {
        this.motivoEstado = motivoEstado;
    }

    public Estudiantes getIdEstudiante() {
        return idEstudiante;
    }

    public void setIdEstudiante(Estudiantes idEstudiante) {
        this.idEstudiante = idEstudiante;
    }

    public PeriodoLectivo getIdPeriodoLectivo() {
        return idPeriodoLectivo;
    }

    public void setIdPeriodoLectivo(PeriodoLectivo idPeriodoLectivo) {
        this.idPeriodoLectivo = idPeriodoLectivo;
    }

    public TipoMatricula getIdTipoMatricula() {
        return idTipoMatricula;
    }

    public void setIdTipoMatricula(TipoMatricula idTipoMatricula) {
        this.idTipoMatricula = idTipoMatricula;
    }

    public RelCursoParalelo getIdCurso() {
        return idCurso;
    }

    public void setIdCurso(RelCursoParalelo idCurso) {
        this.idCurso = idCurso;
    }

    @XmlTransient
    public List<RelMatriDoc> getRelMatriDocList() {
        return relMatriDocList;
    }

    public void setRelMatriDocList(List<RelMatriDoc> relMatriDocList) {
        this.relMatriDocList = relMatriDocList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idMatricula != null ? idMatricula.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Matricula)) {
            return false;
        }
        Matricula other = (Matricula) object;
        if ((this.idMatricula == null && other.idMatricula != null) || (this.idMatricula != null && !this.idMatricula.equals(other.idMatricula))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "ec.com.academico.dto.Matricula[ idMatricula=" + idMatricula + " ]";
    }
    
}
