<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip');
jimport('joomla.filesystem.file');
$document =& JFactory::getDocument();
$lang =& JFactory::getLanguage();

switch ($lang->getTag())
	{
	case 'de-DE' :	
	$title = 'Immobilien';	
	break;	
	case 'en-GB' :	
	$title = 'Properties';	
	break;
	case 'es-ES' :	
	$title = 'Propiedades';	
	break;
	case 'ru-RU' :	
	$title = JText::_('Title Properties');
	break;
	}
	
$document->setTitle( $title );
$document->setDescription( $title );
$document->setMetadata('keywords',$title);

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowOrderBy=$params->get('ShowOrderBy');
$ShowOrderByDefault=$params->get('ShowOrderByDefault');

$linkAjax= JURI::base().'index.php?option=com_properties&controller=searchajax&format=raw&task=SearchAjax&langg='.$lang->getTag();

?>

<div id="propiedades" >

<div style=" width:100%; height:15px;"></div>
<div id="accordion">
<?php
if($ShowOrderBy==1){
?>
<div id="ShowOrderBy">
<?php require_once( JPATH_COMPONENT.DS.'helpers'.DS.'orderbyagents.php' );?>
</div>
<?php
}
?>

<div style="clear:both"></div>

<?php
    $k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	
    {
$row = &$this->items[$i];
		//$link 		= JRoute::_( 'index.php?option=com_properties&amp;view=properties&amp;task=agentlisting&amp;aid='.$row->mid);
		//$link=LinkHelper::getLink('properties','agentlisting','','','','','','','',$row->agent_id);
		$link= LinkHelper::getLink('properties','agentlisting','','','','','','','',$row->mid);
		?>
<div class="producto" >        
         
<?php

if($row->image!=NULL){ $img=$row->image;}else{$img='noimage.jpg';}
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'profiles'.DS.$img;
if (JFile::exists($destino_imagen)){

$imgTag='<img src="images/properties/profiles/'.$img.'" alt="'. str_replace('"',' ',$row->alias) .'" width="100" height="125" />';
 
 }else{$imgTag='<img src="images/properties/peques/peque_'. $img .'" />';}
?>
<div class="detalles">
<div class="imagendetallesAgent">
<div class="watermark_box">
<a href="<?php echo $link; ?>">
<?php echo $imgTag;?>
</a>
 </div>
</div>
            	<div class="datos">
<a href="<?php echo $link; ?>"><?php echo $row->name; ?></a><br />
<?php if($row->company){echo JText::_('Company') .' : '. $row->company.'<br />';} ?>
<?php if($row->email){echo JText::_('Email') .' : '. $row->email.'<br />';} ?>
<?php if($row->phone){echo JText::_('Phone') .' : '. $row->phone.'<br />';} ?>





			   </div>
 </div> 
<div class="togagent">
<?php
if($row->logo_image){
?>
<div class="agent" style=""><img src="images/properties/profiles/<?php echo $row->logo_image;?>" width="140" height="45" alt="<?php echo $row->alias;?>" /></div>
<?php }?>
<div class="toggler"></div>  
</div>            
<div style="clear:both"></div>
					<div class="element">
                    	<div class="innerelement" >
<div class="detalleProducto" style="width:100%; float:left;">

<?php if($row->fax){echo JText::_('Fax') .' : '. $row->fax.'<br />';} ?>
<?php if($row->mobile){echo JText::_('Mobile') .' : '. $row->mobile.'<br />';} ?>

<?php if($row->country){echo JText::_('Country'). ': '. $row->country.'<br />';} ?>
<?php if($row->state){echo JText::_('State'). ': '. $row->state.'<br />';} ?>
<?php if($row->locality){echo JText::_('Locality'). ': '. $row->locality.'<br />';} ?>
<?php if($row->address1){echo JText::_('Address') .' : '. $row->address1.'<br />';} ?>
<?php if($row->address2){echo JText::_('Address2') .' : '. $row->address2.'<br />';} ?>
<br />


<?php 
$rutaC= JURI::base().'index.php?option=com_properties&view=form1&tmpl=component&id='.$row->id;
$statusC = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=600,directories=no,location=no';

?>
<a href="javascript:void(0)" onclick="window.open('<?php echo $rutaC ; ?>','win2','<?php echo $statusC; ?>');" title="<?php echo JText::_('Contact this Agent'); ?>"><?php echo JText::_('Contact this Agent'); ?></a><br />




<?php
$rutaA= LinkHelper::getLink('properties','agentlisting','','','','','','','',$row->mid);
?>                   

<a href="<?php echo JRoute::_( $rutaA );?>"><?php echo JText::_('View Properties from this Agent'); ?></a><br />
</div>
                </div><!--innerelement-->
                    </div><!-- element-->
</div>  <!--producto -->   
<?php
$k = 1 - $k;
}
 ?>


</div><!-- acordeon-->



<div id="pagination" style="">
<?php require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagelinks.php' );?>      
<div style="clear: both;"></div> 
</div><!-- paginacion--> 
<br />
<br />

</div><!-- propiedades-->
