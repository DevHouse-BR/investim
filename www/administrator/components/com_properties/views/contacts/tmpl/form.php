<?php defined('_JEXEC') or die('Restricted access'); 
$TableName = 'contacts';
JHTML::_('behavior.tooltip');

	//Ordering allowed ?
		$ordering = ($this->lists['order'] == 't.ordering');	
?>


<?php

//print_r($this->contact);

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
 <fieldset class="adminform">
		<legend><?php echo JText::_( 'Datos del formulario enviado' ); ?></legend>       
        
<table class="adminlist">

<tr>
	<td width="30%" height="40">
		<label id="FormularioID" for="FormularioID"><?php echo JText::_( 'Formulario ID' ); ?>: </label>
	</td>
  	<td>
    <?php echo $this->contact->id; ?>
    </td>
</tr>

                      
                            
<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="name"><?php echo JText::_( 'Name' ); ?>: </label>
	</td>
  	<td>
    <?php echo $this->contact->name; ?>
    </td>
</tr>


<tr>
	<td height="40">
		<label id="emailmsg" for="email"><?php echo JText::_( 'Email' ); ?>: </label>
	</td>
	<td>
    <?php echo $this->contact->email; ?>
    </td>
</tr>


<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="phone"><?php echo JText::_( 'Phone' ); ?>: </label>
	</td>
  	<td>
    <?php echo $this->contact->phone; ?>
    </td>
</tr>


<tr>
	<td width="30%" height="40">
		<label id="Direccion" for="Direccion"><?php echo JText::_( 'Address' ); ?>: </label>
	</td>
  	<td>
    <?php echo $this->contact->address; ?>
    </td>
</tr>


<tr>
	<td width="30%" height="40">
		<label id="Poblacion" for="Poblacion"><?php echo JText::_( 'City' ); ?>: </label>
	</td>
  	<td>
    <?php echo $this->contact->city; ?>
    </td>
</tr>


<tr>
	<td width="30%" height="40">
		<label id="Provincia" for="Provincia"><?php echo JText::_( 'State' ); ?>: </label>
	</td>
  	<td>
    <?php echo $this->contact->state; ?>
    </td>
</tr>


<tr>
	<td width="30%" height="40">
		<label id="CP" for="CP"><?php echo JText::_( 'CP' ); ?>: </label>
	</td>
  	<td>
    <?php echo $this->contact->cp; ?>
    </td>
</tr>

<tr>
	<td width="30%" height="40">
		<label id="CP" for="CP"><?php echo JText::_( 'File' ); ?>: </label>
	</td>
  	<td>
    <a href="<?php echo JURI::root().'images/properties/contacts/'. $this->contact->userfile;?>" target="_blank"><?php echo $this->contact->userfile; ?></a>
    <?php //echo $this->contact->userfile; ?>
    </td>
</tr>


<tr>
	<td height="40">
		<label id="emailmsg" for="text">
			<?php echo JText::_( 'Mesage' ); ?>:
		</label>
	</td>
	<td>
    
    <?php echo $this->contact->text; ?>
    
    
	</td>
</tr>
</table>

	</fieldset>
    
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="table" value="<?php echo $TableName; ?>" />
<input type="hidden" name="id" value="<?php echo $this->contact->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="view" value="<?php echo $TableName; ?>" />
<input type="hidden" name="controller" value="contacts" />
<input type="hidden" name="boxchecked" value="1" />
<input type="hidden" name="cid[0]" value="<?php echo $this->contact->id; ?>" />
</form>
	</td>
		</tr>
			</table> 