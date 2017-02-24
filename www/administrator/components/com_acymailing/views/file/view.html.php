<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class FileViewFile extends JView
{
	function display($tpl = null)
	{
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function language(){
		$this->setLayout('default');
		$code = JRequest::getString('code');
		if(empty($code)){
			acymailing::display('Code not specified','error');
			return;
		}
		$file = null;
		$file->name = $code;
		$path = JLanguage::getLanguagePath(JPATH_ROOT).DS.$code.DS.$code.'.com_acymailing.ini';
		$file->path = $path;
		jimport('joomla.filesystem.file');
		$showLatest = true;
		$loadLatest = false;
		if(JFile::exists($path)){
			$file->content = JFile::read($path);
			if(empty($file->content)){
				acymailing::display('File not found : '.$path,'error');
			}
		}else{
			$loadLatest = true;
			acymailing::display(JText::_('LOAD_ENGLISH_1').'<br/>'.JText::_('LOAD_ENGLISH_2').'<br/>'.JText::_('LOAD_ENGLISH_3'),'info');
			$file->content = JFile::read(JLanguage::getLanguagePath(JPATH_ROOT).DS.'en-GB'.DS.'en-GB.com_acymailing.ini');
		}
		if($loadLatest OR JRequest::getString('task') == 'latest'){
			$doc =& JFactory::getDocument();
			$doc->addScript(ACYMAILING_UPDATEURL.'languageload&code='.JRequest::getString('code'));
			$showLatest = false;
		}elseif(JRequest::getString('task') == 'save') $showLatest = false;
		$this->assignRef('showLatest',$showLatest);
		$this->assignRef('file',$file);
	}
	function share(){
		$file = null;
		$file->name = JRequest::getString('code');
		$this->assignRef('file',$file);
	}
}
