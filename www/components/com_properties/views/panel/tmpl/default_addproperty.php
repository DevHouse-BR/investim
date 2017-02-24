<?php defined('_JEXEC') or die('Restricted access'); 
$TableName = JRequest::getCmd('table');
$document =& JFactory::getDocument();
$user =& JFactory::getUser();
$agent_id=$this->datos->agent_id;
JHTML::_('behavior.tooltip');
jimport('joomla.html.pane');
JHTML::_('behavior.formvalidation');
if(!JRequest::getVar('Itemid')){$Itemid = 0;}
else{$Itemid = JRequest::getVar('Itemid');}
$tab=JRequest::getVar('tab');
$pane =& JPane::getInstance('tabs', array('startOffset'=>$tab)); 
//print_r($this->user);
$lang =& JFactory::getLanguage();
$Itemid = JRequest::getVar('Itemid');
$user_add_locality=$this->params->get('user_add_locality');

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$AnchoMiniatura=$params->get('AnchoMiniatura',100);
$AltoMiniatura=$params->get('AltoMiniatura',75);
$AutoPublish=$params->get('AutoPublish',1);
$RegisteredAutoPublish=$params->get('RegisteredAutoPublish',1);
$ActivarDescripcion=$params->get('ActivarDescripcion');
$ActivarDetails=$params->get('ActivarDetails');
$ActivarContactar=$params->get('ActivarContactar');
$ActivarReservas=$params->get('ActivarReservas');
$ActivarMapa=$params->get('ActivarMapa');
$ActivarPanoramica=$params->get('ActivarPanoramica');
$ActivarVideo=$params->get('ActivarVideo');
$UseCountry=$params->get('UseCountry');
$UseCountryDefault=$params->get('UseCountryDefault');
$UseState=$params->get('UseState');
$UseStateDefault=$params->get('UseStateDefault');
$UseLocality=$params->get('UseLocality');
$UseLocalityDefault=$params->get('UseLocalityDefault');

if($this->datos){
//echo 'datos';
}else{
//echo 'NO datos';
$this->datos->cyid=$UseCountryDefault;
$this->datos->sid=$UseStateDefault;
$this->datos->lid=$UseLocalityDefault;

}
 ?>
<script type="text/javascript">
function ChangeState(a){
var progressSt = $('progressSt');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajax&format=raw&task=ChangeState",
{method: 'get',
onRequest: function(){progressSt.setStyle('visibility', 'visible');},
onComplete: function(){progressSt.setStyle('visibility', 'hidden');},
update: $('AjaxState'), 
data: 'Country_id='+a}).request();
			}	
			
function ChangeLocality(a,c){
var progressL = $('progressL');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajax&format=raw&task=ChangeLocality",
{method: 'get',
onRequest: function(){progressL.setStyle('visibility', 'visible');},
onComplete: function(){progressL.setStyle('visibility', 'hidden');},
update: $('AjaxLocality'), 
data: 'State_id='+a+'&Zid='+c}).request();
			}	
			
function AddLocality(a){
var progressAL = $('progressAL');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajax&format=raw&task=AddLocality",
{method: 'get',
onRequest: function(){progressAL.setStyle('visibility', 'visible');},
onComplete: function(){progressAL.setStyle('visibility', 'hidden');},
update: $('AjaxAddLocality'), 
data: 'State_id='+a}).request();
			}	
			
function irUrlPanel(){
document.getElementById('task').value = 'cancel';
document.adminForm.task.value = 'cancel';
window.location.href='<?php echo JRoute::_( 'index.php?option=com_properties&view=panel' );?>';
}		

function SaveLocality(a){
b=document.getElementById('nameL').value ;
c=document.getElementById('zipL').value ;
if (c <= 0) {alert("error post code")}
else {if (b=='') {alert("error name")}
else {
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajax&format=raw&task=SaveLocality",
{method: 'get',
onComplete: function(){ChangeLocality(a,c);},
update: $('AjaxAddLocality'), 
data: 'sid='+a+'&lid='+b+'&zipL='+c}).request();
			}			
};};		




	function ChangeType(a){
var progressT = $('progressT');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajax&format=raw&task=ChangeType",
{method: 'get',
onRequest: function(){progressT.setStyle('visibility', 'visible');},
onComplete: function(){progressT.setStyle('visibility', 'hidden');},
update: $('AjaxType'), 
data: 'Category_id='+a}).request();
			}
	
</script>	
	
	<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton) {
	var form = document.adminForm;
	/*document.getElementById('task').value=pressbutton;*/
	/*var type = form.type.value;*/

	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}
	if ( document.getElementById('name').value == "") {
		if(confirm("<?php echo JText::_( 'Please select a Name', true ); ?>")) 
{return false;} else{return false;}

	}
				else if( document.getElementById('cid').value == 0 ){
 		if(confirm( "<?php echo JText::_( 'Please select a Category', true ); ?>" )) 
{return false;} else{return false;}

	}
				else if( document.getElementById('type').value == 0 ){
 		if(confirm( "<?php echo JText::_( 'Please select a Type', true ); ?>" )) 
{return false;} else{return false;}

	} 
	/*
				else if( document.getElementById('cyid').value == 0 ){
 		if(confirm( "<?php echo JText::_( 'Please select a Country', true ); ?>" )) 
{return false;} else{return false;}

	} 
				else if( document.getElementById('sid').value == 0 ){
 		if(confirm( "<?php echo JText::_( 'Please select a State', true ); ?>" )) 
{return false;} else{return false;}

	} 

				else if( document.getElementById('lid').value == 0 ){
 		if(confirm( "<?php echo JText::_( 'Please select a Locality', true ); ?>" )) 
{return false;} else{return false;}

	} 	
	*/
	
			 else {
	
	/*document.getElementById('task').value=pressbutton;*/
	var progressSave = $('progressSave');
	progressSave.setStyle('visibility', 'visible');
	
		submitform( pressbutton );
		return;
	}
}
//-->
</script>
		
<script language="javascript" type="text/javascript">
<!--
function submitdate(date,task) {
var url = 'index.php?option=com_properties&controller=availables&task='+task+'&id=<?PHP echo $this->datos->id;?>&date='+date;
window.location.href=url;
}
//-->
</script>
<script language="javascript" type="text/javascript">
<!--
function submitFromTo(task) {
	
var from = document.getElementById('from').value;
var to = document.getElementById('to').value;	
var url = 'index.php?option=com_properties&controller=availables&task='+task+'&id=<?PHP echo $this->datos->id;?>&from='+from+'&to='+to;
window.location.href=url;	
	
}
//-->
</script>

<?php
$uri =& JFactory::getURI();
		$ret = $uri->toString();
//?ret=base64_encode($ret)JRoute::_(  )
//?option=com_properties&view=panel&Itemid='.$Itemid
?>

<form action="<?php echo JRoute::_('index.php'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data" >
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







<?php
$UseFlagAddProperty=1;
if($UseFlagAddProperty){
echo '<div id="flagaddproperty" style="float: right;"></div>';
}
?>
</div>
<div class="clr"></div>
</div>	



<?php //echo date('d-m-Y', strtotime($listdate)); ?>
<div class="col width-100">
<?php

//print_r( $this->ProductAgent);

echo $pane->startPane( 'pane' );
echo $pane->startPanel( JText::_( 'Details'), 'panel1' );
?>


<?php if($this->datos->id){ ?>

<div class="botones">
<div class="mytoolbar"style="float: right; width:100%">
<div style="float: right;">

<?php $linkR = JRoute::_( 'index.php?option='.$option.'&view=panel&task=editrates&product_id='. $this->datos->id);?>            
<button type="button" class="mybutton icon-32-rates" onclick="location.href='<?php echo $linkR; ?>';"><span><?php echo JText::_('Rates'); ?></span></button>	 
<?php $linkI = JRoute::_( 'index.php?option='.$option.'&view=panel&task=editimages&product_id='. $this->datos->id);?> 
<button type="button" class="mybutton icon-32-images" onclick="location.href='<?php echo $linkI; ?>';"><span><?php echo JText::_('Images'); ?></span></button>	 

</div>
</div>
<div class="clr"></div>
</div>
<div style="clear:both"></div>

<?php } ?>





	<fieldset class="adminform">    
	<legend><?php echo JText::_( 'Details' ); ?></legend>
			<table class="admintable" border="0">
				<tr>
					<td class="key"><label for="name"><?php echo JText::_( 'Reference' ); ?>:</label></td>
					<td>
						<input class="inputbox small" type="text" name="ref" id="ref" size="10" maxlength="255" value="<?php echo $this->datos->ref; ?>" />                       
					</td>
                    
                   <td rowspan="5">
 <?php
if($this->datos->id){                   
?>

<div style="float:left; width:180px; height:140px; border: 1px solid #CCCCCC; margin: 5px; padding: 5px; text-align:center;">
<?php

$img_path = JURI::root().'images/properties/images/'.$this->datos->id.'/';
$peque_path = JURI::root().'images/properties/images/thumbs/'.$this->datos->id.'/';

if($this->Images[0]){

echo '<img width="100px" style="padding: 2px; border: 1px solid #CCCCCC; margin:5px;" src="'.$peque_path.$this->Images[0]->name.'" />';

}
?>    
    
<?php $linkI = JRoute::_( 'index.php?option='.$option.'&view=panel&task=editimages&product_id='. $this->datos->id);?>   
  <div style="width:100%;">
 <a href="<?php echo $linkI;  ?>"><?php echo JText::_('Edit Images'); ?></a>        
 </div>  
 
       </div>
<?php
}              
?>                    
                   </td>                                  
                    
                    
                    
                    
				</tr>
                <tr>
					<td class="key"><label for="name"><?php echo JText::_( 'Title' ); ?>:</label></td>
					<td>
<input class="inputbox required" type="text" name="name" id="name" size="40" maxlength="255" value="<?php echo htmlspecialchars($this->datos->name); ?>" />
					</td>
				</tr>
				
				<tr>
					<td class="key"><label for="featured"><?php echo JText::_( 'Featured' ); ?>:</label></td>
					<td >
<?php $chequeado0 = $this->datos->featured ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->datos->featured ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="featured" id="featured0" value="0" <?php echo $chequeado0;?> type="radio">
	<label for="featured0"><?php echo JText::_( 'No' ); ?></label>
	<input name="featured" id="featured1" value="1" <?php echo $chequeado1;?> type="radio">
	<label for="featured1"><?php echo JText::_( 'Yes' ); ?></label>  
					</td>
				</tr>
                <?php
//echo '<b>User Group : '.$user->gid.'</b>';				
				if($user->gid==18){
                if($RegisteredAutoPublish==1){
				 ?>
                <tr>
					<td class="key"><label for="published"><?php echo JText::_( 'Published' ); ?>:</label></td>
					<td >
<?php $chequeado0 = $this->datos->published ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->datos->published ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="published" id="published0" value="0" <?php echo $chequeado0;?> type="radio">
	<label for="published0"><?php echo JText::_( 'No' ); ?></label>
	<input name="published" id="published1" value="1" <?php echo $chequeado1;?> type="radio">
	<label for="published1"><?php echo JText::_( 'Yes' ); ?></label>  
					</td>
				</tr>
                 <?php
				 }
				 }elseif($user->gid>18)
				 {
				 
				 if($AutoPublish==1){
				 ?>
                <tr>
					<td class="key"><label for="published"><?php echo JText::_( 'Published' ); ?>:</label></td>
					<td >
<?php $chequeado0 = $this->datos->published ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->datos->published ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="published" id="published0" value="0" <?php echo $chequeado0;?> type="radio">
	<label for="published0"><?php echo JText::_( 'No' ); ?></label>
	<input name="published" id="published1" value="1" <?php echo $chequeado1;?> type="radio">
	<label for="published1"><?php echo JText::_( 'Yes' ); ?></label>  
					</td>
				</tr>
                 <?php
				 }
				 }
				 
                 ?>
                <tr>
					<td class="key"><label for="details market"><?php echo JText::_( 'Details Market' ); ?>:</label></td>
					<td >
                                       
<?php 
if($this->datos->available == 0){$select0 = JText::_( 'selected="selected"' );}
if($this->datos->available == 1){$select1 = JText::_( 'selected="selected"' );}
if($this->datos->available == 2){$select2 = JText::_( 'selected="selected"' );}
if($this->datos->available == 3){$select3 = JText::_( 'selected="selected"' );}
if($this->datos->available == 4){$select4 = JText::_( 'selected="selected"' );}
if($this->datos->available == 5){$select5 = JText::_( 'selected="selected"' );}
if($this->datos->available == 6){$select6 = JText::_( 'selected="selected"' );}
?>
                   
         <select name="available" style="width:150px;"> 
			<option <?php echo $select0;?> value="0"><?php echo JText::_( 'DETAILS_MARKET0' ); ?></option>
            <option <?php echo $select1;?> value="1"><?php echo JText::_( 'DETAILS_MARKET1' ); ?></option>
            <option <?php echo $select2;?> value="2"><?php echo JText::_( 'DETAILS_MARKET2' ); ?></option>
            <option <?php echo $select3;?> value="3"><?php echo JText::_( 'DETAILS_MARKET3' ); ?></option>
            <option <?php echo $select4;?> value="4"><?php echo JText::_( 'DETAILS_MARKET4' ); ?></option>
            <option <?php echo $select5;?> value="5"><?php echo JText::_( 'DETAILS_MARKET5' ); ?></option>
            <option <?php echo $select6;?> value="6"><?php echo JText::_( 'DETAILS_MARKET6' ); ?></option>
         </select>
                  
                    
					</td>
				</tr>
                
                <tr>        
<td width="100" class="key">
		<label for="category"><?php echo JText::_( 'Category' ); ?>:</label>
			</td>
<td colspan="2">
<?php //echo CatTreeHelper::Parent( $this->datos,'category' ); ?>
<?php echo CatTreeHelper::ParentCategoryType( $this->datos,'category','products' ); ?>
</td>
		</tr> 
        

        
        
        
        
        <tr>
					<td class="key"><label for="name"><?php echo JText::_( 'Type' ); ?>:</label></td>
	<td colspan="2">
                     <?php //echo SelectHelper::SelectType( $this->datos,'type',$this->datos->type); ?>	
                     
 					<div id="AjaxType" style="float:left">
			<?php
			$row->id=0;
		  $row->parent = $this->datos->cid;
		  $row->type = $this->datos->type;
		  echo SelectHelper::SelectType( $row,'type','form_products' );  ?>
          			  
              		</div>
              		<div id="progressT"></div>              
              
                     </td>				    
				</tr>
                
                
                
                
                
                
                
                
   			<tr>        
<td width="100" class="key">
		<label for="varies categories"><?php echo JText::_( 'Varies Categories' ); ?>:</label>
			</td>
<td>

<?php echo CatTreeHelper::MultiParent( $this->datos,'category' ); ?>
<?php //echo SelectHelper::MultiParent( $this->datos,'category' ); ?>
</td>
		</tr>       
<!--<input type="hidden" name="selections[]" id="selections[]" value="" />   -->

 <?php 
 if($UseCountry==0){
 ?>
 <input type="hidden" name="cyid" id="cyid" value="<?php echo $UseCountryDefault; ?>" />
 <?php
}else{ 
?>

<tr>
					<td class="key"><label for="country"><?php echo JText::_( 'Country' ); ?>:</label></td>
					<td>
                    <?php 
					echo SelectHelper::SelectAjaxPaises( $this->datos,'country',$UseCountry); 
					?>
                </td> 
                  </tr>
<?php  }?>                 


 <?php 
 if($UseState==0){
  ?>
 <input type="hidden" name="sid" id="sid" value="<?php echo $UseStateDefault; ?>" />
 <?php
}else{ 
?>                  
				<tr> 
                              
                <td class="key"><label for="state"><?php echo JText::_( 'State' ); ?>:</label></td>
					<td>
                    <div id="AjaxState" style="float:left">
<?php 
		  $row->id=0;
		  $row->cyid = $this->datos->cyid;
		  $row->sid = $this->datos->sid;
		  echo SelectHelper::SelectAjaxStates( $row,'states',$UseState ); 
		  ?>
</div>        <div id="progressSt"></div>          
                    </td>
                    <td>
					<?php echo JHTML::_('tooltip', JText::_( 'Change Country, State and after, Locality.' )); ?>
					
					</td>                
                </tr>
<?php  }?>                   
                
                
 <?php 
 if($UseLocality==0){
   ?>
 <input type="hidden" name="lid" id="lid" value="<?php echo $UseLocalityDefault; ?>" />
 <?php
}else{ 
?>                
				<tr><td class="key"><?php echo JText::_( 'Locality' ); ?>:</td>
					<td>
	        <div id="AjaxLocality" style="float:left">     
            <?php 
		  $row->id=0;
		  $row->cyid = $this->datos->cyid;
		  $row->sid = $this->datos->sid;
		  $row->lid = $this->datos->lid;
		  echo SelectHelper::SelectAjaxLocalities( $row,'localities',$UseLocality ); 
		  ?>             
  </div>
  <div id="AjaxAddLocality" style="float:left"> </div>
     
     
                    
  <div id="progressL"></div>                
      <div id="progressAL"></div>                  
                                               
					</td>
				</tr>
<?php  }?> 
                
                <tr><td class="key"><?php echo JText::_( 'Address' ); ?>:</td>
					<td>
						<input class="inputbox" type="text" name="address" id="address" size="30" maxlength="255" value="<?php echo $this->datos->address; ?>" />                        
					</td>
				</tr>
                <tr>
					<td class="key"><label for="zip code"><?php echo JText::_( 'Zip Code' ); ?>:</label></td>
					<td >
                    <input class="inputbox small" type="text" name="postcode" id="postcode" size="10" maxlength="255" value="<?php echo $this->datos->postcode; ?>" />						
					</td>
				</tr>
  
                
                
               <?php if($ActivarPanoramica){ ?>
                
                 <tr>
                    <td class="key"><label>
								<?php echo JText::_( 'Upload Panoramic' ); ?>:
							</label></td>
                    <td>
                    <input class="input_box" id="panoramic" name="panoramic" size="20" type="file" />
                    </td>
                    <td><?php echo JHTML::_('tooltip', JText::_( 'TOOLTIP_CHANGE_PANORAMIC')); ?></td>
                    </tr>
                  
                	
                    <tr>
					<td class="key"><label for="image"><?php echo JText::_( 'Panoramic' ); ?>:</label></td>
					<td >
                   <?php 
				 
			$img_path = JURI::root().'images/properties/panoramics/'.$this->datos->panoramic;?>
<span class="editlinktip hasTip" title="<?php echo $this->datos->image1;?>::
<img border=&quot;1&quot; src=&quot;<?php echo $img_path; ?>&quot; name=&quot;imagelib&quot; alt=&quot;<?php echo JText::_( 'No preview available'.$img_path ); ?>&quot; width=&quot;206&quot; height=&quot;100&quot; />">
<a class="modal" rel="{handler: 'iframe', size: {x: 640, y: 480}}" href="<?php echo $img_path; ?>"><?php echo $this->datos->panoramic; ?></a></span>						
					</td>
				</tr>
                <?php } ?>  
                
                <?php if($ActivarVideo){ ?>	
                <tr>
	<td class="key"><label for="extra"><?php echo JText::_( 'Video' ); ?>:</label></td>
	<td><textarea class="inputbox" name="video" id="video" rows="4" cols="27"><?php echo $this->datos->video;?></textarea></td>
    <td><?php echo JHTML::_('tooltip', JText::_( 'TOOLTIP_VIDEO')); ?></td>
</tr>
                	
                    
                 <?php } ?>  
                    
                    
                    	
				<?php
				if ($this->datos->id) {
					?>
					<tr>
						<td class="key">
							<label>
								<?php echo JText::_( 'ID' ); ?>:
							</label>
						</td>
						<td>
							<strong><?php echo $this->datos->id;?></strong>
						</td>
					</tr> 
					<?php
				}
				?>  
				</table>
			</fieldset>  
<?php 

echo $pane->endPanel();
echo $pane->startPanel( JText::_( 'Featured'), 'panel2' );
?>
	<fieldset class="adminform">    
	<legend><?php echo JText::_( 'Caractristics' ); ?></legend>
				<table class="admintable">
              <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'DESCRIPTION' ); ?>:</label></td>
					<td >
                    <textarea  class="inputbox"  name="description" cols="35" rows="10"><?php echo $this->datos->description; ?></textarea>
                    						
					</td>
                    <td><?php echo JHTML::_('tooltip', JText::_( 'TOOLTIPSHORTDESC')); ?></td>
				</tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Price' ); ?>:</label></td>
					<td >
                    <input class="inputbox small" type="text" name="price" id="price" size="10" maxlength="255" value="<?php echo $this->datos->price; ?>" />						
					</td>
				</tr>                
                                
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Years' ); ?>:</label></td>
					<td >
                    <input class="inputbox" type="text" name="years" id="years" size="3" maxlength="255" value="<?php echo $this->datos->years; ?>" />						
					</td>
				</tr>
                 <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Bedrooms' ); ?>:</label></td>
					<td >
                    <input class="inputbox" type="text" name="bedrooms" id="bedrooms" size="3" maxlength="255" value="<?php echo $this->datos->bedrooms; ?>" />						
					</td>
				</tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Bathrooms' ); ?>:</label></td>
					<td >
                    <input class="inputbox" type="text" name="bathrooms" id="bathrooms" size="3" maxlength="255" value="<?php echo $this->datos->bathrooms; ?>" />						
					</td>
				</tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Garage' ); ?>:</label></td>
					<td >
                    <input class="inputbox" type="text" name="garage" id="garage" size="3" maxlength="255" value="<?php echo $this->datos->garage; ?>" />						
					</td>
                    <td>
					<?php echo JHTML::_('tooltip', JText::_( 'Cantidad de autos que entran en el garage.' )); ?>
					
					</td>
				</tr>     
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Total Area' ); ?>:</label></td>
					<td >
                    <input class="inputbox" type="text" name="area" id="area" size="3" maxlength="255" value="<?php echo $this->datos->area; ?>" />						
					</td>
				</tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Covered Area' ); ?>:</label></td>
					<td>
                    <input class="inputbox" type="text" name="covered_area" id="covered_area" size="3" maxlength="255" value="<?php echo $this->datos->covered_area; ?>" />						
					</td>
				</tr>  
                
                
                
 <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'extra1' ); ?>:</label></td>
					<td>               
                
                <?php 
if($this->datos->extra1 == 0){$extra1_0 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 1){$extra1_1 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 2){$extra1_2 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 3){$extra1_3 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 4){$extra1_4 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 5){$extra1_5 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 6){$extra1_6 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 7){$extra1_7 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 8){$extra1_8 = JText::_( 'selected="selected"' );}
if($this->datos->extra1 == 9){$extra1_9 = JText::_( 'selected="selected"' );}
?>
                   
         <select name="extra1" style="width:150px;"> 
			<option <?php echo $extra1_0;?> value="0"><?php echo JText::_( 'extra1_0' ); ?></option>
            <option <?php echo $extra1_1;?> value="1"><?php echo JText::_( 'extra1_1' ); ?></option>
            <option <?php echo $extra1_2;?> value="2"><?php echo JText::_( 'extra1_2' ); ?></option>
            <option <?php echo $extra1_3;?> value="3"><?php echo JText::_( 'extra1_3' ); ?></option>
            <option <?php echo $extra1_4;?> value="4"><?php echo JText::_( 'extra1_4' ); ?></option>
            <option <?php echo $extra1_5;?> value="5"><?php echo JText::_( 'extra1_5' ); ?></option>
            <option <?php echo $extra1_6;?> value="6"><?php echo JText::_( 'extra1_6' ); ?></option>
            <option <?php echo $extra1_7;?> value="7"><?php echo JText::_( 'extra1_7' ); ?></option>
            <option <?php echo $extra1_8;?> value="8"><?php echo JText::_( 'extra1_8' ); ?></option>
            <option <?php echo $extra1_9;?> value="9"><?php echo JText::_( 'extra1_9' ); ?></option>
         </select>
         
  </td>
				</tr>         
                       
<?php
//$extra[1]=$this->datos->extra1;
$extra[2]=$this->datos->extra2;
$extra[3]=$this->datos->extra3;
$extra[4]=$this->datos->extra4;
$extra[5]=$this->datos->extra5;
$extra[6]=$this->datos->extra6;
$extra[7]=$this->datos->extra7;
$extra[8]=$this->datos->extra8;
$extra[9]=$this->datos->extra9;
$extra[10]=$this->datos->extra10;
$extra[11]=$this->datos->extra11;
$extra[12]=$this->datos->extra12;
$extra[13]=$this->datos->extra13;
$extra[14]=$this->datos->extra14;
$extra[15]=$this->datos->extra15;
$extra[16]=$this->datos->extra16;
$extra[17]=$this->datos->extra17;
$extra[18]=$this->datos->extra18;
$extra[19]=$this->datos->extra19;
$extra[20]=$this->datos->extra20;
$extra[21]=$this->datos->extra21;
$extra[22]=$this->datos->extra22;
$extra[23]=$this->datos->extra23;
$extra[24]=$this->datos->extra24;
$extra[25]=$this->datos->extra25;
$extra[26]=$this->datos->extra26;
$extra[27]=$this->datos->extra27;
$extra[28]=$this->datos->extra28;
$extra[29]=$this->datos->extra29;  
$extra[30]=$this->datos->extra30; 
$extra[31]=$this->datos->extra31;
$extra[32]=$this->datos->extra32;
$extra[33]=$this->datos->extra33;
$extra[34]=$this->datos->extra34;
$extra[35]=$this->datos->extra35;
$extra[36]=$this->datos->extra36;
$extra[37]=$this->datos->extra37;
$extra[38]=$this->datos->extra38;
$extra[39]=$this->datos->extra39;  
$extra[40]=$this->datos->extra40;
$extra[41]=$this->datos->extra41;
$extra[42]=$this->datos->extra42;
$extra[43]=$this->datos->extra43;
$extra[44]=$this->datos->extra44;
$extra[45]=$this->datos->extra45;
$extra[46]=$this->datos->extra46;
$extra[47]=$this->datos->extra47;
$extra[48]=$this->datos->extra48;
$extra[49]=$this->datos->extra49;
$extra[50]=$this->datos->extra50;
$extra[51]=$this->datos->extra51;
$extra[52]=$this->datos->extra52;
$extra[53]=$this->datos->extra53;
$extra[54]=$this->datos->extra54;
$extra[55]=$this->datos->extra55;
$extra[56]=$this->datos->extra56;
$extra[57]=$this->datos->extra57;
$extra[58]=$this->datos->extra58;
$extra[59]=$this->datos->extra59;
$extra[60]=$this->datos->extra60;
$extra[61]=$this->datos->extra61;
$extra[62]=$this->datos->extra62;
$extra[63]=$this->datos->extra63;
$extra[64]=$this->datos->extra64;
$extra[65]=$this->datos->extra65;
$extra[66]=$this->datos->extra66;
$extra[67]=$this->datos->extra67;
$extra[68]=$this->datos->extra68;
$extra[69]=$this->datos->extra69;
$extra[70]=$this->datos->extra70;
$extra[71]=$this->datos->extra71;
$extra[72]=$this->datos->extra72;
$extra[73]=$this->datos->extra73;
$extra[74]=$this->datos->extra74;
$extra[75]=$this->datos->extra75;
$extra[76]=$this->datos->extra76;
$extra[77]=$this->datos->extra77;
$extra[78]=$this->datos->extra78;
$extra[79]=$this->datos->extra79;
$extra[80]=$this->datos->extra80;
$extra[81]=$this->datos->extra81;
$extra[82]=$this->datos->extra82;
$extra[83]=$this->datos->extra83;
$extra[84]=$this->datos->extra84;
$extra[85]=$this->datos->extra85;
$extra[86]=$this->datos->extra86;
$extra[87]=$this->datos->extra87;
$extra[88]=$this->datos->extra88;
$extra[89]=$this->datos->extra89;
$extra[90]=$this->datos->extra90;
$extra[91]=$this->datos->extra91;
$extra[92]=$this->datos->extra92;
$extra[93]=$this->datos->extra93;
$extra[94]=$this->datos->extra94;
$extra[95]=$this->datos->extra95;
$extra[96]=$this->datos->extra96;
$extra[97]=$this->datos->extra97;
$extra[98]=$this->datos->extra98;
$extra[99]=$this->datos->extra99;

for ($x=2;$x<41;$x++){
if(JText::_('extra'.$x)!='HIDE'){
echo '<tr>
	<td class="key"><label for="extra'.$x.'">'. JText::_( 'extra'.$x ).'</label></td>
<td>
';
$chequeado0 = $extra[$x] ? JText::_( '' ) : JText::_( 'checked="checked"' );
$chequeado1 = $extra[$x] ? JText::_( 'checked="checked"' ) : JText::_( '' );
echo'
<input name="extra'.$x.'" id="extra'.$x.'_0" value="0" '.$chequeado0.' type="radio">
	<label for="extra'.$x.'_0">'.JText::_( 'No' ).'</label>
	<input name="extra'.$x.'" id="extra'.$x.'_1" value="1" '.$chequeado1.' type="radio">
	<label for="extra'.$x.'_1">'.JText::_( 'Yes' ).'</label> 

</td></tr>
';
}
}
for ($x=41;$x<81;$x++){
if(JText::_('extra'.$x)!='HIDE'){
echo '
<tr>
	<td class="key"><label for="extra">'. JText::_( 'extra'.$x ).'</label></td>
	<td><input class="text_area" type="text" name="extra'.$x.'" id="extra'.$x.'" size="20" maxlength="255" value="'.$extra[$x].'" /></td>
</tr>
';
}
}

for ($x=81;$x<91;$x++){
if(JText::_('extra'.$x)!='HIDE'){
echo '
<tr>
	<td class="key"><label for="extra">'. JText::_( 'extra'.$x ).'</label></td>
	<td><textarea name="extra'.$x.'" id="extra'.$x.'" rows="4" cols="30">'.$extra[$x].'</textarea></td>
</tr>';
}
}


for ($x=91;$x<100;$x++){
if(JText::_('extra'.$x)!='HIDE'){
echo '<tr>
	<td class="key"><label for="extra">'. JText::_( 'extra'.$x ).'</label></td>
<td><input class="text_area" type="text" name="extra'.$x.'" id="extra'.$x.'" size="20" maxlength="255" value="'.$extra[$x].'" />
</td></tr>
';
}
}

?>






<?php 
$mostrar_extra11_in_select=0;
if($mostrar_extra11_in_select==1)
{
echo '<tr><td>';
if($this->datos->extra11 == 0){$select0 = JText::_( 'selected="selected"' );}
if($this->datos->extra11 == 1){$select1 = JText::_( 'selected="selected"' );}
if($this->datos->extra11 == 2){$select2 = JText::_( 'selected="selected"' );}
if($this->datos->extra11 == 3){$select3 = JText::_( 'selected="selected"' );}
if($this->datos->extra11 == 4){$select4 = JText::_( 'selected="selected"' );}
if($this->datos->extra11 == 5){$select5 = JText::_( 'selected="selected"' );}
if($this->datos->extra11 == 6){$select6 = JText::_( 'selected="selected"' );}
?>
                   
         <select name="extra11" style="width:150px;"> 
   			<option <?php echo $select0;?> value="0"><?php echo JText::_( '0_extra11' ); ?></option>
            <option <?php echo $select1;?> value="1"><?php echo JText::_( '1_extra11' ); ?></option>
            <option <?php echo $select2;?> value="2"><?php echo JText::_( '2_extra11' ); ?></option>
            <option <?php echo $select3;?> value="3"><?php echo JText::_( '3_extra11' ); ?></option>
            <option <?php echo $select4;?> value="4"><?php echo JText::_( '4_extra11' ); ?></option>
            <option <?php echo $select5;?> value="5"><?php echo JText::_( '5_extra11' ); ?></option>
            <option <?php echo $select6;?> value="6"><?php echo JText::_( '6_extra11' ); ?></option>
         </select>
		 
		 
		 
		 
<?php 
echo '</td></tr>';
//// this is for replace in default_property.php 
//// to show extra11 select result
//
//   if($row->extra11){echo JText::_(extra11).' : '.JText::_($row->available.'_extra11');} 
//
}
?>





      
				</table>
			</fieldset> 
<?php 
echo $pane->endPanel();

if($ActivarDescripcion){
echo $pane->startPanel( 'Description', 'panel3' );
?>
<table class="adminform"><tr><td>
<?php
		$editor = &JFactory::getEditor();		
echo $editor->display('text', $this->datos->text, '100%', '400', '60', '20');
?>
</td></tr></table>            
<?php
echo $pane->endPanel();
}
if($ActivarImages){
echo $pane->startPanel( JText::_( 'Images'), 'panel2' );

$img_path = JURI::root().'images/properties/';
$peque_path = JURI::root().'images/properties/peques/';
?>
<input type="hidden" name="borrar" id="borrar" value="" />     

				<legend><?php echo JText::_( Images ); ?></legend>
<table class="admintable">
<tr>
	<td >    
		
<?php 
$img_dato[1]=$this->datos->image1;
$img_dato[2]=$this->datos->image2;
$img_dato[3]=$this->datos->image3;
$img_dato[4]=$this->datos->image4;
$img_dato[5]=$this->datos->image5;
$img_dato[6]=$this->datos->image6;
$img_dato[7]=$this->datos->image7;
$img_dato[8]=$this->datos->image8;
$img_dato[9]=$this->datos->image9;
$img_dato[10]=$this->datos->image10;
$img_dato[11]=$this->datos->image11;
$img_dato[12]=$this->datos->image12;
$img_dato[13]=$this->datos->image13;
$img_dato[14]=$this->datos->image14;
$img_dato[15]=$this->datos->image15;
$img_dato[16]=$this->datos->image16;
$img_dato[17]=$this->datos->image17;
$img_dato[18]=$this->datos->image18;
$img_dato[19]=$this->datos->image19;
$img_dato[20]=$this->datos->image20;
$img_dato[21]=$this->datos->image21;
$img_dato[22]=$this->datos->image22;
$img_dato[23]=$this->datos->image23;
$img_dato[24]=$this->datos->image24;

$img_des[1]=$this->datos->image1desc;
$img_des[2]=$this->datos->image2desc;
$img_des[3]=$this->datos->image3desc;
$img_des[4]=$this->datos->image4desc;
$img_des[5]=$this->datos->image5desc;
$img_des[6]=$this->datos->image6desc;
$img_des[7]=$this->datos->image7desc;
$img_des[8]=$this->datos->image8desc;
$img_des[9]=$this->datos->image9desc;
$img_des[10]=$this->datos->image10desc;
$img_des[11]=$this->datos->image11desc;
$img_des[12]=$this->datos->image12desc;
$img_des[13]=$this->datos->image13desc;
$img_des[14]=$this->datos->image14desc;
$img_des[15]=$this->datos->image15desc;
$img_des[16]=$this->datos->image16desc;
$img_des[17]=$this->datos->image17desc;
$img_des[18]=$this->datos->image18desc;
$img_des[19]=$this->datos->image19desc;
$img_des[20]=$this->datos->image20desc;
$img_des[21]=$this->datos->image21desc;
$img_des[22]=$this->datos->image22desc;
$img_des[23]=$this->datos->image23desc;
$img_des[24]=$this->datos->image24desc;

for($z=2;$z<25;$z++){

$img_peque[$z]=$peque_path.'peque_'.$img_dato[$z];
$img=$img_path.$img_dato[$z];

?>

<div style="float:left; width:140px; height:200px; border: 1px solid #CCCCCC; margin: 5px; padding: 5px; text-align:center;">
<?php

echo '<div style="width:180px;">'.JText::_( 'Image '.$z );
if($img_dato[$z]!=''){
	
echo ' ('.$img_dato[$z]. ') </div>'; 
$rel=' rel="{handler: \'iframe\', size: {x: 640, y: 480}}"';
$style = ' style="padding: 2px;border: 1px solid grey; width: '.$AnchoMiniatura.'px;"';		
	
echo '<a class="modal" href="'.$img.'" title="'. $row->titulo.'"  >';
echo '<img src="'. $img_peque[$z] .'" alt="'. $row->titulo.'" '.$rel.$style.' />';
echo '</a>';
?>
<br />




<a href="<?php echo JRoute::_( 'index.php?option=com_properties&view=panel&task=removeImgProperty&id='.$this->datos->id.'&img='.$z);?>" title="<?php echo JText::_( 'Delete Image' ); ?>">
<?php echo JText::_( 'Delete' ); ?>
<img src="images/properties/tools/publish_x.png" alt="<?php echo JText::_( 'Delete Image' ); ?>" border="0"></a>
<?php echo '<br>'.JText::_( 'Image Description' ); ?>
<input class="textarea" type="text" name="<?php echo 'image'.$z.'desc'; ?>" id="<?php echo 'image'.$z.'desc'; ?>" size="15" maxlength="255" value="<?php echo $img_des[$z]; ?>" />	
 <?php       
 }else{
?>
</div>
<br />
<img src=<?php echo $peque_path.'noimage.jpg' .$style;?> />
<?php echo '<br>'.JText::_( 'Image Description' ); ?>
<input class="text_area" type="text" name="<?php echo 'image'.$z.'desc'; ?>" id="<?php echo 'image'.$z.'desc'; ?>" size="15" maxlength="255" value="" />	
 <br><input type="file" size="1" name="files[<?php echo $z; ?>]" value=""/>
 <?php  } ?>
       </div>

                    
   <?php  } ?>                  
    </td>
</tr> 
</table>          


<?php 
echo $pane->endPanel();
}
if($ActivarMapa){
echo $pane->startPanel( JText::_( 'Map'), 'panel4' );
?>
<fieldset class="adminform">
				<legend><?php echo JText::_( 'Coordinates' ); ?></legend>


                
                
<table class="admintable"><tr><td>

                
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Latitude' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="lat" id="lat" size="20" maxlength="255" value="<?php echo $this->datos->lat; ?>" />
						
					</td>
                    <td rowspan="2"><?php echo JHTML::_('tooltip', JText::_( 'Latitude y longitude to center a property in map.')); ?></td>
				</tr>
                
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Longitude' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="lng" id="lng" size="20" maxlength="255" value="<?php echo $this->datos->lng; ?>" />
						
					</td>
                    
				</tr>

                
                
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Get' ).' '.JText::_( 'Coord' ); ?>:</label></td>
					<td >
                   <strong><a href="http://maps.google.com/maps?ll=40.418103,-3.713722&spn=0.015683,0.027466&z=15&key=ABQIAAAAFHktBEXrHnX108wOdzd3aBRcHlBTpYb_p9Hgr3VvSklsWletSxRtPnaBg-v2NXy9jFYSYS_aNOHN1Q&oi=map_misc&ct=api_logo" target="_blank" title="mapa" >  <?php echo JText::_( 'Get' ).' '.JText::_( 'Coord' ); ?></a></strong>
						
					</td>
                    <td><?php echo JHTML::_('tooltip', JText::_( 'Coord googlemap for show location your property')); ?></td>
				</tr>
              
</table>
</fieldset>



<?php				            	

echo $pane->endPanel();
}



if($ActivarReservas){
echo $pane->startPanel( 'Available', 'panel6' );



?>


<table class="admintable">
<tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Use Booking System' ); ?>:</label></td>
					<td >
<?php $use_booking0 = $this->datos->use_booking ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $use_booking1 = $this->datos->use_booking ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="use_booking" id="use_booking0" value="0" <?php echo $use_booking0;?> type="radio">
	<label for="use_booking0"><?php echo JText::_( 'No' ); ?></label>
	<input name="use_booking" id="use_booking1" value="1" <?php echo $use_booking1;?> type="radio">
	<label for="use_booking1"><?php echo JText::_( 'Yes' ); ?></label>					</td>
				    <td >&nbsp;</td>
                </tr>
                <tr><td></td></tr>
</table>


<?php
if($this->datos->use_booking){
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'calendar.php' );
?>
<div class="calendarios">

<table class="select_calendar" border="0"><tr><td>
      <?php echo JText::_('From'); ?> 
  </td><td>      
      <?php echo JHTML::_('calendar', $this->datos->fecha, 'from', 'from', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'20',  'maxlength'=>'19')); ?>      
 </td><td>     
      <?php echo JText::_('To'); ?> 
    </td><td>    
      <?php echo JHTML::_('calendar', $this->datos->fecha, 'to', 'to', '%Y-%m-%d', array('class'=>'inputbox', 'size'=>'20',  'maxlength'=>'19')); ?>
</td><td>        
	
<a href="#" onclick="javascript: submitFromTo('FromToA')" class="toolbar">
<span class="icon-32-apply" title="Apply"></span>
<?php echo JText::_('Available'); ?>
</a>
<a href="#" onclick="javascript: submitFromTo('FromToUna')" class="toolbar">
<span class="icon-32-apply" title="Apply"></span>
<?php echo JText::_('Unavailable'); ?>
</a>
</td></tr></table>

 </div>		
 
 
 

<table class="admintable" width="100%">
	<tr>
		<td>
    <?php echo Calendar::ShowCalendar( $this->datos,'',3,1 ); ?>        
        </td>
	</tr>
</table>




<?php			
	            	
}



echo $pane->endPanel();



}
echo $pane->endPane();

?>


















<div class="botones">
<div class="mytoolbar">
<div style="float: right;">
			<button type="button" class="mybutton icon-32-new" onclick="submitbutton('save2new')"><span><?php echo JText::_('Save and new'); ?></span></button>
            <button type="button" class="mybutton icon-32-apply" onclick="submitbutton('apply')"><span><?php echo JText::_('Apply'); ?></span></button>
            <button type="button" class="mybutton icon-32-save" onclick="submitbutton('save')"><span><?php echo JText::_('Save'); ?></span></button>
			<button type="button" class="mybutton icon-32-cancel" onclick="submitbutton('cancel')"><span><?php echo JText::_('Close'); ?></span></button>            
</div>
</div>
<div class="clr"></div>
</div>	
	
<div class="clr"></div>
<input type="hidden" name="option" value="com_properties" />
<input type="hidden" name="view" value="panel" />
<input type="hidden" name="id" value="<?php echo $this->datos->id; ?>" />
<input type="hidden" name="table" value="products" />

<input type="hidden" name="lang" value="<?php echo substr($lang->getTag(),0,2); ?>" />
<input type="hidden" name="controller" value="product" />

<input type="hidden" id="agent_id" name="agent_id" value="<?php echo $user->id; ?>" />
<input type="hidden" id="agent" name="agent" value="<?php echo $user->username; ?>" />
<?php
if($this->datos->listdate){$listdate = $this->datos->listdate;}else{$listdate =date("Y-m-d");}
$refresh_time =date("Y-m-d H:i:s");

?>

<input type="hidden" id="refresh_time" name="refresh_time" value="<?php echo $refresh_time; ?>" />

<input type="hidden" id="listdate" name="listdate" value="<?php echo $listdate; ?>" />


<input type="hidden" id="checked_out_time" name="checked_out_time" value="<?php echo date("Y-m-d"); ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</div>	
    </form>
    
	<br />
    
    
   
    
    



