<?php defined('_JEXEC') or die('Restricted access'); 
global $mainframe;
JHTML::_('behavior.tooltip');
jimport('joomla.filesystem.file');
$document =& JFactory::getDocument();
$lang =& JFactory::getLanguage();
$user =& JFactory::getUser();
$menus = &JSite::getMenu();

		$menu  = $menus->getActive();
		$menu_params = new JParameter( $menu->params );
		
		$title 		= $mainframe->getCfg( 'sitename' );
		
		if($menu_params->get('show_page_title') & $menu_params->get('page_title')){
		$title.=' - '.$menu_params->get('page_title');
		}			
	
$cid = JRequest::getVar('cid', 0, '', 'int');
$tid = JRequest::getVar('tid', 0, '', 'int');

if (JRequest::getVar('cid') ) {
		
		$title .=' - '.$this->NameCategory[$cid]; 		
	}	
if (JRequest::getVar('tid') ) {
		
		$title .=' - '.$this->NameType[$tid]; 		
	}	

	$document->setTitle( $title );

$document->setDescription( $title );
$document->setMetadata('keywords',$title);

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowTextSearch=$params->get('ShowTextSearch');
$ShowOrderBy=$params->get('ShowOrderBy');
$ShowOrderByDefault=$params->get('ShowOrderByDefault');
$ShowOrderDefault=$params->get('ShowOrderDefault');
$ActivarMapa=$params->get('ActivarMapa');
$currencyformat=$params->get('FormatPrice');
$PositionPrice=$params->get('PositionPrice');
$SimbolPrice=$params->get('SimbolPrice');
$WidthThumbs=$params->get('WidthThumbs',100);
$HeightThumbs=$params->get('HeightThumbs',75);
$WidthThumbsAccordion=$params->get('WidthThumbsAccordion',100);
$HeightThumbsAccordion=$params->get('HeightThumbsAccordion',75);
$ThumbsInAccordion=$params->get('ThumbsInAccordion',5);
$ShowMapLink=$params->get('ShowMapLink');
$ShowAddShortListLink=$params->get('ShowAddShortListLink');
$ShowViewPropertiesAgentLink=$params->get('ShowViewPropertiesAgentLink');
$ShowContactLink=$params->get('ShowContactLink');
$ShowVoteRating=$params->get('ShowVoteRating');
$UseCountry=$params->get('UseCountry');
$UseState=$params->get('UseState');
$UseLocality=$params->get('UseLocality');
$ShowReferenceInList=$params->get('ShowReferenceInList');
$ShowLogoAgent=$params->get('ShowLogoAgent');
$ShowCategoryInList=$params->get('ShowCategoryInList');
$ShowTypeInList=$params->get('ShowTypeInList');
$ShowAddressInList=$params->get('ShowAddressInList');
$ShowFeaturesInList=$params->get('ShowFeaturesInList');
$ShowImagesSystem=$params->get('ShowImagesSystem');
$Listlayout=$params->get('Listlayout');
$ShowAllParentCategory=$params->get('ShowAllParentCategory');

$view = JRequest::getVar('view');
$cyid = JRequest::getVar('cyid', 0, '', 'int');
$id = JRequest::getVar('id', 0, '', 'int');
$cid = JRequest::getVar('cid', 0, '', 'int');
$tid = JRequest::getVar('tid', 0, '', 'int');
$aid = JRequest::getVar('aid', 0, '', 'int');
$task = JRequest::getVar('task');
//echo 'cid: '.$cid.' tid: '.$tid.' id: '.$id.' view: '.$view.' task: '.$task.' cyid: '.$cyid.'<br>';
//echo 'aid: '.$aid.'<br>';
//print_r($this->NameCategory);





if($ShowImagesSystem == 1){
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/slimbox.js"></script>');
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/mediabox.js"></script>');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/slimbox.css" type="text/css" />');
}

if($ShowImagesSystem == 2){

$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/mediabox.js"></script>');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/slimbox.css" type="text/css" />');




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
				
				jQuery("a[title=\'Contactar\']").colorbox({iframe:true, width:650, height:550});


			});
		</script>
');

}








if($ShowVoteRating){
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'vote.php' );
echo VoteHelper::Header();
}




?> 
