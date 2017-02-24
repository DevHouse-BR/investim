<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class PropertiesControllerProperty extends PropertiesController
{	 
	function __construct()
	{
		parent::__construct();			
		$this->registerTask( 'apply',	'save' );			
		$this->TableName = JRequest::getCmd('table');		
	}	
	

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
if(JRequest::getCmd('id')){ $id_imagen = JRequest::getCmd('id');}
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

$AnchoMiniatura=200;
$AltoMiniatura=150;
$AnchoImagen=$params->get('AnchoImagen',800);
$AltoImagen=$params->get('AltoImagen',600);

$i=1;
        for($i=1;$i<25;$i++) { 
		$name = $_FILES['files']['name'][$i]; 
		if (!empty($name)) {
		$totalImagenes++;
		$nombreImagen[$i]=$_FILES['files']['name'] [$i];
		
		$typeimg = $_FILES['files']['type'] [$i];
		//echo 'type: '.$typeimg;				
		if($typeimg == 'image/jpeg'){$ext='.jpg';}else{$ext= '.'.substr($typeimg, strlen($typeimg) - 3); }
		//echo '  $ext  '.$ext;
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
	


	
	if ($model->store($post,$this->TableName)) {	

$LastModif = $model->getLastModif();
if($this->TableName=='products'){
	if ($model->storeProductCategory($post,$LastModif)) {	
	}
}
	
if(JRequest::getCmd('id')){ $id = JRequest::getCmd('id');}
else{$id = $LastModif;}

//send email to admin
$MailAdminPublish=$params->get('MailAdminPublish',0);
	if($MailAdminPublish==1){
		$this->SendEmailToAdmin($id);
	}
	
$msg=JText::_('Saved  '.$this->TableName);


$Itemid=JRequest::getCmd( 'Itemid' );
$task=JRequest::getCmd( 'task' );
switch (JRequest::getCmd( 'task' ))
		{
			case 'apply':
	$link = JRoute::_('index.php?option=com_properties&view=panel&task=edit&id='.$id.'&Itemid='.$Itemid,false);	
				break;
			case 'save':
	$link = JRoute::_('index.php?option=com_properties&view=panel&Itemid='.$Itemid,false);	
				break;					
		}

		$this->setRedirect($link, $msg);


$this->setMessage( JText::_( $msg ) );		
			
		} else {
			$msg = JText::_( 'Error Saving Greeting' );
			$msg .=  'err'.$this->Err;
		}


	}


	function SendEmailToAdmin($id)
	{
	global $mainframe;		
		
		$db		=& JFactory::getDBO();
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
		$post		= JRequest::get( 'post' );
		$user =& JFactory::getUser();
		$siteURL		= JURI::base();
		$UrlAdmin		= JURI::base().'administrator/index.php?option=com_properties&controller=property&table=products&task=edit&cid[]='.$post['id'];
		//print_r($post);
				
		$body = JText::_( 'PUBLISH_BODY0').' '.$user->name.'('.$user->username.')['.$user->id.']'."\n".		
		JText::_( 'PUBLISH_BODY1').' '.$id."\n"
		.JText::_('PUBLISH_BODY2')."\n"
		.' '.$UrlAdmin.' '."\n".
		JText::_('PUBLISH_BODY3')."\n".
		$body."\n".
		JText::_('PUBLISH_BODY4').' '.$user->email;
		
		$subject=JText::_('PUBLISH_SUBJET');
		//echo $body;
		//$this->send();	
		JUtility::sendMail($user->email, $user->name, $mailfrom, $subject, $body);
		
		
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
		//$this->setRedirect( 'index.php?option=com_properties&table='.$this->TableName, $msg );
		parent::display();
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
    
  $mapaddress = str_replace( " ", "%20", urlencode($post['adress']).", ".urlencode($Locality).", ".urlencode($State).", ".$post['postcode'].", ".urlencode($Country) );
        
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
/*
$nombre_archivo1 = 'components\com_properties\fabio_coord.txt';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= "\n".$coord;
$contenido1 .= "\n".$file;
fwrite($gestor1, $contenido1);
*/
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