<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip');
jimport('joomla.filesystem.file');
$document =& JFactory::getDocument();
$lang =& JFactory::getLanguage();
if (JRequest::getVar('catid') && strpos(JRequest::getVar('catid'), ':')) {
		list($titulo['catid'], $titulo['catalias']) = explode(':', JRequest::getVar('catid'), 2);
		$titulo = str_replace('-',' ',$titulo['catalias']);
		$titulo = ucwords($titulo);
		$document->setTitle( $titulo );
	}	
	


$document->setDescription( 'Properties, '.$titulo.' : Barcelona, Madrid.' );
$document->setMetadata('keywords', 'Properties, '.$titulo);

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
//$MostrarCarousel=$params->get('MostrarCarousel');
$ActivarMapa=$params->get('ActivarMapa');
//$MostrarBuscar=$params->get('MostrarBuscar');
$currencyformat=$params->get('FormatPrice');
$PositionPrice=$params->get('PositionPrice');
$SimbolPrice=$params->get('SimbolPrice');
if($this->noShow['MostrarCarousel']){$MostrarCarousel=0;}else{$MostrarCarousel=$params->get('MostrarCarousel');}
if($this->noShow['MostrarBuscar']){$MostrarBuscar=0;}else{$MostrarBuscar=$params->get('MostrarBuscar');}

$linkAjax=JRoute::_( JURI::base().'index.php?option=com_properties&controller=searchajax&format=raw&task=SearchAjax&langg='.$lang->getTag());








 $a= $this->pagination->getPagesLinks(); 

 $b=$this->pagination->getResultsCounter().' | '.$this->pagination->getPagesCounter(); 
      
   
      
?>

<script type="text/javascript">
function SearchAjax(idCy,idS,idL,idC,idT){
var progressS = $('progressS');
new Ajax("<?php echo $linkAjax;?>", 
{method: 'get',	
onRequest: function(){progressS.setStyle('visibility', 'visible');},
onComplete: function(){progressS.setStyle('visibility', 'hidden');},
update: $('logB'), 
data: 'cyid='+idCy+'&sid='+idS+'&lid='+idL+'&cid='+idC+'&tid='+idT}).request();
			}
</script>

<div id="propiedades" style="margin-left:20px; width: 500px; text-align:center;" >


<div style="text-align:center; margin-top:10px;">
<?php echo JURI::base();?>
</div><!--buscador -->   
<div style="clear:both"></div>








<?php if($this->DataAgent->show ){?>
<div id="topagent">
<img src="<?php echo JURI::base().'/images/properties/profiles/'.$this->DataAgent->logo_image_large; ?>" />
</div>
<div id="datagent" style="margin-top:5px;">
<div id="imageagent" style="width:150px; float:left; padding: 3px; border: 1px solid #CCCCCC;">
<img src="<?php echo JURI::base().'/images/properties/profiles/'.$this->DataAgent->image; ?>" />
</div>
<div id="descagent">
<?php if($this->DataAgent->name){echo JText::_('Name').' : '.$this->DataAgent->name.'<br />';} ?>
<?php if($this->DataAgent->company){echo JText::_('Company').' : '.$this->DataAgent->company.'<br />';} ?>
<?php if($this->DataAgent->properties){echo JText::_('Properties').' : '.$this->DataAgent->properties.'<br />';} ?>
<?php if($this->DataAgent->address1){echo JText::_('Address').' : '.$this->DataAgent->address1.'<br />';} ?>
<?php if($this->DataAgent->locality){echo JText::_('Locality').' : '.$this->DataAgent->locality.'<br />';} ?>
<?php if($this->DataAgent->email){echo JText::_('Email').' : '.$this->DataAgent->email.'<br />';} ?>
<?php if($this->DataAgent->phone){echo JText::_('Phone').' : '.$this->DataAgent->phone.'<br />';} ?>
<?php if($this->DataAgent->fax){echo JText::_('Fax').' : '.$this->DataAgent->fax.'<br />';} ?>
<?php if($this->DataAgent->mobile){echo JText::_('Mobile').' : '.$this->DataAgent->mobile.'<br />';} ?>



</div>

</div>
<br style="clear: both;" />
<?php
/*
echo '<pre>';
print_r( $this->DataAgent);
echo '</pre>';
*/
}
?>
<form action="index.php?option=com_properties&controller=property&Itemid=" method="post" name="Form" id="Form">
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="property" />
<div id="accordion">
<?php
    $k = 0;
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)	
    {
$row = &$this->items[$i];	
	
		$link 		= JRoute::_( 'index.php?option=com_properties&view=property&cid='.$row->Cslug.'&tid='.$row->Typeslug.'&id='.$row->Pslug.'&Itemid='.$this->Itemid->id);
		?>
<div class="producto" >        


		

<?php 
/*
DETAILS MARKET=Market Status
DETAILS_MARKET0=Available
DETAILS_MARKET1=Leased
DETAILS_MARKET2=Sold
DETAILS_MARKET3=Under Offer
DETAILS_MARKET4=Subject to Contract
DETAILS_MARKET5=Under Contract
DETAILS_MARKET6=Unavailable
*/
 ?>      
         
         
<?php
$watermark='DETAILS_MARKET'.$row->available.'-'.$lang->getTag().'.png';
if($row->image1!=NULL){ $img=$row->image1;}else{$img='noimage.jpg';}
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS.'peque_'.$img;
if (JFile::exists($destino_imagen)){



$InfoImage=getimagesize($destino_imagen);               
                $width=$InfoImage[0];
                $height=$InfoImage[1];
				
	//echo	$width.$height;

$imgTag='<img src="images/properties/peques/peque_'. $img .'" alt="'. $row->name .'" height="75" />';
 
 }else{$imgTag='<img src="images/properties/peques/peque_'. $img .'" />';}
?>
<div class="detalles">
<div class="imagendetalles">
<div class="watermark_box">
<a href="<?php echo $link; ?>">
<?php echo $imgTag;?>
<img src="<?php echo JURI::base().'/components/'.'com_properties/'.'includes/'.'img/'.$watermark; ?>" class="watermark" alt="<?php echo JText::_('DETAILS_MARKET'.$row->available); ?>">
</a>
 </div>
</div>
            	<div class="datos">
<a href="<?php echo $link; ?>"><?php echo $row->name_product; ?></a><br />
<?php echo JText::_('Category'); ?>: <?php echo $this->NameCategory[$row->cid]; ?><br />
<?php echo JText::_('Type'); ?>: <?php echo $this->NameType[$row->type]; ?><br />
<?php echo JText::_('Country'); ?>: <?php echo $this->NameCountry[$row->cyid]; ?><br />
<?php echo JText::_('State'); ?>: <?php echo $this->NameState[$row->sid]; ?><br /> 
<?php echo JText::_('Locality'); ?>: <?php echo $this->NameLocality[$row->lid]; ?><br />  
			   </div>
 </div> 
<div class="togagent">

<?php
$imgAgent=1;
 if($imgAgent){
?>
<div class="agent" style=""><img src="images/properties/profiles/<?php echo $row->logo_image_profile;?>" width="140" height="45" /></div>
<?php }?>     

<div class="toggler"></div>  
</div>
            
					<div class="element">
                    	<div class="innerelement">

<?php 
$destino_imagen = JPATH_SITE.DS.'images'.DS.'properties'.DS.'peques'.DS.'peque_';

if($row->image2!=NULL & JFile::exists($destino_imagen.$row->image2)){ 
$img=$row->image2;?>
<a href="images/properties/<?php echo $img; ?>" rel="mediabox[680 530]" title="<?php echo $row->name; ?>" >
<img width="90px" height="65px" src="images/properties/peques/peque_<?php echo $row->image2; ?>" alt="<?php echo $row->name; ?>"/></a>
<?php }

if($row->image3!=NULL & JFile::exists($destino_imagen.$row->image3)){ 
$img=$row->image3;?>
<a href="images/properties/<?php echo $img; ?>" rel="mediabox[680 530]" title="<?php echo $row->name; ?>" >
<img width="90px" height="65px" src="images/properties/peques/peque_<?php echo $row->image3; ?>" alt="<?php echo $row->name; ?>"/></a>
<?php }

if($row->image4!=NULL & JFile::exists($destino_imagen.$row->image4)){ 
$img=$row->image4;?>
<a href="images/properties/<?php echo $img; ?>" rel="mediabox[680 530]" title="<?php echo $row->name; ?>" >
<img width="90px" height="65px" src="images/properties/peques/peque_<?php echo $row->image4; ?>" alt="<?php echo $row->name; ?>"/></a>
<?php }

if($row->image5!=NULL & JFile::exists($destino_imagen.$row->image5)){ 
$img=$row->imagen1;?>
<a href="images/properties/<?php echo $img; ?>" rel="mediabox[680 530]" title="<?php echo $row->name; ?>" >
<img width="90px" height="65px" src="images/properties/peques/peque_<?php echo $row->image5; ?>" alt="<?php echo $row->name; ?>"/></a>
<?php }

if($row->image6!=NULL & JFile::exists($destino_imagen.$row->image6)){ 
$img=$row->image6;?>
<a href="images/properties/<?php echo $img; ?>" rel="mediabox[680 530]" title="<?php echo $row->name; ?>" >
<img width="90px" height="65px" src="images/properties/peques/peque_<?php echo $row->image6; ?>" alt="<?php echo $row->name; ?>"/></a>
<?php }?>



<div class="detalleProducto" style="width:50%; float:left;">
      
<?php
if($row->price!=0){
$number = $row->price;
		if ($currencyformat==0) {
			$formatted_price = number_format($number);
		} else if ($currencyformat==1) {
			$formatted_price = number_format($number, 2,".",",");
		} else if ($currencyformat==2) {
			$formatted_price = number_format($number, 0,",",".");
		} else if ($currencyformat==3) {			
			$formatted_price = number_format($number, 2,",",".");
		}
if($PositionPrice==0){
echo JText::_('Price'); ?>: <?php echo $SimbolPrice.' '. $formatted_price; 
}else{
echo JText::_('Price'); ?>: <?php echo $formatted_price .' '. $SimbolPrice;
}
echo '<br />';
}
?>

<?php if($row->adress){echo JText::_('Address') .' : '. $row->adress.'<br />';} ?>
<?php if($row->years){echo JText::_('Years') .' : '. $row->years.'<br />';} ?>
<?php if($row->bedrooms){echo JText::_('Bedrooms') .' : '. $row->bedrooms.'<br />';} ?>
<?php if($row->bathrooms){echo JText::_('Bathrooms') .' : '. $row->bathrooms.'<br />';} ?>
<?php if($row->garage){echo JText::_('Garage') .' : '. $row->garage.'<br />';} ?>
<?php if($row->area){echo JText::_('Total Area') .' : '. $row->area.' '.JText::sprintf('Simbol Metric').'<br />';} ?>
<?php if($row->covered_area){echo JText::_('Covered Area') .' : '. $row->covered_area.' '.JText::sprintf('Simbol Metric').'<br />';} ?>
<?php if($row->available){echo JText::_('DETAILS MARKET').' : '.JText::_('DETAILS_MARKET'.$row->available).'<br />';} ?>
<br />
</div>
<div class="detalleProducto" style="width:50%; float:left;">
<?php echo $row->description; ?><br />
                 
<br />
<?php
$rutaG= JURI::base().'index.php?option=com_properties&controller=googlemap&task=map&tmpl=component&id='.$row->id;
$rutaA= JURI::base().'index.php?option=com_properties&task=agentlisting&aid='.$row->agent_id;
if($ActivarMapa == 1){
?>
<a href="<?php echo JRoute::_( $rutaG );?>" rel="mediabox[690 510]" title="<?php echo $row->name; ?>" ><?php echo JText::_('See in map'); ?></a><br />
<?php }?>




<?php $status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=500,height=400,directories=no,location=no';?>

<a href="javascript:void(0)" onclick="window.open('<?php echo JURI::base().'index.php?option=com_properties&task=addlightbox&tmpl=component&id='.$row->id; ?>','win2','<?php echo $status; ?>');" title="<?php echo JText::_('Add Short List'); ?>"><?php echo JText::_('Add Short List'); ?></a>
<br />

<a href="<?php echo JURI::base().'index.php?option=com_properties&layout=shortlist&Itemid='.$Itemid;?>"><?php echo JText::_('View Short List');?></a>
                        
<br />
<a href="<?php echo JRoute::_( $rutaA );?>"><?php echo JText::_('View Properties from this Agent'); ?></a><br />
</div>   

                </div><!--innerelement-->
                    </div><!-- element-->
</div>  <!--producto -->   
<?php
$k = 1 - $k;
}
 ?>
</div><!-- acordeon-->
</form>






<br style="clear: both;" /> 
<a href="#" onclick="window.close()"><?php echo JText::_('Close Window'); ?></a>&nbsp;|&nbsp;<a href="javascript:;" onclick="window.print(); return false"><?php echo JText::_('Print'); ?></a><br><br>
</div><!-- propiedades-->

<?php
/*
echo '<pre>';
print_r($row);
echo '</pre>';
*/
?>