<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class listHelper{
	function subscribe($subid,$listids){
		$app =& JFactory::getApplication();
		if(acymailing::level(3)){
			$campaignClass = acymailing::get('helper.campaign');
			$campaignClass->start($subid,$listids);
		}
		if(!$app->isAdmin()){
			$db =& JFactory::getDBO();
			$db->setQuery('SELECT DISTINCT `welmailid` FROM '.acymailing::table('list').' WHERE `listid` IN ('.implode(',',$listids).')  AND `published` = 1 AND `welmailid` > 0');
			$messages = $db->loadResultArray();
			if(!empty($messages)){
				$config = acymailing::config();
				$mailHelper = acymailing::get('helper.mailer');
				$mailHelper->report = $config->get('welcome_message',true);
				foreach($messages as $mailid){
					$mailHelper->sendOne($mailid,$subid);
				}
			}
		}//end only frontend
	}//endfct
	function unsubscribe($subid,$listids){
		$app =& JFactory::getApplication();
		if(acymailing::level(3)){
			$campaignClass = acymailing::get('helper.campaign');
			$campaignClass->stop($subid,$listids);
		}
		$db =& JFactory::getDBO();
		if(!$app->isAdmin()){
			$db->setQuery('SELECT DISTINCT `unsubmailid` FROM '.acymailing::table('list').' WHERE `listid` IN ('.implode(',',$listids).') AND `published` = 1  AND `unsubmailid` > 0');
			$messages = $db->loadResultArray();
			if(!empty($messages)){
				$config = acymailing::config();
				$mailHelper = acymailing::get('helper.mailer');
				$mailHelper->report = $config->get('unsub_message',true);
				$mailHelper->checkAccept = false;
				foreach($messages as $mailid){
					$mailHelper->sendOne($mailid,$subid);
				}
			}
		}//end only frontend
		$db->setQuery('DELETE  FROM '.acymailing::table('queue').' WHERE `subid` = '.(int) $subid.' AND `mailid` IN (SELECT `mailid` FROM '.acymailing::table('listmail').' WHERE `listid` IN ('.implode(',',$listids).'))');
		$db->query();
	}
}//endclass