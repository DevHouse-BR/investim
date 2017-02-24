<?php defined('_JEXEC') or die('Restricted access'); 
global $mainframe;
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
		$Mkey.=' '.$title;
		}else{
		$title 		= $mainframe->getCfg( 'sitename' );	
		$Mkey.=' '.$title;
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


$WidthThumbs=$params->get('WidthThumbs');
$HeightThumbs=$params->get('HeightThumbs');

$WidthThumbsAccordion=$params->get('WidthThumbsAccordion');
$HeightThumbsAccordion=$params->get('HeightThumbsAccordion');
$ThumbsInAccordion=$params->get('ThumbsInAccordion');
$UseCountry=$params->get('UseCountry');
$UseState=$params->get('UseState');
$UseLocality=$params->get('UseLocality');
$ShowReferenceInList=$params->get('ShowReferenceInList');
$ShowLogoAgent=$params->get('ShowLogoAgent');
$ShowCategoryInList=$params->get('ShowCategoryInList');
$ShowTypeInList=$params->get('ShowTypeInList');
$ShowAddShortListLink=$params->get('ShowAddShortListLink');
$ShowAddressInList=$params->get('ShowAddressInList');
$ShowFeaturesInList=$params->get('ShowFeaturesInList');
$useComment2=$params->get('useComment2');
$useComment3=$params->get('useComment3');
$useComment4=$params->get('useComment4');
$useComment5=$params->get('useComment5');

$AmountMonthsCalendar=$params->get('AmountMonthsCalendar');
$PeriodOnlyWeeks=$params->get('PeriodOnlyWeeks');
$PeriodAmount=$params->get('PeriodAmount');
$PeriodStartDay=$params->get('PeriodStartDay');


	if($md_country){
		$title.=$row->name_country;
		$Mkey.=', '.$row->name_country;
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

?>	
 

<?php

$watermark=JText::_('DETAILS_MARKET'.$row->available).'-'.$lang->getTag().'.png';
?>
<div id="print_page" style="width:600px; text-align:center; border: 1px solid #CCCCCC; ">








<div class="tituloProduct" style=" width:100%;float:left;"><?php echo $row->name;?></div>
<?php 

if($ActivarDetails == 1){

$rout_image = 'images/properties/images/'.$row->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$row->id.'/';

if(JFile::exists($this->Images[0]->path)){
?>
	 


<table><tr><td width="50%" valign="top">
<img src="<?php echo $rout_image.$this->Images[0]->name;?>" alt="<?php echo $this->Images[0]->name;?>" width="250px" height="188">
</td><td width="50%" valign="top">

<?php
if($ShowReferenceInList){
echo '<span>'.JText::_('Reference').' : '.$row->ref.'</span><br />';
}
?>
<?php
if($ShowCategoryInList){
echo '<span>'.JText::_('Category').' : '.JText::_($row->name_category).'</span><br />';
}
?>
<?php
if($ShowTypeInList){
echo '<span>'.JText::_('Type').' : '.JText::_($row->name_type).'</span><br />';
}
?>
<?php
if($UseCountry){
echo '<span>'.JText::_('Country').' : '.JText::_($row->name_country).'</span><br />';
}

if($UseState){
echo '<span>'.JText::_('State').' : '.JText::_($row->name_state).'</span><br />';
}

if($UseLocality){
echo '<span>'.JText::_('Locality').' : '.JText::_($row->name_locality).'</span><br />';
}
if($ShowAddressInList){
echo '<span>'.JText::_('Address').' : '.JText::_($row->address).'</span><br />';
}
?>
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
$showprice = '<span>'.JText::_('Price') .' : '. $SimbolPrice.' '. $formatted_price.'</span><br />'; 
}else{
$showprice = '<span>'.JText::_('Price') .' : '. $formatted_price .' '. $SimbolPrice.'</span><br />';
}

}
echo $showprice; ?>
</td>
</tr>
</table>
<?php 
}


if($ActivarDescripcion == 1){
echo '<br>'.$row->text;
}
?>
<div class="detalleProduct" style="width:100%; float:left; margin:0px !important;">
<?php

?>
<table><tr><td width="50%">
<table>

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
$rel='dogs0';
}elseif($ShowImagesSystem == 1){
$rel='lightbox['.$row->id.']';
}

  

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
}
}
?>
</div>

<div style="clear: both;"></div>

<!--END IMAGE TABLE-->	




<br />

<div style="clear: both;"></div>
<br style="clear: both;" /> 
<a href="#" onclick="window.close()"><?php echo JText::_('Close Window'); ?></a>&nbsp;|&nbsp;<a href="javascript:;" onclick="window.print(); return false"><?php echo JText::_('Print'); ?></a><br><br>
</div>
