<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewUsers extends JView
{	
	function display($tpl = null)
	{
	global $mainframe;
	$option = JRequest::getVar('option');
echo JRequest::getVar('task');
		if(JRequest::getVar('task')=='edit' or JRequest::getVar('task')=='add'){

		$User		=& $this->get('User');	
			
		$ShortList = $this->ShortList($User->id);	
		$this->assignRef('ShortList',		$ShortList);
		
		$Votes = $this->Votes($User->id);	
		$this->assignRef('Votes',		$Votes);
			
		$Reviews = $this->Reviews($User->id);	
		$this->assignRef('Reviews',		$Reviews);
		
		JToolBarHelper::title(   JText::_( 'Users' ).': <small><small>[ ' . $text.' ]</small></small>' );

		
		$this->assignRef('User',		$User);			
		
		parent::display($layout);
		
		}else{

		
			
$user =& JFactory::getUser();
$this->assignRef('user',$user);	



		$lists = & $this->get('List');
		$this->assignRef('lists', $lists);		
		
		$items		= & $this->get( 'Data');
		$this->assignRef('items',		$items);
		
		$pagination =& $this->get('Pagination');
		$this->assignRef('pagination', $pagination);		
		parent::display($tpl);
	
		}
	}
	
	
	
	
	function ShortList($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT s.*,p.name as name_product FROM #__properties_lightbox as s '
			. ' LEFT JOIN #__properties_products as p on p.id = s.propid '
			. ' WHERE uid = '.$id ;
				
        $db->setQuery($query);   

		$ShortList = $db->loadObjectList();


	return $ShortList;
	}
	
	function Votes()
	{	
	$user =& JFactory::getUser();
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT v.*,p.name as name_product FROM #__properties_rating_user AS v '
			. ' LEFT JOIN #__properties_products as p on p.id = v.product_id '
			. ' WHERE user_id = '.$user->id;		
        $db->setQuery($query);        
		$Votes = $db->loadObjectList();
	/*
	if($Votes){
	foreach ($Votes as $row) :
	$MyVotes[$row->product_id] = $row->rating;
	endforeach; 
	}
	*/
	return $Votes;//$MyVotes;
	}
	
	function Reviews($id)
	{	
	$user =& JFactory::getUser();
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT cm.* '			
			. ' FROM #__properties_comments as cm '					
			. ' WHERE cm.userid = '.$user->id			
			. ' order by cm.date, cm.ordering ';		
        $db->setQuery($query);   

		$Comments = $db->loadObjectList();



	return $Comments;
	}	
	
}