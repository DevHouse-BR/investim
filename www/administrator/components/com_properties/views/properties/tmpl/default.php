<?php
// Disallow direct access to this file
defined('_JEXEC') or die('Restricted access');
$Version='3.1104';
?>

<?php
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'menu_left.php' );
?>
<table width="100%">
	<tr>
		<td align="left" width="20%" valign="top">
<?php echo MenuLeft::ShowMenuLeft();?>

		</td>
        <td align="left" width="80%" valign="top">                
        
<table width="100%" border="0">
	<tr>
		<td width="70%" valign="top">
			<div id="cpanel">
            	<?php echo $this->addIcon('configuration.png','configuration', JText::_('Configuration'));?>
				<?php echo $this->addIcon('categories.png','categories', JText::_('Categories'));?>
				<?php echo $this->addIcon('types.png','types', JText::_('Types'));?>
				<?php echo $this->addIcon('properties.png','products', JText::_('Products'));?>
				<?php echo $this->addIcon('profiles.png','profiles', Investidores);?>
                <?php // echo $this->addIcon('subproducts.png','subproducts', JText::_('SubProducts'));?>
				<?php echo $this->addIcon('countries.png','countries', JText::_('Countries'));?>
				<?php echo $this->addIcon('states.png','states', JText::_('States'));?>
				<?php echo $this->addIcon('localities.png','localities', JText::_('Localities'));?>
				
                <?php //echo $this->addIcon('users.png','profiles', JText::_('Users Data'));?>
                <?php //echo $this->addIcon('contacts.png','contacts', JText::_('Contact forms sent'));?>
				<?php //echo $this->addIcon('languages.png','languages', JText::_('languages'));?>
				<?php //echo $this->addIcon('help.png','manual', JText::_('Help'));?>
                <?php //echo $this->addIcon('icon-48-article.png','db&task=show', JText::_('Show DB'));?>
                <?php //echo $this->addIcon('icon-48-article.png','menus&task=menus', JText::_('Create Menus'));?>
                <?php //echo $this->addIcon('icon-48-article.png','menus&task=repare_menus', JText::_('Repare Menus'));?>
				<?php //echo $this->addIcon('icon-48-article.png','menus&task=export', JText::_('Create Csv'));?>
                <?php //echo $this->addIcon('icon-48-article.png','menus&task=import', JText::_('Import Csv'));?>
                <?php //echo $this->addIcon('icon-48-article.png','sql&task=update_sql&sql='.$Version, JText::_('Update SQL'));?>
			</div>
		</td>
		<td width="30%" valign="top">
			<?php
				echo $this->pane->startPane( 'stat-pane' );
				echo $this->pane->startPanel( 'Investim' , 'welcome' );
			?>
			<table class="adminlist">
				<tr>
					<td>
						<div style="font-weight:700;">
							<?php echo JText::_('Version').' : '.$Version;?> - Com-Property
						</div>
						COM-PROPERTIES TRADUZIDO E IMPLEMENTADO POR:<br /><br />
						<a target="_blank" href="http://www.devhouse.com.br"><img border="0" src="http://www.devhouse.com.br/images/devhouse_logo_pq.png"  /></a>
					</td>
				</tr>
			</table>
			<?php
				echo $this->pane->endPanel();
				echo $this->pane->startPanel( JText::_('Products') , 'community' );
			?>
				<table class="adminlist">
					<tr>
						<td>
							<?php echo JText::_( 'Products' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->products; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'Categories' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->categories; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'Types' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->types; ?></strong>
						</td>
					</tr>
				</table>

			<?php
				echo $this->pane->endPanel();
				//echo $this->pane->startPanel( JText::_('Agents'), 'groups' );
			?>
				<!--<table class="adminlist">
					<tr>
						<td>
							<?php echo JText::_( 'Agents' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->agents; ?></strong>
						</td>
					</tr>					
					
                    <tr>
						<td>
							<?php echo JText::_( 'Registered' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->registered; ?></strong>
						</td>
					</tr>
				</table>-->
			<?php
				//echo $this->pane->endPanel();
				echo $this->pane->startPanel( JText::_('More visited'), 'news' );
			?>
				<table class="adminlist">
<?php
							
	for ($i=0, $n=count( $this->morevisited ); $i < $n; $i++)	
    {
$row = &$this->morevisited[$i];
echo '<tr><td>'.$row->hits.' </td><td> '.$row->id.' : '.$row->name.'</td></tr>';
}
?>

				</table>
			<?php
				echo $this->pane->endPanel();
				echo $this->pane->endPane();
			?>
		</td>
	</tr>
</table>

		</td>
	</tr>
</table>


<form action="index.php" method="post" name="adminForm">


		
		<input type="hidden" name="option" value="com_properties" />
		<input type="hidden" name="task" value="" />
        
		
		
</form>