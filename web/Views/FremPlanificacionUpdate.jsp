<%-- 
    Document   : FremPlanificacionCreate
    Created on : 30/03/2020, 23:59:23
    Author     : carlos
--%>

<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_body.css" />
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_planificacion_create.css" />

        <script src="${pageContext.request.contextPath}/resources/js/jquery-1.11.1.js" type="text/javascript"></script> 
        <script src="${pageContext.request.contextPath}/resources/js/jquery.validate.min.js" type="text/javascript"></script> 
        <script src="${pageContext.request.contextPath}/resources/js/js_planififcacion_update.js" type="text/javascript"></script> 


        <!--<title>TESIS: OSWALDO GUAYASAMIN</title>-->
        <title>TESIS: PLANIFICACIONES</title>
    </head>
    <body>
        <form method="POST" action="svt_planificacion" id="frmPlanificacionUpdate">
            <b><h1>&nbsp;&nbsp;PLANIFICACION MICROCURRICULAR</h1></b>
            <hr>
            <main>

                <section class="ctn_planificacion">
                    <section>
                        <p>ESCUELA:</p>
                        <input type="text" name="escuela" value="${sessionScope.sucursal}" disabled="true"/>
                    </section>
                    <section>
                        <p>PERIODO:</p>
                        <input type="text" name="periodo" value="${sessionScope.svt_periodo}" disabled="true"/>
                    </section>
                    <section>
                        <p>NOMBRE:</p>
                        <input type="text" name="nombre" value="${sessionScope.persona}" disabled="true"/>

                    </section>
                    <section>
                        <p>ASIGNATURA: </p>

                        <select name="asignatura" id="idAsignatura">
                            <option value="${materia}">SELECCIONE UNA OPCION...</option>
                            <c:forEach items="${svt_materia}" var="svt_materia">
                                <option value="${svt_materia.getMateria()}"><c:out value="${svt_materia.getMateria()}"/></option>
                            </c:forEach>
                        </select>

                    </section>
                    <section>
                        <p>HORA: </p>
                        <select name="hora" id="idHora">
                            <option value="${svt_hora}">SELECCIONE...</option>
                            <option value="1 HORAS">1 HORA</option>
                            <option value="2 HORAS">2 HORAS</option>
                            <option value="3 HORAS">3 HORAS</option>
                            <option value="4 HORAS">4 HORAS</option>
                            <option value="5 HORAS">5 HORAS</option>
                            <option value="6 HORAS">6 HORAS</option>
                            <option value="7 HORAS">7 HORAS</option>
                            <option value="8 HORAS">8 HORAS</option>
                            <option value="9 HORAS">9 HORAS</option>
                        </select>
                    </section>
                    <section>
                        <p>GRADO/CURSO: </p>
                        <select name="curso" id="idCurso">
                            <option value="${svt_curso}">SELECCIONE UNA OPCION...</option>
                            <c:forEach items="${listar}" var="listar">
                                <option value="${listar.getParalelo()}"><c:out value="${listar.getParalelo()}"/></option>
                            </c:forEach>
                        </select>
                    </section>
                    <section>
                        <p>OBJETIVO DE LA UNIDAD:</p>
                        <textarea id="objUnidad" name="objUnidad" rows="5" placeholder="UNIDAD DIDACTICA: ADAPTACION"><c:out value="${objUnid}"/></textarea>
                    </section>
                    <section>
                        <p>CRITERIOS DE EVALUACION:</p>
                        <textarea id="criterioEvaluacion" name="criterioEvaluacion" rows="5" placeholder="UNIDAD DIDACTICA: ADAPTACION"><c:out value="${critEvaluacion}"/></textarea>
                    </section>

                    <section>
                        <p>DESTREZAS CON CRITERIO DE DESEMPEÑO:</p>
                        <textarea id="destresaCriterioDesempeno" name="destresaCriterioDesempeno" rows="5" placeholder="¿QUE VAN A APRENDER?"><c:out value="${desCritDesempeno}"/></textarea>
                    </section>
                    <section>
                        <p>ACTIVIDADES DE APRENDIZAJE:</p>
                        <textarea id="actividadesAprendisaje" name="actividadesAprendisaje" rows="5" placeholder="¿COMO VAN A APRENDER? ACTIVIDADES"><c:out value="${actAprendisaje}"/></textarea>
                    </section>

                    <section>
                        <p>RECURSOS:</p>
                        <textarea id="recursos" name="recursos" rows="5" placeholder="MATERIALES A UTILIZAR"><c:out value="${recur}"/></textarea>
                    </section>

                    <section>
                        <p>TECNICAS E INSTRUMENTOS DE EVALUACION:</p>
                        <textarea id="tecnicasInsteumentosEvaluacion" name="tecnicasInsteumentosEvaluacion" rows="5" placeholder="TECNICAS A UTILIZAR"><c:out value="${tecInstEvaluacion}"/></textarea>
                    </section>

                    <section>
                        <p>ESPECIFICACIONES DE LA UNIDAD EDUCATIVA:</p>
                        <textarea name="especificacionUnidadEducativa" rows="5"><c:out value="${tecInstEvaluacion}"/></textarea>
                    </section>

                    <section>
                        <p>ESPECIFICACIONES DE LA ADAPTACION A SER APLICADA:</p>
                        <textarea name="especificacionAdaptacionAplicada" rows="5"><c:out value="${espAdapAplicada}"/></textarea>
                    </section>

                    <section>
                        <p>INDICADORES DE EVALUACION DE LA UNIDAD:</p>
                        <textarea id="id_evaluacion_unidad" name="evaluacion_unidad" rows="5"><c:out value="${eval_unidad}"/></textarea>
                        <!--<textarea name="evaluacion_unidad" rows="5"></textarea>-->
                    </section>

                    <section>
                    </section>

                    <section>
                        <p>REVISADO:</p>
                        <input id="revisado" type="text" value="<c:out value="${revis}"/>" name="revisado"/>
                    </section>

                    <section>
                        <p>APROBADO:</p>
                        <input id="aprovado" type="text" value="<c:out value="${apro}"/>" name="aprovado"/>
                    </section>

                </section>
                <div>
                    <br>
                    <br>
                    <input class="css_guardar" value="ACTUALIZAR" type="submit" id="actualizarForm" name="actualizarForm"/>
                    <br>
                    <br>
                    <input class="css_cancelar" value="CANCELAR" type="submit" id="regresar" name="regresar"/>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </main>
            <br>
            <br>
        </form>
    </body>
</html>
