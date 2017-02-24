<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class menusType{
	function menusType(){
		$query = 'SELECT a.name, a.id as itemid, b.title  FROM `#__menu` as a LEFT JOIN `#__menu_types` as b on a.menutype = b.menutype WHERE a.access = 0 ORDER BY b.title ASC,a.ordering ASC';
		$db =& JFactory::getDBO();
		$db->setQuery($query);
		$joomMenus = $db->loadObjectList();
		$this->values = array();
		$this->values[] = JHTML::_('select.option', '0',JText::_('NONE'));
		$lastGroup = '';
		foreach($joomMenus as $oneMenu){
			if($oneMenu->title != $lastGroup){
				if(!empty($lastGroup)) $this->values[] = JHTML::_('select.option', '</OPTGROUP>');
				$this->values[] = JHTML::_('select.option', '<OPTGROUP>',$oneMenu->title);
				$lastGroup = $oneMenu->title;
			}
			$this->values[] = JHTML::_('select.option', $oneMenu->itemid,$oneMenu->name);
		}
	}
	function display($map,$value){
		return JHTML::_('select.genericlist', $this->values, $map , 'size="1"', 'value', 'text', $value);
	}
}