<?php
class Calendar
{	

function getAvailbility($month,$year){
$array = JRequest::getVar('id',  0, '', 'array');
$id_property=((int)$array[0]);
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
//print_r($list);
return $availavility;

}

function createmonth($month, $year, $theactualmonth) {

$month_to_check = strtolower(date("F", mktime(12, 0, 0, $month, 1, $year)));
$state = $default_tariffs[$month_to_check];
   
$date = mktime(12, 0, 0, $month, 1, $year);
$daysInMonth = date("t", $date);
// calculate the position of the first day in the calendar (sunday = 1st column, etc)
$offset = date("w", $date);
//echo '<br><b>ofset: '.$offset.'</b>';
$rows = 1;
$result=array();
//$result[0]='';
for($i = 1; $i <= $offset; $i++)
{
	
	$result[$i]='';
}
for($day = 1; $day <= $daysInMonth; $day++)
{
    if( ($day + $offset - 1) % 7 == 0 && $day != 1)
    {
		
        $rows++;
    }
	
		
$result[$offset+$day-1]=$day;	

}

	
    while( ($day-1 + $offset) <= $rows * 7)
    {	
			
$result[$offset+$day]='';		
        $day++;
    }
if ($rows == 4) {
	$rows++;
$anotherline = "\n&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|";
	$newstringData = "$newstringData"."$anotherline";
	
	}
	if ($rows == 5) {
$anotherline = "\n&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|&nbsp;|empty|";
	$newstringData = "$newstringData"."$anotherline";
	}
/*print_r($result);*/
return $result;
}


function calendar($theactualmonth,$start,$year,$d){

$array = JRequest::getVar('id',  0, '', 'array');
$id_property=((int)$array[0]);

$availavility=Calendar::getAvailbility($start,$year);
//print_r($availavility);
$month[1] = "january";
$month[2] = "february";
$month[3] = "march";
$month[4] = "april";
$month[5] = "may";
$month[6] = "june";
$month[7] = "july";
$month[8] = "august";
$month[9] = "september";
$month[10] = "october";
$month[11] = "november";
$month[12] = "december";


echo '
<div class="calendar1">
<table class="month1">
<tr><th colspan="7">'.ucwords($month[$start]).'('.$start.') '.$year.'</th></tr>
<tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>';
echo '<tr>';
$tot= count($theactualmonth);
if($theactualmonth[6]==''){$inicio_z=7;}else{$inicio_z=0;}
for($z=$inicio_z;$z<$tot;$z++){

if($theactualmonth[$z]==''){$class='empty';}else{$class='fecha';}



if($z%7==0){echo '</tr>';echo '<tr>';}
$month=$start;
if($month<10){$month='0'.$month;}
$day=$theactualmonth[$z];

if(!$day){$class='empty';}

if($day<10){$day_text='0'.$day;}else{$day_text=$day;}

if($availavility[$day]=='' or $availavility[$day]==1){$class.='available';$task='unavailable';}else{$class.='unavailable';$task='available';}

echo '<td class="'.$class.'">';
if($d==1){
echo '<a href="javascript:void(0);" onclick="submitdate(\''.$year.'-'.$month.'-'.$day_text.'\',\''.$task.'\')" title="Item id:'.$id_property.' date: '.$year.'-'.$month.'-'.$day_text.'">'.$theactualmonth[$z].'</a>';

}else{

echo '<a href="javascript:void(0);" onclick="changedate(\''.$year.'-'.$month.'-'.$day_text.'\',\''.$task.'\')" title="Item id:'.$id_property.' date: '.$year.'-'.$month.'-'.$day_text.'">'.$theactualmonth[$z].'</a>';

}
echo '</td>';


}




echo '</tr>';
echo '</table></div>'; 



} // end the calendar function


	
	
	
	
	
	
	
	
	
		
function ShowCalendar($a,$b,$c,$d){
//$c = months to show
$c--;
// get current month to increase 
$start = date('n');
// get current year
$year = date('Y');
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
		
		
			// create the filename to load
	$theactualmonth = $month[$start]."_".$year.".txt";
	// check if the file exists to load if not create one
if (file_exists('dates/'.$theactualmonth)) {
	calendar($theactualmonth);
} else {
	$escritura=Calendar::createmonth($start, $year, $theactualmonth);
/*	print_r($escritura); */
	new calendar($escritura,$start,$year,$d);
	
} 
		$start ++;					
// end months loop
endfor;
//close div
echo '</div>';
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
//print_r($list);
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
	
	
/*print_r($result);*/
return $result;
}

	
	
	
	
	
	function calendarBooking($theactualmonth,$start,$year,$d,$id_property,$array_date_select){

$availavility=Calendar::getAvailbilityBooking($start,$year,$id_property);
//print_r($availavility);
$month[1] = "january";
$month[2] = "february";
$month[3] = "march";
$month[4] = "april";
$month[5] = "may";
$month[6] = "june";
$month[7] = "july";
$month[8] = "august";
$month[9] = "september";
$month[10] = "october";
$month[11] = "november";
$month[12] = "december";

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
<tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th class="weekavailable">S</th></tr>';
echo '<tr>';
$tot= count($theactualmonth);

if($theactualmonth[6]==''){$inicio_z=7;}else{$inicio_z=0;}
for($z=$inicio_z;$z<$tot;$z++){

if($theactualmonth[$z]==''){
$class='empty';
}else{
$class='fecha';
}

if($day and $day>0){
//echo  $start  .' '. $theactualmonth[$z].' '.  $year;
$sabado  = date('w',mktime(0, 0, 0, $start  , $theactualmonth[$z], $year));
//echo $sabado;
}else{$sabado=0;}


if($z%7==0){echo '</tr>';echo '<tr>';}
$month=$start;
if($month<10){$month='0'.$month;}
$day=$theactualmonth[$z];

if(!$day){$class='empty';}

if($day<10){$day_text='0'.$day;}else{$day_text=$day;}

if($availavility[$day]=='' or $availavility[$day]==1){
$class.='available';$task='unavailable';

}else{
$class.='unavailable';$task='available';
}

if($day and $day>0){
//echo $this_date.$day_text;
if(in_array($this_date.$day_text,$array_date_select)){
//echo $this_date.$day_text;
$class='fechaselected';
}
}

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
$sabado=0;
}

echo '<td class="'.$class.'">';


if($class=='fechaunavailable' or $sabado != 6){
echo $day.'';

}else{

echo '<a href="javascript:void(0);" onclick="changedate(\''.$year.'-'.$month.'-'.$day_text.'\',document.josFormCal.duration.value)" title="Item id:'.$id_property.' date: '.$year.'-'.$month.'-'.$day_text.'">'.$theactualmonth[$z].'</a>';

}
echo '</td>';


}




echo '</tr>';
echo '</table></div>'; 



} // end the calendar function


	
	
	
	
	
function ShowCalendarBooking($a,$b,$c,$d){
$id_property=$a;
$date_select=$b;
$duration = $d;

echo '<input type="hidden" name="dateselected" id="dateselected" value="'.$date_select.'" />';
//$c = months to show
$c--;
// get current month to increase 

$start = date('n');
		$year = date('Y');

/*
if(($month_select-1)>=date('n')){
	$start = $month_select-1;
	$year =$year_select;
	}else{
	$start = date('n');
}

if(($year_select)>date('Y')){$year = date('Y');}
	}else{
		$start = date('n');
		$year = date('Y');
}
*/

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

for($x=0;$x<$duration;$x++){
$array_date_select[]  = date('Y-m-d',mktime(0, 0, 0, $month_select, $day_select+$x, $year_select));		
}
}



//print_r($array_date_select);
	$escritura=Calendar::createmonthBooking($start, $year, $theactualmonth,$id_property,$array_date_select);
	/*print_r($escritura); */
	$aaa=Calendar::calendarBooking($escritura,$start,$year,$d,$id_property,$array_date_select);
	

		$start ++;					
// end months loop
endfor;
//close div
echo '</div>';
}




}