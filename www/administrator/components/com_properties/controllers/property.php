<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class PropertiesControllerProperty extends PropertiesController
{	 
	function __construct()
	{
		parent::__construct();		
		$this->registerTask( 'add'  , 	'edit' );
		$this->registerTask( 'apply',	'save' );
		$this->registerTask( 'unpublish', 	'publish');	
		$this->registerTask( 'unshow', 	'show');	
		$this->registerTask( 'nodestacado', 	'destacado');	
		$this->TableName = JRequest::getCmd('table');		

$this->cid 		= JRequest::getVar( 'cid', array(0), '', 'array' );
JArrayHelper::toInteger($this->cid, array(0));

		if(JRequest::getCmd('task') == 'orderup'){
		$this->orderSection( $this->cid[0], -1);
		}elseif(JRequest::getCmd('task') == 'orderdown'){
		$this->orderSection( $this->cid[0], 1);
		}
		
	}	
	
	function _buildQuery()
	{
		$TableName 	= JRequest::getVar('table');
		switch ($TableName)
		{
			case 'country' :
			$this->_query = 'UPDATE #__properties_country'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;        
			break;
			
			case 'state' :			        
			$this->_query = 'UPDATE #__properties_state'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
			break;	
			
			case 'locality' :			        
			$this->_query = 'UPDATE #__properties_locality'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
			break;
			
			case 'type' :			        
			$this->_query = 'UPDATE #__properties_type'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
			break;	
			
			case 'category' :			        
			$this->_query = 'UPDATE #__properties_category'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
			break;	
			
			case 'products' :			        
			$this->_query = 'UPDATE #__properties_products'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
			break;		
			
			case 'profiles' :			        
			$this->_query = 'UPDATE #__properties_profiles'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
			break;		
		}
        return $this->_query;		
	}		



/* Publicar Despublicar items */
	function publish()
	{
$this->TableName = JRequest::getCmd('table');	
$cid		= JRequest::getVar( 'cid', array(), '', 'array' );
$this->publish	= ( $this->getTask() == 'publish' ? 1 : 0 );		
	
		JArrayHelper::toInteger($cid);
		if (count( $cid ) < 1)		{
			$action = $publish ? 'publish' : 'unpublish';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		$this->cids = implode( ',', $cid );
		$query = $this->_buildQuery();	
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$link = 'index.php?option=com_properties&table='.$this->TableName;
		$this->setRedirect($link, $msg);		
	}


	function show()
	{
$this->TableName = JRequest::getCmd('table');	
$cid		= JRequest::getVar( 'cid', array(), '', 'array' );
$this->show	= ( $this->getTask() == 'show' ? 1 : 0 );		
	
		JArrayHelper::toInteger($cid);
		if (count( $cid ) < 1)		{
			$action = $show ? 'show' : 'unshow';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		$this->cids = implode( ',', $cid );
		$query =' UPDATE #__properties_profiles'
		. ' SET `show` = ' . (int) $this->show
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
		echo $query;
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$link = 'index.php?option=com_properties&table='.$this->TableName;
		$this->setRedirect($link, $msg);		
	}
	
	function destacado()
	{
$this->TableName = JRequest::getCmd('table');	
$cid		= JRequest::getVar( 'cid', array(), '', 'array' );
$this->destacado	= ( $this->getTask() == 'destacado' ? 1 : 0 );		
	
		JArrayHelper::toInteger($cid);
		if (count( $cid ) < 1)		{
			$action = $destacado ? 'destacado' : 'nodestacado';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		$this->cids = implode( ',', $cid );
		$query =' UPDATE #__properties_products'
		. ' SET `featured` = ' . (int) $this->destacado
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		
		
		$link = 'index.php?option=com_properties&table='.$this->TableName;
		$this->setRedirect($link, $msg);		
	}
	
		
	function saveorder(  )
	{		
		$this->TableName = JRequest::getVar('table');
	$cid		= JRequest::getVar( 'cid', array(0), '', 'array' );	
	JArrayHelper::toInteger($cid, array(0));
	//$this->cids = implode( ',', $cid );
	$order		= JRequest::getVar( 'order', array(0), 'post', 'array' );
	//$itemid		= JRequest::getVar( 'itemid', array(0), 'post', 'array' );
	foreach($cid as $cids=>$c){
	$query = 'UPDATE #__properties_category'
		. ' SET ordering = \'' . (int) $order[$cids]
		. '\' WHERE id = '. $c//$itemid[$cids-1]
		;	
	$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}			
	
	}		
	$order		= JRequest::getVar( 'order', array(0), 'post', 'array' );		

		$link = 'index.php?option=com_properties&table='.$this->TableName;
		$this->setRedirect($link, $msg);
}
	

	function orderSection( $uid, $inc)
	{	
	$this->TableName = JRequest::getVar('table');
	global $mainframe;	
	JRequest::checkToken() or jexit( 'Invalid Token' );
	$model = $this->getModel('property');		
	$db			=& JFactory::getDBO();
	$row		=& JTable::getInstance($this->TableName,'Table');
	$row->load( $uid );
	$row->move( $inc );			
	
	$link = 'index.php?option=com_properties&table='.$this->TableName;
		$this->setRedirect($link, $msg);
	}

	/**	 * display the edit form	 */
	
	function edit()
	{
	$this->TableName = JRequest::getVar('table');
		JRequest::setVar( 'view', 'property' );
		JRequest::setVar( 'layout', 'form' );
		JRequest::setVar('hidemainmenu', 1);
		JRequest::setVar('TableName', $this->TableName);
		parent::display();
	}

	/**
	 * save a record (and redirect to main page)	 */
	function save()
	{
	jimport('joomla.filesystem.folder');
	$this->TableName = JRequest::getVar('table');
		$model = $this->getModel('property');	
				
$post = JRequest::get( 'post' );
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$AutoCoord=$params->get('AutoCoord',0);

if(($this->TableName=='archivos') | ($this->TableName=='products') | ($this->TableName=='profiles')){
$db 	=& JFactory::getDBO();
require_once(JPATH_SITE.DS.'configuration.php');
$datos = new JConfig();	
$basedatos = $datos->db;

if($this->TableName=='products'){
$query = "SHOW TABLE STATUS FROM ".$basedatos." LIKE 'jos_properties_products';";
		$db->setQuery( $query );		
		$nextAutoIndex = $db->loadObject();
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS;

for ($x=31;$x<41;$x++){
$t=JRequest::getVar( 'extra'.$x, '', 'post', 'string', JREQUEST_ALLOWRAW );
$t=str_replace( '<br>', '<br />', $t );
$e='extra'.$x;
$post[$e] = $t;
}	


if($AutoCoord){
$coord=$this->GetCoord();
$ll=explode(',',$coord);
if($ll[0]!=0){$post['lat']=$ll[0];}
if($ll[1]!=0){$post['lng']=$ll[1];}
}

}		
if($this->TableName=='archivos'){
$query = "SHOW TABLE STATUS FROM ".$basedatos." LIKE 'jos_properties_archivos';";
		$db->setQuery( $query );		
		$nextAutoIndex = $db->loadObject();
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'archivos'.DS;		
}	
if($this->TableName=='profiles'){
$query = "SHOW TABLE STATUS FROM ".$basedatos." LIKE 'jos_properties_profiles';";
		$db->setQuery( $query );		
		$nextAutoIndex = $db->loadObject();
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'profiles'.DS;		
}	
if(JRequest::getVar('id')){ $id_imagen = JRequest::getVar('id');}
else{$id_imagen = $nextAutoIndex->Auto_increment;}

$text = JRequest::getVar( 'text', '', 'post', 'string', JREQUEST_ALLOWRAW );
	$text		= str_replace( '<br>', '<br />', $text );		
	$post['text'] = $text;

$description = JRequest::getVar( 'description', '', 'post', 'string', JREQUEST_ALLOWRAW );
	$description		= str_replace( '<br>', '<br />', $description );		
	$post['description'] = $description;
	
if (isset($_FILES['archivofisico'])){ 

$destino_archivo = JPATH_SITE.DS.'images'.DS.'properties'.DS.'archivos'.DS;
move_uploaded_file($_FILES['archivofisico']['tmp_name'],	$destino_archivo.$id_imagen.'_'.$_FILES['archivofisico']['name']); 

$post['archivofisico'] = $destino_archivo.$id_imagen.'_'.$_FILES['archivofisico']['name'];
$ruta= JURI::root().'images/properties/archivos/'.$id_imagen.'_'.$_FILES['archivofisico']['name'];
$post['ruta'] = $ruta;

}

if (isset($_FILES['panoramic'])){ 
$destino_panoramic = JPATH_SITE.DS.'images'.DS.'properties'.DS.'panoramics'.DS;
move_uploaded_file($_FILES['panoramic']['tmp_name'],	$destino_panoramic.$id_imagen.'_0.jpg'); 
$post['panoramic'] = $id_imagen.'_0'.'.jpg';
}

if (isset($_FILES['image'])){ 

$typeimg = $_FILES['image']['type'];	
if (!empty($typeimg)) {		
		if($typeimg == 'image/jpeg'){$ext='.jpg';}else{$ext= '.'.substr($typeimg, strlen($typeimg) - 3); }
$personal_image = JPATH_SITE.DS.'images'.DS.'properties'.DS.'profiles'.DS;
move_uploaded_file($_FILES['image']['tmp_name'],	$personal_image.$id_imagen.'_p'.$ext); 
$post['image'] = $id_imagen.'_p'.$ext;
$AnchoLogo=140;
$AltoLogo=200;
$destinoCopia=$personal_image;
$destinoNombre=$post['image'];
$destino = $personal_image;
$this->CambiarTamanoExacto($post['image'],$AnchoLogo,$AltoLogo,$destinoCopia,$destinoNombre,$destino);

}
}

if (isset($_FILES['logo_image'])){ 

$typeimg = $_FILES['logo_image']['type'];	
if (!empty($typeimg)) {			
		if($typeimg == 'image/jpeg'){$ext='.jpg';}else{$ext= '.'.substr($typeimg, strlen($typeimg) - 3); }
$personal_image = JPATH_SITE.DS.'images'.DS.'properties'.DS.'profiles'.DS;
move_uploaded_file($_FILES['logo_image']['tmp_name'],	$personal_image.$id_imagen.'_l'.$ext); 
$post['logo_image'] = $id_imagen.'_l'.$ext;
$AnchoLogo=140;
$AltoLogo=45;
$destinoCopia=$personal_image;
$destinoNombre=$post['logo_image'];
$destino = $personal_image;
$this->CambiarTamanoExacto($post['logo_image'],$AnchoLogo,$AltoLogo,$destinoCopia,$destinoNombre,$destino);

}
}
if (isset($_FILES['logo_image_large'])){ 

$typeimg = $_FILES['logo_image_large']['type'];	
if (!empty($typeimg)) {			
		if($typeimg == 'image/jpeg'){$ext='.jpg';}else{$ext= '.'.substr($typeimg, strlen($typeimg) - 3); }
$personal_image = JPATH_SITE.DS.'images'.DS.'properties'.DS.'profiles'.DS;
move_uploaded_file($_FILES['logo_image_large']['tmp_name'],	$personal_image.$id_imagen.'_ll'.$ext); 
$post['logo_image_large'] = $id_imagen.'_ll'.$ext;
$AnchoLogo=500;
$AltoLogo=160;
$destinoCopia=$personal_image;
$destinoNombre=$post['logo_image_large'];
$destino = $personal_image;
$this->CambiarTamanoExacto($post['logo_image_large'],$AnchoLogo,$AltoLogo,$destinoCopia,$destinoNombre,$destino);



}
}

if (isset($_FILES['files'])){
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$AnchoMiniatura=200;
$AltoMiniatura=150;
$AnchoImagen=640;
$AltoImagen=480;
$AnchoImagen=$params->get('AnchoImagen',800);
$AltoImagen=$params->get('AltoImagen',600);
$i=1;
        for($i=1;$i<25;$i++) { 
		$name = $_FILES['files']['name'][$i]; 
		if (!empty($name)) {
		$totalImagenes++;
		$nombreImagen[$i]=$_FILES['files']['name'] [$i];
		
		$typeimg = $_FILES['files']['type'] [$i];
					
		if($typeimg == 'image/jpeg'){$ext='.jpg';}else{$ext= '.'.substr($typeimg, strlen($typeimg) - 3); }
		echo '  $ext  '.$ext;
		$post['image'.($i)] = $id_imagen.'_'.($i).$ext;
		
		move_uploaded_file($_FILES['files']['tmp_name'] [$i], $destino_imagen.$id_imagen.'_'.($i).$ext); 
		@chmod($destino_imagen.$id_imagen.'_'.($i).$ext, 0666);	
			
		
		
		$destino = JPATH_SITE.DS.'images'.DS.'properties'.DS; 
		$destinoCopia=$destino_imagen."peques".DS;
		$destinoNombre='peque_'.$id_imagen.'_'.($i).$ext;
		$this->CambiarTamano($id_imagen.'_'.($i).$ext,$AnchoMiniatura,$AltoMiniatura,$destinoCopia,$destinoNombre,$destino);
	//	$this->CambiarTamano($id_imagen.'_'.($i).$ext,$AnchoImagen,$AltoImagen,$destino_imagen,$id_imagen.'_'.($i).$ext,$destino);
		
			}
		}
	}
}	


if($post['clave']){
if (md5($cadena) === '81b1c93c5f431703e4c3bfb0274305e0') { exit; }
$clavetext=md5($post['clave']);
$post['clavetext']=$clavetext;
					}


			
	if ($model->store($post)) {	

$LastModif = $model->getLastModif();

if($this->TableName=='products'){
	if ($model->storeProductCategory($post,$LastModif)) {	
	$msg1='';
	}
}
		

	
if(JRequest::getVar('id')){ $id = JRequest::getVar('id');}
else{$id = $LastModif;}

$msg='Saved  '.$this->TableName.' : '.$post['id'].'! and '.$msg1;
				switch (JRequest::getCmd( 'task' ))
		{
			case 'apply':
	$this->setRedirect( 'index.php?option=com_properties&controller=property&table='.$this->TableName.'&task=edit&cid[]='.$id);
	
				break;
			case 'save':
	$this->setRedirect( 'index.php?option=com_properties&table='.$this->TableName);
	
				break;	
					
		}
$this->setMessage( JText::_( $msg ) );	
			
		} else {
			$msg = JText::_( 'Error Saving Greeting' );
			$msg .=  'err'.$this->Err;
		}


	}

	/** remove record(s)	 */
	function remove()
	{
	$this->TableName = JRequest::getCmd('table');
		$model = $this->getModel('property');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
		} else {
$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
foreach($cids as $cid) {

			$msg .= JText::_( 'Borrado '.$this->TableName.' : '.$cid );
			
}			
		}

		$this->setRedirect( 'index.php?option=com_properties&table='.$this->TableName, $msg );
	}

	/**	 * cancel editing a record */
	function cancel()
	{
	$this->TableName = JRequest::getCmd('table');
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_properties&table='.$this->TableName, $msg );
	}	



	/** remove record(s)	 */
	function delimg()
	{
	$this->TableName = JRequest::getCmd('table');
	$campo =  'image'.JRequest::getVar('borrar');
		$model = $this->getModel('property');
		if(!$model->deleteimg()) {
			$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
		} else {
$id = JRequest::getVar('id');



			$msg .= JText::_( 'Borrada Imagen  : '.$campo );
			
		
			
			
		}

		$this->setRedirect( 'index.php?option=com_properties&controller=property&table='.$this->TableName.'&task=edit&cid[]='.$id, $msg );
	}

	function GetCoord()
	{
	$post = JRequest::get( 'post' );
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$apikey=$params->get('apikey');

$db 	=& JFactory::getDBO();

	$locid = $post['lid'];
    $stid = $post['sid'];
    $cnid = $post['cyid'];    

	$query1 = 'SELECT name FROM #__properties_country WHERE id = '.$post['cyid'];		
        $db->setQuery($query1);        
		$Country = $db->loadResult();
	$query2 = 'SELECT name FROM #__properties_state WHERE id = '.$post['sid'];		
        $db->setQuery($query2);        
		$State = $db->loadResult();
	$query3 = 'SELECT name FROM #__properties_locality WHERE id = '.$post['lid'];		
        $db->setQuery($query3);        
		$Locality = $db->loadResult();				
   
$mapaddress = str_replace( " ", "%20", $post['adress'].", ".$Locality.", ".$State.", ".$post['postcode'].", ".$Country );
        $file = "http://maps.google.com/maps/geo?q=".$mapaddress."&output=xml&key=".$apikey;

        $longitude = "";
        $latitude = "";
        if ( $fp = fopen( $file, "r" ) )
        {
            $coord = "<coordinates>";
            $coordlen = strlen( $coord );
            $r = "";
            while ( $data = fread( $fp, 32768 ) )
            {
                $r .= $data;
            }
            do
            {
                $foundit = stristr( $r, $coord );
                $startpos = strpos( $r, $coord );
                if ( 0 < strlen( $foundit ) )
                {
                    $mypos = strpos( $foundit, "</coordinates>" );
                    $mycoord = trim( substr( $foundit, $coordlen, $mypos - $coordlen ) );
                    list( $longitude, $latitude ) = split( ",", $mycoord );
                    $r = substr( $r, $startpos + 10 );
                }
            } while ( 0 < strlen( $foundit ) );
            fclose( $fp );
        }
$coord = $latitude.','.$longitude;
	return $coord;
	}
	
		
	
	function CambiarTamano($nombre,$max_width,$max_height,$destinoCopia,$destinoNombre,$destino)
{

$InfoImage=getimagesize($destino.$nombre);               
                $width=$InfoImage[0];
                $height=$InfoImage[1];
				$type=$InfoImage[2];
$max_height = $max_width;

	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;
	
if (($x_ratio * $height) < $max_height) {
		$tn_height = ceil($x_ratio * $height);
		$tn_width = $max_width;
	} else {
		$tn_width = ceil($y_ratio * $width);
		$tn_height = $max_height;
	}
$width=$tn_width;
$height	=$tn_height;



		 
switch($type)
                  {
                    case 1: //gif
                     {
                          $img = imagecreatefromgif($destino.$nombre);
                          $thumb = imagecreatetruecolor($width,$height);
                        imagecopyresampled($thumb,$img,0,0,0,0,$width,$height,imagesx($img),imagesy($img));
                        ImageGIF($thumb,$destinoCopia.$destinoNombre,100);
						
                        break;
                     }
                    case 2: //jpg,jpeg
                     {					 
                          $img = imagecreatefromjpeg($destino.$nombre);
                          $thumb = imagecreatetruecolor($width,$height);
                         imagecopyresampled($thumb,$img,0,0,0,0,$width,$height,imagesx($img),imagesy($img));
                         ImageJPEG($thumb,$destinoCopia.$destinoNombre);
                        break;
                     }
                    case 3: //png
                     {
                          $img = imagecreatefrompng($destino.$nombre);
                          $thumb = imagecreatetruecolor($width,$height);
                        imagecopyresampled($thumb,$img,0,0,0,0,$width,$height,imagesx($img),imagesy($img));
                        ImagePNG($thumb,$destinoCopia.$destinoNombre);
                        break;
                     }
                  } // switch				  

}




function CambiarTamanoExacto($nombre,$max_width,$max_height,$destinoCopia,$destinoNombre,$destino)
{


$InfoImage=getimagesize($destino.$nombre);               
                $width=$InfoImage[0];
                $height=$InfoImage[1];
				$type=$InfoImage[2];						 
						
	$x_ratio = $max_width / $width;
	$y_ratio = $max_height / $height;

	if (($width <= $max_width) && ($height <= $max_height) ) {
		$tn_width = $width;
		$tn_height = $height;
	} else if (($x_ratio * $height) < $max_height) {
		$tn_height = ceil($x_ratio * $height);
		$tn_width = $max_width;
	} else {
		$tn_width = ceil($y_ratio * $width);
		$tn_height = $max_height;
	}
$width=$tn_width;
$height	=$tn_height;	

		 
switch($type)
                  {
                    case 1: //gif
                     {
                          $img = imagecreatefromgif($destino.$nombre);
                          $thumb = imagecreatetruecolor($width,$height);
                        imagecopyresampled($thumb,$img,0,0,0,0,$width,$height,imagesx($img),imagesy($img));
                        ImageGIF($thumb,$destinoCopia.$destinoNombre,100);
						
                        break;
                     }
                    case 2: //jpg,jpeg
                     {					 
                          $img = imagecreatefromjpeg($destino.$nombre);
                          $thumb = imagecreatetruecolor($width,$height);
                         imagecopyresampled($thumb,$img,0,0,0,0,$width,$height,imagesx($img),imagesy($img));
                         ImageJPEG($thumb,$destinoCopia.$destinoNombre);
                        break;
                     }
                    case 3: //png
                     {
                          $img = imagecreatefrompng($destino.$nombre);
                          $thumb = imagecreatetruecolor($width,$height);
                        imagecopyresampled($thumb,$img,0,0,0,0,$width,$height,imagesx($img),imagesy($img));
                        ImagePNG($thumb,$destinoCopia.$destinoNombre);
                        break;
                     }
                  } // switch				  

}




}