<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );

class PropertiesModelPanel extends JModel
{
	var $_data;
	var $TableName = null;	
var $_total = null;
var $_pagination = null;














function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;
	$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$this->AmountPanel = $params->get( 'AmountPanel' ) ;

$this->filter_order		= null;
		$this->filter_order		= $mainframe->getUserStateFromRequest( "$option.filter_order",		'filter_order',	'ordering' ,	'cmd' );
		$this->filter_order_Dir	= $mainframe->getUserStateFromRequest( "$option.filter_order_Dir",	'filter_order_Dir',	'',		'word' );
		$this->filter_country		= $mainframe->getUserStateFromRequest( "$option.filter_country",		'filter_country',		'',		'int' );
		$this->filter_sid		= $mainframe->getUserStateFromRequest( "$option.filter_sid",		'filter_sid',		'',		'int' );
		$this->filter_locality		= $mainframe->getUserStateFromRequest( "$option.filter_locality",		'filter_locality',		'',		'int' );		
		$this->filter_category		= $mainframe->getUserStateFromRequest( "$option.filter_category",		'filter_category',		'',		'int' );
		$this->filter_type= $mainframe->getUserStateFromRequest( "$option.filter_type",		'filter_type',		'',		'int' );
		$this->filter_featured= $mainframe->getUserStateFromRequest( "$option.filter_featured",		'filter_featured',		'',		'int' );
		$this->filter_state		= $mainframe->getUserStateFromRequest( "$option.filter_state",		'filter_state',		'',		'word' );
		$this->search				= $mainframe->getUserStateFromRequest( "$option.search",			'search',			'',		'string' );
		$this->search				= JString::strtolower( $this->search );

		$limit		= $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
		$limitstart	= $mainframe->getUserStateFromRequest( $option.'.limitstart', 'limitstart', 0, 'int' );
	$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);
	$this->setState('limit', $limit);
	$this->setState('limitstart', $limitstart);

		$array = JRequest::getVar('cid',  0, '', 'array');
		
		
  }
  
  
  
  
  

  

function _buildQueryPanel()
	{	
 	$user =& JFactory::getUser();	
	
	
	
	//$this->filter_order='id';	
if(is_numeric($this->filter_order)){$this->filter_order='name';}		
	if(($this->filter_order)=='name'){$this->filter_order='name';}	
if(($this->filter_order)=='title'){$this->filter_order='name';}
if(($this->filter_order)=='ordering'){$this->filter_order='ordering';}	
if(($this->filter_order)=='parent'){$this->filter_order='parent';}
if(($this->filter_order)=='cid'){$this->filter_order='cid';}	
if(($this->filter_order)=='id'){$this->filter_order='id';}	
if(($this->filter_order)=='published'){$this->filter_order='published';}	

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
				$where[] = 'p.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 'p.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(p.name) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY p.'. $this->filter_order .' '. $this->filter_order_Dir;
		
		
		
		
			$this->_query = ' SELECT p.*,c.name as name_category,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile,t.name as name_type, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sdslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_category AS c ON c.id = p.cid '
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '				
				//. ' WHERE p.published = 1 '	
				. ' WHERE p.agent_id = '.$user->id
			//	. $this->sqlProvincia.' '
			//	. $this->sqlProvinciaDefecto.' '
			//	. $this->sqlCiudad.' '
			//	. $this->sqlSector.' '
			//	. $this->sqlCategoria.' '
			. $where
			. ' GROUP BY p.id'
			. $orderby
			;									
				
				
				//	$querysl = ' SELECT p.*,lb.* FROM #__properties_products AS p LEFT JOIN  #__properties_lightbox AS lb ON p.agent_id = lb.uid WHERE lb.propid = p.id AND lb.uid = '.$user->id;
					
//echo str_replace('#_','jos',$this->_query);
        return $this->_query;		
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
	
	
	
	
	
	

function getItemid()
	{
	$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=properties"';
				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();
		
		return $this->row;
	}	
		
function getProductUser() 
		{
		$user =& JFactory::getUser();
$query = ' SELECT p.*,c.name as name_category,cy.name as name_country,s.name as name_state,l.name as name_locality, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sdslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_category AS c ON c.id = p.parent '
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				//. ' WHERE p.published = 1 '	
				. ' WHERE p.agent_id = '.$user->id;
			
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
			//echo '$this->_id; '.$this->_id;
			//echo str_replace('#_','jos',$query);
			return $this->_data;
		}

function getProductEdit() 
		{
		$id=JRequest::getVar('id');
		$user =& JFactory::getUser();
$query = ' SELECT p.*,c.name as name_category,cy.name as name_country,s.name as name_state,l.name as name_locality,t.name as name_type, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sdslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_category AS c ON c.id = p.parent '
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				//. ' WHERE p.published = 1 '	
				. ' WHERE p.id = '.$id;
			
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
			//echo '$this->_id; '.$this->_id;
			//echo str_replace('#_','jos',$query);
			return $this->_data;
		}





function getDataAgent() 
  {  
  $Agent=JRequest::getVar('aid');
 	// if data hasn't already been obtained, load it
 	$queryA = 'SELECT * FROM #__properties_profiles ' .
			' WHERE mid = '.$Agent;
				
		$this->_db->setQuery( $queryA );
		$this->row = $this->_db->loadObject();
		
		return $this->row;
  }




function getDataSearch() 
  {  
 	// if data hasn't already been obtained, load it
 	if (empty($this->_data)) {	
 	    $query = $this->_buildQuerySearch();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));	 	
	}
 	return $this->_data;
  }
  
function getTotalSearch()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_total)) {
 	    $queryS = $this->_buildQuerySearch();
 	    $this->_total = $this->_getListCount($queryS);	
 	}
 	return $this->_total;
  }

function getPaginationSearch()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_pagination)) {
 	    jimport('joomla.html.pagination');
 	    $this->_pagination = new JPagination($this->getTotalSearch(), $this->getState('limitstart'), $this->getState('limit') );		
		
 	}
 	return $this->_pagination;
  }
  

   







function getDataPanel() 
  {    
  $querysl = $this->_buildQueryPanel();
	$this->_db->setQuery( $querysl );
	$this->_data = $this->_getList($querysl, $this->getState('limitstart'), $this->getState('limit'));
	return $this->_data;
  }
  
 function getTotalPanel()
  {
 	if (empty($this->_total)) {
	$querysl = $this->_buildQueryPanel();
// 	    $querysl = ' SELECT p.*,lb.* FROM #__properties_products AS p LEFT JOIN  #__properties_lightbox AS lb ON p.agent_id = lb.uid WHERE lb.propid = p.id AND lb.uid = '.$user->id;
			
 	    $this->_total = $this->_getListCount($querysl);	
 	}
 	return $this->_total;
  }  
  
 function getPaginationPanel()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_pagination)) {
 	    //jimport('joomla.html.pagination');
 	    require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagination.php' );
		$this->_pagination = new JPagination($this->getTotalPanel(), $this->getState('limitstart'), $this->getState('limit') );		
		
 	}
 	return $this->_pagination;
  } 
  
  
function getProfile() 
  {     
  $user =& JFactory::getUser();
  $queryP = ' SELECT * FROM #__properties_profiles '.
					'  WHERE mid = '.$user->id;
	$this->_db->setQuery( $queryP );
	$this->_data = $this->_db->loadObject();
	
	return $this->_data;								
					
  }				
					
function getCant_items() 
  {     
  $user =& JFactory::getUser();
  $queryT = ' SELECT COUNT(id) FROM #__properties_products '.
					'  WHERE agent_id = '.$user->id;
	$this->_db->setQuery( $queryT );
	$this->_data = $this->_db->loadResult();
	return $this->_data;								
					
  }	
  					
}//fin clase