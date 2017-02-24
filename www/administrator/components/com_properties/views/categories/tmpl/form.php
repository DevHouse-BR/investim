<?php defined('_JEXEC') or die('Restricted access'); 

$option = JRequest::getCmd('option');
JHTML::_('behavior.tooltip');
jimport('joomla.html.pane');

$pane =& JPane::getInstance('tabs', array('startOffset'=>0)); 

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
		<legend><?php echo JText::_( 'Category Details' ); ?></legend>
		<table class="admintable">

         <tr>
			<td width="100" align="right" class="key">
				<label for="name">
							<?php echo JText::_( 'Category Name' ); ?>:
						</label>
			</td>
			<td>            
            <textarea class="text_area" type="text" name="name" id="name"   cols="34" rows="1"><?php echo $this->category->name; ?></textarea>
				
			</td>
		</tr>    
        
        <tr>
			<td width="100" align="right" class="key">
				<label for="name">
							<?php echo JText::_( 'Alias' ); ?>:
						</label>
			</td>
			<td>
				<input class="text_area" type="text" name="alias" id="alias" size="60" maxlength="250" value="<?php echo $this->category->alias;?>" />
			</td>
		</tr>   
        
        <tr>        
<td width="100" align="right" class="key">
		<label for="name"><?php echo JText::_( 'Parent' ); ?>:</label>
			</td>
<td>
<?php echo CatTreeHelper::ParentCategory( $this->category,'category' ); ?>
</td>
		</tr> 
        <tr>    
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Published' ); ?>:
						</label>
					</td>
                    <td>
<?php $chequeado0 = $this->category->published ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->category->published ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
<?php if($this->category->published==''){$chequeado1 = JText::_( 'checked="checked"' );}?>
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
						<input class="text_area" type="text" name="ordering" id="ordering" size="3" maxlength="5" value="<?php echo $this->category->ordering; ?>" />
					</td>
				</tr>            
	</table>
	</fieldset>
</div>
<div class="clr"></div>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="table" value="<?php echo $TableName; ?>" />
<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="categories" />
</form>
	</td>
		</tr>
			</table> 