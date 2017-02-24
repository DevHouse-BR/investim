<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
$name = 'Clean White Pink';
$description = 'White based template with 1 header, 2 columns<br/><img src="components/com_acymailing/templates/newsletter-2/newsletter-2.png"/>';
$body = JFile::read(dirname(__FILE__).DS.'index.html');
$styles['acymailing_title'] = 'color:#8a8a8a;text-align:right;border-bottom:6px solid #d39fc9;';
$styles['tag_h1'] = $styles['acymailing_title'];
$styles['color_bg'] = '#ffffff';