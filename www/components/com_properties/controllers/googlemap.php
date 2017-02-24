<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class PropertiesControllerGooglemap extends JController
{
	function display()
	{ 
		JRequest::setVar( 'view', 'publicar' );
		JRequest::setVar( 'layout', 'default'  );
		JRequest::setVar('hidemainmenu', 1);			
		}

function map()
	{ 	
jimport( 'joomla.application.component.helper' );

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$apikey    = $params->get( 'apikey' );
$distancia= $params->get( 'distancia' );

$db 	=& JFactory::getDBO();
$query = 'SELECT p.*,t.name AS name_category '
				. ' FROM #__properties_products AS p '
				. 'LEFT JOIN #__properties_category AS t ON t.id = p.parent '	
				. 'WHERE p.id = '.$_REQUEST['id'];
$db->setQuery($query);	        
		$Prod = $db->loadObjectList();

$lat=$Prod[0]->lat;
$lng=$Prod[0]->lng;
  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
    <title>Google Maps JavaScript API Example</title> 
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $apikey;?>"
      type="text/javascript"></script> 
    <script type="text/javascript"> 
 
    //<![CDATA[ 
 
    function load() { 
      if (GBrowserIsCompatible()) { 
        var map = new GMap2(document.getElementById("map")); 
        map.setCenter(new GLatLng(<?php echo $lat;?>, <?php echo $lng;?>), <?php echo $distancia;?>); 
	<!--map.setMapType(G_HYBRID_MAP); -->
 
	map.addControl(new GSmallMapControl()); 
	/*map.addControl(new GScaleControl()); */
	map.addControl(new GMapTypeControl()); 
/*	map.addControl(new GOverviewMapControl());*/ 
 
	var marker = new GMarker(new GLatLng(<?php echo $lat;?>, <?php echo $lng;?>)); 
	map.addOverlay(marker); 
	/*marker.openInfoWindowHtml("<img  src='simplemap_logo.jpg' align='left' width='100' height='75'/>");
  */
 
      }
    }
 
    //]]>
    </script> 
  </head> 
<body onload="load()" onunload="GUnload()" style="width: 640px; height: 480px;"> 
<div id="map" style="width: 640px; height: 480px;"></div>    
</body> 
</html> 
<?php }}?>