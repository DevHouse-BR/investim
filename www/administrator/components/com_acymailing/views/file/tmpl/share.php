<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<form action="index.php?tmpl=component&amp;option=<?php echo ACYMAILING_COMPONENT ?>" method="post" name="adminForm" autocomplete="off">
	<fieldset>
		<div class="header" style="float: left;"><?php echo JText::_('SHARE').' : '.$this->file->name; ?></div>
		<div class="toolbar" id="toolbar" style="float: right;">
			<button type="button" onclick="javascript:submitbutton('send')"><?php echo JText::_('SHARE'); ?></button>
		</div>
	</fieldset>
	<fieldset class="adminform">
		<?php acymailing::display(JText::_('SHARE_CONFIRMATION_1').'<br/>'.JText::_('SHARE_CONFIRMATION_2').'<br/>'.JText::_('SHARE_CONFIRMATION_3'),'info'); ?><br/>
		<textarea cols="100" rows="8" name="mailbody"></textarea>
	</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="code" value="<?php echo $this->file->name; ?>" />
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="ctrl" value="file" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
