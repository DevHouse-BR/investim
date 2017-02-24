<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewBooking extends JView
{	
	function display($tpl = null)
	{
			global $mainframe;	
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowImagesSlimbox=$params->get('ShowImagesSlimbox');
$showComments=$params->get('showComments');
$ActivarPanoramica=$params->get('ActivarPanoramica');
$ActivarTabs=$params->get('ActivarTabs');

$user =& JFactory::getUser();
$this->assignRef('user',		$user);

$id = JRequest::getVar('id', 0, '', 'int');			
$Product		= $this->getProduct($id); 
if($Product->id){

		// Get the page/component configuration and article parameters
		$item->params = clone($params);
		$aparams = new JParameter($item->attribs);

		// Merge article parameters into the page configuration
		$item->params->merge($aparams);
		$dispatcher	=& JDispatcher::getInstance();
		JPluginHelper::importPlugin('content');
		$results = $dispatcher->trigger('onPrepareContent', array (& $Product, & $item->params, 0));			


$Rates			=& $this->Rates($Product->id);
	$this->assignRef('Rates',	$Rates);

$Images			=& $this->Images($Product->id);
	$this->assignRef('Images',	$Images);	

$SubProducts			=& $this->SubProducts($Product->id);
	$this->assignRef('SubProducts',	$SubProducts);	

if($SubProducts){
foreach($SubProducts as $sp){
$ImagesSubProducts[$sp->id]	=& $this->Images($sp->id);
$this->assignRef('ImagesSubProducts',	$ImagesSubProducts);
}
}


$this->assignRef('Product',		$Product);	


//$Video->text='{youtube}DV81bAghxBU{/youtube} ';
$results = $dispatcher->trigger('onPrepareContent', array (& $Video, & $item->params, 0));	


	parent::display($tpl);
	}
}

function getProduct($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT p.*,c.name as name_category,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile,t.name as name_type, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sdslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_category AS c ON c.id = p.cid '
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' WHERE p.published = 1 '	
				. ' AND p.id = '.$id;
					
        $db->setQuery($query);   
//echo str_replace('#_','jos',$query);
		$Product = $db->loadObject();

	return $Product;
	}
	
	
function SubProducts($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT p.*, '		
			. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
			. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
			. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Tslug'	
			. ' FROM #__properties_products as p '	
			. ' LEFT JOIN #__properties_category AS c ON c.id = p.cid '	
			. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '			
			. ' WHERE p.published = 1 AND p.parent = '.$id			
			. ' order by p.ordering ';		
        $db->setQuery($query);   

		$SubProducts = $db->loadObjectList();

	return $SubProducts;
	}
	
	

	function Images($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT i.* '			
			. ' FROM #__properties_images as i '					
			. ' WHERE i.published = 1 AND i.parent = '.$id			
			. ' order by i.ordering ';		
        $db->setQuery($query);   

		$Images = $db->loadObjectList();

	return $Images;
	}
		
	
	function Rates($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT rt.* '			
			. ' FROM #__properties_rates as rt '					
			. ' WHERE rt.published = 1 AND rt.productid = '.$id			
			. ' order by rt.ordering ';		
        $db->setQuery($query);   

		$Comments = $db->loadObjectList();

	return $Comments;
	}	
	
	
	
}