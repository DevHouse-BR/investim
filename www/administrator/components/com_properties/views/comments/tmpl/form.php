<?php defined('_JEXEC') or die('Restricted access'); 
$TableName = 'comments';
$component_name = 'properties';
JHTML::_('behavior.tooltip');

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );

$useComment2=$params->get('useComment2');
$useComment3=$params->get('useComment3');
$useComment4=$params->get('useComment4');
$useComment5=$params->get('useComment5');
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
</script>

<?php
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'menu_left.php' );
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'select.php' );
?>
<table width="100%">
	<tr>
		<td align="left" width="200px" valign="top">
<?php echo MenuLeft::ShowMenuLeft();?>

		</td>
        <td align="left" valign="top">


<form action="index.php" method="post" name="adminForm" id="adminForm"  enctype="multipart/form-data">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Add Comment' ); ?></legend>
			<table class="admintable">
				<tr>        
					<td width="50%" >
               			<table>
                        
                            <tr>
               					<td align="right" class="key">
								<label for="name"><?php echo JText::_( 'Product' ); ?>:</label>
								</td>
								<td>
								<?php echo SelectHelper::SelectProduct( $this->datos,'products' ); ?>
								</td>
							</tr>  
                                              
                            
                			<tr>
								<td width="100" align="right" class="key">
								<label for="name">
								<?php echo JText::_( 'Name' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="name" id="name" size="60" maxlength="250" value="<?php echo $this->datos->name;?>" />
								</td>
							</tr>
                            
                           
                           <tr>
								<td width="100" align="right" class="key">
								<label for="name">
								<?php echo JText::_( 'Title' ); ?>:
								</label>
								</td>
								<td>
 								<textarea class="text_area" type="text" name="title" id="title"   cols="34" rows="2"><?php echo $this->datos->title; ?></textarea>
								</td>
							</tr>
                            <tr>
								<td width="100" align="right" class="key">
								<label for="name">
								<?php echo JText::_( 'comment' ); ?>:
								</label>
								</td>
								<td>
 								<textarea class="text_area" type="text" name="comment" id="comment"   cols="34" rows="2"><?php echo $this->datos->comment; ?></textarea>
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
		/*						 
		$f=explode('-',$this->datos->date);
$fecha=$f[2].'-'.$f[1].'-'.$f[0];
*/
$fecha=	$this->datos->date;	
		
		 echo JHTML::_('calendar', $fecha, 'date', 'date', '%d-%m-%Y', array('class'=>'inputbox2', 'size'=>'20',  'maxlength'=>'19')); ?>
         
								
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
								<input class="text_area" type="text" name="ordering" id="ordring" size="20" maxlength="255" value="<?php echo $this->datos->ordering; ?>" />
								</td>
							</tr>
                 
 
 
          					<tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'email' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="email" id="email" size="20" maxlength="255" value="<?php echo $this->datos->email; ?>" />
								</td>
							</tr>

 
 
           					<tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'voted' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="voted" id="voted" size="20" maxlength="255" value="<?php echo $this->datos->voted; ?>" />
								</td>
							</tr>
                            
                            <?php $usedStars=1;
							$Stars=$this->datos->star1;
							?>
 

          					<tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'star1' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="star1" id="star1" size="20" maxlength="255" value="<?php echo $this->datos->star1; ?>" />
								</td>
							</tr>                            
                            
                            <?php if($useComment2){?>
                            <tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'star2' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="star2" id="star2" size="20" maxlength="255" value="<?php echo $this->datos->star2; ?>" />
								</td>
							</tr>   
                            <?php 
							$usedStars++;
							$Stars+=$this->datos->star2;
							 }?>
    						 <?php if($useComment3){?>   
                            <tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'star3' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="star3" id="star3" size="20" maxlength="255" value="<?php echo $this->datos->star3; ?>" />
								</td>
							</tr>     
                            <?php $usedStars++; 
							$Stars+=$this->datos->star3;
							 }?>
    						 <?php if($useComment4){?>   
                            <tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'star4' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="star4" id="star4" size="20" maxlength="255" value="<?php echo $this->datos->star4; ?>" />
								</td>
							</tr>      
                            <?php $usedStars++; 
							$Stars+=$this->datos->star4;
							 }?>
    						 <?php if($useComment5){?>  
                            <tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'star5' ); ?>:
								</label>
								</td>
								<td>
								<input class="text_area" type="text" name="star5" id="star5" size="20" maxlength="255" value="<?php echo $this->datos->star5; ?>" />
								</td>
							</tr> 
                             <?php $usedStars++;
							$Stars+=$this->datos->star5;
							  }?>     
                            <tr>
								<td class="key">
								<label for="name">
								<?php echo JText::_( 'stars' ); ?>:
								</label>
								</td>
								<td>
                                <?php


$Stars=$Stars/$usedStars;
								?>
								<?php echo $Stars; ?>
                     
								</td>
							</tr>                     
						
			</table>
            
            </td></tr></table>
            
           
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