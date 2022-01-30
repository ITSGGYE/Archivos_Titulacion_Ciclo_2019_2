<%-- 
    Document   : ListUsuarios
    Created on : 08/03/2020, 0:32:47
    Author     : carlos
--%>


<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_body.css" />
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_pri_modal.css" />

        <script src="${pageContext.request.contextPath}/resources/js/jquery-1.11.1.js" type="text/javascript"></script> 
        <script src="${pageContext.request.contextPath}/resources/js/jquery.validate.min.js" type="text/javascript"></script> 
        <script src="${pageContext.request.contextPath}/resources/js/js_pri_modal.js" type="text/javascript"></script> 

        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
        <!--<title>TESIS: OSWALDO GUAYASAMIN</title>-->
        <title>TESIS: PLANIFICACIONES</title>
    </head>
    <body>
        <form method="POST" action="">
            <header><b><h1>&nbsp;&nbsp;MODULO DE PLANIFICACION MICROCURRICULAR</h1></b>
                <hr></header>
            <main>

                <section class="ctn_section" data-title="modulo de planifiacion">
                    <a href="/OGPlanificacionJsp/svt_planificacion?cargar=crg" class="btnModal" style="font-size: 95%">PLANIFICACION</a>

                </section>
                <section data-title="Planificación anual y de destrezas">
                    <a href="#miModalUno" class="btnModal">TUTORIAL # 1</a>
                </section>
                <section data-title="Introducción - Planificación curricular docente">
                    <a href="#miModalDos" class="btnModal">TUTORIAL # 2</a>
                </section>
                <section data-title="Cómo planificar una Clase con éxito">
                    <a href="#miModalTres" class="btnModal">TUTORIAL # 3</a>
                </section>
                <section data-title="Planificaciones en pocos minutos">
                    <a href="#miModalCuatro" class="btnModal">TUTORIAL # 4</a> 
                </section>
                <section data-title="La importancia de la planificación">
                    <a href="#miModalCinco" class="btnModal">TUTORIAL # 5</a>
                </section>
                <section data-title="Planificación curricular para docentes">
                    <a href="#miModalSeis" class="btnModal">TUTORIAL # 6</a>
                </section>
                <section data-title="Evaluación formativa">
                    <a href="#miModalSiete" class="btnModal">TUTORIAL # 7</a>
                </section>
                <section data-title="Planificacion Escolar parte 1">
                    <a href="#miModalOcho" class="btnModal">TUTORIAL # 8</a>
                </section>
                <section data-title="Planificacion Escolar parte 2">
                    <a href="#miModalNueve" class="btnModal">TUTORIAL # 9</a>
                </section>
                <section data-title="Planificación Educativa Nivel Inicial">
                    <a href="#miModalDiez" class="btnModal">TUTORIAL # 10</a>
                </section>
                <section data-title="Planificación en Educación Inicial">
                    <a href="#miModalOnce" class="btnModal">TUTORIAL # 11</a>
                </section>
                <section>
                    <a href="/OGPlanificacionJsp/svt_principal?cargar=index" class="btnModal">--SALIR--</a>
                </section>


                <div id="miModalUno" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x">X</a>
                        <h2>TUTORIAL #1</h2>
                        <hr>
                        <p>Planificación anual y de destrezas</p>
                        <iframe id="iframe" width="70%" height="70%" src="https://www.youtube.com/embed/5qQ7iV1YD8Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>

                <div id="miModalDos" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_dos">X</a>
                        <h2>TUTORIAL #2</h2>
                        <hr>
                        <p>Introducción - Planificación curricular docente </p>
                        <iframe id="iframe_dos" width="70%" height="70%" src="https://www.youtube.com/embed/EqEjbipgwWU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>

                <div id="miModalTres" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_tres">X</a>
                        <h2>TUTORIAL #3</h2>
                        <hr>
                        <p>Cómo planificar una clase con éxito</p>
                        <iframe id="iframe_tres" width="70%" height="70%" src="https://www.youtube.com/embed/oO53ib3b1PM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
                
                <div id="miModalCuatro" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_cinco">X</a>
                        <h2>TUTORIAL #4</h2>
                        <hr>
                        <p>Planificaciones en pocos minutos (PCA, PUD y PDCD) y con adaptaciones curriculares</p>
                        <iframe id="iframe_cinco" width="70%" height="70%" src="https://www.youtube.com/embed/HGw-ynn-yC4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>

                <div id="miModalCinco" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_cuatro">X</a>
                        <h2>TUTORIAL #5</h2>
                        <hr>
                        <p>La importancia de la planificación</p>
                        <iframe id="iframe_cuatro" width="70%" height="70%" src="https://www.youtube.com/embed/B3DLgTVFW-4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
                
                <div id="miModalSeis" class="modal" title="Planificación curricular para docentes">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_seis">X</a>
                        <h2>TUTORIAL #6</h2>
                        <hr>
                        <p>Planificación curricular para docentes</p>
                        <iframe id="iframe_cuatro" width="70%" height="70%" src="https://www.youtube.com/embed/McmBnrjB2gI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
                
                <div id="miModalSiete" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_siete">X</a>
                        <h2>TUTORIAL #7</h2>
                        <hr>
                        <p>Evaluación formativa</p>
                        <iframe id="iframe_cuatro" width="70%" height="70%" src="https://www.youtube.com/embed/Xd8mH_a0OSQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
                
                <div id="miModalOcho" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_ocho">X</a>
                        <h2>TUTORIAL #8</h2>
                        <hr>
                        <p>Planificacion Escolar parte 1</p>
                        <iframe id="iframe_cuatro" width="70%" height="70%" src="https://www.youtube.com/embed/Al3An_zF-zg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
                
                <div id="miModalNueve" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_nueve">X</a>
                        <h2>TUTORIAL #9</h2>
                        <hr>
                        <p>Planificacion Escolar parte 2</p>
                        <iframe id="iframe_cuatro" width="70%" height="70%" src="https://www.youtube.com/embed/SG7LPjBuBfY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
                
                <div id="miModalDiez" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_diez">X</a>
                        <h2>TUTORIAL #10</h2>
                        <hr>
                        <p>Planificación Educativa Nivel Inicial</p>
                        <iframe id="iframe_cuatro" width="70%" height="70%" src="https://www.youtube.com/embed/AULs3bDVVas" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
                
                <div id="miModalOnce" class="modal">
                    <div class="modal-contenido" id="ctn-contenido">
                        <a href="#" id="x_once">X</a>
                        <h2>TUTORIAL #11</h2>
                        <hr>
                        <p>Planificación en Educación Inicial</p>
                        <iframe id="iframe_cuatro" width="70%" height="70%" src="https://www.youtube.com/embed/3e_dJIEjfgk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
            </main>

        </form>
    </body>
</html>
