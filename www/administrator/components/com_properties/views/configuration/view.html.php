<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewConfiguration extends JView
{	
	function display($tpl = null)
	{	
	global $mainframe;
	$option = JRequest::getVar('option');	
	
JToolBarHelper :: custom( 'saveconfig', 'apply.png', 'apply.png', 'apply', false, false );	
JToolBarHelper::custom('preview', 'preview.png', 'preview_f2.png', 'Preview', false, false);
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT c.* FROM #__components as c WHERE LOWER(`option`) = "'.$option.'" AND LOWER(`link`) = "option='.$option.'"';
			
        $db->setQuery($query);        
		$rows = $db->loadObjectList();		
		$row=$rows[0];		

$paramsdata = $row->params;
$paramsdefs = JPATH_COMPONENT.DS.'config.xml';
$params = new JParameter( $paramsdata, $paramsdefs );
$component	= JComponentHelper::getComponent( $option );
$this->assignRef('component', $component);
$this->assignRef('params', $params);		
		parent::display($tpl);
	}
}