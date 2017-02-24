<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewShortlist extends JView
{	
	function display($tpl = null)
	{		
	$user =& JFactory::getUser();
	global $mainframe;

require_once( JPATH_COMPONENT.DS.'views'.DS.'templates'.DS.'header.php' );		
	require_once( JPATH_COMPONENT.DS.'helpers'.DS.'listhelper.php' );
	
	$task = JRequest::getVar('task');	


if(!$user->id){

$Retornar='index.php?option=com_properties&view=shortlist&Itemid='.$Itemid;
$url = base64_encode($Retornar);
$link = 'index.php?option=com_properties&view=panel&task=login&return='.$url ;
	$msg = JText::_( 'Registered Users only can access' );	
		$mainframe->Redirect($link, $msg);		
}

$layout = JRequest::getVar('layout');

if($layout){
parent::display($tpl);
}else{

$itemsShortList		=& $this->get( 'DataShortList');
$paginationShortList =& $this->get('PaginationShortList');
$this->assignRef('items',		$itemsShortList);
$this->assignRef('pagination', $paginationShortList);

if($ShowVoteRating==1){
		$MyVotes			=ListHelper::MyVotes();
		$this->assignRef('MyVotes',	$MyVotes);
	}
	
foreach($itemsShortList as $Product){
		$Images[$Product->id]		=ListHelper::Images($Product->id,$ThumbsInAccordion);
			
		$Pdfs[$Product->id]		= ListHelper::Pdfs($Product->id);
		
	}
	
	
	$this->assignRef('Images',	$Images);
	$this->assignRef('Pdfs',		$Pdfs);
	require_once( JPATH_COMPONENT.DS.'views'.DS.'templates'.DS.'list.php' );
			
	}
	
	
}


}