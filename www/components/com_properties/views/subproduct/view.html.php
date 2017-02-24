<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewSubproduct extends JView
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



$ShowImagesSystem=$params->get('ShowImagesSystem');

if($ShowImagesSystem == 1){
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/slimbox.js"></script>');
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/mediabox.js"></script>');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/slimbox.css" type="text/css" />');
}

if($ShowImagesSystem == 2){
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


if($ActivarPanoramica == 1){
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/pamoorama0.js"></script>');
}



if($ShowImagesSystem == 3){

$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/image-slideshow.js"></script>');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/image-slideshow.css" type="text/css" />');

}


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
	$this->assignRef('Images',	$Images);	
	
$this->assignRef('Product',		$Product);	


$Video->text=$Product->video;
//$Video->text='{youtube}DV81bAghxBU{/youtube} ';
$results = $dispatcher->trigger('onPrepareContent', array (& $Video, & $item->params, 0));	

$this->assignRef('Video',		$Video);
$ComboCiudades	=& $this->get('ComboCiudades');
$this->assignRef('ComboCiudades',		$ComboCiudades);
	


$lat = $this->Producto->lat;
$lng = $this->Producto->lng;

if(!JRequest::getVar('layout')){
//$tpl='property';
}

if(JRequest::getVar('task')=='recommend'){
$tpl='recommend';
}
if(JRequest::getVar('task')=='contact'){
$tpl='contact';
}
if($ActivarTabs == 1){$tpl='tabs';}
	parent::display($tpl);
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