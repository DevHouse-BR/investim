<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class mailermethodType{
	function mailermethodType(){
		$this->values = array();
		$this->values[] = JHTML::_('select.option', 'phpmail', 'PHP Mail Function' );
		$this->values[] = JHTML::_('select.option', 'sendmail', 'SendMail' );
		$this->values[] = JHTML::_('select.option', 'qmail', 'QMail');
		$this->values[] = JHTML::_('select.option', 'smtp', 'SMTP Server' );
		$js = "function updateMailer(){";
			$js .= "mailermethod = window.document.getElementById('mailer_method').value;";
			$js .= "if(mailermethod == 'phpmail') {window.document.getElementById('smtp_config').style.display = 'none'; window.document.getElementById('sendmail_config').style.display = 'none';}";
			$js .= "if(mailermethod == 'smtp') {window.document.getElementById('smtp_config').style.display = 'block'; window.document.getElementById('sendmail_config').style.display = 'none';}";
			$js .= "if(mailermethod == 'qmail') {window.document.getElementById('smtp_config').style.display = 'none'; window.document.getElementById('sendmail_config').style.display = 'none';}";
			$js .= "if(mailermethod == 'sendmail') {window.document.getElementById('smtp_config').style.display = 'none'; window.document.getElementById('sendmail_config').style.display = 'block';}";
		$js .= '}';
		$js .='window.addEvent(\'domready\', function(){ updateMailer(); });';
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js );
	}
	function display($map,$value){
		return JHTML::_('select.genericlist', $this->values, $map , 'size="1" onchange="updateMailer()"', 'value', 'text', $value,'mailer_method');
	}
}