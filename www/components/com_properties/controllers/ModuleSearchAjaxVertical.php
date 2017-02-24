<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');

class PropertiesControllerModuleSearchAjaxVertical extends JController
{ 
    function display()
    {
        parent::display();
    }

	function ModuleSearchAjax()
	{	
	global $mainframe;
jimport( 'joomla.application.component.helper' );
$language =& JFactory::getLanguage();
$db 	=& JFactory::getDBO();

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$moduleclass_sfx    = $params->get( 'moduleclass_sfx' );
$ms_category 		= $params->get( 'ms_category',1 ) ;
$ms_type 			= $params->get( 'ms_type',1 ) ;
$ms_country 		= $params->get( 'ms_country',1 ) ;
$ms_state 			= $params->get( 'ms_state',1 ) ;
$ms_locality 		= $params->get( 'ms_locality',1 ) ;
$ms_price	 		= $params->get( 'ms_price',1 ) ;
$ms_bedrooms 		= $params->get( 'ms_bedrooms',1 ) ;
$ms_bathrooms 		= $params->get( 'ms_bathrooms',1 ) ;
$ms_parking 		= $params->get( 'ms_parking',1 ) ;
$ShowTotalResult	= $params->get( 'ShowTotalResult',1 ) ;
$ms_catradius 		= $params->get( 'ms_catradius',0 ) ;
$idcatradius1		= $params->get( 'idcatradius1',0 ) ;
$idcatradius2		= $params->get( 'idcatradius2',0 ) ;
$Rminprice	 		= $params->get( 'minprice' ) ;
$Rmaxprice	 		= $params->get( 'maxprice' ) ;
$simbolprice	 	= $params->get( 'simbolprice' ) ;
$idCountryDefault	= $params->get( 'idCountryDefault' ) ;
$idStateDefault		= $params->get( 'idStateDefault' ) ;

if($idCountryDefault>0){
$cyid=$idCountryDefault;
echo '<input type="hidden" name="cyid" value="'.$cyid.'" />';
}else{
$cyid = JRequest::getVar('cyid');
$query = 'SELECT * FROM #__properties_country WHERE published = 1 ORDER BY name';
        $db->setQuery($query);        
		$Countries = $db->loadObjectList();		
		
		$cyitems 	= array();
		$cyitems[] 	= JHTML::_('select.option',  '0', JText::_( 'All Countries' ) );

		foreach ( $Countries as $cyitem ) {
			$cyitems[] = JHTML::_('select.option',  $cyitem->id, $cyitem->name );
		}
$javascript = 'onChange="ModuleSearchAjaxVertical(this.value,0,0,0,0)"';		
$ComboCountries = JHTML::_('select.genericlist',   $cyitems, 'cyid', 'class="select_search_vertical"'. $javascript, 'value', 'text', $cyid );	
echo '<div class="combo_vertical">'.$ComboCountries.'</div>' ;
echo '<div class="separator_search_vertical"></div>' ;
}


$xid = 0;
if($idStateDefault>0){
$sid=$idStateDefault;
echo '<input type="hidden" name="sid" value="'.$sid.'" />';
}else{
$sid = JRequest::getVar('sid');
$query = 'SELECT * FROM #__properties_state WHERE published = 1 AND parent = '.$cyid.' ORDER BY name';		
        $db->setQuery($query);        
		$States = $db->loadObjectList();
		$sitems 	= array();
		$sitems[] 	= JHTML::_('select.option',  '0', JText::_( 'All States' ) );
			foreach ( $States as $sitem ) {
				$sitems[] = JHTML::_('select.option',  $sitem->id, $sitem->name );
			}
	$javascript = 'onChange="ModuleSearchAjaxVertical('.$cyid.',this.value,0,0,0,'.$xid.')"';		
	$ComboStates = JHTML::_('select.genericlist',   $sitems, 'sid', 'class="select_search_vertical"'. $javascript, 'value', 'text', $sid );	
		echo '<div class="combo_vertical">'.$ComboStates.'</div>' ;
		echo '<div class="separator_search_vertical"></div>' ;
}

$lid = JRequest::getVar('lid');
$tid = JRequest::getVar('tid');
$cid = JRequest::getVar('cid');
		
if($ms_locality){
	$query = 'SELECT * FROM #__properties_locality WHERE published = 1 AND parent = '.$sid.' ORDER BY name';		
        $db->setQuery($query);
		$Localities = $db->loadObjectList();
		$litems 	= array();
		$litems[] 	= JHTML::_('select.option',  '0', JText::_('All Localities') );		
			foreach ( $Localities as $litem ) {
				$litems[] = JHTML::_('select.option',  $litem->id, $litem->name );
			}	

	$javascript = 'onChange="ModuleSearchAjaxVertical('.$cyid.','.$sid.',this.value,0,0,'.$xid.')"';		
	$ComboLocalities = JHTML::_('select.genericlist',   $litems, 'lid', 'class="select_search_vertical"'. $javascript, 'value', 'text', $lid );	
		echo '<div class="combo_vertical">'.$ComboLocalities.'</div>' ;	
		echo '<div class="separator_search_vertical"></div>' ;
}	

if($ms_category){
$query = 'SELECT * FROM #__properties_category WHERE published = 1 ORDER BY name';		
        $db->setQuery($query);        
		$Categories = $db->loadObjectList();		
		$citems 	= array();
		$citems[] 	= JHTML::_('select.option',  '0', JText::_( 'All Categories' ) );
		foreach ( $Categories as $citem ) {
			$citems[] = JHTML::_('select.option',  $citem->id, $citem->name );
		}
$javascript = 'onChange="ModuleSearchAjaxVertical('.$cyid.','.$sid.','.$lid.',this.value,0,'.$xid.')"';		
$ComboCategories = JHTML::_('select.genericlist',   $citems, 'cid', 'class="select_search_vertical"'. $javascript, 'value', 'text', $cid );	
echo '<div class="combo_vertical">'.$ComboCategories.'</div>' ;	
echo '<div class="separator_search_vertical"></div>' ;
}

if($ms_type){
$query = 'SELECT * FROM #__properties_type WHERE published = 1 ORDER BY name';		
        $db->setQuery($query);        
		$Types = $db->loadObjectList();		
		$titems 	= array();
		$titems[] 	= JHTML::_('select.option',  '0', JText::_( 'All Types' ) );
		foreach ( $Types as $titem ) {
			$titems[] = JHTML::_('select.option',  $titem->id, $titem->name );
		}
$javascript = 'onChange="ModuleSearchAjaxVertical('.$cyid.','.$sid.','.$lid.','.$cid.',this.value,'.$xid.')"';		
$ComboTypes = JHTML::_('select.genericlist',   $titems, 'tid', 'class="select_search_vertical"'. $javascript, 'value', 'text', $tid );	
echo '<div class="combo_vertical">'.$ComboTypes.'</div>' ;	
echo '<div class="separator_search_vertical"></div>' ;
}

if ($ms_bedrooms) {

$Md[0]->id_dormitorios=0;
$Md[0]->dormitorios=JText::_('Bedrooms');
$Md[1]->id_dormitorios=1;
$Md[1]->dormitorios='1 '.JText::_('or more');
$Md[2]->id_dormitorios=2;
$Md[2]->dormitorios='2 '.JText::_('or more');
$Md[3]->id_dormitorios=3;
$Md[3]->dormitorios='3 '.JText::_('or more');
$Md[4]->id_dormitorios=4;
$Md[4]->dormitorios='4 '.JText::_('or more');
$Md[5]->id_dormitorios=5;
$Md[5]->dormitorios='5 '.JText::_('or more');

$dormitorios       = JHTML::_('select.genericlist',   $Md, 'id_bedrooms', 'class="select_search_vertical" ','id_dormitorios', 'dormitorios',  $id_dormitorios); 

echo '<div class="combo_vertical">'.$dormitorios.'</div>' ;
echo '<div class="separator_search_vertical"></div>' ;
}

if ($ms_bathrooms) {

$Mb[0]->id_bathrooms=0;
$Mb[0]->bathrooms=JText::_('Bathrooms');
$Mb[1]->id_bathrooms=1;
$Mb[1]->bathrooms='1 '.JText::_('or more');
$Mb[2]->id_bathrooms=2;
$Mb[2]->bathrooms='2 '.JText::_('or more');
$Mb[3]->id_bathrooms=3;
$Mb[3]->bathrooms='3 '.JText::_('or more');
$Mb[4]->id_bathrooms=4;
$Mb[4]->bathrooms='4 '.JText::_('or more');
$Mb[5]->id_bathrooms=5;
$Mb[5]->bathrooms='5 '.JText::_('or more');

$bathrooms       = JHTML::_('select.genericlist',   $Mb, 'id_bathrooms', 'class="select_search_vertical"','id_bathrooms', 'bathrooms',  $id_bathrooms); 

echo '<div class="combo_vertical">'.$bathrooms.'</div>' ;
echo '<div class="separator_search_vertical"></div>' ;
}

if ($ms_parking) {

$Mp[0]->id_parking=0;
$Mp[0]->parking=JText::_('Car Spaces');
$Mp[1]->id_parking=1;
$Mp[1]->parking='1 '.JText::_('or more');
$Mp[2]->id_parking=2;
$Mp[2]->parking='2 '.JText::_('or more');
$Mp[3]->id_parking=3;
$Mp[3]->parking='3 '.JText::_('or more');
$Mp[4]->id_parking=4;
$Mp[4]->parking='4 '.JText::_('or more');
$Mp[5]->id_parking=5;
$Mp[5]->parking='5 '.JText::_('or more');	

$parking       = JHTML::_('select.genericlist',   $Mp, 'id_parking', 'class="select_search_vertical"','id_parking', 'parking',  $id_parking); 

	
echo '<div class="combo_vertical">'.$parking.'</div>' ;
echo '<div class="separator_search_vertical"></div>' ;
}




if ($ms_price & $Rminprice & $Rmaxprice){

$RP = explode(';',$Rminprice);
$Trp =  count($RP);
$minprice[0]->id_minprice=0;
$minprice[0]->minprice=JText::_('Min Price');
for($p=0;$p<$Trp;$p++){
$minprice[$p+1]->id_minprice=$RP[$p];
$minprice[$p+1]->minprice=JText::_($simbolprice.' '.$RP[$p]);
}

$minprice       = JHTML::_('select.genericlist',   $minprice, 'id_minprice', 'class="select_search_vertical"','id_minprice', 'minprice',  $id_minprice); 

echo '<div class="combo_vertical">'.$minprice.'</div>';
echo '<div class="separator_search_vertical"></div>' ;
$RPx = explode(';',$Rmaxprice);
$Trpx =  count($RPx);
$maxprice[0]->id_maxprice=0;
$maxprice[0]->maxprice=JText::_('Max Price');
for($px=0;$px<$Trpx;$px++){
$maxprice[$px+1]->id_maxprice=$RPx[$px];
$maxprice[$px+1]->maxprice=JText::_($simbolprice.' '.$RPx[$px]);
}

$maxprice       = JHTML::_('select.genericlist',   $maxprice, 'id_maxprice', 'class="select_search_vertical"','id_maxprice', 'maxprice',  $id_maxprice); 

echo '<div class="combo_vertical">'.$maxprice.'</div>' ;
echo '<div class="separator_search_vertical"></div>' ;
}


?>


<?
}
	
}
?>