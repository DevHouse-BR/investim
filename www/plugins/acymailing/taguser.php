<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgAcymailingTaguser extends JPlugin
{
	function plgAcymailingTaguser(&$subject, $config){
		parent::__construct($subject, $config);
		if(!isset($this->params)){
			$plugin =& JPluginHelper::getPlugin('acymailing', 'taguser');
			$this->params = new JParameter( $plugin->params );
		}
	}
	 function acymailing_getPluginType() {
	 	$onePlugin = null;
	 	$onePlugin->name = JText::_('TAGUSER_TAGUSER');
	 	$onePlugin->function = 'acymailingtaguser_show';
	 	$onePlugin->help = 'plugin-taguser';
	 	return $onePlugin;
	 }
	 function acymailingtaguser_show(){
		$notallowed = array('password','params','sendemail','gid','block');
		$text = '<table class="adminlist" cellpadding="1">';
		$db =& JFactory::getDBO();
		$tableInfos = $db->getTableFields(acymailing::table('users',false));
	 	$descriptions['id'] = JText::_('TAGUSER_ID');
	 	$descriptions['email'] = JText::_('TAGUSER_EMAIL');
	 	$descriptions['name'] = JText::_('TAGUSER_NAME');
	 	$descriptions['username'] = JText::_('TAGUSER_USERNAME');
	 	$descriptions['usertype'] = JText::_('TAGUSER_GROUP');
	 	$descriptions['lastvisitdate'] = JText::_('TAGUSER_LASTVISIT');
	 	$descriptions['registerdate'] = JText::_('TAGUSER_REGISTRATION');
		$k = 0;
		$fields = reset($tableInfos);
		foreach($fields as $fieldname => $oneField){
			if(in_array(strtolower($fieldname),$notallowed)) continue;
			$type = '';
			if(strpos(strtolower($oneField),'date') !== false) $type = '|type:date';
			$text .= '<tr style="cursor:pointer" class="row'.$k.'" onclick="setTag(\'{usertag:'.$fieldname.$type.'}\');insertTag();" ><td>'.$fieldname.'</td><td>'.@$descriptions[strtolower($fieldname)].'</td></tr>';
			$k = 1-$k;
		}
		$text .= '</table>';
		echo $text;
	 }
	function acymailing_replaceusertagspreview(&$email,&$user){
		return $this->acymailing_replaceusertags($email,$user);
	}
	function acymailing_replaceusertags(&$email,&$user){
		$match = '#{usertag:(.*)}#Ui';
		$variables = array('subject','body','altbody');
		$found = false;
		foreach($variables as $var){
			if(empty($email->$var)) continue;
			$found = preg_match_all($match,$email->$var,$results[$var]) || $found;
			if(empty($results[$var][0])) unset($results[$var]);
		}
		if(!$found) return;
		$values = null;
		if(!empty($user->userid)){
			$db= JFactory::getDBO();
			$db->setQuery('SELECT * FROM '.acymailing::table('users',false).' WHERE id = '.$user->userid.' LIMIT 1');
			$values = $db->loadObject();
		}
		$tags = array();
		foreach($results as $var => $allresults){
			foreach($allresults[0] as $i => $oneTag){
				if(isset($tags[$oneTag])) continue;
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
				$replaceme = isset($values->$field) ? $values->$field : $mytag->default;
				if(!empty($mytag->type)){
					if($mytag->type == 'date'){
						$replaceme = acymailing::getDate(strtotime($replaceme));
					}
				}
				if(!empty($mytag->lower)) $replaceme = strtolower($replaceme);
				if(!empty($mytag->ucwords)) $replaceme = ucwords($replaceme);
				if(!empty($mytag->ucfirst)) $replaceme = ucfirst($replaceme);
				$tags[$oneTag] = $replaceme;
			}
		}
		foreach($results as $var => $allresults){
			$email->$var = str_replace(array_keys($tags),$tags,$email->$var);
		}
	 }//endfct
}//endclass