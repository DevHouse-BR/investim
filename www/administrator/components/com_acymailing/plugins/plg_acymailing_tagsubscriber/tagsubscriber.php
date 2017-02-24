<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgAcymailingTagsubscriber extends JPlugin
{
	function plgAcymailingTagsubscriber(&$subject, $config){
		parent::__construct($subject, $config);
		if(!isset($this->params)){
			$plugin =& JPluginHelper::getPlugin('acymailing', 'tagsubscriber');
			$this->params = new JParameter( $plugin->params );
		}
    }
	 function acymailing_getPluginType() {
	 	$onePlugin = null;
	 	$onePlugin->name = JText::_('SUBSCRIBER_SUBSCRIBER');
	 	$onePlugin->function = 'acymailingtagsubscriber_show';
	 	$onePlugin->help = 'plugin-tagsubscriber';
	 	return $onePlugin;
	 }
	 function acymailingtagsubscriber_show(){
	 	$descriptions['subid'] = JText::_('SUBSCRIBER_ID');
	 	$descriptions['email'] = JText::_('SUBSCRIBER_EMAIL');
	 	$descriptions['name'] = JText::_('SUBSCRIBER_NAME');
	 	$descriptions['userid'] = JText::_('SUBSCRIBER_USERID');
	 	$descriptions['ip'] = JText::_('SUBSCRIBER_IP');
	 	$descriptions['created'] = JText::_('SUBSCRIBER_CREATED');
		$text = '<table class="adminlist" cellpadding="1">';
		$db =& JFactory::getDBO();
		$tableInfos = $db->getTableFields(acymailing::table('subscriber'));
		$others = array();
		$others['{subtag:name|part:first|ucfirst}'] = array('name'=> JText::_('SUBSCRIBER_FIRSTPART'), 'desc'=>JText::_('SUBSCRIBER_FIRSTPART').' '.JText::_('SUBSCRIBER_FIRSTPART_DESC'));
		$others['{subtag:name|part:last|ucfirst}'] = array('name'=> JText::_('SUBSCRIBER_LASTPART'), 'desc'=>JText::_('SUBSCRIBER_LASTPART').' '.JText::_('SUBSCRIBER_LASTPART_DESC'));
		$k = 0;
		$fields = reset($tableInfos);
		foreach($fields as $fieldname => $oneField){
			if(!isset($descriptions[$fieldname]) AND $oneField != 'varchar') continue;
			$type = '';
			if($fieldname == 'created') $type = '|type:time';
			$text .= '<tr style="cursor:pointer" class="row'.$k.'" onclick="setTag(\'{subtag:'.$fieldname.$type.'}\');insertTag();" ><td>'.$fieldname.'</td><td>'.@$descriptions[$fieldname].'</td></tr>';
			$k = 1-$k;
		}
		foreach($others as $tagname => $tag){
			$text .= '<tr style="cursor:pointer" class="row'.$k.'" onclick="setTag(\''.$tagname.'\');insertTag();" ><td>'.$tag['name'].'</td><td>'.$tag['desc'].'</td></tr>';
			$k = 1-$k;
		}
		$text .= '</table>';
		echo $text;
	 }
	function acymailing_replaceusertagspreview(&$email,&$user){
		return $this->acymailing_replaceusertags($email,$user);
	}
	function acymailing_replaceusertags(&$email,&$user){
		$match = '#{subtag:(.*)}#Ui';
		$variables = array('subject','body','altbody');
		$found = false;
		foreach($variables as $var){
			if(empty($email->$var)) continue;
			$found = preg_match_all($match,$email->$var,$results[$var]) || $found;
			if(empty($results[$var][0])) unset($results[$var]);
		}
		if(!$found) return;
		$tags = array();
		foreach($results as $var => $allresults){
			foreach($allresults[0] as $i => $oneTag){
				if(isset($tags[$oneTag])) continue;
				$tags[$oneTag] = $this->replaceSubTag($allresults,$i,$user);
			}
		}
		foreach(array_keys($results) as $var){
			$email->$var = str_replace(array_keys($tags),$tags,$email->$var);
		}
	}
	function replaceSubTag(&$allresults,$i,&$user){
		$arguments = explode('|',$allresults[1][$i]);
		$field = $arguments[0];
		unset($arguments[0]);
		$mytag = null;
		$mytag->default = $this->params->get('default_'.$field,'');
		if(!empty($arguments)){
			foreach($arguments as $onearg){
				$args = explode(':',$onearg);
				if(isset($args[1])){
					$mytag->$args[0] = $args[1];
				}else{
					$mytag->$args[0] = 1;
				}
			}
		}
		$replaceme = isset($user->$field) ? $user->$field : $mytag->default;
		if(!empty($mytag->part)){
			$parts = explode(' ',$replaceme);
			if($mytag->part == 'last'){
				$replaceme = count($parts)>1 ? end($parts) : '';
			}else{
				$replaceme = reset($parts);
			}
		}
		if(!empty($mytag->type)){
			if($mytag->type == 'date'){
				$replaceme = acymailing::getDate(strtotime($replaceme));
			}elseif($mytag->type == 'time'){
				$replaceme = acymailing::getDate($replaceme);
			}
		}
		if(!empty($mytag->lower)) $replaceme = strtolower($replaceme);
		if(!empty($mytag->ucwords)) $replaceme = ucwords($replaceme);
		if(!empty($mytag->ucfirst)) $replaceme = ucfirst($replaceme);
		return $replaceme;
	}
}//endclass