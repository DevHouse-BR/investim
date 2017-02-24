<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class Tablecomments extends JTable
{    
var $id = null;
var $userid = null;
var $status = null;
var $productid = null;
var $ip = null;
var $name = null;
var $title = null;
var $comment = null;
var $preview = null;
var $date = null;
var $published = null;
var $ordering = null;
var $email = null;
var $website = null;
var $updateme = null;
var $custom1 = null;
var $custom2 = null;
var $custom3 = null;
var $custom4 = null;
var $custom5 = null;
var $star = null;
var $star1 = null;
var $star2 = null;
var $star3 = null;
var $star4 = null;
var $star5 = null;
var $user_id = null;
var $option = null;
var $voted = null;
var $referer = null;

   function __construct(&$db)
  {
    parent::__construct( '#__properties_comments', 'id', $db );
  }
  
  function check()
	{
		// check for http on webpage		
		if(empty($this->date)) {
		
			$datenow =& JFactory::getDate();
			$this->date = $datenow->toFormat("%Y-%m-%d");
		}
		return true;
	}
}
?>