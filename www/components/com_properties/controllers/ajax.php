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
if(JRequest::getVar('Country_id')!=''){
global $mainframe;
$datos = null;
$db 	=& JFactory::getDBO();
$Country_id = JRequest::getVar('Country_id');
$query = 	"SELECT * from #__properties_state where published = 1 and parent = ".$Country_id;
$db->setQuery( $query );				
$provincias = $db->loadObjectList();
$nP = count($provincias);
$mitems[0]->id='';
$mitems[0]->name='State';
		foreach ( $provincias as $item ) {
			$mitems[] = $item;
		}
$javascript = 'onChange="ChangeLocality(this.value)"';
$Comboprovincias        = JHTML::_('select.genericlist',   $mitems, 'sid', 'class="inputbox required select" size="1" '.$javascript,'id', 'name',  0); 
echo $Comboprovincias;
}
}

function ChangeLocality() {
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$user_add_locality=$params->get('user_add_locality');
if(JRequest::getVar('State_id')!=''){
global $mainframe;
$datos = null;
$db 	=& JFactory::getDBO();
$State_id = JRequest::getVar('State_id');
$last=0;

if(JRequest::getVar('Zid')>0){$Zid = JRequest::getVar('Zid');}else{$Zid =0;}
if($Zid>0){
$q="SELECT MAX(id) FROM #__properties_locality WHERE parent = ".$State_id;
$db->setQuery( $q );				
$last = $db->loadResult();
}

$query = 	"SELECT * from #__properties_locality where published = 1 and parent = ".$State_id;
$db->setQuery( $query );				
$ciudades = $db->loadObjectList();
$nP = count($ciudades);
$mitems[0]->id='';
$mitems[0]->name='Locality';
		foreach ( $ciudades as $item ) {
			$mitems[] = $item;
		}
$javascript = '';
$Combociudades        = JHTML::_('select.genericlist',   $mitems, 'lid', 'class="inputbox required select" size="1" '.$javascript,'id', 'name',  $last); 
echo $Combociudades;

if($Zid>0){
}else{
if($user_add_locality == 1){
?>
<a href="<?php echo JURI::base();?>index.php?option=com_properties&controller=ajax&format=raw&task=AddLocality&sid=<?php echo $State_id;?>" onclick="return hs.htmlExpand(this, { objectType: 'ajax', preserveContent: true} )">
	<?php echo JText::_( 'Add Locality');?>
</a>
<?php
}
}
}
}
	
function AddLocality() {
?>

<form action="" method="post" name="Form" id="Form" class="form-validate" >
<table>
<tr>
	<td class="key"><label for="name"><?php echo JText::_( 'Add Locality' ); ?>:</label></td>
	<td>
<input class="inputbox required" type="text" name="nameL" id="nameL" size="30" maxlength="255" value="" />
	</td>
    </tr>
<tr>
	<td class="key"><label for="name"><?php echo JText::_( 'Add Post Code' ); ?>:</label></td>
	<td>
<input class="inputbox required validate-numeric" type="text" name="zipL" id="zipL" size="30" maxlength="255" value="" />   
	</td>
    </tr>
</table>        
<?php echo JHTML::_( 'form.token' ); ?>
</form>
<div class="highslide-save">
<a style="font-weight: bold;text-transform: uppercase;text-decoration: none;" href="#" title="Close (esc)" onclick="SaveLocality(<?php echo JRequest::getVar('sid'); ?>);return hs.close(this)"><span><?php echo JText::_('Save'); ?></span></a>
</div>
<?php
}

function SaveLocality() {
$sid=JRequest::getVar('sid');
$Locaname=JRequest::getVar('lid');
$zipL=JRequest::getVar('zipL');
$db 	=& JFactory::getDBO();

$query = 	"
INSERT INTO #__properties_locality VALUES (NULL , '$sid', '$zipL', '$Locaname', '', '1', '0', '0', '0000-00-00 00:00:00'
);
";
$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}else{
		echo ' ';
		}
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
$Combotypes        = JHTML::_('select.genericlist',   $mitems, 'type', 'class="inputbox required select" size="1" '.$javascript,'id', 'name',  0); 
echo $Combotypes;

}


}
?>