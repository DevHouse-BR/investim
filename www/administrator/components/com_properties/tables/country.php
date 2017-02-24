<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class Tablecountry extends JTable
{    
var $id = null;
var $name = null;
var $alias = null;
var $published = null;
var $ordering = null;
var $checked_out = null;
var $checked_out_time = null;
   function __construct(&$db)
  {
    parent::__construct( '#__properties_country', 'id', $db );
  }
    function check()
	{
		// check for http on webpage		
		if(empty($this->alias)) {
			$this->alias = $this->name;
		}
		$this->alias = JFilterOutput::stringURLSafe($this->alias);
		if(trim(str_replace('-','',$this->alias)) == '') {
			$datenow =& JFactory::getDate();
			$this->alias = $datenow->toFormat("%Y-%m-%d-%H-%M-%S");
		}
		return true;
	}
}
?>