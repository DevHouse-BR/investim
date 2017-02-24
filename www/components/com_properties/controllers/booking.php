<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class PropertiesControllerBooking extends JController
{	 
	function __construct()
	{
		parent::__construct();			
		$this->registerTask( 'apply',	'save' );			
		$this->TableName = JRequest::getCmd('table');		
	}	
	
	
	function availability ()
	{	
	$id=JRequest::getVar('id');
		
	$db 	=& JFactory::getDBO();	
	
	$query = 'SELECT * FROM #__properties_available_product '
		. ' WHERE id_product = '. $id
		. ' AND published = 1 '
		. ' ORDER BY week '
		;
		
		$db->setQuery( $query );
		$datos = $db->loadObjectList();
		
		?>
<form target="_blank" action="<?php echo JRoute::_('index.php?option=com_properties&view=booking'); ?>" name="adminForm" class="form-validate" id="adminForm" method="post">
<input type="hidden" name="option" value="com_properties" />
<input type="hidden" name="controller" value="booking" />
<input type="hidden" name="view" value="booking" />
<input type="hidden" name="task" value="send_reservation" />
<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="hidden" name="weeks" id="weeks" value="1" />
<input type="hidden" name="week_id" id="week_id" value="" />
<input type="hidden" name="sd" id="sd" value="" />
        <table border="1">
        <tr>
        <td>Semana</td><td>From</td><td>To</td><td>R</td>
        </tr>
        
        <?php
		foreach($datos as $d)
		{
			$dato[] = $d;
			echo '<tr><td>'.$d->week.'</td><td>'.date('d/m/Y', strtotime($d->from)).'</td><td>'.date('d/m/Y', strtotime($d->to)).'</td><td><button class="button" type="submit" onclick="javascript: document.adminForm.week_id.value='.$d->week.'; document.adminForm.sd.value=\''.date('d/m/Y', strtotime($d->from)).'\'; submitform();return false;">'.JText::_('Reserve').'</button> </td></tr>';		
			
		}
		?>
		</table>
        </form>		

<?php
		
	}
	
	
	
	
	
	
	
	
	
	function booking()	
	{
		/*
		JRequest::setVar( 'view', 'booking' );		
		JRequest::setVar( 'layout', NULL );		
		*/
		global $mainframe;
if(JRequest::getVar('fechaD')){$sd=JRequest::getVar('fechaD');}
if(JRequest::getVar('fechaA')){$ed=JRequest::getVar('fechaA');}
if(JRequest::getVar('price')){$price=JRequest::getVar('price');}	
if(JRequest::getVar('duration')){$duration=JRequest::getVar('duration');}	


$post_rate =  JRequest::getVar( 'rate','','post' );

		if($post_rate){
		$rate=$post_rate;
		
		//echo 'rate'.$rate;
		
		$db 	=& JFactory::getDBO();	
	
	$query = 'SELECT * FROM #__properties_rates '
		. ' WHERE id = '. $rate
		;
		
		$db->setQuery( $query );
		$ThisRate = $db->loadObject();
		
	//	print_r($ThisRate);
		$sd=$ThisRate->validfrom;
		JRequest::setVar( 'fechaD', $sd );	
		$ed=$ThisRate->validto;
		JRequest::setVar( 'fechaA', $ed );	
		$priceweek=$ThisRate->rateperweek;
		JRequest::setVar( 'priceweek', $priceweek );	
		}
		
		if(JRequest::getVar('id')){
		$product_id=JRequest::getVar('id');
		$db 	=& JFactory::getDBO();
				
$totalPrice=0;		
		
		$selected=explode('-',$sd);
$year_select=$selected[0];
$month_select=$selected[1];
$day_select=$selected[2];

for($x=0;$x<$duration;$x++){

$array_date_select[$x]  = date('Y-m-d',mktime(0, 0, 0, $month_select, $day_select+$x, $year_select));	

$query = 'SELECT * FROM #__properties_rates '
		. ' WHERE productid = '. $product_id
		. ' AND validfrom <= "'.$array_date_select[$x].'" AND validto >= "'.$array_date_select[$x].'"'
		;	
	
//echo $query;
		$db->setQuery( $query );
		$ThisRates = $db->loadObject();
		//print_r($ThisRates);	
		$totalPrice+=$ThisRates->rateperday;
}				
		
		}		


if($duration){
$sdD = explode('-',$sd);
$desde=$sdD[2].$sdD[1].$sdD[0];
$ed=date('Y-m-d',mktime(0, 0, 0, $sdD[1], $sdD[2]+$duration, $sdD[0]));
}

//echo 'from: '.$sd.' to : '.$ed.' price : '.$totalPrice.$priceweek;

JRequest::setVar( 'sd', $sd );	
JRequest::setVar( 'ed', $ed );
JRequest::setVar( 'totalPrice', $totalPrice );

		//require('aa');
	
		parent::display();
		
	}
	
	
	function confirm_booking()	
	{
	
	
	global $mainframe;		
		$component = JComponentHelper::getComponent( 'com_properties' );
		$params = new JParameter( $component->params );
		$mail_contact=$params->get('mail_contact');	
		$currencyformat=$params->get('FormatPrice');
		$PositionPrice=$params->get('PositionPrice');
		$SimbolPrice=$params->get('SimbolPrice');

		$send_to = $mail_contact;
		
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );


		if(!$send_to){$send_to=$mailfrom;}
		
		
		
		$db		=& JFactory::getDBO();
		
		$post = JRequest::get( 'post' );
		
		$ob_adults =  JRequest::getVar( 'ob_adults','','post' );
		$ob_boys =  JRequest::getVar( 'ob_boys','','post' );
		$ob_babies =  JRequest::getVar( 'ob_babies','','post' );
		
		$name =  JRequest::getVar( 'name','','post' );
 		$email =  JRequest::getVar( 'email','','post' );
 		$phone =  JRequest::getVar( 'phone','','post' );
 		$address =  JRequest::getVar( 'address','','post' );
 		$city =  JRequest::getVar( 'city','','post' );
 		$state =  JRequest::getVar( 'state','','post' );
 		$cp =  JRequest::getVar( 'cp','','post' );
 		$text =  JRequest::getVar( 'text','','post' );
		$sd =  JRequest::getVar( 'sd','','post' );
		$ed =  JRequest::getVar( 'ed','','post' );
		
if(JRequest::getVar( 'price','','post' ))
	{
	$totalPrice=JRequest::getVar( 'price','','post' );
	}else{
	$totalPrice=JRequest::getVar( 'priceweek','','post' );
	}
//echo $totalPrice;

 $product_id =  JRequest::getVar( 'id','','post' );
if($product_id){

$query = 	"SELECT * from #__properties_products where id = ".$product_id;
$db->setQuery( $query );				
$product = $db->loadObject();
$producttype=JText::_('Product');
$productname=$product->name;
}


		
		
		$siteURL		= JURI::base();
		
		
		// Captcha Controller Patch rev. 4.5.0 Stable
		$dispatcher	= &JDispatcher::getInstance();
		$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.contact' ) );
		if ( $results[0] ) {
			$captchaparams = array( JRequest::getVar( 'captchacode', '', 'post' )
			, JRequest::getVar( 'captchasuffix', '', 'post' )
			, JRequest::getVar( 'captchasessionid', '', 'post' ));
			$results = $dispatcher->trigger( 'onCaptchaVerify', $captchaparams );
			if ( ! $results[0] ) {
				JError::raiseWarning( 'CAPTHCA', JText::_( 'CAPTCHACODE_DO_NOT_MATCH' ) );
				$link = JRoute::_('index.php?option=com_hemeroteca&view=form1&Itemid='.$Itemid,false);
				$this->setRedirect($link, $msg);
				
				return false;
			}
		}
		/*
		echo '<pre>';
		print_r($post);
		echo '</pre>';
		*/






$subject = $sitename.' : '.JText::_( 'Booking Form');

$ContactMailFormat=$params->get('ContactMailFormat',1);


$mail_to_admin=1;
if($ContactMailFormat==1){
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'booking'.DS.'admin_html.php');	
}else{
$headers  = '';
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'booking'.DS.'example_txt.php');
}

JUtility::sendMail($mailfrom, $fromname, $send_to, $subject, $body_html, $headers);

		
		
$nombre_archivo1 = 'components\com_properties\booking.htm';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 = "\n".$body_html;
fwrite($gestor1, $contenido1);




$mail_to_admin=0;

if($ContactMailFormat==1){
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'booking'.DS.'copy_html.php');	
}else{
$headers  = '';
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'booking'.DS.'example_txt.php');
}

JUtility::sendMail($mailfrom, $fromname, $email, $subject, $body_html,$headers);


$nombre_archivo1 = 'components\com_properties\booking_copy.htm';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 = "\n".$body_html;
fwrite($gestor1, $contenido1);


$link =  JRequest::getVar( 'returnbook','','post' );


//$link = LinkHelper::getLink('property','','',$row->CYslug,$row->Sslug,$row->Lslug,$row->Cslug,$row->Tslug,$product_id);

$msg=JText::_('Booking Confirmed');
//$link = JRoute::_('index.php?option=com_properties&view=property&cid=0&tid=0&id='.$product_id,false);
		$this->setRedirect($link, $msg);
/*
echo $body_html;		
	require('aa');
*/	
	
	
	}
	
	function confirmar_reserva()
	{
	global $mainframe;
	$linkid 	= JRequest::getVar( 'linkid','','post' );
		$linkcatid  = JRequest::getVar( 'linkcatid','','post' );
		$linktypeid  = JRequest::getVar( 'linktypeid','','post' );
	
/*	
	// Captcha Controller Patch rev. 4.5.0 Stable
		$dispatcher	= &JDispatcher::getInstance();
		$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.contact' ) );
		if ( $results[0] ) {
			$captchaparams = array( JRequest::getVar( 'captchacode', '', 'post' )
			, JRequest::getVar( 'captchasuffix', '', 'post' )
			, JRequest::getVar( 'captchasessionid', '', 'post' ));
			$results = $dispatcher->trigger( 'onCaptchaVerify', $captchaparams );
			if ( ! $results[0] ) {
				JError::raiseWarning( 'CAPTHCA', JText::_( 'CAPTCHACODE_DO_NOT_MATCH' ) );
				$link = JRoute::_('index.php?option=com_properties&view=apartment&cid='.$linkcatid.'&tid='.$linktypeid.'&id='.$linkid,false);
				$this->setRedirect($link, $msg);
				
				return false;
			}
		}
*/		
	
	

		
		
			
		
		
	$user =& JFactory::getUser();
	jimport('joomla.filesystem.folder');
	$this->TableName = 'order_bookings';
	$model = $this->getModel('booking');	
				
$post = JRequest::get( 'post' );
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$AutoCoord=$params->get('AutoCoord',0);


$db 	=& JFactory::getDBO();
require_once(JPATH_SITE.DS.'configuration.php');
$datos = new JConfig();	
$basedatos = $datos->db;

$query = "SHOW TABLE STATUS FROM ".$basedatos." LIKE 'jos_properties_order_bookings';";
		$db->setQuery( $query );		
		$nextAutoIndex = $db->loadObject();

if(JRequest::getCmd('id_order_bookings')){ $id_order_bookings = JRequest::getCmd('id_order_bookings');}
else{$id_order_bookings = $nextAutoIndex->Auto_increment;}

$sd=$post['sd'];
$ed=$post['ed'];
$sdD = explode('/',$sd);
$desde=$sdD[2].'-'.$sdD[1].'-'.$sdD[0];
$edD = explode('/',$ed);
$hasta=$edD[2].'-'.$edD[1].'-'.$edD[0];
//$timestamp1 = mktime(0, 0, 0, $sdD[1], $sdD[0], $sdD[2]);
//$timestamp2 = mktime(0, 0, 0, $edD[1], $edD[0], $edD[2]); 
$diferencia = $timestamp2 - $timestamp1;
$dias=($diferencia/86400)+1;

$datenow =& JFactory::getDate();
$date_created = $datenow->toFormat("%Y-%m-%d");

$post['user_created']=$user->id;
$post['ob_mail']=$post['email'];
$post['date_created']=$datenow->toFormat("%Y-%m-%d");
$post['date_from']=$desde;
$post['date_to']=$hasta;





if( $post['form_id_week']){
$w = $post['form_id_week'];
echo 'total : '.count($w).'<br><br>';
$z=0;
foreach($w as $item) {
$z++;

$booking[$z]->ob_weekid=$item;
$booking[$z]->date_from=$post['sdw'][$item];
$booking[$z]->date_to=$post['edw'][$item];
$booking[$z]->price=$post['price'][$item];

$this->ob_weekid=$item;
$this->date_from=$post['sdw'][$item];
$this->date_to=$post['edw'][$item];
$this->ob_price=$post['price'][$item];
$post['ob_weekid']=$item;
$post['date_from']=$post['sdw'][$item];
$post['date_to']=$post['edw'][$item];
$post['ob_price']=$post['price'][$item];



if ($model->store($post,$this->TableName)) {	
}
$LastModif = $model->getLastModif();




$book['bid_order']=$LastModif;
$book['bid_property']=$post['id_property'];
$book['bdate']=date('Y-m-d');
$book['bid_week']=$item;

$model->store($book,'bookings');	
		
//$booking['bdate']=date('Y-m-d',mktime(0, 0, 0, $sdD[1],   $sdD[0]+$i,   $sdD[2]));


} 
}else{
if($post['form_id_week_1']){
$w_1 = $post['form_id_week_1'];
$z=0;
$type=1;
$price=0;$this_price=0;$booking_selected='';
$bookinRecidence=array();
foreach($w_1 as $item) {
$z++;
$booking1[$z]['ob_weekid']=$item;
$booking1[$z]['date_from']=$post['sdw'][$item];
$booking1[$z]['date_to']=$post['edw'][$item];
$booking1[$z]['price']=$post['price'][$type][$item];
$booking1[$z]['ob_type']=$type;



echo '<br>pppp  :  '.$post['price'][$type][$item]. '<br>';

$d= date('d-m-Y', strtotime($booking1[$z]['date_from']));
$h= date('d-m-Y', strtotime($booking1[$z]['date_to']));
$price=$price+$booking1[$z]['price'];
$this_price=$this_price+$booking1[$z]['price'];
$booking_selected.='MONO : '.$d.'/'.$h.'   ';


}
$bookinRecidence[1]['price']=$this_price;
$bookinRecidence[1]['booking_selected']=$booking_selected;
}
print_r($bookinRecidence[1]);


if($post['form_id_week_2']){
$w_2 = $post['form_id_week_2'];
$z=0;
$type=2;
$this_price=0;$booking_selected='';
foreach($w_2 as $item) {
$z++;
$booking2[$z]['ob_weekid']=$item;
$booking2[$z]['date_from']=$post['sdw'][$item];
$booking2[$z]['date_to']=$post['edw'][$item];
$booking2[$z]['price']=$post['price'][$type][$item];
$booking2[$z]['ob_type']=$type;

echo '<br>pppp  :  '.$post['price'][$type][$item]. '<br>';

$d= date('d-m-Y', strtotime($booking2[$z]['date_from']));
$h= date('d-m-Y', strtotime($booking2[$z]['date_to']));
$price=$price+$booking2[$z]['price'];
$this_price=$this_price+$booking2[$z]['price'];
$booking_selected.='BILO : '.$d.'/'.$h.'   ';


}
$bookinRecidence[2]['price']=$this_price;
$bookinRecidence[2]['booking_selected']=$booking_selected;
}
print_r($bookinRecidence[2]);



if($post['form_id_week_3']){
$w_3 = $post['form_id_week_3'];
$z=0;
$type=3;
$this_price=0;$booking_selected='';
foreach($w_3 as $item) {
$z++;
$booking3[$z]['ob_weekid']=$item;
$booking3[$z]['date_from']=$post['sdw'][$item];
$booking3[$z]['date_to']=$post['edw'][$item];
$booking3[$z]['price']=$post['price'][$type][$item];
$booking3[$z]['ob_type']=$type;

echo '<br>pppp  :  '.$post['price'][$type][$item]. '<br>';

$d= date('d-m-Y', strtotime($booking3[$z]['date_from']));
$h= date('d-m-Y', strtotime($booking3[$z]['date_to']));
$price=$price+$booking3[$z]['price'];
$this_price=$this_price+$booking3[$z]['price'];
$booking_selected.='TRILO : '.$d.'/'.$h.'   ';

}
$bookinRecidence[3]['price']=$this_price;
$bookinRecidence[3]['booking_selected']=$booking_selected;
}
print_r($bookinRecidence[3]);



if($post['form_id_week_4']){
$w_4 = $post['form_id_week_4'];
$z=0;
$type=4;
$this_price=0;$booking_selected='';
foreach($w_4 as $item) {
$z++;
$booking4[$z]['ob_weekid']=$item;
$booking4[$z]['date_from']=$post['sdw'][$item];
$booking4[$z]['date_to']=$post['edw'][$item];
$booking4[$z]['price']=$post['price'][$type][$item];
$booking4[$z]['ob_type']=$type;

echo '<br>pppp  :  '.$post['price'][$type][$item]. '<br>';

$d= date('d-m-Y', strtotime($booking4[$z]['date_from']));
$h= date('d-m-Y', strtotime($booking4[$z]['date_to']));
$price=$price+$booking4[$z]['price'];
$this_price=$this_price+$booking4[$z]['price'];
$booking_selected.='QUATRILO : '.$d.'/'.$h.'   ';


}

$bookinRecidence[4]['price']=$this_price;
$bookinRecidence[4]['booking_selected']=$booking_selected;
}
print_r($bookinRecidence[4]);
echo 'price: '.$price. '<br>';

$bookinRecidence[5]['price']=$price;
$bookinRecidence[5]['booking_selected']='';


}

$week_send=0;
	if($booking[1]->ob_weekid)
			{
			$week_send=1;			
			$msg = $this->mail_confirmar_reserva($booking);
			$link = JRoute::_('index.php?option=com_properties&view=apartment&cid='.$linkcatid.'&tid='.$linktypeid.'&id='.$linkid,false);		
			$this->setRedirect($link, $msg);
			
	}else{
	
	if($bookinRecidence){
	$week_send=1;	
	$msg = $this->mail_confirmar_reserva_recidence($bookinRecidence);
	$link = JRoute::_('index.php?option=com_properties&view=apartment&cid='.$linkcatid.'&tid='.$linktypeid.'&id='.$linkid,false);		
			$this->setRedirect($link, $msg);
	}
	
	//JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
	//$week_send=1;
	
	}

if($week_send!=1){

JError::raiseWarning( 'Booking', JText::_('Week not Selected') );
	
		$link = JRoute::_('index.php?option=com_properties&view=apartment&cid='.$linkcatid.'&tid='.$linktypeid.'&id='.$linkid,false);
		$this->setRedirect($link, $msg);


}

}


function mail_confirmar_reserva_recidence($bookinRecidence)
	{
		global $mainframe;
		$db		=& JFactory::getDBO();
		$post = JRequest::get( 'post' );
		
		$productoId	= JRequest::getInt( 'id_property',0,'post' );
		$agent_id	= JRequest::getInt( 'agent_id',0,'post' );
		$linkid 	= JRequest::getVar( 'linkid','','post' );
		$linkcatid  = JRequest::getVar( 'linkcatid','','post' );
		$linktypeid  = JRequest::getVar( 'linktypeid','','post' );
		$name		= JRequest::getVar( 'name','','post' );
		$email		= JRequest::getVar( 'email','','post' );
		$subject	= JRequest::getVar( 'subject',$default,'post' );
		$body		= JRequest::getVar( 'text','','post' );
		$emailCopy	= JRequest::getInt( 'email_copy',0,'post' );		
		$titulo		= JRequest::getVar( 'titulo','','post' );		
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		//$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$Sitename 		= $mainframe->getCfg( 'fromname' );
		$siteURL		= JURI::base();		
		$body = html_entity_decode($body, ENT_QUOTES);		
		$query = 'SELECT name, email, sendEmail' .
				' FROM #__users' .
				' WHERE id = '.$agent_id;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();		
			$fromname = $rows[0]->name;
			$mailfrom = $rows[0]->email;
			
			
		$subject = JText::_( 'MAIL_RESERVATION_SUBJET');		
		$body = JText::_( 'MAIL_RESERVATION_BODY_AGENT');	
		$body .= JText::_( 'MAIL_RESERVATION_BODY' ).' '.$productoId.' '.	
		"\n".JText::_( 'MAIL_RESERVATION_TITLE' ).$titulo.' . '.
		"\n".JText::_('link').
		"\n".$_SERVER['HTTP_REFERER'] ."\n".JText::_('administration').
		"\n".JURI::base().'administrator/index.php?option=com_properties&view=apartments&task=edit&id_product='.$productoId.
		"\n";
		

if($bookinRecidence[1]){
echo "\n".JText::_( 'MAIL_RESERVATION_FROM').$bookinRecidence[1]['booking_selected'].'<br>';
echo "\n".JText::_( 'MAIL_RESERVATION_PRICE').$bookinRecidence[1]['price'].'<br>';
$body2 .= "\n".JText::_( 'MAIL_RESERVATION_FROM').$bookinRecidence[1]['booking_selected']."\n";
$body2 .= "\n".JText::_( 'MAIL_RESERVATION_PRICE').$bookinRecidence[1]['price']."\n";
}	

if($bookinRecidence[2]){
echo "\n".JText::_( 'MAIL_RESERVATION_FROM').$bookinRecidence[2]['booking_selected'].'<br>';
echo "\n".JText::_( 'MAIL_RESERVATION_PRICE').$bookinRecidence[2]['price'].'<br>';
$body2 .= "\n".JText::_( 'MAIL_RESERVATION_FROM').$bookinRecidence[2]['booking_selected']."\n";
$body2 .= "\n".JText::_( 'MAIL_RESERVATION_PRICE').$bookinRecidence[2]['price']."\n";

}

if($bookinRecidence[3]){
echo "\n".JText::_( 'MAIL_RESERVATION_FROM').$bookinRecidence[3]['booking_selected'].'<br>';
echo "\n".JText::_( 'MAIL_RESERVATION_PRICE').$bookinRecidence[3]['price'].'<br>';
$body2 .= "\n".JText::_( 'MAIL_RESERVATION_FROM').$bookinRecidence[3]['booking_selected']."\n";
$body2 .= "\n".JText::_( 'MAIL_RESERVATION_PRICE').$bookinRecidence[3]['price']."\n";

}

if($bookinRecidence[4]){
echo "\n".JText::_( 'MAIL_RESERVATION_FROM').$bookinRecidence[4]['booking_selected'].'<br>';
echo "\n".JText::_( 'MAIL_RESERVATION_PRICE').$bookinRecidence[4]['price'].'<br>';
$body2 .="\n".JText::_( 'MAIL_RESERVATION_FROM').$bookinRecidence[4]['booking_selected']."\n";
$body2 .="\n".JText::_( 'MAIL_RESERVATION_PRICE').$bookinRecidence[4]['price']."\n";

}

if($bookinRecidence[5]){
echo "\n".JText::_( 'MAIL_RESERVATION_PRICE_TOTAL').$bookinRecidence[5]['price'].'<br>';
$body2 .="\n".JText::_( 'MAIL_RESERVATION_PRICE_TOTAL').$bookinRecidence[5]['price']."\n";
}

	
		$body .=$body2;
		$body .="\n".JText::_( 'MAIL_RESERVATION_FROM').$booking_selected.
		//"\n".JText::_( 'MAIL_RESERVATION_TO').$hasta.
		"\n".JText::_( 'MAIL_RESERVATION_PRICE').$price.				
		"\n".JText::_( 'MAIL_RESERVATION_FORM_ADULTS' ).$post['ob_adults'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_BOYS' ).$post['ob_boys'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_BABIES' ).$post['ob_babies'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_NAME' ).$post['ob_name'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_LASTNAME' ).$post['ob_lastname'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_ADDRESS' ).$post['ob_address'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_LOCALITY' ).$post['ob_locality'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_COUNTRY' ).$post['ob_country'].		
		"\n".JText::_( 'MAIL_RESERVATION_FORM_PHONE' ).$post['ob_phone'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_NOTE' ).$post['ob_note'];
		$body .= "\n".' '.
		"\n".JText::_( 'MAIL_RESERVATION_EMAIL').' '.$email;
		
		$emailPublicador = $rows[0]->email;
		
$body_test=$body;


$body = '';

		$subject = JText::_( 'MAIL_RESERVATION_SUBJET');				
		$body = JText::_( 'MAIL_RESERVATION_BODY' ).$productoId.		
		"\n".JText::_( 'MAIL_RESERVATION_TITLE' ).$titulo.' . ';			
		
		$body .= $body2;		
		
		$body .= "\n".JText::_( 'MAIL_RESERVATION_PRICE').$price.
		"\n".JText::_( 'RESERVATION_ANSWER' ).
		"\n".JText::_( 'MAIL_RESERVATION_THANKS');







JUtility::sendMail($email, $Sitename, $emailPublicador, $subject, $body_test);

JUtility::sendMail($emailPublicador, $Sitename, $email, $subject, $body);
				
JUtility::sendMail($email, $Sitename, 'fabiouz@gmail.com', $subject, $body);	
		
JUtility::sendMail('remitente@yono.com', '$Sitename body test', 'fabiouz@gmail.com', $subject, $body_test);	






$nombre_archivo1 = 'components\com_properties\mail.htm';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= "\n".$body_test;
$contenido1 .=	"\n--------------------------<br><br><br><br><br><br><br><br><br>";
$contenido1 .= "\n".$body;
fwrite($gestor1, $contenido1);


$msg=JText::_('Reservation Send').' '.$body2;


return $msg;


}


function mail_confirmar_reserva($booking)
	{
		global $mainframe;
		$db		=& JFactory::getDBO();
		$post = JRequest::get( 'post' );
		
		$productoId	= JRequest::getInt( 'id_property',0,'post' );
		$agent_id	= JRequest::getInt( 'agent_id',0,'post' );
		$linkid 	= JRequest::getVar( 'linkid','','post' );
		$linkcatid  = JRequest::getVar( 'linkcatid','','post' );
		$linktypeid  = JRequest::getVar( 'linktypeid','','post' );
		$name		= JRequest::getVar( 'name','','post' );
		$email		= JRequest::getVar( 'email','','post' );
		$subject	= JRequest::getVar( 'subject',$default,'post' );
		$body		= JRequest::getVar( 'text','','post' );
		$emailCopy	= JRequest::getInt( 'email_copy',0,'post' );		
		$titulo		= JRequest::getVar( 'titulo','','post' );		
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		//$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$Sitename 		= $mainframe->getCfg( 'fromname' );
		$siteURL		= JURI::base();		
		$body = html_entity_decode($body, ENT_QUOTES);		
		$query = 'SELECT name, email, sendEmail' .
				' FROM #__users' .
				' WHERE id = '.$agent_id;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();		
			$fromname = $rows[0]->name;
			$mailfrom = $rows[0]->email;		

/*
$z=0;
foreach($booking as $b) {
$week[$z]=$b[$z]['ob_weekid'];
$from[$z]=$b[$z]['date_from'];
$to[$z]=$b[$z]['date_to'];
$price[$z]=$b[$z]['price'];
$z++;
}
*/

//print_r($booking);
//echo '<br>tot: '.count($booking);
$z=0;$price=0;
foreach($booking as $b) {
$z++;
//echo '<br>: '.$z;
//echo '<br>'.$b->ob_weekid.'  ';
//echo '<br>'.$b->date_from.'  ';
//echo '<br>'.$b->date_to.'  ';
//echo '<br>'.$b->price.'  ';
//print_r($b);

$d= date('d-m-Y', strtotime($b->date_from));
$h= date('d-m-Y', strtotime($b->date_to));
$price=$price+$b->price;
$booking_selected.=$d.'/'.$h.'   ';
}

//JError::raiseWarning( 'Booking', $booking_selected );
$desde= date('d-m-Y', strtotime($booking['date_from']));
$hasta= date('d-m-Y', strtotime($booking['date_to']));
			
		$subject = JText::_( 'MAIL_RESERVATION_SUBJET');		
		$body = JText::_( 'MAIL_RESERVATION_BODY_AGENT');	
		$body .= JText::_( 'MAIL_RESERVATION_BODY' ).' '.$productoId.' '.	
		"\n".JText::_( 'MAIL_RESERVATION_TITLE' ).$titulo.' . '.
		"\n".JText::_('link').
		"\n".$_SERVER['HTTP_REFERER'] ."\n".JText::_('administration').
		"\n".JURI::base().'administrator/index.php?option=com_properties&view=apartments&task=edit&id_product='.$productoId.
		"\n".
		"\n".JText::_( 'MAIL_RESERVATION_FROM').$booking_selected.
		//"\n".JText::_( 'MAIL_RESERVATION_TO').$hasta.
		"\n".JText::_( 'MAIL_RESERVATION_PRICE').$price.				
		"\n".JText::_( 'MAIL_RESERVATION_FORM_ADULTS' ).$post['ob_adults'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_BOYS' ).$post['ob_boys'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_BABIES' ).$post['ob_babies'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_NAME' ).$post['ob_name'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_LASTNAME' ).$post['ob_lastname'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_ADDRESS' ).$post['ob_address'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_LOCALITY' ).$post['ob_locality'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_COUNTRY' ).$post['ob_country'].		
		"\n".JText::_( 'MAIL_RESERVATION_FORM_PHONE' ).$post['ob_phone'].
		"\n".JText::_( 'MAIL_RESERVATION_FORM_NOTE' ).$post['ob_note'];
		$body .= "\n".' '.
		"\n".JText::_( 'MAIL_RESERVATION_EMAIL').' '.$email;
		
		$emailPublicador = $rows[0]->email;
		
$body_test=$body;

//		
			
		$subject = JText::_( 'MAIL_RESERVATION_SUBJET');				
		$body = JText::_( 'MAIL_RESERVATION_BODY' ).$productoId.		
		"\n".JText::_( 'MAIL_RESERVATION_TITLE' ).$titulo.' . '.
		"\n".JText::_( 'MAIL_RESERVATION_FROM').$booking_selected.
		//"\n".JText::_( 'MAIL_RESERVATION_TO').$hasta.
		"\n".JText::_( 'MAIL_RESERVATION_PRICE').$price.
		"\n".JText::_( 'RESERVATION_ANSWER' ).
		"\n".JText::_( 'MAIL_RESERVATION_THANKS');

JUtility::sendMail($email, $Sitename, $emailPublicador, $subject, $body_test);

JUtility::sendMail($emailPublicador, $Sitename, $email, $subject, $body);
				
JUtility::sendMail($email, $Sitename, 'fabiouz@gmail.com', $subject, $body);	
		
JUtility::sendMail('remitente@yono.com', '$Sitename body test', 'fabiouz@gmail.com', $subject, $body_test);			

		$msg=JText::_('Reservation Send').' '.$booking_selected;
		
$nombre_archivo1 = 'components\com_properties\mail.htm';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= "\n".$body_test;
$contenido1 .=	"\n--------------------------<br><br><br><br><br><br><br><br><br>";
$contenido1 .= "\n".$body;
fwrite($gestor1, $contenido1);




return $msg;


	}
	




/*
$nombre_archivo1 = 'components\com_properties\fabio_coord.txt';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= "\n".$coord;
$contenido1 .= "\n".$file;
fwrite($gestor1, $contenido1);
*/

		





}