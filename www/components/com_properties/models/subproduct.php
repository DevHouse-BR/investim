<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class PropertiesModelSubproduct extends JModel
{
	var $_id = null;	
	var $_data = null;
	
	function __construct()
	{
		parent::__construct();
		global $mainframe, $option;

$id = JRequest::getVar('id', 0, '', 'int');	

$this->cid = JRequest::getVar('cid', 0, '', 'int');

$this->tid = JRequest::getVar('tid', 0, '', 'int');

$this->setId($id);
		
$this->pathway();
	}

	function setId($id)
	{
		// Set weblink id and wipe data
		$this->_id		= $id;
		$this->_data	= null;
	}


function pathway()
	{
	global $mainframe;	
	$Itemid=$this->getItemid();	
	$breadcrumbs = & $mainframe->getPathWay();	
$link='index.php?option=com_properties&view=properties&Itemid='.$Itemid;

if(JRequest::getVar('cyid')){
$cyid=JRequest::getVar('cyid', 0, '', 'int');
$query = ' SELECT cy.*, '
.' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":",cy.id, cy.alias) ELSE cy.id END as CYslug'
.' FROM #__properties_country as cy '
.' WHERE cy.id = '.$cyid;
$this->_db->setQuery( $query );
$this->_dataCountry = $this->_db->loadObject($query);

$link.='&cyid='.$this->_dataCountry->CYslug;

$breadcrumbs->addItem( $this->_dataCountry->name, JRoute::_( $link ) );

}

if(JRequest::getVar('sid')){
$sid=JRequest::getVar('sid', 0, '', 'int');
$query = ' SELECT s.*, '
.' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":",s.id, s.alias) ELSE s.id END as Sslug'
.' FROM #__properties_state as s '
.' WHERE s.id = '.$sid;
$this->_db->setQuery( $query );
$this->_dataState = $this->_db->loadObject($query);
$link.='&sid='.$this->_dataCountry->Sslug;
$breadcrumbs->addItem( $this->_dataState->name, JRoute::_( $link ) );

}

if(JRequest::getVar('lid')){
$lid=JRequest::getVar('lid', 0, '', 'int');
$query = ' SELECT l.*, '
.' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":",l.id, l.alias) ELSE l.id END as Lslug'
.' FROM #__properties_locality as l '
.' WHERE l.id = '.$lid;
$this->_db->setQuery( $query );
$this->_dataLocality = $this->_db->loadObject($query);
$link.='&lid='.$this->_dataLocality->Lslug;
$breadcrumbs->addItem( $this->_dataLocality->name, JRoute::_( $link ) );

}


if(JRequest::getVar('cid')){

$cid=JRequest::getVar('cid', 0, '', 'int');

$query = ' SELECT c.*, '
.' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":",c.id, c.alias) ELSE c.id END as Cslug'
.' FROM #__properties_category as c '
.' WHERE c.id = '.$cid;

$this->_db->setQuery( $query );
$this->_dataCategory = $this->_db->loadObject($query);



$query2 = ' SELECT c.*, '
.' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":",c.id, c.alias) ELSE c.id END as Cslug'
.' FROM #__properties_category as c '
.' WHERE c.id = '.$this->_dataCategory->parent;

$this->_db->setQuery( $query2 );
$this->_dataParentCategory = $this->_db->loadObject($query2);

if($this->_dataParentCategory){

$link2=$link.='&cid='.$this->_dataParentCategory->Cslug;

$breadcrumbs->addItem( $this->_dataParentCategory->name, JRoute::_( $link2 ) );
}

$link3=$link.='&cid='.$this->_dataCategory->Cslug;
$breadcrumbs->addItem( $this->_dataCategory->name, JRoute::_( $link3 ) );

}
	
if(JRequest::getVar('tid')){
$tid=JRequest::getVar('tid', 0, '', 'int');
$query = ' SELECT t.*, '
.' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":",t.id, t.alias) ELSE t.id END as Tslug'
.' FROM #__properties_type as t '
.' WHERE t.id = '.$tid;
$this->_db->setQuery( $query );
$this->_dataType = $this->_db->loadObject($query);
$link.='&tid='.$this->_dataType->Tslug;
$breadcrumbs->addItem( $this->_dataType->name, JRoute::_( $link ) );

}


	}


function getItemid()
	{	
	
	$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=properties"';
				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();
		if(!$this->row){
		$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=properties&cid=0&tid=0"';	
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();
		}
		
		
		return $this->row;
	}	

function AddHit($hit){

$user =& JFactory::getUser();
//echo 'user: '.$user->id;
	
if($user->id!=62){	
$query = 'UPDATE #__properties_products'
		. ' SET hits = ' . ($hit+1)
		. ' WHERE id = '. (int) $this->_id;			
			
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		
	}	
		
}

function getProduct()
	{
	
if($this->_id==0){$this->_id=$this->LastProperty();}
	
$query = ' SELECT p.*,c.name as name_category,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile,t.name as name_type, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sdslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_category AS c ON c.id = p.cid '
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' WHERE p.published = 1 '	
				. ' AND p.id = '.$this->_id;
			
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
			//echo '$this->_id; '.$this->_id;
			//echo str_replace('#_','jos',$query);
$this->AddHit($this->_data->hits);	

global $mainframe;
$breadcrumbs = & $mainframe->getPathWay();	
$breadcrumbs->addItem( $this->_data->name, '' );
//echo $this->_data->hits;
		
			return $this->_data;
	}
	

	


function store($data,$TableName)
	{	
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_properties'.DS.'tables');

	$row =& JTable::getInstance($TableName, 'Table');
	
		// Bind the form fields to the hello table
		if (!$row->bind($data)) {
			 $this->setError( $this->_db->getErrorMsg() );
			//echo $this->_db->getErrorMsg();
			return false;
		}

		// Make sure the hello record is valid
		if (!$row->check()) {
			$this->setError( $this->_db->getErrorMsg() );
			//echo $this->_db->getErrorMsg();
			return false;
		}

		// Store the web link table to the database
		if (!$row->store()) {
			$this->setError( $this->_db->getErrorMsg() );	
			//echo $this->_db->getErrorMsg();		
			return false;
		}

/*
$nombre_archivo1 = 'components\com_properties\fabio_aplyModel.txt';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= '<br>'.$this->_db->getErrorMsg();
fwrite($gestor1, $contenido1);
*/
//print_r($data);

		return true;
	}
		

function delete($id,$TableName)
	{

	$row =& $this->getTable($TableName);

				if (!$row->delete( $id )) {
					$this->setError( $row->getErrorMsg() );
					return false;
				}
				
			
		return true;
	}
	
	
function deleteImagesProperty($data,$TableName)
	{
	jimport('joomla.filesystem.file');
	
	$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS;
	$destino_peque = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS;
	
	
	
$img_dato[1]=$data[0]->image1;
$img_dato[2]=$data[0]->image2;
$img_dato[3]=$data[0]->image3;
$img_dato[4]=$data[0]->image4;
$img_dato[5]=$data[0]->image5;
$img_dato[6]=$data[0]->image6;
$img_dato[7]=$data[0]->image7;
$img_dato[8]=$data[0]->image8;
$img_dato[9]=$data[0]->image9;
$img_dato[10]=$data[0]->image10;
$img_dato[11]=$data[0]->image11;
$img_dato[12]=$data[0]->image12;
$img_dato[13]=$data[0]->image13;
$img_dato[14]=$data[0]->image14;
$img_dato[15]=$data[0]->image15;
$img_dato[16]=$data[0]->image16;
$img_dato[17]=$data[0]->image17;
$img_dato[18]=$data[0]->image18;
$img_dato[19]=$data[0]->image19;
$img_dato[20]=$data[0]->image20;
$img_dato[21]=$data[0]->image21;
$img_dato[22]=$data[0]->image22;
$img_dato[23]=$data[0]->image23;
$img_dato[24]=$data[0]->image24;


for($x=1;$x<25;$x++){

if($img_dato[$x]){
//echo $img_dato[$x];
JFile::delete($destino_imagen.$img_dato[$x]);
JFile::delete($destino_peque.'peque_'.$img_dato[$x]);

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
	// $this->_data = $this->_getloadResult($query);
	print_r($this->_data);
	 return $this->_data;


	}


function deleteimg($datos,$TableName)
	{
			$campo =  'image'.JRequest::getVar('img');
			$des = 'image'.JRequest::getVar('img').'desc';
//print_r($datos);
$imgaborrar=$datos[0]->$campo;

	$row =& $this->getTable($TableName);  
$dataimg['id']=  JRequest::getVar('id');
$dataimg[$campo]=  '';
$dataimg[$des]=  '';
if (!$row->bind( $dataimg )) {
        $this->setError($this->_db->getErrorMsg());
		echo $this->_db->getErrorMsg();
			return false;
}

if (!$row->store()) {
        $this->setError($this->_db->getErrorMsg());
		echo $this->_db->getErrorMsg();
			return false;
}
//print_r($dataimg);
//echo 'supuestamente borrada la imagen';	
jimport('joomla.filesystem.file');	
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.$imgaborrar;
$destino_peque = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS.'peque_'.$imgaborrar;
JFile::delete($destino_imagen);
JFile::delete($destino_peque);		

//echo $destino_imagen.'<br>';
//echo $destino_peque.'<br>';
		return true;
	}



	function storeProductCategory($data,$lastId)
	{	
	JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_properties'.DS.'tables');

	$row =& JTable::getInstance('product_category', 'Table');
$db		=& JFactory::getDBO();

/*
$nombre_archivo = 'components\com_properties\fabio_product_category.txt';
$gestor = fopen($nombre_archivo, 'w');
*/
//print_r($data);
if($data==''){		$data = JRequest::get( 'post' );}
if($data['id'] == 0){$data['id']=$lastId;}

		
		$selections = JRequest::getVar( 'selections', array(), 'post', 'array' );
		JArrayHelper::toInteger($selections);

		// delete old module to menu item associations
		$query = 'DELETE FROM #__properties_product_category '
		. ' WHERE productid = '.(int) $data['id']
		;
		
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}	
		if ( $selections[0] == 0 ) {
			// assign new module to `all` menu item associations
			$query = 'INSERT INTO #__properties_product_category'
			. ' SET productid = '.(int) $data['id'].' , categoryid = '.$data['cid']
			;
		
			
			$contenido .= "\n".(int) $data['id'].' , categoryid = '.$data['cid'];
			
			
					$db->setQuery( $query );
					if (!$db->query()) {
						return JError::raiseWarning( 500, $db->getError() );
					}
		}
		else
		{
			foreach ($selections as $menuid)
			{
				// this check for the blank spaces in the select box that have been added for cosmetic reasons
				if ( (int) $menuid >= 0 ) {
					// assign new module to menu item associations
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
		
		
		
		
			
			
/*
$contenido .= ' '.$query.'<br>';
fwrite($gestor, $contenido);
*/


	//	return true;
	}
	
	
		
	
			
}//fin clase