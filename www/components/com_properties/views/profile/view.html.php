<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewProfile extends JView
{	
	function display($tpl = null)
	{
global $mainframe;
$user =& JFactory::getUser();
$task = JRequest::getVar('task');
$layout = JRequest::getVar('layout');

if (!$user->guest) {

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$Itemid =& $this->get('Itemid');
$this->assignRef('Itemid',		$Itemid);


			$Profile		=& $this->get('Profile');
			$this->assignRef('datos',		$Profile);
		parent::display();			


}else{
$Retornar='index.php?option=com_properties&view=panel&Itemid='.$Itemid;


	$link = JRoute::_( 'index.php?option=com_user&view=login' );
	$msg = JText::_( 'Registered Users only can acces' );	
		//$mainframe->Redirect($link, $msg);
		
		global $mainframe, $option;

		// Initialize variables
		$document	=& JFactory::getDocument();
		$user		=& JFactory::getUser();
		$pathway	=& $mainframe->getPathway();
		$image		= '';

		$menu   =& JSite::getMenu();
		$item   = $menu->getActive();
		if($item)
			$params	=& $menu->getParams($item->id);
		else
			$params	=& $menu->getParams(null);


		$type = (!$user->get('guest')) ? 'logout' : 'login';

		// Set some default page parameters if not set
		$params->def( 'page_title', 				1 );
		if(!$item)
		{
			$params->def( 'header_login', 			'' );
			$params->def( 'header_logout', 			'' );
		}

		$params->def( 'pageclass_sfx', 			'' );
		$params->def( 'login', 					'index.php' );
		$params->def( 'logout', 				'index.php' );
		$params->def( 'description_login', 		1 );
		$params->def( 'description_logout', 		1 );
		$params->def( 'description_login_text', 	JText::_( 'LOGIN_DESCRIPTION' ) );
		$params->def( 'description_logout_text',	JText::_( 'LOGOUT_DESCRIPTION' ) );
		$params->def( 'image_login', 				'key.jpg' );
		$params->def( 'image_logout', 				'key.jpg' );
		$params->def( 'image_login_align', 			'right' );
		$params->def( 'image_logout_align', 		'right' );
		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		$params->def( 'registration', 				$usersConfig->get( 'allowUserRegistration' ) );

		if ( !$user->get('guest') )
		{
			$title = JText::_( 'Logout');

			// pathway item
			$pathway->addItem($title, '' );
			// Set page title
			$document->setTitle( $title );
		}
		else
		{
			$title = JText::_( 'Login');

			// pathway item
			$pathway->addItem($title, '' );
			// Set page title
			$document->setTitle( $title );
		}

		// Build login image if enabled
		if ( $params->get( 'image_'.$type ) != -1 ) {
			$image = 'images/stories/'.$params->get( 'image_'.$type );
			$image = '<img src="'. $image  .'" align="'. $params->get( 'image_'.$type.'_align' ) .'" hspace="10" alt="" />';
		}

		// Get the return URL
		if (!$url = JRequest::getVar('return', '', 'method', 'base64')) {
			$url = base64_encode($Retornar);
		}

		$errors =& JError::getErrors();

		$this->assign('image' , $image);
		$this->assign('type'  , $type);
		$this->assign('return', $url);
		$this->assignRef('params', $params);




if($task!='login'){

$v=JRequest::getVar('view');
$l=JRequest::getVar('layout');

if($l){
$Retornar='index.php?option=com_properties&view=panel&layout=myprofile&Itemid='.$Itemid;
$url = base64_encode($Retornar);
}else{
$Retornar='index.php?option=com_properties&view=panel&Itemid='.$Itemid;
$url = base64_encode($Retornar);
}

$link = 'index.php?option=com_properties&view=panel&task=login&return='.$url ;
	$msg = JText::_( 'Registered Users only can access' );	
		$mainframe->Redirect($link, $msg);
}	


parent::display('login');

}
		
}


}