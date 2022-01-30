/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.controler;

import com.ec.ogp.mappers.mapper_planificacion;
import com.ec.ogp.model.join.JoinMaterias;
import com.ec.ogp.model.join.joinPlanificacion;
import com.ec.ogp.model.ma_periodo;
import com.ec.ogp.model.us_permiso_curso;
import com.ec.ogp.util.BDConection;
import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Types;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author carlos
 */
public class ctr_planificacion {
    
    Connection con = null;
    java.sql.Statement st = null;
    ResultSet rs = null;
    PreparedStatement ps;
    CallableStatement pro;
//    BDConection c = new BDConection();
    
    public ArrayList<joinPlanificacion> listarPlanificacion(joinPlanificacion jp) {
        ArrayList<joinPlanificacion> valor = new ArrayList<>();
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall("{ call pla_planificacion_vista_select(?) }");
            pro.setLong(1, jp.getId_usuario());
            rs = pro.executeQuery();
            while (rs.next()) {
                joinPlanificacion obj = mapper_planificacion.getPlanificacionFromResultSet(rs);
                valor.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public ArrayList<joinPlanificacion> listarPlanificacionId(joinPlanificacion je) {
        ArrayList<joinPlanificacion> valor = new ArrayList<>();
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call pla_planifiacion_lista_select_id(?) }");
            pro.setLong(1, je.getId_planificacion());
            rs = pro.executeQuery();
            while (rs.next()) {
                joinPlanificacion obj = mapper_planificacion.getPlanificacionFromResultSet(rs);
                valor.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public ArrayList<joinPlanificacion> listarPlanificacionFiltro(joinPlanificacion je) {
        ArrayList<joinPlanificacion> valor = new ArrayList<>();
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call pla_planificacion_lista_select_filtro(?,?,?,?) }");
            pro.setString(1, je.getMateria());
            pro.setString(2, je.getParalelo());
            pro.setString(3, je.getPeriodo());
            pro.setLong(4, je.getId_sucursal());
            rs = pro.executeQuery();
            while (rs.next()) {
                joinPlanificacion obj = mapper_planificacion.getPlanificacionFromResultSet(rs);
                valor.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String periodoActual(ma_periodo pe) {
        String valor = "";
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call ca_calificacion_mostrar_periodo(?,?) }");
            pro.setLong(1, pe.getId_sucursal_pe());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public ArrayList<JoinMaterias> ComboMateriaCalificacion(JoinMaterias pe) {
        ArrayList<JoinMaterias> lista = new ArrayList<>();
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call ca_calififcacion_mostrar_materias(?) }");
            pro.setLong(1, pe.getId_usuario());
            pro.execute();
            rs = pro.getResultSet();
            while (rs.next()) {
                JoinMaterias obj = mapper_planificacion.getMateriaCalificacionFromResultSet(rs);
                lista.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return lista;
    }
    
    public ArrayList<ma_periodo> ComboPeriodoCalificacion(ma_periodo pe) {
        ArrayList<ma_periodo> lista = new ArrayList<>();
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call re_reportes_cargar_combo_periodo(?) }");
            pro.setLong(1, pe.getId_sucursal_pe());
            pro.execute();
            rs = pro.getResultSet();
            while (rs.next()) {
                ma_periodo obj = mapper_planificacion.getPeriodoComboFromResultSet(rs);
                lista.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return lista;
    }
    
    public ArrayList<us_permiso_curso> ComboCursoCalificacion(us_permiso_curso mp) {
        ArrayList<us_permiso_curso> lista = new ArrayList<>();
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call ca_calificacion_cargar_combo_cursos(?,?) }");
            pro.setLong(1, mp.getId_usuario());
            pro.setLong(2, mp.getId_sucursal_per());
            pro.execute();
            rs = pro.getResultSet();
            while (rs.next()) {
                us_permiso_curso obj = mapper_planificacion.getCursoComboFromResultSet(rs);
                lista.add(obj);
            }
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return lista;
    }
    
    public String crearPalificacion(joinPlanificacion pe) {
        String valor = null;
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call pla_planificacion_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) }");
            pro.setString(1, pe.getHora());
            pro.setString(2, pe.getObjetivo_unidad());
            pro.setString(3, pe.getCriterio_evaluacion());
            pro.setString(4, pe.getDestresa_criterio_desempeno());
            pro.setString(5, pe.getActividades_aprendizaje());
            pro.setString(6, pe.getRecursos());
            pro.setString(7, pe.getTecnicas_instrumentos_evaluacion());
            pro.setString(8, pe.getEspecificaciones_unidad_educativa());
            pro.setString(9, pe.getEspecificaciones_adaptacion_aplicada());
            pro.setString(10, pe.getRevisado());
            pro.setString(11, pe.getAprovado());
            pro.setLong(12, pe.getId_usuario());
            pro.setString(13, pe.getU_creacion());
            pro.setString(14, pe.getMateria());
            pro.setString(15, pe.getParalelo());
            pro.setString(16, pe.getPeriodo());
//            pro.setString(17, pe.getObjetivos());
            pro.setLong(17, pe.getId_sucursal());
            pro.setString(18, pe.getEvaluacion_unidad());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.execute();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String actualizarPalificacion(joinPlanificacion pe) {
        String valor = "";
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call pla_planificacion_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) }");
            pro.setString(1, pe.getHora());
            pro.setString(2, pe.getObjetivo_unidad());
            pro.setString(3, pe.getCriterio_evaluacion());
            pro.setString(4, pe.getDestresa_criterio_desempeno());
            pro.setString(5, pe.getActividades_aprendizaje());
            pro.setString(6, pe.getRecursos());
            pro.setString(7, pe.getTecnicas_instrumentos_evaluacion());
            pro.setString(8, pe.getEspecificaciones_unidad_educativa());
            pro.setString(9, pe.getEspecificaciones_adaptacion_aplicada());
            pro.setString(10, pe.getRevisado());
            pro.setString(11, pe.getAprovado());
            pro.setLong(12, pe.getId_planificacion());
            pro.setString(13, pe.getU_actualizacion());
            pro.setString(14, pe.getMateria());
            pro.setString(15, pe.getParalelo());
            pro.setString(16, pe.getPeriodo());
//            pro.setString(17, pe.getObjetivos());
            pro.setLong(17, pe.getId_sucursal());
            pro.setString(18, pe.getEvaluacion_unidad());
//            pro.setLong(19, pe.getId_planificacion());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
    public String actualizarPalificacionEstado(joinPlanificacion pe) {
        String valor = "";
        try {
            con = BDConection.conectar();
            con.setAutoCommit(false);
            pro = con.prepareCall(
                    "{ call pla_planificacion_estado(?,?,?) }");
            pro.setString(1, pe.getEstado_pla_union());
            pro.setLong(2, pe.getId_planificacion_union());
            pro.registerOutParameter("salida", Types.VARCHAR);
            pro.executeUpdate();
            valor = pro.getString("salida");
            con.commit();
        } catch (Exception e) {
            try {
                con.rollback();
                e.printStackTrace();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        } finally {
            try {
                con.close();
            } catch (SQLException ex) {
                Logger.getLogger(ctr_planificacion.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return valor;
    }
    
}
