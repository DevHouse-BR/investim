<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class securedType{
	function securedType(){
		$this->values = array();
		$this->values[] = JHTML::_('select.option', '','- - -');
		$this->values[] = JHTML::_('select.option', 'ssl','SSL');
		$this->values[] = JHTML::_('select.option', 'tls','TLS');
	}
	function display($map,$value){
		return JHTML::_('select.genericlist', $this->values, $map , 'size="1"', 'value', 'text', $value);
	}
}