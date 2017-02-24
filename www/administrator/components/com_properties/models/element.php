<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class PropertiesModelElement extends JModel
{
	var $_data;
	var $TableName = null;	
	
function _buildQuery()
	{
	$TableName 	= JRequest::getVar('table');
switch ($TableName)
{		

case 'state':
	if(($this->filter_order)=='name'){$this->filter_order='s.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='s.parent';}	
if(($this->filter_order)=='id'){$this->filter_order='s.id';}
if(($this->filter_order)=='cyid'){$this->filter_order='s.parent';}	
if(($this->filter_order)=='published'){$this->filter_order='s.published';}	
		$where = array();
		
		if ( $this->filter_country )
		{			
				$where[] = 's.parent = '.$this->filter_country;			
		}
		
		if ( $this->filter_state )
		{
			if ( $this->filter_state == 'P' )
			{
				$where[] = 's.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 's.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(s.name) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;
		
		$this->_query = ' SELECT s.*,y.name as name_country, '
				. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sslug '
				. ' FROM #__properties_state AS s '
				. ' INNER JOIN #__properties_country AS y ON y.id = s.parent'		
				. $where
				. ' GROUP BY s.id'
				. $orderby
				;			

    break;
	
	case 'locality':
	
	if(($this->filter_order)=='name'){$this->filter_order='l.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='l.parent';}	
if(($this->filter_order)=='id'){$this->filter_order='l.id';}	
if(($this->filter_order)=='cyid'){$this->filter_order='s.parent';}
if(($this->filter_order)=='published'){$this->filter_order='l.published';}	
		$where = array();
		
		if ( $this->filter_country )
		{			
				$where[] = 's.parent = '.$this->filter_country;			
		}
		if ( $this->filter_sid )
		{			
				$where[] = 'l.parent = '.$this->filter_sid;			
		}
		
		if ( $this->filter_state )
		{
			if ( $this->filter_state == 'P' )
			{
				$where[] = 'l.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 'l.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(l.name) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;
		
		$this->_query = ' SELECT l.*,s.parent,s.name as name_state,y.name as name_country,'
				. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sslug, '
				. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '
				. ' FROM #__properties_locality AS l '
				. ' INNER JOIN #__properties_state AS s ON s.id = l.parent'	
				. ' INNER JOIN #__properties_country AS y ON s.parent = y.id'	
				. $where
				. ' GROUP BY l.id'
				. $orderby
				;	
				
	break;

		case 'category':		
if(($this->filter_order)=='name'){$this->filter_order='name';}	
if(($this->filter_order)=='parent'){$this->filter_order='parent';}	
if(($this->filter_order)=='id'){$this->filter_order='id';}	
if(($this->filter_order)=='published'){$this->filter_order='published';}	
if(($this->filter_order)=='ordering'){$this->filter_order='ordering';}	
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
		break;	
		case 'type':		
if(($this->filter_order)=='name'){$this->filter_order='name';}	
if(($this->filter_order)=='parent'){$this->filter_order='parent';}	
if(($this->filter_order)=='id'){$this->filter_order='id';}	
if(($this->filter_order)=='published'){$this->filter_order='published';}	
if(($this->filter_order)=='ordering'){$this->filter_order='ordering';}	
		$where = array();
		if ( $this->filter_state )
		{
			if ( $this->filter_state == 'P' )
			{
				$where[] = 't.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 't.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(t.name) LIKE \''. $this->search. '\'';
		}
		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );		
		$orderby 	= ' ORDER BY t.'. $this->filter_order .' '. $this->filter_order_Dir;		
		$this->_query = ' SELECT t.*, c.name as name_parent'
				. ' FROM #__properties_type AS t '
				. ' LEFT JOIN #__properties_category AS c ON c.id = t.parent'
				. $where
				//. ' GROUP BY t.id_categoria'
				. $orderby
				;				
		break;	
		case 'products':	
		
	
if(($this->filter_order)=='name'){$this->filter_order='name';}	
if(($this->filter_order)=='parent'){$this->filter_order='parent';}	
if(($this->filter_order)=='id'){$this->filter_order='id';}	
if(($this->filter_order)=='published'){$this->filter_order='published';}	
		$where = array();
		if ( $this->filter_locality )
		{
			
				$where[] = 'r.lid = '.$this->filter_locality;
			
		}
		if ( $this->filter_category )
		{
			
				$where[] = 'r.cid = '.$this->filter_category;
			
		}
		if ( $this->filter_state )
		{
			if ( $this->filter_state == 'P' )
			{
				$where[] = 'r.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 'r.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(r.nombre_producto) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY r.'. $this->filter_order .' '. $this->filter_order_Dir;
		//$orderby 	.= 
		$this->_query = ' SELECT r.* ,'
			.'  t.name AS name_category, ty.name as name_type, '
			.' s.name AS name_state, l.name AS name_locality, y.name AS name_country '			
			. ' FROM #__properties_products AS r'
			. ' LEFT JOIN #__properties_category AS t ON t.id = r.cid'	
			. ' LEFT JOIN #__properties_type AS ty ON ty.id = r.type'	
			. ' LEFT JOIN #__properties_locality AS l ON l.id = r.lid'
			. ' LEFT JOIN #__properties_state AS s ON s.id = r.sid '
			. ' LEFT JOIN #__properties_country AS y ON y.id = s.parent '
			. $where
			//. ' GROUP BY r.id'
			. $orderby
			;		
				
//echo str_replace('#_','jos',$this->_query);

		break;
		
        }		
		
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
		$this->filter_locality		= $mainframe->getUserStateFromRequest( "$option.filter_locality",		'filter_locality',		'',		'int' );
		$this->filter_country		= $mainframe->getUserStateFromRequest( "$option.filter_country",		'filter_country',		'',		'int' );
		$this->filter_category		= $mainframe->getUserStateFromRequest( "$option.filter_category",		'filter_category',		'',		'int' );
		$this->filter_state		= $mainframe->getUserStateFromRequest( "$option.filter_state",		'filter_state',		'',		'word' );
		$this->search				= $mainframe->getUserStateFromRequest( "$option.search",			'search',			'',		'string' );
		$this->search				= JString::strtolower( $this->search );

		$limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$limitstart	= $mainframe->getUserStateFromRequest( $option.'.limitstart', 'limitstart', 0, 'int' );
	$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
	$this->setState('limit', $limit);
	$this->setState('limitstart', $limitstart);


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
	// state filter
	$lists['country']	=  $this->filter_country ;
	$lists['locality']	=  $this->filter_locality ;
	$lists['category']	=  $this->filter_category ;
	
	
		$lists['state']	= JHTML::_('grid.state',  $this->filter_state );

		// table ordering
		$lists['order_Dir']	= $this->filter_order_Dir;
		$lists['order']		= $this->filter_order;

		// search filter
		$lists['search']= $this->search;
		
		return $lists;
	
	}

function getTotal()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_total)) {
 	    $query = $this->_buildQuery();
 	    $this->_total = $this->_getListCount($query);	
 	}
 	return $this->_total;
  }


function getPagination()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_pagination)) {
 	    jimport('joomla.html.pagination');
 	    $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
 	}
 	return $this->_pagination;
  }
	
function getCatChild()
	{	
if(($this->filter_order)=='name'){$this->filter_order='name';}	
if(($this->filter_order)=='parent'){$this->filter_order='parent';}	
if(($this->filter_order)=='id'){$this->filter_order='id';}	
if(($this->filter_order)=='published'){$this->filter_order='published';}	
if(($this->filter_order)=='ordering'){$this->filter_order='ordering';}	
				$where = array();
		if ( $this->filter_category )
		{
			
				$where[] = 'c.parent = '.$this->filter_category;
			
		}
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
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;		
		$this->_query = ' SELECT c.*'
				. ' FROM #__properties_category AS c '
				. $where
				. ' GROUP BY c.id'
				. $orderby
				;							
 
	 $this->_datach = $this->_getList($this->_query, $this->getState('limitstart'), $this->getState('limit'));

		$children = array();
		$rows = $this->_datach;
		foreach ($rows as $v )
		{
			$pt = $v->parent;
			$list = @$children[$pt] ? $children[$pt] : array();
			array_push( $list, $v );
			$children[$pt] = $list;
		}
		$list = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0 );

	return $list;
	}





function getTotalproducts() 
  {   
 	$query = 'SELECT COUNT(id) FROM #__properties_products ';				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();	

		return $this->row;
  }
  
function getTotalcategories() 
  {   
 	$query = 'SELECT COUNT(id) FROM #__properties_category ';				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();	

		return $this->row;
  }

function getTotaltypes() 
  {   
 	$query = 'SELECT COUNT(id) FROM #__properties_type ';				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();	

		return $this->row;
  }
  
  
function getTotalagents() 
  {   
 	$query = 'SELECT COUNT(id) FROM #__users WHERE gid = 21 ';				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();	

		return $this->row;
  }
  
  
function getTotalpublisher() 
  {   
 	$query = 'SELECT p.*  FROM jos_properties_products as p INNER JOIN jos_properties_profiles as pf on pf.mid = p.agent_id INNER JOIN jos_users as u on u.id = p.agent_id where u.gid = 18';
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();	
//echo str_replace('#_','jos',$query);
		return $this->row;
  }
  
  
function getTotalregistered() 
  {   
 	$query = 'SELECT COUNT(id) FROM #__users WHERE gid = 18 ';				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();	

		return $this->row;
  }
  
  
function getMorevisited() 
  {   
 	$query = 'SELECT MAX(p.hits) AS hits, p.* FROM #__properties_products AS p GROUP BY p.id ORDER BY p.hits DESC LIMIT 10';				
		//$this->_db->setQuery( $query );
		$this->row = $this->_getList($query);

		return $this->row;
  }
  
  
}//fin clase