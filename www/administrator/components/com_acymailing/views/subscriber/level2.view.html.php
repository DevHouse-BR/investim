<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
		$listsubClass = acymailing::get('class.listsub');
		foreach($rows as $id => $subscriber){
			$rows[$id]->subscription = $listsubClass->getSubscription($subscriber->subid);
		}