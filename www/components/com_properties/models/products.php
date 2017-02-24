<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class PropertiesModelProducts extends JModel
{
	var $_data;
	var $TableName = null;	
	
function _buildQuery()
	{
		
$this->filter_order='id';		
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
				$where[] = 'r.published = 1';
			}
			else if ($this->filter_state == 'U' )
			{
				$where[] = 'r.published = 0';
			}
		}
		if ($this->search)
		{
			$where[] = 'LOWER(r.name) LIKE \''. $this->search. '\'';
		}

		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		$orderby 	= ' ORDER BY r.'. $this->filter_order .' '. $this->filter_order_Dir;
		//$orderby 	.= 
		$this->_query = ' SELECT r.* ,'
			.'  t.name AS name_category, ty.name as name_type, '
			.' s.name AS name_state, l.name AS name_locality, y.name AS name_country '			
			. ' FROM #__properties_products AS r'
			. ' LEFT JOIN #__properties_category AS t ON t.id = r.cid'	
			. ' LEFT JOIN #__properties_type AS ty ON ty.id = r.type'	
			. ' LEFT JOIN #__properties_locality AS l ON l.id = r.lid'
			. ' LEFT JOIN #__properties_state AS s ON s.id = r.sid '
			. ' LEFT JOIN #__properties_country AS y ON y.id = s.parent '
			. $where
			. ' GROUP BY r.id'
			. $orderby
			;		
				
//echo str_replace('#_','jos',$this->_query);

				
		
        return $this->_query;		
	}
	

var $_total = null;
var $_pagination = null;

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;
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
		$this->setId((int)$array[0]);	
		
  }

function setId($id)
	{

		$this->_id		= $id;
		$this->_data	= null;		

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




 function &getProduct()
	{		
	
	$query = ' SELECT r.* ,'
			.'  t.name AS name_category, ty.name as name_type, '
			.' s.name AS name_state, l.name AS name_locality, y.name AS name_country '			
			. ' FROM #__properties_products AS r'
			. ' LEFT JOIN #__properties_category AS t ON t.id = r.cid'	
			. ' LEFT JOIN #__properties_type AS ty ON ty.id = r.type'	
			. ' LEFT JOIN #__properties_locality AS l ON l.id = r.lid'
			. ' LEFT JOIN #__properties_state AS s ON s.id = r.sid '
			. ' LEFT JOIN #__properties_country AS y ON y.id = s.parent '
			. ' WHERE r.id = '.$this->_id;			

			
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;		
		}
	//echo $query;
		return $this->_data;
	}





 
 	function store($data)
	{			
	$row =& $this->getTable('products');
		
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

	function delete()
	{
	
	$user =& JFactory::getUser();
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
	$TableName 	= 'products';
	$row =& $this->getTable($TableName);

  
  
		if (count( $cids )) {
			foreach($cids as $cid) {
				
				
				
				$query = 'SELECT * FROM #__properties_products' .
				' WHERE id = '.$cid;
				//' AND agent_id = '.$user->id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
			
			$id = $this->_data->id;	
			
		//	JError::raiseError(500, $id );
			
			if ( 0 < $id )
        	{
			$this->deleteImagesProperty($this->_data,$TableName);
			}
			
			if (!$row->delete( $cid )) {
					$this->setError( $row->getErrorMsg() );					
					return false;
				}	
				
			//require('nada.php');
							
			}
		}
		return true;
	}




function deleteImagesProperty($data,$TableName)
	{
	jimport('joomla.filesystem.file');
	
	$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS;
	$destino_peque = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS;	
	
$img_dato[1]=$data->image1;
$img_dato[2]=$data->image2;
$img_dato[3]=$data->image3;
$img_dato[4]=$data->image4;
$img_dato[5]=$data->image5;
$img_dato[6]=$data->image6;
$img_dato[7]=$data->image7;
$img_dato[8]=$data->image8;
$img_dato[9]=$data->image9;
$img_dato[10]=$data->image10;
$img_dato[11]=$data->image11;
$img_dato[12]=$data->image12;
$img_dato[13]=$data->image13;
$img_dato[14]=$data->image14;
$img_dato[15]=$data->image15;
$img_dato[16]=$data->image16;
$img_dato[17]=$data->image17;
$img_dato[18]=$data->image18;
$img_dato[19]=$data->image19;
$img_dato[20]=$data->image20;
$img_dato[21]=$data->image21;
$img_dato[22]=$data->image22;
$img_dato[23]=$data->image23;
$img_dato[24]=$data->image24;


for($x=1;$x<25;$x++){

if($img_dato[$x]){
//echo $img_dato[$x];
JFile::delete($destino_imagen.$img_dato[$x]);
JFile::delete($destino_peque.'peque_'.$img_dato[$x]);
//JError::raiseError(500, $db->getErrorMsg() );
}

}



$query = 'SELECT * FROM #__properties_images' .
				' WHERE parent = '.$data->id;
				//' AND agent_id = '.$user->id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObjectList();

foreach($this->_data as $Img){

	$row =& $this->getTable('images');
	if (!$row->delete( $Img->id )) {
					$this->setError( $row->getErrorMsg() );					
					return false;
				}
				
	$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'images'.DS.$Img->parent.DS;
	$destino_peque = JPATH_SITE.DS.'images'.DS.'properties'.DS.'images'.DS.'thumbs'.DS.$Img->parent.DS;
	
	JFile::delete($destino_imagen.$Img->name);
	JFile::delete($destino_peque.$Img->name);

	



}
	return true;
	}
	
	
	
function deleteimg()
	{
		jimport('joomla.filesystem.file');
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

	
	

function getLastModif()
	{
	$TableName 	= 'products';
		 $query = ' SELECT id FROM #__properties_'.$TableName.' ORDER BY id desc LIMIT 1';
	 $this->_db->setQuery( $query );	
			$this->_data = $this->_db->loadResult();
	
	//print_r($this->_data);
	 return $this->_data;


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