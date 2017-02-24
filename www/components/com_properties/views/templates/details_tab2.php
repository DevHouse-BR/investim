<div style="width:100%;">

<?php 

if($this->SubProducts){




?>	 

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




$rout_image = 'images/properties/images/'.$Product->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$Product->id.'/';
$image1 = $this->ImagesProduct[0]->name;
?>
<table>
<tr>
<td width="250px" valign="top">
<img style="padding:2px; border: 1px solid #CCCCCC;" src="<?php echo $rout_image.$image1;?>" alt="<?php echo $Product->image1desc;?>" width="250px" height="190">
</td>


<td width="250px" valign="top">


<table style="padding-left:10px;">
<tr><td colspan="2">
<div class="tituloProduct" style="float:left; font-weight:bold;"><?php echo $Product->name;?></div>
</td></tr>
<?php //echo $showprice; ?>





<?php if($Product->name_category){echo '<tr><td align="left"></td><td align="left"> '. $Product->name_category.'</td></tr>';} ?>
<?php if($Product->name_type){echo '<tr><td align="left"></td><td align="left"> '. $Product->name_type.'</td></tr>';} ?>
<?php if($Product->name_country){echo '<tr><td align="left"></td><td align="left"> '. $Product->name_country.'</td></tr>';} ?>
<?php if($Product->name_state){echo '<tr><td align="left"></td><td align="left"> '. $Product->name_state.'</td></tr>';} ?>
<?php if($Product->name_locality){echo '<tr><td align="left"></td><td align="left"> '. $Product->name_locality.'</td></tr>';} ?>
<?php if($Product->address){echo '<tr><td align="right"></td><td align="left">'. $Product->address.'</td></tr>';} ?>


<tr><td colspan="2">


<?php 
//if($ShowContactLink==1){
$statusC = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=600,directories=no,location=no';
$rutaC= JURI::base().'index.php?option=com_properties&view=form1&tmpl=component&id='.$Product->id;

?>
<a href="javascript:void(0)" onclick="window.open('<?php echo $rutaC ; ?>','win2','<?php echo $statusC; ?>');" title="<?php echo JText::_('Contact'); ?>"><?php echo JText::_('Contact'); ?></a><br />
<?php //}?>
</td></tr>


<tr><td colspan="2">
<?php
$rutaG= JRoute::_('index.php?option=com_properties&view=properties&task=map&id='.$Product->id);

?>

<a title="<?php echo JText::_('Show map'); ?>" rel="mediabox 660 500" class="ShowOnGoogleMapOpener" href="<?php echo $rutaG ;?>"><?php echo JText::_('Show map'); ?></a>


</td></tr>


 

</table>
</td>





</tr>
</table>
<table width="100%" >
<tr>
<td width="100%" align="justify">

<?php echo $Product->description; ?><br />
</td>
</tr>
</table>


</div>

 <div style="clear:both"></div>
<?php


?>

<?php  
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
$ThumbsInAccordionShowing++;
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




$this->items=$this->SubProducts;

$this->Images=$this->ImagesSubProducts;

if($Listlayout==0){$Listlayout=null;}
	$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/list'.$Listlayout.'.css" type="text/css" />');
	
require_once( JPATH_COMPONENT.DS.'views'.DS.'templates'.DS.'list'.$Listlayout.'.php' );	

//print_r($this->SubProducts);

}else{




jimport('joomla.html.pane');
$pane =& JPane::getInstance('tabs', array('startOffset'=>0));
echo $pane->startPane( 'pane' );
echo $pane->startPanel( ''.JText::_('Description').'', 'panel1' );




if($ActivarDetails == 1){

?>	 

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




$rout_image = 'images/properties/images/'.$Product->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$Product->id.'/';
$image1 = $this->ImagesProduct[0]->name;
?>
<table>
<tr>
<td width="250px" valign="top">
<img style="padding:2px; border: 1px solid #CCCCCC;" src="<?php echo $rout_image.$image1;?>" alt="<?php echo $Product->image1desc;?>" width="250px" height="190">
</td>


<td width="250px" valign="top">


<table style="padding-left:10px;">
<tr><td colspan="2">
<div class="tituloProduct" style="float:left; font-weight:bold;"><?php echo $Product->name;?></div>
</td></tr>
<?php //echo $showprice; ?>
<?php if($Product->adress){echo '<tr><td align="right">'.JText::_('Adress') .' :</td><td align="left">'. $Product->adress.'</td></tr>';} ?>
<?php if($Product->years){echo '<tr><td align="left">'.JText::_('Years') .' :</td><td align="left"> '. $Product->years.'</td></tr>';} ?>
<?php if($Product->bedrooms){echo '<tr><td align="left">'.JText::_('Bedrooms') .' :</td><td align="left"> '. $Product->bedrooms.'</td></tr>';} ?>
<?php if($Product->bathrooms){echo '<tr><td align="left">'.JText::_('Bathrooms') .' :</td><td align="left"> '. $Product->bathrooms.'</td></tr>';} ?>
<?php if($Product->garage){echo '<tr><td align="left">'.JText::_('Garage') .' :</td><td align="left"> '. $Product->garage.'</td></tr>';} ?>
<?php if($Product->area){echo '<tr><td align="left">'.JText::_('Total Area') .' :</td><td align="left"> '. $Product->area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($Product->covered_area){echo '<tr><td align="left">'.JText::_('Covered Area') .' :</td><td align="left"> '. $Product->covered_area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($Product->available){echo '<tr><td align="left">'.JText::_('DETAILS MARKET').' :</td><td align="left"> '.JText::_('DETAILS_MARKET'.$Product->available).'</td></tr>';} ?>


<tr><td colspan="2">


<?php 
//if($ShowContactLink==1){
$statusC = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=600,directories=no,location=no';
$rutaC= JURI::base().'index.php?option=com_properties&view=form1&tmpl=component&id='.$Product->id;

?>
<a href="javascript:void(0)" onclick="window.open('<?php echo $rutaC ; ?>','win2','<?php echo $statusC; ?>');" title="<?php echo JText::_('Contact'); ?>"><?php echo JText::_('Contact'); ?></a><br />
<?php //}?>
</td></tr>


<?php 
if($ShowVoteRating){
echo '<tr><td colspan="2"><div style="width:100%; float:left;margin-bottom: 10px;">';
echo '<div style="float:left;" >'.JText::_('Rating').' : </div>';
echo '<div  style="float:left;width:150px; padding-left:10px;">';

		echo VoteHelper::ShowVotes($Product->id,FALSE);

echo '</div>';
echo '</div><div style="clear:both"></div></td></tr>';
}
?>  

</table>
</td>





</tr>
</table>
<table width="100%" >
<tr>
<td width="100%" align="justify">
<?php echo $Product->description; ?><br />
</td>
</tr>
</table>

<table width="100%" >
<tr>
<td width="50%">
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

<?php if($Product->extra41){echo '<tr><td align="right">'.JText::_('extra41') .':</td><td align="left">'. JText::_( $Product->extra41.'_extra41' ) .'</td></tr>';} ?>

</table>
</td>
</tr>
</table>
</div>
<?php
/*
if($Product->extra11!=0){
$number = $Product->extra11;
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
echo JText::_('Price extra11'); ?>: <?php echo $SimbolPrice.' '. $formatted_price; 
}else{
echo JText::_('Price extra11'); ?>: <?php echo $formatted_price .' '. $SimbolPrice;
}
echo '<br />';
}
*/
?>

<?php
/*
if($Product->extra12!=0){
$number = $Product->extra11;
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
echo JText::_('Price extra12'); ?>: <?php echo $SimbolPrice.' '. $formatted_price; 
}else{
echo JText::_('Price extra12'); ?>: <?php echo $formatted_price .' '. $SimbolPrice;
}
echo '<br />';
}
*/
?>
 <div style="clear:both"></div>
<?php

}

?>

<?php  
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
$ThumbsInAccordionShowing++;
?>
<a href="<?php echo $rout_image.$image->name; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->name); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>" height="<?php echo $HeightThumbsDetail; ?>" src="<?php echo $rout_thumb.$image->name; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>

<?php

}}



if($Product->image1!=NULL & JFile::exists($destino_imagen.$Product->image1)){ 
$img=$Product->image1;
?>

<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image1desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image1; ?>" alt="<?php echo str_replace('"',' ',$Product->image1desc); ?>"/></a>
<?php }

if($Product->image2!=NULL & JFile::exists($destino_imagen.$Product->image2)){ 
$img=$Product->image2;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image2desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image2; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image3!=NULL & JFile::exists($destino_imagen.$Product->image3)){ 
$img=$Product->image3;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image3desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image3; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image4!=NULL & JFile::exists($destino_imagen.$Product->image4)){ 
$img=$Product->image4;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image4desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image4; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image5!=NULL & JFile::exists($destino_imagen.$Product->image5)){ 
$img=$Product->image5;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image5desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image5; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image6!=NULL & JFile::exists($destino_imagen.$Product->image6)){ 
$img=$Product->image6;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image6desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image6; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image7!=NULL & JFile::exists($destino_imagen.$Product->image7)){ 
$img=$Product->image7;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image7desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image7; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image8!=NULL & JFile::exists($destino_imagen.$Product->image8)){ 
$img=$Product->image8;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image8desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image8; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image9!=NULL & JFile::exists($destino_imagen.$Product->image9)){ 
$img=$Product->image9;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image9desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image9; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image10!=NULL & JFile::exists($destino_imagen.$Product->image10)){ 
$img=$Product->image10;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image10desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image10; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image11!=NULL & JFile::exists($destino_imagen.$Product->image11)){ 
$img=$Product->image11;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image11desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image11; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image12!=NULL & JFile::exists($destino_imagen.$Product->image1)){ 
$img=$Product->image12;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image11desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image12; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image13!=NULL & JFile::exists($destino_imagen.$Product->image13)){ 
$img=$Product->image13;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image12desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image13; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image14!=NULL & JFile::exists($destino_imagen.$Product->image14)){ 
$img=$Product->image14;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image14desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image14; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image15!=NULL & JFile::exists($destino_imagen.$Product->image15)){ 
$img=$Product->image15;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image15desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image15; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image16!=NULL & JFile::exists($destino_imagen.$Product->image16)){ 
$img=$Product->image16;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image16desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image16; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image17!=NULL & JFile::exists($destino_imagen.$Product->image17)){ 
$img=$Product->image17;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image17desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image17; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image18!=NULL & JFile::exists($destino_imagen.$Product->image18)){ 
$img=$Product->image18;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image18desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image18; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image19!=NULL & JFile::exists($destino_imagen.$Product->image19)){ 
$img=$Product->image19;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image19desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image19; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }


if($Product->image20!=NULL & JFile::exists($destino_imagen.$Product->image20)){ 
$img=$Product->image20;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image20desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image20; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image21!=NULL & JFile::exists($destino_imagen.$Product->image21)){ 
$img=$Product->image21;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image21desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image21; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image22!=NULL & JFile::exists($destino_imagen.$Product->image22)){ 
$img=$Product->image22;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image22desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image22; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image23!=NULL & JFile::exists($destino_imagen.$Product->image23)){ 
$img=$Product->image23;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image23desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $Product->image23; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }

if($Product->image24!=NULL & JFile::exists($destino_imagen.$Product->image24)){ 
$img=$Product->image24;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->image24desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="65px" src="images/properties/peques/peque_<?php echo $Product->image24; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>
<?php }
?>


				

</div>



<?php  
}//END SLIMBOX
if($ShowImagesSystem == 3){
?>

<div class="tituloProduct2" style="float:left;"></div>
<div id="slideshow">
	<div id="previewPane">
		<div align="center">
				<div id="watermark_box">
<img src="images/properties/<?php echo $Product->image1;?>" alt="<?php echo $Product->image1desc;?>" width="460" >
		<span style="display: none;" id="waitMessage">
<img src="images/properties/tools/loading.gif" alt=""></span>	
<?php if($Product->disponible_Product!=0){?>
<img src="images/properties/tools/<?php echo $disponible; ?>.png" class="watermark" alt="">
<?php }?>			</div>
							
					</div>
		<div id="largeImageCaption"><?php echo $Product->image1desc; ?></div>

	</div>
	<div id="galleryContainer">
		<div id="theImages">

	
<?php
$imageCaption='';
 if($Product->image1!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image1;?>','1');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image1;?>" alt="222"/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image1desc.'</div>'; }?>	
<?php if($Product->image2!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image2;?>','2');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image2;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image2desc.'</div>'; }?>
<?php if($Product->image3!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image3;?>','3');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image3;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image3desc.'</div>'; }?>	
<?php if($Product->image4!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image4;?>','4');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image4;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image4desc.'</div>'; }?>
<?php if($Product->image5!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image5;?>','5');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image5;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image5desc.'</div>'; }?>
<?php if($Product->image6!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image6;?>','6');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image6;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image6desc.'</div>'; }?>
<?php if($Product->image7!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image7;?>','7');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image7;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image7desc.'</div>'; }?>	
<?php if($Product->image8!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image8;?>','8');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image8;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image8desc.'</div>'; }?>
<?php if($Product->image9!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image9;?>','9');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image9;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image9desc.'</div>'; }?>	
<?php if($Product->image10!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image10;?>','10');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image10;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image10desc.'</div>'; }?>
<?php if($Product->image11!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image11;?>','11');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image11;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image11desc.'</div>'; }?>		
<?php if($Product->image12!=NULL){?>
                <a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image12;?>','12');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image12;?>" alt="111"/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image12desc.'</div>'; }?>

<?php if($Product->image13!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image13;?>','13');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image13;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image13desc.'</div>'; }?>	
<?php if($Product->image14!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image14;?>','14');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image14;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image14desc.'</div>'; }?>
<?php if($Product->image15!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image15;?>','15');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image15;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image15desc.'</div>'; }?>
<?php if($Product->image16!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image16;?>','16');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image16;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image16desc.'</div>'; }?>
<?php if($Product->image17!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image17;?>','17');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image17;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image17desc.'</div>'; }?>	
<?php if($Product->image18!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image18;?>','18');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image18;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image18desc.'</div>'; }?>
<?php if($Product->image19!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image19;?>','19');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image19;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image19desc.'</div>'; }?>	

<?php if($Product->image20!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image20;?>','20');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image20;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image20desc.'</div>'; }?>
<?php if($Product->image21!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image21;?>','21');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image11;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image21desc.'</div>'; }?>		
<?php if($Product->image22!=NULL){?>

                <a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image22;?>','22');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image22;?>" alt="111"/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image22desc.'</div>'; }?>

<?php if($Product->image23!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image23;?>','23');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image23;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image23desc.'</div>'; }?>	
<?php if($Product->image24!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $Product->image24;?>','24');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $Product->image24;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$Product->image24desc.'</div>'; }?>
				<!-- End thumbnails -->			

		
				<!-- Image captions imageCaption-->	
<?php echo $imageCaption;?>					
				<!-- End image captions -->




				<div id="slideEnd"></div>
		</div>

	</div>
</div>
<?php  
}
?>

<div style="clear: both;"></div>

<!--END IMAGE TABLE-->	






<?php  
echo $pane->endPanel();





echo $pane->startPanel( ''.JText::_('Booking tab').'', 'panel1' );



if($ActivarReservas == 1){
if($Product->use_booking){
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


<form action="<?php echo 'index.php?option=com_properties&view=booking&Itemid='.JRequest::getVar('Itemid');; ?>" name="josFormCal" class="formCalendario" id="josFormCal" method="post" >
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



</div>	



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
<!--<th style="text-align: center;">Title</th>-->
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
           <!--  <td style="text-align: center;"><?php echo date('d/m', strtotime($d->validfrom));?>-<?php echo date('d/m', strtotime($d->validto));?></td>--> 
            <td style="text-align: center;"><?php echo $d->rateperweek;?></td>
            <td style="text-align: center;">
         <?php if($ShowToCheckbox==1){ ?>   
            <input type="checkbox" id="form_id_week[]" name="form_id_week[]" value="<?php echo $d->week;?>" />
            <input type="hidden" name="sdw[<?php echo $d->week;?>]" value="<?php echo $d->from;?>" />
            <input type="hidden" name="edw[<?php echo $d->week;?>]" value="<?php echo $d->to;?>" />
            <input type="hidden" name="price[<?php echo $d->week; ?>]" id="price[<?php echo $d->week; ?>]" value="<?php echo $d->price; ?>" />
          <?php }else{ ?>  
          
           <button class="buttonverde validate" type="submit" onclick="javascript:document.josFormCal.rate.value='<?php echo $d->id;?>';javascript:document.josFormCal.priceweek.value='<?php echo $d->rateperweek;?>';  javascript:document.josFormCal.duration.value='7'; javascript:document.josFormCal.fechaD.value='<?php echo $d->validfrom;?>';"><?php echo JText::_('book now'); ?></button> 
           
          <?php } ?>  
            </td></tr>
            
			<?php }?>  
    </tbody>      
</table>
        
        
        



<?php
}
?>
	
<!--</div>	-->




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

echo $pane->endPanel();


echo $pane->startPanel( ''.JText::_('Map tab').'', 'panel1' );

if($ActivarMapa == 1){


$apikey=$params->get('apikey');
$distancia=$params->get('distancia');
$lat = $Product->lat;
$lng = $Product->lng;
?>

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

?>

<?php

}/*Final if ActivarMapa*/

echo $pane->endPanel();


if($showComments){
echo $pane->startPanel( ''.JText::_('Reviews tab').'', 'panel1' );
?>





<div id="comments">
<h2><strong><?php echo JText::_('Reviews').' ('.count( $this->Comments ).')'; ?></strong></h2>



  




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
 
</div> 



<?php
}

}//end if user guest
?>


<!--</div>-->
</div><!--comments-->
<?php
echo $pane->endPanel();
}


echo $pane->endPane();


}//end if SubProducts
?>



</div><!-- all-->

 