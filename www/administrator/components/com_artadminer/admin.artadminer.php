<?php

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

JTable::addIncludePath(JPATH_COMPONENT.DS.'database');
require_once(JPATH_COMPONENT.DS.'controller.php');

$controller = new ArtAdminerController();
$task = JRequest::getCmd('task');
$controller->registerDefaultTask('adminer');
$controller->execute($task);
$controller->redirect();

?>