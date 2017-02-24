<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );

class PropertiesViewComments extends JView
{
	
	function display($tpl = null)
	{
	global $mainframe;
	$option = JRequest::getVar('option');	
	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/com_properties/imagenes/properties.css');	
	
	
	
	if(JRequest::getVar('task')=='edit' or JRequest::getVar('task')=='add'){

		$Comments		=& $this->get('Comment');		

		$isNew = ($type->id < 1);
			
		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'State' ).': <small><small>[ ' . $text.' ]</small></small>' );
	JToolBarHelper::apply();
		JToolBarHelper::save();
		
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}			
		
		$this->assignRef('datos',		$Comments);			
		
		parent::display($layout);
		
		}else{
		
		
		
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();	
		
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