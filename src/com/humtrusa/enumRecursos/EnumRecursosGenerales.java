package com.humtrusa.enumRecursos;

import com.humtrusa.beans.BAdministracionProveedoresLocal;

public enum EnumRecursosGenerales {
 LISTAR_ALUMNOS_FILTROS("LISTAR_ALUMNOS_FILTROS"),
 LOGIN("LOGIN"),
 OBTENER_EMPRESAS("OBTENER_EMPRESAS"),
 OBTENER_AGENCIASXEMPRESAS("OBTENER_AGENCIASXEMPRESAS"),
 OBTENER_ESTADOS("OBTENER_ESTADOS"),

 
 /**RECURSOS TRANSPORTE **/
 MODELO_SEGURIDADES("modeloSeguridad"),
 MODELO_VISTAS("modeloVista"),
 
 /** RECURSOS SEGURIDAD **/
 BSEGURIDADES("servidor/BAdministracionGeneral"),


	
/** BEANS **/
BARTICULOS("servidor/BAdministracionArticulos"),
BPEDIDOCOMPRA("servidor/BAdministracionPedidoCompra"),
BUMEDIDAS("servidor/BAdministracionUMedida"),
BBODEGAS("servidor/BAdministracionBodegas"),
BPERMISOSXPERFIL("servidor/BAdministracionPermisosxPefil"),
BCOTIZACIONES("servidor/BAdministracionCotizaciones"),
BDEFAULT("default");
	
 EnumRecursosGenerales(String recurso){
	this.recurso = recurso;
 }
 
 private String recurso;
	
 public String getRecurso(){
	return this.recurso;
 }
 
}
