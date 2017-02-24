<?php defined('_JEXEC') or die('Restricted access'); 
$TableName = 'comments';
$component_name = 'formacion';
JHTML::_('behavior.tooltip');

	//Ordering allowed ?
		$ordering = ($this->lists['order'] == 'ordering');	
?>

<?php
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'menu_left.php' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'filter.php' );
?>
<table width="100%">
	<tr>
		<td align="left" width="200px" valign="top">
<?php echo MenuLeft::ShowMenuLeft();?>

		</td>
        <td align="left" valign="top" style="padding-left:10px;">
        
        
<form action="index.php" method="post" name="adminForm">
<table>
	<tr>
		<td align="left" width="100%">
			
		</td>
		<td nowrap="nowrap">
            <?php echo Filter::FilterProductComments( $this->items[0],'comments','comments' ); ?>
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
			<th width="5">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
			
            
            
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Title', 'title', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th class="title">
				<?php echo JHTML::_('grid.sort',   'Product', 'productid', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Comment', 'comment', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>  
            <th  width="5" class="title">
				<?php echo JHTML::_('grid.sort',   'Date', 'date', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th> 
            <th  width="5" class="title">
				<?php echo JHTML::_('grid.sort',   'Published', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>         
			<th  width="5" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'ID', 'form_id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            
		</tr>
	</thead>
	<tbody>
	<?php
	$k = 0;
	$i=0;
	$rows = &$this->items;
	if($rows){
	foreach ($rows as $row) :		
$link 		= JRoute::_( 'index.php?option='.$option.'&view=comments&layout=form&task=edit&cid[]='. $row->id);	
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		$published 	= JHTML::_('grid.published', $row, $i );		
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td width="5">
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td width="5">
				<?php echo $checked; ?>
			</td>
			
            
			
            <td align="left">
             <span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit comment' );?>">
            <a href="<?php echo $link; ?>"><?php echo $row->title; ?></a>
			</span>
			</td>   
            <td align="left">
				<?php echo $row->name_product; ?>
			</td>           
            <td align="left">
            <span class="editlinktip hasTip" title="<?php echo JText::_( 'Texto del comentario' );?>::<?php echo htmlspecialchars($row->comment, ENT_COMPAT, 'UTF-8'); ?>"><?php echo substr($row->comment,0,50); ?></span>
			</td>  	
           
            
<?php
$f=explode('-',$row->date);
$fecha=$f[2].'-'.$f[1].'-'.$f[0];
?>
<td align="center"><?php echo $fecha; ?></td>
		
            <td align="center">
				<?php echo $published; ?>
			</td> 					
			<td align="center">
				<?php echo $row->id; ?>
			</td>
           
		</tr>
		<?php
			$k = 1 - $k;
			$i++;
		//}
		?>
		<?php endforeach; }?>		
	</tbody>
    <tfoot>
    <tr>
      <td colspan="13"><?php echo $this->pagination->getListFooter(); ?></td>
    </tr>
  </tfoot>
	</table>
</div>

   
    
    	<input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="table" value="<?php echo $TableName; ?>" />
    <input type="hidden" name="view" value="<?php echo $TableName; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="<?php echo $TableName; ?>" />
    
    
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>
	</td>
		</tr>
			</table> 