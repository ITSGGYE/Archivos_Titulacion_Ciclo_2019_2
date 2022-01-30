/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.servlet;

import com.ec.ogp.controler.ctr_planificacion;
import com.ec.ogp.model.join.JoinMaterias;
import com.ec.ogp.model.join.joinPlanificacion;
import com.ec.ogp.model.ma_periodo;
import com.ec.ogp.model.us_permiso_curso;
import com.ec.ogp.util.BDConection;
import java.io.File;
import java.io.IOException;
import java.sql.Connection;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.ServletOutputStream;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JasperRunManager;

/**
 *
 * @author carlos
 */
public class svt_planificacion extends HttpServlet {

    ctr_planificacion ctr = new ctr_planificacion();
    ctr_planificacion ctr2 = new ctr_planificacion();
    ctr_planificacion ctr3 = new ctr_planificacion();
    ctr_planificacion ctr4 = new ctr_planificacion();

    Connection con = null;
    Long id_plani = null;

    joinPlanificacion jp = new joinPlanificacion();

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, ClassNotFoundException, JRException {
        response.setContentType("text/html;charset=UTF-8");
        try {

            String planifacion = (String) request.getParameter("cargar");
            String n_registro = (String) request.getParameter("btn_nuevo");
            String regre = (String) request.getParameter("regresar");
            String actualizar = (String) request.getParameter("actualizar");
            String estado = (String) request.getParameter("btn_eliminar");
            String estadoDos = (String) request.getParameter("btn_eliminar_dos");
            String actualizarForm = (String) request.getParameter("actualizarForm");
            String imprimir = (String) request.getParameter("IMPRIMIR");
            String v_id_planificacion = (String) request.getParameter("id_pla");
            String guardar = (String) request.getParameter("guardar");
            String salir = (String) request.getParameter("btn_salir");
            String buscar = (String) request.getParameter("btn_buscar");
            String accion = "crg";

            String hora = (String) request.getParameter("hora");
            String objUnidad = (String) request.getParameter("objUnidad");
            String criterioEvaluacion = (String) request.getParameter("criterioEvaluacion");
            String destresaCriterioDesempeno = (String) request.getParameter("destresaCriterioDesempeno");
            String actividadesAprendisaje = (String) request.getParameter("actividadesAprendisaje");
            String recursos = (String) request.getParameter("recursos");
            String tecnicasInsteumentosEvaluacion = (String) request.getParameter("tecnicasInsteumentosEvaluacion");
            String especificacionUnidadEducativa = (String) request.getParameter("especificacionUnidadEducativa");
            String especificacionAdaptacionAplicada = (String) request.getParameter("especificacionAdaptacionAplicada");
            String evaluacion_unuidad = (String) request.getParameter("evaluacion_unidad");
            String revisado = (String) request.getParameter("revisado");
            String aprovado = (String) request.getParameter("aprovado");
            String asignatura = (String) request.getParameter("asignatura");
            String curso = (String) request.getParameter("curso");
            String periodo = (String) request.getParameter("periodo");
            String objetivo = (String) request.getParameter("objetivo");

            HttpSession ses_curso = request.getSession();
            HttpSession ses_materia = request.getSession();

            HttpSession ses = request.getSession();
            HttpSession ses_id_sucursal = request.getSession();
            HttpSession ses_id_usuario = request.getSession();

            String v_usuario = (String) ses.getAttribute("persona");
            String v_perio = (String) ses.getAttribute("svt_periodo");
            Long v_id_usuario = (Long) ses_id_usuario.getAttribute("id_usuario");
            Long v_id_sucursal = (Long) ses_id_sucursal.getAttribute("id_sucursal");
//codificacion--------------------------------------------------------------
            if (accion.equals(planifacion)) {

                List<ma_periodo> listarPeriodo = null;
                ma_periodo pe = new ma_periodo();
                pe.setId_sucursal_pe(v_id_sucursal);

                List<JoinMaterias> listarMaterias = null;
                JoinMaterias jm = new JoinMaterias();
                jm.setId_usuario(v_id_usuario);

                List<us_permiso_curso> listarCurso = null;
                us_permiso_curso pc = new us_permiso_curso();
                pc.setId_usuario(v_id_usuario);
                pc.setId_sucursal_per(v_id_sucursal);

                List<joinPlanificacion> listar = null;
                joinPlanificacion je = new joinPlanificacion();
                je.setMateria(asignatura);
                je.setParalelo(curso);
                je.setPeriodo(periodo);
                je.setId_sucursal(v_id_sucursal);

                listarCurso = ctr3.ComboCursoCalificacion(pc);
                ses_curso.setAttribute("svt_paralelo", listarCurso);

                listarPeriodo = ctr4.ComboPeriodoCalificacion(pe);
                ses.setAttribute("svt_periodo_list", listarPeriodo);

                listarMaterias = ctr2.ComboMateriaCalificacion(jm);
                ses_materia.setAttribute("svt_materia", listarMaterias);

                jp.setId_usuario(v_id_usuario);

                listar = ctr.listarPlanificacion(jp);
                request.setAttribute("listar", listar);
//            for (joinPlanificacion listar1 : listar) {
//                request.setAttribute("1", listar1.getParalelo());
//                request.setAttribute("2", listar1.getMateria());
//                System.out.println("estado: " + listar1.getObservacion());
//                System.out.println("estado: " + listar1.getObjetivos());
//            }
                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                dispather.forward(request, response);

            } else if ("BUSCAR".equals(buscar)) {

                List<ma_periodo> listarPeriodo = null;
                ma_periodo pe = new ma_periodo();
                pe.setId_sucursal_pe(v_id_sucursal);

                List<JoinMaterias> listarMaterias = null;
                JoinMaterias jm = new JoinMaterias();
                jm.setId_usuario(v_id_usuario);

                List<us_permiso_curso> listarCurso = null;
                us_permiso_curso pc = new us_permiso_curso();
                pc.setId_usuario(v_id_usuario);
                pc.setId_sucursal_per(v_id_sucursal);

                List<joinPlanificacion> listar = null;
                joinPlanificacion je = new joinPlanificacion();
                je.setMateria(asignatura);
                je.setParalelo(curso);
                je.setPeriodo(periodo);
                je.setId_sucursal(v_id_sucursal);

//                listarCurso = ctr3.ComboCursoCalificacion(pc);
//                ses_curso.setAttribute("svt_paralelo", listarCurso);
//
//                listarPeriodo = ctr4.ComboPeriodoCalificacion(pe);
//                ses.setAttribute("svt_periodo_list", listarPeriodo);
//
//                listarMaterias = ctr2.ComboMateriaCalificacion(jm);
//                ses_materia.setAttribute("svt_materia", listarMaterias);
                if ("".equals(asignatura) || "".equals(curso) || "".equals(periodo)) {
                    listarCurso = ctr3.ComboCursoCalificacion(pc);
                    ses_curso.setAttribute("svt_paralelo", listarCurso);

                    listarPeriodo = ctr4.ComboPeriodoCalificacion(pe);
                    ses.setAttribute("svt_periodo_list", listarPeriodo);

                    listarMaterias = ctr2.ComboMateriaCalificacion(jm);
                    ses_materia.setAttribute("svt_materia", listarMaterias);
                    
                    jp.setId_usuario(v_id_usuario);

                    listar = ctr.listarPlanificacion(jp);
                    request.setAttribute("listar", listar);

                    RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                    dispather.forward(request, response);
                } else {
                    listarCurso = ctr3.ComboCursoCalificacion(pc);
                    ses_curso.setAttribute("svt_paralelo", listarCurso);

                    listarPeriodo = ctr4.ComboPeriodoCalificacion(pe);
                    ses.setAttribute("svt_periodo_list", listarPeriodo);

                    listarMaterias = ctr2.ComboMateriaCalificacion(jm);
                    ses_materia.setAttribute("svt_materia", listarMaterias);

                    listar = ctr.listarPlanificacionFiltro(je);
                    request.setAttribute("listar", listar);

                    RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                    dispather.forward(request, response);
                }
//                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
//                dispather.forward(request, response);

            } else if ("NUEVO".equals(n_registro)) {

                ma_periodo pe = new ma_periodo();
                pe.setId_sucursal_pe(v_id_sucursal);
                String v_periodo = ctr.periodoActual(pe);
                ses.setAttribute("svt_periodo", v_periodo);

                List<JoinMaterias> listarMaterias = null;
                JoinMaterias jm = new JoinMaterias();
                jm.setId_usuario(v_id_usuario);
                listarMaterias = ctr2.ComboMateriaCalificacion(jm);
                ses_materia.setAttribute("svt_materia", listarMaterias);
//            ses_materia.setAttribute("svt_materia", listarMaterias.get(0).getMateria());

//            System.out.println("usere nuevo: " + v_usuario);
//            System.out.println("periodo: " + v_periodo);
//            System.out.println("id sucursal: " + v_id_sucursal);
                List<us_permiso_curso> listarCurso = null;
                us_permiso_curso pc = new us_permiso_curso();
                pc.setId_usuario(v_id_usuario);
                pc.setId_sucursal_per(v_id_sucursal);
                listarCurso = ctr3.ComboCursoCalificacion(pc);
                ses_curso.setAttribute("svt_paralelo", listarCurso);

                RequestDispatcher dispather = request.getRequestDispatcher("Views/FremPlanificacionCreate.jsp");
                dispather.forward(request, response);
            } else if ("REGRESAR".equals(regre)) {
                List<ma_periodo> listarPeriodo = null;
                ma_periodo pe = new ma_periodo();
                pe.setId_sucursal_pe(v_id_sucursal);

                List<JoinMaterias> listarMaterias = null;
                JoinMaterias jm = new JoinMaterias();
                jm.setId_usuario(v_id_usuario);

                List<us_permiso_curso> listarCurso = null;
                us_permiso_curso pc = new us_permiso_curso();
                pc.setId_usuario(v_id_usuario);
                pc.setId_sucursal_per(v_id_sucursal);

                List<joinPlanificacion> listar = null;
                joinPlanificacion je = new joinPlanificacion();
                je.setMateria(asignatura);
                je.setParalelo(curso);
                je.setPeriodo(periodo);
                je.setId_sucursal(v_id_sucursal);

                listarCurso = ctr3.ComboCursoCalificacion(pc);
                ses_curso.setAttribute("svt_paralelo", listarCurso);

                listarPeriodo = ctr4.ComboPeriodoCalificacion(pe);
                ses.setAttribute("svt_periodo_list", listarPeriodo);

                listarMaterias = ctr2.ComboMateriaCalificacion(jm);
                ses_materia.setAttribute("svt_materia", listarMaterias);
                
                jp.setId_usuario(v_id_usuario);

                listar = ctr.listarPlanificacion(jp);
                request.setAttribute("listar", listar);

                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                dispather.forward(request, response);
            } else if ("GUARDAR".equals(guardar)) {

                joinPlanificacion pe = new joinPlanificacion();

                pe.setHora(hora);
                pe.setObjetivo_unidad(objUnidad);
                pe.setCriterio_evaluacion(criterioEvaluacion);
                pe.setDestresa_criterio_desempeno(destresaCriterioDesempeno);
                pe.setActividades_aprendizaje(actividadesAprendisaje);
                pe.setRecursos(recursos);
                pe.setTecnicas_instrumentos_evaluacion(tecnicasInsteumentosEvaluacion);
                pe.setEspecificaciones_unidad_educativa(especificacionUnidadEducativa);
                pe.setEspecificaciones_adaptacion_aplicada(especificacionAdaptacionAplicada);
                pe.setEvaluacion_unidad(evaluacion_unuidad);
                pe.setRevisado(revisado);
                pe.setAprovado(aprovado);
                pe.setId_usuario(v_id_usuario);
                pe.setU_creacion(v_usuario);
                pe.setMateria(asignatura);
                pe.setParalelo(curso);
                pe.setPeriodo(v_perio);
//                pe.setObjetivos(objetivo);
                pe.setId_sucursal(v_id_sucursal);

                String msg = ctr.crearPalificacion(pe);
                System.out.println("msg crear: " + msg);

//            if ("REGISTRO CREADO!".equals(msg)) {
                List<joinPlanificacion> listar = null;
                
                jp.setId_usuario(v_id_usuario);
                
                listar = ctr2.listarPlanificacion(jp);
                request.setAttribute("listar", listar);
                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                dispather.forward(request, response);
//            }

            } else if ("act".equals(actualizar)) {

                ma_periodo pe = new ma_periodo();
                pe.setId_sucursal_pe(v_id_sucursal);
                String v_periodo = ctr4.periodoActual(pe);
                ses.setAttribute("svt_periodo", v_periodo);
                response.getWriter().print(v_periodo);

                List<JoinMaterias> listarMaterias = null;
                JoinMaterias jp = new JoinMaterias();
                jp.setId_usuario(v_id_usuario);
                listarMaterias = ctr2.ComboMateriaCalificacion(jp);
                ses_materia.setAttribute("svt_materia", listarMaterias);

                List<us_permiso_curso> listarCurso = null;
                us_permiso_curso a = new us_permiso_curso();
                a.setId_usuario(v_id_usuario);
                a.setId_sucursal_per(v_id_sucursal);
                listarCurso = ctr3.ComboCursoCalificacion(a);
                ses_curso.setAttribute("svt_paralelo", listarCurso);

                List<joinPlanificacion> listar = null;
                joinPlanificacion je = new joinPlanificacion();

                je.setId_planificacion(Long.valueOf(v_id_planificacion));
                listar = ctr.listarPlanificacionId(je);

                request.setAttribute("listar", listar);

                request.setAttribute("svt_sucursal", listar.get(0).getNombre_comercial_su());
                request.setAttribute("materia", listar.get(0).getMateria());
                request.setAttribute("svt_hora", listar.get(0).getHora());
                request.setAttribute("svt_curso", listar.get(0).getParalelo());
                request.setAttribute("objUnid", listar.get(0).getObjetivo_unidad());
                request.setAttribute("critEvaluacion", listar.get(0).getCriterio_evaluacion());
                request.setAttribute("desCritDesempeno", listar.get(0).getDestresa_criterio_desempeno());
                request.setAttribute("actAprendisaje", listar.get(0).getActividades_aprendizaje());
                request.setAttribute("recur", listar.get(0).getRecursos());
                System.out.println("listar.get(0).getRecursos(): " + listar.get(0).getRecursos());
                id_plani = listar.get(0).getId_planificacion();
                System.out.println("listar.get(0).getid: " + listar.get(0).getId_planificacion() + " " + id_plani);
                request.setAttribute("tecInstEvaluacion", listar.get(0).getTecnicas_instrumentos_evaluacion());
                request.setAttribute("espAdapAplicada", listar.get(0).getEspecificaciones_adaptacion_aplicada());
//                request.setAttribute("objt", listar.get(0).getDescripcion());
                request.setAttribute("revis", listar.get(0).getRevisado());
                request.setAttribute("apro", listar.get(0).getAprovado());
                request.setAttribute("eval_unidad", listar.get(0).getEvaluacion_unidad());

//            System.out.println("unidad: "+listar.get(0).getObjetivo_unidad());
                RequestDispatcher dispather = request.getRequestDispatcher("Views/FremPlanificacionUpdate.jsp");
                dispather.forward(request, response);
            } else if ("ACTUALIZAR".equals(actualizarForm)) {

                joinPlanificacion pe = new joinPlanificacion();

                pe.setHora(hora);
                pe.setObjetivo_unidad(objUnidad);
                pe.setCriterio_evaluacion(criterioEvaluacion);
                pe.setDestresa_criterio_desempeno(destresaCriterioDesempeno);
                pe.setActividades_aprendizaje(actividadesAprendisaje);
                pe.setRecursos(recursos);
                pe.setId_planificacion(id_plani);
                System.out.println("id_plani: " + id_plani);
                pe.setTecnicas_instrumentos_evaluacion(tecnicasInsteumentosEvaluacion);
                pe.setEspecificaciones_unidad_educativa(especificacionUnidadEducativa);
                pe.setEspecificaciones_adaptacion_aplicada(especificacionAdaptacionAplicada);
                pe.setRevisado(revisado);
                pe.setAprovado(aprovado);
                pe.setId_usuario(v_id_usuario);
                pe.setU_creacion(v_usuario);
                pe.setMateria(asignatura);
                pe.setParalelo(curso);
                pe.setPeriodo(v_perio);
                pe.setEvaluacion_unidad(evaluacion_unuidad);
//                pe.setObjetivos(objetivo);
                pe.setId_sucursal(v_id_sucursal);

                String msg = ctr.actualizarPalificacion(pe);
                System.out.println("msg actualizar: " + msg);

//            if ("REGISTRO CREADO!".equals(msg)) {
                List<joinPlanificacion> listar = null;
                
                jp.setId_usuario(v_id_usuario);
                
                listar = ctr2.listarPlanificacion(jp);
                request.setAttribute("listar", listar);
                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                dispather.forward(request, response);
//            }

            } else if ("IMPRIMIR".equals(imprimir)) {
                con = BDConection.conectar();

//            File reportfile = new File("C:\\Users\\carlos\\Documents\\NetBeansProjects\\OGPlanificacionJsp\\web\\newReport.jasper");
                File reportfile = new File("C:\\reportes\\newReport.jasper");
                Map parameter = new HashMap();
                parameter.put("id", Integer.parseInt(v_id_planificacion));

                byte[] bytes = JasperRunManager.runReportToPdf(reportfile.getPath(), parameter, con);

                response.setContentType("application/pdf");
                response.setContentLength(bytes.length);
                try (ServletOutputStream outputstream = response.getOutputStream()) {
                    outputstream.write(bytes, 0, bytes.length);
                    outputstream.flush();
                }
//            return;

            } else if ("DESACTIVAR".equals(estado)/* || "ACTIVAR".equals(estado)*/) {
//            String v_estado = "";
//            if ("ACTIVAR".equals(estado)) {
//                v_estado = "A";
//            }
//            if ("DESACTIVAR".equals(estado)) {
//                v_estado = "I";
//            }

                joinPlanificacion pe = new joinPlanificacion();
                pe.setId_planificacion_union(Long.valueOf(v_id_planificacion));
                pe.setEstado_pla_union("I");
                String est = ctr.actualizarPalificacionEstado(pe);

                List<joinPlanificacion> listar = null;
                
                jp.setId_usuario(v_id_usuario);
                
                listar = ctr2.listarPlanificacion(jp);
                request.setAttribute("listar", listar);
                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                dispather.forward(request, response);
            } else if ("ACTIVAR".equals(estadoDos)) {

                joinPlanificacion pe = new joinPlanificacion();
                pe.setId_planificacion_union(Long.valueOf(v_id_planificacion));
                pe.setEstado_pla_union("A");
                String est = ctr.actualizarPalificacionEstado(pe);

                List<joinPlanificacion> listar = null;
                
                jp.setId_usuario(v_id_usuario);
                
                listar = ctr2.listarPlanificacion(jp);
                request.setAttribute("listar", listar);
                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                dispather.forward(request, response);
            } else {
                List<ma_periodo> listarPeriodo = null;
                ma_periodo pe = new ma_periodo();
                pe.setId_sucursal_pe(v_id_sucursal);

                List<JoinMaterias> listarMaterias = null;
                JoinMaterias jm = new JoinMaterias();
                jm.setId_usuario(v_id_usuario);

                List<us_permiso_curso> listarCurso = null;
                us_permiso_curso pc = new us_permiso_curso();
                pc.setId_usuario(v_id_usuario);
                pc.setId_sucursal_per(v_id_sucursal);

                List<joinPlanificacion> listar = null;
                joinPlanificacion je = new joinPlanificacion();
                je.setMateria(asignatura);
                je.setParalelo(curso);
                je.setPeriodo(periodo);
                je.setId_sucursal(v_id_sucursal);

                listarCurso = ctr3.ComboCursoCalificacion(pc);
                ses_curso.setAttribute("svt_paralelo", listarCurso);

                listarPeriodo = ctr4.ComboPeriodoCalificacion(pe);
                ses.setAttribute("svt_periodo_list", listarPeriodo);

                listarMaterias = ctr2.ComboMateriaCalificacion(jm);
                ses_materia.setAttribute("svt_materia", listarMaterias);
                
                jp.setId_usuario(v_id_usuario);

                listar = ctr.listarPlanificacion(jp);
                request.setAttribute("listar", listar);

                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPlanificacionList.jsp");
                dispather.forward(request, response);
            }
        } catch (Exception e) {

        }

    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(svt_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        } catch (JRException ex) {
            Logger.getLogger(svt_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(svt_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        } catch (JRException ex) {
            Logger.getLogger(svt_planificacion.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
