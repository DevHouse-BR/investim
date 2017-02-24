<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class PropertiesControllerAjaxCaptcha extends JController
{ 
    function display()
    {
        parent::display();
    }	


function ValidateCaptcha()
{


global $mainframe;

$captchacode=JRequest::getVar( 'captchacode' );
//echo $captchacode;
// Captcha Controller Patch rev. 4.5.0 Stable
		$dispatcher	= &JDispatcher::getInstance();
		$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.contact' ) );
		if ( $results[0] ) {
			
			/*$captchaparams = array( JRequest::getVar( 'captchacode', '', 'post' )
			, JRequest::getVar( 'captchasuffix', '', 'post' )
			, JRequest::getVar( 'captchasessionid', '', 'post' ));*/
			
			$captchaparams = array( JRequest::getVar( 'captchacode' )
			, JRequest::getVar( 'captchasuffix' )
			, JRequest::getVar( 'captchasessionid' ));
			
			
			$results = $dispatcher->trigger( 'onCaptchaVerify', $captchaparams );
			
			if ( ! $results[0] ) {
				//JError::raiseWarning( 'CAPTHCA', JText::_( 'CAPTCHACODE_DO_NOT_MATCH' ) );
			//	$this->display();
				//return false;
			echo '<img height="16px" src="'.JURI::base().'components/com_properties/includes/img/delete.png" />';	
				
			}else{
			echo '<img  src="'.JURI::base().'components/com_properties/includes/img/icon-16-checkin.png" />';	
			}
		}
	
		
		
		
		
		
		
		
}


}
?>