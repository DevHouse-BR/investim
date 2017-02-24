<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class PropertiesViewElement extends JView
{
	function display()
	{
		global $mainframe;

		$db			= &JFactory::getDBO();
		
		$document	= & JFactory::getDocument();
		$document->setTitle(JText::_('Article Selection'));

		JHTML::_('behavior.modal');
		
		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');
		
$TableName = JRequest::getVar('table');//'products';
$this->items		= & $this->get( 'Data');
$this->pagination =& $this->get('Pagination');
$this->lists = & $this->get('List');


		JHTML::_('behavior.tooltip');
		

switch ($TableName)
{
		
		case 'products' :		
?>                    
<form action="index.php?option=com_properties&amp;view=element&amp;&amp;task=element&amp;tmpl=component&amp;object=id" method="post" name="adminForm">
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
            <td nowrap="nowrap">
            <?php echo Filter::FilterCategory( $this->items[0],'category','products' ); ?>
            </td>
            <td nowrap="nowrap">
            <?php echo Filter::FilterLocality( $this->items[0],'locality','products' ); ?>
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
				<?php echo JHTML::_('grid.sort',   'Parent', 'r.parent', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Category', 'r.cid', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Type', 'type', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Country', 'cyid', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
                        <th  class="title">
				<?php echo JHTML::_('grid.sort',   'State', 'sid', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Locality', 'lid', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>            
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Description', 'description', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Price', 'price', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Published', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Available', 'available', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'ID', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'AiD', 'agent_id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>

		</tr>
	</thead> 
<tbody>
	<?php

	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)
	{
		$row = &$this->items[$i];
$link 		= JRoute::_( 'index.php?option=com_properties&controller=property&table='.$TableName.'&task=edit&cid[]='. $row->id);
		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
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


<span class="editlinktip hasTip" title="Description::
<?php echo $row->description; ?>">

						<a style="cursor: pointer;" onclick="window.parent.jSelectArticle('<?php echo $row->id; ?>', '<?php echo str_replace(array("'", "\""), array("\\'", ""),$row->name); ?>', '<?php echo JRequest::getVar('object'); ?>');">
							<?php echo htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?></a>


</span>
</td>
<td align="center"><?php echo $row->ref; ?></td>
<td align="center"><?php echo $row->parent; ?></td>
<td align="center"><?php echo $row->cid.':'.$row->name_category; ?></td>
<td align="center"><?php echo $row->name_type; ?></td>
<td align="center"><?php echo $row->name_country; ?></td>
<td align="center"><?php echo $row->name_state; ?></td>
<td align="center"><?php echo $row->name_locality; ?></td>

<td align="center">
<span class="editlinktip hasTip" title="
Descripción: ::<?php echo $row->description; ?>">
<?php echo substr($row->description, 0, 20); ?>
</span>
</td>
<td align="center">
<?php

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

echo $formatted_price; ?>
</td>
<td align="center"><?php echo $published;?></td>
<td align="center">
<?php 
echo JText::_( 'DETAILS_MARKET'.$row->available );
  ?>
</td>
<td align="center"><?php echo $row->id; ?></td>   			
 		<td align="center"><?php echo $row->agent_id; ?></td>  
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

	<input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="table" value="<?php echo $TableName; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="property" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>
<?php
break;	


	case 'category' :	
$this->CatChild		= & $this->get( 'CatChild');
$ordering = ($this->lists['order'] == 't.ordering');	
?>
defcat
<form action="index.php?option=com_properties&amp;view=element&amp;&amp;task=element&amp;tmpl=component&amp;object=cid" method="post" name="adminForm">
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
         <td nowrap="nowrap">
            <?php echo Filter::FilterCategory( $this->items[0],'category','products' ); ?>
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
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->CatChild ); ?>);" />
			</th>
			<th  class="title">
				<?php echo JHTML::_('grid.sort',   'Category Name', 'name', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            
			<th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Published', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th nowrap="nowrap" width="8%">
						<?php echo JHTML::_('grid.sort',   'Order by', 'ordering', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
						<?php echo JHTML::_('grid.order',  $this->CatChild ); ?>
					</th>
			<th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Parent', 'parent', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'ID', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$k = 0;
	$i=0;
	$rows = &$this->CatChild;
	foreach ($rows as $row) :		
$link 		= JRoute::_( 'index.php?option=com_properties&controller=property&table='.$TableName.'&task=edit&cid[]='. $row->id);		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		$published 	= JHTML::_('grid.published', $row, $i );		
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td width="5%">
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td width="5%">
				<?php echo $checked; ?>
			</td>
			<td>
			<?php //if (  JTable::isCheckedOut($this->user->get ('id'), $row->checked_out )  ) {
				//echo $row->title;
			//} else {
				?>
                <?php //echo $row->treename; ?>
<span class="editlinktip hasTip" title="<?php echo JText::_( 'Select Category' );?>::<?php echo $row->treename; ?>">
				
                <a style="cursor: pointer;" onclick="window.parent.jSelectArticle('<?php echo $row->id; ?>', '<?php echo str_replace(array("'", "\""), array("\\'", ""),$row->treename); ?>', '<?php echo JRequest::getVar('object'); ?>');">
							<?php echo htmlspecialchars($row->treename, ENT_QUOTES, 'UTF-8'); ?></a>
                
</span>
				<?php
			//}
			?>
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
				<?php echo $row->parent; ?>
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
		<?php endforeach; ?>		
	</tbody>
    <tfoot>
    <tr>
      <td colspan="13"><?php echo $this->pagination->getListFooter(); ?></td>
    </tr>
  </tfoot>
	</table>
</div>

	<input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="table" value="<?php echo $TableName; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="property" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>
<?php

break;	




	case 'type' :	

$ordering = ($this->lists['order'] == 't.ordering');	
?>

<form action="index.php?option=com_properties&amp;view=element&amp;&amp;task=element&amp;tmpl=component&amp;object=tid" method="post" name="adminForm">
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
			<th width="5">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->CatChild ); ?>);" />
			</th>
			<th  class="title">
				<?php echo JHTML::_('grid.sort',   'Name', 'name', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Parent', 'parent', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Published', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th nowrap="nowrap" width="8%">
						<?php echo JHTML::_('grid.sort',   'Order by', 'ordering', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
						<?php echo JHTML::_('grid.order',  $this->CatChild ); ?>
					</th>
			
			<th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'ID', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
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
$link 		= JRoute::_( 'index.php?option=com_properties&controller=property&table='.$TableName.'&task=edit&cid[]='. $row->id);		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		$published 	= JHTML::_('grid.published', $row, $i );		
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td width="5%">
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td width="5%">
				<?php echo $checked; ?>
			</td>
			<td>
			<?php //if (  JTable::isCheckedOut($this->user->get ('id'), $row->checked_out )  ) {
				//echo $row->title;
			//} else {
				?>
                <?php //echo $row->treename; ?>
<span class="editlinktip hasTip" title="<?php echo JText::_( 'Select Type' );?>::<?php echo $row->name; ?>">
<a style="cursor: pointer;" onclick="window.parent.jSelectArticle('<?php echo $row->id; ?>', '<?php echo str_replace(array("'", "\""), array("\\'", ""),$row->name); ?>', '<?php echo JRequest::getVar('object'); ?>');">
							<?php echo htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?></a>
</span>
				<?php
			//}
			?>
            <td align="center">
				<?php echo $row->parent.' : '. $row->name_parent; ?>
			</td>
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

	<input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="table" value="<?php echo $TableName; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="property" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>
<?php

break;	














case 'state' :	

$ordering = ($this->lists['order'] == 't.ordering');	
?>

<form action="index.php?option=com_properties&amp;view=element&amp;&amp;task=element&amp;tmpl=component&amp;object=sid" method="post" name="adminForm">
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
			<th  width="5%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
			<th  class="title">
				<?php echo JHTML::_('grid.sort',   'State Name', 'name', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'Country Name', 'parent', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Published', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>	
            <th width="100px" nowrap="nowrap" >
						<?php echo JHTML::_('grid.sort',   'Order by', 'ordering', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
						<?php echo JHTML::_('grid.order',  $this->items ); ?>
			</th>
					
			<th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'ID', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
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
$link 		= JRoute::_( 'index.php?option=com_properties&controller=property&table='.$TableName.'&task=edit&cid[]='. $row->id);		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		$published 	= JHTML::_('grid.published', $row, $i );		
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td width="5%">
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td width="5%">
				<?php echo $checked; ?>
			</td>
			<td>
			<?php //if (  JTable::isCheckedOut($this->user->get ('id'), $row->checked_out )  ) {
				//echo $row->title;
			//} else {
				?>
                <?php //echo $row->treename; ?>
<span class="editlinktip hasTip" title="<?php echo JText::_( 'Select State' );?>::<?php echo $row->name; ?>">
<a style="cursor: pointer;" onclick="window.parent.jSelectArticle('<?php echo $row->Sslug; ?>', '<?php echo str_replace(array("'", "\""), array("\\'", ""),$row->name); ?>', '<?php echo JRequest::getVar('object'); ?>');">
							<?php echo htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?></a>
</span>
				<?php
			//}
			?>
                       <td width="15%" align="center">
				<?php echo $row->name_country;?>
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

	<input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="table" value="<?php echo $TableName; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="property" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>
<?php

break;	



case 'locality' :	

$ordering = ($this->lists['order'] == 't.ordering');	
?>

<form action="index.php?option=com_properties&amp;view=element&amp;&amp;task=element&amp;tmpl=component&amp;object=sid" method="post" name="adminForm">
<table>
	<tr>
		<td align="left" width="100%">
			<?php echo JText::_( 'Filter' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $this->lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
			<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
		</td>
        
        <td nowrap="nowrap">
            <?php echo Filter::FilterCountry( $this->items[0],'country','state' ); ?>
            </td>
         <td nowrap="nowrap">
            <?php echo Filter::FilterSid( $this->items[0],'state','locality' ); ?>
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
			<th  width="5%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
			<th  class="title">
				<?php echo JHTML::_('grid.sort',   'Locality Name', 'name', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'State Name', 'parent', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>	
             <th width="10%" align="center">
				<?php echo JHTML::_('grid.sort',   'Country Name', 'cyid', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="5%" align="center">
				<?php echo JHTML::_('grid.sort',   'Published', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>	
            <th width="100px" nowrap="nowrap" >
						<?php echo JHTML::_('grid.sort',   'Order by', 'ordering', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
						<?php echo JHTML::_('grid.order',  $this->items ); ?>
			</th>
					
			<th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'ID', 'id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
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
$link 		= JRoute::_( 'index.php?option=com_properties&controller=property&table='.$TableName.'&task=edit&cid[]='. $row->id);		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		$published 	= JHTML::_('grid.published', $row, $i );		
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td width="5%">
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td width="5%">
				<?php echo $checked; ?>
			</td>
			<td>
			<?php //if (  JTable::isCheckedOut($this->user->get ('id'), $row->checked_out )  ) {
				//echo $row->title;
			//} else {
				?>
                <?php //echo $row->treename; ?>
<span class="editlinktip hasTip" title="<?php echo JText::_( 'Select State' );?>::<?php echo $row->name; ?>">
<a style="cursor: pointer;" onclick="window.parent.jSelectArticle('<?php echo $row->Lslug; ?>', '<?php echo str_replace(array("'", "\""), array("\\'", ""),$row->name); ?>', '<?php echo JRequest::getVar('object'); ?>');">
							<?php echo htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?></a>
</span>
				<?php
			//}
			?>
          <td align="center">
				<?php echo $row->name_state; ?>
			</td>	
            <td align="center">
				<?php echo $row->name_country; ?>
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

	<input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="table" value="<?php echo $TableName; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="property" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>	
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>
<?php

break;	



}	


}	
	
	
	
}
?>