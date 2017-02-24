<?php defined('_JEXEC') or die('Restricted access'); 

$option = JRequest::getCmd('option');
JHTML::_('behavior.tooltip');
jimport('joomla.html.pane');
$product_id = JRequest::getVar('product_id');
$returnproductid = JRequest::getVar('product_id');
$pane =& JPane::getInstance('tabs', array('startOffset'=>0)); 
//print_r($this->rate);
?>

<?php

require_once( JPATH_COMPONENT.DS.'helpers'.DS.'select.php' );
?>

        
<form action="index.php" method="post" name="adminForm" id="adminForm">

<input type="hidden" name="task" id="task" value="" />
<input type="hidden" name="Itemid" id="Itemid" value="<?php echo $Itemid;?>" />




<div class="botones">
<div class="mytoolbar">
<div id="progressSave" style="float: left; width:200px;"></div>

<div style="float: right;">
			<button type="button" class="mybutton icon-32-new" onclick="submitbutton('save2new')"><span><?php echo JText::_('Save and new'); ?></span></button>
            <button type="button" class="mybutton icon-32-apply" onclick="submitbutton('apply')"><span><?php echo JText::_('Apply'); ?></span></button>
            <button type="button" class="mybutton icon-32-save" onclick="submitbutton('save')"><span><?php echo JText::_('Save'); ?></span></button>
			<button type="button" class="mybutton icon-32-cancel" onclick="submitbutton('cancel')"><span><?php echo JText::_('Close'); ?></span></button>            
</div>

</div>
<div class="clr"></div>
</div>	

<div style="clear:both"></div>


<div class="col100">




	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Rate Details' ); ?></legend>
		<table class="admintable" align="left">


			<tr>
               					<td align="right" class="key">
								<label for="name"><?php echo JText::_( 'Product' ); ?>:</label>
								</td>
								<td>
								<?php 
								if($product_id){$this->rate->productid=$product_id;}
								echo SelectHelper::SelectProduct( $this->rate,'products' ); ?>
								</td>
			</tr>  
                            
                            
         <tr>
			<td width="100" align="right" class="key">
				<label for="name">
							<?php echo JText::_( 'Rate Title' ); ?>:
						</label>
			</td>
			<td>            
            <textarea class="text_area" type="text" name="title" id="title"   cols="34" rows="1"><?php echo $this->rate->title; ?></textarea>
				
			</td>
		</tr>    
 
 
 
		<tr>
        	<td width="100" align="right" class="key">
      <label for="from"><?php echo JText::_('From'); ?> :</label>
  			</td><td>      
      <?php echo JHTML::_('calendar', $this->rate->validfrom, 'validfrom', 'validfrom', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'20',  'maxlength'=>'19')); ?>      
 			</td><td>
		</tr>
        <tr>
        	<td width="100" align="right" class="key">  
      <label for="to"><?php echo JText::_('To'); ?> :</label>
    		</td><td>    
      <?php echo JHTML::_('calendar', $this->rate->validto, 'validto', 'validto', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'20',  'maxlength'=>'19')); ?>
			</td>
        </tr>
       
        <tr>
			<td width="100" align="right" class="key">
				<label for="rateperday">
							<?php echo JText::_( 'x Day' ); ?>:
						</label>
			</td>
			<td>
				<input class="text_area" type="text" name="rateperday" id="rateperday" size="3" maxlength="250" value="<?php echo $this->rate->rateperday;?>" />
			</td>
		</tr>   
        
         <tr>    
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Week Only' ); ?>:
						</label>
					</td>
                    					<td>
<?php $weekonly0 = $this->rate->weekonly ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $weekonly1 = $this->rate->weekonly ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="weekonly" id="weekonly0" value="0" <?php echo $weekonly0;?> type="radio">
	<label for="weekonly0"><?php echo JText::_( 'No' ); ?></label>
	<input name="weekonly" id="pweekonly1" value="1" <?php echo $weekonly1;?> type="radio">
	<label for="weekonly"><?php echo JText::_( 'Yes' ); ?></label>  
					</td>
				</tr>    
                
                
        <tr>
					<td class="key">
						<label for="week">
							<?php echo JText::_( 'Week' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="week" id="week" size="3" maxlength="5" value="<?php echo $this->rate->week; ?>" />
					</td>
				</tr>   
                
                <tr>
					<td class="key">
						<label for="rateperweek">
							<?php echo JText::_( 'x Week' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="rateperweek" id="rateperweek" size="3" maxlength="5" value="<?php echo $this->rate->rateperweek; ?>" />
					</td>
				</tr>  

        <tr>    
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Published' ); ?>:
						</label>
					</td>
                    					<td>
<?php $chequeado0 = $this->rate->published ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->rate->published ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
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
					<td>
                    <?php if($this->rate->ordering){$order_value=$this->rate->ordering;}else{$order_value='';} ?>
                    
						<input class="text_area" type="text" name="ordering" id="ordring" style="width:220px;" size="20" maxlength="255" value="<?php echo $order_value; ?>" />
					</td>
				</tr>            
	</table>
	</fieldset>
</div>
<div class="clr"></div>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="table" value="<?php echo $TableName; ?>" />
<input type="hidden" name="id" value="<?php echo $this->rate->id; ?>" />
<input type="hidden" name="controller" value="rates" />
<input type="hidden" name="productid" value="<?php echo $product_id; ?>" />
<input type="hidden" name="returnproductid" value="<?php echo $returnproductid; ?>" />
</form>
<?php 
jimport( 'joomla.application.application' );
global $mainframe, $option;
$mainframe->setUserState("$option.filter_order", NULL);
?>