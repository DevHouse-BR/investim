<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip');
JHTML::_('behavior.formvalidation');
$document =& JFactory::getDocument();


$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ActivarContactar=$params->get('ActivarContactar');

$id = JRequest::getVar('id', 0, '', 'int');
//echo 'id: '.$id;
$contacto = JRequest::getVar('contacto', 0, '', 'int');
//echo '$recomendada: '.$recomendada;
if($contacto == 1){
//echo ' '.JRequest::getVar('message');
echo ' '.JRequest::getVar('msg');
?>
<br /><br />
<a href="#" onclick="window.close()"><?php echo JText::_('Close Window'); ?></a><br><br>
<?php
}else{
?>
<style type="text/css">
<!--
.invalid {
font-weight:bold;
color: red;
}
-->
</style>



<div id="recomendar">
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>

<?php



	//index.php?option=com_propiedades&view=propiedad&catid='.$row->catslug.'&id='.$row->slug
?>
<div id="contactarporestapropiedad">
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>

<?php

//echo 'msg : '.$this->msg;

	//index.php?option=com_properties&view=property&catid='.$row->catslug.'&id='.$row->slug
?>

<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" id="josForm2" name="josForm2" class="form-validate">
<input type="hidden" name="linkid" value="<?php echo JRequest::getVar('id'); ?>" />
<input type="hidden" name="linkcid" value="<?php echo JRequest::getVar('cid'); ?>" />
<input type="hidden" name="linktid" value="<?php echo JRequest::getVar('tid'); ?>" />
<input type="hidden" name="subject" value="<?php echo JRequest::getVar('name'); ?>" />
<input type="hidden" name="popup" value="1" />
<div class="componentheading"><?php echo JText::_( 'Contact for Property' ); ?></div>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="name"><?php echo JText::_( 'Name' ); ?>: </label>
	</td>
  	<td><input type="text" name="name" id="name" size="40" value="<?php //echo $this->user->get( 'name' );?>" class="inputbox required" maxlength="50" /></td>
</tr>
<tr>
	<td height="40">
		<label id="emailmsg" for="email"><?php echo JText::_( 'Email' ); ?>: </label>
	</td>
	<td><input type="text" id="email" name="email" size="40" value="<?php //echo //$this->user->get( 'email' );?>" class="inputbox required validate-email" maxlength="100" /></td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="name"><?php echo JText::_( 'Phone' ); ?>: </label>
	</td>
  	<td><input type="text" name="phone" id="phone" size="40" value="<?php //echo $this->user->get( 'name' );?>" class="inputbox" maxlength="50" /></td>
</tr>
<tr>
	<td height="40">
		<label id="emailmsg" for="text">
			<?php echo JText::_( 'Message' ); ?>:
		</label>
	</td>
	<td>
    <textarea name="text" id="text"cols="40" rows="3"></textarea>
	</td>
</tr>
<tr>
	<td colspan="2" height="40">
<input type="checkbox" name="email_copy" id="contact_email_copy" value="1"  />

				<label for="contact_email_copy">
					<?php echo JText::_( 'Send me a copy' ); ?>
				</label>
	</td>
</tr>               
</table>
  <div align="center" style="margin-bottom:20px;">
 
	<button class="button validate" type="submit"><?php echo JText::_('Send'); ?></button>
    </div>
    <input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="view" value="property" />
	<input type="hidden" name="task" value="enviar_consulta" />
    <input type="hidden" name="id" value="<?php echo JRequest::getVar('id');?>" />
    <input type="hidden" name="agent_id" value="<?php echo $row->agent_id;?>" />
    
    
        
    
    
    
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>

<?php } ?>

