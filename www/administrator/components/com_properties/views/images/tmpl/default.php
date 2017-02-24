<?php defined('_JEXEC') or die('Restricted access'); 
$option = JRequest::getVar('option');
$view = JRequest::getVar('view');
JHTML::_('behavior.tooltip');
		$ordering = ($this->lists['order'] == 'ordering');	
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'filter.php' );
$product_id = JRequest::getVar('product_id',0,'','int');

?>
  
  <div style="width:100%; float:left;border: 1px solid #CCCCCC;">
<table>
	<tr>
    	<td align="center">
<?php $linkReturn = JRoute::_( 'index.php?option='.$option.'&view=products&layout=form&task=edit&cid[]='. $product_id);?>
        <a href="<?php echo $linkReturn;  ?>"><?php echo JText::_('Return Property'); ?></a> 

		</td>        
	</tr>
</table>
</div>
<div style="clear:both"></div>  
  
<form action="index.php" method="post" name="adminForm">

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
	<table class="adminlist">
<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'NUM' ); ?>
			</th>
			<th width="5" align="center">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
            <th  width="5" class="img">
				<?php echo JText::_('img'); ?>
			</th>
			<th class="title">
				<?php echo JHTML::_('grid.sort',   'Name', 'name', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>   
            <th class="title">
				<?php echo JHTML::_('grid.sort',   'Sector', 'sector', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th> 
            <th class="title">
				<?php echo JHTML::_('grid.sort',   'Description', 'text', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>          
			<th width="5" align="center">
				<?php echo JHTML::_('grid.sort',   'Published', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
              <th width="100px" nowrap="nowrap">
            <?php echo JHTML::_('grid.sort',   'Order by', 'ordering', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
				<?php if ($ordering) echo JHTML::_('grid.order',  $this->items ); ?>
              </th>  
			
			<th width="5" nowrap="nowrap">
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
$link 		= JRoute::_( 'index.php?option='.$option.'&view='.$view.'&layout=form&task=edit&cid[]='. $row->id);
		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		$published 	= JHTML::_('grid.published', $row, $i );
		
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
				<input type="text" name="text[<?php echo $row->id; ?>]" id="text[<?php echo $row->id; ?>]" size="45"  value="<?php echo $row->text; ?>" />
			</td>
            <td align="center">
				<?php echo $published;?>
			</td>
            <td class="order">
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
      <td colspan="13"><?php echo $this->pagination->getListFooter(); ?></td>
    </tr>
  </tfoot>
	</table>
</div>

	<input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="table" value="images" />
    <input type="hidden" name="view" value="<?php echo $view; ?>" />
	<input type="hidden" name="task" value="" />
    
    <input type="hidden" name="product_id" value="<?php echo JRequest::getVar('product_id'); ?>" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="<?php echo $view; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>





<fieldset class="adminform">
		<legend><?php echo JText::_( 'Multi Upload Images' ); ?></legend>
     


 <table cellpadding="3" cellspacing="1" border="0">
            <tr>
                <td style=" width:32px; height:32px;background:url(<?php echo JURI::root();?>/components/com_properties/includes/img/icon-32-upload.png) no-repeat;"></td>
            	<td>
<form action="index.php" method="post" name="ImageForm" id="ImageForm"  enctype="multipart/form-data">

<input name="files" type="file" id="files" class="files" />

<input class="save" type="submit" name="boton" value="Upload images" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="parent" value="<?php echo $product_id; ?>" />
<input type="hidden" name="task" value="save" />
<input type="hidden" name="controller" value="images" />

</form>

</td>
               </tr>
          </table>
<div id="log_res" style="width:100%; float:right;"></div>
</fieldset>














<?php

/*
$delme=0;
$k=0;
foreach($this->items as $r){
$this->images[$r->name][]=$r->name;
$delme++;
$k++;
}
print_r($this->images);
*/


jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');


$img_path = JURI::root().'images/properties/images/'.$product_id.'/';
$peque_path = JURI::root().'images/properties/images/thumbs/'.$product_id.'/';

$dir = JPATH_SITE.DS.'images'.DS.'properties'.DS.'images'.DS.$product_id.DS;




		// Open directory, and proceed to read its contents
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				$j=0; // counter for directories
				//$k=0; // counter for images
				while (($file = readdir($dh)) !== false) {
					if ($file != '.' && $file != '..' && $file != 'thumb') {
						$file_type = filetype($dir.$file);
						//$mime_type = $this->getMimeType($dir.$file);
						
						$mime_type =  JFile::getExt($dir.$file);
						
						if ($file_type == 'dir') {
							$this->subdirectories[$j] = $file;
							$j++;
						}
						elseif ($mime_type == 'jpg' || $mime_type == 'jpeg' || $mime_type == 'png' || $mime_type == 'gif') {
							$this->images[$file]['file'] = $file;
							$this->images[$file]['img_size'] = getimagesize($dir.$file);
							//$this->images[$k]['caption'] = $this->getImageCaption($file);
							$this->images[$file]['file_size'] = number_format((filesize($dir.$file)/1024), 2).' Kb';
							$this->images[$file]['date_modified'] = date("d-m-y", filemtime($dir.$file));
							$k++;
						}
					}
				}
				closedir($dh);
			}
		}



foreach($this->items as $r){
unset($this->images[$r->name]);
}


?>




<?php
if($this->images){
?>
<fieldset class="adminform">
		<legend><?php echo JText::_( 'Images in folder' ); ?></legend>


<form action="index.php" method="post" enctype="multipart/form-data">
<?php
echo $dir.'<br />';
foreach($this->images as $img){
/*echo '<br>'.$img['file'];*/
echo '<img width="100px" style="padding: 2px; border: 1px solid #CCCCCC; margin:5px;" src="'.$img_path.$img['file'].'" />';
?>
<input type="hidden" name="img_name[]" value="<?php echo $img['file']; ?>" />
<?php
}
?> 

 <table cellpadding="3" cellspacing="1" border="0">
            <tr>
                <td style=" width:32px; height:32px;background:url(templates/khepri/images/toolbar/icon-32-new.png) no-repeat;"></td>
            	<td><?php echo JText::_('Add Images and Generate Thumbs'); ?>:</td>
                <td><input type="submit" name="submit" value="<?php echo JText::_('Add Images'); ?>" /></td>
            </tr>
        </table>
        
        <input type="hidden" name="folder" value="<?php echo $product_id; ?>" />
        <input type="hidden" name="task" value="generate_folder_thumbs" />
        <input type="hidden" name="controller" value="images" />
        <input type="hidden" name="parent" value="<?php echo $product_id; ?>" />
        <input type="hidden" name="option" value="<?php echo $option; ?>" />
        
        </form>
</fieldset>
<?php
}
?>      
        



       