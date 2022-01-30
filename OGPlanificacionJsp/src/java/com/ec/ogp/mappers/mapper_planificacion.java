/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.mappers;

import com.ec.ogp.model.ca_materia;
import com.ec.ogp.model.join.JoinMaterias;
import com.ec.ogp.model.join.joinPlanificacion;
import com.ec.ogp.model.join.us_empleados_join;
import com.ec.ogp.model.ma_periodo;
import com.ec.ogp.model.pla_planificacion_vista;
import com.ec.ogp.model.us_permiso_curso;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class mapper_planificacion {
    public static pla_planificacion_vista getCursosFromResultSet(ResultSet rs) {
        pla_planificacion_vista obj = new pla_planificacion_vista();
        try {
            obj.setEstado(rs.getString("estado"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setFecha(rs.getString("fecha"));
            obj.setId_objetivo(rs.getLong("id_objetivo"));
            obj.setId_pla_vista(rs.getLong("id_pla_vista"));
            obj.setN_formulario_vista(rs.getString("n_formulario_vista"));
            obj.setU_actualizacion(rs.getString("u_actualizacion"));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setObjetivos(rs.getString("objetivos"));
            obj.setObservacion(rs.getString("observacion"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static us_empleados_join getEmpleadosTodoFromResultSet(ResultSet rs) {
        us_empleados_join obj = new us_empleados_join();
        try {
            obj.setId_usuario(rs.getLong("Id_usuario"));
            obj.setApellidos_nombres(rs.getString("Apellidos_nombres"));
            obj.setCedula(rs.getString("Cedula"));
            obj.setContrasena(rs.getString("Contrasena"));
            obj.setConvecional(rs.getString("Convecional"));
            obj.setCopia_cedula(rs.getLong("Copia_cedula"));
            obj.setCorreo(rs.getString("Correo"));
            obj.setDireccion(rs.getString("Direccion"));
            obj.setEstado(rs.getString("Estado"));
            obj.setFecha_nacimiento(rs.getString("Fecha_nacimiento"));
            obj.setId_rol(rs.getLong("Id_rol"));
            obj.setRol(rs.getString("Rol"));
            obj.setServicio_basico(rs.getLong("Servicio_basico"));
            obj.setTelefono_dos(rs.getString("Telefono_dos"));
            obj.setCopia_titulo(rs.getLong("Copia_titulo"));
            obj.setObservacion(rs.getString("Observacion"));
            obj.setUsuario(rs.getString("Usuario"));
            obj.setId_empresa(rs.getLong("Id_empresa"));
            obj.setNombre_comercial_em(rs.getString("Nombre_comercial_em"));
            obj.setRuc_em(rs.getString("ruc_em"));
            obj.setTelefono_em(rs.getString("telefono_em"));
            obj.setDireccion_em(rs.getString("direccion_em"));
            obj.setCorreo_em(rs.getString("correo_em"));
            obj.setEstado_em(rs.getString("estado_em"));
            obj.setId_sucursal(rs.getLong("id_sucursal"));
            obj.setNombre_comercial_su(rs.getString("nombre_comercial_su"));
            obj.setTelefono_su(rs.getString("telefono_su"));
            obj.setDireccion_su(rs.getString("direccion_su"));
            obj.setCorreo_su(rs.getString("correo_su"));
            obj.setEstado_su(rs.getString("estado_su"));
            obj.setCanton(rs.getString("Canton"));
            obj.setProvincia(rs.getString("Provincia"));
            obj.setProvincia_suc(rs.getString("Provincia_suc"));
            obj.setCanton_suc(rs.getString("Canton_suc"));
            obj.setJornada(rs.getString("Jornada"));
            obj.setDistrito(rs.getString("Distrito"));
            obj.setCircuito(rs.getString("Circuito"));
            obj.setZona(rs.getString("Zona"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static us_empleados_join getEmpleadosFromResultSet(ResultSet rs) {
        us_empleados_join obj = new us_empleados_join();
        try {
            obj.setId_usuario(rs.getLong("Id_usuario"));
            obj.setApellidos_nombres(rs.getString("Apellidos_nombres"));
            obj.setCedula(rs.getString("Cedula"));
            obj.setCorreo(rs.getString("Correo"));
            obj.setId_rol(rs.getLong("Id_rol"));
            obj.setRol(rs.getString("Rol"));
            obj.setUsuario(rs.getString("Usuario"));
            obj.setId_empresa(rs.getLong("Id_empresa"));
            obj.setNombre_comercial_em(rs.getString("Nombre_comercial_em"));
            obj.setRuc_em(rs.getString("ruc_em"));
            obj.setId_sucursal(rs.getLong("id_sucursal"));
            obj.setNombre_comercial_su(rs.getString("nombre_comercial_su"));
            obj.setCorreo_su(rs.getString("correo_su"));
            obj.setJornada(rs.getString("Jornada"));
            
        } catch (SQLException ex) {
            Logger.getLogger(mapper_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static ma_periodo getPeriodoFromResultSet(ResultSet rs) {
        ma_periodo obj = new ma_periodo();
        try {
            obj.setPeriodo(rs.getString("periodo"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    public static JoinMaterias getMateriaCalificacionFromResultSet(ResultSet rs) {
        JoinMaterias obj = new JoinMaterias();
        try {
            obj.setMateria(rs.getString("Materia"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static ma_periodo getPeriodoComboFromResultSet(ResultSet rs) {
        ma_periodo obj = new ma_periodo();
        try {
            obj.setPeriodo(rs.getString("periodo"));

        } catch (SQLException ex) {
            Logger.getLogger(mapper_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static us_permiso_curso getCursoComboFromResultSet(ResultSet rs) {
        us_permiso_curso obj = new us_permiso_curso();
        try {
            obj.setCurso(rs.getString("Curso"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
    public static joinPlanificacion getPlanificacionFromResultSet(ResultSet rs) {
        joinPlanificacion obj = new joinPlanificacion();
        try {
            obj.setActividades_aprendizaje(rs.getString("actividades_aprendizaje"));
            obj.setApellidos_nombres(rs.getString("apellidos_nombres"));
            obj.setAprovado(rs.getString("aprovado"));
            obj.setCriterio_evaluacion(rs.getString("criterio_evaluacion"));
            obj.setDestresa_criterio_desempeno(rs.getString("destresa_criterio_desempeno"));
            obj.setEspecificaciones_adaptacion_aplicada(rs.getString("especificaciones_adaptacion_aplicada"));
            obj.setEspecificaciones_unidad_educativa(rs.getString("especificaciones_unidad_educativa"));
            obj.setEstado_pla_union(rs.getString("estado_pla_union"));
            obj.setF_actualizacion(rs.getString("f_actualizacion"));
            obj.setF_creacion(rs.getString("f_creacion"));
            obj.setFecha(rs.getString("fecha"));
            obj.setHora(rs.getString("hora"));
            obj.setId_materia(rs.getLong("id_materia"));
            obj.setId_paralelo(rs.getLong("id_paralelo"));
            obj.setId_periodo(rs.getLong("id_periodo"));
            obj.setId_planificacion(rs.getLong("id_planificacion"));
            obj.setId_planificacion_union(rs.getLong("id_planificacion_union"));
            obj.setId_registro(rs.getLong("id_registro"));
            obj.setId_rol(rs.getLong("id_rol"));
            obj.setId_sucursal(rs.getLong("id_sucursal"));
            obj.setId_usuario(rs.getLong("id_usuario"));
            obj.setId_materia(rs.getLong("id_materia"));
            obj.setMateria(rs.getString("materia"));
            obj.setNombre_comercial_su(rs.getString("nombre_comercial_su"));
            obj.setObjetivo_unidad(rs.getString("objetivo_unidad"));
            obj.setParalelo(rs.getString("paralelo"));
            obj.setPeriodo(rs.getString("periodo"));
            obj.setRecursos(rs.getString("recursos"));
            obj.setRevisado(rs.getString("revisado"));
            obj.setRol(rs.getString("rol"));
            obj.setTecnicas_instrumentos_evaluacion(rs.getString("tecnicas_instrumentos_evaluacion"));
            obj.setU_actualizacion(rs.getString("u_actualizacion"));
            obj.setU_creacion(rs.getString("u_creacion"));
            obj.setUsuario(rs.getString("usuario"));
            obj.setEvaluacion_unidad(rs.getString("evaluacion_unidad"));
        } catch (SQLException ex) {
            Logger.getLogger(mapper_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
        return obj;
    }
    
}
