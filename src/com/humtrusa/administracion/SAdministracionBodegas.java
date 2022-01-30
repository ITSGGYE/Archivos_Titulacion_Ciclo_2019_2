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

import com.humtrusa.beans.BAdministracionArticulosLocal;
import com.humtrusa.beans.BAdministracionBodegasLocal;
import com.humtrusa.enumRecursos.EnumRecursosArticulos;
import com.humtrusa.enumRecursos.EnumRecursosBodegas;
import com.humtrusa.enumRecursos.EnumRecursosGenerales;

/**
 * Servlet implementation class SAdministracionBodegas
 */
public class SAdministracionBodegas extends HttpServlet {
	private static final long serialVersionUID = 1L;
	BAdministracionBodegasLocal beanBodega;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SAdministracionBodegas() {
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
	
	public String listarBodegasxAgencias(HttpServletRequest request){
		System.out.println("listarBodegasxAgencias");
		
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		long codagencia = (Long.parseLong(request.getParameter("codagencia")));
		//String codarticulo = ((!"".equals(request.getParameter("codigo")) && !"0".equals(request.getParameter("codigo")))?request.getParameter("codigo"):"0"); 
		//String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";
		//String tipoRespuesta = (!"".equals(request.getParameter("tiporespuesta"))?request.getParameter("tiporespuesta"):"XML");
		return beanBodega.listarBodegasxAgencias(codempresa,codagencia);
	}
	
	public String listarArticulosxbodegas(HttpServletRequest request){
		System.out.println("listarBodegasxAgencias");
		
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		long codagencia = (Long.parseLong(request.getParameter("codagencia")));
		String codbodega = ((!"".equals(request.getParameter("codbodega")) && !"0".equals(request.getParameter("codbodega")))?request.getParameter("codbodega"):"");
		String codarticulo = ((!"".equals(request.getParameter("codigoart")) && !"0".equals(request.getParameter("codigoart")))?request.getParameter("codigoart"):""); 
		long codestado = (!"".equals(request.getParameter("codestado"))?Long.parseLong(request.getParameter("codestado")):0l);
		String codmarca = ((!"".equals(request.getParameter("codmarca")) && !"0".equals(request.getParameter("codmarca")))?request.getParameter("codmarca"):"0");
		String codlinea = ((!"".equals(request.getParameter("codlinea")) && !"0".equals(request.getParameter("codlinea")))?request.getParameter("codlinea"):"0");
		String codsublinea = ((!"".equals(request.getParameter("codsublinea")) && !"0".equals(request.getParameter("codsublinea")))?request.getParameter("codsublinea"):"0");
		//String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";
		//String tipoRespuesta = (!"".equals(request.getParameter("tiporespuesta"))?request.getParameter("tiporespuesta"):"XML");
		return beanBodega.listarArticulosxbodegas(codempresa,codagencia,codbodega,codarticulo,codestado,codmarca,codlinea,codsublinea);
	}
	
	private void procesar(HttpServletRequest request,
			HttpServletResponse response)throws ServletException, IOException{
		//response.setContentType("text/xml");
		response.setCharacterEncoding("ISO-8859-1");
		PrintWriter out = response.getWriter();
		System.out.println("orden "+request.getParameter("orden"));
		EnumRecursosBodegas enumOrdenes = EnumRecursosBodegas.valueOf(request.getParameter("orden"));
		
		switch(enumOrdenes){
			
			case LISTAR_BODEGASXAGENCIAS: 
				//response.setContentType("text/xml");
				out.print(listarBodegasxAgencias(request));
				break;
			case LISTAR_ARTICULOSXBODEGAS:
				out.print(listarArticulosxbodegas(request));
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
			this.beanBodega = (BAdministracionBodegasLocal) context.lookup(EnumRecursosGenerales.BBODEGAS.getRecurso());
		}catch (NamingException e) {
			e.printStackTrace();
		}
	}
}
