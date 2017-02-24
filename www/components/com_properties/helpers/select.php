<?php

class SelectHelper
{
	
	function Select( &$row,$TableName )
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
			$row->parent = 0;
		}

		// get a list of the menu items
		// excluding the current menu item and its child elements
		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' ' .
				//' WHERE menutype = '.$db->Quote($row->menutype) .
				' WHERE published != -2' .
				$id .
				' ORDER BY name';
		$db->setQuery( $query );
		$items = $db->loadObjectList();

		// establish the hierarchy of the menu
		$children = array();


		$mitems 	= array();
		

		foreach ( $items as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->name );
		}

		$output = JHTML::_('select.genericlist',   $mitems, 'parent', 'class="inputbox" size="1"', 'value', 'text', $row->parent );
		
		//print_r($mitems);
		return $output;
	}



	function SelectAjaxPaises( &$row,$TableName,$UseCountry )
	{
		$db =& JFactory::getDBO();		
		if ( $row->id ) {
		//	$id = ' AND id != '.(int) $row->id;
		} else {
			$id = null;
		}
		// In case the parent was null

		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' ' .
				//' WHERE menutype = '.$db->Quote($row->menutype) .
				' WHERE published != -2' .
				$id .
				' ORDER BY name';
				
		$db->setQuery( $query );
		$items = $db->loadObjectList();
		
		$mitems 	= array();
		
/*
$mitems[0]->id='';
$mitems[0]->name=JText::_( 'Country' );
*/
if($items){
		foreach ( $items as $item ) {
			$mitems[] = $item;
		}
		}
$javascript = 'onChange="ChangeState(this.value)"';
		$output = JHTML::_('select.genericlist',   $mitems, 'cyid', 'class="inputbox required select" size="1"'.$javascript, 'id', 'name', $row->cyid);

		//print_r($mitems);
		
		return $output;
	}

function SelectAjaxStates(&$row,$TableName,$UseState) {
global $mainframe;
$datos = null;
 if($UseState==0){
 return $UseState;
}else{ 

$db 	=& JFactory::getDBO();

if($row->cyid>0){
$query = 	"SELECT * from #__properties_state where published = 1 and parent = ".$row->cyid;
}else{
$query = 	"SELECT * from #__properties_state where published = 1 ";
}
$db->setQuery( $query );				
$States = $db->loadObjectList();
$nP = count($States);
	
	if($States){
/*
$mitems[0]->id=0;
$mitems[0]->name='State';
*/
		foreach ( $States as $item ) {
			$mitems[] = $item;
		}
	}
$javascript = 'onChange="ChangeLocality(this.value)"';
$ComboStates        = JHTML::_('select.genericlist',   $mitems, 'sid', 'class="inputbox select" size="1" '.$javascript,'id', 'name',  $row->sid); 
return $ComboStates;
}


}



function SelectAjaxLocalities(&$row,$TableName,$UseLocality) {
global $mainframe;
$datos = null;

if($UseLocality==0){
 return $UseLocality;
}else{ 

$db 	=& JFactory::getDBO();
if($row->sid>0){
$query = 	"SELECT * from #__properties_locality where published = 1 and parent = ".$row->sid;
}else{
$query = 	"SELECT * from #__properties_locality where published = 1 ";
}

$db->setQuery( $query );				
$Localities = $db->loadObjectList();
$nP = count($Localities);
/*
$mitems[0]->id=0;
$mitems[0]->name='Localities';
*/
	if($Localities){
		foreach ( $Localities as $item ) {
			$mitems[] = $item;
		}
	}
$javascript = '';
$ComboLocalities        = JHTML::_('select.genericlist',   $mitems, 'lid', 'class="inputbox select" size="1" '.$javascript,'id', 'name',  $row->lid); 
return $ComboLocalities;
}
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
		$output = JHTML::_('select.genericlist',   $mitems, 'type', 'class="inputbox  select" size="1"', 'id', 'name', $row->type);
		
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
	
	
	
	
	
		function MultiParent( &$row,$TableName )
	{
		$db =& JFactory::getDBO();		
		if ( $row->id ) {
			//$id = ' AND id != '.(int) $row->id;
		} else {
			$id = null;
		}
		if (!$row->parent) {
			$row->parent = 0;
		}
		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' as c' .				
				' WHERE published != -2' .
				$id .
				' ORDER BY parent, ordering';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();
		
		$children = array();

		if ( $mitems )
		{			
			foreach ( $mitems as $v )
			{
				$pt 	= $v->parent;
				$list 	= @$children[$pt] ? $children[$pt] : array();
				array_push( $list, $v );
				$children[$pt] = $list;
			}
		}
		$list = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0 );
print_r($datos);
		
		$mitems 	= array();
		$mitems[] 	= JHTML::_('select.option',  '', JText::_( 'Top' ) );

		foreach ( $list as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->treename );
		}

		$output = JHTML::_('select.genericlist',   $mitems, 'selections[]', 'class="inputbox" size="1"', 'value', 'text', $row->parent );	
		
		
		return $output;
	}
	
	
	
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
		
			$mitems[] = JHTML::_('select.option',  0, 'Select' );
		foreach ( $items as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->name );
		}

		$output = JHTML::_('select.genericlist',   $mitems, 'product_id', 'class="inputbox" style="width:258px;" size="1"', 'value', 'text', $row->productid );		


		
		return $output;
	}		
	
	
}


