<?php defined('_JEXEC') or die('Restricted access'); 

$option = JRequest::getCmd('option');
JHTML::_('behavior.tooltip');
jimport('joomla.html.pane');

$pane =& JPane::getInstance('tabs', array('startOffset'=>0)); 

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$UseCountry=$params->get('UseCountry');
$UseCountryDefault=$params->get('UseCountryDefault');
$UseState=$params->get('UseState');
$UseStateDefault=$params->get('UseStateDefault');
$UseLocality=$params->get('UseLocality');
$UseLocalityDefault=$params->get('UseLocalityDefault');
?>

<?php
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'menu_left.php' );
?>
<table width="100%">
	<tr>
		<td align="left" width="20%" valign="top">
<?php echo MenuLeft::ShowMenuLeft();?>

		</td>
        <td align="left" width="80%" valign="top">
        
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Locality Details' ); ?></legend>
		<table class="admintable">

         <tr>
			<td width="100" align="right" class="key">
				<label for="name">
							<?php echo JText::_( 'Locality Name' ); ?>:
						</label>
			</td>
			<td>            
            <textarea class="text_area" type="text" name="name" id="name"   cols="34" rows="1"><?php echo $this->locality->name; ?></textarea>
				
			</td>
		</tr>    
        
        <tr>
			<td width="100" align="right" class="key">
				<label for="name">
							<?php echo JText::_( 'Alias' ); ?>:
						</label>
			</td>
			<td>
				<input class="text_area" type="text" name="alias" id="alias" size="60" maxlength="250" value="<?php echo $this->locality->alias;?>" />
			</td>
		</tr>   
        <tr>
			<td width="100" align="right" class="key">
				<label for="name">
							<?php echo JText::_( 'Parent' ); ?>:
						</label>
			</td>
			<td>
            <?php echo SelectHelper::Select( $this->locality,'state',$params ); ?>
				
			</td>
		</tr>   
        <tr>
        <tr>    
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Published' ); ?>:
						</label>
					</td>
                    					<td>
<?php $chequeado0 = $this->locality->published ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->locality->published ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
<?php if($this->type->published==''){$chequeado1 = JText::_( 'checked="checked"' );}?>    
    <input name="published" id="published0" value="0" <?php echo $chequeado0;?> type="radio">
	<label for="published0"><?php echo JText::_( 'No' ); ?></label>
	<input name="published" id="published1" value="1" <?php echo $chequeado1;?> type="radio">
	<label for="published1"><?php echo JText::_( 'Yes' ); ?></label>  
					</td>
				</tr>       
           <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Ordering' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="ordering" id="ordering" size="3" maxlength="5" value="<?php echo $this->locality->ordering; ?>" />
					</td>
				</tr>  
                
                <tr>
			<td width="100" align="right" class="key">
				<label for="name">
							<?php echo JText::_( 'Map id' ); ?>:
						</label>
			</td>
			<td>
				<input class="text_area" type="text" name="mid" id="mid" size="3" maxlength="250" value="<?php echo $this->locality->mid;?>" />
			</td>
		</tr>         
                  
	</table>
	</fieldset>
</div>
<div class="clr"></div>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="table" value="<?php echo $TableName; ?>" />
<input type="hidden" name="id" value="<?php echo $this->locality->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="localities" />
</form>
	</td>
		</tr>
			</table> 