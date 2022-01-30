package com.humtrusa.reportes;

import java.io.File;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import javax.faces.context.FacesContext;
import javax.servlet.ServletException;
import javax.servlet.ServletOutputStream;
import javax.servlet.ServletRequest;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.humtrusa.daoext.Conexion;
import com.humtrusa.enumRecursos.EnumRecursosReportes;
import com.humtrusa.enumRecursos.EnumTiposExportacion;

import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JRExporter;
import net.sf.jasperreports.engine.JRExporterParameter;
import net.sf.jasperreports.engine.JasperExportManager;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperRunManager;
import net.sf.jasperreports.engine.data.JRBeanCollectionDataSource;
import net.sf.jasperreports.engine.export.JRPdfExporter;
import net.sf.jasperreports.engine.export.JRXlsExporter;
import net.sf.jasperreports.engine.export.JRXlsExporterParameter;
import net.sf.jasperreports.engine.export.ooxml.JRDocxExporter;
import net.sf.jasperreports.engine.export.ooxml.JRPptxExporter;
import net.sf.jasperreports.engine.export.ooxml.JRXlsxExporter;

/**
 * Servlet implementation class SAdministracionReportes
 */
public class SAdministracionReportes extends HttpServlet {
	private static final long serialVersionUID = 1L;
	Conexion con = new Conexion();

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public SAdministracionReportes() {
		super();
		// TODO Auto-generated constructor stub
	}

	public HashMap<String, Object> obtenerParametros(HttpServletRequest request) {
		String parametros = request.getParameter("parametros");
		HashMap<String, Object> map = new HashMap<String, Object>();
		JSONObject aux = null;
		try {
			JSONObject json = new JSONObject(parametros);
			JSONArray array = json.getJSONArray("parametros");

			for (int i = 0; i < array.length(); i++) {
				aux = (JSONObject) array.get(i);
				map.put(aux.getString("key"), aux.get("value"));
			}

		} catch (JSONException e) {
			e.printStackTrace();
		}
		return map;
	}
	
	public String obtenerURLReporte(HttpServletRequest request){
		String rutaRecurso = "";
		try{
			String tipoRuta = ((request.getParameter("tipoRuta") != null)?request.getParameter("tipoRuta"):"");
		
			EnumRecursosReportes localizacionRecurso = EnumRecursosReportes.valueOf(request.getParameter("uriReporte"));
			rutaRecurso = EnumRecursosReportes.URLREPORTELOCAL.obtenerRecurso()+localizacionRecurso.obtenerRecurso();
		}catch (Exception e) {
			// TODO: handle exception
			e.printStackTrace();
			rutaRecurso = "";
		}
		System.out.println("RUTA REPORTE: "+rutaRecurso);
		return rutaRecurso;		
	}
	
	public void exportarPDF(HttpServletRequest request,HttpServletResponse response) throws JRException, IOException {
		response.setHeader("Content-Disposition", "attachment; filename=\"reportePDF.pdf\";");
	    response.setHeader("Cache-Control", "no-cache");
	    response.setHeader("Pragma", "no-cache");
	    response.setDateHeader("Expires", 0);
	    
		String Urlpath = obtenerURLReporte(request);
		
		Map<String, Object> map = this.obtenerParametros(request);
		JasperPrint jasperPrint = JasperFillManager.fillReport(Urlpath, map, Conexion.conectar());

		ServletOutputStream stream = response.getOutputStream();
		 
		JRExporter exporter = new JRPdfExporter();
	    exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
	    exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, stream);
	    //exporter.setParameter(JRExporterParameter.OUTPUT_FILE, new java.io.File("reporte2PDF_2.pdf")); 
	    exporter.exportReport();
		
	    stream.flush();
		stream.close();
	}

	public void verPDF(HttpServletRequest request,HttpServletResponse response) throws Exception {
		//response.setHeader("Content-Disposition", "attachment; filename=\"reportePDF.pdf\";");
	    response.setHeader("Cache-Control", "no-cache");
	    response.setHeader("Pragma", "no-cache");
	    response.setDateHeader("Expires", 0);
	    
	    String Urlpath = obtenerURLReporte(request);
		
		Map<String, Object> map = this.obtenerParametros(request);
		JasperPrint jasperPrint = JasperFillManager.fillReport(Urlpath, map, Conexion.conectar());

		ServletOutputStream stream = response.getOutputStream();
		 
		JRExporter exporter = new JRPdfExporter();
	    exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
	    exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, stream);
	    exporter.setParameter(JRExporterParameter.OUTPUT_FILE, new java.io.File("reporte2PDF_2.pdf")); 
	    exporter.exportReport();
		
	    stream.flush();
		stream.close();
		
	}

	public void exportarExcel(HttpServletRequest request,HttpServletResponse response) throws JRException, IOException {
		
		response.setHeader("Content-Disposition", "attachment; filename=\"reporteExcel.xls\";");
	    response.setHeader("Cache-Control", "no-cache");
	    response.setHeader("Pragma", "no-cache");
	    
		String Urlpath = obtenerURLReporte(request);
		Map<String, Object> map = this.obtenerParametros(request);
		
		JasperPrint jasperPrint = JasperFillManager.fillReport(Urlpath, map, Conexion.conectar());
		
		ServletOutputStream outStream = response.getOutputStream();
		/**
		JRXlsExporter exporter = new JRXlsExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, outStream);
		
		exporter.setParameter(JRXlsExporterParameter.IS_REMOVE_EMPTY_SPACE_BETWEEN_ROWS, Boolean.TRUE);
		//exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, response.getOutputStream()); 
		exporter.setParameter(JRXlsExporterParameter.SHEET_NAMES, new String[] { "Documento" });
		exporter.setParameter(JRXlsExporterParameter.IS_DETECT_CELL_TYPE, Boolean.TRUE);
		**/
		JRXlsxExporter exporter = new JRXlsxExporter();		
		exporter.setParameter(JRXlsExporterParameter.IS_REMOVE_EMPTY_SPACE_BETWEEN_ROWS, Boolean.TRUE);
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, response.getOutputStream());
		exporter.setParameter(JRXlsExporterParameter.SHEET_NAMES, new String[] { "Documento" });
		exporter.setParameter(JRXlsExporterParameter.IS_DETECT_CELL_TYPE, Boolean.TRUE);
		exporter.exportReport();

		outStream.flush();
		outStream.close();
		
	}

	public void exportarDOC(HttpServletRequest request) throws JRException, IOException {
		String Urlpath = request.getParameter("url");
		Map<String, Object> map = this.obtenerParametros(request);
		
		JasperPrint jasperPrint = JasperFillManager.fillReport(Urlpath, map, Conexion.conectar());

		HttpServletResponse response = (HttpServletResponse) FacesContext.getCurrentInstance().getExternalContext().getResponse();
		response.addHeader("Content-disposition", "attachment; filename=jsfReporte.doc");
		ServletOutputStream outStream = response.getOutputStream();

		JRDocxExporter exporter = new JRDocxExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, outStream);
		exporter.exportReport();

		outStream.flush();
		outStream.close();
		FacesContext.getCurrentInstance().responseComplete();
	}

	public void exportarPPT(HttpServletRequest request) throws JRException, IOException {
		String Urlpath = request.getParameter("url");
		Map<String, Object> map = this.obtenerParametros(request);
		
		JasperPrint jasperPrint = JasperFillManager.fillReport(Urlpath, map, Conexion.conectar());

		HttpServletResponse response = (HttpServletResponse) FacesContext.getCurrentInstance().getExternalContext().getResponse();
		response.addHeader("Content-disposition", "attachment; filename=jsfReporte.ppt");
		ServletOutputStream outStream = response.getOutputStream();

		JRPptxExporter exporter = new JRPptxExporter();
		exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
		exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, outStream);
		exporter.exportReport();

		outStream.flush();
		outStream.close();
		FacesContext.getCurrentInstance().responseComplete();
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		procesar(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		procesar(request, response);
	}

	private void procesar(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		response.setContentType("text/html");
		try {
			if (request.getParameter("orden").equalsIgnoreCase("EXPORTAR")) {
				System.out.println("** ORDEN: **" + request.getParameter("tipo"));
				// this.enviarEjecucionInterface(request,response);
				System.out.println("1");
				EnumTiposExportacion tipoExportacion = EnumTiposExportacion.valueOf(request.getParameter("tipo"));
				switch (tipoExportacion) {
				case HTML:
					response.setContentType("text/html");
					exportarPDF(request,response);
					break;
				case PDF:
					response.setContentType("application/pdf");
					exportarPDF(request,response);
					break;
				case VER_PDF:
					response.setContentType("application/pdf");
					verPDF(request,response);
					break;
				case XLS:
					response.setContentType("application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
					exportarExcel(request,response);
					break;
				case RTF:
					response.setContentType("application/rtf");
				}
				
				
			}
			System.out.println("3");
		} catch (Exception e) {
			e.printStackTrace();
		}
	}
}
