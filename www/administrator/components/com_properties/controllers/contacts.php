<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class PropertiesControllerContacts extends JController
{
	function __construct()
	{
		parent::__construct();
		
	
		$this->cid 		= JRequest::getVar( 'cid', array(0), '', 'array' );
		JArrayHelper::toInteger($this->cid, array(0));

		
		
	}	

	
	/** remove record(s)	 */
	function remove()
	{
	$option = JRequest::getVar('option');	
		$model = $this->getModel('contacts');
		if(!$model->delete()) {
		
			$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
			
		} else {
		
$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
foreach($cids as $cid) {
			$msg .= JText::_( 'Borrado contact : '.$cid );			
}
		
		}

		$this->setRedirect( 'index.php?option='.$option.'&view=contacts', $msg );
	}




}