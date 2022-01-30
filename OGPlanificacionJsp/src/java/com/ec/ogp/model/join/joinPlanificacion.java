/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.model.join;

/**
 *
 * @author carlos
 */
public class joinPlanificacion {

    private Long id_planificacion_union;
    private Long id_usuario;
    private Long id_materia;
    private Long id_paralelo;
    private Long id_periodo;
    private Long id_planificacion;
    private Long id_objetivo;
    private String u_creacion;
    private String f_creacion;
    private String u_actualizacion;
    private String f_actualizacion;
    private String estado_pla_union;
    private String fecha;
    private String observacion;
    private String hora;
    private String objetivo_unidad;
    private String criterio_evaluacion;
    private String destresa_criterio_desempeno;
    private String actividades_aprendizaje;
    private String recursos;
    private String tecnicas_instrumentos_evaluacion;
    private String especificaciones_unidad_educativa;
    private String especificaciones_adaptacion_aplicada;
    private String revisado;
    private String aprovado;
    private String materia;
    private String paralelo;
    private String periodo;
    private String objetivos;
    private String descripcion;
    private String usuario;
    private Long id_rol;
    private String rol;
    private Long id_registro;
    private String apellidos_nombres;
    private Long id_sucursal;
    private String nombre_comercial_su;
    private String evaluacion_unidad;

    public joinPlanificacion() {
    }

    public joinPlanificacion(Long id_planificacion_union, Long id_usuario, Long id_materia, Long id_paralelo, Long id_periodo, Long id_planificacion, Long id_objetivo, String u_creacion, String f_creacion, String u_actualizacion, String f_actualizacion, String estado_pla_union, String fecha, String observacion, String hora, String objetivo_unidad, String criterio_evaluacion, String destresa_criterio_desempeno, String actividades_aprendizaje, String recursos, String tecnicas_instrumentos_evaluacion, String especificaciones_unidad_educativa, String especificaciones_adaptacion_aplicada, String revisado, String aprovado, String materia, String paralelo, String periodo, String objetivos, String descripcion, String usuario, Long id_rol, String rol, Long id_registro, String apellidos_nombres, Long id_sucursal, String nombre_comercial_su, String evaluacion_unidad) {
        this.id_planificacion_union = id_planificacion_union;
        this.id_usuario = id_usuario;
        this.id_materia = id_materia;
        this.id_paralelo = id_paralelo;
        this.id_periodo = id_periodo;
        this.id_planificacion = id_planificacion;
        this.id_objetivo = id_objetivo;
        this.u_creacion = u_creacion;
        this.f_creacion = f_creacion;
        this.u_actualizacion = u_actualizacion;
        this.f_actualizacion = f_actualizacion;
        this.estado_pla_union = estado_pla_union;
        this.fecha = fecha;
        this.observacion = observacion;
        this.hora = hora;
        this.objetivo_unidad = objetivo_unidad;
        this.criterio_evaluacion = criterio_evaluacion;
        this.destresa_criterio_desempeno = destresa_criterio_desempeno;
        this.actividades_aprendizaje = actividades_aprendizaje;
        this.recursos = recursos;
        this.tecnicas_instrumentos_evaluacion = tecnicas_instrumentos_evaluacion;
        this.especificaciones_unidad_educativa = especificaciones_unidad_educativa;
        this.especificaciones_adaptacion_aplicada = especificaciones_adaptacion_aplicada;
        this.revisado = revisado;
        this.aprovado = aprovado;
        this.materia = materia;
        this.paralelo = paralelo;
        this.periodo = periodo;
        this.objetivos = objetivos;
        this.descripcion = descripcion;
        this.usuario = usuario;
        this.id_rol = id_rol;
        this.rol = rol;
        this.id_registro = id_registro;
        this.apellidos_nombres = apellidos_nombres;
        this.id_sucursal = id_sucursal;
        this.nombre_comercial_su = nombre_comercial_su;
        this.evaluacion_unidad = evaluacion_unidad;
    }

    public String getEvaluacion_unidad() {
        return evaluacion_unidad;
    }

    public void setEvaluacion_unidad(String evaluacion_unidad) {
        this.evaluacion_unidad = evaluacion_unidad;
    }

    public Long getId_planificacion_union() {
        return id_planificacion_union;
    }

    public void setId_planificacion_union(Long id_planificacion_union) {
        this.id_planificacion_union = id_planificacion_union;
    }

    public Long getId_usuario() {
        return id_usuario;
    }

    public void setId_usuario(Long id_usuario) {
        this.id_usuario = id_usuario;
    }

    public Long getId_materia() {
        return id_materia;
    }

    public void setId_materia(Long id_materia) {
        this.id_materia = id_materia;
    }

    public Long getId_paralelo() {
        return id_paralelo;
    }

    public void setId_paralelo(Long id_paralelo) {
        this.id_paralelo = id_paralelo;
    }

    public Long getId_periodo() {
        return id_periodo;
    }

    public void setId_periodo(Long id_periodo) {
        this.id_periodo = id_periodo;
    }

    public Long getId_planificacion() {
        return id_planificacion;
    }

    public void setId_planificacion(Long id_planificacion) {
        this.id_planificacion = id_planificacion;
    }

    public Long getId_objetivo() {
        return id_objetivo;
    }

    public void setId_objetivo(Long id_objetivo) {
        this.id_objetivo = id_objetivo;
    }

    public String getU_creacion() {
        return u_creacion;
    }

    public void setU_creacion(String u_creacion) {
        this.u_creacion = u_creacion;
    }

    public String getF_creacion() {
        return f_creacion;
    }

    public void setF_creacion(String f_creacion) {
        this.f_creacion = f_creacion;
    }

    public String getU_actualizacion() {
        return u_actualizacion;
    }

    public void setU_actualizacion(String u_actualizacion) {
        this.u_actualizacion = u_actualizacion;
    }

    public String getF_actualizacion() {
        return f_actualizacion;
    }

    public void setF_actualizacion(String f_actualizacion) {
        this.f_actualizacion = f_actualizacion;
    }

    public String getEstado_pla_union() {
        return estado_pla_union;
    }

    public void setEstado_pla_union(String estado_pla_union) {
        this.estado_pla_union = estado_pla_union;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public String getObservacion() {
        return observacion;
    }

    public void setObservacion(String observacion) {
        this.observacion = observacion;
    }

    public String getHora() {
        return hora;
    }

    public void setHora(String hora) {
        this.hora = hora;
    }

    public String getObjetivo_unidad() {
        return objetivo_unidad;
    }

    public void setObjetivo_unidad(String objetivo_unidad) {
        this.objetivo_unidad = objetivo_unidad;
    }

    public String getCriterio_evaluacion() {
        return criterio_evaluacion;
    }

    public void setCriterio_evaluacion(String criterio_evaluacion) {
        this.criterio_evaluacion = criterio_evaluacion;
    }

    public String getDestresa_criterio_desempeno() {
        return destresa_criterio_desempeno;
    }

    public void setDestresa_criterio_desempeno(String destresa_criterio_desempeno) {
        this.destresa_criterio_desempeno = destresa_criterio_desempeno;
    }

    public String getActividades_aprendizaje() {
        return actividades_aprendizaje;
    }

    public void setActividades_aprendizaje(String actividades_aprendizaje) {
        this.actividades_aprendizaje = actividades_aprendizaje;
    }

    public String getRecursos() {
        return recursos;
    }

    public void setRecursos(String recursos) {
        this.recursos = recursos;
    }

    public String getTecnicas_instrumentos_evaluacion() {
        return tecnicas_instrumentos_evaluacion;
    }

    public void setTecnicas_instrumentos_evaluacion(String tecnicas_instrumentos_evaluacion) {
        this.tecnicas_instrumentos_evaluacion = tecnicas_instrumentos_evaluacion;
    }

    public String getEspecificaciones_unidad_educativa() {
        return especificaciones_unidad_educativa;
    }

    public void setEspecificaciones_unidad_educativa(String especificaciones_unidad_educativa) {
        this.especificaciones_unidad_educativa = especificaciones_unidad_educativa;
    }

    public String getEspecificaciones_adaptacion_aplicada() {
        return especificaciones_adaptacion_aplicada;
    }

    public void setEspecificaciones_adaptacion_aplicada(String especificaciones_adaptacion_aplicada) {
        this.especificaciones_adaptacion_aplicada = especificaciones_adaptacion_aplicada;
    }

    public String getRevisado() {
        return revisado;
    }

    public void setRevisado(String revisado) {
        this.revisado = revisado;
    }

    public String getAprovado() {
        return aprovado;
    }

    public void setAprovado(String aprovado) {
        this.aprovado = aprovado;
    }

    public String getMateria() {
        return materia;
    }

    public void setMateria(String materia) {
        this.materia = materia;
    }

    public String getParalelo() {
        return paralelo;
    }

    public void setParalelo(String paralelo) {
        this.paralelo = paralelo;
    }

    public String getPeriodo() {
        return periodo;
    }

    public void setPeriodo(String periodo) {
        this.periodo = periodo;
    }

    public String getObjetivos() {
        return objetivos;
    }

    public void setObjetivos(String objetivos) {
        this.objetivos = objetivos;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public Long getId_rol() {
        return id_rol;
    }

    public void setId_rol(Long id_rol) {
        this.id_rol = id_rol;
    }

    public String getRol() {
        return rol;
    }

    public void setRol(String rol) {
        this.rol = rol;
    }

    public Long getId_registro() {
        return id_registro;
    }

    public void setId_registro(Long id_registro) {
        this.id_registro = id_registro;
    }

    public String getApellidos_nombres() {
        return apellidos_nombres;
    }

    public void setApellidos_nombres(String apellidos_nombres) {
        this.apellidos_nombres = apellidos_nombres;
    }

    public Long getId_sucursal() {
        return id_sucursal;
    }

    public void setId_sucursal(Long id_sucursal) {
        this.id_sucursal = id_sucursal;
    }

    public String getNombre_comercial_su() {
        return nombre_comercial_su;
    }

    public void setNombre_comercial_su(String nombre_comercial_su) {
        this.nombre_comercial_su = nombre_comercial_su;
    }

}
