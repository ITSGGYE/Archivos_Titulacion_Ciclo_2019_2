<?php
$cre = $_REQUEST['cre'];
$taz = $_REQUEST['taz'];
$mes = $_REQUEST['mes'];
$fec = $_REQUEST['fec'];

$p1=$fec;	
	$dia=substr($p1,0,2);
    $mesa=substr($p1,3,2);
    $ano=substr($p1,6,4);





$cata3 = ($taz*0.01)/12;

$cata = $cata3;


$pote1=pow((1+$cata),$mes);

$pote = $pote1;


$tapo1 = $cata*$pote;

$tapo = $tapo1;


$capo12 = $pote-1;

$capo1 = $capo12;

$divi1 = $tapo/$capo1;

$divi = $divi1;

$couta1 = $cre*$divi;

$couta = $couta1;

$coutar = number_format($couta1, 2);
	
$variablephp =$coutar;	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	

	     
	 
	 
 <input name="fec1" type="hidden" id="fec1" value="<?php print $fec;?>"  />    
			
	
 <input name="cre1" type="hidden" id="cre1" value="<?php print $cre;?>"  /> 
	 
 
<input name="taz1" type="hidden" id="taz1" value="<?php print $taz;?>"  /> 

 <input name="mes1" type="hidden" id="mes1" value="<?php print $mes;?>"  />      	
			



 <input name="cata" type="hidden" id="cata" value="<?php print $cata;?>"  />      	
						
	
  
<input name="pote" type="hidden" id="pote" value="<?php print $pote;?>"  />      

<input name="tapo" type="hidden" id="tapo" value="<?php print $tapo;?>"  />  



<input name="capo1" type="hidden" id="capo1" value="<?php print $capo1;?>"  />  	
	



<input name="divi" type="hidden" id="divi" value="<?php print $divi;?>"  />  



<input name="couta" type="hidden" id="couta" value="<?php print $couta;?>"  />  	

  
 
                       
	 <table style="width:150%" border="1"  class="table-bordered" id="examplea" name="examplea">
						<thead style="height:45" >
							
							<tr>
							 
								
								<th bgcolor="#999933">Periodo</th>
								<th bgcolor="#999933">Fecha Pago</th>
							    <th bgcolor="#999933">Saldo Deuda</th>
								<th bgcolor="#999933">capital</th>
								
								<th bgcolor="#999933">interes</th>
								<th bgcolor="#999933">cuota</th>
								<th bgcolor="#999933">Saldo final</th>
								
								
								
								
							</tr>
						</thead>
		<tbody>
        
    
           
        
        
        
		<?php	
				$i=0;
				$i2=0;
				$sal = "";
				
				$todo="";
		
				
				
				
			while($i<$mes ){
			
			$i=$i+1;
			$i2=$i2+1;	
			$cre3 = "";
			$inte = "";
			$capi = "";
			
			
			$p1=$fec;	
			$dia=substr($p1,0,2);
			$mesa=substr($p1,3,2);
			$ano=substr($p1,6,4);
			
			
			$date =$dia."-".$mesa."-".$ano ;
			//Incrementando 2 dias
			$mod_date = strtotime($date."+ 31 days");
			
			$fec=date("d/m/Y",$mod_date);
			
			
			if($i==1 )
			{
				$cre3 = $cre;
				
				$inte = $cre3 * $cata;
				$capi = $couta - $inte;
				$sal = $cre3 - $capi;
				
				
				
	
				
			
			
			}
			else
			{
				$cre3 = $sal;
				
				$inte = $cre3 * $cata;
				$capi = $couta - $inte;
				$sal = $cre3 - $capi;
			
			
			}
			
			if ($i==$mes)
			$sal = 0;
		
			$f=date("d/m/Y",$mod_date);
			$cr=number_format($cre3, 2, ".", "");
			$ca=number_format($capi, 2, ".", "");
			$in=number_format($inte, 2, ".", "");
			$cu=number_format($couta, 2, ".", "");
			$sa=number_format($sal, 2, ".", "");
			
			
			
			
			
			
						$fecre3=$f;
 $fechaString23 = $fecre3;
    //el formato va acorde a la fecha como string
    $objetoFecha23 = DateTime::createFromFormat("d/m/Y", $fechaString23 );
     
    //el formato ahora es acorde a lo que ocupamos, segun mysql
    $fecre13 = $objetoFecha23 ->format("Y-m-d");
			
			$todo = $i."-".$f."-".$cr."-".$ca."-".$in."-".$cu."-".$sa;
			
			?>
		<tr style="height:25px; background-color:#FFFFFF">
   
    <td style="text-align:right"><?php echo $i ;?> 
	
	
	
	  <input name="idpa[]" type="hidden" id="idpa<?php echo $i2 ?>" value="<?php echo $todo ;?>">   
	  <input type="hidden" name="idp[]" id="idp<?php echo $i2 ?>">
	  
	  </td>
	<td style="text-align:right"><?php echo date("d/m/Y",$mod_date) ;?></td>
	
	
      <td style="text-align:right"><?php echo number_format($cre3, 2) ;?></td>
	    <td style="text-align:right"><?php echo number_format($capi, 2);?></td>
		 <td style="text-align:right"><?php echo number_format($inte, 2);?></td>
		  <td style="text-align:right"><?php echo number_format($couta, 2);?></td>
					  
					  

 
 
  
       <td style="text-align:right"><?php echo number_format($sal, 2);?></td>
     </tr>
     		
				<?php 
			}?>
	   </tbody>
 </table>
       
            
</body>
</html>
<script type="text/javascript">
var variablejs = "<?php echo $variablephp; ?>" ;
document.miforma.copa.value =variablejs;
</script> 