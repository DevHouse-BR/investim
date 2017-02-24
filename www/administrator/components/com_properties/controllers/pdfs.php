<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class PropertiesControllerPdfs extends PropertiesController
{
	function __construct()
	{
		parent::__construct();
		
		$this->registerTask( 'add'  , 	'edit' );
		$this->registerTask( 'apply',	'save' );
		$this->registerTask('save2new',		'save');
		$this->registerTask( 'unpublish', 	'publish');	
	}
	
	function display()
	{
		parent::display();
	}	
	
	function edit()
	{
		JRequest::setVar( 'view', 'pdfs' );
		JRequest::setVar( 'layout', 'form' );		
		parent::display();
	}
	
	function save()
	{
	jimport('joomla.filesystem.folder');
	jimport('joomla.filesystem.file');
	$this->TableName='pdfs';
	global $mainframe;
	$component_name = 'properties';
	$option = JRequest::getVar('option');
	$model = $this->getModel('pdfs');
	$post = JRequest::get( 'post' );
$db 	=& JFactory::getDBO();
require_once(JPATH_SITE.DS.'configuration.php');
$datos = new JConfig();	
$basedatos = $datos->db;
$dbprefix = $datos->dbprefix;
$query = "SHOW TABLE STATUS FROM `".$basedatos."` LIKE '".$dbprefix.$component_name."_".$this->TableName."';";
		$db->setQuery( $query );		
		$nextAutoIndex = $db->loadObject();
$path_archivo = JPATH_SITE.DS.'images'.DS.$component_name.DS.'pdfs'.DS;
if(JRequest::getVar('id')){ $id_archivo = JRequest::getVar('id');}
else{$id_archivo = $nextAutoIndex->Auto_increment;}

//require_once (JPATH_COMPONENT.DS.'helpers'.DS.'thumbnail_images.class.php');
	
if($_FILES['archivo']['name']) {

$ext =  '.'.JFile::getExt($_FILES['archivo']['name']);

$name_archivo = str_replace($ext,'',$_FILES['archivo']['name']);

$name_archivo = JFilterOutput::stringURLSafe($name_archivo).$ext;

		
		$name_archivo = $id_archivo.'_'.$name_archivo;
		$move_to=$path_archivo.$name_archivo;

//JError::raiseError(500, $name_archivo, true );

        if(move_uploaded_file($_FILES['archivo']['tmp_name'],$move_to)) {
            
            chmod($move_to,0666);
			
$post['archivo'] = $name_archivo;	
$post['archivo_path'] = $move_to;	
$post['archivo_rout'] = $mainframe->getSiteURL().'images/'.$component_name.'/pdfs/'.$name_archivo;	

		}
	}
	
$text = JRequest::getVar( 'text', '', 'post', 'string', JREQUEST_ALLOWRAW );		
$post['text'] = $text;

if($post['date']){
$f=explode('-',$post['date']);
$date=$f[2].'-'.$f[1].'-'.$f[0];
$post['date']=$f[2].'-'.$f[1].'-'.$f[0];
}
if ($model->store($post)) {	
$msg = 	JText::_( 'Saved').' ( '.$post['name'].' ) ';

	switch (JRequest::getCmd( 'task' ))
		{
			case 'apply':
	$this->setRedirect( 'index.php?option=com_properties&view=pdfs&layout=form&task=edit&cid[]='.$id_archivo);
				break;
			case 'save':
	$this->setRedirect( 'index.php?option=com_properties&view=pdfs');
				break;			
				
			case 'save2new':
	$this->setRedirect(JRoute::_('index.php?option=com_properties&view=pdfs&layout=form&task=edit', false));
	$msg.=JText::_('You can add new Product.');
				break;					
		}
		
						
			
		} else {
			$msg = JText::_( 'Error Saving Greeting' );
			$msg .=  'err'.$this->Err;
		}	
		$this->setMessage( JText::_( $msg ) );	
	}
	
	
	

	function cancel()
	{
	$this->TableName = JRequest::getCmd('table');
		$msg = JText::_( 'Operation Cancelled' );
		//$this->setRedirect( 'index.php?option=com_properties&table='.$this->TableName, $msg );
		parent::display();
	}	
	
	
	
	
	
	
	


	
	
	
	
}