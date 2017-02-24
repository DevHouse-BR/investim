<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class PropertiesControllerAjaxVote extends JController
{     
	function ValidateVote()
	{
		$product_id=JRequest::getVar( 'a' );
		$user_rating=JRequest::getVar( 'b' );
		$user =& JFactory::getUser();
		if($user->guest){//echo 'debe loguearse';
		$msg=JText::_('Need Login');
		}else{		
		
		global $mainframe;
		
		if (($user_rating >= 1) and ($user_rating <= 5)) {
		$currip = ( phpversion() <= '4.2.1' ? @getenv( 'REMOTE_ADDR' ) : $_SERVER['REMOTE_ADDR'] );
		
		$db =& JFactory::getDBO();
		$query='SELECT * FROM #__properties_rating WHERE product_id='. (int) $product_id;
		$db->setQuery( $query );
		$votes = $db->loadObject();
		
			if(!$votes){
			$query = 'INSERT INTO #__properties_rating ( product_id, rating_sum, rating_count, lastip )'
			. ' VALUES ( ' . (int) $product_id .', ' . (int) $user_rating . ', 1 , ' . $db->Quote( $currip).' ) ';
			$db->setQuery( $query );			
				if (!$db->query())
						{							
							$msg=JText::_('Duplicate vote');
						}
					$query = 'INSERT INTO #__properties_rating_user ' 
					. '( product_id, user_id, rating, lastip )'
					. ' VALUES ( ' . (int) $product_id .', '.$user->id.  ', ' . (int) $user_rating . ', ' . $db->Quote( $currip).' ) ';
			$db->setQuery( $query );
					if (!$db->query())
						{							
							$msg=JText::_('Duplicate vote');
						}
				
			}elseif ($user->id != ($votes->user_id)) {
			
			
			$query = 'INSERT INTO #__properties_rating_user ' 
					. '( product_id, user_id, rating, lastip )'
					. ' VALUES ( ' . (int) $product_id .', '.$user->id.  ', ' . (int) $user_rating . ', ' . $db->Quote( $currip).' ) ';
			$db->setQuery( $query );
					if (!$db->query())
						{
							//echo  'voto duplicado' ;
							$msg=JText::_('Duplicate vote');
						}else{			
			
			
				$query = "UPDATE #__properties_rating"
				. "\n SET rating_count = rating_count + 1, rating_sum = rating_sum + " . (int) $user_rating . ", lastip = " . $db->Quote( $currip )
				. "\n WHERE product_id = " . (int) $product_id
				;
				$db->setQuery( $query );
				if (!$db->query())
				{
					echo $db->getErrorMsg();
				}else{						
					//echo 'actualizado ';
					$msg=JText::_('Thanks for your vote');
				}				
				}				
				
			}elseif ($user->id == ($votes->user->id)) {
			//echo 'repetido';
			$msg=JText::_('Duplicate vote');
			}		
			
		}

	}$this->Show($product_id,$msg);

	}
	
	
	
	
	
	
	
	
		function Show( $id,$msg )
	{
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
    <li class="current-rating" style="width:<?php echo $result?>%;"></li>
    <li class="one-star"></li>
    <li class="two-stars"></li>
    <li class="three-stars"></li>
    <li class="four-stars"></li>
    <li class="five-stars"></li>  
  </ul>  
</div>
<div class="ajaxvote-msg">
<?php echo $msg;?>
 </div>
</div> 
<div class="ajaxvote-clr"></div>
<!-- AJAX Vote ends here -->
<?php 
}
}
?>