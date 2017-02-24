<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip'); 
JHTML::_('behavior.formvalidation');

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$currencyformat=$params->get('FormatPrice');
$PositionPrice=$params->get('PositionPrice');
$SimbolPrice=$params->get('SimbolPrice');
?>

<?php
$row=$this->Product;
?>

<script type="text/javascript">
function ValidateCaptcha(a,b,c){
var progressvc = $('progressvc');
new Ajax("<?php echo JURI::base();?>index.php?option=com_properties&controller=ajaxCaptcha&format=raw&task=ValidateCaptcha",
{method: 'get',
onRequest: function(){progressvc.setStyle('visibility', 'visible');},
onComplete: function(){progressvc.setStyle('visibility', 'hidden');},
update: $('ValidateCaptcha'), 
data: 'captchacode='+a+'&captchasuffix='+b+'&captchasessionid='+c}).request();
			}	
</script>


<?php
$dias_reservados[20081127] = 1;
$dias_reservados[20081126] = 1;
$dias_reservados[20081125] = 1;
$dias_reservados[20081119] = 1;
$dias_reservados[20081118] = 1;
$dias_reservados[20081117] = 1;
//print_r($dias_reservados);

$errorReserva=0;
if(JRequest::getVar('rate')){$rate=JRequest::getVar('rate');}

//echo $rate;
if(JRequest::getVar('fechaD')){$sd=JRequest::getVar('fechaD');}
if(JRequest::getVar('fechaA')){$ed=JRequest::getVar('fechaA');}
if(JRequest::getVar('price')){$price=JRequest::getVar('price');}
if(JRequest::getVar('priceweek')){$priceweek=JRequest::getVar('priceweek');}

if(JRequest::getVar('duration')){
$duration=JRequest::getVar('duration');
$sdD = explode('-',$sd);
$desde=$sdD[2].$sdD[1].$sdD[0];
$ed=date('Y-m-d',mktime(0, 0, 0, $sdD[1], $sdD[2]+$duration, $sdD[0]));
}

//echo 'from: '.$sd.' to : '.$ed.' price : '.$price;
//echo ' priceweek : '.JRequest::getVar('priceweek');
if($ed == '' || $sd == ''){$Error .= '<p style="color:red"><b> error : '.JText::_( 'Empty Date' ).'</b></p>';$errorReserva=1;
}else{
$sdD = explode('-',$sd);
$desde=$sdD[2].$sdD[1].$sdD[0];
$edD = explode('-',$ed);
$hasta=$edD[2].$edD[1].$edD[0];
//echo 'hasta'.$hasta;
echo checkdate($sdD[1], $sdD[0], $sdD[2]);

if(checkdate($sdD[1], $sdD[2], $sdD[0]) & checkdate($edD[1], $edD[2], $edD[0]))

{
$timestamp1 = mktime(0, 0, 0, $sdD[1], $sdD[2], $sdD[0]);
$timestamp2 = mktime(0, 0, 0, $edD[1], $edD[2], $edD[0]); 

$diferencia = $timestamp2 - $timestamp1;

$dias=$diferencia/86400;
//echo 'dias'.$dias;
}else{echo 'error chek';}
}
if($dias<0){$Error .= '<p style="color:red"><b> error : '.JText::_( 'Error Date' ).'</b></p>';$errorReserva=1;}
if($ed == $sd){$Error .= '<p style="color:red"><b> error : '.JText::_( 'Equal Date' ).'</b></p>';$errorReserva=1;}


for($x=0;$x<=$dias;$x++)
{
$reservar[$desde]=($sdD[0]+$x).'-'.$sdD[1].'-'.$sdD[2];

if(isset($dias_reservados[$desde])){$Error .= '<p style="color:red"><b> error : '.$reservar[$desde].' está reservado</b></p>';$errorReserva=1;}
$desde++;
}
 
?>


<form action="<?php echo JRoute::_( 'index.php' ); ?>"  method="post" id="josForm" name="josForm" class="form-validate">
<?php if($Error){ echo $Error;}?>


<?php 

$errorReserva=0;


if($errorReserva==0){
?>



<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
	<tr><td colspan="2">
<p align="justify">
<font color="#4f3f2f" size="2">
<strong>
PRENOTAZIONE
</strong>
<br />


</td></tr>
    
    
    

	<tr>
		<td width="30%" height="20">
		<label id="namemsg" for="name"><?php echo JText::_( 'From' ); ?>: </label>
		</td>
  		<td><?php echo date('d/m/Y', strtotime($sd)); ?></td>
	</tr>
	<tr>
		<td width="30%" height="20">
		<label id="namemsg" for="name"><?php echo JText::_( 'To' ); ?>: </label>
		</td>
  		<td><?php echo date('d/m/Y', strtotime($ed)); ?></td>
	</tr>
	<tr>
		<td width="30%" height="20">
		<label id="namemsg" for="name"><?php echo JText::_( 'Rate' ); ?>: </label>
		</td>
  		<td>
		
		
		
		<?php
if($price){$thisprice=$price;}elseif($priceweek){$thisprice=$priceweek;}		
		
if($thisprice!=0){
$number = $thisprice;
		if ($currencyformat==0) {
			$formatted_price = number_format($number);
		} else if ($currencyformat==1) {
			$formatted_price = number_format($number, 2,".",",");
		} else if ($currencyformat==2) {
			$formatted_price = number_format($number, 0,",",".");
		} else if ($currencyformat==3) {			
			$formatted_price = number_format($number, 2,",",".");
		}
if($PositionPrice==0){
$showPrice = $SimbolPrice.' '. $formatted_price; 
}else{
$showPrice = $formatted_price .' '. $SimbolPrice;
}
}
?>
		
		
		
		
		
		
		
		
		<?php echo $showPrice; ?></td>
	</tr>
   
   
   
   <tr><td></td><td align="left">
<select name="ob_adults">
<option value="0"><?php echo JText::_( 'Adults' ); ?></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>

<select name="ob_boys">
<option value="0"><?php echo JText::_( 'Boys' ); ?></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>

<select name="ob_babies">
<option value="0"><?php echo JText::_( 'Babies' ); ?></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
</td></tr>
   
   
   
   
    
                               
	<tr>
		<td width="30%" height="40">
		<label id="namemsg" for="name">*<?php echo JText::_( 'Name' ); ?>: </label>
		</td>
  		<td><input type="text" name="name" id="name" size="40" value="<?php echo $user->name;?>" class="inputbox required" maxlength="50" /></td>
	</tr>


	<tr>
		<td height="40">
		<label id="emailmsg" for="email">*<?php echo JText::_( 'Email' ); ?>: </label>
		</td>
		<td><input type="text" id="email" name="email" size="40" value="<?php echo $user->email;?>" class="inputbox required validate-email" maxlength="100" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="namemsg" for="phone">*<?php echo JText::_( 'Phone' ); ?>: </label>
		</td>
 	 	<td><input type="text" name="phone" id="phone" size="40" value="<?php //echo $this->user->get( 'name' );?>" class="inputbox required" maxlength="50" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="addressmsg" for="address"><?php echo JText::_( 'Address' ); ?>: </label>
		</td>
 	 	<td><input type="text" name="address" id="address" size="40" value="" class="inputbox" maxlength="150" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="citymsg" for="city"><?php echo JText::_( 'City' ); ?>: </label>
		</td>
 	 	<td><input type="text" name="city" id="city" size="40" value="" class="inputbox" maxlength="50" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="statemsg" for="state"><?php echo JText::_( 'State' ); ?>: </label>
		</td>
	  	<td><input type="text" name="state" id="state" size="40" value="" class="inputbox" maxlength="150" /></td>
	</tr>


	<tr>
		<td width="30%" height="40">
		<label id="cpmsg" for="cp"><?php echo JText::_( 'CP' ); ?>: </label>
		</td>
 	 	<td><input type="text" name="cp" id="cp" size="40" value="" class="inputbox" maxlength="150" /></td>
	</tr>


	<tr>
		<td height="40">
		<label id="textmsg" for="text">
			<?php echo JText::_( 'Message' ); ?>:
		</label>
		</td>
		<td>
 	   <textarea name="text" id="text"cols="40" rows="3"></textarea>
		</td>
	</tr>
	
    
    
    
    
       
    
    
    
    
    
    <tr valign="top"> 
                        <td colspan="2" align="middle" height="39"> <div align="left">






<table cellpadding="2">
<tr>
<td>
<p align="justify">
<?php echo JText::_( 'BOOKING_TITLE1' ); ?>
</p>
</td>
</tr>

<tr bgcolor="#EBEBEB">
<td style="border-bottom: 1px solid #CCCCCC;">
<?php echo JText::_( 'BOOKING_TITLE_BANK' ); ?>
</td>
</tr>

<tr>
<td>
<?php echo JText::_( 'BOOKING_BANK_NAME' ); ?>
</td>
</tr>

<tr>
<td>
<?php echo JText::_( 'BOOKING_BANK_CODE' ); ?>
</td>
</tr>

<tr>
<td>
</td>
</tr>

<tr bgcolor="#EBEBEB">
<td style="border-bottom: 1px solid #CCCCCC;">
<?php echo JText::_( 'BOOKING_AGENZIA_ADDRESS1' ); ?>
</td>
</tr>

<tr>
<td style="border-bottom: 1px solid #CCCCCC;">
<?php echo JText::_( 'BOOKING_AGENZIA_ADDRESS2' ); ?>
</td>
</tr>

<tr>
<td>
<?php echo JText::_( 'BOOKING_TITLE2' ); ?>

</td>
</tr>

<tr>
<td>
</td>
</tr>

<tr>
<td>
</td>
</tr>

<tr>
<td>
</td>
</tr>


</table>
                       
                       </td>
                      </tr>
                      
                      
 
                      <tr valign="top"> 
                        <td colspan="2" align="middle"> <div align="center"> 
                          
                            <textarea id="privacy" name="privacy" rows="7" cols="36">
<?php echo JText::_( 'BOOKING_TITLE3' ); ?>

</textarea>
                            </div></td>
                      </tr>
                      
                      
                       <tr> 
                        <td colspan="2" height="54"> 
                                <p align="justify">
                                <?php echo JText::_( 'BOOKING_TITLE4' ); ?>
                                
                                 </p>
                              </td>
                      </tr>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                          
    
<tr>
	<td colspan="2">

<?php $dispatcher = &JDispatcher::getInstance();
			//JPluginHelper::importPlugin('system');
			$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.contact' ) );
			if ($results[0]){?>		
<table>
<tr><td align="center" colspan="2">
<span><?php echo JText::_( 'CAPTCHACODE_FORM_TITLE' ) ?></span>	
</td>
<td colspan="2"></td>
</tr>
<tr>
<?php 	
			
				$dispatcher->trigger( 'onCaptchaView', array( 'user.contact', 0, '', '' ) ); 
?>
<td width="20px">
<div id="ValidateCaptcha" style="float:left;"></div>
</td>
<td>
<div style="float:right">      
<a style="cursor:pointer;" onclick="ValidateCaptcha(document.getElementById('captchacode1').value,document.getElementById('captchasuffix').value,document.getElementById('captchasessionid').value)"><?php echo JText::_('Test Code'); ?></a>
</div> 
</td>
</tr>
<tr>
    <td colspan="3"><div id="progressvc" style="float:left;"></div> </td>
  </tr>
</table>	
<?php } ?>
</td>
</tr>         
   
    
               
</table>

      <?php  $returnbook = JRequest::getVar('returnbook');?>
<input type="hidden" name="returnbook" value="<?php echo $returnbook;?>" />
<input type="hidden" name="option" value="com_properties" />
<input type="hidden" name="controller" value="booking" />
<input type="hidden" name="task" value="confirm_booking" />
<input type="hidden" name="agent_id" value="<?php echo $row->agent_id;?>" />
<input type="hidden" name="id" value="<?php echo $row->id;?>" />
<input type="hidden" name="sd" value="<?php echo JRequest::getVar('sd');?>" />
<input type="hidden" name="ed" value="<?php echo JRequest::getVar('ed');?>" />
<input type="hidden" name="totalPrice" value="<?php echo JRequest::getVar('totalPrice');?>" />
<input type="hidden" name="price" value="<?php echo JRequest::getVar('price');?>" />
<input type="hidden" name="priceweek" value="<?php echo JRequest::getVar('priceweek');?>" />
  <div align="center" style="margin:20px 0;">  
  <button class="button validate" type="submit"><?php echo JText::_('Confirm'); ?></button> 
    </div>   
<?php
}else{
?>

<input type="hidden" name="option" value="com_properties" />
<input type="hidden" name="view" value="default_reservation" />
<input type="hidden" name="task" value="send_reservation" />
<input type="hidden" name="agent_id" value="<?php echo $row->agent_id;?>" />
<input type="hidden" name="id" value="<?php echo $row->id;?>" />
<input type="hidden" name="titulo" value="<?php echo $row->name;?>" />
<input type="hidden" name="linkid" value="<?php echo JRequest::getVar('linkid'); ?>" />
<input type="hidden" name="linkcatid" value="<?php echo JRequest::getVar('linkcatid'); ?>" />
<input type="hidden" name="linktypeid" value="<?php echo JRequest::getVar('linktypeid'); ?>" />
<input type="hidden" name="cid" value="<?php echo JRequest::getVar('cid'); ?>" />
<input type="hidden" name="tid" value="<?php echo JRequest::getVar('tid'); ?>" />

  <div align="center" style="margin-bottom:20px; "> 
  
  <button class="button validate" type="submit"><?php echo JText::_('Reserve'); ?></button> 

  </div>   
  


<?php
}
?>


</form>



