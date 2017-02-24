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

<div id="list_properties" style="width:100%;float: left; min-height:500px; margin:5px 5px 0px 0px; padding:2px; text-align:center;">

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


        </div>  <!--property_product_description_left -->       
  
  
          <div id="property_product_description_right">
          
 <?php 
//print_r($this->MyVotes);
if($ShowVoteRating){
echo '<div style="width:100%; float:left;">';
echo '<div  class="div_vote">';
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
}
?>             
          
          
<?php if($row->address){echo JText::_('Address') .' : '. $row->address.'<br />';} ?>
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