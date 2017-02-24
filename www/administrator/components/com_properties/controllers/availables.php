<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class PropertiesControllerAvailables extends JController
{	 
	
function __construct()
	{
		parent::__construct();
		$this->registerTask( 'unavailable', 	'available');	
		$this->registerTask( 'FromToUna', 	'FromToA');	
	}	

	
	
function available()
	{
$db 	=& JFactory::getDBO();
$id		= JRequest::getVar( 'id' );
$date		= JRequest::getVar( 'date' );
$this->publish	= ( $this->getTask() == 'available' ? 1 : 0 );	
	
		if (count( $id ) < 1)		{
			$action = $publish ? 'publish' : 'unpublish';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		
		
		
		
		$query = 'SELECT id FROM #__properties_available_product '
		. ' WHERE id_product = '. $id 
		. ' AND date = \''.$date.'\'' ;	
		
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$db->setQuery( $query );
		$existe = $db->loadResult();
		
		
		
		
		
	if($existe){		
		
		//changes
		$available = (int) $this->publish;
		
		if($available == 1){
		//delete record
		$query = 'DELETE FROM #__properties_available_product '
				.' WHERE id = '. $existe .' LIMIT 1;' ;	
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() . '  --- '.$existe);
		}
		
		
		}
		//end changes
	}else{
			//agregar unavailable
		if($this->publish == 0){
			$model = $this->getModel('availables');
			
			$data['id_product']=$id;
			$data['date']=$date;
			$data['available']=$this->publish;
			
			if ($model->store($data,'available_product')) {	
			
			}else{
			
			JError::raiseError(500, $db->getErrorMsg() );
			}
		}	
			
	}
	
	$link = 'index.php?option=com_properties&view=products&layout=form&task=edit&cid[]='.$id.'&tab=5';
		$this->setRedirect($link, $msg);
	
	
	

	}	
	
	
	
	
	
	
	
	
	
	function FromToA()
	{
$db 	=& JFactory::getDBO();
$id		= JRequest::getVar( 'id' );
$from		= JRequest::getVar( 'from' );
$to		= JRequest::getVar( 'to' );

$f=explode('-',$from);

$t=explode('-',$to);

$timestamp1 = mktime(0, 0, 0, $f[1], $f[2], $f[0]);
$timestamp2 = mktime(0, 0, 0, $t[1], $t[2], $t[0]); 

$diferencia = $timestamp2 - $timestamp1;

$dias=($diferencia/86400)+1;



$task=JRequest::getVar( 'task' );
$this->publish	= ( $task == 'FromToA' ? 1 : 0 );	
	
		if (count( $id ) < 1)		{
			$action = $publish ? 'publish' : 'unpublish';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		
$next_day=$from;		
for($save=0;$save<$dias;$save++)
	{		
		
		
		$query = 'SELECT id FROM #__properties_available_product '
		. ' WHERE id_product = '. $id 
		. ' AND date = \''.$next_day.'\'' ;	
		
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$db->setQuery( $query );
		$existe = $db->loadResult();		
		
		
	if($existe){		
		
		
		
		///start changes
		
		
		if($this->publish == 1){
		//delete record
		$query = 'DELETE FROM #__properties_available_product '
				.' WHERE id = '. $existe .' LIMIT 1;' ;	
		
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() . '  --- '.$existe);
		}
		
		
		}
		//end changes
	}else{
		//agregar unavailable
		if($this->publish == 0){
			$model = $this->getModel('availables');
			
			$data['id_product']=$id;
			$data['date']=$next_day;
			$data['available']=$this->publish;
			
			if ($model->store($data,'available_product')) {	
			
			}else{
			
			JError::raiseError(500, $db->getErrorMsg() );
			}
		}	
			
	
			
	}//end if existe
	$sumar_days.=$next_day. ' ..... ';
	
	$ft=explode('-',$next_day);
	$timestamp = mktime(0, 0, 0, $ft[1], $ft[2], $ft[0]);
	
	$next_day  = date('Y-m-d',mktime(0, 0, 0, $ft[1]  , $ft[2]+1, $ft[0]));
	
	
	}//end for
	
	
	
//	JError::raiseError(500, 'task : '.$task.' from : '.$from.' to : '.$to.' id : '.$id.' dias : '.$dias.' total : '.$sumar_days );
	
	
	$link = 'index.php?option=com_properties&view=products&layout=form&task=edit&cid[]='.$id.'&tab=5';
		$this->setRedirect($link, $msg);
	
	
	

	}	
	
	
	
	
	
	
	
	
	
	
function unavailable()
	{
	
	}		
	
	
	



/* Publicar Despublicar items */
	function publish()
	{
$this->TableName = JRequest::getVar('table');	
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
		$link = 'index.php?option=com_properties&view=availables&table='.$this->TableName;
		$this->setRedirect($link, $msg);		
	}






}