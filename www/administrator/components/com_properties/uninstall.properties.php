<?php
if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');


$db 	=& JFactory::getDBO();
$query = "DELETE FROM #__menu_types WHERE menutype = 'properties' LIMIT 1;";
$db->setQuery( $query );
$db->query();



$component = JComponentHelper::getComponent( 'com_properties' );
$compid=$component->id;
	
	
	$query2 = "DELETE FROM #__menu WHERE componentid = ".$compid." ;";
$db->setQuery( $query2 );
$db->query();
	
	
?>
	<h2>Successfully Uninstalled Property!</h2> <BR>
<h1>:(</h1>