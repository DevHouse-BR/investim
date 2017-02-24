<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class PropertiesControllerComments extends PropertiesController
{
	function __construct()
	{
		parent::__construct();
		$this->registerTask( 'add'  , 	'edit' );
		$this->registerTask( 'apply',	'save' );
		$this->registerTask('save2new',		'save');
		$this->registerTask( 'unpublish', 	'publish');				

		$this->cid 		= JRequest::getVar( 'cid', array(0), '', 'array' );
		JArrayHelper::toInteger($this->cid, array(0));

		if(JRequest::getCmd('task') == 'orderup'){
		$this->orderSection( $this->cid[0], 1);
		}elseif(JRequest::getCmd('task') == 'orderdown'){
		$this->orderSection( $this->cid[0], -1);
		}		
		
	$this->TableName = JRequest::getCmd('table');	
		
	}	

	function display()
	{
		parent::display();
	}	
	
	function edit()
	{	
		JRequest::setVar( 'view', 'comments' );
		JRequest::setVar( 'layout', 'form' );		
		parent::display();
	}
	
	function publish()
	{	
	$cid		= JRequest::getVar( 'cid', array(), '', 'array' );
	$this->publish	= ( $this->getTask() == 'publish' ? 1 : 0 );		
	
		JArrayHelper::toInteger($cid);
		if (count( $cid ) < 1)		{
			$action = $publish ? 'publish' : 'unpublish';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		$this->cids = implode( ',', $cid );
		
		$query = 'UPDATE #__properties_comments'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $this->cids .' )'		
		;    
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$link = 'index.php?option=com_properties&view=comments';
		$this->setRedirect($link, $msg);		
	}
	
	
	
	
	
	
	function save()
	{
	jimport('joomla.filesystem.folder');
	global $mainframe;
	$component_name = 'properties';
	$option = JRequest::getVar('option');
	$model = $this->getModel('comments');
	$post = JRequest::get( 'post' );

$usedStars=1; 	
if($post['star1']){
$Stars=$post['star1'];
}else{
$Stars=5;
}
	
if($post['star2']){
$Stars+=$post['star2'];
$usedStars++;
}

if($post['star3']){
$Stars+=$post['star3'];
$usedStars++;
}

if($post['star4']){
$Stars+=$post['star4'];
$usedStars++;
}

if($post['star5']){
$Stars+=$post['star5'];
$usedStars++;
}

$post['star']=$Stars/$usedStars;

if ($model->store($post)) {		

if($post['id']){$id=$post['id'];}else{$id=$LastModif = $model->getLastModif();}

//JError::raiseError(500, $this->setError  );	

	switch (JRequest::getCmd( 'task' ))
		{
			case 'apply':
	$this->setRedirect( 'index.php?option='.$option.'&view='.$this->TableName.'&layout=form&task=edit&cid[]='.$id);
				break;
			case 'save':
	$this->setRedirect( 'index.php?option='.$option.'&view='.$this->TableName);
				break;					
		}
		$this->setMessage( JText::_( 'Guardado '.$this->TableName.' : '.$id.'!!!' ) );					
			
		} else {
			$msg = JText::_( 'Error Saving Greeting' );
			$msg .=  'err'.$this->Err;
		}		
		
	}
	
	
	
	
	
	function cancel()
	{
	$this->TableName = JRequest::getCmd('table');
		$msg = JText::_( 'Operation Cancelled' );
		//$this->setRedirect( 'index.php?option=com_properties&table='.$this->TableName, $msg );
		parent::display();
	}	
	
	
	
	
	
	
	
	/** remove record(s)	 */
	function remove()
	{
	$option = JRequest::getVar('option');
	$this->TableName = JRequest::getCmd('table');
		$model = $this->getModel('comments');
		if(!$model->delete()) {
		
			$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
			
		} else {
		
$id = JRequest::getVar( 'id' );

			$msg .= JText::_( 'Borrado '.$this->TableName.' : '.$id );
		
		}

		$this->setRedirect( 'index.php?option='.$option.'&view='.$this->TableName, $msg );
	}




}