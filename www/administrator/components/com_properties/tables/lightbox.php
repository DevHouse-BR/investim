<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class Tablelightbox extends JTable
{    
var $id = null;
var $uid = null;
var $propid = null;
var $date = null;

   function __construct(&$db)
  {
    parent::__construct( '#__properties_lightbox', 'id', $db );
  }
  
  function check()
	{
		// check for http on webpage		
		if(empty($this->date)) {
			$datenow =& JFactory::getDate();
			$this->date = $datenow->toFormat("%Y-%m-%d-%H-%M-%S");
		}
		return true;
	}
}
?>