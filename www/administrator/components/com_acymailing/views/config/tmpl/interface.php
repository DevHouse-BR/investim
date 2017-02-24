<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="config_interface">
	<fieldset class="adminform">
	<legend><?php echo JText::_( 'MESSAGES' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('DISPLAY_MSG_SUBSCRIPTION_DESC'), JText::_('DISPLAY_MSG_SUBSCRIPTION'), '', JText::_('DISPLAY_MSG_SUBSCRIPTION')); ?>
				</td>
				<td>
					<?php echo $this->elements->subscription_message; ?>
				</td>
			</tr>
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('DISPLAY_MSG_CONFIRM_DESC'), JText::_('DISPLAY_MSG_CONFIRM'), '', JText::_('DISPLAY_MSG_CONFIRM')); ?>
				</td>
				<td>
					<?php echo $this->elements->confirmation_message; ?>
				</td>
			</tr>
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('DISPLAY_MSG_WELCOME_DESC'), JText::_('DISPLAY_MSG_WELCOME'), '', JText::_('DISPLAY_MSG_WELCOME')); ?>
				</td>
				<td>
					<?php echo $this->elements->welcome_message; ?>
				</td>
			</tr>
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('DISPLAY_MSG_UNSUB_DESC'), JText::_('DISPLAY_MSG_UNSUB'), '', JText::_('DISPLAY_MSG_UNSUB')); ?>
				</td>
				<td>
					<?php echo $this->elements->unsub_message; ?>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo 'CSS' ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('CSS_MODULE_DESC'), JText::_('CSS_MODULE'), '', JText::_('CSS_MODULE')); ?>
				</td>
				<td>
					<?php echo $this->elements->css_module;?>
				</td>
			</tr>
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('CSS_FRONTEND_DESC'), JText::_('CSS_FRONTEND'), '', JText::_('CSS_FRONTEND')); ?>
				</td>
				<td>
					<?php echo $this->elements->css_frontend;?>
				</td>
			</tr>
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('CSS_BACKEND_DESC'), JText::_('CSS_BACKEND'), '', JText::_('CSS_BACKEND')); ?>
				</td>
				<td>
					<?php echo $this->elements->css_backend;?>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'FEATURES' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('FORWARD_DESC'), JText::_('FORWARD_FEATURE'), '', JText::_('FORWARD_FEATURE')); ?>
				</td>
				<td>
					<?php echo $this->elements->forward;?>
				</td>
			</tr>
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('USE_SEF_DESC'), JText::_('USE_SEF'), '', JText::_('USE_SEF')); ?>
				</td>
				<td>
					<?php echo $this->elements->use_sef;?>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'MENU' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('ACYMAILING_MENU_DESC'), JText::_('ACYMAILING_MENU'), '', JText::_('ACYMAILING_MENU')); ?>
				</td>
				<td>
					<?php echo $this->elements->acymailing_menu; ?>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'EDITOR' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('EDITOR_DESC'), JText::_('EDITOR'), '', JText::_('EDITOR')); ?>
				</td>
				<td>
					<?php echo $this->elements->editor;?>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'FOOTER' ); ?></legend>
		<table class="admintable" cellspacing="1">
			<tr>
				<td class="key" >
				<?php echo acymailing::tooltip(JText::_('SHOW_FOOTER_DESC'), JText::_('SHOW_FOOTER'), '', JText::_('SHOW_FOOTER')); ?>
				</td>
				<td>
					<?php echo $this->elements->show_footer; ?>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'FE_INTERFACE' ); ?></legend>
		<table class="admintable" cellspacing="1">
		<tr>
			<td class="key" >
			<?php echo acymailing::tooltip(JText::_('FRONTEND_PDF_DESC'), JText::_('FRONTEND_PDF'), '', JText::_('FRONTEND_PDF')); ?>
			</td>
			<td>
				<?php echo JHTML::_('select.booleanlist', "config[frontend_pdf]" , '',$this->config->get('frontend_pdf',0) ); ?>
			</td>
		</tr>
		<tr>
			<td class="key" >
			<?php echo acymailing::tooltip(JText::_('FRONTEND_PRINT_DESC'), JText::_('FRONTEND_PRINT'), '', JText::_('FRONTEND_PRINT')); ?>
			</td>
			<td>
				<?php echo JHTML::_('select.booleanlist', "config[frontend_print]" , '',$this->config->get('frontend_print',0) ); ?>
			</td>
		</tr>
		<tr>
			<td class="key" >
			<?php echo acymailing::tooltip(JText::_('SHOW_DESCRIPTION_DESC'), JText::_('SHOW_DESCRIPTION'), '', JText::_('SHOW_DESCRIPTION')); ?>
			</td>
			<td>
				<?php echo JHTML::_('select.booleanlist', "config[show_description]" , '',$this->config->get('show_description',1) ); ?>
			</td>
		</tr>
		<tr>
			<td class="key" >
			<?php echo acymailing::tooltip(JText::_('SHOW_HEADINGS_DESC'), JText::_('SHOW_HEADINGS'), '', JText::_('SHOW_HEADINGS')); ?>
			</td>
			<td>
				<?php echo JHTML::_('select.booleanlist', "config[show_headings]" , '',$this->config->get('show_headings',1) ); ?>
			</td>
		</tr>
		<tr>
			<td class="key" >
			<?php echo acymailing::tooltip(JText::_('SHOW_SENDDATE_DESC'), JText::_('SHOW_SENDDATE'), '', JText::_('SHOW_SENDDATE')); ?>
			</td>
			<td>
				<?php echo JHTML::_('select.booleanlist', "config[show_senddate]" , '',$this->config->get('show_senddate',1) ); ?>
			</td>
		</tr>
		<tr>
			<td class="key" >
			<?php echo acymailing::tooltip(JText::_('SHOW_FILTER_DESC'), JText::_('SHOW_FILTER'), '', JText::_('SHOW_FILTER')); ?>
			</td>
			<td>
				<?php echo JHTML::_('select.booleanlist', "config[show_filter]" , '',$this->config->get('show_filter',1) ); ?>
			</td>
		</tr>
			<?php if(acymailing::level(3)) include(dirname(__FILE__).DS.'interface_enterprise.php'); ?>
		</table>
</div>