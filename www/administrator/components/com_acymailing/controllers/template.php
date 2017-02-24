<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class TemplateController extends acymailingController{
	var $pkey = 'tempid';
	var $table = 'template';
	function remove(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$app =& JFactory::getApplication();
		$app->isAdmin() or die('Only from the back-end');
		$cids = JRequest::getVar( 'cid', array(), '', 'array' );
		$class = acymailing::get('class.template');
		$num = $class->delete($cids);
		$app->enqueueMessage(JText::sprintf('SUCC_DELETE_ELEMENTS',$num), 'message');
		return $this->listing();
	}
	function copy(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$cids = JRequest::getVar( 'cid', array(), '', 'array' );
		$db =& JFactory::getDBO();
		$time = time();
		$query = 'INSERT IGNORE INTO `#__acymailing_template` (`name`, `description`, `body`, `altbody`, `created`, `published`, `premium`, `ordering`, `namekey`, `styles`, `subject`)';
		$query .= " SELECT CONCAT('copy_',`name`), `description`, `body`, `altbody`, $time, `published`, 0, `ordering`, CONCAT('copy_',`namekey`,'$time'), `styles`, `subject` FROM `#__acymailing_template` WHERE `tempid` IN (".implode(',',$cids).')';
		$db->setQuery($query);
		$db->query();
		return $this->listing();
	}
	function store(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$app =& JFactory::getApplication();
		$app->isAdmin() or die('Only from the back-end');
		$templateClass = acymailing::get('class.template');
		$status = $templateClass->saveForm();
		if($status){
			$app->enqueueMessage(JText::_( 'JOOMEXT_SUCC_SAVED' ), 'message');
		}else{
			$app->enqueueMessage(JText::_( 'ERROR_SAVING' ), 'error');
			if(!empty($mailClass->errors)){
				foreach($mailClass->errors as $oneError){
					$app->enqueueMessage($oneError, 'error');
				}
			}
		}
	}
	function theme(){
		JRequest::setVar( 'layout', 'theme'  );
		return parent::display();
	}
}