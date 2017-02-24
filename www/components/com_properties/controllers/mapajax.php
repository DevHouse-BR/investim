<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class PropertiesControllerMapajax extends JController
{ 
    function display()
    {
        parent::display();
    }

    function pruebaAjax(){
	$lang =& JFactory::getLanguage();
	$esteLang= substr(JRequest::getVar('langg'),0,2);
        $datos = null;		
$db 	=& JFactory::getDBO();
$id_provincia = JRequest::getVar('id_provincia');
	$query = 	"SELECT COUNT(p.id) as total, p.sid, p.lid, prov.name as name_state,ciu.name as name_locality, "
		. ' CASE WHEN CHAR_LENGTH(prov.alias) THEN CONCAT_WS(":", prov.id, prov.alias) ELSE prov.id END as provslug,'
		. ' CASE WHEN CHAR_LENGTH(ciu.alias) THEN CONCAT_WS(":", ciu.id, ciu.alias) ELSE ciu.id END as ciudslug '	
		."FROM jos_properties_products as p "
		."INNER JOIN jos_properties_state as prov ON  prov.id = p.sid "
		."INNER JOIN jos_properties_locality as ciu ON ciu.id = p.lid "
		."WHERE p.published = 1 "
		."AND p.sid = ".$id_provincia
		." GROUP BY p.lid "		
		;		
		
$db->setQuery( $query );				
$datos = $db->loadObjectList();
echo '<h4>'.JText::_('Select Locality').'</h4>';

for ($i=0, $n=count( $datos ); $i < $n; $i++)	{
$dato= $datos[$i];
$ruta = JRoute::_( 'index.php?option=com_properties&lang='.$esteLang.'&view=properties&task=search&sid='.$dato->provslug.'&lid='.$dato->ciudslug.'');
echo '<a style="cursor:pointer" href="' .$ruta .'">';
echo $dato->name_locality.' ('.$dato->total.') </a><br>';
}
			
} 
	
}
?>