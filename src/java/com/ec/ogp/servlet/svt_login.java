/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ec.ogp.servlet;

import com.ec.ogp.controler.ctr_login;
import com.ec.ogp.controler.ctr_planificacion;
import com.ec.ogp.model.join.us_empleados_join;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.List;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author carlos
 */
public class svt_login extends HttpServlet {

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
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();

        HttpSession ses = request.getSession();

        String usuario = request.getParameter("txtUsuario");
        String contra = request.getParameter("txtContra");
        String salir = request.getParameter("btnSalir");
        String planifacion = request.getParameter("btnPlanificacion");
        String msg = "";

        if (usuario.length() > 1 && contra.length() > 1) {

            try {
                ctr_login ctr2 = new ctr_login();
                us_empleados_join em = new us_empleados_join();

                List<us_empleados_join> listar_us = null;

                em.setUsuario(usuario);
                em.setContrasena(contra);
                listar_us = ctr2.listarEmpleadosActivos(em);

                if (listar_us != null) {
                    ses.setAttribute("persona", listar_us.get(0).getApellidos_nombres());
                    ses.setAttribute("sucursal", listar_us.get(0).getNombre_comercial_su());
                    ses.setAttribute("id_sucursal", listar_us.get(0).getId_sucursal());
                    ses.setAttribute("id_usuario", listar_us.get(0).getId_usuario());
                    
                    System.out.println("user2: " + listar_us.get(0).getUsuario());
                    System.out.println("sucursal2: " + listar_us.get(0).getNombre_comercial_su());
                    System.out.println("sucursal2id: " + listar_us.get(0).getId_sucursal());
                    System.out.println("user2id: " + listar_us.get(0).getId_usuario());
                } else {
                    System.out.println("else!");
                    ses.invalidate();
                }
            } catch (Exception e) {
                e.printStackTrace();
            }

        }

        if ("SALIR".equals(salir)) {
            response.sendRedirect("http://www.google.com/");
        }

        if (usuario.length() > 2 && contra.length() > 2) {
            ctr_login ctr = new ctr_login();
            us_empleados_join emp = new us_empleados_join();

            emp.setUsuario(usuario);
            emp.setContrasena(contra);
            msg = ctr.Iniciar_sesion(emp);
//            System.out.println("mensje: " + msg);
            if ("s".equals(msg)) {
//                response.getWriter().print(msg);
                
                RequestDispatcher dispather = request.getRequestDispatcher("Views/FrmPrincipal.jsp");
                dispather.forward(request, response);
            } else {
//                response.getWriter().print(msg);
                
                RequestDispatcher dispather = request.getRequestDispatcher("index.jsp");
                dispather.forward(request, response);
            }
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
        processRequest(request, response);
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
        processRequest(request, response);
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
