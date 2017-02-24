<?php
// Disallow direct access to this file
defined('_JEXEC') or die('Restricted access');
$Version='2.3.0815';
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
<table width="100%">        
 <tr>       
   <td align="left" width="80%" valign="top">        
                      
Products
</td>
</tr>

<tr>
<td align="left" width="20%" valign="top">     
<?php 
echo '<pre>';
print_r($this->Products[0]);
echo '</pre>';
?>
</td>
<tr>
<td align="left" width="20%" valign="top">
Category
</td>
</tr>

<tr>
<td align="left" width="20%" valign="top">
<?php 
echo '<pre>';
print_r($this->Category[0]);
echo '</pre>';
?>
</td>
<tr>
<td align="left" width="20%" valign="top">
Types
</td>
</tr>

<tr>
<td align="left" width="20%" valign="top">
<?php 
echo '<pre>';
print_r($this->Type[0]);
echo '</pre>';
?>
</td>
</tr>
<tr>
<td align="left" width="20%" valign="top">
Contacts
</td>
</tr>

<tr>
<td align="left" width="20%" valign="top">

<?php 
echo '<pre>';
print_r($this->Contacts[0]);
echo '</pre>';
?>
		</td>
	</tr>
    
    
    <tr>
<td align="left" width="20%" valign="top">
Component
</td>
</tr>

<tr>
<td align="left" width="20%" valign="top">

<?php 
echo '<pre>';
print_r($this->Component);
echo '</pre>';
?>
		</td>
	</tr>
    
    
</table>
		</td>
	</tr>
</table>


<form action="index.php" method="post" name="adminForm">


		
		<input type="hidden" name="option" value="com_properties" />
		<input type="hidden" name="task" value="" />
        
		
		
</form>