<?php defined('_JEXEC') or die('Restricted access'); 

$TableName = 'available';
JHTML::_('behavior.tooltip');
$id_product=JRequest::getVar( 'id_product' );

$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$currencyformat=$params->get('FormatPrice');	

?>

<form action="index.php" method="post" name="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Availability' ); ?></legend>
<table>
	<tr>
		<td align="left" width="100%">
			<?php echo JText::_( 'Filter' ); ?>:
			<input type="text" name="search" id="search" value="<?php echo $this->lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
			<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
			<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
		</td>
		    <td nowrap="nowrap">
			<?php echo $this->lists['state']; ?>
            </td>
            <td nowrap="nowrap">
            <?php //echo Filter::FilterCategory( $this->items[0],'category','products' ); ?>
            </td>
            <td nowrap="nowrap">
            <?php //echo Filter::FilterLocality( $this->items[0],'locality','products' ); ?>
            </td>		
	</tr>
</table>
<div id="editcell">
<table class="adminlist">
<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'NUM' ); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
             <th  class="img">
				<?php echo JHTML::_('grid.sort',   'Week Id', 'id_order', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>			
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'From', 'ref', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th  class="title">
				<?php echo JHTML::_('grid.sort',   'To', 'id_property', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'Available', 'published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
            <th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'Price', 'precio', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
           
               

		</tr>
	</thead> 
<tbody>
	<?php
		
	$k = 0;
	for ($i=0, $n=count( $this->AvailableProduct ); $i < $n; $i++)
	{
		$row = &$this->AvailableProduct[$i];
		
$link 		= JRoute::_( 'index.php?option=com_properties&view=apartments&task=edit&cid[]='. $row->id);
		
		$checked 	= JHTML::_('grid.id',  $i, $row->id_available );
		$published 	= JHTML::_('grid.published', $row, $i );
		
		
		
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>
			<td>
				<?php echo $checked; ?>
			</td>
 <?php           


?>
<td align="center"><?php echo $row->week; ?></td>
<td align="center"><?php echo date('d/m/Y', strtotime($row->from))	; ?></td>
<td align="center"><?php echo date('d/m/Y', strtotime($row->to))	; ?></td>
<td align="center"><?php echo $published; ?></td>

<td align="center">

<input type="hidden" name="available[]" id="available[]" value="<?php echo $row->id_available; ?>" />
<input size="5" type="text" name="price[<?php echo $row->id_available; ?>]" id="price[<?php echo $row->id_available; ?>]" value="<?php echo $row->price; ?>" />

</td>

		</tr>
        
		<?php
			$k = 1 - $k;
		}
		?>
	</tbody>
    <tfoot>
    <tr>
      <td colspan="16"><?php echo $this->pagination->getListFooter(); ?></td>
    </tr>
  </tfoot>
	</table>
</div>
    	</fieldset>
</div>
<div class="clr"></div>
	<input type="hidden" name="option" value="com_properties" />
    <input type="hidden" name="table" value="available" />
    <input type="hidden" name="id_product" value="<?php echo  $id_product; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
	<input type="hidden" name="controller" value="apartments" />
	<?php echo JHTML::_( 'form.token' ); ?>

</form>	









<?php
$date_index='05/30/2009';
$d=30;
$m=5;
$a=2009;
$tot_sem_transcurridas=date('W');
$tot_sem_2009=date('W', strtotime('12/31/2009'));
$tot_sem=$tot_sem_2009-$tot_sem_transcurridas;
//echo '<br>tot sem : '.$tot_sem.'<br>';
for($s=0;$s<$tot_sem;$s++)
{
$w_from=$s*7;
$w_to=($s*7)+7;
$from  = date("Y-m-d",mktime(0, 0, 0, $m  , $d+$w_from, $a));
$to  = date("Y-m-d",mktime(0, 0, 0, $m  , $d+$w_to, $a));
$now=date("m/d/Y",mktime(0, 0, 0, date("m")  , date("d")+$w_from, date("Y")));
$esta_semana=date('W', strtotime($now));
$rango[$s]['id_week']=$esta_semana;
$rango[$s]['from']=$from;
$rango[$s]['to']=$to;

//echo $esta_semana.'.- '.$from.' - '.$to.'<br>';
//echo "(NULL , '$esta_semana', '$from', '$to', '', '', ''),<br>";
}
/*
echo '
INSERT INTO `agenziapetra`.`jos_properties_available` (
`a_id` ,
`a_id_week` ,
`a_from` ,
`a_to` ,
`a_confirmed` ,
`a_confirmed_date` ,
`a_confirmed_by`
) VALUES 
';
*/
//print_r($rango);










?>