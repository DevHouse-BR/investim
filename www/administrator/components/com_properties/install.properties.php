<?php
if (!defined('_JEXEC')) die('Direct Access to this location is not allowed.');

function com_install() 
{
?>
	<h2>Successfully installed Property!</h2> <BR>
<?php
}

jimport('joomla.filesystem.file');
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties';
JFolder::create($destino_imagen,0777);
JFolder::create($destino_imagen.DS.'images',0777);
JFolder::create($destino_imagen.DS.'images'.DS.'thumbs',0777);
JFolder::create($destino_imagen.DS.'pdfs',0777);
JFolder::create($destino_imagen.DS.'panoramics',0777);
JFolder::create($destino_imagen.DS.'tools',0777);
JFolder::create($destino_imagen.DS.'profiles',0777);


global $mainframe;
$component = JComponentHelper::getComponent( 'com_properties' );
//print_r($component);
echo $component->id;
$compid=$component->id;
	$db 	=& JFactory::getDBO();

$sql = "UPDATE `#__components` SET `params` = 'UseCountry=1\nUseCountryDefault=1\nUseState=1\nUseStateDefault=1\nUseLocality=1\nUseLocalityDefault=1\ncantidad_productos=5\nexpireDays=5\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nAutoCoord=1\nuser_add_locality=0\nSaveContactForm=0\nShowVoteRating=0\nListlayout=0\nWidthThumbs=100\nHeightThumbs=75\nWidthImage=640\nHeightImage=480\nShowImagesSystem=1\nShowOrderBy=0\nShowOrderByDefault=0\nShowOrderDefault=DESC\nSimbolPrice=$\nPositionPrice=0\nFormatPrice=0\nShowLogoAgent=1\nShowReferenceInList=1\nShowCategoryInList=1\nShowTypeInList=1\nShowAddressInList=1\nShowContactLink=1\nShowMapLink=1\nShowAddShortListLink=1\nShowViewPropertiesAgentLink=1\nThumbsInAccordion=5\nWidthThumbsAccordion=100\nHeightThumbsAccordion=75\nShowFeaturesInList=1\nShowAllParentCategory=0\nAmountPanel=\nAmountForRegistered=5\nRegisteredAutoPublish=1\nAmountForAuthor=5\nAmountForEditor=5\nAmountForPublisher=5\nAmountForManager=5\nAmountForAdministrator=5\nAutoPublish=1\nMailAdminPublish=1\nDetailLayout=0\nActivarTabs=0\nActivarDescripcion=1\nActivarDetails=1\nActivarVideo=1\nActivarPanoramica=1\nActivarContactar=1\nContactMailFormat=1\nActivarReservas=1\nActivarMapa=1\nShowImagesSystemDetail=1\nWidthThumbsDetail=120\nHeightThumbsDetail=90\nidCountryDefault=1\nidStateDefault=1\nms_country=1\nms_state=1\nms_locality=1\nms_category=1\nms_Subcategory=1\nms_type=1\nms_price=1\nms_bedrooms=1\nms_bathrooms=1\nms_parking=1\nShowTextSearch=1\nminprice=\nmaxprice=\nms_catradius=1\nidcatradius1=\nidcatradius2=\nShowTotalResult=1\nmd_country=1\nmd_state=1\nmd_locality=1\nmd_category=1\nmd_type=1\nshowComments=0\nuseComment2=0\nuseComment3=0\nuseComment4=0\nuseComment5=0\nAmountMonthsCalendar=3\nStartYearCalendar=2009\nStartMonthCalendar=1\nPeriodOnlyWeeks=0\nPeriodAmount=3\nPeriodStartDay=1\n';";
$db->setQuery( $sql );
if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
?>