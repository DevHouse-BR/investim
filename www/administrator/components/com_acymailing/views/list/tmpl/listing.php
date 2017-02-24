<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="iframedoc" id="iframedoc"></div>
<form action="index.php?option=<?php echo ACYMAILING_COMPONENT ?>&amp;ctrl=list" method="post" name="adminForm">
	<table>
		<tr>
			<td width="100%">
				<?php echo JText::_( 'FILTER' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo $this->pageInfo->search;?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'GO' ); ?></button>
				<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'RESET' ); ?></button>
			</td>
			<td nowrap="nowrap">
				<?php echo $this->filters->creator; ?>
			</td>
		</tr>
	</table>
	<table class="adminlist" cellpadding="1">
		<thead>
			<tr>
				<th class="title titlenum">
					<?php echo JText::_( 'NUM' );?>
				</th>
				<th class="title titlebox">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->rows); ?>);" />
				</th>
				<th class="title titlecolor">
				</th>
				<th class="title">
					<?php echo JHTML::_('grid.sort', JText::_( 'LIST_NAME'), 'a.name', $this->pageInfo->filter->order->dir,$this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titlelink">
					<?php echo JText::_( 'SUBSCRIBERS'); ?>
				</th>
				<th class="title titlelink">
					<?php echo JText::_( 'UNSUBSCRIBERS'); ?>
				</th>
				<th class="title titlesender">
				<?php echo JHTML::_('grid.sort',    JText::_( 'CREATOR' ), 'd.name',$this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titleorder">
				<?php echo JHTML::_('grid.sort',    JText::_( 'ORDER' ), 'a.ordering',$this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
					<?php if ($this->order->ordering) echo JHTML::_('grid.order',  $this->rows ); ?>
				</th>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_('JOOMEXT_VISIBLE'), 'a.visible', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titletoggle">
					<?php echo JHTML::_('grid.sort',   JText::_('ENABLED'), 'a.published', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
				</th>
				<th class="title titleid">
					<?php echo JHTML::_('grid.sort',   JText::_( 'ID' ), 'a.listid', $this->pageInfo->filter->order->dir, $this->pageInfo->filter->order->value ); ?>
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
					$publishedid = 'published_'.$row->listid;
					$visibleid = 'visible_'.$row->listid;
			?>
				<tr class="<?php echo "row$k"; ?>">
					<td align="center">
					<?php echo $this->pagination->getRowOffset($i); ?>
					</td>
					<td align="center">
						<?php echo JHTML::_('grid.id', $i, $row->listid ); ?>
					</td>
					<td>
					<?php echo '<div class="roundsubscrib rounddisp" style="background-color:'.$row->color.'"></div>'; ?>
					</td>
					<td>
					<?php
						$text = str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->description);
						$title = str_replace(array("'",'"'),array("&#039;",'&quot;'),$row->name);
						$link = acymailing::completeLink('list&task=edit&listid='.$row->listid);
						echo JHTML::_('tooltip', $text, $title, 'tooltip.png', $title, $link);
					?>
					</td>
					<td align="center">
						<a href="<?php echo acymailing::completeLink('subscriber&filter_status=1&filter_lists='.$row->listid); ?>">
						<?php echo $row->nbsub; ?>
						</a>
						<?php if(!empty($row->nbwait)){ echo '&nbsp;&nbsp;';?>
							<?php $title = '(+'.$row->nbwait.')';
								$text = JText::_('NB_PENDING',true);
							echo JHTML::_('tooltip', $text, '', 'tooltip.png', $title, acymailing::completeLink('subscriber&filter_status=2&filter_lists='.$row->listid));?>
						<?php } ?>
					</td>
					<td align="center">
						<a href="<?php echo acymailing::completeLink('subscriber&filter_status=-1&filter_lists='.$row->listid); ?>">
						<?php echo $row->nbunsub; ?>
						</a>
					</td>
					<td align="center">
						<?php
						if(!empty($row->userid)){
							$text = '<b>'.JText::_('NAME',true).' : </b>'.$row->creatorname;
							$text .= '<br/><b>'.JText::_('USERNAME',true).' : </b>'.$row->username;
							$text .= '<br/><b>'.JText::_('EMAIL',true).' : </b>'.$row->email;
							$text .= '<br/><b>'.JText::_('ID',true).' : </b>'.$row->userid;
							$text = str_replace(array("'"),array("&#039;"),$text);
							echo JHTML::_('tooltip', $text, str_replace(array("'"),array("&#039;"),$row->creatorname), 'tooltip.png', $row->creatorname,'index.php?option=com_users&task=edit&eid[]='.$row->userid);
						}
						?>
					</td>
					<td class="order">
						<span><?php echo $this->pagination->orderUpIcon( $i, $this->order->reverse XOR ( $row->ordering >= @$this->rows[$i-1]->ordering ), $this->order->orderUp, 'Move Up',$this->order->ordering ); ?></span>
						<span><?php echo $this->pagination->orderDownIcon( $i, $a, $this->order->reverse XOR ( $row->ordering <= @$this->rows[$i+1]->ordering ), $this->order->orderDown, 'Move Down' ,$this->order->ordering); ?></span>
						<input type="text" name="order[]" size="5" <?php if(!$this->order->ordering) echo 'disabled="disabled"'?> value="<?php echo $row->ordering; ?>" class="text_area" style="text-align: center" />
					</td>
					<td align="center">
						<span id="<?php echo $visibleid ?>" class="spanloading"><?php echo $this->toggleClass->toggle($visibleid,$row->visible,'list') ?></span>
					</td>
					<td align="center">
						<span id="<?php echo $publishedid ?>" class="spanloading"><?php echo $this->toggleClass->toggle($publishedid,$row->published,'list') ?></span>
					</td>
					<td align="center">
						<?php echo $row->listid; ?>
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