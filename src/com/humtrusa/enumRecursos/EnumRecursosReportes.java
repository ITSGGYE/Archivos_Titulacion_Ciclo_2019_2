package com.humtrusa.enumRecursos;

public enum EnumRecursosReportes {
	
	//URLREPORTELOCAL("C:\\Users\\usuario\\JaspersoftWorkspace\\MyReports\\"), // PARA PRUEBAS
	URLREPORTELOCAL("C:\\Users\\usuario\\JaspersoftWorkspace\\HumtrusaReports\\src\\"),   // A PRODUCCION
	
	REPORTE_PRUEBA("prueba.jasper"),
	REPORTE_COMPRAS_PROCESADO("Compras\\OrdenCompra1\\ordenCompra.jasper"),
	REPORTE_STOCK_BODEGAS("Compras\\StockxBodegas\\stockxBodegas1.jasper"),
	REPORTE_COMPRAS_RESUMEN("Compras\\OrdenCompraResumido\\ordenesResumido.jasper"),
	REPORTE_COMPRAS_DETALLADO("Compras\\OrdenCompraDetallado\\ordenesDetallado.jasper"),
	REPORTE_COTIZACION_PROVEEDOR("Cotizaciones\\CotizacionaProveedores\\CotizacionProveedor.jasper"),
 
	/******* Default ********/
	REPORTE_DEFAULT("");
	private String recurso;
	
	EnumRecursosReportes(String recurso){
		this.recurso = recurso;
	}
	
	public String obtenerRecurso(){
		return recurso;
	}
}
