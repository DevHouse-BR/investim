<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewImages extends JView
{	
	function display($tpl = null)
	{
	global $mainframe;
	$option = JRequest::getVar('option');	
	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/'.$option.'/includes/css/index.css');
	
///MULTIUPLOAD		
		
		
		$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/Stickman.MultiUpload.js"></script>');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/Stickman.MultiUpload.css" type="text/css" />');


$mainframe->addCustomHeadTag('<script type="text/javascript">
		window.addEvent(\'domready\', function(){			
			new MultiUpload( $( \'ImageForm\' ).files, 24, \'[{id}]\', true, true );
		
});

	</script>
');


///MULTIUPLOAD	
	
echo JRequest::getVar('task');

JToolBarHelper::custom('saveImagesList', 'apply.png', 'apply_f2.png', 'Save Images Description', false);
		
	JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList();		
		JToolBarHelper::back();
		
		$items		= & $this->get( 'Data');
		$this->assignRef('items',		$items);
		
		$lists = & $this->get('List');
		$this->assignRef('lists', $lists);			
				
		$pagination =& $this->get('Pagination');
		$this->assignRef('pagination', $pagination);
		
		
		parent::display($layout);
		
		
	}
	
	
	
	
	function getImages($cid)
	{	
		$query = ' SELECT i.*  '			
			. ' FROM #__properties_images as i'
			. ' WHERE i.parent = '.$cid
			;	
	    $db 	=& JFactory::getDBO();
	    $db->setQuery($query);
		$IMG = $db->loadObjectList();
		
	return $IMG;	
	}	
	
	
	
}