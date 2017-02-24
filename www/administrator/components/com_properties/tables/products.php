<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
class Tableproducts extends JTable
{    
	var $id = null;
	var $name = null;
	var $alias = null;
	var $agent_id = null;
	var $agent = null;
	var $ref = null;
	var $type = null;
	var $parent = null;
	var $cid = null;
	var $lid = null;
	var $sid = null;
	var $cyid = null;	
	var $postcode = null;
	var $address = null;
	var $description = null;
	var $text = null;
	var $price = null;
	var $published = null;
	var $use_booking = null;
	var $ordering = null;
	var $panoramic = null;	
	var $video = null;	
	var $lat = null;	
	var $lng = null;	
	var $available = null;	
	var $featured = null;	
	var $years = null;	
	var $bedrooms = null;	
	var $bathrooms = null;	
	var $garage = null;	
	var $area = null;	
	var $covered_area = null;	
	var $hits = null;	
	var $listdate = null;	
	var $refresh_time = null;	
	var $checked_out = null;	
	var $checked_out_time = null;
  var $extra1 = null;
  var $extra2 = null;
  var $extra3 = null;
  var $extra4 = null;
  var $extra5 = null;
  var $extra6 = null;
  var $extra7 = null;
  var $extra8 = null;
  var $extra9 = null;
  var $extra10 = null;
  var $extra11 = null;
  var $extra12 = null;
  var $extra13 = null;
  var $extra14 = null;
  var $extra15 = null;
  var $extra16 = null;
  var $extra17 = null;
  var $extra18 = null;
  var $extra19 = null;
  var $extra20 = null;
  var $extra21 = null;
  var $extra22 = null;
  var $extra23 = null;
  var $extra24 = null;
  var $extra25 = null;
  var $extra26 = null;
  var $extra27 = null;
  var $extra28 = null;
  var $extra29 = null;
  var $extra30 = null;
  var $extra31 = null;
  var $extra32 = null;
  var $extra33 = null;
  var $extra34 = null;
  var $extra35 = null;
  var $extra36 = null;
  var $extra37 = null;
  var $extra38 = null;
  var $extra39 = null;
  var $extra40 = null;
  var $extra41 = null;
  var $extra42 = null;
  var $extra43 = null;
  var $extra44 = null;
  var $extra45 = null;
  var $extra46 = null;
  var $extra47 = null;
  var $extra48 = null;
  var $extra49 = null;
  var $extra50 = null;
  var $extra51 = null;
  var $extra52 = null;
  var $extra53 = null;
  var $extra54 = null;
  var $extra55 = null;
  var $extra56 = null;
  var $extra57 = null;
  var $extra58 = null;
  var $extra59 = null;
  var $extra60 = null;
  var $extra61 = null;
  var $extra62 = null;
  var $extra63 = null;
  var $extra64 = null;
  var $extra65 = null;
  var $extra66 = null;
  var $extra67 = null;
  var $extra68 = null;
  var $extra69 = null;
  var $extra70 = null;
  var $extra71 = null;
  var $extra72 = null;
  var $extra73 = null;
  var $extra74 = null;
  var $extra75 = null;
  var $extra76 = null;
  var $extra77 = null;
  var $extra78 = null;
  var $extra79 = null;
  var $extra80 = null;
  var $extra81 = null;
  var $extra82 = null;
  var $extra83 = null;
  var $extra84 = null;
  var $extra85 = null;
  var $extra86 = null;
  var $extra87 = null;
  var $extra88 = null;
  var $extra89 = null;
  var $extra90 = null;
  var $extra91 = null;
  var $extra92 = null;
  var $extra93 = null;
  var $extra94 = null;
  var $extra95 = null;
  var $extra96 = null;
  var $extra97 = null;
  var $extra98 = null;
  var $extra99 = null;
  var $faturamento = null;
  
   function __construct(&$db)
  {
    parent::__construct( '#__properties_products', 'id', $db );
  }
  function check()
	{		
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