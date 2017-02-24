<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class ConfigController extends JController{
	function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerDefaultTask('display');
	}
	function save(){
		$this->store();
		return $this->cancel();
	}
	function apply(){
		$this->store();
		return $this->display();
	}
	function store(){
		$app =& JFactory::getApplication();
		JRequest::checkToken() or die( 'Invalid Token' );
		$formData = JRequest::getVar( 'config', array(), '', 'array' );
		$config =& acymailing::config();
		$status = $config->save($formData);
		if($status){
			$app->enqueueMessage(JText::_( 'JOOMEXT_SUCC_SAVED' ), 'message');
		}else{
			$app->enqueueMessage(JText::_( 'ERROR_SAVING' ), 'error');
		}
		$config->load();
	}
	function test(){
		$app =& JFactory::getApplication();
		$this->store();
		$config = acymailing::config();
		$user	=& JFactory::getUser();
		$mailClass = acymailing::get('helper.mailer');
		$addedName = $config->get('add_names',true) ? $mailClass->cleanText($user->name) : '';
		$mailClass->AddAddress($user->email,$addedName);
		$mailClass->Subject = 'Test e-mail from '.ACYMAILING_LIVE;
		$mailClass->Body = JText::_('TEST_EMAIL');
		$mailClass->SMTPDebug = 1;
		$result = $mailClass->send();
		if(!$result){
			$bounce = $config->get('bounce_email');
			if(!empty($bounce)){
				$app->enqueueMessage(JText::sprintf('ADVICE_BOUNCE',$bounce),'notice');
			}elseif($config->get('mailer_method') == 'smtp' AND !$config->get('smtp_auth') AND strlen($config->get('smtp_password')) > 1){
				$app->enqueueMessage(JText::_('ADVICE_SMTP_AUTH'),'notice');
			}elseif((strpos(ACYMAILING_LIVE,'localhost') OR strpos(ACYMAILING_LIVE,'127.0.0.1')) AND $config->get('mailer_method') != 'smtp'){
				$app->enqueueMessage(JText::_('ADVICE_LOCALHOST'),'notice');
			}
		}
		return $this->display();
	}
	function bounce(){
		$app =& JFactory::getApplication();
		$this->store();
		$config = acymailing::config();
		$bounceClass = acymailing::get('helper.bounce');
		$bounceClass->report = true;
		if($bounceClass->init()){
			if($bounceClass->connect()){
				$nbMessages = $bounceClass->getNBMessages();
				$app->enqueueMessage(JText::sprintf('BOUNCE_CONNECT_SUCC',$config->get('bounce_username')));
				$app->enqueueMessage(JText::sprintf('NB_MAIL_MAILBOX',$nbMessages));
				$bounceClass->close();
			}else{
				acymailing::display($bounceClass->getErrors(),'error');
			}
		}
		return $this->display();
	}
	function seereport(){
		$config = acymailing::config();
		$reportPath = JPath::clean(ACYMAILING_ROOT.trim(html_entity_decode($config->get('cron_savepath'))));
		$logFile = file_get_contents($reportPath);
		if(empty($logFile)){
			acymailing::display(JText::_('EMPTY_LOG'),'info');
		}else{
			echo nl2br($logFile);
		}
	}
	function cleanreport(){
		jimport('joomla.filesystem.file');
		$config = acymailing::config();
		$reportPath = JPath::clean(ACYMAILING_ROOT.trim(html_entity_decode($config->get('cron_savepath'))));
		if(is_file($reportPath)){
			$result = JFile::delete($reportPath);
			if($result){
				acymailing::display(JText::_('SUCC_DELETE_LOG'),'success');
			}else{
				acymailing::display(JText::_('ERROR_DELETE_LOG'),'error');
			}
		}else{
			acymailing::display(JText::_('EXIST_LOG'),'info');
		}
	}
	function cancel(){
		$this->setRedirect( acymailing::completeLink('dashboard',false,true) );
	}
}