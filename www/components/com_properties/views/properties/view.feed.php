<?php
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

class PropertiesViewProperties extends JView
{
	function display($tpl = null)
	{
	
		global $mainframe;
		$db			=& JFactory::getDBO();
		$document	=& JFactory::getDocument();
		$params =& $mainframe->getParams();
		$document->link = JRoute::_('index.php?option=com_properties&view=properties');



$document->setMetaData('description',JURI::base());
		// Get some data from the model
		JRequest::setVar('limit', $mainframe->getCfg('feed_limit'));


$query = ' SELECT p.*,c.name as name_category,t.name as name_type,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile,pc.productid as idpc, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sdslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug, '	
		. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Typeslug '			
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '
				. ' LEFT JOIN #__properties_product_category AS pc ON p.id = pc.productid '
				. ' LEFT JOIN #__properties_category AS c ON c.id = pc.categoryid '
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' WHERE p.published = 1 '	
			//	. $this->sqlProvincia.' '
			//	. $this->sqlProvinciaDefecto.' '
			//	. $this->sqlCiudad.' '
				. $this->sqlType.' '
				. $this->sqlCategory				
				.' ORDER BY p.id DESC'			
				;
				$db->setQuery( $query );				
				$prod = $db->loadObjectList();
				


				
		foreach ( $prod as $row )
		{
		
			// strip html from feed item title
			$title = $this->escape( $row->name );
			$title = html_entity_decode( $title );
			// url link to article
			$link = JRoute::_( 'index.php?option=com_properties&view=property&cid='.$row->Cslug.'&tid='. $row->Typeslug.'&id='.$row->Pslug);
			// strip html from feed item description text
						
			$image = '<img width="100" align="left" alt="'.$item->title.'" src="'.JURI::base().'images/properties/peques/peque_'.$row->image1.'"/>';
			$category = ''.JText::_('Category').' : <b>'.$row->name_category.'</b>';
			$type = '<br>'.JText::_('Type').' : <b>'.$row->name_type.'</b>';
			$desc = '<div style="border: 1px solid red; margin: 10px; padding: 20px;">'.$row->description.'</div>';
			
			
			$description = $image.$category.$type.$desc;
			$description = $this->escape( $description );
			$description = html_entity_decode( $description );
			$listdate = $row->listdate;
			// load individual item creator class
			$item = new JFeedItem();			
			$item->title 		= $title;
			$item->link 		= $link;
			$item->description 	= $description;
			$item->date			= $listdate;
			$item->category   	= $row->name_category;
			$item->type   	= $row->name_type;

			// loads item info into rss array
			$document->addItem( $item );
		}

	

	}
}
?>
