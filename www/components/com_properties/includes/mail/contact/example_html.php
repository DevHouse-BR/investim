<?php
$body = JText::_( 'CONSULT_BODY0').' '.$namePublicador.'<br>'.		
		JText::_( 'CONSULT_BODY1').' '.$name.' '
		.JText::_('CONSULT_BODY2').'<br>'.		
		'<a href="'.JURI::base().'index.php?option=com_properties&view=property&id='.$productoId.'" target="_blank">'.$subject.'</a>'.'<br>'.
		//$_SERVER['HTTP_REFERER'] ."\n".
		'<br>'.JText::_('CONSULT_BODY3').'<br><br>'.
		$body.'<br><br>'.
		JText::_('CONSULT_BODY6').' '.$phone.'<br>'.
		JText::_('CONSULT_BODY4').' '.$email;
$body_html='
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Template 9 - Left Sidebar</title>
   <link rel="stylesheet" type="text/css" href="screen.css">
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



td.footer p {
   font-family: "Lucida Grande", sans-serif;
   font-size: 10px;
   font-weight: normal;
   color: #151515;
}
	 </style>
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
      <td align="center">
         
         <table width="580" border="0" cellspacing="0" cellpadding="0">
            
            <tr>
               <td class="header" align="left" valign="bottom">
                  <img src="'.JURI::base().'components/com_properties/includes/mail/contact/header-bg.jpg" alt="site name" width="580" height="130" />
               </td>
            </tr>
            <tr>
               <td>
                  <table width="580" height="130" border="0" cellspacing="16" cellpadding="0" class="content">
                     <tr>
                   
                        <td class="mainbar" align="left" valign="top" width="354">
                           <h3>'. date("l M j , Y") .'</h3>
                           <h2>'.JText::_('CONSULT_BODY_TITLE').'</h2>
                           <p> 
						   '.$body.'
						   </p>                                              
                           
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
         <table width="646" border="0" cellspacing="0" cellpadding="0">
            <tr>
               <td><img src="'.JURI::base().'components/com_properties/includes/mail/contact/footer-tail.jpg" alt="Footer" width="646" height="150" /></td>
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