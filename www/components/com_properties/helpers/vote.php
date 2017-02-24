<?php
defined('_JEXEC') or die('Restricted access');
class VoteHelper
{	




function Header()
	{
global $mainframe;
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/ajaxvote.css" type="text/css" />');
$linkAjax= JURI::base().'index.php?option=com_properties&controller=ajaxVote&format=raw&task=ValidateVote';
$LinkLoading = JURI::base().'/components/com_properties/includes/img/loading.gif'; 
?>

<script type="text/javascript">
function AjaxVote(a,b,c,d){
var progressV = $('progressV');
var div = document.getElementById('div_rating'+a);
//div.innerHTML='<img src="<?php //echo $LinkLoading;?>" border="0" align="absmiddle" /> '+'UPDATING';
new Ajax("<?php echo $linkAjax;?>", 
{method: 'get',	
onRequest: function(){div.innerHTML='<img src="<?php echo $LinkLoading;?>" border="0" align="absmiddle" /> '+'Updating...';},
onComplete: function(){},
update: $('div_rating'+a), 
data: '&a='+a+'&b='+b+'&c='+c+'&d='+d}).request();
			}
</script>
<?php
}



function ShowAddVote( $id )
	{
/*$id = $row->id;*/
$result=0;
$html = '';
global $mainframe;
$db =& JFactory::getDBO();
$query = ' SELECT r.*,COUNT(cm.star) AS count_star, SUM(cm.star) AS sum_star FROM #__properties_rating AS r'
		.' LEFT JOIN #__properties_comments as cm ON cm.productid = r.product_id '
		.' WHERE r.product_id='. (int) $id
		.' GROUP BY cm.productid '
		;		

$db->setQuery( $query );

$vote = $db->loadObject();
$vote->rating_count+=$vote->count_star;
$vote->rating_sum+=$vote->sum_star;

		if($vote->rating_count!=0){
			$result = number_format(intval($vote->rating_sum) / intval( $vote->rating_count ),2)*20;
		}
		$rating_sum = intval($vote->rating_sum);
		$rating_count = intval($vote->rating_count);


	
?>
<!-- AJAX Vote starts here -->
<div id="div_rating<?php echo $id ?>" class="div_rating">
<div class="ajaxvote-box">
<?php 
		if($rating_count!=1) {
			echo " ".$rating_count." ".JText::_('votes')." ";
		} else { 
			echo " ".$rating_count." ".JText::_('vote')." ";
		}
	?>
</div>    
<div class="ajaxvote-inline-rating">
  <ul class="ajaxvote-star-rating">
    <li id="rating<?php echo $id ?>" class="current-rating" style="width:<?php echo $result?>%;"></li>
    <li><a href="javascript:void(null)" onclick="javascript:AjaxVote(<?php echo $id ?>,1,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="1 <?php echo JText::_('Star'); ?> 5" class="one-star">1</a></li>
    <li><a href="javascript:void(null)" onclick="javascript:AjaxVote(<?php echo $id ?>,2,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="2 <?php echo JText::_('Stars'); ?> 5" class="two-stars">2</a></li>
    <li><a href="javascript:void(null)" onclick="javascript:AjaxVote(<?php echo $id ?>,3,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="3 <?php echo JText::_('Stars'); ?> 5" class="three-stars">3</a></li>
    <li><a href="javascript:void(null)" onclick="javascript:AjaxVote(<?php echo $id ?>,4,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="4 <?php echo JText::_('Stars'); ?> 5" class="four-stars">4</a></li>
    <li><a href="javascript:void(null)" onclick="javascript:AjaxVote(<?php echo $id ?>,5,<?php echo $rating_sum ?>,<?php echo $rating_count ?>);" title="5 <?php echo JText::_('Stars'); ?> 5" class="five-stars">5</a></li>
  </ul>
</div>
<div class="ajaxvote-msg">

 </div>
 <div id="div_result<?php echo $id ?>"></div>
</div>

<div class="ajaxvote-clr"></div>


<!-- AJAX Vote ends here -->
<?php 
}

	function ShowVotes( $id,$MyVote )
	{
/*$id = $row->id;*/
$result=0;
$html = '';
global $mainframe;
$db =& JFactory::getDBO();
$query = ' SELECT r.* FROM #__properties_rating AS r '		
		.' WHERE r.product_id='. (int) $id 
		.' GROUP BY r.product_id '
		;		
//echo $query;
$db->setQuery( $query );

$vote = $db->loadObject();
//print_r($vote);

$query2 = ' SELECT COUNT(cm.star) AS count_star, SUM(cm.star) AS sum_star FROM #__properties_comments as cm '
		.' WHERE cm.productid='. (int) $id 
		.' GROUP BY cm.productid '
		;		
//echo $query;
$db->setQuery( $query2 );
$comment = $db->loadObject();
//print_r($comment);



$vote->rating_count+=$comment->count_star;
$vote->rating_sum+=$comment->sum_star;

		if($vote->rating_count!=0){
			$result = number_format(intval($vote->rating_sum) / intval( $vote->rating_count ),2)*20;
		}
		$rating_sum = intval($vote->rating_sum);
		$rating_count = intval($vote->rating_count);	
		
		//echo '<br><b>'.$rating_sum.'</b><br>';
?>
<!-- AJAX Vote starts here -->
<div id="_div_rating<?php echo $id ?>" class="div_rating">
<div class="ajaxvote-box">
<?php 
		if($rating_count!=1) {
			echo " ".$rating_count." ".JText::_('votes')." ";
		} else { 
			echo " ".$rating_count." ".JText::_('vote')." ";
		}
	?>
</div>  
<div class="ajaxvote-inline-rating">
  <ul class="ajaxvote-star-rating">
  <li class="current-rating" style="width:<?php echo $result?>%;"></li>  
    <li class="one-star"></li>
    <li class="two-stars"></li>
    <li class="three-stars"></li>
    <li class="four-stars"></li>
    <li class="five-stars"></li>  
  </ul>  
</div>
<div class="ajaxvote-msg">
<?php if($MyVote){
//echo JText::_('Your vote').': '.$MyVote;

}?>
 </div>
</div>
<div class="ajaxvote-clr"></div>
<!-- AJAX Vote ends here -->
<?php 
}


	function ShowVoteComment( $rating )
	{
/*$id = $row->id;*/
$result=0;
$html = '';

			$result = number_format(intval($rating) / intval( 1 ),2)*20;
	
?>
<!-- AJAX Vote starts here -->
<div id="2div_rating<?php echo $id ?>" class="2div_rating">

<div style="float: left; width:100px;">
  <ul class="ajaxvote-star-rating">
  <li class="current-rating-comment" style="width:<?php echo $result?>%;"></li>  
    <li class="one-star"></li>
    <li class="two-stars"></li>
    <li class="three-stars"></li>
    <li class="four-stars"></li>
    <li class="five-stars"></li>  
  </ul>  
</div>


    
</div>

<!-- AJAX Vote ends here -->
<?php 
}









} 
?>