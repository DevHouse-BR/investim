<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class PropertiesControllerContact extends JController
{

	function display()
	{
	
	$Vista=JRequest::getVar('menutype');
	if($Vista){
	JRequest::setVar( 'view', 'template'.$Vista );
	JRequest::setVar( 'layout', 'default' );
	}
		//parent::display();
	}
	
	
	
	
	function send_contact()
	{
		global $mainframe;		
		$component = JComponentHelper::getComponent( 'com_properties' );
		$params = new JParameter( $component->params );
		$mail_contact=$params->get('mail_contact');		
		


		$send_to = $mail_contact;

		
		$db		=& JFactory::getDBO();
		
		$post = JRequest::get( 'post' );

		$popup	= JRequest::getInt( 'popup',0,'post' );




	$Itemid=JRequest::getVar('Itemid');

 $product_id =  JRequest::getVar( 'product_id','','post' );
 $name =  JRequest::getVar( 'name','','post' );
 $email =  JRequest::getVar( 'email','','post' );
 $phone =  JRequest::getVar( 'phone','','post' );
 $address =  JRequest::getVar( 'address','','post' );
 $city =  JRequest::getVar( 'city','','post' );
 $state =  JRequest::getVar( 'state','','post' );
 $cp =  JRequest::getVar( 'cp','','post' );
 $text =  JRequest::getVar( 'text','','post' );
 $userfile =  JRequest::getVar( 'userfile','','post' );
 $emailCopy	= JRequest::getInt( 'email_copy',0,'post' );	
			
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
		
		$siteURL		= JURI::base();

if(!$send_to){$send_to=$mailfrom;}
	
	// Captcha Controller Patch rev. 4.5.0 Stable
		$dispatcher	= &JDispatcher::getInstance();
		$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.contact' ) );
		if ( $results[0] ) {
			$captchaparams = array( JRequest::getVar( 'captchacode', '', 'post' )
			, JRequest::getVar( 'captchasuffix', '', 'post' )
			, JRequest::getVar( 'captchasessionid', '', 'post' ));
			$results = $dispatcher->trigger( 'onCaptchaVerify', $captchaparams );
			if ( ! $results[0] ) {
				JError::raiseWarning( 'CAPTHCA', JText::_( 'CAPTCHACODE_DO_NOT_MATCH' ) );
				$link = JRoute::_('index.php?option=com_properties&view=form1&Itemid='.$Itemid,false);
				$this->setRedirect($link, $msg);
				
				return false;
			}
		}







if (isset($_FILES['userfile'])){ 
$this->TableName = 'contacts';	
$db 	=& JFactory::getDBO();
$component_name = 'properties';
require_once(JPATH_SITE.DS.'configuration.php');
$datos = new JConfig();	
$basedatos = $datos->db;
$dbprefix = $datos->dbprefix;
$query = "SHOW TABLE STATUS FROM `".$basedatos."` LIKE '".$dbprefix.$component_name."_".$this->TableName."';";

		$db->setQuery( $query );		
		$nextAutoIndex = $db->loadObject();

$id_archivo = $nextAutoIndex->Auto_increment;		
		
$destino_archivo = JPATH_SITE.DS.'images'.DS.'properties'.DS.'contacts'.DS;

//$ext= '.'.substr($typeimg, strlen($typeimg) - 3);



$ext = end(explode(".",strtolower($_FILES['userfile']['name'])));

$nombre_archivo = str_replace($ext,'',$_FILES['userfile']['name']);

$nombre_archivo = JFilterOutput::stringURLSafe($nombre_archivo).'.'.$ext;

//JError::raiseError(500,  $nombre_archivo.'.'.$ext );

move_uploaded_file($_FILES['userfile']['tmp_name'],	$destino_archivo.$id_archivo.'_'.$nombre_archivo); 

$post['userfile'] = $id_archivo.'_'.$nombre_archivo;
$ruta= JURI::root().'images/properties/contacts/'.$id_archivo.'_'.$nombre_archivo;

}



/*
$query = 	"SELECT * from #__properties_products where id = ".$product_id;
$db->setQuery( $query );				
$product = $db->loadObject();		
	*/	
		
		$body = html_entity_decode($body, ENT_QUOTES);
		
		$subject = $sitename.' : '.JText::_( 'Contact Form');



//$agentM= $email .' | '. $name.' | '.$emailPublicador.' | '.$subject.' | '.$body. '----------<br>'."\n";
//$CopyM = $mailfrom .' | '. $fromname.' | '.$email.' | '.$subject.' | '.$body. '----------<br>'."\n";
//JError::raiseError(500,  $agentM.$CopyM );

$ContactMailFormat=$params->get('ContactMailFormat',1);
if($ContactMailFormat==1){
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'contact'.DS.'form1_html.php');	
}else{
$headers  = '';
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'contact'.DS.'form1_txt.php');
}


$nombre_archivo1 = 'components\com_properties\consult_mail.html';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= "\n".$body_html;
fwrite($gestor1, $contenido1);



		JUtility::sendMail($mailfrom, $fromname, $send_to, $subject, $body_html, $headers);	
			
		//JUtility::sendMail($mailfrom, $fromname, 'fabiouz@gmail.com', $subject, $body_html, $headers);
		
		if($emailCopy == 1){
			JUtility::sendMail($mailfrom, $fromname, $email, $subject, $body_html,$headers);
		}	
		///save form////
		$SaveContactForm=$params->get('SaveContactForm',1);
		
		if($SaveContactForm==1){
		$this->TableName = 'contacts';
		$model = $this->getModel('contacts');	
		
		
		//$data['form_message']	= JRequest::getVar( 'text','','post' );			
		
		if ($model->store($post,$this->TableName)) {
		//JError::raiseError(500, $db->getErrorMsg() );
			}else{
			//JError::raiseError(500, 'eerrrreer' );
			}
		}

	
		
		////send to admin////
	/*	$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
		JUtility::sendMail($email, $fromname, $mailfrom, $subject, $body);
		*/
		/////////	
		 $Itemid =  JRequest::getVar( 'Itemid' );
		$layout=  JRequest::getVar( 'layout' );
		$msg=JText::_( 'Message send');	
	
	if(JRequest::getVar( 'product_id','','post' )){
	$popup=1;	
	}
	if($popup==1){
	JRequest::setVar( 'tmpl', 'component'  );
	JRequest::setVar( 'popup', 1  );
	}
	JRequest::setVar('message', $message);
		JRequest::setVar( 'view', 'form1' );		
		JRequest::setVar( 'contact_send', 1  );		
		JRequest::setVar( 'msg', $msg  );		
		parent::display();
	
		
	}
	
	
	
	
	
}