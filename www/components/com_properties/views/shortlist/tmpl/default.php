<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip');
jimport('joomla.filesystem.file');
$document =& JFactory::getDocument();
$lang =& JFactory::getLanguage();

$document->setTitle( JText::_('My Short List') );
$document->setDescription( JText::_('My Short List') );
$document->setMetadata('keywords', JText::_('My Short List'));

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowTextSearch=$params->get('ShowTextSearch');
$ShowOrderBy=$params->get('ShowOrderBy');
$ShowOrderByDefault=$params->get('ShowOrderByDefault');
$ShowOrderDefault=$params->get('ShowOrderDefault');

$ActivarMapa=$params->get('ActivarMapa');
$currencyformat=$params->get('FormatPrice');
$PositionPrice=$params->get('PositionPrice');
$SimbolPrice=$params->get('SimbolPrice');

$WidthThumbs=$params->get('WidthThumbs');
$HeightThumbs=$params->get('HeightThumbs');

$WidthThumbsAccordion=$params->get('WidthThumbsAccordion');
$HeightThumbsAccordion=$params->get('HeightThumbsAccordion');
$ThumbsInAccordion=$params->get('ThumbsInAccordion');

$ShowMapLink=$params->get('ShowMapLink');
$ShowAddShortListLink=$params->get('ShowAddShortListLink');
$ShowViewPropertiesAgentLink=$params->get('ShowViewPropertiesAgentLink');
$ShowContactLink=$params->get('ShowContactLink');
$ShowVoteRating=$params->get('ShowVoteRating');

$UseCountry=$params->get('UseCountry');
$UseState=$params->get('UseState');
$UseLocality=$params->get('UseLocality');
$ShowReferenceInList=$params->get('ShowReferenceInList');
$ShowLogoAgent=$params->get('ShowLogoAgent');
$ShowCategoryInList=$params->get('ShowCategoryInList');
$ShowTypeInList=$params->get('ShowTypeInList');

$ShowFeaturesInList=$params->get('ShowFeaturesInList');


?>
<?php 

if($ShowVoteRating){
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'vote.php' );
echo VoteHelper::Header();
}
?> 

<div id="propiedades" >LEONARDO
<h3><?php echo JText::_('My Short List');?></h3>

<?php
$user =& JFactory::getUser();

if(!$user->id){
echo '<b>'.JText::_('Need Login to view your Short List').'</b><br><br></div>';

}
else{
if(!$this->items){echo '<b>'.JText::_('Empty Short List');}
?>
<div id="accordion">
<?php
if($ShowOrderBy==1){
?>

<div id="ShowOrderBy">
<?php require_once( JPATH_COMPONENT.DS.'helpers'.DS.'orderby.php' );?>
</div>

<?php
}
?>

<form action="index.php?option=com_properties&amp;controller=property&amp;Itemid=" method="post" name="Form" id="Form">
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="property" />

<div style="clear:both"></div>

<?php

    $k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	
    {
$row = &$this->items[$i];	
	
//		$link 		= JRoute::_( 'index.php?option=com_properties&amp;view=property&amp;cid='.$row->Cslug.'&amp;tid='.$row->Typeslug.'&amp;id='.$row->Pslug.'&amp;Itemid='.LinkHelper::getItemid('property'));
$link = LinkHelper::getLink('property',$row->CYslug,$row->Sslug,$row->Lslug,$row->Cslug,$row->Tslug,$row->Pslug);		
		?>
        
        
 <?php 
if($ShowVoteRating){
	if(!$user->guest){
		if($this->MyVotes[$row->id]){
			echo VoteHelper::ShowVotes($row->id,$this->MyVotes[$row->id]);
		}else{
			echo VoteHelper::ShowAddVote($row->id);
		}
	}else{
		echo VoteHelper::ShowVotes($row->id,FALSE);
	}
}
?>        
        
<div class="producto" >        
         
         
<?php
$watermark='DETAILS_MARKET'.$row->available.'-'.$lang->getTag().'.png';

if($row->image1!=NULL){ $img=$row->image1;}else{$img='noimage.jpg';}
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS.'peque_'.$img;
if (JFile::exists($destino_imagen)){


$imgTag='<img src="images/properties/peques/peque_'. $img .'" alt="'. str_replace('"',' ',$row->name) .'" width="'.$WidthThumbs.'" height="'.$HeightThumbs.'" />';
 
 }else{$imgTag='<img src="images/properties/peques/peque_'. $img .'" />';}
?>
<div class="detalles">
<div class="imagendetalles">
<div class="watermark_box">
<a href="<?php echo $link; ?>">
<?php echo $imgTag;?>
<?php 
if (JFile::exists(JURI::base().'components/'.'com_properties/'.'includes/'.'img/'.$watermark)){
?>
<img src="<?php echo JURI::base().'components/'.'com_properties/'.'includes/'.'img/'.$watermark; ?>" class="watermark" alt="<?php echo JText::_('DETAILS_MARKET'.$row->available); ?>"  />
<?php } ?>
</a>
 </div>
</div>
            	<div class="datos">
               
<a href="<?php echo $link; ?>"><?php echo $row->name; ?></a><br />
<?php
if($ShowReferenceInList){
echo JText::_('Reference').' : '.$row->ref.'<br />';
}
?>
<?php
if($ShowCategoryInList){
echo JText::_('Category').' : '.$this->NameCategory[$row->cid].'<br />';
}
?>
<?php
if($ShowTypeInList){
echo JText::_('Type').' : '.$this->NameType[$row->type].'<br />';
}
?>
<?php
if($UseCountry){
echo JText::_('Country').' : '.$this->NameCountry[$row->cyid].'<br />';
}

if($UseState){
echo JText::_('State').' : '.$this->NameState[$row->sid].'<br />';
}

if($UseLocality){
echo JText::_('Locality').' : '.$this->NameLocality[$row->lid].'<br />';
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
<div class="agent" style="">
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
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS.'peque_';
$MiniaturasInAccordionShowing=0;
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image2!=NULL & JFile::exists($destino_imagen.$row->image2)){ 
$img=$row->image2;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image2; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image3!=NULL & JFile::exists($destino_imagen.$row->image3)){ 
$img=$row->image3;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image3; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image4!=NULL & JFile::exists($destino_imagen.$row->image4)){ 
$img=$row->image4;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image4; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image5!=NULL & JFile::exists($destino_imagen.$row->image5)){ 
$img=$row->image5;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image5; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image6!=NULL & JFile::exists($destino_imagen.$row->image6)){ 
$img=$row->image6;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image6; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image7!=NULL & JFile::exists($destino_imagen.$row->image7)){ 
$img=$row->image7;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image7; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image8!=NULL & JFile::exists($destino_imagen.$row->image8)){ 
$img=$row->image8;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image8; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image9!=NULL & JFile::exists($destino_imagen.$row->image9)){ 
$img=$row->image9;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image9; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image10!=NULL & JFile::exists($destino_imagen.$row->image10)){ 
$img=$row->image10;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image10; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}
if($MiniaturasInAccordion > $MiniaturasInAccordionShowing){
if($row->image11!=NULL & JFile::exists($destino_imagen.$row->image11)){ 
$img=$row->image11;$MiniaturasInAccordionShowing++;?>
<a href="images/properties/<?php echo $img; ?>" rel="lightbox[<?php echo $row->id; ?>]" title="<?php echo str_replace('"',' ',$row->name); ?>" >
<img width="<?php echo $AnchoMiniaturaAccordion; ?>" height="<?php echo $AltoMiniaturaAccordion; ?>" src="images/properties/peques/peque_<?php echo $row->image11; ?>" alt="<?php echo str_replace('"',' ',$row->name); ?>"/></a>
<?php }}?>

<div class="detalleProducto" style="width:50%; float:left;">
<table>      
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
echo '<tr><td align="right">'.JText::_('Price').' :</td><td align="left">'.$SimbolPrice.' '. $formatted_price.'</td></tr>'; 
}else{
echo '<tr><td align="right">'.JText::_('Price').' :</td><td align="left">'.$formatted_price .' '. $SimbolPrice.'</td></tr>';
}

}else{
echo JText::_('Price').'<b><font color="#FF0000"> '. JTEXT::_('Call for price').'</font></b><br />';
}

?>

<?php if($row->adress){echo '<tr><td align="right">'.JText::_('Address') .' :</td><td align="left">'. $row->adress.'</td></tr>';} ?>
<?php if($row->years){echo '<tr><td align="right">'.JText::_('Years')  .' :</td><td align="left">'. $row->years.'</td></tr>';} ?>
<?php if($row->bedrooms){echo '<tr><td align="right">'.JText::_('Bedrooms')  .' :</td><td align="left">'. $row->bedrooms.'</td></tr>';} ?>
<?php if($row->bathrooms){echo '<tr><td align="right">'.JText::_('Bathrooms')  .' :</td><td align="left">'. $row->bathrooms.'</td></tr>';} ?>
<?php if($row->garage){echo JText::_('Garage') .' : '. $row->garage.'<br />';} ?>
<?php if($row->area){echo JText::_('Total Area') .' : '. $row->area.' '.JText::sprintf('Simbol Metric').'<br />';} ?>
<?php if($row->covered_area){echo JText::_('Covered Area') .' : '. $row->covered_area.' '.JText::sprintf('Simbol Metric').'<br />';} ?>
<?php if($row->available){echo JText::_('DETAILS MARKET').' : '.JText::_('DETAILS_MARKET'.$row->available).'<br />';} ?>


<?php if($ShowFeaturesInList==1){
?>

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



<?php
}
?>
</table>




</div>
<div class="detalleProducto" style="width:50%; float:left;">
<?php echo $row->description; ?>
<br />
<br />

<?php
$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=400,directories=no,location=no';
$rutaG= 'index.php?option=com_properties&controller=googlemap&task=map&tmpl=component&id='.$row->id;
$rutaA= 'index.php?option=com_properties&amp;task=agentlisting&amp;aid='.$row->agent_id.'&amp;Itemid='.$this->Itemid->id;
$rutaAdd = 'index.php?option=com_properties&task=addlightbox&tmpl=component&id='.$row->id;
$rutaC= JURI::base().'index.php?option=com_properties&view=property&task=contact&tmpl=component&id='.$row->id;

if($ActivarMapa == 1){
?>
<?php if($ShowMapLink==1){?>
<a href="<?php echo JRoute::_( $rutaG );?>" rel="mediabox 660 500" title="Caption: <?php echo str_replace('"',' ',$row->name); ?>" ><?php echo JText::_('See in map'); ?></a><br />
<?php }?>
<?php }?>

<?php if($ShowContactLink==1){?>
<a href="javascript:void(0)" onclick="window.open('<?php echo JRoute::_( $rutaC ); ?>','win2','<?php echo $status; ?>');" title="<?php echo JText::_('Contact'); ?>"><?php echo JText::_('Contact'); ?></a><br />
<?php }?>

<?php if($ShowAddShortListLink==1){?>
<a href="javascript:void(0)" onclick="window.open('<?php echo JRoute::_( $rutaAdd ); ?>','win2','<?php echo $status; ?>');" title="<?php echo JText::_('Add Short List'); ?>"><?php echo JText::_('Add Short List'); ?></a>
<br />  
<?php }?>                 
<?php if($ShowViewPropertiesAgentLink==1){?>
<a href="<?php echo JRoute::_( $rutaA );?>"><?php echo JText::_('View Properties from this Agent'); ?></a>
<br />
<?php }?>
</div>   

                </div><!--innerelement-->
                    </div><!-- element-->
</div>  <!--producto -->   
<?php
$k = 1 - $k;
}
 ?>

</form>
</div><!-- acordeon-->



<div id="pagination" style="">
<?php require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagelinks.php' );?>      
<div style="clear: both;"></div> 
</div><!-- paginacion--> 
<br />
<br />
<div id="tareas">
<?php //require_once( JPATH_COMPONENT.DS.'helpers'.DS.'tasklinks.php' );?>
</div>



</div><!-- propiedades-->

<?php
}
?>