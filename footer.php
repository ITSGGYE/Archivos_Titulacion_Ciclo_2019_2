<?php
require_once("class/class.php");

$footer = new Login();
$footer = $footer->ConfiguracionPorId();
?>
    <footer>
      <section id="mainFooter">
        <div class="container" id="footer">
          <div class="row">
            <div class="widget-footer">

             <div id="widget-1" class="widget">
               <div class="widget-title">Acerca de nosotros</div>
               <div class="widget-content"><p style="text-align: justify;">Hotel Apart Suites en Guayaquil. Ofrecemos un servicio bueno, en un ambiente agradable, frente al aeropuerto de Guayaquil, a pasos de Mall del Sol, Omnihospital, Transportes Ecuador, Centro de convenciones Guayaquil.<br>

Nuestro hotel se encuentra en una zona de fácil acceso peatonal y vehicular. Zona segura e iluminada.</p>
              </div>
            </div>

            <div id="widget-2" class="widget">
              <div class="widget-title">Métodos de Pago</div>
              <div class="widget-content"><p style="text-align: justify;">TODOS LOS PAGOS SON EFECTIVOS Y TRANSFERENCIA BANCARIA</p>
                
              </div>
            </div>


            <div id="widget-3" class="widget"><div itemscope="" itemtype="http://schema.org/Corporation">
              <h3 itemprop="name">Información sobre nosotros</h3>
              <address>
                <p>
                 <i class="fa fa-map-marker"></i> <span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">Guayas,Guayaquil-ECUADOR</span><br>       <i class="fa fa-phone"></i> <span itemprop="telephone" dir="ltr">0999616161</span><br>            
                 <i class="fa fa-envelope"></i> <a itemprop="email" dir="ltr" href="mailto:</a>apartguayaquil@gmail.com<br>
                 <?php switch($footer[0]['categoriahotel']){ case 1: ?>
                   <i class="fa fa-star"></i>
                   <?php
                   break;
                   case 2:
                   ?>
                   <i class="fa fa-star"></i><i class="fa fa-star"></i>
                   <?php
                   break;
                   case 3:
                   ?>
                   <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                   <?php
                   break;
                   case 4:
                   ?>
                   <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                   <?php
                   break;
                   case 5:
                   ?>
                   <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                   <?php
                   break;  
                 } ?>        
               </p>
             </address></div>
             <p class="lead">
              <a href="https://www.facebook.com/" target="_blank">
                <i class="fa fa-facebook"></i>
              </a>
              
              <a href="https://www.instagram.com/" target="_blank">
                <i class="fa fa-instagram"></i>
              </a>
            </p>
          </div>
        </div>            
      </div>
    </div>
  </section>
  
  <div id="footerRights">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p>  <i class="fa fa-copyright"></i> <span class="current-year"></span>  </p>
        </div>
        <div class="col-md-6">
          <p class="text-right">
            
            &nbsp;&nbsp;
            <!--<a href="news" class="tips" title="Noticias">Noticias</a>
            &nbsp;&nbsp;-->
            
        </div>
      </div>
    </div>
  </div>
</footer>
<a href="#" id="toTop" style="bottom: 30px;"><i class="fa-angle-up"></i></a>
