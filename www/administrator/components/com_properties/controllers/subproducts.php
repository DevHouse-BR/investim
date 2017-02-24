<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class PropertiesControllerSubproducts extends PropertiesController
{	 
	function __construct()
	{
		parent::__construct();		
		$this->registerTask( 'add'  , 	'edit' );
		$this->registerTask( 'apply',	'save' );
		$this->registerTask('save2new',		'save');
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
	

	function publish()
	{
$this->TableName = 'subproducts';	
$cid		= JRequest::getVar( 'cid', array(), '', 'array' );
$this->publish	= ( $this->getTask() == 'publish' ? 1 : 0 );		
	
		JArrayHelper::toInteger($cid);
		if (count( $cid ) < 1)		{
			$action = $publish ? 'publish' : 'unpublish';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		$this->cids = implode( ',', $cid );
		
		$query  = 'UPDATE #__properties_subproducts'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;		
			
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$link = 'index.php?option=com_properties&view=subproducts';
		$this->setRedirect($link, $msg);		
	}


	
	function destacado()
	{
$this->TableName = 'subproducts';	
$cid		= JRequest::getVar( 'cid', array(), '', 'array' );
$this->destacado	= ( $this->getTask() == 'destacado' ? 1 : 0 );		
	
		JArrayHelper::toInteger($cid);
		if (count( $cid ) < 1)		{
			$action = $destacado ? 'destacado' : 'nodestacado';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		$this->cids = implode( ',', $cid );
		$query =' UPDATE #__properties_subproducts'
		. ' SET `featured` = ' . (int) $this->destacado
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		
		
		$link = 'index.php?option=com_properties&view=subproducts';
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
	$query = 'UPDATE #__properties_subproducts'
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

		$link = 'index.php?option=com_properties&view=subproducts';
		$this->setRedirect($link, $msg);
}
	

	function orderSection( $uid, $inc)
	{	
	$this->TableName = 'subproducts';
	global $mainframe;	
	JRequest::checkToken() or jexit( 'Invalid Token' );
	$model = $this->getModel('subproducts');		
	$db			=& JFactory::getDBO();
	$row		=& JTable::getInstance($this->TableName,'Table');
	$row->load( $uid );
	$row->move( $inc );			
	
	$link = 'index.php?option=com_properties&view=subproducts';
		$this->setRedirect($link, $msg);
	}

	/**	 * display the edit form	 */
	
	function edit()
	{
		JRequest::setVar( 'view', 'subproducts' );
		JRequest::setVar( 'layout', 'form' );		
		parent::display();
	}

	/**
	 * save a record (and redirect to main page)	 */
	function save()
	{
	jimport('joomla.filesystem.folder');
	$this->TableName = 'subproducts';
	$model = $this->getModel('subproducts');	
	$component_name = 'properties';		
	$post = JRequest::get( 'post' );
	$component = JComponentHelper::getComponent( 'com_properties' );
	$params = new JParameter( $component->params );
	$AutoCoord=$params->get('AutoCoord',0);



	$db 	=& JFactory::getDBO();
	require_once(JPATH_SITE.DS.'configuration.php');
	$datos = new JConfig();	
	$basedatos = $datos->db;
	$dbprefix = $datos->dbprefix;
	$query = "SHOW TABLE STATUS FROM `".$basedatos."` LIKE '".$dbprefix.$component_name."_".$this->TableName."';";
		$db->setQuery( $query );		
		$nextAutoIndex = $db->loadObject();
	$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'subproducts'.DS;


		for ($x=31;$x<41;$x++){
			$t=JRequest::getVar( 'extra'.$x, '', 'post', 'string', JREQUEST_ALLOWRAW );
			$t=str_replace( '<br>', '<br />', $t );
			$e='extra'.$x;
			$post[$e] = $t;
		}	


		

		
	

		if(JRequest::getVar('id')){ $id_imagen = JRequest::getVar('id');}else{$id_imagen = $nextAutoIndex->Auto_increment;}

	$text = JRequest::getVar( 'text', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$text		= str_replace( '<br>', '<br />', $text );		
		$post['text'] = $text;

	$description = JRequest::getVar( 'description', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$description		= str_replace( '<br>', '<br />', $description );		
		$post['description'] = $description;
	


	if (isset($_FILES['panoramic'])){ 
		$destino_panoramic = JPATH_SITE.DS.'images'.DS.'properties'.DS.'subproducts'.DS.'panoramics'.DS;
		move_uploaded_file($_FILES['panoramic']['tmp_name'],	$destino_panoramic.$id_imagen.'_0.jpg'); 
		$post['panoramic'] = $id_imagen.'_0'.'.jpg';
	}


	if (isset($_FILES['files'])){
		$component = JComponentHelper::getComponent( 'com_properties' );
		$params = new JParameter( $component->params );
		$AnchoMiniatura=200;
		$AltoMiniatura=150;
		//$AnchoImagen=640;
		//$AltoImagen=480;
		//$AnchoImagen=$params->get('AnchoImagen',800);
		//$AltoImagen=$params->get('AltoImagen',600);
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
			
		
		
					$destino = JPATH_SITE.DS.'images'.DS.'properties'.DS.'subproducts'.DS; 
					$destinoCopia=$destino_imagen."peques".DS;
					$destinoNombre='peque_'.$id_imagen.'_'.($i).$ext;
					$this->CambiarTamano($id_imagen.'_'.($i).$ext,$AnchoMiniatura,$AltoMiniatura,$destinoCopia,$destinoNombre,$destino);
	//	$this->CambiarTamano($id_imagen.'_'.($i).$ext,$AnchoImagen,$AltoImagen,$destino_imagen,$id_imagen.'_'.($i).$ext,$destino);
				}
		
		}
	}	



			
	if ($model->store($post)) {	

		$LastModif = $model->getLastModif();

		
	
		if(JRequest::getVar('id')){ $id = JRequest::getVar('id');}else{$id = $LastModif;}

		$msg='Saved  '.$this->TableName.' : '.$post['id'].'! and '.$msg1;
			switch (JRequest::getCmd( 'task' ))
			{
				case 'apply':
					$this->setRedirect( 'index.php?option=com_properties&view=subproducts&layout=form&task=edit&cid[]='.$id);	
				break;
				case 'save':
					$this->setRedirect( 'index.php?option=com_properties&view=subproducts');	
				break;			
				
				case 'save2new':
					$this->setRedirect(JRoute::_('index.php?option=com_properties&view=subproducts&layout=form&task=edit', false));
	$msg.=' You can add new Product.';
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
	$this->TableName = 'subproducts';
		$model = $this->getModel('subproducts');
			if(!$model->delete()) {
				$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
			} else {
				$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
					foreach($cids as $cid) {

					$msg .= JText::_( 'Deleted subproduct : '.$cid );
			
					}			
			}

		$this->setRedirect( 'index.php?option=com_properties&view=subproducts', $msg );
	}

	/**	 * cancel editing a record */
	function cancel()
	{
	$this->TableName = 'subproducts';
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_properties&view=subproducts', $msg );
	}	



	/** remove record(s)	 */
	function delimg()
	{
	$this->TableName = JRequest::getCmd('table');
		$campo =  'image'.JRequest::getVar('borrar');
		$model = $this->getModel('subproducts');
		
		if(!$model->deleteimg()) {
			$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
		} else {
	$id = JRequest::getVar('id');
			$msg .= JText::_( 'Borrada Imagen  : '.$campo );
		}

		$this->setRedirect( 'index.php?option=com_properties&view=subproducts&layout=form&task=edit&cid[]='.$id.'&tab=2', $msg );
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