<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class SendViewSend extends JView
{
	function display($tpl = null)
	{
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function sendconfirm(){
		$mailid = acymailing::getCID('mailid');
		$mailClass = acymailing::get('class.mail');
		$listmailClass = acymailing::get('class.listmail');
		$queueClass = acymailing::get('class.queue');
		$mail = $mailClass->get($mailid);
		$values = null;
		$values->nbqueue = $queueClass->nbQueue($mailid);
		if(empty($values->nbqueue)){
			$lists = $listmailClass->getReceivers($mailid);
			$this->assignRef('lists',$lists);
		}
		$this->assignRef('values',$values);
		$this->assignRef('mail',$mail);
	}
	function scheduleconfirm(){
		$mailid = acymailing::getCID('mailid');
		$listmailClass = acymailing::get('class.listmail');
		$mailClass = acymailing::get('class.mail');
		$this->assignRef('lists',$listmailClass->getReceivers($mailid));
		$this->assignRef('mail',$mailClass->get($mailid));
	}
}
