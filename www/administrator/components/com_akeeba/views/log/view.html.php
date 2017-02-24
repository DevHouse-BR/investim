<?php
/**
 * @package AkeebaBackup
 * @copyright Copyright (c)2006-2010 Nicholas K. Dionysopoulos
 * @license GNU General Public License version 3, or later
 * @version $Id: view.html.php 71 2010-02-22 22:17:01Z nikosdion $
 * @since 1.3
 */

// Protect from unauthorized access
defined('_JEXEC') or die('Restricted Access');

// Load framework base classes
jimport('joomla.application.component.view');

/**
 * MVC View for Log
 *
 */
class AkeebaViewLog extends JView
{
	public function display()
	{
		// Add toolbar buttons
		JToolBarHelper::title(JText::_('AKEEBA').': <small><small>'.JText::_('VIEWLOG').'</small></small>');
		JToolBarHelper::back('Back', 'index.php?option='.JRequest::getCmd('option'));
		JToolBarHelper::spacer();
		$document =& JFactory::getDocument();
		$document->addStyleSheet(JURI::base().'../media/com_akeeba/theme/akeebaui.css');

		parent::display();
	}
}