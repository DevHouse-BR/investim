<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.view' );

class PropertiesViewProperties extends JView{
	
	function display($tpl = null)
	{

	$doc =& JFactory::getDocument();
	$doc->addStyleSheet('components/'.$option.'/includes/css/index.css');		
	$text = $TableName ? JText::_( ' &nbsp; &nbsp; ').JText::_( 'Properties' ) : JText::_( ' &nbsp; &nbsp; ').JText::_( 'Properties' );
	$icono = $TableName ? JText::_( $TableName.'.png' ) : JText::_( 'properties.png' );
JToolBarHelper::title(   JText::_( $text ), $icono);

//JToolBarHelper::preview('index.php?option=com_properties&view=preview&tmpl=component');
JToolBarHelper::custom('preview', 'preview.png', 'preview_f2.png', 'Preview', false, false);
/*
JToolBarHelper::editHtml();
JToolBarHelper::editHtmlX();
JToolBarHelper::editCss();
JToolBarHelper::editCssX();
*/






jimport('joomla.html.pane');
$pane	=& JPane::getInstance('sliders');		

$products		= $this->get( 'Totalproducts' );
$categories		= $this->get( 'Totalcategories' );
$types			= $this->get( 'Totaltypes' );
$agents			= $this->get( 'Totalagents' );
$publisher		= $this->get( 'Totalpublisher' );
$registered		= $this->get( 'Totalregistered' );
$morevisited	= $this->get( 'Morevisited' );

$this->assignRef( 'products'		, $products );
$this->assignRef( 'categories'		, $categories );
$this->assignRef( 'types'		, $types );
$this->assignRef( 'agents'		, $agents );
$this->assignRef( 'publisher'		, $publisher );
$this->assignRef( 'registered'		, $registered );
$this->assignRef( 'morevisited'		, $morevisited );

		$this->assignRef( 'pane'		, $pane );
		parent::display( $tpl );
		
	}
	
	
	
	function addIcon( $image , $view, $text )
	{
		$lang		=& JFactory::getLanguage();
		$link		= 'index.php?option=com_properties&view='.$view.'&limitstart=0&filter_order=ordering';
?>
		<div style="float:<?php echo ($lang->isRTL()) ? 'right' : 'left'; ?>;">
			<div class="icon">
				<a href="<?php echo $link; ?>">
					<?php echo JHTML::_('image', 'administrator/components/com_properties/includes/img/' . $image , NULL, NULL, $text ); ?>
					<span><?php echo $text; ?></span></a>
			</div>
		</div>
<?php
	}
	
	
	
}