<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip');
JHTML::_('behavior.formvalidation');
$document =& JFactory::getDocument();


$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ActivarContactar=$params->get('ActivarContactar');

$id = JRequest::getVar('id', 0, '', 'int');
//echo 'id: '.$id;
$recomendada = JRequest::getVar('recomendada', 0, '', 'int');
//echo '$recomendada: '.$recomendada;
if($recomendada == 1){
//echo ' '.JRequest::getVar('message');
echo ' '.JRequest::getVar('msg');
?>
<br /><br />
<a href="#" onclick="window.close()"><?php echo JText::_('Close Window'); ?></a>&nbsp;|&nbsp;<a href="javascript:;" onclick="window.print(); return false"><?php echo JText::_('Print'); ?></a><br><br>
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
	if(isset($this->message)){
		$this->display('message');
	}


	//index.php?option=com_propiedades&view=propiedad&catid='.$row->catslug.'&id='.$row->slug
?>

<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" id="josForm" name="josForm" class="form-validate">

<input type="hidden" name="subject" value="<?php echo JRequest::getVar('id'); ?>" />

<div class="componentheading"><?php echo JText::_('Recommend this Property'); ?></div>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">

<tr>
	<td height="40">
		<label id="emailmsg" for="emailPara"><?php echo JText::_( 'To' ); ?>: </label>
	</td>
	<td><input type="text" id="emailPara" name="emailPara" size="40" value="<?php //echo //$this->user->get( 'email' );?>" class="inputbox required validate-email" maxlength="100" /></td>
</tr>

<tr>
	<td height="40">
		<label id="emailmsg" for="text">
			<?php echo JText::_( 'Message' ); ?>:			
		</label>
	</td>
	<td>
    <textarea name="text" id="text"cols="40" rows="10">
<?php echo "\n".JText::_('Recommended property'); ?>    
<?php echo "\n".JText::_('Can see here').":\n"; ?>
<?php echo htmlspecialchars($_SERVER['HTTP_REFERER']). "\n"; ?>
    </textarea>
	</td>
</tr>
<tr>
	<td height="40">
		<label id="emailmsg" for="emailDe"><?php echo JText::_( 'From' ); ?>: </label>
	</td>
	<td><input type="text" id="emailDe" name="emailDe" size="40" value="<?php echo $this->user->email;?>" class="inputbox required validate-email" maxlength="100" /></td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="name"><?php echo JText::_( 'Name' ); ?>: </label>
	</td>
  	<td><input type="text" name="name" id="name" size="40" value="<?php echo $this->user->name;?>" class="inputbox required" maxlength="50" /></td>
</tr>
<tr>
	<td colspan="2" height="40">
<input type="checkbox" name="email_copy" id="contact_email_copy" value="1"  />

				<label for="contact_email_copy">
					<?php echo JText::_( 'Send me Copy' ); ?>
				</label>
	</td>
</tr>   

           
</table>
  <div align="center" style="margin-bottom:20px;">
	<button class="button validate" type="submit"><?php echo JText::_('Send'); ?></button>
    </div>
    <input type="hidden" name="option" value="com_properties" />
	<input type="hidden" name="view" value="property" />
	<input type="hidden" name="task" value="enviar_recomendar" />
    <input type="hidden" name="id" value="<?php echo $this->Product->id;?>" />
    <input type="hidden" name="agent_id" value="<?php echo $this->Product->agent_id;?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>

<?php } ?>

