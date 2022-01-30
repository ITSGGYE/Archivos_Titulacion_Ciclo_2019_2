<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagenes/logo2.ico">
    
 -->
    <style>
         .modal-dialog {
            max-width: 80% !important;
        }
        .fondo{
          background:-webkit-linear-gradient(left, #3931af, #00c6ff);
          border-radius:4px;
        }
        .carta{
        box-shadow: 1px 1px 5px black; 
    }
    .texto{
      margin-left:8.5em;
    }
  
    </style>
</head>
<!-- <body> -->
<header>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 shadow "> 
        <a href="" class="navbar-brand col-sm-3 col-md-2 mr-0 text-info" >
        <img src="../imagenes/logo2.ico" alt="" width="30" height="30" title="Serviportex"> 
        ServiPortex
        </a>
  
        <a href="#"><button type="button" class="btn btn-info h1" data-toggle="modal" data-target="#exampleModalLong" data-whatever="@mdo" style="border-radius:15px;">
            <img src="../iconos/icons/document-text.svg" alt="" width="30" height="30" title="Bootstrap">
            Prueba psicotecnico</button></a>


        <a href="#"><button type="button" class="btn btn-info h1" data-toggle="modal" data-target="#personalidad" data-whatever="@mdo" style="border-radius:15px;">
            <img src="../iconos/icons/document-text.svg" alt="" width="30" height="30" title="Bootstrap">
            Prueba de Personalidad 19</button></a>
       
        <ul class = "navbar-nav px-3">
         <form class="form-check-inline">
            <a class="btn" href="../vista/menu.php"  >
            <img src="../iconos/icons/arrow-bar-left.svg" alt="" width="30" height="30" title="Menu"> 
            </a>
            <a class="btn" href="../modelo/cerrar.php"  >
            <img src="../iconos/icons/power.svg" alt="" width="30" height="30" title="Cerrar Sessión"> 
            </a>
        </form>
</header>


<!----Modal de Prueba Personalidad 19-->


<div class="modal fade" id="personalidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fondo">
        <h5 class="texto text-dark h3 " id="exampleModalLongTitle">Pre Visualización de Test Psicotecnico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark " >
        
          
      <div class="card carta"  >
                <div class="card-title text-center">
                <strong>Hago amigos con facilidad.</strong>
                </div>
               
                <hr>
                <div class="card-body">
                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
                        <label class="form-check-label" for="exampleRadios1">
                        Totalmente de acuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
                        <label class="form-check-label" for="exampleRadios1">
                        De acuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
                        <label class="form-check-label" for="exampleRadios1">
                        Neutro
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
                        <label class="form-check-label" for="exampleRadios1">
                        En desacuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
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
                        <input class="form-check-input" disabled type="radio" >
                        <label class="form-check-label" for="exampleRadios1">
                        Totalmente de acuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
                        <label class="form-check-label" for="exampleRadios1">
                        De acuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
                        <label class="form-check-label" for="exampleRadios1">
                        Neutro
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
                        <label class="form-check-label" for="exampleRadios1">
                        En desacuerdo
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input" disabled type="radio" >
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
                            <input class="form-check-input" disabled type="radio" >
                            <label class="form-check-label" for="exampleRadios1">
                            Totalmente de acuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" disabled type="radio" >
                            <label class="form-check-label" for="exampleRadios1">
                            De acuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" disabled type="radio" >
                            <label class="form-check-label" for="exampleRadios1">
                            Neutro
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" disabled type="radio" >
                            <label class="form-check-label" for="exampleRadios1">
                            En desacuerdo
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled  type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled  type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled  type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input"  disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled  type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente de acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                De acuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Neutro
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                En desacuerdo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Totalmente en desacuerdo
                                </label>
                            </div>

                        
                    </div>
                    <hr>
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!----Final del Modal de Prueba Personalidad 19-->



<!----Modal de Prueba psicotecnica-->


<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog fondo" role="document">
    <div class="modal-content">
      <div class="modal-header fondo">
        <h5 class="texto text-dark h3 " id="exampleModalLongTitle">Pre Visualización de Test Psicotecnico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="col-md-10 " style="margin:auto;">
          <div class="modal-body text-dark ">
                  

                 <div class="card carta"  >
                            <div class="card-title text-center">
                            <strong> Observa detenidamente.</strong>
                            </div>
                            <img src="../pruebas/imagenes/ejercicio.png"  class="card-img-top" alt="...">
                            <hr>
                            <div class="card-body">
                                <div class="form-check  ">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label " for="exampleRadios1">
                                                A
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                                B
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                                C
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" checked type="radio" >
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
                            <input class="form-check-input" disabled type="radio" >
                            <label class="form-check-label" for="exampleRadios1">
                            Producción
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" checked type="radio" >
                            <label class="form-check-label" for="exampleRadios1">
                            Método <!---Respuesta-->
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" disabled type="radio" >
                            <label class="form-check-label" for="exampleRadios1">
                            Procedencia
                            </label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                            Separar <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Estropear
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Deteriorar
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Barómetro
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Cronómetro
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Pluviómetro
                                    </label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" checked type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Eximio
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Pésimo <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Meritorio
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                    - d – b – e – c – a
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                - d – a – c – b – e
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                - d – a – b – e – c
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLO  
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLP
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLQ
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                ACEHLR
                                </label>
                            </div>
                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                9
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                15
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                2 <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                396, 369, 354, 345, 321, 312 <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                1225, 358, 468, 589, 698, 888
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                678, 669, 543, 345, 412, 221 
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                A <!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                B
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                C 
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Q
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                O
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                T 
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
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
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                -, +<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                /, -
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                -, -
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Incuria
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Diligencia<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Dejadez
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Hermana
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Tía
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Prima
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
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
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                42 años<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                38 años
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                40 años
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Ajusticiar – Soga
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Hacha – Guillotinar
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Guillotina – Soga<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Bosquejar
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Enajenación
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Liviano
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
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
                        <strong>Señale la palabra que no pertenece al grupo:</strong>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" checked type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Groseria<!--respuesta-->
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Vapuleo
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Azotaina
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Zurra
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Progesterona
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Testosterona
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                Exteroides
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
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
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                A
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                B
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" disabled type="radio" >
                                <label class="form-check-label" for="exampleRadios1">
                                C
                                </label>
                            </div>

                            <div class="form-check ">
                                <input class="form-check-input" checked type="radio" >
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
                              <input class="form-check-input" disabled type="radio" >
                              <label class="form-check-label" for="exampleRadios1">
                              A
                              </label>
                          </div>

                          <div class="form-check ">
                              <input class="form-check-input" disabled type="radio" >
                              <label class="form-check-label" for="exampleRadios1">
                              B
                              </label>
                          </div>

                          <div class="form-check ">
                              <input class="form-check-input" checked type="radio" >
                              <label class="form-check-label" for="exampleRadios1">
                              C<!--respuesta-->
                              </label>
                          </div>

                          <div class="form-check ">
                              <input class="form-check-input" disabled type="radio" >
                              <label class="form-check-label" for="exampleRadios1">
                              D
                              </label>
                          </div>

                          
                      </div>
                      <hr>
                  </div>

          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>   
      </div>
    </div>
  </div>
</div>

<!----Final del Modal de Prueba psicotecnica-->
<!-- 
</body>
</html> -->