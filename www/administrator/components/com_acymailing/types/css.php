<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class cssType{
	var $type = 'component';
	function load(){
		$this->values = array();
		$this->values[] = JHTML::_('select.option', '',JText::_('NONE'));
		jimport('joomla.filesystem.folder');
		$regex = '^'.$this->type.'_([-_A-Za-z0-9]*)\.css$';
		$allCSSFiles = JFolder::files( ACYMAILING_FRONT.'css', $regex );
		foreach($allCSSFiles as $oneFile){
			preg_match('#'.$regex.'#i',$oneFile,$results);
			$this->values[] = JHTML::_('select.option', $results[1],$results[1]);
		}
	}
	function display($map,$value){
		$this->load();
		return JHTML::_('select.genericlist',   $this->values, $map, 'class="inputbox" size="1"', 'value', 'text', $value );
	}
}