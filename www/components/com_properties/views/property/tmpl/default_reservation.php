<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip'); 
JHTML::_('behavior.formvalidation');
?>
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>
<?php
if(!JRequest::getVar('Itemid')){$Itemid = 0;}
else{$Itemid = JRequest::getVar('Itemid');}
$row=$this->Product;
?>
<div id="propiedades" style="border: 1px solid #c4c4c4;">
<div id="propiedad">
<div id="propiedadTitulo">
<h1> <?php echo $row->name;?></h1>
</div>


<div id="detallesPropiedad">
<div class="detalleProducto" style="width:48%; float:left; margin:0px !important;">
<?php
if($row->price!=0){
$number = $row->price;
		if ($currencyformat==0) {
			$formatted_price = number_format($number);
		} else if ($currencyformat==1) {
			$formatted_price = number_format($number, 2,".",",");
		} else if ($currencyformat==2) {
			$formatted_price = number_format($number, 0,",",".");
		} else if ($currencyformat==3) {			
			$formatted_price = number_format($number, 2,",",".");
		}
if($PositionPrice==0){
echo JText::_('Price'); ?>: <?php echo $SimbolPrice.' '. $formatted_price; 
}else{
echo JText::_('Price'); ?>: <?php echo $formatted_price .' '. $SimbolPrice;
}
echo '<br />';
}
?>

<?php if($row->adress){echo JText::_('Adress') .' : '. $row->adress.'<br />';} ?>
<?php if($row->years){echo JText::_('Years') .' : '. $row->years.'<br />';} ?>
<?php if($row->bedrooms){echo JText::_('Bedrooms') .' : '. $row->bedrooms.'<br />';} ?>
<?php if($row->bathrooms){echo JText::_('Bathrooms') .' : '. $row->bathrooms.'<br />';} ?>
<?php if($row->garage){echo JText::_('Garage') .' : '. $row->garage.'<br />';} ?>
<?php if($row->area){echo JText::_('Total Area') .' : '. $row->area.' '.JText::sprintf('Simbol Metric').'<br />';} ?>
<?php if($row->covered_area){echo JText::_('Covered Area') .' : '. $row->covered_area.' '.JText::sprintf('Simbol Metric').'<br />';} ?>
<?php if($row->available){echo JText::_('DETAILS MARKET').' : '.JText::_('DETAILS_MARKET'.$row->available).'<br />';} ?>

</div>

 <div style="clear:both"></div>
</div><!-- detallesPropiedad-->

</div><!-- propieda-->



<?php
$dias_reservados[20081127] = 1;
$dias_reservados[20081126] = 1;
$dias_reservados[20081125] = 1;
$dias_reservados[20081119] = 1;
$dias_reservados[20081118] = 1;
$dias_reservados[20081117] = 1;
//print_r($dias_reservados);

$errorReserva=0;
if(JRequest::getVar('fechaD')){$sd=JRequest::getVar('fechaD');}
if(JRequest::getVar('fechaA')){$ed=JRequest::getVar('fechaA');}

if($ed == '' || $sd == ''){$Error .= '<p style="color:red"><b> error : '.JText::_( 'Empty Date' ).'</b></p>';$errorReserva=1;
}else{
$sdD = explode('-',$sd);
$desde=$sdD[2].$sdD[1].$sdD[0];
$edD = explode('-',$ed);
$hasta=$edD[2].$edD[1].$edD[0];
//echo 'hasta'.$hasta;
echo checkdate($sdD[1], $sdD[0], $sdD[2]);
if(checkdate($sdD[1], $sdD[2], $sdD[0]) & checkdate($edD[1], $edD[2], $edD[0]))

{
$timestamp1 = mktime(0, 0, 0, $sdD[1], $sdD[2], $sdD[0]);
$timestamp2 = mktime(0, 0, 0, $edD[1], $edD[2], $edD[0]); 

$diferencia = $timestamp2 - $timestamp1;

$dias=$diferencia/86400;
//echo 'dias'.$dias;
}else{echo 'error chek';}
}
if($dias<0){$Error .= '<p style="color:red"><b> error : '.JText::_( 'Error Date' ).'</b></p>';$errorReserva=1;}
if($ed == $sd){$Error .= '<p style="color:red"><b> error : '.JText::_( 'Equal Date' ).'</b></p>';$errorReserva=1;}


for($x=0;$x<=$dias;$x++)
{
$reservar[$desde]=($sdD[0]+$x).'-'.$sdD[1].'-'.$sdD[2];

if(isset($dias_reservados[$desde])){$Error .= '<p style="color:red"><b> error : '.$reservar[$desde].' está reservado</b></p>';$errorReserva=1;}
$desde++;
}
 
?>

<div id="calendarios" style="width:300px; margin-top:20px; float:right; border: 1px solid #CCCCCC;">

<form action="<?php echo JRoute::_( 'index.php' ); ?>"  method="post" id="josForm" name="josForm" class="form-validate">
<?php if($Error){ echo $Error;}?>
<div class="calendario" style="float:left;padding-left:20px;">   
<table><tr><td>  
 <p class="lastup"><label for="sdR"><?php echo JText::_('From');?> : </label></p>
 </td><td>

 <?php echo JHTML::_('calendar', $sd, 'fechaD', 'fechaD', '%Y-%m-%d', array('class'=>'inputbox2', 'size'=>'20',  'maxlength'=>'19')); ?>
 </td></tr>
<tr><td> 
<p class="lastup"><label for="edR"><?php echo JText::_('To');?> : </label></p>
</td><td>


 
       <?php echo JHTML::_('calendar', $ed, 'fechaA', 'fechaA', '%Y-%m-%d', array('class'=>'inputbox2', 'size'=>'20',  'maxlength'=>'19')); ?>
</td></tr>
<tr><td>
<p class="lastup"><label for="edR"><?php echo JText::_('Days');?> : </label></p>
</td><td>
   <?php echo $dias;?>
</td></tr>
</table>
   </div>   

  <div style="clear: both;"></div>

<?php 
if($errorReserva==0){
?>

<div align="center" class="calendarioinput" style="padding:10px;height:30px; width:300px;"> 

<label id="emailmsg" for="email"><?php echo JText::_( 'Email' ); ?>: </label>
<input type="text" id="email" name="email" size="40" value="" class="inputbox required validate-email" maxlength="100" />
</div>
        
<input type="hidden" name="option" value="com_properties" />
<input type="hidden" name="view" value="property" />
<input type="hidden" name="layout" value="default_reservation" />
<input type="hidden" name="task" value="confirmar_reserva" />
<input type="hidden" name="agent_id" value="<?php echo $row->agent_id;?>" />
<input type="hidden" name="id" value="<?php echo $row->id;?>" />
<input type="hidden" name="titulo" value="<?php echo $row->name;?>" />
<input type="hidden" name="linkid" value="<?php echo JRequest::getVar('linkid'); ?>" />
<input type="hidden" name="linkcatid" value="<?php echo JRequest::getVar('linkcatid'); ?>" />
<input type="hidden" name="linktypeid" value="<?php echo JRequest::getVar('linktypeid'); ?>" />
<input type="hidden" name="cid" value="<?php echo JRequest::getVar('cid'); ?>" />
<input type="hidden" name="tid" value="<?php echo JRequest::getVar('tid'); ?>" />
  <div align="center" style="margin-bottom:20px;">  
  <button class="button validate" type="submit"><?php echo JText::_('Confirm'); ?></button> 
    </div>   
<?php
}else{
?>

<input type="hidden" name="option" value="com_properties" />
<input type="hidden" name="view" value="default_reservation" />
<input type="hidden" name="task" value="send_reservation" />
<input type="hidden" name="agent_id" value="<?php echo $row->agent_id;?>" />
<input type="hidden" name="id" value="<?php echo $row->id;?>" />
<input type="hidden" name="titulo" value="<?php echo $row->name;?>" />
<input type="hidden" name="linkid" value="<?php echo JRequest::getVar('linkid'); ?>" />
<input type="hidden" name="linkcatid" value="<?php echo JRequest::getVar('linkcatid'); ?>" />
<input type="hidden" name="linktypeid" value="<?php echo JRequest::getVar('linktypeid'); ?>" />
<input type="hidden" name="cid" value="<?php echo JRequest::getVar('cid'); ?>" />
<input type="hidden" name="tid" value="<?php echo JRequest::getVar('tid'); ?>" />

  <div align="center" style="margin-bottom:20px; "> 
  
  <button class="button validate" type="submit"><?php echo JText::_('Reserve'); ?></button> 

  </div>   
  


<?php
}
?>


</form></div>

</div>













