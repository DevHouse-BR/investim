<?php
/**
* @package   yoo_explorer Template
* @version   1.5.2 2010-01-03 14:20:02
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2010 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

/*
 * Module chrome for rendering yoo module
 */
function modChrome_yoo($module, &$params, &$attribs) {
	
	// init vars
	$id              = $module->id;
	$position        = $module->position;
	$showtitle       = $module->showtitle;
	$content         = $module->content;
	$first           = $attribs['first'] ? 'first' : null;
	$last            = $attribs['last'] ? 'last' : null;
	$suffix          = $params->get('moduleclass_sfx', '');
	$sfx_params      = new YOOTemplateParameter($suffix);
	$style           = $sfx_params->get('style');
	$badge           = $sfx_params->get('badge');
	$color           = $sfx_params->get('color');
	$icon            = $sfx_params->get('icon');
	$yootools        = $sfx_params->get('yootools');
	$header          = $sfx_params->get('header');
	$dropdownwidth   = $sfx_params->get('dropdownwidth');

	// create title
	$pos   = JString::strpos($module->title, '||');
	$title = ($pos !== false) ? '<span class="title">'.JString::substr($module->title, 0, $pos).'</span><span class="subtitle">'.JString::substr($module->title, $pos + 2).'</span>' : $module->title;

	// legacy compatibility
	if ($suffix == 'blank' || $suffix == '-blank') $style = 'blank';
	if ($suffix == 'menu' || $suffix == '_menu') $style = 'menu';

	// set default module types
	if ($style == '') {
		if ($module->position == 'headerleft' || $module->position == 'headerright') $style = 'blank';
		if ($module->position == 'topblock') $style = 'rounded';
		if ($module->position == 'top') $style = 'rounded';
		if ($module->position == 'left') $style = 'rounded';
		if ($module->position == 'right') $style = 'rounded';
		if ($module->position == 'maintop') $style = 'rounded';
		if ($module->position == 'contenttop') $style = 'tab';
		if ($module->position == 'contentleft') $style = 'line';
		if ($module->position == 'contentright') $style = 'line';
		if ($module->position == 'contentbottom') $style = 'tab';
		if ($module->position == 'mainbottom') $style = 'rounded';
		if ($module->position == 'bottom') $style = 'rounded';
		if ($module->position == 'bottomblock') $style = 'rounded';
	}

	// to test a module set the style, color, badge and icon here
	//$style = 'rounded';
	// $color = 'templatecolor';
	 //$badge = '';
	// $icon = '';
	// $header = '';

	// force module style
	if ($module->position == 'toolbarleft' || $module->position == 'toolbarright')  $style = 'blank';
	if (($module->position == 'headerleft' || $module->position == 'headerright') && $style != 'headerbar')  $style = 'blank';
	if ($module->position == 'menu') {
		$style = ($style == 'menu') ? 'raw' : 'dropdown';
	}

	// set badge if exists
	if ($badge) {
		$badge = '<div class="badge badge-'.$badge.'"></div>';
	}
	
	// set icon if exists
	if ($icon) {
		$title = '<span class="icon icon-'.$icon.'"></span>'.$title.'';
	}
	
	// set yootools color if exists
	if ($yootools == 'black') {
		$yootools = 'yootools-black';
	}
	
	// set dropdownwidth if exists
	if ($dropdownwidth) {
		$dropdownwidth = 'style="width: '.$dropdownwidth.'px;"';
	}

	// set module template using the style
	switch ($style) {

		case 'rounded':
			$template  = '3-3-3_h';
			$style     = 'mod-'.$style;
			$color     = ($color) ? $style.'-'.$color : ''; // grey
			break;

		case 'line':
			$template  = '0-1-0_h';
			$style     = 'mod-'.$style;
			break;

		case 'menu':
			$template  = '3-3-3_h';
			$style     = 'mod-rounded mod-menu mod-menu-rounded';
			break;

		case 'headerbar':
			$template = '0-1-0';
			$style    = 'mod-' . $style;
			break;

		case 'polaroid':
			$template  = '0-3-3_polaroid';
			$style     = 'mod-'.$style;
			$badge	  .= '<div class="badge-tape"></div>';
			break;
			
		case 'postit':
			$template  = '0-2-3';
			$style     = 'mod-'.$style;
			break;
			
		case 'tab':
			$template = '0-4-0_tab';
			$style   = 'mod-' . $style;
			break;
	
		case 'dropdown':
			$template  = 'dropdown';
			$style     = 'mod-'.$style;
			break;

		case 'blank':
			$template  = 'default';
			$style     = 'mod-'.$style;
			break;

		case 'raw':
			$template  = 'raw';
			break;
	
		default:
			$template  = 'default';
			$style     = $suffix;
	}

	$file = dirname(dirname(__FILE__))."/lib/modules/{$template}.php";
	if (is_file($file)) {
		include($file);
	}

}

?>