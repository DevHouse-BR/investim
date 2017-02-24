<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<style type="text/css">
div.templatearea{
	float:left;
	border:1px solid #ccc;
	margin:5px;
	padding:5px;
	cursor:pointer;
	height:200px;
}
div.templatearea:hover{
	background-color : #FFFFDD;
	border :2px solid #ccc;
	margin : 4px;
}
div.templatetitle{
	white-space: nowrap;
	font-size:12pt;
}
div.templatedescription{
}
</style>
<form action="index.php?tmpl=component&amp;option=<?php echo ACYMAILING_COMPONENT ?>" method="post" name="adminForm">
	<table class="adminlist" cellpadding="1">
		<thead>
			<tr>
				<td>
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</thead>
	</table>
			<div class="templatearea" onclick="applyTemplate(0);">
						<div class="templatetitle"><?php echo JText::_('NONE'); ?></div>
						<div style="display:none" id="htmlcontent_0"><br/></div>
						<div style="display:none" id="textcontent_0"></div>
						<div style="display:none" id="subject_0"></div>
				</div>
			<?php
				for($i = 0,$a = count($this->rows);$i<$a;$i++){
					$row =& $this->rows[$i];
			?>
				<div class="templatearea" onclick="applyTemplate(<?php echo $row->tempid?>);">
						<div class="templatetitle"><?php echo $row->name; ?></div>
						<div class="templatedescription"><?php echo acymailing::absoluteURL($row->description);	?></div>
						<div style="display:none" id="htmlcontent_<?php echo $row->tempid;?>"><?php echo acymailing::absoluteURL($row->body);?></div>
						<div style="display:none" id="textcontent_<?php echo $row->tempid;?>"><?php echo $row->altbody;?></div>
						<div style="display:none" id="subject_<?php echo $row->tempid;?>"><?php echo $row->subject;?></div>
				</div>
			<?php
				}
			?>
	<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
	<input type="hidden" name="task" value="theme" />
	<input type="hidden" name="ctrl" value="<?php echo JRequest::getCmd('ctrl'); ?>" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->pageInfo->filter->order->value; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->pageInfo->filter->order->dir; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
