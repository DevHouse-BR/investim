<?php
$body_html = JText::_( 'CONSULT_BODY0').' '.$namePublicador."\n".		
		JText::_( 'CONSULT_BODY1').' '.$name.' '
		.JText::_('CONSULT_BODY2')."\n".
		$subject ."\n".
		JURI::base().'index.php?option=com_properties&view=property&id='.$productoId."\n".
		//$_SERVER['HTTP_REFERER'] ."\n".
		JText::_('CONSULT_BODY3')."\n".
		$body."\n".
		JText::_('CONSULT_BODY6').' '.$phone."\n".
		JText::_('CONSULT_BODY4').' '.$email;
?>