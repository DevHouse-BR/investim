<?php
// Disallow direct access to this file
defined('_JEXEC') or die('Restricted access');

		$document = & JFactory::getDocument();
		$document->setTitle( JText::_('Edit Preferences') );
		JHTML::_('behavior.tooltip');
		$option=JRequest::getVar('option');
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
        
        
<form action="index.php" method="post" name="adminForm" autocomplete="off">

					 
		<table width="100%" border="0">
			<tr> 
				<td width="48%" rowspan="2" valign="top">
                
                <table width="100%" border="0">
                	<tr>
                    	<td>
        		<fieldset>
				<legend>
				<?php echo JText::_( 'Configuration' );?>
                </legend>
				<?php
				echo $this->params->render( 'params','config' );
				?>
           		</fieldset>            
          				</td>
                        </tr>
                    <tr>
                    	<td>
                        <fieldset>
				<legend>
				<?php echo JText::_( 'panel' );?>
                </legend>
				<?php
				echo $this->params->render( 'params','panel' );
				?>
           		</fieldset>  
                        </td>
                    </tr>
                </table>
                
                </td>
           
           
           <td width="48%" valign="top">  
            	<table width="100%" border="0">
				<tr>

   				<td width="100%" valign="top">         
            	<fieldset>
				<legend>
					<?php echo JText::_( 'Property Details' );?>
                </legend>
                
      			<?php
				echo $this->params->render( 'params', 'details' );
				?>      
          		</fieldset>           
           </td>
           </tr>
           <tr>
           <td>
                <fieldset>
				<legend>
				<?php echo JText::_( 'Module Search' );?>
                </legend>
      			<?php
				echo $this->params->render( 'params', 'advanced' );
				?>      
           		</fieldset>           
            </td>
			</tr>
    		<tr>
           <td>
              <fieldset>
			  <legend>
				<?php echo JText::_( 'MetaData' );?>
              </legend>
      			<?php
				echo $this->params->render( 'params', 'advancedmd' );
				?>      
           	  </fieldset>           
            </td>
            		
	</tr>
    
    <tr>
           <td>
              <fieldset>
			  <legend>
				<?php echo JText::_( 'Reviews' );?>
              </legend>
      			<?php
				echo $this->params->render( 'params', 'comments' );
				?>      
           	  </fieldset>           
            </td>
            		
	</tr>
    
    
    
     <tr>
           <td>
              <fieldset>
			  <legend>
				<?php echo JText::_( 'Booking' );?>
              </legend>
      			<?php
				echo $this->params->render( 'params', 'booking' );
				?>      
           	  </fieldset>           
            </td>
            		
	</tr>
    
    
    
    
</table>
</td>
			</tr>    
		</table>
	
		<input type="hidden" name="id" value="<?php echo $this->component->id;?>" />
		<input type="hidden" name="component" value="<?php echo $this->component->option;?>" />		
		<input type="hidden" name="option" value="<?php echo $option; ?>" />       
		<input type="hidden" name="table" value="configuration" />
		<input type="hidden" name="task" value="saveconfig" />
		<?php echo JHTML::_( 'form.token' ); ?>


	</form>
    </td>
		</tr>
			</table> 