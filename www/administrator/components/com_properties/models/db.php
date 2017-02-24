<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class PropertiesModelDb extends JModel
{
	var $_data;
	var $TableName = null;	
	
function _buildQuery($thisTableName)
	{
		
switch ($thisTableName)
{		
		case 'category':		
if(($this->filter_order)=='name'){$this->filter_order='c.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='c.parent';}	
if(($this->filter_order)=='id'){$this->filter_order='c.id';}	
if(($this->filter_order)=='published'){$this->filter_order='c.published';}	
if(($this->filter_order)=='ordering'){$this->filter_order='c.ordering';}	
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
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;		
		$this->_query = ' SELECT c.*'
				. ' FROM #__properties_category AS c '
				. $where
				//. ' GROUP BY t.id_categoria'
				. $orderby
				;				
		break;	

		case 'type':		
if(($this->filter_order)=='name'){$this->filter_order='t.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='t.parent';}	
if(($this->filter_order)=='id'){$this->filter_order='t.id';}	
if(($this->filter_order)=='published'){$this->filter_order='t.published';}	
if(($this->filter_order)=='ordering'){$this->filter_order='t.ordering';}	
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
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;		
		$this->_query = ' SELECT t.*, c.name as name_parent'
				. ' FROM #__properties_type AS t '
				. ' LEFT JOIN #__properties_category AS c ON c.id = t.parent'
				. $where
				//. ' GROUP BY t.id_categoria'
				. $orderby
				;				
		break;	
	
		case 'products':
/*$this->filter_order='r.id';	*/	
if(($this->filter_order)=='ordering'){$this->filter_order='r.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='r.parent';}
if(($this->filter_order)=='cid'){$this->filter_order='r.cid';}	
if(($this->filter_order)=='id'){$this->filter_order='r.id';}	
if(($this->filter_order)=='published'){$this->filter_order='r.published';}	
		$where = array();
		if ( $this->filter_category )
		{			
				$where[] = 'r.cid = '.$this->filter_category;			
		}
		if ( $this->filter_type )
		{			
				$where[] = 'r.type = '.$this->filter_type;			
		}
		if ( $this->filter_country)
		{			
				$where[] = 'r.cyid = '.$this->filter_country;			
		}
		if ( $this->filter_sid )
		{			
				$where[] = 'r.sid = '.$this->filter_sid;			
		}
		if ( $this->filter_locality )
		{			
				$where[] = 'r.lid = '.$this->filter_locality;			
		}
		if ( $this->filter_featured )
		{			
			if ( $this->filter_featured == 1 )
			{
				$where[] = 'r.featured = 1';
			}
			else if ($this->filter_featured == 9 )
			{
				$where[] = 'r.featured = 0';
			}			
						
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
			$where[] = 'LOWER(r.name) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;
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
			. ' GROUP BY r.id'
			. $orderby
			;		
				
//echo str_replace('#_','jos',$this->_query);

				
		break;	
		
		case 'country':
		
if(($this->filter_order)=='name'){$this->filter_order='y.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='y.parent';}	
if(($this->filter_order)=='id'){$this->filter_order='y.id';}	
if(($this->filter_order)=='published'){$this->filter_order='y.published';}	
		$where = array();
		
		if ( $this->filter_state )
		{
			if ( $this->filter_state == 'P' )
			{
				$where[] = 'y.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 'y.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(y.name) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;
		
		$this->_query = ' SELECT y.*'
				. ' FROM #__properties_country AS y '
				. $where
				. ' GROUP BY y.id'
				. $orderby
				;		
				
		break;	
        
		
		case 'state':		
if(($this->filter_order)=='name'){$this->filter_order='s.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='s.parent';}	
if(($this->filter_order)=='id'){$this->filter_order='s.id';}	
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
		
		$this->_query = ' SELECT s.*,y.name as name_country '
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
if(($this->filter_order)=='cid'){$this->filter_order='y.name';}
if(($this->filter_order)=='id'){$this->filter_order='l.id';}	
if(($this->filter_order)=='published'){$this->filter_order='l.published';}	

		$where = array();
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
		
		$this->_query = ' SELECT l.*,s.parent,s.name as name_state,y.name as name_country'
				. ' FROM #__properties_locality AS l '
				. ' INNER JOIN #__properties_state AS s ON s.id = l.parent'	
				. ' INNER JOIN #__properties_country AS y ON s.parent = y.id'	
				. $where
				. ' GROUP BY l.id'
				. $orderby
				;		
				//echo str_replace('#_','jos',$this->_query);
		break;	
		case 'profiles':		
if(($this->filter_order)=='name'){$this->filter_order='pf.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='pf.parent';}	
if(($this->filter_order)=='id'){$this->filter_order='pf.id';}	
if(($this->filter_order)=='published'){$this->filter_order='pf.published';}	
		$where = array();
		if ( $this->filter_state )
		{
			if ( $this->filter_state == 'P' )
			{
				$where[] = 'pf.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 'pf.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(pf.name) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;
		
		$this->_query = ' SELECT pf.*,u.name as name_user '
				. ' FROM #__properties_profiles AS pf '
				. ' INNER JOIN #__users AS u ON u.id = pf.mid'		
				. $where
				. ' GROUP BY pf.id'
				. $orderby
				;		
				
		break;	
		
		case 'contacts':
		
	if($this->filter_order=='ordering'){$this->filter_order='form_id';}
		$where = array();
		
		
		if ($this->search)
		{
			$where[] = 'LOWER(y.name) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;
		
		$this->_query = ' SELECT * '
				. ' FROM #__properties_contacts '
				. $where
				. ' GROUP BY form_id '
				. $orderby
				;		
				
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

	

  }

function getProducts() 
	{
 	if (empty($this->_data)) {
		$query = $this->_buildQuery('products');
 	    $this->_data = $this->_getList($query);
	}
	return $this->_data;
  }	



function getCategories() 
	{
 	if (empty($this->_data)) {
		$query = $this->_buildQuery('category');
 	    $this->_data = $this->_getList($query);
	}
	return $this->_data;
  }	
  
  
  
  function getTypes() 
	{
 	if (empty($this->_data)) {
		$query = $this->_buildQuery('type');
 	    $this->_data = $this->_getList($query);
	}
	return $this->_data;
  }	
  
  
  
  function getContacts() 
	{
 	if (empty($this->_data)) {
		$query = $this->_buildQuery('contacts');
 	    $this->_data = $this->_getList($query);
	}
	return $this->_data;
  }	
  
  
  
  
function getList()
	{
	// state filter
	$lists['country']	=  $this->filter_country ;	
	$lists['category']	=  $this->filter_category ;
	$lists['sid']	=  $this->filter_sid ;
	$lists['locality']	=  $this->filter_locality ;
	$lists['type']	=  $this->filter_type ;
	$lists['featured']	=  $this->filter_featured ;
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