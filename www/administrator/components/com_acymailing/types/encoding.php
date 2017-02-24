<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class encodingType{
	function encodingType(){
		$this->values = array();
		$this->values[] = JHTML::_('select.option', 'binary', 'Binary' );
		$this->values[] = JHTML::_('select.option', 'quoted-printable', 'Quoted-printable' );
		$this->values[] = JHTML::_('select.option', '7bit', '7 Bit');
		$this->values[] = JHTML::_('select.option', '8bit', '8 Bit' );
		$this->values[] = JHTML::_('select.option', 'base64', 'Base 64' );
	}
	function display($map,$value){
		return JHTML::_('select.genericlist', $this->values, $map , 'size="1"', 'value', 'text', $value);
	}
}