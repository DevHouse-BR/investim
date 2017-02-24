<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewProperties extends JView
{	
	function display($tpl = null)
	{		
	require_once( JPATH_COMPONENT.DS.'views'.DS.'templates'.DS.'header.php' );		
	require_once( JPATH_COMPONENT.DS.'helpers'.DS.'listhelper.php' );

$task = JRequest::getVar('task');	

//echo $task;
switch ($task){
case 'search' :
$items		= & $this->get( 'DataSearch');
$pagination =& $this->get('PaginationSearch');
break;

case 'availables' :
$items		= & $this->get( 'DataAvailables');
$pagination =& $this->get('PaginationAvailables');
break;

case 'agentlisting' :
$DataAgent= & $this->get( 'DataAgent');
$this->assignRef('DataAgent',		$DataAgent);
$items		= & $this->get( 'DataAgentListing');
$pagination =& $this->get('PaginationAgentListing');
break;
case 'print' :
$list = JRequest::getVar('list');
if($list=='search'){
$items		= & $this->get( 'DataSearch');
$pagination =& $this->get('PaginationSearch');
}else{
$items		= & $this->get( 'Data');
$pagination =& $this->get('Pagination');
}
break;
default :
$items		= & $this->get( 'Data');
$pagination =& $this->get('Pagination');
break;
}


$this->assignRef('items',		$items);
$this->assignRef('pagination', $pagination);
//print_r($items);
/*
$ThisAgent				=& $this->ThisAgent();
$this->assignRef('ThisAgent',	$ThisAgent);
*/
	if($ShowVoteRating==1){
		$MyVotes			=ListHelper::MyVotes();
		$this->assignRef('MyVotes',	$MyVotes);
	}
	

if($items)
	{
	foreach($items as $Product){
		$Images[$Product->id]		=ListHelper::Images($Product->id,$ThumbsInAccordion);
			
		$Pdfs[$Product->id]		= ListHelper::Pdfs($Product->id);
		
	}
	}

	
	$this->assignRef('Images',	$Images);
	$this->assignRef('Pdfs',		$Pdfs);


if($ShowAllParentCategory){
if($items)
	{
	foreach($items as $Product){
		$ParentCategory[$Product->id]		= ListHelper::ParentCategory($Product->id);
		}
	}
	}
	
	$this->assignRef('ParentCategory',	$ParentCategory);
	


$layout = JRequest::getVar('layout');
echo $layout;
if($layout){
parent::display();
}else{	

if($Listlayout==0){$Listlayout=null;}
	$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/list'.$Listlayout.'.css" type="text/css" />');
	
	
		require_once( JPATH_COMPONENT.DS.'views'.DS.'templates'.DS.'list'.$Listlayout.'.php' );		
}		
	}
	
}