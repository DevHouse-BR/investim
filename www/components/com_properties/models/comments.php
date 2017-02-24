<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class PropertiesModelComments extends JModel
{

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;
  }
	

function store($data,$TableName)
	{	
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_properties'.DS.'tables');

	$row =& JTable::getInstance($TableName, 'Table');
	
		// Bind the form fields to the hello table
		if (!$row->bind($data)) {
			 $this->setError( $this->_db->getErrorMsg() );
			echo $this->_db->getErrorMsg();
			return false;
		}

		// Make sure the hello record is valid
		if (!$row->check()) {
			$this->setError( $this->_db->getErrorMsg() );
			echo $this->_db->getErrorMsg();
			return false;
		}

		// Store the web link table to the database
		if (!$row->store()) {
			$this->setError( $this->_db->getErrorMsg() );	
			echo $this->_db->getErrorMsg();		
			return false;
		}

		return true;
	}

  
}//fin clase