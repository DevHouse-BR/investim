<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class importType{
	function importType(){
		$db = JFactory::getDBO();
		$this->data = array();
		$this->data['file'] = JText::_('FILE');
		$this->data['joomla'] = JText::_('IMPORT_JOOMLA');
		$possibleImport = array();
		$possibleImport[$db->getPrefix().'acajoom_subscribers'] = array('acajoom','Acajoom');
		$possibleImport[$db->getPrefix().'ccnewsletter_subscribers'] = array('ccnewsletter','ccNewsletter');
		$possibleImport[$db->getPrefix().'letterman_subscribers'] = array('letterman','Letterman');
		$possibleImport[$db->getPrefix().'communicator_subscribers'] = array('communicator','Communicator');
		$possibleImport[$db->getPrefix().'yanc_subscribers'] = array('yanc','Yanc');
		$tables = $db->getTableList();
		foreach($tables as $mytable){
			if(isset($possibleImport[$mytable])){
				$this->data[$possibleImport[$mytable][0]] = $possibleImport[$mytable][1];
			}
		}
		$this->values = array();
		foreach($this->data as $div => $name){
			$this->values[] = JHTML::_('select.option', $div,$name);
		}
		$js = 'var currentoption = \'file\';
		function updateImport(newoption){document.getElementById(newoption).style.display = \'block\'; document.getElementById(currentoption).style.display = "none";currentoption = newoption;}';
		$doc =& JFactory::getDocument();
		$doc->addScriptDeclaration( $js );
	}
	function display($map){
		return JHTML::_('select.radiolist',   $this->values, $map, 'class="inputbox" size="1" onchange="updateImport(this.value);"', 'value', 'text','file');
	}
	function getData(){
		return $this->data;
	}
}