<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );

class PropertiesViewLocalities extends JView{
	
	function display($tpl = null)
	{
	$option = JRequest::getVar('option');
	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/com_properties/imagenes/properties.css');
	
	
	if(JRequest::getVar('task')=='edit' or JRequest::getVar('task')=='add'){

		$locality		=& $this->get('Locality');		

		$isNew = ($type->id < 1);
			
		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Locality' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::custom('save2new', 'new.png', 'new_f2.png', 'Save and new', false);
		JToolBarHelper::apply();
		JToolBarHelper::save();
		
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}			
		
		$this->assignRef('locality',		$locality);			
		
		parent::display($layout);
		
		}else{
		
		
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();

$items		= & $this->get( 'Data');
$pagination =& $this->get('Pagination');
$lists = & $this->get('List');

$this->assignRef('items',		$items);
$this->assignRef('pagination', $pagination);
$this->assignRef('lists', $lists);
parent::display($tpl);


		}
	}	
}