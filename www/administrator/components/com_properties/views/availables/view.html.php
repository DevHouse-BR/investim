<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );

class PropertiesViewAvailables extends JView{
	
	function display($tpl = null)
	{
	$doc =& JFactory::getDocument();
		$doc->addStyleSheet('components/com_properties/imagenes/properties.css');
	$task=JRequest::getVar('task');	
	$table=JRequest::getVar('table');	
	
	
	
	$Available		= & $this->get( 'Available');
		$this->assignRef('Available',		$Available);
/*		
		$AvailableProduct		= & $this->get( 'AvailableProduct');
		$this->assignRef('AvailableProduct',		$AvailableProduct);
*/
$items		= & $this->get( 'Data');
$pagination =& $this->get('Pagination');
$lists = & $this->get('List');


$this->assignRef('items',		$items);
$this->assignRef('pagination', $pagination);
$this->assignRef('lists', $lists);

		
parent::display($tpl);


		
	}

	
}