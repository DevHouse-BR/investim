<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );

class PropertiesModelProfile extends JModel
{

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;

  }


function getItemid()
	{
	$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=properties"';
				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();
		
		return $this->row;
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


  
  
function getProfile() 
  {     
  $user =& JFactory::getUser();
  $queryP = ' SELECT * FROM #__properties_profiles '.
					'  WHERE mid = '.$user->id;
	$this->_db->setQuery( $queryP );
	$this->_data = $this->_db->loadObject();
//echo $queryP;	
	return $this->_data;								
					
  }				
					
					
}//fin clase