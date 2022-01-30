/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ec.com.academico.dtoJoin;

/**
 *
 * @author Usuario
 * 
 * SELECT m.`id_matricula`,m.`id_estudiante`,es.`nombres`,es.`apellidos`,m.`id_periodo_lectivo`,pl.`periodo`,m.`fecha_registro`,m.`estado`
,m.`id_tipo_matricula`,m.`id_curso`
FROM `matricula` m
INNER JOIN `estudiantes` es ON es.`id_estudiantes`= m.`id_estudiante`
INNER JOIN `periodo_lectivo` pl ON pl.`id_periodo_lectivo` = m.`id_periodo_lectivo`
 */
public class MatriculaJoin {
    private Long id_matricula;
    private Long id_estudiante;
    private String nombres;
    private String apellidos;
    private Long id_periodo_lectivo;
    private String periodo;
    private String fecha_registro;
    private char estado;
    private Long id_tipo_matricula;
    private Long id_curso;
    private String curso;
    private String paralelo;

    public MatriculaJoin() {
    }

    public MatriculaJoin(Long id_matricula, Long id_estudiante, String nombres, String apellidos, Long id_periodo_lectivo, String periodo, String fecha_registro, char estado, Long id_tipo_matricula, Long id_curso, String curso, String paralelo) {
        this.id_matricula = id_matricula;
        this.id_estudiante = id_estudiante;
        this.nombres = nombres;
        this.apellidos = apellidos;
        this.id_periodo_lectivo = id_periodo_lectivo;
        this.periodo = periodo;
        this.fecha_registro = fecha_registro;
        this.estado = estado;
        this.id_tipo_matricula = id_tipo_matricula;
        this.id_curso = id_curso;
        this.curso = curso;
        this.paralelo = paralelo;
    }

    public Long getId_matricula() {
        return id_matricula;
    }

    public void setId_matricula(Long id_matricula) {
        this.id_matricula = id_matricula;
    }

    public Long getId_estudiante() {
        return id_estudiante;
    }

    public void setId_estudiante(Long id_estudiante) {
        this.id_estudiante = id_estudiante;
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

    public Long getId_periodo_lectivo() {
        return id_periodo_lectivo;
    }

    public void setId_periodo_lectivo(Long id_periodo_lectivo) {
        this.id_periodo_lectivo = id_periodo_lectivo;
    }

    public String getPeriodo() {
        return periodo;
    }

    public void setPeriodo(String periodo) {
        this.periodo = periodo;
    }

    public String getFecha_registro() {
        return fecha_registro;
    }

    public void setFecha_registro(String fecha_registro) {
        this.fecha_registro = fecha_registro;
    }

    public char getEstado() {
        return estado;
    }

    public void setEstado(char estado) {
        this.estado = estado;
    }

    public Long getId_tipo_matricula() {
        return id_tipo_matricula;
    }

    public void setId_tipo_matricula(Long id_tipo_matricula) {
        this.id_tipo_matricula = id_tipo_matricula;
    }

    public Long getId_curso() {
        return id_curso;
    }

    public void setId_curso(Long id_curso) {
        this.id_curso = id_curso;
    }

    public String getCurso() {
        return curso;
    }

    public void setCurso(String curso) {
        this.curso = curso;
    }

    public String getParalelo() {
        return paralelo;
    }

    public void setParalelo(String paralelo) {
        this.paralelo = paralelo;
    }

}
