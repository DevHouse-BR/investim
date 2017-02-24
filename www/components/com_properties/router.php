<?php
defined('_JEXEC') or die('Restricted access');

	
function PropertiesBuildRoute( &$query )
{


      $segments = array();	  
	  $menu = &JSite::getMenu();
	
	if (empty($query['Itemid'])) {
		$menuItem = &$menu->getActive();		
	} else {
		$menuItemid = &$menu->getItem($query['Itemid']);
	}
 	
	$Mview=$menuItemid->query['view'];	
//echo $Mview;
	unset( $query['view'] );	
	   if(isset($query['task']))
	   {
	  
	  			if($query['task'] == 'agentlisting'){
					$segments[] = $query['task'];
               		unset( $query['task'] );
	   							
				
				}elseif($query['task'] == 'addlightbox'){
				$segments[] = $query['task'];
                unset( $query['task'] );						
				}else{
				$segments[] = $query['task'];
                unset( $query['task'] );
				}
		}
		
  

	if(isset($query['cyid']))
       {
                $segments[] = $query['cyid'];
                unset( $query['cyid'] );
       }
				
	if(isset($query['sid']))
       {
                $segments[] = $query['sid'];
                unset( $query['sid'] );
       }
	
	if(isset($query['lid']))
       {
                $segments[] = $query['lid'];
                unset( $query['lid'] );
       }
	
		
	if(isset($query['cid']))
       {
                $segments[] = $query['cid'];
                unset( $query['cid'] );
       }
	  
	if(isset($query['tid']))
       {
                $segments[] = $query['tid'];
                unset( $query['tid'] );
       }	   
	if(isset($query['id']))
       {	   				
                $segments[] = $query['id'];
                unset( $query['id'] );				
       }
	   
	  if(isset($query['layout']))
       {
              $segments[] = $query['layout'];
           unset( $query['layout'] );
       }	
  
	
	   
	   				
	if(isset($query['aid']))
       {
                $segments[] = $query['aid'];
                unset( $query['aid'] );
       }
	   


		 if(isset($query['tmpl']))
      					 {
           			     $segments[] = $query['tmpl'];
          			      unset( $query['tmpl'] );
      					 }					 
						 		
if(isset($query['start']))
       {	   				
                $segments[] = $query['start'];
                unset( $query['start'] );				
       }

       return $segments;
}







function PropertiesParseRoute( $segments)
{	
	global $mainframe;
	
	$component = JComponentHelper::getComponent( 'com_properties' );
	$params = new JParameter( $component->params );
	$UseCountry=$params->get('UseCountry');
	$UseCountryDefault=$params->get('UseCountryDefault');
	$UseState=$params->get('UseState');
	$UseStateDefault=$params->get('UseStateDefault');
	$UseLocality=$params->get('UseLocality');
	$UseLocalityDefault=$params->get('UseLocalityDefault');
	
	$menu =& JSite::getMenu();
	$item =& $menu->getActive();
   	
       $vars = array();	   
	   $count = count( $segments );

//print_r($menuItemid);

$menuItemid = &$menu->getItem($query['Itemid']);

$Mview=$item->query['view'];
//echo $item->query['view'];
       switch($item->query['view'])
       {
               case 'property':
                      $vars['view'] = $Mview;  
					  $vars['cyid'] = $segments[0];
					  $vars['sid'] = $segments[1];
					  $vars['lid'] = $segments[2];                   
					  $vars['cid'] = $segments[3];
					  $vars['tid'] = $segments[4];
					  $vars['id'] = $segments[5];					 
                break;
								
				case 'properties':					   
					   $vars['view'] = 'properties';  
					   
					if($segments[0]=='search'){											
					  $vars['task'] = 'search';		
					  $vars['view'] = 'properties';
					  $vars['cyid'] = $segments[1];
					  $vars['sid'] = $segments[2];
                      			
					}elseif($segments[0]=='agentlisting'){
					   								
									$vars['task'] = $segments[0];									
									$vars['aid'] = $segments[1];	
										
					}elseif($segments[0]=='addlightbox'){
					 		 $vars['task'] = $segments[0];
							 $vars['id'] = $segments[1];
					}elseif($segments[0]=='map'){
					 		 $vars['task'] = $segments[0];
							 $vars['id'] = $segments[1];
					}elseif($segments[0]=='recommend'){
					 		 $vars['task'] = $segments[0];
							 $vars['id'] = $segments[1];
					}elseif($segments[0]=='print_property'){
					 		 $vars['task'] = $segments[0];
							 $vars['id'] = $segments[1];		 
					}elseif($segments[0]=='addlightbox'){
							$vars['task'] = $segments[0];
					
					 		
					}elseif($segments[0]=='showproperty'){
					
					$vars['view'] = 'property';  
						
						if($UseCountry and $UseState and $UseLocality){	
						$vars['cyid'] = $segments[1];
						$vars['sid'] = $segments[2];
						$vars['lid'] = $segments[3]; 
						$vars['cid'] = $segments[4];
						$vars['tid'] = $segments[5];
						$vars['id'] = $segments[6];
						}
						elseif($UseState and $UseLocality){
						$vars['sid'] = $segments[1];
						$vars['lid'] = $segments[2];
						$vars['cid'] = $segments[3];
						$vars['tid'] = $segments[4];
						$vars['id'] = $segments[5];
						}
						elseif($UseLocality){
						$vars['lid'] = $segments[1]; 
						$vars['cid'] = $segments[2];
						$vars['tid'] = $segments[3];
						$vars['id'] = $segments[4];						
						}
						else{
						$vars['cid'] = $segments[1];
						$vars['tid'] = $segments[2];
						$vars['id'] = $segments[3];
						}
					
					}elseif($segments[0]=='showlocation'){
						
						if($UseCountry and $UseState and $UseLocality){	
						$vars['cyid'] = $segments[1];
						$vars['sid'] = $segments[2];
						$vars['lid'] = $segments[3]; 
						$vars['cid'] = $segments[4];
						$vars['tid'] = $segments[5];
						$vars['id'] = $segments[6];
						}
						elseif($UseState and $UseLocality){
						$vars['sid'] = $segments[1];
						$vars['lid'] = $segments[2];
						$vars['cid'] = $segments[3];
						$vars['tid'] = $segments[4];
						$vars['id'] = $segments[5];
						}
						elseif($UseLocality){
						$vars['lid'] = $segments[1]; 
						$vars['cid'] = $segments[2];
						$vars['tid'] = $segments[3];
						$vars['id'] = $segments[4];						
						}
						else{
						$vars['cid'] = $segments[1];
						$vars['tid'] = $segments[2];
						$vars['id'] = $segments[3];
						}
					
					}elseif($segments[0]=='showcategory'){
						
						$vars['cid'] = $segments[1];
						$vars['tid'] = $segments[2];
						$vars['id'] = $segments[3];
					
					}else{
					 $vars['limitstart'] = $segments[0];
					}

	 
                       break;					   
				
				
				case 'location':
                      $vars['view'] = $Mview;  
					  $vars['cyid'] = $segments[0];
					  $vars['sid'] = $segments[1];
					  $vars['lid'] = $segments[2];					  				 
                break;
				
				
				case 'category':
					  $vars['view'] = 'category';					 
					  $vars['cid'] = $segments[1];
					
					  if($segments[2]){
					 		 $vars['limitstart'] = $segments[2];
						}
                break;
				case 'type':
					  $vars['view'] = 'category';					 
					  $vars['cid'] = $segments[0];
					  $vars['tid'] = $segments[1];
					  $vars['limitstart'] = $segments[2];
                break;
				
				case 'agents':
					  $vars['view'] = 'properties';
					  $vars['task'] = 'agentlisting';
					  $vars['aid'] = $segments[2];
                break;
				
				   
				case 'profile':
                       $vars['view'] = 'profile';					 
                       break;
				   
				case 'panel':
                      $vars['view'] = 'panel';					
					  $vars['task'] = $segments[0];					
					  $vars['id'] = $segments[1];					  			  
                       break;
			
				
				case 'addlightbox':
					  $vars['task'] = 'addlightbox';
					  $vars['id'] = $segments[2];
                       break;
				
				case 'shortlist':
					  $vars['view'] = 'shortlist';	
					  $vars['task'] = $segments[1];	
					  $vars['id'] = $segments[2];			  
                       break;
				case 'map':					  	
					  $vars['task'] = $segments[1];	
					  $vars['id'] = $segments[2];			  
                       break;
					   	   
				default:
				/*$vars['cid'] = $segments[0];*/
				break;
                                      
       }	 
	   
/*
$nombre_archivo = 'components\com_properties\fabio_router.txt';
$gestor = fopen($nombre_archivo, 'a');
$contenido = 'segments 0 : '. $segments[0]."\n";
$contenido .= 'segments 1 : '. $segments[1]."\n";
$contenido .= 'segments 2 : '. $segments[2]."\n";
$contenido .= 'segments 3 : '. $segments[3]."\n";
$contenido .= 'segments 4 : '. $segments[4]."\n";
$contenido .= 'segments 5 : '. $segments[5]."\n";
$contenido .= 'uri : '. $_SERVER['HTTP_REFERER']."\n";
fwrite($gestor, $contenido);
 

  echo 'myrouter<br>';
print_r($segments);
print_r($vars);
  */ 
  
       return $vars;
}

