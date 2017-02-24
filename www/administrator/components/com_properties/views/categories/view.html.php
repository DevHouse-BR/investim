<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewCategories extends JView
{	
	function display($tpl = null)
	{
	global $mainframe;
	
	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/'.$option.'/includes/css/index.css');
	
	$option = JRequest::getVar('option');
echo JRequest::getVar('task');
		if(JRequest::getVar('task')=='edit' or JRequest::getVar('task')=='add'){

		$category		=& $this->get('Category');		

		$isNew = ($category->id < 1);
			
		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( $TableName ).': <small><small>[ ' . $text.' ]</small></small>' );
		
		JToolBarHelper::custom('save2new', 'new.png', 'new_f2.png', 'Save and new', false);
		JToolBarHelper::apply();
		JToolBarHelper::save();
		
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}			
		
		$this->assignRef('category',		$category);			
		
		parent::display($layout);
		
		}else{

		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();

		$CatChild		= & $this->get( 'CatChild');
		$this->assignRef('CatChild',		$CatChild);

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