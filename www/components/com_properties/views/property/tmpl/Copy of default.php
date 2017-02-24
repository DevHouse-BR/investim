<?php defined('_JEXEC') or die('Restricted access'); 
global $mainframe;
JHTML::_('behavior.tooltip'); 
JHTML::_('behavior.formvalidation');
jimport('joomla.filesystem.file');
$document =& JFactory::getDocument();
$lang =& JFactory::getLanguage();
$user =& JFactory::getUser();
$menus = &JSite::getMenu();
		$menu  = $menus->getActive();
		$menu_params = new JParameter( $menu->params );
		if($menu_params->get('show_page_title') & $menu_params->get('page_title')){
		$title=$menu_params->get('page_title');
		$Mkey.=' '.$title;
		}else{
		$title 		= $mainframe->getCfg( 'sitename' );	
		$Mkey.=' '.$title;
		}		
	$Product=$this->Product;
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );

$ShowImagesSystem=$params->get('ShowImagesSystem');
$SimbolPrice=$params->get('SimbolPrice');
$PositionPrice=$params->get('PositionPrice');
$currencyformat=$params->get('FormatPrice');
$WidthThumbsAccordion=$params->get('WidthThumbsAccordion');
$HeightThumbsAccordion=$params->get('HeightThumbsAccordion');
$ThumbsInAccordion=$params->get('ThumbsInAccordion');

$Listlayout=$params->get('Listlayout');
$DetailLayout=$params->get('DetailLayout');
$ActivarDescripcion=$params->get('ActivarDescripcion');
$ActivarDetails=$params->get('ActivarDetails');
$ActivarContactar=$params->get('ActivarContactar');
$ActivarReservas=$params->get('ActivarReservas');
$ActivarMapa=$params->get('ActivarMapa');
$ActivarTabs=$params->get('ActivarTabs');
$ActivarVideo=$params->get('ActivarVideo');
$ActivarPanoramica=$params->get('ActivarPanoramica');
$ShowImagesSystemDetail=$params->get('ShowImagesSystemDetail');
$WidthThumbsDetail=$params->get('WidthThumbsDetail');
$HeightThumbsDetail=$params->get('HeightThumbsDetail'); 

$showComments=$params->get('showComments');
$useComment2=$params->get('useComment2');
$useComment3=$params->get('useComment3');
$useComment4=$params->get('useComment4');
$useComment5=$params->get('useComment5');
$ShowVoteRating=$params->get('ShowVoteRating');

$md_country=$params->get('md_country');
$md_state=$params->get('md_state');
$md_locality=$params->get('md_locality');
$md_category=$params->get('md_category');
$md_type=$params->get('md_type');


$WidthThumbs=$params->get('WidthThumbs');
$HeightThumbs=$params->get('HeightThumbs');



$UseCountry=$params->get('UseCountry');
$UseState=$params->get('UseState');
$UseLocality=$params->get('UseLocality');
$ShowReferenceInList=$params->get('ShowReferenceInList');
$ShowLogoAgent=$params->get('ShowLogoAgent');
$ShowCategoryInList=$params->get('ShowCategoryInList');
$ShowTypeInList=$params->get('ShowTypeInList');
$ShowAddShortListLink=$params->get('ShowAddShortListLink');
$ShowFeaturesInList=$params->get('ShowFeaturesInList');



$AmountMonthsCalendar=$params->get('AmountMonthsCalendar');
$PeriodOnlyWeeks=$params->get('PeriodOnlyWeeks');
$PeriodAmount=$params->get('PeriodAmount');
$PeriodStartDay=$params->get('PeriodStartDay');


	if($md_country){
		$title.=$Product->name_country;
		$Mkey.=', '.$Product->name_country;
	}

	if($md_state){
		$title.=' - '.$Product->name_state;
		$Mkey.=', '.$Product->name_state;
	}

	if($md_locality){
		$title.=' - '.$Product->name_locality;
		$Mkey.=', '.$Product->name_locality;
	}

	if($md_category){
		$title.=' - '.$Product->name_category;
		$Mkey.=', '.$Product->name_category;
	}

	if($md_type){
		$title.=' - '.$Product->name_type;
		$Mkey.=', '.$Product->name_type;
	}

$title.=' - '.$Product->name;

$document->setTitle( $title );
$document->setMetadata('keywords',$Mkey);
$document->setDescription( $title.'.'.substr($Product->description,0,200));


if(!JRequest::getVar('Itemid')){$Itemid = 0;}else{$Itemid = JRequest::getVar('Itemid');}

$view = JRequest::getVar('view');

$id = JRequest::getVar('id');
$cid = JRequest::getVar('cid', 0, '', 'int');
$tid = JRequest::getVar('tid', 0, '', 'int');

//echo 'cid: '.$cid.' tid: '.$tid.' id: '.$id.' view: '.$view.'<br>';

//echo $Product->refresh_time;
//echo date('j F Y', strtotime($Product->refresh_time));



if($ShowVoteRating){
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'vote.php' );
echo VoteHelper::Header();
}


if($DetailLayout==0){$DetailLayout=NULL;}
if($ActivarTabs==1){
require_once( JPATH_COMPONENT.DS.'views'.DS.'templates'.DS.'details_tab'.$DetailLayout.'.php' );
}else{
require_once( JPATH_COMPONENT.DS.'views'.DS.'templates'.DS.'details'.$DetailLayout.'.php' );
}
?>


<br />


