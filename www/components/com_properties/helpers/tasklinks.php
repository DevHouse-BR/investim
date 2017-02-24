<?php
defined('_JEXEC') or die('Restricted access');

		$db =& JFactory::getDBO();
		$query = "SELECT id FROM #__menu WHERE link = 'index.php?option=com_properties&view=panel'";
		$db->setQuery( $query );
		$itemidPanel = $db->loadResult();
		
		
		$db =& JFactory::getDBO();
		$query = "SELECT id FROM #__menu WHERE link = 'index.php?option=com_properties&view=shortlist'";
		$db->setQuery( $query );
		$itemidshortlist = $db->loadResult();
		
		
		$db =& JFactory::getDBO();
		$query = "SELECT id FROM #__menu WHERE link = 'index.php?option=com_properties&view=properties'";
		$db->setQuery( $query );
		$itemidproperties = $db->loadResult();		
		
		if(!$itemidshortlist){$itemidshortlist='&view=shortlist&Itemid='.$itemidproperties;}else{$itemidshortlist='&Itemid='.$itemidshortlist;}
		
		if(!$itemidPanel){ $itemidPanel='&view=panel&Itemid='.$itemidproperties;}else{$itemidPanel='&Itemid='.$itemidPanel;}
?>
<a href="<?php echo JRoute::_( 'index.php?option=com_properties&Itemid='.$itemidPanel );?>"><?php echo JText::_('My Panel'); ?></a> | 
<?php 
$rutaView = 'index.php?option=com_properties'.$itemidshortlist;
?>
<a href="<?php echo JRoute::_( $rutaView );?>"><?php echo JText::_('View Short List');?></a> | 
<?php 
if(JRequest::getVar('cyid')){$_cyid = '&amp;cyid='.JRequest::getVar('cyid');}
if(JRequest::getVar('sid')){$_sid = '&amp;sid='.JRequest::getVar('sid');}
if(JRequest::getVar('lid')){$_lid = '&amp;lid='.JRequest::getVar('lid');}
if(JRequest::getVar('cid')){$_cid = '&amp;cid='.JRequest::getVar('cid');}
if(JRequest::getVar('tid')){$_tid = '&amp;tid='.JRequest::getVar('tid');}
if(JRequest::getVar('start')){$_start = '&amp;start='.JRequest::getVar('start');}
if(JRequest::getVar('limitstart')){$_limitstart = '&amp;limitstart='.JRequest::getVar('limitstart');}
if(JRequest::getVar('task')){$_list = '&amp;list='.JRequest::getVar('task');}
$ruta= 'index.php?option=com_properties&amp;view=properties&amp;task=print&amp;tmpl=component'.$_cyid.$_sid.$_lid.$_cid.$_tid.$_start.$_limitstart.$_list;
$status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=600,height=600,directories=no,location=no';?>
<span class="editlinktip hasTip" title="<?php echo JText::_('Print'); ?>::">
<a href="javascript:void(0)" onclick="window.open('<?php echo $ruta; ?>','win2','<?php echo $status; ?>');" >
<?php echo JText::_('Print this page'); ?></a></span>
 | 
 <span class="editlinktip hasTip" title="<?php echo JText::_('Feed Entries'); ?>::">
 <a href="<?php echo 'index.php?option=com_properties&amp;format=feed';?>"> <img src="<?php echo JURI::base().'images/M_images/livemarks.png';?>" alt="feed-image"><span><?php echo JText::_('Feed Entries'); ?></span></a></span>