<?php defined('_JEXEC') or die('Restricted access'); 
JHTML::_('behavior.tooltip');
JHTML::_('behavior.formvalidation');
$document =& JFactory::getDocument();
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$ActivarContactar=$params->get('ActivarContactar');
?>
<style type="text/css">
<!--
.invalid {
font-weight:bold;
color: red;
}
-->
</style>



<div id="recomendar">

<a href="#" onclick="window.close()"><?php echo JText::_('Close Window');?></a><br /><br />
<?php
echo ' '.JRequest::getVar('msg');
?>
</div>


