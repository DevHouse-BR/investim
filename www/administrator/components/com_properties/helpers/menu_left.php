<?php
class MenuLeft
{	
	function ShowMenuLeft(  )
	{	
	$option = JRequest::getVar('option');
	$mosConfig_live_site=JURI::base();	
	$t_image=JURI::base().'/components/'.$option.'/includes/img/';
			
	$view = JRequest::getVar('view');		
switch ($view) {		
	case 'configuration':case 'properties':case 'info':	case 'help':		
		$show = 0;
	break;	
	case 'categories':case 'types':
		$show = 1;
	break;	
	case 'products':case 'subproducts':case 'rates':case 'images':case 'pdfs':
		$show = 2;
	break;
	case 'countries':case 'states':case 'localities':
		$show = 3;
	break;
	case 'users':case 'profiles':case 'contacts':case 'comments':
		$show = 4;
	break;
	}
	
	jimport('joomla.html.pane');
	$pane	=& JPane::getInstance('sliders', array('startOffset'=>$show));	
	
	?>
<table width="202px" style="height:100%" cellpadding="0" cellspacing="0" >
	<tr>
    <td style=" height:7px; width:200px;background:url(<?php echo $t_image;?>top_menu_bg.jpg) no-repeat bottom left ">
	
	</td></tr>
	<tr>
		<td style="border-left:1px solid #cccccc;border-right:1px solid #cccccc" align="center">
        <img src="<?php echo $t_image;?>logo.png" alt="Componente logo" title="Formación" border="0"/>
        </td>
	</tr>
	<tr>
		<td style="border-left:1px solid #cccccc;border-right:1px solid #cccccc">
	
            
            
            
	            <?php
				echo $pane->startPane( 'stat-pane' );
				echo $pane->startPanel( JText::_('Control Panel') , 'welcome' );
				?>                
              
					<table class="adminlistm" style="border-spacing:0px;" cellpadding="4" cellspacing="4">
						<tr>
							<td width="16px"><img src="<?php echo $t_image;?>t_configuration.png" alt=" " /></td>
							<td class="title" colspan="2"><a class="menu_link" href="index.php?option=<?php echo $option;?>&view=configuration"><?php echo JText::_('Configuration');?></a></td>
						</tr>
                        <tr>
							<td width="16px"><img src="<?php echo $t_image;?>t_properties.png" alt=" " /></td>
							<td class="title" colspan="2"><a class="menu_link" href="index.php?option=<?php echo $option;?>&view=properties"><?php echo JText::_('Control Panel');?></a></td>
						</tr>	
                        <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_info.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=info"><?php echo JText::_('Info');?></a>
								</td>
							</tr>
							<!--<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_help.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=help"><?php echo JText::_('Help');?></a>
								</td>
							</tr>						-->
					</table>
					
                
	            <?php
				echo $pane->endPanel();
				echo $pane->startPanel( JText::_('Categories and Types') , 'Categories' );
				?>                                    

						<table class="adminlistm" style="border-spacing:0px;" cellpadding="4" cellspacing="4">
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_categories.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=categories"><?php echo JText::_('Categories List');?></a>
								</td>
							</tr>
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_categories_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=categories&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add Category');?></a>
								</td>
							</tr>
                            
                            <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_types.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=types"><?php echo JText::_('Types List');?></a>
								</td>
							</tr>
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_types_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=types&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add Type');?></a>
								</td>
							</tr>
                            
						</table>
				
                
	            <?php
				echo $pane->endPanel();
				echo $pane->startPanel( JText::_('Products') , 'Products' );
				?>                                

						<table class="adminlistm" style="border-spacing:0px;" cellpadding="4" cellspacing="4">
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_products.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=products"><?php echo JText::_('Products List');?></a>
								</td>
							</tr>
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_products_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=products&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add Product');?></a>
								</td>
							</tr>
                            
                           
                            
                            
                            
                            <!-- <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_rates.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=rates"><?php echo JText::_('Rates List');?></a>
								</td>
							</tr>
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_rates_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=rates&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add Rate');?></a>
								</td>
							</tr>
                            
                            <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_pdfs.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=pdfs"><?php echo JText::_('pdfs List');?></a>
								</td>
							</tr>
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_pdfs_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=pdfs&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add pdf');?></a>
								</td>
							</tr>-->
                            
						</table>
				
                
                 
	            <?php
				echo $pane->endPanel();
				echo $pane->startPanel( JText::_('Regions') , 'Regions' );
				?>                

						<table class="adminlistm" style="border-spacing:0px;" cellpadding="4" cellspacing="4">
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_countries.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=countries"><?php echo JText::_('Countries List');?></a>
								</td>
							</tr>
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_countries_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=countries&layout=form&task=edit&cid[]=0">Adicionar País</a>
								</td>
							</tr>
                            
                            <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_states.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=states"><?php echo JText::_('States List');?></a>
								</td>
							</tr>
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_states_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=states&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add State');?></a>
								</td>
							</tr>
                            
                            <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_localities.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=localities"><?php echo JText::_('Localities List');?></a>
								</td>
							</tr>
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_localities_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=localities&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add Locality');?></a>
								</td>
							</tr>
                            
						</table>
				
                
	            <?php
				echo $pane->endPanel();
				//echo $pane->startPanel( JText::_('Users and Profiles') , 'users' );
				echo $pane->startPanel( JText::_('Investidores') , 'users' );
				?>                

						<table class="adminlistm" style="border-spacing:0px;" cellpadding="4" cellspacing="4">
							<!--<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_users.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=users"><?php echo JText::_('Users List');?></a>
								</td>
							</tr>-->
							<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_profiles.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=profiles"><?php echo JText::_('Profiles List');?></a>
								</td>
							</tr>
                            <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_profiles_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=profiles&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add Profile');?></a>
								</td>
							</tr>
                            <!--<tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_contacts.png" alt='i' /></td>
								<td class="title">
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=contacts"><?php echo JText::_('Contacts List');?></a>
								</td>
							</tr>
                            <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_comments.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=comments"><?php echo JText::_(' Comments List');?></a>
								</td>
							</tr>
                            <tr>
								<td width="16px"><img src="<?php echo $t_image;?>t_comments_add.png" alt='?' /></td>
								<td>
									<a class="menu_link" href="index.php?option=<?php echo $option;?>&view=comments&layout=form&task=edit&cid[]=0"><?php echo JText::_('Add Comment');?></a>
								</td>
							</tr>-->
						</table>
					
                
                
 
                 <?php
				echo $pane->endPanel();
				
				?> 
                
                 
           
		</td>
	</tr>
	<tr ><td style=" height:8px; width:200px;background:url(<?php echo $t_image;?>bottom_menu_bg.jpg) no-repeat top left ">
		<img src="<?php echo $mosConfig_live_site;?>/images/blank.png" alt=' ' />
	</td></tr>
</table>
<?php
	}
}