<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class PropertiesController extends JController
{
function __construct( $default = array())
	{
	
		parent::__construct( $default );
	}
	function display()
	{
		parent::display();
	}	

function preview()
{	

		global $mainframe;
		$db		= & JFactory::getDBO();
		$query = ' SELECT template '
				.' FROM #__templates_menu '
				.' WHERE client_id = 0' 
				.' AND menuid = 0 ';
		$db->setQuery($query);
		$template = $db->loadResult();
		
JToolBarHelper::back();
		//$tp = intval($showPositions);
		$url = $client->id ? JURI::base() : $mainframe->getSiteURL();
?>
		<style type="text/css">
		.previewFrame {
			border: none;
			width: 95%;
			height: 600px;
			padding: 0px 5px 0px 10px;
		}
		</style>

		<table class="adminform">
			<tr>
				<th width="50%" class="title">
					<?php echo JText::_( 'Site Preview' ); ?>
				</th>
				<th width="50%" style="text-align:right">
					<?php echo JHTML::_('link', $url.'index.php?option=com_properties&view=properties&tp='.$tp.'&amp;template='.$template, JText::_( 'Open in new window' ), array('target' => '_blank')); ?>
				</th>
			</tr>
			<tr>
				<td width="100%" valign="top" colspan="2">
					<?php echo JHTML::_('iframe', $url.'index.php?option=com_properties&view=properties&tp='.$tp.'&amp;template='.$template,'previewFrame',  array('class' => 'previewFrame')) ?>
				</td>
			</tr>
		</table>
        
<?php        
        
		
		
		
		
		
}
	function saveconfig()
{
$array=JRequest::getVar('params');

global $mainframe;
$db		= & JFactory::getDBO();

$model = $this->getModel('property');
$data = JRequest::get( 'post' );
if ($model->storeconfig($data)) {
$this->setRedirect( 'index.php?option=com_properties&view=configuration');
	}
}


	function export()
	{	
	
	global $mainframe;
$db 	=& JFactory::getDBO();
/*
$data  = JPATH_SITE.DS."administrator".DS."components".DS."com_properties".DS."properties.csv";
$query ="SELECT * INTO OUTFILE '".$data."' FIELDS TERMINATED BY ';'  LINES TERMINATED BY '\n' FROM #__properties_products";	
$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}	
	*/

$query = 	"SELECT * from #__properties_products ";
$db->setQuery( $query );				
$products = $db->loadObjectList();


$SeparadorCampo=';';//'^';
$SeparadorTexto='';//'~';
//htmlspecialchars

$encabezado=0;
if($encabezado==1){
	$linecsv.=$SeparadorTexto.''.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'name'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'alias'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'parent'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'agent_id'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'agent'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'ref'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'type'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'cid'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'lid'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'sid'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'cyid'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'postcode'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'adress'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'description'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'description2'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'price'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image1'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image2'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image3'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image4'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image5'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image6'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image7'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image8'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image9'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image10'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image11'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image12'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image13'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image14'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image15'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image16'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image17'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image18'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image19'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image20'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image21'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image22'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image23'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image24'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image1desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image2desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image3desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image4desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image5desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image6desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image7desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image8desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image9desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image10desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image11desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image12desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image13desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image14desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image15desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image16desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image17desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image18desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image19desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image20desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image21desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image22desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image23desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'image24desc'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'panoramic'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'lat'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'lng'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'available'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'featured'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'years'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'bedrooms'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'garage'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'area'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'covered_area'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'hits'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'listdate'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'checked_out'.$SeparadorTexto.''.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'checked_out_time'.$SeparadorTexto.'extra1'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra2'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra3'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra4'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra5'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra6'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra7'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra8'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra9'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra10'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra11'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra12'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra13'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra14'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra15'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra16'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra17'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra18'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra19'.$SeparadorTexto.$SeparadorCampo.$SeparadorTexto.'extra20'.$SeparadorTexto.$SeparadorCampo	
			."\n";	
}


foreach ( $products as $item ) {
			$mitems[] = $item;
			
			
			//if($item->id){ $linecsv.='"'.$item->id.'";';}else{$linecsv.=";";}
			$linecsv.=$SeparadorTexto.$SeparadorTexto.$SeparadorCampo;
if($item->name){ $linecsv.=$SeparadorTexto.$item->name.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->alias){ $linecsv.=$SeparadorTexto.$item->alias.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->parent){ $linecsv.=$SeparadorTexto.$item->parent.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->agent_id){ $linecsv.=$SeparadorTexto.$item->agent_id.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->agent){ $linecsv.=$SeparadorTexto.$item->agent.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->ref){ $linecsv.=$SeparadorTexto.$item->ref.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->type){ $linecsv.=$SeparadorTexto.$item->type.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->cid){ $linecsv.=$SeparadorTexto.$item->cid.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->lid){ $linecsv.=$SeparadorTexto.$item->lid.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->sid){ $linecsv.=$SeparadorTexto.$item->sid.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->cyid){ $linecsv.=$SeparadorTexto.$item->cyid.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->postcode){ $linecsv.=$SeparadorTexto.$item->postcode.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->adress){ $linecsv.=$SeparadorTexto.$item->adress.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->description){ $linecsv.=$SeparadorTexto.$item->description.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->description2){ $linecsv.=$SeparadorTexto.$item->description2.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->price){ $linecsv.=$SeparadorTexto.$item->price.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->published){ $linecsv.=$SeparadorTexto.$item->published.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image1){ $linecsv.=$SeparadorTexto.$item->image1.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image2){ $linecsv.=$SeparadorTexto.$item->image2.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image3){ $linecsv.=$SeparadorTexto.$item->image3.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image4){ $linecsv.=$SeparadorTexto.$item->image4.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image5){ $linecsv.=$SeparadorTexto.$item->image5.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image6){ $linecsv.=$SeparadorTexto.$item->image6.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image7){ $linecsv.=$SeparadorTexto.$item->image7.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image8){ $linecsv.=$SeparadorTexto.$item->image8.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image9){ $linecsv.=$SeparadorTexto.$item->image9.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image10){ $linecsv.=$SeparadorTexto.$item->image10.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image11){ $linecsv.=$SeparadorTexto.$item->image11.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image12){ $linecsv.=$SeparadorTexto.$item->image12.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image13){ $linecsv.=$SeparadorTexto.$item->image13.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image14){ $linecsv.=$SeparadorTexto.$item->image14.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image15){ $linecsv.=$SeparadorTexto.$item->image15.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image16){ $linecsv.=$SeparadorTexto.$item->image16.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image17){ $linecsv.=$SeparadorTexto.$item->image17.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image18){ $linecsv.=$SeparadorTexto.$item->image18.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image19){ $linecsv.=$SeparadorTexto.$item->image19.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image20){ $linecsv.=$SeparadorTexto.$item->image20.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image21){ $linecsv.=$SeparadorTexto.$item->image21.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image22){ $linecsv.=$SeparadorTexto.$item->image22.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image23){ $linecsv.=$SeparadorTexto.$item->image23.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image24){ $linecsv.=$SeparadorTexto.$item->image24.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image1desc){ $linecsv.=$SeparadorTexto.$item->image1.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image2desc){ $linecsv.=$SeparadorTexto.$item->image2.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image3desc){ $linecsv.=$SeparadorTexto.$item->image3.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image4desc){ $linecsv.=$SeparadorTexto.$item->image4.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image5desc){ $linecsv.=$SeparadorTexto.$item->image5.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image6desc){ $linecsv.=$SeparadorTexto.$item->image6.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image7desc){ $linecsv.=$SeparadorTexto.$item->image7.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image8desc){ $linecsv.=$SeparadorTexto.$item->image8.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image9desc){ $linecsv.=$SeparadorTexto.$item->image9.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image10desc){ $linecsv.=$SeparadorTexto.$item->image10.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image11desc){ $linecsv.=$SeparadorTexto.$item->image11.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image12desc){ $linecsv.=$SeparadorTexto.$item->image12.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image13desc){ $linecsv.=$SeparadorTexto.$item->image13.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image14desc){ $linecsv.=$SeparadorTexto.$item->image14.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image15desc){ $linecsv.=$SeparadorTexto.$item->image15.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image16desc){ $linecsv.=$SeparadorTexto.$item->image16.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image17desc){ $linecsv.=$SeparadorTexto.$item->image17.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image18desc){ $linecsv.=$SeparadorTexto.$item->image18.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image19desc){ $linecsv.=$SeparadorTexto.$item->image19.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image20desc){ $linecsv.=$SeparadorTexto.$item->image20.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image21desc){ $linecsv.=$SeparadorTexto.$item->image21.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image22desc){ $linecsv.=$SeparadorTexto.$item->image22.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image23desc){ $linecsv.=$SeparadorTexto.$item->image23.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->image24desc){ $linecsv.=$SeparadorTexto.$item->image24.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}			
			if($item->panoramic){ $linecsv.=$SeparadorTexto.$item->panoramic.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->lat){ $linecsv.=$SeparadorTexto.$item->lat.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->lng){ $linecsv.=$SeparadorTexto.$item->lng.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->available){ $linecsv.=$SeparadorTexto.$item->available.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->featured){ $linecsv.=$SeparadorTexto.$item->featured.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->years){ $linecsv.=$SeparadorTexto.$item->years.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->bedrooms){ $linecsv.=$SeparadorTexto.$item->bedrooms.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->garage){ $linecsv.=$SeparadorTexto.$item->garage.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->area){ $linecsv.=$SeparadorTexto.$item->area.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->covered_area){ $linecsv.=$SeparadorTexto.$item->covered_area.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->hits){ $linecsv.=$SeparadorTexto.$item->hits.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->listdate){ $linecsv.=$SeparadorTexto.$item->listdate.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}			
			if($item->checked_out){ $linecsv.=$SeparadorTexto.$item->checked_out.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->checked_out_time){ $linecsv.=$SeparadorTexto.$item->checked_out_time.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}			
			if($item->extra1){ $linecsv.=$SeparadorTexto.$item->extra1.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra2){ $linecsv.=$SeparadorTexto.$item->extra2.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra3){ $linecsv.=$SeparadorTexto.$item->extra3.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra4){ $linecsv.=$SeparadorTexto.$item->extra4.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra5){ $linecsv.=$SeparadorTexto.$item->extra5.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra6){ $linecsv.=$SeparadorTexto.$item->extra6.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra7){ $linecsv.=$SeparadorTexto.$item->extra7.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra8){ $linecsv.=$SeparadorTexto.$item->extra8.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra9){ $linecsv.=$SeparadorTexto.$item->extra9.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra10){ $linecsv.=$SeparadorTexto.$item->extra10.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra11){ $linecsv.=$SeparadorTexto.$item->extra11.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra12){ $linecsv.=$SeparadorTexto.$item->extra12.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra13){ $linecsv.=$SeparadorTexto.$item->extra13.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra14){ $linecsv.=$SeparadorTexto.$item->extra14.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra15){ $linecsv.=$SeparadorTexto.$item->extra15.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra16){ $linecsv.=$SeparadorTexto.$item->extra16.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra17){ $linecsv.=$SeparadorTexto.$item->extra17.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra18){ $linecsv.=$SeparadorTexto.$item->extra18.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra19){ $linecsv.=$SeparadorTexto.$item->extra19.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}
			if($item->extra20){ $linecsv.=$SeparadorTexto.$item->extra20.$SeparadorTexto.$SeparadorCampo;}else{$linecsv.=$SeparadorCampo;}

$linecsv.="\n";
			
		}	

	

$archivo_csv = fopen("components/com_properties/properties.csv", "w");
fwrite($archivo_csv, $linecsv);
fclose($archivo_csv);	
	
		
	echo JPATH_SITE.DS."administrator".DS."components".DS."com_properties".DS."properties.csv";
	echo '<a target="_blank" href="'.JURI::root().'administrator/components/com_properties/properties.csv">Download</a>';
	}


function import()
	{
	global $mainframe;

$parts = explode( DS, JPATH_BASE );
define( 'JPATH_ROOT',			implode( DS, $parts ) );
define( 'JPATH_SITEs',			str_replace('\\','/',JPATH_ROOT) );
define( 'DSs',			'/' );
//$product_list  = JPATH_SITEs.DSs."administrator".DSs."components".DSs."com_properties".DSs."properties.csv";

$product_list  = JPATH_SITE.DS."administrator".DS."components".DS."com_properties".DS."properties.csv";
$db 	=& JFactory::getDBO();	


$query = 	"LOAD DATA LOCAL INFILE '".$product_list."' INTO TABLE #__properties_products FIELDS TERMINATED BY '^' ENCLOSED BY '~' LINES TERMINATED BY '\n';";	

		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}	
		
}
	
	
	
	function menus()
	{
		$user =& JFactory::getUser();
global $mainframe;
$task = JRequest::getVar('task');	
$component = JComponentHelper::getComponent( 'com_properties' );
//print_r($component);
//echo $component->id;
$compid=$component->id;
	$db 	=& JFactory::getDBO();

$q="SELECT id FROM 	#__menu_types WHERE menutype = 'properties'";
$db->setQuery( $q );
$id_menu_types = $db->loadResult();
if ($id_menu_types)
		{
		$msg="Can't duplicate menus!" ;
		}else{
		
$q1="INSERT IGNORE INTO #__menu_types VALUES ('', 'properties', 'Properties', 'Properties');";

		$db->setQuery( $q1 );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		
$qHidde="INSERT IGNORE INTO #__menu_types VALUES ('', 'propertiesHidde', 'propertiesHidde', 'propertiesHidde');";

		$db->setQuery( $qHidde );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}		
		
		

$q2="	INSERT IGNORE INTO #__menu VALUES 
('', 'properties', 'Properties', 'properties', 'index.php?option=com_properties&view=properties', 'component', 1, 0, ".$compid.", 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'AnchoMiniatura=100\nAltoMiniatura=100\nAnchoImagen=640\nAltoImagen=480\ncantidad_productos=5\nMostrarBuscar=\nMostrarCarousel=\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nActivarTabs=\nActivarPanoramica=\nActivarContactar=\nActivarReservas=\nActivarMapa=\nlayout=\nms_category=\nms_locality=\nms_price=\nms_footage=\nms_bedrooms=\nms_bathrooms=\nms_parking=\nSimbolPrice=$\nPositionPrice=\nFormatPrice=\nminprice=\nmaxprice=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
('', 'properties', 'My Short List', 'my-short-list', 'index.php?option=com_properties&view=shortlist', 'component', 1, 0, ".$compid.", 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'AnchoMiniatura=100\nAltoMiniatura=100\nAnchoImagen=640\nAltoImagen=480\ncantidad_productos=5\nMostrarBuscar=\nMostrarCarousel=\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nActivarTabs=\nActivarPanoramica=\nActivarContactar=\nActivarReservas=\nActivarMapa=\nlayout=\nms_category=\nms_locality=\nms_price=\nms_footage=\nms_bedrooms=\nms_bathrooms=\nms_parking=\nSimbolPrice=$\nPositionPrice=\nFormatPrice=\nminprice=\nmaxprice=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
('', 'properties', 'My Panel', 'my-panel', 'index.php?option=com_properties&view=panel', 'component', 1, 0, ".$compid.", 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'AnchoMiniatura=100\nAltoMiniatura=100\nAnchoImagen=640\nAltoImagen=480\ncantidad_productos=5\nMostrarBuscar=\nMostrarCarousel=\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nActivarTabs=\nActivarPanoramica=\nActivarContactar=\nActivarReservas=\nActivarMapa=\nlayout=\nms_category=\nms_locality=\nms_price=\nms_footage=\nms_bedrooms=\nms_bathrooms=\nms_parking=\nSimbolPrice=$\nPositionPrice=\nFormatPrice=\nminprice=\nmaxprice=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
('', 'properties', 'My Profile', 'my-profile', 'index.php?option=com_properties&view=profile', 'component', 1, 0, ".$compid.", 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'AnchoMiniatura=100\nAltoMiniatura=100\nAnchoImagen=640\nAltoImagen=480\ncantidad_productos=5\nMostrarBuscar=\nMostrarCarousel=\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nActivarTabs=\nActivarPanoramica=\nActivarContactar=\nActivarReservas=\nActivarMapa=\nlayout=\nms_category=\nms_locality=\nms_price=\nms_footage=\nms_bedrooms=\nms_bathrooms=\nms_parking=\nSimbolPrice=$\nPositionPrice=\nFormatPrice=\nminprice=\nmaxprice=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
('', 'properties', 'Agents List', 'agents-list', 'index.php?option=com_properties&view=agents', 'component', 1, 0, ".$compid.", 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'AnchoMiniatura=100\nAltoMiniatura=100\nAnchoImagen=640\nAltoImagen=480\ncantidad_productos=5\nMostrarBuscar=\nMostrarCarousel=\napikey=ABQIAAAAFHktBEXrHnX108wOdzd3aBTupK1kJuoJNBHuh0laPBvYXhjzZxR0qkeXcGC_0Dxf4UMhkR7ZNb04dQ\ndistancia=15\nActivarTabs=\nActivarPanoramica=\nActivarContactar=\nActivarReservas=\nActivarMapa=\nlayout=\nms_category=\nms_locality=\nms_price=\nms_footage=\nms_bedrooms=\nms_bathrooms=\nms_parking=\nSimbolPrice=$\nPositionPrice=\nFormatPrice=\nminprice=\nmaxprice=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);
";
	
	$db->setQuery( $q2 );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
	

$qHidde="INSERT IGNORE INTO #__menu VALUES 
('', 'propertiesHidde', 'Property', 'property', 'index.php?option=com_properties&view=property', 'component', 1, 0, ".$compid.", 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
('', 'propertiesHidde', 'Category', 'category', 'index.php?option=com_properties&view=category', 'component', 1, 0, ".$compid.", 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
('', 'propertiesHidde', 'Type', 'Type', 'index.php?option=com_properties&view=type', 'component', 1, 0, ".$compid.", 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);
";

$db->setQuery( $qHidde );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
	


	
$q3="INSERT IGNORE INTO #__modules VALUES 
('', 'Properties', '', 1, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=properties\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_gris\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, '');
";

	$db->setQuery( $q3 );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}




$query = 'SELECT id '
		. ' FROM #__modules '
		. ' WHERE title = \'Properties\''
		;
$db->setQuery( $query );				
$id_menu = $db->loadResult();

/*
$query2 = 'SELECT id '
		. ' FROM #__modules '
		. ' WHERE title = \'Properties\''
		;
$db->setQuery( $query2 );				
$id_menu = $db->loadResult();
*/

$q4="INSERT IGNORE INTO #__modules_menu VALUES (".$id_menu.", 0);";

		$db->setQuery( $q4 );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}


	
	
	}//end duplicate
	//parent::display();
	
	$link = 'index.php?option=com_properties';
		$this->setRedirect($link, $msg);
		
		
	}
	
	
	function repare_menus()
	{
	
	
	
	global $mainframe;
$task = JRequest::getVar('task');	
$component = JComponentHelper::getComponent( 'com_properties' );

$compid=$component->id;

$db 	=& JFactory::getDBO();


$q="SELECT id FROM 	#__menu_types WHERE menutype = 'properties'";
$db->setQuery( $q );
$id_menu_types = $db->loadResult();


$q1= 'DELETE FROM #__menu WHERE componentid = '.$compid;
$db->setQuery( $q1 );
if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}

$q2= "DELETE FROM #__menu_types WHERE menutype = 'properties'";
$db->setQuery( $q2 );
if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}




$query = 'SELECT id '
		. ' FROM #__modules '
		. ' WHERE title = \'Properties\''
		;
$db->setQuery( $query );				
$id_menu = $db->loadResult();

if($id_menu){

$q3="DELETE FROM #__modules WHERE title = 'Properties'";
		$db->setQuery( $query );
		$db->setQuery( $q3 );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}

$q4="DELETE FROM #__modules_menu WHERE moduleid =".$id_menu;
		$db->setQuery( $q4 );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
}				



$this->menus();
	$msg="Done";
	$link = 'index.php?option=com_properties';
		$this->setRedirect($link, $msg);
		
	}
	
	
	
	
	
	function update_sql() {
		$sql = JRequest::getVar('sql');
		jimport('joomla.filesystem.file');
		$sql_file = JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_properties'.DS. 'updates' . DS . $sql . '.sql';
		$sql_query = JFile::read($sql_file);
		$db =& JFactory::getDBO();
		
		//JError::raiseError(500, $sql_query );
		
		$db->setQuery($sql_query);
		if (!$db->queryBatch()){
			echo $db->stderr() . '<br/>';
		} else {
			$msg = '<table bgcolor="#d9f9e2" width ="100%"><tr style="height:30px"><td>';
			$msg = '<td><b>' . JText::_('SQL EXECUTED SUCESS!') . ' ' . $sql . '</b></font></td></tr></table>';
			echo $msg;
		}
		
		
	}
}
?>