<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
$name = 'Rounders and corners';
$description = 'Template with 2 columns and 3 rounded areas for articles<br/><img src="components/com_acymailing/templates/newsletter-3/newsletter-3.png"/>';
$body = JFile::read(dirname(__FILE__).DS.'index.html');
$styles['acymailing_title'] = 'color:#8a8a8a;border-bottom:6px solid #d3d09f;';
$styles['tag_h1'] = $styles['acymailing_title'];
$styles['color_bg'] = '#dfe6e8';