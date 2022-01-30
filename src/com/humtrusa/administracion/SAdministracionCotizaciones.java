package com.humtrusa.administracion;

import java.io.IOException;
import java.io.PrintWriter;
import java.nio.charset.Charset;
import java.util.Date;
import java.util.List;

import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.apache.commons.fileupload.FileItem;
import org.apache.commons.fileupload.FileItemFactory;
import org.apache.commons.fileupload.disk.DiskFileItemFactory;
import org.apache.commons.fileupload.servlet.ServletFileUpload;

import com.csvreader.CsvReader;
import com.humtrusa.beans.BAdministracionArticulosLocal;
import com.humtrusa.beans.BAdministracionCotizacionesLocal;
import com.humtrusa.enumRecursos.EnumRecursosArticulos;
import com.humtrusa.enumRecursos.EnumRecursosCotizaciones;
import com.humtrusa.enumRecursos.EnumRecursosGenerales;
import com.humtrusa.estandarizadores.estandarizador;
import com.humtrusa.servicios.BeanSeguridad;

/**
 * Servlet implementation class SAdministracionCotizaciones
 */
public class SAdministracionCotizaciones extends HttpServlet {
	private static final long serialVersionUID = 1L;
	BAdministracionCotizacionesLocal cotizaciones;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SAdministracionCotizaciones() {
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
	
	public String listarDetallesCotizacion(HttpServletRequest request){
		int start = Integer.valueOf((request.getParameter("start")!=null?request.getParameter("start"):"0"));
		int limit= Integer.valueOf((request.getParameter("limit")!=null?request.getParameter("limit"):"0"));
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		long codagenciapedido = (Long.parseLong(request.getParameter("codagenciapedido")));
		long codpedido = (Long.parseLong(request.getParameter("codpedido")));
		String numdocumento = (!"".equals(request.getParameter("numdocumento"))?request.getParameter("numdocumento"):"");
		
		return cotizaciones.listarDetallesCotizaciones(start, limit, codagenciapedido, codpedido, numdocumento); 
											
	}
	
	public String guardarCotizacion(HttpServletRequest request) {
		long codEmpresa = Long.parseLong(request.getParameter("codEmpresa"));
        long codagenciapedido = Long.parseLong(request.getParameter("codagenciapedido"));
        String codcotizacion= request.getParameter("codcotizacion");
        String grupo= request.getParameter("grupo");
        long tipocotizacion = (request.getParameter("tipocotizacion")!=null?Long.parseLong(request.getParameter("tipocotizacion")):0l);
        long codestado= Long.parseLong(request.getParameter("codestado"));
        long codproveedor= Long.parseLong(request.getParameter("codproveedor"));
        String codusuariocreacion= request.getParameter("codusuariocreacion");
        Date fechacreacion= estandarizador.obtenerFecha(request.getParameter("fechacreacion"),"dd/MM/yyyy");
        String terminos= request.getParameter("terminos");
        Date fecha_valida= estandarizador.obtenerFecha(request.getParameter("fecha_valida"),"dd/MM/yyyy");
        double subtotal= Double.parseDouble(request.getParameter("subtotal").replace(",", ""));
        double descuento= Double.parseDouble(request.getParameter("descuento"));
        double porcimpuesto= Double.parseDouble(request.getParameter("porcimpuesto"));
        double impuesto= Double.parseDouble(request.getParameter("impuesto"));
        double total = Double.parseDouble(request.getParameter("total").replace(",", ""));
        //Detalle Pedido
        String detalle= request.getParameter("detalle");
        String modo = request.getParameter("modo");
        String retorno = "";
		try {
			retorno = cotizaciones.guardarCotizacion(codEmpresa, codagenciapedido, codcotizacion, grupo, tipocotizacion, codestado, codproveedor, codusuariocreacion, fechacreacion, terminos, fecha_valida, subtotal, descuento, porcimpuesto, impuesto, total, detalle, modo);
		}catch (Exception e) {
			e.printStackTrace();
			e.getMessage();
		}
		return retorno;
	}
	
	public String listarCotizacionesFiltros(HttpServletRequest request){
		HttpSession sesion = request.getSession();
		BeanSeguridad bean= (BeanSeguridad)sesion.getAttribute("beanSeguridad");
		long codagencia = Long.parseLong(bean.getAgencia());
		
		System.out.println("request.getParameter(\"fechadesde\"): "+request.getParameter("fechadesde")+" est"+ request.getParameter("codestado"));
		int start = Integer.valueOf((request.getParameter("start")!=null?request.getParameter("start"):"0"));
		int limit= Integer.valueOf((request.getParameter("limit")!=null?request.getParameter("limit"):"0")); 
		long codempresa = (Long.parseLong(request.getParameter("codempresa")));
		String codproveedor = (request.getParameter("codproveedor"));
		String codcotizacion = ((!"".equals(request.getParameter("codigo")) && request.getParameter("codigo")!=null)?request.getParameter("codigo"):"0");
		String grupo = ((!"".equals(request.getParameter("grupo")) && !"0".equals(request.getParameter("grupo")))?request.getParameter("grupo"):"0");
		String codestado = ((!"".equals(request.getParameter("codestado")) && request.getParameter("codestado")!=null)?request.getParameter("codestado"):"0");
		Date fechadesde = ((request.getParameter("fechadesde")!=null && !"".equals(request.getParameter("fechadesde")))?estandarizador.obtenerFecha(request.getParameter("fechadesde"), "dd/MM/yyyy"):null);
		Date fechahasta = ((request.getParameter("fechahasta")!=null && !"".equals(request.getParameter("fechahasta")))?estandarizador.obtenerFecha(request.getParameter("fechahasta"), "dd/MM/yyyy"):null);
		
		return cotizaciones.listarCotizacionesFiltros( start,limit,
											codempresa, 
											Long.parseLong(codcotizacion),
											codproveedor,
											grupo,
											codestado,
											fechadesde,
											fechahasta
											);
	}
	
	public String cargarArchivoCOT(HttpServletRequest request,HttpServletResponse response){
		
		HttpSession sesion=request.getSession(false);		
		BeanSeguridad beansesion=(BeanSeguridad)sesion.getAttribute("beanSeguridad");
		String codEmpresaLogoneada=beansesion.getEmpresa();
		String codUsuarioLogoneado= beansesion.getUsuario();
		
		String codEmpresa = request.getParameter("codempresa");
	    String codAgencia = request.getParameter("codagencia");		
	    String codcotizacion = request.getParameter("codcotizacion");	
		
		response.setContentType("text/html");
		
		FileItemFactory factory = new DiskFileItemFactory();
		ServletFileUpload upload = new ServletFileUpload(factory);
		
		StringBuffer respuesta  = new StringBuffer();
		String salida = "";
		String mensajeError = "";
		int contador_cargados = 0;
		String termino =null;
        String fechaValida =null;
        String codCotiza = null;
        
		try{
		 System.out.println("isMultipartContent: "+(ServletFileUpload.isMultipartContent(request)));
			
		// req es la HttpServletRequest que recibimos del formulario.
		// Los items obtenidos serán cada uno de los campos del formulario,
		// tanto campos normales como ficheros subidos.
		List items = upload.parseRequest(request);
		
		
		System.out.println("archivos: "+items.size());
		// Se recorren todos los items, que son de tipo FileItem
		for (Object item : items) {
		   FileItem fileItem = (FileItem) item;

		    //// Atributo "name" del elemento input type="file"
			String nombreCampo = fileItem.getFieldName();
			//// Tamaño de archivo en bytes
			long tamanioArchivo = fileItem.getSize();

			//// Nombre del archivo en el cliente. Algunos navegadores (por ej. IE 6)
			//// incluyen el path completo, lo que puede implicar separar path
			//// de nombre.
			String nombreArchivo = fileItem.getName();

			//// Content type (tipo MIME) del archivo.
			//// Esta información la proporciona el navegador del cliente.
			//// Algunos ejemplos: .jpg = image/jpeg, .txt = text/plain
			String contentType = fileItem.getContentType();
			//// Obtengo extensión del archivo de cliente
			String extension = nombreArchivo.substring(nombreArchivo.indexOf("."));
			
			//// Obtengo caracteristicas de campo y archivo
			System.out.println( "<p>--> Name:" + nombreCampo + "</p>");
			System.out.println( "<p>--> Tamaño archivo:" + tamanioArchivo + "</p>");
			System.out.println( "<p>--> Nombre archivo del cliente:" + nombreArchivo + "</p>");
			System.out.println( "<p>--> contentType:" + contentType + "</p>");
			System.out.println( "<p>--> Extensión del archivo:" + extension + "</p>");

			// si es un csv valido
            if(contentType.compareTo("text/csv")== 0 || extension.compareToIgnoreCase(".csv") == 0)
            {
            	System.out.println("Charset --> "+Charset.defaultCharset());
            	
            	char c = ';';
				CsvReader reader = new CsvReader(fileItem.getInputStream(), c, Charset.defaultCharset());
				 
				 String id = null;
            	 String precio = null;
                 String iva = null;
                 String descuento = null;
                 String cadena = "";
                 contador_cargados = 0;
                 
                
                 respuesta.append("{\"success\":true,\"exito\":true,\"cargaTodos\":{0},\"mensaje\":\"{1}\",\"fechavalida\":\"{2}\",\"terminos\":\"{3}\",\"articulos\":[");                
            	//recorrer el archivo
                while (reader.readRecord())
                { 
                	System.out.println("Celda 1 "+reader.get(1));
                	if( reader.get(1).indexOf("COTIZACION")==0) {
                		 System.out.println("cot "+reader.get(1));
                  		 int start = reader.get(1).indexOf("COTIZACION")+13;
              		     int limit = reader.get(1).length();
              		     System.out.println("cot"+reader.get(1).substring(start+1,limit));
              		   codCotiza = reader.get(1).substring(start+1,limit);
              		  if(Integer.parseInt(codCotiza) != Integer.parseInt(codcotizacion)) {
              			  //
              			/*String ee = "El Archivo Cargado No Corresponde al N° Cotizaci&oacute;n.";
              			respuesta.delete(0, respuesta.length());
            			respuesta.append("{success:true,exito:false,mensaje:'"+ee+"'}");*/
            			throw new Exception("El Archivo Cargado No Corresponde al N° Cotizaci&oacute;n.");
              		  }
                  	 }
                	if( reader.get(1).indexOf("Valida:")>0) { 
               		 System.out.println(reader.get(1));
               		 int start = reader.get(1).indexOf("Valida:")+7;
           		     int limit = reader.get(1).length();
           		     System.out.println("fechava"+reader.get(1).substring(start+1,limit));
           		     fechaValida = reader.get(1).substring(start+1,limit);
               	 	}
                	if( reader.get(1).indexOf("Condiciones:")>0) {
                  		 System.out.println(reader.get(1));
                  		 int start = reader.get(1).indexOf("Condiciones:")+13;
              		     int limit = reader.get(1).length();
              		     System.out.println("condic"+reader.get(1).substring(start+1,limit));
              		      termino = reader.get(1).substring(start+1,limit);
                  	 }
                	if(!"".equals(reader.get(4)) && !"Precio".equals(reader.get(4))) {
                		id = (reader.get(1)).trim();
                		precio = (reader.get(5)).trim();
                		descuento = (reader.get(7)).trim();
                        iva = (reader.get(8)).replace("$","").trim();
                        System.out.println("codbodegaAgencia: "+codAgencia+" ==>("+id+" ," + precio + "', '" + descuento + "', " + iva + ")");
                	
	                   try{
	                	   if(id!=null && !"".equals(id) && !"Item".equals(id)) { 
		                   cadena = cotizaciones.generarDatosArchivo(Long.parseLong(codEmpresa), Long.parseLong(codAgencia), codcotizacion, id, precio, descuento, iva);
	                	   respuesta.append((cadena.length() > 0)?((contador_cargados>0)?(","+cadena):(cadena)):(""));	                   
		                   contador_cargados++;
	                	   }
	                   }catch (Exception e1) {
	                	   // TODO: handle exception
	                	   e1.printStackTrace();
	                	   mensajeError += id+" ("+e1.getMessage()+"), ";
	                   }
                	}
                }
                respuesta.append("]}");
                reader.close();
            }
            else
            	throw new Exception("No se envio un tipo de archivo CSV valido!..");

		}
	
		
		}catch(Exception e) {
			e.printStackTrace();
			respuesta.delete(0, respuesta.length());
			respuesta.append("{success:true,exito:false,mensaje:'"+e.getMessage()+"'}");
		}		
		
		salida = respuesta.toString();
		
	    /** Item con errores ****/
        if(mensajeError.length()> 0){
        	salida = salida.replace("{0}", "false");
        	salida = salida.replace("{1}", "Los Articulos "+((contador_cargados>0)?("("+mensajeError.substring(0,mensajeError.length()-3)+")"):(""))+" no fueron cargados..<br> <b>MOTIVOS:</b><br> 1.- Articulos  no pertenecen a la empresa. <br> 2.- Unidad Medida no corresponde a la Unidad de Inventario. <br>  3.- Stock insuficiente para generar egreso. <br>  4.- Articulo tiene costo 0.");
        }
        else
        {
        	salida = salida.replace("{0}", "true");
        	salida = salida.replace("{1}","");
        	salida = salida.replace("{2}", (fechaValida!=null?fechaValida:""));
        	salida = salida.replace("{3}", (termino!=null?termino:""));
        }
        /********************************/
        
		System.out.println(salida);	
		return salida;		
	}
	
	public String CambioEstadoCotizacion(HttpServletRequest request) {
		long codEmpresa = Long.parseLong(request.getParameter("codEmpresa"));
        long codagenciapedido = Long.parseLong(request.getParameter("codagenciapedido"));
        String codcotizacion= request.getParameter("codcotizacion");
        String grupo= request.getParameter("grupo");
        long codestado= Long.parseLong(request.getParameter("codestado"));
        return cotizaciones.EstadoCotizacion(codEmpresa, codagenciapedido, codcotizacion, grupo, codestado);
	}
	private void procesar(HttpServletRequest request,
			HttpServletResponse response)throws ServletException, IOException{
		//response.setContentType("text/xml");
		response.setCharacterEncoding("ISO-8859-1");
		PrintWriter out = response.getWriter();
		System.out.println("orden "+request.getParameter("orden"));
		EnumRecursosCotizaciones enumOrdenes = EnumRecursosCotizaciones.valueOf(request.getParameter("orden"));
		
		switch(enumOrdenes){
			
			case LISTAR_COTIZACIONES_FILTROS: 
				//response.setContentType("text/xml");
				out.print(listarCotizacionesFiltros(request));
				break;
				
			case GUARDAR_COTIZACIONES:
				out.print(guardarCotizacion(request));
				break;
				
			case OBTENER_DETALLE_COTIZACION:
				out.print(listarDetallesCotizacion(request));
				break;
			
			case CARGAR_ARCHIVO:
				String salida  =  this.cargarArchivoCOT(request, response);
				response.setContentType("text/html");
				out.print(salida);		
				break;
			
			case COTIZACION_ESTADO:
				out.print(CambioEstadoCotizacion(request));
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
			this.cotizaciones = (BAdministracionCotizacionesLocal) context.lookup(EnumRecursosGenerales.BCOTIZACIONES.getRecurso());
		}catch (NamingException e) {
			e.printStackTrace();
		}
	}

}
