<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );

class PropertiesViewDb extends JView{
	
	function display($tpl = null)
	{

	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/'.$option.'/includes/css/index.css');		
	$text = $TableName ? JText::_( ' &nbsp; &nbsp; ').JText::_( 'Properties' ) : JText::_( ' &nbsp; &nbsp; ').JText::_( 'Properties' );
	$icono = $TableName ? JText::_( $TableName.'.png' ) : JText::_( 'properties.png' );
JToolBarHelper::title(   JText::_( $text ), $icono);

	
$Products		= $this->Products();
$this->assignRef( 'Products'		, $Products );


$Category		= $this->Category();
$Type			= $this->Type();
$Contacts			= $this->Contacts();

$Component		= $this->Component();
$this->assignRef( 'Component'		, $Component );

$this->assignRef( 'Category'		, $Category );
$this->assignRef( 'Type'		, $Type );
$this->assignRef( 'Contacts'		, $Contacts );
		
		
		
		parent::display( $tpl );
		
	}
	
	
function Products()
	{	
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT * FROM #__properties_products';		
        $db->setQuery($query);        
		$Product = $db->loadObjectList();	
	
	return $Product;
	}	


function Category()
	{	
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT * FROM #__properties_category';		
        $db->setQuery($query);        
		$Category = $db->loadObjectList();	
	
	return $Category;
	}

function Type()
	{	
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT * FROM #__properties_type';		
        $db->setQuery($query);        
		$Type = $db->loadObjectList();
			
		return $Type;
	}
	
function Contacts()
	{	
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT * FROM #__properties_contacts';		
        $db->setQuery($query);        
		$Contacts = $db->loadObjectList();
			
		return $Contacts;
	}


function Component()
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT * FROM #__components WHERE `option` = "com_properties"';		
        $db->setQuery($query);        
		$Component = $db->loadObjectList();
			
		return $Component;
	}

	
}