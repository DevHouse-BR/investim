<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class ListController extends acymailingController{
	var $pkey = 'listid';
	var $table = 'list';
	var $groupMap = 'type';
	var $groupVal = 'list';
	function store(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$app =& JFactory::getApplication();
		$listClass = acymailing::get('class.list');
		$status = $listClass->saveForm();
		if($status){
			$app->enqueueMessage(JText::_( 'JOOMEXT_SUCC_SAVED' ), 'message');
		}else{
			$app->enqueueMessage(JText::_( 'ERROR_SAVING' ), 'error');
			if(!empty($listClass->errors)){
				foreach($listClass->errors as $oneError){
					$app->enqueueMessage($oneError, 'error');
				}
			}
		}
	}
	function remove(){
		$app =& JFactory::getApplication();
		JRequest::checkToken() or die( 'Invalid Token' );
		$listIds = JRequest::getVar( 'cid', array(), '', 'array' );
		$subscriberObject = acymailing::get('class.list');
		$num = $subscriberObject->delete($listIds);
		$app->enqueueMessage(JText::sprintf('SUCC_DELETE_ELEMENTS',$num), 'message');
		JRequest::setVar( 'layout', 'listing'  );
		return parent::display();
	}
	function addusers(){
		JRequest::setVar( 'layout', 'addusers'  );
		return parent::display();
	}
	function massadd(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$importHelper = acymailing::get('helper.import');
		if(!$importHelper->mass(true)){
			return $this->addusers();
		}
		$this->setRedirect(acymailing::completeLink('list',false,true));
	}
	function massremove(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$importHelper = acymailing::get('helper.import');
		if(!$importHelper->mass(false)){
			return $this->addusers();
		}
		$this->setRedirect(acymailing::completeLink('list',false,true));
	}
}