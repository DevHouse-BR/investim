<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<table class="admintable" cellspacing="1">
	<tr>
		<td class="key" >
			<?php echo JText::_('UPLOAD_FILE'); ?>
		</td>
		<td>
			<input type="file" size="50" name="importfile" />
			<?php echo JText::sprintf('MAX_UPLOAD',(acymailing::bytes(ini_get('upload_max_filesize')) > acymailing::bytes(ini_get('post_max_size'))) ? ini_get('post_max_size') : ini_get('upload_max_filesize')); ?>
		</td>
	</tr>
	<tr>
		<td class="key" >
			<?php echo JText::_('CHARSET_FILE'); ?>
		</td>
		<td>
			<?php $charsetType = acymailing::get('type.charset'); array_unshift($charsetType->values,JHTML::_('select.option', JText::_('UNKNOWN'),'')); echo $charsetType->display('charsetconvert',''); ?>
		</td>
	</tr>
</table>
