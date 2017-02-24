<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class authornameType{
	var $onclick = "updateTag();";
	function authornameType(){
		$this->values = array();
		$this->values[] = JHTML::_('select.option', "|author",JText::_('Yes'));
		$this->values[] = JHTML::_('select.option', "",JText::_('No'));
	}
	function display($map,$value){
		return JHTML::_('select.radiolist', $this->values, $map , 'size="1" onclick="'.$this->onclick.'"', 'value', 'text', (string) $value);
	}
}