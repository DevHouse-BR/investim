<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class PropertiesModelBookings extends JModel
{
	var $_data;
	var $TableName = null;	
	var $_total = null;
	var $_pagination = null;
function _buildQuery()
	{
	
if(($this->filter_order)=='name'){$this->filter_order='s.name';}	
if(($this->filter_order)=='parent'){$this->filter_order='s.parent';}	
if(($this->filter_order)=='id'){$this->filter_order='s.id';}	
if(($this->filter_order)=='published'){$this->filter_order='s.published';}	
		$where = array();
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
		
		$this->_query = ' SELECT ob.*, p.name, p.image1, p.ref, p.id '
				. ' FROM #__properties_order_bookings AS ob '
				. ' LEFT JOIN #__properties_bookings AS b ON b.bid_order = ob.id_order'
				. ' LEFT JOIN #__properties_products AS p ON p.id = ob.id_property'	
				//. $where
				. ' GROUP BY ob.id_order'
				//. $orderby
				;		
        
        return $this->_query;		
	}
	



function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;

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

function getOrder()
	{
	
	$array = JRequest::getVar('cid',  0, '', 'array');
		$this->Id=((int)$array[0]);
	$query = ' SELECT ob.* ,u.* ,b.* ,p.name as name_property ,p.image1 ,p.ref '
				. ' FROM #__properties_order_bookings AS ob '
				. ' LEFT JOIN #__properties_bookings AS b ON b.bid_order = ob.id_order'
				. ' LEFT JOIN #__properties_products AS p ON p.id = ob.id_property'
				. ' LEFT JOIN #__users AS u ON u.id = ob.user_created '	
				. ' WHERE ob.id_order = '.$this->Id;				
				;		
	$this->_db->setQuery( $query );
	$this->_data = $this->_db->loadObject();
	
	return $this->_data;
	
	}
  
}//fin clase