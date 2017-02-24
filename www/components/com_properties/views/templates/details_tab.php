<div style="width:100%;">

<?php


jimport('joomla.html.pane');
$pane =& JPane::getInstance('tabs', array('startOffset'=>0));
echo $pane->startPane( 'pane' );





if($ActivarDescripcion == 1){
echo $pane->startPanel( '<img class="editlinktip hasTip" alt="'.JText::_('Description').'" title="'.JText::_('Description').'" src="components/com_properties/includes/img/detalles.png" />', 'panel1' );
}


echo $Product->text;



echo $pane->endPanel();
if($ActivarDetails == 1){
echo $pane->startPanel( '<img class="editlinktip hasTip" alt="'.JText::_('Detail').'" title="'.JText::_('Detail').'" src="components/com_properties/includes/img/description.png" />', 'panel1' );
}

?>	 
<div class="tituloProduct" style="float:left;  border-bottom:1px solid grey;"><?php echo $Product->name;?></div>
<div class="detalleProduct" style="width:100%; float:left; margin:0px !important;">
<?php
if($Product->price!=0){
$number = $Product->price;
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
$showprice = '<tr><td align="right">'.JText::_('Price') .' :</td><td align="left">'. $SimbolPrice.' '. $formatted_price.'</td></tr>'; 
}else{
$showprice = '<tr><td align="right">'.JText::_('Price') .' :</td><td align="left">'. $formatted_price .' '. $SimbolPrice.'</td></tr>';
}

}
?>
<table><tr><td width="50%">
<table>
<?php echo $showprice; ?>
<?php if($Product->adress){echo '<tr><td align="right">'.JText::_('Adress') .' :</td><td align="left">'. $Product->adress.'</td></tr>';} ?>
<?php if($Product->years){echo '<tr><td align="right">'.JText::_('Years') .' :</td><td align="left"> '. $Product->years.'</td></tr>';} ?>
<?php if($Product->bedrooms){echo '<tr><td align="right">'.JText::_('Bedrooms') .' :</td><td align="left"> '. $Product->bedrooms.'</td></tr>';} ?>
<?php if($Product->bathrooms){echo '<tr><td align="right">'.JText::_('Bathrooms') .' :</td><td align="left"> '. $Product->bathrooms.'</td></tr>';} ?>
<?php if($Product->garage){echo '<tr><td align="right">'.JText::_('Garage') .' :</td><td align="left"> '. $Product->garage.'</td></tr>';} ?>
<?php if($Product->area){echo '<tr><td align="right">'.JText::_('Total Area') .' :</td><td align="left"> '. $Product->area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($Product->covered_area){echo '<tr><td align="right">'.JText::_('Covered Area') .' :</td><td align="left"> '. $Product->covered_area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($Product->available){echo '<tr><td align="right">'.JText::_('DETAILS MARKET').' :</td><td align="left"> '.JText::_('DETAILS_MARKET'.$Product->available).'</td></tr>';} ?>
</table>
</td>
<td width="50%" valign="top">
<table>
<tr>
<td>
<?php echo $Product->description; ?><br />
</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="100%" style="border-top:1px solid grey;"><tr><td width="50%">
<table>
<?php if($Product->extra1){echo '<tr><td align="right">'.JText::_('extra1') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra2){echo '<tr><td align="right">'.JText::_('extra2') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra3){echo '<tr><td align="right">'.JText::_('extra3') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra4){echo '<tr><td align="right">'.JText::_('extra4') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra5){echo '<tr><td align="right">'.JText::_('extra5') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra6){echo '<tr><td align="right">'.JText::_('extra6') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra7){echo '<tr><td align="right">'.JText::_('extra7') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra8){echo '<tr><td align="right">'.JText::_('extra8') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra9){echo '<tr><td align="right">'.JText::_('extra9') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra10){echo '<tr><td align="right">'.JText::_('extra10') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>



</table>
</td>
<td width="50%" valign="top">
<table>

<?php if($Product->extra11){echo '<tr><td align="right">'.JText::_('extra11') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra12){echo '<tr><td align="right">'.JText::_('extra12') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra13){echo '<tr><td align="right">'.JText::_('extra13') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra14){echo '<tr><td align="right">'.JText::_('extra14') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra15){echo '<tr><td align="right">'.JText::_('extra15') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra16){echo '<tr><td align="right">'.JText::_('extra16') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra17){echo '<tr><td align="right">'.JText::_('extra17') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra18){echo '<tr><td align="right">'.JText::_('extra18') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra19){echo '<tr><td align="right">'.JText::_('extra19') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra20){echo '<tr><td align="right">'.JText::_('extra20') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>

<?php if($Product->extra21){echo '<tr><td align="right">'.JText::_('extra21') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra22){echo '<tr><td align="right">'.JText::_('extra22') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra23){echo '<tr><td align="right">'.JText::_('extra23') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra24){echo '<tr><td align="right">'.JText::_('extra24') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra25){echo '<tr><td align="right">'.JText::_('extra25') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra26){echo '<tr><td align="right">'.JText::_('extra26') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra27){echo '<tr><td align="right">'.JText::_('extra27') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra28){echo '<tr><td align="right">'.JText::_('extra28') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra29){echo '<tr><td align="right">'.JText::_('extra29') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra30){echo '<tr><td align="right">'.JText::_('extra30') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>

<?php if($Product->extra31){echo '<tr><td align="right">'.JText::_('extra31') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra32){echo '<tr><td align="right">'.JText::_('extra32') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra33){echo '<tr><td align="right">'.JText::_('extra33') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra34){echo '<tr><td align="right">'.JText::_('extra34') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra35){echo '<tr><td align="right">'.JText::_('extra35') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra36){echo '<tr><td align="right">'.JText::_('extra36') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra37){echo '<tr><td align="right">'.JText::_('extra37') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra38){echo '<tr><td align="right">'.JText::_('extra38') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra39){echo '<tr><td align="right">'.JText::_('extra39') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($Product->extra40){echo '<tr><td align="right">'.JText::_('extra40') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>

<?php if($Product->extra41){echo '<tr><td align="right">'.JText::_('extra41') .':</td><td align="left">'. JText::_( $Product->extra41 ) .'</td></tr>';} ?>

</table>
</td>
</tr>
</table>
</div>

 <div style="clear:both"></div>
<?php




if($ActivarTabs == 1){
echo $pane->endPanel();
echo $pane->startPanel( '<img class="editlinktip hasTip" alt="'.JText::_('Images').'" title="'.JText::_('Images').'" src="components/com_properties/includes/img/foto.png" />', 'panel2' );
}
$watermark=JText::_('DETAILS_MARKET'.$Product->available).'-'.$lang->getTag().'.png';
   $destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS.'peque_';
$WidthThumbsDetail=$params->get('WidthThumbsDetail');
$HeightThumbsDetail=$params->get('HeightThumbsDetail');      
   
   
if($ShowImagesSystem == 2){
$rel='dogs0';
}elseif($ShowImagesSystem == 1){
$rel='lightbox['.$Product->id.']';
}

  
if($ShowImagesSystem == 2 or $ShowImagesSystem == 1){
?>
<div class="tituloProduct2" style="float:left; height:10px;"></div>
<div style="clear: both;"></div>
<div class="imgslimbox">
	
    
    
<?php    
$rout_image = 'images/properties/images/'.$Product->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$Product->id.'/';
foreach($this->ImagesProduct as $image){

if(JFile::exists($image->path)){
?>
<a href="<?php echo $rout_image.$image->name; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->name); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>" height="<?php echo $HeightThumbsDetail; ?>" src="<?php echo $rout_thumb.$image->name; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php
}
}

?>				

</div>


<?php  
}//END SLIMBOX
if($ShowImagesSystem == 3){

}
?>



<div style="clear: both;"></div>

<!--END IMAGE TABLE-->	






<?php 

if($ActivarVideo == 1){
if($ActivarTabs == 1){
echo $pane->endPanel();
echo $pane->startPanel( '<img class="editlinktip hasTip" alt="'.JText::_('Video').'" title="'.JText::_('Video').'" src="components/com_properties/includes/img/panoramica.png" />', 'panel7' );

}

echo $this->Video->text;

}




if($ActivarPanoramica == 1){
if($ActivarTabs == 1){
echo $pane->endPanel();
echo $pane->startPanel( '<img class="editlinktip hasTip" alt="'.JText::_('Panoramic').'" title="'.JText::_('Panoramic').'" src="components/com_properties/includes/img/360.jpg" />', 'panel2' );
}

$caption = $Product->name;

$destino_panoramica1 = JURI::base().'images/properties/panoramics/'.$Product->panoramic;
if($Product->panoramic!=NULL){
?>        	
<?php echo"
<script type=\"text/javascript\" >
			window.addEvent('load', init2);			
			function init2() {
				var myPamoo = new pamoorama('pamoorama1', {width: 480, footercolor: '#fff', captioncolor: '#000', caption: '$caption'});
					}
		</script>
<div class=\"tituloProduct\" style=\"float: left; \"></div>	
<center><div style=\"width: 500px;\" id=\"pamoorama1\" alt=\"$destino_panoramica1\"></div></center>";
?>
<?php 
}
}/*Final if ActivarPanoramica*/
if($ActivarContactar == 1){
if($ActivarTabs == 1){
echo $pane->endPanel();
echo $pane->startPanel( '<img class="editlinktip hasTip" alt="'.JText::_('Contact').'" title="'.JText::_('Contact').'" src="components/com_properties/includes/img/contactar.png" />', 'panel3' );
}
?>

<div id="contactarporestapropiedad">
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>
<script type="text/javascript">
function ValidateCaptcha(a,b,c){
var progressvc = $('progressvc');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajaxCaptcha&format=raw&task=ValidateCaptcha",
{method: 'get',
onRequest: function(){progressvc.setStyle('visibility', 'visible');},
onComplete: function(){progressvc.setStyle('visibility', 'hidden');},
update: $('ValidateCaptcha'), 
data: 'captchacode='+a+'&captchasuffix='+b+'&captchasessionid='+c}).request();
			}	
</script>
<?php
	if(isset($this->message)){
		$this->display('message');
	}
//echo 'msg : '.$this->msg;

	//index.php?option=com_properties&view=property&catid='.$Product->catslug.'&id='.$Product->slug
?>

<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" id="josForm2" name="josForm2" class="form-validate">
<input type="hidden" name="linkid" value="<?php echo JRequest::getVar('id'); ?>" />
<input type="hidden" name="linkcid" value="<?php echo JRequest::getVar('cid'); ?>" />
<input type="hidden" name="linktid" value="<?php echo JRequest::getVar('tid'); ?>" />
<input type="hidden" name="subject" value="<?php echo $Product->name; ?>" />

<div class="componentheading"><?php echo JText::_( 'Contact for Property' ); ?></div>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="name"><?php echo JText::_( 'Name' ); ?>: </label>
	</td>
  	<td><input type="text" name="name" id="name" size="40" value="<?php //echo $this->user->get( 'name' );?>" class="inputbox required" maxlength="50" /></td>
</tr>
<tr>
	<td height="40">
		<label id="emailmsg" for="email"><?php echo JText::_( 'Email' ); ?>: </label>
	</td>
	<td><input type="text" id="email" name="email" size="40" value="<?php //echo //$this->user->get( 'email' );?>" class="inputbox required validate-email" maxlength="100" /></td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="name"><?php echo JText::_( 'Phone' ); ?>: </label>
	</td>
  	<td><input type="text" name="phone" id="phone" size="40" value="<?php //echo $this->user->get( 'name' );?>" class="inputbox" maxlength="50" /></td>
</tr>
<tr>
<tr>
	<td height="40">
		<label id="emailmsg" for="text">
			<?php echo JText::_( 'Message' ); ?>:
		</label>
	</td>
	<td>
    <textarea name="text" id="text"cols="40" rows="3"></textarea>
	</td>
</tr>
<tr>
	<td colspan="2" height="40">
<input type="checkbox" name="email_copy" id="contact_email_copy" value="1"  />

				<label for="contact_email_copy">
					<?php echo JText::_( 'Send me a copy' ); ?>
				</label>
	</td>
</tr> 
<tr>
	<td colspan="2">

<?php $dispatcher = &JDispatcher::getInstance();
			//JPluginHelper::importPlugin('system');
			$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.contact' ) );
			if ($results[0]){?>		
<table>
<tr><td align="center" colspan="2">
<span><?php echo JText::_( 'CAPTCHACODE_FORM_TITLE' ) ?></span>	
</td>
<td colspan="2"></td>
</tr>
<tr>
<?php 	
			
				$dispatcher->trigger( 'onCaptchaView', array( 'user.contact', 0, '', '' ) ); 
?>
<td width="20px">
<div id="ValidateCaptcha" style="float:left;"></div>
</td>
<td>
<div style="float:right">      
<a style="cursor:pointer;" onclick="ValidateCaptcha(document.getElementById('captchacode1').value,document.getElementById('captchasuffix').value,document.getElementById('captchasessionid').value)"><?php echo JText::_('Test Code'); ?></a>
</div> 
</td>
</tr>
<tr>
    <td colspan="3"><div id="progressvc" style="float:left;"></div> </td>
  </tr>
</table>	
<?php } ?>
</td>
</tr>         
</table>
  <div align="center" style="margin-bottom:20px;">
 
	<button class="button validate" type="submit"><?php echo JText::_('Send'); ?></button>
    </div>
    <input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="view" value="property" />
	<input type="hidden" name="task" value="enviar_consulta" />
    <input type="hidden" name="id" value="<?php echo $Product->id;?>" />
    <input type="hidden" name="agent_id" value="<?php echo $Product->agent_id;?>" />
<?php 	
	$u =& JFactory::getURI();
	?>    
    <input type="hidden" name="return" value="<?php echo $u->toString();?>" />
	<?php echo JHTML::_( 'form.token' );?>
</form>
</div>




<?php 
}/*Final ActivarContactar*/





if($ActivarReservas == 1){
if($Product->use_booking){
if($ActivarTabs == 1){
echo $pane->endPanel();
echo $pane->startPanel( '<img class="editlinktip hasTip" alt="'.JText::_('Reserve').'" title="'.JText::_('Reserve').'" src="components/com_properties/includes/img/reservar.png" />', 'panel4' );
}
?>






<?php 
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'bookcalendar.php' );
?>


	<script language="javascript" type="text/javascript">
	function changedate(date,a){
/*	alert('Product_id='+<?php echo $Product->id;?>+'&date='+date+'&duration='+a);*/
var progressChD = $('progressChD');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajaxbooking&format=raw&task=changedate",
{method: 'get',
onRequest: function(){progressChD.setStyle('visibility', 'visible');},
onComplete: function(){progressChD.setStyle('visibility', 'hidden');},
update: $('Ajaxchangedate'), 
data: 'Product_id='+<?php echo $Product->id;?>+'&date='+date+'&duration='+a}).request();
this.document.josFormCal.fechaD.value=date;
			} 
 </script>
 
 
 <div id="calendarios">


<form action="<?php echo 'index.php?option=com_properties&view=booking'; ?>" name="josFormCal" class="formCalendario" id="josFormCal" method="post" >
<input type="hidden" name="linkid" value="<?php echo JRequest::getVar('id'); ?>" />
<input type="hidden" name="fechaD" value="" />
<?php if($ShowToCalendar==1){ ?>
<table class="select_calendar" border="0">
<tr><td>
     <?php echo JText::_('From'); ?> : 
      </td><td> 
      <?php echo JHTML::_('calendar', $this->datos->fecha, 'fechaD', 'fechaD', '%Y-%m-%d', array('class'=>'inputbox_calendar', 'size'=>'5',  'maxlength'=>'10')); ?>
</td>

<td> 
      <?php echo JText::_('To'); ?> : 
 </td>
 <td>      
      <?php echo JHTML::_('calendar', $this->datos->fecha, 'fechaA', 'fechaA', '%Y-%m-%d', array('class'=>'inputbox_calendar', 'size'=>'5',  'maxlength'=>'10')); ?>
</td>
</tr></table>
<?php } ?>





 
 
                    <table id="tableDuplexCalendarLegend">
                        <tbody>
                            <tr>
                                <td class="tdArrivalPossible img">&nbsp;</td>

                                <td>Available, Start day</td>
                            
                                <td class="tdArrivalNotPossible img">&nbsp;</td>
                                <td>Available, no start day</td>
                            
                                <td class="tdSelectedDates img">&nbsp;</td>

                                <td>Selected dates</td>
                           
                                <td class="tdBooked img">&nbsp;</td>
                                <td>Not available</td>
                            </tr>
                        </tbody>
                    </table>  
 
 <div id="progressChD"></div> 
 
 <div id="Ajaxchangedate">
<table class="admintable" width="100%">
	<tr>
		<td>
       <?php echo BookCalendar::ShowCalendarBooking( $Product->id,'',$AmountMonthsCalendar,3 ); ?>  
     
        
        </td>
	</tr>
</table>



<table class="select_calendar" border="0" align="left">
<tr>
<td> 
      <?php echo JText::_('Duration'); ?> : 
 </td>
  <td> 
<?php  
if($PeriodOnlyWeeks){
$Mp[0]->id_duration=7;
$Mp[0]->duration=JText::_('1 Week');
$Mp[1]->id_duration=14;
$Mp[1]->duration=JText::_('2 Weeks');
$Mp[2]->id_duration=21;
$Mp[2]->duration=JText::_('3 Weeks');
$Mp[3]->id_duration=28;
$Mp[3]->duration=JText::_('4 Weeks');
$Mp[4]->id_duration=35;
$Mp[4]->duration=JText::_('5 Weeks');
}else{
$Mp[0]->id_duration=3;
$Mp[0]->duration=JText::_('3 Days');
$Mp[1]->id_duration=4;
$Mp[1]->duration=JText::_('4 Days');
$Mp[2]->id_duration=5;
$Mp[2]->duration=JText::_('5 Days');
$Mp[3]->id_duration=6;
$Mp[3]->duration=JText::_('6 Days');
$Mp[4]->id_duration=7;
$Mp[4]->duration=JText::_('1 Week');
$Mp[5]->id_duration=14;
$Mp[5]->duration=JText::_('2 Weeks');
}
$javascript = 'onchange="changedate(document.josFormCal.dateselected.value,this.value)"';
$Comboduration       = JHTML::_('select.genericlist',   $Mp, 'duration', 'class="select_duration" '.$javascript,'id_duration', 'duration',  $Duration); 
echo $Comboduration;
?>
</td>
<td>     
  
</td></tr></table>







<?php
if($this->Rates){

?>
<input type="hidden" name="price" id="price" value="" />
<input type="hidden" name="rate" id="rate" value="" />
<table class="admintable" width="100%">
	<tr>
    	<td>
        
        </td>
    </tr>
</table>


<table style="" class="colorstripes" align="center" border="0">
<thead> 
<tr>
<th style="text-align: center;">Title</th>
<th style="text-align: center;">Period of travel</th>
<th style="text-align: center;">Price</th>
<th style="text-align: center;">&nbsp;</th>
</tr>
</thead> 
<tbody style="text-align: left;">

        <?php		
		$x=0;
		foreach($this->Rates as $d)
		{
			$x++;
			if($x % 2 == 0){$tr='#E0EBFF';}else{$tr='#FFFFFF';}
			$dato[] = $d;			
			?>            
			<tr style="text-align: left;">  
            <td style="text-align: center;"><?php echo $d->title;?></td>    
            <td style="text-align: center;"><?php echo date('d/m', strtotime($d->validfrom));?>-<?php echo date('d/m', strtotime($d->validto));?></td>
            <td style="text-align: center;"><?php echo $d->rateperweek;?></td>
            <td style="text-align: center;">
         <?php if($ShowToCheckbox==1){ ?>   
            <input type="checkbox" id="form_id_week[]" name="form_id_week[]" value="<?php echo $d->week;?>" />
            <input type="hidden" name="sdw[<?php echo $d->week;?>]" value="<?php echo $d->from;?>" />
            <input type="hidden" name="edw[<?php echo $d->week;?>]" value="<?php echo $d->to;?>" />
            <input type="hidden" name="price[<?php echo $d->week; ?>]" id="price[<?php echo $d->week; ?>]" value="<?php echo $d->price; ?>" />
          <?php }else{ ?>  
          
           <button class="buttonverde validate" type="submit" onclick="javascript:document.josFormCal.price.value='<?php echo $d->rateperweek;?>';document.josFormCal.rate.value='<?php echo $d->id;?>';"><?php echo JText::_('book now'); ?></button> 
           
          <?php } ?>  
            </td></tr>
            
			<?php }?>  
    </tbody>      
</table>
        
        
        



<?php
}
?>
	
</div>	




<div style="clear: both; margin-top:30px;"></div>
<?php
$uri 		=& JFactory::getURI();
$returnbook=str_replace('&', '&amp;', $uri->toString());
?>
<input type="hidden" name="returnbook" value="<?php echo $returnbook;?>" />

<input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="view" value="booking" />
	<input type="hidden" name="task" value="booking" />
    <input type="hidden" name="controller" value="booking" />
    <input type="hidden" name="id" value="<?php echo $Product->id;?>" />
    <input type="hidden" name="name" value="<?php echo $Product->name;?>" />
</form>

 </div>



<?php 
}/*Final if use_booking*/
}/*Final if ActivarReservas*/

if($ActivarMapa == 1){

if($ActivarTabs == 1){
echo $pane->endPanel();
echo $pane->startPanel( '<span class="image"><a onclick="recargarMapa();"><img class="editlinktip hasTip" width="20px" alt="'.JText::_('Map').'" title="'.JText::_('Map').'" src="components/com_properties/includes/img/mapa.png" /></a></span>', 'panel5' );

$apikey=$params->get('apikey');
$distancia=$params->get('distancia');
$lat = $Product->lat;
$lng = $Product->lng;
?>
<script type="text/javascript" src="<?php echo JURI::base();?>components/com_properties/includes/js/includes_map.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $apikey;?>"
      type="text/javascript"></script> 
 
 <script type="text/javascript"> 
  function loadmap() { 
      if (GBrowserIsCompatible()) { 
        var map = new GMap2(document.getElementById("map")); 
        map.setCenter(new GLatLng(<?php echo $lat;?>, <?php echo $lng;?>), <?php echo $distancia;?>);
		map.addControl(new GSmallMapControl());
		map.addControl(new GMapTypeControl());
		var marker = new GMarker(new GLatLng(<?php echo $lat;?>, <?php echo $lng;?>));
		map.addOverlay(marker);		
		}
    }
 function recargarMapa() {
setTimeout("loadmap()",50)
}
</script> 
<br />
<div align="center" style="float:left; text-align:center; width: 480px; height: 480px; overflow:hidden; padding-top: 30px; ">
<div id="map" style="width:480px; height:480px;"></div>
</div>
<div style="clear: both;"></div>

<?php 
}else{




$apikey=$params->get('apikey');
$distancia=$params->get('distancia');
$lat = $Product->lat;
$lng = $Product->lng;
?>
<script type="text/javascript" src="<?php echo JURI::base();?>components/com_properties/includes/js/2includes.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $apikey;?>"
      type="text/javascript"></script> 
 
 <script type="text/javascript"> 
  function loadmap() { 
      if (GBrowserIsCompatible()) { 
        var map = new GMap2(document.getElementById("map")); 
        map.setCenter(new GLatLng(<?php echo $lat;?>, <?php echo $lng;?>), <?php echo $distancia;?>);
		map.addControl(new GSmallMapControl());
		map.addControl(new GMapTypeControl());
		var marker = new GMarker(new GLatLng(<?php echo $lat;?>, <?php echo $lng;?>));
		map.addOverlay(marker);		
		}
    }
</script> 


<div id="map" style="width: 520px; height: 420px;margin:0px;padding:0px;">
</div>


<script type="text/javascript">  loadmap();  </script>
<div style="clear: both;"></div>

<?php
}
?>

<?php
if($ActivarTabs == 1){
echo $pane->endPanel();
}
}/*Final if ActivarMapa*/



if($showComments){

if($ActivarTabs == 1){
echo $pane->startPanel( '<span class="image"><img class="editlinktip hasTip" width="20px" alt="'.JText::_('Reviews').'" title="'.JText::_('Reviews').'" src="components/com_properties/includes/img/comments.png" /></span>', 'panel5' );
}



if($showComments){

?>





<div id="comments">
<h2><strong><?php echo JText::_('Reviews').' ('.count( $this->Comments ).')'; ?></strong></h2>



<?php 
if($ShowVoteRating){
echo '<div style="width:100%; float:left;margin-bottom: 10px;">';
echo '<div style="float:left;" >'.JText::_('Rating').' : </div>';
echo '<div  style="float:left;width:150px; padding-left:10px;">';

		echo VoteHelper::ShowVotes($Product->id,FALSE);

echo '</div>';
echo '</div><div style="clear:both"></div>';
}
?>    




<?php
//print_r($this->Comments);

	for ($i=0, $n=count( $this->Comments ); $i < $n; $i++)	
    {
$ProductC = &$this->Comments[$i];	
 ?>
<div class="comment">
<div class="comment_top" style="background: #EFEFEF; padding:5px;">
<?php 

echo VoteHelper::ShowVoteComment($ProductC->star).'&nbsp;  <b>'.$ProductC->title.' </b> '.JText::_('by').' '.$ProductC->name.' '.JText::_('on').' '.$ProductC->date; ?><br />
</div>

<div class="comment_text" style="padding: 7px;">
<table>

<?php if($useComment2){?>
<tr><td><?php echo JText::_('STAR1'); ?> : </td><td><?php echo $ProductC->star1; ?>/5</td></tr>
<?php } ?>
<?php if($useComment2){?>
<tr><td><?php echo JText::_('STAR2'); ?> : </td><td><?php echo $ProductC->star2; ?>/5</td></tr>
<?php } ?>
<?php if($useComment3){?>
<tr><td><?php echo JText::_('STAR3'); ?> : </td><td><?php echo $ProductC->star3; ?>/5</td></tr>
<?php } ?>
<?php if($useComment4){?>
<tr><td><?php echo JText::_('STAR4'); ?> : </td><td><?php echo $ProductC->star4; ?>/5</td></tr>
<?php } ?>
<?php if($useComment5){?>
<tr><td><?php echo JText::_('STAR5'); ?> : </td><td><?php echo $ProductC->star5; ?>/5</td></tr>
<?php } ?>

</table>
</div>
 
<div class="comment_text" style="padding: 7px;">
 <?php echo $ProductC->comment; ?>
 </div>
</div> <!-- comment-->
<div style="clear:both"></div>
<?php
}
 ?>
 

<?php
if($user->guest){
echo '<div class"comment_need_login">';
echo JText::_('Need login to add review');
echo '</div>';
}else{ 
$linkAjax=JRoute::_( JURI::base().'index.php?option=com_properties&format=raw&controller=comments&task=AddCommentAjax');
?>

<script type="text/javascript">
function AddCommentAjax(a,b){
//confirm('¿Está seguro?');
var progress = $('progressCm');
//document.getElementById('cambie').value = a;
//document.getElementById('pr').value = b;
new Ajax("<?php echo $linkAjax;?>", {method: 'post',
onRequest: function(){progress.setStyle('visibility', 'visible');},
onComplete: function(){progress.setStyle('visibility', 'hidden');},
update: $('log'),
data: $('commentForm')}).request();}

</script>

<div style="width:100%;">
 <?php 

if(!$this->MyComment){

?> 
<div id="log">
	<div class="form_comment">
		<form method="post" onsubmit="return false;" action="" id="commentForm" name="commentForm">
	<div>
		<label for="commentname"><?php echo JText::_('Name'); ?></label>
				<input readonly="readonly" name="commentname" id="commentname" value="<?php echo $user->name;?>" class="inputbox" type="text">
                
	</div>						
	<div>
		<label for="commentemail"><?php echo JText::_('Email'); ?></label>
				<input readonly="readonly" name="commentemail" id="commentemail" class="inputbox" value="<?php echo $user->email;?>" type="text">
	</div>				
	<div>
		<label for="commenttitle"><?php echo JText::_('Title'); ?></label>
				<input name="commenttitle" id="commenttitle" class="inputbox" type="text">
	</div>    
    <div>
		<label for="commentrating"><?php echo JText::_('star1'); ?></label>
    <span class="content_vote">
	<?php echo JText::_('Poor'); ?>
    <input alt="vote 1 star" name="star1" value="1" type="radio">
    <input alt="vote 2 star" name="star1" value="2" type="radio">
    <input alt="vote 3 star" name="star1" value="3" type="radio">
    <input alt="vote 4 star" name="star1" value="4" type="radio">
    <input alt="vote 5 star" name="star1" value="5" checked="checked" type="radio">
	<?php echo JText::_('Best'); ?>
 </span> 
 	</div>
    
   <?php if($useComment2){?>
    
    <div>
		<label for="commentrating"><?php echo JText::_('star2'); ?></label>
    <span class="content_vote">
	<?php echo JText::_('Poor'); ?>
    <input alt="vote 1 star" name="star2" value="1" type="radio">
    <input alt="vote 2 star" name="star2" value="2" type="radio">
    <input alt="vote 3 star" name="star2" value="3" type="radio">
    <input alt="vote 4 star" name="star2" value="4" type="radio">
    <input alt="vote 5 star" name="star2" value="5" checked="checked" type="radio">
	<?php echo JText::_('Best'); ?>
 </span> 
 	</div>   
    <?php }?>
     <?php if($useComment3){?>
    <div>
		<label for="commentrating"><?php echo JText::_('star3'); ?></label>
    <span class="content_vote">
	<?php echo JText::_('Poor'); ?>
    <input alt="vote 1 star" name="star3" value="1" type="radio">
    <input alt="vote 2 star" name="star3" value="2" type="radio">
    <input alt="vote 3 star" name="star3" value="3" type="radio">
    <input alt="vote 4 star" name="star3" value="4" type="radio">
    <input alt="vote 5 star" name="star3" value="5" checked="checked" type="radio">
	<?php echo JText::_('Best'); ?>
 </span> 
 	</div>   
    <?php }?>
     <?php if($useComment4){?>
    
    <div>
		<label for="commentrating"><?php echo JText::_('star4'); ?></label>
    <span class="content_vote">
	<?php echo JText::_('Poor'); ?>
    <input alt="vote 1 star" name="star4" value="1" type="radio">
    <input alt="vote 2 star" name="star4" value="2" type="radio">
    <input alt="vote 3 star" name="star4" value="3" type="radio">
    <input alt="vote 4 star" name="star4" value="4" type="radio">
    <input alt="vote 5 star" name="star4" value="5" checked="checked" type="radio">
	<?php echo JText::_('Best'); ?>
 </span> 
 	</div>   
    <?php }?>
     <?php if($useComment5){?>
    
    <div>
		<label for="commentrating"><?php echo JText::_('star5'); ?></label>
    <span class="content_vote">
	<?php echo JText::_('Poor'); ?>
    <input alt="vote 1 star" name="star5" value="1" type="radio">
    <input alt="vote 2 star" name="star5" value="2" type="radio">
    <input alt="vote 3 star" name="star5" value="3" type="radio">
    <input alt="vote 4 star" name="star5" value="4" type="radio">
    <input alt="vote 5 star" name="star5" value="5" checked="checked" type="radio">
	<?php echo JText::_('Best'); ?>
 </span> 
 	</div>   
     <?php }?>
    
	<div>
		<label for="commentcomment"><?php echo JText::_('Comment'); ?></label>
<textarea  name="commentcomment" cols="40" rows="6" class="inputbox" id="commentcomment"></textarea>
	</div>
    
	<div>	
    <p>	  
<input name="productid" id="productid" value="<?php echo $Product->id;?>" type="hidden">      
<input class="button" id="addComment" name="addComment" value="<?php echo JText::_('Add Comment'); ?>"  type="button" onclick="AddCommentAjax();" />
	</p>	
    </div>
				
</form>
	</div><!-- form_comments-->
</div><!-- log-->



<div id="progressCm"></div>

</div><!-- comment-->
 




<?php
}

}//end if user guest
?>
</div> 

<!--</div>-->
<?php

}




?>
</div><!--comments-->
<br />
<?php







if($ActivarTabs == 1){
echo $pane->endPanel();
}
}








if($ActivarTabs == 1){
echo $pane->endPane();
}

?>


</div><!-- all-->

 