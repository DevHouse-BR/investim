<?php
$data = JText::_( 'Name').' : '.$name."\n".	
	JText::_( 'Email').':'.$email."\n".		
	JText::_( 'Phone').' : '.$phone."\n".		
	JText::_( 'Address').' : '.$address."\n".	
	JText::_( 'City').' : '.$city."\n".	
	JText::_( 'State').' : '.$state."\n".	
	JText::_( 'PC').' : '.$cp."\n".	
	JText::_( 'Message').' : '.$text."\n";

$body_html = JText::_( 'CONSULT_BODY1').' '.$name.' '
		.JText::_('CONSULT_BODY2')."\n".		
		JText::_('CONSULT_BODY3')."\n".
		$data."\n";		

?>