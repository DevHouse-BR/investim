<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
$name = 'White Shadow Red';
$description = '1 header, 1 column, 3 vertical areas for articles.<br/><img src="components/com_acymailing/templates/newsletter-1/newsletter-1.png"/>';
$body = JFile::read(dirname(__FILE__).DS.'index.html');
$premium=1;
$styles['acymailing_title'] = 'color:#8a8a8a;font-weight:normal;font-size:14px;margin:0;border-bottom:5px solid #d39f9f;';
$styles['acymailing_unsub'] = 'font-weight:bold;color:#000000;';
$styles['acymailing_readmore'] = 'color:#d39f9f;';
$styles['acymailing_online'] = 'font-weight:bold;color:#000000;';
$styles['tag_h1'] = $styles['acymailing_title'];
$styles['color_bg'] = '#e2e8df';