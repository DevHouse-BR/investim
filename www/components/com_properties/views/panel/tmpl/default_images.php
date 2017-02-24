<?php defined('_JEXEC') or die('Restricted access'); 
$option = JRequest::getVar('option');
$view = JRequest::getVar('view');
JHTML::_('behavior.tooltip');
		$ordering = 1;	
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'helper.php' );
$product_id = JRequest::getVar('product_id',0,'','int');
$Itemid = JRequest::getVar('Itemid'); 
?>
  


  
<form action="index.php" method="post" name="adminForm">



<div class="botones">
<div class="mytoolbar" style="width:100%; float:left;">
<div id="progressSave" style="float: left; width:200px;"></div>


<?php

$linkR = JRoute::_( 'index.php?option=com_properties&view=panel&task=edit&id='.$product_id.'&Itemid='.$Itemid);	
?>
<div style="float: right;">	




<button type="button" class="mybutton icon-32-back" onclick="location.href='<?php echo $linkR; ?>';"><span><?php echo JText::_('Return Property'); ?></span></button>	

<button type="button" class="mybutton icon-32-apply" onclick="submitbutton('saveImagesList')"><span><?php echo JText::_('Save List'); ?></span></button> 
		
<button type="button" class="mybutton icon-32-delete" onclick="submitbutton('remove')"><span><?php echo JText::_('Delete'); ?></span></button>            
</div>

</div>

</div>	
<div style="clear:both"></div>



<table width="100%">
	<tr>        
        <td nowrap="nowrap">
            <?php //echo Filter::FilterCategory( $this->items[0],'category','products' ); ?>
            </td>            
		<td nowrap="nowrap">
		

            
		</td>        
         <td nowrap="nowrap" align="right">
            <?php //echo Filter::FilterCategory( $this->items[0],'category','products' ); ?>
            </td>            
	</tr>
</table>
<div id="editcell">
	<table class="adminlist" width="100%">
<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'NUM' ); ?>
			</th>
			<th width="5" align="center">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->Images ); ?>);" />
			</th>
            <th  width="5" class="img">
				<?php echo JText::_('img'); ?>
			</th>
			<th class="title">
				<?php echo JText::_('Name'); ?>
			</th>
             <th class="title">
				<?php echo JHTML::_('grid.sort',   'Sector', 'sector', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th> 
            <th class="title">
				<?php echo JHTML::_('grid.sort',   'Description', 'text', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>                  
			<th width="5" align="center">
				<?php echo JText::_('Published'); ?>
			</th>
              <th width="100px" nowrap="nowrap">
            <?php //echo JText::_('Order by'); ?>
				<?php if ($ordering) echo JHTML::_('grid.order',  $this->Images ); ?>
              </th>  
			
			<th width="5" nowrap="nowrap">
				<?php echo JText::_('ID'); ?>
			</th>                
		</tr>
	</thead>
	<tbody>
	<?php
	
$k = 0;
	for ($i=0, $n=count( $this->Images ); $i < $n; $i++)
	{
		$row = &$this->Images[$i];			
$link 		= JRoute::_( 'index.php?option='.$option.'&view='.$view.'&layout=form&task=edit&cid[]='. $row->id);
		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		//$published 	= JHTML::_('grid.published', $row, $i );
		$published = CatTreeHelper::Published( $row, $i);
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td width="5">
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td width="5" align="center">
				<?php echo $checked; ?>
			</td>
            <td>
            <?php $img_path = JURI::root().'images/properties/images/thumbs/'.$product_id.'/'.$row->name;?>
            <span class="editlinktip hasTip" title="<?php echo $row->name;?>::
<img border=&quot;1&quot; src=&quot;<?php echo $img_path; ?>&quot; name=&quot;imagelib&quot; alt=&quot;<?php echo JText::_( 'No preview available'.$img_path ); ?>&quot; width=&quot;200&quot; height=&quot;150&quot; />">
				<img width="50" src="<?php echo JURI::root().'images/properties/images/thumbs/'.$product_id.'/'.$row->name;?>" />
                </span>                
			</td>
			<td>               
				
				
					<?php echo $row->name; ?></span>				
			</td>
            
             <td align="center">
				<?php 
				$sectors 	= array();
				$sectors[] 	= JHTML::_('select.option',  '0', JText::_( 'Image Sector' ) );
					
			for($x=1;$x<=10;$x++)	
			{
				$sectors[] = JHTML::_('select.option',  $x, 'image_sector_'.$x );
			}
			
		$output = JHTML::_('select.genericlist',   $sectors, 'sector['.$row->id.']', 'class="select_sector" size="1" ', 'value', 'text', $row->sector );	
			echo $output;	
				
				
				?>
			</td>
           
			<td align="center">
				<input type="text" name="text[<?php echo $row->id; ?>]" id="text[<?php echo $row->id; ?>]" size="25"  value="<?php echo $row->text; ?>" />
			</td>
            
            
			<td align="center">
				<?php echo $published;?>
			</td>
            <td class="order" align="right">
					<span><?php echo $this->pagination->orderUpIcon( $i, true, 'orderup', 'Move Up', $ordering ); ?></span>
					<span><?php echo $this->pagination->orderDownIcon( $i, $n, true, 'orderdown', 'Move Down', $ordering ); ?></span>
					<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
					<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
                    <input type="hidden" name="itemid[]" value="<?php echo $row->id;?>" />
				</td>
					
			<td align="center">
				<?php echo $row->id; ?>
			</td>
		</tr>
		<?php
			$k = 1 - $k;
				
		?>
		<?php } ?>
		
	</tbody>
    <tfoot>
    <tr>
      <td colspan="13"><?php //echo $this->pagination->getListFooter(); ?></td>
    </tr>
  </tfoot>
	</table>
</div>

	<input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="table" value="images" />
    <input type="hidden" name="view" value="<?php echo $view; ?>" />
	<input type="hidden" name="task" value="" />
    
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="images" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>






<?php if(JRequest::getVar('product_id')){ ?>

<fieldset class="adminform">
		<legend><?php echo JText::_( 'Upload Images' ); ?></legend>

     
<?php
/*
$img_path = JURI::root().'images/properties/images/'.$product_id.'/';
$peque_path = JURI::root().'images/properties/images/thumbs/'.$product_id.'/';

if($this->Images){
foreach($this->Images as $image){
echo '<img width="100px" style="padding: 2px; border: 1px solid #CCCCCC; margin:5px;" src="'.$peque_path.$image->name.'" />';
}
}
*/
?>


<form action="index.php" method="post" name="ImageForm" id="ImageForm"  enctype="multipart/form-data">
<div id="botones_form" style="width:100%; float:right;">
<input name="files" type="file" id="files" class="files" />

</div>
<input class="save" type="submit" name="boton" value="Subir Fotos" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="parent" value="<?php echo $product_id; ?>" />
<input type="hidden" name="task" value="save" />
<input type="hidden" name="controller" value="images" />

</form>

</fieldset>
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>

<?php } ?>
