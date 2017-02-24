<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );

class PropertiesViewContacts extends JView{
	
	function display($tpl = null)
	{
	
	global $mainframe;
	$option = JRequest::getVar('option');
	
JToolBarHelper::deleteList();

if(JRequest::getVar('layout')){

$contact = & $this->get('Contact');
$this->assignRef('contact',		$contact);

}else{

$items		= & $this->get( 'Data');
$pagination =& $this->get('Pagination');
$lists = & $this->get('List');

$this->assignRef('items',		$items);
$this->assignRef('pagination', $pagination);
$this->assignRef('lists', $lists);
}

parent::display($tpl);

	}

	
	
	
}