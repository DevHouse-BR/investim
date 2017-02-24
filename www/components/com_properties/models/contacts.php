<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class PropertiesModelContacts extends JModel
{
	

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );


  }


function getItemid()
	{
	$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=properties"';
				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadObject();
		
		return $this->row;
	}	
	

function store($data,$TableName)
	{	
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_properties'.DS.'tables');

	$row =& JTable::getInstance($TableName, 'Table');
	
		// Bind the form fields to the hello table
		if (!$row->bind($data)) {
			 $this->setError( $this->_db->getErrorMsg() );
			echo $this->_db->getErrorMsg();
			//JError::raiseError(500, $this->_db->getErrorMsg() );
			return false;
		}

		// Make sure the hello record is valid
		if (!$row->check()) {
			$this->setError( $this->_db->getErrorMsg() );
			echo $this->_db->getErrorMsg();
			//JError::raiseError(500, $this->_db->getErrorMsg() );
			return false;
		}

		// Store the web link table to the database
		if (!$row->store()) {
			$this->setError( $this->_db->getErrorMsg() );	
			echo $this->_db->getErrorMsg();	
			//	JError::raiseError(500, $this->_db->getErrorMsg() );
			return false;
		}

		return true;
	}

  
}//fin clase