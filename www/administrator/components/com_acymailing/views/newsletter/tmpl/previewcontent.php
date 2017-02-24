<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php if($this->mail->html){?>
<fieldset class="adminform" width="100%" id="htmlfieldset">
	<legend><?php echo JText::_( 'HTML_VERSION' ); ?></legend>
	<div class="newsletter_body" ><?php echo $this->mail->body; ?></div>
</fieldset>
<?php } ?>
<fieldset class="adminform" >
	<legend><?php echo JText::_( 'TEXT_VERSION' ); ?></legend>
	<textarea style="width:100%" rows="20" readonly><?php echo $this->mail->altbody; ?></textarea>
</fieldset>
<div class="clr"></div>