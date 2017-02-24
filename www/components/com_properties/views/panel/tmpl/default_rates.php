<?php defined('_JEXEC') or die('Restricted access'); 
$option = JRequest::getVar('option');
$view = JRequest::getVar('view');
JHTML::_('behavior.tooltip');

	$ordering = 1;	

$product_id = JRequest::getVar('product_id',0,'','int');
?>
<script type="text/javascript">

function publishAjax(a,b){
/*confirm('¿Está seguro?'+idM);*/
var progressPA = $('progressPA');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=rates&format=raw&task=publishAjax",
{method: 'get',
onRequest: function(){progressPA.setStyle('visibility', 'visible');},
onComplete: function(){progressPA.setStyle('visibility', 'hidden');},
update: $('publishAjax'+a),
data: '&productid='+a+'&change='+b}).request();
			}

function deleteAjax(a){
/*confirm('¿Está seguro?'+a);*/
var progressDA = $('progressDA');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=rates&format=raw&task=removeAjax",
{method: 'get',
onRequest: function(){progressDA.setStyle('visibility', 'visible');},
onComplete: function(){progressDA.setStyle('visibility', 'hidden');},
update: $('div_addrates'),
data: '&rateid='+a}).request();
			}
</script>
<?php

?>
<form action="index.php" method="post" name="adminForm">



<div class="botones">
<div class="mytoolbar" style="width:100%; float:left;">



<?php $linkAR = JRoute::_( 'index.php?option='.$option.'&view=panel&task=addrates&product_id='. $product_id);?> 


<?php
$linkR = JRoute::_( 'index.php?option=com_properties&view=panel&task=edit&id='.$product_id.'&Itemid='.$Itemid);
?>

<div id="progressSave" style="float: left; width:200px;"></div>

<div style="float: right;">	

<button type="button" class="mybutton icon-32-back" onclick="location.href='<?php echo $linkR; ?>';"><span><?php echo JText::_('Return Property'); ?></span></button>	

 <button type="button" class="mybutton icon-32-new" onclick="location.href='<?php echo $linkAR; ?>';"><span><?php echo JText::_('New'); ?></span></button> 
  	
			<button type="button" class="mybutton icon-32-delete" onclick="submitbutton('remove')"><span><?php echo JText::_('Delete'); ?></span></button>  
            
                   
</div>

</div>

</div>	
<div style="clear:both"></div>


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
				<?php echo JText::_( 'Property'); ?>
			</th>
			<th  class="title">
				<?php echo JText::_( 'Rate Title'); ?>
			</th>
            
            <th  class="title">
				<?php echo JText::_( 'From'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'To'), 'validto'; ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'Rate x day'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'Week Only'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'week'); ?>
			</th>
            <th  class="title">
				<?php echo JText::_( 'Rate x week'); ?>
			</th>
            
            <th width="5%" align="center">
				<?php echo JText::_( 'Published') ?>
			</th>	
           	<th width="100px" nowrap="nowrap">
            <?php echo JText::_( 'Order by')?>
              </th>  				
			
		</tr>
	</thead>
    
    
<tbody>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)
	{
		$row = &$this->items[$i];
$link 		= JRoute::_( 'index.php?option='.$option.'&view='.$view.'&task=addrates&product_id='. $product_id.'&rate_id='. $row->id);	

		
		$checked 	= JHTML::_('grid.id',  $i, $row->id );
		$published 	= JHTML::_('grid.published', $row, $i );
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center">
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td align="center">
				<?php echo $checked; ?>
			</td>
            <td align="center">
				<?php echo $row->productid;?>
			</td>
			<td>

				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Country' );?>::<?php echo $row->name; ?>">
				<a href="<?php echo $link  ?>">
					<?php echo $row->title; ?></a></span>
				<?php
			//}
			?>
			</td>            
            <td align="center">
				<?php echo $row->validfrom;?>
			</td>
            <td align="center">
				<?php echo $row->validto;?>
			</td>
            <td align="center">
				<?php echo $row->rateperday;?>
			</td>
            <td align="center">
				<?php echo $row->weekonly;?>
			</td>
            <td align="center">
				<?php echo $row->week;?>
			</td>
            <td align="center">
				<?php echo $row->rateperweek;?>
			</td>
			<td align="center">
				<?php echo $published;?>
			</td>	
            
            <td class="order" nowrap="nowrap">            
				<span><?php echo $this->pagination->orderUpIcon( $i, true, 'orderup', 'Move Up', $ordering ); ?></span>
					<span><?php echo $this->pagination->orderDownIcon( $i, $n, true, 'orderdown', 'Move Down', $ordering ); ?></span>             
				<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>                
				<?php echo $row->ordering; ?>
			</td>
                		
			<td align="center">
				<?php echo $row->id; ?>
			</td>
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
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
    <input type="hidden" name="table" value="rates" />
     <input type="hidden" name="view" value="<?php echo $view; ?>" />
<input type="hidden" name="task" value="editrates" />
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<input type="hidden" name="controller" value="rates" />
<input type="hidden" name="returnproductid" value="<?php echo $product_id; ?>" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>