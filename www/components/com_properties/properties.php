<?php
defined('_JEXEC') or die('Restricted access');
$lang =& JFactory::getLanguage();

$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/config.js"></script>');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/index.css" type="text/css" />');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/'.$lang->getTag().'-index.css" type="text/css" />');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/carousel.css" type="text/css" />');

jimport('joomla.application.component.helper');

require_once(JPATH_COMPONENT.DS.'helpers'.DS.'select.php');
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'helper.php' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'link.php' );
require_once (JPATH_COMPONENT.DS.'controller.php');
if($controller = JRequest::getVar('controller')) {
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
}
$classname	= 'PropertiesController'.$controller;
$controller = new $classname( );
$controller->execute( JRequest::getVar('task'));
$controller->redirect();
?>