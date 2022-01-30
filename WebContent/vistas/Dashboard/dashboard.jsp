<%@page import="com.humtrusa.estandarizadores.estandarizador"%>
<%@page import="com.lowagie.text.Document"%>
<%@ page language="java" pageEncoding="ISO-8859-1"%>
<%@ page language="java" import="com.humtrusa.servicios.*" %>
<%@ taglib prefix="ext" tagdir="/WEB-INF/tags/ext"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ page import='java.util.*' %>


<% 
	String path = request.getContextPath();
	String basePath = request.getScheme() + "://" + request.getServerName() + ":" + request.getServerPort()
			+ path + "/"; 
%>

<!DOCTYPE html>
<html>

<head>  
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="cache-Control" content="no-store" />
<meta http-equiv="expires" content="0">
<meta charset="ISO-8859-1">  
<script language="javascript" src="../../js/ext-2.2/adapter/ext/ext-base.js"></script>
<script language="javascript" src="../../js/ext-2.2/ext-all.js"></script>
<script type="text/javascript" src="/humtrusaDESAWeb/vistas/PantallaPrincipal/ParametrosVista.jsp"></script>
<link rel="stylesheet" href="../../js/ext-2.2/resources/css/ext-all.css" />
 <!-- 
<link rel="stylesheet" type="text/css" href="../js/ext-2.2/resources/css/xtheme-gray.css" />
 <base href="<%//=basePath%>"> 
--> 
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>BIENVENIDOS A HUMTRUSA & COMERCIO S.A.</title>
<%
		BeanSeguridad beanSeguridad = null;
		beanSeguridad = (BeanSeguridad) request.getSession().getAttribute("beanSeguridad");
		if(beanSeguridad != null){
			String fechaIngreso = estandarizador.obtenerFechaComoCadena(beanSeguridad.getFechaActual(),"dd/MM/yyyy"); 
			pageContext.setAttribute("fechaingreso", fechaIngreso);
		}else{
			%>		
					<script type="text/javascript">
					 var sms = "Sesión Caducada, Inicie Sesión Nuevamente";
					 alert(sms); 
					 window.location.href ="../../servlet/SSalida";  
					</script> 
			<%
		}
%>
<style type="text/css">
.estilo_fondo {
	background-image: url("../../vistas/Login/logo8.jpg");
	backgroun-repeat: no-repeat;
	/*background-repeat: repeat-x repeat-y;
	 background-size: 25px 50px;*/
    background-size: 100% 108%; 
    
}  

.barra_dashboard {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	background: #A8C3E5;
	background-image: url("../../imagenes/dashboard/fondoTitulo1.png");
	background-repeat: repeat-x;
	color: #635729;
	padding-top: 6px;
	padding-bottom: 4px;
}

.fechas_dashboard {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	text-align: left;
	background-image: url("../../imagenes/dashboard/icono_fondo_titulo.png");
	background-repeat: repeat-x;
	padding-top: 2px;
	padding-bottom: 2px;
	padding-left: 10px;
}

.titulos_horizontales_dashboard {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}

.datos_dashboard {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: blue;
	font-weight: bold;
}

.fondo_dashboard {
	background-image: url("../../imagenes/dashboard/fondoPanel.png");
	background-repeat: repeat-x repeat-y; 
}
</style>

</head>
<body>
	<ext:body extLocation="../../js/ext-2.2" locale="es" loadingMask="true"
		lista_js="../../js/etech/Ext.ux.grid.CellActions.js| ../../js/etech/Ext.ux.plugins.js| ../../js/etech/Ext.ux.grid.CheckBoxColumn.js">
		<script type="text/javascript" src="../../vistas/Login/vista_dashboard.js"></script>
		<ext:viewport layout="border">
			<!-- PANEL GENERAL NORTE - DATOS DE LA EMPRESA -->
			<ext:panel region="north" height="60">
				<ext:panel>
   					<jsp:include page="../../vistas/Dashboard/panelNorteHG.jsp"></jsp:include> 
   				</ext:panel>
			</ext:panel>  
			
			<!-- PANEL GENERAL CENTRO - MENU DINAMICO -->
			<ext:panel region="center" height="500" id="panelGeneral" 
				name="panelGeneral">

				<ext:toolbar id="tbarGeneral">
					<ext:toolbar.separator />
					<ext:toolbar.button text="Cerrar Sesion"
						onClick="document.location='../../servlet/SSalida';" />
				</ext:toolbar> 

				<table  class="estilo_fondo" width="100%" height="100%"
					cellpadding="10" cellspacing="10">
					<tr>
						<!--  
						<td valign="top">
							<div align="left">
								<img src="imagenes/tip_principal.png">
							</div> 
						</td>
						 -->
						<td valign="top"> 
							<div id="panelInformacion">
								<table border="0" cellpadding="5px" cellspacing="5px"
									class="fondo_dashboard" align="left" width="350" height="325"> 
									<tr>
										<td align="center" class="barra_dashboard"> Industria y Comercio  <br> Somos Materia Prima Para Su Negocio</td>
									</tr>
									<tr>  
										<td>
											<!-- Contenedor de datos de usuario -->
											<table border="0">
												<tr>
													<td><img src="../../imagenes/dashboard/user.png" /></td>
													<td>
														<!-- Subcontenedos de datos -->
														<table border="0">
															<tr>
																<td class="titulos_horizontales_dashboard">Rol:</td>
																<td class="datos_dashboard">${beanSeguridad.detallePerfilUsuario}</td>
															</tr>
															<tr>
																<td class="titulos_horizontales_dashboard">Nombres:</td>
																<td class="datos_dashboard">${beanSeguridad.nombreUsuario}</td>
															</tr>
														</table> <!-- fin de subcontenedor -->
													</td>
												</tr>
											</table> <!-- Fin de contenedor -->
										</td>
									</tr>
									<tr>
										<td>
											<!-- Contenedor de datos de perfil -->
											<table border="0"> 
												<tr>
													<td><img src="../../imagenes/dashboard/baseDatos.png" /></td>
													<td>
														<!-- Subcontenedos de datos -->
														<table border="0">
															<tr>
																<td class="titulos_horizontales_dashboard">Empresa:</td>
																<td class="datos_dashboard">${beanSeguridad.nombreEmpresa}</td>
															</tr>
															<tr>
																<td class="titulos_horizontales_dashboard">Agencia:</td>
																<td class="datos_dashboard">${beanSeguridad.nombreAgencia}
																</td>
															</tr>
														</table> <!-- fin de subcontenedor -->
													</td>
												</tr>
											</table> <!-- Fin de contenedor -->
										</td> 
									</tr>
									<tr>
										<td>
											<!-- Contenedor de datos de sesion -->
											<table border="0">
												

											</table> <!-- Fin de contenedor -->
										</td>

									</tr>
									

								</table> 
								<!-- WIGGET DE LA HORA GUAYAQUIL -->  
								<table border="0" style="padding-top: 25%" cellpadding="5px" cellspacing="5px" align="right" width="300" height="100">
									<tr> 
										<td>
											<div style="text-align:center;padding:1em 0;"> <h2><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/es/city/3657509"><span style="color:blue;">Hora actual en</span><br />Guayaquil, Ecuador</a></h2> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=large&timezone=America%2FGuayaquil" width="100%" height="140" frameborder="0" seamless></iframe> </div>
	
										</td> 
									</tr>  
								</table>
								  
							</div>
						</td>
					</tr>
				</table>
			
   
			</ext:panel>
		</ext:viewport>
		<ext:onReady>
				document.pantallaDashboard = new dashboard("../../servelet/SMenu");
		</ext:onReady>
	</ext:body>

</body>
</html>