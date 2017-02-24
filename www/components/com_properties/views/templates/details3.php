<div id="details" style="width:100%;">

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




$rout_image = 'images/properties/images/'.$Product->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$Product->id.'/';
 
$image1 = $this->ImagesProduct[0]->name;

if($ShowImagesSystemDetail == 2 or $ShowImagesSystemDetail == 1){
?>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="480px" valign="top">
<img style="padding:2px; border: 1px solid #CCCCCC;" src="<?php echo $rout_image.$image1;?>" alt="<?php echo $Product->image1desc;?>" width="480px" height="320">
</td>


<td width="330px" valign="top">


<table border="0" cellpadding="0" cellspacing="0">

<tr><td>

<?php  
$watermark=JText::_('DETAILS_MARKET'.$Product->available).'-'.$lang->getTag().'.png';
   $destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS.'peque_';
    
   
   
if($ShowImagesSystemDetail == 2){
$rel='dogs0';
}elseif($ShowImagesSystemDetail == 1){
$rel='lightbox['.$Product->id.']';
}

  

?>

<div class="imgslimbox">
	
    
    
<?php    


foreach($this->ImagesProduct as $image){


if(JFile::exists($image->path)){
$ThumbsInAccordionShowing++;
?>
<a href="<?php echo $rout_image.$image->name; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$Product->name); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>" height="<?php echo $HeightThumbsDetail; ?>" src="<?php echo $rout_thumb.$image->name; ?>" alt="<?php echo str_replace('"',' ',$Product->name); ?>"/></a>

<?php

}}


?>

</td>
</tr>
</table>


</td>
</tr>
</table>
<?php
}




if($ShowImagesSystemDetail == 3)
	{
	
?>

<div id="dhtmlgoodies_slideshow">
	<div id="previewPane">				
<img src="<?php echo $rout_image.$image1;?>" alt="<?php echo $Product->image1desc;?>" width="460" >
		<span style="display: none;" id="waitMessage">
<img src="images/properties/tools/loading.gif" alt="">
Loading image. Please wait
</span>	
		
							
					
		<div id="largeImageCaption2"></div>

	</div>
	<div id="galleryContainer">
		<div id="theImages">



<?php
foreach($this->ImagesProduct as $image){
?>	


				<a href="#" onclick="showPreview('<?php echo $rout_image.$image->name; ?>','23');return false"><img width="<?php echo $WidthThumbsDetail; ?>" height="<?php echo $HeightThumbsDetail; ?>"  src="<?php echo $rout_image.$image->name; ?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.'desc'.'</div>'; ?>	


				<!-- End thumbnails -->			

		
				<!-- Image captions imageCaption
                <div class="imageCaption">This is the caption of image number 1</div>-->	
<?php //echo $imageCaption;?>					
				<!-- End image captions -->


<?php
}
?>

				<div id="slideEnd"></div>
		</div>

	</div>
</div>


<div style="clear: both;"></div>

<!--END IMAGE TABLE-->	



<?php
}
?>

<table class="table_details" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="480px" valign="top">

<?php echo $Product->text;?>	

</td>

<td width="330px" valign="top">




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
<table>
<tr><td></td></tr>
<?php echo $showprice; ?>
<?php if($Product->adress){echo '<tr><td align="right">'.JText::_('Adress') .' :</td><td align="left">'. $Product->adress.'</td></tr>';} ?>
<?php if($Product->years){echo '<tr><td align="right">'.JText::_('Years') .' :</td><td align="left"> '. $Product->years.'</td></tr>';} ?>
<?php if($Product->bedrooms){echo '<tr><td align="right">'.JText::_('Bedrooms') .' :</td><td align="left"> '. $Product->bedrooms.'</td></tr>';} ?>
<?php if($Product->bathrooms){echo '<tr><td align="right">'.JText::_('Bathrooms') .' :</td><td align="left"> '. $Product->bathrooms.'</td></tr>';} ?>
<?php if($Product->garage){echo '<tr><td align="right">'.JText::_('Garage') .' :</td><td align="left"> '. $Product->garage.'</td></tr>';} ?>
<?php if($Product->area){echo '<tr><td align="right">'.JText::_('Total Area') .' :</td><td align="left"> '. $Product->area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($Product->covered_area){echo '<tr><td align="right">'.JText::_('Covered Area') .' :</td><td align="left"> '. $Product->covered_area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($Product->available){echo '<tr><td align="right">'.JText::_('DETAILS MARKET').' :</td><td align="left"> '.JText::_('DETAILS_MARKET'.$Product->available).'</td></tr>';} ?>

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
</tr>
</table>


</div>

</div><!-- all-->

<div style="clear: both;"></div>