<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class userViewuser extends JView
{
	function display($tpl = null)
	{
		$function = $this->getLayout();
		if(method_exists($this,$function)) $this->$function();
		parent::display($tpl);
	}
	function modify(){
		$app =& JFactory::getApplication();
		$pathway	=& $app->getPathway();
		$document	=& JFactory::getDocument();
		$listsClass = acymailing::get('class.list');
		$subscriberClass = acymailing::get('class.subscriber');
		$subscriber = $subscriberClass->identify(true);
		if(empty($subscriber)){
			$subscription = $listsClass->getLists();
			$subscriber = null;
			$subscriber->html = 1;
			$subscriber->subid = 0;
			$subscriber->key = 0;
			if(!empty($subscription)){
				foreach($subscription as $id => $onesub){
					$subscription[$id]->status = 1;
				}
			}
			$pathway->addItem(JText::_('SUBSCRIPTION'));
			$document->setTitle( JText::_('SUBSCRIPTION'));
		}else{
			$subscription = $subscriberClass->getSubscription($subscriber->subid);
			$pathway->addItem(JText::_('MODIFY_SUBSCRIPTION'));
			$document->setTitle( JText::_('MODIFY_SUBSCRIPTION'));
		}
		acymailing::initJSStrings();
		$displayLists = false;
		for($i = 0,$a = count($subscription);$i<$a;$i++){
			if(!empty( $subscription[$i]->published) AND $subscription[$i]->visible){
				$displayLists = true;
				break;
			}
		}
		$this->assignRef('status',acymailing::get('type.festatus'));
		$this->assignRef('subscription',$subscription);
		$this->assignRef('subscriber',$subscriber);
		$this->assignRef('displayLists',$displayLists);
	}
	function unsub(){
		$subscriberClass = acymailing::get('class.subscriber');
		$subscriber = $subscriberClass->identify();
		$this->assignRef('subscriber',$subscriber);
		$mailid = JRequest::getInt('mailid');
		$this->assignRef('mailid',$mailid);
		$app =& JFactory::getApplication();
		$pathway	=& $app->getPathway();
		$pathway->addItem(JText::_('UNSUBSCRIBE'));
		$document	=& JFactory::getDocument();
		$document->setTitle( JText::_('UNSUBSCRIBE'));
	}
}
