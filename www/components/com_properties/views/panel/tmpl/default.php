<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip');
$document =& JFactory::getDocument();
//require_once( JPATH_COMPONENT.DS.'helpers'.DS.'filter.php' );
jimport('joomla.filesystem.file');
$lang =& JFactory::getLanguage();
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$MostrarCarousel=$params->get('MostrarCarousel');
$ActivarMapa=$params->get('ActivarMapa');

if(!JRequest::getVar('id_categoria')){$id_categoria = 0;}
else{
$id_categoria = JRequest::getVar('id_categoria');
}
//echo '$idcategoriaaaa : '.$id_categoria;
$Itemid = JRequest::getVar('Itemid'); 
echo JRequest::getVar('task'); 
?>



<?php
$RegisteredAutoPublish=$params->get('RegisteredAutoPublish',1);
$user =& JFactory::getUser();
///change 50 'agent' to 21 'publisher'...
switch ($user->gid)
{
case 18:$Can_publish=$params->get('AmountForRegistered',1);
break;
case 19:$Can_publish=$params->get('AmountForAuthor',1);
break;
case 20:$Can_publish=$params->get('AmountForEditor',1);
break;
case 21:$Can_publish=$params->get('AmountForPublisher',1);
break;
case 25:$Can_publish = -1;
break;
}


if($Can_publish > $this->Cant_items || $Can_publish==-1){

?>

<div class="titulo"><H3><?php echo JText::_('My Panel'); ?></H3></div>

<div style="clear:both;"></div>

<div class="botones">
<div class="mytoolbar" style="width:100%; float:left;">
<div id="progressSave" style="float: left; width:200px;"></div>
<div style="float: right;">	
			<button type="button" class="mybutton icon-32-new" onclick="submitbutton('new')"><span><?php echo JText::_('New'); ?></span></button>		
			<button type="button" class="mybutton icon-32-delete" onclick="submitbutton('remove')"><span><?php echo JText::_('Delete'); ?></span></button>
          
            
                 
</div>

</div>

</div>	
<div style="clear:both"></div>

<?php
}
?>



        
<form action="index.php" method="post" name="adminForm">
<table>
	
            <tr>            
            <td nowrap="nowrap" align="right">
            <?php //echo Filter::FilterCategory( $this->items[0],'category','products' ); ?>
            </td>
            <td nowrap="nowrap" align="right">
            <?php //echo Filter::FilterType( $this->items[0],'type','products' ); ?>
            </td>           
             <td nowrap="nowrap" align="right">
            <?php //echo Filter::FilterFeatured( $this->items[0],'featured','products' ); ?>
            </td>
            	
	</tr>
</table>
<div id="editcell">
<table class="adminlist">
<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'NUM' ); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
             <th  class="img">
				<?php echo JHTML::_('grid.sort',   'img', 'img', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th  class="title">
				<?php echo JHTML::_('grid.sort',   'Title', 'name', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Ref', 'ref', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>

            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Category', 'cid', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Type', 'type', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            
                        
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Locality', 'lid', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>            
           
          
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Feat', 'featured', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Publ', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Hits', 'hits', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'ID', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            

		</tr>
	</thead> 
<tbody>
	<?php
	
	
	
	





	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)
	{
		$row = &$this->items[$i];

$link = JRoute::_( 'index.php?option=com_properties&view=panel&task=edit&id='.$row->id.'&Itemid='.$Itemid);		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		//$published 	= JHTML::_('grid.published', $row, $i );
		$published = CatTreeHelper::Published( $row, $i);
		$destacado = CatTreeHelper::Destacado( $row, $i);
	?> 
    
<?php
$rout_image = 'images/properties/images/'.$row->id.'/';
$rout_thumb = 'images/properties/images/thumbs/'.$row->id.'/';

if($this->Images[$row->id][0]->name!=NULL){ 
$img=$this->Images[$row->id][0]->name;
}else{
$img='noimage.jpg';
}
?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
            
            <td>
            <?php $img_path = JURI::root().'images/properties/peques/peque_'.$row->image1;?>
            <span class="editlinktip hasTip" title="<?php echo $row->name;?>::
<img border=&quot;1&quot; src=&quot;<?php echo $rout_thumb.$img; ?>&quot; name=&quot;imagelib&quot; alt=&quot;<?php echo JText::_( 'No preview available'.$img_path ); ?>&quot; width=&quot;200&quot; height=&quot;150&quot; />">
				<img width="30" src="<?php echo JURI::root().$rout_thumb.$img;?>" />
                </span>
                
			</td>
            
<td>
          <?php $img_path = JURI::root().'images/properties/'.$row->image1;?>
<span class="editlinktip hasTip" title="Description::
<?php echo $row->description; ?>">
<a href="<?php echo $link; ?>"><?php echo $row->name; ?></a></span>
</td>
<td align="center"><?php echo $row->ref; ?></td>
<td align="center"><?php echo $row->name_category; ?></td>
<td align="center"><?php echo $row->name_type; ?></td>

<td align="center"><?php echo $row->name_locality; ?></td>


<td align="center"><?php echo $destacado;?></td>
<td align="center">
<?php 
if($user->gid==18){
	if($RegisteredAutoPublish==1){
echo $published;
	}else{
	echo '<img src="components/com_properties/includes/img/publish_x.png" border="0" alt="unpublished" />';
	
	}
}else{
echo $published;
}
?>
</td>
<td align="center"><?php echo $row->hits; ?></td>  
<td align="center"><?php echo $row->id; ?></td>   			
 		
		</tr>
		<?php
			$k = 1 - $k;
		}
		?>
	</tbody>
    <tfoot>
    <tr>
      <td colspan="16"><?php echo $this->pagination->getListFooter(); ?></td>
    </tr>
  </tfoot>
	</table>
</div>

	<input type="hidden" name="option" value="<?php echo $option; ?>" />
     <input type="hidden" name="view" value="panel" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="products" />
    <input type="hidden" name="Itemid" value="<?php echo LinkHelper::getItemid('panel'); ?>" />
  
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<div style="clear:both;"></div>
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>


