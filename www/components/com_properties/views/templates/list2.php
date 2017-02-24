<?php defined('_JEXEC') or die('Restricted access'); ?>

<div id="propiedades">

<?php if($this->DataAgent->show ){?>
<div id="topagent">
<img src="<?php echo JURI::base().'/images/properties/profiles/'.$this->DataAgent->logo_image_large; ?>" />
</div>
<div id="datagent" style="margin-top:5px;">
<div id="imageagent">
<img src="<?php echo JURI::base().'/images/properties/profiles/'.$this->DataAgent->image; ?>"  align="left" />
<!--</div>
<div id="descagent">-->
<?php if($this->DataAgent->name){echo JText::_('Name').' : '.$this->DataAgent->name.'<br />';} ?>
<?php if($this->DataAgent->company){echo JText::_('Company').' : '.$this->DataAgent->company.'<br />';} ?>
<?php if($this->DataAgent->properties){echo JText::_('Properties').' : '.$this->DataAgent->properties.'<br />';} ?>
<?php if($this->DataAgent->address1){echo JText::_('Address').' : '.$this->DataAgent->address1.'<br />';} ?>
<?php if($this->DataAgent->locality){echo JText::_('Locality').' : '.$this->DataAgent->locality.'<br />';} ?>
<?php if($this->DataAgent->email){echo JText::_('Email').' : '.$this->DataAgent->email.'<br />';} ?>
<?php if($this->DataAgent->phone){echo JText::_('Phone').' : '.$this->DataAgent->phone.'<br />';} ?>
<?php if($this->DataAgent->fax){echo JText::_('Fax').' : '.$this->DataAgent->fax.'<br />';} ?>
<?php if($this->DataAgent->mobile){echo JText::_('Mobile').' : '.$this->DataAgent->mobile.'<br />';} ?>
</div>
<div style="clear:both"></div>
</div>

<?php

}
//print_r($this->ThisAgent);
?>







<script language="javascript" type="text/javascript">

	function tableOrdering( order, dir, field )
	{
		var form = document.adminForm;

		form.filter_order.value 	= order;
		form.filter_order_Dir.value	= dir;
		form.field.value	= field;
		document.adminForm.submit( field );
	}

</script>




<div style=" width:100%; height:15px;"></div>

<div id="accordion">

<?php
/*
$uri 		=& JFactory::getURI();
$action=str_replace('&', '&amp;', $uri->toString());
*/
$action='index.php?option=com_properties&view='.$view;
?>
<form action="<?php echo JRoute::_($action);?>" method="post" name="adminForm" id="adminForm">
<input name="field" value="" type="hidden">

<?php
if($ShowOrderBy==1){
?>
<div id="ShowOrderBy">
<?php require_once( JPATH_COMPONENT.DS.'helpers'.DS.'orderby.php' );?>
</div>
<?php
}?>


<div style="clear:both"></div>

<?php
    $k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	
    {
$row = &$this->items[$i];	
//	echo '<br>'.$row->refresh_time;
//		$link 		= JRoute::_( 'index.php?option=com_properties&amp;view=property&amp;cid='.$row->Cslug.'&amp;tid='.$row->Typeslug.'&amp;id='.$row->Pslug.'&amp;Itemid='.LinkHelper::getItemid('property'));

$link = LinkHelper::getLink('properties','showproperty','',$row->CYslug,$row->Sslug,$row->Lslug,$row->Cslug,$row->Tslug,$row->Pslug);

?>
      
      
      
      
      <div class="jamod module_gris0<?php //echo $row->featured;?>">
			<div class="module_gris_2">
				<div class="module_gris_3">
					<div class="module_gris_4">    
                    
                    
                      
    


<?php 
//print_r($this->MyVotes);
if($ShowVoteRating){
echo '<div class="top_title" >';
echo '<div class="title_vote" ><a href="'.$link.'">'.$row->name.'</a></div>';
echo '<div class="div_vote">';
	if(!$user->guest){
		if($this->MyVotes[$row->id]){
			echo VoteHelper::ShowVotes($row->id,$this->MyVotes[$row->id]);
		}else{
			echo VoteHelper::ShowAddVote($row->id);
		}
	}else{
		echo VoteHelper::ShowVotes($row->id,FALSE);
	}
echo '</div>';

echo '</div>';

}elseif($ShowIcons){
echo '<div class="top_title" >';
echo '<div class="title_vote" ><a href="'.$link.'">'.$row->name.'</a></div>';

echo '<div class="div_pics">';

if($row->extra41)
	{
	echo '<img src="'.JURI::base().'components/com_jvehicles/includes/img/passengers.png" alt="'.$row->extra41.' '.JText::_('EXTRA41').'" title="'.$row->extra41.' '.JText::_('EXTRA41').'"><span class"number_pics">'.$row->extra41.'</span>';
	}
	
if($row->doors)
	{
	echo '<img src="'.JURI::base().'components/com_jvehicles/includes/img/doors.png" alt="'.$row->doors.' '.JText::_('Doors').'" title="'.$row->doors.' '.JText::_('Doors').'"><span class"number_pics">'.$row->doors.'</span>';
	}
	
if($row->extra42)
	{
	echo '<img src="'.JURI::base().'components/com_jvehicles/includes/img/luggage.png" alt="'.$row->extra42.' '.JText::_('EXTRA42').'" title="'.$row->extra42.' '.JText::_('EXTRA42').'"><span class"number_pics">'.$row->extra42.'</span>';
	}
	
if($row->gears)
	{
	echo '<img src="'.JURI::base().'components/com_jvehicles/includes/img/transmission.png" alt="'.$row->gears.' '.JText::_('Gears').'" title="'.$row->gears.' '.JText::_('Gears').'"><span class"number_pics">'.$row->gears.'</span>';
	}	

if($row->extra1)
	{
	echo '<img src="'.JURI::base().'components/com_jvehicles/includes/img/aircon.png" alt="'.JText::_('EXTRA1').'" title="'.JText::_('EXTRA1').'"><span class"number_pics">AC</span>';
	}
	
echo '</div>';
echo '</div>';


}else{
echo '<div class="top_title" >';
echo '<div class="title_vote" ><a href="'.$link.'">'.$row->name.'</a></div>';
echo '</div>';
}
?>           
   
   
 <div class="producto">       
   
   
   
   
   <?php
$rout_image = 'images/properties/images/'.$row->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$row->id.'/';

if($this->Images[$row->id][0]->name!=NULL){ 

$img=$this->Images[$row->id][0]->name;
}else{
$img='noimage.jpg';
}
?>

<?php
$watermark='DETAILS_MARKET'.$row->available.'-'.$lang->getTag().'.png';

$imgTag='<img src="'.$rout_thumb.$img.'" alt="'. str_replace('"',' ',$row->name) .'" width="'.$WidthThumbs.'" height="'.$HeightThumbs.'" />'; 

?>
<div class="detalles">
<div class="imagendetalles">
<div class="watermark_box">
<a href="<?php echo $link; ?>">
<?php echo $imgTag;?>
<?php 
if (JFile::exists(JPATH_SITE.DS.'components'.DS.'com_properties'.DS.'includes'.DS.'img'.DS.$watermark)){
?>
<img src="<?php echo JURI::base().'components/'.'com_properties/'.'includes/'.'img/'.$watermark; ?>" class="watermark" alt="<?php echo JText::_('DETAILS_MARKET'.$row->available); ?>"  />
<?php } ?>
</a>
 </div>
</div>
            	<div class="datos">
               
<!--<a href="<?php //echo $link; ?>"><?php //echo $row->name; ?></a><br />-->
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
<?php //echo JText::_('Hits') .' : '. $row->hits; ?>

			   </div>
 </div> 
<div class="togagent">

<?php

if($ShowLogoAgent==1){
$imgAgent=1;
if($row->logo_image_profile){
?>
<div class="agent">
<img src="images/properties/profiles/<?php echo $row->logo_image_profile;?>" width="140" height="45" alt="<?php echo $row->agent;?>" />
</div>
<?php }?>     
<?php }?> 
<div class="toggler"></div>  
</div>
<div style="clear:both"></div>
            
					<div class="element">
                    	<div class="innerelement">
                     

<?php 

if($ShowImagesSystem == 2){
$rel='dogs'.$i;
}elseif($ShowImagesSystem == 1){
$rel='lightbox['.$row->id.']';
}
$ThumbsInAccordionShowing=0;

$rout_image = 'images/properties/images/'.$row->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$row->id.'/';

for($x=1;$x<count($this->Images[$row->id]);$x++){
$image=$this->Images[$row->id][$x];
if($ThumbsInAccordion > $ThumbsInAccordionShowing){
if(JFile::exists($image->path)){
$ThumbsInAccordionShowing++;
?>
<a href="<?php echo $rout_image.$image->name; ?>" rel="<?php echo $rel; ?>" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $WidthThumbsAccordion; ?>" height="<?php echo $HeightThumbsAccordion; ?>" src="<?php echo $rout_thumb.$image->name; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>

<?php

}}
}
?>




<div class="productdetail" style="width:33%; float:left;">
      
<?php
echo '<table class="table_productdetail" width="100%">';
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
echo '<tr><td class="td_left">'.JText::_('Price').' :</td><td class="td_right">'.$SimbolPrice.' '. $formatted_price.'</td></tr>'; 
}else{
echo '<tr><td class="td_left">'.JText::_('Price').' :</td><td class="td_right">'.$formatted_price .' '. $SimbolPrice.'</td></tr>';
}

}else{
echo JText::_('Price').'<b><font color="#FF0000"> '. JTEXT::_('Call for price').'</font></b><br />';
}

?>

<?php if($row->adress){echo '<tr><td class="td_left">'.JText::_('Address') .' :</td><td class="td_right">'. $row->adress.'</td></tr>';} ?>
<?php if($row->years){echo '<tr><td class="td_left">'.JText::_('Years')  .' :</td><td class="td_right">'. $row->years.'</td></tr>';} ?>
<?php if($row->bedrooms){echo '<tr><td class="td_left">'.JText::_('Bedrooms')  .' :</td><td class="td_right">'. $row->bedrooms.'</td></tr>';} ?>
<?php if($row->bathrooms){echo '<tr><td class="td_left">'.JText::_('Bathrooms')  .' :</td><td class="td_right">'. $row->bathrooms.'</td></tr>';} ?>
<?php if($row->garage){echo '<tr><td class="td_left">'.JText::_('Garage') .' : </td><td class="td_right">'. $row->garage.'</td></tr>';} ?>
<?php if($row->area){echo '<tr><td class="td_left">'.JText::_('Total Area') .' : </td><td class="td_right">'. $row->area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($row->covered_area){echo '<tr><td class="td_left">'.JText::_('Covered Area') .' : </td><td class="td_right">'. $row->covered_area.' '.JText::sprintf('Simbol Metric').'</td></tr>';} ?>
<?php if($row->available){echo '<tr><td class="td_left">'.JText::_('DETAILS MARKET').' : </td><td class="td_right">'.JText::_('DETAILS_MARKET'.$row->available).'</td></tr>';} 
echo '</table>';
?>

</div>
<div class="productdetail" style="width:33%; float:left;">
<?php if($ShowFeaturesInList==1){

echo '<table class="table_productdetail_features" width="100%">';
?>

<?php if($row->extra1){echo '<tr><td class="td_left">'.JText::_('extra1') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra2){echo '<tr><td class="td_left">'.JText::_('extra2') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra3){echo '<tr><td class="td_left">'.JText::_('extra3') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra4){echo '<tr><td class="td_left">'.JText::_('extra4') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra5){echo '<tr><td class="td_left">'.JText::_('extra5') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra6){echo '<tr><td class="td_left">'.JText::_('extra6') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra7){echo '<tr><td class="td_left">'.JText::_('extra7') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra8){echo '<tr><td class="td_left">'.JText::_('extra8') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra9){echo '<tr><td class="td_left">'.JText::_('extra9') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra10){echo '<tr><td class="td_left">'.JText::_('extra10') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>



<?php
}
echo '</table>';
?>

</div>

<div class="productdetail" style="width:33%; float:left;">
<?php if($ShowFeaturesInList==1){

echo '<table class="table_productdetail_features" width="100%">';
?>

<?php if($row->extra11){echo '<tr><td class="td_left">'.JText::_('extra11') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra12){echo '<tr><td class="td_left">'.JText::_('extra12') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra13){echo '<tr><td class="td_left">'.JText::_('extra13') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra14){echo '<tr><td class="td_left">'.JText::_('extra14') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra15){echo '<tr><td class="td_left">'.JText::_('extra15') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra16){echo '<tr><td class="td_left">'.JText::_('extra16') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra17){echo '<tr><td class="td_left">'.JText::_('extra17') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra18){echo '<tr><td class="td_left">'.JText::_('extra18') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra19){echo '<tr><td class="td_left">'.JText::_('extra19') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>
<?php if($row->extra20){echo '<tr><td class="td_left">'.JText::_('extra20') .':</td><td class="td_right"><img src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" /></td></tr>';} ?>



<?php
}
echo '</table>';
?>

</div>


<div class="productdescription">

<?php echo $row->description; ?>

<br />
<br />

<?php
$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=400,directories=no,location=no';
$statusC = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=600,directories=no,location=no';
$rutaG= JRoute::_('index.php?option=com_properties&view=properties&task=map&id='.$row->id);

$rutaG=LinkHelper::getLink('properties','map','','','','','','',$row->id);

$rutaA=LinkHelper::getLink('properties','agentlisting','','','','','','','',$row->agent_id);


//$rutaAdd = LinkHelper::getLink('properties','addlightbox','component','','','','','',$row->id);
//$rutaC= JURI::base().'index.php?option=com_properties&view=property&task=contact&tmpl=component&id='.$row->id;
$rutaAdd = 'index.php?option=com_properties&task=addlightbox&tmpl=component&id='.$row->id;
$rutaC= JURI::base().'index.php?option=com_properties&view=form1&tmpl=component&id='.$row->id;

if($ActivarMapa == 1){
?>
<?php if($ShowMapLink==1){?>
<a href="<?php echo $rutaG ;?>" rel="mediabox 660 500" title="Caption: <?php echo str_replace('"',' ',$row->name); ?>" ><?php echo JText::_('See in map'); ?></a><br />
<?php }?>
<?php }?>

<?php if($ShowContactLink==1){?>
<a href="javascript:void(0)" onclick="window.open('<?php echo $rutaC ; ?>','win2','<?php echo $statusC; ?>');" title="<?php echo JText::_('Contact'); ?>"><?php echo JText::_('Contact'); ?></a><br />
<?php }?>

<?php if($ShowAddShortListLink==1){?>
<a href="javascript:void(0)" onclick="window.open('<?php echo $rutaAdd ; ?>','win2','<?php echo $status; ?>');" title="<?php echo JText::_('Add Short List'); ?>"><?php echo JText::_('Add Short List'); ?></a>
<br />  
<?php }?>                 
<?php if($ShowViewPropertiesAgentLink==1){?>
<a href="<?php echo JRoute::_( $rutaA );?>"><?php echo JText::_('View Properties from this Agent'); ?></a>
<br />
<?php }?>


<?php 
$ShowPdfs=1;
if($ShowPdfs==1){

if($this->Pdfs[$row->id]){
		if( count($this->Pdfs[$row->id]) > 0){
			foreach($this->Pdfs[$row->id] as $Pdf){
				$link = JRoute::_('images/properties/pdfs/'.$Pdf->archivo);
?>				
				<a href="<?php echo $link;?>" target="_blank"><?php echo $Pdf->name;?></a>
				<?php echo $Pdf->text;?>				
<?php
			}
		}
	}
	
	
?>

<br />
<?php

 }?>

</div>

 
                </div><!--innerelement-->
               
                    </div><!-- element-->
           
                    
</div>  <!--producto -->   
 </div></div></div></div>
 
<?php
$k = 1 - $k;
}
 ?>


</div><!-- acordeon-->
 


<div id="pagination" style="">

<div id="PagesLinks">
	  <?php echo $this->pagination->getPagesLinks(); ?>
 <div style="clear: both;"></div>      
      </div>
      <div id="ResultsCounter">
      <?php echo $this->pagination->getResultsCounter().' | '.$this->pagination->getPagesCounter(); ?>
      </div>
           
<div style="clear: both;"></div> 
</div><!-- paginacion--> 
<br />
<br />
<div id="tareas">
<?php //require_once( JPATH_COMPONENT.DS.'helpers'.DS.'tasklinks.php' );?>
</div>

</form>
</div><!-- propiedades-->

<?php
/*
echo '<pre>';
print_r($row);
echo '</pre>';
*/
?>