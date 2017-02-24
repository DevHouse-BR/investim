<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<form action="index.php?tmpl=component&amp;option=<?php echo ACYMAILING_COMPONENT ?>" method="post" name="adminForm" autocomplete="off">
	<fieldset>
		<div class="header" style="float: left;"><?php echo JText::_('FILE').' : '.$this->file->name; ?></div>
		<div class="toolbar" id="toolbar" style="float: right;">
			<button type="button" onclick="javascript:submitbutton('save')"><?php echo JText::_('SAVE'); ?></button>
			<button type="button" onclick="javascript:submitbutton('share')"><?php echo JText::_('SHARE'); ?></button>
		</div>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'FILE').' : '.$this->file->name; ?>
		<?php if(!empty($this->showLatest)){ ?><button style="text-align:right" type="button" onclick="javascript:submitbutton('latest')"><?php echo JText::_('LOAD_LATEST_LANGUAGE'); ?></button><?php } ?>
		</legend>
		<textarea style="width:100%;" rows="18" name="content" id="translation" ><?php echo @$this->file->content;?></textarea>
	</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="code" value="<?php echo $this->file->name; ?>" />
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="ctrl" value="file" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
