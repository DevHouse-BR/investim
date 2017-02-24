<?php defined('_JEXEC') or die('Restricted access'); 
global $mainframe;
JHTML::_('behavior.tooltip');
jimport('joomla.filesystem.file');
$document =& JFactory::getDocument();
$lang =& JFactory::getLanguage();
$user =& JFactory::getUser();
$menus = &JSite::getMenu();
		$menu  = $menus->getActive();
		$menu_params = new JParameter( $menu->params );
		
		$title 		= $mainframe->getCfg( 'sitename' );
		
		if($menu_params->get('show_page_title') & $menu_params->get('page_title')){
		$title.=' - '.$menu_params->get('page_title');
		}
			
			
	
$cid = JRequest::getVar('cid', 0, '', 'int');
$tid = JRequest::getVar('tid', 0, '', 'int');

if (JRequest::getVar('cid') ) {
		
		$title .=' - '.$this->NameCategory[$cid]; 		
	}	
if (JRequest::getVar('tid') ) {
		
		$title .=' - '.$this->NameType[$tid]; 		
	}	

	$document->setTitle( $title );

$document->setDescription( $title );
$document->setMetadata('keywords',$title);

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

$WidthThumbs=$params->get('WidthThumbs',100);
$HeightThumbs=$params->get('HeightThumbs',75);

$WidthThumbsAccordion=$params->get('WidthThumbsAccordion',100);
$HeightThumbsAccordion=$params->get('HeightThumbsAccordion',75);
$ThumbsInAccordion=$params->get('ThumbsInAccordion',5);

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

$ShowImagesSystem=$params->get('ShowImagesSystem');



$linkAjax= JURI::base().'index.php?option=com_properties&controller=searchajax&format=raw&task=SearchAjax&langg='.$lang->getTag();

$view = JRequest::getVar('view');
$cyid = JRequest::getVar('cyid', 0, '', 'int');
$id = JRequest::getVar('id', 0, '', 'int');
$cid = JRequest::getVar('cid', 0, '', 'int');
$tid = JRequest::getVar('tid', 0, '', 'int');
$aid = JRequest::getVar('aid', 0, '', 'int');
$task = JRequest::getVar('task');
//echo 'cid: '.$cid.' tid: '.$tid.' id: '.$id.' view: '.$view.' task: '.$task.' cyid: '.$cyid.'<br>';
//echo 'aid: '.$aid.'<br>';
//print_r($this->NameCategory);

?>
<?php 

if($ShowVoteRating){
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'vote.php' );
echo VoteHelper::Header();
}
?> 


<div id="propiedades" >



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
/*
echo '<pre>';
print_r($post);
echo '</pre>';
*/
}
?>

<div id="list_properties" style="width:100%;float: left; min-height:500px; margin:5px 5px 0px 0px; padding:2px; text-align:center;">

<div id="ShowOrderBy">
<?php require_once( JPATH_COMPONENT.DS.'helpers'.DS.'orderby.php' );?>
</div>


<?php
    $k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	
    {
$row = &$this->items[$i];	
	
$link 		= JRoute::_( 'index.php?option=com_properties&amp;view=property&amp;cid='.$row->Cslug.'&amp;tid='.$row->Typeslug.'&amp;id='.$row->Pslug.'&amp;Itemid='.LinkHelper::getItemid('property'));
		?>
<div id="property_mainbody">        
	<div id="property_mainbody_left">
    	<div id="property_product_image">
       
       
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

<div class="property_watermark_box" style="position:relative;display:block;">
    	<a href="<?php echo $link; ?>">
<?php echo $imgTag;?>
<?php 
if (JFile::exists(JPATH_SITE.DS.'components'.DS.'com_properties'.DS.'includes'.DS.'img'.DS.$watermark)){
?>
<img src="<?php echo JURI::base().'components/'.'com_properties/'.'includes/'.'img/'.$watermark; ?>" class="watermark" alt="<?php echo JText::_('DETAILS_MARKET'.$row->available); ?>"  />
<?php } ?>
</a>
</div><!--list_watermark_box --> 

    	</div>  <!--property_product_image -->   
    </div><!--property_mainbody_left --> 

<div id="property_mainbody_right">    	
       
        <div id="product_title_align">
    	<div id="property_product_title">
   		<a href="<?php echo $link; ?>"><?php echo $row->name; ?></a>
   		</div><!--product_title_align --> 
        </div>   <!--property_product_title -->  
       
        <div id="property_product_description_left">
       
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
$showPrice = $SimbolPrice.' '. $formatted_price; 
}else{
$showPrice = $formatted_price .' '. $SimbolPrice;
}
}
?>
<span class="property_product_price"><?php echo $showPrice;?></span><br />       
        
<?php echo JText::_('Category'); ?>: <?php echo $this->NameCategory[$row->cid]; ?><br />
<?php echo JText::_('Type'); ?>: <?php echo $this->NameType[$row->type]; ?><br />
<?php echo JText::_('Country'); ?>: <?php echo $this->NameCountry[$row->cyid]; ?><br />
<?php echo JText::_('State'); ?>: <?php echo $this->NameState[$row->sid]; ?><br /> 
<?php echo JText::_('Locality'); ?>: <?php echo $this->NameLocality[$row->lid]; ?><br /> 
        </div>  <!--property_product_description_left -->       
  
  
          <div id="property_product_description_right">
<?php if($row->adress){echo JText::_('Address') .' : '. $row->adress.'<br />';} ?>
<?php if($row->years){echo JText::_('Years') .' : '. $row->years.'<br />';} ?>
<?php if($row->bedrooms){echo JText::_('Bedrooms') .' : '. $row->bedrooms.'<br />';} ?>
<?php if($row->bathrooms){echo JText::_('Bathrooms') .' : '. $row->bathrooms.'<br />';} ?>
<?php if($row->garage){echo JText::_('Garage') .' : '. $row->garage.'<br />';} ?>
        </div>  <!--property_product_description_left --> 
     
              
        <div id="property_product_details_align">        	
        <div id="property_product_details">
       	<a href="<?php echo $link; ?>">Details</a>
        </div><!--property_product_details --> 
            
        </div><!--property_product_details_align --> 
    
    </div><!--property_mainbody_right --> 
    

 
</div>  <!--property_mainbody --> 
 
<?php
$k = 1 - $k;
}
 ?>

</form>
</div><!-- list_properties-->


</div><!-- properties-->
<br />
<br />

<div id="pagination" style="">
<?php require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagelinks.php' );?>      
<div style="clear: both;"></div> 
</div><!-- paginacion--> 
<br />
<br />
<div id="tareas">
<?php require_once( JPATH_COMPONENT.DS.'helpers'.DS.'tasklinks.php' );?>
</div>




<?php
/*
echo '<pre>';
print_r($row);
echo '</pre>';
*/
?>