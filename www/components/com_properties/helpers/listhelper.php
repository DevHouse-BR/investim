<?php
class ListHelper
{	

	
function MyVotes()
	{	
	$user =& JFactory::getUser();
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT * FROM #__properties_rating_user WHERE user_id = '.$user->id;		
        $db->setQuery($query);        
		$Votes = $db->loadObjectList();
	if($Votes){
	foreach ($Votes as $row) :
	$MyVotes[$row->product_id] = $row->rating;
	endforeach; 
	}
	return $MyVotes;
	}
	
function Images($id,$total)
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
	
function Pdfs($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT p.*,  '		
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug'					
				. ' FROM #__properties_pdfs AS p '							
				. ' WHERE p.published = 1'
				. ' AND p.parent = '.$id	
				. ' order by p.ordering'				
				;		
			
        $db->setQuery($query);   

		$Pdfs = $db->loadObjectList();

	return $Pdfs;
	
	}
	
	
	function ParentCategory($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT pc.*,c.name  '							
				. ' FROM #__properties_product_category AS pc '	
				. ' LEFT JOIN #__properties_category AS c ON c.id = pc.categoryid '						
				. ' WHERE pc.productid = '.$id	
				;		
			
        $db->setQuery($query);   
//echo $query;
		$ParentCategory = $db->loadObjectList();
//print_r($ParentCategory);	
return $ParentCategory;
	
	}
	
	
}