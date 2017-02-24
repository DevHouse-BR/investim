<?php defined('_JEXEC') or die('Restricted access'); 
$option = JRequest::getCmd('option');
JHTML::_('behavior.tooltip');
JHTML::_('behavior.tooltip');
jimport('joomla.html.pane');
//1st Parameter: Specify 'tabs' as appearance 
//2nd Parameter: Starting with third tab as the default (zero based index)
//open one!
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
        
        
        
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<div class="col100">

		<table class="admintable">
			<tr>
            	<td valign="top">
				<fieldset class="adminform">
				<legend><?php echo JText::_( 'Details' ); ?></legend>
				<table>   
         			<tr>
						<td class="key" valign="top">
							<label for="name">
								<?php echo JText::_( 'Id' ); ?>:
							</label>
						</td>
						<td >
							<?php echo $this->User->id; ?>
						</td>
					</tr> 
            		<tr>
						<td class="key" valign="top">
							<label for="name">
								<?php echo JText::_( 'Name' ); ?>:
							</label>
						</td>
						<td >
							<?php echo $this->User->name; ?>
						</td>
					</tr>    
                	<tr>
						<td width="100" align="right" class="key">
							<label for="name">
								<?php echo JText::_( 'Username' ); ?>:
							</label>
						</td>
						<td>
							<?php echo $this->User->username;?> 
						</td>
					</tr> 
                	<tr>
						<td class="key">
							<label for="name">
								<?php echo JText::_( 'Mail' ); ?>:
							</label>
						</td>
						<td >
							<?php echo $this->User->email; ?>
						</td>
					</tr>                  
				</table>
			</fieldset>
  			</td>
		</tr>     
		<tr>
      		<td valign="top">		
                <fieldset class="adminform">
   				<legend><?php echo JText::_( 'Shor List' ); ?></legend>  
                <table>  	         
             		<tr>
                    <td class="key" valign="top"><label>
								<?php echo JText::_( 'Properties in short list' ); ?>:
							</label></td>
                    <td>
                   
                   <?php 
				   foreach($this->ShortList as $ShortList){
				   echo $ShortList->propid.' : '.$ShortList->name_product.'<br>';
				   }
				   
				   ?>
                    
                    </td>
                    </tr>
				</table> 
                </fieldset> 
            </td>
            </tr>
                
                
                
            <tr>
                <td>
                <fieldset class="adminform">
   	<legend><?php echo JText::_( 'Votes' ); ?></legend>  
                <table>  	         
             		<tr>
                    <td class="key" valign="top"><label>
								<?php echo JText::_( 'Properties voted' ); ?>:
							</label></td>
                    <td>
                   
                   <?php 
				   
				   foreach($this->Votes as $Votes){
				   echo '<font color="#990000"> ( <b>'.$Votes->rating.'</b> ) </font>'.$Votes->product_id.'  :  '.$Votes->name_product.'<br>';
				   }
				   
				   ?>
                    
                    </td>
                    </tr>
				</table> 
                     </fieldset> 
                     </td>
                </tr>
                
                
                
                
                
                
                  <tr>
                <td>
                <fieldset class="adminform">
   	<legend><?php echo JText::_( 'Reviews' ); ?></legend>  
                <table>  	         
             		<tr>
                    <td class="key" valign="top"><label>
								<?php echo JText::_( 'Comments' ); ?>:
							</label></td>
                    <td>
                   
                   <?php
				   
				   foreach($this->Reviews as $Reviews){
				   echo '<font color="#990000"> ( <b>'.$Votes->rating.'</b> ) </font>'.$Votes->product_id.'  :  '.$Votes->name_product.'<br>';
				   }
				   
				   ?>
                    
                    </td>
                    </tr>
				</table> 
                     </fieldset> 
                     </td>
                </tr>                
			</table> 
		</td>
    </tr>            
</table>       
       
        
</div>

<div class="clr"></div>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="table" value="<?php echo $TableName; ?>" />
<input type="hidden" name="id" value="<?php echo $this->User->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="profiles" />
</form>
	</td>
		</tr>
			</table> 