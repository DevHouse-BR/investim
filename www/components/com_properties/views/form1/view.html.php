<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewForm1 extends JView
{	
	function display($tpl = null)
	{		
		$user =& JFactory::getUser();
		global $mainframe;
		$task = JRequest::getVar('task');	
		$component = JComponentHelper::getComponent( 'com_properties' );
		$params = new JParameter( $component->params );
		$Itemid =& $this->getItemid;
		$view = JRequest::getVar('view', 'properties', '', '');			
		$this->assignRef('Itemid',		$Itemid);
		
		
		
		
		// Get the page/component configuration and article parameters
		$item->params = clone($params);
		$aparams = new JParameter($item->attribs);

		// Merge article parameters into the page configuration
		$item->params->merge($aparams);
		$dispatcher	=& JDispatcher::getInstance();
		JPluginHelper::importPlugin('content');
		$results = $dispatcher->trigger('onPrepareContent', array (& $Product, & $item->params, 0));			




		parent::display($tpl);		
	}

	function getItemid()
	{
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=form1"';
				
		$db->setQuery($query);  
		$this->row = $db->loadResult();
		
		return $this->row;
	}			
}