<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewProfiles extends JView
{	
	function display($tpl = null)
	{
	global $mainframe;
	$option = JRequest::getVar('option');
echo JRequest::getVar('task');
		if(JRequest::getVar('task')=='edit' or JRequest::getVar('task')=='add'){

		$profile		=& $this->get('Profile');		

		$isNew = ($type->id < 1);
			
		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Profiles' ).': <small><small>[ ' . $text.' ]</small></small>' );
	JToolBarHelper::apply();
		JToolBarHelper::save();
		
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}			
		
		$this->assignRef('profile',		$profile);			
		
		parent::display($layout);
		
		}else{

		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();	
			
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
}