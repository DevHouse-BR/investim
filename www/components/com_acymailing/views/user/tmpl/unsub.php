<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<form action="<?php echo acymailing::completeLink('user'); ?>" method="post" name="adminForm">
	<table class="acymailing_unsub_table">
	<?php if(!empty($this->mailid)){ ?>
		<tr>
			<td valign="top">
				<?php echo JText::_('UNSUB_CURRENT'); ?>
			</td>
			<td valign="top" align="center" >
				<?php echo JHTML::_('select.booleanlist', "unsublist",'',1,JText::_('JOOMEXT_YES'),JText::_('JOOMEXT_NO')); ?>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<td valign="top">
				<?php echo JText::_('UNSUB_ALL'); ?>
			</td>
			<td valign="top" align="center" >
				<?php echo JHTML::_('select.booleanlist', "unsuball",'','',JText::_('JOOMEXT_YES'),JText::_('JOOMEXT_NO')); ?>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<?php echo JText::_('UNSUB_FULL'); ?>
			</td>
			<td valign="top" align="center" >
				<?php echo JHTML::_('select.booleanlist', "refuse",'','',JText::_('JOOMEXT_YES'),JText::_('JOOMEXT_NO')); ?>
			</td>
		</tr>
	</table>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="saveunsub" />
	<input type="hidden" name="ctrl" value="user" />
	<input type="hidden" name="subid" value="<?php echo $this->subscriber->subid; ?>" />
	<input type="hidden" name="key" value="<?php echo $this->subscriber->key; ?>" />
	<input type="hidden" name="mailid" value="<?php echo $this->mailid; ?>" />
	<input class="button" type="submit" value="<?php echo JText::_('UNSUBSCRIBE',true)?>"/>
</form>