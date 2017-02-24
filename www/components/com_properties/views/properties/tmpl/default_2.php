<?php defined('_JEXEC') or die('Restricted access'); 
//echo '$TableName'.$TableName.'<br>';
JHTML::_('behavior.tooltip');
$document =& JFactory::getDocument();

if (JRequest::getVar('catid') && strpos(JRequest::getVar('catid'), ':')) {
		list($titulo['catid'], $titulo['catalias']) = explode(':', JRequest::getVar('catid'), 2);
		$titulo = str_replace('-',' ',$titulo['catalias']);
		$titulo = ucwords($titulo);
		$document->setTitle( $titulo );
	}
	
/*	
if(JRequest::getVar('catid')){
$document->setTitle( JRequest::getVar('catid') );}*/

$component = JComponentHelper::getComponent( 'com_propiedades' );
$params = new JParameter( $component->params );
$MostrarCarousel=$params->get('MostrarCarousel');
$ActivarMapa=$params->get('ActivarMapa');
if(!JRequest::getVar('provincia_producto')){$provincia_producto = 0;}
else{$provincia_producto = JRequest::getVar('provincia_producto');}
//echo '$provincia_producto: '.$provincia_producto;
if(!JRequest::getVar('ciudad_producto')){$ciudad_producto = 0;}
else{$ciudad_producto = JRequest::getVar('ciudad_producto');}
//echo '$ciudad_producto: '.$ciudad_producto;
if(!JRequest::getVar('id_categoria')){$id_categoria = 0;}
else{
$id_categoria = JRequest::getVar('id_categoria');
}
//echo '$idcategoriaaaa : '.$id_categoria;


/*$id = JRequest::getVar('id');
echo 'id: '.$id;
$catid = JRequest::getVar('catid');
echo 'catid: '.$catid;*/
     
?>

		

<div id="propiedades" >
<?php
    $k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	
    {
$row = &$this->items[$i];	
		$link 		= JRoute::_( 'index.php?option=com_propiedades&view=propiedad&catid='.$row->catslug.'&id='.$row->slug);
		?>
<div class="producto_default_2" style="float:left; width:95%;border: 1px solid #CCCCCC; margin-top:10px; padding: 10px;">        
<div id="producto_imagen" style="float:left; width:120px;">
<?php

 if($row->disponible_producto==2){
 $disponible='vendida-'.$lang->getTag();
 }elseif(
 $row->disponible_producto==1){
$disponible='alquilada-'.$lang->getTag();
}else{
$disponible='disponible';
} ?>            

<?php if($row->imagen0_producto!=NULL){ $img=$row->imagen0_producto;}else{$img='noimage.jpg';}
$destino_imagen = JPATH_SITE.DS.'images'.DS.'propiedades'.DS.'peques'.DS.'peque_'.$img;
if (JFile::exists($destino_imagen)){
$imgTag='<img src="images/propiedades/peques/peque_'. $img .'" alt="'. $row->titulo_producto .'" />';
 
 }else{$imgTag='<img src="images/propiedades/peques/peque_'. $img .'" />';}
?>

<a href="<?php echo $link; ?>">
<?php echo $imgTag;?>
</a>

</div>	
<div class="datosA" style="float:left; width:350px;">
<a href="<?php echo $link; ?>"><?php echo $row->titulo_producto; ?></a><br />
 </div>  
<div class="datosA" style="float:left">
<?php echo JText::_('Category'); ?>: <?php echo $row->nombre_categoria; ?><br />                    
<?php echo JText::_('Province'); ?>: <?php echo $row->nombre_provincia; ?><br />
<?php echo JText::_('City'); ?>: <?php echo $row->nombre_ciudad; ?> 
 </div>                   
<div class="datosB" style="float:left; border-left: 1px solid #CCCCCC; margin-left:10px; padding-left:10px;">
<?php echo JText::_('Price'); ?>: <?php echo $row->precio_producto; ?><br />
<?php echo JText::_('Sector'); ?>: <?php echo $row->sector_producto; ?>
</div>
<div class="datosB" style="float:left; width:500px; ">
             <?php echo $row->descripcion_producto; ?>
					<br />                    
<?php
$ruta= JURI::base().'index.php?option=com_propiedades&view=propiedad&task=mapa&tmpl=component&id='.$row->id_producto;
if($ActivarMapa == 1){
?>
<a href="<?php echo JRoute::_( $ruta );?>" rel="mediabox[650 490]" title="<?php echo $row->titulo_producto; ?>" ><?php echo JText::_('See in map'); ?></a>
<?php }?>
<br /> 
</div>                
</div>  <!--producto -->   
<?php
$k = 1 - $k;
}
 ?>
<div class="paginacion" style="">
<div class="left" style="float:left;">
	  <?php echo $this->pagination->getPagesLinks(); ?>
      </div>      
      <div class="limit" style="float:left;padding: 12px 0px 0px 10px;margin: 15px auto;background: url(templates/ja_purity/images/hdot.gif) repeat-x top;">
      <?php echo $this->pagination->getResultsCounter().' | '.$this->pagination->getPagesCounter(); ?>
      </div>
<br style="clear: both;" /> 
</div><!-- paginacion--> 
</div><!-- propiedades-->