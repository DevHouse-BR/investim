<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewProperty extends JView
{	
	function display($tpl = null)
	{
			global $mainframe;	
			
$id = JRequest::getVar('id', 0, '', 'int');				
if(!$id){

$Retornar='index.php?option=com_properties&view=properties&Itemid='.$Itemid;
$url = base64_encode($Retornar);
$link=LinkHelper::getLink('properties','','','','','','','','','');
//$link = 'index.php?option=com_properties&view=properties';
	$msg = '';	
		$mainframe->Redirect($link, $msg);		
}



$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowImagesSlimbox=$params->get('ShowImagesSlimbox');
$showComments=$params->get('showComments');
$ActivarPanoramica=$params->get('ActivarPanoramica');
$ActivarTabs=$params->get('ActivarTabs');
$DetailLayout=$params->get('DetailLayout');
if($DetailLayout==0){$DetailLayout=NULL;}

$ShowImagesSystem=$params->get('ShowImagesSystem');
$ShowImagesSystemDetail=$params->get('ShowImagesSystemDetail');

if($ShowImagesSystemDetail == 1){
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/slimbox.js"></script>');
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/mediabox.js"></script>');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/slimbox.css" type="text/css" />');
}

if($ShowImagesSystemDetail == 2){
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/colorbox/colorbox.css" type="text/css" media="screen"  />');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/colorbox/colorbox-custom.css" type="text/css" media="screen" />');
?>		
<?php        
/*
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_portafolio/includes/colorbox/colorbox-custom-ie.css" type="text/css" />');
	*/		
?>		
<?php
$mainframe->addCustomHeadTag('<script type="text/javascript" src="http://www.google.com/jsapi"></script>');
$mainframe->addCustomHeadTag('<script type="text/javascript">google.load("jquery", "1.3.2");</script>');

$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/colorbox/jquery.colorbox.js"></script>');        
        
$mainframe->addCustomHeadTag('
<script type="text/javascript">	
	jQuery.noConflict();
			document.write("<style type=\'text/css\'>.hidden{display:none;}<\/style>");			
			jQuery(document).ready(function(){
			
				//Examples of Global Changes
				jQuery.fn.colorbox.settings.bgOpacity = "0.9";

				//Examples of how to assign the ColorBox event to elements.
				jQuery("a[rel=\'jack\']").colorbox({transition:"fade"});
				jQuery("a[rel=\'dogs0\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs1\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs2\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs3\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs4\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs5\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs6\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs7\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs8\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs9\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				jQuery("a[rel=\'dogs10\']").colorbox({transition:"elastic", contentCurrent:"{current} / {total}"});
				
				jQuery("a[title=\'Contactar\']").colorbox();				
				jQuery("#imprimir").colorbox({});

			});
		</script>
');

}




if($ShowImagesSystemDetail == 3){
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/image-slideshow.js"></script>');
/*
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/image-slideshow.css" type="text/css" media="screen" />');
*/
}

if($ActivarPanoramica == 1){
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/pamoorama0.js"></script>');
}

if($ActivarTabs==1){$cssTabs='_tab';}else{$cssTabs=NULL;}
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/detail'.$cssTabs.$DetailLayout.'.css" type="text/css" media="screen" />');


$apikey=$params->get('apikey');
$distancia=$params->get('distancia');

$user =& JFactory::getUser();
$this->assignRef('user',		$user);			
$Product		=& $this->get('Product'); 


		// Get the page/component configuration and article parameters
		$item->params = clone($params);
		$aparams = new JParameter($item->attribs);

		// Merge article parameters into the page configuration
		$item->params->merge($aparams);
		$dispatcher	=& JDispatcher::getInstance();
		JPluginHelper::importPlugin('content');
		$results = $dispatcher->trigger('onPrepareContent', array (& $Product, & $item->params, 0));			


	if($showComments){
	$Comments=$this->Comments($Product->id);
	$this->assignRef('Comments', $Comments);
	$MyComment=$this->MyComment($Product->id);
	$this->assignRef('MyComment', $MyComment);
	
	}
	
	$ShowVoteRating=$params->get('ShowVoteRating');	
	if($ShowVoteRating==1){
	$MyVote			=& $this->MyVotes($Product->id);
	$this->assignRef('MyVote',	$MyVote);
	}


$Rates			=& $this->Rates($Product->id);
	$this->assignRef('Rates',	$Rates);

$Images			=& $this->Images($Product->id);
	$this->assignRef('ImagesProduct',	$Images);	

$SubProducts			=& $this->SubProducts($Product->id);
	$this->assignRef('SubProducts',	$SubProducts);	

foreach($SubProducts as $sp){
$ImagesSubProducts[$sp->id]	=& $this->Images($sp->id);
}
$this->assignRef('ImagesSubProducts',	$ImagesSubProducts);
$this->assignRef('Product',		$Product);	


$Video->text=$Product->video;
//$Video->text='{youtube}DV81bAghxBU{/youtube} ';
$results = $dispatcher->trigger('onPrepareContent', array (& $Video, & $item->params, 0));	

$this->assignRef('Video',		$Video);
$ComboCiudades	=& $this->get('ComboCiudades');
$this->assignRef('ComboCiudades',		$ComboCiudades);
	


$lat = $this->Product->lat;
$lng = $this->Product->lng;

if(!JRequest::getVar('layout')){
//$tpl='property';
}

if(JRequest::getVar('task')=='recommend'){
$tpl='recommend';
}
if(JRequest::getVar('task')=='contact'){
$tpl='contact';
}
if(JRequest::getVar('task')=='print'){
$tpl='print';
}
	parent::display($tpl);
	}


function SubProducts($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT p.*,c.name as name_category,t.name as name_type,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile, '		
			. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
			. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
			. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
			. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sslug,'		
			. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug, '	
			. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Tslug '
			. ' FROM #__properties_products as p '	
			. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
			. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
			. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
			. ' LEFT JOIN #__properties_category AS c ON c.id = p.cid '	
			. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
			. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '			
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
	
	
	function MyComment($product_id)
	{	
	$user =& JFactory::getUser();
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT cm.* '			
			. ' FROM #__properties_comments as cm'				
			. ' WHERE cm.userid = '.$user->id.' AND cm.productid = '.$product_id			
			. ' order by cm.date, cm.ordering ';		
        $db->setQuery($query);   

		$Comment = $db->loadObject();

	return $Comment;
	}	
	
	function Comments($id)
	{	
	
	$db 	=& JFactory::getDBO();	
	$query = ' SELECT cm.* '			
			. ' FROM #__properties_comments as cm '					
			. ' WHERE cm.published = 1 AND cm.productid = '.$id			
			. ' order by cm.date, cm.ordering ';		
        $db->setQuery($query);   

		$Comments = $db->loadObjectList();



	return $Comments;
	}	
	
	function MyVotes($product_id)
	{	
	$user =& JFactory::getUser();
	$db 	=& JFactory::getDBO();	
	$query = 'SELECT * FROM #__properties_rating_user WHERE product_id = '.$product_id.' AND user_id = '.$user->id;		
        $db->setQuery($query);        
		$Vote = $db->loadObject();
	
	return $Vote;
	
	}
	
	
}