package com.humtrusa.administracion;

import java.io.IOException;
import java.io.PrintWriter;

import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import com.humtrusa.beans.BAdministracionArticulosLocal;
import com.humtrusa.beans.BAdministracionPermisosxPefilLocal;
import com.humtrusa.enumRecursos.EnumRecursosArticulos;
import com.humtrusa.enumRecursos.EnumRecursosGenerales;
import com.humtrusa.enumRecursos.EnumRecursosPermisos;
import com.humtrusa.modelo.Seguridades;
import com.humtrusa.servicios.BeanSeguridad;

/**
 * Servlet implementation class SAdminitracionPermisosxPerfil
 */
public class SAdminitracionPermisosxPerfil extends HttpServlet {
	private static final long serialVersionUID = 1L;
     BAdministracionPermisosxPefilLocal perfiles;
     Seguridades bean =null;
     
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SAdminitracionPermisosxPerfil() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		procesar(request,response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		procesar(request,response);
	}
	
	public String listarPerfiles(HttpServletRequest request){		
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		int inicio = Integer.parseInt(request.getParameter("start"));
		int limite = Integer.parseInt(request.getParameter("limit"));
		return perfiles.obtenerPerfiles(codempresa, inicio, limite);
	}
	
	public String listarPermisosPerfiles(HttpServletRequest request){
		HttpSession sesion = request.getSession();
		bean = (Seguridades)sesion.getAttribute(EnumRecursosGenerales.MODELO_SEGURIDADES.getRecurso());
		
		long codperfil = (!"0".equals(request.getParameter("codperfil"))?Long.parseLong(request.getParameter("codperfil")):bean.getCodigoPerfil());
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String modulo = request.getParameter("modulo");
		System.out.println(modulo +" "+codperfil);
		return perfiles.obtenerPermisosxPerfilTodos(codempresa, codperfil, modulo);
	}
	
	public String listarModulos(HttpServletRequest request){		
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		return perfiles.obtenerModulos(codempresa);
	}
	
	public String guardarPerfiles(HttpServletRequest request){
		HttpSession sesion = request.getSession();
		bean = (Seguridades)sesion.getAttribute(EnumRecursosGenerales.MODELO_SEGURIDADES.getRecurso());
		
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		long codperfil = Long.parseLong(request.getParameter("codperfil"));
		String detalle = request.getParameter("detalle");
		return perfiles.guardarPerfilesOpciones(codempresa, codperfil, detalle);
	}
	
	private void procesar(HttpServletRequest request,
			HttpServletResponse response)throws ServletException, IOException{
		//response.setContentType("text/xml");
		response.setCharacterEncoding("ISO-8859-1");
		PrintWriter out = response.getWriter();
		System.out.println("orden "+request.getParameter("orden"));
		EnumRecursosPermisos enumOrdenes = EnumRecursosPermisos.valueOf(request.getParameter("orden"));
		
		switch(enumOrdenes){
			
			case LISTAR_PERFILES: 
				//response.setContentType("text/xml");
				out.print(listarPerfiles(request));
				break;
				
			case LISTAR_PERMISOS_PERFILES:
				out.print(listarPermisosPerfiles(request));
				break;
			case LISTAR_MODULOS:
				out.print(listarModulos(request));
				break;
				 
			case GUARDAR_PERMISOS:
				out.print(guardarPerfiles(request));
				break;
				
			default:
				break;
				
		}
		
		out.flush();
		out.close();
	}
	
	/**
	 * @see Servlet#init(ServletConfig)
	 */
	public void init() throws ServletException {
		Context context;
		try {
			context = new InitialContext();
			this.perfiles = (BAdministracionPermisosxPefilLocal) context.lookup(EnumRecursosGenerales.BPERMISOSXPERFIL.getRecurso());
		}catch (NamingException e) {
			e.printStackTrace();
		}
	}

}
