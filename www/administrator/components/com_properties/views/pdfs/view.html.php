<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewPdfs extends JView
{	
	function display($tpl = null)
	{
	global $mainframe;
	$option = JRequest::getVar('option');	
	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/'.$option.'/includes/css/index.css');	






if(JRequest::getVar('task')=='edit' or JRequest::getVar('task')=='add'){

		$pdf		=& $this->get('Pdf');	
		
		$isNew = ($product->id < 1);
		
		
			
		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Types' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::custom('save2new', 'new.png', 'new_f2.png', 'Save and new', false);
		JToolBarHelper::apply();
		JToolBarHelper::save();
		
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}			
		
		//$ParentProduct=$this->getParentProduct($product->parent);
		//$this->assignRef('ParentProduct',		$ParentProduct);
		$this->assignRef('datos',		$pdf);
		


		
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