<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Prueba Psicotecnica</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../pruebas/estilos/estilos.css">
</head>
<body>

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../vista/login.php');
            
        }
    ?>

    <div class="container-fluid">

        <form action="../controlador/psicotecnico.php" method="POST">

            
                    <div class="card carta"  >
                            <div class="card-title text-center title__card">
                            <strong> Observa detenidamente.</strong>
                            </div>
                            <img src="../pruebas/imagenes/ejercicio.png"  class="card-img-top" alt="...">
                            <hr>
                            <div class="card-body" >
                                <div class="form-check ">
                                    <input class="form-check-input" required name="preguntauno" type="radio"  id="exampleRadios1"  value="A">
                                    <label class="form-check-label" for="exampleRadios1">
                                                A
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" name="preguntauno" type="radio" id="exampleRadios2" value="B">
                                    <label class="form-check-label" for="exampleRadios1">
                                                B
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" name="preguntauno" type="radio" id="exampleRadios3" value="C">
                                    <label class="form-check-label" for="exampleRadios1">
                                                C
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" name="preguntauno" type="radio" id="exampleRadios4" value="D">
                                    <label class="form-check-label" for="exampleRadios1">
                                                D
                                    </label>
                                </div>

                                

                                
                            </div>
                            <hr>
                    </div>

            
                <hr>

                    <div class="card carta"  >
                        <div class="card-title text-center">
                        <strong> Indica entre las siguientes palabras cuál es el sinónimo de la palabra PROCEDIMIENTO</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" required name="dos" type="radio" value="Producción" >
                                <label class="form-check-label" for="exampleRadios1">
                                Producción
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" name="dos" type="radio" value="Método" >
                                <label class="form-check-label" for="exampleRadios1">
                                Método <!---Respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" name="dos" type="radio" value="Procedencia" >
                                <label class="form-check-label" for="exampleRadios1">
                                Procedencia
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" name="dos" type="radio" value="Rendimiento" >
                                <label class="form-check-label" for="exampleRadios1">
                                Rendimiento
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>

                <hr>

                    <div class="card carta"  >
                        <div class="card-title text-center">
                        <strong> Señale la palabra que no pertenece al grupo: </strong>
                        </div>
                        
                        <hr>
                        <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" required type="radio" name="tres" value="Separar" >
                                <label class="form-check-label" for="exampleRadios1">
                                            Separar <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="tres" value="Estropear" >
                                <label class="form-check-label" for="exampleRadios1">
                                Estropear
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tres" value="Deteriorar" >
                                <label class="form-check-label" for="exampleRadios1">
                                Deteriorar
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="tres" value="Dañar" >
                                <label class="form-check-label" for="exampleRadios1">
                                Dañar
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta"  >
                            <div class="card-title text-center">
                            <strong> TEMPERATURA es a TERMÓMETRO como VIENTO es a ...</strong>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" required type="radio" name="cuatro" value="Barómetro" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Barómetro
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  name="cuatro" value="Cronómetro">
                                    <label class="form-check-label" for="exampleRadios1">
                                    Cronómetro
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cuatro" value="Pluviómetro" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Pluviómetro
                                    </label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="cuatro" value="Anemómetro" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Anemómetro <!--respuesta-->
                                    </label>
                                </div>

                                
                            </div>
                            <hr>
                    </div>
                
                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Indica entre las siguientes palabras cuál es el antónimo de la palabra EXCELSO</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="cinco" value="Eximio">
                                <label class="form-check-label" for="exampleRadios1">
                                Eximio
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cinco" value="Pésimo">
                                <label class="form-check-label" for="exampleRadios1">
                                Pésimo <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cinco" value="Meritorio">
                                <label class="form-check-label" for="exampleRadios1">
                                Meritorio
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cinco" value="Egregio">
                                <label class="form-check-label" for="exampleRadios1">
                                Egregio
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta"  >
                        <div class="card-title text-center">
                        <strong> Dada la relación numérica 89988899989889899988 agrupándolos en bloques de cuatro, sin cambiar el orden de los números, que serie de letras resultaría sabiendo que :</strong>
                        <br>
                        a = 8899 b = 8989 c = 9898 d = 8998 c = 9889 e = 9988
                        </div>
                        
                        <hr>
                        <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" required type="radio" name="seis" value="- d – b – e – c – a" >
                                <label class="form-check-label" for="exampleRadios1">
                                    - d – b – e – c – a
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="seis" value="- d – a – c – b – e" >
                                <label class="form-check-label" for="exampleRadios1">
                                - d – a – c – b – e<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="seis" value="- d – a – b – e – c" >
                                <label class="form-check-label" for="exampleRadios1">
                                - d – a – b – e – c
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="seis" value="- d – c – a – b – e" >
                                <label class="form-check-label" for="exampleRadios1">
                                - d – c – a – b – e
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>

                <hr>

                    <div class="card carta"  >
                        <div class="card-title text-center">
                        <strong> Considerando la letra Ñ, el grupo de letras que continúa es:</strong><br>
                        A,   AC,  ACE,   ACEH,   ACEHL,   ?
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" required type="radio" name="siete" value="ACEHLO">
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLO  
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="ACEHLP">
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLP
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="ACEHLQ">
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLQ<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="ACEHLR">
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLR
                                </label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="ACEHLS">
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLS
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>En la siguiente serie hay un número equivocado, que no corresponde con la serie. Señala el número que debería ir en su lugar: 3, 4, 8, 16, 32, 64</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="ocho" value="9" >
                                <label class="form-check-label" for="exampleRadios1">
                                9
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="ocho" value="15" >
                                <label class="form-check-label" for="exampleRadios1">
                                15
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="ocho" value="2" >
                                <label class="form-check-label" for="exampleRadios1">
                                2 <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="ocho" value="24" >
                                <label class="form-check-label" for="exampleRadios1">
                                24
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Señale cuál de las siguientes series de números sigue una ordenación descendente correcta:</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="nueve" value="396, 369, 354, 345, 321, 312" >
                                <label class="form-check-label" for="exampleRadios1">
                                396, 369, 354, 345, 321, 312 <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="nueve" value="1225, 358, 468, 589, 698, 888" >
                                <label class="form-check-label" for="exampleRadios1">
                                1225, 358, 468, 589, 698, 888
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="nueve" value="678, 669, 543, 345, 412, 221" >
                                <label class="form-check-label" for="exampleRadios1">
                                678, 669, 543, 345, 412, 221 
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="nueve" value="543, 534, 509, 469, 491, 419" >
                                <label class="form-check-label" for="exampleRadios1">
                                543, 534, 509, 469, 491, 419
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Según la siguiente imagen ¿Qué figura completaría la serie?</strong>
                        </div>
                        <img src="../pruebas/imagenes/8e.png"  class="card-img-top" alt="...">
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="diez" value="A" >
                                <label class="form-check-label" for="exampleRadios1">
                                A <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diez" value="B" >
                                <label class="form-check-label" for="exampleRadios1">
                                B
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diez" value="C" >
                                <label class="form-check-label" for="exampleRadios1">
                                C 
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diez" value="D" >
                                <label class="form-check-label" for="exampleRadios1">
                                D
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>

                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Qué letra sigue la serie (valen las letras dobles) N, J, L, M, Ñ, P, R, S ...</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="once" value="Q" >
                                <label class="form-check-label" for="exampleRadios1">
                                Q
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="once" value="O" >
                                <label class="form-check-label" for="exampleRadios1">
                                O
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="once" value="T" >
                                <label class="form-check-label" for="exampleRadios1">
                                T 
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="once" value="U" >
                                <label class="form-check-label" for="exampleRadios1">
                                U<!--respuesta-->
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>

                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Encuentra los operadores para conseguir que el resultado de la operación sea correcto: 12 ? 9 ? 6 = 9</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="doce" value="-, +" >
                                <label class="form-check-label" for="exampleRadios1">
                                -, +<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="doce" value="/, -" >
                                <label class="form-check-label" for="exampleRadios1">
                                /, -
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="doce" value="-, -" >
                                <label class="form-check-label" for="exampleRadios1">
                                -, -
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="doce" value="+, -" >
                                <label class="form-check-label" for="exampleRadios1">
                                +, -
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Indica entre las siguientes palabras cuál es el antónimo de la palabra PIGRICIA</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="trece" value="Incuria" >
                                <label class="form-check-label" for="exampleRadios1">
                                Incuria
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="trece" value="Diligencia" >
                                <label class="form-check-label" for="exampleRadios1">
                                Diligencia<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="trece" value="Dejadez" >
                                <label class="form-check-label" for="exampleRadios1">
                                Dejadez
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="trece" value="Flojera" >
                                <label class="form-check-label" for="exampleRadios1">
                                Flojera
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>



                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Si Juan es hermano de María y Luis es tío de Juan ¿Qué es María con respecto a Luis?</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="catorce" value="Hermana" >
                                <label class="form-check-label" for="exampleRadios1">
                                Hermana
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="catorce" value="Tía" >
                                <label class="form-check-label" for="exampleRadios1">
                                Tía
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="catorce" value="Prima" >
                                <label class="form-check-label" for="exampleRadios1">
                                Prima
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="catorce" value="Sobrina" >
                                <label class="form-check-label" for="exampleRadios1">
                                Sobrina<!--respuesta-->
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>

                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Ana dice a su hija Beatriz: Hace 7 años mi edad era 5 veces la tuya, pero ahora sólo es el triple. ¿Qué edad tiene Ana?</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="quince" name="42 años" >
                                <label class="form-check-label" for="exampleRadios1">
                                42 años<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="quince" name="38 años" >
                                <label class="form-check-label" for="exampleRadios1">
                                38 años
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="quince" name="40 años" >
                                <label class="form-check-label" for="exampleRadios1">
                                40 años
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="quince" name="35 años" >
                                <label class="form-check-label" for="exampleRadios1">
                                35 años
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>DECAPITAR es a ... como AHORCAR es a ...</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="diesiseis" value="Ajusticiar – Soga" >
                                <label class="form-check-label" for="exampleRadios1">
                                Ajusticiar – Soga
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diesiseis" value="Hacha – Guillotinar" >
                                <label class="form-check-label" for="exampleRadios1">
                                Hacha – Guillotinar
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diesiseis" value="Guillotina – Soga" >
                                <label class="form-check-label" for="exampleRadios1">
                                Guillotina – Soga<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diesiseis" value="Soga – Ajusticiar" >
                                <label class="form-check-label" for="exampleRadios1">
                                Soga – Ajusticiar
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Señala la palabra que está incorrectamente escrita:</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="diesisiete" value="Bosquejar">
                                <label class="form-check-label" for="exampleRadios1">
                                Bosquejar
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diesisiete" value="Enajenación">
                                <label class="form-check-label" for="exampleRadios1">
                                Enajenación
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diesisiete" value="Liviano">
                                <label class="form-check-label" for="exampleRadios1">
                                Liviano
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diesisiete" value="Nomina">
                                <label class="form-check-label" for="exampleRadios1">
                                Nomina<!--respuesta-->
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>FEMENINA es a PROGESTERONA como MASCULINA es a ...</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" required name="diecinieve" value="Progesterona" >
                                <label class="form-check-label" for="exampleRadios1">
                                Progesterona
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecinieve" value="Testosterona" >
                                <label class="form-check-label" for="exampleRadios1">
                                Testosterona
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecinieve" value="Exteroides" >
                                <label class="form-check-label" for="exampleRadios1">
                                Exteroides
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecinieve" value="Andrógeno" >
                                <label class="form-check-label" for="exampleRadios1">
                                Andrógeno<!--respuesta-->
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                    <div class="card carta" >
                        <div class="card-title text-center">
                        <strong>Elige la opcion correcta Observa con claridad</strong>
                        </div>
                        <img src="../pruebas/imagenes/cubos.jpg"  class="card-img-top" alt="...">
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="veinte" value="A" >
                                <label class="form-check-label" for="exampleRadios1">
                                A
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio"  name="veinte" value="B">
                                <label class="form-check-label" for="exampleRadios1">
                                B
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio"  name="veinte" value="C">
                                <label class="form-check-label" for="exampleRadios1">
                                C
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio"  name="veinte" value="D">
                                <label class="form-check-label" for="exampleRadios1">
                                D<!--respuesta-->
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                    </div>


                <hr>

                  <div class="card carta" >
                      <div class="card-title text-center">
                      <strong>Elige la opcion correcta Observa con claridad</strong>
                      </div>
                      <img src="../pruebas/imagenes/cubos2.jpg"  class="card-img-top" alt="...">
                      <hr>
                      <div class="card-body">
                          <div class="form-check">
                              <input class="form-check-input" type="radio" required name="veintiuno" value="A">
                              <label class="form-check-label" for="exampleRadios1">
                              A
                              </label>
                          </div>

                          <div class="form-check ">
                              <input class="form-check-input" type="radio" name="veintiuno" value="B">
                              <label class="form-check-label" for="exampleRadios1">
                              B
                              </label>
                          </div>

                          <div class="form-check ">
                              <input class="form-check-input" type="radio" name="veintiuno" value="C">
                              <label class="form-check-label" for="exampleRadios1">
                              C<!--respuesta-->
                              </label>
                          </div>

                          <div class="form-check ">
                              <input class="form-check-input" type="radio" name="veintiuno" value="D">
                              <label class="form-check-label" for="exampleRadios1">
                              D
                              </label>
                          </div>

                          
                      </div>
                      <hr>
                  </div>

                <div class="card-footer">
                    <a href="#"><button type="submit" name="pruebauno" class="btn enviar">Enviar</button></a>
                </div>
            
        </form>
        
    </div>
    




    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
</body>
</html>