<?php
defined('_JEXEC') or die('Restricted access');


function pagination_list_footer($list)
{
	// Initialize variables
	$lang =& JFactory::getLanguage();
	$html = "<del class=\"container\"><div class=\"pagination\">\n";

	$html .= "\n<div class=\"limit\">".JText::_('Display Num').$list['limitfield']."</div>";
	$html .= $list['pageslinks'];
	$html .= "\n<div class=\"limit\">".$list['pagescounter']."</div>";

	$html .= "\n<input type=\"hidden\" name=\"limitstart\" value=\"".$list['limitstart']."\" />";
	$html .= "\n</div></del>";

	return $html;
}

function pagination_list_render($list)
{
	// Initialize variables
	$lang =& JFactory::getLanguage();
	$html = null;

	if ($list['start']['active']) {
		$html .= "<div class=\"button-right\"><div class=\"start\">".$list['start']['data']."</div></div>";
	} else {
		$html .= "<div class=\"button-right off\"><div class=\"start\">".$list['start']['data']."</div></div>";
	}
	if ($list['previous']['active']) {
		$html .= "<div class=\"button-right\"><div class=\"prev\">".$list['previous']['data']."</div></div>";
	} else {
		$html .= "<div class=\"button-right off\"><div class=\"prev\">".$list['previous']['data']."</div></div>";
	}

	$html .= "\n<div class=\"button-left\"><div class=\"page\">";
	foreach( $list['pages'] as $page ) {
		$html .= $page['data'];
	}
	$html .= "\n</div></div>";

	if ($list['next']['active']) {
		$html .= "<div class=\"button-left\"><div class=\"next\">".$list['next']['data']."</div></div>";
	} else {
		$html .= "<div class=\"button-left off\"><div class=\"next\">".$list['next']['data']."</div></div>";
	}
	if ($list['end']['active']) {
		$html .= "<div class=\"button-left\"><div class=\"end\">".$list['end']['data']."</div></div>";
	} else {
		$html .= "<div class=\"button-left off\"><div class=\"end\">".$list['end']['data']."</div></div>";
	}

	return $html;
}

function pagination_item_active(&$item)
{

$view=JRequest::getVar('view');
if(JRequest::getVar('view')=='panel'){
$formname='admin';
}else{
$formname='page';
}
$formname='admin';
	if($item->base>0)
		return "<a href=\"#\" title=\"".$item->text."\" onclick=\"javascript: document.".$formname."Form.limitstart.value=".$item->base."; document.".$formname."Form.submit();return false;\">".$item->text."</a>";
	else
		return "<a href=\"#\" title=\"".$item->text."\" onclick=\"javascript: document.".$formname."Form.limitstart.value=0; document.".$formname."Form.submit();return false;\">".$item->text."</a>";
}

function pagination_item_inactive(&$item)
{
	return "<span>".$item->text."</span>";
}
?>
