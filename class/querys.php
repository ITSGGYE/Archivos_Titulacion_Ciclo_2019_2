<?php

$sql = "SELECT 
      habitaciones.codhabitacion,
        habitaciones.numhabitacion,
        habitaciones.descriphabitacion,
      habitaciones.codtarifa,
      tiposhabitaciones.nomtipo,
      tarifas.baja,
      tarifas.media,
      tarifas.alta FROM habitaciones 
          INNER JOIN tarifas ON habitaciones.codtarifa = tarifas.codtarifa 
          INNER JOIN tiposhabitaciones ON tarifas.codtipo = tiposhabitaciones.codtipo
          WHERE habitaciones.codhabitacion IN ($array) AND habitaciones.statushab = '0' ORDER BY habitaciones.codhabitacion ASC";


          $sql = "SELECT 
      habitaciones.codhabitacion,
	  habitaciones.numhabitacion,
	  habitaciones.descriphabitacion,
      habitaciones.codtarifa,
      tiposhabitaciones.nomtipo,
      tarifas.baja,
      tarifas.media,
      tarifas.alta FROM habitaciones 
	    INNER JOIN tarifas ON habitaciones.codtarifa = tarifas.codtarifa 
	    INNER JOIN tiposhabitaciones ON tarifas.codtipo = tiposhabitaciones.codtipo
	    WHERE habitaciones.codhabitacion IN ($array) AND habitaciones.statushab = '0' ORDER BY habitaciones.codhabitacion ASC";

$sql = "SELECT
      habitaciones.codhabitacion,
	  habitaciones.numhabitacion,
	  habitaciones.descriphabitacion,
      habitaciones.codtarifa,
      tiposhabitaciones.nomtipo,
      tarifas.baja,
      tarifas.media,
      tarifas.alta FROM habitaciones
	    INNER JOIN tarifas ON habitaciones.codtarifa = tarifas.codtarifa
	    INNER JOIN tiposhabitaciones ON tarifas.codtipo = tiposhabitaciones.codtipo
	    WHERE habitaciones.codhabitacion IN ($array)
	      AND habitaciones.statushab = '0'
            AND tarifas.codtarifa IN (SELECT codtarifa
                                        FROM tarifas
                                        CROSS JOIN (SELECT temporada
                                                    FROM temporadas
                                                    WHERE DATE_FORMAT(desde,'%Y-%m-%d') <= '2019-10-13' and DATE_FORMAT(hasta,'%Y-%m-%d') >= '2019-10-11'
                                        ) AS temp) ORDER BY habitaciones.codhabitacion ASC";



$sql = "SELECT * FROM habitaciones, tiposhabitaciones, tarifas WHERE habitaciones.statushab = '0' AND habitaciones.maxadultos >= ? AND habitaciones.maxninos >= ? AND habitaciones.codtarifa AND habitaciones.codtarifa = tarifas.codtarifa AND tarifas.codtipo = tiposhabitaciones.codtipo AND habitaciones.codhabitacion NOT IN (SELECT codhabitacion FROM detallereservaciones WHERE desde >= ? AND hasta <= ?) ORDER BY habitaciones.codhabitacion ASC";

$sql = "SELECT * FROM temporadas WHERE DATE_FORMAT(desde,'%Y-%m-%d') >= ? AND DATE_FORMAT(hasta,'%Y-%m-%d') <= ?";

$sql = "SELECT * FROM temporadas WHERE DATE_FORMAT(fechaespecie,'%Y-%m-%d') BETWEEN '".$_GET["desde"]."' AND '".$_GET["hasta"]."'";

  $desde = date("Y-m-d",strtotime($_GET['desde']));
  //echo "<br>";
  $hasta = date("Y-m-d",strtotime($_GET["hasta"]));
  //$pago = 0;


	    $sql = "SELECT * FROM temporadas WHERE DATE_FORMAT(desde,'%Y-%m-%d') >= '11-10-2019' and DATE_FORMAT(hasta,'%Y-%m-%d') <= '13-10-2019'";

       $sql = "SELECT codtarifa, codtipo, IF((SELECT temporada FROM temporadas 
        WHERE DATE_FORMAT(desde,'%Y-%m-%d') >= '2019-11-10' and DATE_FORMAT(hasta,'%Y-%m-%d') <= '2019-13-10' ) = 'BAJA',baja, IF( (SELECT temporada FROM temporadas WHERE DATE_FORMAT(desde,'%Y-%m-%d') >= '2019-11-10' and DATE_FORMAT(hasta,'%Y-%m-%d') <= '2019-13-10' ) = 'MEDIA', media, alta ) ) AS baja FROM tarifas";

        $sql = "SELECT * FROM temporadas WHERE desde <= '2019-10-13' and hasta >= '2019-10-11'";
	    
	    $sql = "SELECT codtarifa, codtipo,
       CASE
        WHEN (SELECT temporada
                    FROM temporadas
                    WHERE DATE_FORMAT(desde,'%Y-%m-%d') >= '2019-11-10' and DATE_FORMAT(hasta,'%Y-%m-%d') <= '2019-13-10'
        ) = 'ALTA' THEN alta
       WHEN (SELECT temporada
                    FROM temporadas
                    WHERE DATE_FORMAT(desde,'%Y-%m-%d') >= '2019-11-10' and DATE_FORMAT(hasta,'%Y-%m-%d') <= '2019-13-10'
        ) = 'MEDIA' THEN media
           ELSE baja
        END AS temporada FROM tarifas";

        //SELECT * FROM temporadas WHERE desde <= '2019-10-13' and hasta >= '2019-10-11';

        /*SELECT *
FROM temporadas
WHERE desde <= '2019-10-13'
  and hasta >= '2019-10-11';*/


  $sql = "SELECT
      habitaciones.codhabitacion,
	  habitaciones.numhabitacion,
	  habitaciones.descriphabitacion,
      habitaciones.codtarifa,
      tiposhabitaciones.nomtipo,
      tarifas.baja,
      tarifas.media,
      tarifas.alta FROM habitaciones
	    INNER JOIN tarifas ON habitaciones.codtarifa = tarifas.codtarifa
	    INNER JOIN tiposhabitaciones ON tarifas.codtipo = tiposhabitaciones.codtipo
	    WHERE habitaciones.codhabitacion IN ('H1','H2')
	      AND habitaciones.statushab = '0'
            AND tarifas.codtarifa  IN (SELECT codtarifa
                                        FROM tarifas
                                        CROSS JOIN (SELECT temporada
                                                    FROM temporadas
                                                    WHERE DATE_FORMAT(desde,'%Y-%m-%d') <= '2019-10-13' and DATE_FORMAT(hasta,'%Y-%m-%d') >= '2019-10-11'
                                        ) AS temp) ORDER BY habitaciones.codhabitacion ASC";


###################### FUNCION CONSULTA TEMPORADAS POR FECHAS ##########################
public function BuscarTemporadas() 
	       {
		self::SetNames();		
	    $sql = "SELECT * FROM temporadas WHERE desde <= '".date("Y-m-d",strtotime($_GET['hasta']))."' and hasta >= '".date("Y-m-d",strtotime($_GET['desde']))."'";
	    $stmt = $this->dbh->prepare($sql);
		$stmt->execute();
	    //$stmt->execute(array(limpiar(date("Y-m-d",strtotime($_GET['desde']))),limpiar(date("Y-m-d",strtotime($_GET['hasta'])))));
		//$stmt->bindValue(1, trim(date("Y-m-d",strtotime($_GET['desde']))));
		//$stmt->bindValue(2, trim(date("Y-m-d",strtotime($_GET['hasta']))));
		$num = $stmt->rowCount();
		if($num==0)
		{  
			echo "ERROR";
		    exit;
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
}
###################### FUNCION CONSULTA TEMPORADAS POR FECHAS ##########################


####################### FUNCION MUESTRA DETALLES PARA RESERVACIONES #####################
public function VerificaReservaciones() 
	       {
		self::SetNames();		
       
	    $check = explode(',',$_GET['check']);
        
        foreach ($check as $id)
		{
			$data[] = "'". $id . "'";
			$array = implode(",", $data);

	$sql = "SELECT 
        habitaciones.codhabitacion,
        habitaciones.numhabitacion,
        habitaciones.descriphabitacion,
        habitaciones.codtarifa,
        habitaciones.ivahabitacion,
        habitaciones.deschabitacion,
        tiposhabitaciones.nomtipo,
        tarifas.baja,
        tarifas.media,
        tarifas.alta FROM habitaciones 
        INNER JOIN tarifas ON habitaciones.codtarifa = tarifas.codtarifa 
        INNER JOIN tiposhabitaciones ON tarifas.codtipo = tiposhabitaciones.codtipo
        WHERE habitaciones.codhabitacion IN ($array) AND habitaciones.statushab = '0' ORDER BY habitaciones.codhabitacion ASC";

		}

	    $stmt = $this->dbh->prepare($sql);
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
           echo "";
		   exit;
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}

}
###################### FUNCION MUESTRA DETALLES PARA RESERVACIONES ##########################

?>

<?php
######################## MUESTRA HABITACIONES RESERVADAS ###########################
if (isset($_GET['BuscaHabitacionesReservadasergergergergergergergergergergregerge']) && isset($_GET['desde']) && isset($_GET['hasta']) && isset($_GET['check'])) {

$check = limpiar($_GET['check']);
$desde = limpiar($_GET['desde']);
$hasta = limpiar($_GET['hasta']);
$tipo = limpiar($_GET['tipo']);

//var_dump($check1 = explode(",",$check));
//echo $num = count($check1);
//$check1 = implode(",",$check);

$check1 = explode(",",$_GET['check']);
$num = count($check1);

if($tipo!= 1 && $tipo!= 2 && $tipo== ""){

    echo "<div class='alert alert-danger'>";
    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
    echo "<center><span class='fa fa-info-circle'></span> HA OCURRIDO UN ERROR EN EL PROCESAMIENTO DE LA INFORMACIÓN, VERIFIQUE NUEVAMENTE </center>";
    echo "</div>";    
    exit;

  } elseif($tipo==1){



?>

<!-- Row -->
<div class="row">
  <div class="col-md-12">
    <div class="card card-body printableArea">
      <h3><b>DETALLES DE RESERVACIÓN</b></h3>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="pull-left">
            <address>
              <h3> &nbsp;<b class="text-danger"><?php echo $con[0]['nomhotel'] ?></b></h3>
              <p class="text-muted ml-1"><i class="fa fa-flash"></i> Nº <?php echo ($con[0]['documenhotel'] == '0' ? "DOC:" : $con[0]['documento'].": ")." ".$con[0]['nrohotel'] ?>,
                <br/> <i class="fa fa-map-marker"></i> <?php echo $con[0]['direchotel'] ?>,
                <br/> <i class="fa fa-envelope"></i> <?php echo $con[0]['emailhotel'] ?>,
                <br/> <i class="fa fa-phone"></i> <?php echo $con[0]['tlfhotel'] ?></p>
              </address>
            </div>
            <div class="pull-right text-right">
              <!--<address>
                <h3>To,</h3>
                <h4 class="font-bold">Gaala & Sons,</h4>
                <p class="text-muted ml-4">E 104, Dharti-2,
                <br/> Nr' Viswakarma Temple,
                <br/> Talaja Road,
                <br/> Bhavnagar - 364002</p>
                <p class="mt-4"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd Jan 2018</p>
                <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2018</p>
              </address>-->

              <address>
                <h3><?php switch($con[0]['categoriahotel']){ case 1: ?>
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
                 } ?>  </h3>
                <h4 class="font-bold">ESTRELLAS</h4>
                  <p class="mt-2"><b>Fecha de Entrada :</b> <i class="fa fa-calendar"></i> <?php echo date("d-m-Y", strtotime($desde)); ?></p>
                  <p><b>Fecha de Salida :</b> <i class="fa fa-calendar"></i> <?php echo date("d-m-Y", strtotime($hasta)); ?></p>
                </address>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive mt-2" style="clear: both;">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nº</th> 
                      <th>N° de Habitación</th>
                      <th>Tipo de Habitación</th>
                      <th>Descripción de Habitación</th>
                      <th>Noches</th>
                      <th>Costo</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$a=1;
 
$inicio = $desde;
$fin = $hasta; 


$temp = new Login();
$temporada = $temp->BuscarTemporadas();

$bus = new Login();
$detalle = $bus->VerificaReservaciones(); 


for($i=0;$i<sizeof($detalle);$i++){  


$pago = 0;

  for($c=0;$c<sizeof($temporada);$c++){

    if($temporada[$c]['temporada']=='BAJA') {

        echo $costo = $detalle[$i]['baja']; 

    } elseif($temporada[$c]['temporada']=='MEDIA') {

       echo $costo = $detalle[$i]['media'];

    } elseif($temporada[$c]['temporada']=='ALTA') {

        echo $costo = $detalle[$i]['alta'];

    } 

    $pago = $pago + $costo;
  }


  $dias = Dias_Transcurridos($desde,$hasta)+1;
?>
                    <tr>
                      <td><?php echo $a++; ?></td>
        <td><input name="codhabitacion[]" type="hidden" id="codhabitacion" value="<?php echo $detalle[$i]['codhabitacion']; ?>" /><?php echo $detalle[$i]['numhabitacion']; ?></td>
        <td><?php echo $detalle[$i]['nomtipo']; ?>: <?php echo $detalle[$i]['baja']; ?>-<?php echo $detalle[$i]['media']; ?>-<?php echo $detalle[$i]['alta']; ?></td>
        <td><?php echo $detalle[$i]['descriphabitacion']; ?></td>
        <td><?php echo Dias_Transcurridos($desde,$hasta)+1; ?></td>
        <td><input name="costototal[]" type="hidden" id="costototal" value="<?php echo sprintf ("%.2f", $pago); ?>" />$
          <?php echo sprintf ("%.2f", $pago); ?></td>
                    </tr><?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="pull-right mt-2 text-right">
                <p>
                <label>Subtotal:</label> <?php echo $simbolo; ?><label id="lblsubtotal" name="lblsubtotal">0.00</label><br>
                <input type="hidden" name="txtsubtotal" id="txtsubtotal" value="0.00"/>

                <label><?php echo $impuesto == '' ? "Impuesto" : $imp[0]['nomimpuesto']; ?> <?php echo $valor == '' ? "0.00" : $imp[0]['valorimpuesto']; ?>%:</label> <?php echo $simbolo; ?><label id="lbliva" name="lbliva">0.00</label><br>
                <input type="hidden" name="iva" id="iva" value="<?php echo $valor == '' ? "0.00" : $imp[0]['valorimpuesto']; ?>">
                <input type="hidden" name="txtIva" id="txtIva" value="0.00"/>

                <label>Descuento <?php echo $con[0]['dsctor'] ?>%:</label> <?php echo $simbolo; ?><label id="lbldescuento" name="lbldescuento">0.00</label> 
                <input type="hidden" name="descuento" id="descuento" value="<?php echo $con[0]['dsctor'] ?>"/>
                <input type="hidden" name="txtDescuento" id="txtDescuento" value="0.00"/>

                <input type="hidden" name="codcaja" id="codcaja" value="1"/>
                <input type="hidden" name="codcliente" id="codcliente" value="C1"/>
                <input type="hidden" name="tipodocumento" id="tipodocumento" value="TICKET"/>

              </p>
                <hr>
                <h3><b>Total :</b> <?php echo $simbolo; ?><label id="lbltotal" name="lbltotal">0.00</label>
                <input type="text" name="txtTotal" id="txtTotal" value="220.00"/>
                <!--<input type="text" class="form-control calculodevolucion" name="montopagado" id="montopagado" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Monto Recibido" autocomplete="off" required="" aria-required="true">
                <input type="text" name="montodevuelto" id="montodevuelto">-->

              </h3>
              </div>
              <div class="clearfix"></div>               

              <hr>
              <h5 class="card-title">Metodo de Pago</h5>
              <ul class="nav nav-tabs" role="tablist">
            
                <li role="presentation" class="nav-item">
                  <a href="#iefecty" class="nav-link active" onClick="CargaTab('EFECTIVO');" aria-controls="efecty" role="tab" data-toggle="tab" aria-expanded="true">
                    <span class="visible-xs"><i class="fa fa-money"></i></span> 
                    <span class="hidden-xs">Efectivo</span>
                  </a>
                </li>

                <li role="presentation" class="nav-item">
                  <a href="#itarjeta" class="nav-link" onClick="CargaTab('TARJETA');" aria-controls="credito" role="tab" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-credit-card"></i></span>
                    <span class="hidden-xs"> Tarjeta de Crédito</span>
                  </a>
                </li>

                <li role="presentation" class="nav-item">
                  <a href="#itransf" class="nav-link" onClick="CargaTab('TRANSFERENCIA');" aria-controls="transf" role="tab" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-folder-open"></i></span>
                    <span class="hidden-xs">Transferencia</span>
                  </a>
                </li>

                <li role="presentation" class="nav-item">
                  <a href="#icheque" class="nav-link" onClick="CargaTab('CHEQUE');" aria-controls="cheque" role="tab" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-file-archive-o"></i></span>
                    <span class="hidden-xs">Cheque</span>
                  </a>
                </li>

                <li role="presentation" class="nav-item">
                  <a href="#icredito" class="nav-link" onClick="CargaTab('CREDITO');" aria-controls="credito" role="tab" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-bank"></i></span>
                    <span class="hidden-xs">Crédito</span>
                  </a>
                </li>
              </ul>

              <div class="tab-content">

                <div id="muestratabs">

                  <!-- PAGO EN EFECTIVO -->
                  <div role="tabpanel" class="tab-pane active" id="iefecty">
                    <div class="row">
                      <div class="col-md-6 mt-3"> 
                        <div class="form-group has-feedback"> 
                          <label class="control-label">Monto Pagado: <span class="symbol required"></span></label> 
                          <input type="hidden" name="tipopago" id="tipopago" value="EFECTIVO">
                          <input type="text" class="form-control" name="montopagado" id="montopagado" onKeyUp="this.value=this.value.toUpperCase(); EfectivoReserva();" placeholder="Ingrese Monto Recibido" autocomplete="off" required="" aria-required="true">
                          <i class="fa fa-tint form-control-feedback"></i>
                        </div> 
                      </div>
                      <div class="col-md-6 mt-3"> 
                        <div class="form-group has-feedback"> 
                          <label class="control-label">Monto Devuelto: <span class="symbol required"></span></label> 
                          <input type="hidden" name="montodevuelto" id="montodevuelto">
                          <input type="text" class="form-control" name="devolucion" id="devolucion" value="0.00" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Monto Devuelto" autocomplete="off" disabled="" required="" aria-required="true">
                          <i class="fa fa-tint form-control-feedback"></i>
                        </div> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12"> 
                        <div class="form-group has-feedback"> 
                          <label class="control-label">Observaciones: <span class="symbol required"></span></label> 
                          <textarea class="form-control" name="observaciones" id="observaciones" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Observaciones de Pago" autocomplete="off" rows="2" required="required"></textarea>
                          <i class="fa fa-comment-o form-control-feedback"></i>
                        </div> 
                      </div>
                    </div>
                  </div>

                </div>
              
              <div class="clearfix"></div>
              <hr>
              <div class="text-right">
  <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-info"><span class="fa fa-print"></span> Registrar</button>
  <button type="button" onClick="LimpiarTabs();" class="btn btn-dark"><span class="fa fa-trash-o"></span> Limpiar</button>
              </div>
            </div>

      </div>
    </div>
  </div>
</div>
<!-- End Row -->

<?php 

  } elseif($tipo==2){

 ?>

<hr>
<div class="container boxed">
    <div class="mb20">

  <div class='alert alert-danger'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <center><span class='fa fa-info-circle'></span> POR FAVOR ESTE MODULO SE ENCUENTRA EN CONSTRUCCION </center>
    </div> 

        </div>
</div>

  <?php
    
    }
} 
############################# MUESTRA HABITACIONES RESERVADAS ###########################
?>