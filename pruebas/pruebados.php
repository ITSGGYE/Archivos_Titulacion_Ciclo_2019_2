<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Personalidad</title>
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

        <form action="../controlador/personalidad.php" method="POST">
        <div class="card carta"  >
                <div class="card-title text-center">
                <strong>Hago amigos con facilidad.</strong>
                </div>
               
                <hr>
                <div class="card-body">
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="uno" value="Totalmente de acuerdo">
                        <label class="form-check-label" for="exampleRadios1">
                        Totalmente de acuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="uno" value="De acuerdo">
                        <label class="form-check-label" for="exampleRadios1">
                        De acuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="uno" value="Neutro">
                        <label class="form-check-label" for="exampleRadios1">
                        Neutro
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="uno" value="En desacuerdo">
                        <label class="form-check-label" for="exampleRadios1">
                        En desacuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="uno" value="Totalmente en desacuerdo">
                        <label class="form-check-label" for="exampleRadios1">
                        Totalmente en desacuerdo
                        </label>
                    </div>

                </div>
                <hr>
            </div>

        
            <hr>

            <div class="card carta"  >
                <div class="card-title text-center">
                <strong> No me gusta que las cosas estén desordenadas, me gusta ordenar.</strong>
                </div>
                
                <hr>
                <div class="card-body">
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="dos" value="Totalmente de acuerdo" >
                            <label class="form-check-label" for="exampleRadios1">
                            Totalmente de acuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="dos" value="De acuerdo" >
                            <label class="form-check-label" for="exampleRadios1">
                            De acuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="dos" value="Neutro" >
                            <label class="form-check-label" for="exampleRadios1">
                            Neutro
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="dos" value="En desacuerdo" >
                            <label class="form-check-label" for="exampleRadios1">
                            En desacuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="dos" value="Totalmente en desacuerdo" >
                            <label class="form-check-label" for="exampleRadios1">
                            Totalmente en desacuerdo
                            </label>
                        </div>

                    
                </div>
                <hr>
            </div>

            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>Me gusta hacerme cargo de la situación.</strong>
                    </div>
                    
                    <hr>
                    <div class="card-body">
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="tres" value="Totalmente de acuerdo" >
                            <label class="form-check-label" for="exampleRadios1">
                            Totalmente de acuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="tres" value="De acuerdo" >
                            <label class="form-check-label" for="exampleRadios1">
                            De acuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="tres" value="Neutro" >
                            <label class="form-check-label" for="exampleRadios1">
                            Neutro
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="tres" value="En desacuerdo" >
                            <label class="form-check-label" for="exampleRadios1">
                            En desacuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="tres" value="Totalmente en desacuerdo" >
                            <label class="form-check-label" for="exampleRadios1">
                            Totalmente en desacuerdo
                            </label>
                        </div>

                        
                    </div>
                    <hr>
                </div>


            <hr>

                <div class="card carta"  >
                        <div class="card-title text-center">
                        <strong>Experimento emociones profundas y variadas.</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cuatro" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cuatro" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cuatro" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cuatro" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cuatro" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                            
                        </div>
                        <hr>
                </div>
            
            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong> Me resulta difícil acercarme a los demás.</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cinco" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cinco" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cinco" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cinco" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="cinco" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>


            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong> Me encanta discutir o pelear.</strong>
                   
                    </div>
                    
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="seis" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="seis" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="seis" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="seis" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="seis" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>Me encantan las sensaciones fuertes.</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="siete" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>Disfruto leyendo libros y artículos interesantes.</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="ocho" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="ocho" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="ocho" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="ocho" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="ocho" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>Actúo de manera estrafalaria y escandalosa.</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="nueve" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="nueve" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="nueve" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="nueve" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="nueve" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>Hago alarde de mis virtudes.</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diez" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diez" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diez" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diez" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diez" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>Actúo sin pensar.</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="once" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="once" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="once" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="once" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="once" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>


            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>No entiendo a la gente que se pone sentimental.</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="doce" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="doce" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="doce" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="doce" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="doce" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>Me estreso con facilidad.</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="trece" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="trece" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="trece" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="trece" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="trece" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>


            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>¿Sueles llegar a la hora fijada a una cita?</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="catorce" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="catorce" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="catorce" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="catorce" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="catorce" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>


            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>A la hora de preparar un viaje, ¿lo haces con suficiente antelación?</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="quince" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="quince" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="quince" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="quince" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="quince" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>


            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>¿Amontonas la ropa sobre una silla o sobre la cama?</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciseis" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciseis" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciseis" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciseis" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciseis" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>


            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>¿Sueles tener la mesa de trabajo llena de cosas?</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecisiete" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecisiete" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecisiete" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecisiete" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecisiete" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>



            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>¿Sueles acabar el trabajo a tiempo?</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciocho" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciocho" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciocho" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciocho" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="dieciocho" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>¿Cuándo vas a comprar llevas la lista de la compra?</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecinueve" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecinueve" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecinueve" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecinueve" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="diecinueve" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>


            <hr>

                <div class="card carta"  >
                    <div class="card-title text-center">
                    <strong>¿Sueles convivir mucho con tus amigos?</strong>
                    </div>
                    <hr>
                    <div class="card-body">
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="veinte" value="Totalmente de acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="veinte" value="De acuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="veinte" value="Neutro" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="veinte" value="En desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="veinte" value="Totalmente en desacuerdo" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

            </div>
            <div class="card-footer">
                <a href=""><button type="submit" name="pruebauno" class="btn enviar">Enviar</button></a>
            </div>
        </form>
        
    </div>
    




    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
</body>
</html>