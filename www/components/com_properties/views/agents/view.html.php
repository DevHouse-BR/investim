<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewAgents extends JView
{	
	function display($tpl = null)
	{		
	$user =& JFactory::getUser();
	global $mainframe;	

$task = JRequest::getVar('task');	
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );

$items		= & $this->get( 'Data');
$pagination =& $this->get('Pagination');

$this->assignRef('items',		$items);
$this->assignRef('pagination', $pagination);


	parent::display($layout);		
		
	}

	

}