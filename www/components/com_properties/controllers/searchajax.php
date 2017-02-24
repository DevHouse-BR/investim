<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');

class PropertiesControllerSearchajax extends JController
{ 
    function display()
    {
        parent::display();
    }


	function SearchAjax()
	{		
jimport( 'joomla.application.component.helper' );
$db 	=& JFactory::getDBO();
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );

$moduleclass_sfx    = $params->get( 'moduleclass_sfx' );
$ms_category 		= $params->get( 'ms_category',1 ) ;
$ms_Subcategory 		= $params->get( 'ms_Subcategory',0 ) ;
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
$UseCountry    = $params->get( 'UseCountry' );
$UseState    = $params->get( 'UseState' );
$UseLocality    = $params->get( 'UseLocality' );

if(JRequest::getVar('cyid')){$cyid = JRequest::getVar('cyid', 0, '', 'int');}else{$cyid = 0;}
if(JRequest::getVar('sid')){$sid = JRequest::getVar('sid', 0, '', 'int');}else{$sid = 0;}
if(JRequest::getVar('lid')){$lid = JRequest::getVar('lid', 0, '', 'int');}else{$lid = 0;}
if(JRequest::getVar('cid')){$cid = JRequest::getVar('cid', 0, '', 'int');}else{$cid = 0;}
if(JRequest::getVar('tid')){$tid = JRequest::getVar('tid', 0, '', 'int');}else{$tid = 0;}
$xid = 0;
$tid = JRequest::getVar('tid', 0, '', 'int');
$cid = JRequest::getVar('cid', 0, '', 'int');


if($UseCountry==1){

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
			
	$javascript = 'onChange="SearchAjax(this.value,0,0,0,0)"';		
	$ComboCountries = JHTML::_('select.genericlist',   $cyitems, 'cyid', 'class="select_search"'. $javascript, 'value', 'text', $cyid );
	}

}



if($UseState==1){
	
	if($idStateDefault>0){
		$sid=$idStateDefault;
		echo '<input type="hidden" name="sid" value="'.$sid.'" />';
	}else{
		
		
		if($UseCountry==1){		
			$query = 'SELECT * FROM #__properties_state WHERE published = 1 AND parent = '.$cyid.' ORDER BY name';		
        }else{		
			$query = 'SELECT * FROM #__properties_state WHERE published = 1 ORDER BY name';
		}
		
		$db->setQuery($query);        
		$States = $db->loadObjectList();
		
		$sitems 	= array();
		$sitems[] 	= JHTML::_('select.option',  '0', JText::_( 'All States' ) );
			if($States){		
				foreach ( $States as $sitem ) {
					$sitems[] = JHTML::_('select.option',  $sitem->id, $sitem->name );
				}
			}			
	$javascript = 'onChange="SearchAjax('.$cyid.',this.value,0,0,0,'.$xid.')"';		
	$ComboStates = JHTML::_('select.genericlist',   $sitems, 'sid', 'class="select_search"'. $javascript, 'value', 'text', $sid );	
	}
}



if($UseLocality){
if($ms_locality){
		if($UseState==1){
			$query = 'SELECT * FROM #__properties_locality WHERE published = 1 AND parent = '.$sid.' ORDER BY name';		
		}else{
			$query = 'SELECT * FROM #__properties_locality WHERE published = 1 ORDER BY name';		
        }
		$db->setQuery($query);
		$Localities = $db->loadObjectList();
		$litems 	= array();

		$litems[] 	= JHTML::_('select.option',  '0', JText::_( 'All Localities' ) );		
			if($Localities){			
				foreach ( $Localities as $litem ) {
					$litems[] = JHTML::_('select.option',  $litem->id, $litem->name );
				}	
			}
	$javascript = 'onChange="SearchAjax('.$cyid.','.$sid.',this.value,0,0,'.$xid.')"';		
	$ComboLocalities = JHTML::_('select.genericlist',   $litems, 'lid', 'class="select_search"'. $javascript, 'value', 'text', $lid );
}
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
$javascript = 'onChange="SearchAjax('.$cyid.','.$sid.','.$lid.',this.value,0,'.$xid.')"';		
$ComboCategories = JHTML::_('select.genericlist',   $citems, 'cid', 'class="select_search"'. $javascript, 'value', 'text', $cid );	
}
	
	
	
	
	
	
	
if($ms_Subcategory){
		$component_name = 'properties';
		$row->parent = 0;
		
		$query = 'SELECT * ' .
				' FROM #__'.$component_name.'_category as c' .				
				' WHERE published != -2' .				
				' ORDER BY parent, ordering';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();
		
		$children = array();

		if ( $mitems )
		{
			
			foreach ( $mitems as $v )
			{
				$pt 	= $v->parent;
				$list 	= @$children[$pt] ? $children[$pt] : array();
				array_push( $list, $v );
				$children[$pt] = $list;
			}
		}
		
		$list = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0 );
print_r($datos);
		
		$mitems 	= array();
		$mitems[] 	= JHTML::_('select.option',  '0', JText::_( 'All Categories' ) );

		foreach ( $list as $item ) {
			$mitems[] = JHTML::_('select.option',  $item->id, '&nbsp;&nbsp;&nbsp;'. $item->treename );
		}


$javascript = 'onChange="SearchAjax('.$cyid.','.$sid.','.$lid.',this.value,0,'.$xid.')"';		

$ComboSubCategories = JHTML::_('select.genericlist',   $mitems, 'cid', 'class="select_search"'. $javascript , 'value', 'text', $cid );	

}



if($ms_type){
$query = 'SELECT * FROM #__properties_type WHERE published = 1 AND parent = 0 OR parent = '.$cid.' ORDER BY name';	
        $db->setQuery($query);        
		$Types = $db->loadObjectList();		
		$titems 	= array();
		$titems[] 	= JHTML::_('select.option',  '0', JText::_( 'All Types' ) );
		foreach ( $Types as $titem ) {
			$titems[] = JHTML::_('select.option',  $titem->id, $titem->name );
		}
$javascript = 'onChange="SearchAjax('.$cyid.','.$sid.','.$lid.','.$cid.',this.value,'.$xid.')"';		
$ComboTypes = JHTML::_('select.genericlist',   $titems, 'tid', 'class="select_search"'. $javascript, 'value', 'text', $tid );	
}	
	



if ($ms_bedrooms) {

$Md[0]->id_bedrooms=0;
$Md[0]->bedrooms=JText::_('Bedrooms');
$Md[1]->id_bedrooms=1;
$Md[1]->bedrooms=JText::_('1 or more');
$Md[2]->id_bedrooms=2;
$Md[2]->bedrooms=JText::_('2 or more');
$Md[3]->id_bedrooms=3;
$Md[3]->bedrooms=JText::_('3 or more');
$Md[4]->id_bedrooms=4;
$Md[4]->bedrooms=JText::_('4 or more');
$Md[5]->id_bedrooms=5;
$Md[5]->bedrooms=JText::_('5 or more');	

$ComboBedrooms       = JHTML::_('select.genericlist',   $Md, 'id_bedrooms', 'class="select_search" ','id_bedrooms', 'bedrooms',  $id_bedrooms); 

}

if ($ms_bathrooms) {

$Mb[0]->id_bathrooms=0;
$Mb[0]->bathrooms=JText::_('Bathrooms');
$Mb[1]->id_bathrooms=1;
$Mb[1]->bathrooms=JText::_('1 or more');
$Mb[2]->id_bathrooms=2;
$Mb[2]->bathrooms=JText::_('2 or more');
$Mb[3]->id_bathrooms=3;
$Mb[3]->bathrooms=JText::_('3 or more');
$Mb[4]->id_bathrooms=4;
$Mb[4]->bathrooms=JText::_('4 or more');
$Mb[5]->id_bathrooms=5;
$Mb[5]->bathrooms=JText::_('5 or more');

$ComboBathrooms       = JHTML::_('select.genericlist',   $Mb, 'id_bathrooms', 'class="select_search"','id_bathrooms', 'bathrooms',  $id_bathrooms); 


}

if ($ms_parking) {

$Mp[0]->id_parking=0;
$Mp[0]->parking=JText::_('Car Spaces');
$Mp[1]->id_parking=1;
$Mp[1]->parking=JText::_('1 or more');
$Mp[2]->id_parking=2;
$Mp[2]->parking=JText::_('2 or more');
$Mp[3]->id_parking=3;
$Mp[3]->parking=JText::_('3 or more');
$Mp[4]->id_parking=4;
$Mp[4]->parking=JText::_('4 or more');
$Mp[5]->id_parking=5;
$Mp[5]->parking=JText::_('5 or more');	

$ComboParking       = JHTML::_('select.genericlist',   $Mp, 'id_parking', 'class="select_search"','id_parking', 'parking',  $id_parking); 


}

if ($ms_price){

if($Rminprice){
$RP = explode(';',$Rminprice);
$Trp =  count($RP);
$minprice[0]->id_minprice=0;
$minprice[0]->minprice=JText::_('Min Price');
for($p=0;$p<$Trp;$p++){
$minprice[$p+1]->id_minprice=$RP[$p];
$minprice[$p+1]->minprice=JText::_($simbolprice.' '.$RP[$p]);
}
$minprice       = JHTML::_('select.genericlist',   $minprice, 'id_minprice', 'class="select_search"','id_minprice', 'minprice',  $id_minprice); 


if($Rmaxprice){
$RPx = explode(';',$Rmaxprice);
$Trpx =  count($RPx);
$maxprice[0]->id_maxprice=0;
$maxprice[0]->maxprice=JText::_('Max Price');
for($px=0;$px<$Trpx;$px++){
$maxprice[$px+1]->id_maxprice=$RPx[$px];
$maxprice[$px+1]->maxprice=JText::_($simbolprice.' '.$RPx[$px]);
}

$maxprice       = JHTML::_('select.genericlist',   $maxprice, 'id_maxprice', 'class="select_search"','id_maxprice', 'maxprice',  $id_maxprice); 
}
}
}
?>
<?
if($ComboCountries){
echo '<div class="combo_search">'.$ComboCountries.'</div>' ;
}
if($ComboStates){
echo '<div class="combo_search">'.$ComboStates.'</div>' ;
}
if($ComboLocalities){
echo '<div class="combo_search">'.$ComboLocalities.'</div>' ;	
}
if($ComboCategories){
echo '<div class="combo_search">'.$ComboCategories.'</div>' ;
}
if($ComboSubCategories){
echo '<div class="combo_search">'.$ComboSubCategories.'</div>' ;
}
if($ComboTypes){
echo '<div class="combo_search">'.$ComboTypes.'</div>' ;
}
if($ComboBedrooms){
echo '<div class="combo_search">'.$ComboBedrooms.'</div>' ;
}
if($ComboBathrooms){
echo '<div class="combo_search">'.$ComboBathrooms.'</div>' ;
}
if($ComboParking){
echo '<div class="combo_search">'.$ComboParking.'</div>' ;
}
if($minprice){
echo '<div class="combo_search">'.$minprice.'</div>' ;
}
if($maxprice){
echo '<div class="combo_search">'.$maxprice.'</div>' ;
}	
}

	
}
?>