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

import com.humtrusa.beans.BAdministracionArticulosLocal;
import com.humtrusa.beans.BAdministracionPedidoCompraLocal;
import com.humtrusa.enumRecursos.EnumPedidoCompra;
import com.humtrusa.enumRecursos.EnumRecursosArticulos;
import com.humtrusa.enumRecursos.EnumRecursosGenerales;
import com.humtrusa.estandarizadores.estandarizador;

/**
 * Servlet implementation class SAdministracionPedidoCompra
 */
public class SAdministracionPedidoCompra extends HttpServlet {
	private static final long serialVersionUID = 1L;
	BAdministracionPedidoCompraLocal bpedido = null;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SAdministracionPedidoCompra() {
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
	
	public String guardarPedido(HttpServletRequest request) {
		
		String codEmpresa = request.getParameter("codEmpresa");
        String codagenciapedido = request.getParameter("codagenciapedido");
        String numerocompra= request.getParameter("numerocompra");
        String tipopedido= request.getParameter("tipopedido");
        String codestado= request.getParameter("codestado");
        String tipopago= request.getParameter("tipopago");
        String codproveedor= request.getParameter("codproveedor");
        String codusuariocreacion= request.getParameter("codusuariocreacion");
        Date fechacreacion= estandarizador.obtenerFecha(request.getParameter("fechacreacion"),"dd/MM/yyyy");
        String descripcion= request.getParameter("descripcion");
        Date fecha_requerida= estandarizador.obtenerFecha(request.getParameter("fecha_requerida"),"dd/MM/yyyy");
        Date fecha_promesa= estandarizador.obtenerFecha(request.getParameter("fecha_promesa"),"dd/MM/yyyy");
        double subtotal= Double.parseDouble(request.getParameter("subtotal").replace(",", ""));
        double descuento= Double.parseDouble(request.getParameter("descuento"));
        double porcimpuesto= Double.parseDouble(request.getParameter("porcimpuesto"));
        double impuesto= Double.parseDouble(request.getParameter("impuesto"));
        double total = Double.parseDouble(request.getParameter("total").replace(",", ""));
        //Detalle Pedido
        String detallePedido= request.getParameter("detallePedido");
        String modo = request.getParameter("modo");
        String retorno = "";
		try {
			retorno = bpedido.guardarPedido(
        						Long.parseLong(codEmpresa),
        						Long.parseLong(codagenciapedido),
        						numerocompra,
        						Long.parseLong(tipopedido),
        						Long.parseLong(codestado),
        						Long.parseLong(tipopago),
        						Long.parseLong(codproveedor),
        						codusuariocreacion,
        						fechacreacion,
        						descripcion,
        						fecha_requerida,
        						fecha_promesa,
        						subtotal,
        						descuento,
        						porcimpuesto,
        						impuesto,
        						total,
        						detallePedido,modo
        		);
		}catch (Exception e) {
			e.printStackTrace();
			e.getMessage();
		}
		return retorno;
	}
	
	public String guardarCompra(HttpServletRequest request) {
		
		long codEmpresa = Long.parseLong(request.getParameter("codEmpresa"));
        long codagenciapedido = Long.parseLong(request.getParameter("codagenciapedido"));
        String numerocompra= request.getParameter("numerocompra");
        long codestado= Long.parseLong(request.getParameter("codestado"));
        long codproveedor= Long.parseLong(request.getParameter("codproveedor"));
        String codusuariocambioestado= request.getParameter("codusuario");
        Date fechacambioestado = new Date();//estandarizador.obtenerFecha(request.getParameter("fecha"),"dd/MM/yyyy");
        String observacion= request.getParameter("observacion");
        double subtotal= Double.parseDouble(request.getParameter("subtotal").replace(",", ""));
        double descuento= Double.parseDouble(request.getParameter("descuento"));
        double porcimpuesto= Double.parseDouble(request.getParameter("porcimpuesto"));
        double impuesto= Double.parseDouble(request.getParameter("impuesto"));
        double total = Double.parseDouble(request.getParameter("total").replace(",", ""));
        //Detalle Pedido
        String detalleCompra= request.getParameter("detalleCompra");
        String retorno = "";
		try {
			retorno = bpedido.guardarCompra(codEmpresa,codagenciapedido,numerocompra,codestado,codproveedor,codusuariocambioestado,fechacambioestado,observacion,subtotal,
    		        descuento,porcimpuesto,impuesto,total,detalleCompra);
		}catch (Exception e) {
			e.printStackTrace();
			e.getMessage();
		}
		return retorno;
	}
	
	public String listarPedidoFiltros(HttpServletRequest request){
		System.out.println("request.getParameter(\"fechadesde\"): "+request.getParameter("fechadesde")+" est"+ request.getParameter("codestado"));
		int start = Integer.valueOf((request.getParameter("start")!=null?request.getParameter("start"):"0"));
		int limit= Integer.valueOf((request.getParameter("limit")!=null?request.getParameter("limit"):"0")); 
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String codproveedor = (request.getParameter("codproveedor"));
		String codpedido = ((!"".equals(request.getParameter("codigo")) && request.getParameter("codigo")!=null)?request.getParameter("codigo"):"0");
		String numdocumento = ((!"".equals(request.getParameter("numdocumento")) && !"0".equals(request.getParameter("numdocumento")))?request.getParameter("numdocumento"):"0");
		String codestado = ((!"".equals(request.getParameter("codestado")) && request.getParameter("codestado")!=null)?request.getParameter("codestado"):"0");
		Date fechadesde = ((request.getParameter("fechadesde")!=null && !"".equals(request.getParameter("fechadesde")))?estandarizador.obtenerFecha(request.getParameter("fechadesde"), "dd/MM/yyyy"):null);
		Date fechahasta = ((request.getParameter("fechahasta")!=null && !"".equals(request.getParameter("fechahasta")))?estandarizador.obtenerFecha(request.getParameter("fechahasta"), "dd/MM/yyyy"):null);
		/*
		String codmarca = ((!"".equals(request.getParameter("codmarca")) && !"0".equals(request.getParameter("codmarca")))?request.getParameter("codmarca"):"0");
		String codlinea = ((!"".equals(request.getParameter("codlinea")) && !"0".equals(request.getParameter("codlinea")))?request.getParameter("codlinea"):"0");
		String codsublinea = ((!"".equals(request.getParameter("codsublinea")) && !"0".equals(request.getParameter("codsublinea")))?request.getParameter("codsublinea"):"0");
		*/
		return bpedido.listarPedidoFiltros( start,limit,
											codempresa, 
											Long.parseLong(codpedido), 
											codproveedor,
											numdocumento,
											codestado,
											fechadesde,
											fechahasta
											);
		
	}
	
	public String listarDetallesPedido(HttpServletRequest request){
		int start = Integer.valueOf((request.getParameter("start")!=null?request.getParameter("start"):"0"));
		int limit= Integer.valueOf((request.getParameter("limit")!=null?request.getParameter("limit"):"0"));
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		long codagenciapedido = (Long.parseLong(request.getParameter("codagenciapedido")));
		long codpedido = (Long.parseLong(request.getParameter("codpedido")));
		String numdocumento = (!"".equals(request.getParameter("numdocumento"))?request.getParameter("numdocumento"):"");
		
		return bpedido.listarDetallesPedido(start, limit, codagenciapedido, codpedido, numdocumento); 
											
	}
	
	public String aprobarPedido(HttpServletRequest request) {
		
		String codEmpresa = request.getParameter("codEmpresa");
        String codagenciapedido = request.getParameter("codagenciapedido");
        String numerocompra= request.getParameter("numerocompra");
        String tipopedido= request.getParameter("tipopedido");
        String codestado= request.getParameter("codestado");
        String usuario = request.getParameter("codusuario");
        Date fecha = new Date();
        String retorno = "";
		try {
			retorno = bpedido.aprobarPedido(
        						Long.parseLong(codEmpresa),
        						Long.parseLong(codagenciapedido),
        						numerocompra,
        						Long.parseLong(tipopedido),
        						Long.parseLong(codestado),usuario,fecha
        		);
		}catch (Exception e) {
			e.printStackTrace();
			e.getMessage();
		}
		return retorno;
	}
	
	public String anularPedido(HttpServletRequest request) {
			
			String codEmpresa = request.getParameter("codEmpresa");
	        String codagenciapedido = request.getParameter("codagenciapedido");
	        String numerocompra= request.getParameter("numerocompra");
	        String tipopedido= request.getParameter("tipopedido");
	        String codestado= request.getParameter("codestado");
	        String motivo = request.getParameter("motivoanulacion");
	        String usuario = request.getParameter("codusuario");
	        Date fecha = new Date();
	        String retorno = "";
			try {
				retorno = bpedido.anularPedido(
	        						Long.parseLong(codEmpresa),
	        						Long.parseLong(codagenciapedido),
	        						numerocompra,
	        						Long.parseLong(tipopedido),
	        						Long.parseLong(codestado),
	        						motivo,usuario,fecha
	        		);
			}catch (Exception e) {
				e.printStackTrace();
				e.getMessage();
			}
			return retorno;
		}
	
	public String InactivarPedido(HttpServletRequest request) {
		
		String codEmpresa = request.getParameter("codEmpresa");
        String codagenciapedido = request.getParameter("codagenciapedido");
        String numerocompra= request.getParameter("numerocompra");
        String tipopedido= request.getParameter("tipopedido");
        String codestado= request.getParameter("codestado");
        //String motivo = request.getParameter("motivoanulacion");
        String usuario = request.getParameter("codusuario");
        Date fecha = new Date();
        String retorno = "";
		try {
			retorno = bpedido.inactivarPedido(
        						Long.parseLong(codEmpresa),
        						Long.parseLong(codagenciapedido),
        						numerocompra,
        						Long.parseLong(tipopedido),
        						Long.parseLong(codestado),
        						usuario,fecha
        		);
		}catch (Exception e) {
			e.printStackTrace();
			e.getMessage();
		}
		return retorno;
	}
	
	private void procesar(HttpServletRequest request,
			HttpServletResponse response)throws ServletException, IOException{
		//response.setContentType("text/xml");
		response.setCharacterEncoding("ISO-8859-1");
		PrintWriter out = response.getWriter();
		System.out.println("orden "+request.getParameter("orden"));
		EnumPedidoCompra enumOrdenes = EnumPedidoCompra.valueOf(request.getParameter("orden"));
		
		switch(enumOrdenes){
			
			case GUARDAR_PEDIDO: 
				//response.setContentType("text/xml");
				out.print(guardarPedido(request));
				break;
			case LISTAR_PEDIDOS_X_FILTROS:
				out.print(listarPedidoFiltros(request));
				break;
			
			case LISTAR_DETALLES_PEDIDOS:
				out.print(listarDetallesPedido(request));
				break;
			case APROBAR_PEDIDO:
				out.print(aprobarPedido(request));
				break;
			case ANULAR_PEDIDO:
				out.print(anularPedido(request));
				break;
			case GUARDAR_COMPRA:
				response.setContentType("text/json");
				out.print(guardarCompra(request));
				break;
			case INACTIVAR_PEDIDO:
				response.setContentType("text/json");
				out.print(InactivarPedido(request));
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
			this.bpedido = (BAdministracionPedidoCompraLocal) context.lookup(EnumRecursosGenerales.BPEDIDOCOMPRA.getRecurso());
		}catch (NamingException e) {
			e.printStackTrace();
		}
	}

}
