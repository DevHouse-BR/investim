<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JPATH_COMPONENT.DS.'admin.controller.php' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'helper.php' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'select.php' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'filter.php' );
	$option = JRequest::getVar('option');	
	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/'.$option.'/includes/css/index.css');

if($controller = JRequest::getWord('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	
	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}

?>
<?php
$classname	= 'PropertiesController'.$controller;
$controller	= new $classname( );
$controller->execute( JRequest::getVar( 'task' ) );
$controller->redirect();
?>

