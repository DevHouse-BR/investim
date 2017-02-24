<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php if(JPluginHelper::isEnabled('authentication', 'openid')) :
		$lang = &JFactory::getLanguage();
		$lang->load( 'plg_authentication_openid', JPATH_ADMINISTRATOR );
		$langScript = 	'var JLanguage = {};'.
						' JLanguage.WHAT_IS_OPENID = \''.JText::_( 'WHAT_IS_OPENID' ).'\';'.
						' JLanguage.LOGIN_WITH_OPENID = \''.JText::_( 'LOGIN_WITH_OPENID' ).'\';'.
						' JLanguage.NORMAL_LOGIN = \''.JText::_( 'NORMAL_LOGIN' ).'\';'.
						' var comlogin = 1;';
		$document = &JFactory::getDocument();
		$document->addScriptDeclaration( $langScript );
		JHTML::_('script', 'openid.js');
endif; ?>

<div class="module" style="width: 100%; margin-left:10px;  ">
			<div>
				<div>

					<div>
                    
<h3 style="text-align:center;"><?php echo JText::_('Need Login');?></h3>

<form action="<?php echo JRoute::_( 'index.php', true, $this->params->get('usesecure')); ?>" method="post" name="com-login" id="com-form-login">



<?php //echo $this->image; ?>
<fieldset class="input">
<table border="0" style="margin-top:20px;" width="100%" align="center">
<tr>
<td valign="bottom">
		<label for="username" style="font-size:12px;"><b><?php echo JText::_('Username') ?></label></b>
</td>
<td valign="bottom">
		<label for="passwd" style="font-size:12px;"><b><?php echo JText::_('Pass') ?></label></b>
</td>
</tr>
<tr>
<td valign="bottom">
	<input name="username" id="username" type="text" class="inputbox" alt="username" size="18" />	
 </td> 
 <td valign="bottom">
<input type="password" id="passwd" name="passwd" class="inputbox" size="18" alt="password" />
</td>
</tr>
<tr>
<td align="center" colspan="2" valign="bottom">   
	<input type="submit" name="Submit" class="button" value="<?php echo JText::_('Login') ?>" />
	<?php if(JPluginHelper::isEnabled('system', 'remember')) : ?>		
		<input type="checkbox" id="remember" name="remember" class="inputbox" value="yes" alt="Remember Me" />
        <label for="remember"><b><?php echo JText::_('Remember me') ?></label>
	</b>
	<?php endif; ?>
</td>

</tr>
</table>
</fieldset>
<table width="100%"  style="margin-top:20px;" align="center" border="0">
<tr>
<td>

		<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset&Itemid=296' ); ?>">
		<?php echo JText::_('Forgot your password'); ?></a> 
</td>
<td>
		<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind&Itemid=296' ); ?>">
		<?php echo JText::_('Forgot your username'); ?></a>

	<?php
	$usersConfig = &JComponentHelper::getParams( 'com_users' );
	if ($usersConfig->get('allowUserRegistration')) : ?>
</td>
<td>
		<a href="<?php echo JRoute::_( 'index.php?option=com_user&task=register&Itemid=296' ); ?>">
			<?php echo JText::_('Register'); ?></a>

	<?php endif; ?>
</td>
</tr>
</table>

	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="login" />
    <input type="hidden" name="Itemid" value="9999" />
	<input type="hidden" name="return" value="<?php echo $this->return; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>


</div></div></div>
</div>
<div style="clear:both"></div>