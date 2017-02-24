<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.controller');
class PropertiesController extends JController
{
function __construct()
	{
		parent::__construct();		
		$this->registerTask( 'new'  , 	'newP' );
		$this->registerTask( 'unpublish', 	'publish');	
		$this->registerTask( 'unshow', 	'show');	
		$this->registerTask( 'delete'  , 	'removeProperty' );
		$this->cid 		= JRequest::getVar( 'Pid');
JArrayHelper::toInteger($this->cid, array(0));

	}
	
		
	function display()
	{
		$document =& JFactory::getDocument();

		$viewName	= JRequest::getVar('view', 'properties', 'default', 'cmd');
		$viewType	= $document->getType();

		
		// Set the default view name from the Request
		$view = &$this->getView($viewName, $viewType);

		// Push a model into the view
		

		// Workaround for the item view
		if (($viewName == 'category') or ($viewName == 'type') or ($viewName == 'location'))
		{
			$modelList	= &$this->getModel( 'list' );
			$view->setModel( $modelList );
		}else{
		$model	= &$this->getModel( $viewName );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		
		
		}

		// Display the view
		$view->assign('error', $this->getError());
		$view->display();
	}
	
	
	
	function showproperty()
		{
		JRequest::setVar( 'view', 'property' );
		parent::display();
		}
	
	
function element()
	{
		$model	= &$this->getModel( 'properties' );
		$view	= &$this->getView( 'element');
		$view->setModel( $model, true );
		$view->display();
	}
		
function send_reservation()	
	{
		JRequest::setVar( 'view', 'property' );
		JRequest::setVar( 'layout', 'default_reservation'  );
		$linkid 	= JRequest::getVar( 'linkid','','post' );
		$linktypeid  = JRequest::getVar( 'linktypeid','','post' );
		$linkcatid  = JRequest::getVar( 'linkcatid','','post' );
		JRequest::setVar( 'cid', $linkcatid  );
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}
	
function feed()	
	{
		/*JRequest::setVar( 'view', 'properties' );
		JRequest::setVar( 'layout', ''  );*/
		JRequest::setVar( 'format', 'feed'  );
		JRequest::setVar( 'type', 'rss'  );
		JRequest::setVar( 'catid', $linkcatid  );
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}

function recommend()	
	{
		JRequest::setVar( 'view', 'properties' );
		JRequest::setVar( 'layout', 'default_recommend'  );
		JRequest::setVar('hidemainmenu', 1);
		JRequest::setVar( 'tmpl', 'component'  );
		parent::display();
	}		

function print_property()	
	{
		JRequest::setVar( 'view', 'property' );
		JRequest::setVar( 'layout', 'default_print'  );
		JRequest::setVar('hidemainmenu', 1);
		JRequest::setVar( 'tmpl', 'component'  );
		parent::display();
	}	
		
	function map()
	{ 	
jimport( 'joomla.application.component.helper' );
JRequest::setVar( 'tmpl', 'component'  );
$component = JComponentHelper::getComponent( 'com_properties' );
$params = new JParameter( $component->params );
$apikey    = $params->get( 'apikey' );
$distancia= $params->get( 'distancia' );
$Pid 		= JRequest::getVar( 'id');
$db 	=& JFactory::getDBO();
$query = 'SELECT p.*,t.name AS name_category '
				. ' FROM #__properties_products AS p '
				. 'LEFT JOIN #__properties_category AS t ON t.id = p.cid '	
				. 'WHERE p.id = '.$Pid ;
$db->setQuery($query);	        
		$Prod = $db->loadObject();

$lat=$Prod->lat;
$lng=$Prod->lng;
  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
    <title>Google Maps JavaScript API Example</title> 
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $apikey;?>"
      type="text/javascript"></script> 
    <script type="text/javascript"> 
 
    //<![CDATA[ 
 
    function load() { 
      if (GBrowserIsCompatible()) { 
        var map = new GMap2(document.getElementById("map")); 
        map.setCenter(new GLatLng(<?php echo $lat;?>, <?php echo $lng;?>), <?php echo $distancia;?>); 
	<!--map.setMapType(G_HYBRID_MAP); -->
 
	map.addControl(new GSmallMapControl()); 
	/*map.addControl(new GScaleControl()); */
	map.addControl(new GMapTypeControl()); 
/*	map.addControl(new GOverviewMapControl());*/ 
 
	var marker = new GMarker(new GLatLng(<?php echo $lat;?>, <?php echo $lng;?>)); 
	map.addOverlay(marker); 
	/*marker.openInfoWindowHtml("<img  src='simplemap_logo.jpg' align='left' width='100' height='75'/>");
  */
 
      }
    }
 
    //]]>
    </script> 
  </head> 
<body onload="load()" onunload="GUnload()" style="width: 640px; height: 480px;"> 
<div id="map" style="width: 640px; height: 480px;"></div>    
</body> 
</html> 
<?php }

/*
function search()	
	{
		JRequest::setVar( 'view', 'properties' );
		JRequest::setVar( 'layout', 'default'  );
		JRequest::setVar('hidemainmenu', 1);			
		parent::display();
	}
*/
function editar()
	{

	$this->id = JRequest::getVar('id');
	/*	JRequest::setVar( 'view', 'panel' );
		JRequest::setVar( 'layout', 'default_addproperty' );
		JRequest::setVar('hidemainmenu', 1);
		JRequest::setVar('id', $this->id);*/
		//parent::display();
		$link = 'index.php?option=com_properties&view=panel&task=edit&id='.$this->id.'&Itemid='.$Itemid.'';
		$this->setRedirect($link, $msg);	
	}

function newP()
	{
	
		JRequest::setVar( 'view', 'panel' );
		//JRequest::setVar( 'layout', 'addproperty' );
		JRequest::setVar('hidemainmenu', 1);
		//JRequest::setVar('id', $this->id);
		parent::display();
	}


/* Publicar Despublicar items */
	function publish()
	{
$this->TableName = 'product';	
$Itemid = JRequest::getVar('Itemid');

$id		= JRequest::getVar( 'id' );

$this->publish	= ( $this->getTask() == 'publish' ? 1 : 0 );
$this->msg	= ( $this->getTask() == 'publish' ? 'Publish' : 'Unpublish' );		
	
		
		if ( $id  < 1)		{
			$action = $publish ? 'publish' : 'unpublish';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		
		$query = 'UPDATE #__properties_products'
		. ' SET published = ' . (int) $this->publish
		. ' WHERE id IN ( '. $id .' )'		
		;			
			
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$msg = JText::_($this->msg.' Property Succcess');
		$link = JRoute::_('index.php?option=com_properties&view=panel&Itemid='.$Itemid);
		$this->setRedirect($link, $msg);		
	}


	function show()
	{
$this->TableName = JRequest::getCmd('table');	
$cid		= JRequest::getVar( 'cid', array(), '', 'array' );
$this->show	= ( $this->getTask() == 'show' ? 1 : 0 );		
	
		JArrayHelper::toInteger($cid);
		if (count( $cid ) < 1)		{
			$action = $show ? 'show' : 'unshow';		
			JError::raiseError(500, JText::_( 'Select an item to' .$action, true ) );
		}
		$this->cids = implode( ',', $cid );
		$query =' UPDATE #__properties_profiles'
		. ' SET `show` = ' . (int) $this->show
		. ' WHERE id IN ( '. $this->cids .' )'		
		;			
		echo $query;
		$db 	=& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg() );
		}
		$link = 'index.php?option=com_properties&table='.$this->TableName;
		$this->setRedirect($link, $msg);		
	}
	
function removeProperty()
{
		global $mainframe;
		$db		=& JFactory::getDBO();
		$user =& JFactory::getUser();
		$model = $this->getModel('property');
		$TableName = 'products';
		$id = JRequest::getVar('id');
		$Itemid= JRequest::getVar('Itemid');
if ( !$user->id )
    {
        echo JText::_( 'Need to Login');
    }
    else
    {	
	
	$propid = JRequest::getVar('id');
$query = 'SELECT * FROM #__properties_products' .
				' WHERE id = '.$id.
				' AND agent_id = '.$user->id;
		$db->setQuery( $query );
		$data = $db->loadObjectlist();
$id = $data[0]->id;	
//echo $query;

        if ( 0 < $id )
        {
			

				
		if ($model->delete($id,$TableName)) {	
			$msg = JText::_( 'Property deleted');
			if($model->deleteImagesProperty($data,$TableName))
				{ 
				$msg2.=JText::_( 'Images Deleted' );
				}else{
				$msg2.=JText::_( 'No Images Deleted' );
				}
			
		} else {
			$msg = JText::_( 'Error Deleting Property' );
		}		
		
	echo $msg;

$link = JRoute::_('index.php?option=com_properties&view=panel&Itemid='.$Itemid);
$this->setRedirect($link, $msg);		
		/*JRequest::setVar('message', $message);
		JRequest::setVar( 'view', 'properties' );
		JRequest::setVar( 'layout', 'shortlist'  );		
		JRequest::setVar( 'msg', $msg  );
		
		parent::display();*/
		
		
		
		
		}
	}
}


function removeImgProperty()
	{
		global $mainframe;
		$db		=& JFactory::getDBO();
		$user =& JFactory::getUser();
		$model = $this->getModel('property');
		$TableName = 'products';
		$id = JRequest::getVar('id');
		$img = JRequest::getVar('img');
		$Itemid= JRequest::getVar('Itemid');
		
		$propid = JRequest::getVar('id');
$query = 'SELECT * FROM #__properties_products' .
				' WHERE id = '.$id.
				' AND agent_id = '.$user->id;
		$db->setQuery( $query );
		$data = $db->loadObjectlist();
$id = $data[0]->id;	

if($model->deleteimg($data,$TableName))
				{ 
				$msg.=JText::_( 'Images Deleted' );
				}else{
				$msg.=JText::_( 'No Images Deleted' );
				}

			echo $msg;

$link = JRoute::_('index.php?option=com_properties&view=panel&task=edit&id='.$id.'&Itemid='.$Itemid);
$this->setRedirect($link, $msg);	
		
	}



	
	
	function enviar_recomendar()
	{
		global $mainframe;
		$db		=& JFactory::getDBO();
		$productoId	= JRequest::getInt( 'id',0,'post' );
		$agent_id	= JRequest::getInt( 'agent_id',0,'post' );
		$linkid 	= JRequest::getVar( 'linkid','','post' );
		$linkcatid  = JRequest::getVar( 'linkcatid','','post' );
		$name		= JRequest::getVar( 'name','','post' );
		$emailDe		= JRequest::getVar( 'emailDe','','post' );
		$emailPara		= JRequest::getVar( 'emailPara','','post' );
		$subject	= JRequest::getVar( 'subject',$default,'post' );
		$body		= JRequest::getVar( 'text','','post' );
		$emailCopy	= JRequest::getInt( 'email_copy',0,'post' );		
		
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
		$siteURL		= JURI::base();

		$body = html_entity_decode($body, ENT_QUOTES);
		//get all super administrator
		$query = 'SELECT name, email, sendEmail' .
				' FROM #__users' .
				' WHERE LOWER( usertype ) = "super administrator"';
				//' WHERE publicador_id = '.$publicador_id;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();
		// Send email to user
		if ( ! $mailfrom  || ! $fromname ) {
			$fromname = $rows[0]->name;
			$mailfrom = $rows[0]->email;
		}
		
		
		$subject = JText::_( 'RECCOMEND_PROP_FROM_FRIEND');
            $message = $name." (".$emailDe.") ". JText::_( 'INVITE_VIEW_PROP')."\r \n";
            $message .= $body." \r \n\r \n" ;
            $message .= JText::_( 'BROKENLINK_WARNING')."\r \n";
	
		JUtility::sendMail($emailDe, $fromname, $emailPara, $subject, $message);		
		
		if($emailCopy == 1){
			JUtility::sendMail($mailfrom, $fromname, $emailDe, $subject, $message);
		}
		
		$msg=JText::_('Recommended Property send');
//$link = JRoute::_('index.php?option=com_properties&view=property&layout=recommend&recomendada=1&tmpl=component');
		
		JRequest::setVar('message', $message);
		JRequest::setVar( 'view', 'property' );
		JRequest::setVar( 'layout', 'default_recommend'  );
		JRequest::setVar( 'recomendada', 1  );
		JRequest::setVar( 'tmpl', 'component'  );
		JRequest::setVar( 'msg', $msg  );
		
		parent::display();
		
		
		//$this->setRedirect($link, $msg);
	}	
	
function enviar_consulta()
	{
		global $mainframe;		
		$component = JComponentHelper::getComponent( 'com_properties' );
		$params = new JParameter( $component->params );
		
		$db		=& JFactory::getDBO();

		$popup	= JRequest::getInt( 'popup',0,'post' );

		$productoId	= JRequest::getInt( 'id',0,'post' );
		$agent_id	= JRequest::getInt( 'agent_id',0,'post' );
		$linkid 	= JRequest::getVar( 'linkid','','post' );
		$linkcid  = JRequest::getVar( 'linkcid','','post' );
		$linktid  = JRequest::getVar( 'linktid','','post' );
		$name		= JRequest::getVar( 'name','','post' );
		$email		= JRequest::getVar( 'email','','post' );
		$phone	= JRequest::getVar( 'phone','','post' );
		$body		= JRequest::getVar( 'text','','post' );
		$emailCopy	= JRequest::getInt( 'email_copy',0,'post' );		
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
		$siteURL		= JURI::base();


	
	// Captcha Controller Patch rev. 4.5.0 Stable
		$dispatcher	= &JDispatcher::getInstance();
		$results = $dispatcher->trigger( 'onCaptchaRequired', array( 'user.contact' ) );
		if ( $results[0] ) {
			$captchaparams = array( JRequest::getVar( 'captchacode', '', 'post' )
			, JRequest::getVar( 'captchasuffix', '', 'post' )
			, JRequest::getVar( 'captchasessionid', '', 'post' ));
			$results = $dispatcher->trigger( 'onCaptchaVerify', $captchaparams );
			if ( ! $results[0] ) {
				JError::raiseWarning( 'CAPTHCA', JText::_( 'CAPTCHACODE_DO_NOT_MATCH' ) );
				$link = JRoute::_('index.php?option=com_properties&view=property&cid='.$linkcid.'&tid='.$linktid.'&id='.$linkid,false);
				$this->setRedirect($link, $msg);
				
				return false;
			}
		}
		
$query = 	"SELECT * from #__properties_products where id = ".$productoId;
$db->setQuery( $query );				
$product = $db->loadObject();		
		
		
		$body = html_entity_decode($body, ENT_QUOTES);
		
		$query = 'SELECT name, email, sendEmail' .
				' FROM #__users' .				
				' WHERE id = '.$product->agent_id;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();
	
		if ( ! $mailfrom  || ! $fromname ) {
			$fromname = $rows[0]->name;
			$mailfrom = $rows[0]->email;
		}
		$emailPublicador = $rows[0]->email;
		$namePublicador = $rows[0]->name;
		
		$subject = $product->id.' : '.$product->name;
		


//$agentM= $email .' | '. $name.' | '.$emailPublicador.' | '.$subject.' | '.$body. '----------<br>'."\n";
//$CopyM = $mailfrom .' | '. $fromname.' | '.$email.' | '.$subject.' | '.$body. '----------<br>'."\n";
//JError::raiseError(500,  $agentM.$CopyM );

$ContactMailFormat=$params->get('ContactMailFormat',0);
if($ContactMailFormat==1){
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'contact'.DS.'example_html.php');	
}else{
$headers  = '';
require_once(JPATH_COMPONENT.DS.'includes'.DS.'mail'.DS.'contact'.DS.'example_txt.php');
}
/*
$nombre_archivo1 = 'components\com_properties\consult_mail.html';
$gestor1 = fopen($nombre_archivo1, 'w');	
$contenido1 .= "\n".$body_html;
fwrite($gestor1, $contenido1);
*/




		JUtility::sendMail($email, $name, $emailPublicador, $subject, $body_html, $headers);		
	//	JUtility::sendMail($email, $name, 'admin@com-property.com', $subject, $body_html, $headers);	
		if($emailCopy == 1){
			JUtility::sendMail($mailfrom, $fromname, $email, $subject, $body_html,$headers);
		}	
		///save form////
		$SaveContactForm=$params->get('SaveContactForm',0);
		if($SaveContactForm==1){
		$this->TableName = 'contacts';
		$model = $this->getModel('property');	
		
		$data['form_product']	= JRequest::getInt( 'id',0,'post' );
		$data['form_agent_id']	= $product->agent_id;
		$data['form_name']		= JRequest::getVar( 'name','','post' );
		$data['form_email']		= JRequest::getVar( 'email','','post' );
		$data['form_phone']		= JRequest::getVar( 'phone','','post' );
		$data['form_message']	= JRequest::getVar( 'text','','post' );			
		
		if ($model->store($data,$this->TableName)) {
		
			}
		}
		////send to admin////
	/*	$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
		JUtility::sendMail($email, $fromname, $mailfrom, $subject, $body);
		*/
		/////////			
		$msg=JText::_( 'Message send');		
	if($popup==1){
	JRequest::setVar('message', $message);
		JRequest::setVar( 'view', 'property' );
		JRequest::setVar( 'layout', 'default_contact'  );
		JRequest::setVar( 'contacto', 1  );
		JRequest::setVar( 'tmpl', 'component'  );
		JRequest::setVar( 'msg', $msg  );		
		parent::display();
	}else{	

	
	$link =  JRequest::getVar( 'return','','post' );
	$this->setRedirect($link, $msg);
	}
	
		
	}

function confirmar_reserva()
	{
		global $mainframe;
		$db		=& JFactory::getDBO();

		$productoId	= JRequest::getInt( 'id',0,'post' );
		$agent_id	= JRequest::getInt( 'agent_id',0,'post' );
		$linkid 	= JRequest::getVar( 'linkid','','post' );
		$linkcatid  = JRequest::getVar( 'linkcatid','','post' );
		$linktypeid  = JRequest::getVar( 'linktypeid','','post' );
		$name		= JRequest::getVar( 'name','','post' );
		$email		= JRequest::getVar( 'email','','post' );
		$subject	= JRequest::getVar( 'subject',$default,'post' );
		$body		= JRequest::getVar( 'text','','post' );
		$emailCopy	= JRequest::getInt( 'email_copy',0,'post' );		
		$titulo		= JRequest::getVar( 'titulo','','post' );
		$desde		= JRequest::getVar( 'fechaD','','post' );
		$hasta		= JRequest::getVar( 'fechaA','','post' );
		
		$sitename 		= $mainframe->getCfg( 'sitename' );		
		//$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$Sitename 		= $mainframe->getCfg( 'fromname' );
		$siteURL		= JURI::base();
		
		$body = html_entity_decode($body, ENT_QUOTES);
		
		$query = 'SELECT name, email, sendEmail' .
				' FROM #__users' .
				' WHERE id = '.$agent_id;
		$db->setQuery( $query );
		$rows = $db->loadObjectList();
		
		//if ( ! $mailfrom  || ! $fromname ) {
			$fromname = $rows[0]->name;
			$mailfrom = $rows[0]->email;
		//}
		
					
			
		$subject = JText::_( 'MAIL_RESERVATION_SUBJET');
		$body = JText::_( 'MAIL_RESERVATION_BODY_AGENT');	
		$body .= JText::_( 'MAIL_RESERVATION_BODY' ).' '.$productoId.' '.	
		JText::_( 'MAIL_RESERVATION_TITLE' ).$titulo.' . '.
		"\n".$_SERVER['HTTP_REFERER'] ."\n".
		"\n".JText::_( 'MAIL_RESERVATION_FROM').$desde.' '.
		"\n".JText::_( 'MAIL_RESERVATION_TO').$hasta.' ';
		
		//$body .= "\n".JText::_( 'MAIL RESERVA TELEFONO' ).'0800-333-4567'.' ';
		
		$body .= "\n".' '.
		"\n".JText::_( 'MAIL_RESERVATION_EMAIL').' '.$email;





		
		$emailPublicador = $rows[0]->email;
		JUtility::sendMail($email, $Sitename, $emailPublicador, $subject, $body);
/*$subject1 = 'subjet1';
$body1 = "$email, 'Property', $emailPublicador, $subject, $body: \n"
.$email. 'Property'. $emailPublicador. $subject. $body;
JUtility::sendMail($emailPublicador, 'Property1', $email, $subject1, $body1);
*/
		//JUtility::sendMail($mailfrom, $fromname, $emailAdmin, $subject, $body);				
		
		$subject = JText::_( 'MAIL_RESERVATION_SUBJET');
		
		$body = JText::_( 'MAIL_RESERVATION_BODY' ).$productoId.		
		JText::_( 'MAIL_RESERVATION_TITLE' ).$titulo.' . '.
		"\n".JText::_( 'MAIL_RESERVATION_FROM').$desde.
		"\n".JText::_( 'MAIL_RESERVATION_TO').$hasta.
		//"\n".JText::_( 'MAIL RESERVA TELEFONO' ).'0800-333-4567'.
		"\n".JText::_( 'RESERVATION_ANSWER' ).
		"\n".JText::_( 'MAIL_RESERVATION_THANKS');
	
			JUtility::sendMail($emailPublicador, $Sitename, $email, $subject, $body);
						
		$msg=JText::_('Reservation Send From').' '.$desde.' '.JText::_( 'To' ).' '.$hasta;
$link = JRoute::_('index.php?option=com_properties&view=property&cid='.$linkcatid.'&tid='.$linktypeid.'&id='.$linkid,false);
		$this->setRedirect($link, $msg);
	}


function addlightbox()
{
		global $mainframe;
		$db		=& JFactory::getDBO();
		$user =& JFactory::getUser();
		$model = $this->getModel('property');
		$TableName = 'lightbox';
if ( !$user->id )
    {
        echo JText::_( 'Need Login');
    }
    else
    {	
	
	$propid = JRequest::getVar('id');
$query = 'SELECT count(*) ' .
				' FROM #__properties_lightbox' .
				' WHERE propid = '.$propid.
				' AND uid = '.$user->id;
		$db->setQuery( $query );
		$exists = $db->loadResult();

        if ( 0 < $exists )
        {
		$msg = JText::_( 'This Property already exists in your Short List');
		}else{
			
			$data['uid']=$user->id;
			$data['propid']=JRequest::getVar('id');

				if ($model->store($data,$TableName)) {	
					$msg = JText::_( 'Property added to Short List');
				} else {
					$msg = JText::_( 'Error Saving Greeting' );
				}		
	


//$link = JRoute::_('index.php?option=com_properties&view=properties&layout=default_popup&tmpl=component');
		}
		JRequest::setVar('message', $message);
		JRequest::setVar( 'view', 'shortlist' );
		JRequest::setVar( 'layout', 'default_popup'  );
		JRequest::setVar( 'tmpl', 'component'  );
		JRequest::setVar( 'msg', $msg  );
		
		parent::display();
		
		
		
		
		
	}
}




function removelightboxProperty()
{
		global $mainframe;
		$Itemid=JRequest::getVar('Itemid');
		$db		=& JFactory::getDBO();
		$user =& JFactory::getUser();
		$model = $this->getModel('property');
		$TableName = 'lightbox';
if ( !$user->id )
    {
        echo JText::_( 'Need Login');
    }
    else
    {	
	
	$propid = JRequest::getVar('id');
$query = 'SELECT id FROM #__properties_lightbox' .
				' WHERE propid = '.$propid.
				' AND uid = '.$user->id;
		$db->setQuery( $query );
		$id = $db->loadResult();

        if ( 0 < $id )
        {
			

		if ($model->delete($id,$TableName)) {	
			$msg = JText::_( 'Property deleted from Short List');
		} else {
			$msg = JText::_( 'Error Deleting Greeting' );
		}		
	

$link = JRoute::_('index.php?option=com_properties&Itemid='.JRequest::getVar('Itemid'),false);
$this->setRedirect($link, $msg);


		}
	}
}




}
/*
$u =& JFactory::getURI();
echo 'URI is ' . $u->toString() . "\n";
$link = $u->toString();
print_r( $u->getQuery( true ) );
//$arr=$u->getQuery( true );
unset($arr['task']);
unset($arr['id']);
$arr['option']=JRequest::getVar('option');
$arr['view']=JRequest::getVar('view');
$arr['Itemid']=JRequest::getVar('Itemid');
$arr['lang']=JRequest::getVar('lang');
print_r( $arr );
$a =& JURI::getInstance( );
$query = $a->buildQuery( $arr );
$a->setQuery( $query );
echo 'After : ' . $a->toString();
*/