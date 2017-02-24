<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');

class PropertiesControllerAjax extends JController
{ 
    function display()
    {
        parent::display();
    }
	


function ChangeState() {
global $mainframe;
$datos = null;
$db 	=& JFactory::getDBO();
$Country_id = JRequest::getVar('Country_id');
$query = 	"SELECT * from #__properties_state where published = 1 and parent = ".$Country_id;
$db->setQuery( $query );				
$provincias = $db->loadObjectList();
$nP = count($provincias);
$mitems[0]->id=0;
$mitems[0]->name='State';
		foreach ( $provincias as $item ) {
			$mitems[] = $item;
		}
$javascript = 'onChange="ChangeLocality(this.value)"';
$Comboprovincias        = JHTML::_('select.genericlist',   $mitems, 'sid', 'class="inputbox" size="1" style="font-size: 10px; width: 108px;"'.$javascript,'id', 'name',  0); 
echo $Comboprovincias;

}


function ChangeLocality() {
global $mainframe;
$datos = null;
$db 	=& JFactory::getDBO();
$State_id = JRequest::getVar('State_id');
$query = 	"SELECT * from #__properties_locality where published = 1 and parent = ".$State_id;
$db->setQuery( $query );				
$ciudades = $db->loadObjectList();
$nP = count($ciudades);
$mitems[0]->id=0;
$mitems[0]->name='Locality';
		foreach ( $ciudades as $item ) {
			$mitems[] = $item;
		}
$javascript = '';
$Combociudades        = JHTML::_('select.genericlist',   $mitems, 'lid', 'class="inputbox" size="1" style="font-size: 10px; width: 108px;"'.$javascript,'id', 'name',  0); 
echo $Combociudades;

}

	function ChangeAgent()
	{	
	global $mainframe;
$datos = null;
$db 	=& JFactory::getDBO();
$agent_id = JRequest::getVar('agent_id');

	$query = 	"SELECT * from #__properties_profiles WHERE mid = ".$agent_id;
$db->setQuery( $query );			
$agent = $db->loadObjectList();


echo '<input class="text_area" type="text" name="agent" id="agent" size="20" maxlength="255" value="'.$agent[0]->name.'" /><br>';
echo 'Id: '.$agent[0]->id.' UsrId: '.$agent[0]->mid;
//}

	
	}
	
	
	
function ChangeType() {

global $mainframe;
$datos = null;
$db 	=& JFactory::getDBO();
$Category_id = JRequest::getVar('Category_id');
$query = 	"SELECT * from #__properties_type where published = 1 and parent = ".$Category_id." OR parent = 0";
$db->setQuery( $query );				
$types = $db->loadObjectList();
$nP = count($types);
$mitems[0]->id=0;
$mitems[0]->name='Type';
		foreach ( $types as $item ) {
			$mitems[] = $item;
		}
$javascript = '';
$Combotypes        = JHTML::_('select.genericlist',   $mitems, 'type', 'class="inputbox" size="1" style="font-size: 10px; width: 108px;"'.$javascript,'id', 'name',  0); 
echo $Combotypes;

}


function ChangeShowRatesList() {

global $mainframe;
$ratelistid=JRequest::getVar('ratelistid');
echo '<div id="progressS"></div>';
echo ''.$ratelistid.'<br>';




jimport('joomla.filesystem.file');
$rates_file = JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_properties'.DS. 'rates_list' . DS . $ratelistid ;
if(JFile::exists($rates_file)){



	$gestor = fopen($rates_file, "r");
	if($gestor)
		{
		$x=0;
		echo '<table>';
	while (!feof($gestor)) {
	$bufer = fgets($gestor, 4096);	
	$result=explode(';',$bufer);
	$from=$result[1];
	$to=$result[2];	
	$from_spanish=explode('/',$from);
	$to_spanish=explode('/',$to);	
	
	//echo '<b>'.$from_spanish[2].'-'.$from_spanish[1].'-'.$from_spanish[0].'</b><br>';
	//echo '<b>'.$to_spanish[2].'-'.$to_spanish[1].'-'.$to_spanish[0].'</b><br>';
	
	$saverate['title']=$result[0];
	$saverate['validfrom']=$from_spanish[2].'-'.$from_spanish[1].'-'.$from_spanish[0];
	$saverate['validto']=$to_spanish[2].'-'.$to_spanish[1].'-'.$to_spanish[0];
	$saverate['rateperweek']=$result[3];
	$saverate['weekonly']=1;
	$saverate['published']=1;
	$saverate['ordering']=$x;
	$x++;
	
	echo '<tr>';
	echo '<td style="border: 1px solid #CCCCCC;">'.$saverate['title'].'</td>    <td style="border: 1px solid #CCCCCC;">'.$from.'</td>    <td style="border: 1px solid #CCCCCC;">'.$to.'</td>    <td style="border: 1px solid #CCCCCC;">'.$saverate['rateperweek'].'</td>';
	echo '</tr>';
	
	}	
	echo '</table>';
	fclose ($gestor);	
		}
	
	
}else{
echo 'file not exists.';
}	
	
	
	
}


}
?>