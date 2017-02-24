<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class PropertiesControllerComments extends JController
{

		
function AddCommentAjax()
	{
	global $mainframe;
	$user =& JFactory::getUser();
	$component_name = 'properties';
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );	
$useComment2=$params->get('useComment2');
$useComment3=$params->get('useComment3');
$useComment4=$params->get('useComment4');
$useComment5=$params->get('useComment5');

	$option = JRequest::getVar('option');
	$model = $this->getModel('comments');
	$post = JRequest::get( 'post' );
	
	$productid = JRequest::getVar( 'productid','','post' );
	$name =  JRequest::getVar( 'commentname','','post' );
	$email =  JRequest::getVar( 'commentemail','','post' );
	$title =  JRequest::getVar( 'commenttitle','','post' );
	$comment =  JRequest::getVar( 'commentcomment','','post' ); 
	$post['star1'] =  JRequest::getVar( 'star1','','post' );
	$post['star2'] =  JRequest::getVar( 'star2','','post' );
	$post['star3'] =  JRequest::getVar( 'star3','','post' );
	$post['star4'] =  JRequest::getVar( 'star4','','post' );
	$post['star5'] =  JRequest::getVar( 'star5','','post' );
	
	$usedStars=1;
	$Stars=$post['star1'];
if($post['star2']){$usedStars++;$Stars+=$post['star2'];}
if($post['star3']){$usedStars++;$Stars+=$post['star3'];}
if($post['star4']){$usedStars++;$Stars+=$post['star4'];}
if($post['star5']){$usedStars++;$Stars+=$post['star5'];}
	
	$post['star'] = $Stars/$usedStars;

	//$post['productid'] = $product_id;
	$post['userid'] = $user->id;
	$post['name'] = $user->name;
	$post['email'] = $user->email;
	$post['title'] = $title;	
	$post['comment'] = $comment;
	
	
	if(!$title or !$comment){
	$html .= '<div class="comment_error">';
	$html .= JText::_('Error Empty Fields');
	$html .= '</div> ';
	
	
	$html .= '<div class="form_comment">
	<form method="post" onsubmit="return false;" action="" id="commentForm" name="commentForm">				
	<div>
		<label for="commenttitle">'.JText::_("Title").'</label>
				<input name="commenttitle" id="commenttitle" value="'.$title.'" class="inputbox required" type="text">
	</div>
	<div>
		<label for="commentrating">'.JText::_('Your Rating').'</label>
    <span class="content_vote">
	'.JText::_('Poor').'
    <input alt="vote 1 star" name="star1" value="1" type="radio">
    <input alt="vote 2 star" name="star1" value="2" type="radio">
    <input alt="vote 3 star" name="star1" value="3" type="radio">
    <input alt="vote 4 star" name="star1" value="4" type="radio">
    <input alt="vote 5 star" name="star1" value="5" checked="checked" type="radio">
	'.JText::_('Best').'
 </span> 
 	</div> 
	';
	
if($useComment2){
$html .=' <div>
		<label for="commentrating">'.JText::_('star2').'</label>
    <span class="content_vote">
	'.JText::_('Poor').'
    <input alt="vote 1 star" name="star2" value="1" type="radio">
    <input alt="vote 2 star" name="star2" value="2" type="radio">
    <input alt="vote 3 star" name="star2" value="3" type="radio">
    <input alt="vote 4 star" name="star2" value="4" type="radio">
    <input alt="vote 5 star" name="star2" value="5" checked="checked" type="radio">
	'.JText::_('Best').'
 </span> 
 	</div>
	';  
}	

if($useComment3){
$html .=' <div>
		<label for="commentrating">'.JText::_('star3').'</label>
    <span class="content_vote">
	'.JText::_('Poor').'
    <input alt="vote 1 star" name="star3" value="1" type="radio">
    <input alt="vote 2 star" name="star3" value="2" type="radio">
    <input alt="vote 3 star" name="star3" value="3" type="radio">
    <input alt="vote 4 star" name="star3" value="4" type="radio">
    <input alt="vote 5 star" name="star3" value="5" checked="checked" type="radio">
	'.JText::_('Best').'
 </span> 
 	</div>
	';  
}

if($useComment4){
$html .=' <div>
		<label for="commentrating">'.JText::_('star4').'</label>
    <span class="content_vote">
	'.JText::_('Poor').'
    <input alt="vote 1 star" name="star4" value="1" type="radio">
    <input alt="vote 2 star" name="star4" value="2" type="radio">
    <input alt="vote 3 star" name="star4" value="3" type="radio">
    <input alt="vote 4 star" name="star4" value="4" type="radio">
    <input alt="vote 5 star" name="star4" value="5" checked="checked" type="radio">
	'.JText::_('Best').'
 </span> 
 	</div>
	';  
}

if($useComment2){
$html .=' <div>
		<label for="commentrating">'.JText::_('star5').'</label>
    <span class="content_vote">
	'.JText::_('Poor').'
    <input alt="vote 1 star" name="star5" value="1" type="radio">
    <input alt="vote 2 star" name="star5" value="2" type="radio">
    <input alt="vote 3 star" name="star5" value="3" type="radio">
    <input alt="vote 4 star" name="star5" value="4" type="radio">
    <input alt="vote 5 star" name="star5" value="5" checked="checked" type="radio">
	'.JText::_('Best').'
 </span> 
 	</div>
	';  
}
	$html .='<div>
		<label for="commentcomment">'.JText::_("Comment").'</label>
	<textarea  name="commentcomment" cols="40" rows="6" value="'.$comment.'" class="inputbox required" id="commentcomment"></textarea>
	</div>    
	<div>
    <p>
	<input class="button validate" id="addComment" name="addComment" value="'.JText::_("Add Comment").'"  type="button" on onclick="AddCommentAjax();return false;" />
	</p></div>
		<input name="productid" id="productid" value="'.$productid.'" type="hidden">		
	</form>
	</div>
	</div>
	';

	}else{
	if ($model->store($post,'comments')) {	
	$html = '<div class="comment_added">';
	$html .= JText::_('Review send');
	$html .= '</div>';
	$html .= '<div class="post box">';
	$html .= '<b>'.JText::_("Name").' : '.$name.' </b><br />';
    $html .= JText::_("Title").' : '.$title.'<br />';
	$html .= JText::_("Comment").' : '.$comment.'<br />';
	$html .= '</div> ';
	
	$this->SendMailComment($post);
	}else{
	
	$html .= "<div class=\"comment_error\">";
	$html .= JText::_('Error Undefined');
	$html .= "</div> ";
	
	}
	}
	
	echo $html;
	}







function SendMailComment($post)
	{
		global $mainframe;		
		$component = JComponentHelper::getComponent( 'com_properties' );
		$params = new JParameter( $component->params );
		
		$mail_contacto=$params->get('mail_consulta');

		$send_to = $mail_contacto;
		
		$db		=& JFactory::getDBO();

	$id = $post['id'];
	$productid = $post['productid'];
	$name = $post['name'];
	$email =  $post['email'];
	$title =  $post['title'];
	$comment =  $post['comment']; 		
			
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
$send_to=$mailfrom;	
		$siteURL		= JURI::base();
	
$query = 	"SELECT * from #__properties_products where id = ".$productid;
$db->setQuery( $query );				
$product = $db->loadObject();		

$body = JText::_( 'Review Added');
$body .= JText::_( 'Review Added by').' : '. $name	.'<br>';
$body .= JText::_('Email').' : '.$email.'<br>';
$body .= JText::_('Tittle').' : '.$title.'<br>';
$body .= JText::_('Review').' : '.$comment.'<br>';
		
		$body = html_entity_decode($body, ENT_QUOTES);
		
		$subject = $sitename.' : '.JText::_( 'Review Added');


/*
$ContactMailFormat=$params->get('ContactMailFormat',0);
if($ContactMailFormat==1){
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'contact'.DS.'example_html.php');	
}else{
$headers  = '';
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'contact'.DS.'example_txt.php');
}
*/
/*
$nombre_archivo1 = 'components\com_fproperties\consult_mail.html';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= "\n".$body;
fwrite($gestor1, $contenido1);
*/


		JUtility::sendMail($email, $name, $send_to, $subject, $body, $headers);	
			
	//	JUtility::sendMail($email, $name, 'admin@com-property.com', $subject, $body_html, $headers);
$emailCopy	= 1;	

	
		if($emailCopy == 1){
		
		
		$body = JText::_( 'Review Added');
$body .= JText::_( 'Sr').' : '. $name	.'<br>';
$body .= JText::_( 'Thanks Review Added').'<br>';
$body .= JText::_('Tittle').' : '.$title.'<br>';
$body .= JText::_('Review').' : '.$comment.'<br>';
		
		$body = html_entity_decode($body, ENT_QUOTES);
		
		
			JUtility::sendMail($mailfrom, $fromname, $email, $subject, $body,$headers);
		}	

		
	}
	
	
	
	
	
	
	
	
	



	
}