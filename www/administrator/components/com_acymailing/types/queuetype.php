<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class queuetypeType{
	function queuetypeType(){
		$this->values = array();
		$this->values[] = JHTML::_('select.option', 'onlyauto',JText::_('AUTO_ONLY'));
		$this->values[] = JHTML::_('select.option', 'auto',JText::_('AUTO_MAN'));
		$this->values[] = JHTML::_('select.option', 'manual',JText::_('MANUAL_ONLY'));
	}
	function display($map,$value){
		return JHTML::_('select.radiolist', $this->values, $map , 'size="1"', 'value', 'text', $value);
	}
}