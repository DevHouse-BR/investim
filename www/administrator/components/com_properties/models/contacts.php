<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class PropertiesModelContacts extends JModel
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
		$this->_id		= $id;
		$this->_data	= null;		

	}
	
	
function _buildQuery()
	{
		$component_name = 'properties';	
if(($this->filter_order)=='cyid'){$this->filter_order='p.name';}		
if(($this->filter_order)=='title'){$this->filter_order='p.name';}
if(($this->filter_order)=='name'){$this->filter_order='p.name';}	
if(($this->filter_order)=='id'){$this->filter_order='p.id';}
if(($this->filter_order)=='published'){$this->filter_order='p.published';}
if(($this->filter_order)=='ordering'){$this->filter_order='p.ordering';}

//$this->filter_order='p.date';


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
			$where[] = 'LOWER(c.id) LIKE \''. $this->search. '\'';
		}
		
		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY '. $this->filter_order .' '. $this->filter_order_Dir;		
		$this->_query = ' SELECT c.*  '
				. ' FROM #__'.$component_name.'_contacts AS c '							
				//. $where
				. ' GROUP BY c.id'
				//. $orderby
				;				
//	echo $this->_query;
        return $this->_query;		
	}





function getList()
	{	
		$lists['state']	= JHTML::_('grid.state',  $this->filter_state );		
		$lists['order_Dir']	= $this->filter_order_Dir;
		$lists['order']		= $this->filter_order;		
		$lists['search']= $this->search;		
		return $lists;	
	}

function getData() 
  { 	
 	if (empty($this->_data)) {
 	    $query = $this->_buildQuery();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));	
 	}
	print_r($this_data);
 	return $this->_data;	
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
					
	function orderItem($item, $movement)
	{
		$row =& $this->getTable('contacts');
		$row->load( $item );
		if (!$row->move( $movement)) {
			$this->setError($row->getError());
			return false;
		}		
		return true;
	}
	

	function getContact()
	{
	$component_name = 'properties';
	
	
	$query = ' SELECT c.*  '
				. ' FROM #__'.$component_name.'_contacts AS c '							
				. ' WHERE c.id = '.$this->_id
				. ' GROUP BY c.id '
				//. $orderby
				;	
				
	$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();			
	return $this->_data;
	
	}	
	
	
	
function delete()
	{

		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$row =& $this->getTable('contacts');		
			
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
	
	
}//fin clase