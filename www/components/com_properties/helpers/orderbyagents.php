<?php
defined('_JEXEC') or die('Restricted access');

if(JRequest::getVar('task')=='search'){$linkTask='&amp;task=search';}else{$linkTask='';}
$LinkPage = 'index.php?option=com_properties'.$linkTask;?>
<form action="<?php echo JRoute::_($LinkPage);?>" name="OrderForm" id="OrderForm" method="post">
<?php

if(JRequest::getVar('lid')){$lid = JRequest::getVar('lid');}
if(JRequest::getVar('name')){$name = JRequest::getVar('name');}

if(JRequest::getVar('limitstart')){$limitstart = JRequest::getVar('limitstart');}
if(JRequest::getVar('order')){$order = JRequest::getVar('order');}else{$order ='asc';}

?>
<input type="hidden" name="lid" id="lid" value="<?php echo $lid;?>" />
<input type="hidden" name="name" id="name" value="<?php echo $name;?>" />

<input type="hidden" name="limitstart" id="limitstart" value="<?php echo $limitstart;?>" />
<input type="hidden" name="order" id="order" value="<?php echo $order;?>" />
<?php
if($order == 'desc'){ $ordenar = 'asc';}else{$ordenar = 'desc';} ;
?>
<a href="#" onclick="javascript:document.OrderForm.order.value='<?php echo $ordenar;?>'; document.OrderForm.submit();return false;" title="Click to sort by this column."><img src="images/sort_<?php echo $ordenar;?>.png" alt=""></a>
<?php 
$state		= &$this->get('state');

if(JRequest::getVar('ShowOrderBy')){$ShowOrderBy = JRequest::getVar('ShowOrderBy');}
else{$ShowOrderBy='name';}
echo JText::_('Order by').' '; 

global $mainframe;
		
		$limits = array ();
		
		$limits[] = JHTML::_('select.option', '1',JText::_('Name'));
		$limits[] = JHTML::_('select.option', '2',JText::_('Locality'));		

		$selected = $this->_viewall ? 0 : $this->limit;

		// Build the select list

			$html = JHTML::_('select.genericlist',  $limits, 'ShowOrderBy', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', $ShowOrderBy);

		echo $html;

 ?>       

</form>

