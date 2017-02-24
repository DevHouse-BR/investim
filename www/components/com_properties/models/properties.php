<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class PropertiesModelProperties extends JModel
{
	var $_data;
	var $TableName = null;	
	var $_total = null;
	var $_pagination = null;

function __construct()
  {
 	parent::__construct();
	global $mainframe, $option;

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$this->Mostrar = $params->get( 'cantidad_productos' ) ;

if(!JRequest::getVar('limitstart')){
	$this->setState('limit', $this->Mostrar);
	$this->setState('limitstart', 0);
}else{
	$limit = $this->Mostrar;
	$this->setState('limit', $this->Mostrar);
	
$limitstart = JRequest::getVar('limitstart');
$this->setState('limitstart', $limitstart);	

$start = JRequest::getVar('start');
$this->setState('start', $start);	
}
$ShowOrderByDefault=$params->get('ShowOrderByDefault');
$ShowOrderDefault=$params->get('ShowOrderDefault');

$this->filter_order		= $mainframe->getUserStateFromRequest( "$option.filter_order",		'filter_order',	$ShowOrderByDefault ,	'cmd' );
		$this->filter_order_Dir	= $mainframe->getUserStateFromRequest( "$option.filter_order_Dir",	'filter_order_Dir',	$ShowOrderDefault,		'word' );





$menus = &JSite::getMenu();
$menu  = $menus->getActive();
$menu_params = new JParameter( $menu->params );
$DetailsMarket=$menu_params->get( 'DetailsMarket');
$this->DetailsMarket = $DetailsMarket;



$this->pathway();


  }


function pathway()
	{
	global $mainframe;	
	$Itemid=$this->getItemid();	
	
	
	require_once( JPATH_SITE.DS.'components'.DS.'com_properties'.DS.'helpers'.DS.'link.php' );
	
	
	$breadcrumbs = & $mainframe->getPathWay();	
$link='index.php?option=com_properties&view=properties&Itemid='.$Itemid;

if(JRequest::getVar('cyid')){
$cyid=JRequest::getVar('cyid', 0, '', 'int');
$query = ' SELECT cy.*, '
.' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":",cy.id, cy.alias) ELSE cy.id END as CYslug'
.' FROM #__properties_country as cy '
.' WHERE cy.id = '.$cyid;
$this->_db->setQuery( $query );
$this->_dataCountry = $this->_db->loadObject($query);

$link.='&cyid='.$this->_dataCountry->CYslug;

$breadcrumbs->addItem( $this->_dataCountry->name, JRoute::_( $link ) );

}

if(JRequest::getVar('sid')){
$sid=JRequest::getVar('sid', 0, '', 'int');
$query = ' SELECT s.*, '
.' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":",s.id, s.alias) ELSE s.id END as Sslug'
.' FROM #__properties_state as s '
.' WHERE s.id = '.$sid;
$this->_db->setQuery( $query );
$this->_dataState = $this->_db->loadObject($query);
$link.='&sid='.$this->_dataState->Sslug;
$breadcrumbs->addItem( $this->_dataState->name, JRoute::_( $link ) );

}

if(JRequest::getVar('lid')){
$lid=JRequest::getVar('lid', 0, '', 'int');
$query = ' SELECT l.*, '
.' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":",l.id, l.alias) ELSE l.id END as Lslug'
.' FROM #__properties_locality as l '
.' WHERE l.id = '.$lid;
$this->_db->setQuery( $query );
$this->_dataLocality = $this->_db->loadObject($query);
$link.='&lid='.$this->_dataLocality->Lslug;
$breadcrumbs->addItem( $this->_dataLocality->name, JRoute::_( $link ) );

}


if(JRequest::getVar('cid')){

$cid=JRequest::getVar('cid', 0, '', 'int');

$query = ' SELECT c.*, '
.' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":",c.id, c.alias) ELSE c.id END as Cslug'
.' FROM #__properties_category as c '
.' WHERE c.id = '.$cid;

$this->_db->setQuery( $query );
$this->_dataCategory = $this->_db->loadObject($query);

$query2 = ' SELECT c.*, '
.' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":",c.id, c.alias) ELSE c.id END as Cslug'
.' FROM #__properties_category as c '
.' WHERE c.id = '.$this->_dataCategory->parent;

$this->_db->setQuery( $query2 );
$this->_dataParentCategory = $this->_db->loadObject($query2);

if($this->_dataParentCategory){

$link2=$link.='&cid='.$this->_dataParentCategory->Cslug;

$link = LinkHelper::getLink('properties','showcategory','','','','',$this->_dataParentCategory->Cslug,'','');

$breadcrumbs->addItem( $this->_dataParentCategory->name, JRoute::_( $link ) );
}

$link3=$link.='&cid='.$this->_dataCategory->Cslug;

$link = LinkHelper::getLink('properties','showcategory','','','','',$this->_dataParentCategory->Cslug,'','');

$breadcrumbs->addItem( $this->_dataCategory->name, JRoute::_( $link ) );

}
	
if(JRequest::getVar('tid')){
$tid=JRequest::getVar('tid', 0, '', 'int');
$query = ' SELECT t.*, '
.' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":",t.id, t.alias) ELSE t.id END as Tslug'
.' FROM #__properties_type as t '
.' WHERE t.id = '.$tid;
$this->_db->setQuery( $query );
$this->_dataType = $this->_db->loadObject($query);
$link.='&tid='.$this->_dataType->Tslug;

$link = LinkHelper::getLink('properties','showcategory','','','','',$this->_dataParentCategory->Cslug,$this->_dataType->Tslug,'');

$breadcrumbs->addItem( $this->_dataType->name, JRoute::_( $link ) );

}


	}

function _buildQuery()
	{	
	$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowOrderByDefault = $params->get( 'ShowOrderByDefault' ) ;
$ShowOrderDefault = $params->get( 'ShowOrderDefault' ) ;
$expireDays = $params->get( 'expireDays' ) ;

$fromRefreshTime  = date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-$expireDays, date("Y")));

//echo $expireDays;

//echo ' : '.$fromRefreshTime;
$this->sqlExpire = ' AND refresh_time >= '.$fromRefreshTime;

if(JRequest::getVar('cyid')){
$this->sqlCountry = ' AND p.cyid = '.JRequest::getVar('cyid', 0, '', 'int');
}
if(JRequest::getVar('sid')){
$this->sqlState = ' AND p.sid = '.JRequest::getVar('sid', 0, '', 'int');
}
if(JRequest::getVar('lid')){
$this->sqlLocality = ' AND p.lid = '.JRequest::getVar('lid', 0, '', 'int');
}
if(JRequest::getVar('cid')){
		$this->sqlCategoryLeft = ' LEFT JOIN #__properties_product_category AS pc ON p.id = pc.productid LEFT JOIN #__properties_category AS c ON c.id = pc.categoryid';
		$this->sqlCategory = ' AND pc.categoryid = '.JRequest::getVar('cid', 0, '', 'int');
}else{
		$this->sqlCategoryLeft = ' LEFT JOIN #__properties_category AS c ON c.id = p.cid';
}
if(JRequest::getVar('tid')){
		$this->sqlType = ' AND p.type = '.JRequest::getVar('tid', 0, '', 'int');
}
if(JRequest::getVar('featured')){
$this->sqlCountry = ' AND p.featured = '.JRequest::getVar('featured', 0, '', 'int');
}


if($this->DetailsMarket){
$this->sqlDetailsMarket = ' AND p.available = '.$this->DetailsMarket;
}




	if($this->filter_order){$OrderBy = $this->filter_order;}else{$OrderBy = $ShowOrderByDefault;}
	
	switch ($OrderBy)
	{
	case 1: $o='p.refresh_time';
	break;
	case 2: $o='p.price';
	break;
	case 3: $o='c.name';
	break;
	case 4: $o='t.name';
	break;
	default: $o='p.refresh_time';
	break;
	}
		$this->sqlShowOrderBy = ' ORDER BY '.$o;		
		
		
	if($this->filter_order_Dir){	
	$this->sqlOrder=$this->filter_order_Dir;
	}else{
	$this->sqlOrder=$ShowOrderDefault;
	}
			$this->_query = ' SELECT p.*,c.name as name_category,t.name as name_type,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile, '//pc.productid as idpc, '
		//. ' pf.phone as phone_profile, pf.email as email_profile, '	
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug, '	
		. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Tslug '			
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '
				. $this->sqlCategoryLeft
				//. ' LEFT JOIN #__properties_product_category AS pc ON p.id = pc.productid '
				//. ' LEFT JOIN #__properties_category AS c ON c.id = pc.categoryid '
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' WHERE p.published = 1 '	
				. $this->sqlCountry
				. $this->sqlState
				. $this->sqlLocality
				. $this->sqlType.' '
				. $this->sqlCategory
				. $this->sqlDetailsMarket	
				. $this->sqlExpire
				. $this->sqlShowOrderBy .' '.$this->sqlOrder
				;
//echo str_replace('#_','jos',$this->_query);
        return $this->_query;		
}

function _buildQueryAgentListing()
	{	
	
	$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowOrderByDefault = $params->get( 'ShowOrderByDefault' ) ;
$ShowOrderDefault = $params->get( 'ShowOrderDefault' ) ;

	
	if($this->filter_order){
	$ShowOrderByDefault = $this->filter_order;}
	
	switch ($ShowOrderByDefault)
	{
	case 1: $o='refresh_time';
	break;
	case 2: $o='price';
	break;
	case 3: $o='cid';
	break;
	case 4: $o='type';
	break;
	default: $o='refresh_time';
	break;
	}
		$this->sqlShowOrderBy = ' ORDER BY p.'.$o;		
		
		
	if($this->filter_order_Dir){	
	$this->sqlOrder=$this->filter_order_Dir;
	}else{
	$this->sqlOrder=$ShowOrderDefault;
	}
	
	
			$this->_query = ' SELECT p.*,c.name as name_category,t.name as name_type,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Tslug, '	
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_category AS c ON c.id = p.cid '
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '
				. ' WHERE p.published = 1 '	
				. ' AND agent_id = '.JRequest::getVar('aid')
			//	. $this->sqlProvincia.' '
			//	. $this->sqlProvinciaDefecto.' '
			//	. $this->sqlCiudad.' '
			//	. $this->sqlSector.' '
			//	. $this->sqlCategoria.' '								
				. $this->sqlShowOrderBy .' '.$this->sqlOrder		
				;
//echo str_replace('#_','jos',$this->_query);
        return $this->_query;		
}


function _buildQuerySearch()
	{	
	
	
	
	
	/*
	if(!JRequest::getVar('textsearch') || JRequest::getVar('textsearch')==JText::_('TEXTSEARCH')){
$this->sqltextoBuscar = '';
}else{
$hot = trim(JRequest::getVar('textsearch')); 
$t_s=explode(' ',$hot);
$ts=count($t_s);
$Search = array();
$Search2 = array();
$Search3 = array();



for($t=0;$t<$ts;$t++)
{
 $Search[] = 'p.name like "%'. $t_s[$t] .'%"'; 
 $Search2[] = 'p.description like "%'. $t_s[$t] .'%"'; 
 $Search3[] = 'p.extra1 like "%'. $t_s[$t] .'%"'; 


}
$Searching = implode(' AND ', $Search);
$Searching2 = implode(' AND ', $Search2);
$Searching3 = implode(' AND ', $Search3);


$this->sqltextoBuscar = ' AND ( '.$Searching.' OR '.$Searching2.' OR '.$Searching3.')' ;
}
*/




		$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowOrderByDefault = $params->get( 'ShowOrderByDefault' ) ;
$ShowOrderDefault = $params->get( 'ShowOrderDefault' ) ;
if(JRequest::getVar('cyid')){
$this->sqlCountry = ' AND p.cyid = '.JRequest::getVar('cyid', 0, '', 'int');
//echo 'cyid: '.JRequest::getVar('cyid', 0, '', 'int');
}

if(JRequest::getVar('sid')){
$this->sqlProvincia = ' AND p.sid = '.JRequest::getVar('sid', 0, '', 'int');
}

if(JRequest::getVar('lid')){
$this->sqlCiudad = ' AND p.lid = '.JRequest::getVar('lid', 0, '', 'int');
}
/*
if(JRequest::getVar('cid')){
$this->sqlCategoria = ' AND p.parent = '.JRequest::getVar('cid', 0, '', 'int');
}
*/
if(JRequest::getVar('cid')){
		$this->sqlCategoryLeft = ' LEFT JOIN #__properties_product_category AS pc ON p.id = pc.productid LEFT JOIN #__properties_category AS c ON c.id = pc.categoryid';
		$this->sqlCategory = ' AND pc.categoryid = '.JRequest::getVar('cid', 0, '', 'int');
}else{

		$this->sqlCategoryLeft = ' LEFT JOIN #__properties_category AS c ON c.id = p.cid';
}

if(JRequest::getVar('tid')){
$this->sqlType = ' AND p.type = '.JRequest::getVar('tid', 0, '', 'int');
}

//echo 'minprice : '.JRequest::getVar('id_minprice');

if(JRequest::getVar('id_minprice') && JRequest::getVar('id_maxprice')){
//echo 'minprice : '.JRequest::getVar('id_minprice');
$this->sqlprecio_producto = ' AND p.price BETWEEN '.JRequest::getVar('id_minprice').
' AND '.JRequest::getVar('id_maxprice');
}elseif(JRequest::getVar('id_minprice')){
$this->sqlprecio_producto = ' AND p.price >= '.JRequest::getVar('id_minprice');
}elseif(JRequest::getVar('id_maxprice')){
$this->sqlprecio_producto = ' AND p.price <= '.JRequest::getVar('id_maxprice');
}

if(JRequest::getVar('id_bedrooms')){
if(JRequest::getVar('id_bedrooms')<5){
$this->sqldormitorios = ' AND p.bedrooms >= '.JRequest::getVar('id_bedrooms');
}else{
$this->sqldormitorios = ' AND p.bedrooms >= '.JRequest::getVar('id_bedrooms');
}
}

if(JRequest::getVar('id_bathrooms')){
if(JRequest::getVar('id_bathrooms')<5){
$this->sqlbathrooms = ' AND p.bathrooms >= '.JRequest::getVar('id_bathrooms');
}else{
$this->sqlbathrooms = ' AND p.bathrooms >= '.JRequest::getVar('id_bathrooms');
}
}

if(JRequest::getVar('id_garage')){
if(JRequest::getVar('id_garage')<5){
$this->sqlparking = ' AND p.garage >= '.JRequest::getVar('id_garage');
}else{
$this->sqlparking = ' AND p.garage >= '.JRequest::getVar('id_garage');
}
}

if(JRequest::getVar('extra1')){
$this->sqlextra= ' AND p.extra1 = 1';
}

if(JRequest::getVar('extra2')){
$this->sqlextra.= ' AND p.extra2 = 1';
}

if(JRequest::getVar('extra3')){
$this->sqlextra.= ' AND p.extra3 = 1';
}

if(JRequest::getVar('extra4')){
$this->sqlextra.= ' AND p.extra4 = 1';
}

if(JRequest::getVar('extra5')){
$this->sqlextra.= ' AND p.extra5 = 1';
}







if(!JRequest::getVar('textsearch') || JRequest::getVar('textsearch')==JText::_('TEXTSEARCH')){
$this->sqltextoBuscar = '';
}else{
$this->sqltextoBuscar = ' AND ( p.name LIKE \'%'.JRequest::getVar('textsearch').'%\' OR p.description LIKE \'%'.JRequest::getVar('textsearch').'%\' )' ;}


	if($this->filter_order){$OrderBy = $this->filter_order;}else{$OrderBy = $ShowOrderByDefault;}
	
	switch ($OrderBy)
	{
	case 1: $o='p.refresh_time';
	break;
	case 2: $o='p.price';
	break;
	case 3: $o='c.name';
	break;
	case 4: $o='t.name';
	break;
	default: $o='p.refresh_time';
	break;
	}
		$this->sqlShowOrderBy = ' ORDER BY '.$o;		
		
		
	if($this->filter_order_Dir){	
	$this->sqlOrder=$this->filter_order_Dir;
	}else{
	$this->sqlOrder=$ShowOrderDefault;
	}


//////////////

if(JRequest::getVar('unavailables')){

$unavailables = JRequest::getVar('unavailables');
$totnotin=0;
$notin='';
	foreach($unavailables as $ua)
		{
		
		if($totnotin>0){$notin.=',';}
		$notin.=$ua;
		$totnotin++;
		}

$thisSqlUnavailables = ' AND p.id NOT IN ('.$notin.')';
	}




//////////////////////


	
$this->_queryS = ' SELECT p.*,c.name as name_category,t.name as name_type,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile, '
				. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug, '	
		. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Tslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '
				. $this->sqlCategoryLeft
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. $this->sqlfromleft
				. ' WHERE p.published = 1 '
				. $thisSqlUnavailables
				. $this->sqlCountry.' '
				. $this->sqlProvincia.' '				
				. $this->sqlCiudad.' '				
				. $this->sqlType.' '
				. $this->sqlCategory.' '
				. $this->sqlprecio_producto.' '
				. $this->sqldormitorios.' '
				. $this->sqlbathrooms.' '
				. $this->sqlparking.' '	
				. $this->sqlextra.' '	
				//. $this->sqlAvailable.' '				
				. $this->sqltextoBuscar	
				/*. ' GROUP BY p.id '	*/			
				. $this->sqlShowOrderBy .' '.$this->sqlOrder
				;
//echo str_replace('#_','jos',$this->_queryS);
//print_r($this->_query);
return $this->_queryS;

}









































function _buildQueryAvailables()
	{	
	
	
	
		$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ShowOrderByDefault = $params->get( 'ShowOrderByDefault' ) ;
$ShowOrderDefault = $params->get( 'ShowOrderDefault' ) ;
if(JRequest::getVar('cyid')){
$this->sqlCountry = ' AND p.cyid = '.JRequest::getVar('cyid', 0, '', 'int');
//echo 'cyid: '.JRequest::getVar('cyid', 0, '', 'int');
}

if(JRequest::getVar('sid')){
$this->sqlProvincia = ' AND p.sid = '.JRequest::getVar('sid', 0, '', 'int');
}

if(JRequest::getVar('lid')){
$this->sqlCiudad = ' AND p.lid = '.JRequest::getVar('lid', 0, '', 'int');
}
/*
if(JRequest::getVar('cid')){
$this->sqlCategoria = ' AND p.parent = '.JRequest::getVar('cid', 0, '', 'int');
}
*/
if(JRequest::getVar('cid')){
		$this->sqlCategoryLeft = ' LEFT JOIN #__properties_product_category AS pc ON p.id = pc.productid LEFT JOIN #__properties_category AS c ON c.id = pc.categoryid';
		$this->sqlCategory = ' AND pc.categoryid = '.JRequest::getVar('cid', 0, '', 'int');
}else{

		$this->sqlCategoryLeft = ' LEFT JOIN #__properties_category AS c ON c.id = p.cid';
}

if(JRequest::getVar('tid')){
$this->sqlType = ' AND p.type = '.JRequest::getVar('tid', 0, '', 'int');
}

//echo 'minprice : '.JRequest::getVar('id_minprice');

if(JRequest::getVar('id_minprice') && JRequest::getVar('id_maxprice')){
//echo 'minprice : '.JRequest::getVar('id_minprice');
$this->sqlprecio_producto = ' AND p.price BETWEEN '.JRequest::getVar('id_minprice').
' AND '.JRequest::getVar('id_maxprice');
}elseif(JRequest::getVar('id_minprice')){
$this->sqlprecio_producto = ' AND p.price >= '.JRequest::getVar('id_minprice');
}elseif(JRequest::getVar('id_maxprice')){
$this->sqlprecio_producto = ' AND p.price <= '.JRequest::getVar('id_maxprice');
}

if(JRequest::getVar('id_bedrooms')){
if(JRequest::getVar('id_bedrooms')<5){
$this->sqldormitorios = ' AND p.bedrooms >= '.JRequest::getVar('id_bedrooms');
}else{
$this->sqldormitorios = ' AND p.bedrooms >= '.JRequest::getVar('id_bedrooms');
}
}

if(JRequest::getVar('id_bathrooms')){
if(JRequest::getVar('id_bathrooms')<5){
$this->sqlbathrooms = ' AND p.bathrooms >= '.JRequest::getVar('id_bathrooms');
}else{
$this->sqlbathrooms = ' AND p.bathrooms >= '.JRequest::getVar('id_bathrooms');
}
}

if(JRequest::getVar('id_garage')){
if(JRequest::getVar('id_garage')<5){
$this->sqlparking = ' AND p.garage >= '.JRequest::getVar('id_garage');
}else{
$this->sqlparking = ' AND p.garage >= '.JRequest::getVar('id_garage');
}
}

if(JRequest::getVar('extra1')){
$this->sqlextra= ' AND p.extra1 = '.JRequest::getVar('extra1');
}

if(JRequest::getVar('extra2')){
$this->sqlextra.= ' AND p.extra2 = 1';
}

if(JRequest::getVar('extra3')){
$this->sqlextra.= ' AND p.extra3 = 1';
}

if(JRequest::getVar('extra4')){
$this->sqlextra.= ' AND p.extra4 = 1';
}

if(JRequest::getVar('extra5')){
$this->sqlextra.= ' AND p.extra5 = 1';
}







if(!JRequest::getVar('textsearch') || JRequest::getVar('textsearch')==JText::_('TEXTSEARCH')){
$this->sqltextoBuscar = '';
}else{
$this->sqltextoBuscar = ' AND ( p.name LIKE \'%'.JRequest::getVar('textsearch').'%\' OR p.description LIKE \'%'.JRequest::getVar('textsearch').'%\' )' ;}


	if($this->filter_order){$OrderBy = $this->filter_order;}else{$OrderBy = $ShowOrderByDefault;}
	
	switch ($OrderBy)
	{
	case 1: $o='p.refresh_time';
	break;
	case 2: $o='p.price';
	break;
	case 3: $o='c.name';
	break;
	case 4: $o='t.name';
	break;
	default: $o='p.id';
	break;
	}
		$this->sqlShowOrderBy = ' ORDER BY '.$o;		
		
		
	if($this->filter_order_Dir){	
	$this->sqlOrder=$this->filter_order_Dir;
	}else{
	$this->sqlOrder=$ShowOrderDefault;
	}


//////////////

if(JRequest::getVar('unavailables')){
//echo 'aca';
$unavailables = JRequest::getVar('unavailables');
$totnotin=0;
$notin='';
	foreach($unavailables as $ua)
		{
		
		if($totnotin>0){$notin.=',';}
		$notin.=$ua;
		$totnotin++;
		}

$thisSqlUnavailables = ' AND p.id NOT IN ('.$notin.')';
	}




//////////////////////


	
$this->_queryS = ' SELECT p.*,c.name as name_category,t.name as name_type,cy.name as name_country,s.name as name_state,l.name as name_locality,pf.name as name_profile,pf.logo_image as logo_image_profile, '
				. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug, '	
		. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Tslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' LEFT JOIN #__properties_profiles AS pf ON pf.mid = p.agent_id '
				. $this->sqlCategoryLeft
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. $this->sqlfromleft
				. ' WHERE p.published = 1 '
				. $thisSqlUnavailables
				. $this->sqlCountry.' '
				. $this->sqlProvincia.' '				
				. $this->sqlCiudad.' '				
				. $this->sqlType.' '
				. $this->sqlCategory.' '
				. $this->sqlprecio_producto.' '
				. $this->sqldormitorios.' '
				. $this->sqlbathrooms.' '
				. $this->sqlparking.' '	
				. $this->sqlextra.' '	
				//. $this->sqlAvailable.' '				
				. $this->sqltextoBuscar	
				. ' GROUP BY p.id '				
				. $this->sqlShowOrderBy .' '.$this->sqlOrder
				;
//echo str_replace('#_','jos',$this->_queryS);
//print_r($this->_query);
return $this->_queryS;

}





























function getItemid()
	{	
	
	$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=properties"';
				
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();
		if(!$this->row){
		$query = 'SELECT id FROM #__menu' .
				' WHERE LOWER( link ) = "index.php?option=com_properties&view=properties&cid=0&tid=0"';	
		$this->_db->setQuery( $query );
		$this->row = $this->_db->loadResult();
		}
		
		
		return $this->row;
	}	
		
function getLast10Products()
	{	
	 $Prodquery = ' SELECT p.*,c.name as name_category,cy.name as name_country,s.name as name_state,l.name as name_locality, '
		. ' CASE WHEN CHAR_LENGTH(p.alias) THEN CONCAT_WS(":", p.id, p.alias) ELSE p.id END as Pslug,'
		. ' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(":", c.id, c.alias) ELSE c.id END as Cslug,'
		. ' CASE WHEN CHAR_LENGTH(t.alias) THEN CONCAT_WS(":", t.id, t.alias) ELSE t.id END as Typeslug, '
		. ' CASE WHEN CHAR_LENGTH(cy.alias) THEN CONCAT_WS(":", cy.id, cy.alias) ELSE cy.id END as CYslug,'
		. ' CASE WHEN CHAR_LENGTH(s.alias) THEN CONCAT_WS(":", s.id, s.alias) ELSE s.id END as Sdslug,'		
		. ' CASE WHEN CHAR_LENGTH(l.alias) THEN CONCAT_WS(":", l.id, l.alias) ELSE l.id END as Lslug '				
				. ' FROM #__properties_products AS p '				
				. ' LEFT JOIN #__properties_type AS t ON t.id = p.type '
				. ' LEFT JOIN #__properties_category AS c ON c.id = p.cid '
				. ' LEFT JOIN #__properties_country AS cy ON cy.id = p.cyid '				
				. ' LEFT JOIN #__properties_state AS s ON s.id = p.sid '
				. ' LEFT JOIN #__properties_locality AS l ON l.id = p.lid '
				. ' WHERE p.published = 1 '	
				. ' ORDER BY p.refresh_time '
				. ' LIMIT 10';
	
	 $this->_db->setQuery( $Prodquery );
	 $this->_Proddata = $this->_getList($Prodquery);
	 return $this->_Proddata;
	
	
	}
	
	
	
	
	
function getData() 
  {  
 	// if data hasn't already been obtained, load it
 	if (empty($this->_data)) {	
 	    $query = $this->_buildQuery();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));	 	
	}
//	print_r($this->_data);
 	return $this->_data;
  }
  

function getDataAgent() 
  {  
  $Agent=JRequest::getVar('aid');
 	// if data hasn't already been obtained, load it
 	$queryA = 'SELECT * FROM #__properties_profiles ' .
			' WHERE mid = '.$Agent;
				
		$this->_db->setQuery( $queryA );
		$this->row = $this->_db->loadObject();
		
		return $this->row;
  }



function getDataAgentListing() 
  {  
 	// if data hasn't already been obtained, load it
 	if (empty($this->_data)) {	
 	    $query = $this->_buildQueryAgentListing();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit')); 	
	}
 	return $this->_data;
  }
  
  
function getTotalAgentListing()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_total)) {
 	    $queryS = $this->_buildQueryAgentListing();
 	    $this->_total = $this->_getListCount($queryS);	
 	}
 	return $this->_total;
  }

function getPaginationAgentListing()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_pagination)) {
 	    jimport('joomla.html.pagination');
 	    $this->_pagination = new JPagination($this->getTotalAgentListing(), $this->getState('limitstart'), $this->getState('limit') );		
		
 	}
 	return $this->_pagination;
  }  
  
function getTotal()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_total)) {
 	    $query = $this->_buildQuery();
 	    $this->_total = $this->_getListCount($query);	
 	}
 	return $this->_total;
  }


function getPagination()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_pagination)) {
 	  //  require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagination.php' );
	  jimport('joomla.html.pagination');
 	    $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );		
		
 	}
 	return $this->_pagination;
  }

/*
function getDataSearch() 
  {  
 	// if data hasn't already been obtained, load it
 	if (empty($this->_data)) {	
 	    $query = $this->_buildQuerySearch();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));	 	
	}
 	return $this->_data;
  }
 */
 
 function Availability($id)
	{	
		
if(JRequest::getVar('from')){
$from = JRequest::getVar('from');
$this->sqlfromleft = 'LEFT JOIN #__properties_available_product AS ap ON ap.id_product = p.id ';
$this->sqlfrom= ' AND ((ap.date = "'.JRequest::getVar('from').'" ) ';

if(JRequest::getVar('to')){
$to = JRequest::getVar('to');
$this->sqlto= '';

$this->sqlto.= ' OR (ap.date BETWEEN "'.$from.'" AND "'.$to.'" ))';
}

$this->sqlAvailable = $this->sqlfrom.$this->sqlto.'';



	$db 	=& JFactory::getDBO();	
	$query = 'SELECT ap.* FROM #__properties_available_product AS ap'
			. ' WHERE ap.id_product = '.$id
			. $this->sqlAvailable			
			;		
        $db->setQuery($query);        
		$Available = $db->loadObject();
			
		if($Available)
			{
//echo '<br>'.$query;	
//echo '<br><b>id no disponible : '.$Available->id_product.'</b><br>';	
			}
}	
	return $Available->id;
	
	
	
	
	
	
	}

 
 	function getDataSearch() 
  {  
 if (empty($this->_dataAll)) {	 	
if(JRequest::getVar('from') or JRequest::getVar('to')){	

$queryAll = $this->_buildQuerySearch();	
$this->_dataAll = $this->_getList($queryAll);

$i=0;
foreach($this->_dataAll as $item)
	{
	if(JRequest::getVar('from') or JRequest::getVar('to')){

	$Availability	= $this->Availability($item->id);
	if($Availability)
		{		
		$unavailables[] = $item->id;
		}
	//$this->assignRef('Availability',	$Availability);
	}
	$i++;
	}
	
	JRequest::setVar('unavailables', $unavailables);
}
}
	if (empty($this->_data)) {
		
 	    $query = $this->_buildQuerySearch();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit')); 		 	
	}
	
		
 	return $this->_data;
	
	
  }
  
  
   
function getTotalSearch()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_total)) {
 	    $queryS = $this->_buildQuerySearch();
 	    $this->_total = $this->_getListCount($queryS);	
 	}
 	return $this->_total;
  }

  
 function getPaginationSearch()
  {
 	// Load the content if it doesn't already exist  echo CatTreeHelper::MultiParent( $this->datos,'category' ); 
 	if (empty($this->_pagination)) {
 	    
		require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagination.php' );
		
 	    $this->_pagination = new JPagination($this->getTotalSearch(), $this->getState('limitstart'), $this->getState('limit') );		
		
 	}
 	return $this->_pagination;
  } 
  
  
  
























 	function getDataAvailables() 
  {  
  
 if (empty($this->_dataAll)) {	 	
if(JRequest::getVar('from') or JRequest::getVar('to')){	
//echo 'estoy';
$queryAll = $this->_buildQueryAvailables();	
$this->_dataAll = $this->_getList($queryAll);

$i=0;
foreach($this->_dataAll as $item)
	{
	if(JRequest::getVar('from') or JRequest::getVar('to')){

	$Availability	= $this->Availability($item->id);
	if($Availability)
		{		
		$unavailables[] = $item->id;
		}
	//$this->assignRef('Availability',	$Availability);
	}
	$i++;
	}
	
	JRequest::setVar('unavailables', $unavailables);
}
}
	if (empty($this->_data)) {
		
 	    $query = $this->_buildQueryAvailables();
 	    $this->_data = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit')); 		 	
	}
	
		
 	return $this->_data;
	
	
  }
  
  
   
function getTotalAvailables()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_total)) {
 	    $queryS = $this->_buildQueryAvailables();
 	    $this->_total = $this->_getListCount($queryS);	
 	}
 	return $this->_total;
  }

  
 function getPaginationAvailables()
  {
 	// Load the content if it doesn't already exist  echo CatTreeHelper::MultiParent( $this->datos,'category' ); 
 	if (empty($this->_pagination)) {
 	    
		require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagination.php' );
		
 	    $this->_pagination = new JPagination($this->getTotalAvailables(), $this->getState('limitstart'), $this->getState('limit') );		
		
 	}
 	return $this->_pagination;
  } 
  
  
  
  
  
  
  
  
  
  
  
}//fin clase