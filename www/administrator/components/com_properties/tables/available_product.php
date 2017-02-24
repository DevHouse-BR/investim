<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class Tableavailable_product extends JTable
{    
var $id = null;
var $id_product = null;
var $date = null;
var $available = null;
var $published = null;
   function __construct(&$db)
  {
    parent::__construct( '#__properties_available_product', 'id', $db );
  }
  
  
}
?>