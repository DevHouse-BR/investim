<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class PropertiesModelCategories extends JModel
{
	var $_data;
	var $TableName = null;	
	
function _buildQuery()
	{
if(($this->filter_order)=='cyid'){$this->filter_order='ordering';}
if(($this->filter_order)=='sid'){$this->filter_order='ordering';}	
if(($this->filter_order)=='lid'){$this->filter_order='ordering';}	
if(($this->filter_order)=='cid'){$this->filter_order='ordering';}	
if(($this->filter_order)=='tid'){$this->filter_order='ordering';}
if(($this->filter_order)=='title'){$this->filter_order='name';}	
if(($this->filter_order)=='parent'){$this->filter_order='ordering';}	
if(($this->filter_order)=='id'){$this->filter_order='id';}	
if(($this->filter_order)=='published'){$this->filter_order='published';}	
		$where = array();
		if ( $this->filter_state )
		{
			if ( $this->filter_state == 'P' )
			{
				$where[] = 'c.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 'c.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(c.name) LIKE \''. $this->search. '\'';
		}
		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );			
		
		$orderby 	= ' ORDER BY c.'. $this->filter_order .' '. $this->filter_order_Dir;		
		$this->_query = ' SELECT c.*'
				. ' FROM #__properties_category AS c '
				. $where
				//. ' GROUP BY t.id_categoria'
				. $orderby
				;				
		
        return $this->_query;		
	}
	

var $_total = null;
var $_pagination = null;

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;
$this->filter_order		= null;
		$this->filter_order		= $mainframe->getUserStateFromRequest( "$option.filter_order",		'filter_order',	'ordering' ,	'cmd' );
		$this->filter_order_Dir	= $mainframe->getUserStateFromRequest( "$option.filter_order_Dir",	'filter_order_Dir',	'',		'word' );			
		$this->filter_category		= $mainframe->getUserStateFromRequest( "$option.filter_category",		'filter_category',		'',		'int' );		
		$this->filter_state		= $mainframe->getUserStateFromRequest( "$option.filter_state",		'filter_state',		'',		'word' );
		$this->search				= $mainframe->getUserStateFromRequest( "$option.search",			'search',			'',		'string' );
		$this->search				= JString::strtolower( $this->search );

		$limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$limitstart	= $mainframe->getUserStateFromRequest( $option.'.limitstart', 'limitstart', 0, 'int' );
	$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
	$this->setState('limit', $limit);
	$this->setState('limitstart', $limitstart);

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);	
		
  }

function setId($id)
	{
		// Set id and wipe data
		$this->_id		= $id;
		$this->_data	= null;		

	}
	
	
function getData() 
	{
 	if (empty($this->_data)) {
		$query = $this->_buildQuery();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));
	}
	return $this->_data;
  }	

function getList()
	{
	$lists['category']	=  $this->filter_category ;	
		$lists['state']	= JHTML::_('grid.state',  $this->filter_state );
		$lists['order_Dir']	= $this->filter_order_Dir;
		$lists['order']		= $this->filter_order;
		$lists['search']= $this->search;		
		return $lists;	
	}

function getTotal()
  {
 	if (empty($this->_total)) {
 	    $query = $this->_buildQuery();
 	    $this->_total = $this->_getListCount($query);	
 	}
 	return $this->_total;
  }


function getPagination()
  {
 	if (empty($this->_pagination)) {
 	    jimport('joomla.html.pagination');
 	    $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
 	}
 	return $this->_pagination;
  }
	
function getCatChild()
	{
	$component_name = 'properties';
if(($this->filter_order)=='cyid'){$this->filter_order='ordering';}
if(($this->filter_order)=='sid'){$this->filter_order='ordering';}	
if(($this->filter_order)=='lid'){$this->filter_order='ordering';}	
if(($this->filter_order)=='cid'){$this->filter_order='ordering';}	
if(($this->filter_order)=='type'){$this->filter_order='ordering';}
if(($this->filter_order)=='title'){$this->filter_order='name';}	
if(($this->filter_order)=='parent'){$this->filter_order='ordering';}	
if(($this->filter_order)=='id'){$this->filter_order='id';}	
if(($this->filter_order)=='price'){$this->filter_order='ordering';}
if(($this->filter_order)=='featured'){$this->filter_order='ordering';}
if(($this->filter_order)=='available'){$this->filter_order='ordering';}	
if(($this->filter_order)=='agent_id'){$this->filter_order='ordering';}
if(($this->filter_order)=='ref'){$this->filter_order='ordering';}	
	$where = array();
	$comienzo=0;
	if ( $this->filter_category )
		{			
				$where[] = 'c.parent = '.$this->filter_category.' or c.id = '.$this->filter_category;	
				$comienzo=$this->filter_category;				
						
					
		}
		
		
		if ( $this->filter_state )
		{
			if ( $this->filter_state == 'P' )
			{
				$where[] = 'published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 'published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(name) LIKE \''. $this->search. '\'';
		}
		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );		
		$orderby 	= ' ORDER BY c.'. $this->filter_order .' '. $this->filter_order_Dir;		
		


		$this->_query = ' SELECT c.*'
				. ' FROM #__'.$component_name.'_category as c '
				//. $where
				//. ' where c.parent > 0 ' 
				. ' GROUP BY c.id'
				. $orderby
				;		
	$db =& $this->getDBO();	
	$db->setQuery( $this->_query );
	
	
		$rows = $db->loadObjectList();  

	// $this->_datach = $this->_getList($this->_query, $this->getState('limitstart'), $this->getState('limit'));
	 
	 $this->_datach = $this->_getList($this->_query, $this->getState('limitstart'), $this->getState('limit'));
	 	
//$rows = $this->_datach;

// establish the hierarchy of the menu
		$children = array();
		// first pass - collect children
		foreach ($rows as $v )
		{
			$pt = $v->parent;
			$list = @$children[$pt] ? $children[$pt] : array();
			array_push( $list, $v );
			$children[$pt] = $list;
		}
		
		
		// second pass - get an indent list of the items
		$list = JHTML::_('menu.treerecurse', $comienzo, '', array(), $children, max( 1, 100 ) );
		// eventually only pick out the searched items.
	
$total = count( $list );


		jimport('joomla.html.pagination');
		$this->_pagination = new JPagination( $total, $limitstart, $limit );

		// slice out elements based on limits
		$list = array_slice( $list, $this->_pagination->limitstart, $this->_pagination->limit );

		$i = 0;
		$query = array();
		foreach ( $list as $mitem )
		{
			$edit = '';
			switch ( $mitem->type )
			{
				case 'separator':
					$list[$i]->descrip 	= JText::_('Separator');
					break;

				case 'url':
					$list[$i]->descrip 	= JText::_('URL');
					break;

				case 'menulink':
					$list[$i]->descrip 	= JText::_('Menu Link');
					break;

				case 'component':
					$list[$i]->descrip 	= JText::_('Component');
					$query 			= parse_url($list[$i]->link);
					$view = array();
					if(isset($query['query'])) {
						if(strpos($query['query'], '&amp;') !== false)
						{
						   $query['query'] = str_replace('&amp;','&',$query['query']);
						}
						parse_str($query['query'], $view);
					}
					$list[$i]->view		= $list[$i]->com_name;
					if (isset($view['view']))
					{
						$list[$i]->view	.= ' &raquo; '.JText::_(ucfirst($view['view']));
					}
					if (isset($view['layout']))
					{
						$list[$i]->view	.= ' / '.JText::_(ucfirst($view['layout']));
					}
					if (isset($view['task']) && !isset($view['view']))
					{
						$list[$i]->view	.= ' :: '.JText::_(ucfirst($view['task']));
					}
					break;

				default:
					$list[$i]->descrip 	= JText::_('Unknown');
					break;
			}
			$i++;
		}

		$items = $list;
		return $items;
	}





 
 function &getCategory()	
	{					
		$query = ' SELECT * FROM #__properties_category '.
					'  WHERE id = '.$this->_id;
			
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;		
		}
	
		return $this->_data;
	}
 
 
 
 
 
 	function store($data)
	{			
	$row =& $this->getTable('category');
		
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());			
			
			return false;
		}
		
		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());			
			
			return false;
		}
		
		if (!$row->store()) {
			$this->setError( $this->_db->getErrorMsg() );

			return false;
		}
		
		if($TableName=='profiles'){
		$this->Notification();	
		}
		
		return true;
	}

	function delete()
	{
	
	
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
$TableName 	= 'category';
	$row =& $this->getTable($TableName);

  
  
		if (count( $cids )) {
			foreach($cids as $cid) {
				if (!$row->delete( $cid )) {
					$this->setError( $row->getErrorMsg() );					
					return false;
				}				
			}
		}
		return true;
	}

function orderItem($item, $movement)
	{
		$row =& $this->getTable('category');
		$row->load( $item );
		if (!$row->move( $movement , ' parent = '.(int) $row->parent)) {
			$this->setError($row->getError());
			return false;
		}
		//JError::raiseError(500, $movement  .'id = '.$item );
		// clean cache
	
		
		return true;
	}

function getLastModif()
	{
	$TableName 	= 'category';
		 $query = ' SELECT id FROM #__properties_'.$TableName.' ORDER BY id desc LIMIT 1';
	 $this->_db->setQuery( $query );	
			$this->_data = $this->_db->loadResult();
	
	//print_r($this->_data);
	 return $this->_data;


	}

 
  
}