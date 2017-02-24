<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class filterType{
	var $filters = array();
	function filterType(){
		$db =& JFactory::getDBO();
		$types = array('group','list','acymailingfield','joomlafield');
		$this->type = array();
		$this->type[] = JHTML::_('select.option', '',JText::_('FILTER_SELECT'));
		$this->type[] = JHTML::_('select.option', 'group',JText::_('GROUP'));
		$this->type[] = JHTML::_('select.option', 'list',JText::_('ACYMAILING_LIST'));
		$this->type[] = JHTML::_('select.option', 'acymailingfield',JText::_('ACYMAILING_FIELD'));
		$this->type[] = JHTML::_('select.option', 'joomlafield',JText::_('JOOMLA_FIELD'));
		$tables = $db->getTableList();
		if(in_array($db->getPrefix().'comprofiler',$tables)){
			$this->type[] = JHTML::_('select.option', 'cbfield',JText::_('CB_FIELD'));
			$types[] = 'cbfield';
			$fields = reset($db->getTableFields($db->getPrefix().'comprofiler'));
			$this->cbfield = array();
			foreach($fields as $oneField => $fieldType){
				$this->cbfield[] = JHTML::_('select.option',$oneField,$oneField);
			}
		}
		if(acymailing::level(3)){
			include(dirname(__FILE__).DS.'filterenterprise.php');
		}
		$acl =& JFactory::getACL();
		$this->groups = $acl->get_group_children_tree( null, 'USERS', false );
		$list = acymailing::get('class.list');
		$lists = $list->getLists();
		$this->lists = array();
		foreach($lists as $oneList){
			$this->lists[] = JHTML::_('select.option',$oneList->listid,$oneList->name);
		}
		$fields = reset($db->getTableFields(acymailing::table('subscriber')));
		$this->acymailingfields = array();
		foreach($fields as $oneField => $fieldType){
			$this->acymailingfields[] = JHTML::_('select.option',$oneField,$oneField);
		}
		$fields = reset($db->getTableFields(acymailing::table('users',false)));
		$this->joomlafields = array();
		foreach($fields as $oneField => $fieldType){
			$this->joomlafields[] = JHTML::_('select.option',$oneField,$oneField);
		}
		$doc =& JFactory::getDocument();
		$js = "function updateFilter(filterNum){";
			foreach($types as $oneType){
				$js .= "filterArea = 'filter_'+filterNum+'$oneType';
				if(window.document.getElementById(filterArea)){window.document.getElementById(filterArea).style.display = 'none';}";
			}
		$js .= "filterArea = 'filter_'+filterNum+window.document.getElementById('filtertype'+filterNum).value;
				if(window.document.getElementById(filterArea)){window.document.getElementById(filterArea).style.display = 'block';}
			}";
		$doc->addScriptDeclaration( $js );
		$this->operators = acymailing::get('type.operators');
		$this->status = acymailing::get('type.statusfilterlist');
	}
	function display(){
		static $i = 0;
		$i++;
		$this->filters['group'] = JHTML::_('select.genericlist',   $this->groups, "filter[$i][group]", 'class="inputbox" size="1"', 'value', 'text');
		$this->filters['list'] = $this->status->display("filter[$i][list_status]",1,false).' '.JHTML::_('select.genericlist',   $this->lists, "filter[$i][list]", 'class="inputbox" size="1"', 'value', 'text');
		$this->filters['acymailingfield'] = JHTML::_('select.genericlist',   $this->acymailingfields, "filter[$i][acymailingfield]", 'class="inputbox" size="1"', 'value', 'text');
		$this->filters['acymailingfield'].= ' '.$this->operators->display("filter[$i][acymailingfield_operator]").' <input class="inputbox" type="text" name="filter['.$i.'][acymailingfield_value]" size="50" value="">';
		$this->filters['joomlafield'] = JHTML::_('select.genericlist',   $this->joomlafields, "filter[$i][joomlafield]", 'class="inputbox" size="1"', 'value', 'text');
		$this->filters['joomlafield'].= ' '.$this->operators->display("filter[$i][joomlafield_operator]").' <input class="inputbox" type="text" name="filter['.$i.'][joomlafield_value]" size="50" value="">';
		if(!empty($this->cbfield)){
			$this->filters['cbfield'] = JHTML::_('select.genericlist',   $this->cbfield, "filter[$i][cbfield]", 'class="inputbox" size="1"', 'value', 'text');
			$this->filters['cbfield'].= ' '.$this->operators->display("filter[$i][cbfield_operator]").' <input class="inputbox" type="text" name="filter['.$i.'][cbfield_value]" size="50" value="">';
		}
		if(acymailing::level(3)){
			include(dirname(__FILE__).DS.'filterenterprisedisplay.php');
		}
		$return = '<div id="filter_'.$i.'">';
		$return .= JHTML::_('select.genericlist',   $this->type, "filter[type][$i]", 'class="inputbox" size="1" onchange="updateFilter('.$i.');"', 'value', 'text');
		foreach($this->filters as $oneFilterName => $content){
			$return .= '<div id="filter_'.$i.$oneFilterName.'" style="display:none;margin-left:150px">';
			$return .= $content;
			$return .= '</div>';
		}
		$return .= '</div>';
		return $return;
	}
}