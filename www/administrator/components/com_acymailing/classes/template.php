<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class templateClass extends acymailingClass{
  var $tables = array('template');
  var $pkey = 'tempid';
  var $namekey = 'alias';
  function get($tempid){
    $this->database->setQuery('SELECT * FROM '.acymailing::table('template').' WHERE tempid = '.intval($tempid).' LIMIT 1');
    $template = $this->database->loadObject();
    return $this->_prepareTemplate($template);
  }
	function copy(){
		JRequest::checkToken() or die( 'Invalid Token' );
		$cids = JRequest::getVar( 'cid', array(), '', 'array' );
		$db =& JFactory::getDBO();
		$time = time();
		foreach($cids as $oneId){
			$query = 'INSERT IGNORE INTO `#__acymailing_template` (`name`, `description`, `body`, `altbody`, `created`, `published`, `premium`, `ordering`, `namekey`, `styles`)';
			$query .= ' SELECT CONCAT(`name`,\'_copy\'), `description`, `body`, `altbody`, '.$time.', `published`, `premium`, `ordering`, CONCAT(`namekey`,\'copy'.$time.'\'), `styles` FROM `#__acymailing_template` WHERE `tempid` = '.(int) $oneId;
			$db->setQuery($query);
			$db->query();
		}
		$orderClass = acymailing::get('helper.order');
		$orderClass->pkey = 'tempid';
		$orderClass->table = 'template';
		$orderClass->reOrder();
		return $this->listing();
	}
  function getDefault(){
    $this->database->setQuery('SELECT * FROM '.acymailing::table('template').' WHERE premium = 1 AND published = 1 ORDER BY ordering ASC LIMIT 1');
    $template = $this->database->loadObject();
    return $this->_prepareTemplate($template);
  }
  function _prepareTemplate($template){
  	if(!isset($template->styles)) return $template;
    if(empty($template->styles)){
      $template->styles = array();
    }else{
      $template->styles = unserialize($template->styles);
    }
    return $template;
  }
  function saveForm(){
    $template = null;
    $template->tempid = acymailing::getCID('tempid');
    $formData = JRequest::getVar( 'data', array(), '', 'array' );
    foreach($formData['template'] as $column => $value){
      acymailing::secureField($column);
      $template->$column = strip_tags($value);
    }
    $styles = JRequest::getVar('styles',array(),'','array');
    foreach($styles as $class => $oneStyle){
		$styles[$class] = str_replace('"',"'",$oneStyle);
      if(empty($oneStyle)) unset($styles[$class]);
    }
    $newStyles = JRequest::getVar('otherstyles',array(),'','array');
    if(!empty($newStyles)){
    	foreach($newStyles['classname'] as $id => $className){
    		if(!empty($className) AND $className != JText::_('CLASS_NAME') AND !empty($newStyles['style'][$id]) AND $newStyles['style'][$id] != JText::_('CSS_STYLE')){
    			$styles[$className] = str_replace('"',"'",$newStyles['style'][$id]);
    		}
    	}
    }
    $template->styles = serialize($styles);
    $template->body = JRequest::getVar('editor_body','','','string',JREQUEST_ALLOWRAW);
    if(!empty($styles['color_bg'])){
    	$pat1 = '#^([^<]*<[^>]*background-color:)([^;">]{1,10})#i';
    	$found = false;
    	if(preg_match($pat1,$template->body)){
    		$template->body = preg_replace($pat1,'$1'.$styles['color_bg'],$template->body);
    		$found = true;
    	}
    	$pat2 = '#^([^<]*<[^>]*bgcolor=")([^;">]{1,10})#i';
    	if(preg_match($pat2,$template->body)){
    		$template->body = preg_replace($pat2,'$1'.$styles['color_bg'],$template->body);
    		$found = true;
    	}
    	if(!$found){
    		$template->body = '<div style="background-color:'.$styles['color_bg'].';" width="100%">'.$template->body.'</div>';
    	}
    }
    $template->description = JRequest::getVar('editor_description','','','string',JREQUEST_ALLOWRAW);
    $tempid = $this->save($template);
    if(!$tempid) return false;
    if(empty($template->tempid)){
      $orderClass = acymailing::get('helper.order');
      $orderClass->pkey = 'tempid';
      $orderClass->table = 'template';
      $orderClass->reOrder();
    }
    JRequest::setVar( 'tempid', $tempid);
    return true;
  }
  function save($element){
    if(empty($element->tempid)){
      if(empty($element->namekey)) $element->namekey = time().JFilterOutput::stringURLSafe($element->name);
    }
    return parent::save($element);
  }
}