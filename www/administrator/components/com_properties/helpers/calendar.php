<?php
class Calendar
{	

function getAvailbility($month,$year){
$array = JRequest::getVar('cid',  0, '', 'array');
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


function calendar($theactualmonth,$start,$year){

$array = JRequest::getVar('cid',  0, '', 'array');
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

echo '<td class="'.$class.'">
<a href="javascript:void(0);" onclick="submitdate(\''.$year.'-'.$month.'-'.$day_text.'\',\''.$task.'\')" title="Item id:'.$id_property.' date: '.$year.'-'.$month.'-'.$day_text.'">'.$theactualmonth[$z].'</a>
</td>';

}

echo '</tr>';
echo '</table></div>'; 

} // end the calendar function


function ShowCalendar(){


// get current month to increase 
$start = date('n');
// get current year
$year = date('Y');
//create enclosing div 
echo '<div class="calendarwrap">';
// create loop to run 12 times displaying the calendars
for ($i = 0; $i <=11; $i+=1) :
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
	new calendar($escritura,$start,$year);
	
} 
		$start ++;					
// end months loop
endfor;
//close div
echo '</div>';
}

}