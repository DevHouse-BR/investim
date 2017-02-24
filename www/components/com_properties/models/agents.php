<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );

class PropertiesModelAgents extends JModel
{

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;

  }

function _buildQuery()
	{	
	if(JRequest::getVar('ShowOrderBy')){
	$ShowOrderByDefault = JRequest::getVar('ShowOrderBy');}	
	switch ($ShowOrderByDefault)
	{
	case 1: $o='name';
	break;
	case 2: $o='locality';
	break;	
	default: $o='name';
	break;
	}
	$this->sqlShowOrderBy = ' ORDER BY '.$o;			
	if(JRequest::getVar('order')){	$this->sqlOrder=JRequest::getVar('order');}else{$this->sqlOrder='asc';}
	
	$this->_query = 'SELECT * FROM #__properties_profiles '
					.' WHERE `show` = 1 '
					. $this->sqlShowOrderBy .' '.$this->sqlOrder
					;	
	return $this->_query;		
}

function getItemid()
	{
	$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=agents"';
				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();
		
		return $this->row;
	}	

function getData() 
  {  
 	// if data hasn't already been obtained, load it
 	if (empty($this->_data)) {	
 	    $query = $this->_buildQuery();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));	 	
	}
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
 	    require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagination.php' );
 	    $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );		
		
 	}
 	return $this->_pagination;
  }					
					
}//fin clase