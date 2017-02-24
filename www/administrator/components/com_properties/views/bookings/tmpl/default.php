<?php defined('_JEXEC') or die('Restricted access'); 
$TableName = 'order_bookings';
JHTML::_('behavior.tooltip');
?>

<form action="index.php" method="post" name="adminForm">
<table>
	<tr>
		<td align="left" width="100%">
			<?php echo JText::_( 'Filter' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $this->lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
			<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
		</td>
		<td nowrap="nowrap">
			<?php echo $this->lists['state']; ?>
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
				<?php echo JHTML::_('grid.sort',   'Property', 'id_property', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'User', 'user_created', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th> 
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Creation Date', 'date_created', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'From', 'date_from', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>  
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'To', 'date_to', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'Confirmed', 'confirmed', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'Date confirmation', 'confirmed_date', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'Confirmed by', 'confirmed_by', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>      
			<th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'ID', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>                    			
		</tr>
	</thead> 
<tbody>
	<?php
	//print_r($this->items);
	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)
	{
		$row = &$this->items[$i];
$link 		= JRoute::_( 'index.php?option=com_properties&view=bookings&task=edit&cid[]='. $row->id_order);
		
		$checked 	= JHTML::_('grid.id',  $i, $row->id_order );
		$published 	= JHTML::_('grid.published', $row, $i );
		
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
<img border=&quot;1&quot; src=&quot;<?php echo $img_path; ?>&quot; name=&quot;imagelib&quot; alt=&quot;<?php echo JText::_( 'No preview available'.$img_path ); ?>&quot; width=&quot;200&quot; height=&quot;150&quot; />">
				<img width="30" src="<?php echo JURI::root().'images/properties/peques/peque_'.$row->image1;?>" />
                </span>
                
			</td>
            
            
<td>
<?php $img_path = JURI::root().'images/properties/'.$row->image1;?>
<span class="editlinktip hasTip" title="<?php echo $row->name;?>::
<table border=&quot;0&quot; width=&quot;206&quot; ><tr><td>Id : <?php echo $row->id;?></td></tr><tr><td>Ref : <?php echo $row->ref;?></td></tr></table>">
<a href="<?php echo $link; ?>"><?php echo $row->name;?></a></span>
</td>


<td align="center"><?php echo $row->user_created; ?></td>
<td align="center"><?php echo $row->date_created; ?></td>
<td align="center"><?php echo $row->date_from;?></td>
<td align="center"><?php echo $row->date_to;?></td>
<td align="center"><?php echo $row->confirmed;?></td>
<td align="center"><?php echo $row->confirmed_date;?></td>
<td align="center"><?php echo $row->confirmed_by;?></td>
<td align="center"><?php echo $row->id_order; ?></td>   			


		
		</tr>
		<?php
			$k = 1 - $k;
		}
		?>
	</tbody>
    <tfoot>
    <tr>
      <td colspan="13"><?php echo $this->pagination->getListFooter(); ?></td>
    </tr>
  </tfoot>
	</table>
</div>

	<input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="table" value="order_bookings" />
    <input type="hidden" name="view" value="bookings" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="bookings" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php
     
    
	

?>