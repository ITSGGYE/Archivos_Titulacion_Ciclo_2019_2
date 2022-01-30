<%-- 
    Document   : index
    Created on : 07/03/2020, 20:42:46
    Author     : carlos
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_login.css" />
        <link rel="stylesheet" href="${pageContext.request.contextPath}/resources/css/css_body.css" />
        <script src="${pageContext.request.contextPath}/resources/js/jquery-1.11.1.js" type="text/javascript"></script> 
        <script src="${pageContext.request.contextPath}/resources/js/jquery.validate.min.js" type="text/javascript"></script> 
        <script src="${pageContext.request.contextPath}/resources/js/main.js" type="text/javascript"></script> 

        <title>TESIS: OSWALDO GUAYASAMIN</title>

    </head>
    <body>

        <form action="svt_login" method="POST" id="frm_login">

            <div>
                <!--<img src="resources/images/login_128.png">-->
            </div>

            <main class="ctn_login">

                <header>
                    <h1>LOGIN</h1>
                </header>

                <article>
                    <input placeholder="INGRESE USUARIO" type="text" class="usuario" name="txtUsuario" id="txtUsuario"/> 
                    <input placeholder="INGRESE CONTRASEÑA" type="password" class="contra" name="txtContra" id="txtContra"/> 
                </article>

                <footer>

                    <input type="submit" id="btnAceptar" value="INICIAR SESION" class="btnLogin"/> 
                    <input type="submit" value="SALIR" name="btnSalir" id="btnSal" class="btnSalir"/> 

                </footer>

            </main>

        </form>
    </body>
</html>
