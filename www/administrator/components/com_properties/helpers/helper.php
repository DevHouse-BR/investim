<?php
class CatTreeHelper
{	
	function Parent( &$row,$TableName )
	{
		$db =& JFactory::getDBO();	
		$component_name = 'properties';	
		if ( $row->id ) {
			$id = ' AND id != '.(int) $row->id;
		} else {
			$id = null;
		}
		
		if (!$row->parent) {
			$row->parent = 0;
		}
		
		$query = 'SELECT * ' .
				' FROM #__'.$component_name.'_category as c' .				
				' WHERE published != -2' .				
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
		$mitems[] 	= JHTML::_('select.option',  '0', JText::_( 'Top' ) );

		foreach ( $list as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->treename );
		}
		
$size=5;
$field_name='parent';
$style = 'style="width: 255px;"';
if($TableName == 'articles'){$size=10;$field_name='cid';$style = 'style="width: 272px;"';}



		$output = JHTML::_('select.genericlist',   $mitems, $field_name, $style.'class="inputbox" size="'.$size.'"', 'value', 'text', $row->parent );		
		
		return $output;
	}

function ParentCategory( &$row,$TableName )
	{
		$db =& JFactory::getDBO();
		$component_name = 'properties';
		/*
		if ( $row->id ) {
			$id = ' AND id != '.(int) $row->id;
		} else {
			$id = null;
		}
		*/
		if (!$row->parent) {
			$row->parent = 0;
		}
		
		$query = 'SELECT * ' .
				' FROM #__'.$component_name.'_category as c' .				
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
		$mitems[] 	= JHTML::_('select.option',  '0', JText::_( 'Top' ) );

		foreach ( $list as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->treename );
		}


$size=5;
$field_name='parent';
$style = 'style="width: 258px;"';
if($TableName == 'articles'){$size=10;$field_name='cid';$style = 'style="width: 272px;"';}
if($TableName == 'type'){$size=10;$field_name='parent';$style = 'style="width: 272px;"';}
$output = JHTML::_('select.genericlist',   $mitems, $field_name, $style.'class="inputbox" size="'.$size.'"', 'value', 'text', $row->parent );	

		
		
		return $output;
	}



function ParentCategoryType( &$row,$TableName,$call )
	{
	
		$db =& JFactory::getDBO();		
		if ( $row->id ) {
			if($call=='category'){$id = ' AND id != '.(int) $row->id;}
		} else {
			$id = null;
		}
		if (!$row->cid) {
			$row->cid = 0;
		}
		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' ' .				
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

		
		$mitems 	= array();
		$mitems[] 	= JHTML::_('select.option',  '', JText::_( 'Top' ) );

		foreach ( $list as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->treename );
		}
		
$javascript = 'onChange="ChangeType(this.value)"';

		$output = JHTML::_('select.genericlist',   $mitems, 'cid', 'class="inputbox required" size="1"'.$javascript, 'value', 'text', $row->cid );	
		
		return $output;
	}


	function MultiParent( &$row,$TableName )
	{
		$db =& JFactory::getDBO();

		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' as c' .				
				' WHERE published = 1' .				
				' ORDER BY name';
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
	//	if ( $cid[0] ) {		
			$query = 'SELECT categoryid AS value'
			. ' FROM #__properties_product_category'
			. ' WHERE productid = '.(int) $row->id
			;
			$db->setQuery( $query );
			$lookup = $db->loadObjectList();
			if (empty( $lookup )) {
				$lookup = array( JHTML::_('select.option',  '-1' ) );
				$row->pages = 'none';
			} elseif (count($lookup) == 1 && $lookup[0]->value == 0) {
				$row->pages = 'all';
			} else {
				$row->pages = null;
			}			
	/*	} else {
			$lookup = array( JHTML::_('select.option',  0, JText::_( 'All' ) ) );
			$row->pages = 'all';
		}
		*/
					
		$list = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0 );

		$mitems 	= array();
		$mitems[] 	= JHTML::_('select.option',  '0', JText::_( 'Varies Categories' ) );

		foreach ( $list as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->treename );
		}
	
	$output	= JHTML::_('select.genericlist',   $mitems, 'selections[]', 'class="inputbox" size="7" multiple="multiple"', 'value', 'text', $lookup, 'selections' );	
		//print_r($mitems);
		return $output;
	}


	function Target( &$row )
	{
		$click[] = JHTML::_('select.option',  '0', JText::_( 'Parent Window With Browser Navigation' ) );
		$click[] = JHTML::_('select.option',  '1', JText::_( 'New Window With Browser Navigation' ) );
		$click[] = JHTML::_('select.option',  '2', JText::_( 'New Window Without Browser Navigation' ) );
		$target = JHTML::_('select.genericlist',   $click, 'browserNav', 'class="inputbox" size="4"', 'value', 'text', intval( $row->browserNav ) );

		return $target;
	}

function Published( &$row )
	{
		$put[] = JHTML::_('select.option',  '0', JText::_( 'No' ));
		$put[] = JHTML::_('select.option',  '1', JText::_( 'Yes' ));

		// If not a new item, trash is not an option
		if ( !$row->id ) {
			$row->published = 1;
		}
		$published = JHTML::_('select.radiolist',  $put, 'published', '', 'value', 'text', $row->published );
		return $published;
	}


	



	
function Show( &$row, $i,  $imgY = 'tick.png', $imgX = 'publish_x.png', $prefix='' )
	{
		//$i=$row->id;
		$img 	= $row->show ? $imgY : $imgX;
		$task 	= $row->show ? 'unshow' : 'show';
		$alt 	= $row->show ? JText::_( 'Show' ) : JText::_( 'Unshow' );
		$action = $row->show ? JText::_( 'Unshow' ) : JText::_( 'Show' );

		$href = '
		<a href="javascript:void(0);" onclick="return listItemTask(\'cb'. $i .'\',\''. $prefix.$task .'\')" title="'. $action .'">
		<img src="images/'. $img .'" border="0" alt="'. $alt .'" /></a>'
		;

		return $href;
	}	


	function Destacado( &$row, $i,  $imgY = 'tick.png', $imgX = 'publish_x.png', $prefix='' )
	{
		//$i=$row->id;
		$img 	= $row->featured ? $imgY : $imgX;
		$task 	= $row->featured ? 'nodestacado' : 'destacado';
		$alt 	= $row->featured ? JText::_( 'destacado' ) : JText::_( 'nodestacado' );
		$action = $row->featured ? JText::_( 'nodestacado' ) : JText::_( 'destacado' );

		$href = '
		<a href="javascript:void(0);" onclick="return listItemTask(\'cb'. $i .'\',\''. $prefix.$task .'\')" title="'. $action .'">
		<img src="images/'. $img .'" border="0" alt="'. $alt .'" /></a>'
		;

		return $href;
	}
	
		
}