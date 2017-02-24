<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class Tablerating_user extends JTable
{    
var $product_id = null;
var $user_id = null;
var $rating = null;
var $lastip = null;

   function __construct(&$db)
  {
    parent::__construct( '#__properties_rating_user', 'id', $db );
  }
    function check()
	{
		// check for http on webpage		
		if(empty($this->lastip)) {
			$this->lastip = 'sin ip';
		}
		
		return true;
	}
}
?>