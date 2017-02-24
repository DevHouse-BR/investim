<?php
/**
* @package   yoo_explorer Template
* @version   1.5.2 2010-01-03 14:20:02
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="user">
	
		<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<?php if(isset($this->message)) : ?>
			<?php $this->display('message'); ?>
		<?php endif; ?>

		<form action="<?php echo JRoute::_( 'index.php?option=com_user' ); ?>" method="post" id="josForm" name="josForm" class="form-validate">
		<fieldset>
			<legend><?php echo JText::_('Register'); ?></legend>
			<div>
				<?php echo JText::_( 'REGISTER_REQUIRED' ); ?>
			</div>
			<div>
				<label class="label-left" id="namemsg" for="name">
					<?php echo JText::_( 'Name' ); ?>:
				</label>
				<input class="inputbox required" type="text" name="name" id="name" value="<?php echo $this->user->get( 'name' );?>" maxlength="50" /> *
			</div>
			<div>
				<label class="label-left" id="usernamemsg" for="username">
					<?php echo JText::_( 'User name' ); ?>:
				</label>
				<input class="inputbox required" type="text" id="username" name="username" value="<?php echo $this->user->get( 'username' );?>" maxlength="25" /> *
			</div>
			<div>
				<label class="label-left" id="emailmsg" for="email">
					<?php echo JText::_( 'Email' ); ?>:
				</label>
				<input class="inputbox required" type="text" id="email" name="email" value="<?php echo $this->user->get( 'email' );?>" maxlength="100" /> *
			</div>
			<div>
				<label class="label-left" id="pwmsg" for="password">
					<?php echo JText::_( 'Password' ); ?>:
				</label>
				<input class="inputbox required validate-password" type="password" id="password" name="password" value="" /> *
			</div>
			<div>
				<label class="label-left" id="pw2msg" for="password2">
					<?php echo JText::_( 'Verify Password' ); ?>:
				</label>
				<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" value="" /> *
			</div>
			
			
			
			
			
			
			
<?
require('conectar_mysql.php');
?>
			
			
<div>
		<label class="label-left" id="empresamsg" for="empresa">
			Empresa:
		</label>
	
  		<input type="text" name="empresa" id="empresa" size="40" value="<?php echo $this->escape($this->user->get( 'empresa' ));?>" class="inputbox required" maxlength="100" /> *
  	</div>
<div>
		<label class="label-left" id="estadomsg" for="estado">
			Estado:
		</label>
		<select name="estado" id="estado" class="inputbox required">
			<option value="">Selecione</option>
			<?php
			$query = "SELECT id, name FROM jos_properties_state ORDER BY name";
			$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
				echo('<option value="' . $registro["name"] . '"');
				if($registro["name"] == $this->escape($this->user->get( 'estado' ))) echo(" selected");
				echo('>' . $registro["name"] . '</option>');
			}
			?>
		</select> *
  	</div>
<div>
		<label class="label-left" id="cidademsg" for="cidade">
			Cidade:
		</label>
	
  		<input type="text" name="cidade" id="cidade" size="40" value="<?php echo $this->escape($this->user->get( 'cidade' ));?>" class="inputbox required" maxlength="100" /> *
  	</div>
<div>
		<label class="label-left" id="paismsg" for="pais">
			Pa&iacute;s:
		</label>
		<select name="pais" id="pais" class="inputbox required">
			<option value="">Selecione</option>
			<?php
			$query = "SELECT id, name FROM jos_properties_country ORDER BY name";
			$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
			while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
				echo('<option value="' . $registro["name"] . '"');
				if($registro["name"] == $this->escape($this->user->get( 'pais' ))) echo(" selected");
				echo('>' . $registro["name"] . '</option>');
			}
			?>
		</select> *
  	</div>
<div>
		<label class="label-left" id="telefonemsg" for="telefone">
			Telefone:
		</label>
	
  		<input type="text" name="telefone" id="telefone" size="40" value="<?php echo $this->escape($this->user->get( 'pais' ));?>" class="inputbox required" maxlength="30" /> *
  	</div>
<div>
		<label class="label-left" id="celularmsg" for="celular">
			Celular:
		</label>
	
  		<input type="text" name="celular" id="celular" size="40" value="<?php echo $this->escape($this->user->get( 'celular' ));?>" class="inputbox required" maxlength="30" /> *
  	</div>
<div>
		<label class="label-left" id="skypemsg" for="skype">
			Skype:
		</label>
	
  		<input type="text" name="skype" id="skype" size="40" value="<?php echo $this->escape($this->user->get( 'skype' ));?>" class="inputbox" maxlength="255" />
  	</div>
<div>
		<label class="label-left" id="msnmsg" for="msn">
			MSN:
		</label>
	
  		<input type="text" name="msn" id="msn" size="40" value="<?php echo $this->escape($this->user->get( 'msn' ));?>" class="inputbox" maxlength="255" />
  	</div>
<div>
		<label class="label-left" id="msnmsg" for="msn">
			Inten&ccedil;&atilde;o com o cadastro:
		</label>
		<select name="intencao" id="intencao" class="inputbox required">
			<option value="Investidor"<? if($this->escape($this->user->get( 'intencao' )) == "Investidor") echo(' selected') ?>>Investidor</option>
			<option value="Vendedor Empresa"<? if($this->escape($this->user->get( 'intencao' )) == "Vendedor Empresa") echo(' selected') ?>>Vendedor Empresa</option>
		</select> *
  	</div>



			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div>
				<button class="button validate" type="submit"><?php echo JText::_('Register'); ?></button>
			</div>
			
		</fieldset>
		
		<input type="hidden" name="task" value="register_save" />
		<input type="hidden" name="id" value="0" />
		<input type="hidden" name="gid" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>

	</div>
</div>