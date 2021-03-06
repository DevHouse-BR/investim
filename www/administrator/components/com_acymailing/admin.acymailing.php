<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
include('helpers'.DS.'helper.php');
$taskGroup = JRequest::getCmd('ctrl',JRequest::getCmd('gtask','dashboard'));
$config =& acymailing::config();
$doc =& JFactory::getDocument();
$cssBackend = $config->get('css_backend','default');
if(!empty($cssBackend)){
	$doc->addStyleSheet( ACYMAILING_CSS.'component_'.$cssBackend.'.css' );
}
JHTML::_('behavior.tooltip');
$bar = & JToolBar::getInstance('toolbar');
$bar->addButtonPath(ACYMAILING_BUTTON);
if($taskGroup != 'update'){
	$app =& JFactory::getApplication();
	if(!$config->get('installcomplete')){
		$app->redirect(acymailing::completeLink('update&task=install',false,true));
	}
}
$lang =& JFactory::getLanguage();
$lang->load(ACYMAILING_COMPONENT,JPATH_SITE);
include(ACYMAILING_CONTROLLER.$taskGroup.'.php');
$className = ucfirst($taskGroup).'Controller';
$classGroup = new $className();
JRequest::setVar( 'view', $classGroup->getName() );
$classGroup->execute( JRequest::getCmd('task','listing'));
$classGroup->redirect();
if(JRequest::getString('tmpl') !== 'component'){
	echo acymailing::footer();
}