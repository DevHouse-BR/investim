<?php

 $product_id =  JRequest::getVar( 'id','','post' );
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
 $userfile =  JRequest::getVar( '','','post' );
 $emailCopy	= JRequest::getInt( 'email_copy',0,'post' );
		$sd =  JRequest::getVar( 'sd','','post' );
		$sd =  date('d/m/Y', strtotime($sd));
		$ed =  JRequest::getVar( 'ed','','post' );
		$ed =  date('d/m/Y', strtotime($ed));
	if(JRequest::getVar( 'price','','post' ))
	{
	$totalPrice=JRequest::getVar( 'price','','post' );
	}else{
	$totalPrice=JRequest::getVar( 'priceweek','','post' );
	}	

		
		
if($totalPrice!=0){
$number = $totalPrice;
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
$totalPrice = $SimbolPrice.' '. $formatted_price; 
}else{
$totalPrice = $formatted_price .' '. $SimbolPrice;
}
}

$body = '<table>';

if($sd){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Form').'</td>
<td class="field_send">'.$sd.'</td>
</tr>';
}

if($ed){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'To').'</td>
<td class="field_send">'.$ed.'</td>
</tr>';
}

if($totalPrice){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Total Price').'</td>
<td class="field_send">'.$totalPrice.'</td>
</tr>';
}


if($product_id){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.$producttype.' </td>
<td class="field_send">'.$productname.'</td>
</tr>';
}
if($ob_adults){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Adults').'</td>
<td class="field_send">'.$ob_adults.'</td>
</tr>';
}
if($ob_boys){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Boys').'</td>
<td class="field_send">'.$ob_boys.'</td>
</tr>';
}
if($ob_babies){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Babies').'</td>
<td class="field_send">'.$ob_babies.'</td>
</tr>';
}
if($name){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Name').'</td>
<td class="field_send">'.$name.'</td>
</tr>';
}
if($email){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Email').'</td>
<td class="field_send">'.$email.'</td>
</tr>';
}
if($phone){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Phone').'</td>
<td class="field_send">'.$phone.'</td>
</tr>';
}
if($address){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Address').'</td>
<td class="field_send">'.$address.'</td>
</tr>';
}
if($city){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'City').'</td>
<td class="field_send">'.$city.'</td>
</tr>';
}
if($state){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'State').'</td>
<td class="field_send">'.$state.'</td>
</tr>';
}
if($cp){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'PC').'</td>
<td class="field_send">'.$cp.'</td>
</tr>';
}
if($text){
$body .='<tr>
<td class="field" style="background:#F1F1F1;">'.JText::_( 'Message').'</td>
<td class="field_send">'.$text.'</td>
</tr>';
}

$body .='</table>';

	if($mail_to_admin==133333){
$body .= '<table>';	
$body .='<tr>
<td class="field" style="background:#F1F1F1;">Ver Formulario :</td>
<td><a href="'.JURI::root().'administrator/index.php?option=com_properties&view=contacts&table=contacts&layout=contacto&id='.$id_archivo.'">Ir al formulario</a></td>
</tr>';
$body .='</table>';	
	}	
	
$body_html='
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Formulario</title>
   <link rel="stylesheet" type="text/css" href="'.JURI::base().'components/com_properties/includes/mail/booking/screen.css">
    <style type="text/css" media="screen">
	
td.mainbar h2 {
   font-family: "Lucida Grande", sans-serif;
   font-size: 16px;
   font-weight: bold;
   color: #a72323;
   margin: 0 0 4px 0;
   padding: 0 0 4px 0;
   border-bottom: 1px solid #cbcbcb;
}

td.mainbar h3 {
   font-family: Georgia, serif;
   font-size: 16px;
   font-weight: normal;
   color: #333333;
   margin: 10px 0 14px 0;
   padding: 0;
}

td.mainbar p {
   font-family: "Lucida Grande", sans-serif;
   font-size: 12px;
   font-weight: normal;
   color: #333333;
   margin: 0 0 16px 0;
   padding: 0;
}

td.mainbar p.top {
   font-family: "Lucida Grande", sans-serif;
   font-size: 10px;
   font-weight: bold;
   color: #a72323;
   margin: 0 0 30px 0;
   padding: 0;
}

td.mainbar p.top a {
   font-family: "Lucida Grande", sans-serif;
   font-size: 10px;
   font-weight: bold;
   color: #a72323;
}

td.field {
	background:#F1F1F1;
	font-family: "Lucida Grande", sans-serif;
   font-size: 12px;
}

td.field_send {
	font-family: "Lucida Grande", sans-serif;
   font-size: 12px;
}

td.footer p {
   font-family: "Lucida Grande", sans-serif;
   font-size: 10px;
   font-weight: normal;
   color: #151515;
}
td.footer a{
   font-family: "Lucida Grande", sans-serif;
   font-size: 10px;
   font-weight: normal;
   color: #151515;
   text-decoration:none;
}
td.footer a:hover{   
   text-decoration:underline;
}
	 </style>
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td align="center">
         
         <table width="550" border="0" cellspacing="0" cellpadding="0">
            
            <tr>
               <td class="header" align="left" valign="bottom">
                  <img src="'.JURI::base().'components/com_properties/includes/mail/booking/header-bg.png" alt="'.JURI::base().'" width="580" height="75" />
               </td>
            </tr>
            <tr>
               <td>
                  <table width="580" height="130" border="0" cellspacing="16" cellpadding="0" class="content">
                     <tr>
                   
                        <td class="mainbar" align="left" valign="top" width="354">
                           <h3>'. JText::_(date("l")) .' '. date("j") .' de '. JText::_(date("F")) .' de '. date("Y") .'</h3>
                           <h2>'.JText::_( 'Booking Form').'</h2>
                          
						   '.$body.'
						                                              
                           
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         <table width="646" border="0" cellspacing="0" cellpadding="0">
            <tr>
               <td><img src="'.JURI::base().'components/com_properties/includes/mail/booking/footer-tail.jpg" alt="'.JURI::base().'" width="646" height="128" /></td>
            </tr>
            <tr>
               <td align="center" class="footer"><p>'.JText::_('CONSULT_BODY_THANKS').' <span>'.JText::_('CONSULT_BODY_LINK').'</span>.<br />'.JText::_('CONSULT_BODY_FOOTER').'</p></td>
            </tr>
         </table>
      </td>
   </tr>
</table>

</body>
</html>
';?>