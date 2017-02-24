<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class editorHelper{
	var $width = '95%';
	var $height = '500';
	var $cols = 100;
	var $rows = 20;
	var $editor = null;
	var $name = '';
	var $content = '';
	function editorHelper(){
		$config =& acymailing::config();
		$this->editor = $config->get('editor',null);
		if(empty($this->editor)) $this->editor = null;
		$this->myEditor =& JFactory::getEditor($this->editor);
		$this->myEditor->initialise();
	}
	function setDescription(){
		$this->width = 700;
		$this->height = 200;
		$this->cols = 80;
		$this->rows = 10;
	}
	function setContent($var){
		$name = $this->myEditor->get('_name');
		if(!empty($name)){
			if($name == 'jce'){
				return " try{JContentEditor.setContent('".$this->name."', $var ); }catch(err){".$this->myEditor->setContent($this->name,$var)."} ";
			}
			if($name == 'fckeditor'){
				return " try{FCKeditorAPI.GetInstance('".$this->name."').SetHTML( $var ); }catch(err){".$this->myEditor->setContent($this->name,$var)."} ";
			}
		}
		return $this->myEditor->setContent($this->name,$var);
	}
	function getContent(){
		return $this->myEditor->getContent($this->name);
	}
	function display(){
		return $this->myEditor->display( $this->name,  $this->content ,$this->width, $this->height, $this->cols, $this->rows,array('pagebreak', 'readmore') ) ;
	}
	function jsCode(){
		return $this->myEditor->save( $this->name );
	}
}//endclass