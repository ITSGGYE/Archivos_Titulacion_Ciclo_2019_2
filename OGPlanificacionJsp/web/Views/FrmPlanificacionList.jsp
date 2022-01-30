<%-- 
    Document   : FrmPlanificacionList
    Created on : 19/03/2020, 17:34:46
    Author     : carlos
--%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_body.css" />
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_planificacion.css" />
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_btn.css" />


        <!--<title>TESIS: OSWALDO GUAYASAMIN</title>-->
        <title>TESIS: PLANIFICACIONES</title>
    </head>

    <body>

        <h1>&nbsp;&nbsp;MODULO: PLANIFICACION ESCOLAR</h1>
        <hr>

        <form method="POST" action="svt_planificacion" id="frmPlanificacionList">
            <main>
                <section>
                    <br>
                    <b>&nbsp;&nbsp;FILTRO:&nbsp;&nbsp;</b> 
                    <select name="periodo" id="paralelo_list">
                        <option value="">PERIODO...</option>
                        <c:forEach items="${svt_periodo_list}" var="svt_periodo_list">
                            <option value="${svt_periodo_list.getPeriodo()}"><c:out value="${svt_periodo_list.getPeriodo()}"/></option>
                        </c:forEach>
                    </select>
                    <select name="asignatura" id="asignatura">
                        <option value="">ASIGNATURA...</option>
                        <c:forEach items="${svt_materia}" var="svt_materia">
                            <option value="${svt_materia.getMateria()}"><c:out value="${svt_materia.getMateria()}"/></option>
                        </c:forEach>
                    </select>
                    <select name="curso" id="curso">
                        <option value="">PARALELO...</option>
                        <c:forEach items="${svt_paralelo}" var="svt_paralelo">
                            <option value="${svt_paralelo.getCurso()}"><c:out value="${svt_paralelo.getCurso()}"/></option>
                        </c:forEach>
                    </select>
                    &nbsp;&nbsp;<input name="btn_buscar" class="btn_buscar" type="submit" value="BUSCAR"/>
                    &nbsp;&nbsp;<input name="btn_nuevo" class="btn_nuevo" type="submit" value="NUEVO"/>
                    &nbsp;&nbsp;<!--<input name="btn_salir" type="submit" value="PRINCIPAL"/>-->
                    <a href="Views/FrmPrincipal.jsp" class="btn_planificacion" name="btnPlanificacion" style="font-size: 95%">REGRESAR</a>
                    <br>
                </section>
                <hr>
                <section class="ctn_content">

                    <table class="ctn_planificacion">
                        <tr>
                            <th>FECHA</th>
                            <th>PARALELO</th>
                            <th>MATERIA</th>
                            <th>ACTUALIZAR</th>
                            <th>ELIMINAR</th>
                            <th>IMPRIMIR</th>
                        </tr>
                        <c:forEach items="${listar}" var="listar">
                            <tr>
                                <td class="fecha"><c:out value="${listar.getFecha()}"/></td>
                                <td class="paralelo"><c:out value="${listar.getParalelo()}"/></td>
                                <td><c:out value="${listar.getMateria()}"/></td>

                                <td class="actualizar">
                                    <!--<input type="submit" class="btn_editar" name="btn_actualizar" value="ACTUALIZAR">-->
                                    <a href="svt_planificacion?actualizar=act&id_pla=${listar.getId_planificacion()}" id="btnActualizar" class="btn_actualizar" style="font-size: 95%">
                                        &nbsp;&nbsp;ACTUALIZAR&nbsp;&nbsp;
                                    </a>
                                </td>
                                <td class="eliminar">
                                    <c:choose>
                                        <c:when test="${listar.getEstado_pla_union() == 'A'}">
                                            <a href="svt_planificacion?btn_eliminar=DESACTIVAR&id_pla=${listar.getId_planificacion()}" class="btn_estado_a" style="font-size: 95%">
                                                &nbsp;&nbsp;ELIMINAR&nbsp;&nbsp;
                                            </a>
                                        </c:when>

                                        <c:otherwise>
                                            <a href="svt_planificacion?btn_eliminar_dos=ACTIVAR&id_pla=${listar.getId_planificacion()}" class="btn_estado_i" style="font-size: 95%">
                                                &nbsp;&nbsp;ACTIVAR&nbsp;&nbsp;
                                            </a>
                                        </c:otherwise>
                                    </c:choose>
                                </td>
                                <td class="imprimir">
                                    <a href="svt_planificacion?IMPRIMIR=IMPRIMIR&id_pla=${listar.getId_planificacion()}" class="btn_imprimir" target="blank" id="btnImprimir" style="font-size: 95%">
                                        &nbsp;&nbsp;IMPRIMIR&nbsp;&nbsp;
                                    </a>
                                </td>
                            </tr>
                        </c:forEach>
                    </table>
                </section>
            </main>
        </form>
    </body>
</html>
