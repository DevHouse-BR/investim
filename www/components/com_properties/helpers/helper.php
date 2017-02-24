<?php
class CatTreeHelper
{	
	function Parent( &$row,$TableName )
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
		
$javascript = '';
//$javascript = 'onChange="javascript: document.adminForm2.selections[].value=this.value;"';
		$output = JHTML::_('select.genericlist',   $mitems, 'parent', 'class="inputbox required" size="1"'.$javascript, 'value', 'text', $row->parent );	
		
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

		$output = JHTML::_('select.genericlist',   $mitems, 'cid', 'class="inputbox required select" size="1"'.$javascript, 'value', 'text', $row->cid );	
		
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
		$mitems[] 	= JHTML::_('select.option',  '0', JText::_( 'All Categories' ) );

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

	
	
function PublishedPanel( &$row, $i,  $imgY = 'publish_g.png', $imgX = 'publish_r.png', $prefix='' )
	{
		//$i=$row->id;
		$Itemid=JRequest::getVar('Itemid');
		$img 	= $row->published ? $imgY : $imgX;
		$task 	= $row->published ? 'unpublish' : 'publish';
		$alt 	= $row->published ? JText::_( 'Publish' ) : JText::_( 'Unpublish' );
		$action = $row->published ? JText::_( 'Unpublish' ) : JText::_( 'Publish' );

		$href = '
		<span class="editlinktip hasTip" title="'. $action .'::'. $row->name.'">
		<a href="'.JRoute::_('index.php?option=com_properties&view=panel&task='.$task.'&id='.$row->id).'" >
		<img src="'.JURI::base().'components/com_properties/includes/img/'. $img .'" border="0" alt="'. $alt .'" /></a></span>'
		;

		return $href;
	}			
	
	
	function Published( &$row, $i,  $imgY = 'tick.png', $imgX = 'publish_x.png', $prefix='' )
	{
		$img 	= $row->published ? $imgY : $imgX;
		$task 	= $row->published ? 'unpublish' : 'publish';
		$alt 	= $row->published ? JText::_( 'Published' ) : JText::_( 'Unpublished' );
		$action = $row->published ? JText::_( 'Unpublished' ) : JText::_( 'Published' );
		// If not a new item, trash is not an option
		if ( !$row->id ) {
			$row->published = 1;
		}
		$href = '
		<a href="javascript:void(0);" onclick="return listItemTask(\'cb'. $i .'\',\''. $prefix.$task .'\')" title="'. $action .'">
		<img src="components/com_properties/includes/img/'. $img .'" border="0" alt="'. $alt .'" /></a>'
		;

		return $href;
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
		<img src="components/com_properties/includes/img/'. $img .'" border="0" alt="'. $alt .'" /></a>'
		;

		return $href;
	}
	
	
	
	
	
	
	
function MyVotes()
	{	
	$user =& JFactory::getUser();
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT * FROM #__properties_rating_user WHERE user_id = '.$user->id;		
        $db->setQuery($query);        
		$Votes = $db->loadObjectList();
	if($Votes){
	foreach ($Votes as $row) :
	$MyVotes[$row->product_id] = $row->rating;
	endforeach; 
	}
	return $MyVotes;
	}
	
function Images($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT i.* '			
			. ' FROM #__properties_images as i '					
			. ' WHERE i.published = 1 AND i.parent = '.$id			
			. ' order by i.ordering ';		
        $db->setQuery($query);   

		$Images = $db->loadObjectList();

	return $Images;
	}
	
function Pdfs($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT p.*,  '		
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug'					
				. ' FROM #__properties_pdfs AS p '							
				. ' WHERE p.published = 1'
				. ' AND p.parent = '.$id	
				. ' order by p.ordering'				
				;		
			
        $db->setQuery($query);   

		$Pdfs = $db->loadObjectList();

	return $Pdfs;
	
	}
	
	
	
	
	
}