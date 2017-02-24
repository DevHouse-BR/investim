<?php
defined('_JEXEC') or die('Restricted access');

if(JRequest::getVar('task')=='search'){$linkTask='&amp;task=search';}else{$linkTask='';}
$LinkPage = 'index.php?option=com_properties'.$linkTask;?>

<?php
if(JRequest::getVar('cyid')){$cyid = JRequest::getVar('cyid');}
if(JRequest::getVar('sid')){$sid = JRequest::getVar('sid');}
if(JRequest::getVar('lid')){$lid = JRequest::getVar('lid');}
if(JRequest::getVar('cid')){$cid = JRequest::getVar('cid');}
if(JRequest::getVar('tid')){$tid = JRequest::getVar('tid');}
if(JRequest::getVar('aid')){$aid = JRequest::getVar('aid');}

if(JRequest::getVar('id_minprice')){ $id_minprice = JRequest::getVar('id_minprice');}
if(JRequest::getVar('id_maxprice')){ $id_maxprice = JRequest::getVar('id_maxprice');}
if(JRequest::getVar('id_bedrooms')){ $id_bedrooms = JRequest::getVar('id_bedrooms');}
if(JRequest::getVar('id_bathrooms')){ $id_minprice = JRequest::getVar('id_bathrooms');}
if(JRequest::getVar('id_garage')){ $id_minprice = JRequest::getVar('id_garage');}

$task = JRequest::getVar('task');
if(JRequest::getVar('limitstart')){$limitstart = JRequest::getVar('limitstart');}


global $mainframe, $option;
$OrderBy		= $mainframe->getUserStateFromRequest( "$option.filter_order",		'filter_order',	$ShowOrderByDefault ,	'cmd' );
$order	= $mainframe->getUserStateFromRequest( "$option.filter_order_Dir",	'filter_order_Dir',	$ShowOrderDefault,		'word' );
//echo $OrderBy.' : '.$order;
?>
<input type="hidden" name="cyid" id="cyid" value="<?php echo $cyid;?>" />
<input type="hidden" name="sid" id="sid" value="<?php echo $sid;?>" />
<input type="hidden" name="lid" id="lid" value="<?php echo $lid;?>" />
<input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>" />
<input type="hidden" name="tid" id="tid" value="<?php echo $tid;?>" />
<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>" />

<input type="hidden" name="id_minprice" id="id_minprice" value="<?php echo $id_minprice;?>" />
<input type="hidden" name="id_maxprice" id="id_maxprice" value="<?php echo $id_maxprice;?>" />
<input type="hidden" name="id_bedrooms" id="id_bedrooms" value="<?php echo $id_bedrooms;?>" />
<input type="hidden" name="id_bathrooms" id="id_bathrooms" value="<?php echo $id_bathrooms;?>" />
<input type="hidden" name="id_garage" id="id_garage" value="<?php echo $id_garage;?>" />
<?php
if(JRequest::getVar('from'))
{
echo '<input type="hidden" name="from" id="from" value="'.JRequest::getVar('from').'" />';
}
?>
<?php
if(JRequest::getVar('to'))
{
echo '<input type="hidden" name="to" id="to" value="'.JRequest::getVar('to').'" />';
}
?>
<input type="hidden" name="task" id="task" value="<?php echo $task;?>" />
<input type="hidden" name="limitstart" id="limitstart" value="<?php echo $limitstart;?>" />
<input type="hidden" name="filter_order" id="filter_order" value="<?php echo $OrderBy;?>" />
<input name="filter_order_Dir" id="filter_order_Dir" value="<?php echo $order;?>" type="hidden">

<?php
if($order == 'ASC'){ $ordenar = 'DESC';}else{$ordenar = 'ASC';} ;

?>
<a href="#" onclick="javascript:document.adminForm.filter_order_Dir.value='<?php echo $ordenar;?>'; document.adminForm.submit();return false;" title="Click to sort by this column."><img src="<?php echo JURI::base();?>images/sort_<?php echo strtolower($ordenar);?>.png" alt=""></a>
<?php 
$state		= &$this->get('state');
/*
echo '<pre>';
print_r($state);
echo '</pre>';
*/


echo JText::_('Order by').' '; 

global $mainframe;
		
		$limits = array ();
		
		$limits[] = JHTML::_('select.option', '1',JText::_('Date'));
		$limits[] = JHTML::_('select.option', '2',JText::_('Price'));
		$limits[] = JHTML::_('select.option', '3',JText::_('Category'));
		$limits[] = JHTML::_('select.option', '4',JText::_('Type'));
		

		$selected = $this->_viewall ? 0 : $this->limit;

		// Build the select list
$javascript='onchange="tableOrdering( this.value,\''.$order.'\',  \'\' );"';
			$html = JHTML::_('select.genericlist',  $limits, 'filter_order',$javascript.' class="inputbox" size="1" ', 'value', 'text', $OrderBy);

		echo $html;

 ?>       



