<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="config_plugins">
	<table width="100%"><tr><td width="50%" valign="top">
	<fieldset>
		<legend><?php echo JText::_('PLUG_TAG') ?></legend>
		<table class="adminlist" cellpadding="1">
			<thead>
				<tr>
					<th class="title titlenum">
						<?php echo JText::_( 'NUM' );?>
					</th>
					<th class="title">
						<?php echo JText::_('NAME'); ?>
					</th>
					<th class="title titletoggle">
						<?php echo JText::_('ENABLED'); ?>
					</th>
					<th class="title titleid">
						<?php echo JText::_( 'ID' ); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$k = 0;
					for($i = 0,$a = count($this->plugins);$i<$a;$i++){
						$row =& $this->plugins[$i];
						$publishedid = 'published_'.$row->id;
				?>
					<tr class="<?php echo "row$k"; ?>">
						<td align="center">
						<?php echo $i+1 ?>
						</td>
						<td>
							<a target="_blank" href="index.php?option=com_plugins&amp;view=plugin&amp;client=site&amp;task=edit&amp;cid[]=<?php echo $row->id?>"><?php echo $row->name; ?></a>
						</td>
						<td align="center">
							<span id="<?php echo $publishedid ?>" class="loading"><?php echo $this->toggleClass->toggle($publishedid,$row->published,'plugins') ?></span>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php
						$k = 1-$k;
					}
				?>
			</tbody>
		</table>
	</fieldset>
	</td><td valign="top">
	<fieldset>
		<legend><?php echo JText::_('PLUG_INTE') ?></legend>
		<table class="adminlist" cellpadding="1">
			<thead>
				<tr>
					<th class="title titlenum">
						<?php echo JText::_( 'NUM' );?>
					</th>
					<th class="title">
						<?php echo JText::_('NAME'); ?>
					</th>
					<th class="title titletoggle">
						<?php echo JText::_('ENABLED'); ?>
					</th>
					<th class="title titleid">
						<?php echo JText::_( 'ID' ); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$k = 0;
					for($i = 0,$a = count($this->integrationplugins);$i<$a;$i++){
						$row =& $this->integrationplugins[$i];
						$publishedid = 'published_'.$row->id;
				?>
					<tr class="<?php echo "row$k"; ?>">
						<td align="center">
						<?php echo $i+1 ?>
						</td>
						<td>
							<a target="_blank" href="index.php?option=com_plugins&amp;view=plugin&amp;client=site&amp;task=edit&amp;cid[]=<?php echo $row->id?>"><?php echo $row->name; ?></a>
						</td>
						<td align="center">
							<span id="<?php echo $publishedid ?>" class="spanloading"><?php echo $this->toggleClass->toggle($publishedid,$row->published,'plugins') ?></span>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php
						$k = 1-$k;
					}
				?>
			</tbody>
		</table>
	</fieldset>
	</td></tr></table>
</div>