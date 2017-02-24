<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class Tableimages extends JTable
{    
	var $id = null;
	var $name = null;	
	var $parent = null;
	var $published = null;
	var $ordering = null;
	var $type = null;
	var $path = null;
	var $rout = null;	
	var $date = null;
	var $uid = null;
	var $product_id = null;	
	var $sector = null;
	var $text = null;
   function __construct(&$db)
  {
    parent::__construct( '#__properties_images', 'id', $db );
  }
  
 
}
?>