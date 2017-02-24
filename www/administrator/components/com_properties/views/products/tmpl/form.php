<?php defined('_JEXEC') or die('Restricted access'); 
$option = JRequest::getCmd('option');
JHTML::_('behavior.tooltip');
jimport('joomla.html.pane');
JHTML::_('behavior.formvalidation');
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'calendar.php' );
$tab=JRequest::getVar('tab');
$pane =& JPane::getInstance('tabs', array('startOffset'=>$tab)); 

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
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
//print_r($this->user);

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
				else if( document.getElementById('cid').value == 0 ){
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
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>
<script type="text/javascript">
function ChangeState(a){
var progressS = $('progressS');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajax&format=raw&task=ChangeState",
{method: 'get',
onRequest: function(){progressS.setStyle('visibility', 'visible');},
onComplete: function(){progressS.setStyle('visibility', 'hidden');},
update: $('AjaxState'), 
data: 'Country_id='+a}).request();
			}	
			
function ChangeLocality(a){
var progressL = $('progressL');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajax&format=raw&task=ChangeLocality",
{method: 'get',
onRequest: function(){progressL.setStyle('visibility', 'visible');},
onComplete: function(){progressL.setStyle('visibility', 'hidden');},
update: $('AjaxLocality'), 
data: 'State_id='+a}).request();
			}
	
	
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



<script type="text/javascript">
function ShowListRates(a){
/*confirm('¿Está seguro?'+a);*/
var progressSLR = $('progressSLR');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=rates&format=raw&task=ShowListRates",
{method: 'get',
onRequest: function(){progressSLR.setStyle('visibility', 'visible');},
onComplete: function(){progressSLR.setStyle('visibility', 'hidden');},
update: $('div_addrates'), 
data: '&productid='+a}).request();
			}	
</script>


<script type="text/javascript">

function publishAjax(a,b){
/*confirm('¿Está seguro?'+idM);*/
var progressPA = $('progressPA');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=rates&format=raw&task=publishAjax",
{method: 'get',
onRequest: function(){progressPA.setStyle('visibility', 'visible');},
onComplete: function(){progressPA.setStyle('visibility', 'hidden');},
update: $('publishAjax'+a),
data: '&productid='+a+'&change='+b}).request();
			}

function deleteAjax(a){
/*confirm('¿Está seguro?'+a);*/
var progressDA = $('progressDA');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=rates&format=raw&task=removeAjax",
{method: 'get',
onRequest: function(){progressDA.setStyle('visibility', 'visible');},
onComplete: function(){progressDA.setStyle('visibility', 'hidden');},
update: $('div_addrates'),
data: '&rateid='+a}).request();
			}

function ShowAddRate(a,b){
var progressSAR = $('progressSAR');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=rates&format=raw&task=ShowAddRate",
{method: 'get',
onRequest: function(){progressSAR.setStyle('visibility', 'visible');},
onComplete: function(){progressSAR.setStyle('visibility', 'hidden');},
update: $('div_addrates'), 
data: '&product_id='+a+'&rate_id='+b}).request();
			}	


function AddRate(){
/*confirm('¿Está seguro?'+idM);*/
var progressAR = $('progressAR');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=rates&format=raw&task=AddRate",
{method: 'post',
onRequest: function(){progressAR.setStyle('visibility', 'visible');},
onComplete: function(){progressAR.setStyle('visibility', 'hidden');},
update: $('div_addrates'),
data: $('adminFormAddRate')}).request();}

function jSelectArticle(id, title, object) {
			document.getElementById(object + '_id').value = id;
			document.getElementById(object + '_name').value = title;
			
			document.getElementById('parent').value = id;
			
			document.getElementById('sbox-window').close();
		}
</script>

<div id="progressSLR"></div>
<div id="progressSAR"></div>
<div id="progressAR"></div>
<?php if($this->datos->id){?>
<!--<div style="width:100%; float:left;border: 1px solid #CCCCCC;">
<table>
	<tr>
    	<td align="center">
		<?php echo '<a href="#" onclick="ShowListRates('.$this->datos->id.')">'.JText::_( 'Show Rates' ).'</a>';?>
		</td>
        
        <td align="center">                
        <?php
			 $link 		= JRoute::_( 'index.php?option=com_properties&view=rates&productid='.$this->datos->id);	
			  echo '<a href="'.$link.'" >'.JText::_( 'Edit Rates' ).'</a>';?> 
                
		</td>   
        
        
		<td align="center">                
        <?php
			 $link 		= JRoute::_( 'index.php?option=com_properties&view=rates&layout=form&task=edit&productid='.$this->datos->id.'&cid[]=0'. $row->id);	
			  echo '<a href="'.$link.'" >'.JText::_( 'Add Rate' ).'</a>';?> 
                
		</td>   
        
        
        <td align="center">                
        <?php
			 $link 		= JRoute::_( 'index.php?option=com_properties&controller=rates&task=addWeekRange&productid='.$this->datos->id.'&cid[]=0'. $row->id);	
			  echo '<a href="'.$link.'" >'.JText::_( 'Add Week Range' ).'</a>';?> 
                
		</td>    
        
             
	</tr>
    
    
    
    
    
    
</table>
</div>-->

<div id="div_addrates" style="float:left; width:100%;">
</div>
<?php } ?>
        
        
<form action="index.php" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
<?php if($this->datos->agent_id){$agent_id = $this->datos->agent_id;}else{$agent_id =$this->user->id;}?>
<input type="hidden" id="agent_id" name="agent_id" value="<?php echo $agent_id; ?>" />
<?php if($this->datos->agent){$agent_name = $this->datos->agent;}else{$agent_name =$this->user->username;}?>
<input type="hidden" id="agent" name="agent" value="<?php echo $this->user->username; ?>" />
<?php 
if($this->datos->listdate){$listdate = $this->datos->listdate;}else{$listdate =date("Y-m-d");}
$refresh_time =date("Y-m-d H:i:s");
//$listdate = $this->datos->listdate ? date("Y-m-d") : $this->datos->listdate;
?>
<input type="hidden" id="refresh_time" name="refresh_time" value="<?php echo $refresh_time; ?>" />

<input type="hidden" id="listdate" name="listdate" value="<?php echo $listdate; ?>" />


<div class="col width-100" style="width:100%;">
<?php
echo $pane->startPane( 'pane' );
echo $pane->startPanel(JText::_( 'Details' ), 'panel1' );
?>
	<fieldset class="adminform">    
	<legend><?php echo JText::_( 'Details' ); ?></legend>
			<table class="admintable" border="0">
            
            
            
            
           <!-- <tr>
	<td class="paramlist_key" width="40%">
		<span class="editlinktip">
			<label id="urlparamsid-lbl" for="urlparamsid" class="hasTip">
				<?php echo JText::_( 'Parent Product' ); ?>
			</label>
		</span>
	</td>
    
	<td class="paramlist_value">
	<div style="float: left;">
		<input style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;" id="id_name" value=" <?php echo '['.$this->datos->parent.'] '.$this->ParentProduct->name;?>" type="text" size="60">
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
        
        
        <div class="button2-left">
        <div class="blank">
     
        
        <a href="#" onclick="javascript: document.adminForm.parent.value='0';document.adminForm.id_name.value='0';"><?php echo JText::_( 'No Parent' ); ?></a>
        </div>
        </div>



	</td>
</tr>-->





				<tr>
					<td width="100" class="key"><label for="name"><?php echo JText::_( 'Reference' ); ?>:</label></td>
					<td>
						<input class="text_area" type="text" name="ref" id="ref" size="60" maxlength="255" value="<?php echo $this->datos->ref; ?>" />
                    </td>
                    <td rowspan="5" valign="top">
                    
                    
                    
                    


<div style="float:left; width:160px; height:100px; border: 1px solid #CCCCCC; margin: 5px; padding: 5px; text-align:center;">

<?php
$img_path = JURI::root().'images/properties/images/'.$this->datos->id.'/';
$peque_path = JURI::root().'images/properties/images/thumbs/'.$this->datos->id.'/';

if($this->Images[0]){

echo '<img width="100px" style="padding: 2px; border: 1px solid #CCCCCC; margin:5px;" src="'.$peque_path.$this->Images[0]->name.'" />';

}
?>    
    
<?php $linkI = JRoute::_( 'index.php?option='.$option.'&view=images&product_id='. $this->datos->id);?>
 <div style="width:100%;">
 <a href="<?php echo $linkI;  ?>"><?php echo JText::_('Edit Images'); ?></a>        
 </div>       


       </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    </td>
			      </tr>
                <tr>
					<td class="key"><label for="name"><?php echo JText::_( 'Title' ); ?>:</label></td>
					<td>
                        
                        <textarea class="inputbox required" name="name" id="name"  cols="34" rows="3"><?php echo $this->datos->name; ?></textarea>
                    </td>
                    
			   </tr>
                  
                  			<tr>
			<td align="right" class="key">
				<label for="name">
							<?php echo JText::_( 'Alias' ); ?>:
						</label>
			</td>
			<td>
				<input class="text_area" type="text" name="alias" id="alias" size="60" maxlength="250" value="<?php echo $this->datos->alias;?>" />
			</td>
           
		</tr> 
        
 
 
 
 
 
 


       
       
       
       
              
				
				
                
                <tr>        
<td align="right" class="key">
		<label for="name"><?php echo JText::_( 'Category' ); ?>:</label>			</td>
<td>
<?php echo CatTreeHelper::ParentCategoryType( $this->datos,'category','products' ); ?></td>
		
                </tr> 
                
                
                
                <tr>
					<td class="key"><label for="name"><?php echo JText::_( 'Type' ); ?>:</label></td>
					<td width="260" >
                     <?php //echo SelectHelper::SelectType( $this->datos,'type',$this->datos->type); ?>	
                     
 					<div id="AjaxType" style="float:left">
                    
                    <?php 
		  $row->id=0;
		  $row->parent = $this->datos->cid;
		  $row->type = $this->datos->type;
		  echo SelectHelper::SelectType( $row,'type','form_products' ); 
		  ?>              
              
              		</div>
              		<div id="progressT"></div>              
                     </td>
				    
				</tr>
                
                
                
   			<!--<tr>        
<td align="right" class="key">
		<label for="name"><?php echo JText::_( 'Categories' ); ?>:</label>			</td>
<td>

<?php echo CatTreeHelper::MultiParent( $this->datos,'category' ); ?></td>
		<td></td>
   			</tr>       -->
        
<tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Country' ); ?>:</label></td>
					<td>
                    <?php echo SelectHelper::SelectAjaxPaises( $this->datos,'country',$this->datos->cyid); ?>              
                      </td>   
				    <td rowspan="3"><div id="progressccc"></div>
                    <?php echo JHTML::_('tooltip', JText::_( 'Change Country, State and after, Locality.' )); ?>
                    </td>
<tr>                
      <td class="key"><label for="catid"><?php echo JText::_( 'State' ); ?>:</label></td>
		<td>
          <div id="AjaxState" style="float:left">
          
          <?php 
		  $row->id=0;
		  $row->cyid = $this->datos->cyid;
		  $row->sid = $this->datos->sid;
		  echo SelectHelper::SelectAjaxStates( $row,'states',$this->datos->sid ); 
		  ?>
          
              </div>
              <div id="progressS"></div></td>

				</tr>
				<tr><td class="key"><?php echo JText::_( 'Locality' ); ?>:</td>
					<td>
	      <div id="AjaxLocality" style="float:left">     
          <?php 
		  $row->id=0;
		  $row->cyid = $this->datos->cyid;
		  $row->sid = $this->datos->sid;
		  $row->lid = $this->datos->lid;
		  echo SelectHelper::SelectAjaxLocalities( $row,'localities','form_products' ); 
		  ?>
          </div>
          
          <div id="progressL"></div>
          	</td>
			      </tr>
                <tr><td class="key"><?php echo JText::_( 'Address' ); ?>:</td>
					<td colspan="2">
						<input class="text_area" type="text" name="address" id="address" size="100" maxlength="255" value="<?php echo $this->datos->address; ?>" />					</td>
			      </tr>
				 <tr>
					<td class="key">Complemento:</td>
					<td><input type="text" name="extra53" maxlength="255"  value="<?=$this->datos->extra53?>" style="width:300px" /></td>
				</tr>
				
				
				
				
				
				<tr>
		<td class="key">Bairro:</td>
		<td><input type="text" name="extra54" id="extra54" maxlength="255" value="<?=$this->datos->extra54?>" style="width:300px" /></td>
	</tr>
	<tr>
		<td class="key">Telefone:</td>
		<td><input type="text" name="extra55" id="extra55" value="<?=$this->datos->extra55?>" maxlength="255" style="width:300px" /></td>
	</tr>
	<tr>
		<td class="key">Responsável:</td>
		<td><input type="text" name="extra52" id="extra52" maxlength="255" value="<?=$this->datos->extra52?>" style="width:300px" /></td>
	</tr>
	<tr>
		<td class="key">Email:</td>
		<td><input type="text" name="extra56" id="extra56" value="<?=$this->datos->extra56?>" maxlength="255" style="width:300px" /></td>
	</tr>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                <!--<tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Zip Code' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="postcode" id="postcode" size="15" maxlength="10" value="<?php echo $this->datos->postcode; ?>" />					</td>
				    <td >&nbsp;</td>
                </tr>-->
  
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Featured' ); ?>:</label></td>
					<td >
<?php $chequeado0 = $this->datos->featured ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->datos->featured ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="featured" id="featured0" value="0" <?php echo $chequeado0;?> type="radio">
	<label for="featured0"><?php echo JText::_( 'No' ); ?></label>
	<input name="featured" id="featured1" value="1" <?php echo $chequeado1;?> type="radio">
	<label for="featured1"><?php echo JText::_( 'Yes' ); ?></label>					</td>
				    <td >&nbsp;</td>
                </tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Published' ); ?>:</label></td>
					<td >
<?php $chequeado0 = $this->datos->published ? JText::_( '' ) : JText::_( 'checked="checked"' );?>
<?php $chequeado1 = $this->datos->published ? JText::_( 'checked="checked"' ) : JText::_( '' );?>
                    <input name="published" id="published0" value="0" <?php echo $chequeado0;?> type="radio">
	<label for="published0"><?php echo JText::_( 'No' ); ?></label>
	<input name="published" id="published1" value="1" <?php echo $chequeado1;?> type="radio">
	<label for="published1"><?php echo JText::_( 'Yes' ); ?></label>					</td>
				    <td >&nbsp;</td>
                </tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Details Market' ); ?>:</label></td>
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
         </select>					</td>
				    <td >&nbsp;</td>
                </tr>
                 <!--<tr>
                    <td class="key"><label>
								<?php echo JText::_( 'Upload Panoramic' ); ?>:
							</label></td>
                    <td colspan="2">
                    <input class="input_box" id="panoramic" name="panoramic" size="43" type="file" />                    <?php echo JHTML::_('tooltip', JText::_( 'TOOLTIP_CHANGE_PANORAMIC')); ?></td>
                    </tr>
				
                	
                    <tr>
					<td class="key"><label for="image"><?php echo JText::_( 'Panoramic' ); ?>:</label></td>
					<td >
                   <?php 
				 
			$img_path = $mainframe->getSiteURL() .'images/properties/panoramics/'.$this->datos->panoramic;?>
<span class="editlinktip hasTip" title="<?php echo $this->datos->image1;?>::
<img border=&quot;1&quot; src=&quot;<?php echo $img_path; ?>&quot; name=&quot;imagelib&quot; alt=&quot;<?php echo JText::_( 'No preview available'.$img_path ); ?>&quot; width=&quot;206&quot; height=&quot;100&quot; />">
<a class="modal" rel="{handler: 'iframe', size: {x: 640, y: 480}}" href="<?php echo $img_path; ?>"><?php echo $this->datos->panoramic; ?></a></span>					</td>
				    <td >&nbsp;</td>
                  </tr>	-->
                		 <tr>
	<td class="key"><label for="extra"><?php echo JText::_( 'Video' ); ?>:</label></td>
	<td><textarea name="video" id="video" rows="4" cols="30"><?php echo $this->datos->video;?></textarea></td>
    <td><?php echo JHTML::_('tooltip', JText::_( 'TOOLTIP_VIDEO')); ?></td>
</tr>
				<?php
				if ($this->datos->id) {
					?>
					<tr>
						<td class="key">
							<label>
								<?php echo JText::_( 'ID' ); ?>:							</label>						</td>
						<td>
							<strong><?php echo $this->datos->id;?></strong>						</td>
					    <td>&nbsp;</td>
					</tr> 
					<?php
				}
				?>
              

<!--<tr>
					<td  class="key"><label for="name"><?php echo JText::_( 'Agent' ); ?>:</label></td>
					<td>
           <?php echo $this->datos->agent_id;?> : <?php echo SelectHelper::SelectAgent($agent_id); ?>                       
					
                      </td>
                    
				    <td>&nbsp;</td>
</tr>  -->
      <!--  <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Name' ); ?>:						</label>					</td>
					<td >
                    
										</td>
				    <td >&nbsp;</td>
        </tr>  -->
				</table>
  </fieldset>  
<?php 
echo $pane->endPanel();
echo $pane->startPanel( JText::_( 'Features' ), 'panel2' );
?>
	<fieldset class="adminform">    
	<legend><?php echo JText::_( 'Caractristics' ); ?></legend>
	
	
	
<script language="javascript">
function MascaraCNPJ(cnpj){
		switch(cnpj.value.length){
			case 2: cnpj.value += ".";
				break;
			case 6: cnpj.value += ".";
				break;
			case 10: cnpj.value += "/";
				break;
			case 15: cnpj.value += "-";
				break;
		}
	}
	
	function moeda(z){  
		v = z.value;
		v=v.replace(/\D/g,"");  //permite digitar apenas números
		v=v.replace(/[0-9]{12}/,"inválido");   //limita pra máximo 999.999.999,99
		v=v.replace(/(\d{1})(\d{8})$/,"$1.$2");  //coloca ponto antes dos últimos 8 digitos
		v=v.replace(/(\d{1})(\d{5})$/,"$1.$2");  //coloca ponto antes dos últimos 5 digitos
		v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2");        //coloca virgula antes dos últimos 2 digitos
		z.value = v;
	}
</script>
	
	
	
	
	
<table width="100%" class="admintable">
	<tr>
		<td width="300" class="key">Razão Social:</td>
		<td><input type="text" name="extra50" id="extra50" maxlength="255" value="<?=$this->datos->extra50?>" style="width:300px" /></td>
	</tr>
	<tr>
		<td class="key">CNPJ:</td>
		<td><input type="text" name="extra51" id="extra51" onkeypress="return MascaraCNPJ(this);" maxlength="18" value="<?=$this->datos->extra51?>" style="width:300px" /></td>
	</tr>
	<tr>
		<td class="key">Skype:</td>
		<td><input type="text" name="extra57" value="<?=$this->datos->extra57?>" maxlength="255" style="width:300px" /></td>
	</tr>
	<tr>
		<td class="key">MSN:</td>
		<td><input type="text" name="extra58" value="<?=$this->datos->extra58?>" maxlength="255" style="width:300px" /></td>
	</tr>
	<tr>
		<td class="key">Constituição:</td>
		<td>
			<select name="extra59" id="extra59">
				<option value="">Selecione</option>
				<option value="Sociedade Simples"<? if($this->datos->extra59 == "Sociedade Simples") echo(" selected"); ?>>Sociedade Simples</option>
				<option value="Sociedade Limitada"<? if($this->datos->extra59 == "Sociedade Limitada") echo(" selected"); ?>>Sociedade Limitada</option>
				<option value="Sociedade Anônima"<? if($this->datos->extra59 == "Sociedade Anônima") echo(" selected"); ?>>Sociedade Anônima</option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="key">Tributação:</td>
		<td>
			<select name="extra60" id="extra60">
				<option value="">Selecione</option>
				<option value="Simples"<? if($this->datos->extra60 == "Simples") echo(" selected"); ?>>Simples</option>
				<option value="Lucro Presumido"<? if($this->datos->extra60 == "Lucro Presumido") echo(" selected"); ?>>Lucro Presumido</option>
				<option value="Lucro Real"<? if($this->datos->extra60 == "Lucro Real") echo(" selected"); ?>>Lucro Real</option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="key">Homepage:</td>
		<td><input type="text" name="extra61" value="<?=$this->datos->extra61?>" maxlength="255" style="width:300px" /></td>
	</tr>
	<tr>
		<td class="key">Lista de Ativos e Equipamentos:</td>
		<td><textarea type="text" name="extra81" maxlength="255" style="width:300px" /><?=$this->datos->extra81?></textarea></td>
	</tr>
	<tr>
		<td class="key">Valor do Estoque a Preço de Custo:</td>
		<td>R$ <input type="text" name="extra62" value="<?=$this->datos->extra62?>" maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td class="key">Linha de Produtos:</td>
		<td><textarea type="text" name="extra82" maxlength="255" /><?=$this->datos->extra82?></textarea></td>
	</tr>
	<tr>
		<td class="key">Linha de Serviços:</td>
		<td><textarea type="text" name="extra83" maxlength="255" style="width:300px" /><?=$this->datos->extra83?></textarea></td>
	</tr>
	<tr>
		<td class="key">Ano de Fundação:</td>
		<td><input type="text" name="extra63" value="<?=$this->datos->extra63?>" /></td>
	</tr>
	<tr>
		<td class="key">Motivo da Venda:</td>
		<td><textarea type="text" name="extra84" maxlength="255" style="width:300px" /><?=$this->datos->extra84?></textarea></td>
	</tr>
	<tr>
		<td class="key" rowspan="3">Volume de Vendas Anuais (3 últimos anos):</td>
		<td>R$ <input type="text" name="extra64" id="extra64" value="<?=$this->datos->extra64?>" maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td>R$ <input type="text" name="extra65" id="extra65" value="<?=$this->datos->extra65?>" maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td>R$ <input type="text" name="extra66" id="extra66" value="<?=$this->datos->extra66?>" maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td class="key">Faturamento Mensal Médio:</td>
		<td>R$ <input type="text" name="extra67" id="extra67" value="<?=$this->datos->extra67?>" maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td class="key">Lucro Bruto:</td>
		<td>R$ <input type="text" name="extra68" id="extra68" value="<?=$this->datos->extra68?>" maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td class="key">Margem de Lucro:</td>
		<td>% <input type="text" name="extra69" id="extra69" value="<?=$this->datos->extra69?>" maxlength="3" /></td>
	</tr>
	<tr>
		<td class="key">Lucro Líquido Médio:</td>
		<td>R$ <input type="text" name="extra70" value="<?=$this->datos->extra70?>" maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td class="key">Imóvel:</td>
		<td><input type="radio" name="extra1" value="1"<? if($this->datos->extra1 == "1") echo(" checked"); ?> />&nbsp;Próprio&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="extra1" value="2"<? if($this->datos->extra1 == "2") echo(" checked"); ?> />&nbsp;Alugado</td>
	</tr>
	<tr>
		<td class="key">Endividamento:</td>
		<td><textarea type="text" name="extra85" maxlength="255" /><?=$this->datos->extra85?></textarea></td>
	</tr>
	<tr>
		<td class="key">Preço de Venda:</td>
		<td>R$ <input type="text" name="extra71" value="<?=$this->datos->extra71?>" maxlength="14" onkeyup="moeda(this);" /></td>
	</tr>
	<tr>
		<td class="key">Condições de Venda ou de  Participação na Empresa:</td>
		<td><textarea type="text" name="extra86" maxlength="255" style="width:300px" /><?=$this->datos->extra86?></textarea></td>
	</tr>
	<tr>
		<td class="key">Número de Funcionários:</td>
		<td><input type="text" name="extra72" value="<?=$this->datos->extra72?>" /></td>
	</tr>
	<tr>
		<td class="key">Diferencial do Negócio:</td>
		<td><textarea type="text" name="extra87" maxlength="255" style="width:300px" /><?=$this->datos->extra87?></textarea></td>
	</tr>
</table>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
			<!--<table class="admintable">
              <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Description' ); ?>:</label></td>
					<td >
                    <textarea class="text_area" name="description" cols="35" rows="10"><?php echo $this->datos->description; ?></textarea>
                    						
					</td>
                    <td><?php echo JHTML::_('tooltip', JText::_( 'Description.')); ?></td>
				</tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Price' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="price" id="price" size="10" maxlength="255" value="<?php echo $this->datos->price; ?>" />						
					</td>
				</tr>                
                 <tr>
					<td class="key"><label for="faturamento"><?php echo JText::_( 'faturamento' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="faturamento" id="faturamento" size="10" maxlength="255" value="<?php echo $this->datos->faturamento; ?>" />						
					</td>
				</tr>            
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Years' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="years" id="years" size="3" maxlength="255" value="<?php echo $this->datos->years; ?>" />						
					</td>
				</tr>
                 <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Bedrooms' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="bedrooms" id="bedrooms" size="3" maxlength="255" value="<?php echo $this->datos->bedrooms; ?>" />						
					</td>
				</tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Bathrooms' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="bathrooms" id="bathrooms" size="3" maxlength="255" value="<?php echo $this->datos->bathrooms; ?>" />						
					</td>
				</tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Garage' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="garage" id="garage" size="3" maxlength="255" value="<?php echo $this->datos->garage; ?>" />						
					</td>
                    <td>
					<?php echo JHTML::_('tooltip', JText::_( 'Total cars in garage.' )); ?>
					
					</td>
				</tr>     
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Total Area' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="area" id="area" size="3" maxlength="255" value="<?php echo $this->datos->area; ?>" />						
					</td>
				</tr>
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Covered Area' ); ?>:</label></td>
					<td>
                    <input class="text_area" type="text" name="covered_area" id="covered_area" size="3" maxlength="255" value="<?php echo $this->datos->covered_area; ?>" />						
					</td>
				</tr> 
          </table>-->
			</fieldset> 
<?php
echo $pane->endPanel();
echo $pane->startPanel( JText::_( 'Images' ), 'panel2' );

$img_path = $mainframe->getSiteURL().'images/properties/';
$peque_path = $mainframe->getSiteURL().'images/properties/peques/';
?>



<?php if($this->datos->id){ ?>

<fieldset class="adminform">
		<legend><?php echo JText::_( 'Images' ); ?></legend>
<?php $linkI = JRoute::_( 'index.php?option='.$option.'&view=images&product_id='. $this->datos->id);?>
 <div style="width:100%;">
 <a href="<?php echo $linkI;  ?>"><?php echo JText::_('Edit Images'); ?></a>        
 </div>       
<?php

$img_path = JURI::root().'images/properties/images/'.$this->datos->id.'/';
$peque_path = JURI::root().'images/properties/images/thumbs/'.$this->datos->id.'/';

//print_r($this->Images);
if($this->Images){
foreach($this->Images as $image){
echo '<img width="100px" style="padding: 2px; border: 1px solid #CCCCCC; margin:5px;" src="'.$peque_path.$image->name.'" />';
}
}
?>


</fieldset>


<?php } ?>









<?php if($OldImages){ ?>












<input type="hidden" name="borrar" id="borrar" value="" />     
<fieldset class="adminform">
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

<div style="float:left; width:180px; height:200px; border: 1px solid #CCCCCC; margin: 5px; padding: 5px; text-align:center;">
<?php

echo '<div style="width:180px;">'.JText::_( 'Image '.$z );
if($img_dato[$z]!=''){
	
echo ' ('.$img_dato[$z]. ') </div>'; 
$rel=' rel="{handler: \'iframe\', size: {x: 640, y: 480}}"';
$style = ' style="padding: 2px;border: 1px solid grey; width: 100px;"';		
	
echo '<a class="modal" href="'.$img.'" title="'. $row->titulo.'"  >';
echo '<img src="'. $img_peque[$z] .'" alt="'. $row->titulo.'" '.$rel.$style.' />';
echo '</a>';
?>
<br />
		<a href="javascript:void(0);" onclick="javascript: document.getElementById('borrar').value = <?php echo $z; ?>;return submitbutton('delimg');" title="<?php echo JText::_( 'Delete Image' ); ?>">
<?php echo JText::_( 'Delete' ); ?>
<img src="images/publish_x.png" alt="<?php echo JText::_( 'Delete Image' ); ?>" border="0"></a>
<?php echo '<br>'.JText::_( 'Image Description' ); ?>
<input class="text_area" type="text" name="<?php echo 'image'.$z.'desc'; ?>" id="<?php echo 'image'.$z.'desc'; ?>" size="40" maxlength="255" value="<?php echo $img_des[$z]; ?>" />	
 <?php       
 }else{
?>
</div>
<br />
<img src=<?php echo $peque_path.'noimage.jpg' .$style;?> />
<?php echo '<br>'.JText::_( 'Image Description' ); ?>
<input class="text_area" type="text" name="<?php echo 'image'.$z.'desc'; ?>" id="<?php echo 'image'.$z.'desc'; ?>" size="40" maxlength="255" value="" />	
 <br><input type="file" size="20" name="files[<?php echo $z; ?>]" value=""/>
 <?php  } ?>
       </div>

                    
   <?php  } ?>                  
    </td>
</tr> 
</table>          
</fieldset>



 <?php  } ?>    




<?php 
echo $pane->endPanel();
echo $pane->startPanel( JText::_( 'Description' ), 'panel3' );
?>
<table class="adminform"><tr><td>
<?php
		$editor = &JFactory::getEditor();		
echo $editor->display('text', $this->datos->text, '100%', '400', '60', '20');
?>
</td></tr></table>

<?php 
echo $pane->endPanel();
//echo $pane->startPanel( JText::_( 'Map' ), 'panel4' );
?>
<!--<fieldset class="adminform">
				<legend><?php echo JText::_( 'Coordinates' ); ?></legend>


                
                
<table class="admintable">
				<tr>
						<td class="key">
							<label>
								<?php echo JText::_( 'Map Published' ); ?>:
							</label>
						</td>
						<td>
							<strong><?php echo JText::_( 'Change from Preferences' ); ?></strong>
						</td>
                         <td><?php echo JHTML::_('tooltip', JText::_( 'LA PUBLICACIÓN DEL MAPA')); ?></td>
					</tr> 
                
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Latitude' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="lat" id="lat" size="60" maxlength="255" value="<?php echo $this->datos->lat; ?>" />
						
					</td>
                    <td rowspan="2"><?php echo JHTML::_('tooltip', JText::_( 'LATITUD Y LONGITUD NECESSARIOS PARA CENTRAR EL MAPA Y PUNTUAR LA PROPRIEDAD')); ?></td>
				</tr>
                
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Longitude' ); ?>:</label></td>
					<td >
                    <input class="text_area" type="text" name="lng" id="lng" size="60" maxlength="255" value="<?php echo $this->datos->lng; ?>" />
						
					</td>
                    
				</tr>
                 <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Get' ); ?> API Key:</label></td>
					<td >
                   <strong><a href="http://code.google.com/apis/maps/signup.html" target="_blank"><?php echo JText::_( 'GET' ); ?> API Key</a></strong>
						
					</td>
                    <td><?php echo JHTML::_('tooltip', JText::_( 'Obter a API KEY do Google para e digitá-la nas Preferências para poder ver os mapas')); ?></td>
				</tr>
                
                
                <tr>
					<td class="key"><label for="user_id"><?php echo JText::_( 'Get' ).' '.JText::_( 'Coord' ); ?>:</label></td>
					<td >
                   <strong><a href="http://maps.google.com/maps?ll=40.418103,-3.713722&spn=0.015683,0.027466&z=15&key=ABQIAAAAFHktBEXrHnX108wOdzd3aBRcHlBTpYb_p9Hgr3VvSklsWletSxRtPnaBg-v2NXy9jFYSYS_aNOHN1Q&oi=map_misc&ct=api_logo" target="_blank" title="mapa" >  <?php echo JText::_( 'GET' ).' '.JText::_( 'COORD' ); ?></a></strong>
						
					</td>
                    <td><?php echo JHTML::_('tooltip', JText::_( 'Este exibe o mapa do google, busca la ubicación que desees y click boton derecho del mouse (centrar el mapa aquí), luego en la esquina inferior izquierda, donde dice "powered by google", con el mouse encima se lee la url donde estan las coordenada de la ubicación elegida, si clikeamos nos lleva a esa url de donde podemos copiar las coordenadas.si centramos la palabra "Madrid" del mapa, las coordenadas serán lat 40.416633, lgn -3.703465.(Aproximado).Suerte')); ?></td>
				</tr>
              
</table>
</fieldset>-->


<?php				            	

//echo $pane->endPanel();

//echo $pane->startPanel( JText::_( 'Available' ), 'panel6' );
?>
<!--<table class="admintable">
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
</table>-->

<?php if($this->datos->use_booking){?>

<style type="text/css">
div.calendar1 {
display:block;
background-color:white;
float:left;
margin:2px;
height:180px;
}
div.calendarwrap1 {
width:780px;
display:block;
	font-size:90%;
	color:black;
	text-align:center;
	margin-top:15px;
}

table.month1 {
	border: 1px solid #CCCCCC;
}
.month1 th, td, p, small {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size:0.9em;
}
.month1 table {
	border:1px solid white;
	padding:2px;
	text-align:center;
}
.month1 td, th {
	padding:1px 1px 1px 1px;
	border: 1px solid #CCCCCC;
}
.month1 td {
	width:16px;
	height:16px;
	text-align:center;
}
.month1 td.low {
background-color: #87CEFA;
}
.month1 td.mid {
background-color: #66CDAA;
}
.month1 td.high {
background-color: #9370D8;
}
.month1 td.booked {
background-color: #e71c00;
}
.month1 td.empty {
background-color:#FFFFFF;
border: 1px solid #FFFFFF;
height: 20px;
}
.month1 td.fecha {
background-color:#FFFFFF;
border: 1px solid #CCCCCC;
height: 20px;}

.month1 td.fechaavailable {
background-color: #33CC33;
border: 1px solid #CCCCCC;
height: 20px;
}
.month1 td.fechaunavailable {
background-color: #CC0000;
border: 1px solid #CCCCCC;
height: 20px;
color: #FFFFFF;
}
.month1 td.fechaunavailable a{
color: #FFFFFF;
font-weight:bold;
}
.month1 td.fechaavailable a{
color: #FFFFFF;
font-weight:bold;
}
.month1 td.fechaunavailable a:hover{
color: #33CC33;
font-weight:bold;
}
.month1 td.fechaavailable a:hover{
color: #CC0000;
font-weight:bold;
}


.month1 th {background-color:#FFFFFF; color:black;
font-weight:bold;
}


img.calendar{
float:right;

}

input.inputbox {
float:left;

}

.select_calendar td{
padding:0px 10px;

}
</style>



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
    <?php  echo Calendar::ShowCalendar( $this->datos,'category','products' ); ?>        
        </td>
	</tr>
</table>

<?php } ?>















</div>


<div class="clr"></div>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="table" value="<?php echo $TableName; ?>" />
<input type="hidden" name="id" value="<?php echo $this->datos->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="products" />

<?php echo JHTML::_( 'form.token' ); ?>
</form>
  
<?php				            	

echo $pane->endPanel();
echo $pane->endPane();

?>









