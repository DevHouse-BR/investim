<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewBookings extends JView
{	
	function display($tpl = null)
	{
	global $mainframe;
	$task=JRequest::getVar('task');	
		if($task=='edit'){
		JToolBarHelper::apply();
		JToolBarHelper::cancel( 'cancel', 'Close' );
		$Order		= & $this->get( 'Order');
		$this->assignRef('Order',		$Order);
		$tpl='form';
		
		
		}else{	
		
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
				
		$lists = & $this->get('List');
		$this->assignRef('lists', $lists);
				
		$items		= & $this->get( 'Data');
		$this->assignRef('items',		$items);
		
		$pagination =& $this->get('Pagination');
		$this->assignRef('pagination', $pagination);
		}
		parent::display($tpl);
	}
}