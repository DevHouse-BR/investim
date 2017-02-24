<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class Tablerates extends JTable
{    
var $id = null;
var $title = null;
var $description = null;
var $week = null;
var $validfrom = null;
var $validto = null;
var $rateperday = null;
var $rateperweek = null;
var $mindays = null;
var $maxdays = null;
var $minpeople = null;
var $maxpeople = null;
var $typeid = null;
var $weekonly = null;
var $validfrom_ts = null;
var $validto_ts = null;
var $dayofweek = null;
var $productid = null;
var $published = null;
var $ordering = null;

   function __construct(&$db)
  {
    parent::__construct( '#__properties_rates', 'id', $db );
  }
    
}
?>