<?php
class Filter
{	
	function FilterCategory( &$row,$TableName,$call )
	{	
		global $mainframe;
		$filter_category		= $mainframe->getUserStateFromRequest( "$option.filter_category",		'filter_category',		'',		'int' );
		$db =& JFactory::getDBO();		
		
		if (!$row->parent) {
			$row->parent = 0;
		}
		$query = 'SELECT * ' .
				' FROM #__properties_'.$TableName.' ' .				
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
		
		$mitems 	= array();
		$mitems[] 	= JHTML::_('select.option',  '0', JText::_( 'All Categories' ) );

		foreach ( $list as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->treename );
		}
$javascript='onchange="this.form.getElementById(\'filter_state\').value=\'\';submitform( );"';
		$output = JHTML::_('select.genericlist',   $mitems, 'filter_category', 'class="" size="1" '.$javascript, 'value', 'text', $filter_category );	
		
		return $output;
	}

	function FilterType( &$row,$TableName,$call )
	{	
		global $mainframe;
		$filter_category		= $mainframe->getUserStateFromRequest( "$option.filter_category",		'filter_category',		0,		'int' );
		$filter_type		= $mainframe->getUserStateFromRequest( "$option.filter_type",		'filter_type',		'',		'int' );
		$db =& JFactory::getDBO();			
		if (!$row->tid) {
			$row->tid = 0;
		}
		$query = 'SELECT * ' .
				' FROM #__properties_type ' .				
				' WHERE published != -2 AND parent = 0 or parent = ' .$filter_category.			
				' ORDER BY name';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();		
		$items 	= array();
		$items[] 	= JHTML::_('select.option',  '0', JText::_( 'Types' ) );
		if ( $mitems )
		{			
			foreach ( $mitems as $item )
			{
				$items[] = JHTML::_('select.option',  $item->id, '&nbsp;'. $item->name );
			}
		}		
$javascript='onchange="submitform( );"';
		$output = JHTML::_('select.genericlist',   $items, 'filter_type', 'class="select_filter" size="1" '.$javascript, 'value', 'text', $filter_type );	
		
		//echo 	$query;
		//print_r($mitems);
		return $output;
	}


	function FilterFeatured( &$row,$TableName,$call )
	{	
		global $mainframe;
		$filter_featured		= $mainframe->getUserStateFromRequest( "$option.filter_featured",		'filter_featured',		'',		'int' );
			
			if ( $filter_featured == 1 )
			{
				$filter_featured_id = 1;
			}
			else if ($filter_featured == 9 )
			{
				$filter_featured_id = 0;
			}	
			
		$items 	= array();
		$items[] 	= JHTML::_('select.option',  '0', JText::_( 'Selec Featured' ) );
					
			$items[] = JHTML::_('select.option',  1, '&nbsp;'. 'Featured' );
			$items[] = JHTML::_('select.option',  9, '&nbsp;'. 'No Featured' );
			
$javascript='onchange="submitform( );"';
		$output = JHTML::_('select.genericlist',   $items, 'filter_featured', 'class="select_filter" size="1" '.$javascript, 'value', 'text', $filter_featured );		
		return $output;
	}








	function FilterCountry( &$row,$TableName,$call )
	{	
		global $mainframe;
		$filter_country		= $mainframe->getUserStateFromRequest( "$option.filter_country",		'filter_country',		'',		'int' );
		$db =& JFactory::getDBO();		
		
		if (!$row->lid) {
			$row->lid = 0;
		}
		$query = 'SELECT * ' .
				' FROM #__properties_country ' .				
				' WHERE published = 1' .				
				' ORDER BY name';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();
		
		$items 	= array();
		$items[] 	= JHTML::_('select.option',  '0', JText::_( 'All Countries' ) );

		if ( $mitems )
		{			
			foreach ( $mitems as $item )
			{
				$items[] = JHTML::_('select.option',  $item->id, '&nbsp;'. $item->name );
			}
		}			
		
$javascript='onchange="this.form.getElementById(\'filter_sid\').value=\'0\';this.form.getElementById(\'filter_locality\').value=\'0\';submitform( );"';
		$output = JHTML::_('select.genericlist',   $items, 'filter_country', 'class="" size="1" '.$javascript, 'value', 'text', $filter_country );	
		
		return $output;
	}
	

	function FilterSid( &$row,$TableName,$call )
	{	
		global $mainframe;
		$filter_country		= $mainframe->getUserStateFromRequest( "$option.filter_country",		'filter_country',		'',		'int' );
		$filter_sid		= $mainframe->getUserStateFromRequest( "$option.filter_sid",		'filter_sid',		'',		'int' );
		$db =& JFactory::getDBO();
		
		if (!$row->lid) {
			$row->lid = 0;
		}
		if($filter_country>0){$CountrySql=' AND parent = ' .$filter_country;}else{$CountrySql='';}
		
		$query = 'SELECT * ' .
				' FROM #__properties_state ' .				
				' WHERE published = 1 ' .$CountrySql.
				' ORDER BY parent, name';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();
		
		$items 	= array();
		$items[] 	= JHTML::_('select.option',  '0', JText::_( 'All States' ) );

		if ( $mitems )
		{			
			foreach ( $mitems as $item )
			{
				$items[] = JHTML::_('select.option',  $item->id, '&nbsp;'. $item->name );
			}
		}			
		
$javascript='onchange="this.form.getElementById(\'filter_locality\').value=\'\';submitform( );"';
		$output = JHTML::_('select.genericlist',   $items, 'filter_sid', 'class="" size="1" '.$javascript, 'value', 'text', $filter_sid );	
		
		return $output;
	}
	
	
	function FilterLocality( &$row,$TableName,$call )
	{	
		global $mainframe;		
		$filter_state		= $mainframe->getUserStateFromRequest( "$option.filter_state",		'filter_state',		'',		'int' );
		$filter_locality		= $mainframe->getUserStateFromRequest( "$option.filter_locality",		'filter_locality',		'',		'int' );
		$db =& JFactory::getDBO();		
		
		if (!$row->lid) {
			$row->lid = 0;
		}
		
		if($filter_state){$StateSql=' AND parent = ' .$filter_state;}else{$StateSql='';}
		
		$query = 'SELECT * ' .
				' FROM #__properties_locality ' .				
				' WHERE published = 1 ' .$StateSql.	
				' ORDER BY parent, name';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();
		
		$items 	= array();
		$items[] 	= JHTML::_('select.option',  '0', JText::_( 'All Localities' ) );

		if ( $mitems )
		{			
			foreach ( $mitems as $item )
			{
				$items[] = JHTML::_('select.option',  $item->id, '&nbsp;'. $item->name );
			}
		}			
		
$javascript='onchange="this.form.getElementById(\'filter_locality\').value=\'\';submitform( );"';
		$output = JHTML::_('select.genericlist',   $items, 'filter_locality', 'class="" size="1" '.$javascript, 'value', 'text', $filter_locality );	
		
		return $output;
	}


	function FilterProductComments( &$row,$TableName,$call )
	{	
		global $mainframe;
				
		if(JRequest::getVar('productid'))
		{
		
		$filter_product_comment = JRequest::getVar('productid');
		
		}else{
		
		$filter_product_comment		= $mainframe->getUserStateFromRequest( "$option.filter_product_comment",		'filter_product_comment',		'',		'int' );
		
		}
		
		
		
		$db =& JFactory::getDBO();
		
		if (!$row->productid) {
			$row->productid = 0;
		}
		$query = 'SELECT * ' .
				' FROM #__properties_products ' .				
				' WHERE published = 1' .				
				' ORDER BY name';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();
		
		$items 	= array();
		$items[] 	= JHTML::_('select.option',  '0', JText::_( 'All Products' ) );

		if ( $mitems )
		{			
			foreach ( $mitems as $item )
			{
				$items[] = JHTML::_('select.option',  $item->id, '&nbsp;'. $item->name );
			}
		}			
		
$javascript='onchange="submitform( );"';
		$output = JHTML::_('select.genericlist',   $items, 'filter_product_comment', 'class="" size="1" '.$javascript, 'value', 'text', $filter_product_comment );	
		
		return $output;
	}	
}