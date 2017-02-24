<?php

class SelectHelper
{
	
	function Select( &$row,$TableName,$params=NULL )
	{
		$db =& JFactory::getDBO();		
		if ( $row->id ) {
			
		} else {
			$id = null;
		}
		//print_r($params);
		
		if (!$row->parent) {
			if($params)
				{
					if($TableName=='country')
					{
					$row->parent = $params->get('UseCountryDefault');
					}
					if($TableName=='state')
					{
					$row->parent = $params->get('UseStateDefault');
					}
				}
		}
		
		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' ' .
				//' WHERE menutype = '.$db->Quote($row->menutype) .
				' WHERE published = 1' .
				$id .
				' ORDER BY name';
		$db->setQuery( $query );
		$items = $db->loadObjectList();
		
		$children = array();


		$mitems 	= array();
		
		$mitems[] = JHTML::_('select.option',  0, 'Not use '.$TableName );		

		foreach ( $items as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->name );
		}

		$output = JHTML::_('select.genericlist',   $mitems, 'parent', 'class="inputbox" size="1"', 'value', 'text', $row->parent );
		
		//print_r($mitems);
		return $output;
	}



	function SelectAjaxPaises( &$row,$TableName,$soy_id )
	{
		$db =& JFactory::getDBO();		
		if ( $row->id ) {
			//$id = ' AND id != '.(int) $row->id;
		} else {
			$id = null;
		}
		// In case the parent was null
		
		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' ' .
				//' WHERE menutype = '.$db->Quote($row->menutype) .
				' WHERE published != -2' .
				//$id .
				' ORDER BY name';
				
		$db->setQuery( $query );
		$items = $db->loadObjectList();
		
		$mitems 	= array();
		
/*
$mitems[0]->id=0;
$mitems[0]->name=JText::_( 'Not use Country' );
*/
		foreach ( $items as $item ) {
			$mitems[] = $item;
		}
$javascript = 'onChange="ChangeState(this.value)"';
		$output = JHTML::_('select.genericlist',   $mitems, 'cyid', 'class="inputbox" size="1"'.$javascript, 'id', 'name', $row->cyid);

		//print_r($mitems);
		
		return $output;
	}

function SelectAjaxStates(&$row,$TableName,$soy_id) {
global $mainframe;
$datos = null;

$db 	=& JFactory::getDBO();
$Country_id = $row->cyid;
//echo $Country_id;
$Country_id = $row->cyid ? $row->cyid : 0;

$query = 	"SELECT * from #__properties_state where published = 1 and parent = ".$Country_id;

$db->setQuery( $query );				
$States = $db->loadObjectList();

$nP = count($States);
/*
$mitems[0]->id=0;
$mitems[0]->name='Not use State';
*/
if($States){
		foreach ( $States as $item ) {
			$mitems[] = $item;
		}
		}
$javascript = 'onChange="ChangeLocality(this.value)"';
$ComboStates        = JHTML::_('select.genericlist',   $mitems, 'sid', 'class="inputbox" size="1" style="font-size: 10px; width: 108px;"'.$javascript,'id', 'name',  $row->sid); 
return $ComboStates;

}



function SelectAjaxLocalities(&$row,$TableName,$soy_id) {
global $mainframe;
$datos = null;

$db 	=& JFactory::getDBO();
$State_id = $row->sid;

$State_id = $row->sid ? $row->sid : 0;

$query = 	"SELECT * from #__properties_locality where published = 1 and parent = ".$State_id;
//if($State_id){
$db->setQuery( $query );				
$Localities = $db->loadObjectList();
//}

$nP = count($Localities);
/*
$mitems[0]->id=0;
$mitems[0]->name='Not use Localities';
*/
if($Localities){
		foreach ( $Localities as $item ) {
			$mitems[] = $item;
		}
		}
$javascript = '';
$ComboLocalities        = JHTML::_('select.genericlist',   $mitems, 'lid', 'class="inputbox" size="1" style="font-size: 10px; width: 108px;"'.$javascript,'id', 'name',  $row->lid); 
return $ComboLocalities;

}


	function SelectType( &$row,$TableName,$soy_id )
	{
		$db =& JFactory::getDBO();			
		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' ' .
				//' WHERE menutype = '.$db->Quote($row->menutype) .
				' WHERE published = 1 AND parent = 0 OR parent = ' . $row->parent .		
				' ORDER BY name';				
		$db->setQuery( $query );
		$items = $db->loadObjectList();		
		$mitems 	= array();
$mitems[0]->id=0;
$mitems[0]->name=JText::_( 'Type' );
		foreach ( $items as $item ) {
			$mitems[] = $item;
		}
$javascript = '';
		$output = JHTML::_('select.genericlist',   $mitems, 'type', 'class="inputbox" size="1"', 'id', 'name', $row->type);
		
		return $output;
	}	
	
	
function SelectCliente( &$row,$TableName )
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT * ' .
				' FROM #__users' .				
				//' WHERE gid = 100' .						
				' ORDER BY username';				
		$db->setQuery( $query );
		$items = $db->loadObjectList();
		$javascript = 'onChange="CambiarCliente(this.value)"';
		$output = JHTML::_('select.genericlist',   $items, 'mid', 'class="inputbox" size="1" '.$javascript, 'id', 'username', $row->mid );
		//print_r($mitems);
		return $output;
	}


function SelectAgent( $agent_id )
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT * ' .
				' FROM #__users' .				
				' WHERE gid > 18' .						
				' ORDER BY username';				
		$db->setQuery( $query );
		$items = $db->loadObjectList();
		$javascript = 'onChange="ChangeAgent(this.value)"';
		$output = JHTML::_('select.genericlist',   $items, 'agent_id', 'class="inputbox" size="1" '.$javascript, 'id', 'name', $agent_id );
		//print_r($mitems);
		return $output;
	}

/*
function SelectAgent( $row )
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT name ' .
				' FROM #__properties_profiles' .				
				' WHERE mid = ' .$row.						
				' ORDER BY name';				
		$db->setQuery( $query );
		$items = $db->loadResult();		
		$output = $items;
		//print_r($items);
		return $output;
	}

*/


	function SelectProduct( &$row,$TableName )
	{
		$db =& JFactory::getDBO();		
		if ( $row->id ) {
			
		} else {
			$id = null;
		}
		
		if (!$row->parent) {
			$row->parent = 0;
		}
		
		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' ' .				
				' WHERE published = 1' .				
				' ORDER BY name';
		$db->setQuery( $query );
		$items = $db->loadObjectList();
		
		$mitems 	= array();
		
			$mitems[] = JHTML::_('select.option',  0, JText::_( 'Select' ));
		foreach ( $items as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->name );
		}

		$output = JHTML::_('select.genericlist',   $mitems, 'productid', 'class="inputbox" style="width:258px;" size="1"', 'value', 'text', $row->productid );		


		
		return $output;
	}		
	
	
	
	function ParentAc( &$row )
	{
		$db =& JFactory::getDBO();
		//$row->id = 3;
		// If a not a new item, lets set the menu item id
		if ( $row->id ) {
			//$id = ' AND id != '.(int) $row->id;
		} else {
			$id = null;
		}

		// In case the parent was null
		if (!$row->parent) {
			//$row->parent = 0;
		}

		// get a list of the menu items
		// excluding the current menu item and its child elements
		$query = 'SELECT * ' .
				' FROM #__gestor_categorias_facturacion' .
				//' WHERE menutype = '.$db->Quote($row->menutype) .
				' WHERE published != -2' .
				//$id .
				' ORDER BY parent, ordering';				
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();

		// establish the hierarchy of the menu
		$children = array();

		if ( $mitems )
		{
			// first pass - collect children
			foreach ( $mitems as $v )
			{
				$pt 	= $v->parent;
				$list 	= @$children[$pt] ? $children[$pt] : array();
				array_push( $list, $v );
				$children[$pt] = $list;
			}
		}

		// second pass - get an indent list of the items
		$list = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0 );
//print_r($list);
		// assemble menu items to the array
		$mitems 	= array();
		$mitems[] 	= JHTML::_('select.option',  '0', JText::_( 'Top' ) );

		foreach ( $list as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->treename );
		}

		$output = JHTML::_('select.genericlist',   $mitems, 'parent', 'class="inputbox" size="10"', 'value', 'text', $row->parent );
		
		//print_r($mitems);
		//return $output;
		return $list;
	}
	
	
	
	
}


