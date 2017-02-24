<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<tr>
	<td class="key" >
	<?php echo acymailing::tooltip(JText::_('DEFAULT_SENDER_DESC'), JText::_('DEFAULT_SENDER'), '', JText::_('DEFAULT_SENDER')); ?>
	</td>
	<td>
		<?php echo JHTML::_('select.booleanlist', "config[frontend_sender]" , '',$this->config->get('frontend_sender',0) ); ?>
	</td>
</tr>
<tr>
	<td class="key" >
	<?php echo acymailing::tooltip(JText::_('DEFAULT_REPLY_DESC'), JText::_('DEFAULT_REPLY'), '', JText::_('DEFAULT_REPLY')); ?>
	</td>
	<td>
		<?php echo JHTML::_('select.booleanlist', "config[frontend_reply]" , '',$this->config->get('frontend_reply',0) ); ?>
	</td>
</tr>