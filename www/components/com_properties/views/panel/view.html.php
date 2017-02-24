<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );
class PropertiesViewPanel extends JView
{	
	function display($tpl = null)
	{
global $mainframe;
$user =& JFactory::getUser();
$task = JRequest::getVar('task');
$layout = JRequest::getVar('layout');







if (!$user->guest) {

$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/highslide/highslide.css" type="text/css" />');
$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/highslide/highslide-with-html.js"></script>');
$mainframe->addCustomHeadTag('<script type="text/javascript">
hs.graphicsDir = \''.JURI::base().'components/com_properties/includes/highslide/graphics/\';
hs.outlineType = \'rounded-white\';
</script>');

///MULTIUPLOAD				
		
		$mainframe->addCustomHeadTag('<script type="text/javascript" src="components/com_properties/includes/js/Stickman.MultiUpload.js"></script>');
$mainframe->addCustomHeadTag('<link rel="stylesheet" href="components/com_properties/includes/css/Stickman.MultiUpload.css" type="text/css" />');


$mainframe->addCustomHeadTag('<script type="text/javascript">
		window.addEvent(\'domready\', function(){			
			new MultiUpload( $( \'ImageForm\' ).files, 24, \'[{id}]\', true, true );
		
});

	</script>
');


///MULTIUPLOAD	


$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$this->assignRef('params',		$params);
$Itemid =& $this->get('Itemid');
$this->assignRef('Itemid',		$Itemid);

switch($task)
	{
	case 'edit':	
	$layout='addproperty';
if(JRequest::getVar('id')!=0){
$ProductEdit		=& $this->get('ProductEdit');
$this->assignRef('datos',		$ProductEdit);	

$Images = $this->getImages($ProductEdit->id);
	$this->assignRef('Images',		$Images);
	//parent::display($layout);
	
$user =& JFactory::getUser();
$agent_id=$ProductEdit->agent_id;
if($user->id!=$agent_id){
$link = 'index.php?option=com_properties&view=panel';
	$msg = JText::_( 'Error' );	
		$mainframe->Redirect($link, $msg);
}	
}
	break;
	
	case 'new':
	$layout='addproperty';
	
	break;
	
	case 'editimages':
	$product_id = JRequest::getVar('product_id',0,'','int');
	$Images = $this->getImages($product_id);
	$total		= count($Images);
	$limitstart	= JRequest::getVar('limitstart', 0, '', 'int');
	$limit=30;
	require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagination.php' );
	$pagination = new JPagination($total, $limitstart, $limit);
	$this->assignRef('pagination',	$pagination);
	
	$lists	= $this->_buildSortLists('images');

			$this->assign('lists',	$lists);
			
	$this->assignRef('Images',		$Images);
	$layout='images';	
	break;
	
	
	case 'addrates':
	$product_id = JRequest::getVar('product_id',0,'','int');
	$rate_id = JRequest::getVar('rate_id',0,'','int');
	if($rate_id){
	$ThisRate = $this->getThisRate($product_id,$rate_id);
	$this->assignRef('rate',		$ThisRate);
	}
	$layout='add_rates';
	break;
	
	
	case 'editrates':
	$product_id = JRequest::getVar('product_id',0,'','int');
	$Rates = $this->getRates($product_id);
	$total		= count($Rates);
	$limitstart	= JRequest::getVar('limitstart', 0, '', 'int');
	$limit=30;
	require_once( JPATH_COMPONENT.DS.'helpers'.DS.'pagination.php' );
	$pagination = new JPagination($total, $limitstart, $limit);
	$this->assignRef('pagination',	$pagination);
	
	$lists	= $this->_buildSortLists('rates');

			$this->assign('lists',	$lists);
			
	$this->assignRef('items',		$Rates);
	$layout='rates';	
	break;
	
	default:	
	
$items		= & $this->get( 'DataPanel');
$pagination =& $this->get('PaginationPanel');
$lists = & $this->get('List');
		$this->assignRef('lists', $lists);	
$this->assignRef('items',		$items);
$this->assignRef('pagination', $pagination);
$DataThisAgent =  & $this->get( 'Profile');
$this->assignRef('DataThisAgent',		$DataThisAgent);
$Cant_items =  & $this->get( 'Cant_items');
$this->assignRef('Cant_items',		$Cant_items);

foreach($items as $item){
$Images[$item->id]= $this->getImages($item->id);
}
$this->assignRef('Images',		$Images);

	break;
	}


$this->ChekUserGroup($user);

		parent::display($layout);



		
}else{
	
$Retornar='index.php?option=com_properties&view=panel&Itemid='.$Itemid;

	$link = JRoute::_( 'index.php?option=com_user&view=login' );
	$msg = JText::_( 'Registered Users only can acces' );	
		//$mainframe->Redirect($link, $msg);
		
		global $mainframe, $option;

		// Initialize variables
		$document	=& JFactory::getDocument();
		$user		=& JFactory::getUser();
		$pathway	=& $mainframe->getPathway();
		$image		= '';

		$menu   =& JSite::getMenu();
		$item   = $menu->getActive();
		if($item)
			$params	=& $menu->getParams($item->id);
		else
			$params	=& $menu->getParams(null);


		$type = (!$user->get('guest')) ? 'logout' : 'login';

		// Set some default page parameters if not set
		$params->def( 'page_title', 				1 );
		if(!$item)
		{
			$params->def( 'header_login', 			'' );
			$params->def( 'header_logout', 			'' );
		}

		$params->def( 'pageclass_sfx', 			'' );
		$params->def( 'login', 					'index.php' );
		$params->def( 'logout', 				'index.php' );
		$params->def( 'description_login', 		1 );
		$params->def( 'description_logout', 		1 );
		$params->def( 'description_login_text', 	JText::_( 'LOGIN_DESCRIPTION' ) );
		$params->def( 'description_logout_text',	JText::_( 'LOGOUT_DESCRIPTION' ) );
		$params->def( 'image_login', 				'key.jpg' );
		$params->def( 'image_logout', 				'key.jpg' );
		$params->def( 'image_login_align', 			'right' );
		$params->def( 'image_logout_align', 		'right' );
		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		$params->def( 'registration', 				$usersConfig->get( 'allowUserRegistration' ) );

		if ( !$user->get('guest') )
		{
			$title = JText::_( 'Logout');

			// pathway item
			$pathway->addItem($title, '' );
			// Set page title
			$document->setTitle( $title );
		}
		else
		{
			$title = JText::_( 'Login');

			// pathway item
			$pathway->addItem($title, '' );
			// Set page title
			$document->setTitle( $title );
		}

		// Build login image if enabled
		if ( $params->get( 'image_'.$type ) != -1 ) {
			$image = 'images/stories/'.$params->get( 'image_'.$type );
			$image = '<img src="'. $image  .'" align="'. $params->get( 'image_'.$type.'_align' ) .'" hspace="10" alt="" />';
		}

		// Get the return URL
		if (!$url = JRequest::getVar('return', '', 'method', 'base64')) {
			$url = base64_encode($Retornar);
		}

		$errors =& JError::getErrors();

		$this->assign('image' , $image);
		$this->assign('type'  , $type);
		$this->assign('return', $url);
		$this->assignRef('params', $params);




if($task!='login'){

$v=JRequest::getVar('view');
$l=JRequest::getVar('layout');
if($l){
$Retornar='index.php?option=com_properties&view=panel&layout=myprofile&Itemid='.$Itemid;
$url = base64_encode($Retornar);
}else{
$Retornar='index.php?option=com_properties&view=panel&Itemid='.$Itemid;
$url = base64_encode($Retornar);
}

$link = 'index.php?option=com_properties&view=panel&task=login&return='.$url ;
	$msg = JText::_( 'Registered Users only can access' );	
		$mainframe->Redirect($link, $msg);
}	


parent::display('login');
	}
		

}




function getImages($pid)
	{	
		$query = ' SELECT i.*  '			
			. ' FROM #__properties_images as i'
			. ' WHERE i.parent = '.$pid
			. ' order by i.ordering '
			;	
	    $db 	=& JFactory::getDBO();
	    $db->setQuery($query);
		$IMG = $db->loadObjectList();
	
	return $IMG;	
	}	


function getThisRate($pid,$rid)
	{	
		$query = ' SELECT r.*  '			
			. ' FROM #__properties_rates as r'
			. ' WHERE r.productid = '.$pid
			. ' AND r.id = '.$rid
			. ' order by r.ordering '
			;	
	    $db 	=& JFactory::getDBO();
	    $db->setQuery($query);
		$Rates = $db->loadObject();
	
	return $Rates;	
	}
	
	
function getRates($pid)
	{	
		$query = ' SELECT r.*  '			
			. ' FROM #__properties_rates as r'
			. ' WHERE r.productid = '.$pid
			. ' order by r.ordering '
			;	
	    $db 	=& JFactory::getDBO();
	    $db->setQuery($query);
		$Rates = $db->loadObjectList();
	
	return $Rates;	
	}	


	
	
	
	function _buildSortLists($ThisTableName)
	{
		// Table ordering values
		
		$filter				= JRequest::getString('filter');
		
		
		global $mainframe;
		
		$filter_product  = $mainframe->getUserStateFromRequest('com_properties.'.$ThisTableName.'.list.' . $itemid . '.filter_product', 'filter_product', '', 'cmd');
		
		if($filter_product){
		
		}elseif(JRequest::getVar('product_id')){
		
		$filter_product = JRequest::getVar('product_id');
		//$mainframe->setState('filter_product', $this->filter_product);
		}
		
		
		
		$itemid = JRequest::getInt('id',0) . ':' . JRequest::getInt('Itemid',0);
		$filter_order  = $mainframe->getUserStateFromRequest('com_properties.'.$ThisTableName.'.list.' . $itemid . '.filter_order', 'filter_order', '', 'cmd');
		$filter_order_Dir = $mainframe->getUserStateFromRequest('com_properties.'.$ThisTableName.'.list.' . $itemid . '.filter_order_Dir', 'filter_order_Dir', '', 'cmd');
		
		
		
		$lists['task']      = $ThisTableName;
		$lists['filter']    = $filter;
		$lists['order']     = $filter_order;
		$lists['order_Dir'] = $filter_order_Dir;
		$lists['filter_product'] = $filter_product;
		return $lists;
	}
	
	
	function ChekUserGroup($user)
		{	
		if($user->gid==18)
			{
			if($RegisteredAutoPublish==0)
				{
				$query  = 'UPDATE #__properties_products'
				. ' SET published = 0 WHERE agent_id = '.$user->id		
				;
	    		$db 	=& JFactory::getDBO();
	   			$db->setQuery($query);
					if (!$db->query())
					{
						JError::raiseError(500, $db->getErrorMsg() );
					}
	
				}
			}
		}
	
}		
		

