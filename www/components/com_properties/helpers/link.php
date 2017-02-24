<?php
class LinkHelper
{	
	function getItemid( $TableName )
	{
		$db =& JFactory::getDBO();	
		$query = 'SELECT id FROM #__menu' .
				' WHERE link LIKE "%index.php?option=com_properties&view='.$TableName.'%"';					
		$db->setQuery( $query );
		$output = $db->loadResult();
		
		if(!$output){
		$query = 'SELECT id FROM #__menu' .
				' WHERE link LIKE "%index.php?option=com_properties&view=properties%"';			
		$db->setQuery( $query );
		$output = $db->loadResult();
		}
		
		return $output;
	}
	
	
	
	function getLink( $Pview,$Task=NULL,$Tmpl=NULL,$CYslug=NULL,$Sslug=NULL,$Lslug=NULL,$Cslug=NULL,$Tslug=NULL,$Pslug=NULL,$Aid=NULL )
	{
	
	$component = JComponentHelper::getComponent( 'com_properties' );
	$params = new JParameter( $component->params );
	$UseCountry=$params->get('UseCountry');
	$UseCountryDefault=$params->get('UseCountryDefault');
	$UseState=$params->get('UseState');
	$UseStateDefault=$params->get('UseStateDefault');
	$UseLocality=$params->get('UseLocality');
	$UseLocalityDefault=$params->get('UseLocalityDefault');
	
	$l = 'index.php?option=com_properties&amp;view='.$Pview;
	if($Task)
		{
		$l.='&amp;task='.$Task;
		}
	if($Tmpl)
		{
		$l.='&amp;tmpl='.$Tmpl;
		}
	if($CYslug)
		{
		if($UseCountry)
			{
			$ContryName=explode(':',$CYslug);
			$l.='&amp;cyid='.$ContryName[0].':'.JText::_($ContryName[1]);
			}
		}
	if($Sslug)
		{
		if($UseState)
			{
			$StateName=explode(':',$Sslug);
			$l.='&amp;sid='.$StateName[0].':'.JText::_($StateName[1]);
			}	
		}
	if($Lslug)
		{
		if($UseLocality)
			{
			$LocalityName=explode(':',$Lslug);
			$l.='&amp;lid='.$LocalityName[0].':'.JText::_($LocalityName[1]);
			}
		}	
	if($Cslug)
		{
		$CategoryName=explode(':',$Cslug);		
		$l.='&amp;cid='.$CategoryName[0].':'.JText::_($CategoryName[1]);
		}	
	if($Tslug)
		{
		$TypeName=explode(':',$Tslug);			
		$l.='&amp;tid='.$TypeName[0].':'.JText::_($TypeName[1]);
		}	
	if($Pslug)
		{
		$l.='&amp;id='.$Pslug;
		}
	if($Aid)
		{
		$l.='&amp;aid='.$Aid;
		}
	
			
	$l.='&amp;Itemid='.LinkHelper::getItemid($Pview);			
	
	$link = JRoute::_($l);
		
	return $link;
	}
	
	
}