<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class PropertiesModelShortlist extends JModel
{

var $_total = null;
var $_pagination = null;

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$this->Mostrar = $params->get( 'cantidad_productos' ) ;
	
if(!JRequest::getVar('limitstart')){
	$this->setState('limit', $this->Mostrar);
	$this->setState('limitstart', 0);
}else{
	$limit = $this->Mostrar;
	$this->setState('limit', $this->Mostrar);
$limitstart = JRequest::getVar('limitstart');
$this->setState('limitstart', $limitstart);	
$start = JRequest::getVar('start');
$this->setState('start', $start);	
}
$ShowOrderByDefault=$params->get('ShowOrderByDefault');
$ShowOrderDefault=$params->get('ShowOrderDefault');

$this->filter_order		= $mainframe->getUserStateFromRequest( "$option.filter_order",		'filter_order',	$ShowOrderByDefault ,	'cmd' );
		$this->filter_order_Dir	= $mainframe->getUserStateFromRequest( "$option.filter_order_Dir",	'filter_order_Dir',	$ShowOrderDefault,		'word' );
		
  }
  

function _buildQueryShortList()
	{	
$user =& JFactory::getUser();	
	$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowOrderByDefault = $params->get( 'ShowOrderByDefault' ) ;
$ShowOrderDefault = $params->get( 'ShowOrderDefault' ) ;

	if($this->filter_order){$OrderBy = $this->filter_order;}else{$OrderBy = $ShowOrderByDefault;}
	
	switch ($OrderBy)
	{
	case 1: $o='p.refresh_time';
	break;
	case 2: $o='p.price';
	break;
	case 3: $o='c.name';
	break;
	case 4: $o='t.name';
	break;
	default: $o='p.refresh_time';
	break;
	}
		$this->sqlShowOrderBy = ' ORDER BY '.$o;			
		
		
	if($this->filter_order_Dir){	
	$this->sqlOrder=$this->filter_order_Dir;
	}else{
	$this->sqlOrder=$ShowOrderDefault;
	}
			$this->_query = ' SELECT p.*,lb.propid,lb.uid,c.name as name_category,t.name as name_type,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Tslug, '
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_category AS c ON c.id = p.cid '
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '
				. ' LEFT JOIN  #__properties_lightbox AS lb ON p.id = lb.propid '
				. ' WHERE p.published = 1 '	
				. ' AND lb.propid = p.id '
				. ' AND lb.uid = '.$user->id							
				. $this->sqlShowOrderBy .' '.$this->sqlOrder		
				;
				
				//	$querysl = ' SELECT p.*,lb.* FROM #__properties_products AS p LEFT JOIN  #__properties_lightbox AS lb ON p.agent_id = lb.uid WHERE lb.propid = p.id AND lb.uid = '.$user->id;
					
//echo str_replace('#_','jos',$this->_query);
        return $this->_query;		
}

function getItemid()
	{
	$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=properties"';
				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadObject();
		
		return $this->row;
	}	
	
   
function getDataShortList() 
  {    
  $querysl = $this->_buildQueryShortList();				
	$this->_db->setQuery( $querysl );
	$this->_data = $this->_getList($querysl, $this->getState('limitstart'), $this->getState('limit'));		
	return $this->_data;
  }
  
 function getTotalShortList()
  {
 	if (empty($this->_total)) {
	$querysl = $this->_buildQueryShortList();
// 	    $querysl = ' SELECT p.*,lb.* FROM #__properties_products AS p LEFT JOIN  #__properties_lightbox AS lb ON p.agent_id = lb.uid WHERE lb.propid = p.id AND lb.uid = '.$user->id;	
			
 	    $this->_total = $this->_getListCount($querysl);	
 	}
 	return $this->_total;
  }  
  
 function getPaginationShortList()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_pagination)) {
 	   // require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagination.php' );
 	    jimport('joomla.html.pagination');
		$this->_pagination = new JPagination($this->getTotalShortList(), $this->getState('limitstart'), $this->getState('limit') );		
		
 	}
 	return $this->_pagination;
  } 

}//fin clase