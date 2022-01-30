package com.humtrusa.administracion;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.humtrusa.beans.BAdministracionArticulosLocal;
import com.humtrusa.beans.BAdministracionUMedidaLocal;
import com.humtrusa.enumRecursos.EnumRecursosArticulos;
import com.humtrusa.enumRecursos.EnumRecursosGenerales;
import com.humtrusa.enumRecursos.EnumRecursosUMedidas;

/**
 * Servlet implementation class SAdministracioUMedidas
 */
public class SAdministracionUMedidas extends HttpServlet {
	private static final long serialVersionUID = 1L;
    BAdministracionUMedidaLocal bmedida = null;
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SAdministracionUMedidas() {
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
	
	public String listarMedidaAgrupador(HttpServletRequest request){
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String codmedida = ((!"".equals(request.getParameter("codigo")) && !"0".equals(request.getParameter("codigo")))?request.getParameter("codigo"):"0"); 
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";
		String tipoRespuesta = (!"".equals(request.getParameter("tiporespuesta"))?request.getParameter("tiporespuesta"):"XML");		
		return bmedida.listarMedidaAgrupador(codempresa, codmedida, descripcion,tipoRespuesta);
	}
	
	public String listarMarcaAgrupador(HttpServletRequest request){
		System.out.println("listar ag"); 
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String codigo = ((!"".equals(request.getParameter("codigo")) && !"0".equals(request.getParameter("codigo")))?request.getParameter("codigo"):"0"); 
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";		
		String tipoRespuesta = (!"".equals(request.getParameter("tiporespuesta"))?request.getParameter("tiporespuesta"):"XML");
		return bmedida.listarMarcaAgrupador(codempresa, codigo, descripcion,tipoRespuesta);
	}
	
	public String listarLineasAgrupador(HttpServletRequest request){
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String codigo = ((!"".equals(request.getParameter("codigo")) && !"0".equals(request.getParameter("codigo")))?request.getParameter("codigo"):"0"); 
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";		
		String tipoRespuesta = (!"".equals(request.getParameter("tiporespuesta"))?request.getParameter("tiporespuesta"):"XML");
		return bmedida.listarLineasAgrupador(codempresa, codigo, descripcion,tipoRespuesta);
	}
	
	public String listarSubLineasAgrupador(HttpServletRequest request){
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String codigo = ((!"".equals(request.getParameter("codigo")) && !"0".equals(request.getParameter("codigo")))?request.getParameter("codigo"):"0"); 
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";		
		String tipoRespuesta = (!"".equals(request.getParameter("tiporespuesta"))?request.getParameter("tiporespuesta"):"XML");
		return bmedida.listarSubLineasAgrupador(codempresa, codigo, descripcion,tipoRespuesta);
	}
	
	public String guardarMarca(HttpServletRequest request){
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String usuario = request.getParameter("codusuario");
		Date fecha = new Date();
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";
		return bmedida.guardarMarca(codempresa,descripcion,usuario,fecha);
	}
	
	public String guardarLinea(HttpServletRequest request){
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String usuario = request.getParameter("codusuario");
		Date fecha = new Date();
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";
		return bmedida.guardarLinea(codempresa,descripcion,usuario,fecha);
	}
	
	public String guardarSubLinea(HttpServletRequest request){
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String usuario = request.getParameter("codusuario");
		Date fecha = new Date();
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";
		return bmedida.guardarSubLinea(codempresa,descripcion,usuario,fecha);
	}
	
	public String guardarUmedida(HttpServletRequest request){
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String usuario = request.getParameter("codusuario");
		Date fecha = new Date();
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";
		return bmedida.guardarUmedida(codempresa,descripcion,usuario,fecha);
	}
	
	private void procesar(HttpServletRequest request,
			HttpServletResponse response)throws ServletException, IOException{
		//response.setContentType("text/xml");
		response.setCharacterEncoding("ISO-8859-1");
		PrintWriter out = response.getWriter();
		System.out.println("orden "+request.getParameter("orden"));
		EnumRecursosUMedidas enumOrdenes = EnumRecursosUMedidas.valueOf(request.getParameter("orden"));
		
		switch(enumOrdenes){
			
			case AGRUPADOR_UMEDIDAS: 
				//response.setContentType("text/xml");
				out.print(listarMedidaAgrupador(request));
				break;
			
			case AGRUPADOR_MARCAS: 
				//response.setContentType("text/xml");
				out.print(listarMarcaAgrupador(request));
				break;
			
			case AGRUPADOR_LINEAS:
				out.print(listarLineasAgrupador(request));
				break;
			
			case AGRUPADOR_SUBLINEAS:
				out.print(listarSubLineasAgrupador(request));
				break;
				
			case LISTARMARCASFILTROS:
				out.print(listarMarcaAgrupador(request));
				break;
				
			case LISTARLINEASFILTROS:
				out.print(listarLineasAgrupador(request));
				break;
				
			case LISTARSUBLINEASFILTROS:
				out.print(listarSubLineasAgrupador(request));
				break;
				
			case GUARDAR_MARCA:
				out.print(guardarMarca(request));
				break;
				
			case GUARDAR_LINEA:
				out.print(guardarLinea(request));
				break;
				
			case GUARDAR_SUBLINEA:
				out.print(guardarSubLinea(request));
				break;
				
			case GUARDAR_UMEDIDA:
				out.print(guardarUmedida(request));
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
			this.bmedida = (BAdministracionUMedidaLocal) context.lookup(EnumRecursosGenerales.BUMEDIDAS.getRecurso());
		}catch (NamingException e) {
			e.printStackTrace();
		}
	}
}
