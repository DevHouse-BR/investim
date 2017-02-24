<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewHelp extends JView
{	
	function display($tpl = null)
	{	
	global $mainframe;
	$option = JRequest::getVar('option');
	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/'.$option.'/includes/css/index.css');	
		parent::display($tpl);
	}
}