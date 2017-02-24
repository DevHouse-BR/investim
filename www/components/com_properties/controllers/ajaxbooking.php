<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class PropertiesControllerAjaxbooking extends JController
{ 


function changedate() {


$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );

$AmountMonthsCalendar=$params->get('AmountMonthsCalendar');
$PeriodOnlyWeeks=$params->get('PeriodOnlyWeeks');
$PeriodAmount=$params->get('PeriodAmount');
$PeriodStartDay=$params->get('PeriodStartDay');
		$currencyformat=$params->get('FormatPrice');
		$PositionPrice=$params->get('PositionPrice');
		$SimbolPrice=$params->get('SimbolPrice');
		
$date=JRequest::getVar('date');
$Product_id=JRequest::getVar('Product_id');
$Duration=JRequest::getVar('duration');
global $mainframe;
$datos = null;







	if($PeriodOnlyWeeks){






	}
	
	
	
	
	
$db 	=& JFactory::getDBO();	
	$query = ' SELECT rt.* '			
			. ' FROM #__properties_rates as rt '					
			. ' WHERE rt.published = 1 AND rt.productid = '.$Product_id
			. ' AND rt.validfrom = \''.$date.'\''
			. ' order by rt.ordering ';		
        $db->setQuery($query);   

		$this->Rates = $db->loadObjectList();



$query = ' SELECT rt.* '			
			. ' FROM #__properties_rates as rt '					
			. ' WHERE rt.published = 1 AND rt.productid = '.$Product_id			
			. ' order by rt.ordering ';		
        $db->setQuery($query);   

		$this->AllRates = $db->loadObjectList();




		if($Product_id and $date){
		
		$db 	=& JFactory::getDBO();
				
		$totalPrice=0;		
		
		$selected=explode('-',$date);
		$year_select=$selected[0];
		$month_select=$selected[1];
		$day_select=$selected[2];
		
		
			if($PeriodOnlyWeeks){
			$totalPriceWeeks=0;
			//echo $Duration;
			$total_weeks = $Duration/7;
			//echo $total_weeks;
			for($tw=1;$tw<$total_weeks;$tw++)
				{
			$this_week  = date('Y-m-d',mktime(0, 0, 0, $month_select, ($day_select+($tw*7)), $year_select));	
				$this_week_sql.=' OR validfrom = "'.$this_week.'"';
				}
			$week_select  = date('Y-m-d',mktime(0, 0, 0, $month_select, $day_select+$Duration-7, $year_select));
			$query = 'SELECT * FROM #__properties_rates '
			. ' WHERE published = 1 AND productid = '. $Product_id
			. ' AND (validfrom = "'.$date.'"' .$this_week_sql.')'
			;
		//	echo $query;
			$db->setQuery( $query );
			$ThisRatesWeeks = $db->loadObjectList();
			//print_r($ThisRatesWeeks);
			foreach($ThisRatesWeeks as $TRW){
			//echo '<b>'.$TRW->rateperweek.'</b>';
			$totalPriceWeeks=$totalPriceWeeks+(int)$TRW->rateperweek;
			
			}
			//echo $totalPriceWeeks;
			
			}else{
		
		

			for($x=0;$x<$Duration;$x++){

			$array_date_select[$x]  = date('Y-m-d',mktime(0, 0, 0, $month_select, $day_select+$x, $year_select));	

			$query = 'SELECT * FROM #__properties_rates '
			. ' WHERE published = 1 AND productid = '. $Product_id
			. ' AND validfrom <= "'.$array_date_select[$x].'" AND validto >= "'.$array_date_select[$x].'"'
			;	
	
//echo $query;
			$db->setQuery( $query );
			$ThisRates = $db->loadObject();
		//print_r($ThisRates);	
			$totalPrice+=$ThisRates->rateperday;
			
			
			}//for
			
			
			}//if($PeriodOnlyWeeks)
		
		}	
		
		
		
		
				
	
//echo $Product_id.' '.$date;

require_once( JPATH_COMPONENT.DS.'helpers'.DS.'bookcalendar.php' );

?>

<table class="admintable" width="100%">
	<tr>
		<td>
    <?php echo BookCalendar::ShowCalendarBooking( $Product_id,$date,$AmountMonthsCalendar,$Duration ); ?>    
        
        </td>
	</tr>
</table>

<table class="header_select" border="0" align="left" cellspacing="0" cellpadding="0">
 <thead>
       <tr>

<th> 
      <?php echo JText::_('Duration'); ?>
 </th>
 <th> 
      <?php echo JText::_('Period of Travel'); ?>
 </th>
 <th> 
      <?php echo JText::_('Price'); ?>
 </th>
 <th></th>
 </tr>
 </thead>
<tbody>
 <tr>
  <td> 
<?php  
if($date){
$db = & JFactory::getDBO();
$query = 'SELECT date from #__properties_available_product '
		. ' WHERE id_product = '.$Product_id
		. ' AND date > "'.$date.'"'
		. ' LIMIT 1'
		;
$db->setQuery($query);
$nextUnavailable = $db->loadResult();
//print_r($nextUnavailable);
$sdD = explode('-',$date);
$desde=$sdD[2].$sdD[1].$sdD[0];

if(!$nextUnavailable){
$nextUnavailable= date('Y-m-d',mktime(0, 0, 0, $sdD[1], $sdD[2]+29, $sdD[0]));
}

//echo 'aaa'.$nextUnavailable;

$edD = explode('-',$nextUnavailable);
$hasta=$edD[2].$edD[1].$edD[0];

$timestamp1 = mktime(0, 0, 0, $sdD[1], $sdD[2], $sdD[0]);
$timestamp2 = mktime(0, 0, 0, $edD[1], $edD[2], $edD[0]); 

$diferencia = $timestamp2 - $timestamp1;

$dias=$diferencia/86400;
//echo $dias;

}else{//if($date)
$dias=-1;
}
if($PeriodOnlyWeeks){


if($dias<0){
$Mp[0]->id_duration=7;
$Mp[0]->duration=JText::_('1 Week');
$Mp[1]->id_duration=14;
$Mp[1]->duration=JText::_('2 Weeks');
$Mp[2]->id_duration=21;
$Mp[2]->duration=JText::_('3 Weeks');
$Mp[3]->id_duration=28;
$Mp[3]->duration=JText::_('4 Weeks');
$Mp[4]->id_duration=35;
$Mp[4]->duration=JText::_('5 Weeks');
}

	if($dias>=7 and $dias>0){
$Mp[0]->id_duration=7;
$Mp[0]->duration=JText::_('1 Week');
	}
	if($dias>=14 and $dias>0){
$Mp[1]->id_duration=14;
$Mp[1]->duration=JText::_('2 Weeks');
	}
	if($dias>=21 and $dias>0){
$Mp[2]->id_duration=21;
$Mp[2]->duration=JText::_('3 Weeks');
	}
	if($dias>=28 and $dias>0){
$Mp[3]->id_duration=28;
$Mp[3]->duration=JText::_('4 Weeks');
	}
	if($dias>=35 and $dias>0){
$Mp[4]->id_duration=35;
$Mp[4]->duration=JText::_('5 Weeks');
	}
	
	
}else{


	if($dias<14 and $dias>0){
		for($z=1;$z<=$dias;$z++)
		{
		$Mp[$z]->id_duration=$z;
		$Mp[$z]->duration=$z.' '.JText::_('Days');	
		}
	}else{
		for($z=1;$z<=14;$z++)
		{
		$Mp[$z]->id_duration=$z;
		$Mp[$z]->duration=$z.' '.JText::_('Days');	
		}	
	}
	
}//if($PeriodOnlyWeeks)










$javascript = 'onchange="changedate(document.josFormCal.dateselected.value,this.value)"';
$Comboduration       = JHTML::_('select.genericlist',   $Mp, 'duration', 'class="select_duration" '.$javascript,'id_duration', 'duration',  $Duration); 
echo $Comboduration;

?>

</td>

<td>  
<?php  
if(($Duration) and ($date)){
$sd=JRequest::getVar('date');
$sdD = explode('-',$sd);
$desde=$sdD[2].$sdD[1].$sdD[0];
$ed=date('Y-m-d',mktime(0, 0, 0, $sdD[1], $sdD[2]+$Duration, $sdD[0]));
echo date('d/m', strtotime($sd)).' | '.date('d/m', strtotime($ed)).'';
}


?>

</td>
<td>
<?php 
if($totalPrice){$Price = $totalPrice;}elseif($totalPriceWeeks){ $Price = $totalPriceWeeks;}



if($Price!=0){
$number = $Price;
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
$Price = $SimbolPrice.' '. $formatted_price; 
}else{
$Price = $formatted_price .' '. $SimbolPrice;
}
}

echo $Price;
?>


<input type="hidden" name="price" value="<?php echo $totalPrice;?>" />
<input type="hidden" name="priceweek" value="<?php echo $totalPriceWeeks;?>" />
</td>
<td>  
<?php
if($date){ ?>
  <div align="center"> 
  <button class="buttonverde validate" type="button" onclick="josFormCal.submit()"><?php echo JText::_('book now'); ?></button> 
  </div>
<div style="clear: both;"></div>
<?php }?>
</td>
</tr>
</tbody>
</table>



<?php

//if($this->AllRates ){ to show rates
if($this->AllRates1111 ){
?>

<table class="admintable" width="100%">
	<tr>
    	<td>
        
        </td>
    </tr>
</table>


<table style="" class="colorstripes" align="center" border="0">
<thead> 
<tr>
<th style="text-align: center;">Title</th>
<th style="text-align: center;">Period of travel</th>
<th style="text-align: center;">Price <?php echo $SimbolPrice; ?></th>
<th style="text-align: center;">&nbsp;</th>
</tr>
</thead> 
<tbody style="text-align: left;">

        <?php		
		$x=0;
		foreach($this->AllRates  as $d)
		{
			$x++;
			if($x % 2 == 0){$tr='#E0EBFF';}else{$tr='#FFFFFF';}
			$dato[] = $d;			
			?>            
			<tr style="text-align: left;">  
            <td style="text-align: center;"><?php echo $d->title;?></td>    
            <td style="text-align: center;"><?php echo date('d/m', strtotime($d->validfrom));?>-<?php echo date('d/m', strtotime($d->validto));?></td>
            <td style="text-align: center;"><?php echo $d->rateperweek;?></td>
            <td style="text-align: center;">
         <?php if($ShowToCheckbox==1){ ?>   
            <input type="checkbox" id="form_id_week[]" name="form_id_week[]" value="<?php echo $d->week;?>" />
            <input type="hidden" name="sdw[<?php echo $d->week;?>]" value="<?php echo $d->from;?>" />
            <input type="hidden" name="edw[<?php echo $d->week;?>]" value="<?php echo $d->to;?>" />
            <input type="hidden" name="price[<?php echo $d->week; ?>]" id="price[<?php echo $d->week; ?>]" value="<?php echo $d->price; ?>" />
          <?php }else{ ?>  
           
           <button class="buttonverde validate" type="submit"><?php echo JText::_('book now'); ?></button> 
           
          <?php } ?>  
            </td></tr>
            
			<?php }?>  
    </tbody>      
</table>
        
  
<?php
}



}


}
?>