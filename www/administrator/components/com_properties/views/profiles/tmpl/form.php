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
		<script language="javascript">
	function imposeMaxLength(Object, MaxLen){
		return (Object.value.length <= MaxLen);
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
         
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<div class="col100">

		<table class="admintable">
<tr><td>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>
<table>   
         <!--<tr>
					<td  class="key"><label for="name"><?php echo JText::_( 'Client' ); ?>:</label></td>
					<td>
                    <div style="float:left;">
						 <?php echo SelectHelper::SelectCliente( $this->profile,'users',$this->profile->cid); ?>
                        </div>                         
					<div style="float:left; margin-left:10px; " id="AjaxCliente">                   
                    </div><div id="progressR"></div>  </td>
				</tr>  -->
      			  <tr>
					<td class="key" width="180">
						<label for="name">
							Respons&aacute;vel
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="name" id="name" size="60" maxlength="255" value="<?php echo $this->profile->name; ?>" />
					</td>
				</tr> 
				
				 <tr>
					<td class="key">
						<label for="name">
							Nome da Empresa:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="company" id="company" size="20" maxlength="255" value="<?php echo $this->profile->company; ?>" />
					</td>
				</tr> 
				<tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'State' ); ?>:
						</label>
					</td>
					<td >
						<select name="state" id="state">
							<option value="">Selecione</option>
							<?php
							require('../conectar_mysql.php');
							$query = "SELECT id, name FROM jos_properties_state ORDER BY name";
							$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
							while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
								echo('<option value="' . $registro["name"] . '"');
								if($registro["name"] == $this->profile->state) echo(" selected");
								echo('>' . $registro["name"] . '</option>');
							}
							require('../desconectar_mysql.php');
							?>
						</select>
					</td>
				</tr>
				 <tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Locality' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="locality" id="locality" size="40" maxlength="255" value="<?php echo $this->profile->locality; ?>" />
					</td>
				</tr>   
				<tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Country' ); ?>:
						</label>
					</td>
					<td >
						<select name="country" id="country">
							<option value="">Selecione</option>
							<?php
							require('../conectar_mysql.php');
							$query = "SELECT id, name FROM jos_properties_country ORDER BY name";
							$result = mysql_query($query) or die("Erro na consulta ao Banco de dados: " . mysql_error());
							while($registro = mysql_fetch_array($result, MYSQL_ASSOC)){
								echo('<option value="' . $registro["name"] . '"');
								if($registro["name"] == $this->profile->country) echo(" selected");
								echo('>' . $registro["name"] . '</option>');
							}
							require('../desconectar_mysql.php');
							?>
						</select>
					</td>
				</tr>   
				<tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Phone' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="phone" id="phone" size="20" maxlength="255" value="<?php echo $this->profile->phone; ?>" />
					</td>
				</tr>   
				<tr>
					<td class="key">
						<label for="name">
							Celular:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="mobile" id="mobile" size="20" maxlength="255" value="<?php echo $this->profile->mobile; ?>" />
					</td>
				</tr>   
				<tr>
					<td class="key">
						<label for="name">
							<?php echo JText::_( 'Mail' ); ?>:
						</label>
					</td>
					<td >
						<input class="text_area" type="text" name="email" id="email" size="50" maxlength="255" value="<?php echo $this->profile->email; ?>" />
					</td>
				</tr>  
				<tr>
					<td class="key">Skype:</td>
					<td><input type="text" name="skype" id="skype" value="<?=$this->profile->skype?>" maxlength="30" size="50" /></td>
				</tr>
				<tr>
					<td class="key">MSN:</td>
					<td><input type="text" name="ymsgr" id="ymsgr" value="<?=$this->profile->ymsgr?>" maxlength="30" size="50" /></td>
				</tr>
				<tr>
					<td class="key">
						<label>
							Valor do Investimento:
						</label>
					</td>
					<td >
						R$ <input class="text_area" type="text" name="icq" id="icq" size="20" value="<?php echo $this->profile->icq; ?>" maxlength="14" onkeyup="moeda(this);" />
					</td>
				</tr>   
				<tr>
					<td class="key">Capital de terceiros?:</td>
					<td><input type="radio" name="blog" value="1"<? if($this->profile->blog == "1") echo(" checked"); ?> />&nbsp;Sim&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="blog" value="2"<? if($this->profile->blog == "2") echo(" checked"); ?> />&nbsp;N&atilde;o</td>
				</tr>
				<tr>
					<td class="key">Cidade Preferencial:</td>
					<td><input type="text" name="web" id="web" value="<?=$this->profile->web?>" maxlength="255" size="50" /></td>
				</tr>
				<tr>
					<td class="key">Setor de Atividade:</td>
					<td><textarea type="text" id="info" name="info" style="width:300px" onKeyPress="return imposeMaxLength(this, 255);" /><?=$this->profile->info?></textarea></td>
				</tr>
				<tr>
					<td class="key">Descri&ccedil;&atilde;o:</td>
					<td><textarea type="text" id="bio" name="bio" style="width:300px" /><?=$this->profile->bio?></textarea></td>
				</tr>
				
				        
	</table>
	</fieldset>
  </td>
  <td valign="top"><!-- 
   <fieldset class="adminform">
   	<legend><?php echo JText::_( 'Images' ); ?></legend>  
    
<?php
                    $profile_path = $mainframe->getSiteURL().'images/properties/profiles/';
                    ?>   
		<table>  	         
                <tr>
                    <td class="key"><label>
								<?php echo JText::_( 'Image' ); ?>:
							</label></td>
                    <td>
                   
                    
                    <img src="<?php echo $profile_path.$this->profile->image; ?>" /><br />
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
                   
                    
                    <img src="<?php echo $profile_path.$this->profile->logo_image; ?>" /><br />
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
                    <td class="key"><label>
								<?php echo JText::_( 'Logo Image Large' ); ?>:
							</label></td>
                    <td>
                   
                    
                    <img src="<?php echo $profile_path.$this->profile->logo_image_large; ?>" /><br />
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
       
       -->
 </td>
				</tr>            
	</table>       
       
        
</div>

<div class="clr"></div>
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="table" value="<?php echo $TableName; ?>" />
<input type="hidden" name="id" value="<?php echo $this->profile->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="profiles" />
</form>
	</td>
		</tr>
			</table> 