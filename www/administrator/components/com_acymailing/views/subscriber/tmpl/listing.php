<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;ctrl=subscriber" method="post" name="adminForm">
	<table>
		<tr>
			<td width="100%">
				<?php echo JText::_( 'FILTER' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo $this->pageInfo->search;?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'GO' ); ?></button>
				<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'RESET' ); ?></button>
			</td>
			<td nowrap="nowrap">
				<?php echo $this->filters->lists; ?>
				<?php echo $this->filters->status; ?>
			</td>
		</tr>
	</table>
	<table class="adminlist" cellpadding="1">
		<thead>
			<tr>
				<th class="title titlenum">
					<?php echo JText::_( 'NUM' ); ?>
				</th>
				<th class="title titlebox">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->rows); ?>);" />
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort',   JText::_('NAME'), 'a.name', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort',   JText::_('EMAIL'), 'a.email',$this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<?php if(acymailing::level(2)){ ?>
				<th class="title">
					<?php echo JText::_('SUBSCRIPTION'); ?>
				</th>
				<?php } ?>
				<th class="title titledate">
					<?php echo JHTML::_('grid.sort',   JText::_('CREATED_DATE'), 'a.created', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_('GROUP'), 'b.gid', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_('RECEIVE_HTML'), 'a.html', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<?php if($this->config->get('require_confirmation',1)){ ?>
					<th class="title titletoggle">
						<?php echo JHTML::_('grid.sort',   JText::_('CONFIRMED'), 'a.confirmed', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
					</th>
				<?php } ?>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_('ENABLED'), 'a.enabled', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titleid">
					<?php echo JHTML::_('grid.sort',   JText::_('ID'), 'a.subid', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="12">
					<?php echo $this->pagination->getListFooter(); ?>
					<?php echo $this->pagination->getResultsCounter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				$k = 0;
				for($i = 0,$a = count($this->rows);$i<$a;$i++){
					$row =& $this->rows[$i];
					$confirmedid = 'confirmed_'.$row->subid;
					$htmlid = 'html_'.$row->subid;
					$enabledid = 'enabled_'.$row->subid;
			?>
				<tr class="<?php echo "row$k"; ?>">
					<td align="center">
					<?php echo $this->pagination->getRowOffset($i); ?>
					</td>
					<td align="center">
						<?php echo JHTML::_('grid.id', $i, $row->subid ); ?>
					</td>
					<td>
						<?php
						if(empty($row->accept)){
							$text = JText::_('USER_REFUSE',true);
							echo JHTML::_('tooltip', $text, '', 'warning.png');
						}
						?>
						<a href="<?php echo acymailing::completeLink('subscriber&task=edit&subid='.$row->subid); ?>"><?php echo $row->name; ?></a>
					</td>
					<td>
						<?php echo $row->email; ?>
					</td>
					<?php
					if(acymailing::level(2)){ include(dirname(__FILE__).DS.'level2.'.basename(__FILE__)); }
					?>
					<td align="center">
						<?php echo acymailing::getDate($row->created); ?>
					</td>
					<td align="center">
						<?php echo $this->joomGroups[(int) $row->gid]->name; ?>
					</td>
					<td align="center">
						<span id="<?php echo $htmlid ?>" class="loading"><?php echo $this->toggleClass->toggle($htmlid,$row->html,'subscriber') ?></span>
					</td>
					<?php if($this->config->get('require_confirmation',1)){ ?>
					<td align="center">
						<span id="<?php echo $confirmedid ?>" class="loading"><?php echo $this->toggleClass->toggle($confirmedid,$row->confirmed,'subscriber') ?></span>
					</td>
					<?php } ?>
					<td align="center">
						<span id="<?php echo $enabledid ?>" class="loading"><?php echo $this->toggleClass->toggle($enabledid,$row->enabled,'subscriber') ?></span>
					</td>
					<td align="center">
						<?php echo $row->subid; ?>
					</td>
				</tr>
			<?php
					$k = 1-$k;
				}
			?>
		</tbody>
	</table>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="ctrl" value="<?php echo JRequest::getCmd('ctrl'); ?>" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
