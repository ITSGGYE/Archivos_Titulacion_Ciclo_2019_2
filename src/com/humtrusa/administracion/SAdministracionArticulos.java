package com.humtrusa.administracion;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.jfree.data.time.TimePeriodFormatException;

import com.humtrusa.beans.BAdministracionArticulosLocal;
import com.humtrusa.beans.BAdministracionProveedoresLocal;
import com.humtrusa.enumRecursos.EnumRecursosArticulos;
import com.humtrusa.enumRecursos.EnumRecursosGenerales;
import com.humtrusa.enumRecursos.EnumRecursosProveedores;
import com.humtrusa.estandarizadores.estandarizador;
import com.humtrusa.modelo.Seguridades;
import com.humtrusa.servicios.BeanSeguridad;

/**
 * Servlet implementation class SAdministracionArticulos
 */
public class SAdministracionArticulos extends HttpServlet {
	private static final long serialVersionUID = 1L;
	 BAdministracionArticulosLocal beanArticulos;
	
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SAdministracionArticulos() {
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
	
	public String guardarArticulo(HttpServletRequest request) {
			
		String codEmpresa = request.getParameter("codEmpresa");
		long codagencia = Long.parseLong(request.getParameter("codagencia"));
		String codarticulo= request.getParameter("codarticulo");
		String codalterno= request.getParameter("codalterno"); 
        String codbarra= request.getParameter("codbarra");
        String descripcion= request.getParameter("descripcion");
        String descripcioncorta= request.getParameter("descripcioncorta");
        //imagenArt=
        String aceptadecimales= request.getParameter("aceptadecimales");
        String calculaiva= request.getParameter("calculaiva");
        String calculaivacompras= request.getParameter("calculaivacompras");
        String incluyeivacompras= request.getParameter("incluyeivacompras");
        String perecible= request.getParameter("perecible");
        String registrosanitario= request.getParameter("registrosanitario");
        String codunidadpresentacion= request.getParameter("codunidadpresentacion");
        String codunidadproveedor= request.getParameter("codunidadproveedor");
        String codunidadesmedida= request.getParameter("codunidadesmedida");
        String codusuario= request.getParameter("codusuario");
        Date fecharegstro= estandarizador.obtenerFecha(request.getParameter("fecharegstro"));
        //GEN ART X EMPRESA
        String codestado= "1";
        String seinventaria= request.getParameter("seinventaria");
        String esvendible= request.getParameter("esvendible");
        String porcdsctoventa= request.getParameter("porcdsctoventa");
        String porcdsctomaximo= request.getParameter("porcdsctomaximo");
        String incluyeivaventas= request.getParameter("incluyeivaventas");
        String codmarca= request.getParameter("codmarca");
        String codlineas= request.getParameter("codlineas");
        String codsublineas= request.getParameter("codsublineas");
        double cantmin = Double.parseDouble(request.getParameter("cantmin"));
        double cantmax = Double.parseDouble(request.getParameter("cantmax"));
        String modo= request.getParameter("modo"); 

        String retorno = "";
		try {
			retorno = beanArticulos.guardarArticulo(
					 Long.parseLong(codEmpresa),
					 Long.parseLong(codarticulo),
					 codalterno,
			         codbarra,
			         descripcion,
			         descripcioncorta,
			        //imagenArt=
			         aceptadecimales,
			         calculaiva,
			         calculaivacompras,
			         incluyeivacompras,
			         perecible,
			         registrosanitario,
			         codunidadpresentacion,
			         codunidadproveedor,
			         codunidadesmedida,
			         codusuario,
			         fecharegstro,
			        //GEN ART X EMPRESA
			         Long.parseLong(codestado),
			         seinventaria,
			         esvendible,
			         Double.parseDouble(porcdsctoventa),
			         Double.parseDouble(porcdsctomaximo),   
			         incluyeivaventas,
			         codmarca,
			         codlineas,
			         codsublineas,
			         cantmin,
			         cantmax,
			         codagencia,
			         modo
        		);
		}catch (Exception e) {
			e.printStackTrace();
			e.getMessage();
		}
		return retorno;
	}
	
	
	public String listarArticulosPedido(HttpServletRequest request){
		System.out.println("listarArticulosPedido");
		HttpSession sesion = request.getSession();
		BeanSeguridad bean= (BeanSeguridad)sesion.getAttribute("beanSeguridad");
		
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		long codagencia = Long.parseLong(bean.getAgencia());
		String codarticulo = ((!"".equals(request.getParameter("codigo")) && !"0".equals(request.getParameter("codigo")))?request.getParameter("codigo"):"0"); 
		String descripcion = (request.getParameter("descripcion")!=null && !request.getParameter("descripcion").replace(" ","").equals(""))?request.getParameter("descripcion"):"";
		String tipoRespuesta = (!"".equals(request.getParameter("tiporespuesta"))?request.getParameter("tiporespuesta"):"XML");
		return beanArticulos.listarArticuloPedido(codempresa,codagencia, Long.parseLong(codarticulo), descripcion,tipoRespuesta);
	}
	
	public String listarArticulosFiltros(HttpServletRequest request){
		HttpSession sesion = request.getSession();
		BeanSeguridad bean= (BeanSeguridad)sesion.getAttribute("beanSeguridad");
		long codagencia = Long.parseLong(bean.getAgencia());
		
		int start = Integer.valueOf((request.getParameter("start")!=null?request.getParameter("start"):"0"));
		int limit= Integer.valueOf((request.getParameter("limit")!=null?request.getParameter("limit"):"0"));
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String codarticulo = ((!"".equals(request.getParameter("codigo")) && request.getParameter("codigo")!=null)?request.getParameter("codigo"):"0");
		String codalterno = ((!"".equals(request.getParameter("codalterno")) && !"0".equals(request.getParameter("codalterno")))?request.getParameter("codalterno"):"0");
		String codestado = ((!"".equals(request.getParameter("codestado")) && request.getParameter("codestado")!=null)?request.getParameter("codestado"):"0");
		String codmarca = ((!"".equals(request.getParameter("codmarca")) && !"0".equals(request.getParameter("codmarca")))?request.getParameter("codmarca"):"0");
		String codlinea = ((!"".equals(request.getParameter("codlinea")) && !"0".equals(request.getParameter("codlinea")))?request.getParameter("codlinea"):"0");
		String codsublinea = ((!"".equals(request.getParameter("codsublinea")) && !"0".equals(request.getParameter("codsublinea")))?request.getParameter("codsublinea"):"0");
		
		return beanArticulos.listarArticuloFiltros( start,limit,
													codempresa,
													codagencia,
													Long.parseLong(codarticulo), 
													codalterno,
													Long.parseLong(codestado),
													codmarca,
											 		codlinea,
													codsublinea);
	}
	
	public String inactivarArticulo(HttpServletRequest request){
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String codigo = ((!"".equals(request.getParameter("codarticulo")) && !"0".equals(request.getParameter("codarticulo")))?request.getParameter("codarticulo"):"0"); 
		String usuario = (request.getParameter("codusuario")!=null && !request.getParameter("codusuario").replace(" ","").equals(""))?request.getParameter("codusuario"):"";		
		Date fechamodificacion = new Date();
		return beanArticulos.inactivarArticulo(codempresa, Long.parseLong(codigo), usuario,fechamodificacion);
	}
	
	private void procesar(HttpServletRequest request,
			HttpServletResponse response)throws ServletException, IOException{
		//response.setContentType("text/xml");
		response.setCharacterEncoding("ISO-8859-1");
		PrintWriter out = response.getWriter();
		System.out.println("orden "+request.getParameter("orden"));
		EnumRecursosArticulos enumOrdenes = EnumRecursosArticulos.valueOf(request.getParameter("orden"));
		
		switch(enumOrdenes){
			
			case LISTAR_ARTICULOS_PEDIDOS: 
				//response.setContentType("text/xml");
				out.print(listarArticulosPedido(request));
				break;
			
			case GUARDAR_ARTICULO:
				out.print(guardarArticulo(request));
				break;
			
			case LISTAR_ARTICULOS_FILTROS:
				out.print(listarArticulosFiltros(request));
				break;
				
			case INACTIVAR_ARTICULO:
				out.print(inactivarArticulo(request));
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
			this.beanArticulos = (BAdministracionArticulosLocal) context.lookup(EnumRecursosGenerales.BARTICULOS.getRecurso());
		}catch (NamingException e) {
			e.printStackTrace();
		}
	}
}
