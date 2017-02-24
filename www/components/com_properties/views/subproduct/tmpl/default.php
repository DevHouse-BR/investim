<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip'); 
JHTML::_('behavior.formvalidation');
jimport('joomla.filesystem.file');
$document =& JFactory::getDocument();
$lang =& JFactory::getLanguage();
$user =& JFactory::getUser();
$menus = &JSite::getMenu();
		$menu  = $menus->getActive();
		$menu_params = new JParameter( $menu->params );
		if($menu_params->get('show_page_title') & $menu_params->get('page_title')){
		$title=$menu_params->get('page_title');
		}		
	$row=$this->Product;
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$AnchoMiniatura=$params->get('AnchoMiniatura');
$AltoMiniatura=$params->get('AltoMiniatura');
$ActivarDescripcion=$params->get('ActivarDescripcion');
$ActivarDetails=$params->get('ActivarDetails');
$ActivarContactar=$params->get('ActivarContactar');
$ActivarReservas=$params->get('ActivarReservas');
$ActivarMapa=$params->get('ActivarMapa');
$ActivarTabs=$params->get('ActivarTabs');
$ActivarVideo=$params->get('ActivarVideo');
$ActivarPanoramica=$params->get('ActivarPanoramica');
$SimbolPrice=$params->get('SimbolPrice');
$PositionPrice=$params->get('PositionPrice');
$currencyformat=$params->get('FormatPrice');
$ShowImagesSystem=$params->get('ShowImagesSystem');
$showComments=$params->get('showComments');
$ShowVoteRating=$params->get('ShowVoteRating');
$md_country=$params->get('md_country');
$md_state=$params->get('md_state');
$md_locality=$params->get('md_locality');
$md_category=$params->get('md_category');
$md_type=$params->get('md_type');

	if($md_country){
		$title.=$row->name_country;
		$Mkey=$row->name_country;
	}

	if($md_state){
		$title.=' - '.$row->name_state;
		$Mkey.=', '.$row->name_state;
	}

	if($md_locality){
		$title.=' - '.$row->name_locality;
		$Mkey.=', '.$row->name_locality;
	}

	if($md_category){
		$title.=' - '.$row->name_category;
		$Mkey.=', '.$row->name_category;
	}

	if($md_type){
		$title.=' - '.$row->name_type;
		$Mkey.=', '.$row->name_type;
	}

$title.=' - '.$row->name;

$document->setTitle( $title );
$document->setMetadata('keywords',$Mkey);
$document->setDescription( $title.'.'.substr($row->description,0,200));


if(!JRequest::getVar('Itemid')){$Itemid = 0;}else{$Itemid = JRequest::getVar('Itemid');}

$view = JRequest::getVar('view');

$id = JRequest::getVar('id');
$cid = JRequest::getVar('cid', 0, '', 'int');
$tid = JRequest::getVar('tid', 0, '', 'int');

//echo 'cid: '.$cid.' tid: '.$tid.' id: '.$id.' view: '.$view.'<br>';

//echo $row->refresh_time;
//echo date('j F Y', strtotime($row->refresh_time));



if($ShowVoteRating){
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'vote.php' );
echo VoteHelper::Header();
}

?>

<div style="width:100%;">
<?php






if($ActivarDescripcion == 1){

echo $row->text;
}



if($ActivarDetails == 1){

?>	 
<div class="tituloProduct" style="float:left;  border-bottom:1px solid grey;"><?php echo $row->name;?></div>
<div class="detalleProduct" style="width:100%; float:left; margin:0px !important;">
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
$showprice = '<tr><td align="right">'.JText::_('Price') .' :</td><td align="left">'. $SimbolPrice.' '. $formatted_price.'</td></tr>'; 
}else{
$showprice = '<tr><td align="right">'.JText::_('Price') .' :</td><td align="left">'. $formatted_price .' '. $SimbolPrice.'</td></tr>';
}

}
?>
<table><tr><td width="50%">
<table>
<?php echo $showprice; ?>
<?php if($row->adress){echo '<tr><td align="right">'.JText::_('Adress') .' :</td><td align="left">'. $row->adress.'</td></tr>';} ?>
<?php if($row->years){echo '<tr><td align="right">'.JText::_('Years') .' :</td><td align="left"> '. $row->years.'</td></tr>';} ?>
<?php if($row->bedrooms){echo '<tr><td align="right">'.JText::_('Bedrooms') .' :</td><td align="left"> '. $row->bedrooms.'</td></tr>';} ?>
<?php if($row->bathrooms){echo '<tr><td align="right">'.JText::_('Bathrooms') .' :</td><td align="left"> '. $row->bathrooms.'</td></tr>';} ?>
<?php if($row->garage){echo '<tr><td align="right">'.JText::_('Garage') .' :</td><td align="left"> '. $row->garage.'</td></tr>';} ?>
<?php if($row->area){echo '<tr><td align="right">'.JText::_('Total Area') .' :</td><td align="left"> '. $row->area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($row->covered_area){echo '<tr><td align="right">'.JText::_('Covered Area') .' :</td><td align="left"> '. $row->covered_area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($row->available){echo '<tr><td align="right">'.JText::_('DETAILS MARKET').' :</td><td align="left"> '.JText::_('DETAILS_MARKET'.$row->available).'</td></tr>';} ?>
</table>
</td>
<td width="50%" valign="top">
<table>
<tr>
<td>
<?php echo $row->description; ?><br />
</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="100%" style="border-top:1px solid grey;"><tr><td width="50%">
<table>
<?php if($row->extra1){echo '<tr><td align="right">'.JText::_('extra1') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra2){echo '<tr><td align="right">'.JText::_('extra2') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra3){echo '<tr><td align="right">'.JText::_('extra3') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra4){echo '<tr><td align="right">'.JText::_('extra4') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra5){echo '<tr><td align="right">'.JText::_('extra5') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra6){echo '<tr><td align="right">'.JText::_('extra6') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra7){echo '<tr><td align="right">'.JText::_('extra7') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra8){echo '<tr><td align="right">'.JText::_('extra8') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra9){echo '<tr><td align="right">'.JText::_('extra9') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra10){echo '<tr><td align="right">'.JText::_('extra10') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>



</table>
</td>
<td width="50%" valign="top">
<table>

<?php if($row->extra11){echo '<tr><td align="right">'.JText::_('extra11') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra12){echo '<tr><td align="right">'.JText::_('extra12') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra13){echo '<tr><td align="right">'.JText::_('extra13') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra14){echo '<tr><td align="right">'.JText::_('extra14') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra15){echo '<tr><td align="right">'.JText::_('extra15') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra16){echo '<tr><td align="right">'.JText::_('extra16') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra17){echo '<tr><td align="right">'.JText::_('extra17') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra18){echo '<tr><td align="right">'.JText::_('extra18') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra19){echo '<tr><td align="right">'.JText::_('extra19') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra20){echo '<tr><td align="right">'.JText::_('extra20') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>

<?php if($row->extra21){echo '<tr><td align="right">'.JText::_('extra21') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra22){echo '<tr><td align="right">'.JText::_('extra22') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra23){echo '<tr><td align="right">'.JText::_('extra23') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra24){echo '<tr><td align="right">'.JText::_('extra24') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra25){echo '<tr><td align="right">'.JText::_('extra25') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra26){echo '<tr><td align="right">'.JText::_('extra26') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra27){echo '<tr><td align="right">'.JText::_('extra27') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra28){echo '<tr><td align="right">'.JText::_('extra28') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra29){echo '<tr><td align="right">'.JText::_('extra29') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra30){echo '<tr><td align="right">'.JText::_('extra30') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>

<?php if($row->extra31){echo '<tr><td align="right">'.JText::_('extra31') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra32){echo '<tr><td align="right">'.JText::_('extra32') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra33){echo '<tr><td align="right">'.JText::_('extra33') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra34){echo '<tr><td align="right">'.JText::_('extra34') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra35){echo '<tr><td align="right">'.JText::_('extra35') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra36){echo '<tr><td align="right">'.JText::_('extra36') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra37){echo '<tr><td align="right">'.JText::_('extra37') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra38){echo '<tr><td align="right">'.JText::_('extra38') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra39){echo '<tr><td align="right">'.JText::_('extra39') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra40){echo '<tr><td align="right">'.JText::_('extra40') .':</td><td align="left"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>

<?php if($row->extra41){echo '<tr><td align="right">'.JText::_('extra41') .':</td><td align="left">'. JText::_( $row->extra41.'_extra41' ) .'</td></tr>';} ?>

</table>
</td>
</tr>
</table>
</div>
<?php
/*
if($row->extra11!=0){
$number = $row->extra11;
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
if($row->extra12!=0){
$number = $row->extra11;
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
$watermark=JText::_('DETAILS_MARKET'.$row->available).'-'.$lang->getTag().'.png';
   $destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS.'peque_';
$WidthThumbsDetail=$params->get('WidthThumbsDetail');
$HeightThumbsDetail=$params->get('HeightThumbsDetail');      
   
   
if($ShowImagesSystem == 2){
$rel='dogs'.$row->id;
}elseif($ShowImagesSystem == 1){
$rel='lightbox['.$row->id.']';
}

  
if($ShowImagesSystem == 2 or $ShowImagesSystem == 1){
?>
<div class="tituloProduct2" style="float:left; height:10px;"></div>
<div style="clear: both;"></div>
<div class="imgslimbox">
	
    
    
<?php    

$rout_image = 'images/properties/images/'.$row->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$row->id.'/';
foreach($this->Images as $image){


if(JFile::exists($image->path)){
$ThumbsInAccordionShowing++;
?>
<a href="<?php echo $rout_image.$image->name; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>" height="<?php echo $HeightThumbsDetail; ?>" src="<?php echo $rout_thumb.$image->name; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>

<?php

}}



if($row->image1!=NULL & JFile::exists($destino_imagen.$row->image1)){ 
$img=$row->image1;
?>

<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image1desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image1; ?>" alt="<?php echo str_replace('"',' ',$row->image1desc); ?>"/></a>
<?php }

if($row->image2!=NULL & JFile::exists($destino_imagen.$row->image2)){ 
$img=$row->image2;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image2desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image2; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image3!=NULL & JFile::exists($destino_imagen.$row->image3)){ 
$img=$row->image3;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image3desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image3; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image4!=NULL & JFile::exists($destino_imagen.$row->image4)){ 
$img=$row->image4;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image4desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image4; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image5!=NULL & JFile::exists($destino_imagen.$row->image5)){ 
$img=$row->image5;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image5desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image5; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image6!=NULL & JFile::exists($destino_imagen.$row->image6)){ 
$img=$row->image6;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image6desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image6; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image7!=NULL & JFile::exists($destino_imagen.$row->image7)){ 
$img=$row->image7;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image7desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image7; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image8!=NULL & JFile::exists($destino_imagen.$row->image8)){ 
$img=$row->image8;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image8desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image8; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image9!=NULL & JFile::exists($destino_imagen.$row->image9)){ 
$img=$row->image9;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image9desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image9; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image10!=NULL & JFile::exists($destino_imagen.$row->image10)){ 
$img=$row->image10;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image10desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image10; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image11!=NULL & JFile::exists($destino_imagen.$row->image11)){ 
$img=$row->image11;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image11desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image11; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image12!=NULL & JFile::exists($destino_imagen.$row->image1)){ 
$img=$row->image12;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image11desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image12; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image13!=NULL & JFile::exists($destino_imagen.$row->image13)){ 
$img=$row->image13;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image12desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image13; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image14!=NULL & JFile::exists($destino_imagen.$row->image14)){ 
$img=$row->image14;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image14desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image14; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image15!=NULL & JFile::exists($destino_imagen.$row->image15)){ 
$img=$row->image15;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image15desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image15; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image16!=NULL & JFile::exists($destino_imagen.$row->image16)){ 
$img=$row->image16;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image16desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image16; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image17!=NULL & JFile::exists($destino_imagen.$row->image17)){ 
$img=$row->image17;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image17desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image17; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image18!=NULL & JFile::exists($destino_imagen.$row->image18)){ 
$img=$row->image18;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image18desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image18; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image19!=NULL & JFile::exists($destino_imagen.$row->image19)){ 
$img=$row->image19;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image19desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image19; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }


if($row->image20!=NULL & JFile::exists($destino_imagen.$row->image20)){ 
$img=$row->image20;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image20desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image20; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image21!=NULL & JFile::exists($destino_imagen.$row->image21)){ 
$img=$row->image21;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image21desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image21; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image22!=NULL & JFile::exists($destino_imagen.$row->image22)){ 
$img=$row->image22;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image22desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image22; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image23!=NULL & JFile::exists($destino_imagen.$row->image23)){ 
$img=$row->image23;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image23desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="<?php echo $HeightThumbsDetail; ?>px" src="images/properties/peques/peque_<?php echo $row->image23; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }

if($row->image24!=NULL & JFile::exists($destino_imagen.$row->image24)){ 
$img=$row->image24;?>
<a href="images/properties/<?php echo $img; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->image24desc); ?>" >
<img width="<?php echo $WidthThumbsDetail; ?>px" height="65px" src="images/properties/peques/peque_<?php echo $row->image24; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
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
<img src="images/properties/<?php echo $row->image1;?>" alt="<?php echo $row->image1desc;?>" width="460" >
		<span style="display: none;" id="waitMessage">
<img src="images/properties/tools/loading.gif" alt=""></span>	
<?php if($row->disponible_Product!=0){?>
<img src="images/properties/tools/<?php echo $disponible; ?>.png" class="watermark" alt="">
<?php }?>			</div>
							
					</div>
		<div id="largeImageCaption"><?php echo $row->image1desc; ?></div>

	</div>
	<div id="galleryContainer">
		<div id="theImages">

	
<?php
$imageCaption='';
 if($row->image1!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image1;?>','1');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image1;?>" alt="222"/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image1desc.'</div>'; }?>	
<?php if($row->image2!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image2;?>','2');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image2;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image2desc.'</div>'; }?>
<?php if($row->image3!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image3;?>','3');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image3;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image3desc.'</div>'; }?>	
<?php if($row->image4!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image4;?>','4');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image4;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image4desc.'</div>'; }?>
<?php if($row->image5!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image5;?>','5');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image5;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image5desc.'</div>'; }?>
<?php if($row->image6!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image6;?>','6');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image6;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image6desc.'</div>'; }?>
<?php if($row->image7!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image7;?>','7');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image7;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image7desc.'</div>'; }?>	
<?php if($row->image8!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image8;?>','8');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image8;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image8desc.'</div>'; }?>
<?php if($row->image9!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image9;?>','9');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image9;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image9desc.'</div>'; }?>	
<?php if($row->image10!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image10;?>','10');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image10;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image10desc.'</div>'; }?>
<?php if($row->image11!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image11;?>','11');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image11;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image11desc.'</div>'; }?>		
<?php if($row->image12!=NULL){?>
                <a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image12;?>','12');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image12;?>" alt="111"/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image12desc.'</div>'; }?>

<?php if($row->image13!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image13;?>','13');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image13;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image13desc.'</div>'; }?>	
<?php if($row->image14!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image14;?>','14');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image14;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image14desc.'</div>'; }?>
<?php if($row->image15!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image15;?>','15');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image15;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image15desc.'</div>'; }?>
<?php if($row->image16!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image16;?>','16');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image16;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image16desc.'</div>'; }?>
<?php if($row->image17!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image17;?>','17');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image17;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image17desc.'</div>'; }?>	
<?php if($row->image18!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image18;?>','18');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image18;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image18desc.'</div>'; }?>
<?php if($row->image19!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image19;?>','19');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image19;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image19desc.'</div>'; }?>	

<?php if($row->image20!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image20;?>','20');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image20;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image20desc.'</div>'; }?>
<?php if($row->image21!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image21;?>','21');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image11;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image21desc.'</div>'; }?>		
<?php if($row->image22!=NULL){?>

                <a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image22;?>','22');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image22;?>" alt="111"/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image22desc.'</div>'; }?>

<?php if($row->image23!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image23;?>','23');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image23;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image23desc.'</div>'; }?>	
<?php if($row->image24!=NULL){?>
				<a href="#" onclick="showPreview('<?php echo JURI::base();?>images/properties/<?php echo $row->image24;?>','24');return false"><img style="opacity: 0.75;" src="images/properties/peques/peque_<?php echo $row->image24;?>" alt=""/></a>
<?php $imageCaption.='<div class="imageCaption">'.$row->image24desc.'</div>'; }?>
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

if($ActivarVideo == 1){

echo $this->Video->text;

}




if($ActivarPanoramica == 1){

$caption = $row->name;

$destino_panoramica1 = JURI::base().'images/properties/panoramics/'.$row->panoramic;
if($row->panoramic!=NULL){
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

	//index.php?option=com_properties&view=property&catid='.$row->catslug.'&id='.$row->slug
?>

<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" id="josForm2" name="josForm2" class="form-validate">
<input type="hidden" name="linkid" value="<?php echo JRequest::getVar('id'); ?>" />
<input type="hidden" name="linkcid" value="<?php echo JRequest::getVar('cid'); ?>" />
<input type="hidden" name="linktid" value="<?php echo JRequest::getVar('tid'); ?>" />
<input type="hidden" name="subject" value="<?php echo $row->name; ?>" />

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
    <input type="hidden" name="id" value="<?php echo $row->id;?>" />
    <input type="hidden" name="agent_id" value="<?php echo $row->agent_id;?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>




<?php 
}/*Final ActivarContactar*/





if($ActivarReservas == 1){
if($row->use_booking){

?>






<?php 
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'calendar.php' );
?>



 <div id="calendarios">

<form action="<?php echo JRoute::_( 'index.php' ); ?>" name="josFormCal" class="formCalendario" id="josFormCal" method="post" >
<input type="hidden" name="linkid" value="<?php echo JRequest::getVar('id'); ?>" />
<input type="hidden" name="linktypeid" value="<?php echo JRequest::getVar('tid'); ?>" />
<input type="hidden" name="linkcatid" value="<?php echo JRequest::getVar('cid'); ?>" />
<table class="select_calendar" border="0"><tr><td>
     <?php echo JText::_('From'); ?> : 
      </td><td> 
      <?php echo JHTML::_('calendar', $this->datos->fecha, 'fechaD', 'fechaD', '%Y-%m-%d', array('class'=>'inputbox_calendar', 'size'=>'5',  'maxlength'=>'10')); ?>
</td><td> 
      <?php echo JText::_('To'); ?> : 
 </td><td>      
      <?php echo JHTML::_('calendar', $this->datos->fecha, 'fechaA', 'fechaA', '%Y-%m-%d', array('class'=>'inputbox_calendar', 'size'=>'5',  'maxlength'=>'10')); ?>
</td><td> 
    <input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="layout" value="default_reservation" />
	<input type="hidden" name="task" value="send_reservation" />
    <input type="hidden" name="id" value="<?php echo $row->id;?>" />
    <input type="hidden" name="name" value="<?php echo $row->name;?>" />
  <div align="center" style="margin:20px;">  
  <button class="button validate" type="submit"><?php echo JText::_('Reservar'); ?></button> 
  </div>        

<div style="clear: both;"></div>
</td></tr></table>
</form>

<?php
if($this->Rates){

?>

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
<th style="text-align: center;">Period</th>
<th style="text-align: center;"><?php echo $SimbolPrice; ?></th>
<th style="text-align: center;">Scelga</th>
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
            <input type="checkbox" id="form_id_week[]" name="form_id_week[]" value="<?php echo $d->week;?>" />
            <input type="hidden" name="sdw[<?php echo $d->week;?>]" value="<?php echo $d->from;?>" />
            <input type="hidden" name="edw[<?php echo $d->week;?>]" value="<?php echo $d->to;?>" />
            <input type="hidden" name="price[<?php echo $d->week; ?>]" id="price[<?php echo $d->week; ?>]" value="<?php echo $d->price; ?>" />
            </td></tr>
            
			<?php }?>  
    </tbody>      
</table>
        
        
        



<?php
}
?>
 
 
 
<table class="admintable" width="100%">
	<tr>
		<td>
    <?php echo Calendar::ShowCalendar( $row,'category','products',0 ); ?>    
        
        </td>
	</tr>
</table>

<div style="clear: both; margin-top:30px;"></div>
 </div>








<?php 
}/*Final if use_booking*/
}/*Final if ActivarReservas*/

if($ActivarMapa == 1){


$apikey=$params->get('apikey');
$distancia=$params->get('distancia');
$lat = $row->lat;
$lng = $row->lng;
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

?>

<?php

}/*Final if ActivarMapa*/



if($showComments){

?>





<div id="comments">
<h2><strong><?php echo JText::_('Reviews').' ('.count( $this->Comments ).')'; ?></strong></h2>



<?php 
if($ShowVoteRating){
echo '<div style="width:100%; float:left;margin-bottom: 10px;">';
echo '<div style="float:left;" >'.JText::_('Rating').' : </div>';
echo '<div  style="float:left;width:150px; padding-left:10px;">';

		echo VoteHelper::ShowVotes($row->id,FALSE);

echo '</div>';
echo '</div><div style="clear:both"></div>';
}
?>    




<?php
//print_r($this->Comments);

	for ($i=0, $n=count( $this->Comments ); $i < $n; $i++)	
    {
$rowC = &$this->Comments[$i];	
 ?>
<div class="comment">
<div class="comment_top" style="background: #EFEFEF; padding:5px;">
<?php 
echo VoteHelper::ShowVoteComment($rowC->star).'&nbsp;  <b>'.$rowC->title.' </b> '.JText::_('by').' '.$rowC->name.' '.JText::_('on').' '.$rowC->date; ?><br />
</div>

<div class="comment_text" style="padding: 7px;">
<table>
<tr><td><?php echo JText::_('STAR1'); ?> : </td><td><?php echo $rowC->star1; ?>/5</td></tr>
<tr><td><?php echo JText::_('STAR2'); ?> : </td><td><?php echo $rowC->star2; ?>/5</td></tr>
<tr><td><?php echo JText::_('STAR3'); ?> : </td><td><?php echo $rowC->star3; ?>/5</td></tr>
<tr><td><?php echo JText::_('STAR4'); ?> : </td><td><?php echo $rowC->star4; ?>/5</td></tr>
<tr><td><?php echo JText::_('STAR5'); ?> : </td><td><?php echo $rowC->star5; ?>/5</td></tr>
</table>
</div>
 
<div class="comment_text" style="padding: 7px;">
 <?php echo $rowC->comment; ?>
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
    
    
	<div>
		<label for="commentcomment"><?php echo JText::_('Comment'); ?></label>
<textarea  name="commentcomment" cols="40" rows="6" class="inputbox" id="commentcomment"></textarea>
	</div>
    
	<div>	
    <p>	  
<input name="productid" id="productid" value="<?php echo $row->id;?>" type="hidden">      
<input class="button" id="addComment" name="addComment" value="<?php echo JText::_('Add Comment'); ?>"  type="button" onclick="AddCommentAjax();" />
	</p>	
    </div>
				
</form>
	</div><!-- form_comments-->
</div><!-- log-->



<div id="progressCm"></div>

</div><!-- comments-->
 




<?php
}

}//end if user guest
?>
</div><!-- -->
<?php

}




?>
<br />
<div id="tareas">
<?php 
$rutaAdd = 'index.php?option=com_properties&task=addlightbox&tmpl=component&id='.$row->id;
?>
<?php $status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=400,directories=no,location=no';?>

<a href="javascript:void(0)" onclick="window.open('<?php echo JRoute::_( $rutaAdd ); ?>','win2','<?php echo $status; ?>');" title="<?php echo JText::_('Add Short List'); ?>"><?php echo JText::_('Add Short List'); ?></a>



<?php 
if(JRequest::getVar('cyid')){$_cyid = '&amp;cyid='.JRequest::getVar('cyid');}
if(JRequest::getVar('sid')){$_sid = '&amp;sid='.JRequest::getVar('sid');}
if(JRequest::getVar('lid')){$_lid = '&amp;lid='.JRequest::getVar('lid');}
if(JRequest::getVar('cid')){$_cid = '&amp;cid='.JRequest::getVar('cid');}
if(JRequest::getVar('tid')){$_tid = '&amp;tid='.JRequest::getVar('tid');}
if(JRequest::getVar('start')){$_start = '&amp;start='.JRequest::getVar('start');}
if(JRequest::getVar('limitstart')){$_limitstart = '&amp;limitstart='.JRequest::getVar('limitstart');}
if(JRequest::getVar('task')){$_list = '&amp;list='.JRequest::getVar('task');}

$ruta= 'index.php?option=com_properties&amp;view=property&amp;layout=default_print&amp;tmpl=component&amp;id='.$row->id;
$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=600,height=600,directories=no,location=no';?>
<span class="editlinktip hasTip" title="<?php echo JText::_('Print'); ?>::">
<a href="javascript:void(0)" onclick="window.open('<?php echo $ruta; ?>','win2','<?php echo $status; ?>');" >
<?php echo JText::_('Print this page'); ?>
</a></span>

 <?php $rutaF= JURI::base().'index.php?option=com_properties&view=property&task=recommend&tmpl=component&id='.$row->id;
?>
<a onclick="void window.open('<?php echo JRoute::_( $rutaF );?>', '_blank', 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no,screenX=100,screenY=200');return false;" href=""><?php echo JText::_('Send to a friend');?></a>

</div><!-- tareas-->

</div><!-- all-->

 