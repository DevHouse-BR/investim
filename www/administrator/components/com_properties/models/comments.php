<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class PropertiesModelComments extends JModel
{
	var $_data;
	var $TableName = null;	
	var $_total = null;
	var $_pagination = null;

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;

		$this->filter_order		= $mainframe->getUserStateFromRequest( "$option.filter_order",		'filter_order',	'ordering' ,	'cmd' );
		$this->filter_order_Dir	= $mainframe->getUserStateFromRequest( "$option.filter_order_Dir",	'filter_order_Dir',	'',		'word' );
		$this->filter_product_comment		= $mainframe->getUserStateFromRequest( "$option.filter_product_comment",		'filter_product_comment',		'',		'int' );	
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
	 
function _buildQuery()
	{
		$component_name = 'properties';	
$this->filter_order='c.id';
if(($this->filter_order)=='title'){$this->filter_order='c.title';}
if(($this->filter_order)=='name'){$this->filter_order='c.name';}	
if(($this->filter_order)=='id'){$this->filter_order='p.id';}
if(($this->filter_order)=='published'){$this->filter_order='c.published';}
if(($this->filter_order)=='ordering'){$this->filter_order='c.ordering';}

		$where = array();		
				
		if ( $this->filter_product_comment )
		{			
				$where[] = 'c.productid = '.$this->filter_product_comment;			
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
			$where[] = 'LOWER(c.title) LIKE \''. $this->search. '\'';
		}
		
		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;		
		$this->_query = ' SELECT c.*,p.name as name_product  '
				. ' FROM #__'.$component_name.'_comments AS c '	
				. ' LEFT JOIN #__'.$component_name.'_products AS p ON p.id = c.productid '						
				. $where
				. ' GROUP BY c.id'
				. $orderby
				;				
	
        return $this->_query;		
	}





function getList()
	{
	// state filter
	$lists['product_comment']	=  $this->filter_product_comment ;	
		
		// table ordering
		$lists['order_Dir']	= $this->filter_order_Dir;
		$lists['order']		= $this->filter_order;
		// search filter
		$lists['search']= $this->search;		
		return $lists;	
	}

function getData() 
  {
 	// if data hasn't already been obtained, load it
 	if (empty($this->_data)) {
 	    $query = $this->_buildQuery();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));	
 	}
	print_r($this_data);
 	return $this->_data;	
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
					
	function orderItem($item, $movement)
	{
		$row =& $this->getTable('products');
		$row->load( $item );
		if (!$row->move( $movement)) {
			$this->setError($row->getError());
			return false;
		}
		//JError::raiseError(500, $movement  .'id = '.$item );
		// clean cache
	
		
		return true;
	}
	

	function &getComment()
	{
	$component_name = 'properties';
	$id=JRequest::getVar('id');
	
	$query = ' SELECT c.*  '
				. ' FROM #__'.$component_name.'_comments AS c '							
				. ' WHERE c.id = '.$this->_id
				. ' GROUP BY c.id '
				//. $orderby
				;	
				
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
	$row =& $this->getTable('comments');
		
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
		//JError::raiseError(500, $this->setError  );
				
		return true;
	}	
	
		function delete()
	{
		
	
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
$TableName 	= 'comments';
	$row =& $this->getTable($TableName);  
  
		if (count( $cids )) {
			foreach($cids as $cid) {
				if (!$row->delete( $cid )) {
					$this->setError( $row->getErrorMsg() );	
					JError::raiseError(500, $id  );				
					return false;
				}				
			}
		}
		//JError::raiseError(500, $id  );	
		return true;
	}

function getLastModif()
	{
	$TableName 	= 'comments';
		 $query = ' SELECT id FROM #__properties_'.$TableName.' ORDER BY id desc LIMIT 1';
	 $this->_db->setQuery( $query );	
			$this->_data = $this->_db->loadResult();
	
	//print_r($this->_data);
	 return $this->_data;


	}	
	
}//fin clase