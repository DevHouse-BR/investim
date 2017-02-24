<?php defined('_JEXEC') or die('Restricted access'); 
$TableName = 'pdfs';
$component_name = 'properties';
JHTML::_('behavior.tooltip');
?>

<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton) {
	var form = document.adminForm;
	/*var type = form.type.value;*/

	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}
	if ( document.getElementById('name').value == "") {
		alert( "Item must have a Title" );
	}
				else if( document.getElementById('parent').value == 0 ){
 		alert( "Please select a Category" );
	} 			
//				else if( document.getElementById('type').value == 0 ){
// 		alert( "Please select a Type" );
//	} 
/*				else if( document.getElementById('cyid').value == 0 ){
 		alert( "Please select a Country" );
	} 
				else if( document.getElementById('sid').value == 0 ){
 		alert( "Please select a State" );
	} 
				else if( document.getElementById('lid').value == 0 ){
 		alert( "Please select a Locality" );
	} 
*/				
 else {
		submitform( pressbutton );
	}
}
//-->


function jSelectArticle(id, title, object) {
			document.getElementById(object + '_id').value = id;
			document.getElementById(object + '_name').value = title;
			
			document.getElementById('parent').value = id;
			
			document.getElementById('sbox-window').close();
		}
		
</script>

<?php
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'menu_left.php' );
?>
<table class="admintable" width="100%">
	<tr>
		<td align="left" width="200px" valign="top">
<?php echo MenuLeft::ShowMenuLeft();?>

		</td>
        <td align="left" valign="top" class="td_form">


<form action="index.php" method="post" name="adminForm" id="adminForm"  enctype="multipart/form-data">
<div class="col100">
	<fieldset class="adminform2">
		<legend><?php echo JText::_( 'Add Pdf' ); ?></legend>
			<table>
				<tr>        
					<td width="50%" >
               			<table>
                        
                        <tr>
	<td class="paramlist_key" width="40%">
		<span class="editlinktip">
			<label id="urlparamsid-lbl" for="urlparamsid" class="hasTip">
				<?php echo JText::_( 'Parent Product' ); ?>
			</label>
		</span>
	</td>
    
	<td class="paramlist_value">
	<div style="float: left;">
		<input style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;" id="id_name" value=" <?php echo '['.$this->datos->parent.'] '.$this->datos->parent_name;?>" disabled="disabled" type="text" size="60">
	</div>
</td>
<?php
//print_r($this->ParentProduct);
?>
<td>	
    <div class="button2-left">
    	<div class="blank">
        	<a class="modal" title="<?php echo JText::_( 'Select Parent Product' ); ?>" href="index.php?option=com_properties&amp;view=element&amp;task=element&amp;table=products&amp;tmpl=component&amp;object=id" rel="{handler: 'iframe', size: {x: 650, y: 375}}"><?php echo JText::_( 'Select' ); ?></a>
	</div>
		</div>

	<input id="id_id" name="urlparams[id]" value="0" type="hidden">

	<input id="parent" name="parent" value="<?php echo $this->datos->parent;?>" type="hidden">

	</td>
</tr>


      
                			<tr>
								<td width="100" align="right" class="key">
								<label for="name">
								<?php echo JText::_( 'Nombre' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="name" id="name" style="width:270px;" size="60" maxlength="250" value="<?php echo $this->datos->name;?>" />
								</td>
							</tr>
                            
                           
                            <tr>
								<td width="100" align="right" class="key">
								<label for="name">
								<?php echo JText::_( 'Date' ); ?>:
								</label>
								</td>
								<td>
                                 <?php
if($this->datos->date){
$f=explode('-',$this->datos->date);
$fecha=$f[2].'-'.$f[1].'-'.$f[0];
}
		
		
		 echo JHTML::_('calendar', $fecha, 'date', 'date', '%d-%m-%Y', array('class'=>'inputbox2', 'size'=>'14',  'maxlength'=>'19')); ?>
         
								
								</td>
							</tr>
                            

  					 
                            <tr>            
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'Published' ); ?>:
								</label>
								</td>
                    			<td>
<?php $chequeado0 = $this->datos->published ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->datos->published ? JText::_( 'checked="checked"' ) : JText::_( '' );?>


<?php if($this->datos->published==''){
$chequeado1=JText::_( 'checked="checked"' );$chequeado0=JText::_( '' );}?>   
 
	<input name="published" id="published1" value="1" <?php echo $chequeado1;?> type="radio">
	<label for="published1"><?php echo JText::_( 'Yes' ); ?></label>  
	<input name="published" id="published0" value="0" <?php echo $chequeado0;?> type="radio">
	<label for="published0"><?php echo JText::_( 'No' ); ?></label>	
    						</td>
							</tr>       
          					<tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'Ordering' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="ordering" id="ordring"  style="width:72px;" size="20" maxlength="255" value="<?php echo $this->datos->ordering; ?>" />
								</td>
							</tr>
                 
                             
                                           
						
       						<tr>
								<td class="key">				
								<?php echo JText::_( 'Archivo' ); ?>						
								</td>
                    		
                				<td><?php echo $this->datos->image_rout; ?>
                    		<a href="<?php echo $this->datos->archivo_rout; ?>" target="_blank">
                            <?php echo $this->datos->name; ?>
                            </a>
                    			</td>
                 			</tr>    			 
    						<tr>
								<td align="center">
                				<input type="file" size="20" name="archivo" value=""/>
                				</td>
							</tr>
    					</table>
        			</td>
				</tr>    
			</table>
			<table class="admintable" width="100%">
				<tr>
					<td>
					<?php $editor = &JFactory::getEditor();		
					echo $editor->display('text', $this->datos->text, '100%', '400', '60', '20');
					?>
					</td>
				</tr>
			</table>
	</fieldset>
</div>


<div class="clr"></div>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="table" value="<?php echo $TableName; ?>" />
<input type="hidden" name="id" value="<?php echo $this->datos->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="view" value="<?php echo $TableName; ?>" />
<input type="hidden" name="controller" value="<?php echo $TableName; ?>" />
</form>
	</td>
		</tr>
			</table> 