<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;ctrl=list" method="post" name="adminForm" autocomplete="off">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'FILTERS' ); ?></legend>
		<table>
		<?php for($i=1;$i<8;$i++){?>
			<tr><td>
			<?php echo $this->filter->display(); ?>
			</td></tr>
		<?php }	?>
		</table>
	</fieldset>
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'IMPORT_SUBSCRIBE_REMOVE' ); ?></legend>
		<table class="adminlist" cellpadding="1">
		<?php
		$k = 0;
		foreach( $this->lists as $row){?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
					<?php echo '<div class="roundsubscrib rounddisp" style="background-color:'.$row->color.'"></div>'; ?>
					<?php
					$text = '<b>'.JText::_('ID').' : </b>'.$row->listid;
					$text .= '<br/>'.str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->description);
					$title = str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->name);
					echo JHTML::_('tooltip', $text, $title, 'tooltip.png', $title);
					?>
				</td>
				<td align="center">
					<?php echo JHTML::_('select.booleanlist', "importlists[".$row->listid."]"); ?>
				</td>
			</tr>
			<?php
			$k = 1-$k;
		}?>
		</table>
	</fieldset>
	<div class="clr"></div>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="ctrl" value="list" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
