<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );

class PropertiesViewProducts extends JView{
	
	function display($tpl = null)
	{

	global $mainframe;
	$option = JRequest::getVar('option');
	
	if(JRequest::getVar('task')=='edit' or JRequest::getVar('task')=='add'){
	
	$array = JRequest::getVar('cid',  0, '', 'array');
	$id=(int)$array[0];
	$isNew = ($id < 1);
	
			
		
		
		
		if (!$isNew)  {
		$product		=& $this->get('Product');
		
		$rates=$this->getRates($product->id);	
		$this->assignRef('rates',		$rates);	
		$Images=$this->getImages($product->id);
		$this->assignRef('Images',		$Images);
		
		$ParentProduct=$this->getParentProduct($product->parent);
		$this->assignRef('ParentProduct',		$ParentProduct);
		
		$this->assignRef('datos',		$product);
		}else{
		//echo 'is new';
		}

		
			
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
		
		
		$pagination =& $this->get('Pagination');
		$this->assignRef('pagination', $pagination);	


foreach($items as $item){

$Images[$item->id]=$this->getImages($item->id);
		$this->assignRef('Images',		$Images);
		
		
		
}		
$this->assignRef('items',		$items);

		
		parent::display( $tpl );
		
	}
	
	
	}
	
	
	function getParentProduct($id)
		{
		
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT p.*  '						
			. ' FROM #__properties_products AS p'
			. ' WHERE p.id = '.$id
			;		
        $db->setQuery($query);   

		$Menus = $db->loadObject();

	return $Menus;
	
		}
		
		
	function getRates($id)
		{
		
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT r.*'			
			. ' FROM #__properties_rates as r'			
			. ' WHERE r.productid = '.$id		
			. ' order by r.validfrom '
			;		
        $db->setQuery($query);   

		$Menus = $db->loadObjectList();

	return $Menus;
	
		}
		
		
function getImages($id,$total=1)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT i.* '			
			. ' FROM #__properties_images as i '					
			. ' WHERE i.published = 1 AND i.parent = '.$id			
			. ' order by i.ordering LIMIT '.($total+1);		
        $db->setQuery($query);   

		$Images = $db->loadObjectList();

	return $Images;
	}
	
}