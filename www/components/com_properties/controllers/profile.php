<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class PropertiesControllerProfile extends JController
{	 
	function __construct()
	{
		parent::__construct();			
		$this->registerTask( 'apply',	'save' );			
		$this->TableName = JRequest::getCmd('table');		
	}	
	
	

/* save a record (and redirect to main page)	 */
	function ProfileApply()
	{
	jimport('joomla.filesystem.folder');
	jimport('joomla.filesystem.file');
	$this->TableName = JRequest::getVar('table');
		$model = $this->getModel('property');	
		$component_name = 'properties';		
$post = JRequest::get( 'post' );
	
if($this->TableName=='profiles'){
$db 	=& JFactory::getDBO();
require_once(JPATH_SITE.DS.'configuration.php');
$datos = new JConfig();	
$basedatos = $datos->db;
$dbprefix = $datos->dbprefix;
$query = "SHOW TABLE STATUS FROM `".$basedatos."` LIKE '".$dbprefix.$component_name."_".$this->TableName."';";
		$db->setQuery( $query );		
		$nextAutoIndex = $db->loadObject();
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'profiles'.DS;		
}	

if(JRequest::getCmd('id')){ $id_imagen = JRequest::getCmd('id');}
else{$id_imagen = $nextAutoIndex->Auto_increment;}

if (isset($_FILES['image'])){ 

$typeimg = $_FILES['image']['type'];	
if (!empty($typeimg)) {	
		$ext =  '.'.JFile::getExt($_FILES['image']['name']);		
		
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
		$ext =  '.'.JFile::getExt($_FILES['logo_image']['name']);	
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
		$ext =  '.'.JFile::getExt($_FILES['logo_image_large']['name']);	
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

	



	
	if ($model->store($post,$this->TableName)) {	

$LastModif = $model->getLastModif();

	
if(JRequest::getCmd('id')){ $id = JRequest::getCmd('id');}else{$id = $LastModif;}

$nombre_archivo1 = 'components\com_properties\fabio_aply.txt';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= '<br>'.$id;
$contenido1 .= '<br>'.$LastModif;
fwrite($gestor1, $contenido1);


//$table	=& JTable::getInstance($this->TableName, 'Table');
$msg=JText::_('Saved  '.$this->TableName);


			$ruta=JRoute::_('index.php?option=com_properties&amp;Itemid='.JRequest::getVar('Itemid'));
	$this->setRedirect($ruta );
	

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

			$msg .= JText::_( 'Deleted '.$this->TableName );
			
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
			$msg .= JText::_( 'Image Deleted' );
			
		}

		$this->setRedirect( 'index.php?option=com_properties&controller=property&table='.$this->TableName.'&task=edit&cid[]='.$id, $msg );
		//echo 'borar'.JRequest::getVar('borrar');
		//echo '<br>id:'.JRequest::getVar('id');
	}


		
	
	function CambiarTamano($nombre,$max_width,$max_height,$destinoCopia,$destinoNombre,$destino)
{

/*
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
*/





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