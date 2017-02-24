<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
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
?>

<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" method="post" id="josForm" name="josForm" class="form-validate">

<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php echo $this->escape($this->params->get('page_title')); ?></div>
<?php endif; ?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
<tr>
	<td colspan="2" height="40">
		<?php echo JText::_( 'REGISTER_REQUIRED' ); ?>
	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="name">
			<?php echo JText::_( 'Name' ); ?>:
		</label>
	</td>
  	<td>
  		<input type="text" name="name" id="name" size="40" value="<?php echo $this->escape($this->user->get( 'name' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td height="40">
		<label id="usernamemsg" for="username">
			<?php echo JText::_( 'User name' ); ?>:
		</label>
	</td>
	<td>
		<input type="text" id="username" name="username" size="40" value="<?php echo $this->escape($this->user->get( 'username' ));?>" class="inputbox required validate-username" maxlength="25" /> *
	</td>
</tr>
<tr>
	<td height="40">
		<label id="emailmsg" for="email">
			<?php echo JText::_( 'Email' ); ?>:
		</label>
	</td>
	<td>
		<input type="text" id="email" name="email" size="40" value="<?php echo $this->escape($this->user->get( 'email' ));?>" class="inputbox required validate-email" maxlength="100" /> *
	</td>
</tr>
<tr>
	<td height="40">
		<label id="pwmsg" for="password">
			<?php echo JText::_( 'Password' ); ?>:
		</label>
	</td>
  	<td>
  		<input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" /> *
  	</td>
</tr>
<tr>
	<td height="40">
		<label id="pw2msg" for="password2">
			<?php echo JText::_( 'Verify Password' ); ?>:
		</label>
	</td>
	<td>
		<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" /> *
	</td>
</tr>




<tr>
	<td width="30%" height="40">
		<label id="empresamsg" for="empresa">
			Empresa:
		</label>
	</td>
  	<td>
  		<input type="text" name="empresa" id="empresa" size="40" value="<?php echo $this->escape($this->user->get( 'empresa' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="estadomsg" for="estado">
			Estado:
		</label>
	</td>
  	<td>
  		<input type="text" name="estado" id="estado" size="40" value="<?php echo $this->escape($this->user->get( 'estado' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="cidademsg" for="cidade">
			Cidade:
		</label>
	</td>
  	<td>
  		<input type="text" name="cidade" id="cidade" size="40" value="<?php echo $this->escape($this->user->get( 'cidade' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="paismsg" for="pais">
			País:
		</label>
	</td>
  	<td>
  		<input type="text" name="pais" id="pais" size="40" value="<?php echo $this->escape($this->user->get( 'pais' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="telefonemsg" for="telefone">
			Telefone:
		</label>
	</td>
  	<td>
  		<input type="text" name="pais" id="pais" size="40" value="<?php echo $this->escape($this->user->get( 'pais' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="celularmsg" for="celular">
			Celular:
		</label>
	</td>
  	<td>
  		<input type="text" name="celular" id="celular" size="40" value="<?php echo $this->escape($this->user->get( 'celular' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="skypemsg" for="skype">
			Skype:
		</label>
	</td>
  	<td>
  		<input type="text" name="skype" id="skype" size="40" value="<?php echo $this->escape($this->user->get( 'skype' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="msnmsg" for="msn">
			MSN:
		</label>
	</td>
  	<td>
  		<input type="text" name="msn" id="msn" size="40" value="<?php echo $this->escape($this->user->get( 'msn' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>
<tr>
	<td width="30%" height="40">
		<label id="msnmsg" for="msn">
			Intenção com o cadastro:
		</label>
	</td>
  	<td>
  		<input type="text" name="intencao" id="intencao" size="40" value="<?php echo $this->escape($this->user->get( 'intencao' ));?>" class="inputbox required" maxlength="50" /> *
  	</td>
</tr>








</table>
	<button class="button validate" type="submit"><?php echo JText::_('Register'); ?></button>
	<input type="hidden" name="task" value="register_save" />
	<input type="hidden" name="id" value="0" />
	<input type="hidden" name="gid" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
