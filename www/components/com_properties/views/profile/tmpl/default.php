<?php defined('_JEXEC') or die('Restricted access'); 
$TableName = JRequest::getVar('table');
$option = JRequest::getCmd('option');
JHTML::_('behavior.tooltip');
$user =& JFactory::getUser();
global $mainframe;
?>
<script type="text/javascript">	
function irUrlProfile(){
document.getElementById('task').value = '';
window.location.href='<?php echo 'index.php?option=com_properties&view=profile' ;?>';
}	
	
</script>
<form action="<?php echo JRoute::_( 'index.php' );?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

<div class="titulo"><H3><?php echo JText::_('My Profile'); ?></H3></div>
	<div class="botones">

<div class="boton">
<button class="button_cancel" onclick="irUrlProfile();"><span class="txt"><?php echo JText::_('Cancel'); ?></span></button>
</div>
<div class="boton">
<button class="button_apply validate" type="submit"><span class="txt"><?php echo JText::_('Apply'); ?></span></button>
</div>

<div style="clear:both;" ></div>

</div>	

<div style="width:98%; border: 1px solid #FFFFFF;">


		<table class="admintable">
<tr><td>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>
<table>   
         <tr>
					<td  class="key"><label for="name"><?php echo JText::_( 'Client' ); ?>:</label></td>
					<td>
                   <?php echo  $user->name; ?>  </td>
				</tr>  
        <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Name' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="name" id="name" size="20" maxlength="255" value="<?php echo $this->datos->name; ?>" />
					</td>
				</tr> 
                
                
                
            
                
                
             <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Reference' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="info" id="info" size="20" maxlength="255" value="<?php echo $this->datos->info; ?>" />
					</td>
				</tr>    
                
                <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Company' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="company" id="company" size="20" maxlength="255" value="<?php echo $this->datos->company; ?>" />
					</td>
				</tr> 
                
             <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Address' ).' 1'; ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="address1" id="address1" size="20" maxlength="255" value="<?php echo $this->datos->address1; ?>" />
					</td>
				</tr>    
                             <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Address' ).' 2'; ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="address2" id="address2" size="20" maxlength="255" value="<?php echo $this->datos->address2; ?>" />
					</td>
				</tr>
              <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Locality' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="locality" id="locality" size="20" maxlength="255" value="<?php echo $this->datos->locality; ?>" />
					</td>
				</tr>   
                
              <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Post Code' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="pcode" id="pcode" size="20" maxlength="255" value="<?php echo $this->datos->pcode; ?>" />
					</td>
				</tr>   
                <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'State' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="state" id="state" size="20" maxlength="255" value="<?php echo $this->datos->state; ?>" />
					</td>
				</tr>   
                <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Country' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="country" id="country" size="20" maxlength="255" value="<?php echo $this->datos->country; ?>" />
					</td>
				</tr>   
                <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Mail' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="email" id="email" size="20" maxlength="255" value="<?php echo $this->datos->email; ?>" />
					</td>
				</tr>   
               
                <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Phone' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="phone" id="phone" size="20" maxlength="255" value="<?php echo $this->datos->phone; ?>" />
					</td>
				</tr>   
                <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Fax' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="fax" id="fax" size="20" maxlength="255" value="<?php echo $this->datos->fax; ?>" />
					</td>
				</tr>   
                <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Mobile' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="mobile" id="mobile" size="20" maxlength="255" value="<?php echo $this->datos->mobile; ?>" />
					</td>
				</tr>   
                
             
 <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'show' ); ?>:
						</label>
					</td>
					<td >
                    <?php $chequeado0 = $this->datos->show ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->datos->show ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="show" id="show0" value="0" <?php echo $chequeado0;?> type="radio">
	<label for="show0"><?php echo JText::_( 'No' ); ?></label>
	<input name="show" id="show1" value="1" <?php echo $chequeado1;?> type="radio">
	<label for="show1"><?php echo JText::_( 'Yes' ); ?></label>  
       
						
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
						<input class="text_area" type="text" name="ordering" id="ordering" size="20" maxlength="255" value="<?php echo $this->datos->ordering; ?>" />
					</td>
				</tr>            
	</table>
	</fieldset>
  </td>
  <td valign="top"> 
   <fieldset class="adminform">
   	<legend><?php echo JText::_( 'Images' ); ?></legend>  
    
<?php
                    $profile_path = JURI::base().'images/properties/profiles/';
                    ?>   
		<table>  	         
                <tr>
                    <td class="key"><label>
								<?php echo JText::_( 'Image' ); ?>:
							</label></td>
                    <td>
                   
                    
                    <img src="<?php echo $profile_path.$this->datos->image; ?>" /><br />
                </tr>				
                <tr>
                    <td class="key"><label>
								<?php echo JText::_( 'Change Image' ); ?>:
							</label>
                             <br />  Max. 140x200
                             </td>
                    <td>
                    <input class="input_box" id="image" name="image" type="file" />
                    </td>              
                </tr>
				<tr>   
                
                                <tr>
                    <td class="key"><label>
								<?php echo JText::_( 'Logo Image' ); ?>:
                              
							</label></td>
                    <td>
                   
                    
                    <img src="<?php echo $profile_path.$this->datos->logo_image; ?>" /><br />
                </tr>				
                <tr>
                    <td class="key"><label>
								<?php echo JText::_( 'Change Logo Image' ); ?>:
                                <br />  Max. 140x45
							</label></td>
                    <td>
                    <input class="input_box" id="logo_image" name="logo_image" type="file" />
                    </td>              
                </tr>
				<tr>
                
                                <tr>

                    <td colspan="2">
                   
                    
                    <img src="<?php echo $profile_path.$this->datos->logo_image_large; ?>" width="400" /><br />
                </tr>				
                <tr>
                    <td class="key"><label>
								<?php echo JText::_( 'Change Logo Image Large' ); ?>:
							</label>
                             <br />  Max. 500x160
                             </td>
                    <td>
                    <input class="input_box" id="logo_image_large" name="logo_image_large" type="file" />
                    </td>              
                </tr>
                
	</table> 
    </fieldset> 
       
       
 </td>
				</tr>            
	</table>       
       
        
</div>

<div style="clear:both;"></div>
<input type="hidden" name="option" value="com_properties" />
<input type="hidden" name="id" value="<?php echo $this->datos->id; ?>" />
<input type="hidden" name="table" value="profiles" />
<input type="hidden" name="task" id="task" value="ProfileApply" />
<input type="hidden" name="controller" value="profile" />
<input type="hidden" id="mid" name="mid" value="<?php echo $user->id; ?>" />
<input type="hidden" id="agent" name="agent" value="<?php echo $user->username; ?>" />

</form>
