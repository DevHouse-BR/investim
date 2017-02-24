<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.model');
jimport('joomla.filesystem.file');
class PropertiesModelProperty extends JModel
{

	function __construct()
	{
		parent::__construct();
		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);		
		$this->TableName = JRequest::getCmd('table');
	}

	function setId($id)
	{
		// Set id and wipe data
		$this->_id		= $id;
		$this->_data	= null;		

	}

	function DameQuery($tbl)
		{	
		
switch ($tbl)
{	
	case 'category' :
		$this->_query = ' SELECT * FROM #__properties_category '.
					'  WHERE id = '.$this->_id;
	break;
	case 'type' :
		$this->_query = ' SELECT * FROM #__properties_type '.
					'  WHERE id = '.$this->_id;
	break;
	case 'products' :						
	$this->_query = ' SELECT r.* ,'
			.'  t.name AS name_category, ty.name as name_type, '
			.' s.name AS name_state, l.name AS name_locality, y.name AS name_country '			
			. ' FROM #__properties_products AS r'
			. ' LEFT JOIN #__properties_category AS t ON t.id = r.cid'	
			. ' LEFT JOIN #__properties_type AS ty ON ty.id = r.type'	
			. ' LEFT JOIN #__properties_locality AS l ON l.id = r.lid'
			. ' LEFT JOIN #__properties_state AS s ON s.id = r.sid '
			. ' LEFT JOIN #__properties_country AS y ON y.id = s.parent '
				. ' WHERE r.id = '.$this->_id;
					
				
	break;
	case 'country' :
		$this->_query = ' SELECT * FROM #__properties_country '.
					'  WHERE id = '.$this->_id;
	break;
	case 'state' :
		$this->_query = ' SELECT * FROM #__properties_state '.
					'  WHERE id = '.$this->_id;
	break;
	case 'locality' :
		$this->_query = ' SELECT l.* '
				. ' FROM #__properties_locality AS l '			
				. '  WHERE l.id = '.$this->_id;			
	break;	
	case 'profiles' :
		$this->_query = ' SELECT * FROM #__properties_profiles '.
					'  WHERE id = '.$this->_id;
	break;
	
}		

			return $this->_query;
		}	 
		


function &getData()	
	{
	$this->TableName = JRequest::getCmd('table');
		
		if (empty( $this->_data )) {
				
		$query = $this->DameQuery($this->TableName);	
			
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			

		$this->_data->id = null;

	
		

		}
		return $this->_data;
	}

	function store($data)
	{	
		$TableName = JRequest::getVar('table');
	$row =& $this->getTable($TableName);


if($data==''){		$data = JRequest::get( 'post' );}
		
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
		if($TableName=='profiles'){
		$this->Notification();	
		}
		return true;
	}

	function storeconfig($data)
	{	
		global $mainframe;
$db		= & JFactory::getDBO();
$row = & JTable::getInstance('component');
		
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
		return true;
	}

	function update($data)
	{	

		$TableName 	= JRequest::getVar('table');
	$row =& $this->getTable($TableName);
if($data==''){
		$data = JRequest::get( 'post' );
}
$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );

if (count( $cids )) {
			foreach($cids as $cid) {
			
				if (!$row->store( $cid )) {
					$this->setError( 'print row'.print_r($row) );
										
					return false;
				}
			}
		}

		
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		
		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		

		return true;
	}
	
	
	function Notification()
	{			
		global $mainframe;
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
		$subject		= JURI::base();
		$body= JText::_('Your profile update, you can add various products.');
		if(!JUtility::sendMail($mailfrom, $fromname, 'admin@com-property.com', $subject, $body)){};		
						
	}

	function delete()
	{
	
	
	$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
	$TableName 	= JRequest::getVar('table');
	$row =& $this->getTable($TableName);

  
  
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
function getLastModif()
	{
	$TableName 	= JRequest::getVar('table');
		 $query = ' SELECT id FROM #__properties_'.$TableName.' ORDER BY id desc LIMIT 1';
	 $this->_db->setQuery( $query );	
			$this->_data = $this->_db->loadResult();
	
	print_r($this->_data);
	 return $this->_data;


	}


function deleteimg()
	{
			$campo =  'image'.JRequest::getVar('borrar');
			$des = 'image'.JRequest::getVar('borrar').'desc';			
		
			$TableName 	= JRequest::getVar('table');
			$row =& $this->getTable($TableName); 

			$dataimg['id']=  JRequest::getVar('id');
			$dataimg[$campo]=  '';
			$dataimg[$des]=  '';

		 $query = ' SELECT image'.JRequest::getVar('borrar').' FROM #__properties_products WHERE id = '.$dataimg['id'];
		 $this->_db->setQuery( $query );	
		 $this->_data = $this->_db->loadResult();



	$path=JPATH_SITE.DS.'images'.DS.'properties'.DS;
	$path_peque=$path.'peques'.DS.'peque_';

	if (JFile::exists($path.$this->_data)){
		JFile::delete($path.$this->_data);	
	}

	if (JFile::exists($path_peque.$this->_data)){
		JFile::delete($path_peque.$this->_data);	
	}

if (!$row->bind( $dataimg )) {
        $this->setError($this->_db->getErrorMsg());
			return false;
}

if (!$row->store()) {
        $this->setError($this->_db->getErrorMsg());
			return false;
}
		
		return true;
	}



	function storeProductCategory($data,$lastId)
	{	
$db		=& JFactory::getDBO();
	$row =& $this->getTable('product_category');

if($data==''){		$data = JRequest::get( 'post' );}
if($data['id'] == 0){$data['id']=$lastId;}
		
		$selections = JRequest::getVar( 'selections', array(), 'post', 'array' );
		JArrayHelper::toInteger($selections);
		
		$query = 'DELETE FROM #__properties_product_category '
		. ' WHERE productid = '.(int) $data['id']
		;
		
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}	
		if ( $selections[0] == 0 ) {
		
			$query = 'INSERT INTO #__properties_product_category'
			. ' SET productid = '.(int) $data['id'].' , categoryid = '.$data['cid']
			;
		
			
			$contenido .= "\n".(int) $data['id'];
			
			
					$db->setQuery( $query );
					if (!$db->query()) {
						return JError::raiseWarning( 500, $db->getError() );
					}
		}
		else
		{
			foreach ($selections as $menuid)
			{
				
				if ( (int) $menuid >= 0 ) {
					
					$query = 'INSERT INTO #__properties_product_category'
					. ' SET productid = '.(int) $data['id'] .', categoryid = '.(int) $menuid
					;
					$db->setQuery( $query );
					if (!$db->query()) {
						return JError::raiseWarning( 500, $db->getError() );
					}
				}
			}
		}

		return true;
		
		

	}
	
	
	
		
		
}