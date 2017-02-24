<?php
class BookCalendar
{	

function getUnavailbilityBooking($id_property){	
$db = & JFactory::getDBO();
$query = 'SELECT date from #__properties_available_product '.
		' WHERE id_product = '.$id_property
		;
$db->setQuery($query);
$List = $db->loadObjectList();
$Unavailavility=array();
foreach($List as $Una){
$Unavailavility[]=$Una->date;
}
//print_r($Unavailavility);
return $Unavailavility;
}


	function getAvailbilityBooking($month,$year,$id_property){

$db = & JFactory::getDBO();
if($month<10){$month='0'.$month;}
$query = 'SELECT * from #__properties_available_product '.
		' WHERE id_product = '.$id_property.
		" AND EXTRACT(YEAR_MONTH FROM date) = ".$year.$month;
$db->setQuery($query);

$list = $db->loadObjectList('id');
foreach($list as $l){
$dia=explode('-',$l->date);
//echo $dia[2];
$availavility[(int)$dia[2]]=$l->available;
}
//print_r($availavility);
return $availavility;

}

function createmonthBooking($month, $year, $theactualmonth) {

$month_to_check = strtolower(date("F", mktime(12, 0, 0, $month, 1, $year)));

$state = $default_tariffs[$month_to_check];
   
$date = mktime(12, 0, 0, $month, 1, $year);
$daysInMonth = date("t", $date);



// calculate the position of the first day in the calendar (sunday = 1st column, etc)
$offset = date("w", $date);
//echo '<br><b>ofset: '.$offset.'</b>';
$rows = 0;
$result=array();
//$result[0]='';
for($i = 0; $i <= $offset; $i++)
{
	
	$result[$i]='';
	
}
for($day = 1; $day <= $daysInMonth; $day++)
{
    if( ($day + $offset - 1) % 7 == 0 && $day != 1)
    {
		
        $rows++;
		
    }
	
		
$result[$offset-1+$day]=$day;	

}




if ($rows == 4) {
	$rows++;	
	}
	
$iniciar=1;	
    while( ($day + $offset) <= $rows * 7)
    {	
		
$result[$offset+$day-1]='-'.$iniciar;		
        $day++;
$iniciar++;			
		
    }	
	
	

return $result;
}

	
	
	
	
	
	function calendarBooking($theactualmonth,$start,$year,$d,$id_property,$array_date_select,$Duration,$StartDay=NULL){
//print_r($array_date_select);
$availavility=BookCalendar::getAvailbilityBooking($start,$year,$id_property);
$Unavailavility=BookCalendar::getUnavailbilityBooking($id_property);
foreach($Unavailavility as $k =>$val)
	{
	$UnavailableDay[$val]=$val;
	}
//print_r($Unavailavility);
$month[1] = JText::_('january');
$month[2] = JText::_('february');
$month[3] = JText::_('march');
$month[4] = JText::_('april');
$month[5] = JText::_('may');
$month[6] = JText::_('june');
$month[7] = JText::_('july');
$month[8] = JText::_('august');
$month[9] = JText::_('september');
$month[10] = JText::_('october');
$month[11] = JText::_('november');
$month[12] = JText::_('december');

//print_r($array_date_select);

for($x=0;$x<7;$x++){
//$array_date_select[]  = date('Y-m-d',mktime(0, 0, 0, $month_select, $day_select+$x, $year_select));		
/*echo $array_date_select[0];*/

$selected=explode('-',$array_date_select[$x]);
$year_select=$selected[0];
$month_select=$selected[1];
if($month_select==$start){
$day_select=$selected[2];
//echo $date_select;
$sum_day=NULL;
}
}
if($start<10){$start_text='0'.$start;}else{$start_text=$start;}
$this_date=$year.'-'.$start_text.'-';

echo '
<div class="calendar1">
<table class="month1">
<tr><th colspan="7">'.ucwords($month[$start]).'('.$start.') '.$year.'</th></tr>
<tr>';
$classWeek[$StartDay]=' class="weekavailable"';
echo '
<th '.$classWeek[0].'>'.JText::_('nameday1').'</th><th'.$classWeek[1].'>'.JText::_('nameday2').'</th><th'.$classWeek[2].'>'.JText::_('nameday3').'</th><th'.$classWeek[3].'>'.JText::_('nameday4').'</th><th'.$classWeek[4].'>'.JText::_('nameday5').'</th><th'.$classWeek[5].'>'.JText::_('nameday6').'</th><th'.$classWeek[6].'>'.JText::_('nameday7').'</th>
';
echo '<tr>';
echo '<tr>';
$tot= count($theactualmonth);


$last_array_date_select = count($array_date_select);
//echo $last_array_date_select;
$last_array_date_select = $array_date_select[$last_array_date_select-1];
//echo $last_array_date_select;

if($theactualmonth[6]==''){$inicio_z=7;}else{$inicio_z=0;}


for($z=$inicio_z;$z<$tot;$z++){
$day=$theactualmonth[$z];
if($theactualmonth[$z]==''){
$class='empty';
}else{
$class='fecha';
}

if($day and $day>=0){

$sabado  = date('w',mktime(0, 0, 0, $start  , $theactualmonth[$z], $year));

}else{$sabado=-1;}


if($z%7==0){echo '</tr>';echo '<tr>';}
$month=$start;
if($month<10){$month='0'.$month;}


if(!$day){$class='empty';}

if($day<10){$day_text='0'.$day;}else{$day_text=$day;}

if($availavility[$day]=='' or $availavility[$day]==1){
$class.='available';$task='unavailable';

}else{
$class.='unavailable';$task='available';
}


$class2='';
if($day and $day>0){
$not=0;
//echo '<b>'.$this_date.$day_text.'</b>';
$s=explode('-',$this_date.$day_text);
$Uyear=$s[0];
$Umonth=$s[1];
$Uday=$s[2];
$indate='';
for($d=1;$d<$Duration;$d++)
	{
	$indate = date('Y-m-d',mktime(0, 0, 0, $Umonth, $Uday+$d, $Uyear));
	//echo $indate;
if(in_array($indate,$Unavailavility)){
$not++;
}	
	}
//echo '<b>'.$not.'</b>';
if($StartDay)
	{	
	if($not>0 or $sabado != $StartDay){
	$class2='notselectable';
	}
}else{
	if($not>0 ){
	$class2='notselectable';
}
}
}


if($day and $day>0){
//echo $this_date.$day_text;
if(in_array($this_date.$day_text,$array_date_select)){
//echo $this_date.$day_text;
$class='fechaselected';

if($last_array_date_select==$this_date.$day_text)
	{
	$class='fechaselected_last';
	}



}
}

//print_r($UnavailableDay[$this_date.$day_text]);
/*
if($UnavailableDay[$this_date.$day_text])
	{
	$class='fechaunavailable';
	}
*/	
/*
if($sum_day and $sum_day<7){
$class='weekselected';
$sum_day++;
}
*/
/*
if($day_select==$day_text){
$sum_day=1;
$class='fechaselected';
}
*/

if($day<0){
$class='nextmonth';
$day='';//abs($day);
$sabado=-1;
}

echo '<td class="'.$class.' '.$class2.'">';

if($StartDay)
	{
	
		if($class=='fechaunavailable' or $class2=='notselectable' or $sabado != $StartDay){
		
		echo $day.'';

		}elseif($day>0){

		echo '<a href="javascript:void(0);" onclick="changedate(\''.$year.'-'.$month.'-'.$day_text.'\',document.josFormCal.duration.value)" title="Item id:'.$id_property.' date: '.$year.'-'.$month.'-'.$day_text.'">'.$theactualmonth[$z].'</a>';

		}
	}else{
		
		if($class=='fechaunavailable' or $class2=='notselectable'){
		echo $day.'';

		}elseif($day>0){

		echo '<a href="javascript:void(0);" onclick="changedate(\''.$year.'-'.$month.'-'.$day_text.'\',document.josFormCal.duration.value)" title="Item id:'.$id_property.' date: '.$year.'-'.$month.'-'.$day_text.'">'.$theactualmonth[$z].'</a>';

		}
		
	
	
	}




echo '</td>';


}




echo '</tr>';
echo '</table></div>'; 



} // end the calendar function


	
	
	
function ShowCalendarBooking($a,$b,$c,$d){

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );

$AmountMonthsCalendar=$params->get('AmountMonthsCalendar');
$StartYearCalendar=$params->get('StartYearCalendar');
$StartMonthCalendar=$params->get('StartMonthCalendar');
$PeriodOnlyWeeks=$params->get('PeriodOnlyWeeks');
$PeriodAmount=$params->get('PeriodAmount');
$PeriodStartDay=$params->get('PeriodStartDay');
$StartDay=$PeriodStartDay;
$id_property=$a;
$date_select=$b;
$duration = $d;

echo '<input type="hidden" name="dateselected" id="dateselected" value="'.$date_select.'" />';
//$c = months to show
$c--;
// get current month to increase 
//$start = date('n');
$start = $StartMonthCalendar;
$year = $StartYearCalendar;
		

//$year = 2010;

	
// get current year
//create enclosing div 
echo '<div class="calendarwrap">';
// create loop to run 12 times displaying the calendars
for ($i = 0; $i <=$c; $i+=1) :
// check if its the next year or not
	if ($start == 13) {
	// increase the year if its next year
	$year ++;
	$start = 1;
		}			

$array_date_select=array();

if($date_select){
$selected=explode('-',$date_select);
$year_select=$selected[0];
$month_select=$selected[1];
$day_select=$selected[2];

//for($x=0;$x<$duration;$x++){
for($x=0;$x<=$duration;$x++){
$array_date_select[]  = date('Y-m-d',mktime(0, 0, 0, $month_select, $day_select+$x, $year_select));		
}
}

//print_r($array_date_select);
	$escritura=BookCalendar::createmonthBooking($start, $year, $theactualmonth,$id_property,$array_date_select);
	//print_r($escritura); 
	$aaa=BookCalendar::calendarBooking($escritura,$start,$year,$d,$id_property,$array_date_select,$d,$StartDay);
	

		$start ++;					
// end months loop
endfor;
//close div
echo '</div>';
}




}