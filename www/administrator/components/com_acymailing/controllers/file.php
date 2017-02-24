<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class FileController extends JController{
	function language(){
		JRequest::setVar( 'layout', 'language'  );
		return parent::display();
	}
	function save(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$this->_savelanguage();
		return $this->language();
	}
	function latest(){
		return $this->language();
	}
	function send(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$bodyEmail = JRequest::getString('mailbody');
		$code = JRequest::getString('code');
		JRequest::setVar('code',$code);
		if(empty($code)) return;
		$config = acymailing::config();
		$mailer = acymailing::get('helper.mailer');
		$mailer->Subject = '[ACYMAILING LANGUAGE FILE] '.$code;
		$mailer->Body = 'The website '.ACYMAILING_LIVE.' using AcyMailing '.$config->get('level').$config->get('version').' sent a language file : '.$code;
		$mailer->Body .= "\n"."\n"."\n".$bodyEmail;
		$user = JFactory::getUser();
		$mailer->AddAddress($user->email,$user->name);
		$mailer->AddAddress('translate@acyba.com','Acyba Translation Team');
		$mailer->report = false;
		jimport('joomla.filesystem.file');
		$path = JPath::clean(JLanguage::getLanguagePath(JPATH_ROOT).DS.$code.DS.$code.'.com_acymailing.ini');
		$mailer->AddAttachment($path);
		$result = $mailer->Send();
		if($result){
			acymailing::display(JText::_('THANK_YOU_SHARING'),'success');
			acymailing::display($mailer->reportMessage,'success');
		}else{
			acymailing::display($mailer->reportMessage,'error');
		}
	}
	function share(){
		JRequest::checkToken() or die( 'Invalid Token' );
		if($this->_savelanguage()){
			JRequest::setVar( 'layout', 'share' );
			return parent::display();
		}else{
			return $this->language();
		}
	}
	function _savelanguage(){
		jimport('joomla.filesystem.file');
		$code = JRequest::getString('code');
		JRequest::setVar('code',$code);
		$content = JRequest::getVar('content','','','string',JREQUEST_ALLOWRAW);
		if(empty($code) OR empty($content)) return;
		$path = JLanguage::getLanguagePath(JPATH_ROOT).DS.$code.DS.$code.'.com_acymailing.ini';
		$result = JFile::write($path, $content);
		if($result){
			acymailing::display(JText::_('JOOMEXT_SUCC_SAVED'),'success');
			$js = "window.top.document.getElementById('image$code').src = '".ACYMAILING_LIVE."images/M_images/edit.png'";
			$doc =& JFactory::getDocument();
			$doc->addScriptDeclaration( $js );
		}else{
			acymailing::display(JText::sprintf('FAIL_SAVE',$path),'error');
		}
		return $result;
	}
}