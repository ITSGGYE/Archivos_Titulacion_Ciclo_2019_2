package com.tdah_training.modelo;

import java.io.Serializable;

public class Estudiante implements Serializable {
    private String id, nombres, apellidos, sexo, curso, nivel, correo, contrasena;
    private String id_docente, fecha_creacion, fecha_ultima_modificacion;
    private int score;

    public Estudiante() {

    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
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

    public String getSexo() { return sexo;}

    public void setSexo(String sexo) {this.sexo = sexo;}

    public String getCurso() {
        return curso;
    }

    public void setCurso(String curso) { this.curso = curso; }

    public String getId_docente() { return id_docente; }

    public void setId_docente(String id_docente) {
        this.id_docente = id_docente;
    }

    public String getNivel() {
        return nivel;
    }

    public void setNivel(String nivel) {
        this.nivel = nivel;
    }

    public int getScore() {
        return score;
    }

    public void setScore(int score) {
        this.score = score;
    }

    public String getCorreo() {
        return correo;
    }

    public void setCorreo(String correo) {
        this.correo = correo;
    }

    public String getFecha_creacion() {
        return fecha_creacion;
    }

    public void setFecha_creacion(String fecha_creacion) {
        this.fecha_creacion = fecha_creacion;
    }

    public String getFecha_ultima_modificacion() {
        return fecha_ultima_modificacion;
    }

    public void setFecha_ultima_modificacion(String fecha_ultima_modificacion) {
        this.fecha_ultima_modificacion = fecha_ultima_modificacion;
    }

    public String getContrasena() { return contrasena; }

    public void setContrasena(String contrasena) { this.contrasena = contrasena; }

    public void incrementarScore(int valor) {
        this.score = score + valor;
    }

    @Override
    public String toString() {
        return nombres + ' ' + apellidos;
    }

}
