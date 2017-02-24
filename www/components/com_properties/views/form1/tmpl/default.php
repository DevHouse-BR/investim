<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip');
JHTML::_('behavior.formvalidation');
$user =& JFactory::getUser();
$document =& JFactory::getDocument();
$component = JComponentHelper::getComponent( 'com_formacion' );
$params = new JParameter( $component->params );

$u =& JFactory::getURI();
//echo $u->getHost();
$title = JText::_('FORM1TITLE').' '.$this->ThisMenu->name;	
$document->setTitle( $title );
$document->setDescription( $title );
$document->setMetadata('keywords',$title);
$contact_send = JRequest::getVar('contact_send', 0, '', 'int');



if($contact_send == 1){
?>

<div style="width:100%; background:#E6E6C6; text-align:center;">
<div>
<br /><br />
<p style="font-size:18px;">
<?php echo ' '.JRequest::getVar('msg');?>
 </p>
<br /><br />
<?php
if(JRequest::getVar('popup')==1){
?>
<a href="#" onclick="window.close()"><?php echo JText::_('Close Window'); ?></a><br /><br />
<?php
}
?>
</div>
</div>
<?php
}else{
?>

<script type="text/javascript">
function ValidateCaptcha(a,b,c){
var progressvc = $('progressvc');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajaxCaptcha&format=raw&task=ValidateCaptcha",
{method: 'get',
onRequest: function(){progressvc.setStyle('visibility', 'visible');},
onComplete: function(){progressvc.setStyle('visibility', 'hidden');},
update: $('ValidateCaptcha'), 
data: 'captchacode='+a+'&captchasuffix='+b+'&captchasessionid='+c}).request();
			}	
</script>

<style type="text/css">
<!--
.invalid {
font-weight:bold;
color: red;
}
-->
</style>


<div style="padding:10px;" >

<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" id="josForm2" name="josForm2" class="form-validate">
<input type="hidden" name="popup" value="" />

<div class="componentheading"></div>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
	<tr>
		<td width="100%" colspan="2">
<?php
if($this->ThisMenu->text){
echo $this->ThisMenu->text;
}
?>	
		</td>
	</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
	<tr valign="top"> 
  		<td height="20" class="texto">&nbsp;</td>
  		<td class="texto">&nbsp; </td>
	</tr> 
                            
	<tr>
		<td width="30%" height="40">
		<label id="namemsg" for="name">*<?php echo JText::_( 'Name' ); ?>: </label>
		</td>
  		<td><input type="text" name="name" id="name" size="40" value="<?php echo $user->name;?>" class="inputbox required" maxlength="50" /></td>
	</tr>


	<tr>
		<td height="40">
		<label id="emailmsg" for="email">*<?php echo JText::_( 'Email' ); ?>: </label>
		</td>
		<td><input type="text" id="email" name="email" size="40" value="<?php echo $user->email;?>" class="inputbox required validate-email" maxlength="100" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="namemsg" for="phone"><?php echo JText::_( 'Phone' ); ?>: </label>
		</td>
 	 	<td><input type="text" name="phone" id="phone" size="40" value="<?php //echo $this->user->get( 'name' );?>" class="inputbox required" maxlength="50" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="addressmsg" for="address"><?php echo JText::_( 'Address' ); ?>: </label>
		</td>
 	 	<td><input type="text" name="address" id="address" size="40" value="" class="inputbox" maxlength="150" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="citymsg" for="city"><?php echo JText::_( 'City' ); ?>: </label>
		</td>
 	 	<td><input type="text" name="city" id="city" size="40" value="" class="inputbox" maxlength="50" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="statemsg" for="state"><?php echo JText::_( 'State' ); ?>: </label>
		</td>
	  	<td><input type="text" name="state" id="state" size="40" value="" class="inputbox" maxlength="150" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="cpmsg" for="cp"><?php echo JText::_( 'CP' ); ?>: </label>
		</td>
 	 	<td><input type="text" name="cp" id="cp" size="40" value="" class="inputbox" maxlength="150" /></td>
	</tr>


	<tr>
		<td height="40">
		<label id="textmsg" for="text">
			<?php echo JText::_( 'Mesage' ); ?>:
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
    
    
    
    
    
    
    
<tr>
	<td colspan="2">

<?php $dispatcher = &JDispatcher::getInstance();
			//JPluginHelper::importPlugin('system');
			$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.contact' ) );
			if ($results[0]){?>		
<table>
<tr><td align="center" colspan="2">
<span><?php echo JText::_( 'CAPTCHACODE_FORM_TITLE' ) ?></span>	
</td>
<td colspan="2"></td>
</tr>
<tr>
<?php 	
			
				$dispatcher->trigger( 'onCaptchaView', array( 'user.contact', 0, '', '' ) ); 
?>
<td width="20px">
<div id="ValidateCaptcha" style="float:left;"></div>
</td>
<td>
<div style="float:right">      
<a style="cursor:pointer;" onclick="ValidateCaptcha(document.getElementById('captchacode1').value,document.getElementById('captchasuffix').value,document.getElementById('captchasessionid').value)"><?php echo JText::_('Test Code'); ?></a>
</div> 
</td>
</tr>
<tr>
    <td colspan="3"><div id="progressvc" style="float:left;"></div> </td>
  </tr>
</table>	
<?php } ?>
</td>
</tr>         
</table>
<div align="center" style="margin-bottom:20px;">
 
	<button class="button validate" type="submit"><?php echo JText::_('Send'); ?></button>
  
    </div>
    <input type="hidden" name="option" value="com_properties" />    
    <input type="hidden" name="controller" value="contact" />
	<input type="hidden" name="task" value="send_contact" />
    <input type="hidden" name="product_id" value="<?php echo JRequest::getVar('id');?>" />    
	<?php echo JHTML::_( 'form.token' ); ?>
	</form>


<?php if(JText::_('FIELDAREREQUIRED')!='FIELDAREREQUIRED'){echo JText::_('FIELDAREREQUIRED');} ?>
<?php if(JText::_('SENDMAILTO')!='SENDMAILTO'){echo JText::_('SENDMAILTO');} ?>

<?php if(JText::_('OURPHONE')!='OURPHONE'){echo JText::_('OURPHONE');} ?>


</div>

<?php } ?>


