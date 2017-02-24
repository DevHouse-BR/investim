<?php
// no direct access
defined ( '_JEXEC' ) or die ( 'Restricted access' );
$option = JRequest::getVar('option');
$view	= JRequest::getCmd('view','properties');
$task = JRequest::getVar('task');
if($task){$text = ' : '.JText::_( $task ) ;}
switch ($view) {
	case "categories" :		
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Categories' ). $text , 'categories.png' );
		break;	
	case "types" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Types' ). $text , 'types.png' );
		break;
	case "products" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Products' ). $text , 'products.png' );
		break;
	case "subproducts" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Subproducts' ). $text , 'subproducts.png' );
		break;		
	case "countries" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Countries' ). $text , 'countries.png' );
		break;
	case "states" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'States' ). $text , 'states.png' );
		break;
	case "localities" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Localities' ). $text , 'localities.png' );
		break;
	case "contacts" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Contacts' ). $text , 'contacts.png' );
		break;
	case "comments" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Comments' ). $text , 'comments.png' );
		break;
	case "properties" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Panel de Control' ), 'panel.png' );
		break;	
	case "profiles" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Profiles' ). $text , 'profiles.png' );
		break;
	case "users" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Users' ). $text , 'users.png' );
		break;
	case "configuration" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Configuration' ), 'configuration.png' );
		break;	
	case "help" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Help' ) , 'help.png' );
		break;
	case "images" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Images' ). $text , 'images.png' );
		break;	
	case "info" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Información' ) , 'info.png' );
		break;
	case "forms" :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Form '.$table ) , 'forms.png' );
		break;
	default :
		JToolBarHelper::title ( '&nbsp; &nbsp;'.JText::_ ( 'Properties' ), 'properties.png' );
		break;
}


JHTML::_('behavior.switcher');
// Load submenu's
$views	= array(
					'properties'			=> JText::_('Panel de Control'),
					'configuration'			=> JText::_('Configuration'),	
					'categories'			=> JText::_('Categories'),
					'types' 			=> JText::_('Types'),				
					'products' 			=> JText::_('Products'),
					/*'subproducts' 			=> JText::_('SubProducts'),	*/				
					//'profiles'		=> JText::_('Profiles'),
					'profiles'		=> 'Investidores'
					//'users'		=> JText::_('Users'),
					//'comments'		=> JText::_('Comments'),
					
				);	


foreach( $views as $key => $val )
{
	$active	= ( $view == $key );
		//JSubMenuHelper::addEntry( $val , 'index.php?option=com_gestor&view=' . $key , $active );
JSubMenuHelper::addEntry('<img src="components/'.$option.'/includes/img/t_'.$key.'.png" style="margin-right: 5px;" align="absmiddle" />'.$val, 'index.php?option='.$option.'&view=' . $key , $active);
}

